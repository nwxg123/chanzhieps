<?php
 die();
?>
20200614 13:16:27: /install.php

20200614 13:17:30: /install.php

20200614 13:44:55: /install.php?m=install&f=step0

20200614 13:45:06: /install.php?m=install&f=step1

20200614 13:45:10: /install.php?m=install&f=step2

20200614 13:45:22: /install.php?m=install&f=step3

20200614 13:45:24: /install.php?m=install&f=step2

20200614 13:45:33: /install.php

20200614 13:45:45: /install.php

20200614 13:45:47: /install.php?m=install&f=step0

20200614 13:45:52: /install.php?m=install&f=step1

20200614 13:48:37: /install.php

20200614 13:48:39: /install.php?m=install&f=step0

20200614 13:48:40: /install.php?m=install&f=step1

20200614 13:48:43: /install.php?m=install&f=step2

20200614 13:49:13: /install.php?m=install&f=step3

20200614 13:49:16: /install.php?m=install&f=step2

20200614 13:50:17: /install.php?m=install&f=step3

20200614 13:50:17: /install.php?m=install&f=step4

20200614 13:52:43: /install.php?m=install&f=step4
  INSERT INTO eps_user SET `account` = 'root',`realname` = 'root',`password` = '2b879c33204cb633c7495e01fddc1d01',`admin` = 'super',`join` = '2020-06-14 13:52:43',`lang` = 'zh-cn'
  REPLACE eps_config SET `owner` = 'system',`module` = 'common',`section` = 'global',`key` = 'version',`value` = '8.2',`lang` = 'all'

20200614 13:52:44: /install.php?m=install&f=step5
  REPLACE eps_config SET `owner` = 'system',`module` = 'common',`section` = 'site',`key` = 'lang',`value` = 'zh-cn',`lang` = 'all'

20200614 13:52:57: /admin.php?m=user&f=login&t=html
  SELECT * FROM eps_config WHERE owner IN ('system','guest')  AND  eps_config.lang in('zh-cn', 'all')  ORDER BY `id` 
  SELECT *, id as category FROM eps_category WHERE type IN ('article','video','product','blog','forum','usercase') AND  eps_category.lang in('zh-cn', 'all') 
  SELECT u.*, o.provider as provider, o.openID as openID, o.unionID as unionID FROM eps_user AS u  LEFT JOIN eps_oauth AS o  ON u.account = o.account  WHERE u.account  = 'root'
  SELECT * FROM eps_user WHERE account  = 'root'
  INSERT INTO eps_log SET `account` = 'root',`date` = '2020-06-14 13:52:57',`ip` = '127.0.0.1',`location` = '本机地址 本机地址  ',`browser` = 'chrome 83',`type` = 'adminlogin',`desc` = 'success',`lang` = 'all',`ext` = '{\"userAgent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/83.0.4103.97 Safari\\/537.36\"}'
  UPDATE eps_user SET `id` = '1',`dept` = '0',`account` = 'root',`password` = '2b879c33204cb633c7495e01fddc1d01',`role` = '',`token` = '',`realname` = 'root',`realnames` = '',`nickname` = '',`idcard` = '',`admin` = 'super',`avatar` = '',`birthday` = '0000-00-00',`gender` = 'u',`email` = '',`skype` = '',`qq` = '',`yahoo` = '',`gtalk` = '',`wangwang` = '',`site` = '',`mobile` = '',`phone` = '',`company` = '',`companySN` = '',`address` = '',`zipcode` = '',`sect` = '',`visits` = '1',`ip` = '127.0.0.1',`last` = '2020-06-14 13:52:57',`score` = '0',`rank` = '0',`maxLogin` = '10',`fails` = '0',`referer` = '',`join` = '2020-06-14 13:52:43',`reset` = '',`locked` = '0000-00-00 00:00:00',`public` = '0',`emailCertified` = '0',`mobileCertified` = '0',`realnameCertified` = 'no',`companyCertified` = 'no',`security` = '',`notification` = '',`os` = '',`browser` = '',`lang` = 'zh-cn',`isCustomer` = '0',`balance` = '0',`clientStatus` = 'offline',`deleted` = '0',`clientLang` = 'zh-cn' WHERE account  = 'root'
  UPDATE eps_user SET  `browser` = 'chrome 83', `os` = 'Windows 10' WHERE id  = '1' AND  eps_user.lang in('zh-cn', 'all') 
  SELECT module, method FROM eps_usergroup AS t1  LEFT JOIN eps_grouppriv AS t2  ON t1.group = t2.group  WHERE t1.account  = 'root' AND  t1.lang in('zh-cn', 'all') 
  INSERT INTO eps_action SET `objectType` = 'user',`objectID` = '1',`actor` = 'root',`action` = 'login',`date` = '2020-06-14 13:52:57',`comment` = '',`extra` = 'admin',`lang` = 'zh-cn'
  REPLACE eps_config SET `owner` = 'system',`module` = 'common',`section` = 'site',`key` = 'updatedTime',`value` = '1592113977',`lang` = 'all'

