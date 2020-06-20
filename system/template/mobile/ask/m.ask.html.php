{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header.simple')}
<div class='panel-section'>
  {if(commonModel::isAvailable('score') && $app->user->score < $config->ask->minScore)}
    {$control->fetch('score', 'noscore', array('method' => 'question', 'score' => $config->ask->minScore))}
  {else}
    <div class='panel-body'>
      <form id='askForm' class='box' method='post'>
        {if(!empty($config->request->categoryRule) and $config->request->categoryRule != 'global')}
          <div class='control'>
            <label for='product'>{$lang->request->product}</label>
            <div class="select">
              {!html::select('category', $productList, '', "class='form-control product-options'")}
            </div>
          </div>
        {/if}
        {if(!empty($categories))}
        <div class='control'>
          <label for='category'>{$lang->question->category}</label>
          {!html::select('category', $categories, '', "class='form-control'")}
        </div>
        {/if}
        <div class='control'>
          <label for='title'>{$lang->question->title}</label>
          {!html::input('title', '', "class='form-control'")}
        </div>
        <div class='control'>
          <label for='desc'>{$lang->question->desc}</label>
          {!html::textarea('desc', '', "class='form-control' rows=5")}
        </div>
        {if(commonModel::isAvailable('score'))}
          <div class='control'>
            <label for='score'>{$lang->question->score}</label>
            {!html::input('score', $config->ask->minScore, "class='form-control'")}
            <p class='help-text'>{$lang->question->lblScore}</p>
          </div>
        {/if}
        <table style='width: 100%'>
          <tr class='hide captcha-box'></tr>
        </table>
        <div class='control'>
          {!html::submitButton('', 'btn primary block')}
        </div>
      </form>
    </div>
  {/if}
</div>
{if(isset($pageJS))} {!js::execute($pageJS)} {/if}

