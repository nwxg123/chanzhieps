<?php
/**
 * The create view file of usercase module of ZenTaoCMS.
 *
 * @copyright   Copyright 2009-2010 QingDao Nature Easy Soft Network Technology Co,LTD (www.cnezsoft.com)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     usercase
 * @version     $Id$
 * @link        http://www.zsite.com
 */
?>
<?php include $app->getModuleRoot() . 'common/view/header.admin.html.php';?>
<?php include $app->getModuleRoot() . 'common/view/kindeditor.html.php';?>
<div class='panel'>
  <div class='panel-body'>
    <form method='post' id='ajaxForm'>
      <table class='table table-form'>
        <tr>
          <th class='w-100px'><?php echo $lang->usercase->site;?></th>
          <td class=''><?php echo html::input('site', $siteUrl, "class='form-control'");?> </td>
          <td class='w-60px'><span class="input-group-btn"><?php echo html::a('javascript:;', $lang->usercase->post, "id='postBtn' class='btn btn-primary'");?></span></td>
        </tr>
        <tbody>
          <tr>
            <th class='w-120px'><?php echo $lang->usercase->name;?></th>
            <td><?php echo html::input('name', '', "class='form-control'");?></td>
          </tr>
          <tr>
            <th class='w-120px'><?php echo $lang->usercase->company;?></th>
            <td><?php echo html::input('company', '', "class='form-control'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->usercase->industry;?></th>
            <td><?php echo html::select('industry', $industries, '', "class='chosen form-control'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->usercase->area;?></th>
            <td><?php echo html::select('area', $lang->usercase->areas, '', "class='form-control chosen'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->usercase->keywords;?></th>
            <td colspan='2'><?php echo html::input('keywords', '', "class='form-control' placeholder='{$lang->keywordsHolder}'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->usercase->desc;?></th>
            <td colspan='2'><?php echo html::textarea('desc', '', "class='form-control' rows='5'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->usercase->review;?></th>
            <td colspan='2'><?php echo html::textarea('review', '', "class='form-control' rows='5'");?></td>
          </tr>
          <tr>
            <th></th>
            <td colspan='2'>
              <?php echo html::submitButton();?>
              <?php echo html::backButton() . ' &nbsp; ' . $lang->usercase->lblContent;?>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>
</div>
<?php include $app->getModuleRoot() . 'common/view/footer.admin.html.php';?>
