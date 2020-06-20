<?php
$lang->user->certifyInfo        = '认证信息';
$lang->user->certifyNow         = '立即认证';
$lang->user->certify            = '用户认证';
$lang->user->idcard             = '身份证号';
$lang->user->companySN          = '注册号';
$lang->user->idcardImage        = '身份证';
$lang->user->businessLicense    = '营业执照';
$lang->user->certified          = '已认证';
$lang->user->emailCertified     = '邮件认证';
$lang->user->mobileCertified    = '手机认证';
$lang->user->realnameCertified  = '实名会员';
$lang->user->companyCertified   = '企业会员';
$lang->user->secretKey          = '发信密钥';
$lang->user->certifyAddedTime   = '提交时间';
$lang->user->exportCertified    = '导出';
$lang->user->originalMail       = '原始邮箱';
$lang->user->getCertifyCode     = '获取验证码';
$lang->user->checkMobile        = '手机认证';
$lang->user->checkMobileSuccess = '手机认证成功';
$lang->user->uncertified        = '未认证';
$lang->user->send2SC            = '发送到Sendcloud';
$lang->user->send2SCSubject     = '禅道 %s年%s月%s日 用户资料';
$lang->user->uploadIdcard       = '上传身份证正面图片';
$lang->user->uploadLicense      = '上传营业执照';
$lang->user->submit             = '提交';
$lang->user->checkCertify      = '认证审核';
$lang->user->certifiedStatus    = '认证状态';
$lang->user->review             = '审核';

$lang->user->sendmail     = '发信信息';
$lang->user->sendmailWait = '此功能正在开发中。';

$lang->user->certifyTypes = new stdclass();
$lang->user->certifyTypes->email    = '邮箱';
$lang->user->certifyTypes->mobile   = '手机';
$lang->user->certifyTypes->realname = '实名';
$lang->user->certifyTypes->company  = '企业';

$lang->user->certifyAction['pass']      = '通过';
$lang->user->certifyAction['sendcloud'] = 'Sendcloud';
$lang->user->certifyAction['fail']      = '驳回';

$lang->user->certifyStatus['wait']      = '等待认证';
$lang->user->certifyStatus['zentao']    = '禅道认证';
$lang->user->certifyStatus['sendcloud'] = 'Sendcloud认证';

$lang->user->control->menus['email']   = '<i class="icon-envelope-alt"></i> 发信信息<i class="icon-chevron-right"></i>|user|mail';

$lang->user->allSend2SC       = '所有用户信息都已经发送到Sendcloud。';
$lang->user->send2SCSuccess   = '用户信息已经成功发送到Sendcloud。';
$lang->user->certifyFail      = '禅道认证失败';
$lang->user->certifySuccess   = '禅道认证成功';
$lang->user->certifySCSuccess = 'SendCloud认证成功';

$lang->user->certifyFailBody      = '对不起，您的禅道认证失败，如果有问题请联系 电话：0532-86893032  QQ：co@zentao.net  徐先生';
$lang->user->certifySuccessBody   = '恭喜您，禅道认证成功，可享受每天200封发信额度';
$lang->user->certifySCSuccessBody = '恭喜您，SendCloud认证成功，可长期享受每天200封发信额度';

$lang->user->placeholder->smsCode       = '请输入短信里面的验证码。';
$lang->user->placeholder->uploadCard    = '请上传身份证正面图片。';
$lang->user->placeholder->uploadLicense = '请上传营业执照。';
$lang->user->placeholder->companySN     = '请输入18位的企业注册号。';

$lang->user->profileTitle = new stdclass();
$lang->user->profileTitle->email    = '邮箱认证';
$lang->user->profileTitle->mobile   = '手机认证';
$lang->user->profileTitle->personal = '实名认证';
$lang->user->profileTitle->business = '企业认证';

$lang->user->certifyStatusList['wait']   = "审核中";
$lang->user->certifyStatusList['normal'] = "已认证";
$lang->user->certifyStatusList['fail']   = "被驳回";
$lang->user->certifyStatusList['no']     = "未认证";

$lang->user->certifyStatusLabels['no']     = "<span class='label label-default'>未认证</span>";
$lang->user->certifyStatusLabels['wait']   = "<span class='label label-info'>审核中</span>";
$lang->user->certifyStatusLabels['fail']   = "<span class='label label-default'>认证失败</span>";
$lang->user->certifyStatusLabels['normal'] = "<span class='label label-success'>已认证</span>";

$lang->user->reviewMenu = new stdclass;
$lang->user->reviewMenu->realname = '实名认证';
$lang->user->reviewMenu->company  = '企业认证';

$lang->user->stateList['mobile']   = '手机认证(%d)';
