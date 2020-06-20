<?php
public function getList($type = 'all', $mode, $value, $orderBy = 'id_desc', $pager = null)
{
    return $this->loadExtension('mall')->getList($type, $mode, $value, $orderBy, $pager);
}

public function getPostedProducts($product, $count = 0)
{
    return $this->loadExtension('mall')->getPostedProducts($product, $count);
}

public function create()
{
    return $this->loadExtension('mall')->create();
}

public function cancel($orderID)
{
    return $this->loadExtension('mall')->cancel($orderID);
}

public function processOrder($order)
{
    if($order->payStatus == 'paid') return true;
    $this->loadExtension('mall')->processOrder($order);
    if(is_callable(array($this, "process{$order->type}Order"))) call_user_func(array($this, "process{$order->type}Order"), $order);
    return true;
}

public function delivery($orderID)
{
    return $this->loadExtension('mall')->delivery($orderID);
}

public function printActions($order, $btnLink = false, $source = '')
{
    $this->loadExtension('mall')->printActions($order, $btnLink, $source);
    if(is_callable(array($this, "print{$order->type}Actions"))) call_user_func(array($this, "print{$order->type}Actions"), $order, $btnLink, $source);
}

public function printShopActions($order, $btnLink = false, $source = '')
{
    $this->loadExtension('mall')->printShopActions($order, $btnLink, $source);
}

public function printScoreActions($order, $btnLink = false)
{
    $this->loadExtension('mall')->printScoreActions($order, $btnLink);
}

public function printRechargeActions($order, $btnLink = false)
{
    $this->loadExtension('mall')->printRechargeActions($order, $btnLink);
}

public function editPrice($orderID)
{
    return $this->loadExtension('mall')->editPrice($orderID);
}

public function getApiByID($id)
{
    return $this->loadExtension('mall')->getApiByID($id);
}

public function getApiList($orderBy = 'id_desc', $pager = null)
{
    return $this->loadExtension('mall')->getApiList($orderBy, $pager);
}

public function getApiListByAction($action)
{
    return $this->loadExtension('mall')->getApiListByAction($action);
}

public function createApi()
{
    return $this->loadExtension('mall')->createApi();
}

public function updateApi($apiID)
{
    return $this->loadExtension('mall')->updateApi($apiID);
}

public function notice($action, $order)
{
    return $this->loadExtension('mall')->notice($action, $order);
}

public function processRechargeOrder($order)
{
    return $this->loadExtension('mall')->processRechargeOrder($order);
}

public function edit($orderID)
{
    return $this->loadExtension('mall')->edit($orderID);
}

public function expressInfo($order = '')
{
    return $this->loadExtension('mall')->expressInfo($order);
}
public function printScoreGoods($order)
{
    return $this->loadExtension('mall')->printScoreGoods($order);
}

public function saveSetting()
{
    return $this->loadExtension('mall')->saveSetting();
}

public function createAlipayLink($order, $type = '')
{
    return $this->loadExtension('mall')->createAlipayLink($order, $type);
}
