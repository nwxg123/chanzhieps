<?php
// Client module menu
$lang->client->menu = new stdclass();
$lang->client->menu->browse   = 'Updates List|client|browse|';
$lang->client->menu->create   = 'Check Update|client|checkUpgrade|';

$lang->client->common       = 'Client';
$lang->client->create       = 'Create client';
$lang->client->browse       = 'Browse updates';
$lang->client->edit         = 'Edit client update';
$lang->client->delete       = 'Delete client';
$lang->client->checkUpgrade = 'Check updates';

$lang->client->id              = 'ID';
$lang->client->version         = 'Version';
$lang->client->update          = 'Update';
$lang->client->xxcVersion      = 'XXC Version';
$lang->client->main            = 'Main Content';
$lang->client->createdDate     = 'Created Date';
$lang->client->desc            = 'Description';
$lang->client->see             = 'See';
$lang->client->changeLog       = 'Log';
$lang->client->strategy        = 'Strategy';
$lang->client->download        = 'Download';
$lang->client->downloading     = 'Downloading...';
$lang->client->downloadLink    = 'Download link';
$lang->client->downloadFail    = 'Download fail';
$lang->client->downloadSuccess = 'Download success';
$lang->client->releaseStatus   = 'Status';
$lang->client->wrongVersion    = '<strong>Version</strong> format is incorrect. Example：2.5 or 2.5.0';
$lang->client->downloadTip     = 'Please check the integrity of the package after downloading. If it is damaged, please upload it to the corresponding directory of www/data/client.';
$lang->client->versionError    = 'Update error';

$lang->client->saveClientError            = 'Cannot save update info data.';
$lang->client->downloadErrorTip           = 'Some packages download failed, please upload it to the corresponding directory of www/data/client.';
$lang->client->alreadyLastestVersion      = 'The current version is up to date';
$lang->client->cannotUseUpdateServer      = 'Unable to get official version information';
$lang->client->foundNewVersion            = 'Found new client version';
$lang->client->currentVersion             = 'Current version';
$lang->client->upgradeToThisVersion       = 'Upgrade to this version';
$lang->client->downloadClientPackages     = 'Select the installation package for the upgrade';
$lang->client->publishUpdate              = 'Publish this upgrade';
$lang->client->saveUpdate                 = 'Save this upgrade';
$lang->client->or                         = 'OR';

$lang->client->strategies['force']    = 'Force';
$lang->client->strategies['optional'] = 'Optional';

$lang->client->status['wait']     = 'Not release';
$lang->client->status['released'] = 'Released';

$lang->client->zipList['win64zip']   = 'Windows 64';
$lang->client->zipList['win32zip']   = 'Windows 32';
$lang->client->zipList['macOSzip']   = 'macOS';
$lang->client->zipList['linux64zip'] = 'Linux 64';
$lang->client->zipList['linux32zip'] = 'Linux 32';
