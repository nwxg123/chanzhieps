{include TPL_ROOT . 'common/header.html.php'}
{$common->printPositionBar('', $gift)}
{!js::set('score', $gift->score)}
<div class='panel'>
  <form method='post' id='ajaxForm'>
    <div class='panel-heading'><strong>{$lang->gift->exchangeGift}</strong></div>
      <div id='addressBox'>
      </div>
      {if($extra)}
        {foreach($extra as $attr => $value)}
          {!html::hidden("extra[$attr]", $value)}
        {/foreach}
      {/if}
    {!html::hidden("giftID", $gift->id)}
    <table class='table table-form'>
      <tr>
        <th class='w-120px'>{$lang->order->address}</th>
        <td colspan='2'>
          <span>
            {!html::a(helper::createLink('address', 'create') . ' form', $lang->address->create, "class='createAddress'")}
            {!html::hidden("createAddress", '')}
          </span>
          <div id='addressList'></div>
          <div class='div-create-address hide'>
            <table class='table table-borderless address-form table-list'>
              <tr>
                <td class='w-100px'>{!html::input('contact', '', "class='form-control' placeholder='{{$lang->address->contact}}'")}</td>
                <td class='w-130px'>{!html::input('phone', '', "class='form-control' placeholder='{{$lang->address->phone}}'")}</td>
                <td>{!html::input('address', '', "class='form-control' placeholder='{{$lang->address->address}}'")}</td>
                <td class='w-100px'>{!html::input('zipcode', '', "class='form-control' placeholder='{{$lang->address->zipcode}}'")}</td>
                <td class='w-50px text-middle'><strong class='icon icon-remove' style='cursor:pointer'> </i></td>
              </tr>
            </table>
          </div>
        </td>
      </tr>
      <tr>
        <th class='w-120px'>{$lang->gift->name}</th>
        <td class='w-p30'>
          {!echo $gift->name . ($extra ? '[' . join(' - ', $extra) . ']' : '')}
        </td>
        <td></td>
      </tr>
      <tr>
        <th>{$lang->gift->score}</th>
        <td>
          <strong id='score' class='text-lg text-danger'>{$gift->score}</strong>
          {$score = $control->loadModel('user')->getByAccount($control->app->user->account)->score}
          <span id='userScore' >{$lang->gift->scoreOwned}<strong class='text-warning'>{$score}</strong></span>
        </td>
      </tr>
	  <tr>
	    <th>{$lang->gift->exchangeLimit}</th>
        <td>{!echo $gift->exchangeLimit . ' (' . sprintf($lang->gift->userLimit, $userLimit) . ')'}</td>
	  </tr>
	  <tr>
	    <th>{$lang->gift->amount}</th>
        <td>{!html::input('amount', $count, "class='form-control'")}</td>
	  </tr>
      <tr><th></th><td>{!html::submitButton($control->lang->gift->exchange) . html::linkButton($lang->goback, inlink('index'))}</td></th>
    </table>
  </form>
</div>
{include TPL_ROOT . 'common/footer.html.php'}
