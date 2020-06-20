<?php
$navs = $lang->nav->types;
$lang->nav->types = array();
foreach($navs as $type => $name)
{
    $lang->nav->types[$type] = $name;
    if($type == 'article') $lang->nav->types['video'] = '视频类目';
}
