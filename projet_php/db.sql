SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `etat`;
CREATE TABLE `etat` (
  `idE` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`idE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `priorite`;
CREATE TABLE `priorite` (
  `idP` int(11) NOT NULL,
  `libelle` varchar(10) NOT NULL,
  PRIMARY KEY (`idP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `technicien`;
CREATE TABLE `technicien` (
  `idTECH` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `detail` varchar(150) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  PRIMARY KEY (`idTECH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `ticket`;
CREATE TABLE `ticket` (
  `idT` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(30) NOT NULL,
  `description` varchar(150) NOT NULL,
  `utilisateur` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `cause` varchar(30) NOT NULL,
  `etat` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `ticket` (`idT`, `titre`, `description`, `utilisateur`, `email`, `cause`, `etat`) VALUES
(1,	'ceci est un titre',	'j\'essaie ',	'3emetest',	'user@gmail.com',	'tets cours de lecompte',	'en cours'),
(2,	'qsd',	'qsd',	'qsd',	'qsd',	'qsd',	'ouvert'),
(3,	'aze',	'aze',	'aze',	'aze',	'aze',	'ouvert'),
(4,	'wxc',	'wxc',	'wxc',	'wxc',	'wxc',	'ouvert'),
(5,	'ert',	'ert',	'ert',	'ert',	'ert',	'fermé'),
(6,	'dfg',	'dfg',	'dfg',	'dfg',	'dfg',	'ouvert'),
(7,	'',	'',	'',	'',	'',	NULL);
