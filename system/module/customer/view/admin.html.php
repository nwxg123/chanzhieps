<?php
/**
 * The admin view file of user module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件非免费软件
 * @author      Yangyang Shi <shiyangyangwork@yahoo.cn>
 * @package     User
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php
include '../../common/view/header.admin.html.php';
js::set('provider', $this->get->provider);
js::set('admin', $this->get->admin);
?>
<section class='main-table'>
  <header class='clearfix'>
    <ul class='nav nav-tabs-main pull-left'>
      <li class='active'>
        <?php echo html::a(inlink('admin'), $lang->customer->admin);?>
      </li>
    </ul>
    <div class='pull-right btn-toolbar'>
      <form method='get' class='input-control search-box has-icon-right' data-ride='searchbox'>
        <?php echo html::hidden('m','customer');?>
        <?php echo html::hidden('f', 'admin');?>
        <?php echo html::input('user', $this->get->user, "class='form-control search-query' placeholder='{$lang->user->inputUserName}'"); ?>
        <button type="submit" class="btn btn-link input-control-icon-right search-submit-btn"><i class="icon icon-search icon-lg"></i></button>
      </form>
      <div class='space'></div>
      <?php echo html::a(inlink('create'), "<i class='icon icon-plus'></i> " .  $lang->customer->create, "data-toggle='modal' class='btn btn-primary'");?>
    </div>
  </header>
  <table class='table table-hover tablesorter table-fixed' id='userList'>
    <thead>
      <?php $vars = "orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}";?>
      <tr class='text-center'>
        <th class='w-60px'><?php commonModel::printOrderLink('id', $orderBy, $vars, $lang->user->id);?></th>
        <th class='w-100px'><?php commonModel::printOrderLink('realname', $orderBy, $vars, $lang->user->realname);?></th>
        <th class='w-100px'><?php commonModel::printOrderLink('account', $orderBy, $vars, $lang->user->account);?></th>
        <th class='w-100px'><?php echo $lang->user->phone;?></th>
        <th class='w-100px'><?php echo $lang->user->mobile;?></th>
        <th class='w-140px'><?php echo $lang->user->email;?></th>
        <th class='text-left'><?php echo $lang->customer->latestOrder;?></th>
        <th class="actions w-40px"><?php echo $lang->edit;?></th>
        <th class="actions w-50px"><?php echo $lang->customer->manageService;?></th>
        <th class="actions w-10px"></th>
      </tr>
    </thead>
    <tbody>
      <?php $forbidPriv = commonModel::hasPriv('user', 'forbid');?>
      <?php foreach($users as $user):?>
      <tr class='text-center'>
        <td> <?php echo $user->id;?> </td>
        <td><?php echo $user->realname;?></td>
        <td><?php echo $user->account;?></td>
        <td><?php echo $user->phone;?></td>
        <td><?php echo $user->mobile;?></td>
        <td><?php echo $user->email;?></td>
        <td class='text-left'>
          <?php if(!empty($user->orders)):?>
          <?php $order = current((array) $user->orders);?>
          <?php foreach($order->products as $product):?>
          <div class='text-left'>
            <span><?php echo html::a(helper::createLink('order', 'view', "id={$order->id}"), $product->productName, "class='product' data-toggle='modal'");?></span>
            <span><?php echo $lang->order->price . $lang->colon . $product->price . ' ' . $lang->order->count . $lang->colon . $product->count;?></span>
          </div>
          <?php endforeach;?>
          <?php endif;?>
        </td>
        <td class='c-actions'>
          <?php commonModel::printLink('customer', 'edit', "account=$user->account", "<i class='icon icon-edit'></i>", "class='btn btn-icon'"); ?>
        </td>
        <td class='c-actions'>
          <?php commonModel::printLink('customer', 'service', "account=$user->account", "<i class='icon icon-clock-o'></i>", "data-toggle='modal' class='btn btn-icon'"); ?>
        </td>
        <td class='c-actions'></td>
      </tr>
      <?php endforeach;?>
    </tbody>
    <tfoot>
      <tr><td colspan='10'> <?php $pager->show();?> </td></tr>
    </tfoot>
  </table>
</section>
<?php include '../../common/view/footer.admin.html.php';?>
