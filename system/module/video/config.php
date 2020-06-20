<?php
if(!isset($config->video)) $config->video = new stdclass();
/* Set the recPerPage of video. */
$config->video->recPerPage = 5;
$config->video->width  = 640;
$config->video->height = 360;
