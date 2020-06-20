<?php
$config->order->require->savepay       = 'sn,payment,payStatus';
$config->order->processViews->recharge = 'processrecharge';

$config->order->orderStatusList = array('not_paid', 'not_send', 'send', 'finished', 'canceled', 'expired');
