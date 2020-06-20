<div class='items'>
  <div class='item'>
    <div class='item-heading'>
      <h4>
        <span class='order'><?php echo $item->id;?></span>
        <?php if($type == 'exam' && $item->type == 'common'):?>
        <span class='label label-success'><?php echo $item->score . $lang->formitem->scoreUnit;?></span>
        <?php endif;?>
        <?php echo $item->title;?>
        <?php if(strpos(",$item->rule,", ',notempty,') !== false) echo "<span class='required'></span>";?>
      </h4>
      <?php if($type == 'exam' && $item->type == 'common'):?>
      <h4>
        <span class='label label-success answer'><i class='icon icon-check'></i></span>
php 
reach(explode(',', $item->answer) as $answer) 

  if($item->optionType == 'text') echo zget($item->options, $answer) . ' ';
  if($item->optionType == 'image')
  {
      if(isset($item->options[$answer]))
      {
          $option = $item->options[$answer];
          echo "<img src='{$option->url}' title='{$option->title}'></img>";
      }
  }


      </h4>
      <?php endif;?>
    </div>
    <div class='item-content'>
      <table class='table table-condensed table-bordered'>
        <thead>
          <tr class='text-center'>
            <th class='w-60px'><?php echo $lang->formuser->id;?></th>
            <th class='w-120px'><?php echo $lang->formuser->account;?></th>
            <th class='w-120px'><?php echo $lang->formuser->ip;?></th>
            <th><?php echo $lang->formuser->answer;?></th>
            <th class='w-50px'><?php echo $lang->formuser->score;?></th>
            <th class='w-160px'><?php echo $lang->formuser->createdDate;?></th>
          </tr>
        </thead>
        <?php foreach($users as $user):?>
        <tr class='text-center text-middle'>
          <td><?php echo $user->id;?></td>
          <td><?php echo $user->account;?></td>
          <td><?php echo $user->ip;?></td>
          <td class='text-left'>
            <?php 
            if(!$user->answer) 
            {
                echo "<strong><span class='text-danger'>{$lang->form->error->noAnswer}</span></strong>";
            }
            else
            {
                if($item->control == 'select')
                {
                    echo "<strong><span class='text-success'>" . zget($item->options, $user->answer) . '</span></strong>';
                }
                elseif($item->control == 'radio' or $item->control == 'checkbox')
                {
                    if(!isset($item->options)) continue;
            
                    $func = $item->control;
                    $name = 'item' . $user->id;
                    if($item->optionType == 'text') echo html::$func($name, $item->options, $user->answer, "disabled='disabled'", "block"); 
                    if($item->optionType == 'image') $this->loadModel('formitem')->printOptionImages($item, $name, $disabled = true, $user->answer, $onlyChecked = true);
                }
                else
                {
                    echo "<strong><span class='text-success'>$user->answer</span></strong>";
                }
            }
            ?>
          </td>
          <td class='text-right'><?php echo $user->score;?></td>
          <td><?php echo $user->createdDate;?></td>
        </tr>
        <?php endforeach;?>
      </table>
      <div><?php $pager->show();?></div>
    </div>
  </div>
</div>
