<?php
foreach($lang->formModules as $type => $name)
{
    $lang->$type->common = $name;
    $lang->$type->admin  = "維護{$name}";
    $lang->$type->list   = "{$name}列表";
    $lang->$type->create = "創建{$name}";
    $lang->$type->edit   = "編輯{$name}";
    $lang->$type->delete = "刪除{$name}";
}

$lang->form->release     = '發佈';
$lang->form->cancel      = '撤銷';
$lang->form->finish      = '完成';
$lang->form->submit      = '提交';
$lang->form->manageItems = '設計';
$lang->form->report      = '統計';

$lang->form->id          = '編號';
$lang->form->title       = '標題';
$lang->form->type        = '類型';
$lang->form->timeLimit   = '答題時限';
$lang->form->endAmount   = '參與人數'; 
$lang->form->endTime     = '結束時間'; 
$lang->form->fullScreen  = '全屏顯示';
$lang->form->desc        = '簡介'; 
$lang->form->status      = '狀態'; 
$lang->form->createdBy   = '由誰創建'; 
$lang->form->createdDate = '創建時間'; 
$lang->form->editedBy    = '由誰編輯'; 
$lang->form->editedDate  = '編輯時間'; 

$lang->form->endCondition    = '結束條件';
$lang->form->postLimit       = '參與限制';
$lang->form->endAmountBefore = '參與人數達到';
$lang->form->endTimeBefore   = '結束時間';

$lang->form->hour   = '小時';
$lang->form->minute = '分鐘';
$lang->form->second = '秒';

$lang->form->answers     = '該項有 <strong>%s</strong> 條回答。';
$lang->form->options     = '選擇項';
$lang->form->optionCount = '選擇次數';
$lang->form->optionRate  = '占比';

$lang->form->confirmSubmit  = '提交之後無法更改，確定要提交嗎？';
$lang->form->submitSuccess  = '提交成功';
$lang->form->timeLimitTips  = '開始答題後到時間自動交卷。';
$lang->form->score          = '您的分數是 <strong>%s</strong>。';
$lang->form->examTips       = '本場考試限時%s，到達時間後自動提交。請提前填寫必填項內容，以免影響提交。';

$lang->form->prev = '上一頁';
$lang->form->next = '下一頁';

$lang->form->fullScreenList[0] = '關閉';
$lang->form->fullScreenList[1] = '開啟';

$lang->form->modeList['byUser'] = '按用戶統計';
$lang->form->modeList['byItem'] = '按題目統計';

$lang->form->statusList['draft']    = '草稿';
$lang->form->statusList['normal']   = '進行中';
$lang->form->statusList['finished'] = '完成';

$lang->form->postLimitList['needLogin']   = '必須登錄才能參與';
$lang->form->postLimitList['ipUnique']    = '每個IP只能參與一次';
$lang->form->postLimitList['fingerprint'] = '每台電腦或者手機只能參與一次';

$lang->form->error = new stdclass();
$lang->form->error->notExist           = '請求的對象不存在。';
$lang->form->error->draft              = '%s尚未開始。';
$lang->form->error->finished           = '%s已經結束。';
$lang->form->error->submitSuccess      = '提交成功！';
$lang->form->error->needLogin          = '您必須登錄才能進行操作。';
$lang->form->error->emptyAmountAndTime = '<strong>參與人數</strong> 和 <strong>結束時間</strong> 不能同時為空。';
$lang->form->error->notInt             = '<strong>%s</strong>應當是數字。';
$lang->form->error->noAnswer           = '未回答。';

$lang->formuser = new stdclass();
$lang->formuser->view        = '查看詳情';
$lang->formuser->id          = '編號';
$lang->formuser->account     = '賬號';
$lang->formuser->ip          = 'IP';
$lang->formuser->createdDate = '提交時間';
$lang->formuser->answer      = '答案';
$lang->formuser->score       = '得分';
$lang->formuser->count       = '題目完成數';
$lang->formuser->rate        = '題目完成率';
