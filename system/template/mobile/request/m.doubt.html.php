{noparse}
<style>
.modal-body {padding-left: 0; padding-right: 0}
.modal-body > hr {display: none}
.doubt-wrapper .panel-body {padding: 0; background-color: #ffffff}
</style>
{/noparse}
<div class='panel panel-section doubt-wrapper'>
  <div class='panel-body'>
    <form method='post' id='doubtForm' action="{!inlink('doubt', "requestID={{$request->id}}")}">
      <div class='form-group required'>
        {!html::textarea('content', '', "class='form-control' rows='3' required")}
      </div>
      <div class='form-group'>
        {!html::submitButton('', 'btn block primary')}&nbsp;
      </div>
    </form>
  </div>
</div>
{noparse}
<script>
$(function()
{
    var $doubtForm = $('#doubtForm');
    $doubtForm.ajaxform({onSuccess: function(response)
    {
        if(response.result == 'success')
        {
            $.closeModal();
        }
    } });
});
</script>
{/noparse}
{include TPL_ROOT . 'common/form.html.php'}
