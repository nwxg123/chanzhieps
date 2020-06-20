{if(zget($config->product, 'searchbox', ''))}
  {if(!empty($children) or !empty($attributes))}
    <div class="panel product-form" id='searchBox'>
      <div class="panel-heading">
        {!$lang->product->selectedCondation} - <span class="selectType">[{$category->name}]</span>
      </div>
      <div class="panel-body">
        <form id="searchForm">
          <div class="attrs">
            {if(!empty($children))}
              <div class="attr">
                <div class="attr-key">{$lang->product->category}</div>
                <div class="attr-value">
                  {foreach($children as $child)}
                    {!html::a(inlink('browse', "category={{$child->id}}&pageID=1&param=" . helper::safe64Encode(json_encode($params))), $child->name)}
                  {/foreach}
                </div>
              </div>
            {/if}
            {if(!empty($attributes))}
              {foreach($attributes as $attribute)}
                {$options = json_decode($attribute->values)}
                {$newParams = $params}
                <div class="attr-key">{$attribute->name}</div>
                <div class="attr-value">
                  {foreach($options as $value)}
                    {$active = (zget($params, $attribute->code, '') == $value) ? "class='active'" : ''}
                    {$code = $attribute->code}
                    {$newParams[$code] = urlencode($value)}
                    {$query = http_build_query($newParams)}
                    {if($config->requestType == 'GET')} {!html::a(inlink('browse', "category={{$category->id}}&pageID=1&{{$query}}"), $value, $active)} {/if}
                    {if($config->requestType != 'GET')} {!html::a(inlink('browse', "category={{$category->id}}&pageID=1") . "?{{$query}}", $value, $active)} {/if}
                  {/foreach}
                </div>
              {/foreach}
            {/if}
          </div>
        </form>
      </div>
    </div>
    {noparse}
    <script>
    $().ready(function()
    {
        $('#products').before($('#searchBox'));
        $('#searchBox .attr-value a.active').each(function()
        {
            $('#searchBox .panel-heading').append(' - <span class="selectType">[' + $(this).text() + ']</span>');
        })
    });
    </script>
    {/noparse}
  {/if}
{/if}
