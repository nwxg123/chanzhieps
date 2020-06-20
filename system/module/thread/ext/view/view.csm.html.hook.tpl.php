{$canManage = $control->thread->canManage($board->id)}
{$html      = ''}
{if($canManage)} {$html .= html::a($control->createLink('ask', 'threadToAsk', "threadID=$thread->id"), $lang->thread->toAsk)} {/if}
<style> .table > tbody > tr > td.speaker {padding:10px !important;} </style>
<script>
  {if($html)}
    $('.thread:first .thread-foot .thread-actions .thread-more-actions a:last').after({!json_encode($html)});
  {/if}

  {if(!empty($thread->scoreSum))}
    $('div.thread:first div.panel-heading .panel-actions').prepend("{!sprintf($lang->thread->scoreSum, $thread->scoreSum)}");
  {/if}
</script>
