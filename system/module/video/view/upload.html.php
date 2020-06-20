<?php include '../../common/view/header.modal.html.php';?>
<?php
js::import($jsRoot . 'uploader/min.js');
css::import($jsRoot . 'uploader/min.css');
?>
<script>
if(!$.zui.strCode)
{
    $.zui.strCode = function(str)
    {
        var code = 0;
        if(str && str.length)
        {
            for(var i = 0; i < str.length; ++i) code += i * str.charCodeAt(i);
        }
        return code;
    };
}
</script>
<div class='uploader' id='uploader' data-url='<?php echo $this->createLink('file', 'uploadFile', "objectType=$objectType&objectID=$objectID&uid=$uid");?>'>
  <div class='uploader-message text-center'>
    <div class='content'></div>
    <button type='button' class='close'>×</button>
  </div>
  <div class='file-list file-list-grid' data-drag-placeholder="<?php echo $lang->file->dragFile;?>"></div>
  <div>
    <div class='uploader-status pull-right text-muted'></div>
    <button type='button' class='btn btn-primary uploader-btn-browse'><i class='icon icon-plus'></i><?php echo $lang->file->addFile;?></button>
  </div>
</div>
<script>
$('#uploader').uploader(
{
    flash_swf_url: '<?php echo $jsRoot?>uploader/Moxie.swf',
    silverlight_xap_url: '<?php echo $jsRoot?>uploader/Moxie.xap',
    autoUpload: true,
    autoResetFails: true,
    deleteConfirm: true,
    limitFilesCount: 1,
    deleteActionOnDone: function(file, doDelete)
    {
        var that = this;
        $.getJSON(createLink('file', 'delete', 'id=' + file.remoteId), function(data)
        {
            if(data.result == 'success')
            {
                doDelete();
            }
            else
            {
                that.showMessage(data.message, 'danger');
            }
        });
    },
    onBeforeUpload: function(file)
    {
        this.plupload.setOption(
        {
            'multipart_params' : 
            {
              label: file.ext ? file.name.substr(0, file.name.length - file.ext.length - 1) : file.name,
              uuid: file.id,
              size: file.size
            }
        });
    },
    onUploadComplete: function(file)
    {
        url = file[0].url;
        fileId = file[0].remoteData.file.id;
        $(window.parent.$('#videoLink').val(url));
    }
}).on('click', '.btn-edit-file', function()
{
    var $file  = $(this).closest('.file');
    var file   = $file.data('file');
    var url    = createLink('file', 'edit', 'id=' + file.remoteId);
    var $modal = $('#ajaxModal');
    var width  = $modal.find('.modal-dialog').width();
    $modal.load(url, function()
    {
        $modal.find('.modal-dialog').css('width', width);
        if($modal.hasClass('modal'))
        {
            $.ajustModalPosition('fit', $modal);
        }
    });
});
</script>
<?php include '../../../common/view/footer.modal.html.php';?>
