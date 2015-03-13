-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 13 Mars 2015 à 22:42
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `bd-co`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`id_membre`, `pseudo`, `civilite`, `nom`, `prenom`, `courriel`, `password`, `avatar-img`, `adresse`, `code_postal`, `ville`, `adresse_livraison`, `code_postal_livraison`, `ville_livraison`) VALUES
(1, 'jack22', 'monsieur', 'Jack', 'Mickael', 'jack@gmail.com', 'blabla', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'fgfg', 'monsieur', 'ffff', 'ggggggggg', 'g@gmail.com', 'ggggg', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'utilisateur', 'madame', 'malo', 'laurie', 'laur@gmail.com', 'lala', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'utilisateur', 'madame', 'sachot', 'Milene', 'mil@gmail.com', '12345', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'test', 'monsieur', 'Max', 'Martin', 'k@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
