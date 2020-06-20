<?php include $app->getModuleRoot() .'common/view/header.admin.html.php';?>
<section class='main-table'>
    <header class='clearfix'>
      <ul class='nav nav-tabs-main pull-left'>
        <li data-type='internal' <?php echo $status == '0' ? "class='active'" : '';?>>
          <?php echo html::a(inlink('checkusercase', "status=0"), $lang->usercase->statusList[0]);?>
        </li>
        <li data-type='internal' <?php echo $status == 1 ? "class='active'" : '';?>>
          <?php echo html::a(inlink('checkusercase', "status=1"), $lang->usercase->statusList[1]);?>
        </li>
        <li data-type='internal' <?php echo $status == 2 ? "class='active'" : '';?>>
          <?php echo html::a(inlink('checkusercase', "status=2"), $lang->usercase->statusList[2]);?>
        </li>
      </ul>
      <div class='pull-right btn-toolbar'>
      <?php echo html::a(inlink('create'), $lang->usercase->create, "class='btn btn-primary'");?>
      </div>
    </header>
    <table class='table table-hover tablesorter table-fixed'>
      <thead>
        <tr class='text-center'>
          <th class='w-id'><?php echo $lang->usercase->id;?></th>
          <th class='text-left'><?php echo $lang->usercase->company;?></th>
          <th><?php echo $lang->usercase->industry;?></th>
          <th><?php echo $lang->usercase->site;?></th>
          <th><?php echo $lang->usercase->author;?></th>
          <th class='w-80px'><?php echo $lang->usercase->addedDate;?></th>
          <th class='w-40px'><?php echo $lang->usercase->views;?></th>
          <th class='w-60px'><?php echo $lang->usercase->status;?></th>
          <th class='w-50px'><?php echo $lang->usercase->classical;?></th>
          <th class='w-160px'><?php echo $lang->actions;?></th>
        </tr> 
      </thead>
      <tbody>
        <?php foreach($cases as $case):?>
        <tr class='text-center'>
          <td><?php echo $case->id;?></td>
          <td class='text-ellipsis'><?php echo $case->company;?></td>
          <td><?php echo isset($industries[$case->industry]) ? $industries[$case->industry] : '';?></td>
          <td><?php echo "<a href={$case->site} target='_blank'>" . $case->site . '</a>';?></td>
          <td><?php echo $case->author;?></td>
          <td><?php echo substr($case->addedDate, 0, 10);?></td>
          <td><?php echo $case->views;?></td>
          <td><?php echo $lang->usercase->statusList[$case->status]?></td>
          <td><?php if($case->classical) echo $lang->usercase->classical;?></td>
          <td>
            <?php echo html::a($this->createLink('usercase', 'view', "id=$case->id&mode=admin"), $lang->usercase->approve, "data-toggle='modal'");?>
            <?php echo html::a($this->createLink('usercase', 'delete', "id=$case->id"), $lang->delete, "class='deleter'");?>
            <?php echo html::a(inlink('setAsClassical', "case=$case->id"), $lang->usercase->setClassical, "class='ajaxJSON'");?>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
      <tfoot>
      <tr>
        <td colspan='10'>
          <?php $pager->show()?>
        </td>
      </tr>
      </tfoot>
    </table>
</section>
<?php include $app->getModuleRoot() .'common/view/footer.admin.html.php';?>
