<?php
public function updateRank($account, $count)
{
    return $this->loadExtension('mall')->updateRank($account, $count);
}

public function computeUserLevel($rank, $option = 'name')
{
    return $this->loadExtension('mall')->computeUserLevel($rank, $option);
}

public function getUserLevel($account, $option = 'name')
{
    return $this->loadExtension('mall')->getUserLevel($account, $option);
}

public function isAbove($account, $level)
{
    return $this->loadExtension('mall')->isAbove($account, $level);
}
