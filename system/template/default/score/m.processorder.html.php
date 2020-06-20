{include TPL_ROOT . 'common/header.html.php'}
{if($result)}
  <h1 class='f-16px text-center green'>{$lang->score->paySuccess} </h1>
  <p class='text-center'>{!html::a($control->createLink('user', 'score'), $lang->score->details, "class='btn'")}</p>
{else}
  <h1 class='f-16px text-center red'>{$lang->score->payFail}</h1>
{/if}
{include TPL_ROOT . 'common/footer.html.php'}
