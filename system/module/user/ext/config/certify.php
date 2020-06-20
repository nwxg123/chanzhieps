<?php
$config->user->skipedFields->update .= ',mobile';
$config->user->navGroups->desktop->user      .= ',certify,';
$config->user->navGroups->mobile->user       .= ',certify,';

$config->user->infoGroups = new stdclass();
$config->user->infoGroups->mobile = new stdclass();
$config->user->infoGroups->mobile->name    = 'realname,email,mobile';
$config->user->infoGroups->mobile->address = 'company,address';
$config->user->infoGroups->mobile->contact = 'zipcode,phone,qq,gtalk';

