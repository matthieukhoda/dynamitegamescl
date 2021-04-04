-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : Dim 04 avr. 2021 à 16:03
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dynamite_games`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(2, 'Role Playing Game (RPG)'),
(3, 'First Person Shooter (FPS)'),
(4, 'Action/Aventure'),
(5, 'Infiltration'),
(6, 'Sport');

-- --------------------------------------------------------

--
-- Structure de la table `category_games`
--

CREATE TABLE `category_games` (
  `category_id` int(11) NOT NULL,
  `games_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category_games`
--

INSERT INTO `category_games` (`category_id`, `games_id`) VALUES
(2, 2),
(2, 4),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 16),
(4, 15),
(4, 17),
(4, 18),
(5, 3);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210204141815', '2021-02-04 15:27:51', 271),
('DoctrineMigrations\\Version20210204145303', '2021-02-04 15:56:03', 3505),
('DoctrineMigrations\\Version20210204145907', '2021-02-04 15:59:13', 2573),
('DoctrineMigrations\\Version20210204150606', '2021-02-04 16:06:49', 1269),
('DoctrineMigrations\\Version20210215211830', '2021-02-15 22:18:56', 487),
('DoctrineMigrations\\Version20210302165317', '2021-03-02 17:53:23', 217),
('DoctrineMigrations\\Version20210304201703', '2021-03-04 21:17:38', 774);

-- --------------------------------------------------------

--
-- Structure de la table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `ean_code` int(11) DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `games`
--

INSERT INTO `games` (`id`, `title`, `description`, `price`, `stock`, `ean_code`, `image_name`, `updated_at`) VALUES
(2, 'Final Fantasy X', 'J-RPG où vous incarnez Tidus jeune star du blitzball qui va voyager à travers le temps pour devenir le gardien de Yuna talentueuse invocatrice', 10, 5, 1313, 'ffx-603ff52934af9956501082.jpg', '2021-03-03 21:44:25'),
(3, 'Metal Gear Solid 2', 'Jeu d\'infiltration', 10, 20, 13234, 'mgs2-606227252971d019716830.jpg', '2021-03-29 21:14:45'),
(4, 'Dragon Quest VIII', 'Le dieu du j-RPG', 25, 3, 12, 'unnamed-603ff3bf563d9047609633-6062268351c3d853998239.jpg', '2021-03-29 21:12:03'),
(10, 'Nier Automata', 'Jeu de rôle japonais édité par Square Enix et développé par Platinum Games. Le dernier titre du génial Yoko Tarô!', 30, 2, NULL, 'nier-automata-cover-art-604b5b8f52b61560549170.jpg', '2021-03-12 13:16:15'),
(11, 'Star Ocean', 'Jeu de rôle développé par Tri-Ace', 25, 3, NULL, 'starocean-605a5975c6792617574956-606226a9ce5e1630701384.jpg', '2021-03-29 21:12:41'),
(12, 'God Eater 3', 'Jeu d\'action développé par Namco Bandai', 25, 1, NULL, 'godeater-605fa35090767971414637.jpg', '2021-03-27 22:27:44'),
(13, 'Shadow Hearts Covenants', 'Suite du 1er RPG sortit en 2001', 15, 1, NULL, 'shadow-60622a3687e12349167290.jpg', '2021-03-29 21:27:50'),
(14, 'Digital Devil Saga', 'RPG par les créateurs de Persona', 25, 2, NULL, 'dds-60622a9f75e41933092310.jpg', '2021-03-29 21:29:35'),
(15, 'Uncharted 4', 'Dernier volet des aventures de Nathan Drake', 20, 4, NULL, 'uncharted-60622afa70e74286738273.jpg', '2021-03-29 21:31:06'),
(16, 'Final Fantasy XV', '15ème opus de la franchise', 15, 3, NULL, 'ff15-60622b6fd7bf1970663869.jpg', '2021-03-29 21:33:03'),
(17, 'Gravity Rush 2', 'La nouvelle aventure de Kat !', 25, 5, NULL, 'gravity-60622bcc3bb24464518203.jpg', '2021-03-29 21:34:36'),
(18, 'Zone of the Enders 2', 'Suite du jeu d\'action frénétique', 15, 2, NULL, 'zoe2-60622c87dcbd6873709249.jpg', '2021-03-29 21:37:43');

-- --------------------------------------------------------

--
-- Structure de la table `new_controller`
--

CREATE TABLE `new_controller` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `plateform`
--

CREATE TABLE `plateform` (
  `id` int(11) NOT NULL,
  `plateforme` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `plateform`
--

INSERT INTO `plateform` (`id`, `plateforme`) VALUES
(2, 'Playstation 4'),
(4, 'Playstation 2'),
(5, 'Playstation'),
(6, 'Playstation 3');

-- --------------------------------------------------------

--
-- Structure de la table `plateform_games`
--

CREATE TABLE `plateform_games` (
  `plateform_id` int(11) NOT NULL,
  `games_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `plateform_games`
--

INSERT INTO `plateform_games` (`plateform_id`, `games_id`) VALUES
(2, 10),
(2, 12),
(2, 15),
(2, 16),
(2, 17),
(4, 2),
(4, 3),
(4, 4),
(4, 11),
(4, 13),
(4, 14),
(4, 18);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`) VALUES
(1, 'woody@gmail.com', 'Woody', '$2y$13$jqJZuk0nEXoSAd7QKZBlGOr8Jl0QXJ4YOWhKD3iyb8B970F7aZ8Zm');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category_games`
--
ALTER TABLE `category_games`
  ADD PRIMARY KEY (`category_id`,`games_id`),
  ADD KEY `IDX_1710647812469DE2` (`category_id`),
  ADD KEY `IDX_1710647897FFC673` (`games_id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9474526CE48FD905` (`game_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `new_controller`
--
ALTER TABLE `new_controller`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `plateform`
--
ALTER TABLE `plateform`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `plateform_games`
--
ALTER TABLE `plateform_games`
  ADD PRIMARY KEY (`plateform_id`,`games_id`),
  ADD KEY `IDX_3DE3A3E1CCAA542F` (`plateform_id`),
  ADD KEY `IDX_3DE3A3E197FFC673` (`games_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `new_controller`
--
ALTER TABLE `new_controller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `plateform`
--
ALTER TABLE `plateform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `category_games`
--
ALTER TABLE `category_games`
  ADD CONSTRAINT `FK_1710647812469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_1710647897FFC673` FOREIGN KEY (`games_id`) REFERENCES `games` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526CE48FD905` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);

--
-- Contraintes pour la table `plateform_games`
--
ALTER TABLE `plateform_games`
  ADD CONSTRAINT `FK_3DE3A3E197FFC673` FOREIGN KEY (`games_id`) REFERENCES `games` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_3DE3A3E1CCAA542F` FOREIGN KEY (`plateform_id`) REFERENCES `plateform` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
