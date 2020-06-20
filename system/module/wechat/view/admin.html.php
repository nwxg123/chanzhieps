<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The admin view file of wechat of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     wechat
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php if(commonModel::isAvailable('user')):?>
<?php $version = curl_version();?>
<?php if(!($version['features'] & CURL_VERSION_SSL)):?>
  <div class='alert alert-danger'>
    <?php echo $lang->wechat->curlSSLRequired;?>
  </div>
<?php else:?>
<section class='main-table fixed'>
  <header class='clearfix'>
    <ul class='nav nav-tabs-main pull-left'>
      <li class='active'>
        <?php echo html::a(inlink('admin'), $lang->wechat->list);?>
      </li>
    </ul>
    <div class='pull-right btn-toolbar'>
      <?php commonModel::printLink('wechat', 'create', '', '<i class="icon-plus"></i>' . $lang->wechat->create, "class='btn btn-primary'");?>
    </div>
  </header>
  <table class='table table-hover tablesorter table-fixed'>
    <thead>
      <tr class='text-center'>
        <th class='w-10px'></th>
        <th class='text-left'><?php echo $lang->wechat->name;?></th>
        <th class='w-100px'><?php echo $lang->wechat->type;?></th>
        <th class='w-160px'><?php echo $lang->wechat->account;?></th>
        <th class='w-160px'><?php echo $lang->wechat->appID;?></th>
        <th class="text-center actions w-30px"><?php echo $lang->edit;?></th>
        <th class="text-center actions w-30px"><?php echo $lang->wechat->setMenu;?></th>
        <th class="text-center actions w-40px"><?php echo $lang->wechat->response->keywords;?></th>
        <th class="text-center actions w-50px"><?php echo $lang->wechat->response->default;?></th>
        <th class="text-center actions w-50px"><?php echo $lang->wechat->response->subscribe;?></th>
        <th class="text-center actions w-50px"><?php echo $lang->wechat->remind;?></th>
        <th class="text-center actions w-30px"><?php echo $lang->delete;?></th>
        <th class="text-center actions w-30px"><?php echo $lang->wechat->integrate;?></th>
        <th class="text-center actions w-40px"><?php echo $lang->wechat->qrcode;?></th>
        <th class="text-center actions w-10px"></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($publics as $public):?>
      <tr class='text-center'>
        <td></td>
        <td class='text-left'><?php echo $public->name;?></td>
        <td><?php echo $lang->wechat->typeList[$public->type];?></td>
        <td><?php echo $public->account;?></td>
        <td><?php echo $public->appID;?></td>
        <td class='c-actions'>
        <?php commonModel::printLink('wechat', 'edit', "publicID=$public->id", "<i class='icon icon-edit'></i>", "class='btn btn-icon'");?>
        </td>
        <td class='c-actions'>
        <?php if(!$public->certified and $public->type == 'subscribe'):?>
        <?php echo html::a('javascript:;', "<i class='icon icon-bars'></i>", "class='btn btn-icon text-muted' data-container='body' data-toggle='popover' data-placement='right' data-content='{$lang->wechat->needCertified}'");?>
        <?php else:?>
        <?php commonModel::printLink('tree', 'browse', "type=wechat_$public->id", "<i class='icon icon-bars'></i>", "class='btn btn-icon'");?>
        <?php endif;?>
        </td>
        <td class='c-actions'>
        <?php commonModel::printLink('wechat', 'adminResponse', "publicID=$public->id", "<i class='icon icon-tag'></i>", "class='btn btn-icon'");?>
        </td>
        <td class='c-actions'>
        <?php commonModel::printLink('wechat', 'setResponse', "publicID=$public->id&group=default&key=default", "<i class='icon icon-commenting-o'></i>", "class='btn btn-icon' data-toggle='modal'");?>
        </td>
        <td class='c-actions'>
        <?php commonModel::printLink('wechat', 'setResponse', "publicID=$public->id&group=subscribe&key=subscribe", "<i class='icon icon-commenting'></i>", "class='btn btn-icon' data-toggle='modal'");?>
        </td>
        <td class='c-actions'>
        <?php commonModel::printLink('wechat', 'remind', "publicID=$public->id", "<i class='icon icon-send'></i>", "class='btn btn-icon' data-toggle='modal'");?>
        </td>
        <td class='c-actions'>
        <?php commonModel::printLink('wechat', 'delete', "publicID=$public->id", "<i class='icon icon-delete'></i>", "class='btn btn-icon deleter'");?>
        </td>
        <td class='c-actions'>
        <?php commonModel::printLink('wechat', 'integrate', "publicID=$public->id", "<i class='icon icon-sync'></i>", "class='btn btn-icon'");?>
        </td>
        <td class='c-actions'>
        <?php commonModel::printLink('wechat', 'qrcode', "publicID=$public->id", "<i class='icon icon-mobile'></i>", "class='btn btn-icon' data-toggle='modal'");?>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</section>
<?php endif;?>
<?php else:?>
<script>
$(document).ready(function()
{
    bootbox.confirm('<?php echo $lang->wechat->openUserModule?>', function(result)
    {
        if(result)
        {
            $.getJSON(createLink('site', 'openModule', 'module=user'), function(response)
            {
                if(response.result == 'success')
                {
                    location.reload();
                }
            });
        }
        return true;
    });         
});
</script>
<?php endif;?>
<?php include '../../common/view/footer.admin.html.php';?>
