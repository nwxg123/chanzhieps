<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The en file of widget module of RanZhi.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     widget 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
$lang->widget->common = 'Widget';
$lang->widget->title  = 'Name';
$lang->widget->style  = 'Style';
$lang->widget->type   = 'Type';
$lang->widget->grid   = 'Grid';
$lang->widget->color  = 'Color';
$lang->widget->status = 'Status';

$lang->widget->message = 'Message';
$lang->widget->comment = 'Comment';
$lang->widget->reply   = 'Reply';

$lang->widget->create    = 'Add Widget';
$lang->widget->hidden    = 'Hide';
$lang->widget->lblWidget = 'Widgets';
$lang->widget->lblRss    = 'RSS';
$lang->widget->lblNum    = 'Entry';
$lang->widget->content   = 'Content';

$lang->widget->params = new stdclass();
$lang->widget->params->name  = 'Parameter';
$lang->widget->params->value = 'Value';

$lang->widget->createWidget        = 'Add Widget';
$lang->widget->editWidget          = 'Edit';
$lang->widget->ordersSaved         = 'Ranking saved!';
$lang->widget->confirmRemoveWidget = 'Do you want to remove【{0}】?';

$lang->widget->dynamic     = 'Dynamic';
$lang->widget->dynamicInfo = "%s, %s <em>%s</em> %s <a href='%s'>%s</a>。";

$lang->widget->default = array();
$lang->widget->default['1']['title'] = 'Novice guide';
$lang->widget->default['1']['type']  = 'process';
$lang->widget->default['1']['grid']  = 7;

$lang->widget->default['2']['title'] = 'License';
$lang->widget->default['2']['type']  = 'license';
$lang->widget->default['2']['grid']  = 3;

$lang->widget->default['3']['title'] = 'Overview';
$lang->widget->default['3']['type']  = 'stat';
$lang->widget->default['3']['grid']  = 7;

$lang->widget->default['4']['title'] = 'Front Log';
$lang->widget->default['4']['type']  = 'frontLog';
$lang->widget->default['4']['grid']  = 3;

$lang->widget->default['5']['title'] = 'To-do list';
$lang->widget->default['5']['type']  = 'untreatedList';
$lang->widget->default['5']['grid']  = 5;

$lang->widget->default['6']['title'] = 'Trend map';
$lang->widget->default['6']['type']  = 'trendMap';
$lang->widget->default['6']['grid']  = 6;

$lang->widget->default['7']['title'] = 'Operation log';
$lang->widget->default['7']['type']  = 'operationLog';
$lang->widget->default['7']['grid']  = 4;

$lang->widget->default['8']['title'] = 'Zsite Dynamic';
$lang->widget->default['8']['type']  = 'chanzhiDynamic';
$lang->widget->default['8']['grid']  = 4;

$lang->widget->typeList = new stdclass();
$lang->widget->typeList->process        = 'Process';
$lang->widget->typeList->stat           = 'Stat';
$lang->widget->typeList->untreatedList  = 'To-do List';
$lang->widget->typeList->trendMap       = 'Trend Map';
$lang->widget->typeList->operationLog   = 'Operation Log';
$lang->widget->typeList->latestOrder    = 'Latest Order';
$lang->widget->typeList->latestThread   = 'Latest Thread';
$lang->widget->typeList->message        = 'Feedback';
$lang->widget->typeList->wechatMessage  = 'Wechat Message';
$lang->widget->typeList->submission     = 'Latest Submission';
//$lang->widget->typeList->chanzhiDynamic = 'Zsite Dynamic';
$lang->widget->typeList->commonMenu     = 'Quick Entry';
$lang->widget->typeList->html           = 'Custom';

$lang->widget->stat = new stdclass();
$lang->widget->stat->article = 'Article Num';
$lang->widget->stat->blog    = 'Blog Num';
$lang->widget->stat->product = 'Product Num';
$lang->widget->stat->thread  = 'Thread Num';
$lang->widget->stat->user    = 'User Num';
$lang->widget->stat->pv      = 'PV';
$lang->widget->stat->uv      = 'UV';
$lang->widget->stat->ip      = 'IP';

$lang->widget->stat->statLeft  = array('article' => 'article', 'blog' => 'article', 'product' => 'product', 'thread' => 'thread', 'user' => 'user');
$lang->widget->stat->statRight = array('pv' => 'stat', 'uv' => 'stat', 'ip' => 'stat');

$lang->widget->process = array();
$lang->widget->process[0] = array('top' => 'Site','site' => 'Setting','heart-sign' => 'Account');
$lang->widget->process[1] = array('top' => 'Design','palette' => 'Theme','layout' => 'Typeset');
$lang->widget->process[2] = array('top' => 'Content','send' => 'Publish','promote' => 'Product');
$lang->widget->process[3] = array('top' => 'SEO','horn' => 'Content','verify' => 'Member');

$lang->widget->todoList = new stdclass();
$lang->widget->todoList->verifyProcess        = 'Review';
$lang->widget->todoList->orderProcess         = 'Order';
$lang->widget->todoList->replenishmentProcess = 'Replenishment';
$lang->widget->todoList->needVerifyFeedBack   = 'Feedback';
$lang->widget->todoList->needVerifyContribute = 'Submission';
$lang->widget->todoList->needVerifyThread     = 'Thread';
$lang->widget->todoList->needDeliveryOrder    = 'Delivery';
$lang->widget->todoList->needRetrunOrder      = 'Return';
$lang->widget->todoList->needReceivingOrder   = 'Delivery';
$lang->widget->todoList->needAddProduct       = 'Product';

$lang->widget->operationLog = new stdclass();
$lang->widget->operationLog->today = 'Today';

$lang->widget->operationLog->admin = new stdclass();
$lang->widget->operationLog->admin->login = 'login.';
$lang->widget->operationLog->front = new stdclass();
$lang->widget->operationLog->front->login = 'login.';
