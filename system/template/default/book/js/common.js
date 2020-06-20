$(document).ready(function()
{
    $('.nav-system-book').addClass('active');
    $('#article' + v.objectID).addClass('active');
    $('#article' + v.objectID).parents('dd').each(function()
    {
        $(this).attr('class', $(this).attr('class').replace('closed', 'opened'));
        $(this).addClass('active');
    })
    if(v.fullScreen)
    {
        $('html, body').css('height', '100%');

        curPos = sessionStorage.getItem('curPos');
        if(curPos) $('.fullScreen-catalog').animate({scrollTop: curPos}, 0);

        $('.article').click(function(){sessionStorage.setItem('curPos', $('.fullScreen-catalog').scrollTop());});
    }

    $('dd a').click(function()
    {
        getContent(this);
        return false;
    });

    $('body').on("click",".icon-next a, .icon-previous a, .previous a, .next a",function()
    {
        getContent(this);
        return false;
    });

    function getContent(obj)
    {
        var url = $(obj).attr('href');
        if($('.article.book-content').length !== 0)
        {
            $('.col-md-9').load(url + ' .col-md-9 > div', function(){init();});
        }
        else
        {
            $.get(url, function(data)
            {   
                $('.fullScreen-content').html($(data).find('.fullScreen-content').html());
                $('.fullScreen-nav').html($(data).find('.fullScreen-nav').html());
                init();
            })
        }
    }
    function init()
    {
        var objectID = $('#id').val();
        $('.article').removeClass('active');
        $('#article' + objectID).addClass('active');
        $('#article' + objectID).parents('dd').each(function()
        {
            $(this).attr('class', $(this).attr('class').replace('closed', 'opened'));
            $(this).addClass('active');
        })
    }

    $(window).keydown(function(e)
    {
        if(e.keyCode == 37) getContent($('.previous a'));
        if(e.keyCode == 39) getContent($('.next a'));
    });
});
