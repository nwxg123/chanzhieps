<?php
$article = $this->getByID($articleID);
if($article->type != 'submission')
{
    $access  = fixer::input('post')->get('access');
    unset($_POST['access']);
    $this->loadModel('access')->saveObjectAccess($article->type, $articleID, $access);
}
