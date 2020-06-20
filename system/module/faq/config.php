<?php
$config->faq         = new stdclass();
$config->faq->editor = new stdclass();
$config->faq->editor->edit   = array('id' => 'answer', 'tools' => 'simple');
$config->faq->editor->create = array('id' => 'answer', 'tools' => 'simple');

$config->faq->require = new stdclass();
$config->faq->require->create = 'categories,request,answer';
$config->faq->require->edit   = 'categories,request,answer';
