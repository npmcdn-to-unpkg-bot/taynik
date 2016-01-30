# ************************************************************
# Sequel Pro SQL dump
# Версия 4500
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Адрес: localhost (MySQL 5.5.42)
# Схема: tainyk
# Время создания: 2016-01-30 13:10:02 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Дамп таблицы tnk_message
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tnk_message`;

CREATE TABLE `tnk_message` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `text` text,
  `_from` varchar(255) DEFAULT NULL,
  `_to` varchar(255) DEFAULT NULL,
  `_date` datetime DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tnk_message` WRITE;
/*!40000 ALTER TABLE `tnk_message` DISABLE KEYS */;

INSERT INTO `tnk_message` (`id`, `text`, `_from`, `_to`, `_date`, `hash`)
VALUES
	(1,'Тестовое сообщение',NULL,NULL,NULL,NULL),
	(2,'Тестовое сообщение 2',NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `tnk_message` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
