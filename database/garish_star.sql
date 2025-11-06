-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 06, 2025 at 02:02 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `garish_star`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(65) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'Oreoluwa', '6666'),
(2, 'GraceFavour', 'owa4545');

-- --------------------------------------------------------

--
-- Table structure for table `garish_contacts`
--

DROP TABLE IF EXISTS `garish_contacts`;
CREATE TABLE IF NOT EXISTS `garish_contacts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `sent_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `garish_contacts`
--

INSERT INTO `garish_contacts` (`id`, `name`, `email`, `phone`, `message`, `sent_at`) VALUES
(1, 'peter isabella', 'isabellaihotupeter@gmail.com', '07017507296', 'Hi', '2025-11-01 12:43:10');

-- --------------------------------------------------------

--
-- Table structure for table `garish_rooms`
--

DROP TABLE IF EXISTS `garish_rooms`;
CREATE TABLE IF NOT EXISTS `garish_rooms` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price_per_night` int NOT NULL,
  `room_description` varchar(500) NOT NULL,
  `room_image` varchar(500) NOT NULL,
  `instock` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `garish_rooms`
--

INSERT INTO `garish_rooms` (`id`, `name`, `category`, `price_per_night`, `room_description`, `room_image`, `instock`) VALUES
(1, 'Room 001', 'Classic ', 8, 'A warm and inviting space designed for comfort and relaxation. The Classic Suite features elegant furnishings, a plush bed, air conditioning, free Wi-Fi, and a serene atmosphere perfect for both rest and productivity. Ideal for guests seeking a peaceful and stylish stay without sacrificing convenience or comfort.', 'room_001.jpg', 0),
(2, 'Room 002', 'Classic ', 8, 'A warm and inviting space designed for comfort and relaxation. The Classic Suite features elegant furnishings, a plush bed, air conditioning, free Wi-Fi, and a serene atmosphere perfect for both rest and productivity. Ideal for guests seeking a peaceful and stylish stay without sacrificing convenience or comfort.', 'room_002.jpg', 0),
(3, 'Room 003', 'Grand', 18, 'Our top-tier accommodation for guests who enjoy true luxury. The Grand Suite features premium interior design, generous living space, superior bedding, advanced comforts, and exclusive amenities. From refined ambience to unmatched relaxation, this suite delivers an elevated hospitality experience worthy of your finest moments.', 'room_003.jpg', 1),
(4, 'Room 004', 'Grand', 18, 'Our top-tier accommodation for guests who enjoy true luxury. The Grand Suite features premium interior design, generous living space, superior bedding, advanced comforts, and exclusive amenities. From refined ambience to unmatched relaxation, this suite delivers an elevated hospitality experience worthy of your finest moments.', 'room_004.jpg', 1),
(5, 'Room 005', 'Supreme ', 13, 'Spacious and refined, the Supreme Suite offers upgraded comfort with tasteful modern décor, a luxurious bed, dedicated lounge seating, and enhanced in-room amenities. This suite provides the perfect balance of elegance and functionality — suited for travelers who enjoy added comfort, style, and a touch of indulgence during their stay.', 'room_005.jpg', 1),
(6, 'Room 006', 'Classic', 8, 'A warm and inviting space designed for comfort and relaxation. The Classic Suite features elegant furnishings, a plush bed, air conditioning, free Wi-Fi, and a serene atmosphere perfect for both rest and productivity. Ideal for guests seeking a peaceful and stylish stay without sacrificing convenience or comfort.', 'room_006.jpg', 0),
(7, 'Room 007', 'Classic', 8, 'A warm and inviting space designed for comfort and relaxation. The Classic Suite features elegant furnishings, a plush bed, air conditioning, free Wi-Fi, and a serene atmosphere perfect for both rest and productivity. Ideal for guests seeking a peaceful and stylish stay without sacrificing convenience or comfort.', 'room_007.jpg', 1),
(8, 'Room 008', 'Grand', 18, 'Our top-tier accommodation for guests who enjoy true luxury. The Grand Suite features premium interior design, generous living space, superior bedding, advanced comforts, and exclusive amenities. From refined ambience to unmatched relaxation, this suite delivers an elevated hospitality experience worthy of your finest moments.', 'room_008.jpg', 1),
(9, 'Room 009', 'Classic', 8, 'A warm and inviting space designed for comfort and relaxation. The Classic Suite features elegant furnishings, a plush bed, air conditioning, free Wi-Fi, and a serene atmosphere perfect for both rest and productivity. Ideal for guests seeking a peaceful and stylish stay without sacrificing convenience or comfort.', 'room_009.jpg', 1),
(10, 'Room 010', 'Grand', 18, 'Our top-tier accommodation for guests who enjoy true luxury. The Grand Suite features premium interior design, generous living space, superior bedding, advanced comforts, and exclusive amenities. From refined ambience to unmatched relaxation, this suite delivers an elevated hospitality experience worthy of your finest moments.', 'room_010.jpg', 1),
(11, 'Room 011', 'Supreme ', 13, 'Spacious and refined, the Supreme Suite offers upgraded comfort with tasteful modern décor, a luxurious bed, dedicated lounge seating, and enhanced in-room amenities. This suite provides the perfect balance of elegance and functionality — suited for travelers who enjoy added comfort, style, and a touch of indulgence during their stay.', 'room_011.jpg', 1),
(12, 'Room 012', 'Grand', 18, 'Our top-tier accommodation for guests who enjoy true luxury. The Grand Suite features premium interior design, generous living space, superior bedding, advanced comforts, and exclusive amenities. From refined ambience to unmatched relaxation, this suite delivers an elevated hospitality experience worthy of your finest moments.', 'room_012.jpg', 0),
(13, 'Room 013', 'Classic', 8, 'A warm and inviting space designed for comfort and relaxation. The Classic Suite features elegant furnishings, a plush bed, air conditioning, free Wi-Fi, and a serene atmosphere perfect for both rest and productivity. Ideal for guests seeking a peaceful and stylish stay without sacrificing convenience or comfort.', 'room_013.jpg', 1),
(14, 'Room 014', 'Classic', 8, 'A warm and inviting space designed for comfort and relaxation. The Classic Suite features elegant furnishings, a plush bed, air conditioning, free Wi-Fi, and a serene atmosphere perfect for both rest and productivity. Ideal for guests seeking a peaceful and stylish stay without sacrificing convenience or comfort.', 'room_014.jpg', 0),
(15, 'Room 015', 'Supreme ', 13, 'Spacious and refined, the Supreme Suite offers upgraded comfort with tasteful modern décor, a luxurious bed, dedicated lounge seating, and enhanced in-room amenities. This suite provides the perfect balance of elegance and functionality — suited for travelers who enjoy added comfort, style, and a touch of indulgence during their stay.', 'room_015.jpg', 1),
(16, 'Room 016', 'Grand', 18, 'Our top-tier accommodation for guests who enjoy true luxury. The Grand Suite features premium interior design, generous living space, superior bedding, advanced comforts, and exclusive amenities. From refined ambience to unmatched relaxation, this suite delivers an elevated hospitality experience worthy of your finest moments.', 'room_016.jpg', 0),
(17, 'Room 017', 'Classic', 8, 'A warm and inviting space designed for comfort and relaxation. The Classic Suite features elegant furnishings, a plush bed, air conditioning, free Wi-Fi, and a serene atmosphere perfect for both rest and productivity. Ideal for guests seeking a peaceful and stylish stay without sacrificing convenience or comfort.', 'room_017.jpg', 0),
(18, 'Room 018', 'Supreme ', 13, 'Spacious and refined, the Supreme Suite offers upgraded comfort with tasteful modern décor, a luxurious bed, dedicated lounge seating, and enhanced in-room amenities. This suite provides the perfect balance of elegance and functionality — suited for travelers who enjoy added comfort, style, and a touch of indulgence during their stay.', 'room_018.jpg', 1),
(19, 'Room 019', 'Supreme ', 13, 'Spacious and refined, the Supreme Suite offers upgraded comfort with tasteful modern décor, a luxurious bed, dedicated lounge seating, and enhanced in-room amenities. This suite provides the perfect balance of elegance and functionality — suited for travelers who enjoy added comfort, style, and a touch of indulgence during their stay.', 'room_019.jpg', 1),
(20, 'Room 020', 'Grand', 8, 'A warm and inviting space designed for comfort and relaxation. The Classic Suite features elegant furnishings, a plush bed, air conditioning, free Wi-Fi, and a serene atmosphere perfect for both rest and productivity. Ideal for guests seeking a peaceful and stylish stay without sacrificing convenience or comfort.', 'room_020.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_images`
--

