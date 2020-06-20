<?php
$groups = $lang->groups;
$lang->groups = new stdclass();
foreach($groups as $key => $group)
{
    $lang->groups->$key = $group;
    if($key == 'content') $lang->groups->form = array('title' => '表单', 'link' => 'form|admin|type=survey', 'icon' => 'form');
}

$lang->formModules['survey'] = '问卷';
$lang->formModules['vote']   = '投票';
$lang->formModules['form']   = '表单';
$lang->formModules['exam']   = '考试';

foreach($lang->formModules as $type => $name)
{
    $lang->menu->$type = "{$name}|form|admin|type={$type}";

    $lang->$type = new stdclass();
}

$lang->date->second = '秒';
