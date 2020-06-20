<?php
public function getCustomerList($orderBy = 'id_desc', $pager = null, $user = '', $provider = '')
{
    return $this->loadExtension('csm')->getCustomerList($orderBy, $pager, $user, $provider);
}
