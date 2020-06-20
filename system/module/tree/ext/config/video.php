<?php
if(!isset($config->tree)) $config->tree = new stdclass();
if(!isset($config->tree->menuGroups)) $config->tree->menuGroups = new stdclass();
$config->tree->menuGroups->video = 'video';
$config->tree->editableTypes .= "video,";
