{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header')}
<div class='panel-section ask-wrapper'>
  <div class='panel-heading'>
    <div class='title strong'><i class='icon icon-question'></i>{$lang->ask->common}</div>
    <div class="dropdown operations">
          <span class="dropdown-toggle trigger" data-toggle="dropdown">
            <i class='circle'></i>
            <i class='circle'></i>
            <i class='circle'></i>
          </span>
      <ul class="dropdown-menu dropdown-menu-right options">
      {foreach($lang->question->typeList as $typeName => $typeLabel)}
        {$class = $typeName == $currentType ? 'active' : ''}
        {$alias = $category ? "name={{$category->alias}}" : 'name=all'}
        <li>
        {!html::a(inlink('index', "category=$categoryID&type=$typeName", $alias), $typeLabel, "class='$class label-ask ask-$typeName'")}
        </li>
      {/foreach}
      </ul>
    </div>
  </div>

  <div class='ask-list' id='askListWrapper'>
    {foreach($questions as $question)}
    <div class='ask'>
      <div class='titleWrapper'>
        <a href='{!inlink("view", "id=$question->id")}' title='{$question->title}' data-ve='question'>
          <span class='title'>{$question->title}</span>
        </a>
        <span class='status'>{$lang->question->statusList[$question->status]}</span>
      </div>
      <div class='content'>
        <a href='{!inlink("view", "id=$question->id")}' title='{$question->title}' data-ve='question'>
          {!strip_tags($question->desc)}
        </a>
      </div>
      <div class='ext'>
        <div class='first-col'>
          {if(commonModel::isAvailable('score'))}
          <span class='score'>{$lang->question->score . ':' .  $question->score}</span>
          {/if}
          <span class='views'>{$lang->question->views . ':' . $question->views}</span>
          <span class='answers'>{$lang->question->answers . ':' . $question->answers}</span>
        </div>
        <div class='second-col'>
          <span class='account'>{$lang->question->account . ':' . zget($users, $question->account)}</span>
          <span class='pub-time'>{$lang->question->addedDate . ':' . $question->addedDate}</span>
        </div>
      </div>
    </div>
    {/foreach}
  </div>
  <div class='panel-footer'>
    {$pager->createPullUpJS('#askListWrapper', $lang->mobile->pullUpHint)}
  </div>
  <footer class='appbar fix-right'>
    <a href='{!inlink("ask", "category=$categoryID")}'>
      <img src="/theme/mobile/default/posting.png">
    </a>
  </footer>
</div>
{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'footer')}