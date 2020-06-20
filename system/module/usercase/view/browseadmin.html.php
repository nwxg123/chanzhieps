<?php include $app->getModuleRoot() .'common/view/header.admin.html.php';?>
<section class='main-table'>
  <header class='clearfix'>
    <ul class='nav nav-tabs-main pull-left'>
      <li data-type='internal' <?php echo $status == '0' ? "class='active'" : '';?>>
        <?php echo html::a(inlink('browseAdmin', "industry=$industry&status=0"), $lang->usercase->statusList[0]);?>
      </li>
      <li data-type='internal' <?php echo $status == 1 ? "class='active'" : '';?>>
        <?php echo html::a(inlink('browseAdmin', "industry=$industry&status=1"), $lang->usercase->statusList[1]);?>
      </li>
      <li data-type='internal' <?php echo $status == 2 ? "class='active'" : '';?>>
        <?php echo html::a(inlink('browseAdmin', "industry=$industry&status=2"), $lang->usercase->statusList[2]);?>
      </li>
    </ul>
    <div class='pull-right btn-toolbar'>
    <?php echo html::a(inlink('create'), $lang->usercase->create, "class='btn btn-primary'");?>
    </div>
  </header>
  <form method='post' action='<?php echo inlink('batchDelete')?>' id='ajaxForm'>
    <?php if(!empty($cases)):?>
    <table class='table table-hover tablesorter table-fixed'>
      <thead>
        <tr class='text-center'>
          <th class='w-10px first'></th>
          <th class='w-id'><?php echo $lang->usercase->id;?></th>
          <th class='text-left'><?php echo $lang->usercase->company;?></th>
          <th><?php echo $lang->usercase->industry;?></th>
          <th><?php echo $lang->usercase->site;?></th>
          <th class='w-110px'><?php echo $lang->usercase->author;?></th>
          <th class='w-80px'><?php echo $lang->usercase->addedDate;?></th>
          <th class='w-40px'><?php echo $lang->usercase->views;?></th>
          <th class='w-60px'><?php echo $lang->usercase->status;?></th>
          <th class="text-center actions w-30px"><?php echo $lang->usercase->approve;?></th>
          <th class="text-center actions w-30px"><?php echo $lang->edit;?></th>
          <th class="text-center actions w-30px"><?php echo $lang->delete;?></th>
          <th class="text-center actions w-30px"><?php echo $lang->usercase->setClassical;?></th>
          <th class="text-center actions w-30px"><?php echo $lang->usercase->image;?></th>
          <th class="text-center actions w-10px"></th>
        </tr> 
      </thead>
      <tbody>
        <?php foreach($cases as $case):?>
        <tr class='text-center'>
          <td></td>
          <td>
            <div class="checkbox-primary">
              <input type='checkbox' name='idList[]'  value='<?php echo $case->id;?>'/> 
              <label for="account" class="no-margin"><?php echo $case->id;?></label>
            </div>
          </td>
          <td class='text-left' title="<?php echo $case->company;?>"><?php echo $case->company;?></td>
          <td><?php echo isset($industries[$case->industry]) ? $industries[$case->industry] : '';?></td>
          <td title="<?php echo $case->site;?>"><?php echo "<a href={$case->site} target='_blank'>" . $case->site . '</a>';?></td>
          <td><?php echo $case->author;?></td>
          <td><?php echo substr($case->addedDate, 0, 10);?></td>
          <td><?php echo $case->views;?></td>
          <td><?php echo $lang->usercase->statusList[$case->status]?></td>
          <td class='c-actions'>
            <?php echo html::a($this->createLink('usercase', 'view', "id=$case->id&mode=admin"), "<i class='icon icon-info-sign'></i>", "data-toggle='modal' class='btn btn-icon'");?>
          </td>
          <td class='c-actions'>
            <?php echo html::a($this->createLink('usercase', 'edit', "id=$case->id"), "<i class='icon icon-edit'></i>", "class='btn btn-icon'");?>
          </td>
          <td class='c-actions'>
            <?php echo html::a($this->createLink('usercase', 'delete', "id=$case->id"), "<i class='icon icon-delete'></i>", "class='deleter btn btn-icon'");?>
          </td>
          <td class='c-actions'>
            <?php $icon = $case->classical ? "<i class='icon icon-star'></i>" : "<i class='icon icon-star-empty'></i>";?>
            <?php echo html::a(inlink('setAsClassical', "case=$case->id"), $icon, "class='ajaxJSON btn btn-icon'");?>
          </td>
          <td class='c-actions'>
            <?php commonModel::printLink('file', 'browse', "objectType=usercase&objectID=$case->id&isImage=1", "<i class='icon icon-image'></i>", "data-toggle='modal' class='btn btn-icon'");?>
          </td>
          <td class='c-actions'></td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
    <div class='table-footer'>
      <div class='batch pull-left'>
        <div class='btn-group'><?php echo html::selectbutton();?></div>
        <?php echo html::submitbutton($lang->delete, 'btn delete btn-batch', "onclick='return confirm(\"{$lang->js->confirmDelete}\")'");?>
      </div>
      <?php $pager->show();?>
    </div>
  </div>
</form>
<?php else:?>
<div class='alert alert-info'><?php echo $lang->usercase->noResults?></div>
<?php endif;?>
<?php include $app->getModuleRoot() .'common/view/footer.admin.html.php';?>
