<?php
$config->request->editor = new stdclass();
$config->request->editor->create        = array('id' => 'desc' , 'tools' => 'simple');
$config->request->editor->edit          = array('id' => 'desc' , 'tools' => 'simple');
$config->request->editor->reply         = array('id' => 'reply', 'tools' => 'simple');
$config->request->editor->doubt         = array('id' => 'comment,reply,evaluation' , 'tools' => 'simple');
$config->request->editor->request       = array('id' => 'desc' , 'tools' => 'simple');
$config->request->editor->allowableTags = '<p><span><h1><h2><h3><h4><em><u><strong><br><ol><ul><li><img><a>';

if(!isset($config->request->categoryRule)) $config->request->categoryRule = 'global';
