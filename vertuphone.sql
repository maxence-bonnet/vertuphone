-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 10 juin 2022 à 17:25
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vertuphone`
--

-- --------------------------------------------------------

--
-- Structure de la table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'Marque1'),
(2, 'Marque2');

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
('DoctrineMigrations\\Version20220610111142', '2022-06-10 13:11:48', 148),
('DoctrineMigrations\\Version20220610114058', '2022-06-10 13:41:06', 57),
('DoctrineMigrations\\Version20220610120259', '2022-06-10 14:03:05', 91),
('DoctrineMigrations\\Version20220610130241', '2022-06-10 13:02:47', 86),
('DoctrineMigrations\\Version20220610131723', '2022-06-10 13:17:35', 69),
('DoctrineMigrations\\Version20220610134822', '2022-06-10 13:48:28', 31),
('DoctrineMigrations\\Version20220610144520', '2022-06-10 14:45:31', 43);

-- --------------------------------------------------------

--
-- Structure de la table `imei`
--

CREATE TABLE `imei` (
  `id` int(11) NOT NULL,
  `phone_id` int(11) DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `imei`
--

INSERT INTO `imei` (`id`, `phone_id`, `number`, `is_active`) VALUES
(9, 1, '1234567891235', 1),
(10, 1, '1234567891237', 1),
(11, 2, '1234567891023', 1),
(12, 2, '1234567891024', 1),
(13, 2, '1234567891028', 1),
(14, 2, '1234567891029', 1),
(15, 4, '1234567891234', 1),
(16, 5, '9876543219874', 1);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `phone`
--

CREATE TABLE `phone` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `limit_stock` int(11) NOT NULL,
  `creation_year` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `phone`
--

INSERT INTO `phone` (`id`, `brand_id`, `model`, `description`, `limit_stock`, `creation_year`, `created_at`, `updated_at`, `is_active`) VALUES
(1, 1, 'AYX', '<ul>\r\n	<li>【MOD&Egrave;LE COMPATIBLE】 Cet &eacute;tui portefeuille en cuir a &eacute;t&eacute; sp&eacute;cialement d&eacute;velopp&eacute; pour votre t&eacute;l&eacute;phone mobile avec Samsung Galaxy A51 (6.5 Pouces), verrou magn&eacute;tique, fonction support et fentes pour cartes, compatible avec Samsung Galaxy A51 - smartphone - 6.5 Pouces.</li>\r\n	<li>【Excellent Mat&eacute;riau】 L&#39;&eacute;tui en cuir pour Samsung Galaxy A51 (6.5 pouces) se compose de deux mat&eacute;riaux, qui sont faits de cuir PU de haute qualit&eacute; et d&#39;une coque int&eacute;rieure en TPU souple. Nous avons sp&eacute;cialement s&eacute;lectionn&eacute; un mat&eacute;riau en cuir de haute qualit&eacute; pour prot&eacute;ger la surface de votre t&eacute;l&eacute;phone contre les rayures et les chocs. Le TPU int&eacute;rieur doux est facile &agrave; mettre et &agrave; enlever pendant l&#39;utilisation. Il peut r&eacute;duire les marques de rayures et de rayures.</li>\r\n</ul>', 5, 1994, '2022-06-10 14:26:41', '2022-06-10 14:26:41', 1),
(2, 1, 'AIS', '<ul>\r\n	<li>【MOD&Egrave;LE COMPATIBLE】 Cet &eacute;tui portefeuille en cuir a &eacute;t&eacute; sp&eacute;cialement d&eacute;velopp&eacute; pour votre t&eacute;l&eacute;phone mobile avec Samsung Galaxy A51 (6.5 Pouces), verrou magn&eacute;tique, fonction support et fentes pour cartes, compatible avec Samsung Galaxy A51 - smartphone - 6.5 Pouces.</li>\r\n	<li>【Excellent Mat&eacute;riau】 L&#39;&eacute;tui en cuir pour Samsung Galaxy A51 (6.5 pouces) se compose de deux mat&eacute;riaux, qui sont faits de cuir PU de haute qualit&eacute; et d&#39;une coque int&eacute;rieure en TPU souple. Nous avons sp&eacute;cialement s&eacute;lectionn&eacute; un mat&eacute;riau en cuir de haute qualit&eacute; pour prot&eacute;ger la surface de votre t&eacute;l&eacute;phone contre les rayures et les chocs. Le TPU int&eacute;rieur doux est facile &agrave; mettre et &agrave; enlever pendant l&#39;utilisation. Il peut r&eacute;duire les marques de rayures et de rayures.</li>\r\n</ul>', 2, 1995, '2022-06-10 17:04:01', '2022-06-10 17:04:01', 1),
(3, 2, 'YUS', '<ul>\r\n	<li>【Multifonction】 L&#39;&eacute;tui portefeuille en cuir de l&#39;Samsung Galaxy A51 (6.5 &quot;) prend en charge la fonction portefeuille pratique, qui propose 3 emplacements pour carte d&#39;identit&eacute; / carte de visite / carte de cr&eacute;dit et une grande poche lat&eacute;rale La fonction de support prend en charge plusieurs angles de rotation de la mani&egrave;re la plus pratique avec l&#39;&eacute;tui Samsung Galaxy A51 (6.5 pouces).</li>\r\n	<li>【Protection Int&eacute;grale】 Un verrou magn&eacute;tique puissant emp&ecirc;cherait l&#39;&eacute;cran du t&eacute;l&eacute;phone portable et les quatre coins d&#39;&ecirc;tre ray&eacute; et secou&eacute; pendant que les cartes de cr&eacute;dit int&eacute;rieures tombent. De plus, cette coque de t&eacute;l&eacute;phone peut &ecirc;tre enti&egrave;rement pli&eacute;e avec un aimant puissant pour une protection compl&egrave;te.</li>\r\n</ul>', 3, 2007, '2022-06-10 17:07:40', '2022-06-10 17:07:40', 1),
(4, 2, 'SDDF', '<ul>\r\n	<li>【Multifonction】 L&#39;&eacute;tui portefeuille en cuir de l&#39;Samsung Galaxy A51 (6.5 &quot;) prend en charge la fonction portefeuille pratique, qui propose 3 emplacements pour carte d&#39;identit&eacute; / carte de visite / carte de cr&eacute;dit et une grande poche lat&eacute;rale La fonction de support prend en charge plusieurs angles de rotation de la mani&egrave;re la plus pratique avec l&#39;&eacute;tui Samsung Galaxy A51 (6.5 pouces).</li>\r\n	<li>【Protection Int&eacute;grale】 Un verrou magn&eacute;tique puissant emp&ecirc;cherait l&#39;&eacute;cran du t&eacute;l&eacute;phone portable et les quatre coins d&#39;&ecirc;tre ray&eacute; et secou&eacute; pendant que les cartes de cr&eacute;dit int&eacute;rieures tombent. De plus, cette coque de t&eacute;l&eacute;phone peut &ecirc;tre enti&egrave;rement pli&eacute;e avec un aimant puissant pour une protection compl&egrave;te.</li>\r\n</ul>', 3, 2008, '2022-06-10 17:08:24', '2022-06-10 17:08:24', 1),
(5, 2, 'LOP82', '<ul>\r\n	<li>【Multifonction】 L&#39;&eacute;tui portefeuille en cuir de l&#39;Samsung Galaxy A51 (6.5 &quot;) prend en charge la fonction portefeuille pratique, qui propose 3 emplacements pour carte d&#39;identit&eacute; / carte de visite / carte de cr&eacute;dit et une grande poche lat&eacute;rale La fonction de support prend en charge plusieurs angles de rotation de la mani&egrave;re la plus pratique avec l&#39;&eacute;tui Samsung Galaxy A51 (6.5 pouces).</li>\r\n	<li>【Protection Int&eacute;grale】 Un verrou magn&eacute;tique puissant emp&ecirc;cherait l&#39;&eacute;cran du t&eacute;l&eacute;phone portable et les quatre coins d&#39;&ecirc;tre ray&eacute; et secou&eacute; pendant que les cartes de cr&eacute;dit int&eacute;rieures tombent. De plus, cette coque de t&eacute;l&eacute;phone peut &ecirc;tre enti&egrave;rement pli&eacute;e avec un aimant puissant pour une protection compl&egrave;te.</li>\r\n</ul>', 3, 2009, '2022-06-10 17:08:44', '2022-06-10 17:08:44', 0),
(6, 2, '456546', '<ul>\r\n	<li>【Multifonction】 L&#39;&eacute;tui portefeuille en cuir de l&#39;Samsung Galaxy A51 (6.5 &quot;) prend en charge la fonction portefeuille pratique, qui propose 3 emplacements pour carte d&#39;identit&eacute; / carte de visite / carte de cr&eacute;dit et une grande poche lat&eacute;rale La fonction de support prend en charge plusieurs angles de rotation de la mani&egrave;re la plus pratique avec l&#39;&eacute;tui Samsung Galaxy A51 (6.5 pouces).</li>\r\n	<li>【Protection Int&eacute;grale】 Un verrou magn&eacute;tique puissant emp&ecirc;cherait l&#39;&eacute;cran du t&eacute;l&eacute;phone portable et les quatre coins d&#39;&ecirc;tre ray&eacute; et secou&eacute; pendant que les cartes de cr&eacute;dit int&eacute;rieures tombent. De plus, cette coque de t&eacute;l&eacute;phone peut &ecirc;tre enti&egrave;rement pli&eacute;e avec un aimant puissant pour une protection compl&egrave;te.</li>\r\n</ul>', 5, 2004, '2022-06-10 17:10:16', '2022-06-10 17:10:16', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `imei`
--
ALTER TABLE `imei`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B8179F83B7323CB` (`phone_id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_444F97DD44F5D008` (`brand_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `imei`
--
ALTER TABLE `imei`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `phone`
--
ALTER TABLE `phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `imei`
--
ALTER TABLE `imei`
  ADD CONSTRAINT `FK_B8179F83B7323CB` FOREIGN KEY (`phone_id`) REFERENCES `phone` (`id`);

--
-- Contraintes pour la table `phone`
--
ALTER TABLE `phone`
  ADD CONSTRAINT `FK_444F97DD44F5D008` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
