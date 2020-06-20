{include $control->loadModel('ui')->getEffectViewFile('mobile', 'common', 'header.simple')}
<div class='panel-section'>
  <div class='panel-heading'>
    <div class='title strong'> {$lang->request->admin}</div>
  </div>
  <div class='request-list' id='requestListWrapper'>
    {foreach($requests as $request)}
    <div class='request'>
      <div class='header'>
        <span class='product'>{if(!empty($request->productName))} {$request->productName} {/if}</span>
        <span class='status'>{$lang->request->statusList[$request->status]}</span>
      </div>
      <div class='divider'></div>
      <div class='titleWrapper'>
        <a href='{$control->createLink("request", "view", "id=$request->id")}' data-ve='request' id='request{$request->id}'>
          <span class='title'>{$request->title}</span>
        </a>
        <div class="dropdown operations">
          <span class="dropdown-toggle trigger" data-toggle="dropdown">
            <i class='circle'></i>
            <i class='circle'></i>
            <i class='circle'></i>
          </span>
          <ul class="dropdown-menu dropdown-menu-right options">
            <li>{if($request->status == 'wait')} {!html::a(inlink('edit', "requestID=$request->id"), $lang->request->edit, "class='btn btn-link'")} {/if}</li>
            <li>{!html::a(inlink('doubt', "requestID=$request->id"), $lang->request->doubt, "data-toggle='modal' class='btn btn-link'")}</li>
            <li>{if($request->status == 'replied')} {!html::a(inlink('valuate', "requestID=$request->id"), $lang->request->valuate, "data-toggle='modal' class='btn btn-link'")} {/if}</li>
          </ul>
        </div>
      </div>
      <div class='content'>
        <a href='{$control->createLink("request", "view", "id=$request->id")}' data-ve='request' id='request{$request->id}'>
          {!strip_tags($request->desc)}
        </a>
      </div>
      <div class='ext'>
        <span class='pub-time'>{$lang->request->addedDate . $lang->colon . $request->addedDate}</span>
        {if($request->repliedDate != 0)}
        <span class='reply-time'>{$lang->request->repliedDate . $lang->colon . $request->repliedDate}</span>
        {/if}
      </div>
    </div>
    {/foreach}
  </div>
  <footer class="appbar fix-right" data-ve='navbar' data-type='mobile_bottom'>
    {!html::a($control->createLink('request', 'create'), html::image($config->webRoot . 'theme/mobile/default/posting.png'), "data-toggle='modal'")}
  </footer>
  <div class='panel-footer'>
    {$pager->createPullUpJS('#requestListWrapper', $lang->mobile->pullUpHint, helper::createLink('request', 'browse', "type=all&param=&orderBy=id_desc&recTotal=12&recPerPage=10&pageID=\$ID"))}
  </div>
  <footer class='appbar fix-right'>
    <a href='{!inlink("create")}'>
      <img src="/theme/mobile/default/posting.png">
    </a>
  </footer>
</div>
{include TPL_ROOT . 'common/form.html.php'}
{if(isset($pageJS))} {!js::execute($pageJS)} {/if}
