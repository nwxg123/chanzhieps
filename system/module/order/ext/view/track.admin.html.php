<?php include '../../../common/view/header.modal.html.php';?>
<?php echo zget($config->express->expressList, $order->express) . $lang->colon?>
<?php echo $order->waybill?>
<?php if($track->status == 'fail'):?>
  <div>
    <?php printf($lang->express->noTraks, $track->link)?>
  </div>
<?php else:?>
  <div class='alert'>
    <h4><?php echo zget($lang->express->statusList, strtolower($track->status))?></h4>
      <ul class="nav nav-primary nav-stacked">
        <?php $track->data = array_reverse($track->data)?>
        <?php foreach($track->data as $item):?>
          <li><?php echo $item->ftime . $lang->colon . $item->context?></li>
        <?php endforeach?>
      </ul>
  </div>
<?php endif?>
<?php include '../../../common/view/footer.modal.html.php';?>
