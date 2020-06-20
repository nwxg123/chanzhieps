<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The control file of admin module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     admin
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
class admin extends control
{
    /**
     * The index page of admin panel, print the sites.
     * 
     * @access public
     * @return void
     */
    public function index()
    {
        $widgets = $this->loadModel('widget')->getWidgetList();

        /* Init widget when vist index first. */
        if(empty($widgets) and empty($this->config->widgetInited))
        {
            if($this->widget->initWidget()) die(js::reload());
        }

        foreach($widgets as $key => $widget)
        {
            $widget->params = json_decode($widget->params);
            if(empty($widget->params)) $widget->params = new stdclass();

            $widget->moreLink = zget($this->config->widget->moreLinkList, $widget->type, '');
        }

        $this->view->title         = $this->lang->admin->dashboard;
        $this->view->ignoreUpgrade = isset($this->config->global->ignoreUpgrade) and $this->config->global->ignoreUpgrade;
        $this->view->checkLocation = $this->loadModel('user')->checkAllowedLocation();
        $this->view->widgets       = $widgets;
        $this->display();
    }

    /**
     * Ignore the upgrade notice.
     *
     * @access public
     * return void
     **/
    public function ignoreUpgrade()
    {
        $result = $this->loadModel('setting')->setItems('system.common.global', array('ignoreUpgrade' => true), 'all');
        if($result) $this->send(array('result' => 'success', 'locate' => inlink('index')));
        $this->send(array('result' => 'fail', 'message' => $this->lang->fail));
    }

    /**
     * Ignore the admin entry warning.
     *
     * @access public
     * return void
     **/
    public function ignore()
    {
        $result = $this->loadModel('setting')->setItems('system.common.global', array('ignoreAdminEntry' => true));
        if($result) $this->send(array('result' => 'success', 'locate' => inlink('index')));
        $this->send(array('result' => 'fail', 'message' => $this->lang->fail));
    }

    /**
     * Switch lang.
     * 
     * @param  string    $lang 
     * @access public
     * @return void
     */
    public function switchLang($lang)
    {
        $this->admin->switchLang($lang);
        $this->locate($this->server->http_referer);
    }

    /**
     * Register chanzhi.
     * 
	 * @access public
	 * @return void
	 */
	public function register()
	{
		$registerInfo = $this->admin->getRegisterInfo();
        $apiConfig    = $this->admin->getApiConfig();
		if($_POST)
		{
			$response = $this->admin->registerByAPI($apiConfig);
            if(isset($response->certifiedEmail)) $this->session->set('certifiedEmail', $response->certifiedEmail);
            if(isset($response->certifiedMobile)) $this->session->set('certifiedMobile', $response->certifiedMobile);
            if($response->result == 'success') 
            {
                $this->admin->setCommunity($response->data->account, $response->data->private, $response->certifiedEmail, $response->certifiedMobile);
                $response->message = $this->lang->admin->community->success;
                $response->locate  = inlink('register');
            }
            $this->send($response);
		}

        $this->lang->menuGroups->admin = 'community';
        $this->view->title             = $this->lang->admin->community->common;
	    $this->view->apiConnected      = !empty($apiConfig);
        $this->view->register          = $registerInfo;

        if(!empty($registerInfo)) $this->view->bindedUser = $this->admin->getUserByApi();

		$this->display();
	}

	/**
	 * Bind chanzhi.
	 * 
	 * @access public
	 * @return void
	 */
	public function bind()
	{
        if($_POST)
        {
            $response = $this->admin->bindByAPI();
            if($response->result == 'success')
            {
                $this->admin->setCommunity($response->data->account, $response->data->private);
                $this->send(array('result' => 'success', 'message' => $this->lang->admin->bind->success, 'locate' => inlink('register')));
            }

            $this->send(array('result' => 'fail', 'message' => $response->message));
        }
        exit;
    }

    /**
     * Api get mobileCode 
     * 
     * @param  int    $mobile 
     * @access public
     * @return void
     */
    public function getMobileCodeByApi($mobile)
    {
        $result = $this->admin->getMobileCodeByApi($mobile);
        $this->send($result);
    }

    /**
     * Aet email code by api.
     * 
     * @param  string    $email 
     * @access public
     * @return void
     */
    public function getEmailCodeByApi($email)
    {
        $result = $this->admin->getEmailCodeByApi($email);
        $this->send($result);
    }
    
    /**
     * Unbind chanzhi account.
     * 
     * @access public
     * @return void
     */
    public function unbind()
    {
        $this->admin->unbindCommunity();
        $this->locate(inlink('register'));
    }

