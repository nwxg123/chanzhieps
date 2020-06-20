<?php
public function getByID($articleID, $replaceTag = true)
{
    return $this->loadExtension('video')->getByID($articleID, $replaceTag);
}

public function getList($type, $categories, $orderBy, $pager = null, $limit = 0)
{
    return $this->loadExtension('video')->getList($type, $categories, $orderBy, $pager, $limit);
}

public function update($articleID, $type = 'article')
{
    return $this->loadExtension('video')->update($articleID, $type);
}

