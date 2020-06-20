$(document).ready(function()
{
    $('.media-placeholder').each(function()
    {
        var $this = $(this);
        $this.attr('style', 'background-color: hsl(' + $this.data('id') * 57 % 360 + ', 80%, 90%)');
    });

    $('[data-toggle="tooltip"]').tooltip({container: 'body'});

    $('.price').each(function()
    {
         if($(this).find('strong').length > 0)
         {
             $('.price').css('height', '30px');
             return false;
         }
    });
})
