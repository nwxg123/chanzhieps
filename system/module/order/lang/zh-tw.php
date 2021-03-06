<?php if(!defined("RUN_MODE")) die();?>
<?php
$lang->order->common  = '訂單';

$lang->order->id                = 'ID';
$lang->order->orderNumber       = '訂單號';
$lang->order->productInfo       = '商品信息';
$lang->order->account           = '帳號';
$lang->order->address           = '收貨地址';
$lang->order->price             = '價格';
$lang->order->score             = '積分';
$lang->order->count             = '數量';
$lang->order->amount            = '金額';
$lang->order->category          = '產品分類';
$lang->order->sn                = '交易號';
$lang->order->look              = '查看';
$lang->order->startDate         = '開始時間';
$lang->order->endDate           = '結束時間';
$lang->order->payStatus         = '付款狀態';
$lang->order->paidDate          = '付款時間';
$lang->order->deliveryStatus    = '發貨狀態';
$lang->order->deliveriedDate    = '發貨時間';
$lang->order->confirmedDate     = '收貨時間';
$lang->order->payment           = '交易方式';
$lang->order->payAmount         = '交易金額';
$lang->order->createdDate       = '下單時間';
$lang->order->express           = '快遞公司';
$lang->order->waybill           = '快遞單號';
$lang->order->expressInfo       = '快遞詳情';
$lang->order->buyer             = '買家';
$lang->order->receiver          = '收貨人';
$lang->order->noRecord          = '無';
$lang->order->status            = '狀態';
$lang->order->orderStatus       = '訂單狀態';
$lang->order->orderTotal        = '訂單總量';
$lang->order->todoOrder         = '待處理訂單';
$lang->order->finishedOrder     = '已完成訂單';
$lang->order->note              = '買家留言';
$lang->order->frontNote         = '留言';
$lang->order->basic             = '基本信息';
$lang->order->type              = '類型';
$lang->order->info              = '訂單信息';
$lang->order->stat              = '訂單概覽';
$lang->order->savePay           = '回款';
$lang->order->edit              = '編輯';
$lang->order->contact           = '收貨姓名';
$lang->order->phone             = '手機號';
$lang->order->zipcode           = '郵編';
$lang->order->deliveryStatus    = '發貨狀態';
$lang->order->last              = '最後處理時間';
$lang->order->comment           = '備註';
$lang->order->manage            = '管理';
$lang->order->finish            = '完成';
$lang->order->moreLabels        = '更多篩選';

$lang->order->selectAddress     = '請選擇一個收貨地址';

$lang->order->paypalParam    = 'paypal 參數';
$lang->order->paypalAccount  = 'API用戶名';
$lang->order->paypalPassword = 'API密碼';
$lang->order->paypalSign     = '簽名';

$lang->order->deliverList['not_send']  = '待發貨';
$lang->order->deliverList['send']      = '已發貨';
$lang->order->deliverList['confirmed'] = '已收貨';

