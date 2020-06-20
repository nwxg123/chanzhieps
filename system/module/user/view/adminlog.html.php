<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The admin log view file of user module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      chujilu <chujilu@cnezsoft.com>
 * @package     User
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<section class='main-table'>
  <table class='table tablesorter table-fixed'>
    <thead>
      <tr class='text-center'>
        <th class='w-60px'> <?php echo $lang->user->log->id;?></th>
        <th class='w-100px'><?php echo $lang->user->log->account;?></th>
        <th><?php echo $lang->user->log->desc;?></th>
        <th class='w-120px'><?php echo $lang->user->log->browser;?></th>
        <th class='w-100px'><?php echo $lang->user->log->ip;?></th>
        <th class='w-200px'><?php echo $lang->user->log->location;?></th>
        <th class='w-150px'><?php echo $lang->user->log->date;?></th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($logs as $log):?>
    <tr class='text-center'>
      <td><?php echo $log->id;?></td>
      <td><?php echo $users[$log->account];?></td>
      <td><?php echo $log->desc;?></td>
      <td><?php echo $log->browser;?></td>
      <td><?php echo $log->ip;?></td>
      <td><?php echo $log->location;?></td>
      <td><?php echo $log->date;?></td>
    </tr>
    <?php endforeach;?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan='7'>
        <?php $pager->show();?>
        </td>
      </tr>
    </tfoot>
  </table>
</section>
<?php include '../../common/view/footer.admin.html.php';?>
