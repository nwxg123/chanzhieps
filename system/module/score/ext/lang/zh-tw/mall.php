<?php
$lang->score->setLevel  = '會員等級';
$lang->score->level     = '等級名稱';
$lang->score->code      = '等級代號';
$lang->score->standard  = '最低積分';
$lang->score->tip       = '提示 : 1，等級代號一旦設定，不可以再次修改。 2，最低等級的最低積分推薦設置為0';

$lang->score->placeholder = new stdclass();
$lang->score->placeholder->code  = '字母或者數字';
$lang->score->placeholder->level = '用戶等級';
$lang->score->placeholder->score = '此等級的最低等級積分';

$lang->score->methods['expend']          = '消費';
$lang->score->methods['expendproduct']   = '每消費1元';
$lang->score->methods['rechargebalance'] = '每充值1元餘額';
$lang->score->methods['recharge']        = '充值餘額';
$lang->score->methods['exchangeRatio']   = '積分購買商品價格';
$lang->score->methods['exchangeLimit']   = '兌換商品上限';
$lang->score->methods['order']           = '訂單兌換';
$lang->score->methods['cancelorder']     = '取消兌換';

$lang->score->dataType['code']  = '等級代號';
$lang->score->dataType['level'] = '等級名稱';
$lang->score->dataType['score'] = '最低積分';

$lang->score->errorType['duplication'] = '有重複項，請修改後再保存';
$lang->score->errorType['lack']        = '與代號數目不匹配，請修改後再保存';
