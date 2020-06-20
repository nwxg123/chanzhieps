<?php
global $app;
helper::cd($app->getBasePath());
helper::import('D:\phpstudy_pro\WWW\chanzhieps\system\module\article\model.php');
helper::cd();
class extarticleModel extends articleModel 
{
public function create($type)
{
    return $this->loadExtension('score')->create($type);
}

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
$article = $this->getByID($articleID);
if($article->type != 'submission')
{
    $access  = fixer::input('post')->get('access');
    unset($_POST['access']);
    $this->loadModel('access')->saveObjectAccess($article->type, $articleID, $access);
}


    return $this->loadExtension('video')->update($articleID, $type);
}


//**//
}