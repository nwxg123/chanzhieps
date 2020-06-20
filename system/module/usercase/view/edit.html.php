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
          <td class='w-p40'><?php echo html::input('site', $case->site, "class='form-control'");?> </td>
          <td></td>
        </tr>
        <tr>
          <th class='w-120px'><?php echo $lang->usercase->name;?></th>
          <td><?php echo html::input('name', $case->name, "class='form-control'");?></td>
        </tr>
        <tr>
          <th class='w-120px'><?php echo $lang->usercase->company;?></th>
          <td><?php echo html::input('company', $case->company, "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->usercase->industry;?></th>
          <td><?php echo html::select('industry', $industries, $case->industry, "class='form-control chosen'");?></td>
        </tr>
        <tr>
          <th class='w-120px'><?php echo $lang->usercase->area;?></th>
          <td><?php echo html::select('area', $lang->usercase->areas, $case->area, "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->usercase->keywords;?></th>
          <td colspan='2'><?php echo html::input('keywords', $case->keywords, "class='form-control' placeholder='{$lang->keywordsHolder}'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->usercase->desc;?></th>
          <td colspan='2'><?php echo html::textarea('desc', $case->desc, "class='form-control' rows=5");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->usercase->review;?></th>
          <td colspan='2'><?php echo html::textarea('review', $case->review, "class='form-control' rows=5");?></td>
        </tr>
        <tr>
          <th></th>
          <td colspan='2'>
          <?php echo html::submitButton();?>
          <?php echo html::backButton() . ' &nbsp; ' . $lang->usercase->lblContent;?>
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include $app->getModuleRoot() . 'common/view/footer.admin.html.php';?>
