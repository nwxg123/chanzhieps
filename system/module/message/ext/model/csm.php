<?php
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
