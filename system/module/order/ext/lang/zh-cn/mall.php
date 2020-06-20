<?php
$lang->order->track          = '物流';
$lang->order->edit           = '编辑';
$lang->order->savePay        = '回款';
$lang->order->pay            = '付款';
$lang->order->contact        = '收货姓名';
$lang->order->phone          = '手机号';
$lang->order->zipcode        = '邮编';
$lang->order->deliveryStatus = '发货状态';
$lang->order->sn             = '交易号';
$lang->order->balance        = '余额支付';
$lang->order->needToPay      = "<span>还需支付 <strong id='remainAmount' class='text-lg text-danger'>%s</strong></span>";
$lang->order->paypalThanks   = "感谢选购我们的产品，正在查询PAYPAL支付结果，我们将在确认到帐后给您发货，如有其他问题请 <a href='%s' target='_blank'>联系我们</a>";
$lang->order->selectProduct  = "按照产品搜索";

$lang->order->createApi = '添加接口';
$lang->order->editApi   = '编辑接口';
$lang->order->deleteApi = '删除接口';
$lang->order->adminApi  = '接口设置';

$lang->order->paypalParam = 'paypal 参数';

$lang->order->paypalAccount  = 'API用户名';
$lang->order->paypalPassword = 'API密码';
$lang->order->paypalSign     = '签名';

$lang->order->rechargeSuccess  = '充值成功';
$lang->order->viewBalance      = '余额明细';

$lang->order->review          = '审核取消';
$lang->order->editPrice       = '改价';
$lang->order->message         = '留言';
$lang->order->cancelReason    = '取消原因';
$lang->order->sendto          = '发信给';
$lang->order->payFaild        = '支付失败';

$lang->order->paymentList = array();
$lang->order->paymentList['wechatpay']     = '微信支付';
$lang->order->paymentList['alipay']        = '支付宝即时到帐';
$lang->order->paymentList['alipaySecured'] = '支付宝担保交易';
$lang->order->paymentList['COD']           = '货到付款';
$lang->order->paymentList['paypal']        = 'paypal';
$lang->order->paymentList['balance']       = '余额支付';
$lang->order->paymentList['offlinepay']    = '线下支付';

$lang->order->api = new stdclass();
$lang->order->api->common          = '自定义接口';
$lang->order->api->id              = '编号';
$lang->order->api->method          = '传递方式';
$lang->order->api->debug           = '调试';
$lang->order->api->action          = '动作';
$lang->order->api->url             = '接口地址';
$lang->order->api->params          = '参数';
$lang->order->api->key             = '参数名';
$lang->order->api->value           = '参数值';
$lang->order->api->createValue     = '自定义';

$lang->order->api->list   = '接口列表';
$lang->order->api->create = '添加接口';
$lang->order->api->edit   = '编辑接口';
$lang->order->api->delete = '删除接口';

$lang->order->api->actionList['order']           = '下单';
$lang->order->api->actionList['pay']             = '支付成功';
$lang->order->api->actionList['delivery']        = '发货';
$lang->order->api->actionList['confirmDelivery'] = '确认收货';

$lang->order->deliverList['not_send']  = '待发货';
$lang->order->deliverList['send']      = '已发货';
$lang->order->deliverList['confirmed'] = '已收货';
    
$lang->order->api->turnonList[1] = '打开';
$lang->order->api->turnonList[0] = '关闭';

$lang->order->api->methodList['get']  = 'GET';
$lang->order->api->methodList['post'] = 'POST';

$lang->order->api->valueList['']                 = '';
$lang->order->api->valueList['id']               = '订单ID';
$lang->order->api->valueList['account']          = '下单账户';
$lang->order->api->valueList['amount']           = '订单金额';
$lang->order->api->valueList['status']           = '订单状态';
$lang->order->api->valueList['payment']          = '支付方式';
$lang->order->api->valueList['address']          = '收货地址';
$lang->order->api->valueList['createdDate']      = '下单时间';
$lang->order->api->valueList['paidDate']         = '支付时间';
$lang->order->api->valueList['paidStatus']       = '支付状态';
$lang->order->api->valueList['deliveriedDate']   = '发货时间';
$lang->order->api->valueList['deliveriedBy']     = '由谁发货';
$lang->order->api->valueList['deliveriedStatus'] = '发货状态';
$lang->order->api->valueList['express']          = '快递单号';
$lang->order->api->valueList['finishedDate']     = '完成时间';
$lang->order->api->valueList['finishedBy']       = '由谁完成';
$lang->order->api->valueList['cancelReason']     = '取消原因';

$lang->order->sendSubject       = '您有新的订单';
$lang->order->toAdminContent    = "您好：<strong>%s</strong>(%s)上有新的订单：%s于%s下单支付%s，请及时处理。";
$lang->order->toCustomerContent = "%s 您好：您在[%s]上购买的商品已使用%s发货，快递单号%s。";

$lang->order->sendNoticeSubject['pay']    = '您有新的订单';
$lang->order->sendNoticeSubject['cancel'] = '您的网站有订单取消';

$lang->order->toAdminNoticeContent['pay']    = "您好：<strong>%s</strong>(%s)上有新的订单：%s于%s下单支付%s，请及时处理。";
$lang->order->toAdminNoticeContent['cancel'] = "您好：<strong>%s</strong>(%s)上有用户取消订单：%s取消订单，取消原因为%s，请及时处理。";

$lang->order->placeholder->mch_id     = $lang->order->placeholder->mchid;
$lang->order->placeholder->sendto     = '选择有新订单时要通知的管理员';
$lang->order->placeholder->useScore   = "最多可用<strong id='maxScoreLabel' class='text-warning'> %s </strong>积分，现有<strong class='text-warning'>%s</strong>积分 ";
$lang->order->placeholder->scoreError = '最多可用<strong>%s</strong>积分';
$lang->order->placeholder->useBalance = "使用余额，当前 <span class='text-important'>%s</span>";

$lang->order->placeholder->account  = '请填写 Paypal 商户账号';
$lang->order->placeholder->password = '请填写 Paypal API 密码';
$lang->order->placeholder->sign     = '请填写 Paypal 签名';

$lang->order->balanceKeyRequired  = '需要设定余额数据加密密钥';
$lang->order->balanceKey          = '余额加密密钥';
$lang->order->balanceKeyTip       = '为使余额数据存储更安全，请设置加密密钥。密钥设置后，不可再修改';
$lang->order->balanceParam        = '余额支付参数';
$lang->order->balanceKeyStable    = '余额加密密钥只能初始化设置一次';
$lang->order->balanceKeyAuthority = '需要修改写入文件的权限，Linux下的运行命令为<code>%s</code>';

$lang->order->types['recharge'] = '充值';

$lang->order->useScore['1'] = '使用积分';
