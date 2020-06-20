{*php
/**
 * The browse view of request module of XiRangCSM
 *
 * @copyright   Copyright 2009-2011 青岛易软天创网络科技有限公司 (QingDao Nature Easy Soft Network Technology Co,LTD www.cnezsoft.com)
 * @license     商业软件非免费软件
 * @author      Jinyong Zhu<zhujinyong@cnezsoft.com>
 * @package     request
 * @version     $Id: buildform.html.php 1914 2011-06-24 10:11:25Z yidong@cnezsoft.com $
 * @link        http://www.chanzhi.org
 */
/php*}
{include TPL_ROOT . 'common/header.html.php'}
{include TPL_ROOT . 'common/kindeditor.html.php'}
<div class='row'>
  {include TPL_ROOT . 'user/side.html.php'}
  <div class='col-md-10'>
    <div class='panel'>
      <div class='panel-heading'> <strong>{$lang->request->edit}</strong> </div>
      <form method='post' id='ajaxForm' enctype='multipart/form-data'>
        <table class='table table-form'>
          <tr>
            <th>{$lang->request->product}</th>
            <td>{!html::select('product', $products, $product, "class='form-control' onchange=switchProduct($request->id,this.value)")}</td>
          </tr>
          <tr>
            <th>{$lang->request->category}</th>
            <td>{!html::select('category', $categories, $category, "class='form-control'")}</td>
          </tr>
          <tr>
            <th class='w-100px'>{$lang->request->title}</th>
            <td>{!html::input('title', $title, "class='form-control'")}</td>
          </tr>
          <tr>
            <th>{$lang->request->desc}</th>
            <td>{!html::textarea('desc', $request->desc, 'class="form-control" rows=10')}</td>
          </tr>
          <tr>
            <th>{$lang->request->file}</th>
            <td>{$control->fetch('file', 'buildform', 'fileCount=2')}</td>
          </tr>
          <tr><td colspan='2' class='a-center'>{!echo html::submitButton() . html::hidden('requestID', $requestID)}</td></tr>
        </table>
      </form>
    </div>
  </div>
</div>
{include TPL_ROOT . 'common/footer.html.php'}
