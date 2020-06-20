<?php
$lastKey = end($config->search->buildOrder);
$config->search->buildOrder[$lastKey] = 'usercase';

$config->search->fields->usercase = new stdclass();
$config->search->fields->usercase->id         = 'id';
$config->search->fields->usercase->title      = 'company';
$config->search->fields->usercase->content    = 'review,desc';
$config->search->fields->usercase->status     = 'status';
$config->search->fields->usercase->addedDate  = 'addedDate';
$config->search->fields->usercase->editedDate = '';
$config->search->fields->usercase->params     = '';
