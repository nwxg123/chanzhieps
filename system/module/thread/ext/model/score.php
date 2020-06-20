<?php
public function post($boardID)
{
    return $this->loadExtension('score')->post($boardID);
}

public function printSpeaker($speaker)
{
    return $this->loadExtension('score')->printSpeaker($speaker);
}
