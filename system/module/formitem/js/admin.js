$(function()
{
    var tab = $.cookie('tab');
    $("a[href='#" + tab + "']").click();
    $("a[href='#" + tab + "Fixed']").click();

    $('.items').sortable(
    {
        trigger: '.sort',
        selector: '.item',
        finish: function()
        {
            var orders    = {};     
            var orderNext = 1;
            $('.sort').each(function()
            {
                orders[$(this).data('id')] = orderNext++;
            });

            $.post(createLink('formitem', 'sort'), orders, function(data)
            {
                if(data.result == 'success')
                {
                    return location.reload(); 
                }
                else
                {
                    bootbox.alert(data.message);
                    return location.reload(); 
                }
            }, 'json');
        }
    });

    $('.items .item').mouseover(function()
    {
        $(this).css('border', '1px solid #3280fc');
    });

    $('.items .item').mouseout(function()
    {
        $(this).css('border', '1px solid #ddd');
    });

    $(window).scroll(function()
    {
        fixHeader();
        fixDropdownMenu();
    });
})

/* Fix float position of dropdown menu. */
function fixDropdownMenu()
{
    var scrollTop      = $(window).scrollTop();
    var screenHeight   = $(window).height();
    var documentHeight = $(document).height();
    var navHeight      = $('.navbar-fixed-bottom').height();
    $('.item').each(function()
    {
        $(this).find('.itemActions .dropdown').removeClass('dropup');

        var top    = $(this).find('.itemActions .dropdown').offset().top;
        var height = $(this).find('.itemActions .dropdown').height();
        if(top + height + 220 > screenHeight + scrollTop - navHeight)
        {
            $(this).find('.itemActions .dropdown').addClass('dropup');
        }
    });
}

function fixHeader()
{
    var profile = $('#profile');

    var navHeight = $('#mainMenu').outerHeight();
    var top       = profile.offset().top - $('#mainNavbar').outerHeight();
    var main      = profile.closest('#main');

    var fixedProfile = $('#fixedProfile');
    if(!fixedProfile.length)
    {
        profile.after('<div id="fixedProfile" class="panel panel-primary">' + profile.html() + '</div>');
    }

    if($(window).scrollTop() > top)
    {
        main.addClass('with-fixed-profile');
    }
    else
    {
        main.removeClass('with-fixed-profile');
    }

    $('#fixedProfile').css({top: navHeight + 36, left: profile.offset().left, width: (parseInt(profile.css('width')) || profile.width())});
    $('#fixedProfile').find('[href=#tabCommon]').attr('href', '#tabCommonFixed');
    $('#fixedProfile').find('[href=#tabProfile]').attr('href', '#tabProfileFixed');
    $('#fixedProfile').find('#tabCommon').attr('id', 'tabCommonFixed');
    $('#fixedProfile').find('#tabProfile').attr('id', 'tabProfileFixed');
}
