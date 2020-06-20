<div class='modal-dialog'>
  <div class='modal-content'>
    <div class='modal-header'>
      <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>×</span></button>
      <h5 class='modal-title'><i class='icon-pencil'></i> {$lang->request->valuate}</h5>
    </div>
    <div class='modal-body'>
      <form method='post' id='valuateForm' action="{!inlink('valuate', "requestID={{$request->id}}")}">
        <div class='form-group pad-lable-left'>
          {!html::select('valuate', $lang->request->valuates, 'good', "class='form-control'")}
        </div>
        <div class='form-group pad-lable-left'>
          {!html::input('comment', '', "class='form-control' placeholder='{{$lang->request->valuatePlaceholder}}'")}
        </div>
        <div class='form-group form-group-actions'>
          {!html::submitButton('', 'btn block primary')}
        </div>
      </form>
    </div>
  </div>
</div>
{noparse}
<script>
$(function()
{
    var $valuateForm = $('#valuateForm');
    $valuateForm.ajaxform({onSuccess: function(response)
    {
        if(response.result == 'success')
        {
            $.closeModal();
        }
    } });
});
</script>
{/noparse}
