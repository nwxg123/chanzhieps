$(document).ready(function()
{
    function initBooks(object)
    {
        var count = 0;
        $(object).children('dl').children('dd').each(function()
        {
            count ++;
            if($(this).children('dl').length > 0)
            {
                if($(this).attr('class').indexOf('chapter-empty') != '-1')
                {
                    $(this).attr('class', $(this).attr('class').replace(' chapter-empty', ''));
                }
                initBooks($(this));
            }
            else
            {
                if($(this).attr('class').indexOf('chapter-empty') == '-1')
                {
                    $(this).attr('class', $(this).attr('class') + ' chapter-empty');
                }
            }

            if(($(object).children('dl').children('dd').length - 1) == count)
            {
                if($(this).attr('class').indexOf('last') == '-1')
                {
                    $(this).attr('class', $(this).attr('class') + ' last');
                }
            }
            else
            {
                if($(this).attr('class').indexOf('last') != '-1')
                {
                    $(this).attr('class', $(this).attr('class').replace(' last', ''));
                }
            }
        });
    }

    function toggleStatus(object, status)
    {
        var oldStatus = 'closed';
        if(status == 'closed') oldStatus = 'opened';
        $(object).children('dl').children('dd').each(function()
        {
            if($(this).attr('class').indexOf('chapter') != '-1')
            {
                if($(this).attr('class').indexOf(oldStatus) != '-1')
                {
                    $(this).attr('class', $(this).attr('class').replace(oldStatus, status));
                }
                else if($(this).attr('class').indexOf(status) == '-1')
                {
                    $(this).attr('class', $(this).attr('class') + ' ' + status);
                }
            }

            if($(this).attr('class').indexOf('chapter-empty') == '-1')
            {
                toggleStatus($(this), status);
            }
        });
    }

    function saveOrders(orders)
    {
        $.post(createLink('book','sort'),
            {sort:orders},
            function(data)
            {
                if(data.result != "success")
                {
                    bootbox.alert(data.message);
                }
                else
                {
                    initBooks($('.books'));
                }
            },'json');
    }

    function updateOrders(ele, parentOrder, orders)
    {
        var root = false;
        if(typeof ele === 'undefined')
        {
            ele = $('.books > dl, .books > .catalog > dl');
            root = true;
            orders = {};
        }

        if(typeof parentOrder === 'undefined')
        {
            parentOrder = '';
            var $parent = ele.closest('.catalog:not(".catalog-empty, .drag-shadow")');
            if($parent.length)
            {
                parentOrder = $parent.children('strong').find('.order').text();
            }
        }

        var index = 1;
        ele.children('.catalog:not(".catalog-empty, .drag-shadow")').each(function()
        {
            var $this = $(this);
            var order = (parentOrder === '' ? '' : (parentOrder + '.')) + (index++);
            orders[$this.data('id')] = order;
            $this.children('strong').find('.order').text(order);
            var $dl = $this.children('dl');
            if($dl.length)
            {
                updateOrders($dl, order, orders);
            }
        });

        if(root)
        {
            saveOrders(orders);
        }
    };

    $('.books dl').append('<dd class="catalog catalog-empty">&nbsp;</dd>');
    initBooks($('.books'));
    toggleStatus($('.books'), 'closed');

    $('.books').droppable(
    {
        handle: '.sort-handle',
        target: function($e){return $e.siblings('.catalog');},
        selector: '.catalog',
        container: '.books',
        nested: true,
        flex: true,
        sensorOffsetY: -10,
        start: function()
        {
            $('.books').addClass('show-empty-catalog');
        },
        drag: function(e)
        {
            if(e.target)
            {
                $('.drop-area').removeClass('drop-area');
                e.target.closest('dl').addClass('drop-area');
            }
        },
        drop: function(e)
        {
            e.target.before(e.element);
            updateOrders();
        },
        finish: function()
        {
            $('.drop-area').removeClass('drop-area');
            $('.books').removeClass('show-empty-catalog');
        }
    });

    $('#changeBtn').click(function()
    {
        if($(this).attr('class').indexOf('btn-open') != '-1')
        {
            $(this).attr('class', $(this).attr('class').replace('btn-open', 'btn-close'));
            $(this).html(v.hideAll + "<i class='icon-angle-sm-up'></i>");
            toggleStatus($('.books'), 'opened'); 
        }
        else
        {
            $(this).attr('class', $(this).attr('class').replace('btn-close', 'btn-open'));
            $(this).html(v.showAll + "<i class='icon-angle-sm-down'></i>");
            toggleStatus($('.books'), 'closed'); 
        }
    });

    $('dd.catalog.chapter > strong').click(function()
    {
        var status = 0;
        if($(this).parent().attr('class').indexOf('closed') != '-1')
        {
            status = 'opened';
            $(this).parent().attr('class', $(this).parent().attr('class').replace('closed', 'opened'));
        }
        else
        {
            status = 'closed';
            $(this).parent().attr('class', $(this).parent().attr('class').replace('opened', 'closed'));
        }

        var flag = true;
        $('.books').find('dd').each(function()
        {
            if($(this).attr('class').indexOf(status) == '-1' && $(this).attr('class').indexOf('chapter-empty') == '-1')
            {
                flag = false;
            }
        })
        if(flag == true)
        {
            if(status == 'opened')
            {
                $('#changeBtn').attr('class', $('#changeBtn').attr('class').replace('btn-open', 'btn-close'));
                $('#changeBtn').html(v.hideAll + "<i class='icon-angle-sm-up'></i>");
            }
            else
            {
                $('#changeBtn').attr('class', $('#changeBtn').attr('class').replace('btn-close', 'btn-open'));
                $('#changeBtn').html(v.showAll + "<i class='icon-angle-sm-down'></i>");
            }
        }
    });

    $('.book').children('.actions').find('.deleter').click(function()
    {
        var deleter = $(this);
        bootbox.confirm(v.confirmDelete, function(result)
        {
           if(result)
           {
               deleter.text(v.lang.deleteing);

               $.getJSON(deleter.attr('href'), function(data)
               {
                   if(data.result == 'success')
                   {
                       if(deleter.parents('#ajaxModal').size())
                       {
                           if(typeof(data.locate) != 'undefined' && data.locate)
                           {
                               $('#ajaxModal').attr('rel', data.locate).load(data.locate);
                           }
                           else
                           {
                               $.reloadAjaxModal(1200);
                           }
                       }
                       else
                       {
                           if(typeof(data.locate) != 'undefined' && data.locate)
                           {
                               location.href = data.locate;
                           }
                           else
                           {
                               location.reload();
                           }
                       }
                       return true;
                   }
                   else
                   {
                       alert(data.message);
                   }
               });
           }
           return true;
        });
        return false;
    });
});
