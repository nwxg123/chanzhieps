<?php
public function add($productID, $count)
{
    return $this->loadExtension('mall')->add($productID, $count);
}

public function getListByAccount($account = '')
{
    return $this->loadExtension('mall')->getListByAccount($account);
}

public function addInCookie($productID, $count)
{
    $this->loadExtension('mall')->addInCookie($productID, $count);
}

public function getListByCookie()
{
    return $this->loadExtension('mall')->getListByCookie();
}

public function deleteInCookie($id)
{
    $this->loadExtension('mall')->deleteInCookie($id);
}

public function mergeToDb()
{
    return $this->loadExtension('mall')->mergeToDb();
}
