-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 13 avr. 2020 à 22:18
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `applicationprojet`
--

-- --------------------------------------------------------

--
-- Structure de la table `serie`
--

CREATE TABLE `serie` (
  `Serie_Id` int(5) NOT NULL,
  `Intitule` varchar(50) NOT NULL,
  `Nb_episode` int(3) DEFAULT NULL,
  `ActeursPrincipaux` varchar(20) DEFAULT NULL,
  `Realisateur` varchar(20) DEFAULT NULL,
  `AnneeSortie` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `serie`
--

INSERT INTO `serie` (`Serie_Id`, `Intitule`, `Nb_episode`, `ActeursPrincipaux`, `Realisateur`, `AnneeSortie`) VALUES
(1, 'Game Of Thrones', 73, 'Frances Parker', 'David Benioff', 2011),
(2, 'Sherlock', 26, 'Benedict Cumberbatch', 'Mark Gatiss', 2010),
(3, 'The Walking Dead', 85, 'Andrew Lincoln', 'Frank Darabont', 2010),
(4, 'True Detective', 41, 'Vince Vaughn', 'Nic Pizzolatto', 2014),
(5, 'Homeland', 66, 'Claire Danes', 'Alex Gansa', 2011),
(6, 'How I met your mother', 83, 'Josh Radnor', 'Carter Bays', 2005),
(7, 'Breaking Bad', 85, 'Bryan Cranston', 'Vince Gilligan', 2008);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `Utilisateur_Id` int(5) NOT NULL,
  `Identifiant` varchar(50) DEFAULT NULL,
  `MotdePasse` varchar(20) NOT NULL,
  `Nom` char(10) DEFAULT NULL,
  `Prenom` char(10) DEFAULT NULL,
  `DatedeNaissance` date DEFAULT NULL,
  `Telephone` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`Utilisateur_Id`, `Identifiant`, `MotdePasse`, `Nom`, `Prenom`, `DatedeNaissance`, `Telephone`) VALUES
(1, 'lephongsac@gmail.com', 'Lephongsac123', 'LE', 'Phongsac', '1996-11-15', '0664252545'),
(2, 'ngngthuyanh@gmail.com', 'Thuyanh123', 'NGUYEN', 'NgocThuyAn', '1997-10-31', '0664253298'),
(3, 'aubryabc@gmail.com', 'Aubryacb123', 'AUBRY', 'Anne', '1993-09-12', '0664256546'),
(4, 'albanpierre@gmail.com', 'Albanpierre123', 'ALBAN', 'Pierre', '1990-11-13', '0664765678'),
(5, 'blandinmas@outlook.com', 'Blandimas123', 'BLANDIN', 'Agnès', '1995-07-15', '0653456754'),
(6, 'albertfer@gmail.com', 'Albertfer123', 'BLOUIN', 'Albert', '1999-08-02', '0664234565'),
(7, 'alodochris@gmail.com', 'Aldoc123', 'CHRISTMANN', 'Aldo', '1990-12-11', '0662345676'),
(8, 'judicale@gmail.com', 'Cornet123', 'CORNET', 'Judicaël', '1992-02-18', '0687656785'),
(9, 'cribier@gmail.com', 'cribierAa12', 'CRIBIER', 'Thierry', '1991-03-25', '0256434567'),
(27, 'baonguyen@gmail.com', 'Baonguyen123', 'Nao', 'Nguyen', '1996-05-13', '0664254323'),
(28, 'lehavi@gmail.com', 'Lehavi123', 'LE', 'vi', '2004-12-12', '0662342423'),
(29, 'bonbon@gmail.com', 'Bonbon123', 'Bon', 'bon', '1999-05-15', '0667876543'),
(34, 'nouveauclient@gmail.com', 'Nouveauclient123', 'Client', 'client', '2000-04-11', '0665458765'),
(35, 'thoanhxinh@gmail.com', '123456789N', 'NGUYEN', 'Ngoc Thoan', '1997-10-31', '0664253298');

-- --------------------------------------------------------

--
-- Structure de la table `visionnage`
--

CREATE TABLE `visionnage` (
  `Visionnage_Id` int(5) NOT NULL,
  `RefUtilisateur` int(5) DEFAULT NULL,
  `RefSerie` int(5) DEFAULT NULL,
  `EpisodeDerniere` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `visionnage`
--

INSERT INTO `visionnage` (`Visionnage_Id`, `RefUtilisateur`, `RefSerie`, `EpisodeDerniere`) VALUES
(1, 1, 3, 3),
(2, 1, 5, 7),
(3, 2, 1, 17),
(4, 3, 6, 20),
(7, 7, 4, 2),
(8, 6, 2, 5),
(11, 5, 2, 14),
(12, 28, 7, 35),
(13, 28, 2, 11),
(21, 2, 6, 3),
(22, 2, 5, 1),
(23, 2, 7, 85),
(24, 34, 1, 3),
(25, 35, 6, 13),
(26, 1, 1, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `serie`
--
ALTER TABLE `serie`
  ADD PRIMARY KEY (`Serie_Id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`Utilisateur_Id`);

--
-- Index pour la table `visionnage`
--
ALTER TABLE `visionnage`
  ADD PRIMARY KEY (`Visionnage_Id`),
  ADD KEY `R2` (`RefSerie`),
  ADD KEY `R3` (`RefUtilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `serie`
--
ALTER TABLE `serie`
  MODIFY `Serie_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `Utilisateur_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `visionnage`
--
ALTER TABLE `visionnage`
  MODIFY `Visionnage_Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `visionnage`
--
ALTER TABLE `visionnage`
  ADD CONSTRAINT `R2` FOREIGN KEY (`RefSerie`) REFERENCES `serie` (`Serie_Id`),
  ADD CONSTRAINT `R3` FOREIGN KEY (`RefUtilisateur`) REFERENCES `utilisateur` (`Utilisateur_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
