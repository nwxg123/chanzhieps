{include TPL_ROOT . 'common/header.html.php'}
{$common->printPositionBar($category, $question)}
{include TPL_ROOT. 'common/kindeditor.html.php'}
<div class='row'>
  <div class='col-md-2'>{include TPL_ROOT . 'ask/blockleft.html.php'}</div>
  <div class='col-md-10'>
    <div class='panel'>
      <div class='panel-heading'>
        <strong><span class='ask-{$question->status}'>{$lang->question->statusList[$question->status]} </span><i class="icon-double-angle-right"></i>{$question->title}</strong>
        <div class='panel-actions'>
          {if($app->user->admin == 'super')} {!html::a(inlink('delete', "questionID=$question->id"), $lang->ask->delete, "class='deleter btn btn-danger'") {/if}
          {if($question->account == $app->user->account and $question->status == 'wait' and $question->answers > 0)} {!html::a(inlink('close', "questionID=$question->id"), $lang->ask->close, "class='deleter btn btn-danger'")} {/if}

          {if($app->user->admin == 'super' and $question->status == 'resolved' and !$alreadFAQ)} {!html::a(inlink('setAsFAQ', "questionID=$question->id"), $lang->ask->setAsFAQ, "class='btn btn-default ajaxJSON'") {/if}
          {if($question->status == 'wait' and $app->user->account == 'guest')} {!html::linkButton($lang->ask->answer, $control->createLink('user', 'login', "referer=" . helper::safe64Encode($app->getURI()))) {/if}
        </div>
      </div>
      <div class='panel-body'>
        {$question->desc}
      </div>  
      <div class='panel-footer'>
        <div class='row'>
          <div class='col-md-8'>
            {!printf($lang->question->lblBasic, empty($users[$question->account]) ? $question->account : $users[$question->account], $question->score, $question->addedDate, $question->answers, $question->views)}
          </div>
          <div class='col-md-4 text-right'>
            {if($app->user->account == $question->account and $question->status == 'wait')}
              {!html::a('###', $lang->ask->setComment, "onclick=$('#commentform').toggle()")}
              {if(commonModel::isAvailable('score'))}
                {!echo ' | ' . $lang->ask->addScore . $lang->colon}
                {foreach($lang->question->scoreList as $score => $scoreLabel)}
                  {!html::a(inlink('addScore', "questionID=$question->id&score=$score"), $scoreLabel, "class='red ajaxJSON'")}
                {/foreach}
              {/if}
            {/if}
          </div>
        </div>
      </div>
    </div>

    <!-- Question Comment -->
    {if($question->comment)}
      <div class='panel'>
        <div class='panel-heading '><strong>{$lang->question->comment}</strong></div>
        <div class='panel-body'>{$question->comment}</div>
      </div>
    {/if}

    <div id='commentform' class='panel hide'>
      <div class='panel-heading'><strong>{$lang->ask->setComment}</strong></div>
      <div class='panel-body'>
        <form method='post' id='ajaxComment' action='{!inlink('setComment', "questionID=$question->id")}'>
          <table class='table table-form'>
            <tr><td>{!html::textarea('comment', htmlspecialchars($question->comment), "rows='5' class='form-control'")}</td></tr>
            <tr><td>{!html::submitButton()}</td></tr>
          </table>
        </form>
      </div>
    </div>

    <!-- Answer Form -->
    {if($control->ask->canAnswer($question->account, $answerUsers, $question->status))}
      <div class='panel'>
        <div class='panel-heading'><strong>{$lang->ask->answer}</strong></div>
        <div class='panel-body'>
          {if($faqList)}
            <div class='faqList'>
              {!html::select('faq', $faqList, '', "class='form-control' onchange='setAnswerByFAQ(this.value)'")}
            </div>
          {/if}
          <form method='post' id='ajaxForm' action='{!inlink('answer', "questionID=$question->id")}'>
            <table class='table table-form'>
              <tr><td>{!html::textarea('content', '', "rows=10 class='form-control'")}</td></tr>
              <tr><td>{!html::submitButton()}</td></tr>
            </table>
          </form>
        </div>
      </div>
    {/if}

    <!-- Answer List -->
    {if($answers)}
      <div class='panel mgb-0'>
        <div class='panel-heading'>
          <strong>{$lang->ask->answers}</strong>
          <div class='pull-right text-danger'>
            {if($question->account == $app->user->account and $question->status == 'wait')}
              {!$lang->question->lblClose}
            {/if}
          </div>
        </div>
      </div>
      {if($question->bestAnswer)}
        {$answer = $answers[$question->bestAnswer]}
        {@unset($answers[$question->bestAnswer])}
        <div class='comment w-p100 first bestanswer' id="answer{$answer->id}">
          <table class='table table-borderless'>
            <tr>
              <td class='td-content'>
                <div class='pull-right text-danger'><strong>{$lang->ask->bestAnswer}</strong></div>
                <div>
                  <span class='account'>{!empty($users[$answer->account]) ? $answer->account : $users[$answer->account]}</span>
                  <span class='time'>{!formatTime($answer->addedDate, 'Y/m/d')} </span>
                </div>
                <div class='content'>{$answer->content}</div>
                <div class='reply-info text-right'>
                  {$replyCount   = isset($replies[$answer->id]) ? count($replies[$answer->id]) : 0}
                  {$repliesLabel = $lang->question->replies . ( $replyCount ? '(' . $replyCount . ')' : '')}
                  {$toggleReply  = $control->app->user->account == 'guest' ? $control->createLink('user', 'login') : "javascript:toggleReply($answer->id)"}
                  {!html::a($toggleReply, $lang->question->replies)}
                  {if($replyCount)}
                     {!html::a("javascript:toggleShowReply($answer->id)", sprintf($lang->question->showReply, $replyCount))}
                  {/if}
                  {if($question->status == 'wait' and $answer->account == $app->user->account)}
                    {!echo ' | ' . html::a("javascript:toggleAnswer($answer->id)", $lang->edit)}
                  {/if}
                  {if($question->status == 'wait' and $question->account == $app->user->account)}
                    {!echo ' | ' . html::a(inlink('setBestAnswer', "questionID=$question->id&answerID=$answer->id"), $lang->ask->setBestAnswer, "class='ajaxJSON'")}
                  {/if}

                  {if($app->user->account == $question->account and commonModel::isAvailable('score'))}
                    {!echo ' | ' . $lang->ask->awardAnswer . ' '}
                    {foreach($lang->question->scoreList as $score => $scoreLabel)}
                      {!html::a(inlink('awardAnswer', "answer=$answer->id&score=$score"), $scoreLabel, "class='ajaxJSON'")}
                    {/foreach}
                  {/if}
                </div>
                <div id ='answerform{$answer->id}'></div>
                {if($app->user->account != 'guest')}<div class='replyform'></div>{/if}
                {if(isset($replies[$answer->id]))}
                  <div class='reply-box hide' id='replyBox{$answer->id}'>
                  {$answerReplies = array_reverse($replies[$answer->id])}
                  {foreach($answerReplies as $reply)}
                    <div class='reply' id='reply{$reply->id}'>
                      <div>
                        <span class='account'>{!empty($users[$reply->account]) ? $reply->account : $users[$reply->account]}</span>
                        <span class='time'>{!formatTime($reply->date, 'Y/m/d')} </span>
                      </div>
                      <div class='reply-content'>{!nl2br($reply->content)}</div>
                    </div>
                  {/foreach}
                  </div>
                {/if}
              </td>
            </tr>
          </table>
        </div>
      {/if}

      {$i = 1}
      {foreach($answers as $id => $answer)}
        <div class='comment w-p100 {!echo (!$question->bestAnswer and $i == 1 ? 'first' : '')}' id="answer{$answer->id}">
          <table class='table table-borderless w-p100'>
            <tr>
              <td class='td-content'>
                <div>
                  <span class='account'>{!empty($users[$answer->account]) ? $answer->account : $users[$answer->account]}</span>
                  <span class='time'>{!formatTime($answer->addedDate, 'Y/m/d')} </span>
                </div>
                <div class='content'>{$answer->content}</div>
                <div class='text-right reply-info'>
                  {$replyCount   = isset($replies[$answer->id]) ? count($replies[$answer->id]) : 0}
                  {$repliesLabel = $lang->question->replies . ( $replyCount ? '(' . $replyCount . ')' : '')}
                  {$toggleReply  = $control->app->user->account == 'guest' ? $control->createLink('user', 'login') : "javascript:toggleReply($answer->id)"}
                  {!html::a($toggleReply, $lang->question->replies)} 
                  {if($replyCount)} {!html::a("javascript:toggleShowReply($answer->id)", sprintf($lang->question->showReply, $replyCount))} {/if} 
                  {if($question->status == 'wait' and $answer->account == $app->user->account)} {!echo ' | ' . html::a("javascript:toggleAnswer($answer->id)", $lang->edit)} {/if}
                  {if($question->status == 'wait' and $question->account == $app->user->account)} {!echo ' | ' . html::a(inlink('setBestAnswer', "questionID=$question->id&answerID=$answer->id"), $lang->ask->setBestAnswer, "class='ajaxJSON'")} {/if}

                  {if($app->user->account == $question->account and commonModel::isAvailable('score'))}
                    {!echo ' | ' . $lang->ask->awardAnswer . ' '}
                    {foreach($lang->question->scoreList as $score => $scoreLabel)}
                      {!html::a(inlink('awardAnswer', "answer=$answer->id&score=$score"), $scoreLabel, "class='ajaxJSON'")}
                    {/foreach}
                  {/if}
                </div>
                <div id ='answerform{$answer->id}'></div>
                {if($app->user->account != 'guest')}<div class='replyform'></div>{/if}
                {if(isset($replies[$answer->id]))}
                  <div class='reply-box hide' id='replyBox{$answer->id}'>
                  {$answerReplies = array_reverse($replies[$answer->id])}
                  {foreach($answerReplies as $reply)}
                    <div class='reply' id='reply{$reply->id}'>
                      <div>
                        <span class='account'>{!empty($users[$reply->account]) ? $reply->account : $users[$reply->account]}</span>
                        <span class='time'>{!formatTime($reply->date, 'Y/m/d')} </span>
                      </div>
                      <div class='reply-content'>{!nl2br($reply->content)}</div>
                    </div>
                  {/foreach}
                  </div>
                {/if}
              </td>
            </tr>
          </table>
        </div>
        {@$i++}
      {/foreach}
    {/if}
  </div>
</div>
{!js::set('displayAnswer', $displayAnswer)}
{!js::set('buttonHtml', html::submitButton('', "btn btn-sm btn-primary"))}
{!js::set('replyHtml', html::textarea('reply', '', "class='form-control' rows='1'"))}
{include TPL_ROOT . 'common/footer.html.php'}
