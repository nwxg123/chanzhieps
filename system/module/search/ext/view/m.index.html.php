{*php
/**
 * The index view file of search for mobile template of chanzhiEPS.
 * The file should be used as ajax content
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件非免费软件
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     search
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
/php*}
{include TPL_ROOT . 'common/header.simple.html.php'}
<div class='panel panel-section'>
  <div class='panel-heading'>
    <strong>{$lang->search->index}</strong>
  </div>
  <div class='panel-body'>
  {if(isset($config->site->searchRange) and $config->site->searchRange == 'mall')}
    {$count = count($results)}
    {if($count == 0)} {$count = 1} {/if}
    {$recPerRow = min($count, 2)}
    {@$percent  = 100/$recPerRow}
    <div class='cards cards-products' data-cols='{$recPerRow}' id='search'>
      <style>.col-custom-{$recPerRow} {width: {$percent}%}</style>
      {$index = 0}
      {foreach($results as $product)}
        {$rowIndex = $index % $recPerRow}
        {if($rowIndex === 0)}
          <div class='row'>
        {/if}

        <div class='col col-custom-{$recPerRow}'>
          {$url = helper::createLink('product', 'view', "id=$product->objectID", "category={{$product->category->alias}}&name=$product->alias")}
          <div class='card' id='product{$product->id}' data-ve='product'>
            <a class='card-img-fixed' href='{$url}'>
              {if(empty($product->image))}
                {$imgColor = $product->id * 57 % 360}
                <div class='media-placeholder' style='background-color: hsl({$imgColor}, 60%, 80%); color: hsl({$imgColor}, 80%, 30%);' data-id='{$product->id}'>{$product->title}</div>
              {else}
                {$product->image->primary->objectType = 'product'}
                {$imgsrc = $control->loadModel('file')->printFileURL($product->image->primary, 'middleURL')}
                <img src='{$imgsrc}'>
              {/if}
            </a>
            <div class='card-content'>
              <div class='card-title'>
                <a href='{$url}' style='color:{$product->titleColor}'>{$product->title}</a>
              </div>
              {if(!$product->unsaleable)}
                {if($product->negotiate)}
                  <div class='card-price'><strong class='text-danger'>{$lang->product->negotiate}</strong></div>'
                {else}
                  {if($product->promotion != 0)}
                    <div class='card-price'><strong class='text-danger'>{$control->config->product->currencySymbol}{$product->promotion}</strong>
                      {if($product->price != 0)}
                      <small class='text-muted text-line-through'>{$control->config->product->currencySymbol}{$product->price}</small>
                      {/if}
                    </div>
                  {elseif($product->price != 0)}
                    <div class='card-price'><strong class='text-danger'>{$control->config->product->currencySymbol}{$product->price}</strong></div>
                  {/if}
                {/if}
              {/if}
            </div>
          </div>
        </div>
        {if($recPerRow === 1 || $rowIndex === ($recPerRow - 1))}
        </div>
        {/if}
        {@$index++}
      {/foreach}
    </div>
  {else}
    <div class='cards condensed cards-list' id='search'>
    {foreach($results as $object)}
      <a class='card card-block' href='{$object->url}'>
        <div class='card-heading'>
          <h5>{$object->title}</h5>
        </div>
        <div class='table-layout'>
          <div class='table-cell'>
            <div class='card-content text-muted small'>{$object->summary}</div>
            <div class='card-footer small text-muted'>
              <span title="{$lang->article->addedDate}"><i class='icon-time'></i> {!substr($object->addedDate, 0, 10)}</span>
            </div>
          </div>
          {if(!empty($object->image))}
            <div class='table-cell thumbnail-cell'>
              {$title = $object->image->primary->title ? $object->image->primary->title : $object->title}
              {$object->image->primary->objectType = $object->objectType}
              {!html::image($control->loadModel('file')->printFileURL($object->image->primary, 'smallURL'), "title='{{$title}}' class='thumbnail'")}
            </div>
          {/if}
        </div>
      </a>
    {/foreach}
    </div>
  {/if}
  </div>
  <div class='panel-footer'>
    {$pager->createPullUpJS('#search', $lang->mobile->pullUpHint, helper::createLink('search', 'index', "words=$words&pageID=\$ID"))}
  </div>
</div>
