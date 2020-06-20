$(function()
{
    //if(v.fullScreen == 0 && $('.col-side').length > 0)
    //{
    //    var screenHeight = $(window).height();
    //    var mainTop      = $('.col-main').offset().top;
    //    var mainHeight   = $('.col-main').height();
    //    var sideHeight   = $('.col-side').height();
    //    if(mainTop + mainHeight < screenHeight) 
    //    {
    //        if($('#pageFooter').length > 0)  $('#pageFooter').css('margin-top', sideHeight - mainHeight);
    //        if($('#pageFooter').length == 0) $('div[id^=form]').css('padding-bottom', sideHeight - mainHeight);
    //    }
    //}
    //else
    //{
    //    var documentHeight = $(document).height();
    //    var bodyHeight     = $('body').height();
    //    var screenHeight   = $(window).height();
    //    if(bodyHeight < screenHeight) 
    //    {
    //        if($('#pageFooter').length > 0)  $('#pageFooter').css('margin-top', documentHeight - bodyHeight);
    //        if($('#pageFooter').length == 0) $('div[id^=form]').css('padding-bottom', documentHeight - bodyHeight);
    //    }
    //}

    $('input, select, textarea').change(function()
    {
        processProgress();
    });

    /* Add class clicked to avoid click twice. */
    $('.file-name label, .file-name input[type=checkbox]').click(function()
    {
        $(this).parents('.file-name').find('input[type=checkbox]').addClass('clicked');
    });

    /* Check the radio button or checkbox when click the image or div.*/
    $('.file-icon-image, .file-name').click(function()
    {
        $(this).parents('.file-wrapper').find('input[type=radio]').prop('checked', true).change();

        var checkbox = $(this).parents('.file-wrapper').find('input[type=checkbox]');
        if(!checkbox.hasClass('clicked'))
        {
            if(checkbox.prop('checked'))
            {
                checkbox.prop('checked', false).change();
            }
            else
            {
                checkbox.prop('checked', true).change();
            }
        }
        $('.clicked').removeClass('clicked');
    });

    $.setAjaxForm('[id^=form]', function(response)
    {
        if(v.page < v.pageTotal && $('[id^=form]').find('.submit').is(':hidden')) $('[id^=form]').find('.submit').popover('destroy');

        if(response.result == 'success' && response.locate)
        {
            return setTimeout(function(){location.href = response.locate;}, 1200);
        }

        if(response.result == 'fail' && $.type(response.message) == 'object')
        {
            var index = 1;
            var page  = 0;
            var e     = $(window);
            $('.items > .item').each(function()
            {
                var $item = $(this);
                var id    = $(this).find('.item-content').attr('id');
                if($(this).find('span#' + id + 'Label').length > 0)
                {
                    $item.css('border', '1px solid #953B39');
                    if(index == 1) 
                    {
                        page = $(this).parents('[id^=pageContent]').attr('data-id');
                        e    = $(this);
                    }
                    index++;
                }

                $(this).find('.item-content').find('input,select,textarea').change(function()
                {
                    $item.css('border', 'none');
                });
            });

            if(page > 0) changePage('goto', page, e);
        }
    });

    /* Submit form data. */
    $('#submit').click(function()
    {
        bootbox.confirm(v.confirm, function(result)
        {
            if(result) $('#submit').closest('form').submit();
            return true;
        });
        return false;
    });

    changePage();
});

/* Process progress style. */
function processProgress()
{
    var finished = 0;
    $('.item-content').each(function()
    {
        if($(this).find('input[type=text], select, textarea').length > 0)
        {
            if($(this).find('input[type=text], select, textarea').val() != '') finished++; 
        }
        if($(this).find('input[type=radio], input[type=checkbox]').length > 0)
        {
            $(this).find('input[type=radio], input[type=checkbox]').each(function()
            {
                if($(this).prop('checked'))
                {
                    finished++; 
                    return false;
                }
            });
        }
    });

    if(v.itemTotal > 0)
    {
        var percent = Math.round(finished / v.itemTotal * 10000) / 100;
        $('.progress-bar').attr('aria-valuenow', percent).css('width', percent + '%');
        $('.percent').html(percent + '%');
        $('.progressbar').addClass('show');
    }
}

function changePage(type, page, e)
{
    $('[id^=pageContent]').hide();
    $('#pageFooter .pager li').hide();

    if(type == 'prev') v.page--;
    if(type == 'next') v.page++;
    if(type == 'goto') v.page = page;

    if(v.page <= 1) $('#pageFooter .pager .previous.disabled').show();
    if(v.page >  1) $('#pageFooter .pager .previous').not('.disabled').show();
    if(v.page <  v.pageTotal) $('#pageFooter .pager .next').not('.disabled').show();
    if(v.page >= v.pageTotal) $('#pageFooter .pager .next.disabled').show();
    if(v.page >= v.pageTotal) $('#pageFooter .pager .submit').addClass('lastPageShowed').show();

    $('#pageFooter .pager .submit.lastPageShowed').show();

    $('#pageContent' + v.page).show();

    if(e === undefined) 
    {
        $(window).scrollTop($('div[id^=form]').offset().top);
    }
    else
    {
        $(window).scrollTop(e.offset().top);
    }
}
