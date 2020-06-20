$(document).ready(function()
{
  $(document).on('click', '.btn-plus', function(){
    $('.plus').append($(this).parent().parent().clone());  
  })
})
