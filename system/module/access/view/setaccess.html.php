<?php
/**
 * The setprice view file of score module of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2010 QingDao Nature Easy Soft Network Technology Co,LTD (www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv11.html)
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     score
 * @version     $Id$
 * @link        http://www.chanzhi.org
 */
?>
<?php $identity = zget($setting, 'identity', 'guest');?>
<?php if($style == 'full'):?>
<?php include '../../common/view/header.modal.html.php';?>
  <div class='panel-body'>
    <form method='post' action="<?php echo inlink('setAccess', "objectType=$objectType&objectID=$objectID")?>" id='ajaxForm'>
      <table class='table table-form'>
<?php endif;?>
        <tr>
          <th class='w-100px'><?php echo $lang->access->identity; ?></th>
          <td><?php echo html::radio('access[identity]', $lang->access->identityList, zget($setting, 'identity', 'guest'), "class='checkbox'");?></td>
          <td class='w-80px'></td>
        </tr>
        <?php if(!empty($levels)):?>
        <tr <?php if($identity == 'guest') echo "class='hide'"?>>
          <th><?php echo $lang->access->level;?></th>
          <td colspan='2'>
            <div class='input-group'>
              <?php echo html::select('access[level]', array('') + (array)$levels, zget($setting, 'level'), "class='select form-control'");?>
              <span class='input-group-addon'>
                <div class="checkbox-primary">
                  <input type="checkbox" id="ignoreLevel" name="access[ignoreLevel]" value="1" <?php if(zget($setting, 'ignoreLevel') == 1) echo 'checked'; ?>>
                  <label for="access[ignoreLevel]" class="no-margin"><?php echo $lang->access->ignoreLevel;?></label>
                </div>
              </span>
            </div>
          </td>
        </tr>
        <?php endif;?>
        <tr <?php if($identity == 'guest') echo "class='hide'"?>>
          <th><?php echo $lang->access->score;?></th>
          <td colspan='3'>
            <?php if(empty($levels)):?>
            <div class='input-group'>
              <span class='input-group-addon'>
                <div class="checkbox-primary">
                  <input name="access[useScore]" type='checkbox' id='useScore' value='1' <?php if(zget($setting, 'useScore') == 1) echo 'checked'; ?>>
                  <label for="access[userScore]" class="no-margin"></label>
                </div>
              </span>
              <?php echo html::input('access[score]', zget($setting, 'score', ''), "class='select form-control score-item'");?>
            </div>
            <?php endif;?>
            <?php if(!empty($levels)):?>
              <?php $first = 1;?>
              <?php foreach($levels as $code => $level):?>
              <?php echo html::hidden('access[score]', 0, "class='select form-control score-item'");?>
                <div class='col-xs-3' style='padding:0px'>
                  <div class='input-group'>
                    <?php if($first == 1):?>
                    <span class='input-group-addon'>
                      <div class="checkbox-primary">
                        <input name="access[useScore]" type='checkbox' id='useScore' value='1' <?php if(zget($setting, 'useScore') == 1) echo 'checked'; ?>>
                        <label for="access[userScore]" class="no-margin"></label>
                      </div>
                    </span>
                    <?php $first = 0;?>
                    <?php endif;?>
                    <span class='score-item input-group-addon fix-border'><?php echo $level;?></span>
                    <?php echo html::input("access[score$code]", zget($setting, 'score' . $code, ''), "class='form-control price-inputer score-item'");?>
                  </div>
                </div>
              <?php endforeach;?>
            <?php endif;?>
          </td>
        </tr>
        <tr <?php if($identity == 'guest') echo "class='hide'"?>>
          <th><?php echo $lang->access->certification;?></th>
          <td colspan='2'><?php echo html::checkbox('access[certification]', $lang->access->certificationList, isset($setting['certification']) ? $setting['certification'] : '', "class='checkbox'");?></td>
        </tr>
        <tr <?php if($identity == 'guest') echo "class='hide'"?>>
          <th><?php echo $lang->access->score;?></th>
          <td colspan='3'>
            <div class='input-group'>
              <?php foreach($lang->access->certificationList as $certify => $label):?>
              <span class='score-item input-group-addon fix-border'><?php echo $label;?></span>
              <?php echo html::input("access[certify$certify]", zget($setting, 'certify' . $certify, ''), "class='form-control price-inputer score-item'");?>
              <?php endforeach;?>
            </div>
          </td>
        </tr>
<?php if($style == 'full'):?>
       <tr>
          <th></th>
          <td colspan='2'><?php echo html::submitButton();?></td>
        </tr>
      </table>
    </form>
</div>
<?php endif;?>
<script>
$(document).ready(function()
{
    $('[name*=identity]').change(function()
    {
        if($(this).val() == 'guest')
        {
            $("[name^='access']").prop('disabled', true).parents('tr').hide();
        }
        else
        {
            $("[name^='access']").prop('disabled', false).parents('tr').show();
        }
        $('[name*=identity]').prop('disabled', false).parents('tr').show();   
        $('#useScore').change();
    });

    $('#useScore').change(function()
    {
        if(!$('#useScore').prop('checked')) $(this).parents('td').find('[type=text]').val('');
        $(this).parents('td').find('[type=text]').prop('disabled', !$('#useScore').prop('checked'));
    });

    $('#useScore').change();
    $('#ignoreLevel').change(function()
    {
        if($(this).prop('checked')) $('#useScore').prop('checked', true).change();
    });
});
</script>
<?php if($style == 'full') include '../../common/view/footer.modal.html.php';?>
