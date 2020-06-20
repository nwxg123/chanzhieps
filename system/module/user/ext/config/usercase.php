<?php
$config->user->navGroups->desktop->user .= ',usercase,';
$config->user->navGroups->mobile->user  .= ',usercase,';
$config->user->relatedTables[TABLE_USERCASE][] = 'author';
