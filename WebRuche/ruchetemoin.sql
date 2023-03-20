-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 06 mars 2023 à 08:26
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
-- Base de données : `ruchetemoin`
--

-- --------------------------------------------------------

--
-- Structure de la table `donneesgps`
--

CREATE TABLE `donneesgps` (
  `idRuche` int NOT NULL,
  `coordonneesRuche` varchar(255) COLLATE utf8mb3_bin NOT NULL,
  `date` date NOT NULL,
  `heure` timestamp NOT NULL,
  `chute` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Structure de la table `donneesruches`
--

CREATE TABLE `donneesruches` (
  `idRuche` int NOT NULL,
  `idMembre` int NOT NULL,
  `idSigfox` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `nomRuche` varchar(255) COLLATE utf8mb3_bin NOT NULL,
  `poids` float NOT NULL,
  `temperature` float NOT NULL,
  `numTelephone` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `idMembre` int NOT NULL,
  `nom` varchar(255) COLLATE utf8mb3_bin NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb3_bin NOT NULL,
  `mel` varchar(255) COLLATE utf8mb3_bin NOT NULL,
  `identifiant` varchar(255) COLLATE utf8mb3_bin NOT NULL,
  `mdp` varchar(255) COLLATE utf8mb3_bin NOT NULL,
  `numTelephone` varchar(255) COLLATE utf8mb3_bin NOT NULL,
  `role` enum('Administrateur','Apiculteur','Visiteur') COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `donneesgps`
--
ALTER TABLE `donneesgps`
  ADD KEY `idRuche` (`idRuche`);

--
-- Index pour la table `donneesruches`
--
ALTER TABLE `donneesruches`
  ADD PRIMARY KEY (`idRuche`),
  ADD KEY `idMembre` (`idMembre`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`idMembre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `donneesruches`
--
ALTER TABLE `donneesruches`
  MODIFY `idRuche` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `idMembre` int NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `donneesgps`
--
ALTER TABLE `donneesgps`
  ADD CONSTRAINT `donneesgps_ibfk_1` FOREIGN KEY (`idRuche`) REFERENCES `donneesruches` (`idRuche`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `donneesruches`
--
ALTER TABLE `donneesruches`
  ADD CONSTRAINT `donneesruches_ibfk_1` FOREIGN KEY (`idMembre`) REFERENCES `membre` (`idMembre`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
