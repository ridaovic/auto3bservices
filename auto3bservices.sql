-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 24 Décembre 2015 à 18:31
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
-- Structure de la table `designation`
--

CREATE TABLE IF NOT EXISTS `designation` (
  `id` int(11) NOT NULL,
  `designation` text NOT NULL,
  `qte` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `id_facture` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `designation`
--

INSERT INTO `designation` (`id`, `designation`, `qte`, `prix`, `id_facture`) VALUES
(1, 'test', 3, 4, 1),
(2, 'test2', 4, 10, 1),
(3, 'aaaa', 3, 10, 2),
(4, 'bbbb', 2, 20, 2),
(5, 'cccc', 5, 100, 2);

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
  `id` int(25) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` tinyint(1) DEFAULT '0',
  `id_vehicule` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `factures`
--

INSERT INTO `factures` (`id`, `created`, `etat`, `id_vehicule`) VALUES
(1, '2015-12-24 16:13:14', 0, 2),
(2, '2015-12-24 16:22:36', 0, 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `vehicules`
--

INSERT INTO `vehicules` (`id`, `nom`, `prenom`, `immatriculation`, `marque`, `expere`, `assurance`, `date_entree`, `date_sortie`) VALUES
(1, 'rhanim', 'rida', 'A123456', 'fiat', 'ridaovic', 'saham', '2015-12-24', '2015-12-31'),
(2, 'abdo', 'saqar', 'bbh123456', 'volvo', 'tesr', 'saham', '2015-12-18', '2015-12-31');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `devis`
--
ALTER TABLE `devis`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT pour la table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `devis`
--
ALTER TABLE `devis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `factures`
--
ALTER TABLE `factures`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `vehicules`
--
ALTER TABLE `vehicules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
