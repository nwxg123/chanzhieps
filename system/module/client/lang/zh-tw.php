<?php
// Client module menu
$lang->client->menu = new stdclass();
$lang->client->menu->browse   = '版本更新列表|client|browse|';
$lang->client->menu->create   = '檢查更新|client|checkUpgrade|';

$lang->client->common       = '客戶端';
$lang->client->create       = '添加版本';
$lang->client->browse       = '版本更新列表';
$lang->client->edit         = '編輯客戶端';
$lang->client->delete       = '刪除客戶端';
$lang->client->checkUpgrade = '檢查更新';

$lang->client->id              = 'ID';
$lang->client->version         = '版本';
$lang->client->update          = '更新';
$lang->client->xxcVersion      = 'XXC版本';
$lang->client->main            = '重要更新內容';
$lang->client->createdDate     = '發佈日期';
$lang->client->desc            = '升級描述';
$lang->client->see             = '查看';
$lang->client->changeLog       = '更新日誌';
$lang->client->strategy        = '升級策略';
$lang->client->download        = '下載';
$lang->client->downloading     = '下載中...';
$lang->client->downloadLink    = '下載地址';
$lang->client->downloadFail    = '下載失敗';
$lang->client->downloadSuccess = '下載成功';
$lang->client->releaseStatus   = '發佈狀態';
$lang->client->wrongVersion    = '<strong>版本</strong>格式不正確，例如：2.5 或者 2.5.0';
$lang->client->downloadTip     = '下載後請檢查壓縮包完整性，如果壓縮包損壞，請使用其它工具下載後上傳至 www/data/client 對應的目錄下';
$lang->client->versionError    = '獲取更新信息異常，請稍後再試，或者聯繫喧喧官方客服。';

$lang->client->saveClientError            = '無法保持更新信息。';
$lang->client->downloadErrorTip           = '部分安裝包下載失敗，請使用其它工具下載後上傳至 www/data/client 對應的目錄下。';
$lang->client->downloadFailedTip          = '無法下載安裝包，請稍後重新嘗試下載，或者使用其它工具下載後上傳至 www/data/client 對應的目錄下。';
$lang->client->alreadyLastestVersion      = '當前已是最新版本';
$lang->client->cannotUseUpdateServer      = '無法獲取官方版本信息';
$lang->client->foundNewVersion            = '發現新版本客戶端';
$lang->client->currentVersion             = '當前版本';
$lang->client->upgradeToThisVersion       = '升級到此版本';
$lang->client->downloadClientPackages     = '選擇用於升級的安裝包';
$lang->client->publishUpdate              = '立即發佈更新';
$lang->client->saveUpdate                 = '僅保存更新';
$lang->client->selectUpgradeStrategy      = '選擇升級策略';
$lang->client->or                         = '或';

$lang->client->strategies['force']    = '強制';
$lang->client->strategies['optional'] = '可選';

$lang->client->status['wait']     = '待發佈';
$lang->client->status['released'] = '已發佈';

$lang->client->zipList['win64zip']   = 'Windows 64位';
$lang->client->zipList['win32zip']   = 'Windows 32位';
$lang->client->zipList['macOSzip']   = 'macOS';
$lang->client->zipList['linux64zip'] = 'Linux 64位';
$lang->client->zipList['linux32zip'] = 'Linux 32位';
