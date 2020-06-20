<?php include '../../common/view/header.admin.html.php';?>
<div class='panel'>
  <div class='panel-heading'> <strong><i class="icon-shopping-cart"> </i><?php echo $lang->trade->admin;?></strong> </div>
    <table class='table table-hover table-striped tablesorter'>
      <thead>
        <tr class='text-center'>
          <?php $vars = "mode=$mode&value={$value}&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}";?>
          <th class='w-60px'><?php commonModel::printOrderLink('id', $orderBy, $vars, $lang->trade->id);?></th>
          <th class='w-60px'><?php commonModel::printOrderLink('account', $orderBy, $vars, $lang->trade->account);?></th>
          <th class='w-80px'><?php commonModel::printOrderLink('type', $orderBy, $vars, $lang->trade->type);?></th>
          <th class='w-60px'><?php commonModel::printOrderLink('amount', $orderBy, $vars, $lang->trade->amount);?></th>
          <th class='w-60px'><?php commonModel::printOrderLink('before', $orderBy, $vars, $lang->trade->before);?></th>
          <th class='w-60px'><?php commonModel::printOrderLink('after', $orderBy, $vars, $lang->trade->after);?></th>
          <th class='w-60px'><?php commonModel::printOrderLink('createdBy', $orderBy, $vars, $lang->trade->createdBy);?></th>
          <th class='w-60px'><?php commonModel::printOrderLink('createdDate', $orderBy, $vars, $lang->trade->createdDate);?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($trades as $trade):?>
        <tr>
          <td class='text-center text-middle'><?php echo $trade->id;?></td>
          <td class='text-center text-middle'><?php echo $trade->account;?></td>
          <td class='text-center text-middle'><?php echo zget($lang->trade->typeList, $trade->type);?></td>
          <td class='text-right text-middle'><?php echo $trade->amount;?></td>
          <td class='text-right text-middle'><?php echo $trade->before;?></td>
          <td class='text-right text-middle'><?php echo $trade->after;?></td>
          <td class='text-center text-middle'><?php echo $trade->createdBy;?></td>
          <td class='text-center text-middle'><?php echo $trade->createdDate;?></td>
        </tr>
        <?php endforeach;?>
      </tbody>
      <tfoot><tr><td colspan='8'><?php $pager->show();?></td></tr></tfoot>
    </table>
  </div>
</div>
<?php include '../../common/view/footer.admin.html.php';?>
