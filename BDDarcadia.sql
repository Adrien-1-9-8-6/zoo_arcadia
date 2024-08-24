-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 23 août 2024 à 07:56
-- Version du serveur : 8.0.36
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `zooarcadia`
--

-- --------------------------------------------------------

--
-- Structure de la table `animal`
--

DROP TABLE IF EXISTS `animal`;
CREATE TABLE IF NOT EXISTS `animal` (
  `id` int NOT NULL AUTO_INCREMENT,
  `race_id` int NOT NULL,
  `habitat_id` int NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_animal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nourriture` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grammage` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6AAB231F6E59D40D` (`race_id`),
  KEY `IDX_6AAB231FAFFE2D26` (`habitat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `animal`
--

INSERT INTO `animal` (`id`, `race_id`, `habitat_id`, `prenom`, `etat`, `image_animal`, `nourriture`, `grammage`) VALUES
(3, 3, 3, 'Justin', 'Bon', '4b7f5a13bae9ee937b35f622ba8468b7e665806b.jpg', 'Légumes, feuilles', '200kg/jour'),
(4, 4, 3, 'Gaston', 'Bon', 'cbf06d6f905f98c6eff7fd71db0d2453ccc2d558.jpg', 'Légumes, fruits, feuilles', '70kg/jour'),
(5, 5, 3, 'Laura', 'Malade', '90647d1aab881fcf084ef8d4b33354a48ef57971.jpg', 'Viande', '3kg/jour'),
(6, 6, 4, 'Arthur', 'Bon', '4f6d3746f4eae1cbc3d4b59e0da2597613d59041.jpg', 'Légumes, fruits, feuilles', '50g/jour'),
(7, 7, 4, 'Speedy', 'Malade', '1246e507da1501c6af52c357c1e967e58fc3f997.png', 'Viande', '3kg/jour'),
(8, 8, 4, 'Banane', 'Bon', '84aec6da4869d3d99a3da90b19583b6c1d1fdbc3.jpg', 'Fruits, feuilles, fleures, écorces, insectes', '7kg/jour'),
(9, 9, 5, 'Croque monsieur', 'Bon', '2391a7cd6d6625a3ad0f08a64822253aad02de6c.png', 'Viande, Poisson', '15kg/jour'),
(10, 10, 5, 'Moustache', 'Malade', '6fde3d0841c4cdb32919ce92e0ac79e9d8a75952.jpg', 'Poisson, crustacés, amphibiens', '2kg/jour'),
(11, 11, 5, 'Donatello', 'Bon', '5fcc5c3de247114460f286240866d89187571e13.jpg', 'Légumes, fruits', '150g/jour'),
(13, 3, 3, 'Dumbo', 'Bon', '9134acc169c10fa9e10c5e3715c107cdb7d02e1f.jpg', 'Légumes, fruits, feuilles', '200kg/jour');

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentaire` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240715113747', '2024-07-15 11:38:01', 490),
('DoctrineMigrations\\Version20240809055258', '2024-08-09 05:53:16', 124),
('DoctrineMigrations\\Version20240810093630', '2024-08-10 09:37:03', 59),
('DoctrineMigrations\\Version20240810150605', '2024-08-10 15:06:31', 20);

-- --------------------------------------------------------

--
-- Structure de la table `habitat`
--

DROP TABLE IF EXISTS `habitat`;
CREATE TABLE IF NOT EXISTS `habitat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentaire_habitat` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_data` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `habitat`
--

INSERT INTO `habitat` (`id`, `nom`, `description`, `commentaire_habitat`, `image_data`) VALUES
(3, 'La savane', '<div>L’habitat de la savane imite les plaines ouvertes avec des herbes hautes, des arbustes épars et quelques arbres. Le sol est sec et rocailleux avec des points d’eau. L’espace est vaste pour permettre aux animaux de se déplacer librement, avec des abris pour le repos. Des clôtures discrètes assurent la sécurité, et des plateformes d’observation permettent aux visiteurs de voir les animaux. Des éléments sont ajoutés pour encourager le comportement naturel des animaux.</div>', '<div>L’habitat de la savane imite les plaines ouvertes avec des herbes hautes, des arbustes épars et quelques arbres. Le sol est sec et rocailleux avec des points d’eau. L’espace est vaste pour permettre aux animaux de se déplacer librement, avec des abris pour le repos. Des clôtures discrètes assurent la sécurité, et des plateformes d’observation permettent aux visiteurs de voir les animaux. Des éléments sont ajoutés pour encourager le comportement naturel des animaux.</div>', 'b9bea98036b0b72e3aa75cf5378e98d64abb70e4.png'),
(4, 'La jungle', '<div>L’habitat de la jungle dans est dense avec une variété d’arbres, de plantes et de fleurs tropicales. Le sol est humide et riche, avec des cours d’eau et des bassins. L’espace est structuré avec des zones d’escalade et des cachettes. Des clôtures et des vitrages sécurisés protègent les animaux et les visiteurs. Des plateformes d’observation permettent une vue immersive. Des éléments sont ajoutés pour stimuler le comportement naturel des animaux.</div>', '<div>L’habitat de la jungle dans est dense avec une variété d’arbres, de plantes et de fleurs tropicales. Le sol est humide et riche, avec des cours d’eau et des bassins. L’espace est structuré avec des zones d’escalade et des cachettes. Des clôtures et des vitrages sécurisés protègent les animaux et les visiteurs. Des plateformes d’observation permettent une vue immersive. Des éléments sont ajoutés pour stimuler le comportement naturel des animaux.</div>', '43236ddd1f345454b65b11a2ed3e052d05ce3001.png'),
(5, 'Le marais', '<div>L’habitat marais est caractérisé par des zones d’eau stagnante, des plantes aquatiques et des arbres à feuilles larges. Le sol est boueux avec des zones sèches pour le repos. L’espace est parsemé de cachettes sous l’eau et sur terre. Des clôtures et des vitrages sécurisés protègent les animaux et les visiteurs. Des plateformes d’observation offrent une vue sur l’habitat. Des éléments sont ajoutés pour encourager le comportement naturel des animaux.</div>', '<div>L’habitat marais est caractérisé par des zones d’eau stagnante, des plantes aquatiques et des arbres à feuilles larges. Le sol est boueux avec des zones sèches pour le repos. L’espace est parsemé de cachettes sous l’eau et sur terre. Des clôtures et des vitrages sécurisés protègent les animaux et les visiteurs. Des plateformes d’observation offrent une vue sur l’habitat. Des éléments sont ajoutés pour encourager le comportement naturel des animaux.</div>', '674c8d3d24acd10cd9964dabd9bcff17e1dc638a.png');

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `race`
--

DROP TABLE IF EXISTS `race`;
CREATE TABLE IF NOT EXISTS `race` (
  `id` int NOT NULL AUTO_INCREMENT,
  `label` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `race`
--

INSERT INTO `race` (`id`, `label`) VALUES
(3, 'Eléphant'),
(4, 'Girafe'),
(5, 'Lion'),
(6, 'Iguane'),
(7, 'Jaguar'),
(8, 'Orang-outan'),
(9, 'Alligator'),
(10, 'Loutre'),
(11, 'Tortue');

-- --------------------------------------------------------

--
-- Structure de la table `rapport_veterinaire`
--

DROP TABLE IF EXISTS `rapport_veterinaire`;
CREATE TABLE IF NOT EXISTS `rapport_veterinaire` (
  `id` int NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int NOT NULL,
  `animal_id` int NOT NULL,
  `date` datetime NOT NULL,
  `detail` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CE729CDEFB88E14F` (`utilisateur_id`),
  KEY `IDX_CE729CDE8E962C16` (`animal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `label` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `label`) VALUES
(1, 'Administrateur'),
(2, 'Vétérinaire'),
(3, 'Employé');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_id` int NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`),
  KEY `IDX_1D1C63B3D60322AC` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `role_id`, `email`, `roles`, `password`, `nom`, `prenom`) VALUES
