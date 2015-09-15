-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Ven 24 Juillet 2015 à 10:03
-- Version du serveur :  5.5.38
-- Version de PHP :  5.5.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `projetindus`
--

-- --------------------------------------------------------

--
-- Structure de la table `actions`
--

CREATE TABLE `actions` (
`id` int(11) NOT NULL,
  `idTypeAction` int(11) DEFAULT NULL,
  `idItem` int(11) DEFAULT NULL,
  `idUtilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `algorithm`
--

CREATE TABLE `algorithm` (
`id` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `label` varchar(25) DEFAULT NULL,
  `precalculated` tinyint(1) NOT NULL DEFAULT '0',
  `color` varchar(25) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `algorithm`
--

INSERT INTO `algorithm` (`id`, `nom`, `label`, `precalculated`, `color`) VALUES
(3, 'popular', 'Most popular', 0, '#b687c7'),
(7, 'random', 'Random', 0, '#87c78a'),
(8, 'genre', 'Same genre', 0, '#6e8bd4');

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

CREATE TABLE `artiste` (
`id` int(11) NOT NULL,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `note` decimal(5,2) NOT NULL,
  `urlCover` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idEcho` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `artistegenre`
--

CREATE TABLE `artistegenre` (
  `idArtiste` int(11) NOT NULL,
  `idGenre` int(11) NOT NULL,
  `frequency` decimal(2,2) DEFAULT NULL,
  `weight` decimal(2,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `artistemusique`
--

CREATE TABLE `artistemusique` (
  `hotttness` decimal(6,6) NOT NULL,
  `familiarity` decimal(6,6) NOT NULL,
  `idArtiste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `artistesimilaire`
--

CREATE TABLE `artistesimilaire` (
  `idArtiste` int(11) NOT NULL,
  `idSim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `artistevideo`
--

CREATE TABLE `artistevideo` (
  `idArtiste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ecoute`
--

CREATE TABLE `ecoute` (
`id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `typeEcoute` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `idItem` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ext_log_entries`
--

CREATE TABLE `ext_log_entries` (
`id` int(11) NOT NULL,
  `action` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `logged_at` datetime NOT NULL,
  `object_id` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `object_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `version` int(11) NOT NULL,
  `data` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ext_translations`
--

CREATE TABLE `ext_translations` (
`id` int(11) NOT NULL,
  `locale` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `object_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `field` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fos_user`
--

CREATE TABLE `fos_user` (
`id` int(11) NOT NULL,
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
  `credentials_expire_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
`id` int(11) NOT NULL,
  `libelle` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `urlCover` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
`id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `idTest` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `groupealgo`
--

CREATE TABLE `groupealgo` (
  `idGroupe` int(11) NOT NULL,
  `idAlgorithme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `groupeutilisateur`
--

CREATE TABLE `groupeutilisateur` (
  `idGroupe` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `interactions`
--

CREATE TABLE `interactions` (
`id` int(11) NOT NULL,
  `dateHeure` datetime NOT NULL,
  `idTypeInteraction` int(11) DEFAULT NULL,
  `idEcoute` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

CREATE TABLE `item` (
`id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` decimal(5,2) NOT NULL,
  `duree` decimal(6,3) NOT NULL,
  `typeItem` int(2) NOT NULL,
  `nbVues` int(11) NOT NULL,
  `date` date NOT NULL,
  `urlCover` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `urlPoster` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `itemartiste`
--

CREATE TABLE `itemartiste` (
  `idItem` int(11) NOT NULL,
  `idArtiste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `itemitem`
--

CREATE TABLE `itemitem` (
  `idItem` int(11) NOT NULL,
  `idAlbum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `itemplaylist`
--

CREATE TABLE `itemplaylist` (
  `idPlaylist` int(11) NOT NULL,
  `idItem` int(11) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

CREATE TABLE `langue` (
`id` int(11) NOT NULL,
  `langue` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `musique`
--

CREATE TABLE `musique` (
  `tempo` decimal(10,3) NOT NULL,
  `mode` int(11) NOT NULL,
  `loudness` decimal(10,3) NOT NULL,
  `energy` decimal(6,6) NOT NULL,
  `hotttness` decimal(6,6) NOT NULL,
  `danceability` decimal(6,6) NOT NULL,
  `idItem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
`id` int(11) NOT NULL,
  `note` decimal(5,2) NOT NULL,
  `date` date NOT NULL,
  `idUtilisateur` int(11) DEFAULT NULL,
  `idArtiste` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idItem` int(11) DEFAULT NULL,
  `idTag` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `notetagitem`
--

CREATE TABLE `notetagitem` (
  `idItem` int(11) NOT NULL,
  `idTag` int(11) NOT NULL,
  `note` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ordre`
--

CREATE TABLE `ordre` (
`id` int(11) NOT NULL,
  `ordre` int(11) NOT NULL,
  `idAlgorithm` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `idTest` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `playlist`
--

CREATE TABLE `playlist` (
`id` int(11) NOT NULL,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `dateCreation` date NOT NULL,
  `idUtilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recommandation`
--

CREATE TABLE `recommandation` (
`id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `idItem` int(11) NOT NULL,
  `idAlgorithme` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE `session` (
`id` int(11) NOT NULL,
  `dateDebut` datetime NOT NULL,
  `dateFin` datetime DEFAULT NULL,
  `idUtilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sessionecoute`
--

CREATE TABLE `sessionecoute` (
  `idSession` int(11) NOT NULL,
  `idEcoute` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sessionplaylist`
--

CREATE TABLE `sessionplaylist` (
  `idPlaylist` int(11) NOT NULL,
  `idSession` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE `tag` (
`id` int(11) NOT NULL,
  `libelle` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tagartiste`
--

CREATE TABLE `tagartiste` (
  `idTag` int(11) NOT NULL,
  `idArtiste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tagplaylist`
--

CREATE TABLE `tagplaylist` (
  `idTag` int(11) NOT NULL,
  `idPlaylist` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tagsession`
--

CREATE TABLE `tagsession` (
  `idTag` int(11) NOT NULL,
  `idSession` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE `test` (
`id` int(11) NOT NULL,
  `dateDebut` datetime NOT NULL,
  `dateFin` datetime DEFAULT NULL,
  `label` varchar(25) DEFAULT NULL,
  `mode` varchar(25) NOT NULL,
  `groups` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `typeaction`
--

CREATE TABLE `typeaction` (
`id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `typeaction`
--

INSERT INTO `typeaction` (`id`, `libelle`) VALUES
(1, 'Block'),
(2, 'Like'),
(3, 'Share');

-- --------------------------------------------------------

--
-- Structure de la table `typeinteraction`
--

CREATE TABLE `typeinteraction` (
`id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `typeinteraction`
--

INSERT INTO `typeinteraction` (`id`, `libelle`) VALUES
(1, 'Next'),
(2, 'Previous'),
(3, 'Stop'),
(4, 'Play'),
(5, 'Mute'),
(6, 'Loop'),
(7, 'Block'),
(8, 'Random'),
(9, 'Like');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `dateInscription` date NOT NULL,
  `birthdate` date NOT NULL,
  `genre` tinyint(1) NOT NULL,
  `pays` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateuramis`
--

CREATE TABLE `utilisateuramis` (
  `idUtilisateur` int(11) NOT NULL,
  `idUtilisateurAmi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

CREATE TABLE `video` (
  `description` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `qualite` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `idItem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `videolangue`
--

CREATE TABLE `videolangue` (
  `idVideo` int(11) NOT NULL,
  `idLangue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `actions`
--
ALTER TABLE `actions`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_548F1EF46A0FC25` (`idTypeAction`), ADD KEY `IDX_548F1EF6CE67B80` (`idItem`), ADD KEY `IDX_548F1EF5D419CCB` (`idUtilisateur`);

--
-- Index pour la table `algorithm`
--
ALTER TABLE `algorithm`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `artiste`
--
ALTER TABLE `artiste`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `artistegenre`
--
ALTER TABLE `artistegenre`
 ADD PRIMARY KEY (`idArtiste`,`idGenre`), ADD KEY `IDX_164507186CE67B80` (`idArtiste`), ADD KEY `IDX_16450718949470E5` (`idGenre`);

--
-- Index pour la table `artistemusique`
--
ALTER TABLE `artistemusique`
 ADD PRIMARY KEY (`idArtiste`);

--
-- Index pour la table `artistesimilaire`
--
ALTER TABLE `artistesimilaire`
 ADD KEY `idArtiste` (`idArtiste`), ADD KEY `idSim` (`idSim`);

--
-- Index pour la table `artistevideo`
--
ALTER TABLE `artistevideo`
 ADD PRIMARY KEY (`idArtiste`);

--
-- Index pour la table `ecoute`
--
ALTER TABLE `ecoute`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_709D561C6CE67B80` (`idItem`);

--
-- Index pour la table `ext_log_entries`
--
ALTER TABLE `ext_log_entries`
 ADD PRIMARY KEY (`id`), ADD KEY `log_class_lookup_idx` (`object_class`), ADD KEY `log_date_lookup_idx` (`logged_at`), ADD KEY `log_user_lookup_idx` (`username`), ADD KEY `log_version_lookup_idx` (`object_id`,`object_class`,`version`);

--
-- Index pour la table `ext_translations`
--
ALTER TABLE `ext_translations`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `lookup_unique_idx` (`locale`,`object_class`,`field`,`foreign_key`), ADD KEY `translations_lookup_idx` (`locale`,`object_class`,`foreign_key`);

--
-- Index pour la table `fos_user`
--
ALTER TABLE `fos_user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`), ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
 ADD PRIMARY KEY (`id`), ADD KEY `idTest` (`idTest`);

--
-- Index pour la table `groupealgo`
--
ALTER TABLE `groupealgo`
 ADD KEY `idGroupe` (`idGroupe`), ADD KEY `idAlgorithme` (`idAlgorithme`);

--
-- Index pour la table `groupeutilisateur`
--
ALTER TABLE `groupeutilisateur`
 ADD KEY `idGroupe` (`idGroupe`), ADD KEY `idUtilisateur` (`idUtilisateur`);

--
-- Index pour la table `interactions`
--
ALTER TABLE `interactions`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_538B74BDA6838A3A` (`idTypeInteraction`), ADD KEY `IDX_538B74BD138CFE86` (`idEcoute`);

--
-- Index pour la table `item`
--
ALTER TABLE `item`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `itemartiste`
--
ALTER TABLE `itemartiste`
 ADD PRIMARY KEY (`idItem`,`idArtiste`), ADD KEY `IDX_E3CDA7036CE67B80` (`idItem`), ADD KEY `IDX_E3CDA7038CBE5EBD` (`idArtiste`);

--
-- Index pour la table `itemitem`
--
ALTER TABLE `itemitem`
 ADD PRIMARY KEY (`idItem`,`idAlbum`), ADD KEY `IDX_B56547D66CE67B80` (`idItem`), ADD KEY `IDX_B56547D62E5C2D5E` (`idAlbum`);

--
-- Index pour la table `itemplaylist`
--
ALTER TABLE `itemplaylist`
 ADD PRIMARY KEY (`idPlaylist`,`idItem`), ADD KEY `IDX_A897D60484213B76` (`idPlaylist`), ADD KEY `IDX_A897D6046CE67B80` (`idItem`);

--
-- Index pour la table `langue`
--
ALTER TABLE `langue`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `musique`
--
ALTER TABLE `musique`
 ADD PRIMARY KEY (`idItem`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_CFBDFA145D419CCB` (`idUtilisateur`), ADD KEY `IDX_CFBDFA148CBE5EBD` (`idArtiste`), ADD KEY `IDX_CFBDFA146CE67B80` (`idItem`);

--
-- Index pour la table `notetagitem`
--
ALTER TABLE `notetagitem`
 ADD PRIMARY KEY (`idItem`,`idTag`), ADD KEY `idItem` (`idItem`), ADD KEY `idTag` (`idTag`);

--
-- Index pour la table `ordre`
--
ALTER TABLE `ordre`
 ADD PRIMARY KEY (`id`), ADD KEY `idAlgorithm` (`idAlgorithm`,`idUtilisateur`,`idTest`), ADD KEY `idUtilisateur` (`idUtilisateur`), ADD KEY `idTest` (`idTest`);

--
-- Index pour la table `playlist`
--
ALTER TABLE `playlist`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_D782112D5D419CCB` (`idUtilisateur`);

--
-- Index pour la table `recommandation`
--
ALTER TABLE `recommandation`
 ADD PRIMARY KEY (`id`), ADD KEY `idUtilisateur` (`idUtilisateur`), ADD KEY `idItem` (`idItem`), ADD KEY `idAlgorithme` (`idAlgorithme`);

--
-- Index pour la table `session`
--
ALTER TABLE `session`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_D044D5D45D419CCB` (`idUtilisateur`);

--
-- Index pour la table `sessionecoute`
--
ALTER TABLE `sessionecoute`
 ADD PRIMARY KEY (`idSession`,`idEcoute`), ADD KEY `IDX_21D80256C0FDBE26` (`idSession`), ADD KEY `IDX_21D80256138CFE86` (`idEcoute`);

--
-- Index pour la table `sessionplaylist`
--
ALTER TABLE `sessionplaylist`
 ADD PRIMARY KEY (`idPlaylist`,`idSession`), ADD KEY `IDX_B112720A84213B76` (`idPlaylist`), ADD KEY `IDX_B112720AC0FDBE26` (`idSession`);

--
-- Index pour la table `tag`
--
ALTER TABLE `tag`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tagartiste`
--
ALTER TABLE `tagartiste`
 ADD PRIMARY KEY (`idTag`,`idArtiste`), ADD KEY `IDX_8C759BE022C1AA04` (`idTag`), ADD KEY `IDX_8C759BE08CBE5EBD` (`idArtiste`);

--
-- Index pour la table `tagplaylist`
--
ALTER TABLE `tagplaylist`
 ADD PRIMARY KEY (`idTag`,`idPlaylist`), ADD KEY `IDX_91FBDDFA22C1AA04` (`idTag`), ADD KEY `IDX_91FBDDFA84213B76` (`idPlaylist`);

--
-- Index pour la table `tagsession`
--
ALTER TABLE `tagsession`
 ADD PRIMARY KEY (`idTag`,`idSession`), ADD KEY `IDX_C0367B7B22C1AA04` (`idTag`), ADD KEY `IDX_C0367B7BC0FDBE26` (`idSession`);

--
-- Index pour la table `test`
--
ALTER TABLE `test`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `typeaction`
--
ALTER TABLE `typeaction`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `typeinteraction`
--
ALTER TABLE `typeinteraction`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateuramis`
--
ALTER TABLE `utilisateuramis`
 ADD PRIMARY KEY (`idUtilisateur`,`idUtilisateurAmi`), ADD KEY `IDX_5FC542E85D419CCB` (`idUtilisateur`), ADD KEY `IDX_5FC542E82BF13F1F` (`idUtilisateurAmi`);

--
-- Index pour la table `video`
--
ALTER TABLE `video`
 ADD PRIMARY KEY (`idItem`);

--
-- Index pour la table `videolangue`
--
ALTER TABLE `videolangue`
 ADD PRIMARY KEY (`idVideo`,`idLangue`), ADD KEY `IDX_960D90B06B039931` (`idVideo`), ADD KEY `IDX_960D90B0F046DD14` (`idLangue`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `actions`
--
ALTER TABLE `actions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `algorithm`
--
ALTER TABLE `algorithm`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `artiste`
--
ALTER TABLE `artiste`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ecoute`
--
ALTER TABLE `ecoute`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT pour la table `ext_log_entries`
--
ALTER TABLE `ext_log_entries`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ext_translations`
--
ALTER TABLE `ext_translations`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `fos_user`
--
ALTER TABLE `fos_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT pour la table `interactions`
--
ALTER TABLE `interactions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT pour la table `item`
--
ALTER TABLE `item`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT pour la table `langue`
--
ALTER TABLE `langue`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT pour la table `ordre`
--
ALTER TABLE `ordre`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT pour la table `playlist`
--
ALTER TABLE `playlist`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT pour la table `recommandation`
--
ALTER TABLE `recommandation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT pour la table `session`
--
ALTER TABLE `session`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT pour la table `tag`
--
ALTER TABLE `tag`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT pour la table `test`
--
ALTER TABLE `test`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT pour la table `typeaction`
--
ALTER TABLE `typeaction`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `typeinteraction`
--
ALTER TABLE `typeinteraction`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `actions`
--
ALTER TABLE `actions`
ADD CONSTRAINT `FK_548F1EF46A0FC25` FOREIGN KEY (`idTypeAction`) REFERENCES `typeaction` (`id`),
ADD CONSTRAINT `FK_548F1EF5D419CCB` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`),
ADD CONSTRAINT `FK_548F1EF6CE67B80` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `artistegenre`
--
ALTER TABLE `artistegenre`
ADD CONSTRAINT `FK_16450718949470E5` FOREIGN KEY (`idGenre`) REFERENCES `genre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `artistemusique`
--
ALTER TABLE `artistemusique`
ADD CONSTRAINT `FK_4D5F473E8CBE5EBD` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `artistesimilaire`
--
ALTER TABLE `artistesimilaire`
ADD CONSTRAINT `artistesimilaire_ibfk_1` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `artistesimilaire_ibfk_2` FOREIGN KEY (`idSim`) REFERENCES `artiste` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `artistevideo`
--
ALTER TABLE `artistevideo`
ADD CONSTRAINT `FK_B92ACEB48CBE5EBD` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`id`);

--
-- Contraintes pour la table `ecoute`
--
ALTER TABLE `ecoute`
ADD CONSTRAINT `FK_709D561C6CE67B80` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `groupe`
--
ALTER TABLE `groupe`
ADD CONSTRAINT `groupe_ibfk_1` FOREIGN KEY (`idTest`) REFERENCES `test` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `groupealgo`
--
ALTER TABLE `groupealgo`
ADD CONSTRAINT `groupealgo_ibfk_1` FOREIGN KEY (`idGroupe`) REFERENCES `groupe` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `groupealgo_ibfk_2` FOREIGN KEY (`idAlgorithme`) REFERENCES `algorithm` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `groupeutilisateur`
--
ALTER TABLE `groupeutilisateur`
ADD CONSTRAINT `groupeutilisateur_ibfk_1` FOREIGN KEY (`idGroupe`) REFERENCES `groupe` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `groupeutilisateur_ibfk_2` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `interactions`
--
ALTER TABLE `interactions`
ADD CONSTRAINT `FK_538B74BD138CFE86` FOREIGN KEY (`idEcoute`) REFERENCES `ecoute` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_538B74BDA6838A3A` FOREIGN KEY (`idTypeInteraction`) REFERENCES `typeinteraction` (`id`);

--
-- Contraintes pour la table `itemartiste`
--
ALTER TABLE `itemartiste`
ADD CONSTRAINT `FK_E3CDA7036CE67B80` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_E3CDA7038CBE5EBD` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `itemitem`
--
ALTER TABLE `itemitem`
ADD CONSTRAINT `FK_B56547D62E5C2D5E` FOREIGN KEY (`idAlbum`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_B56547D66CE67B80` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `itemplaylist`
--
ALTER TABLE `itemplaylist`
ADD CONSTRAINT `FK_A897D6046CE67B80` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `itemplaylist_ibfk_1` FOREIGN KEY (`idPlaylist`) REFERENCES `playlist` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `musique`
--
ALTER TABLE `musique`
ADD CONSTRAINT `FK_EE1D56BC6CE67B80` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
ADD CONSTRAINT `FK_CFBDFA145D419CCB` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`),
ADD CONSTRAINT `FK_CFBDFA146CE67B80` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_CFBDFA148CBE5EBD` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`id`);

--
-- Contraintes pour la table `notetagitem`
--
ALTER TABLE `notetagitem`
ADD CONSTRAINT `notetagitem_ibfk_1` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `notetagitem_ibfk_2` FOREIGN KEY (`idTag`) REFERENCES `tag` (`id`);

--
-- Contraintes pour la table `ordre`
--
ALTER TABLE `ordre`
ADD CONSTRAINT `ordre_ibfk_1` FOREIGN KEY (`idAlgorithm`) REFERENCES `algorithm` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `playlist`
--
ALTER TABLE `playlist`
ADD CONSTRAINT `FK_D782112D5D419CCB` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `recommandation`
--
ALTER TABLE `recommandation`
ADD CONSTRAINT `recommandation_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `recommandation_ibfk_2` FOREIGN KEY (`idItem`) REFERENCES `item` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `recommandation_ibfk_3` FOREIGN KEY (`idAlgorithme`) REFERENCES `algorithm` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `session`
--
ALTER TABLE `session`
ADD CONSTRAINT `FK_D044D5D45D419CCB` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `sessionecoute`
--
ALTER TABLE `sessionecoute`
ADD CONSTRAINT `FK_21D80256138CFE86` FOREIGN KEY (`idEcoute`) REFERENCES `ecoute` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_21D80256C0FDBE26` FOREIGN KEY (`idSession`) REFERENCES `session` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sessionplaylist`
--
ALTER TABLE `sessionplaylist`
ADD CONSTRAINT `FK_B112720A84213B76` FOREIGN KEY (`idPlaylist`) REFERENCES `playlist` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_B112720AC0FDBE26` FOREIGN KEY (`idSession`) REFERENCES `session` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `tagartiste`
--
ALTER TABLE `tagartiste`
ADD CONSTRAINT `FK_8C759BE022C1AA04` FOREIGN KEY (`idTag`) REFERENCES `tag` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_8C759BE08CBE5EBD` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `tagplaylist`
--
ALTER TABLE `tagplaylist`
ADD CONSTRAINT `FK_91FBDDFA22C1AA04` FOREIGN KEY (`idTag`) REFERENCES `tag` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_91FBDDFA84213B76` FOREIGN KEY (`idPlaylist`) REFERENCES `playlist` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `tagsession`
--
ALTER TABLE `tagsession`
ADD CONSTRAINT `FK_C0367B7B22C1AA04` FOREIGN KEY (`idTag`) REFERENCES `tag` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `FK_C0367B7BC0FDBE26` FOREIGN KEY (`idSession`) REFERENCES `session` (`id`) ON DELETE CASCADE;

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
