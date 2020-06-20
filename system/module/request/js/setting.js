$().ready(function()
{
    $.setAjaxLoader('.nav-category a', '.row-main .col-md-10');
    $.setAjaxForm('#childForm', function(resuponse)
    {
        if(response.result == 'success') return false;
    });

    $(document).on('click', '.btn-plus', function()
    {
        $(this).parents('.form-group').after($('.child').html());
    })

    $(document).on('click', '.btn-remove', function()
    {
        if($(this).parents('#childForm').find('.form-group').not('.hide .form-group').find(':input[value=new]').size() == 1)
        {
            $(this).parents('.form-group').find('input').not('input[type=hidden]').val('');
            return false;
        }
        $(this).parents('.form-group').remove();
    })
    
    if(v.menuGroup != 'setting')
    {
      $('#mainNavbarCollapse .active').removeClass('active');
      $('#mainNavbarCollapse').find('[href*="f=setting"]').parent().addClass('active');
    }
});
