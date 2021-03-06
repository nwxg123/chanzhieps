<?php if(!defined("RUN_MODE")) die();?>
<?php include '../../common/view/header.admin.html.php';?>
<?php include '../../common/view/codeeditor.html.php';?>
<form method='post' id='editForm' class='margin-top'>
  <div class='panel' id='mainPanel'>
    <div class='panel-heading'>
      <div id='navMenu'>
        <?php
        echo '<span class="edit-text">' . $lang->ui->editTemplate . ': ' . '<span>';
        echo "<div class='dropdown' id='moduleBox'>";
        echo "<a href='###' data-toggle='dropdown'  class='btn'>" . zget($lang->ui->folderList, $currentModule) . " <span class='icon-angle-down'></span></a>";
        echo "<ul class='dropdown-menu'>";
        foreach($lang->ui->folderList as $folder => $name)
        {
            $active = $currentModule == $folder ? "class='active'" : '';
            echo "<li $active>" . html::a($this->createLink('ui', 'editTemplate', "module=$folder&file=" . key(zget($files, $folder, array()))), $name) . "</li>";
        }
        echo '</ul></div>';
        
        if(isset($files->$currentModule))
        {
            echo "<div class='dropdown' id='fileBox'>";
            echo "<a href='###' data-toggle='dropdown' class='btn'>" . zget($files->$fileModule, $currentFile) . " <span class='icon-angle-down'></span></a>";
            echo "<ul class='dropdown-menu'>";
            foreach($files->$currentModule as $file => $name)
            {
                if(strpos($file, '/') !== false) list($currentModule, $file) = explode('/', $file);
                $active = ($currentFile == $file and $currentModule == $fileModule)  ? "class='active'" : '';
                echo "<li $active>" . html::a($this->createLink('ui', 'editTemplate', "module=$currentModule&file=$file"), $name) . "</li>";
            }
            echo '</ul></div>';
        }
        ?>
      </div>
      <span class='text-important'><?php echo $realFile;?></span>
      <div class='panel-actions'>
        <?php echo html::a("javascript:;", $lang->ui->reset, "id='resetBtn' class='btn btn-default'");?>
      </div>
    </div>
    <div class='tab-content'>
      <div class='tab-pane theme-control-tab-pane active' id='cssTab'>
        <?php echo html::textarea('content', $content, "rows='20' class='form-control codeeditor' data-mode='php' data-height='550'");?>
      </div>
    </div>
    <div class="panel-footer">
      <?php echo html::submitButton() . html::hidden('module', $fileModule) . html::hidden('file', $currentFile);?>
    </div>
  </div>
</form>
<textarea class='hide' id='rawContent'><?php echo $rawContent;?></textarea>
<?php include '../../common/view/footer.admin.html.php';?>
