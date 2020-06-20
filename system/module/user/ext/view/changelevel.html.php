<?php
/**
 * The changeLevel view file of user module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2010 QingDao Nature Easy Soft Network Technology Co,LTD (www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv11.html)
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     mall
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../../common/view/header.modal.html.php';?>
<form method='post' action='<?php echo inlink('changeLevel', "account=$account");?>' id='selectForm' class='form'>
  <table class='table table-form borderless'>
    <tr>
      <th class='w-100px'><?php echo $lang->user->changeLevel;?></th>
      <td><?php echo html::select('level', $levelList, current($levelList), "class='form-control'");?></td>
      <td></td>
    </tr>
    <tr><td></td><td><?php echo html::submitButton();?></td></tr>
  </table>
</form>
<script>
$(document).ready(function()
{   
    $.setAjaxForm('#selectForm', function(data)
    {
         if(data.result == 'success') setTimeout(function(){parent.location.reload()}, 1000);
    }); 
});
</script>
<?php include '../../../common/view/footer.modal.html.php';?>
