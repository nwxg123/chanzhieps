<?php
$access  = fixer::input('post')->get('access');
$this->loadModel('access')->saveObjectAccess('file', $fileID, $access);
unset($_POST['access']);
