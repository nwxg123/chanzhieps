$(document).ready(function()
{
    $('#postBtn').click(function()
    {
        text = $('#postBtn').text();
        $('#postBtn').text(v.lang.loading);
        url = createLink('usercase', 'getSiteInfo');
        $.post(url, {url:$('#site').val()}, function(response)
        {
            $('#postBtn').text(text);
            if(response.result == 'success')
            {
                $.each(response.site, function(item, value)
                {
                    $('#' + item).val(value);
                })
                keEditor.html(response.site.desc);
            }
            else
            {
                alert(response.message);
            }
        }, 'json')
    })
})
