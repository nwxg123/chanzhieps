<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.admin.html.php';?>
<?php js::set('licenseApplied', $lang->admin->licenseApplied);?>
<div class='panel'>
  <div class='panel-heading'>
    <ul class='nav nav-dots' id='typeNav'>
      <li data-type='current' class='active'>
        <?php echo html::a('#currentSection', $lang->admin->currentLicense, "data-toggle='tab' class='active'");?>
      </li>
      <?php if(!empty($allLicenses)):?>
      <li data-type='valid'>
        <?php $label = "";?>
        <?php $newLabel = "<strong class='label-badge label label-success'> " . count($validLicenses) . "</strong>"?>
        <?php if($currentLicense->try):?>
        <?php if(!empty($validLicenses)) $label = $newLabel;?>
        <?php elseif($currentLicense->version == 'basic'):?>
        <?php if(!empty($validLicenses['pro']))  $label = $newLabel;?>
        <?php endif;?>
        <?php echo html::a('#validSection', $lang->admin->validLicenses . $label, "data-toggle='tab'");?>
      </li>
      <?php endif;?>
    </ul>
    <div class='panel-actions pull-right'>
      <?php if($currentLicense->version != 'pro' or $currentLicense->try) echo html::a(inlink('uploadLicense'), "<i class='icon icon-download'> </i>" . $lang->admin->uploadLicense, "class='btn btn-success' data-toggle='modal'");?>
      <?php if($currentLicense->try and !isset($validLicenses['basic'])):?>
      <?php if(!isset($waitingLicenses['basic'])) echo html::a(inlink('getLicense'), $lang->admin->applyBasic, "class='btn btn-success' data-toggle='modal'");?>
      <?php if(isset($waitingLicenses['basic']))  echo html::a('javascript:;', $lang->admin->applyBasic, "id='applyedBtn' class='btn btn-success' data-toggle='modal'");?>
      <?php endif;?>
      <?php if(!isset($validLicenses['pro'])):?>
      <?php if($currentLicense->try or $currentLicense->version == 'basic') echo html::a('https://www.chanzhi.org/license-buy--chanzhipro.html', "<i class='icon icon-shopping-cart'> </i>" . $lang->admin->buyPro, "class='btn btn-primary' target='_bank'");?>
      <?php endif;?>
    </div>
    <hr/>
  </div>
  <div class='panel-body tab-content cards' style="height:200px;">
    <section class='tab-pane active' id='currentSection'>
      <div class='card col-md-3'>
       <div class='license-title'>
         <?php if($currentLicense->try):?>
         <?php echo $lang->admin->license->versions['try'];?> 
         <?php else:?>
         <?php echo zget($lang->admin->license->versions, $currentLicense->version, '');?> 
         <?php endif;?>
       </div>
      <table class='table table-form'>
        <tr>
          <td class='text-right w-80px'><?php echo $lang->admin->license->customer;?> </th>
          <td class='text-middle'> 
            <?php $customer = $registerInfo->user->companyCertified == 'success' ? $registerInfo->user->company : $registerInfo->user->realname;?>
            <?php if($currentLicense->company == 'try') $currentLicense->company = $customer;?>
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
    </section>
    <section class='tab-pane' id='validSection'>
      <?php foreach($allLicenses as $license):?>
      <?php $customer = $registerInfo->user->companyCertified == 'success' ? $registerInfo->user->company : $registerInfo->user->realname;?>
        <div class="col-md-3 card">
          <div class='license-title'><?php echo zget($lang->admin->license->versions, $license->type, '');?></div>
            <table class='table table-form'>
              <tr>
                <td class='text-right w-80px'> <?php echo $lang->admin->license->customer;?> </td>
                <td class='text-middle'> <?php echo $license->type == 'basic' ? $customer : $license->customer;?> </td>
              </tr>
              <tr>
                <td class='text-right'> <?php echo $lang->admin->licenseDomain;?> </td>
                <td class='text-middle'> <?php echo $license->domain;?> </td>
              </tr>
              <tr>
                <td class='text-right'> <?php echo $lang->admin->licenseStatus;?> </td>
                <td class='text-middle'> <?php echo zget($lang->admin->license->statusList, $license->status);?> </td>
              </tr>
              <tr>
                <td class='text-right'></td>
                <td class='text-right'> 
                  <?php if($license->status == 'normal') echo html::a(inlink('installLicense', "licenseID=$license->id"), $lang->admin->installLicense, "class='btn btn-success'");?>
                </td>
              </tr>
            </table>
          </div>
       <?php endforeach;?>
    </section>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
