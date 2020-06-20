<?php if($app->clientLang == 'zh-cn' || $app->clientLang == 'zh-tw'):?>
<script>
$('th.actions').eq(0).after('<th class="text-center actions w-30px"><?php echo $lang->product->price;?></th>');
$('td a[href*="m=product&f=edit"]').each(function()
{
    url = $(this).attr('href').replace(/edit/, 'setprice');
    $(this).parent().after("<td class='c-actions'><a href='" + url + "' class='btn btn-icon'><i class='icon icon-renminbi'></i></a></td>");
});
</script>
<?php else:?>
<script>
$('th.actions[colspan=7]').attr('colspan','8');
$('th.actions[colspan=8]').attr('class','actions w-240px cc_cursor');
$('td a[href*="m=product&f=edit"]').each(function()
{
    url = $(this).attr('href').replace(/edit/, 'setprice');
    $(this).parent().after("<td class='c-actions'><a href='" + url + "' title='<?php echo $lang->product->price;?>' class='btn btn-icon'><i class='icon icon-renminbi'></i></a></td>");
});
</script>
<?php endif;?>
