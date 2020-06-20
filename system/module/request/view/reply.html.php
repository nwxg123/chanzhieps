<?php include '../../common/view/header.modal.html.php';?>
<?php include '../../common/view/kindeditor.html.php';?>
<?php js::set('answers', $faqAnswers);?>
<form action="<?php echo inlink('reply', "requestID={$request->id}");?>" method='post' id='ajaxForm'>
  <table class='table table-form'>
    <tr>
      <th class='w-100px'><?php echo $lang->request->selectFAQ;?></th>
      <td><?php echo html::select('faq', $faqOptions, '', 'class="form-control"')?></td>
    </tr>
    <tr>
      <th><?php echo $lang->request->reply;?></th>
      <td><?php echo html::textarea('reply', '', 'class="form-control" rows=5')?></td>
    </tr>
    <tr><th></th><td><?php echo html::submitButton();?></td></tr>
  </table>
</form>
<?php include '../../common/view/footer.modal.html.php';?>
