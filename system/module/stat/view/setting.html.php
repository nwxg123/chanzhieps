<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The setlog view file of site module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     site
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<section>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' class='form-inline'>
      <table class='table table-form'>
        <tr>
          <td class='text-right w-150px'><?php echo $lang->site->saveDays;?></th> 
          <td class='w-180px'>
            <div class='input-group'>
              <?php echo html::input('saveDays', isset($this->config->site->saveDays) ? $this->config->site->saveDays : '30', "class='form-control'");?>
              <span class='input-group-addon'><?php echo $lang->date->day;?></span>
            </div>
          </td>
          <td></td>
        </tr>
        <tr>
          <td class='text-right'><?php echo $lang->stat->maxDays;?></th> 
          <td>
            <div class='input-group'>
              <?php echo html::input('maxDays', $this->config->stat->maxDays, "class='form-control'");?>
              <span class='input-group-addon'><?php echo $lang->date->day;?></span>
            </div>
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
