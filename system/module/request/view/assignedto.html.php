<?php include '../../common/view/header.modal.html.php';?>
<form action="<?php echo inlink('assignedTo', "requestID={$request->id}");?>" method='post' id='ajaxForm'>
  <table class='table table-form w-p100'>
    <tr>
      <th class='w-60px'><?php echo $lang->request->assignedTo;?></th>
      <td><?php echo html::select('assignedTo', $users, $request->assignedTo, 'class="form-control"')?></td>
    <td><?php echo html::submitButton();?></td></tr>
  </table>
</form>
<?php include '../../common/view/footer.modal.html.php';?>
