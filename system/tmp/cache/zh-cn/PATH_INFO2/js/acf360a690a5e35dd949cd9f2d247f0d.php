<?php if(!defined('RUN_MODE')) die();?>v.lang = {"confirmDelete":"\u60a8\u786e\u5b9a\u8981\u6267\u884c\u5220\u9664\u64cd\u4f5c\u5417\uff1f","deleteing":"\u5220\u9664\u4e2d","doing":"\u5904\u7406\u4e2d","loading":"\u52a0\u8f7d\u4e2d","updating":"\u66f4\u65b0\u4e2d...","timeout":"\u7f51\u7edc\u8d85\u65f6,\u8bf7\u91cd\u8bd5","errorThrown":"\u6267\u884c\u51fa\u9519\uff1a","continueShopping":"\u7ee7\u7eed\u8d2d\u7269","required":"\u5fc5\u586b","back":"\u8fd4\u56de","continue":"\u7ee7\u7eed","bindWechatTip":"\u53d1\u5e16\u529f\u80fd\u8bbe\u7f6e\u4e86\u7ed1\u5b9a\u5fae\u4fe1\u7684\u9650\u5236\uff0c\u8bf7\u5148\u7ed1\u5b9a\u5fae\u4fe1\u4f1a\u5458\u3002","importTip":"\u53ea\u5bfc\u5165\u4e3b\u9898\u7684\u98ce\u683c\u548c\u6837\u5f0f","fullImportTip":"\u5c06\u4f1a\u5bfc\u5165\u6d4b\u8bd5\u6570\u636e\u4ee5\u53ca\u66ff\u6362\u7ad9\u70b9\u6587\u7ae0\u3001\u4ea7\u54c1\u7b49\u6570\u636e"};;v.path = [11,12];;v.categoryID = 12;;v.pageLayout = "global";;place0fa750dda51f98575de0221eedc864b0='IDLIST_PLACEHOLDER12,IDLIST_PLACEHOLDER';;
$(document).ready(function()
{
    $('.tree .list-toggle').mousedown(function(){$(this).parents('.panel-block').height('auto');})
    $('.row.blocks .tree').resize(function(){$(this).parents('.row.blocks').tidy({force: true});})
})
;$().ready(function() { $('#execIcon').tooltip({title:$('#execInfoBar').html(), html:true, placement:'right'}); }); ;$(document).ready(function()
{
    $('#copyBox').hide().find(':input').attr('disabled', true);
    $('#source').change(function()
    {
        $('#copyBox').hide().find(':input').attr('disabled', true);
        if($(this).val() != 'original') $('#copyBox').show().find(':input').attr('disabled', false);
    });

    /* Set current active topNav. */
    var hasActive = false;
    if(v.categoryID > 0 && $('.nav-article-' + v.categoryID).length >= 1)
    {
        hasActive = true;
        $('.nav-article-' + v.categoryID).addClass('active');
    }

    if(v.categoryPath && v.categoryPath.length)
    {
        $.each(v.categoryPath, function(index, category)
        {
            if(!hasActive)
            {
                if($('.nav-article-' + category).length >= 1) hasActive = true;
                $('.nav-article-' + category).addClass('active');
            }
        });
    }
    else if(v.path && v.path.length)
    {
        $.each(v.path, function(index, category)
        {
            if(!hasActive)
            {
                if($('.nav-article-' + category).length >= 1) hasActive = true;
                $('.nav-article-' + category).addClass('active');
            }
        });
        if(!hasActive) $('.nav-article-0').addClass('active');
    }

    if(v.categoryID !== 0) $('#category' + v.categoryID).parent().addClass('active');
});
$(document).ready(function()
{
    var fieldName = 'addedDate';
    var orderType = 'desc';
    $(document).on('click', '.setOrder', function()
    {
        if($(this).data('field') == fieldName)
        {
            orderType = orderType == 'asc' ? 'desc' : 'asc';
            fieldName = $(this).data('field');
        }
        else
        {
            orderType = 'desc';
            fieldName = $(this).data('field');
        }

        $.cookie('articleOrderBy[' + v.categoryID + ']', fieldName + '_' + orderType);

        r = Math.ceil(Math.random() * 1000000);
        url = location.href;
        url = url.indexOf('r=') != -1 ? url.substring(0, url.indexOf('r=') - 1) : url;
        if(config.requestType == 'GET' && url.indexOf('pageID') < 0) url = url + '&pageID=1';
        url = config.requestType == 'GET' ? url + '&r=' + r + ' #articleList' : url + '?r=' + r + ' #articleList';
        $('#mainContainer').load(url, function()
        {
            setSorterClass()
            $('.pager > a').each(function()
            {
                href = $(this).attr('href');
                if(href.indexOf('r=') < 0) return true;
                $(this).attr('href', href.substring(0, href.indexOf('r=') - 1));
            });
        });
    });

    function setSorterClass()
    {
        if(orderType == 'asc')
        {
            $("[data-field=" + fieldName + "]").parent().removeClass('header').addClass('headerSortUp');
        }
        if(orderType == 'desc')
        {
            $("[data-field=" + fieldName + "]").parent().removeClass('header').addClass('headerSortDown');
        }
    }
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
