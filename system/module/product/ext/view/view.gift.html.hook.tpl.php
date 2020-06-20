{if($product->isGift)}
  <div class='hide' id='hiddenbreadcrumb'>
    {$control->app->setModuleName('gift')}
    {$common->printPositionBar('gift', $product)}
    {$control->app->setModuleName('product')}
  </div>
  <ul>
    <li id='scoreItem'>
       <span class='meta-name'>{$lang->product->score}</span>
       <span class='meta-value'>
         <strong class='text-danger text-lg'>{$product->score}</strong>
         {if($control->app->user->account != 'guest')}
           {$score = $control->loadModel('user')->getByAccount($control->app->user->account)->score}
           ({$lang->product->possessCount} {$score})
         {/if}
       </span>
    </li>
  </ul>
  <form id='exchangeForm' action='{!helper::createLink('gift', 'exchange')}' method='post' >
    <ul class="list-unstyled meta-list" id='attributeBox'>
      {$control->product->printAttributes($product)}
      {!html::hidden("productID", $product->id)}
    </ul>
  </form>
  <span id='btnBox'>
    {if(($stockOpened and $product->amount < 1) or $product->status == 'offline')}
      <label class='btn-soldout'>{$lang->product->soldout}</label>
    {elseif($control->app->user->account != 'guest')}
      {!html::a('javascript:;', $lang->product->exchange, "class='btn btn-lg btn-success' id='exchangeBtn'")}
    {else}
      {!html::a(helper::createLink('user', 'login'), $lang->product->exchange, "class='btn btn-lg btn-success'")}
    {/if}
  </span>
  {noparse}
  <script>
  $(document).ready(function()
  {
      $('.breadcrumb').first().replaceWith($('#hiddenbreadcrumb .breadcrumb'));
      $('.product-property ul').first().prepend($('#scoreItem'));
      $('#priceItem, #promotion').remove();
      $('#priceItem, #promotionItem').remove();
      $('#btnBox').appendTo('.product-property');
      if($('#buyBtnBox').size()) $('#buyBtnBox').replaceWith($('#btnBox'));
      $('.product-property ul').last().after($('#exchangeForm'));
  
      $('.price-label').click(function()
      {
          hideAttrForm();
          $(this).parent().find('.active').removeClass('active');
          $(this).addClass('active');
          code = $(this).data('attribute');
          $(this).parent().find('[type=hidden]').val($(this).data('value'));
      });
  
      function checkAttr()
      {
          attrSelected = true;
          $('.attr-selector').each(function()
          {
              if($(this).parents('li').find('.attr-selector.active').size() == 0) attrSelected = false;
          });
          return attrSelected;
      }
  
      $('#exchangeBtn').click(function()
      {
          if(!checkAttr()) 
          {
              alertAttrForm();
              return false;
          }
          $('#exchangeForm').append("<input type='hidden' name='count' value=" + $('#count').val() + ">").submit();
       });
  
      function alertAttrForm() { $('#attributeBox').css('border', '1px solid red'); }
      function hideAttrForm() { $('#attributeBox').css('border', 'none'); }
  
  });
  </script>
  {/noparse}
{/if}
