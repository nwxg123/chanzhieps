<?php
/**
 * The create view file of formitem module of chanzhiEPS.
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
if($control == 'radio' or $control == 'checkbox')
{
    js::import($jsRoot . 'uploader/min.js');
    css::import($jsRoot . 'uploader/min.css');
}
?>
<section class='main-table'>
  <div class='panel-body'>
    <form id='ajaxForm' method='post'>
      <div id='uploader' class='uploader' data-url='<?php echo $this->createLink('file', 'uploadFile', "objectType=formoption&objectID=&isImage=1");?>'>
        <table class='table table-form'>
          <tr>
            <th class='w-80px'><?php echo $lang->formitem->title;?></th>
            <td class='w-500px'><?php echo html::input('title', '', "class='form-control'");?></td>
            <td class='w-120px'></td>
          </tr>
          <tr>
            <th><?php echo $lang->formitem->desc;?></th>
            <td><?php echo html::textarea('desc', '', "rows='3' class='form-control'");?></td>
            <td></td>
          </tr>
          <?php if($control != 'section'):?>
          <?php if($type != 'exam'):?>
          <tr>
            <th><?php echo $lang->formitem->rule;?></th>
            <td><?php echo html::select('rule[]', $lang->formitem->ruleList, '', "class='form-control chosen' multiple");?></td>
            <td></td>
          </tr>
          <?php endif;?>
          <?php if(strpos(',radio,checkbox,select,', ",$control,") !== false):?>
          <?php if($control == 'radio' or $control == 'checkbox'):?>
          <tr>
            <th><?php echo $lang->formitem->optionType;?></th>
            <td><?php echo html::radio('optionType', $lang->formitem->optionTypeList, 'text');?></td>
            <td></td>
          </tr>
          <?php endif;?>
          <tr>
            <th><?php echo $lang->formitem->options;?></th>
            <td id='optionsTD' colspan='2'>
              <div class='input-group option'>
                <span class='input-group-addon index'>1</span>
                <?php echo html::input('options[0]', '', "class='form-control'");?>
                <a class='input-group-addon addItem'><i class='icon icon-plus'></i></a>
                <a class='input-group-addon delItem'><i class='icon icon-remove'></i></a>
                <a class='input-group-addon sortItem'><i class='icon icon-move'></i></a>
                <?php if($type == 'exam'):?>
                <?php $controlType = $control == 'checkbox' ? 'checkbox' : 'radio';?>
                <span class='input-group-addon'>
                  <div class="<?php echo $controlType;?>-primary">
                    <input type='<?php echo $controlType;?>' name='answers[]' value='0'>
                    <label for="answers[]" class="no-margin"><?php echo $lang->formitem->setAnswer;?></label>
                  </div>
                </span>
                <?php endif;?>
              </div>
              <div class='file-list file-list-grid hide'></div>
              <span id='options'></span>
            </td>
          </tr>
          <?php if($control == 'radio' or $control == 'checkbox'):?>
          <tr>
            <th><?php echo $lang->formitem->display;?></th>
            <td><?php echo html::radio('display', $lang->formitem->displayList, 'block');?></td>
            <td></td>
          </tr>
          <?php endif;?>
          <?php endif;?>
          <?php if($control == 'date'):?>
          <tr>
            <th><?php echo $lang->formitem->format;?></th>
            <td><?php echo html::radio('format', $lang->formitem->formatList, 'datetime', '', 'block');?></td>
            <td></td>
          </tr>
          <?php endif;?>
          <?php endif;?>
          <?php if($type == 'exam'):?>
          <?php if($control == 'input' or $control == 'textarea' or $control == 'date'):?>
          <tr>
            <th><?php echo $lang->formitem->answer;?></th>
            <td><?php echo html::input('answer', '', "class='form-control' autocomplete='off'");?></td>
            <td><span class='text-important'><?php echo $lang->formitem->tips->answers;?></span></td>
          </tr>
          <?php endif;?>
          <?php if($control != 'section' and $control != 'pager'):?>
          <tr>
            <th><?php echo $lang->formitem->score;?></th>
            <td><?php echo html::input('score', '', "class='form-control' autocomplete='off'");?></td>
            <td></td>
          </tr>
          <?php endif;?>
          <?php if($control == 'checkbox' or $control == 'input' or $control == 'textarea' or $control == 'date'):?>
          <tr>
            <th><?php echo $lang->formitem->scoreRule;?></th>
            <td><?php echo html::radio('scoreRule', $lang->formitem->scoreRuleList[$control], 'full', '', 'block');?></td>
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
<?php if($control == 'radio' or $control == 'checkbox'):?>
<script>
$('#uploader').uploader(
{
    drop_element: 'fileList',
    autoUpload: true,
    filters: {mime_types: [{title: 'images', extensions: 'jpg,jpeg,gif,png,bmp'}]},
    fileFormater: function($selector, file, status)
    {
        $('#uploader .file-list').removeAttr('data-drag-placeholder');
        if(file.remoteData && file.remoteData.file)
        {
            var remoteData    = file.remoteData.file;
            file.remoteId     = remoteData.id;
            file.previewImage = config.webRoot + 'file.php?f=' + remoteData.pathname + '&t=' + remoteData.extension + '&o=formitem&s=' + remoteData.size + '&v=<?php echo $config->site->lastUpload;?>';
        }

        /* Remove extension when the file name is an option title. */
        if(file.ext)
        {
            var pos = file.name.lastIndexOf('.' + file.ext);
            if(pos > 0) file.name = file.name.substr(0, pos);
        }
        
        var nameText = '<span>' + file.name + '</span>';
        $selector.find('.file-name').html(nameText);
        $selector.find('.file-status').hide();
        
        var infoText = '<span class="file-info-size">' + window.plupload.formatSize(file.size).toUpperCase() + '</span>';
        $selector.find('.file-size').html(infoText);
        
        $selector.find('.btn-delete-file i').removeClass('text-danger');
        if(status == 'done' && !$selector.find('.btn-sort-file').length)
        {
            $selector.find('.btn-delete-file').after('<a href="javascript:;" class="btn-sort-file btn btn-link"><i class="icon icon-move"></i></a>');
        }

        <?php if($type == 'exam'):?>
        <?php echo "\$selector.find('.content').after('<div class=\"answer\"><div class=\"{$control}\"><label><input type=\"{$control}\" name=\"answers[]\" value=\"' + file.id + '\">{$lang->formitem->setAnswer}</label></div></div>');";?>
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
                $('[name*=names\\['  + file.id + '\\]]').remove();
                $('[name*=files\\['  + file.id + '\\]]').remove();
                $('[name*=orders\\[' + file.id + '\\]]').remove();
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
            for(i = 0; i < files.length; i++)
            {
                var file = files[i];
                $('#optionsTD > .file-list').after("<input type='hidden' name='names["  + file.id + "]' value='" + file.name + "'>");
                $('#optionsTD > .file-list').after("<input type='hidden' name='files["  + file.id + "]' value='" + file.remoteId + "'>");
                $('#optionsTD > .file-list').after("<input type='hidden' name='orders[" + file.id + "]' value='" + i + "'>");
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
                $('[name=orders\\[' + $(this).attr('data-id') + '\\]]').val(order++);
            });
        }
    });
}
</script>
<?php endif;?>
<?php include '../../common/view/footer.admin.html.php';?>
