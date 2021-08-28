-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 28 août 2021 à 22:24
-- Version du serveur : 8.0.26-0ubuntu0.20.04.2
-- Version de PHP : 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetphp`
--

-- --------------------------------------------------------

--
-- Structure de la table `Articles`
--

CREATE TABLE `Articles` (
  `IdArticle` int NOT NULL,
  `CodeArticle` varchar(6) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nomArticle` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `CategorieArticle` varchar(12) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT '3',
  `PrixArticle` decimal(12,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `Articles`
--

INSERT INTO `Articles` (`IdArticle`, `CodeArticle`, `nomArticle`, `CategorieArticle`, `PrixArticle`) VALUES
(1, 'CHE001', 'Chemise enf BOSS (125 000)', 'Homme', '125000'),
(2, 'JFC002', 'Jean couleur (126 000)', 'Femme', '126000'),
(3, 'PAN003', 'Pant couleur Levis (175 000)', 'Autre', '175000'),
(4, 'NOE004', 'Noeud PM (25 000)', 'Autre', '25000'),
(5, 'PAN005', 'Pant F mihaja/lin (125 000)', 'Femme', '125000');

-- --------------------------------------------------------

--
-- Structure de la table `Inventaire`
--

CREATE TABLE `Inventaire` (
  `IdInventaire` int NOT NULL,
  `codeInvent` varchar(5) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `nomInvent` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `DebutInvent` date DEFAULT NULL,
  `FinInvent` date DEFAULT NULL,
  `Active` varchar(3) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `Inventaire`
--

INSERT INTO `Inventaire` (`IdInventaire`, `codeInvent`, `nomInvent`, `DebutInvent`, `FinInvent`, `Active`) VALUES
(1, 'EXO01', 'Aout 2021', '2021-08-01', '2021-08-31', 'OUI');

-- --------------------------------------------------------

--
-- Structure de la table `Mouvement`
--

CREATE TABLE `Mouvement` (
  `IdMove` int NOT NULL,
  `QteEntrees` int DEFAULT NULL,
  `QteSortiees` int DEFAULT NULL,
  `PrixVente` decimal(12,0) DEFAULT NULL,
  `Remarque` varchar(250) COLLATE latin1_general_ci DEFAULT NULL,
  `IdStock` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Stock`
--

CREATE TABLE `Stock` (
  `IdStock` int NOT NULL,
  `DateStock` date DEFAULT NULL,
  `Quantite` int DEFAULT NULL,
  `IdArticle` int DEFAULT NULL,
  `IdInventaire` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `Stock`
--

INSERT INTO `Stock` (`IdStock`, `DateStock`, `Quantite`, `IdArticle`, `IdInventaire`) VALUES
(1, '2021-08-28', 3, 1, 1),
(2, '2021-08-28', 18, 2, 1),
(3, '2021-08-25', 34, 4, 1),
(4, '2021-08-26', 39, 3, 1),
(5, '2021-08-24', 24, 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateurs`
--

CREATE TABLE `Utilisateurs` (
  `uId` int UNSIGNED NOT NULL,
  `uLogin` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `uPass` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `uNom` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `uActif` varchar(3) COLLATE latin1_general_ci NOT NULL DEFAULT 'OUI',
  `uRole` varchar(25) COLLATE latin1_general_ci NOT NULL DEFAULT 'Editeur'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `Utilisateurs`
--

INSERT INTO `Utilisateurs` (`uId`, `uLogin`, `uPass`, `uNom`, `uActif`, `uRole`) VALUES
(1, 'Tj2472', '6da25a1e6144cee96f5407ba38ad242b', 'Toussaint', 'OUI', 'Admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Articles`
--
ALTER TABLE `Articles`
  ADD PRIMARY KEY (`IdArticle`);

--
-- Index pour la table `Inventaire`
--
ALTER TABLE `Inventaire`
  ADD PRIMARY KEY (`IdInventaire`);

--
-- Index pour la table `Mouvement`
--
ALTER TABLE `Mouvement`
  ADD PRIMARY KEY (`IdMove`),
  ADD KEY `FK_IdStock` (`IdStock`);

--
-- Index pour la table `Stock`
--
ALTER TABLE `Stock`
  ADD PRIMARY KEY (`IdStock`),
  ADD UNIQUE KEY `IdArticle` (`IdArticle`,`IdInventaire`),
  ADD KEY `FK_IdInventaire` (`IdInventaire`) USING BTREE,
  ADD KEY `FK_IdArticle` (`IdArticle`) USING BTREE;

--
-- Index pour la table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  ADD PRIMARY KEY (`uId`),
  ADD UNIQUE KEY `U_idUser` (`uLogin`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Articles`
--
ALTER TABLE `Articles`
  MODIFY `IdArticle` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `Inventaire`
--
ALTER TABLE `Inventaire`
  MODIFY `IdInventaire` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Mouvement`
--
ALTER TABLE `Mouvement`
  MODIFY `IdMove` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Stock`
--
ALTER TABLE `Stock`
  MODIFY `IdStock` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  MODIFY `uId` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Mouvement`
--
ALTER TABLE `Mouvement`
  ADD CONSTRAINT `FK_IdStock` FOREIGN KEY (`IdStock`) REFERENCES `Stock` (`IdStock`);

--
-- Contraintes pour la table `Stock`
--
ALTER TABLE `Stock`
  ADD CONSTRAINT `FK_IdExercice` FOREIGN KEY (`IdInventaire`) REFERENCES `Inventaire` (`IdInventaire`),
  ADD CONSTRAINT `Stock_ibfk_1` FOREIGN KEY (`IdArticle`) REFERENCES `Articles` (`IdArticle`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
