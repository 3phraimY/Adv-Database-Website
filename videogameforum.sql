-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2026 at 07:51 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `videogameforum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(1, 'General Discussion'),
(2, 'Guides & Tips'),
(3, 'Builds/Loadouts'),
(4, 'Technical Support'),
(5, 'Fan Art');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `game_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `genre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`game_id`, `title`, `genre`) VALUES
(1, 'Elden Ring', 'Soulslike'),
(2, 'The Witcher 3', 'Open World RPG'),
(3, 'Hades II', 'Roguelike'),
(4, 'DOOM Eternal', 'First-Person Shooter'),
(5, 'Animal Crossing', 'Social Sim');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `content`, `created_at`, `user_id`, `game_id`, `category_id`) VALUES
(1, 'Jolly Cooperation in Limgrave', 'If anyone needs help with Margit, my sign is near the fog gate!', '2026-03-28 19:21:48', 2, 1, 2),
(2, 'Is there a monster hunting mod?', 'Looking to spice up my island. Too many butterflies, not enough griffins.', '2026-03-28 19:21:48', 4, 5, 1),
(3, 'Game won\'t launch on Linux', 'The demons are winning because my executable keeps crashing.', '2026-03-28 19:21:48', 3, 4, 4),
(4, 'Maximum Dodge Build', 'Using the Sister Blades with Aphrodite boons is broken. Change my mind.', '2026-03-28 19:21:48', 1, 3, 3),
(5, 'Best Alchemy Build 2024', 'Focus on Heightened Tolerance and Delayed Recovery for infinite potions.', '2026-03-28 19:21:48', 4, 2, 2),
(6, 'test', 'does this post even work?', '2026-04-18 02:49:09', 1, 4, 3),
(7, 'Best Weapons for Beginners', 'What are the best starter weapons in Elden Ring? I keep dying to the first boss.', '2026-04-18 03:06:58', 2, 1, 2),
(8, 'My Witcher 3 Screenshots', 'Sharing some of my favorite moments from Skellige. Anyone else love the sunsets?', '2026-04-18 03:06:58', 3, 2, 5),
(9, 'Animal Crossing Turnip Prices', 'What are your highest turnip prices this week? Let\'s help each other profit!', '2026-04-18 03:06:58', 1, 5, 1),
(10, 'DOOM Eternal Ultra-Nightmare Tips', 'How do you survive the first arena? I need some serious advice.', '2026-04-18 03:06:58', 2, 4, 4),
(11, 'Hades II: Favorite Weapon?', 'Which weapon do you use for speedruns? I\'m torn between the fists and the bow.', '2026-04-18 03:06:58', 3, 3, 1),
(12, 'Elden Ring Fan Art', 'Here\'s my drawing of Malenia. Critique welcome!', '2026-04-18 03:06:58', 1, 1, 5),
(13, 'Witcher 3 Alchemy Guide', 'A full breakdown of the best potions and how to craft them efficiently.', '2026-04-18 03:06:58', 2, 2, 3),
(14, 'Animal Crossing: Island Layouts', 'Share your island maps! I need inspiration for my next redesign.', '2026-04-18 03:06:58', 3, 5, 2),
(15, 'DOOM Eternal Modding', 'Anyone tried the new weapon mods? Share your favorites!', '2026-04-18 03:06:58', 1, 4, 3),
(16, 'Hades II Bugs', 'Game crashes on the final boss for me. Anyone else?', '2026-04-18 03:06:58', 2, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `avatar_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password_hash`, `bio`, `avatar_url`, `created_at`) VALUES
(1, 'QuestMaster', 'admin@gameforum.com', '$2b$12$eImiTXuWVxjM72fGCot', 'Site admin and RPG lover.', NULL, '2026-03-28 19:20:57'),
(2, 'SpeedRunner99', 'fast@twitch.tv', '$2b$12$L7R6d54s321gH8j9k0l', 'I finish games faster than you eat lunch.', NULL, '2026-03-28 19:20:57'),
(3, 'LootGoblin', 'shiny@gold.net', '$2b$12$K8j7h6g5f4d3s2a1p0o', 'Always looking for the best gear drops.', NULL, '2026-03-28 19:20:57'),
(4, 'test', 'test@test.com', '$2y$10$4oW649NQ.bvZoVQj7vvKzOD0jWpzWsXdZf9Y9IVlq3P.QFEQKeaqu', NULL, NULL, '2026-04-18 02:53:24'),
(5, 'test2', 'test4@test.com', '$2y$10$eT5.DuyBkr60hXgiVBMf3OM6oDrwpltRN7GgvY5A57x2gN/nFQg3S', NULL, NULL, '2026-04-18 02:56:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `game_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
