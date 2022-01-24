-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 16 juin 2019 à 19:50
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `auto_parc`
--

-- --------------------------------------------------------

--
-- Structure de la table `accident`
--

DROP TABLE IF EXISTS `accident`;
CREATE TABLE IF NOT EXISTS `accident` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_vehicule` text COLLATE utf8_unicode_ci NOT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `date` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `lieu` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `accident`
--

INSERT INTO `accident` (`id`, `id_user`, `id_vehicule`, `type`, `date`, `description`, `lieu`) VALUES
(1, 10, '436452', 'Grave', '2019-06-13', 'Un chameau est apparu de nulle part donc j\'ai essayÃ© de l\'Ã©viter mais j\'ai pas pu rÃ©ussir.\r\nUn chameau est apparu de nulle part donc j\'ai essayÃ© de l\'Ã©viter mais j\'ai pas pu rÃ©ussir.\r\nUn chameau est apparu de nulle part donc j\'ai essayÃ© de l\'Ã©viter mais j\'ai pas pu rÃ©ussir.', 'Hassi Messaoud');

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `id_user` int(11) NOT NULL,
  `id_employe` text COLLATE utf8_unicode_ci NOT NULL,
  `nom` text COLLATE utf8_unicode_ci NOT NULL,
  `prenom` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `telephone` text COLLATE utf8_unicode_ci NOT NULL,
  `date` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`id_user`, `id_employe`, `nom`, `prenom`, `email`, `telephone`, `date`) VALUES
(9, '06541842168451', 'iatarien', 'raouf', 'raoufiatarien@gmail.com', '780456813', '1997-05-12'),
(10, '58426159994', 'Djerrou', 'Amine', 'amine.djerrou@gmail.com', '666548123', '1996-06-16');

-- --------------------------------------------------------

--
-- Structure de la table `maintenance`
--

DROP TABLE IF EXISTS `maintenance`;
CREATE TABLE IF NOT EXISTS `maintenance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_vehicule` text COLLATE utf8_unicode_ci NOT NULL,
  `nature` text COLLATE utf8_unicode_ci NOT NULL,
  `date` text COLLATE utf8_unicode_ci NOT NULL,
  `cout` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `maintenance`
--

INSERT INTO `maintenance` (`id`, `id_user`, `id_vehicule`, `nature`, `date`, `cout`) VALUES
(1, 10, '436452', 'Panne', '2019-06-16', 2000);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_vehicule` text COLLATE utf8_unicode_ci NOT NULL,
  `date_debut` text COLLATE utf8_unicode_ci NOT NULL,
  `date_fin` text COLLATE utf8_unicode_ci NOT NULL,
  `heure_debut` text COLLATE utf8_unicode_ci NOT NULL,
  `heure_fin` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `id_user`, `id_vehicule`, `date_debut`, `date_fin`, `heure_debut`, `heure_fin`) VALUES
(1, 9, '436452', '2019-06-15', '2019-06-16', '11', '12'),
(3, 9, '436452', '2019-06-15', '2019-06-15', '9', '11');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `role` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'admin'),
(2, 'emp', 'admin@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'employe'),
(9, 'raoufiatarien', 'raoufiatarien@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'employe'),
(10, 'amine.djerrou', 'amine.djerrou@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'employe');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

DROP TABLE IF EXISTS `vehicule`;
CREATE TABLE IF NOT EXISTS `vehicule` (
  `matricule` text COLLATE utf8_unicode_ci NOT NULL,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `marque` text COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `puissance` text COLLATE utf8_unicode_ci NOT NULL,
  `energie` text COLLATE utf8_unicode_ci NOT NULL,
  `nb_places` int(11) NOT NULL,
  `assurance` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`matricule`, `type`, `marque`, `name`, `puissance`, `energie`, `nb_places`, `assurance`) VALUES
('436452', 'leger', 'Seat', 'Ibiza', ' ', ' ', 5, ' ');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
