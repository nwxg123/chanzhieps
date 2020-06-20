<?php
$config->proVersion = array();
$config->proVersion['pro1_1']   = '5_3_4';
$config->proVersion['pro1_2']   = '5_4_1';
$config->proVersion['pro1_3']   = '5_6';
$config->proVersion['pro1_4']   = '6_0';
$config->proVersion['pro1_5']   = '6_4';
$config->proVersion['pro1_5_1'] = '6_4_1';
$config->proVersion['pro1_5_2'] = '6_6';
$config->proVersion['pro1_6']   = '6_6_1';
$config->proVersion['pro1_6_1'] = '6_7';
$config->proVersion['pro1_6_2'] = '7_0_1';
$config->proVersion['pro1_7']   = '7_1';

/* Files to delete. */
$config->delete['pro1_1'][] = 'system/module/tree/ext/model/extension.php';

$config->delete['pro1_7'][] = 'system/module/order/ext/control/ajaxcheckorder.php';
$config->delete['pro1_7'][] = 'system/module/order/ext/control/ajaxquery.php';
$config->delete['pro1_7'][] = 'system/module/order/ext/control/qrcode.php';
$config->delete['pro1_7'][] = 'system/module/order/ext/control/wechatpay.php';
$config->delete['pro1_7'][] = 'system/module/order/ext/model/class/wechat.class.php';
$config->delete['pro1_7'][] = 'system/module/order/ext/model/wechat.php';
$config->delete['pro1_7'][] = 'system/module/product/ext/model/class/wechatpay.class.php';
$config->delete['pro1_7'][] = 'system/module/product/ext/model/wechatpay.php';
$config->delete['pro1_7'][] = 'system/module/site/ext/view/setoauth.html.php';
$config->delete['pro1_7'][] = 'system/module/user/ext/control/login.php';
$config->delete['pro1_7'][] = 'system/module/user/ext/control/wechatbind.php';
$config->delete['pro1_7'][] = 'system/module/user/ext/lang/en/wechatlogin.php';
$config->delete['pro1_7'][] = 'system/module/user/ext/lang/zh-cn/wechatlogin.php';
$config->delete['pro1_7'][] = 'system/module/user/ext/model/class/wechat.class.php';
$config->delete['pro1_7'][] = 'system/module/user/ext/model/wechat.php';
$config->delete['pro1_7'][] = 'system/template/mobile/order/m.wechatpay.html.php';

$config->delete['pro1_8'][] = 'system/module/user/ext/control/oauthcallback.php';
$config->delete['pro1_9'][] = 'system/module/ui/ext/view/others.html.php';
$config->delete['pro1_9'][] = 'system/module/user/ext/view/m.profile.mall.html.hook.tpl.php';
