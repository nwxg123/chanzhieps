{include TPL_ROOT . 'common/header.html.php'}
<div class="page-user-control">
  <div class="row">
    {include TPL_ROOT . 'user/side.html.php'}
    <div class="col-md-10">
      <div class='panel'>
        <div class='panel-heading'>
          <strong><i class="icon-shopping-cart"> </i>{$lang->trade->browse}</strong>
          <label class='text-important'>{!echo $lang->balance->common . $balance}</label>
          <div class='panel-actions'>{!html::a($control->createLink('balance', 'recharge'), $lang->user->recharge, "class='btn btn-primary' data-toggle='modal'")}</div>
        </div>
        <table class='table table-hover table-bordered tablesorter'>
          <thead>
            <tr class='text-center'>
              <th class='w-60px'>{$lang->trade->id}</th>
              <th class='w-100px'>{$lang->trade->type}</th>
              <th class='w-120px text-center'>{$lang->trade->amount}</th>
              <th class='w-120px text-center'>{$lang->trade->before}</th>
              <th class='w-120px text-center'>{$lang->trade->after}</th>
              <th class='w-120px text-center'>{$lang->trade->createdBy}</th>
              <th class='w-140px text-center'>{$lang->trade->createdDate}</th>
            </tr>
          </thead>
          <tbody>
          {foreach($trades as $trade)}
            <tr>
              <td class='text-center text-middle'>{$trade->id}</td>
              <td class='text-center text-middle'>{!zget($lang->trade->typeList, $trade->tradeType)}</td>
              <td class='text-right text-middle'>{$trade->amount}</td>
              <td class='text-right text-middle'>{$trade->before}</td>
              <td class='text-right text-middle'>{$trade->after}</td>
              <td class='text-center text-middle'>{$trade->createdBy}</td>
              <td class='text-center text-middle'>{$trade->createdDate}</td>
            </tr>
          {/foreach}
          </tbody>
          <tfoot><tr><td colspan='8'>{$pager->show()}</td></tr></tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
{include TPL_ROOT . 'common/footer.html.php'}
