{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header')}
<div class='panel-section'>
  <div class='panel-heading page-header'>
    <div class='title'><strong><i class="icon icon-question"></i>{$lang->ask->common}</strong></div>
  </div>
  {if(commonModel::isAvailable('score') && $app->user->score < $config->ask->minScore)}
    {$control->fetch('score', 'noscore', array('method' => 'question', 'score' => $config->ask->minScore))}
  {else}
    <div class='panel-body'>
      <form class='box' method='post' id='askAjaxForm'>
        {if(!empty($categories))}
        <div class='control'>
          <label for='category'>{$lang->question->category}</label>
          {!html::select('category', $categories, '', "class='form-control'")}
        </div>
        {/if}
        <div class='control'>
          <label for='title'>{$lang->question->title}</label>
          {!html::input('title', $thread->title, "class='form-control'")}
        </div>
        <div class='control'>
          <label for='desc'>{$lang->question->desc}</label>
          {!html::textarea('desc', $thread->content, "class='form-control' rows=5")}
        </div>
        {if(commonModel::isAvailable('score'))}
          <div class='control'>
            <label for='score'>{$lang->question->score}</label>
            {!html::input('score', $config->ask->minScore, "class='form-control'")}
            <p class='help-text'>{$lang->question->lblScore}</p>
          </div>
        {/if}
        <div class='control'>
          {!html::submitButton('', 'btn primary block')}
        </div>
      </form>
    </div>
  {/if}
</div>
{noparse}
<script>
$('#askAjaxForm').ajaxForm();
</script>
{/noparse}
{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'footer')}
