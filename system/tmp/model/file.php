<?php
global $app;
helper::cd($app->getBasePath());
helper::import('D:\phpstudy_pro\WWW\chanzhieps\system\module\file\model.php');
helper::cd();
class extfileModel extends fileModel 
{
public function printFiles($files)
{
    return $this->loadExtension('video')->printFiles($files);
}


    public function edit($fileID)
    {
$access  = fixer::input('post')->get('access');
$this->loadModel('access')->saveObjectAccess('file', $fileID, $access);
unset($_POST['access']);


        $this->replaceFile($fileID);
        $fileInfo = fixer::input('post')
            ->remove('pathname')
            ->remove('upFile')
            ->get();
        if(!validater::checkFileName($fileInfo->title)) return false;
        $fileInfo->lang = 'all';
        $this->dao->update(TABLE_FILE)->data($fileInfo)->autoCheck()->batchCheck($this->config->file->require->edit, 'notempty')->where('id')->eq($fileID)->exec();
        $this->dao->setAutoLang(false)->update(TABLE_FILE)->data($fileInfo)->autoCheck()->batchCheck($this->config->file->require->edit, 'notempty')->where('id')->eq($fileID)->exec();
        return !dao::isError();
    }

//**//
}