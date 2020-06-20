{if(!$product->isGift)}
  {if($control->app->clientDevice != 'mobile')}
    {$price = $control->product->computePrice($product)}
    {!js::set('location', helper::safe64Encode($canonicalURL))}
    {$lang->product->toLogin = str_replace('%s', html::a(helper::createLink('user', 'login', "referer=" . helper::safe64Encode($canonicalURL)), $lang->login), $lang->product->toLogin)} 
    {if(commonModel::isAvailable('score'))}
      {$toLogin          = false}
      {$hasUserPrivilege = false}
      {$hasDiscount      = false}
      {if($control->app->user->account == 'guest')}
        {$privilege = $control->loadModel('product')->getUserPrivilege($product->id)}
        {$discount  = $control->product->getDiscount()}
        {if($privilege !== false or $discount !== false)} {$toLogin = true} {/if}
      {else}
        {$levelCode = $control->loadModel('user')->getUserLevel($control->app->user->account,'code')}
        {$privilege = $control->loadModel('product')->getUserPrivilege($product->id ,$levelCode)}
        {$discount  = $control->product->getDiscount($levelCode)}
        {if($privilege !== false)}
          {$hasUserPrivilege = true}
        {elseif($discount !== false)}
          {$hasDiscount = true}
        {/if} 
      {/if}
    {/if}
    
    {$attributeHtml = ''}
    {if($product->unsaleable)}
      {if($product->promotion != 0)}
        {if($product->price != 0)}
          {$attributeHtml .= "<li id='priceItem'><span class='meta-name'>" . $lang->product->price . "</span>"}
          {$attributeHtml .= "<span class='meta-value'><span class='text-muted text-latin'>" . $config->product->currencySymbol . "</span> <del><strong class='text-latin'>" . $product->price . "</del></strong></span></li>"}
        {/if}
        {$attributeHtml .= "<li id='promotionItem'><span class='meta-name'>" . $lang->product->promotion . "</span>"}
    
        {if(isset($toLogin) and $toLogin)}
          {$attributeHtml .= "<span class='meta-value'><span class='text-muted text-latin'>" . $config->product->currencySymbol . "</span> <strong class='text-danger text-latin text-lg'>" . $product->promotion . "</strong>"}
        {else}
          {$attributeHtml .= "<span class='meta-value'><span class='text-muted text-latin'>" . $config->product->currencySymbol . "</span> <strong class='text-danger text-latin text-lg'>" . $price . "</strong>"}
        {/if}
        {$attributeHtml .= (isset($toLogin) and $toLogin) ? "<span class='blue'>" . $lang->product->toLogin. "</span></span></li>" : "</span></li>"}
      {elseif($product->price != 0)}
        {$attributeHtml .= "<li id='priceItem'><span class='meta-name'>" . $lang->product->price . "</span>"}
        {if(isset($toLogin) and $toLogin)}
          {$attributeHtml .= "<span class='meta-value'><span class='text-muted text-latin'>" . zget($lang->product->currencySymbols, $config->product->currency, '￥') . "</span> <strong class='text-important text-latin text-lg'>" . $product->price . "</strong>"}
        {else}
          {$attributeHtml .= "<span class='meta-value'><span class='text-muted text-latin'>" . $config->product->currencySymbol . "</span> <del><strong class='text-latin'>" . $product->price . "</del></strong></span></li>"}
          {$attributeHtml .= "<li><span class='meta-name'>" . $lang->product->userPromotion . "</span>"}
          {$attributeHtml .= "<span class='meta-value'><span class='text-muted text-latin'>" . $config->product->currencySymbol . "</span> <strong class='text-danger text-latin text-lg'>" . $price . "</strong>"}
        {/if}
        {$attributeHtml .= (isset($toLogin) and $toLogin) ? "<span class='blue'>" . ' ' . $lang->product->toLogin. "</span></span></li>" : "</span></li>"}
      {/if}
    {/if}
    
    {!js::set('attributeHtml', $attributeHtml)}
    {!js::set('price', $price)}
    
    {if(isset($hasDiscount))} {!js::set('hasDiscount', $hasDiscount)} {/if}
    {if(isset($discount))} {!js::set('discount', $discount)} {/if}
    <form id='buyForm' action='{!helper::createLink('order', 'confirm')}' method='post' >
      <ul class="list-unstyled meta-list" id='attributeBox'>
        {$control->product->printAttributes($product)}
        {!html::hidden("price[$product->id]", $price)}
        {!html::hidden("product[$product->id]", $product->id)}
        {!html::hidden("count[$product->id]", 1, "class='count-input'")}
      </ul>
    </form>
    <span id='btnBox'>
      {if(($stockOpened and $product->amount < 1) or $product->status == 'offline')}
        <label class='btn-soldout'>{$lang->product->soldout}</label>
      {else}
        {if($control->app->user->account != 'guest')}
          <label id='buyBtn' class='buy'>{$lang->product->buyNow}</label>
        {else}
          <label id='buyBtn' class='login'>{$lang->product->buyNow}</label>
        {/if}
        <label id='cartBtn'>{$lang->product->addToCart}</label>
      {/if}
    </span>
    {noparse}
    <script>
    $(document).ready(function()
    {
        $('#priceItem').replaceWith(v.attributeHtml);
        extra = {};
        $('#buyBtnBox').before($('#buyForm'));
        $('#buyBtnBox').replaceWith($('#btnBox'));

        if($('#countBox').length)
        {
            $('#buyForm').after($('#countBox').parent());
        }
        else
        {
            $('#buyForm').hide();
        }
        $('.price-label').click(function()
        {
            hideAttrForm();
            $(this).parent().find('.active').removeClass('active');
            $(this).addClass('active');
            code = $(this).data('attribute');
            extra[code] = $(this).data('value');
            $(this).find('[type=hidden]').val($(this).data('value'));
    
            computedPrice();
        });
    
        $('.attr-selector').click(function()
        {
            code = $(this).data('attribute');
            $('.' + code + '-inputer').val($(this).data('value'));
        })
    
       $('#count').change(function()
       {
           $('.count-input').val($(this).val())
       });
    
        $('#cartBtn').click(function()
        {
            if(!checkAttr()) 
            {
                alertAttrForm();
                return false;
            }
    
            $.post(createLink('cart', 'add', "product=" + v.objectID + '&count=' + $('#count').val()),
                {extra: extra},
                function(response)
                {
                    if(response.result == 'success')
                    {
                        loadCartInfo(true);
                    }
                    else
                    {
                        location.href = response.locate;           
                    }
                },
                'json'
            )
        });
        
        $('#buyBtn.login').click(function(){location.href=createLink('user', 'login', "referer=" + v.location)});
        $('#buyBtn.buy').click(function()
        {
            if(!checkAttr()) 
            {
                alertAttrForm();
                return false;
            }
            $('#buyForm').submit();
         });
    
        function alertAttrForm() { $('#attributeBox').css('border', '1px solid red'); }
        function hideAttrForm() { $('#attributeBox').css('border', 'none'); }
    
        function computedPrice()
        {
            if(!checkAttr()) return false;
            price = v.price;
            $('.attr-selector.active').each(function()
            {
                if($(this).data('price') && $(this).data('price') != 0)
                {
                    value = $(this).data('price');
                    price = parseFloat(price) + parseFloat(value);
                }
                price = parseFloat(price);
                price = price.toFixed(2);
            });
            if(v.hasDiscount)
            {
                price = price * v.discount;
                price = price.toFixed(2);
            }
            $('.product-property .meta-list .meta-value strong.text-danger').html(price);
            $('.product-property .meta-list .meta-value strong.text-important').html(price);
            $('#price').val(price);
        }
    
        function checkAttr()
        {
            attrSelected = true;
            $('.attr-selector').each(function()
            {
                if($(this).parents('li').find('.attr-selector.active').size() == 0) attrSelected = false;
            });
            return attrSelected;
        }
    });
    </script>
    {/noparse}
  {/if}
{/if}
