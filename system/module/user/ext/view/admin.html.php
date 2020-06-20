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
<?php include '../../../common/view/header.admin.html.php';?>
<?php js::set('provider', $this->get->provider);?>
<?php js::set('admin', $this->get->admin);?>
<?php $status = $this->get->status ? $this->get->status : 'all';?>
<?php $user   = $this->get->user ? $this->get->user : '';?>
<?php $admin  = $this->get->admin ? $this->get->admin : '';?>
<?php $link   = "user=$user&orderBy=$orderBy&recTotal=&recPerPage=&pageID=&admin=$admin";?>
<section class='main-table'>
  <header class='clearfix'>
    <ul class='nav nav-tabs-main pull-left'>
      <?php foreach($lang->user->stateList as $state => $stateLang):?>
      <?php if($admin && $state != 'admin')  continue;?>
      <li <?php if($state == $status) {echo "class='active'";}?>>
        <?php echo html::a(inlink('admin', $link . "&status=$state&admin=$admin"), sprintf($stateLang, $userStat[$state]));?>
      </li>
      <?php endforeach;?>
    </ul>
    <div class='pull-left btn-toolbar'>
      <div class='space'></div>
      <form method='get' class='input-control search-box has-icon-right' data-ride='searchbox'>
        <?php echo html::hidden('m','user') . html::hidden('f','admin');?>
        <?php echo html::input('user', $user, "class='form-control search-query' placeholder='{$lang->user->inputUserName}'");?>
        <?php echo html::hidden('orderBy', $orderBy);?>
        <?php echo html::hidden('recTotal', isset($this->get->recTotal) ? $this->get->recTotal : 0);?>
        <?php echo html::hidden('recPerPage', isset($this->get->recPerPage) ? $this->get->recPerPage : 20);?>
        <?php echo html::hidden('pageID', isset($this->get->pageID) ? $this->get->pageID :  1);?>
        <?php echo html::hidden('status', $status);?>
        <?php echo html::hidden('admin', $admin);?>
        <button type="submit" class="btn btn-link input-control-icon-right search-submit-btn"><i class="icon icon-search icon-lg"></i></button>
      </form>
    </div>
    <div class='pull-right btn-toolbar'>
    <?php if(!$admin):?>
    <?php commonModel::printLink('user', 'create', '', '<i class="icon icon-plus"></i> ' . $lang->user->create, "class='btn btn-primary' data-toggle='modal'");?>
    <?php endif;?>
    </div>
  </header>
  <form method='post' action='<?php echo inlink('batchdelete', "admin={$this->get->admin}");?>'>
    <table class='table table-hover tablesorter table-fixed' id='userList'>
      <thead>
        <tr class='text-center'>
          <?php $vars = "user={$this->get->user}&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}&status=$status&admin=$admin";?>
          <th class='w-10px first'></th>
          <th class='w-80px'><?php echo commonModel::printOrderLink('id', $orderBy, $vars, $lang->user->id);?></th>
          <th class='w-120px'><?php echo $lang->user->realname;?></th>
          <th class='w-100px'><?php echo $lang->user->account;?></th>
          <th class='w-150px'><?php echo $lang->user->certify;?></th>
          <?php if(commonModel::isAvailable('score')):?>
          <th class='w-100px'><?php echo commonModel::printOrderLink('rank', $orderBy, $vars, $lang->user->rank);?></th>
          <th class='w-100px'><?php echo commonModel::printOrderLink('score', $orderBy, $vars, $lang->user->score);?></th>
          <th class='w-70px'><?php echo $lang->user->level;?></th>
          <?php endif;?>
          <?php if(!$this->get->admin):?>
          <th class='w-60px'><?php echo $lang->user->gender;?></th>
          <th class='text-left visible-lg'><?php echo $lang->user->company;?></th>
          <th class='visible-lg'><?php echo commonModel::printOrderLink('join', $orderBy, $vars, $lang->user->join);?></th>
          <?php endif;?>
          <th class='visible-lg'><?php echo commonModel::printOrderLink('visits', $orderBy, $vars, $lang->user->visits);?></th>
          <th><?php echo commonModel::printOrderLink('last', $orderBy, $vars, $lang->user->last);?></th>
          <th class='visible-lg'><?php echo $lang->user->ip;?></th>
          <th class='w-100px'><?php echo $lang->user->status;?></th>
          <?php if($app->clientLang == 'zh-cn' || $app->clientLang == 'zh-tw'):?>
          <?php if(commonModel::isAvailable('score')):?>
          <th class="text-center actions w-35px"><?php echo $lang->score->common?></th>
          <?php endif;?>
          <th class="text-center actions w-35px"><?php echo $lang->user->forbid?></th>
          <th class="text-center actions w-30px"><?php echo $lang->edit?></th>
          <th class="text-center actions w-30px"><?php echo $lang->delete?></th>
          <?php if(strpos($this->config->shop->payment, 'balance') !== false):?>
          <th class="text-center actions w-30px"><?php echo $lang->user->recharge?></th>
          <?php endif;?>
          <?php else:?>
          <?php $colspan = commonModel::isAvailable('score') ? 4 : '3';?>
          <?php if(strpos($this->config->shop->payment, 'balance') !== false) $colspan ++;?>
          <?php $widthClass = 'w-' . $colspan * 35 . 'px';?>
          <th colspan='<?php echo $colspan;?>' class="actions <?php echo $widthClass;?>"><?php echo $lang->actions;?></th>
          <?php endif;?>
          <th class="text-center actions w-10px"></th>
        </tr>
      </thead>
      <tbody>
      <?php $forbidPriv = commonModel::hasPriv('user', 'forbid');?>
      <?php foreach($users as $user):?>
      <tr class='text-center'>
        <td></td>
        <td>
          <div class="checkbox-primary">
            <input type='checkbox' name='account[]'  value='<?php echo $user->account;?>'/> 
            <label for="account" class="no-margin"><?php echo $user->id;?></label>
          </div>
        </td>
        <td><?php echo html::a(helper::createLink('user', 'checkContact', "user=$user->account"), $user->realname, "data-toggle='modal'");?></td>
        <td><?php echo html::a(helper::createLink('user', 'checkContact', "user=$user->account"), $user->account, "data-toggle='modal'");?></td>
        <td><?php $this->user->showCertifyLabel($user);?></td>
        <?php if(commonModel::isAvailable('score')):?>
        <td><?php echo $user->score;?></td>
        <td><?php echo $user->rank;?></td>
        <td><?php echo $user->level;?></td>
        <?php endif;?>
        <?php if(!$this->get->admin):?>
        <td><?php $gender = $user->gender; echo zget($lang->user->genderList, $gender);?></td>
        <td class='visible-lg'><?php echo $user->company;?></td>
        <td class='visible-lg'><?php echo substr($user->join, 0, 10);?></td>
        <?php endif;?>
        <td class='visible-lg'><?php echo $user->visits;?></td>
        <td><?php if(formatTime($user->last)) echo date('y-m-d H:i', strtotime($user->last));?></td>
        <td class='visible-lg'><?php echo $user->ip;?></td>
        <td>
        <?php if($user->fails > 4 and $user->locked > helper::now()) echo $lang->user->statusList->locked;?>
        <?php if($user->fails <= 4 and $user->locked > helper::now()) echo $lang->user->statusList->forbidden;?>
        <?php if($user->locked <= helper::now()) echo $lang->user->statusList->normal;?>
        </td>
        <?php if(commonModel::isAvailable('score')):?>
        <td class='c-actions operate text-center nofixed'>
          <span class="dropdown">
            <a href='###' class="dropdown-toggle btn btn-icon" data-toggle="dropdown" title='<?php echo $lang->score->common?>'><i class='icon icon-database'></i><span class="caret"></span></a>
            <ul class="dropdown-menu pull-right text-center" role="menu">
              <li><?php commonModel::printLink('user', 'addScore', "account=$user->account", $lang->user->addScore, "data-toggle=modal"); ?></li>
              <li><?php commonModel::printLink('user', 'reduceScore', "account=$user->account", $lang->user->reduceScore, "data-toggle=modal"); ?></li>
              <li><?php commonModel::printLink('user', 'changeLevel', "account=$user->account", $lang->user->changeLevel, "data-toggle=modal"); ?></li>
            </ul>
          </span>
        </td>
        <?php endif;?>
        <?php if($user->locked <= helper::now() and $forbidPriv):?>
        <td class='c-actions operate text-center nofixed'>
          <span class="dropdown">
            <a href='###' class="dropdown-toggle btn btn-icon" data-toggle="dropdown" title='<?php echo $lang->user->forbid;?>'><i class='icon icon-cancel'></i><span class="caret"></span></a>
            <ul class="dropdown-menu pull-right text-left" role="menu">
            <?php foreach($lang->user->forbidDate as $date => $title):?>
              <li><?php echo html::a($this->createLink('user', 'forbid', "userID={$user->id}&date=$date"), $title, "class='forbider'");?></li>
            <?php endforeach;?>
            </ul>
          </span>
        </td>
        <?php endif;?>
        <?php if($user->locked > helper::now()):?>
        <td class='c-actions'>
        <?php commonmodel::printlink('user', 'activate', "id=$user->id", "<i class='icon icon-check'></i>", "title='{$lang->user->activate} 'class='btn btn-icon forbider'");?>
        </td>
        <?php endif;?>
        <td class='c-actions'>
        <?php commonModel::printLink('user', 'edit', "account=$user->account", "<i class='icon icon-edit'></i>", "title='{$lang->edit}' class='btn btn-icon'"); ?>
        </td>
        <td class='c-actions'>
        <?php commonModel::printLink('user', 'delete', "account=$user->account&admin={$this->get->admin}", "<i class='icon icon-delete'></i>","title='{$lang->delete}' class='btn btn-icon'"); ?>
        </td>
        <?php if(strpos($this->config->shop->payment, 'balance') !== false):?>
        <td class='c-actions'>
        <?php commonModel::printLink('user', 'recharge', "account=$user->account", "<i class='icon icon-renminbi'></i>", "title='{$lang->user->recharge}' class='btn btn-icon' data-toggle='modal'");?>
        </td>
        <?php endif;?>
        <td></td>
      </tr>
      <?php endforeach;?>
      </tbody>
    </table>
    <div class='table-footer'>
      <div class='batch pull-left'>
        <div class='btn-group'><?php echo html::selectbutton();?></div>
        <?php echo html::submitbutton($lang->delete, 'btn delete btn-batch');?>
        <?php if($this->get->provider == 'wechat') commonModel::printLink('user', 'pullWechatFans', '', "<i class='icon-refresh '> {$lang->user->pullWechatFans} </i>", "class='btn btn-primary' id='pullBtn'")?>
      </div>
      <?php $pager->show();?>
    </div>
  </form>
<section>
<?php include '../../../common/view/footer.admin.html.php';?>



