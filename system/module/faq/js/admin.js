$().ready(function()
{
    $('[name=product], #product_chosen').prependTo('.leftmenu');
    $('[name=product]').change(function()
    {
        product = $(this).val();
        location.href = createLink('faq', 'admin', 'productID=' + product);
    })

    $(".tree li a[id=category" + v.id + "]").addClass('active');

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
    $('.has-list').addClass('open in');
});
