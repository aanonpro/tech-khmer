-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 05, 2022 at 02:30 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_webcoding`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_content`
--

DROP TABLE IF EXISTS `tb_content`;
CREATE TABLE IF NOT EXISTS `tb_content` (
  `cont_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `cont_title` varchar(250) DEFAULT NULL,
  `pic_cover` varchar(250) DEFAULT NULL,
  `short_detail` varchar(500) DEFAULT NULL,
  `detail` longtext CHARACTER SET utf8 COLLATE utf8_general_ci,
  `status` smallint NOT NULL DEFAULT '1',
  `trash` smallint NOT NULL DEFAULT '0',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` int NOT NULL,
  `id` int NOT NULL,
  PRIMARY KEY (`cont_id`),
  KEY `menu_id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_content`
--

INSERT INTO `tb_content` (`cont_id`, `cont_title`, `pic_cover`, `short_detail`, `detail`, `status`, `trash`, `created_at`, `updated_at`, `created_by`, `id`) VALUES
(1, 'psbu school', '', 'psbu university', 'preah sihamoniraja buddhist university', 0, 0, '0000-00-00', '0000-00-00', 0, 2),
(2, 'international news', '', 'news world', 'international news world descibe about polution of the sea in asia', 0, 0, '0000-00-00', '0000-00-00', 0, 1),
(3, 'Secretart for Economic Air plane that looks like', 'whats_news_details2.png', 'Struggling to sell one multi-million dollar home', 'Struggling to sell one multi-million dollar home currently on the market won’t stop actress and singer Jennifer Lopez.', 1, 0, '2022-02-16', '0000-00-00', 1, 3),
(4, 'Secretart for Economic Air plane that looks like', 'whats_news_details3.png', 'Struggling to sell one multi-million dollar', 'Struggling to sell one multi-million dollar home currently on the market won’t stop actress and singer Jennifer Lopez', 1, 0, '2022-02-16', '0000-00-00', 1, 2),
(5, 'Secretart for Economic Air plane that looks like', '1.PNG', 'Struggling to sell one multi-million dollar', 'Struggling to sell one multi-million dollar home currently on the market won’t stop actress and singer Jennifer Lopez.', 1, 0, '2022-02-16', '0000-00-00', 1, 1),
(6, 'Cristiano Ronaldo dos Santos Aveiro', 'FGWjelYXIA4oc_E.jpg', '\"Cristiano\" redirects here. For other people named Cristiano,', '\"Cristiano\" redirects here. For other people named Cristiano, see Cristiano (given name) and Cristiano (surname).\r\nIn this Portuguese name, the first or maternal family name is dos Santos and the second or paternal family name is Aveiro.', 1, 0, '2022-02-17', '0000-00-00', 1, 4),
(9, 'Three companies make cars and motorcycles to fly for real life', '61b6f9750ab9c_1639381320_medium.jpg', 'This fully charged flying motorcycle can fly at a speed of 100 kilometers per hour. It can fly for up to 40 minutes and sells for $ 700,000.', 'As of the beginning of 2022, many companies have been working hard to research the production of flying vehicles for the future, or in foreign languages ​​called \"Flying Car / Moto\" are all powered by electric motors. Green energy source and the best environmentally friendly solution in the production of vehicles in the 21st century.\r\n\r\nToday, Sabay will mention the names of three technology companies that have produced a real look and allow you to test drive as described below:\r\n3) Japanese startup company called \"ALI Technologies\"\r\n\r\nThis fully charged flying motorcycle can fly at a speed of 100 kilometers per hour. It can fly for up to 40 minutes and sells for $ 700,000.', 1, 0, '2022-02-22', '0000-00-00', 1, 3),
(8, 'AFF U23 Championship: Timor-Leste qualify for knockouts after beating Cambodia 1-0', '20220220001-194_(1).jpeg', 'AFF U23 Championship: Timor-Leste qualify for knockouts after beating Cambodia 1-0', 'Cambodia in uncertain waters after shock loss to Timor-Leste\r\n\r\nTimor-Leste qualified for the knockouts of the ongoing AFF U23 Championship after beating Cambodia 1-0 in their group stage encounter at the Morodok Techo National Stadium in Phnom Penh Cambodia. Yue Safy\'s misplaced clearance which resulted in an (18\') own goal proved to be the difference between the two sides.\r\n\r\nThe victors showed more urgency and purpose as they started raiding Cambodia\'s fort right from the first whistle. Mouzinho de Lima was in the thick of things with the midfielder making his side tick courtesy of his shooting and varied passing skills.', 1, 0, '2022-02-21', '0000-00-00', 1, 1),
(10, 'video', 'Apple Code Logo.jpg', 'video education', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/9EDZixuODrw\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>This article is about the Spanish association football player. For other people named Sergio Ramos, see Sergio Ramos (disambiguation).\nIn this Spanish name, the first or paternal surname is Ramos and the second or maternal family name is García.', 1, 0, '2022-02-23', '0000-00-00', 1, 2),
(11, 'Elon Reeve Musk FRS is an entrepreneur and business magnate', 'ELON.SPACEX.web_.jpg', 'Elon Reeve Musk FRS is an entrepreneur and business magnate. He is the founder, CEO', 'Elon Reeve Musk FRS (/ˈiːlɒn/; born June 28, 1971) is an entrepreneur and business magnate. He is the founder, CEO, and Chief Engineer at SpaceX; early-stage investor, CEO, and Product Architect of Tesla, Inc.; founder of The Boring Company; and co-founder of Neuralink and OpenAI.', 1, 0, '2022-02-24', '0000-00-00', 1, 3),
(12, ' Chelsea warm up after 2-0 win over Lille at UCL', '6215995b717ed_1645582680_medium.jpg', 'Chelsea beat Lille 2-0 in the last 16 of the UEFA Champions League. Last night.', 'Chelsea have seen a lot of good results in recent games. In the match against Lille last night, they won 2-0 with two goals scored by Havertz in the minute 8 and midfielder Pulisic in the 63rd minute. In this match, Blues manager Thomas Tuchel also put Lukaku to rest.', 1, 0, '2022-02-24', '0000-00-00', 1, 4),
(13, 'De Jong missed a goal in front of the ball, disappointed Barcelona', '622aad6cab417_1646964060_medium.jpg', 'The match played at the Camp Nou saw hosts Barcelona have 16 chances to score. Memphis Depay tried to score again and again but was helped by goalkeeper Inaki Pena.', 'The match played at the Camp Nou saw hosts Barcelona have 16 chances to score. Memphis Depay tried to score again and again but was helped by goalkeeper Inaki Pena.\r\n\r\nGolden opportunity In the 75th minute, De Jong stood alone after a pass from Pierre-Emerick Aubameyang, but did not succeed. Both teams ended the match 0-0 while Barcelona controlled 68% of the ball. The second leg will be played on March 18 in Galatasaray.', 1, 0, '2022-03-12', '0000-00-00', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_menus`
--

DROP TABLE IF EXISTS `tb_menus`;
CREATE TABLE IF NOT EXISTS `tb_menus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(50) DEFAULT NULL,
  `pic_profiles` varchar(250) DEFAULT NULL,
  `detail` longtext CHARACTER SET utf8 COLLATE utf8_general_ci,
  `status` smallint NOT NULL DEFAULT '1',
  `ordering` smallint NOT NULL DEFAULT '20',
  `menu_url` int NOT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_menus`
--

INSERT INTO `tb_menus` (`id`, `menu_name`, `pic_profiles`, `detail`, `status`, `ordering`, `menu_url`, `created_at`) VALUES
(1, 'Entertainment', NULL, 'entertainment', 1, 2, 0, NULL),
(2, 'Technology', NULL, 'technology', 1, 3, 0, NULL),
(3, 'Business', NULL, 'business', 1, 4, 0, NULL),
(4, 'Sport', NULL, 'sport', 1, 5, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

DROP TABLE IF EXISTS `tb_users`;
CREATE TABLE IF NOT EXISTS `tb_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `profile` varchar(250) DEFAULT NULL,
  `noted` varchar(500) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` smallint NOT NULL DEFAULT '1',
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `name`, `profile`, `noted`, `email`, `password`, `status`, `created_at`) VALUES
(1, 'admin', NULL, NULL, 'anon@gmail.com', '123', 1, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
