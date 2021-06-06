-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 08 mars 2021 à 12:39
-- Version du serveur :  10.4.16-MariaDB
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `delivery`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(11) NOT NULL,
  `prenom` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pseudo` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `nom`, `prenom`, `email`, `pseudo`, `password`, `avatar`) VALUES
(2, 'ALAA', 'Naoufal', 'alaanaoufal2000@gmail.com', 'naoufal_alaa', 'Noureddine61', '1.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id_pannier` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `montant` double NOT NULL,
  `prendre` int(11) DEFAULT 0,
  `terminer` int(11) DEFAULT 0,
  `date_time_commande` datetime NOT NULL,
  `fini` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id_pannier`, `id_user`, `montant`, `prendre`, `terminer`, `date_time_commande`, `fini`) VALUES
(56, 1, 140, 0, 1, '2020-04-08 13:11:19', 0),
(57, 1, 140, 0, 1, '2020-04-08 13:11:19', 0),
(58, 1, 220, 1, 1, '2020-04-16 16:57:14', 0),
(59, 1, 220, 1, 1, '2020-04-16 16:57:14', 0),
(60, 1, 20, 0, 1, '2020-04-16 17:02:49', 0),
(61, 1, 200, 0, 1, '2020-05-04 00:35:39', 0),
(62, 1, 200, 0, 0, '2020-05-04 00:35:39', 0),
(64, 1, 250, 0, 0, '2020-05-25 03:52:26', 0),
(65, 1, 150, 0, 1, '2021-02-11 21:43:26', 0);

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `nom_fournisseur` varchar(30) NOT NULL,
  `descript` text NOT NULL,
  `categorie` varchar(30) NOT NULL,
  `nbr_commandes` int(11) NOT NULL DEFAULT 0,
  `date_ajout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`nom_fournisseur`, `descript`, `categorie`, `nbr_commandes`, `date_ajout`) VALUES
('Dominos Pizza', 'Dégustez votre pizza ', 'Fastfood', 0, '2020-04-02 23:39:44'),
('KFC', 'Chicken :D', 'Fastfood', 0, '2020-04-02 23:37:32'),
('Marjane', 'Grande surface avec multiple choix de produit', 'Supermarche', 0, '2020-04-03 00:25:49'),
('McDonald\'s', 'Une frime internationale', 'Fastfood', 0, '2020-04-02 22:21:52'),
('Sanofi', 'Laboratoire international qui a déjà créer Doliprane', 'Medicament', 0, '2020-04-05 01:36:03');

-- --------------------------------------------------------

--
-- Structure de la table `pannier`
--

CREATE TABLE `pannier` (
  `id_pannier` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `prix` double NOT NULL,
  `date_time` datetime NOT NULL,
  `passee` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pannier`
--

INSERT INTO `pannier` (`id_pannier`, `id_user`, `id_prod`, `quantity`, `prix`, `date_time`, `passee`) VALUES
(56, 1, 3, 4, 80, '2020-04-08 13:11:07', 1),
(57, 1, 4, 2, 120, '2020-04-08 13:11:12', 1),
(58, 1, 2, 2, 100, '2020-04-16 16:56:47', 1),
(59, 1, 4, 2, 120, '2020-04-16 16:56:54', 1),
(60, 1, 3, 1, 20, '2020-04-16 17:02:39', 1),
(61, 1, 3, 4, 80, '2020-05-04 00:35:13', 1),
(62, 1, 4, 2, 120, '2020-05-04 00:35:18', 1),
(64, 1, 2, 5, 250, '2020-05-25 03:52:11', 1),
(65, 1, 2, 3, 150, '2021-02-11 21:43:14', 1),
(66, 1, 4, 1, 60, '2021-02-11 21:43:41', 0);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id_prod` int(11) NOT NULL,
  `nom_produit` text NOT NULL,
  `descript` text NOT NULL,
  `prix` float NOT NULL,
  `nom_f` varchar(30) NOT NULL,
  `nbr_commande` int(11) NOT NULL DEFAULT 0,
  `date_ajout` datetime NOT NULL,
  `cat` text NOT NULL,
  `ration` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id_prod`, `nom_produit`, `descript`, `prix`, `nom_f`, `nbr_commande`, `date_ajout`, `cat`, `ration`) VALUES
(1, 'Head &amp; shoulders', 'Shampoo', 45, 'Marjane', 0, '2020-04-03 01:42:01', 'Supermarche', 1),
(2, 'Best Of mcDo', 'Best of mcdo un vrai délice de burger', 50, 'McDonald\'s', 0, '2020-04-04 16:06:10', 'Fastfood', 2),
(3, 'Doliprane', 'Produit médical sans prescription contient du paracetamol ', 20, 'Sanofi', 0, '2020-04-05 01:37:41', 'Medicament', 8),
(4, 'Ercefuryl', 'Comprimés', 60, 'Sanofi', 0, '2020-04-05 01:42:13', 'Medicament', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` text NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `age` float NOT NULL,
  `date_naiss` datetime NOT NULL,
  `adresse` text NOT NULL,
  `commandes` int(11) NOT NULL DEFAULT 0,
  `pannier` int(11) NOT NULL DEFAULT 0,
  `cat` varchar(4) NOT NULL DEFAULT 'user',
  `date_creation` datetime NOT NULL,
  `password` text NOT NULL,
  `sexe` text NOT NULL,
  `avatar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `phone`, `nom`, `prenom`, `age`, `date_naiss`, `adresse`, `commandes`, `pannier`, `cat`, `date_creation`, `password`, `sexe`, `avatar`) VALUES
(1, 'alaanaoufal2000@gmail.com', '0622975254', 'Alaa', 'Naoufal', 19, '2000-06-01 00:00:00', 'Hay hassani, bloc49', 0, 0, 'user', '2020-04-02 03:27:46', 'b42728ca808af8a0584b45f742db3f2e', 'male', 'young.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id_pannier`) USING BTREE,
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`nom_fournisseur`);

--
-- Index pour la table `pannier`
--
ALTER TABLE `pannier`
  ADD PRIMARY KEY (`id_pannier`) USING BTREE,
  ADD KEY `id_prod` (`id_prod`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_prod`),
  ADD KEY `nom_f` (`nom_f`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`,`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `pannier`
--
ALTER TABLE `pannier`
  MODIFY `id_pannier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `commandes_ibfk_2` FOREIGN KEY (`id_pannier`) REFERENCES `pannier` (`id_pannier`);

--
-- Contraintes pour la table `pannier`
--
ALTER TABLE `pannier`
  ADD CONSTRAINT `pannier_ibfk_1` FOREIGN KEY (`id_prod`) REFERENCES `produits` (`id_prod`),
  ADD CONSTRAINT `pannier_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`nom_f`) REFERENCES `fournisseur` (`nom_fournisseur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
