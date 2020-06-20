<?php include $app->getModuleRoot() . 'common/view/header.modal.html.php';?>
<?php include $app->getModuleRoot() . 'common/view/chosen.html.php';?>
<form method='post' id='ajaxForm' action="<?php echo inlink('add');?>">
  <table align='center' class='table table-form'>
    <tr>
      <th class='w-100px'><?php echo $lang->gift->product;?></th>
      <td><?php echo html::select('product', $products, '', "class='form-control chosen'");?></td>
      <td class='w-50px'></td>
    </tr>
    <tr>
      <th><?php echo $lang->gift->score;?></th>
      <td><?php echo html::input('score', '', "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->gift->amount;?></th>
      <td><?php echo html::input('amount', '', "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->gift->exchangeLimit;?></th>
      <td><?php echo html::input('exchangeLimit', '', "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->gift->status;?></th>
      <td><?php echo html::select('status', $lang->product->statusList, '', "class='form-control'");?></td>
    </tr>
    <tr>
      <th></th>
      <td><?php echo html::submitButton();?></td>
    </tr>
  </table>
</form>
<?php include $app->getModuleRoot() . 'common/view/footer.modal.html.php';?>
