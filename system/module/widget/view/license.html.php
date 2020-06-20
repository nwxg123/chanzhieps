<?php if(!defined("RUN_MODE")) die();?>
<?php
$this->app->loadLang('admin');
$currentLicense = commonModel::getLicense();
?>
<style>
.license {height:136px}
.apply {margin-left:10px}
</style>
<div class='license'>
  <div class='license-title'>
    
  </div>
  <table class='table table-form'>
    <tr>
      <td class='text-right w-80px'><?php echo $lang->admin->licenseVersion;?> </th>
      <td class='text-middle'> 
        <?php if($currentLicense->try):?>
        <?php echo $lang->admin->license->versions['try'];?> 
        <?php else:?>
        <?php echo zget($lang->admin->license->versions, $currentLicense->version, '');?> 
        <?php endif;?>
        <?php if($currentLicense->version != 'pro'  || $currentLicense->try):?>
        <?php echo html::a(helper::createLink('admin', 'license', "type=message"), $lang->admin->apply, "class='apply'");?>
        <?php endif;?>
      </td>
    </tr>
    <tr>
      <td class='text-right w-80px'><?php echo $lang->admin->license->customer;?> </th>
      <td class='text-middle'> 
        <?php echo ($currentLicense->try) ? $lang->admin->license->tryUser : $currentLicense->company;?> 
      </td>
    </tr>
    <tr>
      <th class='text-right'><?php echo $lang->admin->licenseDomain;?> </th>
      <td class='text-middle'>
      <?php echo $currentLicense->domain ? $currentLicense->domain : $lang->admin->license->tryDomain;?>
      </td>
    </tr>
    <tr>
      <th class='text-right'><?php echo $lang->admin->licesenEndDate;?> </th>
      <td class="text-middle <?php if($currentLicense->expired) echo 'text-danger';?>">
         <?php echo ($currentLicense->endDate == 'all life') ? $lang->lifetime : $currentLicense->endDate?>
      </td>
    </tr>
    <?php if($currentLicense->version == 'basic'):?>
    <tr> <th></th> </tr>
    <?php endif;?>
  </table>
</div>
