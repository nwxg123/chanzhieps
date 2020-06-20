<?php
$product = $this->getByID($productID);
$access  = fixer::input('post')->get('access');
unset($_POST['access']);
$this->loadModel('access')->saveObjectAccess('product', $productID, $access);
