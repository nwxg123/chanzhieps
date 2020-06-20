<style>.button-c {padding:1px}</style>
{if($fieldset == 'true')}
<fieldset>
  <legend>{$lang->file->common}</legend>
{/if}
  <div>
  {if($files)}
    {!echo $lang->request->file. ":"}
    {foreach($files as $file)}
      {if(commonModel::hasPriv('file' , 'download'))}
        {$mouse = $file->isImage ? 'left' : ''}
        {!html::a($control->createLink('file', 'download', "fileID=$file->id&mouse=$mouse"), $file->title .'.' . $file->extension, "target='_blank'")}
      {/if}
      {if(RUN_MODE == 'admin' or $control->app->user->account == $file->addedBy)}
        {!html::a(helper::createLink('file', 'delete', "id={{$file->id}}"), "<i class='icon icon-remove'> </i>", "class='btn btn-xs deleter'")}
      {/if}
    {/foreach}
  {/if}
  </div>
{if($fieldset == 'true')} </fieldset> {/if}
