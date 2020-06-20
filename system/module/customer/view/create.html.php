<?php include '../../common/view/header.modal.html.php';?>
<form method='post' action='<?php echo inlink('create')?>' id='ajaxForm' class='form'>
  <table class='table table-form'>
    <tr>
      <th class='w-80px'><?php echo $lang->user->account;?></th>
      <td>
        <div class='input-group'>
          <?php echo html::select('user', $users, '', "class='form-control hide-create'");?>
          <?php echo html::input('account', '', "class='form-control show-create'")?>
          <div class='input-group-addon'>
            <div class="checkbox-primary">
              <input type='checkbox' id='create' name='create' value='1'><label for="isLink" class="no-margin"> <?php echo $lang->customer->new;?></label>
            </div>
          </div>
        </div>
      </td>
      <td class='w-80px'></td>
    </tr>
    <tr class='tr-create'>
      <th class='w-100px'><?php echo $lang->user->realname;?></th>
      <td>
        <div class='required required-wrapper'></div>
        <?php echo html::input("realname", '', "class='form-control'")?>
      </td>
    </tr>
    <tr class='tr-create'>
      <th><?php echo $lang->user->password;?></th>
      <td>
        <div class='required required-wrapper'></div>
        <?php echo html::password('password1', '', "class='form-control' autocomplete='off'")?>
      </td>
    </tr>  
    <tr class='tr-create'>
      <th><?php echo $lang->user->password2;?></th>
      <td>
        <div class='required required-wrapper'></div>
        <?php echo html::password('password2', '', "class='form-control'");?>
      </td>
    </tr>  
    <tr class='tr-create'>
      <th><?php echo $lang->user->gender;?></th>
      <td><?php echo html::select('gender', $lang->user->genderList, '', "class='select form-control'");?></td>
    </tr>  
    <tr class='tr-create'>
      <th><?php echo $lang->user->email;?></th>
      <td>
        <div class='required required-wrapper'></div>
        <?php echo html::input('email', '', "class='form-control'");?>
      </td>
    </tr>  
    <tr class='tr-create'>
      <th><?php echo $lang->user->mobile;?></th>
      <td><?php echo html::input('mobile', '', "class='form-control'");?></td>
    </tr>  
    <tr class='tr-create'>
      <th><?php echo $lang->user->phone;?></th>
      <td><?php echo html::input('phone', '', "class='form-control'");?></td>
    </tr>  
    <tr class='tr-create'>
      <th><?php echo $lang->user->company;?></th>
      <td><?php echo html::input('company', '', "class='form-control'");?></td>
    </tr>  
    <tr class='tr-create'>
      <th><?php echo $lang->user->address;?></th>
      <td><?php echo html::input('address', '', "class='form-control'");?></td>
    </tr>  
    <tr class='tr-create'>
      <th><?php echo $lang->user->zipcode;?></th>
      <td><?php echo html::input('zipcode', '', "class='form-control'");?></td>
    </tr>  
    <tr class='tr-create'>
      <th><?php echo $lang->user->qq;?></th>
      <td><?php echo html::input('qq', '', "class='form-control'");?></td>
    </tr>  
    <tr class='tr-create'>
      <th><?php echo $lang->user->gtalk;?></th>
      <td><?php echo html::input('gtalk', '', "class='form-control'");?></td>
    </tr>  
    <tr class='tr-create'>
      <th><?php echo $lang->user->wangwang;?></th>
      <td><?php echo html::input('wangwang', '', "class='form-control'");?></td>
    </tr>  
    <tr>
      <th></th>
      <td colspan="2"><?php echo html::submitButton();?></td>
    </tr>
  </table>
</form>        
<?php include '../../common/view/footer.modal.html.php';?>
