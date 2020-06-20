<?php
if(!isset($lang->block)) $lang->block = new stdclass();
if(!isset($lang->block->default)) $lang->block->default = new stdclass();
if(!isset($lang->block->mobile))  $lang->block->mobile  = new stdclass();
if(!isset($lang->block->default->regions)) $lang->block->default->regions = new stdclass();
if(!isset($lang->block->default->layout))  $lang->block->default->layout = new stdclass();
if(!isset($lang->block->mobile->layout))   $lang->block->mobile->layout = new stdclass();

$lang->block->default->typeList['formList'] = 'Form List';

$lang->block->default->typeGroups['formList'] = 'form';

/* Lang config of the form layout in default. */
$lang->block->default->pages['form_view'] = 'Form';

$lang->block->default->regions->form_view['topBanner']    = 'Top Banner';
$lang->block->default->regions->form_view['top']          = 'Top';
$lang->block->default->regions->form_view['bottom']       = 'Bottom';
$lang->block->default->regions->form_view['side']         = 'Side';
$lang->block->default->regions->form_view['bottomBanner'] = 'Bottom Banner';

/* Lang config of the form layout under mobile. */
$lang->block->mobile->pages['form_view'] = 'Form';

$lang->block->mobile->regions->form_view['top']    = 'Top';
$lang->block->mobile->regions->form_view['bottom'] = 'Bottom';

$lang->block->default->layout->form_view = array();
$lang->block->default->layout->form_view = isset($lang->block->default->layout->article_browse) ? $lang->block->default->layout->article_browse : '';
$lang->block->mobile->layout->form_view  = array();
$lang->block->mobile->layout->form_view  = isset($lang->block->mobile->layout->article_browse) ? $lang->block->mobile->layout->article_browse : '' ;
