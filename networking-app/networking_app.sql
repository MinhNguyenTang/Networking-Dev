-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 16 sep. 2024 à 10:11
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `networking_app`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_line` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `name`, `firstname`, `email`, `phone_number`, `company`, `occupation`, `company_size`, `business_line`, `message`, `created_at`) VALUES
(1, 'Doe', 'Jane', 'd.jane@outlook.fr', '09 83 78 37 89', 'Alpine', 'Développeuse', '26 - 50', 'Informatique', 'Hello!', '2024-08-29 09:06:11'),
(2, 'Duppont', 'Philippe', 'p.duppont@gmail.com', '06 98 25 78 97', 'PSA Citroen', 'Ingénieur Big Data', 'Plus de 1000', 'Informatique', 'Hello!', '2024-08-29 09:10:07'),
(3, 'Boucher', 'Antoine', 'a.boucher@yahoo.fr', '09 83 76 36 78', 'Alpha One', 'Administrateur réseau', '51 - 100', 'Informatique', 'Hello!', '2024-08-29 09:20:09'),
(4, 'Boucher', 'Antoine', 'a.boucher@yahoo.fr', '09 83 76 36 78', 'Alpha One', 'Administrateur réseau', '51 - 100', 'Informatique', 'Hello!', '2024-08-29 09:26:27'),
(5, 'Hamlet', 'Joachim', 'j.hamlet@gmail.com', '06 93 67 38 67', 'Secure Alpha', 'Agent de sécurité', '51 - 100', 'Autre', 'Hello!', '2024-08-29 14:49:38');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240820194126', '2024-08-20 19:41:53', 94),
('DoctrineMigrations\\Version20240820201207', '2024-08-20 20:12:18', 86),
('DoctrineMigrations\\Version20240820213856', '2024-08-20 21:39:11', 41),
('DoctrineMigrations\\Version20240829121821', '2024-08-29 12:18:42', 47),
('DoctrineMigrations\\Version20240902153449', '2024-09-02 15:35:03', 191),
('DoctrineMigrations\\Version20240903102629', '2024-09-03 10:29:44', 23),
('DoctrineMigrations\\Version20240906095420', '2024-09-06 09:54:30', 314),
('DoctrineMigrations\\Version20240910102941', '2024-09-10 10:30:08', 104),
('DoctrineMigrations\\Version20240910103903', '2024-09-10 10:39:15', 83),
('DoctrineMigrations\\Version20240910120013', '2024-09-10 12:00:55', 12);

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3BAE0AA7A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`id`, `title`, `description`, `company`, `date`, `time`, `user_id`) VALUES
(2, 'Lorem ipsum', '<div>Suscipit eget tortor nulla morbi mi penatibus faucibus tristique scelerisque. Porttitor urna ad iaculis; amet primis vel magna nascetur. Malesuada maecenas odio platea id; sed commodo cursus. Nibh posuere montes placerat id vulputate curabitur. Ullamcorper pulvinar magnis tortor molestie cubilia commodo aliquam. Ex egestas massa pulvinar dapibus nulla adipiscing fringilla ad. Primis aliquet sem feugiat efficitur semper sem erat felis morbi.</div>', 'MBDA', '2024-09-19', '16:45:00', 5),
(3, 'Lorem ipsum odor amet', '<div>Amet himenaeos quis aptent odio vehicula malesuada. Eros nisl nisl ornare per tempor vitae nunc. Amet etiam litora mus, ex orci id facilisi. Fringilla hendrerit lorem congue dolor aptent lectus lectus enim. Odio vel cursus volutpat montes hac elementum et parturient. Montes montes conubia ultrices penatibus eu consectetur. Torquent rhoncus hac feugiat aenean dapibus sodales; netus aenean fermentum.</div>', 'MBDA', '2024-10-31', '16:45:00', 5),
(4, 'Nulla leo', '<div>Condimentum <strong>vulputate dis </strong>erat penatibus arcu per. Ac lorem risus morbi quam platea nulla. Ultricies sit bibendum nostra amet est vitae congue fames. Hac orci ullamcorper vivamus montes laoreet eget mattis nunc. <strong>Metus proin</strong> est dis nisl augue pellentesque. <em>Posuere primis quis rhoncus aliquam fringilla fames himenaeos</em>.</div>', 'Dassault Systems', '2024-10-23', '17:45:00', 5);

-- --------------------------------------------------------

--
-- Structure de la table `event_user`
--

DROP TABLE IF EXISTS `event_user`;
CREATE TABLE IF NOT EXISTS `event_user` (
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`event_id`,`user_id`),
  KEY `IDX_92589AE271F7E88B` (`event_id`),
  KEY `IDX_92589AE2A76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `messenger_messages`
