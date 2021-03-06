{*php
/**
 * The create view file of usercase module of ZenTaoCMS.
 *
 * @copyright   Copyright 2009-2010 QingDao Nature Easy Soft Network Technology Co,LTD (www.cnezsoft.com)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     usercase
 * @version     $Id$
 * @link        http://www.zsite.com
 */
/php*}
{include TPL_ROOT . 'common/header.html.php'}
{include TPL_ROOT . 'common/kindeditor.html.php'}
{include TPL_ROOT . 'common/chosen.html.php'}
<div class='row'>
  {include TPL_ROOT . 'user/side.html.php'}
  <div class='col-md-10'>
    <div class='panel'>
      <div class='panel-heading'><strong>{$lang->usercase->create}</strong></div>
      <form method='post' id='ajaxForm'>
        <table class='table table-form'>
          <tr>
            <th class='w-100px'>{$lang->usercase->site}</th>
            <td class='w-p40'>{!html::input('site', $siteUrl, "class='form-control'")} </td>
            <td></td>
          </tr>
          <tbody id='hideItems'>
          <tr>
            <th class='w-120px'>{$lang->usercase->name}</th>
            <td>{!html::input('name', '', "class='form-control'")}</td>
          </tr>
          <tr>
            <th class='w-120px'>{$lang->usercase->company}</th>
            <td>{!html::input('company', '', "class='form-control'")}</td>
          </tr>
          {if(!empty($industries))}
          <tr>
            <th>{$lang->usercase->industry}</th>
            <td>{!html::select('industry', $industries, '', "class='chosen form-control'")}</td>
          </tr>
          {/if}
          <tr>
            <th>{$lang->usercase->area}</th>
            <td>{!html::select('area', $lang->usercase->areas, '', "class='form-control chosen'")}</td>
          </tr>
          <tr>
            <th>{$lang->usercase->keywords}</th>
            <td colspan='2'>{!html::input('keywords', '', "class='form-control' placeholder='{{$lang->keywordsHolder}}'")}</td>
          </tr>
          <tr>
            <th>{$lang->usercase->desc}</th>
            <td colspan='2'>{!html::textarea('desc', '', "class='form-control' rows='5'")}</td>
          </tr>
          <tr>
            <th></th>
            <td colspan='2'> {!html::submitButton() . ' &nbsp; ' . $lang->usercase->lblContent} </td>
          </tr>
          </tbody>
        </table>
      </form>
    </div>
  </div>
</div>
{include TPL_ROOT . 'common/footer.html.php'}
