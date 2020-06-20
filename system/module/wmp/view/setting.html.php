<?php
/**
 * The setting view file of wmp module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     wmp
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<section class='main-table'>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' class='form-inline'>
      <table class='table table-form'>
        <tr>
          <th class='w-100px'><?php echo $lang->wmp->appID;?></th> 
          <td class='w-p40'><?php echo html::input('appID',  isset($this->config->wmp->appID) ? $this->config->wmp->appID : '', "class='form-control'");?></td>
          <td></td>
        </tr>
        <tr>
          <th class='w-100px'><?php echo $lang->wmp->appSecret;?></th> 
          <td class='w-p40'><?php echo html::input('appSecret',  isset($this->config->wmp->appSecret) ? $this->config->wmp->appSecret : '', "class='form-control'");?></td>
          <td></td>
        </tr>
        <tr>
          <th><?php echo $lang->wmp->projectName;?></th> 
          <td><?php echo html::input('projectName',  isset($this->config->wmp->projectName) ? $this->config->wmp->projectName : '', "class='form-control'");?></td>
          <td></td>
        </tr>
        <tr>
          <th></th>
          <td>
            <?php echo html::submitButton();?>
            <?php commonModel::printLink('wmp', 'downloadpackage', '', '<i class="icon-download-alt"></i> ' . $lang->wmp->download, 'class="btn btn-primary"');?>
          </td>
          <td></td>
        </tr>
      </table>
    </form>
  </div>
</section>
<?php include '../../common/view/footer.admin.html.php';?>
