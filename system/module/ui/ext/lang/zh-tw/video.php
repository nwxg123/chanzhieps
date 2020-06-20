<?php
if(!isset($lang->ui)) $lang->ui = new stdclass();
if(!isset($lang->ui->folderList)) $lang->ui->folderList = new stdclass();
if(!isset($lang->ui->files)) $lang->ui->files = new stdclass();
if(!isset($lang->ui->files->default)) $lang->ui->files->default = new stdclass();

$lang->ui->folderList->video = '視頻';

$lang->ui->files->default->video = array();
$lang->ui->files->default->video['browse'] = '視頻列表';
$lang->ui->files->default->video['view']   = '視頻詳情';
