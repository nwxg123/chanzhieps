{if(strpos($config->shop->payment, 'balance') !== false)}
<style>
.user-score .tag-right > span {font-size:2.0rem;margin-right:10px;font-weight:600;line-height:30px}
</style>
{$balance = $control->loadModel('balance')->decode($user->balance)}
<div class='tag-block user-score balance'>
  <div class='tag' data-url="{$control->createLink('user', 'balance')}">
    <a class='tag-body' href="{$control->createLink('user', 'balance')}">
      <div class='tag-title'>
        <div>
          {$lang->user->myBalance}
        </div>
      </div>
      <div class='tag-right'>
        <span>{$balance}</span>
        {!html::image($config->webRoot . 'theme/mobile/common/img/right.png')}
      </div>
    </a>
  </div>
</div>
{noparse}
<script>
$().ready(function()
{
    $('.user-image').after($('.balance'));
    var score = $('.score-number').html();
    $('.user-score:not(.balance) .tag-right').prepend('<span>' + score + '</span>');
    $('.tag-block.user-recharge').remove();
})
</script>
{/noparse}
{/if}
