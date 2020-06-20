<?php
$config->shortcuts = new stdclass();
$config->shortcuts->common = 'order,message,comment,reply,thread,forumreply,wechat';
$config->shortcuts->create = 'articleCreate,productCreate,feedback,siteSetting,companyInfo,contact';

$config->menus = new stdclass();
$config->menus->content         = 'article,page,blog,book,attachment';
$config->menus->statistics      = 'summary,traffic,visitor,ranking,statSetting';
$config->menus->promote         = 'tag,links,bear';
$config->menus->shop            = 'order,product,orderSetting';
$config->menus->user            = 'user,message,wechatmsg,comment,reply,forum,submission';
$config->menus->design          = 'desktop_top,desktop_blog,mobile_top,mobile_blog';
$config->menus->site            = 'basic,module,seo,http,company,site,security,wechat';
$config->menus->open            = 'community,package,chanzhiLicense';

$designMenus = array('ui', 'logo', 'slide', 'nav', 'block', 'visual', 'others', 'edit');
$config->menuGroups = new stdclass();
foreach($designMenus as $menu)
{
    $config->menuGroups->$menu = 'design';
    $config->menus->design .= ",$menu";
}

foreach($config->menus as $group => $modules)
{
    $menus = explode(',', $modules);
    foreach($menus as $menu)
    {
        if($menu) $config->menuGroups->$menu = $group;
    }
}

$config->menuDependence = new stdclass();
$config->menuDependence->submission   = 'submission';
$config->menuDependence->page         = 'page';
$config->menuDependence->blog         = 'blog';
$config->menuDependence->orderSetting = 'product';

$config->menuExtra = new stdclass();
$config->menuExtra->visual = "target='_blank'";

$config->moduleMenu = new stdclass();

$config->typeMenus = new stdclass();
$config->typeMenus->design = new stdclass();
