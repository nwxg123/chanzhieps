<div class='items'>
  <?php $index = 1;?>
  <?php $page  = 1;?>
  <?php foreach($items as $item):?>
  <?php if($item->control == 'section' or $item->control == 'pager') continue;?>
  <div class='item'>
    <div class='item-heading'>
      <div>
        <span class='order'><?php echo $pager->recPerPage * ($pager->pageID - 1) + $index++;?></span>
        <?php if($type == 'exam' && $item->type == 'common'):?>
        <span class='label label-success'><?php echo $item->score . $lang->formitem->scoreUnit;?></span>
        <?php endif;?>
        <?php if(!commonModel::printLink('form', 'viewData', "formID=$formID&type=$type&mode=byItem&objectID=$item->id", $item->title)) echo $item->title;?>
        <?php if(strpos(",$item->rule,", ',notempty,') !== false) echo "<span class='required'></span>";?>
        <span class='pull-right'><?php commonModel::printLink('form', 'viewData', "formID=$formID&type=$type&mode=byItem&objectID=$item->id", $lang->formuser->view);?></span>
      </div>
      <?php if($type == 'exam' && $item->type == 'common' && ($item->control == 'input' or $item->control == 'textarea' or $item->control == 'date')):?>
      <h4>
        <span class='label label-success answer'><i class='icon icon-check'></i></span>
        <?php echo $item->answer;?>
      </h4>
      <?php endif;?>
    </div>
    <div class='item-content'>
      <?php if(strpos(',radio,checkbox,select,', ",$item->control,") === false):?>
      <?php printf($lang->form->answers, $item->count);?>
      <?php else:?>
      <?php if(isset($item->options)):?>
      <table class='table table-condensed table-bordered'>
        <thead>
          <tr class='text-center'>
            <th class='w-50px'><?php echo $lang->form->id;?></th>
            <th class='w-100px'><?php echo $lang->form->options;?></th>
            <th class='w-50px'><?php echo $lang->form->optionCount;?></th>
            <th class='w-200px'><?php echo $lang->form->optionRate;?></th>
          </tr>
        </thead>
        <?php $i = 1;?>
        <?php foreach($item->options as $optionID => $option):?>
        <tr class='text-center text-middle'>
          <td><?php echo $i++;?></td>
          <td class='text-center'>
            <?php if($item->optionType == 'text'):?>
            <?php echo $option;?>
            <?php elseif($item->optionType == 'image'):?>
            <img src='<?php echo $option->url;?>' title='<?php echo $option->title;?>'><?php echo $option->title;?>
            <?php endif;?>
          </td>
          <td><?php echo $item->optionCount[$optionID];?></td>
          <td>
            <div class='col-md-9'>
              <div class='progress'>
                <div class='progress-bar' role='progressbar' aria-valuenow='<?php echo $item->optionRate[$optionID];?>' aria-valuemin='0' aria-valuemax='100' style='width: <?php echo $item->optionRate[$optionID] . '%';?>'></div>
              </div>
            </div>
            <div class='rate col-md-3 text-right'><?php echo $item->optionRate[$optionID] . '%';?></div>
          </td>
        </tr>
        <?php endforeach;?>
      </table>
      <?php endif;?>
      <?php endif;?>
    </div>
  </div>
  <?php endforeach;?>
  <div class='item'>
    <div class='item-content'><?php $pager->show();?></div>
  </div>
</div>
