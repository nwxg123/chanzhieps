<?php if(!defined('RUN_MODE')) die();?>v.lang = {"confirmDelete":"\u60a8\u786e\u5b9a\u8981\u6267\u884c\u5220\u9664\u64cd\u4f5c\u5417\uff1f","deleteing":"\u5220\u9664\u4e2d","doing":"\u5904\u7406\u4e2d","loading":"\u52a0\u8f7d\u4e2d","updating":"\u66f4\u65b0\u4e2d...","timeout":"\u7f51\u7edc\u8d85\u65f6,\u8bf7\u91cd\u8bd5","errorThrown":"\u6267\u884c\u51fa\u9519\uff1a","continueShopping":"\u7ee7\u7eed\u8d2d\u7269","required":"\u5fc5\u586b","back":"\u8fd4\u56de","continue":"\u7ee7\u7eed","bindWechatTip":"\u53d1\u5e16\u529f\u80fd\u8bbe\u7f6e\u4e86\u7ed1\u5b9a\u5fae\u4fe1\u7684\u9650\u5236\uff0c\u8bf7\u5148\u7ed1\u5b9a\u5fae\u4fe1\u4f1a\u5458\u3002","importTip":"\u53ea\u5bfc\u5165\u4e3b\u9898\u7684\u98ce\u683c\u548c\u6837\u5f0f","fullImportTip":"\u5c06\u4f1a\u5bfc\u5165\u6d4b\u8bd5\u6570\u636e\u4ee5\u53ca\u66ff\u6362\u7ad9\u70b9\u6587\u7ae0\u3001\u4ea7\u54c1\u7b49\u6570\u636e"};;v.pageID = 2;;
;v.pageLayout = "global";;

var currentBlockID = 2;


if(typeof($('#block' + currentBlockID).parent('.col').data('grid')) === 'undefined' && $('#block' + currentBlockID).parent('.col').data('probability') === 'undefined')
{
    var grid = $('#block' + currentBlockID).parents('.blocks').data('grid');
    grid = typeof(grid) == 'undefined' ? 12 : grid;

    $('#block' + currentBlockID).parent('.col').attr('data-grid', grid).attr('class', 'col col-' + grid);
}

$('.articleTitleA').each(function()
{
    $(this).css('max-width', $(this).parents('li').width() - $(this).prev('.category').width() - $(this).next('.sticky').width() - $(this).parent().next('.article-date').width() - 10);
})
$('.articleTitleB').each(function()
{
    $(this).css('max-width', $(this).parent('li').width() - $(this).next('.sticky').width() - 10);
})
;$().ready(function() { $('#execIcon').tooltip({title:$('#execInfoBar').html(), html:true, placement:'right'}); }); ;$(document).ready(function()
{
    $('.nav-page-' + v.pageID + ':first').addClass('active');

    function basename(str)
    {
        var pos = str.lastIndexOf('/');
        return str.substring(pos + 1,str.length);
    }

    $('.article-content img').click(function(){
        var itemSrc  = $(this).attr('src');
        var itemName = basename(itemSrc).split('&')[0];
        if(typeof(itemName) == 'string')
        {
            $('.files-list .' + itemName).click();
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
