<?php
/**
 * The ask module zh-cn file of ZenTaoCMS.
 *
 * @copyright   Copyright 2009-2010 QingDao Nature Easy Soft Network Technology Co,LTD (www.cnezsoft.com)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     ask
 * @version     $Id$
 * @link        http://www.zentao.net
 */
$lang->ask->common               = '问答';
$lang->ask->searchResult         = '搜索结果';
$lang->ask->question             = '我要提问';
$lang->ask->answer               = '回答';
$lang->ask->close                = '关闭问题'; 
$lang->ask->delete               = '删除问题'; 
$lang->ask->setComment           = '设置备注';
$lang->ask->setBestAnswer        = '采纳为最佳答案';
$lang->ask->addScore             = '追加悬赏';
$lang->ask->awardAnswer          = '追加奖励';
$lang->ask->setAsFAQ             = '设为FAQ';
$lang->ask->join                 = '请您参与回答。';
$lang->ask->threadToAsk          = '帖子转问题';

$lang->ask->myQuestion           = '我的提问';
$lang->ask->myAnswer             = '我的回答';
$lang->ask->search               = '搜索';

$lang->ask->manageAnswers           = '回答管理';
$lang->ask->manageQuestions         = '问题管理';
$lang->ask->answers                 = '答案列表';
$lang->ask->bestAnswer              = '最佳答案';
$lang->ask->selectFAQ               = '选择常见问题';
$lang->ask->successRewardedQuestion = '成功追加悬赏';
$lang->ask->successAwardedAnswer    = '成功奖励积分';
$lang->ask->successSetAsFAQ         = '成功设为FAQ';
$lang->ask->failSetAsFAQ            = '设为FAQ失败，该问答已经是FAQ或者还没有选择最佳答案。';  
$lang->ask->successClosed           = '成功关闭问题';
$lang->ask->confirmClose            = '你确定要关闭此问题吗?';
$lang->ask->confirmDeleteQuestion   = '你确定要删除此问题吗?';
$lang->ask->confirmDeleteAnswer     = '你确定要删除此回答吗？';
$lang->ask->thanksReply             = '谢谢您的回复！';
$lang->ask->noScore                 = '抱歉，您的积分不够。请参考我们积分机制，获得积分。';
$lang->ask->bindWechat              = '请先绑定微信';

$lang->ask->messageAnswer     = "<strong>%s</strong> 回答了您的问题：%s";
$lang->ask->messageReply      = "<strong>%s</strong> 回复了问题：%s";
$lang->ask->editAnswer        = "<strong>%s</strong> 重新编辑了回答，所在问题：%s";
$lang->ask->messageBestAnswer = "您对问题 %s 的回答被采纳为最佳答案。";

$lang->ask->statusFilter   = '状态筛选';
$lang->ask->categoryFilter = '分类筛选';

$lang->question = new stdclass();
$lang->question->id         = '编号';
$lang->question->category   = '分类';
$lang->question->account    = '提问者';
$lang->question->title      = '标题';
$lang->question->content    = '内容';
$lang->question->desc       = '描述';
$lang->question->score      = '悬赏分';
$lang->question->comment    = '备注';
$lang->question->status     = '状态';
$lang->question->answer     = '答案';
$lang->question->addedDate  = '提问时间';
$lang->question->closedDate = '关闭时间';
$lang->question->views      = '查看数';
$lang->question->answers    = '答案数';
$lang->question->bestAnswer = '最佳答案';
$lang->question->replies    = '回复';
$lang->question->showReply  = '%s条回复';
$lang->question->noBest     = '该问题还没有最佳答案';

$lang->question->lblScore   = '最低5分，悬赏越高，回答的机率越大';
$lang->question->lblBasic   = '<span class=f-12px><strong>提问者：</strong> %s <strong>悬赏：</strong><strong class="red f-16px">%s</strong> <strong>日期</strong>： %s <strong>答案</strong>：%s <strong>点击</strong>：%s</span>';
$lang->question->lblCreated = '成功提交问题。';
$lang->question->lblClose   = '问题回复之后，请及时选择最佳答案，关闭问题';
$lang->question->lblBestSet = '该问题已关闭，不能再次设置最佳答案';
$lang->question->lblAnswer  = "<span class='uname'><i class='icon icon-user'></i>%s</span> <span class='gray'>于</span> %s <span class='gray'>回答问题</span>  %s";

$lang->question->typeList['unResolved']  = '未解决';
$lang->question->typeList['resolved']    = '已解决';
$lang->question->typeList['highScore']   = '高分悬赏';
$lang->question->typeList['zeroAnswers'] = '零回答';
$lang->question->typeList['myQuestion']  = '我的提问';
$lang->question->typeList['myAnswer']    = '我的回答';

$lang->question->statusList['wait']      = '解决中';
$lang->question->statusList['resolved']  = '已解决';

$lang->question->scoreList[1]  = '+1';
$lang->question->scoreList[2]  = '+2';
$lang->question->scoreList[5]  = '+5';
$lang->question->scoreList[10] = '+10';
