<?php
/**
 * The edit view file of formitem module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     formitem 
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php 
include '../../common/view/header.admin.html.php';
include '../../common/view/kindeditor.html.php';
include '../../common/view/chosen.html.php';
if($item->control == 'radio' or $item->control == 'checkbox')
{
    js::import($jsRoot . 'uploader/min.js');
    css::import($jsRoot . 'uploader/min.css');
};
$key = 0;
?>
<section class='main-table'>
  <div class='panel-body'>
    <form id='ajaxForm' method='post'>
      <div id='uploader' class='uploader' data-url='<?php echo $this->createLink('file', 'uploadFile', "objectType=formoption&objectID=&isImage=1");?>'>
        <table class='table table-form'>
          <tr>
            <th class='w-80px'><?php echo $lang->formitem->title;?></th>
            <td class='w-500px'><?php echo html::input('title', $item->title, "class='form-control'");?></td>
            <td class='w-120px'></td>
          </tr>
          <tr>
            <th><?php echo $lang->formitem->desc;?></th>
            <td><?php echo html::textarea('desc', $item->desc, "rows='3' class='form-control'");?></td>
            <td></td>
          </tr>
          <?php if($item->control != 'section'):?>
          <?php if($type != 'exam'):?>
          <tr>
            <th><?php echo $lang->formitem->rule;?></th>
            <td><?php echo html::select('rule[]', $lang->formitem->ruleList, $item->rule, "class='form-control chosen' multiple");?></td>
            <td></td>
          </tr>
          <?php endif;?>
          <?php if(strpos(',radio,checkbox,select,', ",$item->control,") !== false):?>
          <?php if($item->control == 'radio' or $item->control == 'checkbox'):?>
          <tr>
            <th><?php echo $lang->formitem->optionType;?></th>
            <td><?php echo html::radio('optionType', $lang->formitem->optionTypeList, $item->optionType);?></td>
            <td></td>
          </tr>
          <?php endif;?>
          <tr>
            <th><?php echo $lang->formitem->options;?></th>
            <td id='optionsTD' colspan='2'>
              <?php $index = 1;?>
              <?php if($item->optionType == 'text'):?>
              <?php foreach($item->options as $optionID => $option):?>
              <div class='input-group option'>
                <span class='input-group-addon index'><?php echo $index++;?></span>
                <?php echo html::input("options[$optionID]", $option, "class='form-control'");?>
                <?php echo html::hidden("modes[$optionID]", 'update');?>
                <a class='input-group-addon addItem'><i class='icon icon-plus'></i></a>
                <a class='input-group-addon delItem'><i class='icon icon-remove'></i></a>
                <a class='input-group-addon sortItem'><i class='icon icon-move'></i></a>
                <?php if($type == 'exam' && $item->type == 'common'):?>
                <?php $controlType = $item->control == 'checkbox' ? 'checkbox' : 'radio';?>
                <?php $checked = strpos(",{$item->answer},", ",{$optionID},") !== false ? "checked='checked'" : '';?>
                <span class='input-group-addon'>
                  <div class="<?php echo $controlType;?>-primary">
                    <input type='<?php echo $controlType;?>' name='answers[]' <?php echo $checked;?> value='<?php echo $optionID;?>'>
                     <label for="answers[]" class="no-margin"><?php echo $lang->formitem->setAnswer;?></label>
                  </div>
                </span>
                <?php endif;?>
              </div>
              <?php $key = $optionID;?>
              <?php endforeach;?>
              <?php $key++;?>
              <?php endif;?>
              <?php if(!$item->options):?>
              <div class='input-group option'>
                <span class='input-group-addon index'><?php echo $index;?></span>
                <?php echo html::input("options[$key]", '', "class='form-control'");?>
                <?php echo html::hidden("modes[$key]", 'new');?>
                <span class='input-group-btn'>
                  <a href='javascript:;' class='btn addItem'><i class='icon icon-plus'></i></a>
                  <a href='javascript:;' class='btn delItem'><i class='icon icon-remove'></i></a>
                  <a href='javascript:;' class='btn sortItem'><i class='icon icon-move'></i></a>
                </span>
                <?php if($type == 'exam' && $item->type == 'common'):?>
                <?php $controlType = $item->control == 'checkbox' ? 'checkbox' : 'radio';?>
                <span class='input-group-addon'>
                  <label type='<?php echo $controlType;?>-inline'>
                    <input type='<?php echo $controlType;?>' name='answers[]' value='<?php echo $key;?>'><?php echo $lang->formitem->setAnswer;?>
                  </label>
                </span>
                <?php endif;?>
              </div>
              <?php endif;?>
              <div class='file-list file-list-grid hide'></div>
              <?php 
              $order = 1;
              if($item->optionType == 'image')
              {
                  foreach($item->options as $optionID => $option)
                  {
                      echo html::hidden("names[$optionID]",  $option->title);
                      echo html::hidden("files[$optionID]",  $option->remoteId);
                      echo html::hidden("modes[$optionID]",  'update');
                      echo html::hidden("orders[$optionID]", $order++);
                      $key = $optionID;
                  }
                  $key++;
              }
              ?>
              <span id='options'></span>
            </td>
          </tr>
          <?php if($item->control == 'radio' or $item->control == 'checkbox'):?>
          <tr>
            <th><?php echo $lang->formitem->display;?></th>
            <td><?php echo html::radio('display', $lang->formitem->displayList, $item->display);?></td>
            <td></td>
          </tr>
          <?php endif;?>
          <?php endif;?>
          <?php if($item->control == 'date'):?>
          <tr>
            <th><?php echo $lang->formitem->format;?></th>
            <td><?php echo html::radio('format', $lang->formitem->formatList, $item->format, '', 'block');?></td>
            <td></td>
          </tr>
          <?php endif;?>
          <?php endif;?>
          <?php if($type == 'exam' && $item->type == 'common'):?>
          <?php if($item->control == 'input' or $item->control == 'textarea' or $item->control == 'date'):?>
          <tr>
            <th><?php echo $lang->formitem->answer;?></th>
            <td><?php echo html::input('answer', $item->answer, "class='form-control' autocomplete='off'");?></td>
            <td><span class='text-important'><?php echo $lang->formitem->tips->answers;?></span></td>
          </tr>
          <?php endif;?>
          <?php if($item->control != 'section' and $item->control != 'pager'):?>
          <tr>
            <th><?php echo $lang->formitem->score;?></th>
            <td><?php echo html::input('score', $item->score, "class='form-control' autocomplete='off'");?></td>
            <td></td>
          </tr>
          <?php endif;?>
          <?php if($item->control == 'checkbox' or $item->control == 'input' or $item->control == 'textarea' or $item->control == 'date'):?>
          <tr>
            <th><?php echo $lang->formitem->scoreRule;?></th>
            <td><?php echo html::radio('scoreRule', $lang->formitem->scoreRuleList[$item->control], $item->scoreRule, '', 'block');?></td>
            <td></td>
          </tr>
          <?php endif;?>
          <?php endif;?>
          <tr>
            <th></th>
            <td>
              <?php echo html::submitButton();?>
              <button type='button' class='btn btn-primary uploader-btn-browse' style='display: none'><?php echo $lang->formitem->selectImages;?></button>
              <?php echo html::backButton();?>
            </td>
            <td></td>
          </tr>
        </table>
      </div>
    </form>
  </div>
</section>
<?php js::set('key', ++$key);?>
<?php if($item->control == 'radio' or $item->control == 'checkbox'):?>
<?php 
$files = array();
if($item->optionType == 'image')
{
    foreach($item->options as $option) 
    {
        $option->name         = $option->title;
        $option->ext          = $option->extension;
        $option->previewImage = $option->url;
        $option->isImage      = true;
        $option->checked      = strpos(",{$item->answer},", ",{$option->id},") !== false ? 'true' : 'false';
        $files[] = $option;
    }
}
?>
<script>
$('#uploader').uploader(
{
    drop_element: 'fileList',
    staticFiles: <?php echo helper::jsonEncode($files);?>,
    autoUpload: true,
    filters: {mime_types: [{title: 'images', extensions: 'jpg,jpeg,gif,png,bmp'}]},
    fileFormater: function($selector, file, status)
    {
        $('#uploader .file-list').removeAttr('data-drag-placeholder');
        if(file.remoteData && file.remoteData.file)
        {
            var remoteData    = file.remoteData.file;
            file.remoteId     = remoteData.id;
            file.previewImage = config.webRoot + 'file.php?f=' + remoteData.pathname + '&t=' + remoteData.extension + '&o=formoption&s=' + remoteData.size + '&v=<?php echo $config->site->lastUpload;?>';
        }

        /* Remove extension when the file name is an option title. */
        if(file.ext)
        {
            var pos = file.name.lastIndexOf('.' + file.ext);
            if(pos > 0) file.name = file.name.substr(0, pos);
        }
        
        var nameText = '<span>' + file.name + '</span>';
        $selector.find('.file-name').html(nameText);

        var infoText = '<span class="file-info-size">' + window.plupload.formatSize(file.size).toUpperCase() + '</span>';
        $selector.find('.file-size').html(infoText);
        
        $selector.find('.btn-delete-file i').removeClass('text-danger');
        if(status == 'done' && !$selector.find('.btn-sort-file').length)
        {
            $selector.find('.btn-delete-file').after('<a href="javascript:;" class="btn-sort-file btn btn-link"><i class="icon icon-move"></i></a>');
        }

        <?php if($type == 'exam' && $item->type == 'common'):?>
        var checked = file.checked && file.checked == 'true' ? 'checked="checked"' : '';
        <?php echo "if(\$selector.find('.file-wrapper .answer').length == 0) \$selector.find('.content').after('<div class=\"answer\"><div class=\"{$item->control}\"><label><input type=\"{$item->control}\" name=\"answers[]\" ' + checked + ' value=\"' + file.id + '\">{$lang->formitem->setAnswer}</label></div></div>');";?>
        <?php endif;?>

        sortFile();
    },
    deleteConfirm: true,
    deleteActionOnDone: function(file, doDelete)
    {
        var that = this;
        $.getJSON(createLink('file', 'delete', 'id=' + file.remoteId), function(data)
        {
            if(data.result == 'success')
            {
                doDelete();

                $('[name=names\\['  + file.id + '\\]]').remove();
                $('[name=files\\['  + file.id + '\\]]').remove();
                $('[name=modes\\['  + file.id + '\\]]').remove();
                $('[name=orders\\[' + file.id + '\\]]').remove();
            }
            else
            {
                this.showMessage(data.message, 'danger');
            }
        });
    },
    renameActionOnDone: function(file, filename, doRenameFile)
    {
        doRenameFile();

        $('[name=names\\[' + file.id + '\\]]').val(filename);
    },
    onBeforeUpload: function(file)
    {
        this.plupload.setOption(
        {
            'multipart_params':
            {
              label: file.name,
              uuid: file.id,
              size: file.size,
              name: file.name + '.' + file.ext
            }
        });
    },
    onUploadComplete: function(files)
    {
        if(files) 
        {
            var order = <?php echo $order++;?>;
            for(i = 0; i < files.length; i++)
            {
                var file = files[i];
                $('#optionsTD > .file-list').after("<input type='hidden' name='names["  + file.id + "]' value='" + file.name + "'>");
                $('#optionsTD > .file-list').after("<input type='hidden' name='files["  + file.id + "]' value='" + file.remoteId + "'>");
                $('#optionsTD > .file-list').after("<input type='hidden' name='orders[" + file.id + "]' value='" + order++ + "'>");
                $('#optionsTD > .file-list').after("<input type='hidden' name='modes["  + file.id + "]' value='new'>");
            };

            $('#optionsTD').parent().show();
            $('#optionsTD > .option').hide();
            $('#optionsTD > .file-list').show();
        }
        else
        {
            $('#optionsTD > .option').show();
            $('#optionsTD > .file-list').hide();
        }
    }
});

function sortFile()
{
    $('.file-list').sortable(
    {
        trigger: '.icon-move',
        selector: '.file',
        finish: function()
        {
            var order = 1;
            $('.file-list .file').each(function()
            {
                $('[name=orders\\[' + $(this).data('id') + '\\]]').val(order++);
            });
        }
    });
}
</script>
<?php endif;?>
<?php include '../../common/view/footer.admin.html.php';?>
