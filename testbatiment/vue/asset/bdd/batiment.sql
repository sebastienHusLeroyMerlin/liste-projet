-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 30 nov. 2022 à 23:54
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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `infos_map`
--

INSERT INTO `infos_map` (`id`, `nom_champ`, `description`, `valeur`) VALUES
(3, 'y_limit_world_map', 'Détermine la taille de la carte sur l\'axe des y', NULL),
(4, 'x_limit_world_map', 'Détermine la taille de la carte sur l\'axe des x', NULL),
(5, 'x_last_player', 'Indique la position maximal en y ou l\'on trouve un joueur', NULL),
(6, 'y_last_player', 'Indique la position maximal en y ou l\'on trouve un joueur', NULL);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id`, `pseudo`, `mail`, `pass`, `droit`) VALUES
(1, 'seb', 'bastoun3@free.fr', '123', 'membre'),
(2, 'roberto', 'roberto@gmail.com', '456', 'membre');

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
  `x_pos` int(11) NOT NULL,
  `y_pos` int(11) NOT NULL,
  `id_biome` int(11) NOT NULL,
  `id_relief` int(11) NOT NULL,
  `id_interest_point` int(11) DEFAULT NULL,
  `id_check_point` int(11) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
