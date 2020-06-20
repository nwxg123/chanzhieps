<?php
public function getPairs($categories = 0, $orderBy = '`order`', $pager = NULL)
{
    return $this->loadExtension('csm')->getPairs($categories, $orderBy, $pager);
}
