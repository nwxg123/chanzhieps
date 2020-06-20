<?php
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
