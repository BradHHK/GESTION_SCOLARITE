-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 07 mai 2025 à 19:39
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
  `id_proprietaire` int NOT NULL,
  `login` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_role` int NOT NULL,
  `statut` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Activé',
  PRIMARY KEY (`id_accounts`),
  UNIQUE KEY `login` (`login`),
  KEY `accounts_id_role_fk` (`id_role`),
  KEY `accounts_statut_fk` (`statut`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `accounts`
--

INSERT INTO `accounts` (`id_accounts`, `id_proprietaire`, `login`, `password`, `id_role`, `statut`) VALUES
(18, 4, 'Houakeu_Brondon@etusoft.ma', '$2y$10$u8SMQFYRsUbPRF/rs8Vsh.MQcyy.JzisT4y2JxNJjZTX1C.V1dWEG', 1, 'Activé'),
(19, 1, 'Ahmed_Younes@etusoft.ma', '$2y$10$Fm1JmCkMmH9Q7T5ksZ4m5uF6Y7YKkhp5t2v8M0CI8mC1iCE6iYjfq', 3, 'Activé');

-- --------------------------------------------------------

--
-- Structure de la table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
CREATE TABLE IF NOT EXISTS `administrator` (
  `id_administrateur` int NOT NULL AUTO_INCREMENT,
  `Code` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `Nom` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `Prenom` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `telephone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `adresse` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_administrateur`),
  UNIQUE KEY `Code` (`Code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `administrator`
--

INSERT INTO `administrator` (`id_administrateur`, `Code`, `Nom`, `Prenom`, `email`, `telephone`, `adresse`) VALUES
(1, 'ABZ231', 'Ahmed', 'Younes', 'Ahmed@est.com', '09764213', 'Rabat');

-- --------------------------------------------------------

--
-- Structure de la table `enseignants`
--