20200614 13:54:40: /admin.php?m=tag&f=source&tag=%E5%BC%80%E6%BA%90CMS
  SELECT * FROM eps_config WHERE owner IN ('system','root')  AND  eps_config.lang in('zh-cn', 'all')  ORDER BY `id` 
  SELECT *, id as category FROM eps_category WHERE type IN ('article','video','product','blog','forum','usercase') AND  eps_category.lang in('zh-cn', 'all') 
  SELECT * FROM eps_article WHERE concat(',', keywords, ',')  LIKE '%,开源CMS,%'  AND  eps_article.lang in('zh-cn', 'all')  ORDER BY `type`,`id` desc 
  SELECT * FROM eps_product WHERE concat(',', keywords, ',')  LIKE '%,开源CMS,%' AND  eps_product.lang in('zh-cn', 'all') 
  SELECT * FROM eps_book WHERE concat(',', keywords, ',')  LIKE '%,开源CMS,%' AND  eps_book.lang in('zh-cn', 'all') 
  SELECT * FROM eps_book WHERE  eps_book.lang in('zh-cn', 'all') 
  SELECT * FROM eps_category WHERE concat(',', keywords, ',')  LIKE '%,开源CMS,%' AND  eps_category.lang in('zh-cn', 'all') 
  SELECT * FROM eps_article WHERE id  = '8' AND  eps_article.lang in('zh-cn', 'all') 
  SELECT *, length(tag) as length FROM eps_tag WHERE link  != ''  AND  eps_tag.lang in('zh-cn', 'all')  ORDER BY `length` desc 
  SELECT t2.name,t2.id,t2.alias,t2.path FROM eps_relation AS t1  LEFT JOIN eps_category AS t2  ON t1.category = t2.id  WHERE t1.type  = 'article' AND  t1.id  = '8' AND  t1.lang in('zh-cn', 'all') 
  SELECT * FROM eps_file WHERE objectType  = 'article' AND  objectID IN ('8') ORDER BY `order`,`editor` desc 
  SELECT * FROM eps_article WHERE id  = '7' AND  eps_article.lang in('zh-cn', 'all') 
  SELECT *, length(tag) as length FROM eps_tag WHERE link  != ''  AND  eps_tag.lang in('zh-cn', 'all')  ORDER BY `length` desc 
  SELECT t2.name,t2.id,t2.alias,t2.path FROM eps_relation AS t1  LEFT JOIN eps_category AS t2  ON t1.category = t2.id  WHERE t1.type  = 'article' AND  t1.id  = '7' AND  t1.lang in('zh-cn', 'all') 
  SELECT * FROM eps_file WHERE objectType  = 'article' AND  objectID IN ('7') ORDER BY `order`,`editor` desc 
  SELECT * FROM eps_article WHERE id  = '6' AND  eps_article.lang in('zh-cn', 'all') 
  SELECT *, length(tag) as length FROM eps_tag WHERE link  != ''  AND  eps_tag.lang in('zh-cn', 'all')  ORDER BY `length` desc 
  SELECT t2.name,t2.id,t2.alias,t2.path FROM eps_relation AS t1  LEFT JOIN eps_category AS t2  ON t1.category = t2.id  WHERE t1.type  = 'article' AND  t1.id  = '6' AND  t1.lang in('zh-cn', 'all') 
  SELECT * FROM eps_file WHERE objectType  = 'article' AND  objectID IN ('6') ORDER BY `order`,`editor` desc 

20200614 14:00:40: /admin.php?m=misc&f=ping&t=html
  SELECT * FROM eps_config WHERE owner IN ('system','root')  AND  eps_config.lang in('zh-cn', 'all')  ORDER BY `id` 
  SELECT *, id as category FROM eps_category WHERE type IN ('article','video','product','blog','forum','usercase') AND  eps_category.lang in('zh-cn', 'all') 

20200614 14:06:40: /admin.php?m=misc&f=ping&t=html
  SELECT * FROM eps_config WHERE owner IN ('system','root')  AND  eps_config.lang in('zh-cn', 'all')  ORDER BY `id` 
  SELECT *, id as category FROM eps_category WHERE type IN ('article','video','product','blog','forum','usercase') AND  eps_category.lang in('zh-cn', 'all') 

20200614 14:12:40: /admin.php?m=misc&f=ping&t=html
  SELECT * FROM eps_config WHERE owner IN ('system','root')  AND  eps_config.lang in('zh-cn', 'all')  ORDER BY `id` 
  SELECT *, id as category FROM eps_category WHERE type IN ('article','video','product','blog','forum','usercase') AND  eps_category.lang in('zh-cn', 'all') 

20200614 14:18:40: /admin.php?m=misc&f=ping&t=html
  SELECT * FROM eps_config WHERE owner IN ('system','root')  AND  eps_config.lang in('zh-cn', 'all')  ORDER BY `id` 
  SELECT *, id as category FROM eps_category WHERE type IN ('article','video','product','blog','forum','usercase') AND  eps_category.lang in('zh-cn', 'all') 

