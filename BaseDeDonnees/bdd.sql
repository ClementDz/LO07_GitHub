-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 13 Juin 2017 à 17:08
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `cursus`
--

CREATE TABLE `cursus` (
  `num_etu` int(6) NOT NULL,
  `label_cursus` varchar(25) NOT NULL,
  `cursus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cursus`
--

INSERT INTO `cursus` (`num_etu`, `label_cursus`, `cursus_id`) VALUES
(38243, 'Dubois_1', 159),
(38239, 'Durnez_1', 160);

-- --------------------------------------------------------

--
-- Structure de la table `element_formation`
--

CREATE TABLE `element_formation` (
  `sigle` varchar(10) NOT NULL,
  `affectation` varchar(10) NOT NULL,
  `categorie` varchar(4) NOT NULL,
  `utt` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `element_formation`
--

INSERT INTO `element_formation` (`sigle`, `affectation`, `categorie`, `utt`) VALUES
('IF14', 'TCBR', 'TM', 'Y'),
('LO07', 'TCBR', 'TM', 'Y');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `num_etu` int(5) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `admi` varchar(10) NOT NULL,
  `filiere` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`num_etu`, `nom`, `prenom`, `admi`, `filiere`, `email`) VALUES
(38239, 'Durnez', 'Clément', 'TC', 'TCBR', 'clement.durnez@utt.fr'),
(38243, 'Dubois', 'Alexandre', 'TC', 'TCBR', 'alexandre.dubois@utt.fr');

-- --------------------------------------------------------

--
-- Structure de la table `semestre`
--

CREATE TABLE `semestre` (
  `sem_id` int(10) NOT NULL,
  `sem_label` varchar(6) NOT NULL,
  `id_cursus` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `semestre`
--

INSERT INTO `semestre` (`sem_id`, `sem_label`, `id_cursus`) VALUES
(521, 'ISI2', 159),
(522, 'ISI2', 159),
(523, 'ISI1', 159),
(524, 'ISI2', 160);

-- --------------------------------------------------------

--
-- Structure de la table `semestre_element_formation`
--

CREATE TABLE `semestre_element_formation` (
  `sem_id` int(10) NOT NULL,
  `sigle` varchar(10) NOT NULL,
  `resultat` varchar(6) NOT NULL,
  `credit` int(2) NOT NULL,
  `profil` varchar(2) NOT NULL,
  `sem_seq` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `semestre_element_formation`
--

INSERT INTO `semestre_element_formation` (`sem_id`, `sigle`, `resultat`, `credit`, `profil`, `sem_seq`) VALUES
(521, 'IF14', 'C', 6, 'Y', 5),
(521, 'LO07', 'A', 6, 'Y', 6);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `cursus`
--
ALTER TABLE `cursus`
  ADD PRIMARY KEY (`cursus_id`),
  ADD KEY `num_etu` (`num_etu`),
  ADD KEY `label_cursus` (`label_cursus`);

--
-- Index pour la table `element_formation`
--
ALTER TABLE `element_formation`
  ADD PRIMARY KEY (`sigle`),
  ADD KEY `sigle` (`sigle`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`num_etu`),
  ADD KEY `num_etu` (`num_etu`);

--
-- Index pour la table `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`sem_id`,`sem_label`),
  ADD KEY `sem_id` (`sem_id`),
  ADD KEY `label_cursus` (`id_cursus`);

--
-- Index pour la table `semestre_element_formation`
--
ALTER TABLE `semestre_element_formation`
  ADD PRIMARY KEY (`sem_id`,`sigle`),
  ADD KEY `sem_id` (`sem_id`),
  ADD KEY `sigle` (`sigle`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `cursus`
--
ALTER TABLE `cursus`
  MODIFY `cursus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;
--
-- AUTO_INCREMENT pour la table `semestre`
--
ALTER TABLE `semestre`
  MODIFY `sem_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=532;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `cursus`
--
ALTER TABLE `cursus`
  ADD CONSTRAINT `cursus_ibfk_1` FOREIGN KEY (`num_etu`) REFERENCES `etudiant` (`num_etu`);

--
-- Contraintes pour la table `semestre`
--
ALTER TABLE `semestre`
  ADD CONSTRAINT `semestre_ibfk_1` FOREIGN KEY (`id_cursus`) REFERENCES `cursus` (`cursus_id`);

--
-- Contraintes pour la table `semestre_element_formation`
--
ALTER TABLE `semestre_element_formation`
  ADD CONSTRAINT `semestre_element_formation_ibfk_1` FOREIGN KEY (`sem_id`) REFERENCES `semestre` (`sem_id`),
  ADD CONSTRAINT `semestre_element_formation_ibfk_2` FOREIGN KEY (`sigle`) REFERENCES `element_formation` (`sigle`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
