{if($objectType == 'order')}
{include TPL_ROOT . 'common/header.simple.html.php'}
<style>
.comments .comment-post.vertical-center {bottom:0px}
</style>
{/if}
{if(isset($pageCSS))} {!css::internal($pageCSS)} {/if}
{!js::set('messageRefreshUrl', $control->createLink('message', 'comment', "objecType=$objectType&objectID=$objectID"))}
<div class='comments panel'>
  {include $control->loadModel('ui')->getEffectViewFile('mobile', 'message', 'list')}
  <div class='comment-post vertical-center'>
    {$type = $objectType == 'order' ? 'message' : 'comment'}
    <form class='comment-form vertical-center' method='post' id='commentForm' action='{$control->createLink("message", "post", "type=$type")}'>
      <div class='form-group required'>
        <input class="comment-input" type="text" name="content" id="commentContent" value="" rows="5" placeholder="&nbsp&nbsp{$lang->message->inputPlaceholder}">
        {!html::hidden('objectType', $objectType)}
        {!html::hidden('objectID', $objectID)}
      </div>
      <div class='form-group'>
        <input type="submit" id="submitComment" value="{$lang->message->post}" data-loading="{$lang->message->submitting}...">
      </div>
    </form>
  </div>
</div>
{include TPL_ROOT . 'common/form.html.php'}
