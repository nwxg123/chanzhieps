<?php 
$lastType = end($config->search->buildOrder);;
$config->search->buildOrder[$lastType]  = 'question';
$config->search->buildOrder['question'] = 'faq';

$config->search->fields->faq = new stdclass();
$config->search->fields->faq->id         = 'id';
$config->search->fields->faq->title      = 'request';
$config->search->fields->faq->content    = 'answer';
$config->search->fields->faq->status     = 'status';
$config->search->fields->faq->addedDate  = 'addedTime';
$config->search->fields->faq->editedDate = 'editedDate';
$config->search->fields->faq->params     = 'category';

$config->search->fields->question = new stdclass();
$config->search->fields->question->id         = 'id';
$config->search->fields->question->title      = 'title';
$config->search->fields->question->content    = 'desc,comment,answers';
$config->search->fields->question->status     = 'status';
$config->search->fields->question->addedDate  = 'addedDate';
$config->search->fields->question->editedDate = 'editedDate';
$config->search->fields->question->params     = 'category';
