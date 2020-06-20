{include TPL_ROOT . 'common/header.html.php'}
{$common->printPositionBar('search', null, $words)}
<div class='row'>
  <div class='col-md-12'>
    <div class='list list-condensed'>
      <header>
        <h2>{$lang->search->index}</h2>
      </header>
      {if(isset($config->site->searchRange) and $config->site->searchRange == 'mall')}
        <section id="cardMode" class='cards cards-products cards-borderless'>
          {foreach($results as $product)}
            <div class='col-sm-3 col-xs-6'>
              <div class='card' data-ve='product' id='product{$product->id}'>
                {if(empty($product->image))}
                  {!html::a($product->url, '<div class="media-placeholder" data-id="' . $product->id . '">' . $product->title . '</div>', "class='media-wrapper'")}
                {else}
                  {$title = $product->image->primary->title ? $product->image->primary->title : strip_tags($product->title)}
                  {$product->image->primary->objectType = 'product'}
                  {!html::a($product->url, html::image($control->loadModel('file')->printFileURL($product->image->primary, 'middleURL'), "title='{{$title}}'"), "class='media-wrapper'")}
                {/if}
                <div class='card-heading'>
                  <div class='price'>
                    {$currencySymbol = $control->config->product->currencySymbol}
                    {if(!$product->unsaleable)}
                      {if($product->promotion != 0)}
                        <strong class='text-danger'>{!echo  $currencySymbol . $product->promotion}</strong>
                      {else}
                        {if($product->price != 0)} <strong class='text-danger'>{!echo $currencySymbol . $product->price}</strong> {/if}
                      {/if}
                    {/if}
                  </div>
                  <div class='text-nowrap text-ellipsis'>
                    <span class='pull-left'>{!html::a($product->url, $product->title)}</span>
                    {$productView = isset($config->ui->productView) ? $config->ui->productView : true}
                    {if($productView)}
                      <span data-toggle='tooltip' class='text-muted views-count pull-right' title='{$lang->product->viewsCount}'>
                        <i class="icon icon-eye-open"></i>{$product->views}
                      </span>
                    {/if}
                  </div>
                </div>
              </div>
            </div>
          {/foreach}
        </section>
      {else}
        <section class='items items-hover'>
          {foreach($results as $object)}
            <div class='item'>
              <div class='item-heading'>
                <div class="text-muted pull-right">
                  <span title="{$lang->object->addedDate}"><i class='icon-time'></i> {!substr($object->editedDate, 0, 10)}</span>
                </div>
                <h4>{!html::a($object->url, $object->title)}</h4>
              </div>
              <div class='item-content'>
                {if(!empty($object->image))}
                  <div class='media pull-right'>
                    {$title = $object->image->primary->title ? $object->image->primary->title : strip_tags($object->title)}
                    {!html::a($object->url, html::image($control->loadModel('file')->printFileURL($object->image->primary, 'smallURL'), "title='{{$title}}'"), "class='thumbnail'")}
                  </div>
                {/if}
                <div class='text text-muted'>{$object->summary}</div>
              </div>
            </div>
          {/foreach}
        </section>
      {/if}
      <footer class='clearfix'>
        {!str_replace($words, urlencode($words), $pager->get('right', 'short'))}
        <span class='execute-info text-muted'>{!printf($lang->search->executeInfo, $pager->recTotal, $consumed)}</span> 
      </footer>
    </div>
  </div>
</div>
{include TPL_ROOT . 'common/footer.html.php'}
