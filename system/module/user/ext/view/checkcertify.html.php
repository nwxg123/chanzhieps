<?php 
/**
 * The view view of order module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     order 
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../../common/view/header.modal.html.php';?>
<table class='table table-form'>
  <?php if($type == 'realname'):?>
  <tr>
    <th class='w-80px'><?php echo $lang->user->realname;?></th>
    <td><?php echo $user->realname?></td>
  </tr>
  <tr>
    <th><?php echo $lang->user->idcard;?></th>
    <td><?php echo $user->idcard;?></td>
  </tr>
  <tr>
    <th><?php echo $lang->user->idcardImage;?></th>
    <td>
      <div class='card'><?php if(!empty($idcard)) echo html::image($this->loadModel('file')->printFileURL($idcard), "height='150'");?></div>
    </td>
  </tr>
  <?php else:?>
  <tr>
    <th class='w-80px'><?php echo $lang->user->company;?></th>
    <td><?php echo html::input('company', $user->company, "class='form-control'");?></td>
  </tr>
  <tr>
    <th><?php echo $lang->user->companySN;?></th>
    <td><?php echo html::input('companySN', $user->companySN, "class='form-control'");?></td>
  </tr>
  <tr>
    <th><?php echo $lang->user->businessLicense;?></th>
    <td>
      <div class='card'><?php if(!empty($license)) echo html::image($this->loadModel('file')->printFileURL($license));?></div>
    </td>
  </tr>
  <?php endif;?>
  <tr>
    <th></th>
    <td>
     <?php $disabled = zget($user, $type . 'Certified') == 'normal' ? "disabled" : '';?>
     <?php echo html::a(inlink('checkcertify', "account={$user->account}&type={$type}&status=normal"), $lang->user->certifyAction['pass'], "{$disabled} class='btn btn-primary btn-review'");?>
     <?php $disabled = zget($user, $type . 'Certified') == 'fail' ? "disabled" : '';?>
     <?php echo html::a(inlink('checkcertify', "account={$user->account}&type={$type}&status=fail"), $lang->user->certifyAction['fail'], "{$disabled} class='btn btn-default btn-review'");?>
    </td>
  </tr>
</table>
<?php include '../../../common/view/footer.modal.html.php';?>
