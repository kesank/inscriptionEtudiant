-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Mer 29 Juin 2016 à 11:27
-- Version du serveur: 5.1.36
-- Version de PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de données: `inscription`
--

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE IF NOT EXISTS `compte` (
  `numCpt` int(11) NOT NULL COMMENT 'numero du compte',
  `matEtud` varchar(10) NOT NULL COMMENT 'clé etrangere matricule etudiant',
  `sldCpt` int(20) NOT NULL COMMENT 'solde du copte',
  PRIMARY KEY (`numCpt`),
  UNIQUE KEY `numCpt` (`numCpt`),
  KEY `matEtud` (`matEtud`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `compte`
--

INSERT INTO `compte` (`numCpt`, `matEtud`, `sldCpt`) VALUES
(1023, '20160011', 600000),
(1072, '201615', 900000),
(4837, '2016002', 900000),
(6881, '201610', 1000000),
(6974, '20160013', 1000000),
(25349, '20160010', 600000),
(27666, '20160012', 600000),
(32092, '201608', 600000);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `matEtud` varchar(10) NOT NULL COMMENT 'matricule de l''etudiant',
  `nomEtud` varchar(15) DEFAULT NULL COMMENT 'nom de l''etudiant',
  `prenomEtud` varchar(25) DEFAULT NULL COMMENT 'prenom de l''etudiant',
  `emailEtud` varchar(30) DEFAULT NULL COMMENT 'Email de l''etudiant',
  `telEtud` varchar(20) DEFAULT NULL COMMENT 'téléphone de l''étudiant',
  `sexeEtud` char(1) DEFAULT NULL COMMENT 'sexe de l''etudiant',
  `dateNaissEtud` date DEFAULT NULL COMMENT 'date de naissance de l''etudiant',
  `refSit` int(11) DEFAULT NULL COMMENT 'reference de la situation',
  `codeFil` int(11) DEFAULT NULL COMMENT 'code de la filiere',
  `codeNiv` int(11) DEFAULT NULL COMMENT 'Code du niveau',
  PRIMARY KEY (`matEtud`),
  KEY `refSit` (`refSit`),
  KEY `codeFil` (`codeFil`),
  KEY `codeNiv` (`codeNiv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`matEtud`, `nomEtud`, `prenomEtud`, `emailEtud`, `telEtud`, `sexeEtud`, `dateNaissEtud`, `refSit`, `codeFil`, `codeNiv`) VALUES
('20160010', 'kaba', 'fanta', 'kabafanta@yahoo.com', '06488085', 'F', '1993-06-04', 1, 1, 2),
('20160011', 'djele', 'grace', 'djelegrace@yahoo.co', '47282703', 'F', '1996-06-02', 1, 2, 2),
('20160012', 'sie', 'affoua sabine', 'affouasabine@yahoo.com', '05121412', 'F', '1993-04-01', 2, 5, 2),
('20160013', 'yaro', 'ali', 'yaroali@yahoo.fr', '01021212', 'M', '1993-03-10', 2, 6, 5),
('2016002', 'konde', 'saran', '', '49442545', 'F', '1995-04-23', 1, 4, 4),
('201608', 'koua', 'kevin', 'kevin@gmail.com', '05658944', 'F', '2016-06-24', 1, 5, 2),
('201610', 'konami', 'batshuahy', 'lolololol@live.com', '07070808', 'M', '2222-12-12', 1, 1, 5),
('201615', 'doumbia', 'sidki', 'doum@gmail.com', '544555655', 'M', '2016-06-10', 2, 5, 4);

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE IF NOT EXISTS `filiere` (
  `codeFil` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Code filière',
  `libFil` varchar(15) NOT NULL COMMENT 'Libellé filière',
  PRIMARY KEY (`codeFil`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `filiere`
--

INSERT INTO `filiere` (`codeFil`, `libFil`) VALUES
(1, 'IDA'),
(2, 'RHCOM'),
(3, 'RIT'),
(4, 'FCG'),
(5, 'MARKETING'),
(6, 'DAF'),
(7, 'LOGISTIQUE');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE IF NOT EXISTS `inscription` (
  `refIns` int(11) NOT NULL COMMENT 'reference inscription',
  `dateIns` date NOT NULL COMMENT 'date de l''inscription',
  `matEtud` varchar(10) NOT NULL COMMENT 'matricule de l''etudiant',
  PRIMARY KEY (`refIns`),
  KEY `matEtud` (`matEtud`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `inscription`
--

INSERT INTO `inscription` (`refIns`, `dateIns`, `matEtud`) VALUES
(442, '2016-06-22', '2016002'),
(5580, '2016-06-22', '20160011'),
(6245, '2016-06-21', '201608'),
(6313, '2016-06-22', '201615'),
(11679, '2016-06-22', '20160013'),
(12259, '2016-06-22', '20160012'),
(12294, '2016-06-22', '201610'),
(24410, '2016-06-22', '20160010');

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE IF NOT EXISTS `niveau` (
  `codeNiv` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Code du niveau',
  `libNiv` varchar(15) NOT NULL COMMENT 'Libéllé niveau',
  `montNiv` bigint(20) NOT NULL COMMENT 'Montant du niveau',
  PRIMARY KEY (`codeNiv`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `niveau`
--

INSERT INTO `niveau` (`codeNiv`, `libNiv`, `montNiv`) VALUES
(1, 'LICENCE 1', 500000),
(2, 'LICENCE 2', 600000),
(3, 'LICENCE 3', 750000),
(4, 'MASTER 1', 900000),
(5, 'MASTER 2', 1000000),
(6, 'BTS', 450000),
(7, 'DUT', 600000);

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE IF NOT EXISTS `paiement` (
  `numPaie` int(11) NOT NULL COMMENT 'numero de paiement',
  `montPaie` int(12) NOT NULL COMMENT 'montant du paiement',
  `datePaie` date NOT NULL COMMENT 'date de l''paiement',
  `numCpt` int(11) NOT NULL COMMENT 'numero du compte',
  `refIns` int(11) NOT NULL COMMENT 'reference inscription',
  PRIMARY KEY (`numPaie`),
  KEY `numCpt` (`numCpt`),
  KEY `refIns` (`refIns`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `paiement`
--


-- --------------------------------------------------------

--
-- Structure de la table `situation`
--

CREATE TABLE IF NOT EXISTS `situation` (
  `refSit` int(11) NOT NULL AUTO_INCREMENT COMMENT 'reference de la situation',
  `libSit` varchar(20) NOT NULL COMMENT 'libéllé de la situation',
  PRIMARY KEY (`refSit`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `situation`
--

INSERT INTO `situation` (`refSit`, `libSit`) VALUES
(1, 'Orienté'),
(2, 'Non orienté');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `compte_ibfk_1` FOREIGN KEY (`matEtud`) REFERENCES `etudiant` (`matEtud`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_7` FOREIGN KEY (`refSit`) REFERENCES `situation` (`refSit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `etudiant_ibfk_8` FOREIGN KEY (`codeFil`) REFERENCES `filiere` (`codeFil`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `etudiant_ibfk_9` FOREIGN KEY (`codeNiv`) REFERENCES `niveau` (`codeNiv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_ibfk_1` FOREIGN KEY (`matEtud`) REFERENCES `etudiant` (`matEtud`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD CONSTRAINT `paiement_ibfk_1` FOREIGN KEY (`numCpt`) REFERENCES `compte` (`numCpt`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paiement_ibfk_2` FOREIGN KEY (`refIns`) REFERENCES `inscription` (`refIns`) ON DELETE CASCADE ON UPDATE CASCADE;
