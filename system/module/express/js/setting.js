$().ready(function()
{
    $('#mainNavbarCollapse .active').removeClass('active');
    $('#mainNavbarCollapse').find("a[href*='m=product&f=setting']").parent().addClass('active');
});
