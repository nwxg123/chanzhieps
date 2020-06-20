<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.admin.html.php';?>
<?php $type = $this->get->type ? $this->get->type : 'valid';?>
<section class='main-table'>
  <header class='clearfix'>
    <ul class='nav nav-tabs-main pull-left'>
      <li <?php if($type == 'valid') {echo "class='active'";}?>>
        <?php echo html::a(inlink('admin', "type=valid"), $lang->file->fileList);?>
      </li>
      <li <?php if($type == 'invalid') {echo "class='active'";}?>>
        <?php echo html::a(inlink('admin', "type=invalid"), $lang->file->invalidFile);?>
      </li>
    </ul>
    <div class='pull-right btn-toolbar'>
    <div class='space'></div>
    <?php if($type == 'invalid'):?>
      <?php echo html::a(inlink('deleteAllInvalid'), $lang->file->clearAllInvalid, "class='btn btn-primary deleter'");?>
    <?php endif;?>
    </div>
  </header>
  <?php if($type == 'valid'):?>
  <form method='post' id='ajaxForm' action='<?php echo inlink('batchdelete');?>'>
    <table class='table table-hover tablesorter table-fixed' id='fileList'>
      <thead>
        <tr class='text-center'>
          <th class='w-10px first'></th>
          <th class='w-80px'><?php echo $lang->file->id;?></th>
          <th class='w-300px'><?php echo $lang->file->source;?></th>
          <th><?php echo $lang->file->sourceURI;?></th>
          <th class='w-60px'><?php echo $lang->file->extension;?></th>
          <th class='w-80px'><?php echo $lang->file->size;?></th>
          <th class='w-100px'><?php echo $lang->file->addedBy;?></th>
          <th class='w-160px'><?php echo $lang->file->addedDate;?></th>
          <th class="text-center actions w-30px"><?php echo $lang->edit?></th>
          <th class="text-center actions w-40px"><?php echo $lang->delete?></th>
          <th class="text-center actions w-10px"></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($files as $file):?>
          <tr class='text-center text-middle'>
            <td></td>
            <td>
              <div class="checkbox-primary">
              <input type='checkbox' name='fileList[]'  value='<?php echo $file->id;?>'/>
              <label for="fileList" class="no-margin"><?php echo $file->id;?></label>
              </div>
            </td>
            <td class='text-center'>
              <?php if($file->isImage and $file->existStatus == 'yes'):?>
                <div class='file-image'>
                <?php echo html::a(helper::createLink('file', 'download', "fileID=$file->id"), html::image($this->file->printFileURL($file), "class='image-small'"), "target='_blank' data-toggle='lightbox'");?>
                </div>
              <?php else:?>
                <?php echo html::a(inlink('download', "id=$file->id"), $file->title, "target='_blank'");?>
              <?php endif;?>
              </div>
            </td>
            <td class='text-center 
              <?php 
                if(isset($file->existStatus)) 
                {
                  echo $file->existStatus == 'no' ? 'red' : ''; 
                }
              ?>'>
              <?php echo $file->pathname;?>
            </td>
            <td><?php echo $file->extension;?></td>
            <td><?php echo number_format($file->size / 1024 , 1) . 'K';?></td>
            <td class='text-ellipsis' title='<?php echo isset($file->addedBy) ? $file->addedBy : '';?>'><?php echo isset($file->addedBy) ? $file->addedBy : '';?></td>
            <td><?php echo $file->addedDate;?></td>
            <td class='c-actions'>
              <?php commonModel::printLink('file', 'edit',   "fileID=$file->id", "<i class='icon icon-edit'></i>", "title='{$lang->edit}' data-toggle='modal' class='btn btn-icon'");?>
            </td>
            <td class='c-actions'>
              <?php commonModel::printLink('file', 'delete', "fileID=$file->id", "<i class='icon icon-delete'></i>", "title='{$lang->delete}' class='btn btn-icon deleter'");?>
            </td>
            <td class='c-actions'></td>
          </tr>
        <?php endforeach;?>
      </tbody>
    </table>
    <div class='table-footer'>
      <div class='batch pull-left'>
        <div class='btn-group'><?php echo html::selectButton();?></div>
        <?php echo html::submitButton($lang->delete, 'btn delete btn-batch');?>
        <?php echo $lang->file->fileTip;?>
      </div>
      <?php $pager->show();?>
    </div>
  </form>
  <?php else:?>
  <form method='post' id='ajaxForm' action='<?php echo inlink('batchdeleteinvalid');?>'>
    <table class='table table-hover tablesorter table-fixed' id='fileList'>
      <thead>
        <tr class='text-center'>
          <th class='w-10px first'></th>
          <th class='w-60px'></th>
          <th class='text-left'><?php echo $lang->file->common;?></th>
          <th class='w-100px'><?php echo $lang->file->extension;?></th>
          <th class='w-100px'><?php echo $lang->file->size;?></th>
          <th class='w-160px'><?php echo $lang->file->addedDate;?></th>
          <th class="text-center actions w-40px"><?php echo $lang->delete?></th>
          <th class="text-center actions w-10px"></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($files as $file):?>
          <tr class='text-center text-middle'>
            <td></td>
            <td>
              <div class="checkbox-primary">
                <input type='checkbox' name='fileList[]'  value='<?php echo $file->pathname;?>'/>
                <label for="fileList" class="no-margin"></label>
              </div>
            </td>
            <td class='text-left'><?php echo $file->pathname;?></td>
            <td><?php echo $file->extension;?></td>
            <td><?php echo number_format($file->size / 1024 , 1) . 'K';?></td>
            <td><?php echo $file->addedDate;?></td>
            <td class='c-actions'>
              <?php 
                $pathname = urlencode($file->pathname);
                commonModel::printLink('file', 'deleteInvalidFile', "pathname=" . $pathname, "<i class='icon icon-delete'></i>", "title='{$lang->delete}' class='btn btn-icon deleter'");
              ?>
            </td>
            <td class='c-actions'></td>
          </tr>
        <?php endforeach;?>
      </tbody>
    </table>
    <div class='table-footer'>
      <div class='batch pull-left'>
        <div class='btn-group'><?php echo html::selectButton();?></div>
        <?php echo html::submitButton($lang->delete, 'btn delete btn-batch');?>
        <?php echo $lang->file->fileTip;?>
      </div>
      <?php $pager->show();?>
    </div>
  </form>
  <?php endif;?>
</section>
<?php include '../../common/view/footer.admin.html.php';?>
