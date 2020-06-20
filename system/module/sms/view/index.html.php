<?php
/**
 * The index view file of sms module of RanZhi.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件非免费软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     sms
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<div class='panel'>
  <div class='panel-body'>
  <form id='ajaxForm' method='post'>
    <table class='table table-form'>
      <tr>
        <th class='w-120px'><?php echo $lang->sms->turnon?></th>
        <td class='w-p60'><?php echo html::radio('turnon', $lang->sms->turnonList, empty($smsConfig->turnon) ? '' : $smsConfig->turnon)?></td>
        <td></td>
      </tr>
      <tr>
        <th><?php echo $lang->sms->debug?></th>
        <td><?php echo html::radio('debug', $lang->sms->turnonList, empty($smsConfig->debug) ? '' : $smsConfig->debug)?></td>
      </tr>
      <tr>
        <th><?php echo $lang->sms->method?></th>
        <td><?php echo html::radio('method', $lang->sms->methodList, empty($smsConfig->method) ? '' : $smsConfig->method)?></td>
      </tr>
      <tr>
        <th><?php echo $lang->sms->url?></th>
        <td><?php echo html::input('url', empty($smsConfig->url) ? '' : $smsConfig->url, "class='form-control'")?></td>
      </tr>
      <tr>
        <th><?php echo $lang->sms->encode?></th>
        <td><?php echo html::input('encode', empty($smsConfig->encode) ? 'utf-8' : $smsConfig->encode, "class='form-control'")?></td>
      </tr>
      <tr>
        <th><?php echo $lang->sms->mobile?></th>
        <td><?php echo html::input('mobile', empty($smsConfig->mobile) ? '' : $smsConfig->mobile, "class='form-control'")?></td>
      </tr>
      <tr>
        <th><?php echo $lang->sms->delimiter?></th>
        <td><?php echo html::input('delimiter', empty($smsConfig->delimiter) ? '' : $smsConfig->delimiter, "class='form-control'")?></td>
      </tr>
      <tr>
        <th><?php echo $lang->sms->content?></th>
        <td><?php echo html::input('content', empty($smsConfig->content) ? '' : $smsConfig->content, "class='form-control'")?></td>
      </tr>
      <tr>
        <th><?php echo $lang->sms->otherItems?></th>
        <td colspan='2'>
          <table class='table table-data'>
            <tr class='text-center'>
              <th><?php echo $lang->sms->key?></th>
              <th><?php echo $lang->sms->value?></th>
            </tr>
            <?php if(!empty($smsConfig->params)):?>
            <?php foreach($smsConfig->params as $key => $value):?>
            <tr>
              <td><?php echo html::input('key[]', $key, "class='form-control'")?></td>
              <td><?php echo html::input('value[]', $value, "class='form-control'")?></td>
            </tr>
            <?php endforeach;?>
            <?php endif;?>
            <?php for($i = 1; $i <= 5; $i++):?>
            <tr>
              <td><?php echo html::input('key[]', '', "class='form-control'")?></td>
              <td><?php echo html::input('value[]', '', "class='form-control'")?></td>
            </tr>
            <?php endfor;?>
          </table>
        </td>
      </tr>
      <tr>
        <td colspan='3' align='center'>
        <?php
        echo html::submitButton() . html::linkButton($lang->sms->reset, inlink('reset'));
        echo html::a(inlink('test'), $lang->sms->test, "class='btn btn-primary'");
        ?>
        </td>
      </tr>
    </table>
  </form>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
