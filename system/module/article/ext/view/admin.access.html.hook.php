<script>
$('td ul li a.deleter').each(function()
{
    var reg = new RegExp("(^|&)articleID=([^&]*)(&|$)", "i"); 
    objectID = $(this).attr('href').match(reg);
    objectID = unescape(objectID[2]);
    link     = createLink('access', 'setAccess', "objectType=<?php echo $type;?>&objectID=" + objectID + "&style=full");
    $(this).after(" <a href='" + link + "' data-toggle='modal'><?php echo $lang->setAccess;?></a>");
    $(this).parent('td').css('width', '280');
});
</script>
