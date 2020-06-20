<?php if(!class_exists('raintpl')){exit;}?><?php if(zget($config->product, 'searchbox', '')){ ?>

  <?php if(!empty($children) or !empty($attributes)){ ?>

    <div class="panel product-form" id='searchBox'>
      <div class="panel-heading">
        <?php echo $lang->product->selectedCondation; ?> - <span class="selectType">[<?php echo $category->name;?>]</span>
      </div>
      <div class="panel-body">
        <form id="searchForm">
          <div class="attrs">
            <?php if(!empty($children)){ ?>

              <div class="attr">
                <div class="attr-key"><?php echo $lang->product->category;?></div>
                <div class="attr-value">
                  <?php foreach($children as $child): ?>

                    <?php echo html::a(inlink('browse', "category={$child->id}&pageID=1&param=" . helper::safe64Encode(json_encode($params))), $child->name); ?>

                  <?php endforeach; ?>

                </div>
              </div>
            <?php } ?>

            <?php if(!empty($attributes)){ ?>

              <?php foreach($attributes as $attribute): ?>

                <?php $options=$this->var['options'] = json_decode($attribute->values);?>

                <?php $newParams=$this->var['newParams'] = $params;?>

                <div class="attr-key"><?php echo $attribute->name;?></div>
                <div class="attr-value">
                  <?php foreach($options as $value): ?>

                    <?php $active=$this->var['active'] = (zget($params, $attribute->code, '') == $value) ? "class='active'" : '';?>

                    <?php $code=$this->var['code'] = $attribute->code;?>

                    <?php $newParams["$code"] = urlencode($value);?>

                    <?php $query=$this->var['query'] = http_build_query($newParams);?>

                    <?php if($config->requestType == 'GET'){ ?>

<?php echo html::a(inlink('browse', "category={$category->id}&pageID=1&{$query}"), $value, $active); ?>

<?php } ?>

                    <?php if($config->requestType != 'GET'){ ?>

<?php echo html::a(inlink('browse', "category={$category->id}&pageID=1") . "?{$query}", $value, $active); ?>

<?php } ?>

                  <?php endforeach; ?>

                </div>
              <?php endforeach; ?>

<?php } ?>

          </div>
        </form>
      </div>
    </div>
    
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
    
<?php } ?>

<?php } ?>

