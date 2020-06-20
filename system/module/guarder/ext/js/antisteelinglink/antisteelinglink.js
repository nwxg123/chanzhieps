$(document).ready(function()
{
    $('.leftmenu .nav li').removeClass('active').find('[href*=antiSteelingLink]').parent().addClass('active');
    $('[name=status]').click(function()
    {
        $('.detailTR').toggle($(this).val() == 'open');
    });
});
