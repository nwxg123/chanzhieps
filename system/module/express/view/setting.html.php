<?php
/**
 * The setting view file of express module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2014 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件非免费软件，非开源软件
 * @author      xiying Guang <guanxiying@xirangit.com>
 * @package     express
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/chosen.html.php';?>
<section class='main-table'>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' class='form-inline'>
      <table class='table table-form'>
        <tr>
          <th class='w-120px'><?php echo $lang->express->enabledList;?></th> 
          <td>
            <?php echo html::select('express[]', $this->config->express->expressList, isset($this->config->site->expressEnabled) ? $this->config->site->expressEnabled : $this->config->express->commonList, "class='form-control chosen' multiple");?>
          </td>
        </tr>
        <tr>
          <th class='w-120px'><?php echo $lang->express->kuaidiCustomer;?></th> 
          <td>
            <?php echo html::input('kuaidiCustomer', isset($this->config->kuaidi100->customer) ? $this->config->kuaidi100->customer : '', "class='form-control' placeholder='{$lang->express->placeholder->customer}'");?>
          </td>
        </tr>
        <tr>
          <th class='w-120px'><?php echo $lang->express->kuaidiKey;?></th> 
          <td>
            <?php echo html::input('kuaidiKey', isset($this->config->kuaidi100->key) ? $this->config->kuaidi100->key : '', "class='form-control' placeholder='{$lang->express->placeholder->appkey}'");?>
          </td>
        </tr>
        <tr>
          <th></th>
          <td><?php echo html::submitButton();?></td>
        </tr>
      </table>
    </form>
  </div>
</section>
<?php include '../../common/view/footer.admin.html.php';?>
