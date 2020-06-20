<?php if(!defined("RUN_MODE")) die();?>
<?php
$lang->admin->common        = 'Admin';
$lang->admin->adminLicense  = 'License';
$lang->admin->dashboard     = 'Dashboard';
$lang->admin->checked       = 'Checked';
$lang->admin->adminLog      = 'Admin';
$lang->admin->frontLog      = 'Front';

$lang->admin->getEmailCodeByApi  = 'Get code';
$lang->admin->getMobileCodeByApi = 'Get code';
$lang->admin->currentLicense     = 'Current License';
$lang->admin->validLicenses      = 'Valid License';

$lang->admin->shortcuts = new stdclass();
$lang->admin->shortcuts->common             = 'Shortcuts';
$lang->admin->shortcuts->articleCategories  = 'Category';
$lang->admin->shortcuts->article            = 'Article';
$lang->admin->shortcuts->product            = 'Product';
$lang->admin->shortcuts->feedback           = 'Feedback';
$lang->admin->shortcuts->site               = 'Settings';
$lang->admin->shortcuts->logo               = 'Logo';
$lang->admin->shortcuts->company            = 'Company';
$lang->admin->shortcuts->contact            = 'Contact';

$lang->admin->chanzhiLicense   = 'Chanzhi License';
$lang->admin->uploadLicense    = "Upload License Package";
$lang->admin->licenseVersion   = 'Version';
$lang->admin->versionNumber    = 'License Code';
$lang->admin->licesenEndDate   = 'Expiration';
$lang->admin->apply            = 'Aplly';
$lang->admin->applyBasic       = 'Apply Chanzhi Free';
$lang->admin->licenseApplied   = "Your authorization application is under review. Please install it on my authorization page after passing the review.";
$lang->admin->buyPro           = 'Buy Chanzhi pro';
$lang->admin->install          = 'Install';
$lang->admin->upgrade          = 'Upgrade';
$lang->admin->updateLicense    = 'Update License';
$lang->admin->applyBasicResult = 'Chanzhi Free Apply Result';
$lang->admin->buyProResult     = 'Chanzhi Pro Pay Result';
$lang->admin->licenseDomain    = 'Domain';
$lang->admin->licenseStatus    = 'Status';

$lang->admin->thread       = 'New Thread';
$lang->admin->order        = 'New Order';
$lang->admin->feedback     = 'New Feedback';

$lang->admin->adminEntry     = 'Warning! The admin entry is admin.php. Please rename it for security reasons.';

$lang->admin->connectApiFail = "It cannot be connected to the Zsite community. Please <a href='javascritp:loaction.reload()'>retry</a> after check the internet connection.";
$lang->admin->registerInfo   = "The site has binded to Zsite %s, %s";
$lang->admin->registerPage   = 'Register Page';
$lang->admin->rebind         = "Rebind";
$lang->admin->bindedInfo     = 'ZSite Account';

$lang->js->confirmRebind = "Are you sure to rebind the account of Zsite?";

$lang->admin->community = new stdclass();
$lang->admin->community->common     = 'The page is to register in Zsite.';
$lang->admin->community->caption    = 'Register';
$lang->admin->community->lblAccount = 'letters and numbers only ';
$lang->admin->community->lblPasswd  = 'letters and numbers only ';
$lang->admin->community->submit     = 'Submit';
$lang->admin->community->success    = "Submitted";
$lang->admin->community->update     = "Update information";

$lang->admin->bind = new stdclass();
$lang->admin->bind->caption = 'Zsite Account';
$lang->admin->bind->submit  = 'Bind account';
$lang->admin->bind->success = "Binding account is done.";

$lang->admin->license = new stdclass();
$lang->admin->license->domain       = 'Domain';
$lang->admin->license->notice       = 'Note：One license is for one domain. Once submitted, domain cannot be changed.';
$lang->admin->license->customer     = 'Grant';
$lang->admin->license->contact      = 'Phone';
$lang->admin->license->comment      = 'Notes';
$lang->admin->license->type         = 'Type';
$lang->admin->license->reason       = 'Reason';
$lang->admin->license->codeDiff     = 'Inconsistent with the latest licensing. It is recommended to reinstall the licensing.';
$lang->admin->license->captchaError = 'Please enter the correct code.';

$lang->admin->license->currentLicense    = "Current License";
$lang->admin->license->currentType       = "Current Type";
$lang->admin->license->tryUser           = "Try";
$lang->admin->license->tryDomain         = "Not Bind";
$lang->admin->license->notBind           = "Not Bind";
$lang->admin->license->communityaccount  = "Community Account";
$lang->admin->license->clickhere         = "Click here";
$lang->admin->license->notBind           = "The current community account is not bound. After binding the community account, the account can be authenticated";
$lang->admin->license->hasNewLicense     = "You have an updated license that can be installed and enabled. %s to enter the authorized installation page immediately.";

$lang->admin->license->versions['try']        = "Try";
$lang->admin->license->versions['personal']   = "Free";
$lang->admin->license->versions['enterprise'] = "Free";
$lang->admin->license->versions['basic']      = "Free";
$lang->admin->license->versions['pro']        = "Pro";

$lang->admin->license->statusList['wait']    = 'To be audited';
$lang->admin->license->statusList['notpaid'] = 'To be paid';
$lang->admin->license->statusList['normal']  = 'Normal';
$lang->admin->license->statusList['paid']    = 'Paid';
$lang->admin->license->statusList['reject']  = 'Reject';

$lang->admin->license->welcome = "Welcome to Chanzhi enterprise portal system. You can use Chanzhi professional edition function for free until <span class='text-danger'>%s</span>. After expiration, you can continue to use Chanzhi free edition function, apply for formal edition authorization for free, or purchase Professional Edition authorization.";
$lang->admin->license->overdue = "Welcome to Chanzhi enterprise portal system. The function of Chanzhi professional edition you tried has <span class='text-danger'>expired</span>. You can continue to use Chanzhi free edition function, apply for official edition authorization for free, or purchase Professional Edition authorization.";

$lang->admin->license->redirecting      = "<span class='text-muted'><span id='countDown'>3</span>Seconds later, jump to the community account registration / binding page......</span> <a class='btn-redirec' href='%s'><i class='icon icon-hand-right'></i>Jump immediately</a>";
$lang->admin->license->bindCommunity    = 'Before applying for authorization, you must bind the chanzhi community account. Please register and bind the chanzhi community account first to obtain authorization.';
$lang->admin->license->errorRedirect    = "<span class='text-muted'>Jump to the chanzhi authorization page in <span id='countDown'>10</span> seconds......</span> <a class='btn-redirec' href='%s'><i class='icon icon-hand-right'></i>Jump immediately</a>";
$lang->admin->license->licenseDirError  = 'File permissions are not enough. Please execute manually on the server<br/> "sudo mkdir -m 777 %s"。';
$lang->admin->license->licenseFileError = 'File permissions are not enough. Please execute manually on the server<br/> "sudo chmod -R o=wrx %s"。';
$lang->admin->license->installSuccess   = 'Installation authorization successful';
$lang->admin->license->successRedirect  = "<span class='text-muted'>Jump to the chanzhi authorization page in <span id='countDown'>3</span> seconds......</span> <a class='btn-redirec' href='%s'><i class='icon icon-hand-right'></i>Jump immediately</a>";
$lang->admin->license->installError     = 'Failed to install the authorization. It may be failed to get the authorization or failed to write the file.';
