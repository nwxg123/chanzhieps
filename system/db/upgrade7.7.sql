UPDATE `eps_config` SET `section` = 'shortcuts',`key` = 'common' WHERE `owner` = 'system' AND `module` = 'common' AND `section` = 'menus' AND `key` = 'home';
alter table eps_product add stockWarning char(20) not null; 
delete from eps_widget;
-- DROP TABLE IF EXISTS `eps_action`;
CREATE TABLE IF NOT EXISTS `eps_action` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `objectType` varchar(30) NOT NULL default '',
  `objectID` mediumint(8) unsigned NOT NULL default '0',
  `actor` varchar(30) NOT NULL default '',
  `action` varchar(30) NOT NULL default '',
  `date` datetime NOT NULL,
  `comment` text NOT NULL,
  `extra` varchar(255) NOT NULL,
  `lang` char(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- DROP TABLE IF EXISTS `eps_faq`;
CREATE TABLE IF NOT EXISTS `eps_faq` (
  `id` mediumint(9) NOT NULL auto_increment,
  `product` mediumint(8) unsigned NOT NULL,
  `request` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `from` mediumint(8) NOT NULL,
  `views` smallint(5) unsigned NOT NULL,
  `addedtime` datetime NOT NULL,
  `lang` char(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- DROP TABLE IF EXISTS `eps_request`;
CREATE TABLE IF NOT EXISTS `eps_request` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `product` mediumint(8) unsigned NOT NULL,
  `category` mediumint(8) unsigned NOT NULL,
  `customer` char(30) NOT NULL,
  `assignedTo` char(30) NOT NULL,
  `pri` tinyint(3) unsigned default NULL,
  `title` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `status` varchar(30) NOT NULL,
  `addedDate` datetime NOT NULL,
  `viewedDate` datetime NOT NULL,
  `assignedDate` datetime NOT NULL,
  `repliedBy` char(30) NOT NULL,
  `repliedDate` datetime NOT NULL,
  `lastEditedDate` datetime NOT NULL,
  `closedDate` datetime NOT NULL,
  `closedBy` char(30) NOT NULL,
  `lang` char(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- DROP TABLE IF EXISTS `eps_service`;
CREATE TABLE IF NOT EXISTS `eps_service` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `customer` char(30) NOT NULL,
  `product` mediumint(8) NOT NULL,
  `endTime` date NOT NULL,
  `deleted` enum('0','1') NOT NULL default '0',
  `lang` char(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- DROP TABLE IF EXISTS `eps_answer`;
CREATE TABLE IF NOT EXISTS `eps_answer` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `question` mediumint(8) unsigned NOT NULL,
  `account` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `addedDate` datetime NOT NULL,
  `editedDate` datetime NOT NULL,
  `lang` char(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `question` (`question`),
  KEY `account` (`account`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
-- DROP TABLE IF EXISTS `eps_question`;
CREATE TABLE IF NOT EXISTS `eps_question` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `category` smallint(5) unsigned NOT NULL,
  `account` varchar(30) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `score` tinyint(3) unsigned NOT NULL,
  `comment` text NOT NULL,
  `status` varchar(30) NOT NULL,
  `addedDate` datetime NOT NULL,
  `closedDate` datetime NOT NULL,
  `views` smallint(5) unsigned NOT NULL,
  `answers` tinyint(3) unsigned NOT NULL,
  `bestAnswer` mediumint(8) unsigned NOT NULL,
  `lang` char(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`category`),
  KEY `account` (`account`),
  KEY `title` (`title`),
  KEY `score` (`score`),
  KEY `status` (`status`),
  KEY `answers` (`answers`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
ALTER TABLE `eps_user` ADD isCustomer tinyint(1) not null default 0;
CREATE TABLE IF NOT EXISTS `eps_usercase` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `industry` mediumint(8) unsigned NOT NULL,
  `area` varchar(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `company` varchar(150) NOT NULL,
  `site` varchar(255) NOT NULL,
  `keywords` varchar(150) NOT NULL, 
  `desc` text NOT NULL,
  `review` text NOT NULL,
  `author` varchar(30) NOT NULL,
  `addedDate` datetime NOT NULL,
  `snap` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `classical` tinyint(1) NOT NULL,
  `order` smallint(5) unsigned NOT NULL,
  `views` mediumint(8) unsigned NOT NULL,
  `reviewedDate` datetime NOT NULL,
  `lang` char(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order` (`order`),
  KEY `lang` (`lang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- DROP TABLE IF EXISTS `eps_access`;
CREATE TABLE IF NOT EXISTS `eps_access`(
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `objectType` char(20) NOT NULL,
  `objectID` mediumint(8) NOT NULL,
  `resource` char(30) NOT NULL,
  `level` char(30) NOT NULL,
  `cost` char(30) NOT NULL DEFAULT 0,
  `lang`  char(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lang` (`lang`),
  KEY `resource` (`objectType`,`objectID`, `resource`, `level`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

ALTER TABLE `eps_user` ADD `sect` char(20) NOT NULL AFTER `zipcode`;
ALTER TABLE `eps_article` Add `video` text NOT NULL AFTER `content`;
ALTER TABLE `eps_category` Add `extra` text NOT NULL;
ALTER TABLE `eps_user` ADD `idcard` char(18) NOT NULL AFTER `nickname`,
ADD `companySN` char(18) NOT NULL AFTER `company`,
ADD `mobileCertified` enum('0','1') not null default '0' AFTER `emailCertified`,
ADD `realnameCertified` enum('no','wait','fail','normal') NOT NULL DEFAULT 'no' AFTER `mobileCertified`,
ADD `companyCertified` enum('no','wait','fail','normal') not null default 'no' AFTER `realnameCertified`;

-- DROP TABLE IF EXISTS `eps_certify`;
CREATE TABLE `eps_certify` (
  `account` char(30) NOT NULL,
  `email` varchar(90) NOT NULL,
  `zentaoKey` char(32) NOT NULL,
  `sendcloudUser` varchar(255) NOT NULL,
  `sendcloudPwd` char(16) NOT NULL,
  `sendcloudKey` char(16) NOT NULL,
  `certify` varchar(20) NOT NULL,
  `total` smallint(6) NOT NULL,
  `send` smallint(6) NOT NULL,
  `addedTime` datetime NOT NULL,
  `certifyTime` datetime NOT NULL,
  `send2SC` enum('0','1') NOT NULL DEFAULT '0',
  `lang` char(30) NOT NULL,
  UNIQUE KEY `account` (`account`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- DROP TABLE IF EXISTS `eps_attribute`;
CREATE TABLE `eps_attribute` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `category` mediumint(8) NOT NULL DEFAULT 0,
  `code` char(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `inputType` char(30) NOT NULL,
  `search` char(30) NOT NULL,
  `values` TEXT NOT NULL,
  `default` TEXT NOT NULL,
  `sort` smallint(5) NOT NULL DEFAULT 0,
  `lang` char(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`category`),
  KEY `search` (`category`),
  KEY `lang` (`lang`),
  KEY `code` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `eps_product_attribute`;
CREATE TABLE `eps_product_attribute` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `product` mediumint(9) NOT NULL,
  `attribute` char(30) NOT NULL,
  `value` varchar(255) NOT NULL,
  `lang` char(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lang` (`lang`),
  KEY `value` (`value`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `eps_product_price`;
CREATE TABLE `eps_product_price` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `type` char(30) NOT NULL,
  `product` mediumint(9) NOT NULL,
  `attribute` char(30) NOT NULL,
  `value` varchar(255) NOT NULL,
  `price` decimal(10, 2) NOT NULL DEFAULT 0.00,
  `lang` char(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lang` (`lang`),
  KEY `attribute` (`attribute`),
  KEY `value` (`value`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `eps_order_api`;
CREATE TABLE `eps_order_api` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `action` char(30) NOT NULL,
  `url` text NOT NULL,
  `debug` enum('0','1') NOT NULL DEFAULT '0',
  `method` enum('get','post') NOT NULL DEFAULT 'get',
  `params` text NOT NULL,
  `lang` char(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lang` (`lang`),
  KEY `action` (`action`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `eps_balance_log`;
CREATE TABLE `eps_balance_log` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `account` char(30) NOT NULL,
  `tradeType` char(30) NOT NULL,
  `tradeID` mediumint(8) unsigned NOT NULL,
  `amount` decimal(12,2) NOT NULL DEFAULT '0.00',
  `createdDate` datetime NOT NULL,
  `lang` char(30) NOT NULL,
  `before` decimal(12,2) NOT NULL DEFAULT '0.00',
  `createdBy` char(30) NOT NULL,
  `status` char(30) NOT NULL,
  `after` decimal(12,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `account` (`account`),
  KEY `tradeType` (`tradeType`,`tradeID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

ALTER TABLE `eps_user` ADD balance varchar(100) NOT NULL default 0;
ALTER TABLE `eps_cart` ADD extra text NOT NULL;
ALTER TABLE `eps_order_product` ADD extra text NOT NULL;
ALTER TABLE `eps_order` ADD track TEXT NOT NULL AFTER waybill;
ALTER TABLE `eps_order` ADD cancelReason TEXT NOT NULL AFTER status;
ALTER TABLE `eps_order` CHANGE express express char(30) NOT NULL AFTER waybill;
ALTER TABLE `eps_product` add scoreLimit  mediumint(8) NOT NULL default 0;
ALTER TABLE `eps_product` add isGift tinyint(3) NOT NULL default 0;
ALTER TABLE `eps_product` add score mediumint(8) NOT NULL default 0;
ALTER TABLE `eps_product` add exchangeLimit  mediumint(8) NOT NULL default 0;
ALTER TABLE `eps_order` ADD `score` mediumint(8) unsigned NOT NULL AFTER `amount`;
ALTER TABLE `eps_order_product` ADD `score` mediumint(8) unsigned NOT NULL AFTER `price`;
-- DROP TABLE IF EXISTS `eps_form`;
CREATE TABLE IF NOT EXISTS `eps_form`(
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `type` varchar(30),
  `timeLimit` mediumint(8) unsigned NOT NULL,
  `endAmount` mediumint(8) unsigned NOT NULL,
  `endTime` datetime NOT NULL,
  `needLogin` enum('0', '1') NOT NULL DEFAULT '0',
  `ipUnique` enum('0', '1') NOT NULL DEFAULT '0',
  `fingerprint` enum('0', '1') NOT NULL DEFAULT '0',
  `viewAfterPost` enum('0', '1') NOT NULL DEFAULT '0',
  `fullScreen` enum('0', '1') NOT NULL DEFAULT '0',
  `desc` text NOT NULL,
  `status` enum ('draft', 'normal', 'finished') NOT NULL DEFAULT 'draft',
  `createdBy` varchar(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `editedBy` varchar(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  `finishedBy` varchar(30) NOT NULL,
  `finishedDate` datetime NOT NULL,
  `lang` char(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lang` (`lang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `eps_formitem`;
CREATE TABLE IF NOT EXISTS `eps_formitem`(
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `form` mediumint(8) unsigned NOT NULL,
  `title` text NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'common',
  `control` varchar(20) NOT NULL DEFAULT 'input',
  `display` varchar(10) NOT NULL,
  `format` varchar(10) NOT NULL,
  `optionType` enum('text', 'image') NOT NULL DEFAULT 'text',
  `rule` varchar(50) NOT NULL,
  `answer` text NOT NULL,
  `score` smallint(5) NOT NULL,
  `scoreRule` varchar(10) NOT NUll DEFAULT 'full',
  `order` smallint(5) NOT NULL,
  `desc` text NOT NULL,
  `createdBy` varchar(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `editedBy` varchar(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  `lang` char(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `form` (`form`),
  KEY `lang` (`lang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `eps_formoption`;
CREATE TABLE IF NOT EXISTS `eps_formoption`(
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `form` mediumint(8) unsigned NOT NULL,
  `item` mediumint(8) unsigned NOT NULL,
  `title` text NOT NULL,
  `order` smallint(5) NOT NULL,
  `createdBy` varchar(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `editedBy` varchar(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  `lang` char(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `form` (`form`),
  KEY `item` (`item`),
  KEY `lang` (`lang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `eps_formuser`;
CREATE TABLE IF NOT EXISTS `eps_formuser`(
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `form` mediumint(8) unsigned NOT NULL,
  `account` varchar(30) NOT NULL,
  `ip` varchar(30) NOT NULL, 
  `fingerprint` varchar(60) NOT NULL,
  `score` decimal(6, 2) NOT NULL,
  `createdDate` datetime NOT NULL,
  `desc` text NOT NULL,
  `lang` char(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `account` (`account`),
  KEY `ip` (`ip`),
  KEY `fingerprint` (`fingerprint`),
  KEY `lang` (`lang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `eps_formdata`;
CREATE TABLE IF NOT EXISTS `eps_formdata`(
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `form` mediumint(8) unsigned NOT NULL,
  `item` mediumint(8) unsigned NOT NULL,
  `user` mediumint(8) unsigned NOT NULL,
  `answer` text NOT NULL,
  `score` decimal(6, 2) NOT NULL,
  `lang` char(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE `form` (`form`, `item`, `user`),
  KEY `lang` (`lang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Insert data into `eps_block`;
INSERT INTO `eps_block` (`type`, `title`, `content`, `template`, `lang`) VALUES
('formList', '表单列表',  '{"limit":"7"}', 'default', 'zh-cn'),
('formList', '表单列表',  '{"limit":"7"}', 'mobile',  'zh-cn'),
('formList', 'Form List', '{"limit":"7"}', 'default', 'en'),
('formList', 'Form List', '{"limit":"7"}', 'mobile',  'en'),
('formList', '表單列表',  '{"limit":"7"}', 'default', 'zh-tw'),
('formList', '表單列表',  '{"limit":"7"}', 'mobile',  'zh-tw');
ALTER TABLE `eps_oauth` ADD `sessionKey` varchar(60) NOT NULL;
-- DROP TABLE IF EXISTS `eps_im_chat`;
CREATE TABLE IF NOT EXISTS `eps_im_chat` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `gid` char(40) NOT NULL DEFAULT '',
  `name` varchar(60) NOT NULL DEFAULT '',
  `type` varchar(20) NOT NULL DEFAULT 'group',
  `admins` varchar(255) NOT NULL DEFAULT '',
  `committers` varchar(255) NOT NULL DEFAULT '',
  `subject` mediumint(8) unsigned NOT NULL DEFAULT 0,
  `public` enum('0', '1') NOT NULL DEFAULT '0',
  `createdBy` varchar(30) NOT NULL DEFAULT '',
  `createdDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `editedBy` varchar(30) NOT NULL DEFAULT '',
  `editedDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastActiveTime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dismissDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lang` char(30) NOT NULL DEFAULT 'all',
  PRIMARY KEY (`id`),
  KEY `gid` (`gid`),
  KEY `name` (`name`),
  KEY `type` (`type`),
  KEY `public` (`public`),
  KEY `createdBy` (`createdBy`),
  KEY `editedBy` (`editedBy`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `eps_im_message`;
CREATE TABLE IF NOT EXISTS `eps_im_message` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `gid` char(40) NOT NULL DEFAULT '',
  `cgid` char(40) NOT NULL DEFAULT '',
  `user` varchar(30) NOT NULL DEFAULT '',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `order` bigint(8) unsigned NOT NULL,
  `type` enum('normal', 'broadcast', 'notify') NOT NULL DEFAULT 'normal',
  `content` text NOT NULL DEFAULT '',
  `contentType` enum('text', 'plain', 'emotion', 'image', 'file', 'object') NOT NULL DEFAULT 'text',
  `data` text NOT NULL DEFAULT '',
  `lang` char(30) NOT NULL DEFAULT 'all',
  PRIMARY KEY (`id`),
  KEY `mgid` (`gid`),
  KEY `mcgid` (`cgid`),
  KEY `muser` (`user`),
  KEY `mtype` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `eps_im_chatuser`;
CREATE TABLE IF NOT EXISTS `eps_im_chatuser` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `cgid` char(40) NOT NULL DEFAULT '',
  `user` mediumint(8) NOT NULL DEFAULT 0,
  `order` smallint(5) NOT NULL DEFAULT 0,
  `star` enum('0', '1') NOT NULL DEFAULT '0',
  `hide` enum('0', '1') NOT NULL DEFAULT '0',
  `mute` enum('0', '1') NOT NULL DEFAULT '0',
  `join` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `quit` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `category` varchar(40) NOT NULL DEFAULT '',
  `lang` char(30) NOT NULL DEFAULT 'all',
  PRIMARY KEY (`id`),
  KEY `cgid` (`cgid`),
  KEY `user` (`user`),
  KEY `order` (`order`),
  KEY `star` (`star`),
  KEY `hide` (`hide`),
  UNIQUE KEY `chatuser` (`cgid`, `user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `eps_im_messagestatus`;
CREATE TABLE IF NOT EXISTS `eps_im_messagestatus` (
  `user` mediumint(8) NOT NULL DEFAULT 0,
  `message` INT(11)  UNSIGNED  NOT NULL,
  `gid` char(40) NOT NULL DEFAULT '',
  `status` enum('waiting','sent','readed','deleted') NOT NULL DEFAULT 'waiting',
  `lang` char(30) NOT NULL DEFAULT 'all',
  UNIQUE KEY `user` (`user`,`gid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `eps_im_client`;
CREATE TABLE IF NOT EXISTS `eps_im_client` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `version` char(10) NOT NULL DEFAULT '',
  `desc` varchar(100) NOT NULL DEFAULT '',
  `changeLog` text NOT NULL,
  `strategy` varchar(10) NOT NULL DEFAULT '',
  `downloads` text NOT NULL,
  `createdDate` datetime NOT NULL,
  `createdBy` varchar(30) NOT NULL DEFAULT '',
  `editedDate` datetime NOT NULL,
  `editedBy` varchar(30) NOT NULL DEFAULT '',
  `status` enum('released','wait') NOT NULL DEFAULT 'wait',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

ALTER TABLE `eps_file` CHANGE `pathname` `pathname` char(100) NOT NULL;
ALTER TABLE `eps_user` ADD `clientStatus` enum('online', 'away', 'busy', 'offline') NOT NULL DEFAULT 'offline';
ALTER TABLE `eps_user` ADD `clientLang` varchar(10) NOT NULL DEFAULT 'zh-cn';
ALTER TABLE `eps_user` ADD `dept` mediumint(8) unsigned NOT NULL AFTER `id`;
ALTER TABLE `eps_user` ADD `token` char(32) NOT NULL AFTER `password`;
ALTER TABLE `eps_user` ADD `role` char(30) NOT NULL AFTER `password`;
ALTER TABLE `eps_user` ADD `deleted` enum('0', '1') NOT NULL DEFAULT '0' AFTER `clientStatus`;