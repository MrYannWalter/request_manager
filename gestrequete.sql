-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 03 mai 2025 à 10:02
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestrequete`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Problème Technique', 'Problèmes liés aux outils, sites ou logiciels utilisés.', '2025-04-28 13:41:01', '2025-04-28 13:41:01'),
(2, 'Demande d\'information', 'Questions générales sur les services ou informations nécessaires.', '2025-04-28 13:41:01', '2025-04-28 13:41:01'),
(3, 'Problème Administratif', 'Problèmes liés aux documents administratifs ou demandes spécifiques.', '2025-04-28 13:41:01', '2025-04-28 13:41:01');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `request_id` bigint UNSIGNED NOT NULL,
  `sender_id` bigint UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `messages_request_id_foreign` (`request_id`),
  KEY `messages_sender_id_foreign` (`sender_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `request_id`, `sender_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 13, 16, 'Bonjour', '2025-05-03 08:05:03', '2025-05-03 08:05:03'),
(2, 15, 30, 'Hello', '2025-05-03 08:05:36', '2025-05-03 08:05:36');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_10_000001_create_categories_table', 1),
(6, '2023_10_10_000002_create_requests_table', 1),
(7, '2023_10_10_000003_create_responses_table', 1),
(8, '2023_10_10_000007_create_services_table', 1),
(9, '2025_04_28_200348_add_responsable_id_to_requests_table', 2),
(10, '2025_05_03_085217_create_messages_table', 3);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('tania.hessel@example.com', '$2y$10$6Pv8GYB/s2Gsy9V7spjQtuoOr.nm2u/ktTQgC5ksAfcnA/yGkjzx6', '2025-04-28 14:09:15'),
('chyna.hill@example.com', '$2y$10$B2gWcJU77AyP1QlAMNuiDOqsljmbtFf8Mxm9miGKx7BHqKWLH5NB2', '2025-04-28 14:37:02');

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE IF NOT EXISTS `requests` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `request_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('soumise','en cours','traitée','rejetée') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'soumise',
  `priority` enum('urgente','standard') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'standard',
  `category_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `agent_id` bigint UNSIGNED NOT NULL,
  `responsable_id` bigint UNSIGNED DEFAULT NULL,
  `attachment_path` mediumblob,
  `submitted_at` timestamp NULL DEFAULT NULL,
  `assigned_at` timestamp NULL DEFAULT NULL,
  `processed_at` timestamp NULL DEFAULT NULL,
  `internal_notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `requests_category_id_foreign` (`category_id`),
  KEY `requests_user_id_foreign` (`user_id`),
  KEY `requests_agent_id_foreign` (`agent_id`),
  KEY `requests_responsable_id_foreign` (`responsable_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `requests`
--

INSERT INTO `requests` (`id`, `request_title`, `request_description`, `status`, `priority`, `category_id`, `user_id`, `agent_id`, `responsable_id`, `attachment_path`, `submitted_at`, `assigned_at`, `processed_at`, `internal_notes`, `created_at`, `updated_at`) VALUES
(5, 'Byilhan', 'Je suis influenceur, Streamer', 'rejetée', 'standard', 3, 18, 30, 34, NULL, '2025-04-28 15:11:51', NULL, NULL, NULL, '2025-04-28 15:11:51', '2025-05-03 08:46:31'),
(15, 'Maladie', 'Je suis extrêmement malade COVID-19', 'traitée', 'urgente', 3, 16, 30, 34, NULL, '2025-05-03 07:42:32', NULL, NULL, NULL, '2025-05-03 07:42:32', '2025-05-03 08:21:08'),
(11, 'Influenceur', 'YoutubeGoogleMapsWaze', 'traitée', 'standard', 3, 11, 26, 32, NULL, '2025-04-28 15:58:57', NULL, NULL, NULL, '2025-04-28 15:58:57', '2025-04-28 20:48:26'),
(12, 'Flamby', 'asklmdlaskdklasjdad', 'traitée', 'urgente', 2, 15, 23, 33, NULL, '2025-04-28 16:08:12', NULL, NULL, NULL, '2025-04-28 16:08:12', '2025-04-28 20:55:06'),
(13, 'Sora', 'sldmfklsmdfklsdmfklmsdkfmsdklf', 'soumise', 'urgente', 2, 16, 25, 31, NULL, '2025-04-28 16:54:15', NULL, NULL, NULL, '2025-04-28 16:54:15', '2025-04-28 20:51:21'),
(14, 'Webedia', 'byilhananymecocottemichouinoxtagamine', 'rejetée', 'standard', 2, 14, 28, 35, NULL, '2025-04-28 17:19:08', NULL, NULL, NULL, '2025-04-28 17:19:08', '2025-04-28 20:13:38');

-- --------------------------------------------------------

--
-- Structure de la table `responses`
--

DROP TABLE IF EXISTS `responses`;
CREATE TABLE IF NOT EXISTS `responses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `response_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `decision` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `responses_request_id_foreign` (`request_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `responses`
--

INSERT INTO `responses` (`id`, `response_text`, `decision`, `request_id`, `created_at`, `updated_at`) VALUES
(1, 'Cette requête ne peut pas être approuver', NULL, 14, '2025-04-28 20:13:38', '2025-04-28 20:13:38'),
(2, 'Saaaaaa vraiment cette requête elle est éteinte', NULL, 11, '2025-04-28 20:43:07', '2025-04-28 20:43:07'),
(3, 'fnwlnfwelnfwelnflkwenfklnwefklnwelfnwelkfnweklfnweklfnweln', NULL, 12, '2025-04-28 20:56:14', '2025-04-28 20:56:14'),
(4, 'Bonne guerison dans l\'amour de la paix', NULL, 15, '2025-05-03 08:22:56', '2025-05-03 08:22:56'),
(5, 'Désoler mais sava pas être possible', NULL, 3, '2025-05-03 08:32:27', '2025-05-03 08:32:27'),
(6, 'Bonne influence mais sa ne sera pas possible', 'Refuser', 5, '2025-05-03 08:46:31', '2025-05-03 08:46:31');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('etudiant','admin','agent','responsable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'etudiant',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `sexe`, `telephone`, `service_code`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(18, 'Ezequiel Tremblay', 'enader@example.com', 'Féminin', '754-474-2106', 'JGSA359C', '2025-04-28 14:07:48', '$2y$10$.uQnTo12t.W8JecwjcoaTuYkYtqfrMuZqfjLJ9GSfOIWDIiT2Jh1G', 'etudiant', 'sOdRVppVTW5drfrP0e2xAF7ucCW4AtrY7e71CkHpeUKbXNeBrHCFfXPo5YfE', '2025-04-28 14:07:48', '2025-04-28 15:00:55'),
(17, 'Dr. Kendrick Kassulke MD', 'grady.arvilla@example.org', 'Féminin', '402-908-9599', 'RLAETSIG', '2025-04-28 14:07:48', '$2y$10$jNvimqjDd1jF3X57X2pKoeqAxR9AZ68fSuY6MEQofxgi0q0vAP87G', 'etudiant', 'R63ceMIctQXKalP2ruLXZ2stIhj34BiNEqBVh53IvWEpqIjZzcHgcuk4esd9', '2025-04-28 14:07:48', '2025-04-28 14:50:52'),
(16, 'Prof. George Parisian', 'whitney@gmail.com', 'Masculin', '(570) 485-5150', 'UIOTWNLS', '2025-04-28 14:07:48', '$2y$10$Di7Mg5P43hsEElBiNEwi6uJ/5QaCFMndy.8ykmuT54VDQ5Pfz27eW', 'etudiant', 'jDrO0HUlYz9np9bz7suDGFRGHnJwPQd1i5xHcIWLpdRDQhooN7kaFCbhR91H', '2025-04-28 14:07:48', '2025-05-03 07:12:44'),
(15, 'Abel Kulas V', 'ihansen@example.com', 'Féminin', '+1-202-403-5800', 'M3JNLY6R', '2025-04-28 14:07:48', '$2y$10$KIkhYboXkyD6Kh3oLCgxx.ecRdoNSC1aajaP9r.IZ4uiz82l27/SW', 'etudiant', 'qVAPPsEcu4fyavZimWitYv6lihaQ7KapnRp7ZiTa7MckpXwJWdBzvY03UgoF', '2025-04-28 14:07:48', '2025-04-28 16:07:27'),
(14, 'Ponouwe', 'laurene@gmail.com', 'Féminin', '908-562-4736', 'Z98NBIRA', '2025-04-28 14:07:48', '$2y$10$HtToPJzg8Q/7COTPcXVRS.rQQwmLH1/Fhqv.HLQ1orskp/vbQePoe', 'etudiant', 'lIFvpESE7XEWRvwCYC4RzfV7giAxgsX47kUgRDBThGfuL5Yj34WtruhmGWXF', '2025-04-28 14:07:48', '2025-04-28 17:00:05'),
(13, 'Kaci Koch', 'qdietrich@example.com', 'Masculin', '+1-413-701-9244', 'PKP6JBLL', '2025-04-28 14:07:48', '$2y$10$fnMDvwSTaLUJmIEYztIxoO2/iL2/4SC7YuJUV9.6krse4mlMweBli', 'etudiant', 'EzjgMAmIdz', '2025-04-28 14:07:48', '2025-04-28 14:07:48'),
(12, 'Mr. Roberto Kutch', 'tania.hessel@example.com', 'Masculin', '(435) 706-6031', 'MRWWBXR7', '2025-04-28 14:07:47', '$2y$10$RTavXjT38.TzcmePrBlJrOaRwjSmm6T7cVHexYD0EY14Mg1LX70Ki', 'etudiant', 'fnzHLqNjfq', '2025-04-28 14:07:47', '2025-04-28 14:07:47'),
(11, 'Jan McLaughlin', 'bohara@example.com', 'Féminin', '+1-205-567-3654', 'DKY31JGZ', '2025-04-28 14:07:47', '$2y$10$7seEjIstywM8YeJSb9T8Ru2etOKB5oA0/FKfOYwfF2TTTF0nGC5US', 'etudiant', '1H56jJ5tuzn91NKbt7zKMVBf6RCY7d2BJ58YgJndvqMzaPvMJfFfPnmogNSq', '2025-04-28 14:07:47', '2025-04-28 15:15:11'),
(19, 'Mr. Raoul Rolfson', 'gzboncak@example.org', 'Féminin', '+1-361-721-0412', 'IR7CUGHH', '2025-04-28 14:07:48', '$2y$10$xMNwvRe9mWpDMGnj7VM1zu1HxKJJooFAceUFoHnAwRMPgdOlZw9nm', 'etudiant', 'ZOR5BrRxHB', '2025-04-28 14:07:48', '2025-04-28 14:07:48'),
(21, 'German Gleichner', 'rstehr@example.com', 'masculin', '1-971-477-1796', 'SRV-507KA', '2025-04-28 15:32:33', '$2y$10$EXWjRT/pE1QyKucfxnXNsOK0Ge5OMYVOga6JzYzHOiPAJ6p24h2d6', 'agent', 'WAUipeKn2t', '2025-04-28 15:32:33', '2025-04-28 15:32:33'),
(22, 'Mrs. Julia Schmitt', 'iwintheiser@example.org', 'féminin', '307-886-9982', 'SRV-265IU', '2025-04-28 15:32:33', '$2y$10$CgmKllqaJrJwrUnu4EywYuARk5fy3mvcpEPYORrPStmViXQydDqLK', 'agent', 'F3juL1R7sS', '2025-04-28 15:32:33', '2025-04-28 15:32:33'),
(23, 'Lou Eichmann DVM', 'sstanton@example.org', 'masculin', '+17343996354', 'SRV-597TC', '2025-04-28 15:32:33', '$2y$10$RLVyUieb.YV8Lhj4aq1o7ONtqjWzSyH2.qipxIVSfzQGb5xdXtVWq', 'agent', 'PPDSJrQBkOMNCzqjxq7FGklnCdvnUvQmJeOoJaY9TcSwWjjp93ppyJHrteKJ', '2025-04-28 15:32:33', '2025-04-28 20:54:43'),
(24, 'Daphnee Gerlach V', 'stacey56@example.org', 'féminin', '(218) 306-5869', 'SRV-557UI', '2025-04-28 15:32:33', '$2y$10$S3MZ8I2.VQNSdfq4FdRRv.AxiDqacekhpzFT6SS6IiVnSMvrcPqSy', 'agent', 'G9qwYRKriX', '2025-04-28 15:32:34', '2025-04-28 15:32:34'),
(25, 'Selena Barrows', 'swift.alfreda@example.net', 'masculin', '+1.385.303.3165', 'SRV-159UF', '2025-04-28 15:32:34', '$2y$10$fQwavc0MWNGmhIaOdM6EYe5R2sYPFfeYp22.whzV/FAOC7rYxVozm', 'agent', 'sVZnW577pN0C0xNVcbehRONCaDn3j545WfN8zMZVevG8Z9tREokaBNP56YBT', '2025-04-28 15:32:34', '2025-04-28 20:51:08'),
(26, 'Eloisa Lubowitz', 'doconnell@example.org', 'féminin', '623-228-9872', 'SRV-962GM', '2025-04-28 15:32:34', '$2y$10$ot5pri5v2zl8/InkeBiy4erTh5CwoWRCzBhCYyqb2oKz0mv/ahB1S', 'agent', 'Veq9iTCNbh2IV9UZU3aNyY2OSaAlV9cSH6bNywxnZjSy4r4NEOjcagh9gAfY', '2025-04-28 15:32:34', '2025-04-28 20:30:06'),
(27, 'Astrid O\'Reilly MD', 'kuphal.ignatius@example.org', 'féminin', '330-484-7154', 'SRV-818WK', '2025-04-28 15:32:34', '$2y$10$WQ7CGh6xctR2HTXFvANMY.s4csZxqut.gGHlZeUhk2h2yj3llfwZO', 'agent', 'DeigMCpV0c', '2025-04-28 15:32:34', '2025-04-28 15:32:34'),
(28, 'Moises Pagac V', 'iritchie@example.net', 'masculin', '1-812-521-5104', 'SRV-016YT', '2025-04-28 15:32:34', '$2y$10$9sAvRGKzNlF1FuFC3RjiLeJs4TLNV5R9xDYSOSZqGZIb3Ax8a89Ni', 'agent', 'YcvV55TEenIks1OO1ELTnEMbgBo7h13jplsWbtCROmZd1xyablewR6hlBAs3', '2025-04-28 15:32:34', '2025-04-28 17:36:52'),
(29, 'Wade Kirlin', 'merritt.heathcote@example.net', 'masculin', '1-304-499-0646', 'SRV-287PE', '2025-04-28 15:32:34', '$2y$10$QG9XFj2kXTyzGYtRTZ15DeE7Pnf7F6DyJ2xbWmoYFZRfu7p.2d8.W', 'agent', 'rDAniE5n1ztkqTswGyOrtLTvfw9QC4uktR5qzpSo3WXDJ077ovpQ8KukeDRA', '2025-04-28 15:32:34', '2025-04-28 15:32:34'),
(30, 'Jackie Erdman', 'petra48@example.net', 'masculin', '+1-707-685-9741', 'SRV-597XS', '2025-04-28 15:32:34', '$2y$10$fyW4Mr/hqQr8sv/vdLFThu1rEVw.XVzeb44z1zCfjWtxjsYnNV2uC', 'agent', '52eUo6dhjJBHrcih5qys0GfGpDy2GyaP6ajR2EgyDi51DA7l0DMvVw28SH9U', '2025-04-28 15:32:34', '2025-05-03 07:44:58'),
(31, 'Mr. Mitchell Sawayn V', 'berniece.waters@example.net', 'Féminin', '857.804.3711', 'H4FVU', '2025-04-28 18:50:43', '$2y$10$pNFsacULap/fEjdwJnOau.ypb0.958RhSvHSRE.5hsMQyh9adpHBS', 'responsable', 'VjQif4oxhoOiEItamixww7lsvsIGubsxmBu78bRQ0c27nn6ch1cAYPjJRmy5', '2025-04-28 18:50:43', '2025-05-03 08:59:09'),
(32, 'Mr. Cristina Baumbach', 'jose02@example.net', 'Féminin', '+1 (715) 414-5038', 'N2KH9', '2025-04-28 18:50:43', '$2y$10$1lJ/.YKgWbYmha7QvzMLZe/Fhrv0BvFe061ihW8IG3c/T7rELiYh.', 'responsable', '4BvyhNLa8ldoZ2pCAQmKcn8dtHnX4YE6czIS5Nh2RSzIx3v428waeUwDjEb0', '2025-04-28 18:50:43', '2025-05-03 08:59:16'),
(33, 'Kenneth Johnston', 'zward@example.com', 'Féminin', '207.830.7029', '3EFOS', '2025-04-28 18:50:43', '$2y$10$NDhxhpAR9q3KWH8wNtakuOyR5EYucv6xcdCx26jK0BercsZUH/rwy', 'responsable', 'ZQGmJlVXKKaEYOzUyREKKyTI64FKD7mLruCCrSUjWomDvcmZEIV2drOiRXkq', '2025-04-28 18:50:43', '2025-05-03 08:59:24'),
(34, 'Benjamin Cassin', 'layla58@example.net', 'Masculin', '781-236-9579', 'PNXS3', '2025-04-28 18:50:43', '$2y$10$8BFtj5/P.CmpTGoFy/AqK.q1fuR7sA5pEtEU/Hpu1a/iTTLNyLYaW', 'responsable', 'PKsdcpA5r5ThatXNI8leje7o13a3zyXkC1yO1OcRYuns4MdhCtHyySi3JNYR', '2025-04-28 18:50:43', '2025-05-03 08:59:49'),
(35, 'Emil Swaniawski', 'eichmann.cara@example.net', 'Féminin', '617.450.6693', 'GRTDB', '2025-04-28 18:50:43', '$2y$10$p9d8cnPBYivG5KE.QxDScuFlV/DguKy2Lx0NHW9EMVsIO7k77EKA2', 'responsable', '7wdbQE85JNPwz7lXHJibnSZ4bPpTeqY98TqG3JQ8ubC1tQD14Yr3BcRIMWQY', '2025-04-28 18:50:43', '2025-05-03 08:59:40'),
(36, 'Dr. Dominique Koch DVM', 'blick.leta@gmail.com', 'masculin', '+1-906-423-7151', 'SRV-125VP', '2025-05-02 09:10:59', '$2y$10$AhrDRR.On5XEruszV59HKeFBbYJDWsFRZp4TlFgQUQoc0EwnnXQLG', 'admin', 'PdxVTFSP7gGDYc0jBjw7GpNjJ75lMeGtZJ3I9yerSez2wuXCxKGOxMqcHrX2', '2025-05-02 09:11:00', '2025-05-02 09:19:09'),
(37, 'Heaven Stoltenberg', 'vada88@example.org', 'masculin', '+1 (346) 806-9499', 'SRV-989ID', '2025-05-02 09:11:00', '$2y$10$esp7Gr/lgMiHHLdJlpenb.5AGTAIY0vjq33N3JKdkqCfe61uwmQ.G', 'admin', 'PwFanVzMpm', '2025-05-02 09:11:00', '2025-05-02 09:11:00'),
(40, 'Tchindje', 'tchindje@gmail.com', 'Masculin', '695782545', 'KFJVJMRT', NULL, '$2y$10$SAA4CDrfhMb1SPHeLf9UCuJNz4gmhD2L.ZDMZ/EwwpXZyTBA3bGS2', 'agent', NULL, '2025-05-02 10:10:26', '2025-05-03 09:00:36');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
