<?php
/**
 * Build user case index 
 * 
 * @param  int    $lastID 
 * @access public
 * @return array
 */
public function buildUsercaseIndex($lastID)
{
    $type = 'usercase';
    if(!commonModel::isAvailable($type))
    {
        if(isset($this->config->search->buildOrder[$type]))
        {
            $type = $this->config->search->buildOrder[$type];
            return call_user_func(array($this, "buildAllIndex"), $type, $lastID);
        }
        else
        {
            return array('finished' => true);
        }
    }

    $usercases = $this->dao->select('*')->from(TABLE_USERCASE)->beginIF($lastID)->where('id')->gt($lastID)->fi()->limit(100)->fetchAll('id');

    if(isset($this->config->search->buildOrder['usercase']) and is_callable(array($this, "build{$this->config->search->buildOrder['usercase']}Index")))
    {
        if(empty($usercases))
        {
            $type   = $this->config->search->buildOrder['usercase'];
            $lastID = 0;
        }
        else
        {
            foreach($usercases as $usercase)
            {
                $usercase->status = 'normal';
                $this->save('usercase', $usercase);
            }

            return array('type' => $type, 'count' => count($usercases), 'lastID' => max(array_keys($usercases)));
        }

        if($type == $this->config->search->buildOrder['usercase'])
        {
            return call_user_func(array($this, "buildAllIndex"), $type, $lastID);
        }
    }
    else
    {
        foreach($usercases as $usercase)
        {
            $usercase->status = 'normal';
            $this->save('usercase', $usercase);
        }

        return array('finished' => true);
    }
}

/**
 * Process user case link 
 * 
 * @param  object    $record 
 * @access public
 * @return void
 */
public function processUsercaseLink($record)
{
    $record->url = helper::createLink('usercase', 'view', "id=$record->objectID");
}
