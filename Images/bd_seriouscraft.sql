-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 25 Mai 2015 à 20:09
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bd_seriouscraft`
--

-- --------------------------------------------------------

--
-- Structure de la table `acheter`
--

CREATE TABLE IF NOT EXISTS `acheter` (
  `id_Objet` int(11) NOT NULL,
  `pseudo_J` varchar(20) NOT NULL,
  PRIMARY KEY (`id_Objet`,`pseudo_J`),
  KEY `FK_acheter_pseudo_J` (`pseudo_J`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `acheter`
--

INSERT INTO `acheter` (`id_Objet`, `pseudo_J`) VALUES
(1, 'Joueur1'),
(10, 'Joueur10'),
(1, 'Joueur2'),
(1, 'Joueur3'),
(5, 'Joueur4'),
(6, 'Joueur5'),
(7, 'Joueur6'),
(7, 'Joueur7'),
(8, 'Joueur8'),
(9, 'Joueur9');

-- --------------------------------------------------------

--
-- Structure de la table `allie`
--

CREATE TABLE IF NOT EXISTS `allie` (
  `nom_Faction` varchar(25) NOT NULL,
  `nom_Faction_1` varchar(25) NOT NULL,
  PRIMARY KEY (`nom_Faction`,`nom_Faction_1`),
  KEY `FK_allie_nom_Faction_1` (`nom_Faction_1`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `allie`
--

INSERT INTO `allie` (`nom_Faction`, `nom_Faction_1`) VALUES
('Blogspan', 'Jabbersphere'),
('Lazz', 'Lazzie'),
('Leexo', 'Muxo'),
('Photobean', 'Shuffledrive'),
('Skivee', 'Topicblab');

-- --------------------------------------------------------

--
-- Structure de la table `appartenir`
--

CREATE TABLE IF NOT EXISTS `appartenir` (
  `pseudo_J` varchar(20) NOT NULL,
  `id_Serveur` int(11) NOT NULL,
  PRIMARY KEY (`pseudo_J`,`id_Serveur`),
  KEY `FK_appartenir_id_Serveur` (`id_Serveur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `appartenir`
--

INSERT INTO `appartenir` (`pseudo_J`, `id_Serveur`) VALUES
('Joueur1', 1),
('Joueur10', 1),
('Joueur2', 1),
('Joueur3', 1),
('Joueur4', 2),
('Joueur5', 2),
('Joueur6', 2),
('Joueur7', 3),
('Joueur8', 3),
('Joueur9', 3);

-- --------------------------------------------------------

--
-- Structure de la table `concourir`
--

