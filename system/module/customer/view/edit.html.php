<?php if(isset($pass) and !$pass):?>
<?php 
$url    = helper::safe64Encode($this->app->getURI());
$target = 'self';
include '../../guarder/view/validate.html.php';
?>
<?php else:?>
<?php include '../../common/view/header.admin.html.php';?>
<?php js::import($jsRoot . 'fingerprint/fingerprint.js');?>
<section class='main-table'>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' class='form'>
      <table class='table table-form'>
        <tr>
          <th class='w-100px'><?php echo $lang->user->realname;?></th>
          <td class='w-p60'>
            <div class='required required-wrapper'></div>
            <?php echo html::input('realname', $user->realname, "class='form-control'")?>
          </td>
          <td></td>
        </tr>
        <tr>
          <th><?php echo $lang->customer->isCustomer;?></th>
          <td><?php echo html::radio('isCustomer', $lang->customer->customerOptions, $user->isCustomer, "class='checkbox'")?></td><td></td>
        </tr>  
        <?php $class = $user->admin == 'common' ? '' : 'hide';?>
        <tr class="groups <?php echo $class;?>">
          <th><?php echo $lang->user->privilege;?></th>
          <td><?php echo html::checkbox('groups', $groups, implode(',', $user->groups));?></td>
        </tr>
        <tr>
          <th><?php echo $lang->user->email;?></th>
          <td>
            <div class='required required-wrapper'></div>
            <?php echo html::input('email', $user->email, "class='form-control'");?>
          </td><td></td>
        </tr>  
        <tr>
          <th><?php echo $lang->user->password;?></th>
          <td><?php echo html::password('password1', '', "class='form-control' autocomplete='off'")?></td><td><span class='text-info'><?php echo $lang->user->control->lblPassword; ?></span></td>
        </tr>  
        <tr>
          <th><?php echo $lang->user->password2;?></th>
          <td><?php echo html::password('password2', '', "class='form-control'");?></td><td></td>
        </tr>  
        <tr>
          <th><?php echo $lang->user->company;?></th>
          <td><?php echo html::input('company', $user->company, "class='form-control'");?></td><td></td>
        </tr>  
        <tr>
          <th><?php echo $lang->user->address;?></th>
          <td><?php echo html::input('address', $user->address, "class='form-control'");?></td>
        </tr>  
        <tr>
          <th><?php echo $lang->user->zipcode;?></th>
          <td><?php echo html::input('zipcode', $user->zipcode, "class='form-control'");?></td><td></td>
        </tr>  
        <tr>
          <th><?php echo $lang->user->mobile;?></th>
          <td>
            <div class='required required-wrapper'></div>
            <?php echo html::input('mobile', $user->mobile, "class='form-control'");?>
          </td><td></td>
        </tr>  
        <tr>
          <th><?php echo $lang->user->phone;?></th>
          <td><?php echo html::input('phone', $user->phone, "class='form-control'");?></td><td></td>
        </tr>  
        <tr>
          <th><?php echo $lang->user->qq;?></th>
          <td><?php echo html::input('qq', $user->qq, "class='form-control'");?></td><td></td>
        </tr>  
        <tr>
          <th><?php echo $lang->user->gtalk;?></th>
          <td><?php echo html::input('gtalk', $user->gtalk, "class='form-control'");?></td><td></td>
        </tr>  
        <tr>
          <th><?php echo html::a($this->createLink('guarder', 'validate'), $lang->save, "data-toggle='modal' class='hidden captchaModal'")?></th>
          <td colspan="2"><?php echo html::hidden('token', $token) . html::submitButton() . html::backButton();?></td>
        </tr>
      </table>
    </form>        
  </div>
</section>
<?php include '../../common/view/footer.admin.html.php';?>
<?php endif;?>