20200614 14:24:39: /admin.php?m=misc&f=ping&t=html
  SELECT * FROM eps_config WHERE owner IN ('system','root')  AND  eps_config.lang in('zh-cn', 'all')  ORDER BY `id` 
  SELECT *, id as category FROM eps_category WHERE type IN ('article','video','product','blog','forum','usercase') AND  eps_category.lang in('zh-cn', 'all') 

20200614 14:30:40: /admin.php?m=misc&f=ping&t=html
  SELECT * FROM eps_config WHERE owner IN ('system','root')  AND  eps_config.lang in('zh-cn', 'all')  ORDER BY `id` 
  SELECT *, id as category FROM eps_category WHERE type IN ('article','video','product','blog','forum','usercase') AND  eps_category.lang in('zh-cn', 'all') 

20200614 14:36:40: /admin.php?m=misc&f=ping&t=html
  SELECT * FROM eps_config WHERE owner IN ('system','root')  AND  eps_config.lang in('zh-cn', 'all')  ORDER BY `id` 
  SELECT *, id as category FROM eps_category WHERE type IN ('article','video','product','blog','forum','usercase') AND  eps_category.lang in('zh-cn', 'all') 

20200614 14:42:40: /admin.php?m=misc&f=ping&t=html
  SELECT * FROM eps_config WHERE owner IN ('system','root')  AND  eps_config.lang in('zh-cn', 'all')  ORDER BY `id` 
  SELECT *, id as category FROM eps_category WHERE type IN ('article','video','product','blog','forum','usercase') AND  eps_category.lang in('zh-cn', 'all') 

20200614 14:48:40: /admin.php?m=misc&f=ping&t=html
  SELECT * FROM eps_config WHERE owner IN ('system','root')  AND  eps_config.lang in('zh-cn', 'all')  ORDER BY `id` 
  SELECT *, id as category FROM eps_category WHERE type IN ('article','video','product','blog','forum','usercase') AND  eps_category.lang in('zh-cn', 'all') 

20200614 14:54:40: /admin.php?m=misc&f=ping&t=html
  SELECT * FROM eps_config WHERE owner IN ('system','root')  AND  eps_config.lang in('zh-cn', 'all')  ORDER BY `id` 
  SELECT *, id as category FROM eps_category WHERE type IN ('article','video','product','blog','forum','usercase') AND  eps_category.lang in('zh-cn', 'all') 

20200614 15:00:40: /admin.php?m=misc&f=ping&t=html
  SELECT * FROM eps_config WHERE owner IN ('system','root')  AND  eps_config.lang in('zh-cn', 'all')  ORDER BY `id` 
  SELECT *, id as category FROM eps_category WHERE type IN ('article','video','product','blog','forum','usercase') AND  eps_category.lang in('zh-cn', 'all') 

20200614 15:06:40: /admin.php?m=misc&f=ping&t=html
  SELECT * FROM eps_config WHERE owner IN ('system','root')  AND  eps_config.lang in('zh-cn', 'all')  ORDER BY `id` 
  SELECT *, id as category FROM eps_category WHERE type IN ('article','video','product','blog','forum','usercase') AND  eps_category.lang in('zh-cn', 'all') 

20200614 15:19:46: /admin.php?m=user&f=login&t=html
  SELECT * FROM eps_config WHERE owner IN ('system','guest')  AND  eps_config.lang in('zh-cn', 'all')  ORDER BY `id` 
  SELECT *, id as category FROM eps_category WHERE type IN ('article','video','product','blog','forum','usercase') AND  eps_category.lang in('zh-cn', 'all') 
  SELECT u.*, o.provider as provider, o.openID as openID, o.unionID as unionID FROM eps_user AS u  LEFT JOIN eps_oauth AS o  ON u.account = o.account  WHERE u.account  = 'root'
  SELECT * FROM eps_user WHERE account  = 'root'
  INSERT INTO eps_log SET `account` = 'root',`date` = '2020-06-14 15:19:46',`ip` = '127.0.0.1',`location` = '本机地址 本机地址  ',`browser` = 'chrome 83',`type` = 'adminlogin',`desc` = 'success',`lang` = 'all',`ext` = '{\"userAgent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/83.0.4103.97 Safari\\/537.36\"}'
  UPDATE eps_user SET `id` = '1',`dept` = '0',`account` = 'root',`password` = '2b879c33204cb633c7495e01fddc1d01',`role` = '',`token` = '',`realname` = 'root',`realnames` = '',`nickname` = '',`idcard` = '',`admin` = 'super',`avatar` = '',`birthday` = '0000-00-00',`gender` = 'u',`email` = '',`skype` = '',`qq` = '',`yahoo` = '',`gtalk` = '',`wangwang` = '',`site` = '',`mobile` = '',`phone` = '',`company` = '',`companySN` = '',`address` = '',`zipcode` = '',`sect` = '',`visits` = '4',`ip` = '127.0.0.1',`last` = '2020-06-14 15:19:46',`score` = '0',`rank` = '0',`maxLogin` = '10',`fails` = '0',`referer` = '',`join` = '2020-06-14 13:52:43',`reset` = '',`locked` = '0000-00-00 00:00:00',`public` = '0',`emailCertified` = '0',`mobileCertified` = '0',`realnameCertified` = 'no',`companyCertified` = 'no',`security` = '',`notification` = '',`os` = 'Windows 10',`browser` = 'chrome 83',`lang` = 'zh-cn',`isCustomer` = '0',`balance` = '0',`clientStatus` = 'offline',`deleted` = '0',`clientLang` = 'zh-cn' WHERE account  = 'root'
  UPDATE eps_user SET  `browser` = 'chrome 83', `os` = 'Windows 10' WHERE id  = '1' AND  eps_user.lang in('zh-cn', 'all') 
  SELECT module, method FROM eps_usergroup AS t1  LEFT JOIN eps_grouppriv AS t2  ON t1.group = t2.group  WHERE t1.account  = 'root' AND  t1.lang in('zh-cn', 'all') 
  INSERT INTO eps_action SET `objectType` = 'user',`objectID` = '1',`actor` = 'root',`action` = 'login',`date` = '2020-06-14 15:19:46',`comment` = '',`extra` = 'admin',`lang` = 'zh-cn'
  REPLACE eps_config SET `owner` = 'system',`module` = 'common',`section` = 'site',`key` = 'updatedTime',`value` = '1592119186',`lang` = 'all'

