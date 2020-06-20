{include TPL_ROOT . 'common/header.html.php'}
{$common->printPositionBar($category)}
{$categoryID = isset($categoryID) ? $categoryID : 0}
{$askURL = inlink('ask', "category=$categoryID")}
{if($control->app->user->account == 'guest')} {$askURL = $control->createLink('user', 'login', "referer=" . helper::safe64Encode($askURL))} {/if}
<div class='row'>
  <div class='col-md-2'>{include TPL_ROOT . 'ask/blockleft.html.php'}</div>
  <div class='col-md-10'> 
    <div class='panel'> 
      <div class='panel-heading'>
        <strong>
          {if(isset($keyword))}
            {$lang->ask->searchResult}
          {else}
            {foreach($lang->question->typeList as $typeName => $typeLabel)}
              {$class = $typeName == $currentType ? 'active' : ''}
              {$alias = $category ? "name={{$category->alias}}" : 'name=all'}
              {!html::a(inlink('index', "category=$categoryID&type=$typeName", $alias), $typeLabel, "class='$class label-ask ask-$typeName'")}
            {/foreach} 
          {/if} 
        </strong>
        <div class='panel-actions'>{!html::a($askURL, $lang->ask->question, "class='btn btn-primary'")}</div>
      </div>
      <table class='table table-striped table-fixed datatable'>
        <thead>
          <tr class='text-center'>
            <th class='w-50px'>{$lang->question->id}</th>
            <th class='text-left'>{$lang->question->title}</th>
            <th class='w-100px'>{$lang->question->account}</th>
            {if(commonModel::isAvailable('score'))}
              <th class='w-60px'>{$lang->question->score}</th>
            {/if}
            <th class='w-60px'>{$lang->question->views}</th>
            <th class='w-60px'>{$lang->question->answers}</th>
            <th class='w-70px'>{$lang->question->status}</th>
            <th class='w-100px'>{$lang->question->addedDate}</th>
          </tr>
        </thead>
        <tbody>
          {foreach($questions as $question)}
            <tr class='text-center'>
              <td>{$question->id}</td>
              <td class='text-left' title='{$question->title}'>{!html::a(inlink('view', "id=$question->id"), $question->title)}</td>
              <td>{!zget($users, $question->account)}</td>
              {if(commonModel::isAvailable('score'))}
                <td>{$question->score}</td>
              {/if}
              <td>{$question->views}</td>
              <td>{$question->answers}</td>
              <td><span class='label-ask ask-{$question->status}'>{$lang->question->statusList[$question->status]}</span></td>
              <td>{!substr($question->addedDate, 5, 11)}</td>
            </tr>
          {/foreach}
        </tbody>
        <tfoot><tr><td colspan='8'>{$pager->show('right', 'short')}</td></tr></tfoot>
      </table>
    </div>
  </div>
</div>
{include TPL_ROOT . 'common/footer.html.php'}
