<?php
$lang->chat->common          = 'Chat Online';
$lang->chat->send            = 'send';
$lang->chat->status          = 'Status';
$lang->chat->xxdServer       = 'Server address';
$lang->chat->staff           = 'Customer service staff';
$lang->chat->setStaff        = 'Staff setting';
$lang->chat->setServer       = 'Server setting';
$lang->chat->onlineResponse  = 'Online welcome message';
$lang->chat->offlineResponse = 'Offline welcome message';
$lang->chat->downloadXXD     = 'Down load chat server';
$lang->chat->downloadPackage = 'Download the full package';
$lang->chat->downloadConfig  = 'Download config file';
$lang->chat->changeSetting   = 'Change Setting';

$lang->chat->statusList[1] = 'Enable';
$lang->chat->statusList[0] = 'Disable';

$lang->chat->errorKey   = 'The key should be a 32 byte string including letters or numbers.';
$lang->chat->defaultKey = 'Do not use default <strong>key</strong>.';

$lang->chat->xxdServerTip   = 'XXD server address contains protocol and host and port，such as https://127.0.0.1:11443';
$lang->chat->xxdServerEmpty = 'XXD server address is empty.';
$lang->chat->xxdServerError = 'XXD server address can not be 127.0.0.1.';
$lang->chat->xxdSchemeError = 'Server address should started with http:// or https://.';
$lang->chat->xxdPortError   = 'Server address should contain valid port and the default is <strong>11443</strong>.。';
$lang->chat->staffEmpty     = 'Staff is empty';
$lang->chat->createChatFail = 'Create chat fail.';
$lang->chat->errorSSLCrt    = 'Please set the SSL certificate content.';
$lang->chat->errorSSLKey    = 'Set the SSL private key content.';

$lang->chat->default = new stdclass();
$lang->chat->default->onlineResponse  = 'May I help you?';
$lang->chat->default->offlineResponse = 'Please leave your message and we will contact you as soon as possible.';

$lang->chat->placeholder = new stdclass();
$lang->chat->placeholder->online  = 'Please input the welcome message when the online.';
$lang->chat->placeholder->offline = 'Please input the welcome message when the offline.';

$lang->chat->xxd = new stdclass();
$lang->chat->xxd->os             = 'System';
$lang->chat->xxd->ip             = 'Listen IP';
$lang->chat->xxd->max            = 'Max';
$lang->chat->xxd->chatPort       = 'Client port';
$lang->chat->xxd->commonPort     = 'Common port';
$lang->chat->xxd->https          = 'Enable https';
$lang->chat->xxd->uploadFileSize = 'Upload file size';
$lang->chat->xxd->maxOnlineUser  = 'Max online user';
$lang->chat->xxd->sslcrt         = 'Certificate content';
$lang->chat->xxd->sslkey         = 'Certificate private';

$lang->chat->placeholder->xxd = new stdclass();
$lang->chat->placeholder->xxd->ip             = 'Listen to the server IP address, Default 0.0.0.0';
$lang->chat->placeholder->xxd->chatPort       = 'The port on which the chat client communicates';
$lang->chat->placeholder->xxd->commonPort     = 'Generic port used for client login verification and for file upload and download';
$lang->chat->placeholder->xxd->https          = 'Enable https';
$lang->chat->placeholder->xxd->uploadFileSize = 'Upload file size';
$lang->chat->placeholder->xxd->maxOnlineUser  = 'Maximum number of user online';
$lang->chat->placeholder->xxd->sslcrt         = 'Copy the certificate content here';
$lang->chat->placeholder->xxd->sslkey         = 'Copy the certificate key here';

$lang->chat->osList['win_i386']      = 'Windows 32bit';
$lang->chat->osList['win_x86_64']    = 'Windows 64bit';
$lang->chat->osList['linux_i386']    = 'Linux 32bit';
$lang->chat->osList['linux_x86_64']  = 'Linux 64bit';
$lang->chat->osList['darwin_x86_64'] = 'macOS';
