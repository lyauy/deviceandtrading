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
DROP DATABASE `location`;
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
  CONSTRAINT `FK_id_objet` FOREIGN KEY (`id_objet`) REFERENCES `objet` (`id_objet`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.
-- Export de la structure de la table location. objet
CREATE TABLE IF NOT EXISTS `objet` (
  `id_objet` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `typeobjet` varchar(50) NOT NULL,
  `image` longblob NOT NULL,
  `prix` int(5) NOT NULL,
  `disponibilite` tinyint(1) NOT NULL DEFAULT '1',
  `livraison` tinyint(1) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL,
  `commentaire` longtext NOT NULL,
  PRIMARY KEY (`id_objet`),
  KEY `FK_id_objet_to_id_user` (`id_user`),
  CONSTRAINT `FK_id_objet_to_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Les données exportées n'étaient pas sélectionnées.
-- Export de la structure de la table location. user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` numeric(10) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `cp` int(5) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;


-- Les données exportées n'étaient pas sélectionnées.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;


INSERT INTO user (id, pseudo, nom, prenom, email, tel, adresse, ville, cp, admin, password) VALUES (NULL, 'Cyadenz', 'Perniceni', 'Ugo', 'ugo.perniceni@hotmail.fr', 0612986774, '15 rue du test', 'Paris', 75001, 1, 'azertyuiop');
INSERT INTO user (id, pseudo, nom, prenom, email, tel, adresse, ville, cp, admin, password) VALUES (NULL, 'Hexort', 'Yauy', 'Thibaut', 'hexort@gmail.com', 0612986774, '20 rue du goerg', 'Paris', 75005, 1, 'azertyuiop');
INSERT INTO user (id, pseudo, nom, prenom, email, tel, adresse, ville, cp, admin, password) VALUES (NULL, 'test', 'Bendaoud', 'Jawad', 'test@gmail.com', 0612986774, '1 rue de paris', 'Paris', 75004, 0, 'azertyuiop');

/*INSERT INTO objet (id, nom, typeobjet, email, tel, adresse, ville, cp, admin, password) VALUES (NULL, 'Portable Asus ROG G752V SSD 1256 Go GTX 1070', 'pc_portable', '', 'ugo.perniceni@hotmail.fr', 0612986774, 'valeur 2', 'valeur 2', 95750, 0, 'azertyuiop');
INSERT INTO objet (id, nom, typeobjet, email, tel, adresse, ville, cp, admin, password) VALUES (NULL, 'iddeux', 'iddeux', 'valeur 2', 'a@hotmail.fr', 0612986774, 'valeur 2', 'valeur 2', 95750, 0, 'azertyuiop');
INSERT INTO objet (id, nom, typeobjet, email, tel, adresse, ville, cp, admin, password) VALUES (NULL, 'feza', 'valeur 2', 'valeur 2', 'evqs@hotmail.fr', 0612986774, 'valeur 2', 'valeur 2', 95750, 0, 'gvjhb');
INSERT INTO objet (id, nom, typeobjet, email, tel, adresse, ville, cp, admin, password) VALUES (NULL, 'azef', 'valeur 2', 'valeur 2', 'sgdf@hotmail.fr', 0612986774, 'valeur 2', 'valeur 2', 95750, 0, 'gvjhb');
INSERT INTO objet (id, nom, typeobjet, email, tel, adresse, ville, cp, admin, password) VALUES (NULL, 'vqvs', 'valeur 2', 'valeur 2', 'dso@hotmail.fr', 0612986774, 'valeur 2', 'valeur 2', 95750, 0, 'gvjhb');
INSERT INTO objet (id, nom, typeobjet, email, tel, adresse, ville, cp, admin, password) VALUES (NULL, 'dosqk', 'valeur 2', 'valeur 2', 'ejzi@hotmail.fr', 0612986774, 'valeur 2', 'valeur 2', 95750, 0, 'gvjhb');
INSERT INTO objet (id, nom, prenom, email, tel, adresse, ville, cp, admin, password) VALUES (NULL, 'idone', 'idone', 'valeur 2', 'ugo.perniceni@hotmail.fr', 0612986774, 'valeur 2', 'valeur 2', 95750, 0, 'azertyuiop');
INSERT INTO objet (id, nom, prenom, email, tel, adresse, ville, cp, admin, password) VALUES (NULL, 'iddeux', 'iddeux', 'valeur 2', 'a@hotmail.fr', 0612986774, 'valeur 2', 'valeur 2', 95750, 0, 'azertyuiop');
INSERT INTO objet (id, nom, prenom, email, tel, adresse, ville, cp, admin, password) VALUES (NULL, 'feza', 'valeur 2', 'valeur 2', 'evqs@hotmail.fr', 0612986774, 'valeur 2', 'valeur 2', 95750, 0, 'gvjhb');
INSERT INTO objet (id, nom, prenom, email, tel, adresse, ville, cp, admin, password) VALUES (NULL, 'azef', 'valeur 2', 'valeur 2', 'sgdf@hotmail.fr', 0612986774, 'valeur 2', 'valeur 2', 95750, 0, 'gvjhb');
*/