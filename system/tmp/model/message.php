<?php
global $app;
helper::cd($app->getBasePath());
helper::import('D:\phpstudy_pro\WWW\chanzhieps\system\module\message\model.php');
helper::cd();
class extmessageModel extends messageModel 
{
/**
 * Get answer by idList
 * 
 * @param  string    $objectList 
 * @access public
 * @return object
 */
public function getanswerTitle($objectList)
{
    return $this->dao->select('t1.id, t1.question,t2.title')->from(TABLE_ANSWER)->alias('t1')
        ->leftJoin(TABLE_QUESTION)->alias('t2')->on('t1.question=t2.id')
        ->where('t1.id')->in($objectList)->fetchPairs('id', 'title');
}

/**
 * Get answer link 
 * 
 * @param  object    $message 
 * @access public
 * @return string
 */
public function getAnswerLink($message)
{
    $questionID = $this->dao->select('question')->from(TABLE_ANSWER)->where('id')->eq($message->objectID)->fetch('question');
    return commonModel::createFrontLink('ask', 'view', "id=$questionID");
}

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

/**
 * Get user case by idList 
 * 
 * @param  string    $objectList 
 * @access public
 * @return object
 */
public function getUsercaseTitle($objectList)
{
    return $this->dao->select('id,company')->from(TABLE_USERCASE)->where('id')->in($objectList)->fetchPairs('id', 'company');
}

/**
 * Get user case link 
 * 
 * @param  object    $message 
 * @access public
 * @return string
 */
public function getUsercaseLink($message)
{
    $id = $this->dao->select('id')->from(TABLE_USERCASE)->where('id')->eq($message->objectID)->fetch('id');
    return commonModel::createFrontLink('usercase', 'view', "id=$id");
}


//**//
}