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
      <h5 class='modal-title'><i class='icon-plus'></i> {$lang->usercase->create}</h5>
    </div>
    <div class='modal-body'>
      <form id='createForm' method='post' action="{!inlink('create')}">
        <div class='form-group'>
          <label for='site' class='control-label'>{$lang->usercase->site}</label>
          {!html::input('site', $siteUrl, "class='form-control'")}
        </div>
        <div class='form-group'>
          {!html::a('javascript:;', $lang->usercase->post, "id='postBtn' class='btn primary block'")}
        </div>
        <div id='hideItems' class='hide'>
          <div class='form-group'>
            <label for='name' class='control-label'>{$lang->usercase->name}</label>
            {!html::input('name', '', "class='form-control'")}
          </div>
          <div class='form-group'>
            <label for='company' class='control-label'>{$lang->usercase->company}</label>
            {!html::input('company', '', "class='form-control'")}
          </div>
          <div class='form-group'>
            <label for='industry' class='control-label'>{$lang->usercase->industry}</label>
            {!html::select('industry', $industries, '', "class='form-control'")}</td>
          </div>
          <div class='form-group'>
            <label for='area' class='control-label'>{$lang->usercase->area}</label>
            {!html::select('area', $lang->usercase->areas, '', "class='form-control'")}</td>
          </div>
          <div class='form-group'>
            <label for='keywords' class='control-label'>{$lang->usercase->keywords}</label>
            {!html::input('keywords', '', "class='form-control' placeholder='{{$lang->keywordsHolder}}'")}
          </div>
          <div class='form-group'>
            <label for='desc' class='control-label'>{$lang->usercase->desc}</label>
            {!html::textarea('desc', '', "rows='2' class='form-control'")}
          </div>
          <div class='form-group'>
            {!html::submitButton('', 'btn primary block')}
          </div>
          <div class='form-group text-red'>{$lang->usercase->lblContent}</div>
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
    if($('#hideItems').css('display') == 'none')
    {
        $(document).keydown(function(event)
        {
            if(event.keyCode == 13) return false; 
        });
    }

    $('#postBtn').click(function()
    {
        text = $('#postBtn').text();
        $('#postBtn').text(v.lang.loading);
        url = createLink('usercase', 'getSiteInfo');
        $.post( url, 
            {url:$('#site').val()},
            function(response)
            {
                $('#postBtn').hide();
                if(response.result == 'success')
                {
                    $('#hideItems').show();
                    $.each(response.site, function(item, value)
                    {
                        $('#' + item).val(value);
                    })
                    keEditor.html(response.site.desc);
                }
                else
                {
                    alert(response.message);
                }
            },
            'json'
        );
    });

    var $createForm = $('#createForm');
    $createForm.ajaxform({onSuccess: function(response)
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
