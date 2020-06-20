<?php
public function create($type)
{
    return $this->loadExtension('score')->create($type);
}
