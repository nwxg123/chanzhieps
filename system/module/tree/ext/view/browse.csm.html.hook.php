<?php if(strpos($type, 'request') !== false):?>
<script>
$().ready(function()
{
    $('#mainNavbar ul.nav li').removeClass('active');
    $('#mainNavbar ul.nav li a[href*=request][href*=setting]').parent('li').addClass('active');
});
</script>
<?php endif;?>
