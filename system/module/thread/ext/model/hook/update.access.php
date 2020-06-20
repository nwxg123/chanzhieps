<?php
$thread = $this->getByID($threadID);
$access = fixer::input('post')->get('access');
if($access['score'])$access['identity'] = 'user';
unset($_POST['access']);
$this->loadModel('access')->saveObjectAccess('thread', $threadID, $access);
