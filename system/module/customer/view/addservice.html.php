<?php
/**
 * The modify password view file of user module of XiRangCSM.
 *
 * @copyright   Copyright 2009-2011 青岛易软天创网络科技有限公司 (QingDao Nature Easy Soft Network Technology Co,LTD www.cnezsoft.com)
 * @license     商业软件非免费软件
 * @author      Yangyang Shi <shiyangyang@cnezsoft.com>
 * @package     User
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.modal.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<form method='post' id='serviceForm' action='<?php echo inlink('addservice', "account=$user->account");?>'>
  <table class='table table-form' align='center'>
    <tr>
      <th class='w-100px'><?php echo $lang->service->product;?></th>
      <td><?php echo html::select('product', $products, '', "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->service->endTime;?></th>
      <td><?php echo html::input('endTime', '', "class='form-control form-date'");?></td>
    </tr>  
    <tr><td></td><td><?php echo html::submitButton() . html::resetButton();?></td></tr>
  </table>
</form>
<?php include '../../common/view/footer.modal.html.php';?>
