<?php
if(!isset($config->search)) $config->search = new stdclass();
if(!isset($config->search->fields)) $config->search->fields = new stdclass();
if(!isset($config->search->fields->article)) $config->search->fields->article = new stdclass();

$config->search->fields->article->video = 'video';

$config->search->fields->video = $config->search->fields->article;
