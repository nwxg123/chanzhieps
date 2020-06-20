<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.admin.html.php';?>
<?php js::import($jsRoot . 'clipboard/clipboard.min.js');?>
<?php js::set('copySuccess', $lang->file->copySuccess);?>
<?php $searchWord      = $this->get->searchWord ? $this->get->searchWord : '';?>
<div class='panel'>
  <div class='panel-heading'>
    <?php $template = $this->config->template->{$this->app->clientDevice}->name;?>
    <?php $theme    = $this->config->template->{$this->app->clientDevice}->theme;?>
    <div class="left">
      <?php echo html::a('javascript:;', $lang->file->batchSelect, "class='btn batch-select'")?>
      <?php echo html::a('javascript:void(0)', $lang->cancel, 'class="btn cancel-batch-select hide"')?>
      <?php echo html::a('javascript:void(0)', $lang->delete, "class='btn image-view-batch-delete-btn hide'")?>
      <?php echo html::a('javascript:void(0)', "<i class='icon icon-apps'></i>", "class='image-view'")?>
      <?php echo html::a('javascript:void(-1)', "<i class='icon icon-list-bold'></i>", "class='list-view'")?>
    </div>
    <div class="right">
      <?php commonModel::printLink('file', 'browse', "objectType=source&objectID={$template}_{$theme}", '<i class="icon icon-upload-cloud"></i>' . $lang->file->uploadSource, "data-toggle='modal' class='btn'");?>
      <form method='get' class='input-control search-box has-icon-right' data-ride='searchbox'>
        <?php echo html::hidden('m', 'file');?>
        <?php echo html::hidden('f', 'browsesource');?>
        <?php echo html::hidden('type', '');?>
        <?php echo html::hidden('orderBy', '');?>
        <?php echo html::hidden('pageID', 1);?>
        <?php echo html::input('searchWord', $searchWord, "class='form-control search-query' placeholder='{$lang->searchPlaceholder}'");?>
        <button type="submit" class="btn btn-link input-control-icon-right search-submit-btn"><i class="icon icon-search icon-lg"></i></button>
      </form>
    </div>
  </div>
  <form id='imageViewForm' action='<?php echo $this->createLink('file', 'batchDelete');?>' method='post' class='deleteForm'>
    <div id='imageView' class='panel-body'>
      <ul class='files-list clearfix'>
      <?php foreach($files as $file):?>
          <?php
          $imageHtml = '';
          $fileHtml  = '';
          $fullURL   = html::input('', $file->fullURL, "size='" . strlen($file->fullURL) . "' style='border:none; background:none;' onmouseover='this.select()'");
          $imagePath = $this->file->printFileURL($file);
          if($file->isImage)
          {
              $imageHtml .= "<li class='col-lg-2 col-md-3 col-sm-6 file-image file-{$file->extension}'>";
              $imageHtml .= "<div class='image-wrapper'>";
              $imageHtml .= html::a(helper::createLink('file', 'download', "fileID=$file->id&mose=left"), html::image($imagePath), "target='_blank' data-toggle='lightbox'");
              $imageHtml .= "<div class='file-source'><div class='input-group'>";
              $imageHtml .= "<span class='input-group-select checkboxBox hide'>" . html::checkbox('fileList', array($file->id => '')) . "</span>";
              $imageHtml .= "<input readonly id='fullURL{$file->id}' type='text' value='{$imagePath}' class='form-control file-url'/><span class='input-copy-btn'><button type='button' class='btn btn-sm copyBtn' data-clipboard-target='#fullURL{$file->id}'>{$lang->copy}</button></span></div></div>";
              $imageHtml .= "<div class='file-actions'>";
              $imageHtml .= html::a(helper::createLink('file', 'editsource', "id=$file->id"), "<i class='icon icon-pencil'></i>", "data-toggle='modal' data-title='{$lang->file->editSource}'");
              $imageHtml .= html::a(helper::createLink('file', 'deletesource', "id=$file->id"), "<i class='icon icon-delete'></i>", "class='deleter'");
              $imageHtml .= '</div>';
              $imageHtml .= '</div>';
              $imageHtml .= '</li>';
          }
          else
          {
              $file->title = $file->title . ".$file->extension";
              $fileHtml .= "<li class='col-lg-2 col-md-3 col-sm-6 file file-{$file->extension}'>";
              $fileHtml .= "<div class='file-wrapper'>";
              $fileHtml .= html::a(helper::createLink('file', 'download', "fileID=$file->id&mouse=left"), $file->title, "target='_blank'");
              $fileHtml .= "<div class='file-source'><div class='input-group'>";
              $fileHtml .= "<span class='input-group-select checkboxBox hide'>" . html::checkbox('fileList', array($file->id => '')) . "</span>";
              $fileHtml .= "<input readonly id='fullURL{$file->id}' type='text' value='{$imagePath}' class='form-control file-url'/><span class='input-copy-btn'><button type='button' class='btn btn-sm copyBtn' data-clipboard-target='#fullURL{$file->id}'>{$lang->copy}</button></span></div></div>";
              $fileHtml .= "<span class='file-actions'>";
              $fileHtml .= html::a(helper::createLink('file', 'editsource', "id=$file->id"), "<i class='icon icon-pencil'></i>", "data-toggle='modal' data-title='{$lang->file->editSource}'");
              $fileHtml .= html::a(helper::createLink('file', 'deletesource', "id=$file->id"), "<i class='icon icon-delete'></i>", "class='deleter'");
              $fileHtml .= '</span>';
              $fileHtml .= '</div>';
              $fileHtml .= '</li>';
          }
          if($imageHtml or $fileHtml) echo $imageHtml . $fileHtml;
          ?>
      <?php endforeach;?>
      </ul>
      <div class='clearfix'>
        <?php if($files):?>
          <div class='actions pull-left hide'>
              <?php echo html::submitButton($lang->delete, "image-view-batch-delete")?>
          </div>
        <?php endif;?>
        <?php $pager->show();?>
      </div>
    </div>
  </form>
  <form id='listViewForm'  action='<?php echo $this->createLink('file', 'batchDelete');?>' method='post' class='deleteForm'>
    <div id='listView' class='hide'>
      <table class='table table-hover'>
        <thead>
          <tr class='text-center'>
            <th colspan='2'><?php echo $lang->file->source;?></th>
            <th><?php echo $lang->file->sourceURI;?></th>
            <th class='w-150px addedBy'><?php echo $lang->file->addedBy;?></th>
            <th class='w-160px addedDate'><?php echo $lang->file->addedDate;?></th>
            <th class='w-30px edit'><?php echo $lang->edit;?></th>
            <th class='w-30px delete'><?php echo $lang->delete;?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($files as $file):?>
          <tr class='text-center text-middle'>
            <td>
              <?php echo html::checkbox('fileList', array($file->id => '')); ?>
            </td>
            <td class='text-left'>
              <div class='file-name-wrapper'>
              <?php
              if($file->isImage)
              {
                  echo html::a(inlink('download', "id=$file->id"), html::image($this->file->printFileURL($file, 'smallURL'), "class='image-small' title='{$file->title}'"), "data-toggle='lightbox' target='_blank'");
                  echo "<span class='file-name'>$file->title.$file->extension</span>";
              }
              else
              {
                  echo html::a(inlink('download', "id=$file->id"), $file->title, "target='_blank'");
              }
              ?>
              </div>
            </td>
            <td class='text-left'><?php echo $this->file->printFileURL($file);?></td>
            <td><?php echo isset($users[$file->addedBy]) ? $users[$file->addedBy] : '';?></td>
            <td><?php echo $file->addedDate;?></td>
            <td class='text-center'>
              <?php commonModel::printLink('file', 'editsource',   "id=$file->id", '<i class="icon btn-icon icon-edit"></i>', "data-toggle='modal'"); ?>
            </td>
            <td class='text-center'>
              <?php commonModel::printLink('file', 'deletesource', "id=$file->id", '<i class="icon btn-icon icon-delete"></i>', "class='deleter'"); ?>
            </td>
          </tr>
          <?php endforeach;?>
        </tbody>
        <tfoot>
          <tr>
            <td class='text-left' colspan='2'>
              <div class='footer-actions'>
                <?php if($files):?>
                <?php echo html::checkbox('', array('listView' => $lang->selectAll), '', 'class="checkAll"'); ?>
                <?php echo html::submitButton($lang->delete, "list-view-batch-delete hide")?>
                <?php echo html::a('javascript:void(0)', '<i class="icon icon-delete"></i>', "class='list-view-batch-delete-btn'")?>
                <?php endif;?>
              </div>
            </td>
            <td colspan='5'><?php $pager->show();?></td>
          </tr>
        </tfoot>
      </table>
    </div>
  </form>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
