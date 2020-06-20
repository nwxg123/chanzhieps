<?php if(!class_exists('raintpl')){exit;}?><?php if(!defined("RUN_MODE")){ ?>

<?php echo die(); ?>

<?php } ?>

<?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw($control->loadModel('ui')->getEffectViewFile('default', 'common', 'header'));?>

<div class='row blocks' data-grid='4' data-region='forum_index-top'><?php echo $control->block->printRegion($layouts, 'forum_index', 'top', true);?></div>
<?php echo $common->printPositionBar($control->app->getModuleName());?>

<ul class='nav nav-secondary nav-nobottom'>
  <?php foreach($lang->forum->indexModeOptions as $modeCode => $modeName): ?>

  <li <?php if($mode == $modeCode){ ?>

<?php echo "class='active'"; ?>

<?php } ?>><?php echo html::a(inlink('index', "mode=$modeCode"),  $modeName); ?></li>
  <?php endforeach; ?>

</ul>
<?php if($mode == 'latest' or $mode == 'stick'){ ?>

  <div class='panel'>
    <table class='table table-hover table-striped'>
      <thead>
        <tr class='text-center hidden-xxxs'>
          <th><?php echo $lang->thread->title;?></th>
          <th class='w-150px hidden-xxs'><?php echo $lang->thread->author;?></th>
          <th class='w-100px hidden-xs'><?php echo $lang->thread->postedDate;?></th>
          <th class='w-50px hidden-xs'><?php echo $lang->thread->views;?></th>
          <th class='w-50px'><?php echo $lang->thread->replies;?></th>
          <th class='w-200px hidden-sm hidden-xs'><?php echo $lang->thread->lastReply;?></th>
        </tr>  
      </thead>
      <tbody>
        <?php foreach($threads as $thread): ?>

          <?php $style=$this->var['style'] = $thread->color ? "style='color:{$thread->color}'" : '';?>

          <tr class='text-center'>
            <td class='text-left'>
              <?php echo ($mode == 'latest' && $thread->isNew) ? "<i class='icon-comment-alt icon-large text-success'> </i>" : "<i class='icon-comment-alt icon-large text-muted'> </i>"; ?>

              <span data-ve='thread' id='thread<?php echo $thread->id;?>'><?php echo '[' . zget($boards, $thread->board, $thread->board). '] ' . html::a($control->createLink('thread', 'view', "id=$thread->id"), $thread->title, $style); ?></span>
            </td>
            <td class='hidden-xxs'><strong><?php echo $thread->authorRealname;?></strong></td>
            <td class='hidden-xs'><?php echo substr($thread->addedDate, 5, -3); ?></td>
            <td class='hidden-xs'><?php echo $thread->views;?></td>
            <td class='hidden-xxxs'><?php echo $thread->replies;?></td>
            <td class='hidden-sm hidden-xs'>
            <?php if($thread->replies){ ?>

              <?php echo substr($thread->repliedDate, 5, -3) . ' '; ?>

              <?php echo html::a($control->createLink('thread', 'locate', "threadID={$thread->id}&replyID={$thread->replyID}"), $thread->repliedByRealname); ?>

<?php } ?>

            </td>  
          </tr>  
        <?php endforeach; ?>

      </tbody>
      <tfoot>
        <tr><td colspan='7'><?php echo $pager->show('right', 'short');?></td></tr>
      </tfoot>
    </table>
  </div>
<?php }else{ ?>

  <div id='boards'>
    <?php foreach($boards as $parentBoard): ?>

      <div class='panel'>
        <table class='table table-hover table-striped'>
          <thead>
            <tr class='text-center hidden-xxxs'>
              <th class='text-left'><i class='icon-comments icon-large'> </i><?php echo $parentBoard->name;?></th>
              <th class='hidden-xs'><?php echo $lang->forum->owners;?></th>
              <th><?php echo $lang->forum->threadCount;?></th>
              <th class='hidden-xxs'><?php echo $lang->forum->postCount;?></th>
              <th class='hidden-xs'><?php echo $lang->forum->lastPost;?></th>
            </tr>  
          </thead>
          <tbody>
            <?php foreach($parentBoard->children as $childBoard): ?>

              <tr class='text-center text-middle'>
                <td class='text-left'>
                  <?php echo $control->forum->isNew($childBoard) ? "<i class='icon-comment icon-large text-success'> </i>" : "<i class='icon-comment icon-large text-muted'> </i>"; ?>

                  <?php echo html::a(inlink('board', "id=$childBoard->id", "category={$childBoard->alias}"), $childBoard->name); ?><br />
                  <small class='text-muted'><?php echo $childBoard->desc;?></small>
                </td>
                <td class='w-120px hidden-xs'><strong><nobr><?php foreach($childBoard->moderators as $moderators): ?> <?php echo $moderators . ' '; ?> <?php endforeach; ?></nobr></strong></td>
                <td class='w-70px hidden-xxxs'><?php echo $childBoard->threads;?></td>
                <td class='w-70px hidden-xxs'><?php echo $childBoard->posts;?></td>
                <td class='w-150px hidden-xs'>
                  <?php if($childBoard->postedBy){ ?>

                    <?php echo substr($childBoard->postedDate, 5, -3) . '<br/>'; ?>

                    <?php echo html::a($control->createLink('thread', 'locate', "threadID={$childBoard->postID}&replyID={$childBoard->replyID}"), $childBoard->postedByRealname); ?>

<?php } ?>

                </td>
              </tr>
            <?php endforeach; ?>

          </tbody>
        </table>
      </div>
    <?php endforeach; ?>

  </div>
<?php } ?>

<div class='blocks' data-region='forum_index-bottom'><?php echo $control->block->printRegion($layouts, 'forum_index', 'bottom');?></div>
<?php $tpl = new RainTPL;$tpl->assign($this->var);$tpl->draw($control->loadModel('ui')->getEffectViewFile('default', 'common', 'footer'));?>

