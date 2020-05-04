-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour gapp
CREATE DATABASE IF NOT EXISTS `gapp` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `gapp`;

-- Listage de la structure de la table gapp. addgame
CREATE TABLE IF NOT EXISTS `addgame` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gamename` varchar(50) DEFAULT NULL,
  `images` text,
  `genre` varchar(50) DEFAULT NULL,
  `categorie` varchar(50) DEFAULT NULL,
  `langue` varchar(50) DEFAULT NULL,
  `avis` varchar(1000) DEFAULT NULL,
  `pseudo` varchar(100) DEFAULT NULL,
  `notes` int(11) DEFAULT NULL,
  `dates` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Listage des données de la table gapp.addgame : ~19 rows (environ)
/*!40000 ALTER TABLE `addgame` DISABLE KEYS */;
INSERT INTO `addgame` (`id`, `gamename`, `images`, `genre`, `categorie`, `langue`, `avis`, `pseudo`, `notes`, `dates`) VALUES
	(1, 'Angry Birds', 'angrybirds.jpg', 'Arcade', 'PEGI 3', 'Anglais', 'Angry Birds est un jeu vid&eacute;o de type artillerie et puzzle d&eacute;velopp&eacute; et &eacute;dit&eacute; par la soci&eacute;t&eacute; finlandaise Rovio Mobile. Inspir&eacute; &agrave; l&#039;origine par des dessins stylis&eacute;s d&#039;oiseaux', 'john', 3, '2020-04-16 16:29'),
	(2, 'Bleach Braver Souls', 'bleach.jpg', 'Aventure', 'PEGI 16', 'Japon', 'Bleach Brave Souls est un jeu d&#039;action bas&eacute; sur l&#039;univers de Bleach, il a &eacute;t&eacute; d&eacute;velopp&eacute; et publi&eacute; par KLab Global Pte', 'john', 4, '2020-04-16 16:30'),
	(3, 'Brawl Stars', 'brawlstars.jpg', 'Tir', 'PEGI 7', 'Anglais', 'Brawl Stars est un jeu vid&eacute;o de strat&eacute;gie et de tir d&eacute;velopp&eacute; et &eacute;dit&eacute; par le studio Supercell. ', 'john', 2, '2020-04-16 16:31'),
	(4, 'Clash of Clans', 'clashofclans.jpg', 'Arcade', 'PEGI 3', 'Anglais', 'Clash of Clans ou COC est un jeu vid&eacute;o mobile de strat&eacute;gie en temps r&eacute;el massivement multijoueur, d&eacute;velopp&eacute; et &eacute;dit&eacute; par le studio Supercell', 'john', 1, '2020-04-16 16:32'),
	(5, 'Clash Royale', 'clashroyale.jpg', 'Arcade', 'PEGI 3', 'Anglais', 'Clash Royale est un jeu vid&eacute;o d&eacute;velopp&eacute; et &eacute;dit&eacute; par Supercell, sorti le 2 mars 2016', 'john', 4, '2020-04-16 16:34'),
	(6, 'Call of Duty Mobile', 'coduty.jpg', 'Tir', 'PEGI 18', 'Japon', 'Call of Duty: Mobile est un jeu vid&eacute;o mobile free to play de tir &agrave; la premi&egrave;re personne d&eacute;velopp&eacute; par TiMi Studios et publi&eacute; par Activision.', 'john', 4, '2020-04-16 16:36'),
	(7, 'Dragon Ball Legends', 'dblegends.jpg', 'Arcade', 'PEGI 12', 'Japon', 'Dragon Ball Legends est un jeu vid&eacute;o mobile de combat d&eacute;velopp&eacute; et &eacute;dit&eacute; par Bandai Namco Games sur iOS et Android, sorti le 31 mai 2018.', 'john', 5, '2020-04-16 16:37'),
	(9, 'Yu-Gi-Oh! Duel Links', 'duellinks.jpg', 'Arcade', 'PEGI 3', 'Japon', 'Yu-Gi-Oh! Duel Links est un jeu de cartes &agrave; collectionner num&eacute;rique gratuit d&eacute;velopp&eacute; par Konami pour les appareils Microsoft Windows, iOS et Android, bas&eacute; sur le jeu de cartes &agrave; collectionner du m&ecirc;me nom.', 'john', 4, '2020-04-16 16:39'),
	(10, 'Fate Grand Order', 'fgo.jpg', 'Arcade', 'PEGI 12', 'Japon', 'Fate/Grand Order, abr&eacute;g&eacute; Fate/GO ou F/GO, est un jeu mobile de type Arcade free-to-play en ligne fond&eacute; sur la franchise de visual novels Fate/stay night de TYPE-MOON, d&eacute;velopp&eacute; par DELiGHTWORKS', 'john', 5, '2020-04-16 16:40'),
	(11, 'JetPack Joyride', 'jetpack.jpg', 'Arcade', 'PEGI 3', 'Anglais', 'Jetpack Joyride est un jeu vid&eacute;o &agrave; d&eacute;filement horizontal d&eacute;velopp&eacute; par HalfBrick Studios dont le but est de parcourir la plus longue distance avec Barry, un homme d&#039;affaires mont&eacute; sur un jetpack, qui avance de plus en plus rapidement au fil du temps.', 'john', 3, '2020-04-16 16:41'),
	(12, 'Mario Bros', 'mario.jpg', 'Arcade', 'PEGI 3', 'Japon', 'Mario Bros. est un jeu d&#039;arcade d&eacute;velopp&eacute; et &eacute;dit&eacute; par Nintendo en 1983. Il a &eacute;t&eacute; con&ccedil;u par Shigeru Miyamoto comme la suite de Donkey Kong, avec lequel il constitue un des premiers jeux de plates-formes jamais cr&eacute;&eacute;s. ', 'john', 5, '2020-04-16 16:42'),
	(13, 'Mario Kart Tour', 'mariokart.jpg', 'Automobile', 'PEGI 3', 'Japon', 'Mario Kart Tour est un jeu vid&eacute;o de course en t&eacute;l&eacute;chargement gratuit de la franchise Mario Kart, &eacute;dit&eacute; par Nintendo sur smartphone et tablette tactile, paru le 25 septembre 2019. Le mod&egrave;le &eacute;conomique du jeu est gratuit avec des achats int&eacute;gr&eacute;s, pouvant donner un avantage comp&eacute;titif.', 'john', 5, '2020-04-16 16:42'),
	(14, 'Minecraft Pocket Edition', 'minecraft.png', 'Aventure', 'PEGI 3', 'Anglais', 'Minecraft est un jeu vid&eacute;o de type &laquo; bac &agrave; sable &raquo; d&eacute;velopp&eacute; par le Su&eacute;dois Markus Persson, alias Notch, puis par le studio de d&eacute;veloppement Mojang.', 'john', 5, '2020-04-16 16:43'),
	(15, 'Monopoly', 'monopoly.jpg', 'Arcade', 'PEGI 3', 'Japon', 'Achetez, vendez et planifiez votre chemin vers la richesse dans MONOPOLY, le fameux jeu de soci&eacute;t&eacute; Hasbro et &eacute;ternel classique appr&eacute;ci&eacute; par des milliards de personnes dans le monde entier. Le jeu de soci&eacute;t&eacute; que vous connaissez et adorez est disponible sur t&eacute;l&eacute;phone portable et tablette !', 'john', 1, '2020-04-16 16:44'),
	(16, 'Subway Surfer', 'subwaysurfer.jpg', 'Arcade', 'PEGI 3', 'Japon', 'Subway Surfers est un jeu vid&eacute;o de plates-formes, co-d&eacute;velopp&eacute; en 2012 par Kiloo Games et Sybo Games. Le joueur endosse le r&ocirc;le d&#039;un jeune tagueur, surpris en train de dessiner des graffitis sur une rame de m&eacute;tro qui tente d&#039;&eacute;chapper au policier et son chien lui courant apr&egrave;s. ', 'john', 1, '2020-04-16 16:45'),
	(17, 'Pokemon Go', 'pokemongo.png', 'Aventure', 'PEGI 7', 'Japon', 'Pok&eacute;mon Go est un jeu vid&eacute;o mobile de type freemium fond&eacute; sur la localisation massivement multijoueur utilisant la r&eacute;alit&eacute; augment&eacute;e. Le projet est cr&eacute;&eacute; conjointement par The Pok&eacute;mon Company et Niantic, responsable du jeu vid&eacute;o mobile en r&eacute;alit&eacute; augment&eacute;e Ingress', 'john', 4, '2020-04-16 16:46'),
	(18, 'Sonic the Hedgehog', 'sonic.jpg', 'Arcade', 'PEGI 3', 'Japon', 'Sonic the Hedgehog, ou plus simplement Sonic, est une s&eacute;rie de jeux vid&eacute;o, d&eacute;velopp&eacute;e par la firme japonaise Sega, depuis 1991. Elle met en avant la mascotte de la firme Sonic, un h&eacute;risson bleu anthropomorphe, luttant contre l&#039;antagoniste principal de la s&eacute;rie, le Dr Robotnik', 'john', 5, '2020-04-16 16:50'),
	(19, 'One Piece Treasure Cruise', 'onepiece.jpg', 'Arcade', 'PEGI 12', 'Japon', 'One Piece Treasure Cruise est un jeu vid&eacute;o RPG qui s&#039;inspire du shonen de Eiichiro Oda, One Piece. Il est sorti sur Android et iOS et d&eacute;velopp&eacute; par Namco Bandai. Le jeu consiste &agrave; refaire l&#039;histoire du manga et de recruter des personnages puissants afin de les &eacute;voluer et de les faire monter de niveau', 'john', 4, '2020-04-16 16:51'),
	(20, 'Nanatsu', 'nnt.jpg', 'Aventure', 'PEGI 16', 'Japon', 'styl&eacute;', 'johnn', 5, '2020-04-22 22:14'),
	(21, 'Nanatsuu', 'nnt.jpg', 'Aventure', 'PEGI 7', 'Japon', 'cool', 'johnn', 5, '2020-04-23 12:46');
/*!40000 ALTER TABLE `addgame` ENABLE KEYS */;

-- Listage de la structure de la table gapp. adminn
CREATE TABLE IF NOT EXISTS `adminn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) DEFAULT NULL,
  `mdp` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Listage des données de la table gapp.adminn : ~1 rows (environ)
