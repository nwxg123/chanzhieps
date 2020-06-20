<?php
public function getList($categories, $orderBy, $pager = null, $image = false, $params = array()) 
{
    return $this->loadExtension('mall')->getList($categories, $orderBy, $pager, $image, $params);   
}

public function getPrices($productID)
{
    return $this->loadExtension('mall')->getPrices($productID);
}

public function setPrice($product)
{
    return $this->loadExtension('mall')->setPrice($product);
}

public function create()
{
    return $this->loadExtension('mall')->create();
}

public function update($productID)
{
    return $this->loadExtension('mall')->update($productID);
}

public function getAttributes($productID)
{
    return $this->loadExtension('mall')->getAttributes($productID);
}

public function printAttributes($product)
{
    $this->loadExtension('mall')->printAttributes($product);
}

public function getPriceByAttr($product, $extra)
{
    return $this->loadExtension('mall')->getPriceByAttr($product, $extra);
}

public function checkDiscount()
{
    return $this->loadExtension('mall')->checkDiscount();
}

public function setDiscount()
{
    return $this->loadExtension('mall')->setDiscount();
}

public function getDiscount($levelCode='all')
{
    return $this->loadExtension('mall')->getDiscount($levelCode);
}

public function getUserPrivilege($productID, $levelCode='all')
{
    return $this->loadExtension('mall')->getUserPrivilege($productID, $levelCode);
}

public function computePrice($product)
{
    return $this->loadExtension('mall')->computePrice($product);
}

public function computeUserDiscount($account = null)
{
    return $this->loadExtension('mall')->computeUserDiscount($account);
}

public function saveSetting()
{
    return $this->loadExtension('mall')->saveSetting();
}
