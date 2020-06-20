<?php
/**
 * The setbasic view file of site module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件非免费软件
 * @author      xiying Guang <guanxiying@xirangit.com>
 * @package     site
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../../common/view/header.admin.html.php';?>
<?php include '../../../common/view/kindeditor.html.php';?>
<?php js::set('closeScoreTip', $lang->site->closeScoreTip);?>
<?php js::set('requestTypeTip', $lang->site->requestTypeTip);?>
<section>
  <form method='post' id='setBasicForm'>
    <table class='table table-form'>
      <tr>
        <th><?php echo $lang->site->status;?></th> 
        <td class='col-xs-6'><?php echo html::radio('status', $lang->site->statusList, isset($this->config->site->status) ? $this->config->site->status : 'normal', "class='checkbox'");?></td><td></td>
      </tr>
      <?php $class = $this->config->site->status == 'pause' ? '' : 'hide';?>
      <tr class="pauseTip <?php echo $class?>">
        <th><?php echo $lang->site->pauseTip;?></th> 
        <td><?php echo html::textarea('pauseTip', !empty($this->config->site->pauseTip) ? $this->config->site->pauseTip : $lang->site->defaultTip);?></td>
      </tr>
      <tr>
        <th><?php echo $lang->site->mobileTemplate;?></th> 
        <td><?php echo html::radio('mobileTemplate', $lang->site->mobileTemplateList, isset($this->config->site->mobileTemplate) ? $this->config->site->mobileTemplate : 'close', "class='checkbox'");?></td><td></td>
      </tr>
      <?php if(commonModel::isAvailable('search')):?>
      <tr>
        <th><?php echo $lang->site->searchRange;?></th>
        <td><?php echo html::select('searchRange', $lang->site->searchRangeList, isset($this->config->site->searchRange) ? $this->config->site->searchRange : '', "class='form-control'");?></td>
        <td></td>
      </tr>
      <?php endif;?>
      <tr>
        <th><?php echo $lang->site->name;?></th> 
        <td><?php echo html::input('name', $this->config->site->name, "class='form-control'");?></td><td></td>
      </tr>
      <tr>
        <th><?php echo $lang->site->copyright;?></th> 
        <td><?php echo html::input('copyright', $this->config->site->copyright, "class='form-control'");?></td><td></td>
      </tr>
      <tr>
        <th><?php echo $lang->site->slogan;?></th> 
        <td><?php echo html::input('slogan', $this->config->site->slogan, "class='form-control'");?></td>
      </tr>
      <tr class='icpSN'>
        <th><?php echo $lang->site->icpSN;?></th> 
        <td>
          <div class='row'>
            <?php $placeholder = ($this->app->getClientLang() == 'en') ? "placeholder='{$lang->site->icpTip}'" : '';?>
            <div class='col-sm-4'><?php echo html::input('icpSN', isset($this->config->site->icpSN) ? $this->config->site->icpSN : '', "class='form-control col-xs-2' $placeholder");?></div>
            <div class='col-sm-8'>
              <div class='input-group'>
                <span class="input-group-addon"><?php echo $lang->site->icpLink;?></span>
                <?php echo html::input('icpLink', isset($this->config->site->icpLink) ? $this->config->site->icpLink : 'http://beian.miit.gov.cn', "class='form-control'")?>
              </div>
            </div>
          </div>
        </td>
      </tr>
      <tr class='policeSN'>
        <th><?php echo $lang->site->policeSN;?></th> 
        <td>
          <div class='row'>
            <?php $placeholder = ($this->app->getClientLang() == 'en') ? "placeholder='{$lang->site->policeTip}'" : '';?>
            <div class='col-sm-4'><?php echo html::input('policeSN', isset($this->config->site->policeSN) ? $this->config->site->policeSN : '', "class='form-control col-xs-2' $placeholder");?></div>
            <div class='col-sm-8'>
              <div class='input-group'>
                <span class="input-group-addon"><?php echo $lang->site->policeLink;?></span>
                <?php echo html::input('policeLink', isset($this->config->site->policeLink) ? $this->config->site->policeLink : 'http://beian.miit.gov.cn', "class='form-control'")?>
              </div>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <th></th>
        <td colspan='2'>
          <?php echo html::submitButton();?>
          <span class='hidden tip alert alert-info' style='marging: 0.3px'></span>
        </td>
      </tr>
    </table>
  </form>
</section>
<?php include '../../../common/view/footer.admin.html.php';?>