    /**
     * Get user by api.
     * 
     * @access public
     * @return void
     */
    public function getUserByApi()
    {
        $result = $this->admin->getUserByApi(true);
        $this->locate(inlink('register'));
    }

    /**
     * check mobile 
     * 
     * @param  string $referer 
     * @access public
     * @return void
     */
    public function checkMobile()
    {
        if($_POST)
        {
            $result  =$this->admin->checkMobileByApi();

            if($result->result == 'success')
            {
                $result->message = $lang->user->checkMobileSuccess;
                $result->locate  = inlink('register');
                $this->admin->getUserByApi(true);
            }

            $this->send($result);
        }

        $this->view->title      = $this->lang->user->checkMobile;
        $this->view->user       = $this->admin->getUserByApi();
        $this->view->referer    = $this->referer;
        $this->view->mobileURL  = helper::createLink('user', 'checkEmail', "referer=$referer", '', 'mhtml');
        $this->view->desktopURL = helper::createLink('user', 'checkEmail', "referer=$referer", '', 'html');
        $this->display();
    }

    /**
     * check mobile 
     * 
     * @param  string $referer 
     * @access public
     * @return void
     */
    public function checkEmail()
    {
        if($_POST)
        {
            $result = $this->admin->checkEmailByApi();

            if($result->result == 'success')
            {
                $result->message = $lang->user->checkEmailSuccess;
                $result->locate  = inlink('register');
                $this->admin->getUserByApi(true);
            }

            $this->send($result);
        }

        $this->view->title = $this->lang->user->checkEmail;
        $this->view->user  = $this->admin->getUserByApi();
        $this->display();
    }

    
    /**
     * Show license page
     * 
     * @access public
     * @return void
     */
    public function license()
    {
        $this->app->loadLang('user');
        $this->admin->getUserByApi(true);

        $this->lang->menuGroups->admin = 'chanzhiLicense';

        $currentLicense = commonModel::getLicense();

        $registerInfo   = $this->admin->getRegisterInfo();
        if(!$registerInfo)
        {
            $this->lang->redirecting = $this->lang->admin->license->redirecting;

            $this->view->reason = $this->lang->admin->license->bindCommunity;
            $this->view->locate = helper::createLink('admin', 'register');
            $this->display('common', 'redirect');
            die();
        }
 
        $registerInfo->user = json_decode($registerInfo->user);

        $host = $this->server->http_host;
        $localDomain = trim($host, '/ ');;
        $localDomain = str_replace(array('http://', 'http://www.', 'www.'), '', $localDomain);

        $allLicenses     = array();
        $validLicenses   = array();
        $waitingLicenses = array();

        foreach($registerInfo->user->license as $key => $license)
        {
            $license->type = $license->type == 'chanzhipro' ? 'pro' : 'basic';

            if($localDomain != $license->domain) continue;
            if($currentLicense->version == 'basic' and $license->type == 'basic') continue;
            if($currentLicense->version == 'pro' and !$currentLicense->try) continue;

            $allLicenses[] = $license;
            if($license->status == 'normal') $validLicenses[$license->type] = $license;
            if($license->status != 'normal') $waitingLicenses[$license->type] = $license;
        }

        $this->view->title           = $this->lang->admin->adminLicense;
        $this->view->registerInfo    = $registerInfo;
        $this->view->allLicenses     = $allLicenses;
        $this->view->validLicenses   = $validLicenses;
        $this->view->waitingLicenses = $waitingLicenses;
        $this->view->currentLicense  = $currentLicense;
        $this->display();
    }