$lang->order->admin           = '訂單管理';
$lang->order->view            = '詳情';
$lang->order->setting         = '系統設置';
$lang->order->browse          = '我的訂單';
$lang->order->bought          = '查看已買商品';
$lang->order->createdSuccess  = '訂單創建成功！';
$lang->order->paidSuccess     = '恭喜，訂單支付成功！';
$lang->order->submit          = '提交訂單';
$lang->order->cancel          = '取消';
$lang->order->pay             = '支付';
$lang->order->goToPay         = '訂單創建成功，請到支付頁面完成付款。';
$lang->order->goToCart        = '返回購物車';
$lang->order->editPrice       = '改價';
$lang->order->return          = '收款';
$lang->order->refund          = '退款';
$lang->order->delivery        = '發貨';
$lang->order->delete          = '刪除';
$lang->order->finish          = '完成';
$lang->order->confirm         = '確認訂單信息';
$lang->order->selectProducts  = "選擇了 <strong class='text-danger'>%s</strong> 件商品，";
$lang->order->totalToPay      = "共計：<strong id='amount' class='text-lg text-danger'>%s</strong>";
$lang->order->amountToPay     = "合計金額：<strong id='total' class='text-lg text-danger'>%s</strong>";
$lang->order->cartProducts    = "共<strong>%s</strong> 件商品";
$lang->order->statistics      = "<strong class='text-danger'>%s</strong> 件商品共計:<strong id='amount' class='text-lg text-danger'>%s</strong>";
$lang->order->orderProducts   = "共<strong class='text-danger'>%s</strong> 件商品, 共計: <strong class='text-danger'>%s%s</strong>";
$lang->order->payInfo         = "%s %s 商品訂單";
$lang->order->goToBank        = "請在綫支付您的訂單。";
$lang->order->track           = '物流';
$lang->order->life            = '訂單跟蹤';
$lang->order->days            = '天';
$lang->order->deliveryInfo    = '查看詳情';
$lang->order->backToCart      = '修改';
$lang->order->paid            = '我已付款';
$lang->order->products        = '訂單產品';
$lang->order->selectPayment   = '選擇支付方式';
$lang->order->settlement      = '去結算';
$lang->order->check           = '訂單結算';
$lang->order->all             = '所有';
$lang->order->applyRefund     = '申請退款';
$lang->order->wechatpay       = '微信支付';
$lang->order->scanCode        = '微信掃碼支付';
$lang->order->wechatScan      = '請使用微信掃一掃<br>掃瞄二維碼支付';
$lang->order->inWechatTip     = '提示：微信瀏覽器不支持支付寶支付，如需使用支付寶支付，請複製本頁網址到其他瀏覽器進行操作';

$lang->order->confirmLimit         = '確認收貨周期';
$lang->order->expireLimit          = '訂單過期時間';
$lang->order->confirmReceived      = '確認收貨';
$lang->order->deliveryConfirmed    = '您的訂單已經確認收貨成功！';
$lang->order->confirmWarning       = "請收到貨後，再確認收貨！否則您可能錢貨兩空！";
$lang->order->cancelWarning        = "確認取消訂單？";
$lang->order->cancelSuccess        = "訂單已取消";
$lang->order->paymentRequired      = '需要至少一種交易方式';
$lang->order->confirmLimitRequired = '需要設定確認收貨周期';
$lang->order->finishWarning        = "確認完成訂單？";
$lang->order->noProducts           = "訂單中沒有產品";
$lang->order->lowStocks            = "<strong>%s</strong> 庫存不足";
$lang->order->invokeWechatpay      = '正在調用微信支付';

$lang->order->alipayParam    = '支付寶參數';
$lang->order->wechatpayParam = '微信支付參數';

$lang->order->alipayPid   = '合作者ID';
$lang->order->alipayKey   = '合作者KEY';
$lang->order->alipayEmail = '支付寶郵箱';

$lang->order->wechatpayAppid     = '公眾號APPID';
$lang->order->wechatpayMchid     = '商戶號';
$lang->order->wechatpayApiKey    = '支付密鑰';
$lang->order->wechatpayAppSecret = '公眾號密鑰';
$lang->order->wechatpayH5Status  = 'H5支付';
$lang->order->wechatpayNote      = '如果微信長時間未打開，建議您返回選擇其他方式';

$lang->order->placeholder = new stdclass();
$lang->order->placeholder->pid       = '合作身份者id，以2088開頭的16位純數字';
$lang->order->placeholder->key       = '安全檢驗碼，以數字和字母組成的32位字元';
$lang->order->placeholder->email     = '支付寶商家郵箱';
$lang->order->placeholder->appid     = '微信分配的公眾賬號ID';
$lang->order->placeholder->mchid     = '微信支付分配的商戶號';
$lang->order->placeholder->apikey    = '微信支付API安全密鑰';
$lang->order->placeholder->appsecret = '微信公眾號密鑰';
$lang->order->placeholder->note      = '選填，給賣家留言';

