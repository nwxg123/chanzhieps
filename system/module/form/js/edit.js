$(function()
{
    if(v.type == 'exam') $('[name^=postLimit][type=checkbox][value=needLogin]').prop('checked', true).attr('disabled', 'disabled');
});