20200614 15:20:39: /admin.php?m=block&f=edit&block=6
  SELECT * FROM eps_config WHERE owner IN ('system','root')  AND  eps_config.lang in('zh-cn', 'all')  ORDER BY `id` 
  SELECT *, id as category FROM eps_category WHERE type IN ('article','video','product','blog','forum','usercase') AND  eps_category.lang in('zh-cn', 'all') 
  SELECT * FROM eps_block WHERE `id` = '6'  AND  eps_block.lang in('zh-cn', 'all') 
  SELECT * FROM eps_block WHERE `id` = '6'  AND  eps_block.lang in('zh-cn', 'all') 
  SELECT * FROM eps_category WHERE type  = 'article'  AND  eps_category.lang in('zh-cn', 'all')  ORDER BY `grade` desc,`order` 
  SELECT * FROM eps_category WHERE type  = 'blog'  AND  eps_category.lang in('zh-cn', 'all')  ORDER BY `grade` desc,`order` 
  SELECT * FROM eps_category WHERE type  = 'product'  AND  eps_category.lang in('zh-cn', 'all')  ORDER BY `grade` desc,`order` 
  SELECT id, title FROM eps_article WHERE type  = 'page' AND  addedDate  <= '2020-06-14 15:20:39' AND  status  = 'normal'  AND  eps_article.lang in('zh-cn', 'all')  ORDER BY `id` desc 
  SELECT id, title FROM eps_form WHERE status  = 'normal' AND  eps_form.lang in('zh-cn', 'all') 
  SELECT * FROM eps_category WHERE type  = 'video'  AND  eps_category.lang in('zh-cn', 'all')  ORDER BY `grade` desc,`order` 
  SELECT * FROM eps_category WHERE type  = 'article'  AND  eps_category.lang in('zh-cn', 'all')  ORDER BY `grade` desc,`order` 
  SELECT * FROM eps_category WHERE type  = 'blog'  AND  eps_category.lang in('zh-cn', 'all')  ORDER BY `grade` desc,`order` 
  SELECT * FROM eps_category WHERE type  = 'product'  AND  eps_category.lang in('zh-cn', 'all')  ORDER BY `grade` desc,`order` 
  SELECT id, title FROM eps_article WHERE type  = 'page' AND  addedDate  <= '2020-06-14 15:20:39' AND  status  = 'normal'  AND  eps_article.lang in('zh-cn', 'all')  ORDER BY `id` desc 
  SELECT id, title FROM eps_form WHERE status  = 'normal' AND  eps_form.lang in('zh-cn', 'all') 
  SELECT * FROM eps_category WHERE type  = 'video'  AND  eps_category.lang in('zh-cn', 'all')  ORDER BY `grade` desc,`order` 

20200614 15:21:54: /admin.php?m=article&f=create&type=article&category=
  SELECT * FROM eps_config WHERE owner IN ('system','root')  AND  eps_config.lang in('zh-cn', 'all')  ORDER BY `id` 
  SELECT *, id as category FROM eps_category WHERE type IN ('article','video','product','blog','forum','usercase') AND  eps_category.lang in('zh-cn', 'all') 
  SELECT * FROM eps_category WHERE type  = 'article'  AND  eps_category.lang in('zh-cn', 'all')  ORDER BY `grade` desc,`order` 
  REPLACE eps_config SET `owner` = 'system',`module` = 'common',`section` = 'site',`key` = 'updatedTime',`value` = '1592119314',`lang` = 'all'

