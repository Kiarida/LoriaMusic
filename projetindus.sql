-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 13 Janvier 2015 à 21:27
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `projetindus`
--

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

CREATE TABLE IF NOT EXISTS `artiste` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `note` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `artiste`
--

INSERT INTO `artiste` (`id`, `nom`, `note`) VALUES
(1, 'Daft Punk', '4.45'),
(2, 'Flobots', '3.59'),
(3, 'Ariana Grande', '3.99'),
(4, 'deadmau5', '4.57');

-- --------------------------------------------------------

--
-- Structure de la table `artistemusique`
--

CREATE TABLE IF NOT EXISTS `artistemusique` (
  `hotttness` int(11) NOT NULL,
  `familiarity` int(11) NOT NULL,
  `idArtiste` int(11) NOT NULL,
  PRIMARY KEY (`idArtiste`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `artistevideo`
--

CREATE TABLE IF NOT EXISTS `artistevideo` (
  `idArtiste` int(11) NOT NULL,
  PRIMARY KEY (`idArtiste`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ecoute`
--

CREATE TABLE IF NOT EXISTS `ecoute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `typeEcoute` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `idItem` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_709D561C6CE67B80` (`idItem`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `ecoute`
--

INSERT INTO `ecoute` (`id`, `date`, `typeEcoute`, `idItem`) VALUES
(1, '2015-01-05', '', 1),
(2, '2014-08-11', '', 3),
(3, '2015-01-07', '', 1),
(4, '2015-01-06', '', 2),
(5, '2015-01-07', '', 2);

-- --------------------------------------------------------

--
-- Structure de la table `ext_log_entries`
--

CREATE TABLE IF NOT EXISTS `ext_log_entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `logged_at` datetime NOT NULL,
  `object_id` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `object_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `version` int(11) NOT NULL,
  `data` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `log_class_lookup_idx` (`object_class`),
  KEY `log_date_lookup_idx` (`logged_at`),
  KEY `log_user_lookup_idx` (`username`),
  KEY `log_version_lookup_idx` (`object_id`,`object_class`,`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `ext_translations`
--

CREATE TABLE IF NOT EXISTS `ext_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `object_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `field` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lookup_unique_idx` (`locale`,`object_class`,`field`,`foreign_key`),
  KEY `translations_lookup_idx` (`locale`,`object_class`,`foreign_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `fos_user`
--

CREATE TABLE IF NOT EXISTS `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`) VALUES
(1, 'elise', 'elise', 'tchii.chan@hotmail.fr', 'tchii.chan@hotmail.fr', 0, '43xg8i2hdyiokgkgkkw8o40gcs0wgws', 'f3LFKcKd4Pwohm9e+fXeTQkvlDcCeE/N/lmyziE2yYKt9CrPRhq+koqWOor3YmRI/z4ClT6263/lSqqqrXhi5Q==', NULL, 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:0:"";}', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE IF NOT EXISTS `genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `genre`
--

INSERT INTO `genre` (`id`, `libelle`) VALUES
(1, 'Electro'),
(2, 'Pop'),
(3, 'Girly');

-- --------------------------------------------------------

--
-- Structure de la table `interactions`
--

CREATE TABLE IF NOT EXISTS `interactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateHeure` datetime NOT NULL,
  `idTypeInteraction` int(11) DEFAULT NULL,
  `idEcoute` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_538B74BDA6838A3A` (`idTypeInteraction`),
  KEY `IDX_538B74BD138CFE86` (`idEcoute`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` decimal(5,2) NOT NULL,
  `duree` decimal(6,3) NOT NULL,
  `typeItem` tinyint(1) NOT NULL,
  `nbVues` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Contenu de la table `item`
--

INSERT INTO `item` (`id`, `url`, `titre`, `note`, `duree`, `typeItem`, `nbVues`, `date`) VALUES
(1, 'https://play.spotify.com/track/1pKYYY0dkg23sQQXi0Q5zN', 'Around The World - Radio Edit', '4.25', '7.090', 1, 105296, '2014-09-07'),
(2, 'https://play.spotify.com/track/3H3cOQ6LBLSvmcaV7QkZEu', 'Aerodynamic', '4.88', '3.320', 1, 282855, '2014-10-13'),
(3, 'https://play.spotify.com/track/2VEZx7NWsZ1D0eJ4uv5Fym', 'Digital Love', '4.21', '5.010', 1, 282222, '2014-10-06'),
(5, 'https://play.spotify.com/track/6OA1JAshHaJkVeVeYOkpM3', 'Mayday!!!', '3.69', '4.370', 1, 6299, '2014-11-10'),
(6, 'https://play.spotify.com/track/4IdIs1ugvlGHzQ8JCq1UBl', 'Handlebars', '3.56', '3.270', 1, 1826, '2015-01-05'),
(7, 'https://play.spotify.com/track/1T7Htpf1kEvU9Adf8J0ekk', 'Break Free', '4.25', '3.340', 1, 1582524, '2015-01-05'),
(8, 'https://play.spotify.com/track/6xCNYRfzZtoQRo1xruPmNq', 'Problem', '4.23', '3.130', 1, 2876977, '2015-01-04'),
(9, 'https://play.spotify.com/track/6c9EGVj5CaOeoKd9ecMW1U', 'Strobe - Radio Edit', '4.25', '3.340', 1, 2587593, '2015-01-05'),
(10, 'https://play.spotify.com/track/2VEZx7NWsZ1D0eJ4htfh5', 'Like a Cat', '3.62', '5.260', 1, 58272, '2015-01-13'),
(11, 'https://play.spotify.com/track/69kOkLUCkxIZYexIgSG8rq', 'Get Lucky', '4.66', '6.090', 1, 5278876, '2015-01-05'),
(12, 'https://play.spotify.com/track/2cGxRwrMyEAp8dEbuZaVv6', 'Instant Crush', '3.99', '5.370', 1, 2577878, '2015-01-04'),
(13, 'https://play.spotify.com/track/4yjlWacI4vXSwtE7Kq7rUH', 'Technologic - Radio Edit', '3.68', '2.460', 1, 585434, '2015-01-05'),
(14, 'https://play.spotify.com/track/5W3cjX2J3tjhG8zb6u0qHn', 'Harder Better Faster Stronger', '4.99', '3.440', 1, 25786768, '2015-01-04'),
(15, 'https://play.spotify.com/track/2LD2gT7gwAurzdQDQtILds', 'Veridis Quo', '4.88', '5.450', 1, 423863, '2015-01-05');

-- --------------------------------------------------------

--
-- Structure de la table `itemartiste`
--

CREATE TABLE IF NOT EXISTS `itemartiste` (
  `idItem` int(11) NOT NULL,
  `idArtiste` int(11) NOT NULL,
  PRIMARY KEY (`idItem`,`idArtiste`),
  KEY `IDX_E3CDA7036CE67B80` (`idItem`),
  KEY `IDX_E3CDA7038CBE5EBD` (`idArtiste`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `itemartiste`
--

INSERT INTO `itemartiste` (`idItem`, `idArtiste`) VALUES
(1, 1),
(2, 1),
(3, 1),
(5, 2),
(6, 2),
(7, 3),
(8, 3),
(9, 4),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1);

-- --------------------------------------------------------

--
-- Structure de la table `itemgenre`
--

CREATE TABLE IF NOT EXISTS `itemgenre` (
  `idItem` int(11) NOT NULL,
  `idGenre` int(11) NOT NULL,
  PRIMARY KEY (`idItem`,`idGenre`),
  KEY `IDX_164507186CE67B80` (`idItem`),
  KEY `IDX_16450718949470E5` (`idGenre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `itemgenre`
--

INSERT INTO `itemgenre` (`idItem`, `idGenre`) VALUES
(7, 3),
(8, 3),
(9, 1),
(10, 3),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1);

-- --------------------------------------------------------

--
-- Structure de la table `itemitem`
--

CREATE TABLE IF NOT EXISTS `itemitem` (
  `idItem` int(11) NOT NULL,
  `idAlbum` int(11) NOT NULL,
  PRIMARY KEY (`idItem`,`idAlbum`),
  KEY `IDX_B56547D66CE67B80` (`idItem`),
  KEY `IDX_B56547D62E5C2D5E` (`idAlbum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `itemplaylist`
--

CREATE TABLE IF NOT EXISTS `itemplaylist` (
  `idPlaylist` int(11) NOT NULL,
  `idItem` int(11) NOT NULL,
  PRIMARY KEY (`idPlaylist`,`idItem`),
  KEY `IDX_A897D60484213B76` (`idPlaylist`),
  KEY `IDX_A897D6046CE67B80` (`idItem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

CREATE TABLE IF NOT EXISTS `langue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `langue` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `musique`
--

CREATE TABLE IF NOT EXISTS `musique` (
  `tempo` int(11) NOT NULL,
  `mode` int(11) NOT NULL,
  `loudness` int(11) NOT NULL,
  `energy` int(11) NOT NULL,
  `hotttness` int(11) NOT NULL,
  `danceability` int(11) NOT NULL,
  `idItem` int(11) NOT NULL,
  PRIMARY KEY (`idItem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note` decimal(5,2) NOT NULL,
  `date` date NOT NULL,
  `idUtilisateur` int(11) DEFAULT NULL,
  `idArtiste` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CFBDFA145D419CCB` (`idUtilisateur`),
  KEY `IDX_CFBDFA148CBE5EBD` (`idArtiste`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `notetagitem`
--

CREATE TABLE IF NOT EXISTS `notetagitem` (
  `idTag` int(11) NOT NULL,
  `idItem` int(11) NOT NULL,
  `note` decimal(5,2) NOT NULL,
  PRIMARY KEY (`idItem`,`idTag`),
  KEY `idTag` (`idTag`),
  KEY `idItem` (`idItem`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `notetagitem`
--

INSERT INTO `notetagitem` (`idTag`, `idItem`, `note`) VALUES
(1, 9, '0.89'),
(4, 9, '4.25');

-- --------------------------------------------------------

--
-- Structure de la table `playlist`
--

CREATE TABLE IF NOT EXISTS `playlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `dateCreation` date NOT NULL,
  `idUtilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D782112D5D419CCB` (`idUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateDebut` date NOT NULL,
  `dateFin` date DEFAULT NULL,
  `idUtilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D044D5D45D419CCB` (`idUtilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `session`
--

INSERT INTO `session` (`id`, `dateDebut`, `dateFin`, `idUtilisateur`) VALUES
(1, '2015-01-07', '2015-01-07', 1),
(2, '2014-08-11', '2014-08-11', 1),
(3, '2015-01-05', '2015-01-07', 1);

-- --------------------------------------------------------

--
-- Structure de la table `sessionecoute`
--

CREATE TABLE IF NOT EXISTS `sessionecoute` (
  `idSession` int(11) NOT NULL,
  `idEcoute` int(11) NOT NULL,
  PRIMARY KEY (`idSession`,`idEcoute`),
  KEY `IDX_21D80256C0FDBE26` (`idSession`),
  KEY `IDX_21D80256138CFE86` (`idEcoute`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `sessionecoute`
--

INSERT INTO `sessionecoute` (`idSession`, `idEcoute`) VALUES
(1, 3),
(1, 5),
(2, 2),
(3, 1),
(3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `sessionplaylist`
--

CREATE TABLE IF NOT EXISTS `sessionplaylist` (
  `idPlaylist` int(11) NOT NULL,
  `idSession` int(11) NOT NULL,
  PRIMARY KEY (`idPlaylist`,`idSession`),
  KEY `IDX_B112720A84213B76` (`idPlaylist`),
  KEY `IDX_B112720AC0FDBE26` (`idSession`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `tag`
--

INSERT INTO `tag` (`id`, `libelle`) VALUES
(1, 'Zen'),
(2, 'Pop'),
(3, 'Fun'),
(4, 'Magic');

-- --------------------------------------------------------

--
-- Structure de la table `tagartiste`
--

CREATE TABLE IF NOT EXISTS `tagartiste` (
  `idTag` int(11) NOT NULL,
  `idArtiste` int(11) NOT NULL,
  PRIMARY KEY (`idTag`,`idArtiste`),
  KEY `IDX_8C759BE022C1AA04` (`idTag`),
  KEY `IDX_8C759BE08CBE5EBD` (`idArtiste`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tagplaylist`
--

CREATE TABLE IF NOT EXISTS `tagplaylist` (
  `idTag` int(11) NOT NULL,
  `idPlaylist` int(11) NOT NULL,
  PRIMARY KEY (`idTag`,`idPlaylist`),
  KEY `IDX_91FBDDFA22C1AA04` (`idTag`),
  KEY `IDX_91FBDDFA84213B76` (`idPlaylist`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tagsession`
--

CREATE TABLE IF NOT EXISTS `tagsession` (
  `idTag` int(11) NOT NULL,
  `idSession` int(11) NOT NULL,
  PRIMARY KEY (`idTag`,`idSession`),
  KEY `IDX_C0367B7B22C1AA04` (`idTag`),
  KEY `IDX_C0367B7BC0FDBE26` (`idSession`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `typeinteraction`
--

CREATE TABLE IF NOT EXISTS `typeinteraction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL,
  `dateInscription` date NOT NULL,
  `birthdate` date NOT NULL,
  `genre` tinyint(1) NOT NULL,
  `pays` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `dateInscription`, `birthdate`, `genre`, `pays`) VALUES
(1, '2015-01-07', '1917-09-15', 1, 'Bahamas');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateuramis`
--

CREATE TABLE IF NOT EXISTS `utilisateuramis` (
  `idUtilisateur` int(11) NOT NULL,
  `idUtilisateurAmi` int(11) NOT NULL,
  PRIMARY KEY (`idUtilisateur`,`idUtilisateurAmi`),
  KEY `IDX_5FC542E85D419CCB` (`idUtilisateur`),
  KEY `IDX_5FC542E82BF13F1F` (`idUtilisateurAmi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `description` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `qualite` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `idItem` int(11) NOT NULL,
  PRIMARY KEY (`idItem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `videolangue`
--

CREATE TABLE IF NOT EXISTS `videolangue` (
  `idVideo` int(11) NOT NULL,
  `idLangue` int(11) NOT NULL,
  PRIMARY KEY (`idVideo`,`idLangue`),
  KEY `IDX_960D90B06B039931` (`idVideo`),
  KEY `IDX_960D90B0F046DD14` (`idLangue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `artistemusique`
--
ALTER TABLE `artistemusique`
  ADD CONSTRAINT `FK_4D5F473E8CBE5EBD` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`id`);

--
-- Contraintes pour la table `artistevideo`
--
ALTER TABLE `artistevideo`
  ADD CONSTRAINT `FK_B92ACEB48CBE5EBD` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`id`);

--
-- Contraintes pour la table `ecoute`
--
ALTER TABLE `ecoute`
  ADD CONSTRAINT `FK_709D561C6CE67B80` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`);

--
-- Contraintes pour la table `interactions`
--
ALTER TABLE `interactions`
  ADD CONSTRAINT `FK_538B74BD138CFE86` FOREIGN KEY (`idEcoute`) REFERENCES `ecoute` (`id`),
  ADD CONSTRAINT `FK_538B74BDA6838A3A` FOREIGN KEY (`idTypeInteraction`) REFERENCES `typeinteraction` (`id`);

--
-- Contraintes pour la table `itemartiste`
--
ALTER TABLE `itemartiste`
  ADD CONSTRAINT `FK_E3CDA7036CE67B80` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`),
  ADD CONSTRAINT `FK_E3CDA7038CBE5EBD` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`id`);

--
-- Contraintes pour la table `itemgenre`
--
ALTER TABLE `itemgenre`
  ADD CONSTRAINT `FK_164507186CE67B80` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`),
  ADD CONSTRAINT `FK_16450718949470E5` FOREIGN KEY (`idGenre`) REFERENCES `genre` (`id`);

--
-- Contraintes pour la table `itemitem`
--
ALTER TABLE `itemitem`
  ADD CONSTRAINT `FK_B56547D62E5C2D5E` FOREIGN KEY (`idAlbum`) REFERENCES `item` (`id`),
  ADD CONSTRAINT `FK_B56547D66CE67B80` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`);

--
-- Contraintes pour la table `itemplaylist`
--
ALTER TABLE `itemplaylist`
  ADD CONSTRAINT `FK_A897D6046CE67B80` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`),
  ADD CONSTRAINT `FK_A897D60484213B76` FOREIGN KEY (`idPlaylist`) REFERENCES `playlist` (`id`);

--
-- Contraintes pour la table `musique`
--
ALTER TABLE `musique`
  ADD CONSTRAINT `FK_EE1D56BC6CE67B80` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`);

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `FK_CFBDFA145D419CCB` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `FK_CFBDFA148CBE5EBD` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`id`);

--
-- Contraintes pour la table `notetagitem`
--
ALTER TABLE `notetagitem`
  ADD CONSTRAINT `notetagitem_ibfk_1` FOREIGN KEY (`idTag`) REFERENCES `tag` (`id`),
  ADD CONSTRAINT `notetagitem_ibfk_2` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`);

--
-- Contraintes pour la table `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `FK_D782112D5D419CCB` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `FK_D044D5D45D419CCB` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `sessionecoute`
--
ALTER TABLE `sessionecoute`
  ADD CONSTRAINT `FK_21D80256138CFE86` FOREIGN KEY (`idEcoute`) REFERENCES `ecoute` (`id`),
  ADD CONSTRAINT `FK_21D80256C0FDBE26` FOREIGN KEY (`idSession`) REFERENCES `session` (`id`);

--
-- Contraintes pour la table `sessionplaylist`
--
ALTER TABLE `sessionplaylist`
  ADD CONSTRAINT `FK_B112720A84213B76` FOREIGN KEY (`idPlaylist`) REFERENCES `playlist` (`id`),
  ADD CONSTRAINT `FK_B112720AC0FDBE26` FOREIGN KEY (`idSession`) REFERENCES `session` (`id`);

--
-- Contraintes pour la table `tagartiste`
--
ALTER TABLE `tagartiste`
  ADD CONSTRAINT `FK_8C759BE022C1AA04` FOREIGN KEY (`idTag`) REFERENCES `tag` (`id`),
  ADD CONSTRAINT `FK_8C759BE08CBE5EBD` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`id`);

--
-- Contraintes pour la table `tagplaylist`
--
ALTER TABLE `tagplaylist`
  ADD CONSTRAINT `FK_91FBDDFA22C1AA04` FOREIGN KEY (`idTag`) REFERENCES `tag` (`id`),
  ADD CONSTRAINT `FK_91FBDDFA84213B76` FOREIGN KEY (`idPlaylist`) REFERENCES `playlist` (`id`);

--
-- Contraintes pour la table `tagsession`
--
ALTER TABLE `tagsession`
  ADD CONSTRAINT `FK_C0367B7B22C1AA04` FOREIGN KEY (`idTag`) REFERENCES `tag` (`id`),
  ADD CONSTRAINT `FK_C0367B7BC0FDBE26` FOREIGN KEY (`idSession`) REFERENCES `session` (`id`);

--
-- Contraintes pour la table `utilisateuramis`
--
ALTER TABLE `utilisateuramis`
  ADD CONSTRAINT `FK_5FC542E82BF13F1F` FOREIGN KEY (`idUtilisateurAmi`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `FK_5FC542E85D419CCB` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `FK_7CC7DA2C6CE67B80` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`);

--
-- Contraintes pour la table `videolangue`
--
ALTER TABLE `videolangue`
  ADD CONSTRAINT `FK_960D90B06B039931` FOREIGN KEY (`idVideo`) REFERENCES `video` (`idItem`),
  ADD CONSTRAINT `FK_960D90B0F046DD14` FOREIGN KEY (`idLangue`) REFERENCES `langue` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
