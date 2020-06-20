$().ready(function()
{
    $('#categories').change(function()
    {
        $categories = $(this).val();
        if($categories)
        {
            url = createLink('attribute', 'ajaxgetform', "categories=" + $categories + "&product=" + v.productID);
            $.get(url, function(form)
            {
                $('#ajaxForm').find('.attribute-tr').remove();
                $('#content').parents('tr').after($(form));
                $(".select-chosen").chosen({no_results_text: 'id', placeholder_text:' ', disable_search_threshold: 10, width: '100%', search_contains: true});
                $('select.chosen-icons').chosenIcons({lang: 'ok'});
            })
        }
    })
    $('#categories').change();
})
