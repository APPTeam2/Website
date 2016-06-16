-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 16 Juin 2016 à 17:42
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

-- --------------------------------------------------------

--
-- Structure de la table `accueillir`
--

DROP TABLE IF EXISTS `accueillir`;
CREATE TABLE IF NOT EXISTS `accueillir` (
  `idArtiste` int(11) NOT NULL,
  `idFestival` int(11) NOT NULL,
  PRIMARY KEY (`idArtiste`,`idFestival`),
  KEY `FK_accueillir_idFestival` (`idFestival`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

DROP TABLE IF EXISTS `artiste`;
CREATE TABLE IF NOT EXISTS `artiste` (
  `idArtiste` int(11) NOT NULL AUTO_INCREMENT,
  `nomArtiste` varchar(25) NOT NULL,
  PRIMARY KEY (`idArtiste`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `billet`
--

DROP TABLE IF EXISTS `billet`;
CREATE TABLE IF NOT EXISTS `billet` (
  `idBillet` int(11) NOT NULL AUTO_INCREMENT,
  `nomTitulaire` varchar(25) NOT NULL,
  `prenomTitulaire` varchar(25) NOT NULL,
  `dateDebutBillet` date NOT NULL,
  `dateFinBillet` date NOT NULL,
  `idFestival` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idBillet`),
  KEY `FK_billet_idFestival` (`idFestival`),
  KEY `FK_billet_idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `concert`
--

DROP TABLE IF EXISTS `concert`;
CREATE TABLE IF NOT EXISTS `concert` (
  `idConcert` int(11) NOT NULL AUTO_INCREMENT,
  `dateConcert` date NOT NULL,
  `heureDebut` time NOT NULL,
  `idFestival` int(11) NOT NULL,
  PRIMARY KEY (`idConcert`),
  KEY `FK_concert_idFestival` (`idFestival`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `festival`
--

DROP TABLE IF EXISTS `festival`;
CREATE TABLE IF NOT EXISTS `festival` (
  `idFestival` int(11) NOT NULL AUTO_INCREMENT,
  `theme` varchar(255) DEFAULT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `placeMax` int(11) NOT NULL,
  `prixBillet3Jours` decimal(15,3) NOT NULL,
  `prixBillet1Jour` decimal(15,3) NOT NULL,
  PRIMARY KEY (`idFestival`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `jouer`
--

DROP TABLE IF EXISTS `jouer`;
CREATE TABLE IF NOT EXISTS `jouer` (
  `idConcert` int(11) NOT NULL,
  `idArtiste` int(11) NOT NULL,
  PRIMARY KEY (`idConcert`,`idArtiste`),
  KEY `FK_jouer_idArtiste` (`idArtiste`)
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
  `nomUser` varchar(25) NOT NULL,
  `prenomUser` varchar(25) NOT NULL,
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
-- Contraintes pour la table `accueillir`
--
ALTER TABLE `accueillir`
  ADD CONSTRAINT `FK_accueillir_idArtiste` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`idArtiste`),
  ADD CONSTRAINT `FK_accueillir_idFestival` FOREIGN KEY (`idFestival`) REFERENCES `festival` (`idFestival`);

--
-- Contraintes pour la table `billet`
--
ALTER TABLE `billet`
  ADD CONSTRAINT `FK_billet_idFestival` FOREIGN KEY (`idFestival`) REFERENCES `festival` (`idFestival`),
  ADD CONSTRAINT `FK_billet_idUser` FOREIGN KEY (`idUser`) REFERENCES `utilisateur` (`idUser`);

--
-- Contraintes pour la table `concert`
--
ALTER TABLE `concert`
  ADD CONSTRAINT `FK_concert_idFestival` FOREIGN KEY (`idFestival`) REFERENCES `festival` (`idFestival`);

--
-- Contraintes pour la table `jouer`
--
ALTER TABLE `jouer`
  ADD CONSTRAINT `FK_jouer_idArtiste` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`idArtiste`),
  ADD CONSTRAINT `FK_jouer_idConcert` FOREIGN KEY (`idConcert`) REFERENCES `concert` (`idConcert`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
