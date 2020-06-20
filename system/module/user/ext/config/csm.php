<?php
$config->user->navGroups->desktop->message = 'request,' . $config->user->navGroups->desktop->message;
$config->user->navGroups->mobile->message  = 'request,' . $config->user->navGroups->mobile->message;

$config->user->relatedTables[TABLE_ACTION][]   = 'actor';
$config->user->relatedTables[TABLE_REQUEST][]  = 'assignedTo';
$config->user->relatedTables[TABLE_REQUEST][]  = 'customer';
$config->user->relatedTables[TABLE_REQUEST][]  = 'repliedBy';
$config->user->relatedTables[TABLE_REQUEST][]  = 'closedBy';
$config->user->relatedTables[TABLE_SERVICE][]  = 'customer';
$config->user->relatedTables[TABLE_ANSWER][]   = 'account';
$config->user->relatedTables[TABLE_QUESTION][] = 'account';
