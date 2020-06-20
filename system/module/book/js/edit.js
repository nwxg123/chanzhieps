$(document).ready(function()
{
    $('select#book').change(function()
    {
        var bookID = $(this).val();
        $.get(createLink('book', 'ajaxGetModules', 'bookID=' + bookID + '&nodeID=' + v.nodeID), function(data)
        {
            $('#parentBox').html(data);
            $('#parent').val(v.nodeParent).chosen(defaultChosenOptions);
        })
    });

    $('#isLink').change(function()
    {   
        if($('#isLink').prop('checked'))
        {   
            $('tr#isLinked').hide();
            $('#trlink').show();
        }   
        else
        {   
            $('tr#isLinked').show();
            $('#trlink').hide();
        }
    }); 

    $('#isLink').change();

    $("input[name='status']").change(function()
    {
        if($("input[name='status']:checked").val() == 'normal')
        {
            $('.datetime-picker th').removeClass('draft-selected');
            $('#addedDate').removeAttr('disabled').removeClass('draft-selected');
        }
        else
        {
            $('.datetime-picker th').addClass('draft-selected');
            $('#addedDate').attr('disabled', true).addClass('draft-selected');
        }
    });

    $("input[name='status']").change();
});
