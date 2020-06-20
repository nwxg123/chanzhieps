<?php
/**
 * The ask module english file of ZenTaoCMS.
 *
 * @copyright   Copyright 2009-2010 QingDao Nature Easy Soft Network Technology Co,LTD (www.cnezsoft.com)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     ask
 * @version     $Id$
 * @link        http://www.zentao.net
 */
$lang->ask->common               = 'Ask';
$lang->ask->searchResult         = 'Search Result';
$lang->ask->question             = 'Questions';
$lang->ask->answer               = 'Answers';
$lang->ask->close                = 'Close';
$lang->ask->delete               = 'Delete';
$lang->ask->setComment           = 'Set Comment';
$lang->ask->setBestAnswer        = 'Set Best Snswer';
$lang->ask->addScore             = 'Add Points';
$lang->ask->awardAnswer          = 'Reward';
$lang->ask->setAsFAQ             = 'Set as FAQ';
$lang->ask->join                 = 'Invite';
$lang->ask->threadToAsk          = 'Thread To Ask';

$lang->ask->myQuestion           = 'My questions';
$lang->ask->myAnswer             = 'My answers';
$lang->ask->search               = 'Search';

$lang->ask->manageAnswers           = 'Manage Answers';
$lang->ask->manageQuestions         = 'Manage Questions';
$lang->ask->answers                 = 'Answers';
$lang->ask->bestAnswer              = 'Best Answer';
$lang->ask->selectFAQ               = 'Select FAQ';
$lang->ask->successRewardedQuestion = 'Rewarded!';
$lang->ask->successAwardedAnswer    = 'Rewarded!';
$lang->ask->successSetAsFAQ         = 'Done!';
$lang->ask->failSetAsFAQ            = 'Failed! This question is already a FAQ or it has no best answer.';
$lang->ask->successClosed           = 'Closed!';
$lang->ask->confirmClose            = 'Are you sure to close this question?';
$lang->ask->confirmDeleteQuestion   = 'Are you sure to delete this question?';
$lang->ask->confirmDeleteAnswer     = 'Are you sure to delete this answer?';
$lang->ask->thanksReply             = 'Thanks for your reply!';
$lang->ask->noScore                 = 'Sorry，your scores is not enough. Please refer to our scores rules and earn more scores.';
$lang->ask->bindWechat              = '';

$lang->ask->messageAnswer     = "<strong>%s</strong> answer your question: %s";
$lang->ask->messageReply      = "<strong>%s</strong> reply your question: %s";
$lang->ask->editAnswer        = "<strong>%s</strong> re-edited answer, belongs to: %s";
$lang->ask->messageBestAnswer = "Your answer to question %s has been set as best anwser.";

$lang->ask->statusFilter   = 'Status Filter';
$lang->ask->categoryFilter = 'Category Filter';

$lang->question = new stdclass();
$lang->question->id         = 'Id';
$lang->question->category   = 'Category';
$lang->question->account    = 'Asked by';
$lang->question->title      = 'Title';
$lang->question->content    = 'Content';
$lang->question->desc       = 'Description';
$lang->question->score      = 'Pointa';
$lang->question->comment    = 'Comment';
$lang->question->status     = 'Status';
$lang->question->answer     = 'Answer';
$lang->question->addedDate  = 'Added on';
$lang->question->closedDate = 'Closed on';
$lang->question->views      = 'Views';
$lang->question->answers    = 'Answers';
$lang->question->bestAnswer = 'Best answer';
$lang->question->replies    = 'Replies';
$lang->question->showReply  = '%s replies';
$lang->question->noBest     = 'This question has no best answer';

$lang->question->lblScore   = 'At least 10 points. The more the score is, the more people anwsered it.';
$lang->question->lblBasic   = '<span class=f-12px><strong>Asked by: </strong> %s <strong> Points: </strong><strong class="red f-16px">%s</strong>  Date: %s  Answer: %s  Views：%s</span>';
$lang->question->lblCreated = 'Question added.';
$lang->question->lblClose   = 'Once question is soluted. Please choose best answer and close question.';
$lang->question->lblBestSet = "This question is closed. Don't set best answer again.";
$lang->question->lblAnswer  = "<span class='uname'><i class='icon icon-user'></i>%s</span> <span class='gray'>answer question</span>  %s <span class='gray'>on</span> %s";

$lang->question->typeList['unResolved']  = 'Not resolved';
$lang->question->typeList['resolved']    = 'Resolved';
$lang->question->typeList['highScore']   = 'High score';
$lang->question->typeList['zeroAnswers'] = 'Zero answer';
$lang->question->typeList['myQuestion']  = 'My question';
$lang->question->typeList['myAnswer']    = 'My answer';

$lang->question->statusList['wait']      = 'Wait';
$lang->question->statusList['resolved']  = 'Resolved';

$lang->question->scoreList[1]  = '+1';
$lang->question->scoreList[2]  = '+2';
$lang->question->scoreList[5]  = '+5';
$lang->question->scoreList[10] = '+10';
