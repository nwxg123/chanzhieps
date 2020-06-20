<?php 
/**
 * The api view of order module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件非免费软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     order 
 * @version     $Id$
 * @link        http://www.zentao.net
 */
?>
<?php include '../../../common/view/header.admin.html.php';?>
<?php include '../../../common/view/chosen.html.php';?>
<div class='panel'>
  <div class='panel-body'>
    <form id='ajaxForm' method='post'>
      <table class='table table-form w-p60'>
        <tr>
          <th class='w-80px'><?php echo $lang->order->api->action;?></th>
          <td><?php echo html::select('action', $lang->order->api->actionList, $api->action, "class='form-control chosen'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->order->api->url;?></th>
          <td><?php echo html::input('url', $api->url, "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->order->api->debug?></th>
          <td><?php echo html::radio('debug', $lang->order->api->turnonList, $api->debug);?></td>
        </tr>
        <tr>
          <th><?php echo $lang->order->api->method;?></th>
          <td><?php echo html::radio('method', $lang->order->api->methodList, $api->method);?></td>
        </tr>
        <tr>
          <th><?php echo $lang->order->api->params;?></th>
          <td>
            <table class='table table-data'>
              <tr class='text-center'>
                <th class='w-p40'><?php echo $lang->order->api->key;?></th>
                <th><?php echo $lang->order->api->value;?></th>
              </tr>
              <?php if(!empty($api->params)):?>
              <?php foreach($api->params as $key => $value):?>
              <tr>
                <td><?php echo html::input('key[]', $key, "class='form-control'")?></td>
                <td>
                  <div class='input-group'>
                    <?php $checked = isset($lang->order->api->valueList[$value]) ? '' : "checked='checked'";?>
                    <?php echo html::select('value[]', $lang->order->api->valueList, $value, "class='form-control chosen'")?>
                    <?php echo html::input('value[]', $value, "class='form-control hidden'")?>
                    <span class='input-group-addon'> 
                      <input type='checkbox' id='createValue' name='createValue' value='1' <?php echo $checked;?>></input>
                      <?php echo $lang->order->api->createValue;?>
                    </span>
                  </div>
                </td>
              </tr>
              <?php endforeach;?>
              <?php endif;?>
              <?php for($i = 1; $i <= 5; $i++):?>
              <tr>
                <td><?php echo html::input('key[]', '', "class='form-control'")?></td>
                <td>
                  <div class='input-group'>
                    <?php echo html::select('value[]', $lang->order->api->valueList, '', "class='form-control chosen'")?>
                    <?php echo html::input('value[]', '', "class='form-control hidden'")?>
                    <span class='input-group-addon'> 
                      <input type='checkbox' id='createValue' name='createValue' value='1'></input>
                      <?php echo $lang->order->api->createValue;?>
                    </span>
                  </div>
                </td>
              </tr>
              <?php endfor;?>
            </table>
          </td>
        </tr>
        <tr>
          <th></th>
          <td><?php echo html::submitButton();?></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include '../../../common/view/footer.admin.html.php';?>
