<?php
/**
 * The certifyuser view file of user module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     user
 * @version     $Id$
 * @link        http://www.zentao.net
 */
?>
<?php include '../../../common/view/header.admin.html.php';?>
<section class='main-table'>
  <header class='clearfix'>
    <ul id='typeNav' class='nav nav-tabs-main pull-left'>
      <?php foreach($lang->user->certifyStatus as $status => $name):?>
      <li data-type='internal' <?php echo $type == $status ? "class='active'" : ''?>>
        <?php echo html::a(inlink('certifyUser', "type=$status"), $name);?>
      </li>
      <?php endforeach?>
    </ul>
  </header>
  <form method='post' id='ajaxSender' action='<?php echo inlink('adminCertify', "action=sendcloud")?>'>
    <table class='table table-hover tablesorter table-fixed'>
      <thead>
        <tr class='text-center'>
          <th class='w-80px'><?php echo $lang->user->realname;?></th>
          <th class='w-100px'><?php echo $lang->user->account;?></th>
          <th class='text-left visible-lg'><?php echo $lang->user->company;?></th>
          <th class='w-90px'><?php echo $lang->user->mobile;?></th>
          <th class='w-90px'><?php echo $lang->user->qq;?></th>
          <th class='w-120px'>SC Password</th>
          <?php if($type != 'wait'):?>
          <th class='w-100px'>SC User</th>
          <th class='w-120px'>SC Key</th>
          <?php endif;?>
          <th class='w-90px'><?php echo $lang->user->status;?></th>
          <th class='w-80px'><?php echo $lang->user->certifyAddedTime;?></th>
          <th class='<?php echo $type != 'wait' ? 'w-80px' : 'w-120px'?>'><?php echo $lang->actions;?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($users as $user):?>
        <tr class='text-center'>
          <td><?php echo html::a(helper::createLink('user', 'checkContact', "user=$user->account"), $user->realname, "data-toggle='modal'");?></td>
          <td><?php echo 'zentao_' . $user->account;?></td>
          <td class='text-left visible-lg' title='<?php echo $user->company?>'><?php echo $user->company;?></td>
          <td title='<?php echo $user->mobile?>'><?php echo $user->mobile;?></td>
          <td title='<?php echo $user->qq?>'><?php echo $user->qq;?></td>
          <td><?php echo $user->sendcloudPwd;?></td>
          <?php if($type != 'wait'):?>
          <td><?php echo html::input("sendcloudUser[$user->account]", $user->sendcloudUser, "class='form-control'")?></td>
          <td><?php echo html::input("sendcloudKey[$user->account]", $user->sendcloudKey, "class='form-control'")?></td>
          <?php endif;?>
          <td><?php echo $lang->user->certifyStatus[$user->certify];?></td>
          <td><?php echo substr($user->addedTime, 5, 11);?></td>
          <td class='operate text-left nofixed'>
            <?php
            if($type == 'wait')
            {
                echo html::a(inlink('adminCertify',"action=pass&account=$user->account"), $lang->user->certifyAction['pass']);
                echo html::a(inlink('adminCertify',"action=fail&account=$user->account"), $lang->user->certifyAction['fail']);
            }
            else
            {
                echo html::a(inlink('adminCertify', "action=fail&account=$user->account"), $lang->delete, "class='deleter'");
            }
            echo html::a(inlink('edit', "account=$user->account"), $lang->edit);
            ?>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
      <tfoot>
        <tr>
        <td colspan='<?php echo $type == 'wait' ? 9 : 11?>'>
          <div class='pull-left'>
            <?php
            if($type != 'wait')  echo html::submitButton();
            ?>
          </div>
          <?php $pager->show();?>
          </td>
        </tr>
      </tfoot>
    </table>
  </form>
</section>
<?php include '../../../common/view/footer.admin.html.php';?>

