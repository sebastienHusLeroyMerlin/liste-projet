-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 12 déc. 2022 à 11:45
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `batiment`
--

-- --------------------------------------------------------

--
-- Structure de la table `batiment`
--

DROP TABLE IF EXISTS `batiment`;
CREATE TABLE IF NOT EXISTS `batiment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomBatiment` varchar(255) NOT NULL,
  `bois` int(11) NOT NULL,
  `cire` int(11) NOT NULL,
  `eau` int(11) NOT NULL,
  `duree_construction` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `batiment`
--

INSERT INTO `batiment` (`id`, `nomBatiment`, `bois`, `cire`, `eau`, `duree_construction`) VALUES
(1, 'couveuse', 100, 100, 80, 10),
(2, 'solarium', 200, 50, 120, 25),
(3, 'Loge royale', 250, 300, 50, 300);

-- --------------------------------------------------------

--
-- Structure de la table `billet`
--

DROP TABLE IF EXISTS `billet`;
CREATE TABLE IF NOT EXISTS `billet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auteur` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `dateMessage` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `billet`
--

INSERT INTO `billet` (`id`, `auteur`, `titre`, `message`, `dateMessage`) VALUES
(1, 'seb', 'un billet qui dechire', 'test de billet si tout vas bien', '2018-01-07 14:12:45'),
(3, 'seb', 'insertion d un nouveau billet depuis le blog', 'juste pour le fun et voir si je me suis planté ou pas ', '2018-01-04 23:36:12'),
(5, 'seb', 'voyons quel megalodon allons nous chasser', 'celui de la grande tante henriette', '2018-01-05 00:37:03'),
(7, 'seb', 'steak/frite', 'j aime les frites', '2018-01-07 14:15:02'),
(8, 'seb', 'petit papa noel', '123654789', '2018-01-07 16:10:33'),
(9, 'seb', 'ùmlk', 'ertyui', '2018-01-07 16:25:29'),
(10, 'seb', 'test', 'rdfghjk', '2018-01-07 16:37:25'),
(11, 'seb', 'prout', 'erfgbn,kgfvbn', '2018-01-07 16:54:02'),
(12, 'seb', 'trop tard', '00h23', '2018-01-08 10:07:59'),
(13, 'seb', 'le petit escargot qui tombe', 'zut flute crotte de pomme de terre je suis tombé dans la cafetiere', '2018-01-08 10:08:58'),
(14, 'seb', '123654', 'kfhjd,nfbsdvs', '2018-01-08 10:11:33'),
(15, 'seb', 'rdrg wf', 'xdfh x', '2018-01-08 10:36:56'),
(16, 'seb', 'dfghbn, ;', 'vjknl!', '2018-01-08 10:40:18'),
(17, 'seb', 'ertyuijlm', 'fghjbn,;:!', '2018-01-08 10:43:14'),
(18, 'seb', 'sdfvkn', ' bn,;', '2018-01-08 10:43:48'),
(19, 'seb', 'tfuygiuguigiyug', ' bn,;hhfygfiyg', '2018-01-08 10:44:47'),
(20, 'seb', 'tsqywtjgfkj', 'tout vas bien ? ', '2018-01-08 19:35:49'),
(21, 'seb', 'steak/frite', 'seb', '2018-06-06 15:04:57');

-- --------------------------------------------------------

--
-- Structure de la table `biome`
--

DROP TABLE IF EXISTS `biome`;
CREATE TABLE IF NOT EXISTS `biome` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `img_name` tinytext NOT NULL,
  `name` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `biome`
--

