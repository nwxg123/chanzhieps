<?php
if(!isset($config->article)) $config->article = new stdclass();
if(!isset($config->article->require)) $config->article->require = new stdclass();
$config->article->require->video = 'categories, title';
