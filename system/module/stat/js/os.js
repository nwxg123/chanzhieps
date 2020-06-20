$(document).ready(function()
{
    $('#typeMenu [href*=' + v.type  + '] ').parent().addClass('active');
    var options = {segmentShowStroke : false, scaleLabelPlacement: "outside", scaleShowLabels: true, scaleLabel: "<%=label%>",};
    if(v.pieCharts) piechart = $('#pieChart').pieChart(v.pieCharts[v.state], options);
})
