<?php
$groups = $lang->groups;
$lang->groups = new stdclass();
foreach($groups as $key => $group)
{
    $lang->groups->$key = $group;
    if($key == 'content') $lang->groups->form = array('title' => 'Form', 'link' => 'form|admin|type=survey', 'icon' => 'form');
}

$lang->formModules['survey'] = 'Survey';
$lang->formModules['vote']   = 'Vote';
$lang->formModules['form']   = 'Form';
$lang->formModules['exam']   = 'Exam';

foreach($lang->formModules as $type => $name)
{
    $lang->menu->$type = "{$name}|form|admin|type={$type}";

    $lang->$type = new stdclass();
}

$lang->date->second = 'second';
