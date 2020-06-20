<?php
$lang->access = new stdclass();
$lang->access->setAccess     = 'Access Control';
$lang->access->score         = 'Consumption';
$lang->access->levelScore    = 'User Rank';
$lang->access->level         = 'Rank';
$lang->access->certification = 'Certify';
$lang->access->identity      = 'ID';
$lang->access->denied        = 'Sorry, your access is denied!';
$lang->access->payByScore    = 'Consume points to visit';
$lang->access->ignoreLevel   = 'Low rank user can use points to visit.';

$lang->access->identityList = array();
$lang->access->identityList['guest'] = 'Guest';
$lang->access->identityList['user']  = 'User';

$lang->access->certificationList = array();
$lang->access->certificationList['email']   = 'Email'; 
//$lang->access->certificationList['mobile'] = '手机'; 

$lang->access->require = new stdclass();
$lang->access->require->login         = 'Content will show only when you login.';
$lang->access->require->higherLevel   = "Content will show to <strong>%s </strong> user.";
$lang->access->require->costScore     = "Content will cost <strong>%s</strong> points to show.";
$lang->access->require->needScore     = "Content will cost points to show.";
$lang->access->require->contactUs     = "If any questions, <a href='%s' target='_blank' class='text-primary'>Contact Us</a>.";
$lang->access->require->certification = 'Content will show once user passed <strong>User %s Verification</strong>.';
