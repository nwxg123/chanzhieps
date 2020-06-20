<?php if(!defined("RUN_MODE")) die();?>
<?php
/**
 * The setbasic view file of site module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPLV1.2 (http://zpl.pub/page/zplv12.html)
 * @author      xiying Guang <guanxiying@xirangit.com>
 * @package     site
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<section>
  <form method='post' id='setModuleForm' class='form-inline'>
    <table class='table table-form'>
      <tr>
        <th><?php echo $lang->site->type;?></th> 
        <td><?php echo html::radio('type', $lang->site->typeList, isset($this->config->site->type) ? $this->config->site->type : 'portal', "class='checkbox'");?></td>
      </tr>
      <?php $firstType = true;?>
      <?php $numberOfModuleType = count((array)$lang->site->moduleAvailable);?>
      <?php foreach($lang->site->moduleAvailable as $moduleType => $moduleList):?>
      <tr>
        <?php if($firstType):?>
        <?php echo "<th class='top' rowspan='" . $numberOfModuleType . "'>" . $lang->site->module . "</th>";?>
        <?php $firstType = false;?>
        <?php endif;?>
        <td class='setModules'>
          <div>
            <?php foreach($lang->site->moduleAvailable->{$moduleType} as $module => $moduleName):?>
            <div class='check-card pull-left'>
              <div class='card-title'><?php echo $moduleName;?></div>
              <div class='card-desc'><?php echo !empty($lang->site->moduleSummary->$module) ? $lang->site->moduleSummary->$module : '';?></div>
              <input type="checkbox" name="modules[]" value="<?php echo $module;?>" <?php echo strpos($this->config->site->modules, $module) !== false ? "checked='checked'": '';?> class='hidden'>
            </div>
            <?php endforeach;?>
          </div>
          <div class='hidden'></div>
        </td>
      </tr>
      <?php endforeach;?>
      <tr>
        <th></th>
        <td>
          <?php echo html::submitButton();?>
          <span class='hidden tip alert alert-info' style='marging: 0.3px'></span>
        </td>
      </tr>
    </table>
  </form>
</section>
<?php include '../../common/view/footer.admin.html.php';?>
