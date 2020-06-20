<?php
/**
 * The action module zh-cn file of XiRangCSM
 *
 * @copyright   Copyright 2009-2011 青岛易软天创网络科技有限公司 (QingDao Nature Easy Soft Network Technology Co,LTD www.cnezsoft.com)
 * @license     商业软件非免费软件
 * @author      Congzhi Chen <congzhi@cnezsoft.com>
 * @package     action
 * @version     $Id: zh-cn.php 1914 2011-06-24 10:11:25Z yidong@cnezsoft.com $
 * @link        http://www.chanzhi.org
 */
$lang->action->dynamic = new stdclass();
$lang->action->dynamic->today      = '今天';
$lang->action->dynamic->yesterday  = '昨天';
$lang->action->dynamic->twoDaysAgo = '前天';
$lang->action->dynamic->thisWeek   = '本周';
$lang->action->dynamic->lastWeek   = '上周';
$lang->action->dynamic->thisMonth  = '本月';
$lang->action->dynamic->lastMonth  = '上月';
$lang->action->dynamic->all        = '所有';

$lang->action->objectTypes['request'] = '问题';
$lang->action->objectTypes['reply']   = '回复';
$lang->action->objectTypes['FAQ']     = 'FAQ';

$lang->action->desc->replied     = '$date, 由 <strong>$actor</strong> 回复。' . "\n";
$lang->action->desc->doubted     = '$date, 由 <strong>$actor</strong> 追问。' . "\n";
$lang->action->desc->closed      = '$date, 由 <strong>$actor</strong> 关闭。' . "\n";
$lang->action->desc->transfered  = '$date, 由 <strong>$actor</strong> 转交产品。' . "\n";
$lang->action->desc->valuated    = '$date, 由 <strong>$actor</strong> 评价。' . "\n";
$lang->action->desc->commented   = '$date, 由 <strong>$actor</strong> 点价。' . "\n";
$lang->action->desc->processed   = '$date, 由产品部门 <strong>$actor</strong> 回复。' . "\n";
$lang->action->desc->assignedto  = '$date, 由 <strong>$actor</strong> 指派给你。' . "\n";

$lang->action->label->doubted     = '追问了';
$lang->action->label->replied     = '回复了';
$lang->action->label->closed      = '关闭了';
$lang->action->label->transfered  = '转交了';
$lang->action->label->login       = '登录系统';
$lang->action->label->logout      = "退出登录";

$lang->action->valuate = "评价等级为：";
