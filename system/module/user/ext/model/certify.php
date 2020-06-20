<?php
/**
 * Get users List.
 *
 * @param object  $pager
 * @access public
 * @return object 
 */
public function getList($pager = null, $user = '', $orderBy = 'id_desc')
{
    $status = $this->get->status;

    $users = $this->dao->setAutolang(false)
        ->select('u.*, o.provider as provider, openID as openID')->from(TABLE_USER)->alias('u')
        ->leftJoin(TABLE_OAUTH)->alias('o')->on('u.account = o.account')->where('1')
        ->beginIF($user)
        ->andWhere('u.account', true)->like("%{$user}%")
        ->orWhere('u.realname')->like("%{$user}%")
        ->orWhere('u.email')->like("%{$user}%")
        ->markRight(1)
        ->fi()
        ->beginIf($status == 'admin')->andWhere('u.admin')->in('super,common')->fi()
        ->beginIf($status == 'email')->andWhere('u.emailCertified')->eq('1')->fi()
        ->beginIf($status == 'mobile')->andWhere('u.mobileCertified')->eq('1')->fi()
        ->beginIf($status && !strpos(',admin,mobile,email,all,', $status))->andWhere('o.provider')->eq($status)->fi()
        ->orderBy($orderBy)
        ->page($pager)
        ->fetchAll('id');

    foreach($users as $user)
    {
        $user->realname  = $this->computeRealname($user);
        $user->realnames = json_decode($user->realnames);
    }

    return $users;
}

/**
 * Statistics of the number of user in different states
 * 
 * @param  string    $categories 
 * @access public
 * @return arrary
 */
public function getStatisticalUsers($user)
{
    $status     = $this->get->status;

    $userStat = array();
    foreach($this->lang->user->stateList as $status => $stateLang)
    {
        $userStat[$status] = $this->dao->setAutolang(false)
            ->select('1')->from(TABLE_USER)->alias('u')
            ->leftJoin(TABLE_OAUTH)->alias('o')->on('u.account = o.account')->where('1')
            ->beginIF($user)
            ->andWhere('u.account', true)->like("%{$user}%")
            ->orWhere('u.realname')->like("%{$user}%")
            ->orWhere('u.email')->like("%{$user}%")
            ->markRight(1)
            ->fi()
            ->beginIf($status == 'admin')->andWhere('u.admin')->in('super,common')->fi()
            ->beginIf($status == 'email')->andWhere('u.emailCertified')->eq('1')->fi()
            ->beginIf($status == 'mobile')->andWhere('u.mobileCertified')->eq('1')->fi()
            ->beginIf($status && !strpos(',admin,mobile,email,all,', $status))->andWhere('o.provider')->eq($status)->fi()
            ->count();
    }
    return $userStat;
}

/**
 * Get certify list 
 * 
 * @param  string  $type 
 * @param  int     $status 
 * @param  string  $orderBy 
 * @param  object  $pager 
 * @access public
 * @return object
 */
public function getCertifyList($type, $status, $orderBy, $pager)
{
    $certifyField = $type . 'Certified';
    $users = $this->dao->setAutolang(false)
        ->select('*')->from(TABLE_USER)
        ->where($certifyField)->eq($status)
        ->orderBy($orderBy)
        ->page($pager)
        ->fetchAll();

    if(empty($users)) return null;
    foreach($users as $user)
    {
        $user->realname  = $this->computeRealname($user);
        $user->realnames = json_decode($user->realnames);
    }

    if(commonModel::isAvailable('score'))
    {
        foreach($users as $user)
        {
            $user->level = $this->computeUserLevel($user->rank);
        }
    }        

    foreach($users as $user) $accountList[] = $user->account;
    $objectType = '';
    if($type == 'realname') $objectType = 'idcard';
    if($type == 'company')  $objectType  = 'businessLicense';
    if($objectType == '') return $users;
    $files = $this->dao->select('*')->from(TABLE_FILE)->where('objectType')->eq($objectType)->andWhere('objectID')->in($accountList)->fetchAll('objectID');
    foreach($users as $user) $user->file = zget($files, $user->account, array());

    return $users;
}


/**
 * Sync SMTP 
 * 
 * @param  object    $user 
 * @access public
 * @return void
 */
public function sync2SMTP($user)
{
    $url  = 'http://smtp.zentao.cn/index.php?m=mail&f=apiAddUser';
    $param['account']       = $user->account;
    $param['email']         = $user->email;
    $param['zentaoKey']     = $user->zentaoKey;
    $param['sendcloudUser'] = $user->sendcloudUser;
    $param['sendcloudKey']  = $user->sendcloudKey;
    $param['certify']       = $user->certify;
    $param['addedTime']     = $user->addedTime;

    return $this->post2API($url, $param);
}

/**
 * Verify SMTP 
 * 
 * @param  object    $user 
 * @access public
 * @return void
 */
