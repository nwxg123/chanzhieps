<?php
public function saveAttribute($category)
{
    return $this->loadExtension('mall')->saveAttribute($category);
}

public function getAttributesByID($category)
{
    return $this->loadExtension('mall')->getAttributesByID($category);
}

public function getAttributeNav()
{
    return $this->loadExtension('mall')->getAttributeNav();
}
