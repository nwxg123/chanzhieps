<?php
public function getByID($id)
{
    return $this->loadExtension('xuanxuan')->getByID($id);
}

public function getListByAccountList($accountList)
{
    return $this->loadExtension('xuanxuan')->getListByAccountList($accountList);
}

public function registerGuest()
{
    return $this->loadExtension('xuanxuan')->registerGuest();
}

public function identify($account, $password)
{
    return $this->loadExtension('xuanxuan')->identify($account, $password);
}