/*!40000 ALTER TABLE `adminn` DISABLE KEYS */;
INSERT INTO `adminn` (`id`, `pseudo`, `mdp`) VALUES
	(1, 'admin', 'admin');
/*!40000 ALTER TABLE `adminn` ENABLE KEYS */;

-- Listage de la structure de la table gapp. commentaire
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `info` varchar(250) NOT NULL DEFAULT '0',
  `dates` varchar(50) NOT NULL DEFAULT '0',
  `pseudo` varchar(50) NOT NULL DEFAULT '0',
  `gamename` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

-- Listage des données de la table gapp.commentaire : ~16 rows (environ)
/*!40000 ALTER TABLE `commentaire` DISABLE KEYS */;
INSERT INTO `commentaire` (`id`, `info`, `dates`, `pseudo`, `gamename`) VALUES
	(27, 'c super', '2020-04-17 11:44', 'john', 'Nanatsu No Taizai'),
	(28, 'ez', '2020-04-17 11:55', 'john', 'Pokemon Master'),
	(29, 'ddd', '2020-04-17 11:58', 'john', 'Nanatsu No Taizai'),
	(30, 'mais c&#039;etait sur en fait', '2020-04-17 11:59', 'john', 'Nanatsu No Taizai'),
	(31, 'zeeee', '2020-04-17 11:59', 'john', 'Nanatsu No Taizai'),
	(32, 'esrtfyuhi', '2020-04-17 12:13', 'john', 'Nanatsu No Taizai'),
	(33, 'zzzzzzzzzzzz', '2020-04-17 12:13', 'john', 'Nanatsu No Taizai'),
	(34, 'zzzzzzzzzzzz', '2020-04-17 12:13', 'john', 'Nanatsu No Taizai'),
	(35, 'zzzzzzzzzzzz', '2020-04-17 12:13', 'john', 'Nanatsu No Taizai'),
	(36, 'zzzzzzzzzzzz', '2020-04-17 12:13', 'john', 'Nanatsu No Taizai'),
	(37, 'ntm', '2020-04-17 19:44', 'hugoo', 'Pokemon Master'),
	(38, 'nul', '2020-04-17 20:17', 'hugoo', 'Nanatsu No Taizai'),
	(39, 'ez', '2020-04-17 20:18', 'hugoo', 'Nanatsu No Taizai'),
	(40, 'ez', '2020-04-17 20:18', 'hugoo', 'Nanatsu No Taizai'),
	(41, 'ntm djoe', '2020-04-17 20:20', 'hugoo', 'Nanatsu No Taizai'),
	(42, 'fgfdsghghfd', '2020-04-17 20:23', 'hugoo', 'Nanatsu No Taizai'),
	(43, 'ez', '2020-04-17 21:46', 'hugoo', 'Nanatsu No Taizai'),
	(44, '12345', '2020-04-20 08:09', 'antoine', 'Nanatsu No Taizai'),
	(45, 'trop cool', '2020-04-22 22:14', 'johnn', 'Nanatsu');
