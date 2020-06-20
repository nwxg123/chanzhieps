<?php
$navs = $lang->nav->types;
$lang->nav->types = array();
foreach($navs as $type => $name)
{
    $lang->nav->types[$type] = $name;
    if($type == 'page') $lang->nav->types['form'] = '表單';
}