INSERT INTO `biome` (`id`, `description`, `img_name`, `name`) VALUES
(1, '', '', 'desert'),
(2, '', '', 'tundras'),
(3, '', '', 'wet_forest'),
(4, '', '', 'temperate_forest'),
(5, '', '', 'dry_maquis'),
(6, '', '', 'steppe'),
(7, '', '', 'dry_forest'),
(8, '', '', 'maquis'),
(9, '', '', 'tropical_forest'),
(10, '', '', 'rainforest');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auteur` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `dateCommentaire` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idBillet` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `auteur`, `commentaire`, `dateCommentaire`, `idBillet`) VALUES
(1, 'seb', 'je modifie ce commentaire LALALALALAAL', '1700-08-13 00:00:00', 1),
(2, 'seb', 'et maintenant j en fais un nouveau pour voir si la date est bonne CECI EST UN MESSAGE MODIFI2 PAR MOI MEME \r\n', '2000-07-03 00:00:00', 1),
(4, 'seb', 'voyons ce qui se passe maitenant', '2018-01-05 00:33:25', 3),
(5, 'seb', 'l h s affiche et c est nikel \r\n', '2018-01-05 00:33:36', 3),
(6, 'seb', 'un nouveau message\r\n', '2018-01-05 00:37:47', 3),
(7, 'seb', 'grave', '2018-01-05 00:38:20', 5),
(8, 'seb', 'ce message aura t il l id 1 ?vas savoir', '2018-01-05 08:34:21', 1),
(23, 'seb', 'encore un \r\n', '2018-01-05 21:50:48', 3),
(24, 'seb', '123456', '2018-01-05 22:08:40', 5),
(25, 'seb', '123456', '2018-01-05 22:09:03', 5),
(26, 'seb', '123456', '2018-01-05 22:09:18', 5),
(28, 'seb', 'encore 2', '2018-01-05 22:14:23', 3),
(29, 'seb', 'ertyhjklm', '2018-01-05 22:19:46', 5),
(30, 'seb', 'zertyuim', '2018-01-05 22:35:14', 5),
(31, 'seb', 'zertyuim', '2018-01-05 22:39:41', 5),
(32, 'seb', 'zertyuim', '2018-01-05 22:40:57', 5),
(35, 'seb', 'vive les champignons\r\n', '2018-01-07 13:22:10', 3),
(36, 'seb', 'vive les var_dump();', '2018-01-07 13:26:20', 3),
(37, 'seb', 'vive les var_dump();', '2018-01-07 13:27:28', 3),
(38, 'seb', 'sdfghjklm123', '2018-01-07 13:45:49', 3),
(41, 'seb', 'alphonse', '2018-01-07 14:01:20', 5),
(42, 'seb', 'alphonse', '2018-01-07 14:02:35', 5),
(43, 'seb', 'alphonse', '2018-01-07 14:02:40', 5),
(44, 'seb', 'sdfghjk;:', '2018-01-08 10:11:42', 14),
(45, 'seb', 'sdfghjk;:', '2018-01-08 10:11:55', 14),
(46, 'seb', 'xvwcxbcbv', '2018-01-08 10:12:00', 14),
(47, 'seb', 'oups la', '2018-01-08 10:12:15', 14),
(48, 'seb', 'dudeu-r-riy', '2018-01-08 10:45:00', 19),
(49, 'seb', 'j aime la confiture', '2018-01-08 10:49:09', 19),
(50, 'seb', 'j aime la confiture a la prune', '2018-01-08 10:54:30', 19),
(51, 'seb', 'et  toi', '2018-01-08 10:59:26', 19),
(52, 'seb', 'ou la ', '2018-01-08 10:59:35', 18),
(54, 'seb', 'henri emile zola\r\n', '2018-01-08 14:55:29', 3),
(56, 'seb', 'SDGFGFN??HNG', '2018-01-08 19:33:58', 12),
(57, 'seb', 'GDHFNFH?HGH', '2018-01-08 19:34:00', 12),
(59, 'seb', 'SQSFGFG.?gggggggggggggggggggggggggggggggggggggggg', '2018-01-08 19:35:57', 20),
(60, 'seb', 'cvcbn,nj,l;!jjjjjugèu', '2018-01-08 19:40:47', 10),
(61, 'seb', 'rthjklm', '2018-01-09 20:17:54', 13),
(62, 'seb', 'ihoiuyotiru', '2018-01-10 08:40:20', 1),
(65, 'robert', 'et meme des yeux avec des oreilles\r\n\r\n', '2018-01-10 08:53:25', 1),
(66, 'robert', 'encore un test \r\n', '2018-01-10 08:58:26', 1),
(68, 'robert', 'cqbsndggcjhblkn', '2018-01-10 08:58:40', 1),
(69, 'seb', 'aujourdhui 6/06/2018', '2018-06-06 15:03:48', 1),
(70, 'seb', 'dfghjk', '2018-06-06 15:04:31', 3);

