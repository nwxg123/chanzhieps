{if($product->isGift)}
  <table class='hide'>
    <tr id='scoreItem'>
       <th>{$lang->product->score}</th>
       <td>
         <strong class='text-danger text-lg'>{!$product->score}</strong>
         {if($control->app->user->account != 'guest')}
           {$score = $control->loadModel('user')->getByAccount($control->app->user->account)->score}
           ({$lang->product->possessCount}{$score})
         {/if}
       </td>
    </tr>
  </table>

  <div id='btnBox' class='exchange-btn'>
    {if(($stockOpened and $product->amount < 1) or $product->status == 'offline')}
    <span class='btn-text'>{$lang->product->soldout}</span>
    {else if($control->app->user->account != 'guest')}
    <span class='btn-text'>{!html::a('javascript:;', $lang->product->exchange, "class='btn block btn-lg success' id='exchangeBtn'")}</span>
    {else}
    <span class='btn-text'>{!html::a(helper::createLink('user', 'login'), $lang->product->exchange, "class='btn block btn-lg success'")}</span>
    {/if}
  </div>

  {!html::hidden("productID", $product->id)}

  {!js::set('exchangeURL', helper::createLink('gift', 'exchange'))}
  {noparse}
  <style>
    .exchange-btn {text-align: right}
    .exchange-btn .btn-text {margin-right: 10px; display: inline-block;}
    .appheader>.heading {padding: 0 !important;}
  </style>
  {/noparse}
  {noparse}
  <script>
  $(document).ready(function()
  {
      $('#buyForm').attr('id', 'exchangeForm');
      $('#exchangeForm').attr('action', v.exchangeURL);
      $('#exchangeForm').append($('#productID'));
      $('#exchangeForm table tbody').prepend($('#scoreItem'));
      $('.footer-right').html($('#btnBox'));
      $('#priceBox').remove();
      $('input').filter(function(){return this.id.match(/[price|count|product]\[.*\]/);}).remove();

      var checkAttr = function ()
      {
          attrSelected = true;
          $('.attr-selector').each(function()
          {
              if($(this).parents('td').find('.attr-selector.active').size() == 0) attrSelected = false;
          });
          return attrSelected;
      };

      var alertAttrForm = function ()
      {
          window.scrollTo(0,$('#attribute').offset().top-200)
          $('.attr-selector').parents('tr').css('border', '1px solid red');
      };

      var hideAttrForm = function ()
      {
          window.scrollTo(0,$('#attribute').offset().top-200)
          $('.attr-selector').parents('tr').css('border', 'none');
      };


      $('#exchangeBtn').click(function()
      {
          if(!checkAttr())
          {
              alertAttrForm();
              return false;
          }
          $('#exchangeForm').submit();
      });

      $('.price-label').click(function()
      {
          hideAttrForm();
          $(this).parent().find('.active').removeClass('active');
          $(this).addClass('active');
          code = $(this).data('attribute');
          extra[code] = $(this).data('value');
          $(this).find('[type=hidden]').val($(this).data('value'));
      });
  });
  </script>
  {/noparse}
{/if}
