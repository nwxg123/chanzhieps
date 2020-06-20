<?php
/**
 * The setxuanxuan view file of site module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Memory <lvtao@cnezsoft.com>
 * @package     site
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../../common/view/header.admin.html.php';?>
<?php include '../../../common/view/chosen.html.php';?>
<div class='panel'>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' class='form-inline'>
      <table class='table table-form'>
        <tr>
          <th class='w-140px'><?php echo $lang->chat->version;?></th>
          <td class='w-p40'><?php echo $config->xuanxuan->version;?></td>
          <td></td>
        </tr>
        <tr>
          <th><?php echo $lang->chat->key;?></th>
          <td><?php echo zget($config->xuanxuan, 'key', '');?></td>
        </tr>
        <tr>
          <th><?php echo $lang->chat->xxdServer;?></th>
          <td><?php echo $type == 'edit' ? html::input('server', $server, "class='form-control'") : $server;?></td>
          <td></td>
        </tr>
        <tr>
          <th><?php echo $lang->chat->xxd->ip;?></th>
          <td><?php echo $type == 'edit' ? html::input('ip', zget($config->xuanxuan, 'ip', '0.0.0.0'), "class='form-control' placeholder='{$lang->chat->placeholder->xxd->ip}'") : zget($config->xuanxuan, 'ip', '0.0.0.0');?></td>
          <td></td>
        </tr>
        <tr>
          <th><?php echo $lang->chat->xxd->chatPort;?></th>
          <td><?php echo $type == 'edit' ? html::input('chatPort', zget($config->xuanxuan, 'chatPort', 11444), "placeholder='{$lang->chat->placeholder->xxd->chatPort}' class='form-control'") : zget($config->xuanxuan, 'chatPort', 11444);?></td>
          <td></td>
        </tr>
        <tr>
          <th><?php echo $lang->chat->xxd->commonPort;?></th>
          <td><?php echo $type == 'edit' ? html::input('commonPort', zget($config->xuanxuan, 'commonPort', 11443), "placeholder='{$lang->chat->placeholder->xxd->commonPort}' class='form-control'") : zget($config->xuanxuan, 'commonPort', 11443);?></td>
          <td></td>
        </tr>
        <?php $disabled = ($https == 'on') ? "disabled" : ''?>
        <?php if($type == 'edit'):?>
        <tr>
          <th><?php echo $lang->chat->xxd->https;?></th>
          <td>
            <?php echo html::hidden('https', $https);?>
            <?php echo $type ? html::radio('https', $lang->chat->httpsOptions, $https, "class='checkbox' {$disabled}") : $lang->chat->httpsOptions[$https];?>
          </td>
          <td></td>
        </tr>
        <?php else:?>
        <tr>
          <th><?php echo $lang->chat->xxd->https;?></th>
          <td><?php echo zget($lang->chat->httpsOptions, $https, '');?> </td>
          <td></td>
        </tr>
        <?php endif;?>
        <tr class='sslTR <?php if($https == 'off' || empty($type)) echo 'hide';?>'>
          <th><?php echo $lang->chat->xxd->sslcrt;?></th>
          <td><?php echo html::textarea('sslcrt',  zget($config->xuanxuan, 'sslcrt', ''), "placeholder='{$lang->chat->placeholder->xxd->sslcrt}' class='form-control'");?></td>
          <td></td>
        </tr>
        <tr class='sslTR <?php if($https == 'off' || empty($type)) echo 'hide';?>'>
          <th><?php echo $lang->chat->xxd->sslkey;?></th>
          <td><?php echo html::textarea('sslkey',  zget($config->xuanxuan, 'sslkey', ''), "placeholder='{$lang->chat->placeholder->xxd->sslkey}' class='form-control'");?></td>
          <td></td>
        </tr>
        <tr>
          <th><?php echo $lang->chat->xxd->uploadFileSize;?></th>
          <td>
            <?php if($type == 'edit'):?>
            <div class='input-group'>
              <span class='input-group-addon'><?php echo $lang->chat->xxd->max;?></span>
              <?php echo html::input('uploadFileSize', zget($config->xuanxuan, 'uploadFileSize', 20), "class='form-control' placeholder='{$lang->chat->placeholder->xxd->uploadFileSize}' ");?>
              <span class='input-group-addon'>M</span>
            </div>
            <?php else:?>
            <?php echo $lang->chat->xxd->max . zget($config->xuanxuan, 'uploadFileSize', 20) . 'M';?>
            <?php endif;?>
          </td>
          <td></td>
        </tr>
        <?php if(!$type):?>
        <tr>
          <th><?php echo $lang->chat->xxd->os;?></th>
          <td><?php echo html::select('os', $lang->chat->osList, zget($config->xuanxuan, $os), "class='form-control chosen'");?></td>
          <td></td>
        </tr>
        <?php endif;?>
        <tr>
          <th></th>
          <td colspan='2'>
            <?php if($type == 'edit'):?>
              <?php echo html::submitButton();?>
              <?php if(!empty($config->xuanxuan->server)):?>
                <?php echo html::a(helper::createLink('site', 'setxuanxuan'), $lang->goback, "class='btn'");?>
              <?php endif;?>
            <?php else:?>
              <?php echo html::a(helper::createLink('site', 'downloadXXD', 'type=config'), $lang->chat->downloadConfig, "class='btn btn-primary download'");?>
              <?php echo html::a(helper::createLink('site', 'downloadXXD', 'type=package'), $lang->chat->downloadXXD, "class='btn btn-primary download download-package' target='_blank'");?>
              <?php echo html::a(helper::createLink('site', 'setxuanxuan', 'type=edit'), $lang->chat->changeSetting, "class='btn'");?>
            <?php endif;?>
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include '../../../common/view/footer.admin.html.php';?>
