<?php
$lang->formitem->common  = '题目';
$lang->formitem->admin   = '维护题目';
$lang->formitem->list    = '题目列表';
$lang->formitem->create  = '创建题目';
$lang->formitem->edit    = '编辑题目';
$lang->formitem->delete  = '删除题目';
$lang->formitem->insert  = '插入';

$lang->formitem->usual   = '常用题型';
$lang->formitem->profile = '个人信息';

$lang->formitem->id          = '编号';
$lang->formitem->form        = '所属表单';
$lang->formitem->title       = '标题';
$lang->formitem->type        = '类型';
$lang->formitem->control     = '题型';
$lang->formitem->optionType  = '选项类型';
$lang->formitem->options     = '选项';
$lang->formitem->display     = '显示方式';
$lang->formitem->format      = '显示格式';
$lang->formitem->rule        = '检查规则';
$lang->formitem->answer      = '标准答案';
$lang->formitem->score       = '分数';
$lang->formitem->scoreRule   = '得分规则';
$lang->formitem->order       = '顺序';
$lang->formitem->desc        = '描述';
$lang->formitem->createdBy   = '由谁创建';
$lang->formitem->createdDate = '创建日期';
$lang->formitem->editedBy    = '由谁编辑';
$lang->formitem->editedDate  = '最后编辑';

$lang->formitem->content      = '内容';
$lang->formitem->selectImages = '选择图片';
$lang->formitem->upload       = '开始上传';
$lang->formitem->fileSize     = '文件大小';
$lang->formitem->setAnswer    = '设为答案';
$lang->formitem->scoreUnit    = '分';

$lang->formitem->sort  = '排序';
$lang->formitem->pager = '第 %s 页';

$lang->formitem->controlList['radio']    = '单选';
$lang->formitem->controlList['checkbox'] = '多选';
$lang->formitem->controlList['select']   = '下拉';
$lang->formitem->controlList['input']    = '填空';
$lang->formitem->controlList['textarea'] = '多行填空';
$lang->formitem->controlList['date']     = '日期';
$lang->formitem->controlList['section']  = '分段';
$lang->formitem->controlList['pager']    = '分页';

$lang->formitem->ruleList['notempty'] = '必填';
$lang->formitem->ruleList['date']     = '日期';
$lang->formitem->ruleList['email']    = 'email';
$lang->formitem->ruleList['float']    = '数字';
$lang->formitem->ruleList['phone']    = '电话';
$lang->formitem->ruleList['ip']       = 'IP';

$lang->formitem->scoreRuleList['checkbox']['full']    = '全部答对得满分，否则零分';
$lang->formitem->scoreRuleList['checkbox']['half']    = '全部答对得满分，部分答对得一半分数';
$lang->formitem->scoreRuleList['checkbox']['percent'] = '全部答对得满分，部分答对按答对比例得分';

$lang->formitem->scoreRuleList['input']['full']       = '和标准答案一致得满分，否则零分';
$lang->formitem->scoreRuleList['input']['any']        = '包含任意一个标准答案得满分，否则零分';
$lang->formitem->scoreRuleList['input']['half']       = '包含全部标准答案得满分，包含部分标准答案得一半分数';
$lang->formitem->scoreRuleList['input']['percent']    = '包含全部标准答案得满分，包含部分标准答案答按包含比例得分';

$lang->formitem->scoreRuleList['textarea']['full']    = '和标准答案一致得满分，否则零分';
$lang->formitem->scoreRuleList['textarea']['any']     = '包含任意一个标准答案得满分，否则零分';
$lang->formitem->scoreRuleList['textarea']['half']    = '包含全部标准答案得满分，包含部分标准答案得一半分数';
$lang->formitem->scoreRuleList['textarea']['percent'] = '包含全部标准答案得满分，包含部分标准答案答按包含比例得分';

$lang->formitem->scoreRuleList['date']['full']        = '和标准答案一致得满分，否则零分';
$lang->formitem->scoreRuleList['date']['any']         = '包含任意一个标准答案得满分，否则零分';
$lang->formitem->scoreRuleList['date']['half']        = '包含全部标准答案得满分，包含部分标准答案得一半分数';
$lang->formitem->scoreRuleList['date']['percent']     = '包含全部标准答案得满分，包含部分标准答案答按包含比例得分';

$lang->formitem->optionTypeList['text']  = '文字';
$lang->formitem->optionTypeList['image'] = '图片';

$lang->formitem->displayList['inline'] = '所有选项在一行显示';
$lang->formitem->displayList['block']  = '每个选项单独显示一行';

$lang->formitem->formatList['date']     = '日期，如 ' . date('Y-m-d');
$lang->formitem->formatList['time']     = '时间，如 ' . date('H:i:s');
$lang->formitem->formatList['datetime'] = '日期加时间，如 ' . date('Y-m-d H:i:s');

$lang->formitem->typeList['realname'] = '姓名';
$lang->formitem->typeList['sex']      = '性别';
$lang->formitem->typeList['age']      = '年龄';
$lang->formitem->typeList['mobile']   = '手机';
$lang->formitem->typeList['phone']    = '电话';
$lang->formitem->typeList['email']    = '邮箱';
$lang->formitem->typeList['address']  = '地址';
$lang->formitem->typeList['qq']       = 'QQ';
$lang->formitem->typeList['wechat']   = '微信';
$lang->formitem->typeList['weibo']    = '微博';

$lang->formitem->titleList['realname'] = '您的姓名：';
$lang->formitem->titleList['sex']      = '您的性别：';
$lang->formitem->titleList['age']      = '您的年龄：';
$lang->formitem->titleList['mobile']   = '您的手机：';
$lang->formitem->titleList['phone']    = '您的电话：';
$lang->formitem->titleList['email']    = '您的邮箱：';
$lang->formitem->titleList['address']  = '您的地址：';
$lang->formitem->titleList['qq']       = '您的QQ：';
$lang->formitem->titleList['wechat']   = '您的微信：';
$lang->formitem->titleList['weibo']    = '您的微博：';

$lang->formitem->optionList['sex']['m'] = '男';
$lang->formitem->optionList['sex']['f'] = '女';

$lang->formitem->optionList['age'][1] = '18岁以下';
$lang->formitem->optionList['age'][2] = '18 ～ 25';
$lang->formitem->optionList['age'][3] = '26 ～ 30';
$lang->formitem->optionList['age'][4] = '31 ～ 40';
$lang->formitem->optionList['age'][5] = '41 ～ 50';
$lang->formitem->optionList['age'][6] = '50 ～ 60';
$lang->formitem->optionList['age'][7] = '60岁以上';

$lang->formitem->tips = new stdclass();
$lang->formitem->tips->profile = '该项作为个人信息的 【%s】 进行统计，请勿做其它用途。';
$lang->formitem->tips->images  = '多图上传可以快速生成多个选项。';
$lang->formitem->tips->answers = '多个标准答案以逗号分隔';

$lang->formitem->error = new stdclass();
$lang->formitem->error->exist    = '此类型的题目已经存在。';
$lang->formitem->error->noAnswer = '<strong>选项</strong>不能没有答案。';
