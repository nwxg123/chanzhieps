<?php
public function buildQuestionIndex($lastID)
{
    return $this->loadExtension('csm')->buildQuestionIndex($lastID);
}

public function buildFaqIndex($lastID)
{
    return $this->loadExtension('csm')->buildFaqIndex($lastID);
}

public function processQuestionLink($record)
{
    return $this->loadExtension('csm')->processQuestionLink($record);
}

public function processFaqLink($record)
{
    return $this->loadExtension('csm')->processFaqLink($record);
}
