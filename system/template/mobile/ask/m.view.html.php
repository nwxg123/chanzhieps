{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header.simple')}
<div class="question">
  <div class='header'>
    <div class='title-wrapper'>
      <span class="title">{$question->title}</span>
      <span class="status">{$lang->question->statusList[$question->status]}</span>
    </div>
    <div class='sub-title vertical-center'>
      <div class='author vertical-center'>
        <div class='avatar'>
          <i class='icon icon-user icon-10x'></i>
        </div>
        <div class='ext'>
          <span class='authorName'>{$question->account}</span>
          <span class='addedDate'>{!formatTime($question->addedDate)}</span>
        </div>
      </div>
      <div class="dropdown operations">
          <span class="dropdown-toggle trigger" data-toggle="dropdown">
            <i class='circle'></i>
            <i class='circle'></i>
            <i class='circle'></i>
          </span>
        <ul class="dropdown-menu dropdown-menu-right options">
          <li>
          {if($app->user->admin == 'super')}
            {!html::a(inlink('delete', "questionID=$question->id"), $lang->ask->delete, "class='deleter'")}
          {/if}
          </li>
          <li>
          {if($question->account == $app->user->account and $question->status == 'wait' and $question->answers > 0)}
            {!html::a(inlink('close', "questionID=$question->id"), $lang->ask->close, "class='deleter'")}
          {/if}
          </li>
          <li>
          {if($app->user->admin == 'super' and $question->status == 'resolved' and !$alreadFAQ)}
            {!html::a(inlink('setAsFAQ', "questionID=$question->id"), $lang->ask->setAsFAQ, "class='ajaxJSON'")}
          {/if}
          </li>
          <li>
          {if($question->status == 'wait' and $app->user->account == 'guest')}
            {!html::linkButton($lang->ask->answer, $control->createLink('user', 'login', "referer=" . helper::safe64Encode($app->getURI())))}
          {/if}
          </li>
          <li>
          {if($question->account == $app->user->account)}
            {!html::a('###', $lang->ask->setComment, "onclick=$('#triggerModal').toggle() class='tile text-primary'")}
          {/if}
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="content">
    {$question->desc}
  </div>
  <div class="footer">
    <span class="score">{$lang->question->score . ':' . $question->score}</span>
    <span class="answers">{$lang->question->answers . ':' . $question->answers}</span>
    <span class="views">{$lang->question->views . ':' . $question->views}</span>
    {if($app->user->account == $question->account and $question->status == 'wait')}
      {if(commonModel::isAvailable('score'))}
        {!echo ' | ' . $lang->ask->addScore . $lang->colon}
        {foreach($lang->question->scoreList as $score => $scoreLabel)}
          {!html::a(inlink('addScore', "questionID=$question->id&score=$score"), $scoreLabel, "class='tile text-red ajaxJSON'")}
        {/foreach}
      {/if}
    {/if}
  </div>
</div>

<!-- Question Comment -->
{if($question->comment)}
  <div class='panel-section remark'>
    <div class='panel-heading bg-gray-pale'>
      <div class='title'><strong>{$lang->question->comment}</strong></div>
    </div>
    <div class='panel-body'>
      {$question->comment}
    </div>
  </div>
{/if}

<!-- Set question comment-->
<div id='triggerModal' class='modal modal-trigger fade in hide'>
  <div class='panel-section modal-dialog'>
    <div class='panel-heading bg-gray-pale modal-header'>
      <strong>{$lang->ask->setComment}</strong>
      <button type="button" class="close" data-dismiss="modal">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class='panel-body modal-body'>
      <form method='post' id='commentForm' action='{!inlink('setComment', "questionID=$question->id")}'>
        <table class='table table-form'>
          <tr><td>{!html::textarea('comment', htmlspecialchars($question->comment), "rows='5' class='form-control'")}</td></tr>
          <tr><td>{!html::submitButton('', 'btn primary block')}</td></tr>
        </table>
      </form>
    </div>
  </div>
</div>

<!-- Answer Form -->
{if($control->ask->canAnswer($question->account, $answerUsers, $question->status))}
  <div class='panel-section'>
    <div class='panel-heading bg-gray-pale'><strong>{$lang->ask->answer}</strong></div>
    <div class='panel-body'>
      {if($faqList)}
        <div class='faqList' style='margin-left:5px;margin-right:5px;margin-top:5px;padding-left:5px;padding-right:5px;'>
          {!html::select('faq', $faqList, '', "class='form-control' onchange='setAnswerByFAQ(this.value)'")}
        </div>
      {/if}
      <form method='post' id='answerForm' action='{!inlink('answer', "questionID=$question->id")}'>
        <table class='table table-form'>
          <tr><td style='border-top-width: 0px;'>{!html::textarea('content', '', "rows=10 class='form-control'")}</td></tr>
          <tr><td>{!html::submitButton('', 'btn block primary')}</td></tr>
        </table>
      </form>
    </div>
  </div>
{/if}

<!-- Answer List -->
{if($answers)}
  <div class='panel-section'>
    <div class='panel-heading bg-gray-pale'>
      <strong>{$lang->ask->answers}</strong>
      <div class='pull-right text-danger'>
        {if($question->account == $app->user->account and $question->status == 'wait')}
          {$lang->question->lblClose}
        {/if}
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
          </td>
        </tr>
      </table>
    </div>
    {/if}

    {$i = 1}
    {foreach($answers as $id => $answer)}
    <div class='comment {!echo (!$question->bestAnswer and $i == 1 ? 'first' : '')}' id="answer{$answer->id}">
      <table class='table table-borderless w-p100'>
        <tr>
          <td class='td-content'>
            <div>
              <span class='account'>{!empty($users[$answer->account]) ? $answer->account : $users[$answer->account]}</span>
              <span class='time'>{!formatTime($answer->addedDate, 'Y/m/d')} </span>
            </div>
            <div class='content'>{$answer->content}</div>
            <div class='text-right reply-info'>
              {if($question->status == 'wait' and $question->account == $app->user->account)}
              {!html::a(inlink('setBestAnswer', "questionID=$question->id&answerID=$answer->id"), $lang->ask->setBestAnswer, "class='ajaxJSON'")}
              {/if}

              {if($app->user->account == $question->account and commonModel::isAvailable('score'))}
              {!echo ' | ' . $lang->ask->awardAnswer . ' '}
              {foreach($lang->question->scoreList as $score => $scoreLabel)}
              {!html::a(inlink('awardAnswer', "answer=$answer->id&score=$score"), $scoreLabel, "class='ajaxJSON'")}
              {/foreach}
              {/if}
            </div>
          </td>
        </tr>
      </table>
    </div>
    {@$i++}
    {/foreach}
  </div>
{/if}
{if(isset($pageJS))} {!js::execute($pageJS)} {/if}
