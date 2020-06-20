<?php
$config->ask->minScore   = 5;
$config->ask->maxImgSize = 500;

$config->ask->editor = new stdclass();
$config->ask->editor->ask           = array('id' => 'desc', 'tools' => 'simple');
$config->ask->editor->threadtoask   = array('id' => 'desc', 'tools' => 'simple');
$config->ask->editor->view          = array('id' => 'comment,content', 'tools' => 'simple');
$config->ask->editor->allowableTags = '<p><span><h1><h2><h3><h4><em><u><strong><br><ol><ul><li><img><a>';

$config->ask->require = new stdclass();
$config->ask->require->ask = 'title,desc,category';
