<?php
$config->score->counts->question     = 5;
$config->score->counts->answer       = 5;
$config->score->counts->setAsFAQ     = 50;
$config->score->counts->delQuestion  = 10;
$config->score->counts->delAnswer    = 10;

$config->score->methodOptions['question']    = 'punish';
$config->score->methodOptions['answer']      = 'award';
$config->score->methodOptions['setasfaq']    = 'award';
$config->score->methodOptions['delquestion'] = 'punish';
$config->score->methodOptions['delanswer']   = 'punish';
