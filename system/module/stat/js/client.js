$(document).ready(function()
{
    $('#typeMenu [href*=' + v.type  + '] ').parent().addClass('active');
    var options = {scaleShowLabels: true, scaleLabel: "<%=label%> \: <%=value%>", responsive: true};
    if(v.pieCharts)
    {
        var chart = $('#pieChart').pieChart(v.pieCharts.pv, options);
        $('#switchBar label').click(function()
        {
            var type = $(this).data('type');
            $('#switchBar .active').removeClass('active');
            $(this).addClass('active');
            var newData = v.pieCharts[type];
            if(newData)
            {
                for(var i = 0; i < newData.length; ++i)
                {
                    chart.segments[i].value = newData[i].value;
                }
            }
            chart.update();
        });
    }
});