/*!40000 ALTER TABLE `commentaire` ENABLE KEYS */;

-- Listage de la structure de la table gapp. contact
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `texte` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Listage des données de la table gapp.contact : ~0 rows (environ)
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` (`id`, `nom`, `prenom`, `mail`, `texte`) VALUES
	(1, 'john', 'kassab', 'dssds@gmail.fr', 'fdsfdsfsd');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;

-- Listage de la structure de la table gapp. membres
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) DEFAULT NULL,
  `mdp` varchar(50) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `images` varchar(100) DEFAULT NULL,
  `image_text` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

-- Listage des données de la table gapp.membres : ~10 rows (environ)
/*!40000 ALTER TABLE `membres` DISABLE KEYS */;
INSERT INTO `membres` (`id`, `pseudo`, `mdp`, `mail`, `images`, `image_text`) VALUES
	(40, 'abdoul', 'c2272becdcdf2f6782a7034cc4c7464f', 'abdoul@gmail.fr', '../imags/default.png', NULL),
	(41, 'rodolf', '8ecac6b3c07f73939e12d7abeb38541b', 'rodolf@yopmail.fr', '../images/default.png', NULL),
	(42, 'nicolas', 'deb97a759ee7b8ba42e02dddf2b412fe', 'nicolas@gmail.fr', 'mario.jpg', NULL),
	(43, 'djoee', '8fdb099b8d205df1f852aab2ba5bf259', 'djoee@gmail.fr', '../images/default.png', NULL),
	(44, 'djoeee', 'a83665b0ab0be3869050c7c184390821', 'djoeee@gail.fr', '../images/default.png', NULL),
	(46, 'ezezez', '9eabe32190daca53f443fc99c1bc0c9c', 'ezezez@ggg.fr', '../images/default.png', NULL),
	(47, 'hjgfds', '110f1fa20151647fcb31fce0945685c4', 'hjgfds@gmail.fr', '../images/default.png', NULL),
	(48, 'hugoo', '51446eb0517e749ea67571cf344513a4', 'hugoo@gmail.fr', 'bleach.jpg', NULL),
	(50, 'johnn', 'de4baebd9a0cda71cdcbcae0f0774734', 'johnn@gmail.fr', 'dblegends.jpg', NULL),
	(51, 'antoine', '35c122d49d37f970b63763f316b8c93a', 'antoine@gmail.fr', 'jetpack.jpg', NULL);
/*!40000 ALTER TABLE `membres` ENABLE KEYS */;

-- Listage de la structure de la table gapp. messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo_e` varchar(50) DEFAULT NULL,
  `pseudo_r` varchar(50) DEFAULT NULL,
  `message` text,
  `msg` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Listage des données de la table gapp.messages : ~5 rows (environ)
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` (`id`, `pseudo_e`, `pseudo_r`, `message`, `msg`) VALUES
	(1, 'johnn', 'totole', 'slt gros pd', 1),
	(4, 'johnn', 'nicolas', 'ezez', 1),
	(6, 'johnn', 'antoine', 'cc', 1),
	(8, 'johnn', 'antoine', 'coucou', 1),
	(9, 'johnn', 'antoine', 'hey', 1);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
