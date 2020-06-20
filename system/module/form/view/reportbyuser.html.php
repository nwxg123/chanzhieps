<table class='table table-hover tablesorter table-fixed'>
  <thead>
    <tr class='text-center'>
      <?php $vars = "formID=$formID&type=$type&mode=$mode&orderBy=%s&pageTotal=$pager->pageTotal&recPerPage=$pager->recPerPage&pageID=$pager->pageID";?>
      <th class='w-60px'><?php commonModel::printOrderLink('id', $orderBy, $vars, $lang->formuser->id);?></th>
      <th class='w-120px'><?php commonModel::printOrderLink('account', $orderBy, $vars, $lang->formuser->account);?></th>
      <th class='w-120px'><?php commonModel::printOrderLink('ip', $orderBy, $vars, $lang->formuser->ip);?></th>
      <th class='w-240px'><?php commonModel::printOrderLink('createdDate', $orderBy, $vars, $lang->formuser->createdDate);?></th>
      <th class='w-120px'><?php commonModel::printOrderLink('count', $orderBy, $vars, $lang->formuser->count);?></th>
      <th><?php commonModel::printOrderLink('rate', $orderBy, $vars, $lang->formuser->rate);?></th>
      <?php if($type == 'exam'):?>
      <th class='w-80px'><?php commonModel::printOrderLink('score', $orderBy, $vars, $lang->formuser->score);?></th>
      <?php endif;?>
      <th class='w-120px'><?php echo $lang->actions;?></th>
    </tr>
  </thead>
  <?php foreach($items as $user):?>
  <tr class='text-center'>
    <td><?php echo $user->id;?></td>
    <td><?php echo $user->account;?></td>
    <td><?php echo $user->ip;?></td>
    <td><?php echo $user->createdDate;?></td>
    <td><?php echo $user->count;?></td>
    <td>
      <div class='col-md-9'>
        <div class='progress'>
          <div class='progress-bar' role='progressbar' aria-valuenow='<?php echo $user->rate;?>' aria-valuemin='0' aria-valuemax='100' style='width: <?php echo $user->rate . '%';?>'></div>
        </div>
      </div>
      <div class='rate col-md-3'><?php echo $user->rate . '%';?></div>
    </td>
    <?php if($type == 'exam'):?>
    <td class='text-right'><?php echo $user->score;?></td>
    <?php endif;?>
    <td><?php commonModel::printLink('form', 'viewData', "formID=$formID&type=$type&mode=byUser&objectID=$user->id", $lang->formuser->view);?></td>
  </tr>
  <?php endforeach;?>
  <tr>
    <td colspan="<?php echo $type == 'exam' ? '8' : '7';?>"><?php $pager->show();?></td>
  </td>
</table>
