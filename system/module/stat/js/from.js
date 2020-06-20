$(document).ready(function()
{
    var options = { scaleShowLabels: true, scaleLabel: "<%=label%>",};
    if(v.pieCharts) piechart = $('#pieChart').pieChart(v.pieCharts.pv, options);
    $('#switchBar label').click(function()
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
    })
})
