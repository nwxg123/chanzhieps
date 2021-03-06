<?php
if(!isset($lang->block)) $lang->block = new stdclass();
if(!isset($lang->block->default)) $lang->block->default = new stdclass();
if(!isset($lang->block->mobile))  $lang->block->mobile  = new stdclass();
if(!isset($lang->block->default->regions)) $lang->block->default->regions = new stdclass();
if(!isset($lang->block->default->layout))  $lang->block->default->layout = new stdclass();
if(!isset($lang->block->mobile->layout))   $lang->block->mobile->layout = new stdclass();

$lang->block->default->typeList['formList'] = '表单列表';

$lang->block->default->typeGroups['formList'] = 'form';

/* Lang config of the form layout under default. */
$lang->block->default->pages['form_view'] = '表单';

$lang->block->default->regions->form_view['topBanner']    = '上部通栏';
$lang->block->default->regions->form_view['top']          = '上部';
$lang->block->default->regions->form_view['bottom']       = '底部';
$lang->block->default->regions->form_view['side']         = '侧边';
$lang->block->default->regions->form_view['bottomBanner'] = '底部通栏';

/* Lang config of the form layout under mobile. */
$lang->block->mobile->pages['form_view'] = '表单';

$lang->block->mobile->regions->form_view['top']    = '上部';
$lang->block->mobile->regions->form_view['bottom'] = '底部';

$lang->block->default->layout->form_view = array();
$lang->block->default->layout->form_view = isset($lang->block->default->layout->article_browse) ? $lang->block->default->layout->article_browse : '';
$lang->block->mobile->layout->form_view  = array();
$lang->block->mobile->layout->form_view  = isset($lang->block->mobile->layout->article_browse) ? $lang->block->mobile->layout->article_browse : '' ;
