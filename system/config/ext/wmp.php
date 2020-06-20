<?php
$config->rights->guest['wmp']['wmplogin']       = 'wmplogin';
$config->rights->guest['wmp']['bindwechatuser'] = 'bindwechatuser';
$config->rights->guest['wmp']['skipbind']       = 'skipbind';
if(RUN_MODE == 'admin')
{
    $config->menus->open   .= ',setwmp';
    $config->menus->design .= ',wmp';
}