CREATE TABLE IF NOT EXISTS `concourir` (
  `nom_Faction` varchar(25) NOT NULL,
  `id_Evenement` int(11) NOT NULL,
  PRIMARY KEY (`nom_Faction`,`id_Evenement`),
  KEY `FK_concourir_id_Evenement` (`id_Evenement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `concourir`
--

INSERT INTO `concourir` (`nom_Faction`, `id_Evenement`) VALUES
('Blogspan', 1),
('Jabbersphere', 1),
('Lazz', 1),
('Lazzie', 5),
('Leexo', 5),
('Muxo', 6),
('Photobean', 6),
('Skivee', 6),
('Topicblab', 6);

-- --------------------------------------------------------

--
-- Structure de la table `ennemi`
--

CREATE TABLE IF NOT EXISTS `ennemi` (
  `nom_Faction` varchar(25) NOT NULL,
  `nom_Faction_1` varchar(25) NOT NULL,
  PRIMARY KEY (`nom_Faction`,`nom_Faction_1`),
  KEY `FK_ennemi_nom_Faction_1` (`nom_Faction_1`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ennemi`
--

INSERT INTO `ennemi` (`nom_Faction`, `nom_Faction_1`) VALUES
('Topicblab', 'Blogspan'),
('Jabbersphere', 'Lazz'),
('Lazzie', 'Leexo'),
('Muxo', 'Photobean'),
('Shuffledrive', 'Skivee');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE IF NOT EXISTS `evenement` (
  `id_Evenement` int(11) NOT NULL AUTO_INCREMENT,
  `nom_Evenement` varchar(25) DEFAULT NULL,
  `dateCreation_Evenement` date DEFAULT NULL,
  `dateDeb_Evenement` date DEFAULT NULL,
  `dateFin_Evenement` date DEFAULT NULL,
  `description_Evenement` longtext,
  `pseudo_J` varchar(20) NOT NULL,
  PRIMARY KEY (`id_Evenement`),
  KEY `FK_Evenement_pseudo_J` (`pseudo_J`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `evenement`
--

INSERT INTO `evenement` (`id_Evenement`, `nom_Evenement`, `dateCreation_Evenement`, `dateDeb_Evenement`, `dateFin_Evenement`, `description_Evenement`, `pseudo_J`) VALUES
(1, 'Event1', '2015-05-06', '2015-05-06', '2015-05-06', 'Des choses incroyables vont se produire.', 'themonheal'),
(2, 'Event1', '2015-05-06', '2015-05-06', '2015-05-06', 'Des choses incroyables vont se produire.', 'themonheal'),
(3, 'Event2', '2015-05-06', '2015-05-06', '2015-05-06', 'Des choses incroyables vont se produire.', 'themonheal'),
(4, 'Event3', '2015-05-06', '2015-05-06', '2015-05-06', 'Des choses incroyables vont se produire.', 'themonheal'),
(5, 'Event4', '2015-05-06', '2015-05-06', '2015-05-06', 'Des choses incroyables vont se produire.', 'themonheal'),
(6, 'Event5', '2015-05-06', '2015-05-06', '2015-05-06', 'Des choses incroyables vont se produire.', 'themonheal'),
(7, 'Event6', '2015-05-06', '2015-05-06', '2015-05-06', 'Des choses incroyables vont se produire.', 'themonheal'),
(8, 'Event7', '2015-05-06', '2015-05-06', '2015-05-06', 'Des choses incroyables vont se produire.', 'themonheal'),
(9, 'Event8', '2015-05-06', '2015-05-06', '2015-05-06', 'Des choses incroyables vont se produire.', 'themonheal'),
(10, 'Event9', '2015-05-06', '2015-05-06', '2015-05-06', 'Des choses incroyables vont se produire.', 'themonheal'),
(11, 'Event10', '2015-05-06', '2015-05-06', '2015-05-06', 'Des choses incroyables vont se produire.', 'themonheal');

-- --------------------------------------------------------

--
-- Structure de la table `faction`
--

CREATE TABLE IF NOT EXISTS `faction` (
  `nom_Faction` varchar(25) NOT NULL,
  `description_Faction` longtext,
  PRIMARY KEY (`nom_Faction`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `faction`
--

INSERT INTO `faction` (`nom_Faction`, `description_Faction`) VALUES
('Blogspan', 'Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.'),
('Jabbersphere', 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.'),
('Lazz', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.'),
('Lazzie', 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.'),
('Leexo', 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.'),
('Muxo', 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.'),
('Photobean', 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.'),
('Shuffledrive', 'Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.'),
('Skivee', 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.'),
('Topicblab', 'Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.');

-- --------------------------------------------------------

--
-- Structure de la table `grade`
--

CREATE TABLE IF NOT EXISTS `grade` (
  `id_Grade` int(11) NOT NULL AUTO_INCREMENT,
  `nom_Grade` varchar(25) DEFAULT NULL,
  `prix_Grade` int(11) DEFAULT NULL,
  `description_Grade` longtext,
  PRIMARY KEY (`id_Grade`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `grade`
--

INSERT INTO `grade` (`id_Grade`, `nom_Grade`, `prix_Grade`, `description_Grade`) VALUES
(1, 'et', 8, 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.'),
(2, 'nibh', 9, 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.'),
(3, 'in', 5, 'Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.'),
(4, 'magna', 1, 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.'),
(5, 'faucibus', 4, 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.'),
(6, 'luctus', 7, 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.'),
(7, 'penatibus', 3, 'Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.'),
(8, 'integer', 3, 'Phasellus in felis. Donec semper sapien a libero. Nam dui.'),
(9, 'libero', 7, 'Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.'),
(10, 'porttitor', 3, 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.'),
(11, 'et', 8, 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.'),
(12, 'nibh', 9, 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.'),
(13, 'in', 5, 'Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.'),
(14, 'magna', 1, 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.'),
(15, 'faucibus', 4, 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.'),
(16, 'luctus', 7, 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.'),
(17, 'penatibus', 3, 'Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.'),
(18, 'integer', 3, 'Phasellus in felis. Donec semper sapien a libero. Nam dui.'),
(19, 'libero', 7, 'Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.'),
(20, 'porttitor', 3, 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.');

-- --------------------------------------------------------

--
-- Structure de la table `inclus`
--

CREATE TABLE IF NOT EXISTS `inclus` (
  `id_Objet` int(11) NOT NULL,
  `id_Grade` int(11) NOT NULL,
  PRIMARY KEY (`id_Objet`,`id_Grade`),
  KEY `FK_inclus_id_Grade` (`id_Grade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `inclus`
--

INSERT INTO `inclus` (`id_Objet`, `id_Grade`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE IF NOT EXISTS `joueur` (
  `pseudo_J` varchar(20) NOT NULL,
  `mdp_J` varchar(25) NOT NULL,
  `seriousflouz` int(11) DEFAULT NULL,
  `nb_Vote` int(11) DEFAULT NULL,
  `nb_PointBoutique` int(11) DEFAULT NULL,
  `token` varchar(25) DEFAULT NULL,
  `nom_Faction` varchar(25) NOT NULL,
  PRIMARY KEY (`pseudo_J`),
  KEY `FK_Joueur_nom_Faction` (`nom_Faction`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `joueur`
--

INSERT INTO `joueur` (`pseudo_J`, `mdp_J`, `seriousflouz`, `nb_Vote`, `nb_PointBoutique`, `token`, `nom_Faction`) VALUES
('Joueur1', '12345', 10, 1, 0, 'sefvsdf4sf54fd46f', 'Jabbersphere'),
('Joueur10', '1234', 1, 2, 3, 'vsdvsdvfefgbtrehergg54', 'Lazz'),
('Joueur2', '1234', 1000, 1000, 1000, 'vsdvsdvfefgbtrehergg54', 'Lazz'),
('Joueur3', '1234', 5, 5, 2, 'vsdvsdvfefgbtrehergg54', 'Lazz'),
('Joueur4', '1234', 9, 0, 1, 'vsdvsdvfefgbtrehergg54', 'Lazz'),
('Joueur5', '1234', 0, 0, 0, 'vsdvsdvfefgbtrehergg54', 'Lazz'),
('Joueur6', '1234', 4, 4, 4, 'vsdvsdvfefgbtrehergg54', 'Lazz'),
('Joueur7', '1234', 6, 7, 5, 'vsdvsdvfefgbtrehergg54', 'Lazz'),
('Joueur8', '1234', 1, 2, 8, 'vsdvsdvfefgbtrehergg54', 'Lazz'),
('Joueur9', '1234', 1, 2, 2, 'vsdvsdvfefgbtrehergg54', 'Lazz'),
('themonheal', '1234', 10000000, 10000000, 10000000, 'vfdvkjsdlvjsv5v6zd8sdfpog', 'Blogspan');

-- --------------------------------------------------------

--
-- Structure de la table `objet`
--

CREATE TABLE IF NOT EXISTS `objet` (
  `id_Objet` int(11) NOT NULL AUTO_INCREMENT,
  `nom_Objet` varchar(25) DEFAULT NULL,
  `prix_Objet` int(11) DEFAULT NULL,
  `description_Objet` longtext,
  PRIMARY KEY (`id_Objet`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `objet`
--

INSERT INTO `objet` (`id_Objet`, `nom_Objet`, `prix_Objet`, `description_Objet`) VALUES
(1, 'neque', 9, 'Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.'),
(2, 'hac', 8, 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.'),
(3, 'tempor', 9, 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.'),
(4, 'dolor', 10, 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.'),
(5, 'ante', 3, 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.'),
(6, 'id', 7, 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.'),
(7, 'eget', 4, 'Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.'),
(8, 'donec', 6, 'Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.'),
(9, 'libero', 1, 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.'),
(10, 'morbi', 7, 'Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.'),
(11, 'neque', 9, 'Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.'),
(12, 'hac', 8, 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.'),
(13, 'tempor', 9, 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.'),
(14, 'dolor', 10, 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.'),
(15, 'ante', 3, 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.'),
(16, 'id', 7, 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.'),
(17, 'eget', 4, 'Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.'),
(18, 'donec', 6, 'Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.'),
(19, 'libero', 1, 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.'),
(20, 'morbi', 7, 'Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.');

-- --------------------------------------------------------

--
-- Structure de la table `participe`
--

CREATE TABLE IF NOT EXISTS `participe` (
  `id_Evenement` int(11) NOT NULL,
  `pseudo_J` varchar(20) NOT NULL,
  PRIMARY KEY (`id_Evenement`,`pseudo_J`),
  KEY `FK_participe_pseudo_J` (`pseudo_J`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `participe`
--

INSERT INTO `participe` (`id_Evenement`, `pseudo_J`) VALUES
(1, 'Joueur1'),
(2, 'Joueur4');

-- --------------------------------------------------------

--
-- Structure de la table `promouvoir`
--

CREATE TABLE IF NOT EXISTS `promouvoir` (
  `pseudo_J` varchar(20) NOT NULL,
  `id_Grade` int(11) NOT NULL,
  PRIMARY KEY (`pseudo_J`,`id_Grade`),
  KEY `FK_promouvoir_id_Grade` (`id_Grade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `promouvoir`
--

INSERT INTO `promouvoir` (`pseudo_J`, `id_Grade`) VALUES
('Joueur1', 1),
('Joueur2', 2),
('Joueur3', 3),
('Joueur4', 4),
('Joueur5', 5),
('Joueur6', 6),
('Joueur7', 7),
('Joueur8', 8),
('Joueur9', 9),
('Joueur10', 10);

-- --------------------------------------------------------

--
-- Structure de la table `recompenser`
--

CREATE TABLE IF NOT EXISTS `recompenser` (
  `id_Objet` int(11) NOT NULL,
  `id_Evenement` int(11) NOT NULL,
  `pseudo_J` varchar(20) NOT NULL,
  PRIMARY KEY (`id_Objet`,`id_Evenement`,`pseudo_J`),
  KEY `FK_recompenser_id_Evenement` (`id_Evenement`),
  KEY `FK_recompenser_pseudo_J` (`pseudo_J`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `recompenser`
--

INSERT INTO `recompenser` (`id_Objet`, `id_Evenement`, `pseudo_J`) VALUES
(1, 1, 'Joueur1'),
(1, 2, 'Joueur2');

-- --------------------------------------------------------

--
-- Structure de la table `serveur`
--

CREATE TABLE IF NOT EXISTS `serveur` (
  `id_Serveur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_Serveur` varchar(25) DEFAULT NULL,
  `description_Serveur` longtext,
  PRIMARY KEY (`id_Serveur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `serveur`
--

INSERT INTO `serveur` (`id_Serveur`, `nom_Serveur`, `description_Serveur`) VALUES
(1, 'nulla', 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.'),
(2, 'id', 'Sed ante. Vivamus tortor. Duis mattis egestas metus.'),
(3, 'curae', 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.');

-- --------------------------------------------------------

--
-- Structure de la table `voter`
--

CREATE TABLE IF NOT EXISTS `voter` (
  `id_Evenement` int(11) NOT NULL,
  `pseudo_J` varchar(20) NOT NULL,
  PRIMARY KEY (`id_Evenement`,`pseudo_J`),
  KEY `FK_voter_pseudo_J` (`pseudo_J`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `voter`
--

INSERT INTO `voter` (`id_Evenement`, `pseudo_J`) VALUES
(1, 'Joueur1'),
(2, 'Joueur2');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `acheter`
--
ALTER TABLE `acheter`
  ADD CONSTRAINT `FK_acheter_pseudo_J` FOREIGN KEY (`pseudo_J`) REFERENCES `joueur` (`pseudo_J`),
  ADD CONSTRAINT `FK_acheter_id_Objet` FOREIGN KEY (`id_Objet`) REFERENCES `objet` (`id_Objet`);

--
-- Contraintes pour la table `allie`
--
ALTER TABLE `allie`
  ADD CONSTRAINT `FK_allie_nom_Faction_1` FOREIGN KEY (`nom_Faction_1`) REFERENCES `faction` (`nom_Faction`),
  ADD CONSTRAINT `FK_allie_nom_Faction` FOREIGN KEY (`nom_Faction`) REFERENCES `faction` (`nom_Faction`);

--
-- Contraintes pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD CONSTRAINT `FK_appartenir_id_Serveur` FOREIGN KEY (`id_Serveur`) REFERENCES `serveur` (`id_Serveur`),
  ADD CONSTRAINT `FK_appartenir_pseudo_J` FOREIGN KEY (`pseudo_J`) REFERENCES `joueur` (`pseudo_J`);

--
-- Contraintes pour la table `concourir`
--
ALTER TABLE `concourir`
  ADD CONSTRAINT `FK_concourir_id_Evenement` FOREIGN KEY (`id_Evenement`) REFERENCES `evenement` (`id_Evenement`),
  ADD CONSTRAINT `FK_concourir_nom_Faction` FOREIGN KEY (`nom_Faction`) REFERENCES `faction` (`nom_Faction`);

--
-- Contraintes pour la table `ennemi`
--
ALTER TABLE `ennemi`
  ADD CONSTRAINT `FK_ennemi_nom_Faction_1` FOREIGN KEY (`nom_Faction_1`) REFERENCES `faction` (`nom_Faction`),
  ADD CONSTRAINT `FK_ennemi_nom_Faction` FOREIGN KEY (`nom_Faction`) REFERENCES `faction` (`nom_Faction`);

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `FK_Evenement_pseudo_J` FOREIGN KEY (`pseudo_J`) REFERENCES `joueur` (`pseudo_J`);

--
-- Contraintes pour la table `inclus`
--
ALTER TABLE `inclus`
  ADD CONSTRAINT `FK_inclus_id_Grade` FOREIGN KEY (`id_Grade`) REFERENCES `grade` (`id_Grade`),
  ADD CONSTRAINT `FK_inclus_id_Objet` FOREIGN KEY (`id_Objet`) REFERENCES `objet` (`id_Objet`);

--
-- Contraintes pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD CONSTRAINT `FK_Joueur_nom_Faction` FOREIGN KEY (`nom_Faction`) REFERENCES `faction` (`nom_Faction`);

--
-- Contraintes pour la table `participe`
--
ALTER TABLE `participe`
  ADD CONSTRAINT `FK_participe_pseudo_J` FOREIGN KEY (`pseudo_J`) REFERENCES `joueur` (`pseudo_J`),
  ADD CONSTRAINT `FK_participe_id_Evenement` FOREIGN KEY (`id_Evenement`) REFERENCES `evenement` (`id_Evenement`);

--
-- Contraintes pour la table `promouvoir`
--
ALTER TABLE `promouvoir`
  ADD CONSTRAINT `FK_promouvoir_id_Grade` FOREIGN KEY (`id_Grade`) REFERENCES `grade` (`id_Grade`),
  ADD CONSTRAINT `FK_promouvoir_pseudo_J` FOREIGN KEY (`pseudo_J`) REFERENCES `joueur` (`pseudo_J`);

--
-- Contraintes pour la table `recompenser`
--
ALTER TABLE `recompenser`
  ADD CONSTRAINT `FK_recompenser_pseudo_J` FOREIGN KEY (`pseudo_J`) REFERENCES `joueur` (`pseudo_J`),
  ADD CONSTRAINT `FK_recompenser_id_Evenement` FOREIGN KEY (`id_Evenement`) REFERENCES `evenement` (`id_Evenement`),
  ADD CONSTRAINT `FK_recompenser_id_Objet` FOREIGN KEY (`id_Objet`) REFERENCES `objet` (`id_Objet`);

--
-- Contraintes pour la table `voter`
--
ALTER TABLE `voter`
  ADD CONSTRAINT `FK_voter_pseudo_J` FOREIGN KEY (`pseudo_J`) REFERENCES `joueur` (`pseudo_J`),
  ADD CONSTRAINT `FK_voter_id_Evenement` FOREIGN KEY (`id_Evenement`) REFERENCES `evenement` (`id_Evenement`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
