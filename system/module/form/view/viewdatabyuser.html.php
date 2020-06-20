<div class='items'>
  <?php $index = 1;?>
  <?php foreach($items as $item):?>
  <?php if($item->control == 'section' or $item->control == 'pager') continue;?>
  <div class='item'>
    <div class='item-heading'>
      <h4>
        <span class='order'><?php echo $pager->recPerPage * ($pager->pageID - 1) + $index++;?></span>
        <?php if($type == 'exam' && $item->type == 'common'):?>
        <span class='label label-success'><?php echo $item->score . $lang->formitem->scoreUnit;?></span>
        <span class='label label-success pull-right'><?php echo $lang->formuser->score . ':' . $item->userScore;?></span>
        <?php endif;?>
        <?php echo $item->title;?>
        <?php if(strpos(",$item->rule,", ',notempty,') !== false) echo "<span class='required'></span>";?>
      </h4>
      <?php if($type == 'exam' && $item->type == 'common' && ($item->control == 'input' or $item->control == 'textarea' or $item->control == 'date')):?>
      <h4>
        <span class='label label-success answer'><i class='icon icon-check'></i></span>
        <?php echo $item->answer;?>
      </h4>
      <?php endif;?>
    </div>
    <div class='item-content'>
      <?php 
      if(!$item->userAnswer) 
      {
          echo "<strong><span class='text-danger'>{$lang->form->error->noAnswer}</span></strong>";
      }
      else
      {
          if($item->control == 'select' or $item->control == 'radio' or $item->control == 'checkbox')
          {
              if(!isset($item->options)) continue;
      
              $func = $item->control == 'checkbox' ? 'checkbox' : 'radio';
              $name = 'item' . $item->id;
              if($item->optionType == 'text') 
              {
                  if($item->type == 'common')
                  {
                      foreach($item->options as $optionID => $option)
                      {
                          $class = strpos(",{$item->answer},", ",{$optionID},") !== false ? 'label-success' : '';
                          $item->options[$optionID] = $option;
                      }
                  }
                  echo html::$func($name, $item->options, $item->userAnswer, "disabled='disabled'", "block"); 
              }
              if($item->optionType == 'image') $this->loadModel('formitem')->printOptionImages($item, $name, $disabled = true, $item->userAnswer, $onlyChecked = false, $showAnswer = true);
          }
          else
          {
              echo "<strong><span class='text-success'>$item->userAnswer</span></strong>";
          }
      }
      ?>
    </div>
  </div>
  <?php endforeach;?>
  <div class='item'>
    <div class='item-content'><?php $pager->show();?></div>
  </div>
</div>
