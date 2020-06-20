ALTER TABLE `eps_formitem` ADD `answer` text NOT NULL AFTER `rule`;
ALTER TABLE `eps_formitem` ADD `score` smallint(5) NOT NULL AFTER `answer`;
ALTER TABLE `eps_formitem` ADD `scoreRule` varchar(10) NOT NUll DEFAULT 'full' AFTER `score`;
ALTER TABLE `eps_formuser` ADD `score` decimal(6, 2) NOT NULL AFTER `fingerprint`;
ALTER TABLE `eps_formdata` ADD `score` decimal(6, 2) NOT NULL AFTER `answer`;

UPDATE `eps_formitem` SET `type` = 'realname' WHERE `type` = 'name';
