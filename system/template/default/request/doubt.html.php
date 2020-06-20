{include TPL_ROOT . 'common/header.modal.html.php'}
{include TPL_ROOT . 'common/kindeditor.html.php'}
<form action="{!inlink('doubt', "requestID={{$request->id}}")}" method='post' id='ajaxForm'>
  <table class='table table-form w-p100'>
    <tr><td>{!html::textarea('comment', '', 'class="form-control" rows=5')}</td> </tr>
    <tr><td>{!html::submitButton($lang->request->doubt)}</td></tr>
  </table>
</form>
{include TPL_ROOT . 'common/footer.modal.html.php'}
