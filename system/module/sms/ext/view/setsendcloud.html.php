<?php
/**
 * The setbasic view file of site module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv11.html)
 * @author      xiying Guang <guanxiying@xirangit.com>
 * @package     site
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../../common/view/header.admin.html.php';?>
<div class='panel'>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' class='form-horizontal'>
      <table class="table table-form">
        <tr>
          <th class='w-100px'><?php echo $lang->sms->sendcloud->smsUser;?></th>
          <td class='w-300px'>
            <?php echo html::input('smsUser', zget($sendcloud, 'smsUser', ''), "class='form-control' placeholder={$lang->sms->sendcloud->placeholder->smsUser}");?>
          </td>
          <td></td>
        </tr>
        <tr>
          <th><?php echo $lang->sms->sendcloud->key;?></th>
          <td>
            <?php echo html::input('key', zget($sendcloud, 'key', ''), "class='form-control' placeholder={$lang->sms->sendcloud->placeholder->key}");?>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->sms->sendcloud->templateId;?></th>
          <td>
            <?php echo html::input('templateId', zget($sendcloud, 'templateId', ''), "class='form-control' placeholder={$lang->sms->sendcloud->placeholder->templateId}");?>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->sms->sendcloud->vars;?></th>
          <td>
            <?php echo html::input('vars', zget($sendcloud, 'vars', ''), "class='form-control' placeholder={$lang->sms->sendcloud->placeholder->vars}");?>
          </td>
        </tr>

        <tr>
         <th></th> <td><?php echo html::submitButton();?></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include '../../../common/view/footer.admin.html.php';?>
