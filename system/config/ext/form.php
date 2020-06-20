<?php
$config->formModules = array('survey', 'vote', 'exam', 'form');

/* Menu. */
if(RUN_MODE == 'admin')
{
    $config->menus->form = '';
    foreach($config->formModules as $module)
    {
        $config->menus->form        .= $module . ',';
        $config->menuGroups->$module = 'form';
    }

    $config->menus->form         .= 'formitem';
    $config->menuGroups->formitem = 'form';
    
    $config->multiEntrances[] = 'form_admin';
    $config->multiEntrances[] = 'form_create';
    $config->multiEntrances[] = 'form_edit';
}

/* Table const. */
define('TABLE_FORM',       $config->db->prefix . 'form');
define('TABLE_FORMITEM',   $config->db->prefix . 'formitem');
define('TABLE_FORMOPTION', $config->db->prefix . 'formoption');
define('TABLE_FORMUSER',   $config->db->prefix . 'formuser');
define('TABLE_FORMDATA',   $config->db->prefix . 'formdata');

if(!isset($config->dependence)) $config->dependence = new stdclass();
$config->dependence->form[] = 'form';

/* Dependence. */
if(!isset($config->menuDependence)) $config->menuDependence = new stdclass();
$config->menuDependence->form = 'form';

/* Seo. */
if(!isset($config->seo)) $config->seo = new stdclass();
if(!isset($config->seo->alias)) $config->seo->alias = new stdclass();

$config->seo->alias->method['form']['view'] = 'view';  

/* Rights. */
$config->rights->guest['form']['view']            = 'view';
$config->rights->guest['form']['ajaxgettimeleft'] = 'ajaxgettimeleft';
$config->rights->guest['misc']['ping']            = 'ping';

$filter->form = new stdclass();
$filter->form->default->cookie['preview'] = 'reg::any';

$filter->formitem = new stdclass();
$filter->formitem->admin->cookie['tab'] = 'reg::word';