DROP TABLE IF EXISTS `enseignants`;
CREATE TABLE IF NOT EXISTS `enseignants` (
  `id_enseignant` int NOT NULL AUTO_INCREMENT,
  `Matricule` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_enseignant`),
  UNIQUE KEY `enseignants_matricule_unique` (`Matricule`),
  UNIQUE KEY `Maticule` (`Matricule`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `enseignants`
--

INSERT INTO `enseignants` (`id_enseignant`, `Matricule`, `nom`, `prenom`, `email`) VALUES
(1, 'EX87921', 'Lasfar', 'Lasfar', 'Lasfa_lasfar@est.com'),
(3, 'EX43203', 'El', 'Boutchi', 'Elboutchi@est.com'),
(4, 'EX15667', 'Namly', 'Namly', 'Namly@est.com'),
(5, 'EX06415', 'Benradi', 'Benradi', 'Benradi@est.com'),
(6, 'EX81505', 'Baroudi', 'Baroudi', 'Baroudi@est.com'),
(7, 'EX94283', 'Oubeda', 'Oubeda', 'Oubeda@est.com'),
(8, 'EX02871', 'Tahiri', 'Tahiri', 'Tahiri@gmail.com'),
(9, 'EX75114', 'Louartassi', 'Louartassi', 'Louartassi@est.com'),
(10, 'EX40102', 'Lemnaouar', 'Lemnaouar', 'Lemnaouar@est.com');

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

DROP TABLE IF EXISTS `etudiants`;
CREATE TABLE IF NOT EXISTS `etudiants` (
  `id_etudiant` int NOT NULL AUTO_INCREMENT,
  `Matricule` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_naissance` date NOT NULL,
  `id_filiere` int NOT NULL,
  PRIMARY KEY (`id_etudiant`),
  UNIQUE KEY `Matricule` (`Matricule`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`id_etudiant`, `Matricule`, `nom`, `prenom`, `date_naissance`, `id_filiere`) VALUES
(1, '25V7043', 'Haoua', 'Adja', '2005-10-11', 1),
(2, '25I7632', 'Joel', 'Kavuya', '2004-06-08', 1),
(3, '25J0461', 'Youssouf', 'Hamza', '2005-02-10', 1),
(4, '25K8493', 'Houakeu', 'Brondon', '2005-10-19', 1),
(6, '25Z4893', 'Ilyas', 'Benjoulloun', '2002-02-01', 1),
(8, '25P7962', 'Test', 'Test', '2000-10-01', 2),
(10, '25I6059', 'Test3', 'Test3', '2025-05-06', 3),
(12, '25N8685', 'Test4', 'Test4', '2025-05-22', 3);

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
  PRIMARY KEY (`id_etudiant`,`id_matiere`),
  KEY `evaluation_id_matiere_fk` (`id_matiere`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `evaluations`
--

INSERT INTO `evaluations` (`id_evaluation`, `id_etudiant`, `id_matiere`, `note`, `date_evaluation`) VALUES
(0, 1, 1, 18, '2020-10-10'),
(0, 3, 1, 11, '2005-12-10'),
(0, 4, 1, 17, '2025-05-06'),
(0, 4, 10, 10, '2025-05-07'),
(0, 4, 11, 10, '2025-05-07'),
(0, 10, 9, 14, '2025-05-06'),
(0, 12, 8, 17, '2025-05-06');

-- --------------------------------------------------------

--
-- Structure de la table `filieres`
--

DROP TABLE IF EXISTS `filieres`;
CREATE TABLE IF NOT EXISTS `filieres` (
  `id_filiere` int NOT NULL AUTO_INCREMENT,
  `nom_filiere` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_filiere`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `filieres`
--

INSERT INTO `filieres` (`id_filiere`, `nom_filiere`) VALUES
(1, 'Genie Informatique'),
(2, 'Systeme Et Reseau Informatique'),
(3, 'Genie Industrielle'),
(4, 'Genie Civil'),
(5, 'Systeme Informatique');

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

DROP TABLE IF EXISTS `matieres`;
CREATE TABLE IF NOT EXISTS `matieres` (
  `id_matiere` int NOT NULL AUTO_INCREMENT,
  `nom_matiere` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_enseignant` int NOT NULL,
  `id_filiere` int NOT NULL,
  PRIMARY KEY (`id_matiere`),
  KEY `matieres_id_filiere_fk` (`id_filiere`),
  KEY `matieres_id_enseignant_fk` (`id_enseignant`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `matieres`
--

INSERT INTO `matieres` (`id_matiere`, `nom_matiere`, `id_enseignant`, `id_filiere`) VALUES
(1, 'Développement Web Php', 1, 1),
(7, 'Systeme De Gestion Des Bases De Données Relationnelles', 1, 2),
(8, 'Physique', 7, 3),
(9, 'Chimie', 6, 3),
(10, 'Programmation Orientée Objet', 4, 1),
(11, 'Gestion De Code Source', 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `requete`
--

DROP TABLE IF EXISTS `requete`;
CREATE TABLE IF NOT EXISTS `requete` (
  `id_requete` int NOT NULL AUTO_INCREMENT,
  `id_etudiant` int NOT NULL,
  `id_matiere` int NOT NULL,
  `motif` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `date_de_depot` date NOT NULL,
  `lien_de_la_requete` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `statut` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'En cours',
  PRIMARY KEY (`id_requete`),
  KEY `requete_id_etudiant_fk` (`id_etudiant`),
  KEY `requete_id_matiere_fk` (`id_matiere`),
  KEY `requete_statut_fk` (`statut`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `requete`
--

INSERT INTO `requete` (`id_requete`, `id_etudiant`, `id_matiere`, `motif`, `date_de_depot`, `lien_de_la_requete`, `statut`) VALUES
(6, 4, 1, 'Erreur de note ', '2025-05-07', '4_TauxDeValidation.pdf', 'En cours');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'Etudiant'),
(2, 'Enseignant'),
(3, 'Administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

DROP TABLE IF EXISTS `statut`;
CREATE TABLE IF NOT EXISTS `statut` (
  `statut` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`statut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`statut`) VALUES
('Acceptée'),
('Activé'),
('En cours'),
('Refusée'),
('Suspendu');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_id_role_fk` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `accounts_statut_fk` FOREIGN KEY (`statut`) REFERENCES `statut` (`statut`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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

--
-- Contraintes pour la table `requete`
--
ALTER TABLE `requete`
  ADD CONSTRAINT `requete_id_etudiant_fk` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiants` (`id_etudiant`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `requete_id_matiere_fk` FOREIGN KEY (`id_matiere`) REFERENCES `matieres` (`id_matiere`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `requete_statut_fk` FOREIGN KEY (`statut`) REFERENCES `statut` (`statut`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
