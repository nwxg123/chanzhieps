<?php
/**
 * Get user sect 
 * 
 * @param  object    $user 
 * @access public
 * @return array
 */
public function getUserSect($user)
{
    $data        = array();
    $sects       = $this->loadModel('score')->getSectList();
    if(!isset($sects->{$user->sect}))     
    {
        $user->sect        = 'no_sect';
        $data['sect']      = $this->lang->user->no_sect;
        $data['color']     = '';
        $data['sectName']  = ''; 
        $data['sectCode']  = 'no_sect';
        $data['level']     = '';
        $data['levelName'] = '';
    }
    else
    {
        $levels      = $this->score->getLevelsBySect($user->sect);
        $userLevel   = $this->computeUserLevel($user->rank, 'code');
        
        $data['sect']      = zget($sects, $user->sect, '');
        $data['color']     = $this->score->getSectColor($user->sect);
        $data['sectName']  = zget($levels, $userLevel);
        $data['sectCode']  = $user->sect;
        $data['level']     = array_search($userLevel, array_keys($levels)) + 2;
        $data['levelName'] = $this->dao->select('value')
            ->from(TABLE_CONFIG)
            ->where('module')->eq('score')
            ->andWhere('section')->eq('levelName')
            ->andWhere('`key`')->eq($userLevel)->fetch()->value;
    }
    return $data;
}

/**
 * Switch user level 
 * 
 * @param  object    $user 
 * @access public
 * @return object
 */
public function switchLevel($user)
{
    $level = 0;
    $userConfig = $this->config->user;
    if(!isset($userConfig->level)) return $user;
    krsort($userConfig->level);
    foreach($userConfig->level as $levelIndex => $rank)
    {   
        if($user->rank > $rank)
        {   
            $level = $levelIndex;
            break;
        }   
    }   

    if($level == 0) $level = 1;
    $user->level = $level;
    return $user;
}

/**
 * Get basic info 
 * 
 * @param  object    $users 
 * @access public
 * @return object
 */
public function getBasicInfo($users)
{
    $users = $this->dao->select('account, realname, admin, `join`, `rank`, sect, score, last, visits')->from(TABLE_USER)->where('account')->in($users)->fetchAll('account');
    if(!$users) return array();
    
    foreach($users as $account => $user)
    {
        $user->realname  = empty($user->realname) ? $account : $user->realname;
        $user->shortLast = substr($user->last, 5, -3);
        $user->shortJoin = substr($user->join, 5, -3);

        if(commonModel::isAvailable('sect')) 
        {
            $data             = $this->getUserSect($user);
            $user->sect       = $data['sect'];
            $user->sectName   = $data['sectName'];
            $user->sectColor  = $data['color'];
            $user->levelName  = $data['levelName'];
            $user->levelOrder = $data['level'];
            $user->sectCode   = $data['sectCode'];
        }
    }

    return $users;
}

/**
 * Check if the user has certificated the require option
 *
 * @access public
 * @param  string $account
 * @param  array  $options
 * @return bool
 */
public function checkCertification($account, $options = '')
{
    if($account == 'guest') return false;

    $options = explode(',', $options);
    if(empty($options)) return true;

    $user = $this->getByAccount($account);
    if(!$user) return false;
    
    foreach($options as $option)
    {
        $option = trim($option);
        if($option == 'email')  if(!$user->emailCertified) return false;
        if($option == 'mobile') if(!$user->mobileCertified) return false;
        if($option == 'realname') if($user->realnameCertified != 'normal') return false;
        if($option == 'company') if($user->companyCertified != 'normal') return false;
    }

    return true;
}
