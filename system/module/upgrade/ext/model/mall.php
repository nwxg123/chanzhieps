<?php
public function execute($fromVersion)
{
    return $this->loadExtension('mall')->execute($fromVersion);
}

/**
 * Create the confirm contents.
 * 
 * @param  int    $fromVersion 
 * @param  string $fromVersion 
 * @access public
 * @return void
 */
public function getConfirm($fromVersion)
{
    return $this->loadExtension('mall')->getConfirm($fromVersion);
}

public function upgradeFreeToPro()
{
    return $this->loadExtension('mall')->upgradeFreeToPro();
}
