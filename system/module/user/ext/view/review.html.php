<?php
/**
 * The admin view file of user module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Yangyang Shi <shiyangyangwork@yahoo.cn>
 * @package     User
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php
include '../../../common/view/header.admin.html.php';
js::set('type', $type);
?>
<div id='bodySidebar'>
  <ul class='nav'>
    <?php foreach($lang->user->reviewMenu as $certifyType => $title):?>
    <?php $class = ($certifyType == $type) ? "class='active'" : '';?>
    <?php echo "<li $class>" . html::a(inlink('review', "type=$certifyType"), $title) . '</li>';?>
    <?php endforeach;?>
  </ul>
</div>
<div id='bodyContent'>
  <section class='main-table'>
    <header class='clearfix'>
      <ul class='nav nav-tabs-main pull-left'>
        <?php foreach($lang->user->certifyStatusList as $status => $title):?>
        <?php if($status == 'no') continue;?>
        <li <?php echo $currentStatus == $status ? "class='active'" : '';?>>
          <?php echo html::a(inlink('review', "type={$type}&status={$status}"), $title);?>
        </li>
        <?php endforeach;?>
      </ul>
    </header>
    <table class='table table-hover tablesorter table-fixed' id='userList'>
      <thead>
        <tr class='text-center'>
          <th class='w-60px'><?php echo $lang->user->id;?></th>
          <th class='w-120px'><?php echo $lang->user->realname;?></th>
          <th class='w-100px'><?php echo $lang->user->account;?></th>
          <?php if(commonModel::isAvailable('score')):?>
          <th class='w-70px'><?php echo $lang->user->score;?></th>
          <th class='w-70px'><?php echo $lang->user->rank;?></th>
          <th class='w-70px'><?php echo $lang->user->level;?></th>
          <?php endif;?>
          <th class='text-left'><?php echo $lang->user->company;?></th>
          <th class='w-80px'><?php echo $lang->user->join;?></th>
          <th class='w-70px'><?php echo $lang->user->visits;?></th>
          <th class='w-110px'><?php echo $lang->user->last;?></th>
          <th class='w-100px'><?php echo $lang->user->ip;?></th>
          <?php if($app->clientLang == 'zh-cn' || $app->clientLang == 'zh-tw'):?>
          <th class="text-center actions w-30px"><?php echo $lang->user->review;?></th>
          <th class="text-center actions w-30px"><?php echo $lang->edit;?></th>
          <th class="text-center actions w-30px"><?php echo $lang->delete;?></th>
          <?php else:?>
          <th colspan='3' class="actions w-90px"><?php echo $lang->actions;?></th>
          <?php endif;?>
          <th class="text-center actions w-10px"></th>
        </tr>
      </thead>
      <tbody>
      <?php $forbidPriv = commonModel::hasPriv('user', 'forbid');?>
      <?php if(!empty($users)):?>
      <?php foreach($users as $user):?>
      <tr class='text-center'>
        <td> <?php echo $user->id;?> </td>
        <td>
          <?php echo html::a(helper::createLink('user', 'checkContact', "user=$user->account"), $user->realname, "data-toggle='modal'");?>
          <span class='text-success'>
          <?php if($user->realnameCertified == 'normal') echo "<i class='icon icon-user' title='{$lang->user->realnameCertified}'> </i>";?>
          <?php if($user->companyCertified == 'normal') echo "<i class='icon icon-group' title='{$lang->user->companyCertified}'> </i>";?>
          <?php if(zget($user, 'emailCertified', 0) == 1) echo "<i class='icon icon-envelope'> </i>";?>
          <?php if(zget($user, 'mobileCertified', 0) == 1) echo "<i class='icon icon-mobile' title='{$lang->user->certified}'> </i>";?>
          </span>
        </td>
        <td><?php echo html::a(helper::createLink('user', 'checkContact', "user=$user->account"), $user->account, "data-toggle='modal'");?></td>
        <?php if(commonModel::isAvailable('score')):?>
        <td><?php echo $user->score;?></td>
        <td><?php echo $user->rank;?></td>
        <td><?php echo $user->level;?></td>
        <?php endif;?>
        <td class='text-left'><?php echo $user->company;?></td>
        <td><?php echo substr($user->join, 0, 10);?></td>
        <td><?php echo $user->visits;?></td>
        <td><?php echo date('y-m-d H:i', strtotime($user->last));?></td>
        <td><?php echo $user->ip;?></td>
        <td class='c-actions'>
          <?php commonModel::printLink('user', "checkCertify", "account={$user->account}&type={$type}", "<i class='icon icon-info-sign'></i>", "class='btn btn-icon' data-toggle='modal'");?>
        </td>
        <td class='c-actions'>
          <?php commonModel::printLink('user', 'edit', "account=$user->account", "<i class='icon icon-edit'></i>", "class='btn btn-icon'");?>
        </td>
        <td class='c-actions'>
          <?php commonModel::printLink('user', 'delete', "account=$user->account", "<i class='icon icon-delete'></i>", "class='btn btn-icon'");?>
        </td>
        <td class='c-actions'></td>
      </tr>
      <?php endforeach;?>
      <?php endif;?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan='<?php echo commonModel::isAvailable('score') ? 15 : 11;?>'> <?php $pager->show();?></td>
        </tr>
      </tfoot>
    </table>
  </section>
</div>

<?php include '../../../common/view/footer.admin.html.php';?>