20200614 15:22:05: /admin.php?m=article&f=create&type=article&category=
  SELECT * FROM eps_config WHERE owner IN ('system','root')  AND  eps_config.lang in('zh-cn', 'all')  ORDER BY `id` 
  SELECT *, id as category FROM eps_category WHERE type IN ('article','video','product','blog','forum','usercase') AND  eps_category.lang in('zh-cn', 'all') 
  SELECT * FROM eps_category WHERE type  = 'article'  AND  eps_category.lang in('zh-cn', 'all')  ORDER BY `grade` desc,`order` 
  INSERT INTO eps_article SET `titleColor` = '',`title` = 'ファスト　ブログ',`alias` = 'japaness',`link` = '',`author` = 'root',`source` = 'original',`keywords` = 'test',`summary` = 'tesファスト',`content` = 'ファスト',`status` = 'normal',`addedDate` = '2020-06-14 15:21',`submission` = '0',`editedDate` = '2020-06-14 15:22:05',`type` = 'article',`addedBy` = 'root',`lang` = 'zh-cn'
  SELECT count(*) as count FROM eps_article WHERE concat(',', keywords, ',')  LIKE '%,test,%' AND  eps_article.lang in('zh-cn', 'all') 
  SELECT count(*) as count FROM eps_product WHERE concat(',', keywords, ',')  LIKE '%,test,%' AND  eps_product.lang in('zh-cn', 'all') 
  SELECT count(*) as count FROM eps_category WHERE concat(',', keywords, ',')  LIKE '%,test,%' AND  eps_category.lang in('zh-cn', 'all') 
  SELECT count(*) as count FROM eps_book WHERE concat(',', keywords, ',')  LIKE '%,test,%' AND  eps_book.lang in('zh-cn', 'all') 
  SELECT count(*) as count FROM eps_tag WHERE tag  = 'test' AND  eps_tag.lang in('zh-cn', 'all') 
  INSERT INTO eps_tag SET `tag` = 'test',`rank` = '1',`lang` = 'zh-cn'
  DELETE FROM eps_relation WHERE type  = 'article' AND  id  = '13' AND  eps_relation.lang in('zh-cn', 'all') 
  INSERT INTO eps_relation SET `type` = 'article',`id` = '13',`category` = '11',`lang` = 'zh-cn'
  SELECT * FROM eps_article WHERE id  = '13' AND  eps_article.lang in('zh-cn', 'all') 
  SELECT *, length(tag) as length FROM eps_tag WHERE link  != ''  AND  eps_tag.lang in('zh-cn', 'all')  ORDER BY `length` desc 
  SELECT t2.name,t2.id,t2.alias,t2.path FROM eps_relation AS t1  LEFT JOIN eps_category AS t2  ON t1.category = t2.id  WHERE t1.type  = 'article' AND  t1.id  = '13' AND  t1.lang in('zh-cn', 'all') 
  SELECT * FROM eps_file WHERE objectType  = 'article' AND  objectID IN ('13') ORDER BY `order`,`editor` desc 
  REPLACE eps_search_dict SET `key` = '12501',`value` = 'フ',`lang` = 'zh-cn'
  REPLACE eps_search_dict SET `key` = '12449',`value` = 'ァ',`lang` = 'zh-cn'
  REPLACE eps_search_dict SET `key` = '12473',`value` = 'ス',`lang` = 'zh-cn'
  REPLACE eps_search_dict SET `key` = '12488',`value` = 'ト',`lang` = 'zh-cn'
  REPLACE eps_search_dict SET `key` = '12288',`value` = '　',`lang` = 'zh-cn'
  REPLACE eps_search_dict SET `key` = '12502',`value` = 'ブ',`lang` = 'zh-cn'
  REPLACE eps_search_dict SET `key` = '12525',`value` = 'ロ',`lang` = 'zh-cn'
  REPLACE eps_search_dict SET `key` = '12464',`value` = 'グ',`lang` = 'zh-cn'
  REPLACE eps_search_index SET `objectID` = '13',`objectType` = 'article',`title` = ' 12501 12449 12473 12488 12288 12502 12525 12464',`status` = 'normal',`addedDate` = '2020-06-14 15:21:00',`editedDate` = '2020-06-14 15:22:05',`params` = '{\"category\":\"\",\"alias\":\"japaness\"}',`content` = ' tes__ 12501 12449 12473 12488 12501 12449 12473 12488 test_',`lang` = 'zh-cn'
  DELETE FROM eps_access WHERE objectType  = 'article' AND  objectID  = '13' AND  eps_access.lang in('zh-cn', 'all') 
  REPLACE eps_access SET `objectType` = 'article',`objectID` = '13',`resource` = 'identity',`level` = '',`cost` = 'guest',`lang` = 'zh-cn'
  REPLACE eps_access SET `objectType` = 'article',`objectID` = '13',`resource` = 'certifyemail',`level` = '',`cost` = '',`lang` = 'zh-cn'
  REPLACE eps_access SET `objectType` = 'article',`objectID` = '13',`resource` = 'certifymobile',`level` = '',`cost` = '',`lang` = 'zh-cn'
  REPLACE eps_access SET `objectType` = 'article',`objectID` = '13',`resource` = 'certifyrealname',`level` = '',`cost` = '',`lang` = 'zh-cn'
  REPLACE eps_access SET `objectType` = 'article',`objectID` = '13',`resource` = 'certifycompany',`level` = '',`cost` = '',`lang` = 'zh-cn'
  REPLACE eps_config SET `owner` = 'system',`module` = 'common',`section` = 'site',`key` = 'updatedTime',`value` = '1592119325',`lang` = 'all'