    /**
     * Get license 
     * 
     * @access public
     * @return void
     */
    public function getLicense($type = 'personal')
    {
        $this->app->loadLang('user');
		$registerInfo = $this->admin->getRegisterInfo();
        if(!$registerInfo)
        {
            $this->lang->redirecting = $this->lang->admin->license->redirecting;

            $this->view->reason = $this->lang->admin->license->bindCommunity;
            $this->view->locate = helper::createLink('admin', 'register');
            $this->display('common', 'redirect');
            die();
        }

        $registerInfo->user = json_decode($registerInfo->user);

        $host   = $this->server->http_host;
        $domain = trim($host, '/ ');;
        $domain = str_replace(array('http://', 'http://www.', 'www.'), '', $domain);

        if($_POST)
        {
            $_POST['account'] = $registerInfo->account;

            if(!$registerInfo->user->mobileCertified)
            {
                $mobileCertified = $this->admin->checkMobileByApi();
                if($mobileCertified->result != 'success')
                {
                    $errors['captcha'][] = $this->lang->admin->license->captchaError;
                    $this->send(array('result' => 'fail', 'message' => $errors));
                }
            }

            if($registerInfo->user->mobileCertified || $mobileCertified->result == 'success')
            {
                $apiConfig = $this->admin->getApiConfig();
		        $api       = "license-apiapply.json?{$apiConfig->sessionVar}={$apiConfig->sessionID}";
                $api       = $this->admin->processApi($api);
                $response  = $this->admin->postApi($api, $_POST, $_FILES);
                $result    = json_decode($response);
            }

            if($result->result == 'success') $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => $this->createLink('admin', 'license')));
            $this->send(array('result' => $result->result, 'message' => $result->message));
        }

        $this->view->title   = $this->lang->admin->applyBasic;
        $this->view->type    = $type;
        $this->view->domain  = $domain;
        $this->view->user    = $registerInfo->user;
        $this->display();
    }

    /**
     * Upload license.
     * 
     * @access public
     * @return void
     */
    public function uploadLicense()
    {
        $this->view->canManage = array('result' => 'success');

        $configRoot = $this->app->getConfigRoot();
        $licenseRoot = $configRoot . 'license' . DS;
        $this->view->writable = (!is_dir($licenseRoot) or !is_writable($licenseRoot));

        $this->view->writableTip = sprintf($this->lang->admin->license->licenseDirError, $licenseRoot);
 
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if($this->view->canManage['result'] != 'success') $this->send(array('result' => 'fail', 'message' => sprintf($lang->guarder->okFileVerify, $this->view->canManage['name'])));
            
            if(empty($_FILES))  $this->send(array('result' => 'fail', 'message' => '' ));

            $tmpName     = $_FILES['file']['tmp_name'];
            $fileName    = $_FILES['file']['name'];
            $package     = basename($fileName, '.zip');
            $packagePath = $this->app->getTmpRoot() . "/package/";

            if(!is_dir($packagePath)) mkdir($packagePath, 0777, true);
            move_uploaded_file($tmpName, $packagePath . $package);

            $result = $this->admin->extractLicense($packagePath . $package);

            $this->send($result);
        }

        if(!$this->loadModel('guarder')->verify()) $this->view->canManage = $this->loadModel('common')->verifyAdmin();
        $this->view->title = $this->lang->admin->uploadLicense;
        $this->display();
    }
    /**
     * Install license 
     * 
     * @access public
     * @return void
     */
    public function installLicense($licenseID, $type = '')
    {
        $registerInfo = $this->admin->getRegisterInfo();
        if($type == 'view')
        {
            $registerInfo->user = json_decode($registerInfo->user);
            foreach($registerInfo->user->license as $license)
            {
                if($license->id == $licenseID) $this->view->license = $license;
            }
            $this->display();
            exit;
        }
        if($registerInfo)
        {
            $configRoot = $this->app->getConfigRoot();
            $licenseRoot = $configRoot . 'license' . DS;
            if(!is_dir($licenseRoot)) 
            {
                if(!is_writable($configRoot))
                {
                    $this->lang->redirecting = $this->lang->admin->license->errorRedirect;

                    $this->view->reason = sprintf($this->lang->admin->license->licenseDirError, $licenseRoot);
                    $this->view->locate = helper::createLink('admin', 'license');
                    $this->display('common', 'redirect');
                    die();
                }
                else
                {
                    mkdir($licenseRoot, 0777, true);;
                }
            }
            if(!is_writable($licenseRoot))
            {
                $this->lang->redirecting = $this->lang->admin->license->errorRedirect;

                $this->view->reason = sprintf($this->lang->admin->license->licenseFileError, $licenseRoot);
                $this->view->locate = helper::createLink('admin', 'license');
                $this->display('common', 'redirect');
                die();
            }
            $apiConfig = $this->admin->getApiConfig();
            $api       = "license-apidownload.json?{$apiConfig->sessionVar}={$apiConfig->sessionID}";
            $api       = $this->admin->processApi($api);
            $response  = $this->admin->postApi($api, array('account' => $registerInfo->account, 'licenseID' => $licenseID));
            $result    = json_decode($response);

            if($result && empty($result->result))
            {
                $result = file_put_contents($licenseRoot . 'chanzhipro.txt', $result);
                if($result)
                {
                    $this->lang->redirecting = $this->lang->admin->license->successRedirect;
                    $this->view->reason = $this->lang->admin->license->installSuccess;
                    $this->view->locate = helper::createLink('admin', 'license');
                    $this->display('common', 'redirect');
                    die();
                }
            }

            $this->lang->redirecting = $this->lang->admin->license->errorRedirect;
            $this->view->reason = sprintf($this->lang->admin->license->licenseFileError, $licenseRoot);
            $this->view->locate = helper::createLink('admin', 'license');
            $this->display('common', 'redirect');
            die();
        }
    }
}
