<?php
$lang->score->setLevel = '会员等级';
$lang->score->level    = '等级名称';
$lang->score->code     = '等级代号';
$lang->score->standard = '最低积分';
$lang->score->tip      = '提示 : 1，等级代号为字母或数字，一旦设定，不可以再次修改。 2，最低等级的最低积分推荐设置为0';

$lang->score->placeholder = new stdclass();
$lang->score->placeholder->code  = '字母或数字';
$lang->score->placeholder->level = '用户等级';
$lang->score->placeholder->score = '此等级的最低等级积分';

$lang->score->costFail     = '积分购买失败！';
$lang->score->goHome       = '返回首页';
$lang->score->insufficient = '积分不足，需要消费积分<strong>%s</strong>, 当前积分<strong> %s</strong>。';
$lang->score->setSect      = '设置门派';
$lang->score->sectCode     = '门派代号';
$lang->score->sectLevel    = '门派等级';
$lang->score->sectName     = '门派名称';
$lang->score->sectColor    = '门派主题';
$lang->score->sectTip      = '提示 : 等级代号一旦设定，不可以再次修改。';
$lang->score->sectRule     = '门派等级规则';

$lang->score->methods['buyObject']          = '使用积分访问';
$lang->score->methods['buyproduct']         = '查看产品';
$lang->score->methods['buyarticle']         = '查看文章';
$lang->score->methods['buyblog']            = '查看博客';
$lang->score->methods['buybook']            = '查看手册';
$lang->score->methods['buyfile']            = '下载附件';
$lang->score->methods['buypage']            = '查看单页';
$lang->score->methods['buythread']          = '查看帖子';
$lang->score->methods['buyvideo']           = '查看视频';

$lang->score->methods['buyarticlecategory'] = '查看文章列表';
$lang->score->methods['buyblogcategory']    = '查看博客列表';
$lang->score->methods['buyforumcategory']   = '查看论坛版块';
$lang->score->methods['buyproductcategory'] = '查看产品列表';
$lang->score->methods['buyvideocategory']   = '查看视频列表';

$lang->score->dataType['code']      = '等级代号';
$lang->score->dataType['level']     = '等级名称';
$lang->score->dataType['score']     = '最低积分';
$lang->score->dataType['sectCode']  = '门派代号';
$lang->score->dataType['sectName']  = '门派名称';
$lang->score->dataType['sectColor'] = '门派主题';
$lang->score->dataType['sectLevel'] = '门派等级';

$lang->score->errorType['duplication'] = '有重复项，请修改后再保存';
$lang->score->errorType['lack']        = '与代号数目不匹配，请修改后再保存';
