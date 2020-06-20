<?php
foreach($lang->formModules as $type => $name)
{
    $lang->$type->common = $name;
    $lang->$type->admin  = "维护{$name}";
    $lang->$type->list   = "{$name}列表";
    $lang->$type->create = "创建{$name}";
    $lang->$type->edit   = "编辑{$name}";
    $lang->$type->delete = "删除{$name}";
}

$lang->form->release     = '发布';
$lang->form->cancel      = '撤销';
$lang->form->finish      = '完成';
$lang->form->submit      = '提交';
$lang->form->manageItems = '设计';
$lang->form->report      = '统计';

$lang->form->id          = '编号';
$lang->form->title       = '标题';
$lang->form->type        = '类型';
$lang->form->timeLimit   = '答题时限';
$lang->form->endAmount   = '参与人数'; 
$lang->form->endTime     = '结束时间'; 
$lang->form->fullScreen  = '全屏显示';
$lang->form->desc        = '简介'; 
$lang->form->status      = '状态'; 
$lang->form->createdBy   = '由谁创建'; 
$lang->form->createdDate = '创建时间'; 
$lang->form->editedBy    = '由谁编辑'; 
$lang->form->editedDate  = '编辑时间'; 

$lang->form->endCondition    = '结束条件';
$lang->form->postLimit       = '参与限制';
$lang->form->endAmountBefore = '参与人数达到';
$lang->form->endTimeBefore   = '结束时间';

$lang->form->hour   = '小时';
$lang->form->minute = '分钟';
$lang->form->second = '秒';

$lang->form->answers     = '该项有 <strong>%s</strong> 条回答。';
$lang->form->options     = '选择项';
$lang->form->optionCount = '选择次数';
$lang->form->optionRate  = '占比';

$lang->form->confirmSubmit  = '提交之后无法更改，确定要提交吗？';
$lang->form->submitSuccess  = '提交成功';
$lang->form->timeLimitTips  = '开始答题后到时间自动交卷。';
$lang->form->score          = '您的分数是 <strong>%s</strong>。';
$lang->form->examTips       = '本场考试限时%s，到达时间后自动提交。请提前填写必填项内容，以免影响提交。';

$lang->form->prev = '上一页';
$lang->form->next = '下一页';

$lang->form->fullScreenList[0] = '关闭';
$lang->form->fullScreenList[1] = '开启';

$lang->form->modeList['byUser'] = '按用户统计';
$lang->form->modeList['byItem'] = '按题目统计';

$lang->form->statusList['draft']    = '草稿';
$lang->form->statusList['normal']   = '进行中';
$lang->form->statusList['finished'] = '完成';

$lang->form->postLimitList['needLogin']   = '必须登录才能参与';
$lang->form->postLimitList['ipUnique']    = '每个IP只能参与一次';
$lang->form->postLimitList['fingerprint'] = '每台电脑或者手机只能参与一次';

$lang->form->error = new stdclass();
$lang->form->error->notExist           = '请求的对象不存在。';
$lang->form->error->draft              = '%s尚未开始。';
$lang->form->error->finished           = '%s已经结束。';
$lang->form->error->submitSuccess      = '提交成功！';
$lang->form->error->needLogin          = '您必须登录才能进行操作。';
$lang->form->error->emptyAmountAndTime = '<strong>参与人数</strong> 和 <strong>结束时间</strong> 不能同时为空。';
$lang->form->error->notInt             = '<strong>%s</strong>应当是数字。';
$lang->form->error->noAnswer           = '未回答。';

$lang->formuser = new stdclass();
$lang->formuser->view        = '查看详情';
$lang->formuser->id          = '编号';
$lang->formuser->account     = '账号';
$lang->formuser->ip          = 'IP';
$lang->formuser->createdDate = '提交时间';
$lang->formuser->answer      = '答案';
$lang->formuser->score       = '得分';
$lang->formuser->count       = '题目完成数';
$lang->formuser->rate        = '题目完成率';
