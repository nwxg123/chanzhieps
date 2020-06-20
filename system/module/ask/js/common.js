$(document).ready(function()
{
    $('#mainNavbarCollapse .active').removeClass('active');
    $('#mainNavbarCollapse').find('[href*="f=' + v.method + '"]').parent().addClass('active');
    $('.has-list').addClass('open in');
})
