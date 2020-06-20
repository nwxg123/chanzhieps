<?php
$config->usercase->snap    = 0;
$config->usercase->crawler = 0;
$config->usercase->snapURL = 'http://snap.cnezsoft.com';

$config->usercase->editor                = new stdclass();
$config->usercase->editor->create        = array('id' => 'desc', 'tools' => 'simple');
$config->usercase->editor->edit          = array('id' => 'desc', 'tools' => 'simple');
$config->usercase->editor->allowableTags = '<p><span><h1><h2><h3><h4><em><u><strong><br><ol><ul><li><img><a>';
