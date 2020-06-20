<?php
// Client module menu
$lang->client->menu = new stdclass();
$lang->client->menu->browse   = '版本更新列表|client|browse|';
$lang->client->menu->create   = '检查更新|client|checkUpgrade|';

$lang->client->common       = '客户端';
$lang->client->create       = '添加版本';
$lang->client->browse       = '版本更新列表';
$lang->client->edit         = '编辑客户端';
$lang->client->delete       = '删除客户端';
$lang->client->checkUpgrade = '检查更新';

$lang->client->id              = 'ID';
$lang->client->version         = '版本';
$lang->client->update          = '更新';
$lang->client->xxcVersion      = 'XXC版本';
$lang->client->main            = '重要更新内容';
$lang->client->createdDate     = '发布日期';
$lang->client->desc            = '升级描述';
$lang->client->see             = '查看';
$lang->client->changeLog       = '更新日志';
$lang->client->strategy        = '升级策略';
$lang->client->download        = '下载';
$lang->client->downloading     = '下载中...';
$lang->client->downloadLink    = '下载地址';
$lang->client->downloadFail    = '下载失败';
$lang->client->downloadSuccess = '下载成功';
$lang->client->releaseStatus   = '发布状态';
$lang->client->wrongVersion    = '<strong>版本</strong>格式不正确，例如：2.5 或者 2.5.0';
$lang->client->downloadTip     = '下载后请检查压缩包完整性，如果压缩包损坏，请使用其它工具下载后上传至 www/data/client 对应的目录下';
$lang->client->versionError    = '获取更新信息异常，请稍后再试，或者联系喧喧官方客服。';

$lang->client->saveClientError            = '无法保持更新信息。';
$lang->client->downloadErrorTip           = '部分安装包下载失败，请使用其它工具下载后上传至 www/data/client 对应的目录下。';
$lang->client->downloadFailedTip          = '无法下载安装包，请稍后重新尝试下载，或者使用其它工具下载后上传至 www/data/client 对应的目录下。';
$lang->client->alreadyLastestVersion      = '当前已是最新版本';
$lang->client->cannotUseUpdateServer      = '无法获取官方版本信息';
$lang->client->foundNewVersion            = '发现新版本客户端';
$lang->client->currentVersion             = '当前版本';
$lang->client->upgradeToThisVersion       = '升级到此版本';
$lang->client->downloadClientPackages     = '选择用于升级的安装包';
$lang->client->publishUpdate              = '立即发布更新';
$lang->client->saveUpdate                 = '仅保存更新';
$lang->client->selectUpgradeStrategy      = '选择升级策略';
$lang->client->or                         = '或';

$lang->client->strategies['force']    = '强制';
$lang->client->strategies['optional'] = '可选';

$lang->client->status['wait']     = '待发布';
$lang->client->status['released'] = '已发布';

$lang->client->zipList['win64zip']   = 'Windows 64位';
$lang->client->zipList['win32zip']   = 'Windows 32位';
$lang->client->zipList['macOSzip']   = 'macOS';
$lang->client->zipList['linux64zip'] = 'Linux 64位';
$lang->client->zipList['linux32zip'] = 'Linux 32位';
