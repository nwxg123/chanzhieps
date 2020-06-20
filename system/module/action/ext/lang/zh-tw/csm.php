<?php
/**
 * The action module zh-tw file of XiRangCSM
 *
 * @copyright   Copyright 2009-2011 青島易軟天創網絡科技有限公司 (QingDao Nature Easy Soft Network Technology Co,LTD www.cnezsoft.com)
 * @license     商業軟件非免費軟件
 * @author      Congzhi Chen <congzhi@cnezsoft.com>
 * @package     action
 * @version     $Id: zh-tw.php 1914 2011-06-24 10:11:25Z yidong@cnezsoft.com $
 * @link        http://www.chanzhi.org
 */
$lang->action->dynamic = new stdclass();
$lang->action->dynamic->today      = '今天';
$lang->action->dynamic->yesterday  = '昨天';
$lang->action->dynamic->twoDaysAgo = '前天';
$lang->action->dynamic->thisWeek   = '本週';
$lang->action->dynamic->lastWeek   = '上周';
$lang->action->dynamic->thisMonth  = '本月';
$lang->action->dynamic->lastMonth  = '上月';
$lang->action->dynamic->all        = '所有';

$lang->action->objectTypes['request'] = '問題';
$lang->action->objectTypes['reply']   = '回覆';
$lang->action->objectTypes['FAQ']     = 'FAQ';

$lang->action->desc->replied     = '$date, 由 <strong>$actor</strong> 回覆。' . "\n";
$lang->action->desc->doubted     = '$date, 由 <strong>$actor</strong> 追問。' . "\n";
$lang->action->desc->closed      = '$date, 由 <strong>$actor</strong> 關閉。' . "\n";
$lang->action->desc->transfered  = '$date, 由 <strong>$actor</strong> 轉交產品。' . "\n";
$lang->action->desc->valuated    = '$date, 由 <strong>$actor</strong> 評價。' . "\n";
$lang->action->desc->commented   = '$date, 由 <strong>$actor</strong> 點價。' . "\n";
$lang->action->desc->processed   = '$date, 由產品部門 <strong>$actor</strong> 回覆。' . "\n";
$lang->action->desc->assignedto  = '$date, 由 <strong>$actor</strong> 指派給你。' . "\n";

$lang->action->label->doubted     = '追問了';
$lang->action->label->replied     = '回覆了';
$lang->action->label->closed      = '關閉了';
$lang->action->label->transfered  = '轉交了';
$lang->action->label->login       = '登錄系統';
$lang->action->label->logout      = "退出登錄";

$lang->action->valuate = "評價等級為：";
