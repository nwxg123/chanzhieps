{include TPL_ROOT . 'common/header.modal.html.php'}
{include TPL_ROOT . 'common/kindeditor.html.php'}
<form action="{!inlink('valuate', "requestID={{$request->id}}")}" method='post' id='ajaxForm'>
  <table class='table table-form'>
    <tr><td>{!html::radio('valuate', $lang->request->valuates, '')}</td></tr>
    <tr><td>{!html::textarea('comment', '', 'class="form-control" rows=5')}</td> </tr>
    <tr><td>{!html::submitButton($lang->request->valuate)}</td></tr>
  </table>
</form>
{include TPL_ROOT . 'common/footer.modal.html.php'}
