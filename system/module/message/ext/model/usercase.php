<?php
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