DROP TABLE IF EXISTS `room_images`;
CREATE TABLE IF NOT EXISTS `room_images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `room_id` int NOT NULL,
  `image_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `room_images`
--

INSERT INTO `room_images` (`id`, `room_id`, `image_path`) VALUES
(1, 10, 'room_010a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `service_name` varchar(100) NOT NULL,
  `description` varchar(700) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `featured_image` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `description`, `cost`, `featured_image`, `created_at`) VALUES
(1, 'Conference Hall', 'Host your meetings, conferences, and celebrations in a spacious, elegantly designed hall equipped with modern audio-visual facilities and dedicated support for seamless events.', '$60', 'conference.jpg', '2025-10-31 12:13:27'),
(2, 'Restaurant', 'Savor expertly crafted dishes inspired by both local flavors and international cuisine, prepared by skilled chefs and served in a warm, stylish dining setting.', '$4', 'res.jpg', '2025-10-31 12:13:27'),
(3, 'Gym Facilities', 'Stay energized and committed to your wellness goals with our fully equipped fitness center featuring modern training equipment and a refreshing workout atmosphere.', '$10', 'gym.jpg', '2025-10-31 12:13:27'),
(4, 'Pool', 'Unwind by our pristine pool and soak in a refreshing escape — perfect for leisure swims, sun lounging, and revitalizing moments of calm.', '$10', 'pool.jpg', '2025-10-31 12:13:27'),
(5, 'Spa Care ', 'Rejuvenate your mind and body with soothing treatments, expert therapists, and a peaceful wellness environment designed for pure relaxation and renewal.', '$10', 'massage.jpg', '2025-10-31 12:13:27');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
