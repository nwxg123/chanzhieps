<script>
$('span.actions a.deleter').each(function()
{
    var reg = new RegExp("(^|&)bookID=([^&]*)(&|$)", "i"); 
    objectID = $(this).attr('href').match(reg);
    if(objectID)
    {
        objectID = unescape(objectID[2]);
        link     = createLink('access', 'setAccess', "objectType=book&objectID=" + objectID + "&style=full");
        $(this).after(" <a href='" + link + "' data-toggle='modal' class='btn btn-icon'><i class='icon icon-lock'></i></a>");
        $(this).parent('td').css('width', '280');
    }
});
</script>
