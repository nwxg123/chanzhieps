<?php
public function getLevelList()
{
    return $this->loadExtension('mall')->getLevelList();
}
public function getLevelStandard()
{
    return $this->loadExtension('mall')->getLevelStandard();
}
public function earn($method, $objectType = '', $objectID = '', $note = '', $account = '', $amount = 0)
{
    return $this->loadExtension('mall')->earn($method, $objectType, $objectID, $note, $account, $amount);
}
public function isAbove($level, $comparedTo)
{
    return $this->loadExtension('mall')->isAbove($level, $comparedTo);
}
