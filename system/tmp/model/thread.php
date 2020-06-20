<?php
global $app;
helper::cd($app->getBasePath());
helper::import('D:\phpstudy_pro\WWW\chanzhieps\system\module\thread\model.php');
helper::cd();
class extthreadModel extends threadModel 
{
public function toAsk($threadID, $questionID)
{   
    return $this->loadExtension('csm')->toAsk($threadID, $questionID);
}

public function post($boardID)
{
    return $this->loadExtension('score')->post($boardID);
}

public function printSpeaker($speaker)
{
    return $this->loadExtension('score')->printSpeaker($speaker);
}


    public function update($threadID)
    {
$thread = $this->getByID($threadID);
$access = fixer::input('post')->get('access');
if($access['score'])$access['identity'] = 'user';
unset($_POST['access']);
$this->loadModel('access')->saveObjectAccess('thread', $threadID, $access);


        $thread      = $this->getByID($threadID);
        $isAdmin     = $this->app->user->admin == 'super';
        $canManage   = $this->canManage($thread->board);
        $allowedTags = $this->app->user->admin == 'super' ? $this->config->allowedTags->admin : $this->config->allowedTags->front;

        $thread = fixer::input('post')
            ->setIF(!$canManage, 'readonly', 0)
            ->setIF(!$this->post->isLink, 'link', '')
            ->setIF(!$this->post->discussion, 'discussion', 0)
            ->stripTags('content,link', $allowedTags)
            ->setForce('editor', $this->session->user->account)
            ->setForce('editedDate', helper::now())
            ->setDefault('readonly', 0)
            ->remove('files,labels, views, replies, stick, hidden')
            ->get();

        if(isset($this->config->site->filterSensitive) and $this->config->site->filterSensitive == 'open')
        {
            $dicts = !empty($this->config->site->sensitive) ? $this->config->site->sensitive : $this->config->sensitive;
            $dicts = explode(',', $dicts);
            if(!validater::checkSensitive($thread, $dicts)) return array('result' => 'fail', 'message' => $this->lang->error->sensitive);
        }

        $this->dao->update(TABLE_THREAD)
            ->data($thread, $skip = "{$this->session->captchaInput}, uid, isLink")
            ->autoCheck()
            ->batchCheckIF(!$this->post->isLink, $this->config->thread->require->edit, 'notempty')
            ->batchCheckIF($this->post->isLink, $this->config->thread->require->link, 'notempty')
            ->check($this->session->captchaInput, 'captcha')
            ->where('id')->eq($threadID)
            ->exec();

        $this->loadModel('file')->updateObjectID($this->post->uid, $threadID, 'thread');

        if(dao::isError()) return false;

        /* Upload file.*/
        $this->loadModel('file')->saveUpload('thread', $threadID);

        $thread = $this->getByID($threadID);
        if(empty($thread)) return false;
        return $this->loadModel('search')->save('thread', $thread);
    }

//**//
}