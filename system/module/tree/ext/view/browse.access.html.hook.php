<script>
$('#treeMenuBox a.deleter').each(function()
{
    var reg = new RegExp("(^|&)category=([^&]*)(&|$)", "i"); 
    objectID = $(this).attr('href').match(reg);
    objectID = unescape(objectID[2]);
    link     = createLink('access', 'setAccess', "objectType=<?php echo $type;?>Category&objectID=" + objectID + "&style=full");
    $(this).after(" <a href='" + link + "' data-toggle='modal' title='<?php echo $lang->setAccessShort;?>'><i class='icon icon-lock'></i></a>");
});
</script>
