<?php if(!defined('RUN_MODE')) die();?>
/**
 * Add a file input control.
 * 
 * @param  object $clickedButton 
 * @access public
 * @return void
 */
function addFile(clickedButton)
{
    fileRow = " <table class='fileBox' id='fileBox$i'><tr>  <td class='w-p45'><div class='form-control file-wrapper'><input type='file' name='files[]' class='fileControl'  tabindex='-1' \/><\/div><\/td>  <td class=''><input type='text' name='labels[]' class='form-control' placeholder='\u6807\u9898\uff1a' tabindex='-1' \/><\/td>  <td class='w-30px'><a href='javascript:;' onclick='addFile(this)' class='btn btn-block'><i class='icon-plus'><\/i><\/a><\/td>  <td class='w-30px'><a href='javascript:;' onclick='delFile(this)' class='btn btn-block'><i class='icon-remove'><\/i><\/a><\/td><\/tr><\/table>";
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

