ALTER TABLE `eps_user` ADD `idcard` char(18) NOT NULL AFTER `nickname`,
ADD `companySN` char(18) NOT NULL AFTER `company`,
ADD `mobileCertified` enum('0','1') not null default '0',
ADD realnameCertified enum('no','wait','fail','normal') not null default 'no',
ADD companyCertified enum('no','wait','fail','normal') not null default 'no';
