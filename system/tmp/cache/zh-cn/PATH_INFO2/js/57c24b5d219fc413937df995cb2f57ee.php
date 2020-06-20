<?php if(!defined('RUN_MODE')) die();?>v.lang = {"confirmDelete":"\u60a8\u786e\u5b9a\u8981\u6267\u884c\u5220\u9664\u64cd\u4f5c\u5417\uff1f","deleteing":"\u5220\u9664\u4e2d","doing":"\u5904\u7406\u4e2d","loading":"\u52a0\u8f7d\u4e2d","updating":"\u66f4\u65b0\u4e2d...","timeout":"\u7f51\u7edc\u8d85\u65f6,\u8bf7\u91cd\u8bd5","errorThrown":"\u6267\u884c\u51fa\u9519\uff1a","continueShopping":"\u7ee7\u7eed\u8d2d\u7269","required":"\u5fc5\u586b","back":"\u8fd4\u56de","continue":"\u7ee7\u7eed","bindWechatTip":"\u53d1\u5e16\u529f\u80fd\u8bbe\u7f6e\u4e86\u7ed1\u5b9a\u5fae\u4fe1\u7684\u9650\u5236\uff0c\u8bf7\u5148\u7ed1\u5b9a\u5fae\u4fe1\u4f1a\u5458\u3002","importTip":"\u53ea\u5bfc\u5165\u4e3b\u9898\u7684\u98ce\u683c\u548c\u6837\u5f0f","fullImportTip":"\u5c06\u4f1a\u5bfc\u5165\u6d4b\u8bd5\u6570\u636e\u4ee5\u53ca\u66ff\u6362\u7ad9\u70b9\u6587\u7ae0\u3001\u4ea7\u54c1\u7b49\u6570\u636e"};;v.objectType = "book";;v.objectID = 2;;
$(function()
{
    var videoContainer = "<video id=\"VIDEO_ID\" class=\"video-js vjs-default-skin vjs-big-play-centered\" controls preload=\"auto\" loop=\"loop\" data-setup='{\"autoplay\": VIDEO_AUTOSTART, \"width\": VIDEO_WIDTH, \"height\": VIDEO_HEIGHT, \"controlBar\": {\"fullscreenToggle\": VIDEO_FULLSCREEN}}'><source src=\"VIDEO_SRC\" type=\"video\/VIDEO_TYPE\" \/> <\/video>";
    $('embed').each(function(index)
    {
        if($(this).hasClass('videojs')) 
        {
            var $embed      = $(this),
                src         = $embed.attr('src'),
                w           = $embed.width(),
                h           = $embed.height(),
                type        = src.match(/t=\w+/g),
                autostart   = $embed.attr('autostart'),
                fullscreen  = $embed.attr('allowfullscreen'),
                containerID = 'video_' + index;

            $container = videoContainer.replace(/VIDEO_SRC/g, src);
            $container = $container.replace(/VIDEO_WIDTH/, w);
            $container = $container.replace(/VIDEO_HEIGHT/, h);
            $container = $container.replace(/VIDEO_ID/, containerID);
            $container = $container.replace(/VIDEO_AUTOSTART/, autostart);
            $container = $container.replace(/VIDEO_FULLSCREEN/, fullscreen);
            $container = $container.replace(/VIDEO_TYPE/, type[0].replace('t=', ''));
            $(this).replaceWith($container);
        }
    })
});
;$().ready(function() { $('#execIcon').tooltip({title:$('#execInfoBar').html(), html:true, placement:'right'}); }); ;$(document).ready(function()
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
$(document).ready(function()
{
    if($('.fullScreen-nav .nav-content').height() < $(window).height())
    {
        $('.fullScreen-nav .nav-content').css('padding-top', '0px');
    }

    $('.fullScreen-nav .nav-content a').click(function()
    {
        $('.fullScreen-nav .nav-content a').removeClass('active');
        $(this).addClass('active');
    });
    
    $('body').tooltip(
    {
         html: true,
         selector: "[data-toggle=tooltip]",
         container: "body"
    });

    $('.fullScreen-content').on("scroll", function()
    {
        var count = $(".fullScreen-nav li").length;
        if(!count) return false;
        for(var i=0;i<count;i++)
        {
            if($('#' + i).offset().top <= '80')
            {
                $('.fullScreen-nav .nav-content a').removeClass('active');
                $(".fullScreen-nav .nav-content a[href='#" + i + "']").addClass('active');
            }
        }
    });
    /* Scroll function. */
    function yrScroll()
    {
         var listTitleHeight = $(".book-catalog .panel-heading").height();

         var catalogWidth  = $('.book-catalog').width();
         var catalogHeight = $(window).height() - 10;
         $(".book-catalog").css({'max-height': catalogHeight, 'overflow-y': 'auto', 'overflow-x': 'hidden'});

         if($('.books .active').length)
         {
             var listScrollTop =  $(".books .active").position().top;
             var listMoveSize = listScrollTop > ( $(".bookScrollListsBox").height() - listTitleHeight ) / 2 ? listScrollTop : 0;
             var scrollMoveSize = listMoveSize / $(".books").height(); 
             $(".bookScrollListsBox").scrollTop
             (
                 $(".bookScrollListsBox .books").height() * scrollMoveSize -($(".bookScrollListsBox").height() / 2 - $(".bookScrollListsBox .panel-heading").height() - 47)
             );
         }


         /* Bind scroll event */
         $(document).on("scroll", function ()
         {
              if( $("#book").offset()) var headerHeight = $("#book").offset().top;
              if( $('.col-md-9').offset()) { var footerHeight = $('.col-md-9').offset().top + $('.col-md-9').height() - $(window).height();}

              $(".page-wrapper").css({"min-height":$(".book-catalog").height()})
              if($(document).scrollTop() > headerHeight )
              {
                   $('.book-catalog').css({'position': 'fixed', 'top':'0', 'width': catalogWidth});

                   if($(document).scrollTop() > footerHeight)
                   {
                       catalogHeight2 = $(window).height() - $('.blocks.all-bottom').outerHeight() - $('#footer').outerHeight() - 60;
                       $('.book-catalog').css({'max-height': catalogHeight2, 'overflow-y': 'auto', 'overflow-x': 'hidden'});
                   }
                   else
                   {
                       $('.book-catalog').css({'max-height': catalogHeight, 'overflow-y': 'auto', 'overflow-x': 'hidden'});
                   }
              }
              else if( $(document).scrollTop() < headerHeight )
              {
                   $('.book-catalog').css({'position': 'relative' });
              }
         });
    };
    yrScroll();

    $('.previous > a, .next > a').css('max-width', (($('.pager').width() - $('.pager > .back > a').width()) * 0.45));

    if($('.previous > a > span').width() > $('.previous > a').width())
    {
        previousSpanWidth = $('.previous > a').width() - $('.previous .icon-arrow-left').width() - 5;
        $('.previous > a > span').css('width', previousSpanWidth);
    }

    if($('.next > a > span').width() > $('.next > a').width())
    {
        nextSpanWidth = $('.next > a').width() - $('.next .icon-arrow-right').width() - 5;
        $('.next > a > span').css('width', nextSpanWidth);
    }

    $('dd > span').click(function()
    {
        if($(this).parent().attr('class').indexOf('closed') != '-1')
        {
            $(this).parent().attr('class', $(this).parent().attr('class').replace('closed', 'opened'));
            $(this).parent().find('dd').each(function()
            {
                $(this).attr('class', $(this).attr('class').replace('closed', 'opened'));
            })
        }
        else
        {
            $(this).parent().attr('class', $(this).parent().attr('class').replace('opened', 'closed'));
            $(this).parent().find('dd').each(function()
            {
                $(this).attr('class', $(this).attr('class').replace('opened', 'closed'));
            })
        }
    });
});

;
function loadCartInfo(twinkle)
{
    $('#siteNav').load(createLink('misc', 'printTopBar'),
        function()
        {
            if(twinkle) 
            {
                bootbox.dialog(
                {  
                    message: v.addToCartSuccess,  
                    buttons:
                    {  
                        back:
                        {  
                            label:     v.lang.continueShopping,
                            className: 'btn-primary',  
                            callback:  function(){location.reload();}  
                        },
                        cart:
                        {  
                            label:     v.gotoCart,  
                            className: 'btn-primary',  
                            callback:  function(){location.href = createLink('cart', 'browse');}  
                        }  
                    }  
                });
            }
        }
    );
}
