$(document).ready(function()
{   
    $.setAjaxForm('#qrcodeForm', function(data)
    {
        setTimeout(function(){parent.location.reload()}, 1500);
    }); 
})