20200614 15:28:08: /admin.php?m=misc&f=ping&t=html
  SELECT * FROM eps_config WHERE owner IN ('system','root')  AND  eps_config.lang in('zh-cn', 'all')  ORDER BY `id` 
  SELECT *, id as category FROM eps_category WHERE type IN ('article','video','product','blog','forum','usercase') AND  eps_category.lang in('zh-cn', 'all') 

20200614 15:34:08: /admin.php?m=misc&f=ping&t=html
  SELECT * FROM eps_config WHERE owner IN ('system','root')  AND  eps_config.lang in('zh-cn', 'all')  ORDER BY `id` 
  SELECT *, id as category FROM eps_category WHERE type IN ('article','video','product','blog','forum','usercase') AND  eps_category.lang in('zh-cn', 'all') 

20200614 15:40:08: /admin.php?m=misc&f=ping&t=html
  SELECT * FROM eps_config WHERE owner IN ('system','root')  AND  eps_config.lang in('zh-cn', 'all')  ORDER BY `id` 
  SELECT *, id as category FROM eps_category WHERE type IN ('article','video','product','blog','forum','usercase') AND  eps_category.lang in('zh-cn', 'all') 

20200614 15:46:08: /admin.php?m=misc&f=ping&t=html
  SELECT * FROM eps_config WHERE owner IN ('system','root')  AND  eps_config.lang in('zh-cn', 'all')  ORDER BY `id` 
  SELECT *, id as category FROM eps_category WHERE type IN ('article','video','product','blog','forum','usercase') AND  eps_category.lang in('zh-cn', 'all') 

20200614 15:52:08: /admin.php?m=misc&f=ping&t=html
  SELECT * FROM eps_config WHERE owner IN ('system','root')  AND  eps_config.lang in('zh-cn', 'all')  ORDER BY `id` 
  SELECT *, id as category FROM eps_category WHERE type IN ('article','video','product','blog','forum','usercase') AND  eps_category.lang in('zh-cn', 'all') 

20200614 15:58:08: /admin.php?m=misc&f=ping&t=html
  SELECT * FROM eps_config WHERE owner IN ('system','root')  AND  eps_config.lang in('zh-cn', 'all')  ORDER BY `id` 
  SELECT *, id as category FROM eps_category WHERE type IN ('article','video','product','blog','forum','usercase') AND  eps_category.lang in('zh-cn', 'all') 

20200614 16:04:08: /admin.php?m=misc&f=ping&t=html
  SELECT * FROM eps_config WHERE owner IN ('system','root')  AND  eps_config.lang in('zh-cn', 'all')  ORDER BY `id` 
  SELECT *, id as category FROM eps_category WHERE type IN ('article','video','product','blog','forum','usercase') AND  eps_category.lang in('zh-cn', 'all') 

20200614 16:10:08: /admin.php?m=misc&f=ping&t=html
  SELECT * FROM eps_config WHERE owner IN ('system','root')  AND  eps_config.lang in('zh-cn', 'all')  ORDER BY `id` 
  SELECT *, id as category FROM eps_category WHERE type IN ('article','video','product','blog','forum','usercase') AND  eps_category.lang in('zh-cn', 'all') 

20200614 16:16:08: /admin.php?m=misc&f=ping&t=html
  SELECT * FROM eps_config WHERE owner IN ('system','root')  AND  eps_config.lang in('zh-cn', 'all')  ORDER BY `id` 
  SELECT *, id as category FROM eps_category WHERE type IN ('article','video','product','blog','forum','usercase') AND  eps_category.lang in('zh-cn', 'all') 

20200614 16:31:13: /admin.php?m=tree&f=children&type=article&root=0&t=html
  SELECT * FROM eps_config WHERE owner IN ('system','root')  AND  eps_config.lang in('zh-cn', 'all')  ORDER BY `id` 
  SELECT *, id as category FROM eps_category WHERE type IN ('article','video','product','blog','forum','usercase') AND  eps_category.lang in('zh-cn', 'all') 
  SELECT * FROM eps_category WHERE parent  = '0' AND  type  = 'article'  AND  eps_category.lang in('zh-cn', 'all')  ORDER BY `order` 

