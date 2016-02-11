# ************************************************************
# Sequel Pro SQL dump
# Версия 4500
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Адрес: localhost (MySQL 5.5.42)
# Схема: taynik
# Время создания: 2016-02-11 12:25:33 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Дамп таблицы tnk_comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tnk_comments`;

CREATE TABLE `tnk_comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_card` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `comment` text,
  `_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Дамп таблицы tnk_likes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tnk_likes`;

CREATE TABLE `tnk_likes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_card` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `_like` tinyint(1) DEFAULT '0',
  `_dislike` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Дамп таблицы tnk_message
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tnk_message`;

CREATE TABLE `tnk_message` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `ip` varchar(11) DEFAULT NULL,
  `receiver` varchar(255) DEFAULT NULL,
  `sender` varchar(255) DEFAULT NULL,
  `text` text,
  `_date` datetime DEFAULT NULL,
  `_hash` varchar(255) DEFAULT NULL,
  `public` varchar(255) DEFAULT 'off',
  `reading` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tnk_message` WRITE;
/*!40000 ALTER TABLE `tnk_message` DISABLE KEYS */;

INSERT INTO `tnk_message` (`id`, `id_user`, `ip`, `receiver`, `sender`, `text`, `_date`, `_hash`, `public`, `reading`)
VALUES
	(1,NULL,NULL,NULL,NULL,'Пускай душа не знает холода,\nКак ясный день, как сад в цвету,\nПусть будет сердце вечно молодо,\nДобром встречая доброту!\nИ от души тебе желаем\nЗдоровья, счастья, долгих лет,\nИ пусть судьба дарит лишь радость,\nХраня твой дом от всяких бед!','2016-02-01 00:00:00',NULL,'on',NULL),
	(2,NULL,NULL,NULL,NULL,'Epicurei detraxit eu quo, vel cu oblique corpora, cu cibo mentitum eos. Ex doctus epicurei per.','2016-01-31 00:00:00',NULL,'on',NULL),
	(3,NULL,NULL,NULL,NULL,'Epicurei detraxit eu quo, vel cu oblique corpora, cu cibo mentitum eos.',NULL,NULL,'on',NULL),
	(4,NULL,NULL,NULL,NULL,'Tota ridens partiendo vis ut. Vix at accusamus gloriatur voluptatum, falli invidunt mei et.',NULL,NULL,'on',NULL),
	(5,NULL,NULL,NULL,NULL,'Tota ridens partiendo vis ut. Vix at accusamus gloriatur voluptatum, falli invidunt mei et.',NULL,NULL,'on',NULL),
	(6,NULL,NULL,NULL,NULL,'Mei natum prompta ei, eos luptatum complectitur ei. Id tritani denique tractatos has, vocent labores partiendo ad pri, et nulla aliquam voluptua vix. Eu dico offendit usu, aeterno fierent eos id. Deleniti adipisci ex vel, ius ex invidunt salutandi definiebas, quo id brute nobis libris. Duo id cibo consectetuer, duo ei nusquam efficiendi.',NULL,NULL,'on',NULL),
	(7,NULL,NULL,NULL,NULL,'Пускай душа не знает холода,↵Как ясный день, как сад в цвету,↵Пусть будет сердце вечно молодо,↵Добром встречая доброту!↵И от души тебе желаем↵Здоровья, счастья, долгих лет,↵И пусть судьба дарит лишь радость,↵Храня твой дом от всяких бед!',NULL,NULL,'on',NULL),
	(8,NULL,NULL,NULL,NULL,'И от души тебе желаем↵Здоровья, счастья, долгих лет,↵И пусть судьба дарит лишь радость,↵Храня твой дом от всяких бед!',NULL,NULL,'on',NULL),
	(17,NULL,'','mamamam@mail.ru','fajfhaj@gmail.com','выф','2016-02-06 12:20:07','f678e96be80986f137cbe2692d435cbc','on',NULL),
	(25,NULL,'','mamamam@mail.ru','fdsldg@gmail.com','dasdsfdsf','2016-02-06 01:01:01','98f0c18fdda27005a3a4e17b75021458','on',1),
	(26,NULL,'','mamamam@mail.ru','dsajkhas@mail.ru','авывыавы','2016-02-06 01:03:39','7eefdbda1315af96a5d42c909358921f','on',NULL),
	(38,NULL,'::1','maxelltmg85@yandex.ru','maxelltmg85@gmail.com','Hello!','2016-02-10 06:33:22','87995d7ca3276a08bfdf6fb0b354fe21','on',1);

/*!40000 ALTER TABLE `tnk_message` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы tnk_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tnk_users`;

CREATE TABLE `tnk_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `_hash` varchar(255) DEFAULT NULL,
  `date_reg` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
