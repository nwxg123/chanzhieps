<?php
$config->score->setCountsNav[] = 'setLevel';

if(commonModel::isAvailable('sect'))
{
    $config->score->setCountsNav[] = 'setSect';
    $config->score->ruleNav[]      = 'sectRule';
}
