-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 07, 2024 at 03:00 AM
-- Server version: 8.0.36
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `storytelling`
--

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

DROP TABLE IF EXISTS `choices`;
CREATE TABLE IF NOT EXISTS `choices` (
  `id` int NOT NULL AUTO_INCREMENT,
  `section_id` int DEFAULT NULL,
  `next_section_id` int DEFAULT NULL,
  `choice_text` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `section_id` (`section_id`),
  KEY `next_section_id` (`next_section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

DROP TABLE IF EXISTS `stories`;
CREATE TABLE IF NOT EXISTS `stories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `title`, `description`, `created_at`) VALUES
(1, 'The Lost Treasure ', 'You are an adventurer searching for hidden treasure in a mysterious jungle. After days of traveling, you arrive at a fork in the road.\r\n\r\nOption A: Take the left path, which leads deeper into the dense jungle.\r\nOption B: Take the right path, which follows a river.\r\nIf you choose Option A: You venture deeper into the jungle, where the sounds of wild animals grow louder. After an hour, you find a hidden cave. And so on. ', '2024-09-05 17:49:01'),
(2, 'na', 'na', '2024-09-05 17:56:46'),
(3, 'na', 'na', '2024-09-05 17:59:58');

-- --------------------------------------------------------

--
-- Table structure for table `story_sections`
--

DROP TABLE IF EXISTS `story_sections`;
CREATE TABLE IF NOT EXISTS `story_sections` (
  `id` int NOT NULL AUTO_INCREMENT,
  `story_id` int DEFAULT NULL,
  `content` text,
  `is_start` tinyint(1) DEFAULT '0',
  `is_end` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `story_id` (`story_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `story_sections`
--

INSERT INTO `story_sections` (`id`, `story_id`, `content`, `is_start`, `is_end`) VALUES
(1, 3, 'na', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_interactions`
--

DROP TABLE IF EXISTS `user_interactions`;
CREATE TABLE IF NOT EXISTS `user_interactions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `story_id` int DEFAULT NULL,
  `section_id` int DEFAULT NULL,
  `choice_id` int DEFAULT NULL,
  `time_spent` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `story_id` (`story_id`),
  KEY `section_id` (`section_id`),
  KEY `choice_id` (`choice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `choices`
--
ALTER TABLE `choices`
  ADD CONSTRAINT `choices_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `story_sections` (`id`),
  ADD CONSTRAINT `choices_ibfk_2` FOREIGN KEY (`next_section_id`) REFERENCES `story_sections` (`id`);

--
-- Constraints for table `story_sections`
--
ALTER TABLE `story_sections`
  ADD CONSTRAINT `story_sections_ibfk_1` FOREIGN KEY (`story_id`) REFERENCES `stories` (`id`);

--
-- Constraints for table `user_interactions`
--
ALTER TABLE `user_interactions`
  ADD CONSTRAINT `user_interactions_ibfk_1` FOREIGN KEY (`story_id`) REFERENCES `stories` (`id`),
  ADD CONSTRAINT `user_interactions_ibfk_2` FOREIGN KEY (`section_id`) REFERENCES `story_sections` (`id`),
  ADD CONSTRAINT `user_interactions_ibfk_3` FOREIGN KEY (`choice_id`) REFERENCES `choices` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
