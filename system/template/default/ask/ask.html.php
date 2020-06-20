{*php
/**
 * The create view file of ask module of ZenTaoCMS.
 *
 * @copyright   Copyright 2009-2010 QingDao Nature Easy Soft Network Technology Co,LTD (www.cnezsoft.com)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     ask
 * @version     $Id$
 * @link        http://www.zentao.net
 */
/php*}
{include TPL_ROOT . 'common/header.html.php'}
{include TPL_ROOT . 'common/kindeditor.html.php'}
{!js::set('categoryID', $categoryID)}
{$common->printPositionBar($category)}
{$config->oauth->wechat = json_decode($config->oauth->wechat);}
<div class='row'>
  <div class='col-md-2'>{include TPL_ROOT . 'ask/blockleft.html.php'}</div>
  <div class='col-md-10'>
    <div class='panel'>
      {if(commonModel::isAvailable('score') && $app->user->score < $config->ask->minScore)}
        {$control->fetch('score', 'noscore', array('method' => 'question', 'score' => $config->ask->minScore))}
      {else}
        <div class='panel-heading'><strong>{$lang->ask->question}</strong></div>
        {$referer = $control->createLink('ask', 'ask', 'categoryID=' . $categoryID . '&productID=' . $productID)}
        {if($config->oauth->wechat->clientID && !$control->user->isWechatUser())}
          {$control->fetch('wechat', 'login', array('title' => $lang->bindWechat, 'referer' => $referer))}
        {else}
        <form method='post' id='askForm'>
          <table class='table table-form w-p90'>
            {if(!empty($config->request->categoryRule) and $config->request->categoryRule != 'global')}
              <tr>
                <th class='w-80px'>{$lang->request->product}</th>
                <td class='w-p30'>{!html::select('category', $productList, $categoryID, "class='form-control'")}</td>
                <td></td>
              </tr>
            {else}
              <tr>
                <th class='w-80px'>{$lang->question->category}</th>
                <td class='w-p30'>{!html::select('category', $categories, $categoryID, "class='form-control'")}</td>
                <td></td>
              </tr>
            {/if}
            <tr>
              <th class='w-100px'>{$lang->question->title}</th>
              <td colspan='2'>{!html::input('title', '', "class='form-control'")}</td>
            </tr>
            <tr>
              <th>{$lang->question->desc}</th>
              <td colspan='2'>{!html::textarea('desc', '', "class='form-control' rows=5")}</td>
            </tr>
            {if(commonModel::isAvailable('score'))}
              <tr>
                <th>{$lang->question->score}</th>
                <td>{!html::input('score', $config->ask->minScore, "class='form-control'")}</td>
                <td>{$lang->question->lblScore}</td>
              </tr>
            {/if}
            {if(zget($control->config->site, 'captcha', 'auto') == 'open')}
              <tr id='captchaBox'>
                <th> <th>
                <td colspan='2'>{!echo $control->loadModel('guarder')->create4MessageReply()}<td>
              </tr>
            {else}
              <tr class='hiding' id='captchaBox'></tr>
            {/if}
            <tr><th></td><td colspan='2'>{!html::submitButton()}</td></tr>
          </table>
        </form>
        {/if}
      {/if}
    </div>
  </div>
</div>
{include TPL_ROOT . 'common/footer.html.php'}
