-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 27 mars 2023 à 14:14
-- Version du serveur :  10.5.18-MariaDB-0+deb11u1
-- Version de PHP : 7.4.33

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
  `idRuche` int(11) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `poids` float NOT NULL,
  `temperature` float NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `heure` time NOT NULL DEFAULT current_timestamp(),
  `chute` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `exploitation`
--

INSERT INTO `exploitation` (`idRuche`, `latitude`, `longitude`, `poids`, `temperature`, `date`, `heure`, `chute`) VALUES
(1, 50, 30, 87654300, 39, '2023-03-27', '13:59:02', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `idMembre` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mel` varchar(255) NOT NULL,
  `identifiant` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `numTelephone` varchar(255) NOT NULL,
  `role` enum('Administrateur','Apiculteur','Visiteur') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`idMembre`, `nom`, `prenom`, `mel`, `identifiant`, `mdp`, `numTelephone`, `role`) VALUES
(1, 'Delanier', 'Theau', 'theauDelanier@gmail.com', 'theau', '32210f4ebedcdb409ffcbd4a6714c182d4763f64', '0663365845', 'Administrateur'),
(2, 'Taillandier', 'Lilian', 'taill@gmail.com', 'lilian', '8d88a7d4bb7c473bd19345de5fda56906325e1ed', '0663471919', 'Administrateur'),
(3, 'Triché', 'Nicolas', 'tricheNicolas@gmail.com', 'nicolas', 'ff81643f1eaae9c56ad76a8e452e43bb2a49430c', '0771829830', 'Administrateur'),
(4, 'tom', 'tom', 'tom@gmail.com', 'tom', '96835dd8bfa718bd6447ccc87af89ae1675daeca', '0663471919', 'Apiculteur'),
(5, 'dupont', 'dupont', 'dupont@gmail.com', 'dupont', 'fe1fb20ff84babba7e6ea3dcc4d1ad541d52a675', '0663471919', 'Visiteur'),
(6, 'durant', 'durant', 'durant@gmail.com', 'durant', 'ced49c69cadd6969e756792464efa54cd0c7e6fc', '0663471919', 'Apiculteur'),
(7, 'tim', 'tim', 'tim@gmail.com', 'tim', '5ee0edb9e2229c0838f1959779f1949031de0123', '0663471919', 'Visiteur');

-- --------------------------------------------------------

--
-- Structure de la table `ruches`
--

CREATE TABLE `ruches` (
  `idRuche` int(11) NOT NULL,
  `idMembre` int(11) NOT NULL,
  `numTel2` varchar(255) DEFAULT NULL,
  `numTel3` varchar(255) DEFAULT NULL,
  `numTel4` varchar(255) DEFAULT NULL,
  `numTel5` varchar(255) DEFAULT NULL,
  `idSigfox` varchar(255) NOT NULL,
  `nomRuche` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ruches`
--

INSERT INTO `ruches` (`idRuche`, `idMembre`, `numTel2`, `numTel3`, `numTel4`, `numTel5`, `idSigfox`, `nomRuche`) VALUES
(1, 1, NULL, NULL, NULL, NULL, 'C30679', 'TEST');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `exploitation`
--
ALTER TABLE `exploitation`
  ADD PRIMARY KEY (`date`,`heure`),
  ADD KEY `idRuche` (`idRuche`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`idMembre`);

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
  MODIFY `idMembre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `ruches`
--
ALTER TABLE `ruches`
  MODIFY `idRuche` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `exploitation`
--
ALTER TABLE `exploitation`
  ADD CONSTRAINT `exploitation_ibfk_1` FOREIGN KEY (`idRuche`) REFERENCES `ruches` (`idRuche`);

--
-- Contraintes pour la table `ruches`
--
ALTER TABLE `ruches`
  ADD CONSTRAINT `ruches_ibfk_1` FOREIGN KEY (`idMembre`) REFERENCES `membre` (`idMembre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
