-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 21 Février 2022 à 13:43
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `monsite`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Age` int(3) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `Ville` varchar(30) NOT NULL,
  `Mail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `Nom`, `Prenom`, `Age`, `Adresse`, `Ville`, `Mail`) VALUES
(1, 'Marti', 'Jean', 36, '5 av. Einstein', 'Orléans', 'mart@marti.co'),
(2, 'Rapp', 'Paul', 44, '32 av. Foch', 'Paris', 'rapp@libert.com'),
(3, 'Devos', 'Marie', 18, '75 bd Hochimin', 'Lille', 'grav@waladoo.fr'),
(4, 'Hochon', 'Paul', 22, '33 Rue Bleu', 'Chartres', 'hoch@fiscali.fr'),
(5, 'Hachette', 'Jeanne', 45, '60 Rue Bleu ', 'Versailles', 'hachette@tree.fr'),
(6, 'Marti', 'Pierre', 25, '4 av. Henri', 'Paris', 'martin7@fiscali.fr'),
(7, 'Mac Neal', 'John', 52, '89 rue Diana', 'Lyon', 'mac@freez.fr'),
(8, 'Darc', 'Jeanne', 19, '9 av. d’Orléans', 'Paris', '2022-02-01 14:56:51'),
(9, 'Gaté', 'Bill', 45, '9 bd des Bugs', 'Lyon', 'bill@microhard.be'),
(10, 'Leref', 'Dan', 41, '54 Ave Trois', 'Toulouse', 'Leref@tree.fr');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(4) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `password`) VALUES
(1, 'Christian', 'Ch1'),
(2, 'Olivier', 'Ol2'),
(3, 'Patrick', 'Pa3'),
(4, 'Pierre', 'Pi4');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
