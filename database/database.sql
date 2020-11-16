-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour forum
CREATE DATABASE IF NOT EXISTS `forum` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `forum`;

-- Listage de la structure de la table forum. categorie
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomCategorie` varchar(50) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Listage des données de la table forum.categorie : ~6 rows (environ)
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` (`id`, `nomCategorie`, `logo`) VALUES
	(1, 'rpg', NULL),
	(2, 'fps', NULL),
	(3, 'course', NULL),
	(4, 'plate-forme', NULL),
	(5, 'sport', NULL),
	(6, 'gestion ', NULL);
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;

-- Listage de la structure de la table forum. msg
CREATE TABLE IF NOT EXISTS `msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `corpMessage` longtext NOT NULL,
  `dateMessage` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sujetId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_sujet` (`sujetId`),
  KEY `id_user` (`userId`),
  CONSTRAINT `msg_ibfk_1` FOREIGN KEY (`sujetId`) REFERENCES `topic` (`id`),
  CONSTRAINT `msg_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `utilisateur` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Listage des données de la table forum.msg : ~6 rows (environ)
/*!40000 ALTER TABLE `msg` DISABLE KEYS */;
INSERT INTO `msg` (`id`, `corpMessage`, `dateMessage`, `sujetId`, `userId`) VALUES
	(3, 'zsdefrazdfzgergrtnjhythrg', '2020-10-15 00:00:00', 21, 1),
	(10, 'bfddfb', '2020-11-01 12:01:07', 21, 2),
	(11, 'je test juste un truc', '2020-11-01 23:25:41', 24, 9),
	(15, 'test', '2020-11-02 21:09:56', 18, 4),
	(16, 'test', '2020-11-02 21:10:25', 18, 9);
/*!40000 ALTER TABLE `msg` ENABLE KEYS */;

-- Listage de la structure de la table forum. topic
CREATE TABLE IF NOT EXISTS `topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomTopic` varchar(50) NOT NULL,
  `dateTopic` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `corpSujet` varchar(255) NOT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT '0',
  `userId` int(11) NOT NULL,
  `categorieId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_topic` (`categorieId`),
  KEY `FK_topic_utilisateur` (`userId`),
  CONSTRAINT `FK_topic_categorie` FOREIGN KEY (`categorieId`) REFERENCES `categorie` (`id`),
  CONSTRAINT `FK_topic_utilisateur` FOREIGN KEY (`userId`) REFERENCES `utilisateur` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

-- Listage des données de la table forum.topic : ~18 rows (environ)
/*!40000 ALTER TABLE `topic` DISABLE KEYS */;
INSERT INTO `topic` (`id`, `nomTopic`, `dateTopic`, `corpSujet`, `statut`, `userId`, `categorieId`) VALUES
	(18, 'jeux', '2020-10-13 00:00:00', 'rfgebgvr', 1, 1, 1),
	(19, 'jeux2', '2020-10-13 00:00:00', 'gfrvzegrbv', 0, 2, 2),
	(20, 'jeux3', '2020-10-13 00:00:00', 'grvzeefz', 0, 3, 3),
	(21, 'jeux4', '2020-10-13 00:00:00', 'rgegz', 0, 1, 4),
	(22, 'jeux5', '2020-10-13 00:00:00', 'fvrezfgezfg', 0, 2, 5),
	(23, 'jeux6', '2020-10-13 00:00:00', 'fezafe', 0, 3, 6),
	(24, 'jeux7', '2020-10-19 00:00:00', 'fcezfzefg', 0, 1, 1),
	(25, 'dvcv\r\n', '2020-10-26 10:54:34', 'gnfn', 0, 6, 3),
	(26, 'fezf', '2020-10-26 10:08:38', 'greg', 0, 6, 1),
	(27, 'fez', '2020-10-26 10:57:49', 'czefg', 0, 6, 1),
	(28, 'dzax', '2020-10-26 10:58:44', 'azx', 0, 6, 1),
	(29, 'bfd', '2020-10-26 11:01:06', 'vfdb', 0, 6, 1),
	(30, 'bfd', '2020-10-26 11:01:09', 'vfdb', 0, 6, 1),
	(31, 'fcsedc', '2020-10-26 11:05:47', 'cs ', 0, 6, 1),
	(32, 'fcsedc', '2020-10-26 11:06:38', 'cs ', 0, 6, 1),
	(33, 'csq', '2020-10-26 11:06:47', 'xcsqx', 0, 6, 1),
	(34, 'test', '2020-10-26 11:06:58', 'gfre', 0, 6, 1),
	(35, 'jeux10', '2020-10-26 11:07:10', 'dzax', 0, 6, 2),
	(36, 'dsv', '2020-10-26 11:54:23', 'vsdv', 0, 8, 1),
	(37, 'cqsc ', '2020-10-26 11:55:28', 'csq ', 0, 8, 4),
	(38, 'v dsv', '2020-10-26 14:23:40', 'vsdv', 0, 8, 1),
	(39, 'v dsv', '2020-10-26 14:25:15', 'vsdv', 0, 8, 1),
	(40, 'fdgvb', '2020-10-26 14:26:39', 'frdgg', 0, 8, 1),
	(41, 'jeux69', '2020-11-03 15:09:23', 'test\r\n', 0, 4, 1);
/*!40000 ALTER TABLE `topic` ENABLE KEYS */;

-- Listage de la structure de la table forum. utilisateur
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50),
  `email` varchar(50),
  `mdp` varchar(255),
  `avatar` varchar(255) NOT NULL DEFAULT 'https://kweshan.com/wp-content/uploads/2020/05/Avatar.png',
  `inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rang` char(50) DEFAULT '3',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Listage des données de la table forum.utilisateur : ~8 rows (environ)
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` (`id`, `pseudo`, `email`, `mdp`, `avatar`, `inscription`, `rang`) VALUES
	(1, 'drizillia', 'drizillia@drizi.fr', '123456..', 'https://kweshan.com/wp-content/uploads/2020/05/Avatar.png', '2009-06-08 10:08:48', '3'),
	(2, 'jean ', 'jean@rge.com', '123456..', 'https://kweshan.com/wp-content/uploads/2020/05/Avatar.png', '2020-10-15 09:37:48', '3'),
	(3, 'gbvre', 'blkef@brte.fr', 'zerfg', 'https://kweshan.com/wp-content/uploads/2020/05/Avatar.png', '2020-10-15 09:37:52', '3'),
	(4, 'benji', 'benjamin@block.fr', '$2y$10$TszzrpkuaD6F9hjmWFe/9OGKCnrkYch74N4juSobP8uXTcM0SKP7y', 'upload/bootstrap.png', '2020-10-20 20:44:09', '3'),
	(5, 'grehj', 'hterh@ehrh.fr', '$2y$10$e0xYRJ9tu6L8Es5ailfx/ePiyC4sGEWhvKRxggybhNVKtGv.fIUxm', 'https://kweshan.com/wp-content/uploads/2020/05/Avatar.png', '2020-10-21 08:54:30', '3'),
	(6, 'testtest', 'test3@test3.fr', '$2y$10$EtD06yqJ9hyXQHgaovbfS.VWmdAODE/UE5fXcM5hegdcYgeMJ0xiS', 'https://kweshan.com/wp-content/uploads/2020/05/Avatar.png', '2020-10-21 08:55:42', '3'),
	(8, 'princesseBebar', 'flo@barbe.fr', '$2y$10$1YuT/Nii8edIIEJCyXo//eWUrVqr0frO8KD8SacrB0ahs7s365Rle', 'https://kweshan.com/wp-content/uploads/2020/05/Avatar.png', '2020-10-21 22:03:43', '3'),
	(9, 'GillesLicorne', 'gilles@gilles.fr', '$2y$10$JkpGIC09Kkrkdj9xAKkDpemLkKjsDszFCeeWT.yiiLv/1fI8k5q4G', 'upload/75d157c4af3a18aaa1d64ceefab3fc0e.jpg', '2020-10-29 08:53:57', '1'),
	(10, 'gregegr', 'grezgerg@greg.fr', '$2y$10$Nlffxi41WlsyCrqlKwtfSOsHw6RnX.tU/FcdXxXRD.JhNeF7egCqO', 'https://kweshan.com/wp-content/uploads/2020/05/Avatar.png', '2020-11-03 22:03:12', '3');
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
