<?php
public function getSignedTime($account = '')
{
    return $this->loadExtension('xuanxuan')->getSignedTime($account);
}

public function formatUsers($users)
{
    return $this->loadExtension('xuanxuan')->formatUsers($users);
}

public function getUserByUserID($userID = 0)
{
    return $this->loadExtension('xuanxuan')->getUserByUserID($userID);
}

public function getUserList($status = '', $idList = array(), $idAsKey = true)
{
    return $this->loadExtension('xuanxuan')->getUserList($status, $idList, $idAsKey);
}

public function getMemberListByGID($gid = '')
{
    return $this->loadExtension('xuanxuan')->getMemberListByGID($gid);
}

public function formatChats($chats)
{
    return $this->loadExtension('xuanxuan')->formatChats($chats);
}

public function getExtensionList($userID)
{
    return $this->loadExtension('xuanxuan')->getExtensionList($userID);
}

public function downloadXXD($setting, $type)
{
    return $this->loadExtension('xuanxuan')->downloadXXD($setting, $type);
}

public function uploadFile($fileName, $path, $size, $time, $userID, $users, $chat)
{
    return $this->loadExtension('xuanxuan')->uploadFile($fileName, $path, $size, $time, $userID, $users, $chat);
}
