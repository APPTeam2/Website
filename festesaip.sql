-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 14 Juin 2016 à 07:41
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `festesaip`
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
  KEY `FK_Accueillir_idFestival` (`idFestival`)
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `artiste`
--

INSERT INTO `artiste` (`idArtiste`, `nomArtiste`) VALUES
(1, 'Edith Piaf'),
(2, 'NIRVANA'),
(3, 'Daft Punk'),
(4, 'The Beatles'),
(5, 'AC/DC'),
(6, 'SCORPION'),
(7, 'Boby La Pointe'),
(8, 'U1 retour aux sources');

-- --------------------------------------------------------

--
-- Structure de la table `billet`
--

DROP TABLE IF EXISTS `billet`;
CREATE TABLE IF NOT EXISTS `billet` (
  `idBillet` int(11) NOT NULL AUTO_INCREMENT,
  `nomTitulaire` varchar(25) NOT NULL,
  `prenomTitulaire` varchar(25) NOT NULL,
  `idFestival` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idBillet`),
  KEY `FK_BILLET_idFestival` (`idFestival`),
  KEY `FK_BILLET_idUser` (`idUser`)
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
  KEY `FK_CONCERT_idFestival` (`idFestival`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `concert`
--

INSERT INTO `concert` (`idConcert`, `dateConcert`, `heureDebut`, `idFestival`) VALUES
(1, '2000-01-01', '18:00:00', 1),
(2, '2000-01-02', '18:00:00', 1),
(3, '2001-01-01', '18:00:00', 3),
(4, '2001-01-02', '18:00:00', 3),
(5, '2002-01-01', '18:00:00', 4),
(6, '2002-01-02', '18:00:00', 4);

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
  PRIMARY KEY (`idFestival`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `festival`
--

INSERT INTO `festival` (`idFestival`, `theme`, `dateDebut`, `dateFin`) VALUES
(1, 'Fest''ESAIP 2000', '2000-01-01', '2000-01-03'),
(3, 'Fest''ESAIP 2001', '2001-01-01', '2001-01-01'),
(4, 'Fest''ESAIP 2002', '2002-01-01', '2002-01-03');

-- --------------------------------------------------------

--
-- Structure de la table `jouer`
--

DROP TABLE IF EXISTS `jouer`;
CREATE TABLE IF NOT EXISTS `jouer` (
  `idConcert` int(11) NOT NULL,
  `idArtiste` int(11) NOT NULL,
  PRIMARY KEY (`idConcert`,`idArtiste`),
  KEY `FK_Jouer_idArtiste` (`idArtiste`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `jouer`
--

INSERT INTO `jouer` (`idConcert`, `idArtiste`) VALUES
(1, 1),
(2, 3),
(3, 4),
(4, 5),
(6, 6),
(2, 7),
(5, 8);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUser`, `login`, `password`, `nomUser`, `prenomUser`, `civilite`, `mail`, `actif`) VALUES
(1, 'antoine', 'ab4f63f9ac65152575886860dde480a1', 'guillot', 'antoine', 'M', 'aguillot.ir2018@esaip.org', 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `accueillir`
--
ALTER TABLE `accueillir`
  ADD CONSTRAINT `FK_Accueillir_idArtiste` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`idArtiste`),
  ADD CONSTRAINT `FK_Accueillir_idFestival` FOREIGN KEY (`idFestival`) REFERENCES `festival` (`idFestival`);

--
-- Contraintes pour la table `billet`
--
ALTER TABLE `billet`
  ADD CONSTRAINT `FK_BILLET_idFestival` FOREIGN KEY (`idFestival`) REFERENCES `festival` (`idFestival`),
  ADD CONSTRAINT `FK_BILLET_idUser` FOREIGN KEY (`idUser`) REFERENCES `utilisateur` (`idUser`);

--
-- Contraintes pour la table `concert`
--
ALTER TABLE `concert`
  ADD CONSTRAINT `FK_CONCERT_idFestival` FOREIGN KEY (`idFestival`) REFERENCES `festival` (`idFestival`);

--
-- Contraintes pour la table `jouer`
--
ALTER TABLE `jouer`
  ADD CONSTRAINT `FK_Jouer_idArtiste` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`idArtiste`),
  ADD CONSTRAINT `FK_Jouer_idConcert` FOREIGN KEY (`idConcert`) REFERENCES `concert` (`idConcert`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
