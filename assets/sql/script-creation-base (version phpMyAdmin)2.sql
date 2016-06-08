-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 03 Juin 2016 à 16:26
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Structure de la table `achete`
--

DROP TABLE IF EXISTS `achete`;
CREATE TABLE IF NOT EXISTS `achete` (
  `idUser` int(11) NOT NULL,
  `idBillet` int(11) NOT NULL,
  PRIMARY KEY (`idUser`,`idBillet`),
  KEY `FK_Achete_idBillet` (`idBillet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

DROP TABLE IF EXISTS `artiste`;
CREATE TABLE IF NOT EXISTS `artiste` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `billet`
--

DROP TABLE IF EXISTS `billet`;
CREATE TABLE IF NOT EXISTS `billet` (
  `idBillet` int(11) NOT NULL AUTO_INCREMENT,
  `nomPossesseur` varchar(25) NOT NULL,
  `prenomPossesseur` varchar(25) NOT NULL,
  PRIMARY KEY (`idBillet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `festesaip`
--

DROP TABLE IF EXISTS `festesaip`;
CREATE TABLE IF NOT EXISTS `festesaip` (
  `idFestESAIP` int(11) NOT NULL AUTO_INCREMENT,
  `theme` varchar(25) DEFAULT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `placeMax` int(11) NOT NULL,
  PRIMARY KEY (`idFestESAIP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `joue`
--

DROP TABLE IF EXISTS `joue`;
CREATE TABLE IF NOT EXISTS `joue` (
  `idUser` int(11) NOT NULL,
  `idFestESAIP` int(11) NOT NULL,
  PRIMARY KEY (`idUser`,`idFestESAIP`),
  KEY `FK_Joue_idFestESAIP` (`idFestESAIP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reserve`
--

DROP TABLE IF EXISTS `reserve`;
CREATE TABLE IF NOT EXISTS `reserve` (
  `idBillet` int(11) NOT NULL,
  `idFestESAIP` int(11) NOT NULL,
  PRIMARY KEY (`idBillet`,`idFestESAIP`),
  KEY `FK_Reserve_idFestESAIP` (`idFestESAIP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `civilite` varchar(25) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `actif` tinyint(1) NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `achete`
--
ALTER TABLE `achete`
  ADD CONSTRAINT `FK_Achete_idBillet` FOREIGN KEY (`idBillet`) REFERENCES `billet` (`idBillet`),
  ADD CONSTRAINT `FK_Achete_idUser` FOREIGN KEY (`idUser`) REFERENCES `utilisateur` (`idUser`);

--
-- Contraintes pour la table `joue`
--
ALTER TABLE `joue`
  ADD CONSTRAINT `FK_Joue_idFestESAIP` FOREIGN KEY (`idFestESAIP`) REFERENCES `festesaip` (`idFestESAIP`),
  ADD CONSTRAINT `FK_Joue_idUser` FOREIGN KEY (`idUser`) REFERENCES `artiste` (`idUser`);

--
-- Contraintes pour la table `reserve`
--
ALTER TABLE `reserve`
  ADD CONSTRAINT `FK_Reserve_idBillet` FOREIGN KEY (`idBillet`) REFERENCES `billet` (`idBillet`),
  ADD CONSTRAINT `FK_Reserve_idFestESAIP` FOREIGN KEY (`idFestESAIP`) REFERENCES `festesaip` (`idFestESAIP`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
