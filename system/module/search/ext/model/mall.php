<?php
public function getList($keywords, $pager, $objectType = '', $objectID = '')
{
    return $this->loadExtension('mall')->getList($keywords, $pager, $objectType, $objectID);
}

public function buildProductIndex($lastID)
{
    return $this->loadExtension('mall')->buildProductIndex($lastID);
}