20200614 16:32:22: /admin.php?m=tree&f=children&type=article&category=0
  SELECT * FROM eps_config WHERE owner IN ('system','root')  AND  eps_config.lang in('zh-cn', 'all')  ORDER BY `id` 
  SELECT *, id as category FROM eps_category WHERE type IN ('article','video','product','blog','forum','usercase') AND  eps_category.lang in('zh-cn', 'all') 
  SELECT * FROM eps_category WHERE alias  = '0' AND  type  = 'article' AND  eps_category.lang in('zh-cn', 'all') 
  SELECT * FROM eps_category WHERE `id` = '0'  AND  eps_category.lang in('zh-cn', 'all') 
  SELECT count(*) as count FROM eps_category WHERE `alias`  = 'download' AND  id  != '1' AND  type IN ('article','product') AND  eps_category.lang in('zh-cn', 'all') 
  UPDATE eps_category SET  `name` = '蝉知下载', `alias` = 'download', `order` = '10' WHERE id  = '1' AND  eps_category.lang in('zh-cn', 'all') 
  SELECT count(*) as count FROM eps_category WHERE `alias`  = 'dynamic' AND  id  != '2' AND  type IN ('article','product') AND  eps_category.lang in('zh-cn', 'all') 
  UPDATE eps_category SET  `name` = '蝉知动态', `alias` = 'dynamic', `order` = '20' WHERE id  = '2' AND  eps_category.lang in('zh-cn', 'all') 
  UPDATE eps_category SET  `name` = '商业支持', `alias` = '', `order` = '30' WHERE id  = '3' AND  eps_category.lang in('zh-cn', 'all') 
  UPDATE eps_category SET  `name` = '知识改进', `alias` = '', `order` = '40' WHERE id  = '11' AND  eps_category.lang in('zh-cn', 'all') 
  SELECT count(*) as count FROM eps_category WHERE `alias`  = 'excel-tools' AND  id  != '0' AND  type IN ('article','product') AND  eps_category.lang in('zh-cn', 'all') 
  INSERT INTO eps_category SET `parent` = '0',`grade` = '1',`type` = 'article',`postedDate` = '2020-06-14 16:32:21',`name` = 'excel工具',`alias` = 'excel-tools',`order` = '50',`lang` = 'zh-cn'
  UPDATE eps_category SET  `path` = ',16,' WHERE id  = '16' AND  eps_category.lang in('zh-cn', 'all') 
  REPLACE eps_config SET `owner` = 'system',`module` = 'common',`section` = 'site',`key` = 'updatedTime',`value` = '1592123541',`lang` = 'all'

20200614 16:32:23: /admin.php?m=tree&f=children&type=article&root=0&t=html
  SELECT * FROM eps_config WHERE owner IN ('system','root')  AND  eps_config.lang in('zh-cn', 'all')  ORDER BY `id` 
  SELECT *, id as category FROM eps_category WHERE type IN ('article','video','product','blog','forum','usercase') AND  eps_category.lang in('zh-cn', 'all') 
  SELECT * FROM eps_category WHERE parent  = '0' AND  type  = 'article'  AND  eps_category.lang in('zh-cn', 'all')  ORDER BY `order` 

