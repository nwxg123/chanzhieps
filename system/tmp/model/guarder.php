<?php
global $app;
helper::cd($app->getBasePath());
helper::import('D:\phpstudy_pro\WWW\chanzhieps\system\module\guarder\model.php');
helper::cd();
class extguarderModel extends guarderModel 
{
public function processURL($url)
{
    return $this->loadExtension('video')->processURL($url);
}


//**//
}