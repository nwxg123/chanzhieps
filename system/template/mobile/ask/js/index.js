$(function ()
{
    var statusFilters = $('#statusFilters');
    var statusFiltersToggleBtn = $('#statusFiltersToggleBtn');
    var showStatusFilters = function()
    {
        statusFiltersToggleBtn.addClass('active');
        statusFilters.addClass('show');
    };
    var hideStatusFilters = function()
    {
        statusFiltersToggleBtn.removeClass('active');
        statusFilters.removeClass('show');
    };
    var toggleStatusFilters = function()
    {
        if(statusFilters.hasClass('show')) hideStatusFilters();
        else showStatusFilters();
    };
    statusFiltersToggleBtn.on('click', toggleStatusFilters);
    if(statusFilters.find('.attrs > a.active').length) showStatusFilters();

    $(document).on('click', '.operations .trigger', function ()
    {
        $(this).addClass('active');
        setTimeout(function(){
            $('.operations .trigger').removeClass('active');
        }, 100);
    });
});