<?php
if(!isset($config->form)) $config->form = new stdclass();
$config->form->recPerPage = 5;

$config->form->require = new stdclass();
$config->form->require->create = 'title,type';
$config->form->require->edit   = 'title,type';
