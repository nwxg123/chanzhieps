<?php
$navs = $lang->nav->types;
$lastNavs = array_slice($navs, -4);
array_pop($navs);
array_pop($navs);
array_pop($navs);
array_pop($navs);
$navs['video'] = '視頻類目';
$navs += $lastNavs;
$lang->nav->types = $navs;
