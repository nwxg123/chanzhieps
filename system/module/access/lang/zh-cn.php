<?php
$lang->access = new stdclass();
$lang->access->setAccess     = '访问权限';
$lang->access->score         = '消耗积分';
$lang->access->levelScore    = '会员等级';
$lang->access->level         = '会员等级';
$lang->access->certification = '会员认证';
$lang->access->identity      = '访问身份';
$lang->access->denied        = '对不起，访问受限！';
$lang->access->payByScore    = '使用积分访问';
$lang->access->ignoreLevel   = '低级会员可用积分访问';

$lang->access->identityList = array();
$lang->access->identityList['guest'] = '公共';
$lang->access->identityList['user']  = '会员';

$lang->access->certificationList = array();
$lang->access->certificationList['email']     = '邮箱认证'; 
$lang->access->certificationList['mobile']   = '手机认证'; 
$lang->access->certificationList['realname'] = '实名认证'; 
$lang->access->certificationList['company']  = '企业认证'; 

$lang->access->require = new stdclass();
$lang->access->require->login         = '您要访问的内容需要登录后才能访问。';
$lang->access->require->higherLevel   = "您要访问的内容需要 <strong>%s </strong>会员才能访问。";
$lang->access->require->costScore     = "您要访问的内容需要花费<strong>%s</strong>个积分才能访问。";
$lang->access->require->needScore     = "您要访问的内容需要花费积分才能访问。";
$lang->access->require->contactUs     = "如有其他疑问请<a href='%s' target='_blank' class='text-primary'>联系我们</a>。";
$lang->access->require->certification = '您要访问的内容需要通过<strong>会员%s认证</strong>后才能访问。';
