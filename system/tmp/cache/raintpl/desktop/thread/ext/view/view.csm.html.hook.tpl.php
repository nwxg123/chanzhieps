<?php if(!class_exists('raintpl')){exit;}?><?php $canManage=$this->var['canManage'] = $control->thread->canManage($board->id);?>

<?php $html=$this->var['html']      = '';?>

<?php if($canManage){ ?>

<?php $html=$this->var['html'] .= html::a($control->createLink('ask', 'threadToAsk', "threadID=$thread->id"), $lang->thread->toAsk);?>

<?php } ?>

<style> .table > tbody > tr > td.speaker {padding:10px !important;} </style>
<script>
  <?php if($html){ ?>

    $('.thread:first .thread-foot .thread-actions .thread-more-actions a:last').after(<?php echo json_encode($html); ?>);
  <?php } ?>


  <?php if(!empty($thread->scoreSum)){ ?>

    $('div.thread:first div.panel-heading .panel-actions').prepend("<?php echo sprintf($lang->thread->scoreSum, $thread->scoreSum); ?>");
  <?php } ?>

</script>
