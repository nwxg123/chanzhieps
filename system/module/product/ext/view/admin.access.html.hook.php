<script>
$('td > span > ul > li > a.deleter').each(function()
{
    objectID = $(this).parents('tr').find('td').first().html();
    link     = createLink('access', 'setAccess', "objectType=product&objectID=" + objectID + "&style=full");
    $(this).after(" <a href='" + link + "' data-toggle='modal'><?php echo $lang->setAccess;?></a>");
    $(this).parent('td').css('width', '280');
});
</script>
