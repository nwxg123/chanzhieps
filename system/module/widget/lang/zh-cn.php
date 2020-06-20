<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The zh-cn file of widget module of RanZhi.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     widget 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
$lang->widget->common = '区块';
$lang->widget->title  = '区块名称';
$lang->widget->style  = '外观';
$lang->widget->type   = '类型';
$lang->widget->grid   = '宽度';
$lang->widget->color  = '颜色';
$lang->widget->status = '状态';

$lang->widget->message = '留言';
$lang->widget->comment = '评论';
$lang->widget->reply   = '回复';

$lang->widget->create    = '创建区块';
$lang->widget->hidden    = '隐藏';
$lang->widget->lblWidget = '区块';
$lang->widget->lblRss    = 'RSS地址';
$lang->widget->lblNum    = '条数';
$lang->widget->content   = '内容';

$lang->widget->params = new stdclass();
$lang->widget->params->name  = '参数名称';
$lang->widget->params->value = '参数值';

$lang->widget->createWidget        = '添加区块';
$lang->widget->editWidget          = '编辑区块';
$lang->widget->ordersSaved         = '排序已保存';
$lang->widget->confirmRemoveWidget = '确定移除区块【{0}】吗？';

$lang->widget->dynamic     = '最新动态';
$lang->widget->dynamicInfo = "%s, %s <em>%s</em> %s <a href='%s'>%s</a>。";

$lang->widget->default = array();
$lang->widget->default['1']['title'] = '新手引导';
$lang->widget->default['1']['type']  = 'process';
$lang->widget->default['1']['grid']  = 7;

$lang->widget->default['2']['title'] = '授权信息';
$lang->widget->default['2']['type']  = 'license';
$lang->widget->default['2']['grid']  = 3;

$lang->widget->default['3']['title'] = '概览';
$lang->widget->default['3']['type']  = 'stat';
$lang->widget->default['3']['grid']  = 7;

$lang->widget->default['4']['title'] = '前台动态';
$lang->widget->default['4']['type']  = 'frontLog';
$lang->widget->default['4']['grid']  = 3;

$lang->widget->default['5']['title'] = '待办事项';
$lang->widget->default['5']['type']  = 'untreatedList';
$lang->widget->default['5']['grid']  = 5;

$lang->widget->default['6']['title'] = '趋势图';
$lang->widget->default['6']['type']  = 'trendMap';
$lang->widget->default['6']['grid']  = 6;

$lang->widget->default['7']['title'] = '操作日志';
$lang->widget->default['7']['type']  = 'operationLog';
$lang->widget->default['7']['grid']  = 4;

$lang->widget->default['8']['title'] = '蝉知动态';
$lang->widget->default['8']['type']  = 'chanzhiDynamic';
$lang->widget->default['8']['grid']  = 4;

$lang->widget->typeList = new stdclass();
$lang->widget->typeList->process        = '新手引导';
$lang->widget->typeList->stat           = '概览';
$lang->widget->typeList->untreatedList  = '待办事项';
$lang->widget->typeList->trendMap       = '趋势图';
$lang->widget->typeList->operationLog   = '操作日志';
$lang->widget->typeList->latestOrder    = '最新订单';
$lang->widget->typeList->latestThread   = '最新帖子';
$lang->widget->typeList->message        = '反馈';
$lang->widget->typeList->wechatMessage  = '微信留言';
$lang->widget->typeList->submission     = '最新投稿';
$lang->widget->typeList->chanzhiDynamic = '蝉知动态';
$lang->widget->typeList->commonMenu     = '快捷入口';
$lang->widget->typeList->html           = '自定义';

$lang->widget->stat = new stdclass();
$lang->widget->stat->article = '文章数';
$lang->widget->stat->blog    = '博客数';
$lang->widget->stat->product = '产品数';
$lang->widget->stat->thread  = '主题帖';
$lang->widget->stat->user    = '会员数';
$lang->widget->stat->pv      = '浏览量(PV)';
$lang->widget->stat->uv      = '访客数(UV)';
$lang->widget->stat->ip      = 'IP数量';

$lang->widget->stat->statLeft  = array('article' => 'article', 'blog' => 'article', 'product' => 'product', 'thread' => 'thread', 'user' => 'user');
$lang->widget->stat->statRight = array('pv' => 'stat', 'uv' => 'stat', 'ip' => 'stat');

$lang->widget->process = array();
$lang->widget->process[0] = array('top' => '基本信息','site' => '站点设置','heart-sign' => '社区账号');
$lang->widget->process[1] = array('top' => '站点设计','palette' => '主题设置','layout' => '布局管理');
$lang->widget->process[2] = array('top' => '内容管理','send' => '发布内容','promote' => '添加产品');
$lang->widget->process[3] = array('top' => '推广引流','horn' => '内容推广','verify' => '会员推广');

$lang->widget->todoList = new stdclass();
$lang->widget->todoList->verifyProcess        = '审核处理';
$lang->widget->todoList->orderProcess         = '订单处理';
$lang->widget->todoList->replenishmentProcess = '补货处理';
$lang->widget->todoList->needVerifyFeedBack   = '待审核反馈';
$lang->widget->todoList->needVerifyContribute = '待审核投稿';
$lang->widget->todoList->needVerifyThread     = '待审核主帖';
$lang->widget->todoList->needDeliveryOrder    = '待发货订单';
$lang->widget->todoList->needRetrunOrder      = '待退款订单';
$lang->widget->todoList->needReceivingOrder   = '待收货订单';
$lang->widget->todoList->needAddProduct       = '待补货产品';

$lang->widget->operationLog = new stdclass();
$lang->widget->operationLog->today = '今天';

$lang->widget->operationLog->admin = new stdclass();
$lang->widget->operationLog->admin->login = '登录了后台';
$lang->widget->operationLog->front = new stdclass();
$lang->widget->operationLog->front->login = '登录了前台';

