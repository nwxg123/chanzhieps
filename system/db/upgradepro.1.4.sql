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
  UNIQUE KEY `account` (`account`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
