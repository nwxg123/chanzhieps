<?php if(!class_exists('raintpl')){exit;}?><?php if(!defined("RUN_MODE")){ ?>

<?php echo die(); ?>

<?php } ?>

<?php if(!$writeable){ ?>

  <h5 class='text-danger a-left'> <?php echo $control->lang->file->errorUnwritable;?> </h5>
<?php }else{ ?>

  <div class="file-form" id='fileform'>
    <?php $fileRow=$this->var['fileRow'] = " <table class='fileBox' id='fileBox\$i'>";?>

    <?php $fileRow=$this->var['fileRow'] .= "<tr>";?>

    <?php $fileRow=$this->var['fileRow'] .= "  <td class='w-p45'><div class='form-control file-wrapper'><input type='file' name='files[]' class='fileControl'  tabindex='-1' /></div></td>";?>

    <?php $fileRow=$this->var['fileRow'] .= "  <td class=''><input type='text' name='labels[]' class='form-control' placeholder='{$lang->file->label}' tabindex='-1' /></td>";?>

    <?php $fileRow=$this->var['fileRow'] .= "  <td class='w-30px'><a href='javascript:;' onclick='addFile(this)' class='btn btn-block'><i class='icon-plus'></i></a></td>";?>

    <?php $fileRow=$this->var['fileRow'] .= "  <td class='w-30px'><a href='javascript:;' onclick='delFile(this)' class='btn btn-block'><i class='icon-remove'></i></a></td>";?>

    <?php $fileRow=$this->var['fileRow'] .= "</tr>";?>

    <?php $fileRow=$this->var['fileRow'] .= "</table>";?>

    <?php for($i = 1; $i <= $fileCount; $i ++): ?>

<?php echo str_replace('$i', $i, $fileRow); ?>

<?php endfor; ?>

    <?php $fileLimit=$this->var['fileLimit'] = trim(ini_get('upload_max_filesize'), 'M') > trim(ini_get('post_max_size'), 'M') ? trim(ini_get('post_max_size'), 'M') : trim(ini_get('upload_max_filesize'), 'M');?>

    <?php if(!is_numeric($fileLimit)){ ?>

<?php $fileLimit=$this->var['fileLimit'] = $control->config->file->maxSize / 1024 / 1024;?>

<?php } ?>

    <?php printf($lang->file->sizeLimit, $fileLimit); ?>

  </div>
<?php } ?>

<script>
/**
 * Add a file input control.
 * 
 * @param  object $clickedButton 
 * @access public
 * @return void
 */
function addFile(clickedButton)
{
    fileRow = <?php echo json_encode($fileRow); ?>;
    fileRow = fileRow.replace('$i', $('.fileID').size() + 1);
    $(clickedButton).closest('.fileBox').after(fileRow);

    updateID();
}


/**
 * Delete a file input control.
 * 
 * @param  object $clickedButton 
 * @access public
 * @return void
 */
function delFile(clickedButton)
{
    if($('.fileBox').size() == 1) return;
    $(clickedButton).closest('.fileBox').remove();
    updateID();
}

/**
 * Update the file id labels.
 * 
 * @access public
 * @return void
 */
function updateID()
{
    i = 1;
    $('.fileID').each(function(){$(this).html(i ++)});
}

</script>
