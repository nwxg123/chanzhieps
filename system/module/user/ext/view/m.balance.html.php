{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header.simple')}
<style>
.panel-section {margin-left:0px;margin-right:0px;background-color:#f1f1f1}
.panel-heading {margin-left:5px}
.panel-heading.spacing{margin-bottom:12px}
.panel-body {background-color:#fff}
.table>thead>tr>th {border-bottom:0px}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {padding:5px;border-top:0px}
.tag-block {margin:12px;background:#fff}
.tag-block > .tag {width:100%;overflow:hidden} 
.tag-block > .tag > img {float:left}
.tag-block > .tag > .tag-body {width:100%;height:40px;padding-left:12px;display:block}
.tag-block > .tag > .tag-body > .tag-title {float:left}
.tag-block > .tag > .tag-body > .tag-right {float:right}
.tag-block.user-balance {margin:0px}
.tag-block.user-balance > .tag > .tag-body {padding-left:0px}
.tag-block.user-balance > .tag > .tag-body > .tag-title > div {color:#333;font-size:1.7rem}
.tag-block.user-recharge {margin:0px;height:74px;padding:12px 0px}
.tag-block.user-recharge .btn-recharge {width:90px;height:3rem;line-height:3rem;border:1px solid #6F9AFE;color:#fff;background:linear-gradient(to right,#709BFE,#1B5AFF);float:right;text-align:center;margin-top:8px;margin-right:15px}
.tag-balance {width:90px;float:left;text-align:center}
.tag-balance.keepleft {margin-left:50px}
.balance-number {height:30px;line-height:30px;font-size:3rem;font-weight:600}
.balance-title {height:20px;line-height:20px;color:#999;margin-top:4px}
</style>
<div class='row'>
  <div class='col-md-10'>
    <div class='panel-section'>
      <div class='panel-heading'>
        <div class='title strong'>{$lang->user->balance}</div>
      </div>
      <div class='panel-heading spacing'>
        <div class='tag-block user-recharge'>
          <div class='tag'>
            <div class='tag-balance keepleft'>
              {if($app->user->account == 'guest')}
              <div class='balance-number'>0</div>
              {else}
              {$balance = $control->loadModel('balance')->decode($user->balance)}
              <div class='balance-number'>{$balance}</div>
              {/if}
              <div class='balance-title'>{$lang->user->balance}</div>
            </div>
            {if($config->shop->payment != 'balance' and $config->shop->payment != 'COD,balance')}
            {!html::a($control->createLink('balance', 'recharge'), $lang->user->recharge, "class='btn-recharge' data-toggle='modal'")}
            {/if}
          </div>
        </div>
      </div>
      <div class='panel-body'>
      <table class='table table-hover'>
        <thead>
          <tr>
            <th class='w-100px'>{$lang->user->time}</th>
            <th class='w-150px'>{$lang->user->amount}</th>
            <th class='w-150px'>{$lang->user->before}</th>
            <th>{$lang->user->after}</th>
          </tr>
        </thead>
        <tbody id='balance'>
          {foreach($balances as $balance)}
            <tr>
              <td>{!substr($balance->createdDate,0,10)}</td>
              <td>{$balance->amount}</td>
              <td>{$balance->before}</td>
              <td>{$balance->after}</td>
            </tr>  
          {/foreach}
        </tbody>
        <tfoot>
          <tr><td colspan='8' class='a-right'>
            {$pager->createPullUpJS('#balance', $lang->mobile->pullUpHint, helper::createLink('user', 'balance', "recTotal=$pager->recTotal&recPerPage=$pager->recPerPage&pageID=\$ID"))}
          </td></tr>
        </tfoot>
      </table>
      </div>
    </div>
  </div>
</div>
{include TPL_ROOT . 'common/form.html.php'}
