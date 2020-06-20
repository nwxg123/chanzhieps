$(document).ready(function()
{
    $( document ).on( 'change', '#state', function()
    {
        window.location.href = $('#state option:selected').attr('href'); 
    });
})
