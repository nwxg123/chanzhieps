<style>.button-c {padding:1px}</style>
<?php if($fieldset == 'true'):?>
<fieldset>
  <legend><?php echo $lang->file->common;?></legend>
<?php endif;?>
  <div>
  <?php
  if($files)
  {
      echo $lang->request->file. ":";
      foreach($files as $file)
      {
          if(commonModel::hasPriv('file' , 'download'))
          {
              $mouse = $file->isImage ? 'left' : '';
              echo html::a($this->createLink('file', 'download', "fileID=$file->id&mouse=$mouse"), $file->title .'.' . $file->extension, "target='_blank'");
          }
          if(RUN_MODE == 'admin' or $this->app->user->account == $file->addedBy) echo html::a(helper::createLink('file', 'delete', "id={$file->id}"), "<i class='icon icon-remove'> </i>", "class='btn btn-xs deleter'");
      }
  }
  ?>
  </div>
<?php if($fieldset == 'true') echo '</fieldset>';?>
