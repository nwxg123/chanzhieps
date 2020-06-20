<?php
/* Display form list in content tab. */
$articles = explode(',', $config->block->categoryList->article);
$config->block->categoryList->article = '';
foreach($articles as $type)
{
    $config->block->categoryList->article .= $type . ',';
    if($type == 'pageList') $config->block->categoryList->article .= 'formList,';
}

/* Display form_view below system col in pages view of block.*/
$config->block->pageGroupList->system[] = 'form_view';

$config->block->defaultIcons['formList'] = 'icon-list-ul';
