<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The traffic view file of stat module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2010 QingDao Nature Easy Soft Network Technology Co,LTD (www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     stat
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/chart.html.php';?>
<?php js::set('lineLabels', $labels);?>
<?php js::set('lineChart', $lineChart);?>
<?php include '../../common/view/datepicker.html.php';?>
<div class='panel panel-head'>
  <div class='panel-heading'><strong><?php echo $lang->stat->todayTraffic;?></strong></div>
  <div class='panel-body'>
    <div class='panel-tag pull-left col-xs-4 text-center'>
      <div class='head-title'><?php echo $lang->stat->pv;?></div>
      <div class='today-number'><small><?php echo $lang->stat->today;?></small><?php echo $todayReport ? zget($todayReport, 'pv', 0) : 0;?></div>
      <div class='yesterday-number'><small><?php echo $lang->stat->yesterday;?></small><?php echo $yesterdayReport ? zget($yesterdayReport, 'pv', 0) : 0;?></div>
    </div>
    <div class='panel-tag pull-left col-xs-4 text-center'>
      <div class='head-title'><?php echo $lang->stat->uv;?></div>
      <div class='today-number'><?php echo $todayReport ? zget($todayReport, 'uv', 0) : 0;?></div>
      <div class='yesterday-number'><?php echo $yesterdayReport ? zget($yesterdayReport, 'uv', 0) : 0;?></div>
    </div>
    <div class='panel-tag pull-left col-xs-4 text-center'>
      <div class='head-title'><?php echo $lang->stat->ipCount;?></div>
      <div class='today-number'><?php echo $todayReport ? zget($todayReport, 'ip', 0) : 0;?></div>
      <div class='yesterday-number'><?php echo $yesterdayReport ? zget($yesterdayReport, 'ip', 0) : 0;?></div>
    </div>
  </div>
</div>
<div class='panel panel-nav'>
  <div class='panel-body'>
    <?php foreach($lang->stat->trafficModes as $code => $modeName):?>
    <?php $class = $mode == $code ? "class='active'" : '';?>
    <span <?php echo $class?>><?php echo html::a(inlink('summary', "mode=$code"), $modeName);?></span>
    <?php endforeach;?>
  </div>
</div>
<div class='panel panel-canvas'>
  <div class='panel-heading'><strong><?php echo $lang->stat->trendChart;?></strong></div>
  <div class='panel-top'>
    <?php foreach($lineChart as $lineData):?>
    <div class='outline pull-right'><span class='spot' style='background-color:<?php echo $lineData->color;?>'></span><?php echo $lineData->label;?></div>
    <?php endforeach;?>
  </div>
  <div class='chart-canvas'><canvas height='220' width='990' id='lineChart'></canvas></div>
</div>
<div class='widget'>
  <div class='panel panel-widget widget-left'>
    <div class='panel-heading'><strong><?php echo $lang->stat->top10->pageview;?></strong></div>
    <div class='panel-body'>
      <div class='panel-block'><span class='pull-right'><?php echo $lang->stat->pv;?></span></div>
      <?php foreach($top10PageView as $pageView):?>
      <div class='panel-block'><span class='pull-left text-ellipsis' title='<?php echo $pageView->item;?>'><?php echo $pageView->item;?></span><span class='pull-right'><?php echo $pageView->pv;?></span></div>
      <?php endforeach;?>
    </div>
  </div>
  <div class='panel panel-widget widget-right'>
    <div class='panel-heading'><strong><?php echo $lang->stat->top10->forum;?></strong></div>
    <div class='panel-body'>
      <div class='panel-block'><span class='pull-right'><?php echo $lang->stat->pv;?></span></div>
      <?php foreach($top10Forum as $thread):?>
      <div class='panel-block'>
        <span class='pull-left text-ellipsis' title='<?php echo $thread->title;?>'><?php echo html::a(commonModel::createFrontLink('thread', 'view', "threadID=$thread->id"), $thread->title, "target='_blank' class='text-muted'"); ?></span>
        <span class='pull-right'><?php echo $thread->views;?></span>
      </div>
      <?php endforeach;?>
    </div>
  </div>
  <div class='panel panel-widget widget-left'>
    <div class='panel-heading'><strong><?php echo $lang->stat->top10->article;?></strong></div>
    <div class='panel-body'>
      <div class='panel-block'><span class='pull-right'><?php echo $lang->stat->pv;?></span></div>
      <?php foreach($top10Article as $article):?>
      <div class='panel-block'>
        <span class='pull-left text-ellipsis' title='<?php echo $article->title;?>'><?php echo html::a($this->article->createPreviewLink($article->id), $article->title, "target='_blank' class='text-muted'");?></span>
        <span class='pull-right'><?php echo $article->views;?></span>
      </div>
      <?php endforeach;?>
    </div>
  </div>
  <div class='panel panel-widget widget-right'>
    <div class='panel-heading'><strong><?php echo $lang->stat->top10->product;?></strong></div>
    <div class='panel-body'>
      <div class='panel-block'><span class='pull-right'><?php echo $lang->stat->pv;?></span></div>
      <?php foreach($top10Product as $product):?>
      <div class='panel-block'>
        <span class='pull-left text-ellipsis' title='<?php echo $product->name;?>'><?php echo html::a($this->product->createPreviewLink($product->id), $product->name, "target='_blank' class='text-muted'");?></span>
        <span class='pull-right'><?php echo $product->views;?></span>
      </div>
      <?php endforeach;?>
    </div>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
