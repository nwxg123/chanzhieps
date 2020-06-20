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
<?php include '../../common/view/kindeditor.html.php';?>
<section>
  <form method='post' id='setSeoForm'>
    <table class='table table-form'>
      <tr>
        <th><?php echo $lang->site->keywords;?></th> 
        <td><?php echo html::input('keywords', $this->config->site->keywords, "class='form-control w-600px'");?></td>
      </tr>
      <tr>
        <th><?php echo $lang->site->indexKeywords;?></th> 
        <td><?php echo html::input('indexKeywords', $this->config->site->indexKeywords, "class='form-control w-600px'");?></td>
      </tr>
      <tr>
        <th class='top'><?php echo $lang->site->meta;?></th> 
        <td><?php echo html::textarea('meta', htmlspecialchars($this->config->site->meta), "placeholder='{$lang->site->metaHolder}' class='form-control w-600px' rows=3");?></td>
      </tr>
      <tr>
        <th class='top'><?php echo $lang->site->desc;?></th> 
        <td><?php echo html::textarea('desc', htmlspecialchars($this->config->site->desc), "class='form-control w-600px' rows='6'");?></td> 
      </tr>
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
