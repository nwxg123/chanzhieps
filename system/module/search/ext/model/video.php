<?php
public function processVideoLink($record)
{
    if($record->objectType == 'video') $record->url = helper::createLink('video', 'view',  "id={$record->objectID}", "category={$record->params->category}&name={$record->params->alias}");
}
