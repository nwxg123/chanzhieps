<?php
global $app;
helper::cd($app->getBasePath());
helper::import('D:\phpstudy_pro\WWW\chanzhieps\system\module\score\model.php');
helper::cd();
class extscoreModel extends scoreModel 
{
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

public function getRecordByObject($objectType, $objectID, $account = '')
{
    return $this->loadExtension('score')->getRecordByObject($objectType, $objectID, $account);
}

public function checkSectNames()
{
    return $this->loadExtension('score')->checkSectNames();
}

public function updateSectNames()
{
    return $this->loadExtension('score')->updateSectNames();
}

public function updateLevel()
{
    return $this->loadExtension('score')->updateLevel();
}

public function checkLevel()
{
    return $this->loadExtension('score')->checkLevel();
}

public function getSectList()
{
    return $this->loadExtension('score')->getSectList();
}

public function getSectColor($sect)
{
    return $this->loadExtension('score')->getSectColor($sect);
}

public function getLevelsBySect($sect)
{
    return $this->loadExtension('score')->getLevelsBySect($sect);
}


//**//
}