(9, 1, 'joselebreton@arcadia.com', '[\"ROLE_ADMIN\"]', '$2y$13$zNFZCzB4HERiqp35d1ABHO8z27bAYHI/83fUrUnujXd9Oqpp5AWIW', 'Lebreton', 'José'),
(11, 3, 'josetteemployee@arcadia.com', '[\"ROLE_EMPLOYE\"]', '$2y$13$w2RVum4opjDHKVJ83AgwVe7jhOwf58qrrs9Luz9z6s04SwR2vb5aO', 'Employée', 'Josette'),
(12, 2, 'rogerveterinaire@arcadia.com', '[\"ROLE_VETERINAIRE\"]', '$2y$13$utH39ah1MCfooCjWLX1wROwxZwfXb0ndDvO9dy8qGruKfuSn6S5Fi', 'Vétérinaire', 'Roger');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `FK_6AAB231F6E59D40D` FOREIGN KEY (`race_id`) REFERENCES `race` (`id`),
  ADD CONSTRAINT `FK_6AAB231FAFFE2D26` FOREIGN KEY (`habitat_id`) REFERENCES `habitat` (`id`);

--
-- Contraintes pour la table `rapport_veterinaire`
--
ALTER TABLE `rapport_veterinaire`
  ADD CONSTRAINT `FK_CE729CDE8E962C16` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`id`),
  ADD CONSTRAINT `FK_CE729CDEFB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `FK_1D1C63B3D60322AC` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
