-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 25 Septembre 2015 à 18:54
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `projet_cp`
--

-- --------------------------------------------------------

--
-- Structure de la table `atelier`
--

CREATE TABLE IF NOT EXISTS `atelier` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Titre` varchar(250) NOT NULL,
  `Theme` varchar(250) NOT NULL,
  `Type` varchar(250) NOT NULL,
  `Laboratoire` int(11) NOT NULL,
  `Duree` int(11) NOT NULL,
  `Capacite` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `atelier`
--

INSERT INTO `atelier` (`Id`, `Titre`, `Theme`, `Laboratoire`, `Duree`, `Capacite`) VALUES
(3, 'Test d''atelier 1', 'Test de theme 1','Test de type 1', 6, 30, 12),
(4, 'Test d''atelier 2', 'Test de theme 2','Test de type 2',  7, 10, 5),
(5, 'Test d''atelier 2b', 'Test de theme 2b','Test de type 2b',  7, 30, 10),
(6, 'Test d''atelier 2c', 'Test de theme 2c','Test de type 2c',  7, 15, 115),
(7, 'Test d''atelier 2d', 'Test de theme 2d','Test de type 2d',  7, 45, 20),
(8, 'Test d''atelier 3', 'Test de theme 3','Test de type 3',  8, 45, 20),
(9, 'Test d''atelier 4', 'Test de theme 4','Test de type 4',  9, 1, 18),
(10, 'Test d''atelier 5', 'Test de theme 5','Test de type 5',  10, 1, 17),
(11, 'Test d''atelier 6', 'Test de theme 6','Test de type 6',  11, 30, 16),
(12, 'Test d''atelier 7', 'Test de theme 7','Test de type 7',  12, 20, 15),
(13, 'Test d''atelier 8', 'Test de theme 8','Test de type 8',  13, 1, 19),
(14, 'Test d''atelier 9', 'Test de theme 9','Test de type 9',  14, 30, 25),
(15, 'Test d''atelier 10', 'Test de theme 10','Test de type 10',  15, 1, 22);

-- --------------------------------------------------------

--
-- Structure de la table `horaire`
--

CREATE TABLE IF NOT EXISTS `horaire` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Lundi_m` tinyint(1) NOT NULL,
  `Lundi_ap` tinyint(1) NOT NULL,
  `Mardi_m` tinyint(1) NOT NULL,
  `Mardi_ap` tinyint(1) NOT NULL,
  `Mercredi_m` tinyint(1) NOT NULL,
  `Mercredi_ap` tinyint(1) NOT NULL,
  `Jeudi_m` tinyint(1) NOT NULL,
  `Jeudi_ap` tinyint(1) NOT NULL,
  `Vendredi_m` tinyint(1) NOT NULL,
  `Vendredi_ap` tinyint(1) NOT NULL,
  `IdAtelier` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `IdAtelier` (`IdAtelier`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `horaire`
--

INSERT INTO `horaire` (`Id`, `Lundi_m`, `Lundi_ap`, `Mardi_m`, `Mardi_ap`, `Mercredi_m`, `Mercredi_ap`, `Jeudi_m`, `Jeudi_ap`, `Vendredi_m`, `Vendredi_ap`, `IdAtelier`) VALUES
(1, 1, 0, 0, 1, 1, 0, 1, 0, 0, 1, 3),
(2, 0, 1, 0, 0, 1, 1, 0, 1, 0, 0, 4),
(3, 0, 1, 1, 0, 1, 1, 1, 0, 1, 0, 5),
(4, 1, 0, 1, 1, 1, 0, 1, 0, 1, 1, 6),
(5, 1, 0, 0, 1, 1, 0, 1, 0, 1, 1, 7),
(6, 1, 1, 0, 0, 0, 0, 0, 0, 1, 1, 8),
(7, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 9),
(8, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 10),
(9, 1, 0, 1, 1, 1, 0, 1, 1, 0, 0, 11),
(10, 0, 1, 1, 0, 1, 0, 0, 1, 1, 1, 12),
(11, 1, 1, 1, 0, 1, 0, 0, 0, 1, 0, 13),
(12, 1, 0, 0, 0, 0, 1, 0, 1, 0, 0, 14),
(13, 1, 1, 0, 0, 0, 1, 0, 1, 0, 1, 15);

-- --------------------------------------------------------

--
-- Structure de la table `laboratoire`
--

CREATE TABLE IF NOT EXISTS `laboratoire` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(250) NOT NULL,
  `Lieu` varchar(250) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `laboratoire`
--

INSERT INTO `laboratoire` (`Id`, `Nom`, `Lieu`) VALUES
(6, 'Test Laboratoire 1', '12 rue test 1'),
(7, 'Test Laboratoire 2', '12 rue test 2'),
(8, 'Test Laboratoire 3', '12 rue test 3'),
(9, 'Test Laboratoire 4', '12 rue test 4'),
(10, 'Test Laboratoire 5', '12 rue test 5'),
(11, 'Test Laboratoire 6', '12 rue test 6'),
(12, 'Test Laboratoire 7', '12 rue test 7'),
(13, 'Test Laboratoire 8', '12 rue test 8'),
(14, 'Test Laboratoire 9', '12 rue test 9'),
(15, 'Test Laboratoire 10', '12 rue test 10');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `atelier`
--
ALTER TABLE `atelier`
  ADD CONSTRAINT `atelier_ibfk_1` FOREIGN KEY (`Laboratoire`) REFERENCES `laboratoire` (`Id`);

--
-- Contraintes pour la table `horaire`
--
ALTER TABLE `horaire`
  ADD CONSTRAINT `horaire_ibfk_1` FOREIGN KEY (`IdAtelier`) REFERENCES `atelier` (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
