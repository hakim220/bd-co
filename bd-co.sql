-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 18 Mars 2015 à 14:53
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bd-co`
--
CREATE DATABASE IF NOT EXISTS `bd-co` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bd-co`;

-- --------------------------------------------------------

--
-- Structure de la table `actualite_seule`
--

DROP TABLE IF EXISTS `actualite_seule`;
CREATE TABLE IF NOT EXISTS `actualite_seule` (
  `id_actualite_seule` int(11) NOT NULL AUTO_INCREMENT,
  `fk_redacteur_article` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `alt_photo` varchar(100) NOT NULL,
  `legende_photo` varchar(255) NOT NULL,
  `texte` text NOT NULL,
  `date_publication` date NOT NULL,
  `photo_miniature` varchar(100) NOT NULL,
  `categorie_actualite` enum('news','interview','chronique') NOT NULL,
  PRIMARY KEY (`id_actualite_seule`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `actualite_seule`
--

INSERT INTO `actualite_seule` (`id_actualite_seule`, `fk_redacteur_article`, `titre`, `photo`, `alt_photo`, `legende_photo`, `texte`, `date_publication`, `photo_miniature`, `categorie_actualite`) VALUES
(1, 1, 'News numero 1', 'images-photos/article1.jpg', '', 'cece est la legende de la photo', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2015-03-15', 'images-photos/article1.jpg', 'news'),
(2, 1, 'Interview numero 1 ', 'images-photos/article2.png', '', 'ceci est la legende de la photo', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2015-03-19', 'images-photos/article2.png', 'interview'),
(3, 2, 'Chronique numero 1', 'images-photos/article3.jpg', '', 'ceci est la legende de la photo', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2015-03-30', 'images-photos/article3.jpg', 'chronique'),
(4, 2, 'Chronique numero 2', 'images-photos/article4.jpg', 'xxx', 'ceci est la legende de la photo', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2015-03-23', 'images-photos/article4.jpg', 'chronique');

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

DROP TABLE IF EXISTS `evenements`;
CREATE TABLE IF NOT EXISTS `evenements` (
  `id_evenement` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `titre` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `alt_image` varchar(255) NOT NULL,
  `texte` text NOT NULL,
  `echeance` enum('a venir','a eu lieu') NOT NULL,
  `langue` enum('fr','en') NOT NULL,
  PRIMARY KEY (`id_evenement`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `evenements`
--

INSERT INTO `evenements` (`id_evenement`, `date`, `titre`, `image`, `alt_image`, `texte`, `echeance`, `langue`) VALUES
(1, '2015-03-10', 'Salon de la bande dessinée', 'images-photos/salon-bd.jpg', 'image salon bd', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles, mais s''est aussi adapté à la bureautique informatique, sans que son contenu n''en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 'a venir', 'fr'),
(2, '2015-03-10', 'Bd ''s Salon', 'images-photos/salon-bd.jpg', 'image salon bd', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles, mais s''est aussi adapté à la bureautique informatique, sans que son contenu n''en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 'a venir', 'en'),
(3, '2015-03-12', 'Lancement d''une collection', 'images-photos/collection-bd.jpg', 'image collection bd', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles, mais s''est aussi adapté à la bureautique informatique, sans que son contenu n''en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 'a eu lieu', 'fr'),
(4, '2015-03-12', 'Collections is coming', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant imp', 'image collection bd', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles, mais s''est aussi adapté à la bureautique informatique, sans que son contenu n''en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 'a eu lieu', 'en');

-- --------------------------------------------------------

--
-- Structure de la table `forum_message`
--

DROP TABLE IF EXISTS `forum_message`;
CREATE TABLE IF NOT EXISTS `forum_message` (
  `id_forum_message` int(11) NOT NULL AUTO_INCREMENT,
  `fk_sujet` int(11) NOT NULL,
  `fk_membre` int(11) NOT NULL,
  `pseudo_membre` varchar(255) NOT NULL,
  `message` text,
  `date_post` date DEFAULT NULL,
  PRIMARY KEY (`id_forum_message`),
  KEY `message-sujet_idx` (`fk_sujet`),
  KEY `message-membre_idx` (`fk_membre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `forum_message`
--

INSERT INTO `forum_message` (`id_forum_message`, `fk_sujet`, `fk_membre`, `pseudo_membre`, `message`, `date_post`) VALUES
(1, 1, 5, 'test', 'Bonjour à tous, je me demandais où est-ce que je pourrais trouver le BD xxxxx', '2015-03-18'),
(2, 1, 5, 'test', 'je fais un test', '2015-03-08'),
(3, 2, 5, 'test', 'blablablalblalzlfdkofokdfkodkofkodfdokfokd', '2015-03-08'),
(4, 3, 5, 'test', 'je tente de poster un 3eme sujet', '2015-03-08'),
(5, 2, 5, 'test', 'je fais une reponse pour voir si tout marche', '2015-03-08'),
(6, 5, 5, 'test', 'voici un message aléatoire', '2015-03-08'),
(7, 4, 5, 'test', 'nbfkfkogkodfokgfkopgkofog\r\n(rajouté via php admin)', '2015-03-27'),
(8, 4, 5, 'test', 'nbfkfkogkodfokgfkopgkofog\r\n(rajouté via php admin)', '2015-03-27'),
(9, 6, 5, 'test', 'ffffffffdddf', '2015-03-08'),
(10, 7, 5, 'test', 'dsfsdfsdf', '2015-03-08'),
(11, 6, 5, 'test', 'ça y est ', '2015-03-08'),
(12, 7, 5, 'test', 'test de bug', '2015-03-08'),
(13, 8, 6, 'Monsieur P', 'voici un test hifbsdifsdiofhudf', '2015-03-08'),
(14, 8, 6, 'Monsieur P', 'jgsdopigsjopdfg,kskopdfplsdfsdfsdf', '2015-03-08'),
(15, 8, 5, 'test', 'ifjidij^shzôhehi^zenfsgf', '2015-03-08'),
(16, 8, 5, 'test', 'cest test', '2015-03-08'),
(17, 8, 5, '5', 'est-ce que ça va marcher', '2015-03-08'),
(18, 8, 5, 'test', 'ça doit marcher', '2015-03-08'),
(19, 8, 6, 'Monsieur P', 'nouvelle verif si ça marche', '2015-03-08'),
(20, 8, 7, 'user22', 'je suis un nouvel utilisateur', '2015-03-08'),
(21, 12, 7, 'user22', 'fdfdfdgfgfger', '2015-03-08'),
(22, 11, 7, 'user22', 'dfdfdfdf', '2015-03-08'),
(23, 12, 7, 'user22', 'dfdfgfgf', '2015-03-08'),
(24, 12, 7, 'user22', 'zrzrtfrgrr', '2015-03-08'),
(25, 10, 7, 'user22', 'je repare', '2015-03-12'),
(26, 9, 7, 'user22', 'je repare part 2', '2015-03-11'),
(27, 13, 7, 'user22', 'j''avais un probleme de cote, je teste si ça marche 214', '2015-03-08'),
(28, 13, 7, 'user22', 'j''avais ce probleme, je ne l''ai plus...', '2015-03-08'),
(29, 8, 7, 'user22', 'je  suis user 22', '2015-03-08'),
(30, 8, 7, 'user22', 'kjkkhjihiok', '2015-03-08');

-- --------------------------------------------------------

--
-- Structure de la table `forum_sujet`
--

DROP TABLE IF EXISTS `forum_sujet`;
CREATE TABLE IF NOT EXISTS `forum_sujet` (
  `id_forum_sujet` int(11) NOT NULL AUTO_INCREMENT,
  `fk_membre` int(11) NOT NULL,
  `sujet` varchar(255) DEFAULT NULL,
  `date_publication` date DEFAULT NULL,
  PRIMARY KEY (`id_forum_sujet`),
  KEY `forum-membre_idx` (`fk_membre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `forum_sujet`
--

INSERT INTO `forum_sujet` (`id_forum_sujet`, `fk_membre`, `sujet`, `date_publication`) VALUES
(1, 5, 'Ou pouvons-nous trouver la Bd xxxxx', '2015-03-18'),
(2, 5, 'test nouveau sujet', '2015-03-08'),
(3, 5, 'test sujet 3', '2015-03-08'),
(4, 5, 'sujet 4 de test ', '2015-03-08'),
(5, 5, 'nouveau test', '2015-03-08'),
(6, 5, 'blabla', '2015-03-08'),
(7, 5, 'ererer', '2015-03-08'),
(8, 6, 'monsieur x poste', '2015-03-08'),
(9, 7, 'user 22 fait un test', '2015-03-08'),
(10, 7, 'user 22 fait un test', '2015-03-08'),
(11, 7, 'user 22 fait un test', '2015-03-08'),
(12, 7, 'user 22 fait un test', '2015-03-08'),
(13, 7, 'test avec cote', '2015-03-08');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id_membre` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) DEFAULT NULL,
  `civilite` enum('monsieur','madame') NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `courriel` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `avatar-img` varchar(100) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `code_postal` varchar(100) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `adresse_livraison` varchar(255) DEFAULT NULL,
  `code_postal_livraison` varchar(100) DEFAULT NULL,
  `ville_livraison` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_membre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`id_membre`, `pseudo`, `civilite`, `nom`, `prenom`, `courriel`, `password`, `avatar-img`, `adresse`, `code_postal`, `ville`, `adresse_livraison`, `code_postal_livraison`, `ville_livraison`) VALUES
(1, 'jack22', 'monsieur', 'Jack', 'Mickael', 'jack@gmail.com', 'blabla', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'fgfg', 'monsieur', 'ffff', 'ggggggggg', 'g@gmail.com', 'ggggg', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'utilisateur', 'madame', 'malo', 'laurie', 'laur@gmail.com', 'lala', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'utilisateur', 'madame', 'sachot', 'Milene', 'mil@gmail.com', '12345', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'test', 'monsieur', 'Max', 'Martin', 'k@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Monsieur P', 'monsieur', 'monsieur', 'ppp', 'p@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'user22', 'monsieur', 'user', 'usero', 'user22@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) DEFAULT NULL,
  `lien` varchar(255) DEFAULT NULL,
  `type` enum('principal','sous-menu') DEFAULT NULL,
  `index_affichage` int(11) DEFAULT NULL,
  `langue` enum('fr','en') DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `menu`
--

INSERT INTO `menu` (`id_menu`, `designation`, `lien`, `type`, `index_affichage`, `langue`) VALUES
(1, 'Actualités', 'actualites', 'principal', 1, 'fr'),
(2, 'Boutique', 'boutique', 'principal', 2, 'fr'),
(3, 'Evénements', 'evenements', 'principal', 3, 'fr'),
(4, 'Forum', 'forum', 'principal', 4, 'fr'),
(5, 'News', 'actualites_news', 'sous-menu', 1, 'fr'),
(6, 'Chroniques', 'actualites_chroniques', 'sous-menu', 2, 'fr'),
(7, 'Interviews', 'actualites_interviews', 'sous-menu', 3, 'fr');

-- --------------------------------------------------------

--
-- Structure de la table `redacteur_actualite`
--

DROP TABLE IF EXISTS `redacteur_actualite`;
CREATE TABLE IF NOT EXISTS `redacteur_actualite` (
  `id_redacteur_actualite` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `photo_redacteur` varchar(100) NOT NULL,
  `alt_photo_redacteur` varchar(100) NOT NULL,
  `resume` text NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id_redacteur_actualite`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `redacteur_actualite`
--

INSERT INTO `redacteur_actualite` (`id_redacteur_actualite`, `nom`, `prenom`, `photo_redacteur`, `alt_photo_redacteur`, `resume`, `email`) VALUES
(1, 'Dupont', 'Martin', 'images-photos/auteur1.jpg', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'auteur1@gmail.com'),
(2, 'Loubet', 'Sarah', 'images-photos/auteur2.jpg', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'loubet-s@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `id_slider` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) DEFAULT NULL,
  `attribut_alt_img` varchar(100) DEFAULT NULL,
  `titre_slider` varchar(100) DEFAULT NULL,
  `texte_complementaire` varchar(455) DEFAULT NULL,
  `lien_page` varchar(100) DEFAULT NULL,
  `langue` enum('fr','en') DEFAULT NULL,
  PRIMARY KEY (`id_slider`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `slider`
--

INSERT INTO `slider` (`id_slider`, `image`, `attribut_alt_img`, `titre_slider`, `texte_complementaire`, `lien_page`, `langue`) VALUES
(1, 'img-maquette/slide1.jpg', 'slide 1 ', 'Nouveau Futura', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s', '#', 'fr'),
(2, 'img-maquette/slide1.jpg', 'slide 1 ', 'New Futura', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s', '#', 'en'),
(3, 'img-maquette/slide1.jpg', 'slide 1', 'Slide 2 ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s', '#', 'fr'),
(4, 'img-maquette/slide1.jpg', 'slide 1', 'Slide number 2 ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s', '#', 'en');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `forum_message`
--
ALTER TABLE `forum_message`
  ADD CONSTRAINT `message-membre` FOREIGN KEY (`fk_membre`) REFERENCES `membres` (`id_membre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `message-sujet` FOREIGN KEY (`fk_sujet`) REFERENCES `forum_sujet` (`id_forum_sujet`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `forum_sujet`
--
ALTER TABLE `forum_sujet`
  ADD CONSTRAINT `forum-membre` FOREIGN KEY (`fk_membre`) REFERENCES `membres` (`id_membre`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
