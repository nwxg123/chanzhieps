<?php
public function getOrderTitle($objectList)
{
    return $this->dao->select("concat('{$this->lang->order->common}', 'id')")->from(TABLE_ORDER)->where('id')->in($objectList)->fetchPairs('id', 'code');
}

public function getOriginal($messageID)
{
    return $this->loadExtension('mall')->getOriginal($messageID);
}

public function getOrderLink($message)
{
    return helper::createLink('order', 'view', "orderID=$message->objectID");
}


public function getAdminReplies($message)
{
    $this->loadExtension('mall')->getAdminReplies($message);
}

public function getFrontReplies($message, $type = '', $level = 0)
{
    $this->loadExtension('mall')->getFrontReplies($message, $type, $level);
}

public function getWaitCountOfOrder($orderID)
{
    return $this->loadExtension('mall')->getWaitCountOfOrder($orderID);
}

public function post($type, $block = '')
{
    return $this->loadExtension('mall')->post($type, $block);
}
