-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 27 avr. 2025 à 13:45
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
  `login` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_role` int NOT NULL,
  `statut` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Activé',
  PRIMARY KEY (`id_accounts`),
  UNIQUE KEY `login` (`login`),
  KEY `accounts_id_role_fk` (`id_role`),
  KEY `accounts_statut_fk` (`statut`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `accounts`
--

INSERT INTO `accounts` (`id_accounts`, `login`, `password`, `id_role`, `statut`) VALUES
(5, 'Houakeu_Brondon@etusoft.ma', '$2y$10$ZHtHz3MeHLbRHxDkiTSD2uO', 2, 'Activé');

-- --------------------------------------------------------

--
-- Structure de la table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
CREATE TABLE IF NOT EXISTS `administrator` (
  `Code` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `Nom` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `Prenom` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `telephone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `adresse` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `administrator`
--

INSERT INTO `administrator` (`Code`, `Nom`, `Prenom`, `email`, `telephone`, `adresse`) VALUES
('ABZ231', 'Ahmed', 'Younes', 'Ahmed@est.com', '09764213', 'Rabat');

-- --------------------------------------------------------

--
-- Structure de la table `enseignants`
--

DROP TABLE IF EXISTS `enseignants`;
CREATE TABLE IF NOT EXISTS `enseignants` (
  `id_enseignant` int NOT NULL,
  `Matricule` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_enseignant`),
  UNIQUE KEY `enseignants_matricule_unique` (`Matricule`),
  UNIQUE KEY `Maticule` (`Matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `enseignants`
--

INSERT INTO `enseignants` (`id_enseignant`, `Matricule`, `nom`, `prenom`, `email`) VALUES
(1, 'EX879', 'Lasfar', 'Lasfar', 'Lasfar@est.com'),
(2, 'EX965', 'Karra', 'Karra', 'Karra@est.com'),
(3, 'EX432', 'El', 'Boutchi', 'Elboutchi@est.com'),
(4, 'EX156', 'Namly', 'Namly', 'Namly@est.com'),
(5, 'EX064', 'Benradi', 'Benradi', 'Benradi@est.com'),
(6, 'EX815', 'Baroudi', 'Baroudi', 'Baroudi@est.com'),
(7, 'EX942', 'Oubeda', 'Oubeda', 'Oubeda@est.com'),
(8, 'EX028', 'Tahiri', 'Tahiri', 'Tahiri@gmail.com'),
(9, 'EX751', 'Louartassi', 'Louartassi', 'Louartassi@est.com'),
(10, 'EX401', 'Lemnaouar', 'Lemnaouar', 'Lemnaouar@est.com');

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

DROP TABLE IF EXISTS `etudiants`;
CREATE TABLE IF NOT EXISTS `etudiants` (
  `id_etudiant` int NOT NULL,
  `Matricule` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `date_naissance` date NOT NULL,
  `id_filiere` int NOT NULL,
  PRIMARY KEY (`id_etudiant`),
  UNIQUE KEY `Matricule` (`Matricule`),
  KEY `etudiants_id_filiere_fk` (`id_filiere`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`id_etudiant`, `Matricule`, `nom`, `prenom`, `date_naissance`, `id_filiere`) VALUES
(1, '23U2456', 'Youssouf', 'Hamza', '2005-04-05', 1),
(2, '27U2431', 'Ilyas ', 'Benjoulloun', '2005-04-03', 1),
(3, '27U2143', 'Houakeu', 'Brondon', '2005-04-03', 1);

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

--
-- Déchargement des données de la table `filieres`
--

INSERT INTO `filieres` (`id_filiere`, `nom_filiere`) VALUES
(1, 'Genie informatique'),
(2, 'Systeme et reseau in'),
(3, 'Genie industrielle'),
(4, 'Genie civil'),
(5, 'Systeme informatique');

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
('Activé'),
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
