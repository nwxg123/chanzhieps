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
$lang->action->dynamic->today      = 'today';
$lang->action->dynamic->yesterday  = 'yesterday';
$lang->action->dynamic->twoDaysAgo = 'Two days ago';
$lang->action->dynamic->thisWeek   = 'This Week';
$lang->action->dynamic->lastWeek   = 'Last Week';
$lang->action->dynamic->thisMonth  = 'This Month';
$lang->action->dynamic->lastMonth  = 'Last Month';
$lang->action->dynamic->all        = 'All';

$lang->action->objectTypes['request'] = 'Request';
$lang->action->objectTypes['reply']   = 'Reply';
$lang->action->objectTypes['FAQ']     = 'FAQ';

$lang->action->desc->replied     = '$date, replied by <strong>$actor</strong>.' . "\n";
$lang->action->desc->doubted     = '$date, douted by <strong>$actor</strong>.' . "\n";
$lang->action->desc->closed      = '$date, closed by <strong>$actor</strong>.' . "\n";
$lang->action->desc->transfered  = '$date, transferred by<strong>$actor</strong>.' . "\n";
$lang->action->desc->valuated    = '$date, evaluated by <strong>$actor</strong>.' . "\n";
$lang->action->desc->commented   = '$date, commented by <strong>$actor</strong>.' . "\n";
$lang->action->desc->processed   = '$date, replied by Product Department <strong>$actor</strong>.' . "\n";
$lang->action->desc->assignedto  = '$date, assigned to you by <strong>$actor</strong>.' . "\n";

$lang->action->label->doubted     = 'doubted';
$lang->action->label->replied     = 'replied';
$lang->action->label->closed      = 'closed';
$lang->action->label->transfered  = 'transfered';
$lang->action->label->login       = 'Login';
$lang->action->label->logout      = "Logout";

$lang->action->valuate = "Evaluated：";
