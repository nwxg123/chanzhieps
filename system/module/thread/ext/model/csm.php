<?php
public function toAsk($threadID, $questionID)
{   
    return $this->loadExtension('csm')->toAsk($threadID, $questionID);
}
