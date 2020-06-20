$(document).ready(function()
{
    function allGrey()
    {
        $('.ulGrade1').find('select').css({'background-color': '#f5f5f5'});
    }
    allGrey();
    $(document).on('click', '.ulGrade1 select', function()
    {
        allGrey();
        $(this).css({'background-color': '#ffffff'})
    })
    $(document).on('blur', '.ulGrade1 select', function()
    {
        $(this).css({'background-color': '#f5f5f5'})
    })
    $(document).on('mousedown', '.options', function(){$('#submitBox .hidden').removeClass('hidden');});
    $(document).on('mouseover', '#navList li', function()
    {
        if($(this).find('.opacity').size() == 0) $(this).find('.showBox .options:first').addClass('opacity');
    });
    $(document).on('mouseout', '#navList li', function(){$(this).find('.opacity').removeClass('opacity')});

    var fixForm = function()
    {
        $('#navList').sortable({trigger: '.sort-handle-1', selector: 'li', dragCssClass: ''});
        $('#navList .ulGrade2').sortable({trigger: '.sort-handle-2', selector: 'li', dragCssClass: ''});
        $('#navList .ulGrade3').sortable({trigger: '.sort-handle-3', selector: 'li', dragCssClass: ''});
    }

    fixForm();

    /* add grade1 memu options */
    $(document).on('click', '.edit', function()
    {
        $(this).closest('li').find('.showBox:first').addClass('hide');
        $(this).closest('li').find('.editBox:first').removeClass('hide');
        $(this).closest('li').addClass('editing');
        fixForm();
    });
    $(document).on('click', '.plus1', function()
    {
        $(this).closest('li').after($('#grade1NavSource').html());
        fixForm();
    });

    /* add grade2 memu options */
    $(document).on('click', '.plus2', function()
    {
        $(this).closest('li').find(".ulGrade3").each(function ()
        {
            if($(this).parent().children('.icon-folder-open').length === 0)
            {
                $(this).hide();
            }
        });

        var container = $(this).closest('.liGrade2');
        if(0 == container.size())
        {
            $(this).closest('.liGrade1').find('.ulGrade2').show().prepend($('#grade2NavSource ul').html());
            $(this).closest('.liGrade1').find("select[name='nav[1][hover][]']").removeClass('hide');
        }
        else
        {
            $(this).closest('li').after($('#grade2NavSource ul').html());
        }

        if($(this).closest('li').find('ul li').size())
        {
            $(this).closest('li').children('.shut').removeClass('icon-folder').addClass('icon-folder-open');
        }

        fixForm();
    });

    /* add grade3 memu options */
    $(document).on('click', '.plus3', function()
    {
        var container = $(this).closest('.liGrade3');
        if(0 == container.size())
        {
            $(this).closest('.liGrade2').find('.ulGrade3').show().prepend($('#grade3NavSource ul').html());
        }
        else
        {
            $(this).closest('li').after($('#grade3NavSource ul').html());
        }

        if($(this).closest('li').find('ul li').size())
        {
            $(this).closest('li').children('.shut').removeClass('icon-folder').addClass('icon-folder-open');
        }

        fixForm();
    });

    /* toggle children nav. */
    $(document).on('click', '.shut', function()
    {
        $(this).closest('li').find("ul").toggle();
        if($(this).closest('li').find('ul li').size() != 0)
        $(this).toggleClass('icon-folder').toggleClass('icon-folder-open');
    });

    /* delete nav. */
    $(document).on('click', '.delete', function()
    {
        var navCount = $(this).closest('li').is('.liGrade1') && $('.navList .liGrade1').size();
        var navGrade2Count = $(this).closest('li').is('.liGrade2') && $(this).closest('.ulGrade2').find('.liGrade2').size();

        if(navCount == 1)
        {
            bootbox.alert(v.cannotRemoveAll);
        }
        else
        {
            if(navGrade2Count == 1)
            {
                $(this).closest('.liGrade1').find("select[name='nav[1][hover][]']").addClass('hide');
                $(this).closest('.liGrade1').find('.icon-circle-solid, .shut').toggle();
            }
            $(this).closest('li').remove();
        }
    });

    /* toggle articl common selector.*/
    $(document).on('change', '.navType', function() 
    {
        type  = $(this).val();
        grade = $(this).attr('grade');

        if(type != 'custom')
        {
            $(this).parent().children('.urlInput').hide();
            $(this).parent().children('.navSelector').hide();
            $(this).parent().children('.navSelector[name*='+type+']').removeClass('hide').show().change();
        }
        else
        {
            $(this).parent().children(':input[type=text]').val('');
            $(this).parent().children('.navSelector').hide();
            $(this).parent().children('.urlInput').removeClass('hide').show(); 
        }
    });

    /* set default nav title when selector changed. */
    $(document).on('change', '.navSelector', function()
    { 
        categories = $(this).find(':selected').text().split('/');
        if(!categories.length) return false;
        $(this).parent().children('.titleInput').val( categories[categories.length-1] );
    });
    
    $.setAjaxForm('#navForm', function(response)
    {
        if(response.result == 'success')
        {
            setTimeout(location.reload(), 1200);
        }
    });

    if(v.type == 'mobile_bottom') $('.plus2, .plus3').hide();
});

/**
 * Group navs and submit form
 *
 * @return void 
 */
function submitForm()
{
    $('.navList .grade1key').each(function(index,obj) { $(this).val(index); });
    $('.navList .grade2key').each(function(index){ $(this).val(1000+(parseInt(index))); })
    $('.navList .grade2parent').each(function(index){ $(this).val( $(this).closest('.liGrade1').find('.grade1key').val()); });
    $('.navList .grade3parent').each(function(i){ p = $(this).closest('.liGrade2').find('.grade2key').val(); $(this).val(p); });
    $('#navForm').submit();
}
