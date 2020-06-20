$(document).ready(function()
{
    $('#typeMenu [href*=' + v.type  + '] ').parent().addClass('active');
    var options = {segmentShowStroke : false, scaleLabelPlacement: 'outside', scaleShowLabels: true, scaleLabel: '<%=label%>', responsive: true, animateRotate: false};
    if(v.pieCharts) piechart = $('#pieChart').pieChart(v.pieCharts[v.state], options);
})
