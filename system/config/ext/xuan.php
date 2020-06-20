<?php
/* Menu. */
if(RUN_MODE == 'admin')
{
    $config->menus->open .= ',staff';

    $config->menuGroups->staff = 'open';
    $config->menuGroups->server= 'open';
}

/* Rights. */
$config->rights->guest['chat']['create']            = 'create';
$config->rights->guest['chat']['registercomponent'] = 'registerComponent';
