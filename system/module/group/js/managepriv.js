$().ready(function()
{
    $('.checkModule').click(function()
    {
        $(this).parents('tr').find('[type=checkbox]').prop('checked', $(this).prop('checked'));
    });

    $('.selectAll').click(function()
    {
        $(this).parents('table').find('[type=checkbox]').prop('checked', $(this).prop('checked'));
    });
    $('.nav-tabs-main li').click(function()
    {
        var $li = $(this);
        $li.parent().find('.active').removeClass('active');
        $li.addClass('active');
        group = $li.data('group');
        if(group == 'all') $li.parents('.main-table').find('.panel-group').show();
        else
        {
            $li.parents('.main-table').find('.panel-group').hide();
            $('#group' + group).show();
        }
    })
});

function showPriv(value)
{
    location.href = createLink('group', 'managePriv', "type=byGroup&param="+ groupID + "&menu=&version=" + value);
}