public function verify4SMTP($user)
{
    $url  = 'http://smtp.zentao.cn/index.php?m=mail&f=apiVerifyUser';
    $param['account']       = $user->account;
    $param['email']         = $user->email;
    $param['zentaoKey']     = $user->zentaoKey;
    $param['sendcloudUser'] = $user->sendcloudUser;
    $param['sendcloudKey']  = $user->sendcloudKey;
    $param['certify']       = $user->certify;
    $param['addedTime']     = $user->addedTime;
    $param['certifyTime']   = $user->certifyTime;

    return $this->post2API($url, $param);
}

/**
 * Sync certify status 
 * 
 * @param  string    $account 
 * @param  string    $action 
 * @access public
 * @return void
 */
public function syncCertifyStatus($account, $action)
{
    if(empty($account)) return true;

    $param['data'] = array();
    if($action != 'fail')
    {
        $certifyUsers = $this->dao->setAutoLang(false)->select('*')->from(TABLE_CERTIFY)->where('account')->in($account)->fetchAll();
        foreach($certifyUsers as $user)
        {
            $param['data'][$user->account]['sendcloudUser'] = $user->sendcloudUser;
            $param['data'][$user->account]['sendcloudKey']  = $user->sendcloudKey;
            $param['data'][$user->account]['certify']       = $user->certify;
            $param['data'][$user->account]['certifyTime']   = $user->certifyTime;
        }
    }
    else
    {
        $param['data'][$account] = $account;
    }

    $url  = 'http://smtp.zentao.cn/index.php?m=mail&f=apiCertifyStatus';
    $param['action']  = $action;

    return $this->post2API($url, $param);
}

/**
 * Post API 
 * 
 * @param  string   $url 
 * @param  array    $param 
 * @access public
 * @return string
 */
public function post2API($url, $param)
{
    ksort($param);
    $data = http_build_query($param);
    $key  = '9878e60ae6b3bb252d5d33a94c0198f4';
    $param['signature'] = md5($key . '&' . $data . '&' . $key);

    $data = http_build_query($param);
    $options['http'] = array(
        'method' => 'POST',
        'header' => 'Content-Type: application/x-www-form-urlencoded',
        'content' => $data
    );
    $context = stream_context_create($options);
    return file_get_contents($url, FILE_TEXT, $context);
}

/**
 * Get centify user 
 * 
 * @param  string $type 
 * @param  object    $pager 
 * @access public
 * @return object
 */
public function getCentifyUser($type = '', $pager = null)
{
    return $this->dao->select('t2.*,t1.realname,t1.email,t1.mobile,t1.emailCertified,t1.qq,t1.mobileCertified,t1.company,t1.bindSite')->from(TABLE_USER)->alias('t1')
        ->leftJoin(TABLE_CERTIFY)->alias('t2')->on('t1.account=t2.account')
        ->beginIF($type)->where('t2.certify')->eq($type)->fi()
        ->page($pager)
        ->fetchAll();
}

/**
 * Get profile 
 * 
 * @param  int     $key 
 * @param  string  $account 
 * @param  string  $default 
 * @access public
 * @return object
 */
public function getProfile($key = null, $account = null, $default = '')
{
    if(!$account) $account = $this->app->user->account;
    $user = $this->getByAccount($account);
    if($key) return zget($user, $key, $default); 
    return $account;
}

/**
 * Get user file 
 * 
 * @param  string    $objectType 
 * @param  string    $account 
 * @access public
 * @return object
 */
public function getUserFile($objectType, $account = null)
{
    if(!$account) $account = $this->app->user->account;
    return $this->dao->select('*')->from(TABLE_FILE)->where('objectType')->eq($objectType)->andWhere('objectID')->eq($account)->fetch();
}

/**
 * Check certified 
 * 
 * @param  string    $type 
 * @param  string    $account 
 * @access public
 * @return bool
 */
public function checkCertified($type, $account = null)
{
    if(!$account) $account = $this->app->user->account;
    $user = $this->getByAccount($account);

    if($type) return (strpos($user->certified, ",$type,") !== false);
    return false;
}

/**
 * Get idcard image 
 * 
 * @param  string    $account 
 * @access public
 * @return object
 */
public function getIdcardImage($account = null)
{
    $this->loadModel('file');
    $file = $this->getUserFile('card', $account);
    if(empty($file)) return false;

    $realPathName   = $this->file->getRealPathName($file->pathname, $file->objectType);
    $file->realPath = $this->file->savePath . $realPathName;
    $file->webPath  = $this->file->getWebPath($file->objectType) . $realPathName;
    return $file;
}

/**
 * Get business licence 
 * 
 * @param  string    $account 
 * @access public
 * @return object
 */
public function getBusinessLicence($account = null)
{
    $this->loadModel('file');
    $file = $this->getUserFile('businessLicense', $account);
    if(empty($file)) return false;

    $realPathName   = $this->file->getRealPathName($file->pathname, $file->objectType);
    $file->realPath = $this->file->savePath . $realPathName;
    $file->webPath  = $this->file->getWebPath($file->objectType) . $realPathName;
    return $file;
}

