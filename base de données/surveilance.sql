-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 15 jan. 2022 à 23:38
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `surveilance`
--

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

DROP TABLE IF EXISTS `agent`;
CREATE TABLE IF NOT EXISTS `agent` (
  `code_agent` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(20) COLLATE utf8_bin NOT NULL,
  `date_naissance` date NOT NULL,
  `nationalite` varchar(20) COLLATE utf8_bin NOT NULL,
  `mission` int(11) DEFAULT NULL,
  `specialite` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `Code_identification` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`code_agent`),
  KEY `code_mission` (`mission`),
  KEY `code_specialite` (`specialite`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `agent`
--

INSERT INTO `agent` (`code_agent`, `nom`, `prenom`, `date_naissance`, `nationalite`, `mission`, `specialite`, `Code_identification`) VALUES
(17, 'AFFALOU', 'marie-line', '2022-01-19', 'Fran', NULL, 'Surveillance Nocturne', 'l,mmlkml');

-- --------------------------------------------------------

--
-- Structure de la table `cible`
--

DROP TABLE IF EXISTS `cible`;
CREATE TABLE IF NOT EXISTS `cible` (
  `code_cible` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(60) COLLATE utf8_bin NOT NULL,
  `date_naissance` date NOT NULL,
  `nationalite` varchar(60) COLLATE utf8_bin NOT NULL,
  `code_mission` int(11) DEFAULT NULL,
  PRIMARY KEY (`code_cible`),
  KEY `code_mission` (`code_mission`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `cible`
--

INSERT INTO `cible` (`code_cible`, `nom`, `prenom`, `date_naissance`, `nationalite`, `code_mission`) VALUES
(2, 'ff', 'll', '2021-10-10', 'fr', 1);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `code_contact` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(50) COLLATE utf8_bin NOT NULL,
  `date_naissance` date NOT NULL,
  `nationalite` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`code_contact`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `mission`
--

DROP TABLE IF EXISTS `mission`;
CREATE TABLE IF NOT EXISTS `mission` (
  `Code` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `Titre` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `Statut` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `Pays` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `Type` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `code_specialite` int(11) DEFAULT NULL,
  PRIMARY KEY (`Code`),
  KEY `code_specialite` (`code_specialite`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `mission`
--

INSERT INTO `mission` (`Code`, `Description`, `Titre`, `Statut`, `Pays`, `date_debut`, `date_fin`, `Type`, `code_specialite`) VALUES
(26, 'xsx', 'ss', 'En preparation', 'dc', '2021-10-16', '2021-10-07', 'S', 10);

-- --------------------------------------------------------

--
-- Structure de la table `planque`
--

DROP TABLE IF EXISTS `planque`;
CREATE TABLE IF NOT EXISTS `planque` (
  `code_planque` int(11) NOT NULL,
  `pays` varchar(50) COLLATE utf8_bin NOT NULL,
  `type` varchar(50) COLLATE utf8_bin NOT NULL,
  `adresse` varchar(100) COLLATE utf8_bin NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `planque`
--

INSERT INTO `planque` (`code_planque`, `pays`, `type`, `adresse`, `id`) VALUES
(1, 'FR', 't1', '3rue', 2);

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

DROP TABLE IF EXISTS `specialite`;
CREATE TABLE IF NOT EXISTS `specialite` (
  `code_specialite` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_bin NOT NULL,
  `Domaine` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`code_specialite`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `specialite`
--

INSERT INTO `specialite` (`code_specialite`, `nom`, `Domaine`) VALUES
(11, 'Surveillance Nocturne', 'Securite');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `code_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(50) COLLATE utf8_bin NOT NULL,
  `adresse_mail` varchar(50) COLLATE utf8_bin NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(50) COLLATE utf8_bin NOT NULL,
  `login` varchar(100) COLLATE utf8_bin NOT NULL,
  `pswd` varchar(100) COLLATE utf8_bin NOT NULL,
  `etat` int(11) NOT NULL,
  PRIMARY KEY (`code_user`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`code_user`, `nom`, `prenom`, `adresse_mail`, `date_creation`, `role`, `login`, `pswd`, `etat`) VALUES
(1, 'NEGIB', 'SEYID', 'admin@gmail.com', '2021-10-23 10:32:37', 'ADMIN', 'admin', '202cb962ac59075b964b07152d234b70', 1),
(2, 'user1', 'user1', 'user1@gmail.com', '2021-10-23 10:32:37', 'VISITEUR', 'user1', '202cb962ac59075b964b07152d234b70', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
