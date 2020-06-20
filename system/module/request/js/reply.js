$('#faq').change(function()
{
    if($(this).val() == 0) return false;
    answer = v.answers[$(this).val()];
    $('#reply').val(answer);
    keEditor.html(answer);
})
