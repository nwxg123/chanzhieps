<?php
/* Set the error reporting. */
error_reporting(E_ALL);

/* Start output buffer. */
ob_start();

/* Define the run mode. */
if(strpos($_SERVER['HTTP_USER_AGENT'], 'easysoft/xuan.im') !== false)
{
    define('RUN_MODE', 'xuanxuan');
}
else
{
    define('RUN_MODE', 'front');
}

/* Load the framework. */
include 'xuanxuanloader.php';

/* Log the time and define the run mode. */
$startTime = getTime();

/* Run the app. */
$app = router::createApp('chanzhi', $systemRoot, 'xuanxuan');

$app->loadCommon();
$app->parseRequest();
$app->loadModule();

/* Flush the buffer. */
echo helper::removeUTF8Bom(ob_get_clean());
