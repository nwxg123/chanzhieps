<?php
$config->formitem->require = new stdclass();
$config->formitem->require->create = 'title,type,order,score,scoreRule,answer';
$config->formitem->require->edit   = 'title,type,order,score,scoreRule,answer';

$config->formitem->editor = new stdclass();
$config->formitem->editor->create = array('id' => 'desc', 'tools' => 'simple');
$config->formitem->editor->edit   = array('id' => 'desc', 'tools' => 'simple');

$config->formitem->iconList['realname'] = 'user';
$config->formitem->iconList['sex']      = 'mars';
$config->formitem->iconList['age']      = 'heart';
$config->formitem->iconList['mobile']   = 'mobile';
$config->formitem->iconList['phone']    = 'phone';
$config->formitem->iconList['email']    = 'envelope';
$config->formitem->iconList['address']  = 'home';
$config->formitem->iconList['qq']       = 'qq';
$config->formitem->iconList['wechat']   = 'wechat';
$config->formitem->iconList['weibo']    = 'weibo';

$config->formitem->controlList['realname'] = 'input';
$config->formitem->controlList['sex']      = 'radio';
$config->formitem->controlList['age']      = 'radio';
$config->formitem->controlList['mobile']   = 'input';
$config->formitem->controlList['phone']    = 'input';
$config->formitem->controlList['email']    = 'input';
$config->formitem->controlList['address']  = 'input';
$config->formitem->controlList['qq']       = 'input';
$config->formitem->controlList['wechat']   = 'input';
$config->formitem->controlList['weibo']    = 'input';

$config->formitem->displayList['sex'] = 'inline';
$config->formitem->displayList['age'] = 'block';

$config->formitem->ruleList['realname'] = 'notempty';
$config->formitem->ruleList['mobile']   = 'notempty,phone';
$config->formitem->ruleList['phone']    = 'phone';
$config->formitem->ruleList['email']    = 'email';
