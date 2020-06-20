ALTER TABLE `eps_product_price` CHANGE `value` `value` varchar(255) NOT NULL;

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
  `score` decimal(8, 2) NOT NULL,
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
  `score` decimal(8, 2) NOT NULL,
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
  `score` decimal(8, 2) NOT NULL,
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
