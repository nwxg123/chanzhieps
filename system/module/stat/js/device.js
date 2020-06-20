$(document).ready(function()
{
    $('#typeMenu [href*=' + v.type  + '] ').parent().addClass('active');
    var options = {scaleLabelPlacement: "outside", scaleLineHeight: 10, scaleShowLabels: true, scaleLabel: "<%=label%> \: <%=value%>",};
    if(v.pieCharts) piechart = $('#pieChart').pieChart(v.pieCharts.pv, options);
    $('#switchBar li').click(function()
    {
        type = $(this).data('type');
        $('#switchBar .active').removeClass('active');
        $(this).addClass('active');
        data = v.pieCharts[type];
        $.each(data, function(pieID, chart)
        {
            piechart.segments[pieID].value = chart.value;
        })
        piechart.update();

        if(type == 'ip') type = 'ipCount';
        $('#switchBar a.btn').html(v.statLang[type] + " <span class='icon-angle-down'></span>");
    })
})
