-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 07 avr. 2023 à 06:52
-- Version du serveur : 8.0.30
-- Version de PHP : 8.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ruche`
--

-- --------------------------------------------------------

--
-- Structure de la table `exploitation`
--

CREATE TABLE `exploitation` (
  `idRuche` int NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `poids` float NOT NULL,
  `temperature` float NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `chute` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `idMembre` int NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `mel` varchar(255) NOT NULL,
  `identifiant` varchar(255) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `numTelephone` varchar(255) DEFAULT NULL,
  `role` enum('Administrateur','Apiculteur','Stagiaire') NOT NULL,
  `idTuteur` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`idMembre`, `nom`, `prenom`, `mel`, `identifiant`, `mdp`, `numTelephone`, `role`, `idTuteur`) VALUES
(1, 'Taillandier', 'Lilian', 'taill@gmail.com', 'lilian', 'lilian', '0663471919', 'Administrateur', NULL),
(2, 'tom', 'tom', 'tom@gmail.com', 'tom', 'tom', '0663471919', 'Apiculteur', NULL),
(3, 'tim', 'tim', 'tim@gmail.com', 'tim', 'tim', '0663471919', 'Stagiaire', 2);

-- --------------------------------------------------------

--
-- Structure de la table `ruches`
--

CREATE TABLE `ruches` (
  `idRuche` int NOT NULL,
  `idMembre` int DEFAULT NULL,
  `numTel2` varchar(255) NOT NULL,
  `numTel3` varchar(255) NOT NULL,
  `numTel4` varchar(255) NOT NULL,
  `numTel5` varchar(255) NOT NULL,
  `nomRuche` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `idSigfox` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `exploitation`
--
ALTER TABLE `exploitation`
  ADD KEY `idRuche` (`idRuche`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`idMembre`),
  ADD UNIQUE KEY `mel` (`mel`),
  ADD KEY `idTuteur` (`idTuteur`);

--
-- Index pour la table `ruches`
--
ALTER TABLE `ruches`
  ADD PRIMARY KEY (`idRuche`),
  ADD KEY `idMembre` (`idMembre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `idMembre` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `ruches`
--
ALTER TABLE `ruches`
  MODIFY `idRuche` int NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `exploitation`
--
ALTER TABLE `exploitation`
  ADD CONSTRAINT `exploitation_ibfk_1` FOREIGN KEY (`idRuche`) REFERENCES `ruches` (`idRuche`);

--
-- Contraintes pour la table `membre`
--
ALTER TABLE `membre`
  ADD CONSTRAINT `membre_ibfk_1` FOREIGN KEY (`idTuteur`) REFERENCES `membre` (`idMembre`) ON DELETE SET NULL;

--
-- Contraintes pour la table `ruches`
--
ALTER TABLE `ruches`
  ADD CONSTRAINT `ruches_ibfk_1` FOREIGN KEY (`idMembre`) REFERENCES `membre` (`idMembre`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