20200614 16:36:38: /admin.php?m=article&f=create&type=article&category=16
  SELECT * FROM eps_config WHERE owner IN ('system','root')  AND  eps_config.lang in('zh-cn', 'all')  ORDER BY `id` 
  SELECT *, id as category FROM eps_category WHERE type IN ('article','video','product','blog','forum','usercase') AND  eps_category.lang in('zh-cn', 'all') 
  SELECT * FROM eps_category WHERE type  = 'article'  AND  eps_category.lang in('zh-cn', 'all')  ORDER BY `grade` desc,`order` 
  INSERT INTO eps_article SET `titleColor` = '',`title` = 'excel目录检索',`alias` = 'exceltools',`link` = '',`author` = 'root',`source` = 'original',`keywords` = 'excel tools,目录检索',`summary` = 'excel工具，目录检索',`content` = '工具检索',`status` = 'normal',`addedDate` = '2020-06-14 16:35',`submission` = '0',`editedDate` = '2020-06-14 16:36:37',`type` = 'article',`addedBy` = 'root',`lang` = 'zh-cn'
  SELECT count(*) as count FROM eps_article WHERE concat(',', keywords, ',')  LIKE '%,excel tools,%' AND  eps_article.lang in('zh-cn', 'all') 
  SELECT count(*) as count FROM eps_product WHERE concat(',', keywords, ',')  LIKE '%,excel tools,%' AND  eps_product.lang in('zh-cn', 'all') 
  SELECT count(*) as count FROM eps_category WHERE concat(',', keywords, ',')  LIKE '%,excel tools,%' AND  eps_category.lang in('zh-cn', 'all') 
  SELECT count(*) as count FROM eps_book WHERE concat(',', keywords, ',')  LIKE '%,excel tools,%' AND  eps_book.lang in('zh-cn', 'all') 
  SELECT count(*) as count FROM eps_tag WHERE tag  = 'excel tools' AND  eps_tag.lang in('zh-cn', 'all') 
  INSERT INTO eps_tag SET `tag` = 'excel tools',`rank` = '1',`lang` = 'zh-cn'
  SELECT count(*) as count FROM eps_article WHERE concat(',', keywords, ',')  LIKE '%,目录检索,%' AND  eps_article.lang in('zh-cn', 'all') 
  SELECT count(*) as count FROM eps_product WHERE concat(',', keywords, ',')  LIKE '%,目录检索,%' AND  eps_product.lang in('zh-cn', 'all') 
  SELECT count(*) as count FROM eps_category WHERE concat(',', keywords, ',')  LIKE '%,目录检索,%' AND  eps_category.lang in('zh-cn', 'all') 
  SELECT count(*) as count FROM eps_book WHERE concat(',', keywords, ',')  LIKE '%,目录检索,%' AND  eps_book.lang in('zh-cn', 'all') 
  SELECT count(*) as count FROM eps_tag WHERE tag  = '目录检索' AND  eps_tag.lang in('zh-cn', 'all') 
  INSERT INTO eps_tag SET `tag` = '目录检索',`rank` = '1',`lang` = 'zh-cn'
  DELETE FROM eps_relation WHERE type  = 'article' AND  id  = '14' AND  eps_relation.lang in('zh-cn', 'all') 
  INSERT INTO eps_relation SET `type` = 'article',`id` = '14',`category` = '16',`lang` = 'zh-cn'
  SELECT * FROM eps_article WHERE id  = '14' AND  eps_article.lang in('zh-cn', 'all') 
  SELECT *, length(tag) as length FROM eps_tag WHERE link  != ''  AND  eps_tag.lang in('zh-cn', 'all')  ORDER BY `length` desc 
  SELECT t2.name,t2.id,t2.alias,t2.path FROM eps_relation AS t1  LEFT JOIN eps_category AS t2  ON t1.category = t2.id  WHERE t1.type  = 'article' AND  t1.id  = '14' AND  t1.lang in('zh-cn', 'all') 
  SELECT * FROM eps_file WHERE objectType  = 'article' AND  objectID IN ('14') ORDER BY `order`,`editor` desc 
  REPLACE eps_search_dict SET `key` = '30446',`value` = '目',`lang` = 'zh-cn'
  REPLACE eps_search_dict SET `key` = '24405',`value` = '录',`lang` = 'zh-cn'
  REPLACE eps_search_dict SET `key` = '26816',`value` = '检',`lang` = 'zh-cn'
  REPLACE eps_search_dict SET `key` = '32034',`value` = '索',`lang` = 'zh-cn'
  REPLACE eps_search_dict SET `key` = '24037',`value` = '工',`lang` = 'zh-cn'
  REPLACE eps_search_dict SET `key` = '20855',`value` = '具',`lang` = 'zh-cn'
  REPLACE eps_search_dict SET `key` = '65292',`value` = '，',`lang` = 'zh-cn'
  REPLACE eps_search_index SET `objectID` = '14',`objectType` = 'article',`title` = ' excel 30446 24405 26816 32034',`status` = 'normal',`addedDate` = '2020-06-14 16:35:00',`editedDate` = '2020-06-14 16:36:37',`params` = '{\"category\":\"\",\"alias\":\"exceltools\"}',`content` = ' excel 24037 20855 65292 30446 24405 26816 32034 24037 20855 26816 32034 excel tools 30446 24405 26816 32034',`lang` = 'zh-cn'
  DELETE FROM eps_access WHERE objectType  = 'article' AND  objectID  = '14' AND  eps_access.lang in('zh-cn', 'all') 
  REPLACE eps_access SET `objectType` = 'article',`objectID` = '14',`resource` = 'identity',`level` = '',`cost` = 'guest',`lang` = 'zh-cn'
  REPLACE eps_access SET `objectType` = 'article',`objectID` = '14',`resource` = 'certifyemail',`level` = '',`cost` = '',`lang` = 'zh-cn'
  REPLACE eps_access SET `objectType` = 'article',`objectID` = '14',`resource` = 'certifymobile',`level` = '',`cost` = '',`lang` = 'zh-cn'
  REPLACE eps_access SET `objectType` = 'article',`objectID` = '14',`resource` = 'certifyrealname',`level` = '',`cost` = '',`lang` = 'zh-cn'
  REPLACE eps_access SET `objectType` = 'article',`objectID` = '14',`resource` = 'certifycompany',`level` = '',`cost` = '',`lang` = 'zh-cn'
  REPLACE eps_config SET `owner` = 'system',`module` = 'common',`section` = 'site',`key` = 'updatedTime',`value` = '1592123798',`lang` = 'all'

20200614 16:36:46: /admin.php?m=file&f=browse&objectType=article&objectID=14&isImage=0
  SELECT * FROM eps_config WHERE owner IN ('system','root')  AND  eps_config.lang in('zh-cn', 'all')  ORDER BY `id` 
  SELECT *, id as category FROM eps_category WHERE type IN ('article','video','product','blog','forum','usercase') AND  eps_category.lang in('zh-cn', 'all') 
  SELECT * FROM eps_file WHERE objectType  = 'article' AND  objectID IN ('14') AND  extension  NOT IN ('jpeg','jpg','gif','png','bmp') ORDER BY `order`,`editor` desc 
  SELECT account, realname, realnames FROM eps_user ORDER BY `id` asc 

20200614 16:37:18: /admin.php?m=file&f=browse&objectType=article&objectID=14&isImage=0
  SELECT * FROM eps_config WHERE owner IN ('system','root')  AND  eps_config.lang in('zh-cn', 'all')  ORDER BY `id` 
  SELECT *, id as category FROM eps_category WHERE type IN ('article','video','product','blog','forum','usercase') AND  eps_category.lang in('zh-cn', 'all') 
  SELECT * FROM eps_file WHERE objectType  = 'article' AND  objectID IN ('14') AND  extension  NOT IN ('jpeg','jpg','gif','png','bmp') ORDER BY `order`,`editor` desc 
  SELECT account, realname, realnames FROM eps_user ORDER BY `id` asc 

