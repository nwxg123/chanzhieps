{include TPL_ROOT . 'common/header.html.php'}
<div class='row'>
  {include TPL_ROOT . 'user/side.html.php'}
  <div class='col-md-10'>
    <div class='panel'>
      <div class='panel-heading'>
        <strong>{$lang->user->control->cases}</strong>
        <div class='panel-actions'>{!html::a($control->createLink('usercase', 'create'), $lang->usercase->create, "class='btn btn-primary'")}</div>
      </div>
      <table class='table table-hover table-striped'>
        <thead>
          <tr>
            <th class='w-id'>{$lang->usercase->id}</th>
            <th>{$lang->usercase->company}</th>
            <th class='w-150px'>{$lang->usercase->addedDate}</th>
            <th class='w-80px'>{$lang->usercase->views}</th>
            <th class='w-80px'>{$lang->usercase->status}</th>
            <th class='w-100px'>{$lang->actions}</th>
          </tr>
        </thead>
        <tbody>
          {foreach($cases as $case)}
            <tr class='a-center'>
              <td>{$case->id}</td> 
              <td class='a-left'>{$case->company}</td> 
              <td>{$case->addedDate}</td> 
              <td>{$case->views}</td> 
              <td>{$lang->usercase->statusList[$case->status]}</td> 
              <td>
                {if($case->status != 1)}
                  {!html::a($control->createLink('usercase', 'edit', "id=$case->id"), $lang->edit)}
                {else}
                  {!html::a('javascript:;', $lang->edit, "class='disabled'")}
                {/if}
                {!html::a($control->createLink('usercase', 'view', "id=$case->id"), $lang->preview)}
              </td> 
            </tr>
            {/foreach}
        </tbody>
      </table>
    </div>
  </div>
</div>
{include TPL_ROOT . 'common/footer.html.php'}
