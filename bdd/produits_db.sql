-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 05 Novembre 2020 à 23:47
-- Version du serveur :  10.3.25-MariaDB-0+deb10u1
-- Version de PHP :  7.3.19-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `produits_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `produits_tb`
--

CREATE TABLE `produits_tb` (
  `id_produit` int(11) NOT NULL,
  `nom_produit` varchar(25) NOT NULL,
  `prix_produit` float DEFAULT NULL,
  `image_produit` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `produits_tb`
--

INSERT INTO `produits_tb` (`id_produit`, `nom_produit`, `prix_produit`, `image_produit`) VALUES
(1, 'Bombes de bain', 5.5, 'uploads/produit_1.jpg'),
(2, 'Bougies artisanales', 9.9, 'uploads/produit_2.jpg'),
(3, 'Bijoux en perles', 14.9, 'uploads/produit_3.jpg'),
(4, 'T-shirt enfant', 20, 'uploads/produit_4.jpg');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `produits_tb`
--
ALTER TABLE `produits_tb`
  ADD PRIMARY KEY (`id_produit`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `produits_tb`
--
ALTER TABLE `produits_tb`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
