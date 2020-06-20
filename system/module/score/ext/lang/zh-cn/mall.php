<?php
$lang->score->setLevel  = '会员等级';
$lang->score->level     = '等级名称';
$lang->score->code      = '等级代号';
$lang->score->standard  = '最低积分';
$lang->score->tip       = '提示 : 1，等级代号一旦设定，不可以再次修改。 2，最低等级的最低积分推荐设置为0';

$lang->score->placeholder = new stdclass();
$lang->score->placeholder->code  = '字母或者数字';
$lang->score->placeholder->level = '用户等级';
$lang->score->placeholder->score = '此等级的最低等级积分';

$lang->score->methods['expend']          = '消费';
$lang->score->methods['expendproduct']   = '每消费1元';
$lang->score->methods['rechargebalance'] = '每充值1元余额';
$lang->score->methods['recharge']        = '充值余额';
$lang->score->methods['exchangeRatio']   = '积分购买商品价格';
$lang->score->methods['exchangeLimit']   = '兑换商品上限';
$lang->score->methods['order']           = '订单兑换';
$lang->score->methods['cancelorder']     = '取消兑换';

$lang->score->dataType['code']  = '等级代号';
$lang->score->dataType['level'] = '等级名称';
$lang->score->dataType['score'] = '最低积分';

$lang->score->errorType['duplication'] = '有重复项，请修改后再保存';
$lang->score->errorType['lack']        = '与代号数目不匹配，请修改后再保存';
