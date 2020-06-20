<?php
$lang->chat->common          = '在线咨询';
$lang->chat->send            = '发送';
$lang->chat->status          = '状态';
$lang->chat->xxdServer       = '服务器地址';
$lang->chat->staff           = '客服人员';
$lang->chat->setStaff        = '客服设置';
$lang->chat->setServer       = '服务器设置';
$lang->chat->onlineResponse  = '客服在线欢迎语';
$lang->chat->offlineResponse = '客服离线欢迎语';
$lang->chat->downloadXXD     = '下载服务端';
$lang->chat->downloadPackage = '下载完整包';
$lang->chat->downloadConfig  = '只下载配置文件';
$lang->chat->changeSetting   = '修改配置';

$lang->chat->statusList[1] = '启用';
$lang->chat->statusList[0] = '不启用';

$lang->chat->errorKey   = '<strong>密钥</strong> 应该为数字或字母的组合，长度为32位。';
$lang->chat->defaultKey = '请勿使用默认<strong>密钥</strong>。';

$lang->chat->xxdServerTip   = 'XXD服务器地址为完整的协议+地址+端口，示例：https://127.0.0.1:11443。';
$lang->chat->xxdServerEmpty = '抱歉，系统没有配置有效的聊天服务器。';
$lang->chat->xxdServerError = '喧喧服务器地址不能为 127.0.0.1。';
$lang->chat->xxdSchemeError = '服务器地址应该以<strong>http://</strong>或<strong>https://</strong>开头。';
$lang->chat->xxdPortError   = '请设置有效的端口号。';
$lang->chat->staffEmpty     = '抱歉，系统没有设置可用的客服。';
$lang->chat->createChatFail = '抱歉，发起在线咨询失败。';
$lang->chat->errorSSLCrt    = '请设置SSL证书内容。';
$lang->chat->errorSSLKey    = '请设置SSL私钥。';

$lang->chat->default = new stdclass();
$lang->chat->default->onlineResponse  = '您好，请问有什么可以帮助您的？';
$lang->chat->default->offlineResponse = '您好，当前没有客服在线，请直接留言，客服上线后我们会立即给您回复。';

$lang->chat->placeholder = new stdclass();
$lang->chat->placeholder->online  = '请填写客服在线时的欢迎语。';
$lang->chat->placeholder->offline = '请填写客服离线时的欢迎语。';

$lang->chat->xxd = new stdclass();
$lang->chat->xxd->os             = '操作系统';
$lang->chat->xxd->ip             = '监听IP';
$lang->chat->xxd->max            = '最大';
$lang->chat->xxd->chatPort       = '客户端通讯端口';
$lang->chat->xxd->commonPort     = '通用端口';
$lang->chat->xxd->https          = '启用https';
$lang->chat->xxd->uploadFileSize = '上传文件限制';
$lang->chat->xxd->maxOnlineUser  = '最大在线人数';
$lang->chat->xxd->sslcrt         = '证书内容';
$lang->chat->xxd->sslkey         = '证书私钥';

$lang->chat->placeholder->xxd = new stdclass();
$lang->chat->placeholder->xxd->ip             = '监听的服务器ip地址，没有特殊需要直接填写0.0.0.0';
$lang->chat->placeholder->xxd->chatPort       = '与聊天客户端通讯的端口';
$lang->chat->placeholder->xxd->commonPort     = '通用端口，该端口用于客户端登录时验证，以及文件上传下载使用';
$lang->chat->placeholder->xxd->https          = '启用https';
$lang->chat->placeholder->xxd->uploadFileSize = '上传文件的大小';
$lang->chat->placeholder->xxd->maxOnlineUser  = '最大在线人数';
$lang->chat->placeholder->xxd->sslcrt         = '请将证书内容复制到此处';
$lang->chat->placeholder->xxd->sslkey         = '请将证书密钥复制到此处';

$lang->chat->osList['win_i386']      = 'Windows 32位';
$lang->chat->osList['win_x86_64']    = 'Windows 64位';
$lang->chat->osList['linux_i386']    = 'Linux 32位';
$lang->chat->osList['linux_x86_64']  = 'Linux 64位';
$lang->chat->osList['darwin_x86_64'] = 'macOS';
