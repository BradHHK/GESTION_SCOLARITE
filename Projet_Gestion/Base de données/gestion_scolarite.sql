-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 25 avr. 2025 à 15:43
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_scolarite`
--

-- --------------------------------------------------------

--
-- Structure de la table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `id_accounts` int NOT NULL AUTO_INCREMENT,
  `login` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `statut` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_accounts`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `enseignants`
--

DROP TABLE IF EXISTS `enseignants`;
CREATE TABLE IF NOT EXISTS `enseignants` (
  `id_enseignant` int NOT NULL,
  `nom` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_enseignant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

DROP TABLE IF EXISTS `etudiants`;
CREATE TABLE IF NOT EXISTS `etudiants` (
  `id_etudiant` int NOT NULL,
  `nom` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `date_naissance` date NOT NULL,
  `id_filiere` int NOT NULL,
  PRIMARY KEY (`id_etudiant`),
  KEY `etudiants_id_filiere_fk` (`id_filiere`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `evaluations`
--

DROP TABLE IF EXISTS `evaluations`;
CREATE TABLE IF NOT EXISTS `evaluations` (
  `id_evaluation` int NOT NULL,
  `id_etudiant` int NOT NULL,
  `id_matiere` int NOT NULL,
  `note` double NOT NULL,
  `date_evaluation` date NOT NULL,
  PRIMARY KEY (`id_evaluation`),
  KEY `evaluation_id_matiere_fk` (`id_matiere`),
  KEY `evaluation_id_etudiant_fk` (`id_etudiant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `filieres`
--

DROP TABLE IF EXISTS `filieres`;
CREATE TABLE IF NOT EXISTS `filieres` (
  `id_filiere` int NOT NULL,
  `nom_filiere` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_filiere`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

DROP TABLE IF EXISTS `matieres`;
CREATE TABLE IF NOT EXISTS `matieres` (
  `id_matiere` int NOT NULL,
  `nom_matiere` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `id_filiere` int NOT NULL,
  `id_enseignant` int NOT NULL,
  PRIMARY KEY (`id_matiere`),
  KEY `matieres_id_filiere_fk` (`id_filiere`),
  KEY `matieres_id_enseignant_fk` (`id_enseignant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD CONSTRAINT `etudiants_id_filiere_fk` FOREIGN KEY (`id_filiere`) REFERENCES `filieres` (`id_filiere`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `evaluations`
--
ALTER TABLE `evaluations`
  ADD CONSTRAINT `evaluation_id_etudiant_fk` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiants` (`id_etudiant`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `evaluation_id_matiere_fk` FOREIGN KEY (`id_matiere`) REFERENCES `matieres` (`id_matiere`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `matieres`
--
ALTER TABLE `matieres`
  ADD CONSTRAINT `matieres_id_enseignant_fk` FOREIGN KEY (`id_enseignant`) REFERENCES `enseignants` (`id_enseignant`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `matieres_id_filiere_fk` FOREIGN KEY (`id_filiere`) REFERENCES `filieres` (`id_filiere`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