--

INSERT INTO `messenger_messages` (`id`, `body`, `headers`, `queue_name`, `created_at`, `available_at`, `delivered_at`) VALUES
(1, 'O:36:\\\"Symfony\\\\Component\\\\Messenger\\\\Envelope\\\":2:{s:44:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0stamps\\\";a:1:{s:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\";a:1:{i:0;O:46:\\\"Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\\":1:{s:55:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Stamp\\\\BusNameStamp\\0busName\\\";s:21:\\\"messenger.bus.default\\\";}}}s:45:\\\"\\0Symfony\\\\Component\\\\Messenger\\\\Envelope\\0message\\\";O:51:\\\"Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\\":2:{s:60:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0message\\\";O:39:\\\"Symfony\\\\Bridge\\\\Twig\\\\Mime\\\\TemplatedEmail\\\":5:{i:0;s:30:\\\"reset_password/email.html.twig\\\";i:1;N;i:2;a:1:{s:10:\\\"resetToken\\\";O:58:\\\"SymfonyCasts\\\\Bundle\\\\ResetPassword\\\\Model\\\\ResetPasswordToken\\\":4:{s:65:\\\"\\0SymfonyCasts\\\\Bundle\\\\ResetPassword\\\\Model\\\\ResetPasswordToken\\0token\\\";s:40:\\\"UNkrcv41emgwevh1ybeazEY0GxW74wVUdt7Yj5Kw\\\";s:69:\\\"\\0SymfonyCasts\\\\Bundle\\\\ResetPassword\\\\Model\\\\ResetPasswordToken\\0expiresAt\\\";O:17:\\\"DateTimeImmutable\\\":3:{s:4:\\\"date\\\";s:26:\\\"2024-09-02 16:36:24.358232\\\";s:13:\\\"timezone_type\\\";i:3;s:8:\\\"timezone\\\";s:3:\\\"UTC\\\";}s:71:\\\"\\0SymfonyCasts\\\\Bundle\\\\ResetPassword\\\\Model\\\\ResetPasswordToken\\0generatedAt\\\";i:1725291384;s:73:\\\"\\0SymfonyCasts\\\\Bundle\\\\ResetPassword\\\\Model\\\\ResetPasswordToken\\0transInterval\\\";i:1;}}i:3;a:6:{i:0;N;i:1;N;i:2;N;i:3;N;i:4;a:0:{}i:5;a:2:{i:0;O:37:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\\":2:{s:46:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0headers\\\";a:3:{s:4:\\\"from\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:4:\\\"From\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:19:\\\"admin@plateforme.fr\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:14:\\\"Administrateur\\\";}}}}s:2:\\\"to\\\";a:1:{i:0;O:47:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:2:\\\"To\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:58:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\MailboxListHeader\\0addresses\\\";a:1:{i:0;O:30:\\\"Symfony\\\\Component\\\\Mime\\\\Address\\\":2:{s:39:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0address\\\";s:16:\\\"d.marc@gmail.com\\\";s:36:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Address\\0name\\\";s:0:\\\"\\\";}}}}s:7:\\\"subject\\\";a:1:{i:0;O:48:\\\"Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\\":5:{s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0name\\\";s:7:\\\"Subject\\\";s:56:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lineLength\\\";i:76;s:50:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0lang\\\";N;s:53:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\AbstractHeader\\0charset\\\";s:5:\\\"utf-8\\\";s:55:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\UnstructuredHeader\\0value\\\";s:27:\\\"Your password reset request\\\";}}}s:49:\\\"\\0Symfony\\\\Component\\\\Mime\\\\Header\\\\Headers\\0lineLength\\\";i:76;}i:1;N;}}i:4;N;}s:61:\\\"\\0Symfony\\\\Component\\\\Mailer\\\\Messenger\\\\SendEmailMessage\\0envelope\\\";N;}}', '[]', 'default', '2024-09-02 15:36:24', '2024-09-02 15:36:24', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `reset_password_request`
--

DROP TABLE IF EXISTS `reset_password_request`;
CREATE TABLE IF NOT EXISTS `reset_password_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `selector` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hashed_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `expires_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_7CE748AA76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reset_password_request`
--

INSERT INTO `reset_password_request` (`id`, `user_id`, `selector`, `hashed_token`, `requested_at`, `expires_at`) VALUES
(3, 1, 'icx0Ix59QNORZeOxVFrV', 'mbw96NJVpmR1hKFucmgjorSi4Sv1Fjui9uiMBC0wMoQ=', '2024-09-02 21:51:22', '2024-09-02 22:51:22'),
(6, 2, 'EnONQFAyErvZIforliUa', 'bAnE3as8KJeA1Tz3PGP30zuvQoMnAR485TiJPDnI9SM=', '2024-09-03 10:44:02', '2024-09-03 11:44:02'),
(7, 2, 'IjpZgprdHkHTygR0IayX', 'C3vyhO3XS9mbBNuA5lHwqqkSBA9leKNwXT0S3yFq1rk=', '2024-09-04 14:57:14', '2024-09-04 15:57:14'),
(8, 1, 'uzIJ5pdoMehgn9cb6xl1', 'N5Vbe6XzI/zc1RrNU0hNNvfDEZU8htd/ugePWS3Upe0=', '2024-09-04 16:00:42', '2024-09-04 17:00:42'),
(9, 2, 'xQESbEjruYEhxcdWDjn3', 'uGF7VU9XIlsp3eLExChJBi+Rn4aHVKpj47vqP8zP8oE=', '2024-09-05 13:22:14', '2024-09-05 14:22:14'),
(10, 2, 'D4Vtc6U7IQEhz72uE9BL', 'CMZFfvraKc73HRnBjTlUXD7hl81iwbF/0SRw1tRkhNs=', '2024-09-09 00:07:21', '2024-09-09 01:07:21');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `created_at`, `updated_at`, `full_name`, `phone_number`, `company`, `occupation`) VALUES
(1, 'd.jane@outlook.fr', '[\"ROLE_USER\"]', '$2y$13$T6WIoUNA/ceGxuKSwrcBT.Eaebks6tZU1YI8VyW21De.byhMrp3wm', '2024-08-29 12:30:41', '2024-09-04 14:31:34', 'Jane Doe', '09 83 78 37 89', 'Alpine', 'Développeuse Web'),
(2, 'd.marc@outlook.fr', '[\"ROLE_USER\"]', '$2y$13$5LlL3k8J6l/0pAv2LqGunOzWJdz0WijiTGCKJZdyrnfd4IW4cJWCG', '2024-08-29 15:11:09', '2024-09-04 14:13:21', 'Marc Delacroix', '09 77 65 17 35', 'Thalès', 'Ingénieur Symfony'),
(4, 'k.nguyen@outlook.fr', '[\"ROLE_USER\"]', '$2y$13$dLt6jch2Il4qJfQKnHXFJuxKGqREY3h//BLX4QXgLOqEUyB43nFSG', '2024-09-09 10:24:08', '2024-09-09 14:51:43', 'Kimmy Nguyen', '06 78 46 78 36', 'Safran', 'Business Developer'),
(5, 'a.bertomier@outlook.fr', '[\"ROLE_ADMIN\"]', '$2y$13$t95MRF6y6FJAS.FXB1rsGedIhTG.3E/wu8BGhr3W0XQpJJY/tl6f6', '2024-09-09 14:17:25', '2024-09-16 08:04:47', 'Antoine Bertomier', '06 87 46 37 34', 'Orange', 'Développeur cybersécurité'),
(6, 'v.wielgos@outlook.fr', '[\"ROLE_USER\"]', '$2y$13$bkHyn0OMfh5/9.llZM3JPOJrbbcrhLYCU1QEMs387iH.cWI/Y3lTy', '2024-09-09 15:48:38', '2024-09-09 15:49:11', 'Viktor Wielgos', '07 67 35 67 33', 'DCNS', 'Ingénieur systèmes réseaux');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `FK_3BAE0AA7A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `event_user`
--
ALTER TABLE `event_user`
  ADD CONSTRAINT `FK_92589AE271F7E88B` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_92589AE2A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD CONSTRAINT `FK_7CE748AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
