<?php
/**
 * The common simplified chinese file of XiRangCSM.
 
 * @copyright   Copyright 2009-2011 青島易軟天創網絡科技有限公司 (QingDao Nature Easy Soft Network Technology Co,LTD www.cnezsoft.com)
 * @license     商業軟件非免費軟件
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     XiRangCSM
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
$lang->menu->customer       = '客戶|customer|admin|';
$lang->menu->faq            = 'FAQ|faq|admin|';
$lang->menu->request        = '工單|request|admin|';
$lang->menu->question       = '問題|ask|managequestions|';
$lang->menu->answer         = '回答|ask|manageanswers|';
$lang->menu->requestSetting = '設置|request|setting|';

$groups = (array) $lang->groups;

$lang->groups = new stdclass();
foreach($groups as $key => $group)
{
    if($key == 'user') $lang->groups->request = array('title' => '工單',  'link' => 'requset|admin|', 'icon' => 'cog');
    $lang->groups->$key = $group;
}

$lang->customer = new stdclass();
$lang->request  = new stdclass();
$lang->faq      = new stdclass();

$lang->request->menu = new stdclass();
$lang->request->menu->setting  = '工單設置|request|setting|';
$lang->request->menu->category = '工單分類|tree|browse|type=request';

$lang->menu->csmsetting = '工單|request|setting|';
$lang->csmsetting = new stdclass();
$lang->csmsetting->menu = new stdclass();
$lang->csmsetting->menu->setting  = '工單設置|request|setting|';
$lang->csmsetting->menu->category = '工單分類|tree|browse|type=request';
