<?php
if(!isset($lang->block)) $lang->block = new stdclass();
if(!isset($lang->block->default)) $lang->block->default = new stdclass();
if(!isset($lang->block->default->regions)) $lang->block->default->regions = new stdclass();

$lang->block->default->typeList['formList'] = '表單列表';

$lang->block->default->typeGroups['formList'] = 'form';

/* Lang config of the form layout under default. */
$lang->block->default->pages['form_view'] = '表單';

$lang->block->default->regions->form_view['topBanner']    = '上部通欄';
$lang->block->default->regions->form_view['top']          = '上部';
$lang->block->default->regions->form_view['bottom']       = '底部';
$lang->block->default->regions->form_view['side']         = '側邊';
$lang->block->default->regions->form_view['bottomBanner'] = '底部通欄';

/* Lang config of the form layout under mobile. */
$lang->block->mobile->pages['form_view'] = '表單';

$lang->block->mobile->regions->form_view['top']    = '上部';
$lang->block->mobile->regions->form_view['bottom'] = '底部';
