<?php if(!defined("RUN_MODE")) die();?>
<?php $type = strtolower($widget->type);?>
<?php
if(file_exists("./{$type}.html.php")) 
{
    include "./$type.html.php";
}
elseif(file_exists("../../view/{$type}.html.php"))
{
    include "../../view/$type.html.php";
}
?>
