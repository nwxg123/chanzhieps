<?php
$lang->order->track          = 'Track';
$lang->order->edit           = 'Edit';
$lang->order->savePay        = 'SavePay';
$lang->order->pay            = 'Pay';
$lang->order->contact        = 'Contract';
$lang->order->phone          = 'Mobile';
$lang->order->zipcode        = 'Zipcode';
$lang->order->deliveryStatus = 'Delivery';
$lang->order->sn             = 'SN';
$lang->order->balance        = 'Balance';
$lang->order->needToPay      = "<span>Need to Pay <strong id='remainAmount' class='text-lg text-danger'>%s</strong></span>";
$lang->order->paypalThanks   = "Thank you for choosing our product. Your order will be delivered once your payment is confirmed. Contact us if any questions, <a href='%s' target='_blank'>Contact Us</a>";
$lang->order->selectProduct  = "Product";

$lang->order->createApi = 'Create';
$lang->order->editApi   = 'Edit';
$lang->order->deleteApi = 'Delete';
$lang->order->adminApi  = 'Manage';

$lang->order->paypalParam = 'Paypal Parameters';

$lang->order->paypalAccount  = 'Account';
$lang->order->paypalPassword = 'Password';
$lang->order->paypalSign     = 'Signature';

$lang->order->rechargeSuccess  = 'Recharge Successfully';
$lang->order->viewBalance      = 'View Balance';

$lang->order->review          = 'Review';
$lang->order->editPrice       = 'Edit Price';
$lang->order->message         = 'Message';
$lang->order->cancelReason    = 'Reason';
$lang->order->sendto          = 'Send to';
$lang->order->payFaild        = 'Fail to pay';

$lang->order->paymentList = array();
$lang->order->paymentList['wechatpay']     = 'Wechatpay';
$lang->order->paymentList['alipay']        = 'Alipay';
$lang->order->paymentList['alipaySecured'] = 'Alipay Secured';
$lang->order->paymentList['COD']           = 'COD';
$lang->order->paymentList['paypal']        = 'Paypal';
$lang->order->paymentList['balance']       = 'Balance Pay';
$lang->order->paymentList['offlinepay']    = 'Offline Pay';

$lang->order->api = new stdclass();
$lang->order->api->common          = 'API';
$lang->order->api->id              = 'ID';
$lang->order->api->method          = 'Method';
$lang->order->api->debug           = 'Debug';
$lang->order->api->action          = 'Action';
$lang->order->api->url             = 'URL';
$lang->order->api->params          = 'Params';
$lang->order->api->key             = 'Key';
$lang->order->api->value           = 'Value';
$lang->order->api->createValue     = 'Customize';

$lang->order->api->list   = 'API List';
$lang->order->api->create = 'Create';
$lang->order->api->edit   = 'Edit';
$lang->order->api->delete = 'Delete';

$lang->order->api->actionList['order']           = 'Order';
$lang->order->api->actionList['pay']             = 'Pay';
$lang->order->api->actionList['delivery']        = 'Delivery';
$lang->order->api->actionList['confirmDelivery'] = 'Confirm Delivery';

$lang->order->deliverList['not_send']  = 'Not Send';
$lang->order->deliverList['send']      = 'Sended';
$lang->order->deliverList['confirmed'] = 'Confirmed';

$lang->order->api->turnonList[1] = 'Open';
$lang->order->api->turnonList[0] = 'Close';

$lang->order->api->methodList['get']  = 'GET';
$lang->order->api->methodList['post'] = 'POST';

$lang->order->api->valueList['']                 = '';
$lang->order->api->valueList['id']               = 'Order ID';
$lang->order->api->valueList['account']          = 'Account';
$lang->order->api->valueList['amount']           = 'Amount';
$lang->order->api->valueList['status']           = 'Status';
$lang->order->api->valueList['payment']          = 'Payment';
$lang->order->api->valueList['address']          = 'Address';
$lang->order->api->valueList['createdDate']      = 'Created on';
$lang->order->api->valueList['paidDate']         = 'Paid on';
$lang->order->api->valueList['paidStatus']       = 'Paid Status';
$lang->order->api->valueList['deliveriedDate']   = 'Delivered on';
$lang->order->api->valueList['deliveriedBy']     = 'Delivered By';
$lang->order->api->valueList['deliveriedStatus'] = 'Delivered Status';
$lang->order->api->valueList['express']          = 'Express';
$lang->order->api->valueList['finishedDate']     = 'Finished on';
$lang->order->api->valueList['finishedBy']       = 'Finished By';
$lang->order->api->valueList['cancelReason']     = 'Cancel Reason';

$lang->order->sendSubject       = 'You have a new order';
$lang->order->toAdminContent    = "You have a new order on <strong>%s</strong>(%s). %s placed an order at %s.";
$lang->order->toCustomerContent = "Hi %s, your order placed on [%s] have been delivered by %s. The tracking number is %s.";

$lang->order->sendNoticeSubject['pay']    = 'You have a new order';
$lang->order->sendNoticeSubject['cancel'] = 'You have new order canceled in your site';

$lang->order->toAdminNoticeContent['pay']    = "<strong>%s</strong>(%s) have a new order %s in %s pay %s. Please check!";
$lang->order->toAdminNoticeContent['cancel'] = "<strong>%s</strong>(%s) have a new order canceled %s. The reason is %s.";

$lang->order->placeholder->mch_id     = $lang->order->placeholder->mchid;
$lang->order->placeholder->sendto     = 'Select Administrators to noitfy when there is a new order.';
$lang->order->placeholder->useScore   = "Maximum<strong id='maxScoreLabel' class='text-warning'> %s </strong>points can be used. <strong class='text-warning'>%s</strong> points for this order.";
$lang->order->placeholder->scoreError = 'Maximum <strong>%s</strong> points can be applied.';
$lang->order->placeholder->useBalance = "Use the balance. Now you have <span class='text-important'>%s</span>.";

$lang->order->placeholder->account  = 'Enter your Paypal account';
$lang->order->placeholder->password = 'Enter your Paypal password';
$lang->order->placeholder->sign     = 'Enter your Paypal signature';

$lang->order->balanceKeyRequired  = 'Please set the secret key for the balance';
$lang->order->balanceKey          = 'Balance Encryption Key';
$lang->order->balanceKeyTip       = 'The key once set cannot be edited.';
$lang->order->balanceParam        = 'Balance Encryption Key';
$lang->order->balanceKeyStable    = 'The key can be edited once.';
$lang->order->balanceKeyAuthority = 'Change the write privilege of the file. Run <code>%s</code>';

$lang->order->types['recharge']    = 'Recharge';

$lang->order->useScore['1'] = 'Use points';
