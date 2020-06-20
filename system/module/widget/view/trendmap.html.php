<?php if(!defined("RUN_MODE")) die();?>
<?php
$this->loadModel('stat');

$lineChart = array();
$today              = date('Ymd');
$yesterday          = date('Ymd', strtotime('-1 day'));
$viewLabels         = $this->stat->getHourLabels($today, false);;
$todayLineChart     = $this->stat->getTypeLine('from', 'hour', $this->stat->getHourLabels($today));
$yesterdayLineChart = $this->stat->getTypeLine('from', 'hour', $this->stat->getHourLabels($yesterday));

if($todayLineChart)
{
    foreach($todayLineChart as $chart => $chartLine)
    {
        $lineChart[$chart][0] = new stdClass(); 
        foreach($chartLine as $chartData)
        {
            $lineChart[$chart][0]->data = array(); 
            foreach($chartData->data as $hour => $hourLabels)
            {
                !empty($lineChart[$chart][0]->data[$hour]) ? $lineChart[$chart][0]->data[$hour] += $hourLabels : $lineChart[$chart][0]->data[$hour] = $hourLabels; 
            }
        }
        $lineChart[$chart][0]->label = $this->lang->stat->today;
        $lineChart[$chart][0]->color = '#7580FF';
    }
}

if($yesterdayLineChart)
{
    foreach($yesterdayLineChart as $chart => $chartLine)
    {
        $lineChart[$chart][1] = new stdClass(); 
        foreach($chartLine as $chartData)
        {
            $lineChart[$chart][1]->data = array(); 
            foreach($chartData->data as $hour => $hourLabels)
            {
                !empty($lineChart[$chart][1]->data[$hour]) ? $lineChart[$chart][1]->data[$hour] += $hourLabels : $lineChart[$chart][1]->data[$hour] = $hourLabels; 
            }
        }
        $lineChart[$chart][1]->label = $this->lang->stat->yesterday;
        $lineChart[$chart][1]->color = '#00D4B6';
    }
}

foreach($viewLabels as $key => $label)
{
    $viewLabels[$key] = substr($label,0,-3);
}
?>
<?php js::set('lineLabels', $viewLabels);?>
<?php js::set('lineChart', $lineChart);?>
<style>
<?php if(!commonModel::isAvailable('stat')):?>
.widget-trendMap .panel-title {color:#ddd}
<?php endif;?>
.stat-main .panel {margin-bottom:15px}
.stat-main .panel-top .outline {line-height:13px}
.stat-main .panel-top .spot {height:8px;width:8px;border-radius:10px;background-color:#333;display:inline-block;margin-right:8px}
.stat-main .panel-top .outline + .outline {margin-top:10px}
#dashboard .stat-main .panel-body {overflow:unset;margin-top:34px}
.stat-main .chart-canvas {height:169px;line-height:169px}
</style>
<script>
$(document).ready(function()
{
    var data    = {labels: v.lineLabels, datasets: v.lineChart['pvChart']};
    var options = {multiTooltipTemplate: "<%= datasetLabel %> <%= value %>", datasetFill : false}
    lineChart   = $('#lineChart').lineChart(data, options);
    $('#switchBar li').click(function()
    {
        type = $(this).data('type');
        data = v.lineChart[type];
        $.each(data, function(lineID, line)
        {
          $.each(line.data, function(id, value)
          {
              lineChart.datasets[lineID].points[id].value = value;
              lineChart.datasets[lineID].label = line.label;
          });
        })
        lineChart.update();

        $('#switchBar li').removeClass('active');
        $(this).addClass('active');
        $('#switchBar a.btn').html($(this).find('a').html() + " <span class='icon-angle-down'></span>");
    })
})
</script>
<?php if(commonModel::isAvailable('stat')):?>
<div class='stat-main'>
  <div class='panel'>
    <div class='panel-heading'>
      <div class="dropdown pull-left" id="switchBar"><a href="###" data-toggle="dropdown" class="btn"><?php echo $lang->stat->pv;?> <span class="icon-angle-down"></span></a>
        <ul class="dropdown-menu">
          <li class='active' data-type='pvChart'><a href="javascript:;"><?php echo $lang->stat->pv;?></a></li>
          <li data-type='uvChart'><a href="javascript:;"><?php echo $lang->stat->uv;?></a></li>
          <li data-type='ipChart'><a href="javascript:;"><?php echo $lang->stat->ipCount;?></a></li>
        </ul>
      </div>
      <div class='panel-top pull-right'>
        <div class='outline'><span class='spot' style='background-color:#7580ff'></span><?php echo $this->lang->stat->today;?></div>
        <div class='outline'><span class='spot' style='background-color:#00d4b6'></span><?php echo $this->lang->stat->yesterday;?></div>
      </div>
    </div>
    <div class='panel-body'>
      <div class='chart-canvas'><canvas height='260' width='900' id='lineChart'></canvas></div>
    </div>
  </div>
</div>
<?php endif;?>
