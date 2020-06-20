<?php
/**
 * The ask module zh-tw file of ZenTaoCMS.
 *
 * @copyright   Copyright 2009-2010 QingDao Nature Easy Soft Network Technology Co,LTD (www.cnezsoft.com)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     ask
 * @version     $Id$
 * @link        http://www.zentao.net
 */
$lang->ask->common               = '問答';
$lang->ask->searchResult         = '搜索結果';
$lang->ask->question             = '我要提問';
$lang->ask->answer               = '回答';
$lang->ask->close                = '關閉問題'; 
$lang->ask->delete               = '刪除問題'; 
$lang->ask->setComment           = '設置備註';
$lang->ask->setBestAnswer        = '採納為最佳答案';
$lang->ask->addScore             = '追加懸賞';
$lang->ask->awardAnswer          = '追加獎勵';
$lang->ask->setAsFAQ             = '設為FAQ';
$lang->ask->join                 = '請您參與回答。';
$lang->ask->threadToAsk          = '帖子轉問題';

$lang->ask->myQuestion           = '我的提問';
$lang->ask->myAnswer             = '我的回答';
$lang->ask->search               = '搜索';

$lang->ask->manageAnswers           = '回答管理';
$lang->ask->manageQuestions         = '問題管理';
$lang->ask->answers                 = '答案列表';
$lang->ask->bestAnswer              = '最佳答案';
$lang->ask->selectFAQ               = '選擇常見問題';
$lang->ask->successRewardedQuestion = '成功追加懸賞';
$lang->ask->successAwardedAnswer    = '成功獎勵積分';
$lang->ask->successSetAsFAQ         = '成功設為FAQ';
$lang->ask->failSetAsFAQ            = '設為FAQ失敗，該問答已經是FAQ或者還沒有選擇最佳答案。';  
$lang->ask->successClosed           = '成功關閉問題';
$lang->ask->confirmClose            = '你確定要關閉此問題嗎?';
$lang->ask->confirmDeleteQuestion   = '你確定要刪除此問題嗎?';
$lang->ask->confirmDeleteAnswer     = '你確定要刪除此回答嗎？';
$lang->ask->thanksReply             = '謝謝您的回覆！';
$lang->ask->noScore                 = '抱歉，您的積分不夠。請參考我們積分機制，獲得積分。';

$lang->ask->messageAnswer     = "<strong>%s</strong> 回答了您的問題：%s";
$lang->ask->messageReply      = "<strong>%s</strong> 回覆了問題：%s";
$lang->ask->editAnswer        = "<strong>%s</strong> 重新編輯了回答，所在問題：%s";
$lang->ask->messageBestAnswer = "您對問題 %s 的回答被採納為最佳答案。";

$lang->ask->statusFilter   = '狀態篩選';
$lang->ask->categoryFilter = '分類篩選';

$lang->question = new stdclass();
$lang->question->id         = '編號';
$lang->question->category   = '分類';
$lang->question->account    = '提問者';
$lang->question->title      = '標題';
$lang->question->desc       = '描述';
$lang->question->score      = '懸賞分';
$lang->question->comment    = '備註';
$lang->question->status     = '狀態';
$lang->question->answer     = '答案';
$lang->question->addedDate  = '提問時間';
$lang->question->closedDate = '關閉時間';
$lang->question->views      = '查看數';
$lang->question->answers    = '答案數';
$lang->question->bestAnswer = '最佳答案';
$lang->question->replies    = '回覆';
$lang->question->showReply  = '%s條回覆';
$lang->question->noBest     = '該問題還沒有最佳答案';

$lang->question->lblScore   = '最低5分，懸賞越高，回答的機率越大';
$lang->question->lblBasic   = '<span class=f-12px><strong>提問者：</strong> %s <strong>懸賞：</strong><strong class="red f-16px">%s</strong> <strong>日期</strong>： %s <strong>答案</strong>：%s <strong>點擊</strong>：%s</span>';
$lang->question->lblCreated = '成功提交問題。';
$lang->question->lblClose   = '問題回覆之後，請及時選擇最佳答案，關閉問題';
$lang->question->lblBestSet = '該問題已關閉，不能再次設置最佳答案';
$lang->question->lblAnswer  = '%s 在 %s 回答問題 %s';

$lang->question->typeList['unResolved']  = '未解決';
$lang->question->typeList['resolved']    = '已解決';
$lang->question->typeList['highScore']   = '高分懸賞';
$lang->question->typeList['zeroAnswers'] = '零回答';
$lang->question->typeList['myQuestion']  = '我的提問';
$lang->question->typeList['myAnswer']    = '我的回答';

$lang->question->statusList['wait']      = '解決中';
$lang->question->statusList['resolved']  = '已解決';

$lang->question->scoreList[1]  = '+1';
$lang->question->scoreList[2]  = '+2';
$lang->question->scoreList[5]  = '+5';
$lang->question->scoreList[10] = '+10';
