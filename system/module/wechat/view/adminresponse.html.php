<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The admin response view file of wechat module of chanzhiEPS.
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
<section class='main-table'>
  <header class='clearfix'>
    <ul class='nav nav-tabs-main pull-left'>
      <li class='active'>
        <?php echo html::a(inlink('admin'), $lang->wechat->response->list);?>
      </li>
    </ul>
    <div class='pull-right btn-toolbar'>
      <?php echo html::backButton();?>
      <?php commonModel::printLink('wechat', 'setResponse', "publicID=$publicID", $lang->wechat->response->create, "class='btn btn-primary' data-toggle='modal'");?>
    </div>
  </header>
  <table class='table table-hover tablesorter table-fixed'>
    <thead>
      <tr class='text-center'>
        <th class='w-180px'><?php echo $lang->wechat->response->keywords;?></th>
        <th class='w-100px'><?php echo $lang->wechat->response->type;?></th>
        <th class='w-100px'><?php echo $lang->wechat->response->source;?></th>
        <th>                <?php echo $lang->wechat->response->block;?></th>
        <th class="text-center actions w-30px"><?php echo $lang->edit;?></th>
        <th class="text-center actions w-30px"><?php echo $lang->delete;?></th>
        <th class="text-center actions w-10px"></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($responseList as $response):?>
      <tr class='text-center'>
        <td><?php echo $response->key;?></td>
        <td><?php echo $lang->wechat->response->typeList[$response->type];?></td>
        <?php if($response->type == 'news'):?>
        <td><?php echo $lang->wechat->response->newsBlockList[$response->params->block];?></td>
        <?php elseif($response->type == 'link'):?>
        <td><?php echo $moduleList[$response->source];?></td>
        <?php elseif($response->type == 'text'):?>
        <td><?php echo $lang->wechat->response->textBlockList[$response->source];?></td>
        <?php endif;?>
        <td>
          <?php 
          if($response->type == 'news')
          {
              if(strpos(strtolower($response->params->block), 'article') !== false)
              {
                  foreach($response->params->category as $category) if(isset($articleCategory[$category])) echo $articleCategory[$category] . ' ';
                  if($response->params->limit) echo '<br /><strong>' . $lang->wechat->response->limit . '</strong>' . $lang->colon . $response->params->limit;
              }
              else
              {
                  echo "<strong>{$lang->wechat->response->category}{$lang->colon}</strong>";
                  foreach($response->params->category as $category) if(isset($productCategory[$category])) echo $productCategory[$category] . ' ';
                  if($response->params->limit) echo '<strong>' . $lang->wechat->response->limit . '</strong>' . $lang->colon . $response->params->limit;
              }
          } 
          else
          {
              echo $response->content;
          }
          ?>
        </td>
        <td class='c-actions'>
        <?php commonModel::printLink('wechat', 'setResponse', "public={$response->public}&group={$response->group}&key=$response->key", "<i class='icon icon-edit'></i>", "data-toggle='modal' class='btn btn-icon'");?>
        </td>
        <td class='c-actions'>
        <?php commonModel::printLink('wechat', 'deleteResponse', "responseID=$response->id", "<i class='icon icon-delete'></i>", "class='btn btn-icon deleter'");?>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</section>
<?php include '../../common/view/footer.admin.html.php';?>
