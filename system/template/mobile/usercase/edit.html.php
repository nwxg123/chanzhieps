{*php
/**
 * The create view file of usercase module of ZenTaoCMS.
 *
 * @copyright   Copyright 2009-2010 QingDao Nature Easy Soft Network Technology Co,LTD (www.cnezsoft.com)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     usercase
 * @version     $Id$
 * @link        http://www.zsite.com
 */
/php*}
<div class='modal-dialog'>
  <div class='modal-content'>
    <div class='modal-header'>
      <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>×</span></button>
      <h5 class='modal-title'><i class='icon-edit'></i> {$lang->usercase->edit}</h5>
    </div>
    <div class='modal-body'>
      <form id='editForm' method='post' action="{!inlink('edit', "caseID={{$case->id}}")}">
        <div class='form-group'>
          <label for='site' class='control-label'>{$lang->usercase->site}</label>
          {!html::input('site', $case->site, "class='form-control'")}
        </div>
        <div class='form-group'>
          <label for='name' class='control-label'>{$lang->usercase->name}</label>
          {!html::input('name', $case->name, "class='form-control'")}
        </div>
        <div class='form-group'>
          <label for='company' class='control-label'>{$lang->usercase->company}</label>
          {!html::input('company', $case->company, "class='form-control'")}
        </div>
        <div class='form-group'>
          <label for='industry' class='control-label'>{$lang->usercase->industry}</label>
          {!html::select('industry', $industries, $case->industry, "class='form-control'")}</td>
        </div>
        <div class='form-group'>
          <label for='area' class='control-label'>{$lang->usercase->area}</label>
          {!html::select('area', $lang->usercase->areas, $case->area, "class='form-control'")}</td>
        </div>
        <div class='form-group'>
          <label for='keywords' class='control-label'>{$lang->usercase->keywords}</label>
          {!html::input('keywords', $case->keywords, "class='form-control' placeholder='{{$lang->keywordsHolder}}'")}
        </div>
        <div class='form-group'>
          <label for='desc' class='control-label'>{$lang->usercase->desc}</label>
          {!html::textarea('desc', $case->desc, "rows='2' class='form-control'")}
        </div>
        <div class='form-group'>
          {!html::submitButton('', 'btn primary block')}
        </div>
      </form>
    </div>
  </div>
</div>
{noparse}
<style>
.form-group > .form-control + .form-control {margin-top: 5px}
</style>
<script>
$(function()
{
    var $editForm = $('#editForm');
    $editForm.ajaxform({onSuccess: function(response)
    {
        if(response.result == 'success')
        {
            $.closeModal();
        }
    }
    });
});
</script>
{/noparse}
