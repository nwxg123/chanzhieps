{$canManage      = $control->thread->canManage($board->id)}
{$scoreAvailable = commonModel::isAvailable('score')}
{$html           = ''}
{if($canManage)} {$html .= html::a($control->createLink('ask', 'threadToAsk', "threadID=$thread->id"), $lang->thread->toAsk)} {/if}
<style> .table > tbody > tr > td.speaker {padding:10px !important;} </style>
<script>
  {if($html && $scoreAvailable && ($app->user->admin == 'super' || $app->user->account == $thread->author))}
    $('.operations .options').append({!json_encode($html)});
  {/if}
</script>