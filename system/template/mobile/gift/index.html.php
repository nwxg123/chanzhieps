{*php
/**
 * The index view file of gift for mobile template of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件非免费软件
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     gift
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
/php*}
{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header')}
<div class='panel-section'>
  <div class='panel-body'>
    {$count = count($gifts)}
    {if($count == 0)} {$count = 1} {/if}
    {$recPerRow = min($count, 2)}
    <div class='cards cards-gifts' data-cols='{$recPerRow}' id='gifts'>
      <style>{!echo ".col-custom-$recPerRow {{width:(100/$recPerRow)%;}}"}</style>
      {$index = 0}
      {foreach($gifts as $gift)}
      {$rowIndex = $index % $recPerRow}
      {if($rowIndex === 0)}
      <div class='row'>
      {/if}

      <div class='col col-custom-{!$recPerRow}'>
      {$url = helper::createLink('product', "view", "giftID=$gift->id")}
        <div class='card' id='gift{!$gift->id}' data-ve='gift'>
          <a class='card-img' href='{!$url}'>
            {if(empty($gift->image))}
              {$imgColor = $gift->id * 57 % 360}
              <div class='media-placeholder' style='background-color: hsl({$imgColor}, 60%, 80%); color: hsl({$imgColor}, 80%, 30%);' data-id='{$gift->id}'>
                {$gift->name}
              </div>
            {else}
              {$imgSrc = $control->loadModel('file')->printFileURL($gift->image->primary, 'middleURL')}
              <img class='lazy' alt='{$gift->name}' title='{$gift->name}' src='{$imgSrc}'> 
            {/if}
          </a>
          <div class='card-content'>
           <a href='{$url}'>{$gift->name}</a>
           <div>
             {$lang->gift->score}
             <strong class='text-danger'>{!echo  $lang->colon . $gift->score}</strong>
           </div>
            
          </div>
        </div>
      </div>

      {if($recPerRow === 1 || $rowIndex === ($recPerRow - 1))}
      </div>
      {/if}
      {/foreach}
    </div>
  </div>
  <div class='panel-footer'>{$pager->show('justify')}</div>
</div>

<div class='block-region region-bottom blocks' data-region='gift_browse-bottom'>{$control->loadModel('block')->printRegion($layouts, 'gift_browse', 'bottom')}</div>
{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'footer')}
