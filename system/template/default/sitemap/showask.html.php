{if(!empty($questions))}
<div class='clearfix sitemap-tree'>
  <h4>{$lang->sitemap->questionList}</h4>
  <ul class='tree'>
    {foreach($questions as $question)}
      <li>{!html::a(helper::createLink('ask', 'view', "questionID=$question->id"), $question->title)}</li>
    {/foreach}
  </ul>
</div>
{/if}