-- --------------------------------------------------------

--
-- Structure de la table `infos_map`
--

DROP TABLE IF EXISTS `infos_map`;
CREATE TABLE IF NOT EXISTS `infos_map` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_champ` tinytext NOT NULL,
  `description` text NOT NULL,
  `valeur` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `infos_map`
--

INSERT INTO `infos_map` (`id`, `nom_champ`, `description`, `valeur`) VALUES
(3, 'y_limit_world_map', 'Détermine la taille de la carte sur l\'axe des y', '13'),
(4, 'x_limit_world_map', 'Détermine la taille de la carte sur l\'axe des x', '13'),
(5, 'x_last_player', 'Indique la position maximal en y ou l\'on trouve un joueur', '6'),
(6, 'y_last_player', 'Indique la position maximal en y ou l\'on trouve un joueur', '1'),
(9, 'x_last_limit', '', '6'),
(10, 'y_last_limit', '', '6');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pass` text NOT NULL,
  `droit` varchar(255) NOT NULL,
  `id_race` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id`, `pseudo`, `mail`, `pass`, `droit`, `id_race`) VALUES
(1, 'seb', 'bastoun3@free.fr', '123', 'membre', 2),
(2, 'roberto', 'roberto@gmail.com', '456', 'membre', 3);

-- --------------------------------------------------------

--
-- Structure de la table `race`
--

DROP TABLE IF EXISTS `race`;
CREATE TABLE IF NOT EXISTS `race` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `race_name` tinytext NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `race`
--

INSERT INTO `race` (`id`, `race_name`, `description`) VALUES
(1, 'Araignées', ''),
(2, 'Fourmis', ''),
(3, 'Abeilles', ''),
(4, 'Termites', ''),
(5, 'Frelons', '');

-- --------------------------------------------------------

--
-- Structure de la table `recap`
--

DROP TABLE IF EXISTS `recap`;
CREATE TABLE IF NOT EXISTS `recap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `couveuse` int(11) NOT NULL,
  `solarium` int(11) NOT NULL,
  `id_joueur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recap`
--

