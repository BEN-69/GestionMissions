-- phpMyAdmin SQL Dump
-- version 4.3.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Ven 27 Mars 2015 à 11:59
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `missions_ingenieurs`
--

-- --------------------------------------------------------

--
-- Structure de la table `affectations`
--

CREATE TABLE `affectations` (
  `idingenieurs` int(11) NOT NULL,
  `idmissions` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `affectations`
--

INSERT INTO `affectations` (`idingenieurs`, `idmissions`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 1),
(2, 3),
(2, 5),
(2, 6),
(3, 2),
(3, 8),
(4, 2),
(4, 4),
(4, 6),
(4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `ingenieurs`
--

CREATE TABLE `ingenieurs` (
  `idingenieurs` int(10) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `agence` varchar(20) NOT NULL,
  `telephone` varchar(15) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ingenieurs`
--

INSERT INTO `ingenieurs` (`idingenieurs`, `nom`, `prenom`, `agence`, `telephone`) VALUES
(1, 'STUMSKY', 'Dominique', 'Lyon', '3027'),
(2, 'HAFIDI', 'Jérôme', 'Rennes', '2878'),
(3, 'DUCOSTAUD', 'Marc', 'La Défense', '4181'),
(4, 'benaata', 'rabii', 'Lyon', '06277');

-- --------------------------------------------------------

--
-- Structure de la table `missions`
--

CREATE TABLE `missions` (
  `idmissions` int(10) NOT NULL,
  `mission` varchar(35) NOT NULL,
  `lieu` varchar(35) NOT NULL,
  `directeur` varchar(35) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `missions`
--

INSERT INTO `missions` (`idmissions`, `mission`, `lieu`, `directeur`) VALUES
(1, 'COJO', 'Lyon', 'BALDENT'),
(2, 'TGV', 'Lyon', 'BALDENT'),
(3, 'ARIANE', 'Toulouse', 'SERNOV'),
(4, '35', 'Paris', 'FENOU'),
(5, 'MODULA', 'Paris', 'BALDENT'),
(6, 'EXPO', 'Déville', 'MILDON'),
(7, 'BALTIQUE', 'Copenhague', 'MILDON');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `ingenieurs`
--
ALTER TABLE `ingenieurs`
  ADD PRIMARY KEY (`idingenieurs`);

--
-- Index pour la table `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`idmissions`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `ingenieurs`
--
ALTER TABLE `ingenieurs`
  MODIFY `idingenieurs` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `missions`
--
ALTER TABLE `missions`
  MODIFY `idmissions` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;