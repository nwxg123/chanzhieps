<?php
$lang->order->track          = '物流';
$lang->order->edit           = '編輯';
$lang->order->savePay        = '回款';
$lang->order->pay            = '付款';
$lang->order->contact        = '收貨姓名';
$lang->order->phone          = '手機號';
$lang->order->zipcode        = '郵編';
$lang->order->deliveryStatus = '發貨狀態';
$lang->order->sn             = '交易號';
$lang->order->balance        = '餘額支付';
$lang->order->needToPay      = "<span>還需支付 <strong id='remainAmount' class='text-lg text-danger'>%s</strong></span>";

$lang->order->createApi = '添加介面';
$lang->order->editApi   = '編輯介面';
$lang->order->deleteApi = '刪除介面';
$lang->order->adminApi  = '介面設置';

$lang->order->alipayParam    = '支付寶參數';
$lang->order->wechatpayParam = '微信支付參數';

$lang->order->wechatpay  = '微信支付';
$lang->order->wechatScan = '請使用微信掃一掃<br>掃瞄二維碼支付';

$lang->order->wechatpayAppid     = '公眾號APPID';
$lang->order->wechatpayMchid     = '商戶號';
$lang->order->wechatpayApiKey    = '支付密鑰';
$lang->order->wechatpayAppSecret = '公眾號密鑰';
$lang->order->wechatpayNote      = '如果微信長時間未打開，建議您返回選擇其他方式';

$lang->order->rechargeSuccess  = '充值成功';
$lang->order->viewBalance      = '餘額明細';

$lang->order->review          = '審核取消';
$lang->order->editPrice       = '改價';
$lang->order->message         = '留言';
$lang->order->cancelReason    = '取消原因';
$lang->order->sendto          = '發信給';
$lang->order->scanCode        = '微信掃碼支付';
$lang->order->invokeWechatpay = '正在調用微信支付';
$lang->order->payFaild        = '支付失敗';

$lang->order->paymentList = array();
$lang->order->paymentList['wechatpay']     = '微信支付';
$lang->order->paymentList['alipay']        = '支付寶即時到帳';
$lang->order->paymentList['COD']           = '貨到付款';
$lang->order->paymentList['balance']       = '餘額支付';
$lang->order->paymentList['offlinepay']    = '綫下支付';

$lang->order->api = new stdclass();
$lang->order->api->common          = '自定義介面';
$lang->order->api->id              = '編號';
$lang->order->api->method          = '傳遞方式';
$lang->order->api->debug           = '調試';
$lang->order->api->action          = '動作';
$lang->order->api->url             = '介面地址';
$lang->order->api->params          = '參數';
$lang->order->api->key             = '參數名';
$lang->order->api->value           = '參數值';
$lang->order->api->createValue     = '自定義';

$lang->order->api->list   = '介面列表';
$lang->order->api->create = '添加介面';
$lang->order->api->edit   = '編輯介面';
$lang->order->api->delete = '刪除介面';

$lang->order->api->actionList['order']           = '下單';
$lang->order->api->actionList['pay']             = '支付成功';
$lang->order->api->actionList['delivery']        = '發貨';
$lang->order->api->actionList['confirmDelivery'] = '確認收貨';

$lang->order->deliverList['not_send']  = '待發貨';
$lang->order->deliverList['send']      = '已發貨';
$lang->order->deliverList['confirmed'] = '已收貨';
    
$lang->order->api->turnonList[1] = '打開';
$lang->order->api->turnonList[0] = '關閉';

$lang->order->api->methodList['get']  = 'GET';
$lang->order->api->methodList['post'] = 'POST';

$lang->order->api->valueList['']                 = '';
$lang->order->api->valueList['id']               = '訂單ID';
$lang->order->api->valueList['account']          = '下單賬戶';
$lang->order->api->valueList['amount']           = '訂單金額';
$lang->order->api->valueList['status']           = '訂單狀態';
$lang->order->api->valueList['payment']          = '支付方式';
$lang->order->api->valueList['address']          = '收貨地址';
$lang->order->api->valueList['createdDate']      = '下單時間';
$lang->order->api->valueList['paidDate']         = '支付時間';
$lang->order->api->valueList['paidStatus']       = '支付狀態';
$lang->order->api->valueList['deliveriedDate']   = '發貨時間';
$lang->order->api->valueList['deliveriedBy']     = '由誰發貨';
$lang->order->api->valueList['deliveriedStatus'] = '發貨狀態';
$lang->order->api->valueList['express']          = '快遞單號';
$lang->order->api->valueList['finishedDate']     = '完成時間';
$lang->order->api->valueList['finishedBy']       = '由誰完成';
$lang->order->api->valueList['cancelReason']     = '取消原因';

$lang->order->sendSubject       = '您有新的訂單';
$lang->order->toAdminContent    = "您好：<strong>%s</strong>(%s)上有新的訂單：%s于%s下單支付%s，請及時處理。";
$lang->order->toCustomerContent = "%s 您好：您在[%s]上購買的商品已使用%s發貨，快遞單號%s。";

$lang->order->sendNoticeSubject['pay']    = '您有新的訂單';
$lang->order->sendNoticeSubject['cancel'] = '您的網站有訂單取消';

$lang->order->toAdminNoticeContent['pay']    = "您好：<strong>%s</strong>(%s)上有新的訂單：%s于%s下單支付%s，請及時處理。";
$lang->order->toAdminNoticeContent['cancel'] = "您好：<strong>%s</strong>(%s)上有用戶取消訂單：%s取消訂單，取消原因為%s，請及時處理。";

$lang->order->placeholder->appid      = '微信分配的公眾賬號ID';
$lang->order->placeholder->mchid      = '微信支付分配的商戶號';
$lang->order->placeholder->apikey     = '微信支付API安全密鑰';
$lang->order->placeholder->appsecret  = '微信公眾號密鑰';
$lang->order->placeholder->sendto     = '選擇有新訂單時要通知的管理員';
$lang->order->placeholder->useScore   = "最多可用<strong id='maxScoreLabel' class='text-warning'> %s </strong>積分，現有<strong class='text-warning'>%s</strong>積分 ";
$lang->order->placeholder->scoreError = '最多可用<strong>%s</strong>積分';
$lang->order->placeholder->useBalance = "使用餘額，當前 <span class='text-important'>%s</span>";

$lang->order->balanceKeyRequired  = '需要設定餘額數據加密密鑰';
$lang->order->balanceKey          = '餘額加密密鑰';
$lang->order->balanceKeyTip       = '為使餘額數據存儲更安全，請設置加密密鑰。密鑰設置後，不可再修改';
$lang->order->balanceParam        = '餘額支付參數';
$lang->order->balanceKeyStable    = '餘額加密密鑰只能初始化設置一次';
$lang->order->balanceKeyAuthority = '需要修改寫入檔案的權限，Linux下的運行命令為<code>%s</code>';

$lang->order->types['recharge'] = '充值';

$lang->order->useScore['1'] = '使用積分';
