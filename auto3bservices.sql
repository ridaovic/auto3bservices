-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 29 Décembre 2015 à 19:31
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
  `occasion` tinyint(1) NOT NULL DEFAULT '0',
  `designation` text NOT NULL,
  `qte` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `id_facture` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `designation`
--

INSERT INTO `designation` (`id`, `occasion`, `designation`, `qte`, `prix`, `id_facture`) VALUES
(36, 0, 'ConsidÃ©rez, seigneur, interrompit mon compagnon.', 5, 10, 6),
(37, 0, 'IndÃ©pendamment des Ã©lecteurs appelÃ©s', 3, 200, 6),
(38, 0, 'Conformant sa conduite Ã  mon Ã©gard.', 2, 500, 6),
(39, 0, 'test1', 3, 10, 7),
(40, 0, 'test2', 3, 30, 7),
(41, 0, 'wwww', 2, 20, 8),
(42, 0, 'qqqqqqq', 5, 10, 8),
(43, 0, 'xxxx', 6, 60, 9),
(44, 1, 'test1', 1, 1, 10),
(45, 0, 'test2', 2, 2, 10),
(46, 1, 'test3', 3, 3, 10),
(47, 0, 'test4', 4, 4, 10),
(48, 0, 'test1', 2, 10, 11),
(49, 1, 'test2', 3, 30, 11),
(50, 1, 'test3', 3, 40, 11);

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `devis`
--

INSERT INTO `devis` (`id`, `date_devis`, `date_accord`, `ht`, `hta`, `id_vehicule`) VALUES
(8, '2015-12-23', '2015-12-31', 20, 30, 1),
(9, '2015-12-24', '2015-12-31', 120, 10, 1);

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

CREATE TABLE IF NOT EXISTS `factures` (
  `id` int(25) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` tinyint(1) DEFAULT '0',
  `id_vehicule` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `factures`
--

INSERT INTO `factures` (`id`, `created`, `etat`, `id_vehicule`) VALUES
(6, '2015-12-24 19:28:45', 1, 2),
(7, '2015-12-26 17:37:56', 0, 1),
(8, '2015-12-27 14:33:03', 1, 2),
(9, '2015-12-27 14:33:31', 0, 1),
(10, '2015-12-29 17:10:27', 1, 2),
(11, '2015-12-29 17:16:14', 1, 2);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT pour la table `devis`
--
ALTER TABLE `devis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `factures`
--
ALTER TABLE `factures`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
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
