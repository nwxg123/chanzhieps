<?php if(!defined("RUN_MODE")) die();?>
<?php if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>
<?php
$clientLang = $this->app->getClientLang();
css::import($jsRoot . 'datetimepicker/css/min.css');
js::import($jsRoot  . 'datetimepicker/js/min.js');
?>
<style>
.form-datecustom {position: absolute; left: 0px; z-index: 0; opacity: 0;}
</style>
<script>
$(function ()
{
    $.fn.fixedDate = function ()
    {
        return $(this).each(function ()
        {
            var $this = $(this).attr('autocomplete', 'off');

            if ($this.val() == '0000-00-00')
            {
                $this.focus(function ()
                {
                    if ($this.val() == '0000-00-00') $this.val('').datetimepicker('update');
                }).blur(function ()
                {
                    if ($this.val() == '') $this.val('0000-00-00')
                });
            }
        });
    };

    var options =
    {
        language: $('html').attr('lang'),
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1,
        format: 'yyyy-mm-dd hh:ii',
        startDate: '1970-1-1'
    };
    var dateOptions = $.extend({}, options, {minView: 2, format: 'yyyy-mm-dd' });
    var timeOptions = $.extend({}, options, {startView: 1, minView: 0, maxView: 1, format: 'hh:ii'});
    var customOptions = $.extend({}, options, {minView: 3,startView: 3, format: 'yyyy-mm', todayBtn: 0 });

    $('.datepicker-wrapper').click(function ()
    {
        $(this).find('.form-date, .form-datetime, .form-time').datetimepicker('show').focus();
    });

    window.datepickerOptions = options;
    $.fn.datepicker = function(setting)
    {
        return this.datetimepicker($.extend({}, dateOptions, setting));
    };
    $.fn.timepicker = function(setting)
    {
        return this.datetimepicker($.extend({}, timeOptions, setting));
    };
    $.fn.datecustompicker = function(setting)
    {
        return this.datetimepicker($.extend({}, customOptions, setting));
    };

    $.fn.datepickerAll = function()
    {
        this.find('.form-datetime').fixedDate().datetimepicker(options);
        this.find('.form-date').fixedDate().datepicker();
        this.find('.form-time').fixedDate().timepicker();
        this.find('.form-datecustom').fixedDate().datecustompicker();
        return this;
    };

    $('body').datepickerAll();

    $(document).on('click', '.btn i.icon-close', function()
    {
        window.location.href=($('.form-datecustom').attr('href') + "&searchWord=" + $('#searchWord').val())
    });

    $('.form-datecustom').datepicker().on('changeDate',function(ev)
    {
        window.location.href=($(this).attr('href') + "&date=" + $(this).val() + "&searchWord=" + $('#searchWord').val())
    });
});
</script>
