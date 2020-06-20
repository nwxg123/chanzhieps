{$categoryID = isset($categoryID) ? $categoryID : 0}
{$askURL = inlink('ask', "category=$categoryID")}
{if($control->app->user->account == 'guest')} {$askURL = $control->createLink('user', 'login', "referer=" . helper::safe64Encode($askURL))} {/if}
{!html::a($askURL, "<i class='icon-question-sign'></i> " . $lang->ask->question, "class='btn btn-primary btn-block' style='margin-bottom: 20px; padding: 8px'")}
{!js::set('category', $categoryID)}

<form method='get' action='{!inlink('index')}'>
  <div class='input-group' style="margin-bottom: 20px">
    {!html::input('keyword', isset($keyword) ? $keyword : '', "class='form-control'")}
    {if($config->requestType == 'GET')}
      {!html::hidden($config->moduleVar, 'ask')}
      {!html::hidden($config->methodVar, 'index')}
    {/if}
    <span class='input-group-btn'>{!html::submitButton($lang->ask->search, 'btn')}</span>
  </div>
</form>

<div class='panel'>
  <div class='panel-heading'><strong>{$lang->question->category}</strong></div>
  <div class='panel-body'>
    {if(isset($config->request->categoryRule) and $config->request->categoryRule == 'global')}
      {$categoryTree}
    {elseif($config->request->categoryRule == 'byCategory')}
      {!$control->loadModel('tree')->getTreeMenu('product', 0, array('exttreeModel', 'createAskBrowseLink'))}
    {else}
      <div id='treeMenuBox'>
        <ul class="tree" data-initial-state="expand" >
          {foreach($categoryTree as $id => $name)}
            <li>{!html::a(inlink('index', "categoryID=$id"), $name)}</li>
          {/foreach}
        </ul>
      </div>
    {/if}
  </div>
</div>
