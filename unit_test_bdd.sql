-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 13 nov. 2019 à 13:12
-- Version du serveur :  5.7.27-0ubuntu0.18.04.1
-- Version de PHP :  7.3.11-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `unit_test_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `s`
--

CREATE TABLE `s` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `s`
--

INSERT INTO `s` (`id`, `name`) VALUES
(1, 'testUpdateOk'),
(2, 'dzadzada'),
(6, 'testCreateOk'),
(7, 'testCreateOk'),
(8, 'testCreateOk'),
(9, 'testCreateOk'),
(10, 'testCreateOk'),
(11, 'testCreateOk'),
(12, 'testCreateOk');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'goodLog', '$argon2i$v=19$m=65536,t=4,p=1$eFNrYTA5SlQ1V0szSnJpQQ$SSMXTXAne7UJ0VfWR5EEW1Xi71zHFBufO3wQvVxmgto'),
(2, 'randomUser', '$argon2i$v=19$m=65536,t=4,p=1$dlRqcEt6TmhDR0JNeTU3ZA$sD0xv+yugbqlHkDiQ2yO+0IqXFanil1Ml5xXDhbIOpM');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `s`
--
ALTER TABLE `s`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `s`
--
ALTER TABLE `s`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
