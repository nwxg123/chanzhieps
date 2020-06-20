$(function()
{
    $("ul li a[id=category" + v.id + "]").addClass('active');

    $('#toggleToc').click(function()
    {
        $('ol').toggle();
        if($('ol').is(':visible'))
        {
            $('a span').text(v.lang.hide);
        }
        else 
        {
            $('a span').text(v.show);
        }
    });

    $(document).on('click', '.faqList li a', function()
    {
        $.get(createLink('faq', 'view', 'id=' + $(this).data('id')));
    })

    $('#faqTab li').removeClass('active');
    if(v.orderBy == 'views_desc')
    {
        $('li.hotFaqList').addClass('active');
    }
    else
    {
        $('li.faqList').addClass('active');
    }
    $('.has-list').addClass('open in');
});
