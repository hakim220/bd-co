-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 12 Avril 2015 à 23:10
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
  `langue` enum('fr','en') NOT NULL,
  PRIMARY KEY (`id_actualite_seule`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `actualite_seule`
--

INSERT INTO `actualite_seule` (`id_actualite_seule`, `fk_redacteur_article`, `titre`, `photo`, `alt_photo`, `legende_photo`, `texte`, `date_publication`, `photo_miniature`, `categorie_actualite`, `langue`) VALUES
(1, 1, 'News numero 1', 'images-photos/article1.jpg', '', 'cece est la legende de la photo', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2015-03-15', 'images-photos/article1.jpg', 'news', 'fr'),
(2, 1, 'Interview numero 1 ', 'images-photos/article2.png', '', 'ceci est la legende de la photo', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2015-03-19', 'images-photos/article2.png', 'interview', 'fr'),
(3, 2, 'Chronique numero 1', 'images-photos/article3.jpg', '', 'ceci est la legende de la photo', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2015-03-30', 'images-photos/article3.jpg', 'chronique', 'fr'),
(4, 2, 'Chronique numero 2', 'images-photos/article4.jpg', 'xxx', 'ceci est la legende de la photo', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2015-03-23', 'images-photos/article4.jpg', 'chronique', 'fr');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int(11) NOT NULL,
  `prix_unitaire` float NOT NULL,
  `stock` float NOT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id_article`, `prix_unitaire`, `stock`) VALUES
(1, 10, 20),
(2, 9.99, 10),
(3, 10, 10),
(4, 15, 10),
(5, 14, 10),
(6, 17, 10),
(7, 14, 10),
(8, 13.99, 20),
(9, 12, 10),
(10, 17, 20),
(11, 12, 10),
(12, 14, 30);

-- --------------------------------------------------------

--
-- Structure de la table `auteur_bd`
--

DROP TABLE IF EXISTS `auteur_bd`;
CREATE TABLE IF NOT EXISTS `auteur_bd` (
  `id_auteur_bd` int(11) NOT NULL AUTO_INCREMENT,
  `nom_auteur` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_auteur_bd`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `auteur_bd`
--

INSERT INTO `auteur_bd` (`id_auteur_bd`, `nom_auteur`) VALUES
(1, 'Auteur a'),
(2, 'Auteur b');

-- --------------------------------------------------------

--
-- Structure de la table `categories_forum`
--

DROP TABLE IF EXISTS `categories_forum`;
CREATE TABLE IF NOT EXISTS `categories_forum` (
  `id_categories_forum` int(11) NOT NULL,
  `type` enum('actualites','bd','autres') DEFAULT NULL,
  `designation_type` varchar(45) DEFAULT NULL,
  `langue` enum('fr','en') DEFAULT NULL,
  PRIMARY KEY (`id_categories_forum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categories_forum`
--

INSERT INTO `categories_forum` (`id_categories_forum`, `type`, `designation_type`, `langue`) VALUES
(1, 'actualites', 'Actualités', 'fr'),
(2, 'bd', 'Trouver une Bd', 'fr'),
(3, 'autres', 'Divers', 'fr'),
(4, 'actualites', 'News', 'en'),
(5, 'bd', 'Find a Comic', 'en'),
(6, 'autres', 'Other', 'en');

-- --------------------------------------------------------

--
-- Structure de la table `designation_article`
--

DROP TABLE IF EXISTS `designation_article`;
CREATE TABLE IF NOT EXISTS `designation_article` (
  `id_designation_article` int(11) NOT NULL AUTO_INCREMENT,
  `fk_article` int(11) NOT NULL,
  `fk_genre_bd` int(11) NOT NULL,
  `fk_serie_bd` int(11) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `lien_photo` varchar(100) NOT NULL,
  `date_parution` date NOT NULL,
  `resume` varchar(500) NOT NULL,
  `nombre_page` varchar(100) NOT NULL,
  `ena` varchar(50) NOT NULL,
  `langue` enum('fr','en') NOT NULL,
  PRIMARY KEY (`id_designation_article`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `designation_article`
--

INSERT INTO `designation_article` (`id_designation_article`, `fk_article`, `fk_genre_bd`, `fk_serie_bd`, `designation`, `lien_photo`, `date_parution`, `resume`, `nombre_page`, `ena`, `langue`) VALUES
(1, 1, 1, 1, 'Tintin', 'images-photos/bd_ventes/bd1.jpg', '2015-03-01', 'voici le resumé de la bd', '120', '584815945248', 'fr'),
(2, 2, 1, 2, 'Golden dogs', 'images-photos/bd_ventes/bd2.jpg', '2015-03-06', 'voici un résumé xxxxx', '80', '5887859555', 'fr'),
(3, 3, 2, 2, 'Buffalo Bunner', 'images-photos/bd_ventes/bd3.jpg', '2015-03-26', 'voici le résumé xxxxxxx', '90', '478562', 'fr'),
(4, 4, 3, 3, 'Les promeneurs', 'images-photos/bd_ventes/bd-13.jpg', '2015-03-20', 'dpsfk,sgfopskofd sjpodfs dfo sofkgsko', '50', '147596', 'fr'),
(5, 5, 1, 4, 'Bob Morane', 'images-photos/bd_ventes/bd-4.jpg', '2015-03-27', 'voici un résumé xxxxxx', '40', '5987624', 'fr'),
(6, 6, 2, 5, 'dick herisson', 'images-photos/bd_ventes/bd-5.jpg', '2015-04-05', 'bd xxxx kjzpjer idpjfzjpisf pzijerpjizerjpepjzir', '78', '123456', 'fr'),
(7, 7, 3, 6, 'Chocolat vanilla', 'images-photos/bd_ventes/bd-6.jpg', '2015-03-28', 'voici le réumé blabla', '80', '123456', 'fr'),
(8, 8, 5, 7, 'Savage Dragon', 'images-photos/bd_ventes/bd-7.jpg', '2015-03-28', 'voici un résumé blablabla', '74', '123456', 'fr'),
(9, 9, 6, 7, 'Kinsman', 'images-photos/bd_ventes/bd-8.jpg', '2015-04-13', 'voivi un résumé blablablabla....', '75', '123456', 'fr'),
(10, 10, 4, 8, 'Carthago', 'images-photos/bd_ventes/bd-9.jpg', '2015-04-12', 'voici un résumé', '75', '123456', 'fr'),
(11, 11, 5, 9, 'Le reve du requin', 'images-photos/bd_ventes/bd-10.jpg', '2015-04-10', 'voici un résumé', '47', '123456789', 'fr'),
(12, 12, 6, 10, 'Centarus numéro 2', 'images-photos/bd_ventes/bd-11.jpg', '2015-05-10', 'voici un résumé de la bd', '32', '123456', 'fr');

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

DROP TABLE IF EXISTS `evenements`;
CREATE TABLE IF NOT EXISTS `evenements` (
  `id_evenement` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `alt_image` varchar(255) NOT NULL,
  `texte` text NOT NULL,
  `echeance` enum('a venir','a eu lieu') NOT NULL,
  `langue` enum('fr','en') NOT NULL,
  PRIMARY KEY (`id_evenement`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `evenements`
--

INSERT INTO `evenements` (`id_evenement`, `date`, `title`, `image`, `alt_image`, `texte`, `echeance`, `langue`) VALUES
(1, '2015-03-10', 'Salon de la bande dessinée', 'images-photos/salon-bd.jpg', 'image salon bd', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles, mais s''est aussi adapté à la bureautique informatique, sans que son contenu n''en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 'a venir', 'fr'),
(2, '2015-03-10', 'Bd ''s Salon', 'images-photos/salon-bd.jpg', 'image salon bd', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles, mais s''est aussi adapté à la bureautique informatique, sans que son contenu n''en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 'a venir', 'en'),
(3, '2015-03-12', 'Lancement d''une collection', 'images-photos/collection-bd.jpg', 'image collection bd', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles, mais s''est aussi adapté à la bureautique informatique, sans que son contenu n''en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 'a eu lieu', 'fr'),
(4, '2015-03-12', 'Collections is coming', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant imp', 'image collection bd', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l''imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n''a pas fait que survivre cinq siècles, mais s''est aussi adapté à la bureautique informatique, sans que son contenu n''en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 'a eu lieu', 'en'),
(5, '2015-04-12', 'Un nouvel evenement qui va se tenir à paris', '', 'xx', 'sjkddkfdf,skf', 'a venir', 'fr');

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
  `date_post` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_forum_message`),
  KEY `message-sujet_idx` (`fk_sujet`),
  KEY `message-membre_idx` (`fk_membre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Contenu de la table `forum_message`
--

INSERT INTO `forum_message` (`id_forum_message`, `fk_sujet`, `fk_membre`, `pseudo_membre`, `message`, `date_post`) VALUES
(1, 1, 5, 'test', 'Bonjour à tous, je me demandais où est-ce que je pourrais trouver le BD xxxxx', '2015-03-17 23:00:00'),
(2, 1, 5, 'test', 'je fais un test', '2015-03-07 23:00:00'),
(3, 2, 5, 'test', 'blablablalblalzlfdkofokdfkodkofkodfdokfokd', '2015-03-07 23:00:00'),
(4, 3, 5, 'test', 'je tente de poster un 3eme sujet', '2015-03-07 23:00:00'),
(5, 2, 5, 'test', 'je fais une reponse pour voir si tout marche', '2015-03-07 23:00:00'),
(6, 5, 5, 'test', 'voici un message aléatoire', '2015-03-07 23:00:00'),
(7, 4, 5, 'test', 'nbfkfkogkodfokgfkopgkofog\r\n(rajouté via php admin)', '2015-03-26 23:00:00'),
(8, 4, 5, 'test', 'nbfkfkogkodfokgfkopgkofog\r\n(rajouté via php admin)', '2015-03-26 23:00:00'),
(9, 6, 5, 'test', 'ffffffffdddf', '2015-03-07 23:00:00'),
(10, 7, 5, 'test', 'dsfsdfsdf', '2015-03-07 23:00:00'),
(11, 6, 5, 'test', 'ça y est ', '2015-03-07 23:00:00'),
(12, 7, 5, 'test', 'test de bug', '2015-03-07 23:00:00'),
(13, 8, 6, 'Monsieur P', 'voici un test hifbsdifsdiofhudf', '2015-03-07 23:00:00'),
(14, 8, 6, 'Monsieur P', 'jgsdopigsjopdfg,kskopdfplsdfsdfsdf', '2015-03-07 23:00:00'),
(15, 8, 5, 'test', 'ifjidij^shzôhehi^zenfsgf', '2015-03-07 23:00:00'),
(16, 8, 5, 'test', 'cest test', '2015-03-07 23:00:00'),
(17, 8, 5, '5', 'est-ce que ça va marcher', '2015-03-07 23:00:00'),
(18, 8, 5, 'test', 'ça doit marcher', '2015-03-07 23:00:00'),
(19, 8, 6, 'Monsieur P', 'nouvelle verif si ça marche', '2015-03-07 23:00:00'),
(20, 8, 7, 'user22', 'je suis un nouvel utilisateur', '2015-03-07 23:00:00'),
(21, 12, 7, 'user22', 'fdfdfdgfgfger', '2015-03-07 23:00:00'),
(22, 11, 7, 'user22', 'dfdfdfdf', '2015-03-07 23:00:00'),
(23, 12, 7, 'user22', 'dfdfgfgf', '2015-03-07 23:00:00'),
(24, 12, 7, 'user22', 'zrzrtfrgrr', '2015-03-07 23:00:00'),
(25, 10, 7, 'user22', 'je repare', '2015-03-11 23:00:00'),
(26, 9, 7, 'user22', 'je repare part 2', '2015-03-10 23:00:00'),
(27, 13, 7, 'user22', 'j''avais un probleme de cote, je teste si ça marche 214', '2015-03-07 23:00:00'),
(28, 13, 7, 'user22', 'j''avais ce probleme, je ne l''ai plus...', '2015-03-07 23:00:00'),
(29, 8, 7, 'user22', 'je  suis user 22', '2015-03-07 23:00:00'),
(30, 8, 7, 'user22', 'kjkkhjihiok', '2015-03-07 23:00:00'),
(31, 9, 7, 'user22', 'je teste si ça marche', '2015-03-07 23:00:00'),
(35, 14, 7, 'user22', 'je fais un test avec les catégories', '2015-03-07 23:00:00'),
(36, 15, 7, 'user22', 'je t''este l''a catégorie actualités 2145', '2015-03-07 23:00:00'),
(37, 16, 7, 'user22', 'jdfkodnos', '2015-03-07 23:00:00'),
(45, 1, 5, 'testotuo', 'dfdfdfzzzzzzzzzzzzzzzzzzzzz', '2015-04-08 20:29:58'),
(46, 3, 5, 'testotuo', 'fgfgfggffgfggffg', '2015-04-08 20:46:26');

-- --------------------------------------------------------

--
-- Structure de la table `forum_sujet`
--

DROP TABLE IF EXISTS `forum_sujet`;
CREATE TABLE IF NOT EXISTS `forum_sujet` (
  `id_forum_sujet` int(11) NOT NULL AUTO_INCREMENT,
  `fk_membre` int(11) NOT NULL,
  `sujet` varchar(255) DEFAULT NULL,
  `categorie_sujet` enum('actualites','bd','autres') NOT NULL,
  `date_publication` date DEFAULT NULL,
  PRIMARY KEY (`id_forum_sujet`),
  KEY `forum-membre_idx` (`fk_membre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `forum_sujet`
--

INSERT INTO `forum_sujet` (`id_forum_sujet`, `fk_membre`, `sujet`, `categorie_sujet`, `date_publication`) VALUES
(1, 5, 'Ou pouvons-nous trouver la Bd xxxxx', 'actualites', '2015-03-18'),
(2, 5, 'test nouveau sujet', 'autres', '2015-03-08'),
(3, 5, 'test sujet 3', 'actualites', '2015-03-08'),
(4, 5, 'sujet 4 de test ', 'actualites', '2015-03-08'),
(5, 5, 'nouveau test', 'actualites', '2015-03-08'),
(6, 5, 'blabla', 'actualites', '2015-03-08'),
(7, 5, 'ererer', 'bd', '2015-03-08'),
(8, 6, 'monsieur x poste', 'actualites', '2015-03-08'),
(9, 7, 'user 22 fait un test', 'bd', '2015-03-08'),
(10, 7, 'user 22 fait un test', 'actualites', '2015-03-08'),
(11, 7, 'user 22 fait un test', 'bd', '2015-03-08'),
(12, 7, 'user 22 fait un test', 'autres', '2015-03-08'),
(13, 7, 'test avec cote', 'autres', '2015-03-08'),
(14, 7, 'Catégorie bd', 'bd', '2015-03-08'),
(15, 7, 'catégorie actu', 'actualites', '2015-03-08'),
(16, 7, 'je teste divers', 'autres', '2015-03-08');

-- --------------------------------------------------------

--
-- Structure de la table `genre_bd`
--

DROP TABLE IF EXISTS `genre_bd`;
CREATE TABLE IF NOT EXISTS `genre_bd` (
  `id_genre_bd` int(11) NOT NULL,
  `genre_bd` enum('aventure','histoire','thriller/suspence','western','fantastique','enfant','grand enfant','ado') DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `langue` enum('fr','en') DEFAULT NULL,
  PRIMARY KEY (`id_genre_bd`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `genre_bd`
--

INSERT INTO `genre_bd` (`id_genre_bd`, `genre_bd`, `designation`, `langue`) VALUES
(1, 'aventure', 'aventure', 'fr'),
(2, 'histoire', 'histoire', 'fr');

-- --------------------------------------------------------

--
-- Structure de la table `liste_auteur_bd`
--

DROP TABLE IF EXISTS `liste_auteur_bd`;
CREATE TABLE IF NOT EXISTS `liste_auteur_bd` (
  `id_liste_auteur_bd` int(11) NOT NULL AUTO_INCREMENT,
  `fk_auteur_bd` int(11) NOT NULL,
  `fk_designation_article` int(11) NOT NULL,
  PRIMARY KEY (`id_liste_auteur_bd`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `liste_auteur_bd`
--

INSERT INTO `liste_auteur_bd` (`id_liste_auteur_bd`, `fk_auteur_bd`, `fk_designation_article`) VALUES
(1, 1, 1),
(2, 2, 1);

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
  `avatar_img` varchar(200) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `code_postal` varchar(100) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `adresse_livraison` varchar(255) DEFAULT NULL,
  `code_postal_livraison` varchar(100) DEFAULT NULL,
  `ville_livraison` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_membre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`id_membre`, `pseudo`, `civilite`, `nom`, `prenom`, `courriel`, `password`, `avatar_img`, `adresse`, `code_postal`, `ville`, `adresse_livraison`, `code_postal_livraison`, `ville_livraison`) VALUES
(1, 'user44', 'madame', 'Croft', 'Lara', 'lara@gmail.com', 'blabla', 'images-photos/avatars/avatar-base.png', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'user_du_31', 'monsieur', 'Mich', 'El', 'l@gmail.com', 'ggggg', 'images-photos/avatars/avatar-base.png', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'user88', 'monsieur', 'Bobo', 'Rista', 'rista@gmail.com', 'lala', 'images-photos/avatars/avatar-base.png', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'fat8', 'madame', 'Lili', 'Loula', 'lil@gmail.com', '12345', 'images-photos/avatars/avatar-base.png', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'testotuo', 'monsieur', 'maxime', 'laurot', 'max@gmail.com', 'ab56b4d92b40713acc5af89985d4b786', 'images-photos/avatars/avatar-testotuo.png', '19 rue du 18 juin', 'gagny', '93220', '19 rue du 18 juin', 'gagny', '93220'),
(6, 'rr', 'monsieur', 'Msi', 'Marc', 'm@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'images-photos/avatars/avatar-base.png', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Prt88', 'monsieur', 'Prati', 'Que', 'ma@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'images-photos/avatars/avatar-base.png', NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, 'monsieur', NULL, NULL, 'hakim@gmail.com', '1234', 'images-photos/avatars/avatar-base.png', NULL, NULL, NULL, NULL, NULL, NULL),
(9, NULL, 'monsieur', NULL, NULL, 'hakim2@gmail.com', '1234', 'images-photos/avatars/avatar-base.png', NULL, NULL, NULL, NULL, NULL, NULL),
(10, '', 'monsieur', 'user', 'nom', 'user555@gmail.com', '12345', '', '14 rue du parc', '06000', 'Nice', '14 rue du parc', '06000', 'Nice'),
(11, NULL, 'monsieur', NULL, NULL, 'kako@gmail.com', 'abcde', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(5, 'News', 'actualites&categorie=news', 'sous-menu', 1, 'fr'),
(6, 'Chroniques', 'actualites&categorie=chronique', 'sous-menu', 2, 'fr'),
(7, 'Interviews', 'actualites&categorie=interview', 'sous-menu', 3, 'fr');

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
-- Structure de la table `series_bd`
--

DROP TABLE IF EXISTS `series_bd`;
CREATE TABLE IF NOT EXISTS `series_bd` (
  `id_series_bd` int(11) NOT NULL AUTO_INCREMENT,
  `nom_serie` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_series_bd`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `series_bd`
--

INSERT INTO `series_bd` (`id_series_bd`, `nom_serie`) VALUES
(1, 'Thorgal'),
(2, 'Golden');

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
