<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The admin browse view file of tag module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Xiying Guan<guanxiying@xirangit.com>
 * @package     tag
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<section class='main-table'>
  <header class='clearfix'>
    <div class='pull-right btn-toolbar'>
      <form method='post' class='input-control search-box has-icon-right' data-ride='searchbox'>
        <?php echo html::input('tag', $this->post->tag, "class='form-control search-query' placeholder='{$lang->tag->inputTag}'");?>
        <button type="submit" class="btn btn-link input-control-icon-right search-submit-btn"><i class="icon icon-search icon-lg"></i></button>
      </form>
    </div>
  </header>
  <table class='table table-hover tablesorter table-fixed'>
    <thead>
      <tr class='text-center'>
        <?php $vars = "orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}";?>
        <th class='col-xs-3'><?php commonModel::printOrderLink('tag',  $orderBy, $vars, $lang->tag->common);?></th>
        <th class='col-xs-1'><?php commonModel::printOrderLink('rank_asc,id', $orderBy, $vars, $lang->tag->rank);?></th>
        <th>                 <?php commonModel::printOrderLink('link', $orderBy, $vars, $lang->tag->link);?></th>
        <th class='col-xs-2'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($tags as $tag):?>
      <tr class='text-center text-gray text-middle'>
        <td><?php echo html::a(inlink('source', "tag=$tag->tag"), $tag->tag, "data-toggle='modal'");?></td>
        <td><?php echo $tag->rank;?></td>
        <td class='text-left'><?php echo $tag->link;?></td>
        <td>
          <?php commonModel::printLink('tag', 'link', "id=$tag->id", $lang->tag->editLink, "data-toggle='modal'"); ?>
          <?php commonModel::printLink('tag', 'delete', "id=$tag->id", $lang->tag->delete, "class='deleter'"); ?>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
    <tfoot><tr><td colspan='4'><?php $pager->show();?></td></tr></tfoot>
  </table>
</section>
<?php include '../../common/view/footer.admin.html.php';?>
