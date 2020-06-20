<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.modal.html.php';?>
<table class='table table-form'>
  <tr>
    <th class='text-right'> <?php echo $lang->admin->licenseDomain;?> </th>
    <td class='text-middle'> <?php echo $license->domain;?> </td>
  </tr>
  <tr>
    <th class='text-right'> <?php echo $lang->admin->license->type;?> </th>
    <td class='text-middle'> <?php echo $lang->admin->license->identityList[$license->type];?> </td>
  </tr>
  <tr>
    <th class='text-right'> <?php echo $lang->admin->licenseStatus;?> </th>
    <td class='text-middle'> 
      <?php if($license->type == 'chanzhipro' && $license->status == 'wait')   $license->status = 'notpaid';?>
      <?php if($license->type == 'chanzhipro' && $license->status == 'normal') $license->status = 'paid';?>
      <?php echo $lang->admin->license->statusList[$license->status];?> 
      <?php if($license->status == 'normal' || $license->status == 'paid') echo html::a(inlink('installLicense', "licenseID=$license->id"), $lang->admin->install, "class='btn btn-sm'");?>
    </td>
  </tr>
  <?php if($license->status == 'reject'):?>
  <tr>
    <th class='text-right'> <?php echo $lang->admin->license->reason;?> </th>
    <td class='text-middle'> <?php echo $license->reason;?> </td>
  </tr>
  <?php endif;?>
</table>
<?php include '../../common/view/footer.modal.html.php';?>
