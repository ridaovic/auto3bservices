-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 22 Décembre 2015 à 23:42
-- Version du serveur :  5.6.26
-- Version de PHP :  5.6.12

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
-- Structure de la table `devis`
--

CREATE TABLE IF NOT EXISTS `devis` (
  `id` int(11) NOT NULL,
  `date_devis` date DEFAULT NULL,
  `date_accord` date DEFAULT NULL,
  `ht` double NOT NULL,
  `hta` double NOT NULL,
  `id_vehicule` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `devis`
--

INSERT INTO `devis` (`id`, `date_devis`, `date_accord`, `ht`, `hta`, `id_vehicule`) VALUES
(8, '2015-12-23', '2015-12-31', 20, 30, 7);

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

CREATE TABLE IF NOT EXISTS `factures` (
  `num_fact` varchar(25) NOT NULL,
  `date_fact` date NOT NULL,
  `designation` varchar(50) NOT NULL,
  `qte` int(10) NOT NULL,
  `etat_facture` varchar(10) NOT NULL,
  `prix` float NOT NULL,
  `montant` float NOT NULL,
  `total` float NOT NULL,
  `id_vehicule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `factures`
--

INSERT INTO `factures` (`num_fact`, `date_fact`, `designation`, `qte`, `etat_facture`, `prix`, `montant`, `total`, `id_vehicule`) VALUES
('00001', '2015-12-25', '001', 2, 'actives', 1000, 2000, 1000, 7),
('i123', '2015-12-24', '001', 2, 'active', 1500, 1500, 1000, 1),
('n123', '2015-12-26', 'test', 4, 'Non payÃ©', 4, 4, 4, 5),
('n123321', '2015-12-26', 'test', 3, 'PayÃ©', 3, 4, 3, 6);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE IF NOT EXISTS `produits` (
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
('ref1', 'prod1', 8, 17, 14),
('ref2', 'prod2', 6, 9, 3);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `nom`, `prenom`) VALUES
(18, 'ridaovic', 'rida.rhanim@gmail.com', 'R!d@2015', 'rhanim', 'rida');

-- --------------------------------------------------------

--
-- Structure de la table `vehicules`
--

CREATE TABLE IF NOT EXISTS `vehicules` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `immatriculation` varchar(100) NOT NULL,
  `marque` varchar(100) NOT NULL,
  `expere` varchar(100) NOT NULL,
  `assurance` varchar(100) NOT NULL,
  `date_entree` date DEFAULT NULL,
  `date_sortie` date DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `vehicules`
--

INSERT INTO `vehicules` (`id`, `nom`, `prenom`, `immatriculation`, `marque`, `expere`, `assurance`, `date_entree`, `date_sortie`) VALUES
(1, 'rida rhanim', '', 'B123456', 'fiat', 'jawad', 'saham', '2015-12-08', '0000-00-00'),
(2, 'rhanim rida', '', 'b123456', 'fiat', 'jawad', 'saham', '2015-12-23', '0000-00-00'),
(3, 'rhanim', 'rida', 'i123', 'fiat', 'ridaovic', 'saham', '2015-12-09', '2015-12-12'),
(4, 'rida', 'rhanim', 'azer', 'toyota', 'ridaovic', 'saham', '0000-00-00', '0000-00-00'),
(5, 'rida', 'rhanim', 'azer', 'toyota', 'ridaovic', 'saham', '0000-00-00', '0000-00-00'),
(6, 'rida', 'rhanim', 'azer', 'toyota', 'ridaovic', 'saham', '0000-00-00', '0000-00-00'),
(7, 'rhanim', 'rida', 'mat1', 'fiat', 'exp1', 'ass1', '2015-12-23', '2015-12-31');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `devis`
--
ALTER TABLE `devis`
  ADD PRIMARY KEY (`id`);

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
-- Index pour la table `vehicules`
--
ALTER TABLE `vehicules`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `devis`
--
ALTER TABLE `devis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `vehicules`
--
ALTER TABLE `vehicules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
