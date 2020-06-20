<?php
$lang->score->setLevel  = 'Set Level';
$lang->score->level     = 'Level';
$lang->score->code      = 'Alias';
$lang->score->standard  = 'Lowest Level';
$lang->score->tip       = ' Note 1. Once alias is set, it cannot be changed. 2. It is recommended to set minimun points of the lowest level to be 0.';

$lang->score->placeholder = new stdclass();
$lang->score->placeholder->code  = '';
$lang->score->placeholder->level = 'Level';
$lang->score->placeholder->score = 'Minimun points of the lowest level';

$lang->score->methods['expend']          = 'Consume';
$lang->score->methods['expendproduct']   = 'Every 1 dollar consumed';
$lang->score->methods['rechargebalance'] = 'Balance after each 1 dollar refill';
$lang->score->methods['recharge']        = 'Refill';
$lang->score->methods['exchangeRatio']   = 'Price when use points';
$lang->score->methods['exchangeLimit']   = 'Exchange Limit';
$lang->score->methods['order']           = 'Exhange in Order';
$lang->score->methods['cancelorder']     = 'Cancel Exchange';

$lang->score->dataType['code']  = 'Alias';
$lang->score->dataType['level'] = 'Level';
$lang->score->dataType['score'] = 'Minumum Points';

$lang->score->errorType['duplication'] = 'Duplicated items, Please edit and save.';
$lang->score->errorType['lack']        = 'It is not the sames as the number of Alias! Edit and save.';
