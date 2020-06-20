$(document).ready(function()
{
    var data    = {labels: v.lineLabels, datasets: v.lineChart};
    var options = {multiTooltipTemplate: "<%= datasetLabel %> <%= value %>", datasetFill : false}
    setTimeout(function(){$('#lineChart').lineChart(data, options);}, 200);
})
