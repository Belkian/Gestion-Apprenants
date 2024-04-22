-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 19 avr. 2024 à 12:31
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionapp`
--

-- --------------------------------------------------------

--
-- Structure de la table `gestionapp_classe`
--

DROP TABLE IF EXISTS `gestionapp_classe`;
CREATE TABLE IF NOT EXISTS `gestionapp_classe` (
  `ID_CLASSE` int NOT NULL AUTO_INCREMENT,
  `NOM_CLASSE` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `NOMBRE_APPRENANT` int NOT NULL,
  `DATE_DEBUT` datetime NOT NULL,
  `DATE_FIN` datetime NOT NULL,
  PRIMARY KEY (`ID_CLASSE`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `gestionapp_classe`
--

INSERT INTO `gestionapp_classe` (`ID_CLASSE`, `NOM_CLASSE`, `NOMBRE_APPRENANT`, `DATE_DEBUT`, `DATE_FIN`) VALUES
(147, 'asas', 2, '2024-05-11 00:00:00', '2024-05-05 00:00:00'),
(148, 'asas', 4, '2024-05-08 00:00:00', '2024-04-17 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `gestionapp_cours`
--

DROP TABLE IF EXISTS `gestionapp_cours`;
CREATE TABLE IF NOT EXISTS `gestionapp_cours` (
  `ID_COURS` int NOT NULL AUTO_INCREMENT,
  `DATETIME_DEBUT` datetime NOT NULL,
  `DATETIME_FIN` datetime NOT NULL,
  `CODE` int NOT NULL,
  `ID_CLASS` int NOT NULL,
  PRIMARY KEY (`ID_COURS`),
  KEY `GestionApp_COURS_CLASSE_FK` (`ID_CLASS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `gestionapp_role`
--

DROP TABLE IF EXISTS `gestionapp_role`;
CREATE TABLE IF NOT EXISTS `gestionapp_role` (
  `ID_ROLE` int NOT NULL AUTO_INCREMENT,
  `NAME` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID_ROLE`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `gestionapp_role`
--

INSERT INTO `gestionapp_role` (`ID_ROLE`, `NAME`) VALUES
(1, 'Admin'),
(2, 'Campus Manager'),
(3, 'Apprenant'),
(4, 'Formateur'),
(5, 'Responsables pédagogiques'),
(6, 'Délégués');

-- --------------------------------------------------------

--
-- Structure de la table `gestionapp_user`
--

DROP TABLE IF EXISTS `gestionapp_user`;
CREATE TABLE IF NOT EXISTS `gestionapp_user` (
  `ID_USER` int NOT NULL AUTO_INCREMENT,
  `NOM` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `PRENOM` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `PASSWORD` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `EMAIL` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `ID_ROLE` int NOT NULL,
  PRIMARY KEY (`ID_USER`),
  UNIQUE KEY `GestionApp_USER_AK` (`EMAIL`),
  KEY `GestionApp_USER_ROLE_FK` (`ID_ROLE`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `gestionapp_user`
--

INSERT INTO `gestionapp_user` (`ID_USER`, `NOM`, `PRENOM`, `PASSWORD`, `EMAIL`, `ID_ROLE`) VALUES
(1, 'Dupond', 'bob', '$2y$10$ga3LUqf1Ujd2I94HYxIPiuT5Bwp4zPs7qUBxOBYtNbFMDqDdKwLEG', 'simplon@gmail.com', 1),
(20, 'Saulle', 'Clément', 'password', 'saulle45@gmail.com', 3),
(21, 'azdazd', 'Clément', 'password', 'saulle@gmail.com', 3),
(22, 'Saulle', 'Clément', 'password', 'saulleasas@gmail.com', 3),
(25, 'Saulle', 'Clément', 'password', 'saussice@gmail.com', 3),
(26, 'pokaulle', 'Clément', 'password', 'saullaze@gmail.com', 3),
(27, 'Saulleaa', 'Clémentaaa', 'password', 'saulle@gmail.comaa', 3),
(28, 'Saullepommo', 'Clément', 'password', 'saullehehe@gmail.com', 3),
(29, 'wouhouuuu', 'wououhouhohuohuohu', 'password', 'wouohou@gmail.com', 3);

-- --------------------------------------------------------

--
-- Structure de la table `gestionapp_userhasclasse`
--

DROP TABLE IF EXISTS `gestionapp_userhasclasse`;
CREATE TABLE IF NOT EXISTS `gestionapp_userhasclasse` (
  `ID_CLASSE` int NOT NULL,
  `ID_USER` int NOT NULL,
  PRIMARY KEY (`ID_CLASSE`,`ID_USER`),
  KEY `GestionApp_USERHASCLASSE_USER0_FK` (`ID_USER`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `gestionapp_userhasclasse`
--

INSERT INTO `gestionapp_userhasclasse` (`ID_CLASSE`, `ID_USER`) VALUES
(147, 1),
(148, 1);

-- --------------------------------------------------------

--
-- Structure de la table `gestionapp_userhascours`
--

DROP TABLE IF EXISTS `gestionapp_userhascours`;
CREATE TABLE IF NOT EXISTS `gestionapp_userhascours` (
  `ID_COURS` int NOT NULL,
  `ID_USER` int NOT NULL,
  `ABSENT` tinyint NOT NULL,
  PRIMARY KEY (`ID_COURS`,`ID_USER`),
  KEY `GestionApp_USERHASCOURS_USER0_FK` (`ID_USER`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `gestionapp_cours`
--
ALTER TABLE `gestionapp_cours`
  ADD CONSTRAINT `GestionApp_COURS_CLASSE_FK` FOREIGN KEY (`ID_CLASS`) REFERENCES `gestionapp_classe` (`ID_CLASSE`);

--
-- Contraintes pour la table `gestionapp_user`
--
ALTER TABLE `gestionapp_user`
  ADD CONSTRAINT `GestionApp_USER_ROLE_FK` FOREIGN KEY (`ID_ROLE`) REFERENCES `gestionapp_role` (`ID_ROLE`);

--
-- Contraintes pour la table `gestionapp_userhasclasse`
--
ALTER TABLE `gestionapp_userhasclasse`
  ADD CONSTRAINT `GestionApp_USERHASCLASSE_CLASSE_FK` FOREIGN KEY (`ID_CLASSE`) REFERENCES `gestionapp_classe` (`ID_CLASSE`),
  ADD CONSTRAINT `GestionApp_USERHASCLASSE_USER0_FK` FOREIGN KEY (`ID_USER`) REFERENCES `gestionapp_user` (`ID_USER`);

--
-- Contraintes pour la table `gestionapp_userhascours`
--
ALTER TABLE `gestionapp_userhascours`
  ADD CONSTRAINT `GestionApp_USERHASCOURS_COURS_FK` FOREIGN KEY (`ID_COURS`) REFERENCES `gestionapp_cours` (`ID_COURS`),
  ADD CONSTRAINT `GestionApp_USERHASCOURS_USER0_FK` FOREIGN KEY (`ID_USER`) REFERENCES `gestionapp_user` (`ID_USER`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