INSERT INTO `recap` (`id`, `couveuse`, `solarium`, `id_joueur`) VALUES
(2, 13, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `ressource`
--

DROP TABLE IF EXISTS `ressource`;
CREATE TABLE IF NOT EXISTS `ressource` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_joueur` int(11) NOT NULL,
  `bois_total` int(11) NOT NULL,
  `cire_total` int(11) NOT NULL,
  `eau_total` int(11) NOT NULL,
  `argile_total` int(11) NOT NULL,
  `nourriture_total` int(11) NOT NULL,
  `ouvriere_bois_plaine` int(11) NOT NULL,
  `ouvriere_bois_marecage` int(11) NOT NULL,
  `ouvriere_bois_foret` int(11) NOT NULL,
  `ouvriere_cire` int(11) NOT NULL,
  `ouvriere_argile` int(11) NOT NULL,
  `ouvriere_argile_plaine` int(11) NOT NULL,
  `ouvriere_argile_foret` int(11) NOT NULL,
  `ouvriere_argile_marecage` int(11) NOT NULL,
  `ouvriere_eau` int(11) NOT NULL,
  `ouvriere_eau_plaine` int(11) NOT NULL,
  `ouvriere_eau_foret` int(11) NOT NULL,
  `ouvriere_eau_marecage` int(11) NOT NULL,
  `ouvriere_nourriture_plaine` int(11) NOT NULL,
  `ouvriere_nourriture_foret` int(11) NOT NULL,
  `ouvriere_nourriture_marecage` int(11) NOT NULL,
  `ouvriere_total` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ressource`
--

INSERT INTO `ressource` (`id`, `id_joueur`, `bois_total`, `cire_total`, `eau_total`, `argile_total`, `nourriture_total`, `ouvriere_bois_plaine`, `ouvriere_bois_marecage`, `ouvriere_bois_foret`, `ouvriere_cire`, `ouvriere_argile`, `ouvriere_argile_plaine`, `ouvriere_argile_foret`, `ouvriere_argile_marecage`, `ouvriere_eau`, `ouvriere_eau_plaine`, `ouvriere_eau_foret`, `ouvriere_eau_marecage`, `ouvriere_nourriture_plaine`, `ouvriere_nourriture_foret`, `ouvriere_nourriture_marecage`, `ouvriere_total`) VALUES
(1, 1, 5669, 183777, 72063, 584890, 47460, 55, 55, 955, 5560, 0, 0, 0, 0, 0, 0, 410, 355, 65, 15, 60, 10000);

-- --------------------------------------------------------

--
-- Structure de la table `section`
--

DROP TABLE IF EXISTS `section`;
CREATE TABLE IF NOT EXISTS `section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sectionBlog` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `world_map`
--

DROP TABLE IF EXISTS `world_map`;
CREATE TABLE IF NOT EXISTS `world_map` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_player` int(11) DEFAULT NULL,
  `id_colo` int(11) DEFAULT NULL,
  `x_pos` int(11) NOT NULL,
  `y_pos` int(11) NOT NULL,
  `id_interest_point` int(11) DEFAULT NULL,
  `id_check_point` int(11) DEFAULT NULL,
  `id_climat` int(11) DEFAULT NULL,
  `id_relief` int(11) NOT NULL,
  `id_humidite` int(11) DEFAULT NULL,
  `id_biome` int(11) NOT NULL,
  PRIMARY KEY (`x_pos`,`y_pos`),
  UNIQUE KEY `x_pos` (`x_pos`,`y_pos`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=197 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `world_map`
--

INSERT INTO `world_map` (`id`, `id_player`, `id_colo`, `x_pos`, `y_pos`, `id_interest_point`, `id_check_point`, `id_climat`, `id_relief`, `id_humidite`, `id_biome`) VALUES
(1, NULL, NULL, 0, 0, NULL, NULL, 1, 1, 2, 2),
(8, 1, NULL, 0, 1, NULL, NULL, 1, 2, 3, 4),
(15, NULL, NULL, 0, 2, NULL, NULL, 3, 2, 6, 1),
(22, NULL, NULL, 0, 3, NULL, NULL, 4, 3, 2, 3),
(29, 1, NULL, 0, 4, NULL, NULL, 1, 2, 3, 4),
(36, NULL, NULL, 0, 5, NULL, NULL, 1, 1, 4, 2),
(43, 1, NULL, 0, 6, NULL, NULL, 1, 2, 3, 4),
(99, NULL, NULL, 0, 7, NULL, NULL, 1, 1, 1, 2),
(113, NULL, NULL, 0, 8, NULL, NULL, 2, 2, 4, 5),
(127, NULL, NULL, 0, 9, NULL, NULL, 5, 3, 6, 8),
(141, NULL, NULL, 0, 10, NULL, NULL, 2, 2, 2, 3),
(155, NULL, NULL, 0, 11, NULL, NULL, 1, 1, 4, 2),
(169, NULL, NULL, 0, 12, NULL, NULL, 4, 3, 2, 3),
(183, NULL, NULL, 0, 13, NULL, NULL, 1, 1, 4, 2),
(2, NULL, NULL, 1, 0, NULL, NULL, 4, 3, 2, 3),
(9, NULL, NULL, 1, 1, NULL, NULL, 1, 1, 2, 2),
(16, NULL, NULL, 1, 2, NULL, NULL, 4, 3, 2, 3),
(23, 1, NULL, 1, 3, NULL, NULL, 1, 2, 3, 4),
(30, NULL, NULL, 1, 4, NULL, NULL, 1, 1, 3, 2),
(37, 1, NULL, 1, 5, NULL, NULL, 1, 2, 3, 4),
(44, NULL, NULL, 1, 6, NULL, NULL, 4, 3, 1, 9),
(100, NULL, NULL, 1, 7, NULL, NULL, 1, 1, 1, 2),
(114, NULL, NULL, 1, 8, NULL, NULL, 5, 3, 1, 9),
(128, NULL, NULL, 1, 9, NULL, NULL, 4, 3, 2, 3),
(142, NULL, NULL, 1, 10, NULL, NULL, 3, 2, 2, 3),
(156, NULL, NULL, 1, 11, NULL, NULL, 1, 1, 1, 2),
(170, NULL, NULL, 1, 12, NULL, NULL, 2, 2, 4, 5),
(184, NULL, NULL, 1, 13, NULL, NULL, 1, 1, 3, 2),
(3, NULL, NULL, 2, 0, NULL, NULL, 3, 2, 1, 10),
(10, NULL, NULL, 2, 1, NULL, NULL, 5, 3, 3, 4),
(17, 1, NULL, 2, 2, NULL, NULL, 1, 2, 3, 4),
(24, NULL, NULL, 2, 3, NULL, NULL, 1, 1, 4, 2),
(31, NULL, NULL, 2, 4, NULL, NULL, 4, 3, 2, 3),
(38, NULL, NULL, 2, 5, NULL, NULL, 1, 1, 3, 2),
(45, NULL, NULL, 2, 6, NULL, NULL, 2, 2, 4, 5),
(101, NULL, NULL, 2, 7, NULL, NULL, 2, 2, 1, 10),
(115, NULL, NULL, 2, 8, NULL, NULL, 5, 3, 8, 1),
(129, NULL, NULL, 2, 9, NULL, NULL, 4, 3, 5, 8),
(143, NULL, NULL, 2, 10, NULL, NULL, 2, 2, 5, 1),
(157, NULL, NULL, 2, 11, NULL, NULL, 1, 1, 2, 2),
(171, NULL, NULL, 2, 12, NULL, NULL, 1, 1, 3, 2),
(185, NULL, NULL, 2, 13, NULL, NULL, 1, 1, 3, 2),
(4, 1, NULL, 3, 0, NULL, NULL, 1, 2, 3, 4),
(11, 1, NULL, 3, 1, NULL, NULL, 1, 2, 3, 4),
(18, NULL, NULL, 3, 2, NULL, NULL, 3, 2, 2, 3),
(25, 1, NULL, 3, 3, NULL, NULL, 1, 2, 3, 4),
(32, 1, NULL, 3, 4, NULL, NULL, 1, 2, 3, 4),
(39, 1, NULL, 3, 5, NULL, NULL, 1, 2, 3, 4),
(46, NULL, NULL, 3, 6, NULL, NULL, 3, 2, 6, 1),
(102, NULL, NULL, 3, 7, NULL, NULL, 5, 3, 5, 7),
(116, NULL, NULL, 3, 8, NULL, NULL, 1, 1, 3, 2),
(130, NULL, NULL, 3, 9, NULL, NULL, 4, 3, 1, 9),
(144, NULL, NULL, 3, 10, NULL, NULL, 4, 3, 1, 9),
(158, NULL, NULL, 3, 11, NULL, NULL, 5, 3, 7, 8),
(172, NULL, NULL, 3, 12, NULL, NULL, 2, 2, 3, 4),
(186, NULL, NULL, 3, 13, NULL, NULL, 4, 3, 3, 4),
(5, NULL, NULL, 4, 0, NULL, NULL, 1, 1, 3, 2),
(12, 1, NULL, 4, 1, NULL, NULL, 1, 2, 3, 4),
(19, 1, NULL, 4, 2, NULL, NULL, 1, 2, 3, 4),
(26, NULL, NULL, 4, 3, NULL, NULL, 4, 3, 2, 3),
(33, NULL, NULL, 4, 4, NULL, NULL, 5, 3, 1, 9),
(40, NULL, NULL, 4, 5, NULL, NULL, 3, 2, 4, 6),
(47, 1, NULL, 4, 6, NULL, NULL, 1, 2, 3, 4),
(103, NULL, NULL, 4, 7, NULL, NULL, 1, 1, 2, 2),
(117, NULL, NULL, 4, 8, NULL, NULL, 4, 3, 6, 5),
(131, NULL, NULL, 4, 9, NULL, NULL, 5, 3, 6, 8),
(145, NULL, NULL, 4, 10, NULL, NULL, 2, 2, 3, 4),
(159, NULL, NULL, 4, 11, NULL, NULL, 3, 2, 4, 6),
(173, NULL, NULL, 4, 12, NULL, NULL, 4, 3, 2, 3),
(187, NULL, NULL, 4, 13, NULL, NULL, 5, 3, 6, 8),
(6, NULL, NULL, 5, 0, NULL, NULL, 4, 3, 6, 5),
(13, 1, NULL, 5, 1, NULL, NULL, 1, 2, 3, 4),
(20, NULL, NULL, 5, 2, NULL, NULL, 5, 3, 5, 7),
(27, NULL, NULL, 5, 3, NULL, NULL, 2, 2, 4, 5),
(34, NULL, NULL, 5, 4, NULL, NULL, 4, 3, 5, 8),
(41, 1, NULL, 5, 5, NULL, NULL, 1, 2, 3, 4),
(48, NULL, NULL, 5, 6, NULL, NULL, 4, 3, 5, 8),
(104, NULL, NULL, 5, 7, NULL, NULL, 5, 3, 4, 7),
(118, NULL, NULL, 5, 8, NULL, NULL, 1, 1, 4, 2),
(132, NULL, NULL, 5, 9, NULL, NULL, 5, 3, 8, 1),
(146, NULL, NULL, 5, 10, NULL, NULL, 5, 3, 8, 1),
(160, NULL, NULL, 5, 11, NULL, NULL, 3, 2, 2, 3),
(174, NULL, NULL, 5, 12, NULL, NULL, 4, 3, 7, 1),
(188, NULL, NULL, 5, 13, NULL, NULL, 3, 2, 6, 1),
(7, 1, NULL, 6, 0, NULL, NULL, 1, 2, 3, 4),
(14, 1, NULL, 6, 1, NULL, NULL, 1, 2, 3, 4),
(21, NULL, NULL, 6, 2, NULL, NULL, 2, 2, 2, 3),
(28, 1, NULL, 6, 3, NULL, NULL, 1, 2, 3, 4),
(35, 1, NULL, 6, 4, NULL, NULL, 1, 2, 3, 4),
(42, NULL, NULL, 6, 5, NULL, NULL, 3, 2, 3, 4),
(49, 1, NULL, 6, 6, NULL, NULL, 1, 2, 3, 4),
(105, NULL, NULL, 6, 7, NULL, NULL, 3, 2, 5, 5),
(119, NULL, NULL, 6, 8, NULL, NULL, 1, 1, 3, 2),
(133, NULL, NULL, 6, 9, NULL, NULL, 4, 3, 5, 8),
(147, NULL, NULL, 6, 10, NULL, NULL, 2, 2, 1, 10),
(161, NULL, NULL, 6, 11, NULL, NULL, 2, 2, 1, 10),
(175, NULL, NULL, 6, 12, NULL, NULL, 3, 2, 5, 5),
(189, NULL, NULL, 6, 13, NULL, NULL, 5, 3, 6, 8),
(50, 1, NULL, 7, 0, NULL, NULL, 1, 2, 3, 4),
(57, NULL, NULL, 7, 1, NULL, NULL, 3, 2, 6, 1),
(64, NULL, NULL, 7, 2, NULL, NULL, 2, 2, 2, 3),
(71, NULL, NULL, 7, 3, NULL, NULL, 2, 2, 2, 3),
(78, NULL, NULL, 7, 4, NULL, NULL, 2, 2, 2, 3),
(85, NULL, NULL, 7, 5, NULL, NULL, 3, 2, 2, 3),
(92, NULL, NULL, 7, 6, NULL, NULL, 1, 1, 4, 2),
(106, NULL, NULL, 7, 7, NULL, NULL, 3, 2, 5, 5),
(120, NULL, NULL, 7, 8, NULL, NULL, 4, 3, 2, 3),
(134, NULL, NULL, 7, 9, NULL, NULL, 4, 3, 1, 9),
(148, NULL, NULL, 7, 10, NULL, NULL, 5, 3, 1, 9),
(162, NULL, NULL, 7, 11, NULL, NULL, 5, 3, 1, 9),
(176, NULL, NULL, 7, 12, NULL, NULL, 1, 1, 2, 2),
(190, NULL, NULL, 7, 13, NULL, NULL, 1, 1, 2, 2),
(51, NULL, NULL, 8, 0, NULL, NULL, 2, 2, 5, 1),
(58, NULL, NULL, 8, 1, NULL, NULL, 2, 2, 4, 5),
(65, NULL, NULL, 8, 2, NULL, NULL, 2, 2, 3, 4),
(72, NULL, NULL, 8, 3, NULL, NULL, 1, 1, 3, 2),
(79, NULL, NULL, 8, 4, NULL, NULL, 5, 3, 1, 9),
(86, NULL, NULL, 8, 5, NULL, NULL, 1, 1, 1, 2),
(93, NULL, NULL, 8, 6, NULL, NULL, 2, 2, 5, 1),
(107, NULL, NULL, 8, 7, NULL, NULL, 5, 3, 2, 3),
(121, NULL, NULL, 8, 8, NULL, NULL, 1, 1, 4, 2),
(135, NULL, NULL, 8, 9, NULL, NULL, 1, 1, 3, 2),
(149, NULL, NULL, 8, 10, NULL, NULL, 4, 3, 3, 4),
(163, NULL, NULL, 8, 11, NULL, NULL, 2, 2, 3, 4),
(177, NULL, NULL, 8, 12, NULL, NULL, 5, 3, 2, 3),
(191, NULL, NULL, 8, 13, NULL, NULL, 4, 3, 1, 9),
(52, NULL, NULL, 9, 0, NULL, NULL, 2, 2, 2, 3),
(59, NULL, NULL, 9, 1, NULL, NULL, 3, 2, 4, 6),
(66, NULL, NULL, 9, 2, NULL, NULL, 5, 3, 7, 8),
(73, NULL, NULL, 9, 3, NULL, NULL, 2, 2, 1, 10),
(80, NULL, NULL, 9, 4, NULL, NULL, 2, 2, 4, 5),
(87, NULL, NULL, 9, 5, NULL, NULL, 3, 2, 2, 3),
(94, NULL, NULL, 9, 6, NULL, NULL, 1, 1, 4, 2),
(108, NULL, NULL, 9, 7, NULL, NULL, 3, 2, 2, 3),
(122, NULL, NULL, 9, 8, NULL, NULL, 2, 2, 5, 1),
(136, NULL, NULL, 9, 9, NULL, NULL, 2, 2, 1, 10),
(150, NULL, NULL, 9, 10, NULL, NULL, 3, 2, 4, 6),
(164, NULL, NULL, 9, 11, NULL, NULL, 5, 3, 4, 7),
(178, NULL, NULL, 9, 12, NULL, NULL, 1, 1, 2, 2),
(192, NULL, NULL, 9, 13, NULL, NULL, 5, 3, 3, 4),
(53, NULL, NULL, 10, 0, NULL, NULL, 2, 2, 2, 3),
(60, NULL, NULL, 10, 1, NULL, NULL, 5, 3, 3, 4),
(67, NULL, NULL, 10, 2, NULL, NULL, 5, 3, 8, 1),
(74, NULL, NULL, 10, 3, NULL, NULL, 3, 2, 1, 10),
(81, NULL, NULL, 10, 4, NULL, NULL, 3, 2, 3, 4),
(88, NULL, NULL, 10, 5, NULL, NULL, 3, 2, 6, 1),
(95, NULL, NULL, 10, 6, NULL, NULL, 2, 2, 3, 4),
(109, NULL, NULL, 10, 7, NULL, NULL, 3, 2, 2, 3),
(123, NULL, NULL, 10, 8, NULL, NULL, 2, 2, 4, 5),
(137, NULL, NULL, 10, 9, NULL, NULL, 3, 2, 1, 10),
(151, NULL, NULL, 10, 10, NULL, NULL, 3, 2, 2, 3),
(165, NULL, NULL, 10, 11, NULL, NULL, 2, 2, 1, 10),
(179, NULL, NULL, 10, 12, NULL, NULL, 5, 3, 8, 1),
(193, NULL, NULL, 10, 13, NULL, NULL, 2, 2, 5, 1),
(54, 1, NULL, 11, 0, NULL, NULL, 1, 2, 3, 4),
(61, NULL, NULL, 11, 1, NULL, NULL, 2, 2, 2, 3),
(68, NULL, NULL, 11, 2, NULL, NULL, 3, 2, 6, 1),
(75, NULL, NULL, 11, 3, NULL, NULL, 2, 2, 2, 3),
(82, NULL, NULL, 11, 4, NULL, NULL, 4, 3, 6, 5),
(89, NULL, NULL, 11, 5, NULL, NULL, 2, 2, 4, 5),
(96, NULL, NULL, 11, 6, NULL, NULL, 4, 3, 7, 1),
(110, NULL, NULL, 11, 7, NULL, NULL, 1, 1, 3, 2),
(124, NULL, NULL, 11, 8, NULL, NULL, 4, 3, 7, 1),
(138, NULL, NULL, 11, 9, NULL, NULL, 1, 1, 4, 2),
(152, NULL, NULL, 11, 10, NULL, NULL, 5, 3, 5, 7),
(166, NULL, NULL, 11, 11, NULL, NULL, 3, 2, 5, 5),
(180, NULL, NULL, 11, 12, NULL, NULL, 1, 1, 2, 2),
(194, NULL, NULL, 11, 13, NULL, NULL, 1, 1, 2, 2),
(55, NULL, NULL, 12, 0, NULL, NULL, 1, 1, 2, 2),
(62, NULL, NULL, 12, 1, NULL, NULL, 1, 1, 4, 2),
(69, NULL, NULL, 12, 2, NULL, NULL, 5, 3, 2, 3),
(76, NULL, NULL, 12, 3, NULL, NULL, 1, 1, 3, 2),
(83, NULL, NULL, 12, 4, NULL, NULL, 5, 3, 8, 1),
(90, NULL, NULL, 12, 5, NULL, NULL, 2, 2, 5, 1),
(97, NULL, NULL, 12, 6, NULL, NULL, 3, 2, 4, 6),
(111, NULL, NULL, 12, 7, NULL, NULL, 4, 3, 4, 7),
(125, NULL, NULL, 12, 8, NULL, NULL, 4, 3, 3, 4),
(139, NULL, NULL, 12, 9, NULL, NULL, 4, 3, 2, 3),
(153, NULL, NULL, 12, 10, NULL, NULL, 2, 2, 1, 10),
(167, NULL, NULL, 12, 11, NULL, NULL, 5, 3, 2, 3),
(181, NULL, NULL, 12, 12, NULL, NULL, 5, 3, 4, 7),
(195, NULL, NULL, 12, 13, NULL, NULL, 4, 3, 5, 8),
(56, NULL, NULL, 13, 0, NULL, NULL, 5, 3, 2, 3),
(63, NULL, NULL, 13, 1, NULL, NULL, 3, 2, 6, 1),
(70, NULL, NULL, 13, 2, NULL, NULL, 5, 3, 5, 7),
(77, NULL, NULL, 13, 3, NULL, NULL, 3, 2, 1, 10),
(84, NULL, NULL, 13, 4, NULL, NULL, 4, 3, 5, 8),
(91, NULL, NULL, 13, 5, NULL, NULL, 5, 3, 1, 9),
(98, NULL, NULL, 13, 6, NULL, NULL, 3, 2, 1, 10),
(112, NULL, NULL, 13, 7, NULL, NULL, 4, 3, 4, 7),
(126, NULL, NULL, 13, 8, NULL, NULL, 3, 2, 6, 1),
(140, NULL, NULL, 13, 9, NULL, NULL, 4, 3, 3, 4),
(154, NULL, NULL, 13, 10, NULL, NULL, 2, 2, 2, 3),
(168, NULL, NULL, 13, 11, NULL, NULL, 1, 1, 2, 2),
(182, NULL, NULL, 13, 12, NULL, NULL, 1, 1, 3, 2),
(196, NULL, NULL, 13, 13, NULL, NULL, 4, 3, 4, 7);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