$lang->order->placeholder->account  = '請填寫 Paypal 商戶賬號';
$lang->order->placeholder->password = '請填寫 Paypal API 密碼';
$lang->order->placeholder->sign     = '請填寫 Paypal 簽名';

$lang->order->paymentList = array();
$lang->order->paymentList['alipay']        = '支付寶即時到帳';
$lang->order->paymentList['alipaySecured'] = '支付寶擔保交易';
$lang->order->paymentList['COD']           = '貨到付款';
$lang->order->paymentList['offlinepay']    = '綫下支付';
$lang->order->paymentList['wechatpay']     = '微信支付';

$lang->order->statusList = array();
$lang->order->statusList['not_paid']  = '待付款';
$lang->order->statusList['paid']      = '已付款';
$lang->order->statusList['not_send']  = '待發貨';
$lang->order->statusList['send']      = '待收貨';
$lang->order->statusList['confirmed'] = '已收貨';
$lang->order->statusList['normal']    = '進行中';
$lang->order->statusList['finished']  = '已完成';
$lang->order->statusList['canceled']  = '已取消';
$lang->order->statusList['refunding'] = '待退款';
$lang->order->statusList['refunded']  = '已退款';
$lang->order->statusList['expired']   = '已過期';

$lang->order->payStatusList = array();
$lang->order->payStatusList['not_paid']  = '未付款';
$lang->order->payStatusList['COD']       = '貨到付款';
$lang->order->payStatusList['paid']      = '已付款';
$lang->order->payStatusList['refunding'] = '待退款';
$lang->order->payStatusList['refunded']  = '已退款';

$lang->order->types = array();
$lang->order->types['shop']  = '商品訂單';
$lang->order->types['score'] = '積分訂單';

$lang->order->abbr = new stdclass();
$lang->order->abbr->paidDate       = '付款';
$lang->order->abbr->deliveriedDate = '發貨';
$lang->order->abbr->confirmedDate  = '收貨';
$lang->order->abbr->createdDate    = '下單';

$lang->order->labels = new stdclass();

$lang->order->labels->default = new stdclass();
$lang->order->labels->default->all         = '全部(%d)|mode=all&param=';
$lang->order->labels->default->waitPay     = '待付款(%d)|mode=payStatus&param=not_paid';
$lang->order->labels->default->waitSend    = '待發貨(%d)|mode=deliveryStatus&param=not_send';
$lang->order->labels->default->refunding   = '待退款(%d)|mode=payStatus&param=refunding';
$lang->order->labels->default->waitConfirm = '待收貨(%d)|mode=deliveryStatus&param=send';

$lang->order->labels->score = new stdclass();
$lang->order->labels->score->all      = '全部(%d)|mode=all&param=';
$lang->order->labels->score->waitPay  = '待付款(%d)|mode=payStatus&param=not_paid';
$lang->order->labels->score->finished = '已完成(%d)|mode=status&param=finished';

$lang->order->labels->hidden = new stdclass();
$lang->order->labels->hidden->confirmed   = '已收貨|mode=deliveryStatus&param=confirmed';
$lang->order->labels->hidden->finished    = '已完成|mode=status&param=finished';
$lang->order->labels->hidden->refunded    = '已退款|mode=payStatus&param=refunded';
$lang->order->labels->hidden->canceled    = '已取消|mode=status&param=canceled';
$lang->order->labels->hidden->expired     = '已過期|mode=status&param=expired';

$lang->order->orderStat = new stdclass();
$lang->order->orderStat->all       = '全部';
$lang->order->orderStat->today     = '今日';
$lang->order->orderStat->yesterday = '昨日';
$lang->order->orderStat->week      = '最近7天';
$lang->order->orderStat->month     = '最近30天';