/**
 * Save idcard 
 * 
 * @access public
 * @return array
 */
public function saveIdcard()
{
    $user = new stdclass();
    $user->realname          = $this->post->realname;
    $user->idcard            = $this->post->idcard;
    $user->realnameCertified = 'wait';
    
    $this->dao->update(TABLE_USER)
        ->data($user)
        ->where('account')->eq($this->app->user->account)
        ->andWhere('realnameCertified')->ne('normal')
        ->batchCheck('notempty', 'realname,idcard')
        ->exec();
    if(dao::isError()) return array('result' => 'fail', 'message' => dao::getError());

    $this->dao->delete()->from(TABLE_FILE)->where('objectType')->eq('idcard')->andWhere('objectID')->eq($this->app->user->account)->andWhere('id')->ne($this->session->uploadedFiles['idcard'])->exec();
    if(dao::isError()) return array('result' => 'fail', 'message' => dao::getError());
    return array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => helper::createLink('user', 'profile'));
}

/**
 * Save business 
 * 
 * @access public
 * @return array
 */
public function saveBusiness()
{
    $user = new stdclass();
    $user->company          = $this->post->company;
    $user->companySN        = $this->post->companySN;
    $user->companyCertified = 'wait';
    
    $this->dao->update(TABLE_USER)
        ->data($user)
        ->where('account')->eq($this->app->user->account)
        ->andWhere('companyCertified')->ne('normal')
        ->batchCheck('notempty', 'company,companySN')
        ->exec();

    if(dao::isError()) return array('result' => 'fail', 'message' => dao::getError());

    $this->dao->delete()->from(TABLE_FILE)->where('objectType')->eq('businessLicense')->andWhere('objectID')->eq($this->app->user->account)->andWhere('id')->ne($this->session->uploadedFiles['businessLicense'])->exec();
    if(dao::isError()) return array('result' => 'fail', 'message' => dao::getError());
    return array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => helper::createLink('user', 'profile'));
}


/**
 * Get user image 
 * 
 * @param  string    $type 
 * @param  string    $account 
 * @access public
 * @return object
 */
public function getUserImage($type, $account = null)
{
    if(empty($account)) $account = $this->app->user->account;
    $file = $this->dao->select('*')->from(TABLE_FILE)->where('objectType')->eq($type)->andWhere('objectID')->eq($account)->fetch();
    if(!$file) return false;

    $file->webPath  = $this->loadModel('file')->getWebPath($file->objectType) . $this->file->getRealPathName($file->pathname, $file->objectType);
    return $file;
}

/**
 * Check certify.
 * 
 * @param  int    $account 
 * @param  int    $type 
 * @param  int    $status 
 * @access public
 * @return void
 */
public function checkCertify($account, $type, $status)
{
    $field = '';
    $award = '';
    if($type == 'realname')
    {
        $field  = "realnameCertified";
        $award  = 'certifyrealname';
    }

    if($type == 'company')
    {
        $field = "companyCertified";
        $award = 'certifycompany';
    }

    if(empty($field)) return array('result' => 'fail');
    
    $user = $this->getByAccount($account);
    $this->dao->update(TABLE_USER)->set($field)->eq($status)->where('account')->eq($account)->exec();

    if(dao::isError()) return array('result' => 'fail', 'message' => dao::getError());
    return array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => helper::createLink('user', 'review', "type=$type&status=$status"));

    if($award and commonModel::isAvailable('score'))
    {
        $this->loadModel('score')->earn($award, 'userID', $user->id, '', $account);
    }
    if(dao::isError()) return array('result' => 'fail', 'message' => dao::getError());
    return array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => helper::createLink('user', 'review', "type=$type&status=$status"));
}

/**
 * Show certify label 
 * 
 * @param  object    $user 
 * @access public
 * @return string
 */
public function showCertifyLabel($user)
{
   if(zget($user, 'emailCertified')    == 1) echo "<span class='text text-success'>{$this->lang->user->certifyTypes->email}</span> ";
   if(zget($user, 'mobileCertified')   == 1) echo "<span class='text text-success'>{$this->lang->user->certifyTypes->mobile}</span> ";
   if(zget($user, 'realnameCertified') == 'normal' ) echo "<span class='text text-success'>{$this->lang->user->certifyTypes->realname}</span> ";
   if(zget($user, 'companyCertified')  ==  'normal') echo "<span class='text text-success'>{$this->lang->user->certifyTypes->company}</span>";
}

/**
 * Update mobile 
 * 
 * @param  string    $account 
 * @param  bool      $check 
 * @access public
 * @return bool
 */
public function updateMobile($account, $check = 'true')
{
    if($check) $this->checkOldPassword();
    $data = fixer::input('post')->remove('oldPwd, captcha, token, fingerprint,field')->get();
    $data->mobileCertified = 0;

    $this->dao->update(TABLE_USER)->setAutolang(false)
        ->data($data)
        ->check('mobile', 'phone')
        ->where('account')->eq($account)
        ->exec();

    return !dao::isError();
}
