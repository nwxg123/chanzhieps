<?php if(!defined("RUN_MODE")) die();?>
<?php
$config->stat = new stdclass();

$config->stat->searchEngines = array();
$config->stat->searchEngines[] = 'haosou';
$config->stat->searchEngines[] = 'bing';
$config->stat->searchEngines[] = 'sogou';
$config->stat->searchEngines[] = 'other';

$config->stat->hourLabels  = array('00', '01', '02', '03', '04', '05', '06', '07', '08', '09', 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23);
$config->stat->monthLabels = array('00', '01', '02', '03', '04', '05', '06', '07', '08', '09', 10, 11, 12);

$config->stat->chartColors = array('#7580FF', '#00D4B6', '#FF9E35', '#FBCD00', '#B6ED7B', '#74A1CA', '#79B1E6', '#93C2EF', '#A7CFF7', '#BDDCF5', '#CE00FF', '#E2FF00', '#00FFF5', '#FF00C6', '#93A04B', '#4B8880', '#FFEBEE', '#E4FF50', '#F00', '#FF0074', '#FF00DE', '#DA00FF', '#AB00FF', '#7000FF', '#2900FF', '#0041FF', '#0087FF', '#00B6FF', '#00E5FF', '#00FFD2', '#00FF97', '#00FF45', '#02FF00', '#6CFF00', '#BEFF00', '#F9FF00', '#FFA700', '#FF5400', '#FF0000');

$config->stat->maxDays = 60;
