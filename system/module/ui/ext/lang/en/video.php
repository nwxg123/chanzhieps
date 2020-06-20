<?php
if(!isset($lang->ui)) $lang->ui = new stdclass();
if(!isset($lang->ui->folderList)) $lang->ui->folderList = new stdclass();
if(!isset($lang->ui->files)) $lang->ui->files = new stdclass();
if(!isset($lang->ui->files->default)) $lang->ui->files->default = new stdclass();

$lang->ui->folderList->video = 'Video';

$lang->ui->files->default->video = array();
$lang->ui->files->default->video['browse'] = 'Video List';
$lang->ui->files->default->video['view']   = 'Video Details';
