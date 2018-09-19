-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.7.14 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Export de la structure de la base pour location
CREATE DATABASE IF NOT EXISTS `location` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `location`;

-- Export de la structure de la table location. location
CREATE TABLE IF NOT EXISTS `location` (
  `id_location` int(11) NOT NULL AUTO_INCREMENT,
  `id_objet` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `debutloc` date NOT NULL,
  `finloc` date NOT NULL,
  PRIMARY KEY (`id_location`),
  KEY `FK_id_objet` (`id_objet`),
  KEY `FK_id_user` (`id_user`),
  CONSTRAINT `FK_id_objet` FOREIGN KEY (`id_objet`) REFERENCES `objet` (`id_objet`),
  CONSTRAINT `FK_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.
-- Export de la structure de la table location. objet
CREATE TABLE IF NOT EXISTS `objet` (
  `id_objet` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `image` longblob NOT NULL,
  `disponibilite` tinyint(1) NOT NULL DEFAULT '1',
  `livraison` tinyint(1) NOT NULL DEFAULT '0',
  `nombre` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_typeobjet` int(11) NOT NULL,
  PRIMARY KEY (`id_objet`),
  KEY `FK_id_objet_to_id_user` (`id_user`),
  KEY `FK_id_objet_to_id_typeobjet` (`id_typeobjet`),
  CONSTRAINT `FK_id_objet_to_id_typeobjet` FOREIGN KEY (`id_typeobjet`) REFERENCES `typeobjet` (`id_typeobjet`),
  CONSTRAINT `FK_id_objet_to_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.
-- Export de la structure de la table location. typeobjet
CREATE TABLE IF NOT EXISTS `typeobjet` (
  `id_typeobjet` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`id_typeobjet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.
-- Export de la structure de la table location. user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL UNIQUE,
  `adresse` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `cp` int(5) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
