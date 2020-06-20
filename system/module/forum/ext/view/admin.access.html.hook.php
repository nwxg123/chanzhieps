<?php if($app->clientLang == 'zh-cn' || $app->clientLang == 'zh-tw'):?>
<script>
$('.actions').eq(0).after("<th class='text-center actions w-30px'><?php echo $lang->setAccessShort;?></th>");
objectID = $('.c-actions').parents('tr').find('td').first().html();
link = createLink('access', 'setAccess', "objectType=thread&objectID=" + objectID + "&style=full");
$('td a.deleter').each(function()
{
    $(this).parent().parent().find('td.c-actions').eq(1).after("<td class='c-actions'><a href='" + link + "' data-toggle='modal' class='btn btn-icon'><i class='icon icon-lock'></i></a></td>");
});
</script>
<?php else:?>
<script>
var colspan = $('.actions').eq(0).attr('colspan');
var width  = (parseInt(colspan) + 1) * 30;
$('.actions').eq(0).attr('colspan', parseInt(colspan) + 1);
$('.actions').eq(0).attr('class', 'actions w-' + width + 'px');
objectID = $('.c-actions').parents('tr').find('td').first().html();
link = createLink('access', 'setAccess', "objectType=thread&objectID=" + objectID + "&style=full");
$('td a.deleter').each(function()
{
    $(this).parent().parent().find('td.c-actions').eq(1).after("<td class='c-actions'><a href='" + link + "' data-toggle='modal' class='btn btn-icon'><i class='icon icon-lock'></i></a></td>");
});
</script>
<?php endif;?>
