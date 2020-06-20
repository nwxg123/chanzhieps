<?php
/**
 * The edit view file of form module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     form 
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/datepicker.html.php';?>
<?php js::set('type', $type);?>
<section class='main-table'>
  <div class='panel-body'>
    <form id='ajaxForm' method='post'>
      <table class='table table-form w-800px'>
        <tr>
          <th class='w-100px'><?php echo $lang->form->title;?></th>
          <td colspan='2'><?php echo html::input('title', $form->title, "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->form->desc;?></th>
          <td colspan='2'><?php echo html::textarea('desc', $form->desc, "rows='3' class='form-control'");?></td>
        </tr>
        <?php if($type == 'exam'):?>
        <tr>
          <th><?php echo $lang->form->timeLimit;?></th>
          <td class='w-450px'>
            <div class='input-group'>
              <?php echo html::input('hour', $form->hour, "class='form-control'");?>
              <span class='input-group-addon fix-border'><?php echo $lang->form->hour;?></span>
              <?php echo html::input('minute', $form->minute, "class='form-control'");?>
              <span class='input-group-addon fix-border'><?php echo $lang->form->minute;?></span>
              <?php echo html::input('second', $form->second, "class='form-control'");?>
              <span class='input-group-addon'><?php echo $lang->form->second;?></span>
            </div>
            <span id='timeLimit'></span>
          </td>
          <td><span class='text-important' style='margin-left: 10px'><?php echo $lang->form->timeLimitTips;?></span></td>
        </tr>
        <?php endif;?>
        <tr>
          <th><?php echo $lang->form->endCondition;?></th>
          <td colspan='2'>
            <div class='required required-wrapper'></div>
            <div class='input-group'>
              <span class='input-group-addon'><?php echo $lang->form->endAmountBefore;?></span>
              <?php echo html::input('endAmount', $form->endAmount ? $form->endAmount : '', "class='form-control'");?>
              <span class='input-group-addon fix-border'><?php echo $lang->form->endTimeBefore;?></span>
              <div class="input-append date">
                <div class='input-control has-icon-right'>
                  <?php echo html::input('endTime', formatTime($form->endTime), "class='form-control form-datetime' data-picker-position='top-right'");?>
                  <label for="endTime" class="input-control-icon-right"><i class="icon icon-calendar"></i></label>
                </div>
              </div>
            </div>
            <span id='endCondition'></span>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->form->postLimit;?></th>
          <td colspan='2'><?php echo html::checkbox('postLimit', $lang->form->postLimitList, $form->postLimit);?></td>
        </tr>
        <tr>
          <th><?php echo $lang->form->fullScreen;?></th>
          <td colspan='2'><?php echo html::radio('fullScreen', $lang->form->fullScreenList, $form->fullScreen);?></td>
        </tr>
        <tr>
          <th><?php echo $lang->form->status;?></th>
          <td><?php echo html::radio('status', $lang->form->statusList, $form->status);?></td>
        </tr>
        <tr>
          <th></th>
          <td colspan='2'>
            <?php if($type == 'exam') echo html::hidden('postLimit[]', 'needLogin');?>
            <?php echo html::submitButton();?>
            <?php echo html::backButton();?>
          </td>
        </tr>
      </table>
    </form>
  </div>
</section>
<?php include '../../common/view/footer.admin.html.php';?>
