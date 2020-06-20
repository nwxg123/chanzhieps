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
{$common->printPositionBar('threadToAsk')}
<div class='row'>
  <div class='col-md-3'>{include TPL_ROOT . 'ask/blockleft.html.php'}</div>
  <div class='col-md-9'>
    <div class='panel'>
      {if(commonModel::isAvailable('score') && $app->user->score < $config->ask->minScore)}
        {$control->fetch('score', 'noscore', array('method' => 'question', 'score' => $config->ask->minScore))}
      {else}
        <div class='panel-heading'><strong>{$lang->ask->question}</strong></div>
        <form method='post' id='ajaxForm'>
          <table class='table table-form'>
            {if(!empty($config->request->categoryRule) and $config->request->categoryRule != 'global')}
              <tr>
                <th class='w-80px'>{$lang->request->product}</th>
                <td class='w-p30'>{!html::select('product', $productList, $productID, "class='form-control'")}</td>
                <td></td>
              </tr>
            {/if}
            <tr>
              <th class='w-80px'>{$lang->question->category}</th>
              <td class='w-p30'>{!html::select('category', $categories, '', "class='form-control'")}</td>
              <td></td>
            </tr>
            <tr>
              <th class='w-100px'>{$lang->question->title}</th>
              <td colspan='2'>{!html::input('title', $thread->title, "class='form-control'")}</td>
            </tr>
            <tr>
              <th>{$lang->question->desc}</th>
              <td colspan='2'>{!html::textarea('desc', $thread->content, "class='form-control' rows='10'")}</td>
            </tr>
            {if(commonModel::isAvailable('score'))}
              <tr>
                <th>{$lang->question->score}</th>
                <td>{!html::input('score', $config->ask->minScore, "class='form-control'")}</td>
                <td>{$lang->question->lblScore}</td>
              </tr>
            {/if}
            <tr><th></th><td colspan='2'>{!html::submitButton()}</td></tr>
          </table>
        </form>
      {/if}
    </div>
  </div>
</div>
{include TPL_ROOT . 'common/footer.html.php'}
