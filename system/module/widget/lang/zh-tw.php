<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The zh-tw file of widget module of RanZhi.
 *
 * @copyright   Copyright 2009-2015 青島易軟天創網絡科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     widget 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
$lang->widget->common = '區塊';
$lang->widget->title  = '區塊名稱';
$lang->widget->style  = '外觀';
$lang->widget->type   = '類型';
$lang->widget->grid   = '寬度';
$lang->widget->color  = '顏色';
$lang->widget->status = '狀態';

$lang->widget->message = '留言';
$lang->widget->comment = '評論';
$lang->widget->reply   = '回覆';

$lang->widget->create    = '創建區塊';
$lang->widget->hidden    = '隱藏';
$lang->widget->lblWidget = '區塊';
$lang->widget->lblRss    = 'RSS地址';
$lang->widget->lblNum    = '條數';
$lang->widget->content   = '內容';

$lang->widget->params = new stdclass();
$lang->widget->params->name  = '參數名稱';
$lang->widget->params->value = '參數值';

$lang->widget->createWidget        = '添加區塊';
$lang->widget->editWidget          = '編輯區塊';
$lang->widget->ordersSaved         = '排序已保存';
$lang->widget->confirmRemoveWidget = '確定移除區塊【{0}】嗎？';

$lang->widget->dynamic     = '最新動態';
$lang->widget->dynamicInfo = "%s, %s <em>%s</em> %s <a href='%s'>%s</a>。";

$lang->widget->default = array();
$lang->widget->default['1']['title'] = '新手引導';
$lang->widget->default['1']['type']  = 'process';
$lang->widget->default['1']['grid']  = 7;

$lang->widget->default['2']['title'] = '授權信息';
$lang->widget->default['2']['type']  = 'license';
$lang->widget->default['2']['grid']  = 3;

$lang->widget->default['3']['title'] = '概覽';
$lang->widget->default['3']['type']  = 'stat';
$lang->widget->default['3']['grid']  = 7;

$lang->widget->default['4']['title'] = '前台動態';
$lang->widget->default['4']['type']  = 'frontLog';
$lang->widget->default['4']['grid']  = 3;

$lang->widget->default['5']['title'] = '待辦事項';
$lang->widget->default['5']['type']  = 'untreatedList';
$lang->widget->default['5']['grid']  = 5;

$lang->widget->default['6']['title'] = '趨勢圖';
$lang->widget->default['6']['type']  = 'trendMap';
$lang->widget->default['6']['grid']  = 6;

$lang->widget->default['7']['title'] = '操作日誌';
$lang->widget->default['7']['type']  = 'operationLog';
$lang->widget->default['7']['grid']  = 4;

$lang->widget->default['8']['title'] = '蟬知動態';
$lang->widget->default['8']['type']  = 'chanzhiDynamic';
$lang->widget->default['8']['grid']  = 4;

$lang->widget->typeList = new stdclass();
$lang->widget->typeList->process        = '新手引導';
$lang->widget->typeList->stat           = '概覽';
$lang->widget->typeList->untreatedList  = '待辦事項';
$lang->widget->typeList->trendMap       = '趨勢圖';
$lang->widget->typeList->operationLog   = '操作日誌';
$lang->widget->typeList->latestOrder    = '最新訂單';
$lang->widget->typeList->latestThread   = '最新帖子';
$lang->widget->typeList->message        = '反饋';
$lang->widget->typeList->wechatMessage  = '微信留言';
$lang->widget->typeList->submission     = '最新投稿';
$lang->widget->typeList->chanzhiDynamic = '蟬知動態';
$lang->widget->typeList->commonMenu     = '快捷入口';
$lang->widget->typeList->html           = '自定義';

$lang->widget->stat = new stdclass();
$lang->widget->stat->article = '文章數';
$lang->widget->stat->blog    = '博客數';
$lang->widget->stat->product = '產品數';
$lang->widget->stat->thread  = '主題帖';
$lang->widget->stat->user    = '會員數';
$lang->widget->stat->pv      = '瀏覽量(PV)';
$lang->widget->stat->uv      = '訪客數(UV)';
$lang->widget->stat->ip      = 'IP數量';

$lang->widget->stat->statLeft  = array('article' => 'article', 'blog' => 'article', 'product' => 'product', 'thread' => 'thread', 'user' => 'user');
$lang->widget->stat->statRight = array('pv' => 'stat', 'uv' => 'stat', 'ip' => 'stat');

$lang->widget->process = array();
$lang->widget->process[0] = array('top' => '基本信息','site' => '站點設置','heart-sign' => '社區賬號');
$lang->widget->process[1] = array('top' => '站點設計','palette' => '主題設置','layout' => '佈局管理');
$lang->widget->process[2] = array('top' => '內容管理','send' => '發佈內容','promote' => '添加產品');
$lang->widget->process[3] = array('top' => '推廣引流','horn' => '內容推廣','verify' => '會員推廣');

$lang->widget->todoList = new stdclass();
$lang->widget->todoList->verifyProcess        = '審核處理';
$lang->widget->todoList->orderProcess         = '訂單處理';
$lang->widget->todoList->replenishmentProcess = '補貨處理';
$lang->widget->todoList->needVerifyFeedBack   = '待審核反饋';
$lang->widget->todoList->needVerifyContribute = '待審核投稿';
$lang->widget->todoList->needVerifyThread     = '待審核主帖';
$lang->widget->todoList->needDeliveryOrder    = '待發貨訂單';
$lang->widget->todoList->needRetrunOrder      = '待退款訂單';
$lang->widget->todoList->needReceivingOrder   = '待收貨訂單';
$lang->widget->todoList->needAddProduct       = '待補貨產品';

$lang->widget->operationLog = new stdclass();
$lang->widget->operationLog->today = '今天';

$lang->widget->operationLog->admin = new stdclass();
$lang->widget->operationLog->admin->login = '登錄了後台';
$lang->widget->operationLog->front = new stdclass();
$lang->widget->operationLog->front->login = '登錄了前台';

