-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 18 Décembre 2015 à 09:44
-- Version du serveur :  10.0.17-MariaDB
-- Version de PHP :  5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `auto3bservices`
--

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

CREATE TABLE `factures` (
  `num_fact` varchar(25) NOT NULL,
  `date_fact` date NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `immatriculation` varchar(25) NOT NULL,
  `marque_voiture` varchar(25) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `qte` int(10) NOT NULL,
  `etat_facture` varchar(10) NOT NULL,
  `prix` float NOT NULL,
  `montant` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `factures`
--

INSERT INTO `factures` (`num_fact`, `date_fact`, `nom`, `prenom`, `immatriculation`, `marque_voiture`, `designation`, `qte`, `etat_facture`, `prix`, `montant`, `total`) VALUES
('00001', '2015-12-03', 'Client_nom', 'Client_prenom', 'immatriculation_1', 'volvo', 'designation_1', 1, '', 1500, 1500, 1500);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `ref` varchar(250) NOT NULL DEFAULT '',
  `nom` varchar(250) NOT NULL,
  `prix` float NOT NULL,
  `qte` int(11) NOT NULL DEFAULT '0',
  `qte_min` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`ref`, `nom`, `prix`, `qte`, `qte_min`) VALUES
('zzzz', 'zzzzzz', 120, 1, 6),
('dds', 'sssssssshh', 123, 3, 15),
('f', 'd', 46, 14, 12),
('mmmmmmmm', 'mmmmmmmmmm', 20, 15, 5),
('okok', 'okok', 222, 12, 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `nom`, `prenom`) VALUES
(18, 'ridaovic', 'rida.rhanim@gmail.com', 'R!d@2015', 'rhanim', 'rida');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`num_fact`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`ref`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
