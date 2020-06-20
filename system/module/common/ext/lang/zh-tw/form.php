<?php
$groups = $lang->groups;
$lang->groups = new stdclass();
foreach($groups as $key => $group)
{
    $lang->groups->$key = $group;
    if($key == 'content') $lang->groups->form = array('title' => '表單', 'link' => 'form|admin|type=survey', 'icon' => 'edit');
}

$lang->formModules['survey'] = '問卷';
$lang->formModules['vote']   = '投票';
$lang->formModules['form']   = '表單';
$lang->formModules['exam']   = '考試';

foreach($lang->formModules as $type => $name)
{
    $lang->menu->$type = "{$name}|form|admin|type={$type}";

    $lang->$type = new stdclass();
}

$lang->date->second = '秒';
