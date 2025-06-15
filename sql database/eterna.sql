-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2025 at 12:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eterna`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_cred`
--

CREATE TABLE `admin_cred` (
  `sr_no` int(11) NOT NULL,
  `admin_name` varchar(150) NOT NULL,
  `admin_pass` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_cred`
--

INSERT INTO `admin_cred` (`sr_no`, `admin_name`, `admin_pass`) VALUES
(1, 'admin', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `booking_order`
--

CREATE TABLE `booking_order` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `refund` int(11) DEFAULT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'pending',
  `order_id` varchar(150) NOT NULL,
  `trans_id` varchar(200) DEFAULT NULL,
  `trans_amt` int(11) NOT NULL,
  `trans_status` varchar(100) NOT NULL DEFAULT 'pending',
  `datentime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_order`
--

INSERT INTO `booking_order` (`booking_id`, `user_id`, `product_id`, `refund`, `order_status`, `order_id`, `trans_id`, `trans_amt`, `trans_status`, `datentime`) VALUES
(1, 10, 7, NULL, 'confirmed', 'order_PyMraCGonFB1aA', 'pay_PyMroL3Kcv9LYq', 459999, 'success', '2025-02-21 18:24:58'),
(2, 10, 7, NULL, 'failed', 'order_PyMxXi8Bhzr7XJ', 'pay_PyMyEiVegMyr0n', 459999, 'failed', '2025-02-21 18:30:54'),
(3, 10, 7, NULL, 'failed', 'order_PyMxXi8Bhzr7XJ', 'pay_PyMyEiVegMyr0n', 459999, 'failed', '2025-02-21 18:31:00'),
(4, 10, 7, NULL, 'failed', 'order_PyMxXi8Bhzr7XJ', 'pay_PyMyx0pBbbMOn0', 459999, 'failed', '2025-02-21 18:31:34'),
(5, 10, 7, NULL, 'failed', 'order_PyMxXi8Bhzr7XJ', 'pay_PyMyx0pBbbMOn0', 459999, 'failed', '2025-02-21 18:31:41'),
(6, 10, 6, NULL, 'failed', 'order_PyN29vDECMR8tu', 'pay_PyN2ivYBrRti65', 350000, 'failed', '2025-02-21 18:35:09'),
(8, 10, 6, NULL, 'pending', 'order_PyNI8iDgtcv03B', 'pay_PyNIJeoC1hJTNT', 350000, 'success', '2025-02-21 18:50:04'),
(9, 10, 6, NULL, 'confirmed', 'order_PyNK1OF4wP1cyw', 'pay_PyNKFPvS27YDwU', 350000, 'success', '2025-02-21 18:51:53'),
(10, 10, 7, NULL, 'confirmed', 'order_PyNLnRUAtPYNSQ', 'pay_PyNM0e6YlvbB6g', 459999, 'success', '2025-02-21 18:53:33'),
(11, 10, 6, NULL, 'confirmed', 'order_PyNO0DZEmjuQn1', 'pay_PyNOHmJ2dKjmf1', 350000, 'success', '2025-02-21 18:55:43'),
(12, 10, 7, NULL, 'confirmed', 'order_PyNYXN7l2iNORi', 'pay_PyNYgekqrLtyTL', 459999, 'success', '2025-02-21 19:05:33'),
(13, 10, 7, NULL, 'confirmed', 'order_PyNaP3SzoJ9rAW', 'pay_PyNaZ1vRYWhSdt', 459999, 'success', '2025-02-21 19:07:21'),
(14, 10, 7, 0, 'cancelled', 'order_PyNf7V08etMCGO', 'pay_PyNfMlRsmVCk1p', 459999, 'cancel', '2025-02-21 19:11:54'),
(15, 10, 6, NULL, 'failed', 'order_PyO2WituHZ6Ai6', 'pay_PyO3695P5QD6yO', 350000, 'failed', '2025-02-21 19:34:11'),
(16, 10, 7, NULL, 'failed', 'order_PyO6HgRiXKdtRL', 'pay_PyO6zY6QYSkrmF', 459999, 'failed', '2025-02-21 19:37:52'),
(17, 10, 7, NULL, 'failed', 'order_PyO8kT0jDw29MS', 'undefined', 459999, 'failed', '2025-02-21 19:40:04'),
(18, 10, 7, NULL, 'confirmed', 'order_PyOEerzm3d5OpJ', 'pay_PyOF16f7HiJUbh', 459999, 'success', '2025-02-21 19:45:38'),
(19, 10, 6, NULL, 'failed', 'order_PyOFZPncJXy9Ju', 'pay_PyOFztRUs4XDpN', 350000, 'failed', '2025-02-21 19:46:24'),
(20, 10, 6, NULL, 'failed', 'order_PydNB4ajEYd7UI', 'undefined', 350000, 'failed', '2025-02-22 10:34:29'),
(21, 10, 6, NULL, 'confirmed', 'order_PydPOMnzI2kheZ', 'pay_PydPaY2WTr3pCr', 350000, 'success', '2025-02-22 10:36:02'),
(22, 10, 6, NULL, 'confirmed', 'order_Pyq9KefgStgFVA', 'pay_Pyq9iqnRpWSpQb', 350000, 'success', '2025-02-22 23:04:02'),
(23, 10, 6, NULL, 'confirmed', 'order_Pz2B4PJFuDMoHN', 'pay_Pz2BYabQvoF83o', 350000, 'success', '2025-02-23 10:50:05'),
(24, 10, 5, NULL, 'confirmed', 'order_PzSfHG6f7ZncrQ', 'pay_PzSg37DXVC7irH', 359999, 'success', '2025-02-24 12:44:57'),
(25, 10, 5, NULL, 'failed', 'order_PzSqSVwoNoRW0i', 'undefined', 359999, 'failed', '2025-02-24 12:55:00'),
(26, 10, 5, NULL, 'confirmed', 'order_PzU8LeosNh05Ce', 'pay_PzU9jG4DlP75IV', 359999, 'success', '2025-02-24 14:11:46'),
(27, 13, 6, NULL, 'confirmed', 'order_PzawLkMnVdaIgA', 'pay_PzawWHnrtnNwq9', 350000, 'success', '2025-02-24 20:50:06'),
(28, 10, 6, NULL, 'confirmed', 'order_PzoO7b186CAku9', 'pay_PzoORZ3o1Q4lBQ', 350000, 'success', '2025-02-25 09:59:32'),
(29, 10, 6, NULL, 'confirmed', 'order_Pzsv213Oe2D3pp', 'pay_PzsvKtIYx83SRs', 350000, 'success', '2024-02-01 14:25:27'),
(30, 14, 5, NULL, 'confirmed', 'order_PzypwHHO6LmV3W', 'pay_PzyqPieBxsNinh', 359999, 'success', '2025-02-25 20:12:56'),
(32, 10, 7, NULL, 'confirmed', 'order_Q0pmDvUo91M9lm', 'pay_Q0pmRi4h50dDz6', 459999, 'success', '2021-02-11 23:59:55'),
(37, 13, 5, 0, 'cancelled', 'order_Q0qIV9gfLIsR5b', 'pay_Q0qIfo3YoM11SE', 359999, 'cancel', '2025-02-28 00:30:26'),
(38, 10, 5, 0, 'cancelled', 'order_Q1O4LIaqiYvEmB', 'pay_Q1O4h4d30RXKAS', 359999, 'cancel', '2025-03-01 09:32:44'),
(39, 10, 7, 0, 'cancelled', 'order_Q2GWg2azzm7UdD', 'pay_Q2GXA76T0oFAkK', 459999, 'cancel', '2025-03-03 14:49:06'),
(43, 13, 373, NULL, 'confirmed', 'order_Q37ets4zNNzC8Y', 'pay_Q37f2PHJ6XXFUU', 449999, 'success', '2025-03-05 18:47:16'),
(44, 13, 5, NULL, 'confirmed', 'order_Q37s4Iry3okqUO', 'pay_Q37sEG81DCrTAs', 359999, 'success', '2025-03-05 18:59:46'),
(45, 14, 373, NULL, 'confirmed', 'order_Q3917avj4CQqwq', 'pay_Q391Ka9J4EMGct', 449999, 'success', '2025-03-05 20:07:04'),
(46, 14, 4, NULL, 'confirmed', 'order_Q391nO5AhfBpmx', 'pay_Q391xYYPLrcsiZ', 499998, 'success', '2025-03-05 20:07:49'),
(47, 14, 5, NULL, 'confirmed', 'order_Q3SIzBXC6kmFoz', 'pay_Q3SJ9QdG5UAF0F', 359999, 'success', '2025-03-06 14:59:06'),
(48, 10, 8, NULL, 'confirmed', 'order_Q5qvnDGTVb5EYV', 'pay_Q5qvyIGbXqI6Ja', 199999, 'success', '2025-03-12 16:22:24'),
(49, 14, 8, NULL, 'confirmed', 'order_Q8weWKVIpAW7H8', 'pay_Q8wehxeJ1gnEVo', 199999, 'success', '2025-03-20 11:55:07'),
(50, 14, 373, NULL, 'confirmed', 'order_Q8wfXepUVSTIRX', 'pay_Q8wfl9m76JfcPi', 449999, 'success', '2025-03-20 11:56:07'),
(51, 14, 1, NULL, 'confirmed', 'order_Q9J52HAFF5p7FE', 'pay_Q9J5EejgN5PM1a', 2999, 'success', '2025-03-21 09:51:29'),
(52, 14, 6, NULL, 'confirmed', 'order_QCTkh8tPCCCCCx', 'pay_QCTlXoPJsZWanm', 350000, 'success', '2025-03-29 10:15:21'),
(53, 14, 1, NULL, 'confirmed', 'order_QCaWnKIj9qhjjY', 'pay_QCaX4YQjGomkWa', 19999, 'success', '2025-03-29 16:52:30');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `sr_no` int(11) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`sr_no`, `image`) VALUES
(3, 'IMG_66697.jpg'),
(4, 'IMG_96180.webp'),
(5, 'IMG_71559.webp'),
(6, 'IMG_22416.webp'),
(7, 'IMG_76243.webp'),
(8, 'IMG_63463.webp'),
(10, 'IMG_63109.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cat_details`
--

CREATE TABLE `cat_details` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `page` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cat_details`
--

INSERT INTO `cat_details` (`sr_no`, `name`, `page`, `picture`) VALUES
(8, 'BESTSELLER', 'men.php', 'IMG_97429.webp'),
(10, 'SALE', 'men.php', 'IMG_14967.webp'),
(11, 'MEN', 'men.php', 'IMG_60247.webp'),
(12, 'WOMEN', 'men.php', 'IMG_18474.webp'),
(13, 'KIDS', 'men.php', 'IMG_35145.webp'),
(14, 'COUPLE', 'men.php', 'IMG_85864.webp'),
(15, 'LUXURY', 'men.php', 'IMG_86396.webp'),
(16, 'SMART WATCH', 'men.php', 'IMG_58836.webp');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `sr_no` int(11) NOT NULL,
  `ps` varchar(100) NOT NULL,
  `ios` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pn1` bigint(20) NOT NULL,
  `pn2` bigint(20) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `insta` varchar(100) NOT NULL,
  `yt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`sr_no`, `ps`, `ios`, `email`, `pn1`, `pn2`, `fb`, `insta`, `yt`) VALUES
(1, 'https://play.google.com/store/games?device=phone', 'https://www.apple.com/in/app-store/', 'dhruvingameryt@gmail.com', 917016387575, 917575858099, 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.youtube.com/');

-- --------------------------------------------------------

--
-- Table structure for table `couple`
--

CREATE TABLE `couple` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` int(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `modelnumber` varchar(50) NOT NULL,
  `movement` varchar(50) NOT NULL,
  `casematerial` varchar(100) NOT NULL,
  `strapmaterial` varchar(100) NOT NULL,
  `dialsize` varchar(100) NOT NULL,
  `waterresistance` varchar(100) NOT NULL,
  `warranty` varchar(50) NOT NULL,
  `description` varchar(350) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `removed` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `couple`
--

INSERT INTO `couple` (`id`, `name`, `category`, `price`, `quantity`, `brand`, `modelnumber`, `movement`, `casematerial`, `strapmaterial`, `dialsize`, `waterresistance`, `warranty`, `description`, `status`, `removed`) VALUES
(8, 'Eterna Bandhan Quartz Analog with Date White Dial Two Toned Watch', 'Couple Watch', 199999, 1, 'Eterna', '9401094210KM01', 'Quartz', 'Stainless Steel', 'Stainless Steel', '45 Mm &amp;amp; 35 Mm', 'No', '24 months warranty on the Movement and 12 months w', 'This stunning Rose Gold &amp;amp; Silver Stainless Steel Watch combines timeless elegance with modern sophistication, perfect for those who appreciate refined style and precision. The rose gold and silver stainless steel strap and body create a beautiful contrast, while the rose gold Roman indices and hands add a touch of classical charm. The sun-m', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `couple_images`
--

CREATE TABLE `couple_images` (
  `sr_no` int(11) NOT NULL,
  `couple_id` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `thumb` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `couple_images`
--

INSERT INTO `couple_images` (`sr_no`, `couple_id`, `image`, `thumb`) VALUES
(1, 8, 'IMG_48942.webp', 1),
(2, 8, 'IMG_62036.webp', 0),
(3, 8, 'IMG_46933.webp', 0),
(4, 8, 'IMG_20264.webp', 0),
(5, 8, 'IMG_34229.webp', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kids`
--

CREATE TABLE `kids` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` int(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `modelnumber` varchar(50) NOT NULL,
  `movement` varchar(50) NOT NULL,
  `casematerial` varchar(100) NOT NULL,
  `strapmaterial` varchar(100) NOT NULL,
  `dialsize` varchar(100) NOT NULL,
  `waterresistance` varchar(100) NOT NULL,
  `warranty` varchar(50) NOT NULL,
  `description` varchar(350) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `removed` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kids`
--

INSERT INTO `kids` (`id`, `name`, `category`, `price`, `quantity`, `brand`, `modelnumber`, `movement`, `casematerial`, `strapmaterial`, `dialsize`, `waterresistance`, `warranty`, `description`, `status`, `removed`) VALUES
(1, 'Zoop By Eterna Quartz Analog Watch for Kids', 'Kids Watch', 2999, 1, 'Eterna', 'NTC4048PP47', 'Quartz', 'Plastic', 'Polyurethane', '30 Mm', 'No', '1 Year', 'Unleash the hero within with Zoop Spiderman themed kids analog watch Now every wrist becomes a gateway to expanding their superhero collection. Featuring iconic Avengers characters on the Analog this watch lets kids feel like a true hero with every glance. It not just a timepiece it an invitation to collect and conquer empowering them to build thei', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kids_images`
--

CREATE TABLE `kids_images` (
  `sr_no` int(11) NOT NULL,
  `kids_id` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `thumb` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kids_images`
--

INSERT INTO `kids_images` (`sr_no`, `kids_id`, `image`, `thumb`) VALUES
(1, 1, 'IMG_40931.webp', 0),
(2, 1, 'IMG_47072.webp', 1),
(3, 1, 'IMG_54765.webp', 0),
(4, 1, 'IMG_13772.webp', 0),
(8, 1, 'IMG_61358.webp', 0),
(9, 1, 'IMG_44981.webp', 0);

-- --------------------------------------------------------

--
-- Table structure for table `men`
--

CREATE TABLE `men` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` int(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `modelnumber` varchar(50) NOT NULL,
  `movement` varchar(50) NOT NULL,
  `casematerial` varchar(100) NOT NULL,
  `strapmaterial` varchar(100) NOT NULL,
  `dialsize` varchar(100) NOT NULL,
  `waterresistance` varchar(100) NOT NULL,
  `warranty` varchar(50) NOT NULL,
  `description` varchar(350) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `removed` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `men`
--

INSERT INTO `men` (`id`, `name`, `category`, `price`, `quantity`, `brand`, `modelnumber`, `movement`, `casematerial`, `strapmaterial`, `dialsize`, `waterresistance`, `warranty`, `description`, `status`, `removed`) VALUES
(1, 'Eterna 5822P - Cubitus', 'Men Watch', 50000, 5, 'Eterna', '5822p', 'Swiss Mechanism', 'Stainless steel', 'Stainless steel', '45mm', 'hg', '2 Years', 'as', 1, 1),
(2, 'h', 'h', 4, 3, 'h', 'h', 'h', 'h', 'h', 'h', 'h', 'h', 'h', 1, 1),
(3, 'h', 'f', 45, 18, 'jhj', 'jjjk', 'klj', 'mjuj', 'nhij9i', 'njji', 'nji', 'ji', 'k', 1, 1),
(4, 'Eterna  Nebula Art Deco 18k Gold Skeleton Automatic Watch - Swiss Technology', 'Men Watch', 499998, 1, 'ETERNA', 'NT5074DL01', 'Automatic', '18 Karat Gold', 'Leather', '45 Mm', 'Yes', 'Lifetime', 'Art Deco 18K Gold Skeletal Automatic Wristwatch - A Tribute to 1920s Elegance and Precision. In the heart of our Art Deco collection lies a flagship masterpiece crafted in 18K gold, a tribute to the geometric elegance of the 1920s. This Art Deco Skeletal Automatic wristwatch is powered by the Swiss STP6 15 calibre, bringing precision and art to the', 1, 0),
(5, 'Eterna Caelum Titanium Automatic Multifunction - Stellar Edition', 'Men Watch', 359999, 1, 'ETERNA', '10029TM01', 'Automatic', 'Titanium', 'Titanium', '42 Mm', 'Yes', '24 Months', 'Inspired by the celestial patterns of the sky, this headliner limited edition watch stands out with its bold red integrated dial crafted from grade 5 titanium. Featuring Titan&amp;amp;amp;amp;amp;amp;#039;s first In-House Automatic Multifunction movement, this watch boasts a decorated sun-moon and date disc, luminous hands, and sectoral lume indice', 1, 0),
(6, 'Eterna Shaped Automatics Anthracite Dial Automatic - Titanium Build', 'Men Watch', 350000, 0, 'ETERNA', 'NS90162QM01', 'Automatic', 'Titanium', 'Titanium', '43 Mm', 'Yes', '24 Months', 'Elevate your style with this striking and square silver watch. The cutout open-heart anthracite dial offers a glimpse into the mesmerizing automatic movement, creating a sophisticated and modern look. The shiny silver indices and blue and white design hands add a touch of elegance. Pair it with formal attire or dress up a smart-casual look effortle', 1, 0),
(7, 'Eterna Metal Mechanicals Anthracite Dial Analog Titanium Strap watch', 'Men Watch', 459999, 1, 'ETERNA', 'NS90140TM01', 'Quartz', 'Titanium', 'Titanium', '45 Mm', 'Yes', '24 Months', 'Adorn your wrist with a stunning silver masterpiece from Titan Metal Mechanical range. The full skeletal dial showcases intricate automatic movement, revealing the captivating mechanics within. The all-silver glory of this timepiece makes it perfect for special occasions, adding a touch of elegance and sophistication to your ensemble.', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `men_images`
--

CREATE TABLE `men_images` (
  `sr_no` int(11) NOT NULL,
  `men_id` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `thumb` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `men_images`
--

INSERT INTO `men_images` (`sr_no`, `men_id`, `image`, `thumb`) VALUES
(17, 4, 'IMG_21168.webp', 0),
(18, 4, 'IMG_60517.webp', 0),
(19, 4, 'IMG_17994.webp', 1),
(20, 4, 'IMG_42816.webp', 0),
(21, 4, 'IMG_58219.webp', 0),
(22, 4, 'IMG_40802.webp', 0),
(23, 4, 'IMG_52982.webp', 0),
(24, 4, 'IMG_72900.webp', 0),
(25, 5, 'IMG_54791.webp', 1),
(26, 5, 'IMG_61361.webp', 0),
(27, 5, 'IMG_15758.webp', 0),
(28, 5, 'IMG_47240.webp', 0),
(29, 6, 'IMG_76887.webp', 1),
(30, 6, 'IMG_80302.webp', 0),
(31, 6, 'IMG_35475.webp', 0),
(32, 6, 'IMG_51676.webp', 0),
(33, 6, 'IMG_32301.webp', 0),
(34, 7, 'IMG_25842.webp', 0),
(35, 7, 'IMG_17440.webp', 0),
(36, 7, 'IMG_52174.webp', 0),
(37, 7, 'IMG_36976.webp', 1),
(38, 7, 'IMG_64962.webp', 0),
(39, 7, 'IMG_59411.webp', 0),
(40, 7, 'IMG_42641.webp', 0),
(41, 7, 'IMG_82742.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `sr_no` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `price` int(30) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `phonenum` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`sr_no`, `booking_id`, `product_name`, `price`, `user_name`, `phonenum`, `email`, `address`, `city`, `pincode`) VALUES
(5, 14, 'Eterna Metal Mechanicals Anthracite Dial Analog Titanium Strap watch', 459999, 'Dhruvin Oza', '7575858099', 'ozadhruvin0911@gmail.com', '177-D Siddhhivinayak Township, 150 ft. Ring Road\r\n150 ft. Ring Road, Bhavnagar', 'Bhavnagar', 364002),
(6, 15, 'Eterna Shaped Automatics Anthracite Dial Automatic - Titanium Build', 350000, 'Dhruvin Oza', '7575858099', 'ozadhruvin0911@gmail.com', '177-D Siddhhivinayak Township, 150 ft. Ring Road\r\n150 ft. Ring Road, Bhavnagar', 'Bhavnagar', 364002),
(7, 18, 'Eterna Metal Mechanicals Anthracite Dial Analog Titanium Strap watch', 459999, 'Dhruvin Oza', '7575858099', 'ozadhruvin0911@gmail.com', '177-D Siddhhivinayak Township, 150 ft. Ring Road\r\n150 ft. Ring Road, Bhavnagar', 'Bhavnagar', 364002),
(8, 21, 'Eterna Shaped Automatics Anthracite Dial Automatic - Titanium Build', 350000, 'Dhruvin Oza', '7575858099', 'ozadhruvin0911@gmail.com', '177-D Siddhhivinayak Township, 150 ft. Ring Road\r\n150 ft. Ring Road, Bhavnagar', 'Bhavnagar', 364002),
(9, 22, 'Eterna Shaped Automatics Anthracite Dial Automatic - Titanium Build', 350000, 'Dhruvin Oza', '7575858099', 'ozadhruvin0911@gmail.com', '177-D Siddhhivinayak Township, 150 ft. Ring Road\r\n150 ft. Ring Road, Bhavnagar', 'Bhavnagar', 364002),
(10, 23, 'Eterna Shaped Automatics Anthracite Dial Automatic - Titanium Build', 350000, 'Dhruvin Oza', '7575858088', 'ozadhruvin0911@gmail.com', '177-D Siddhhivinayak Township, 150 ft. Ring Road\r\n150 ft. Ring Road, Bhavnagar', 'Bhavnagar', 364002),
(11, 24, 'Eterna Caelum Titanium Automatic Multifunction - Stellar Edition', 359999, 'Dhruvin Oza', '7575858099', 'ozadhruvin0911@gmail.com', '177-D Siddhhivinayak Township, 150 ft. Ring Road\r\n150 ft. Ring Road, Bhavnagar', 'Bhavnagar', 364002),
(12, 26, 'Eterna Caelum Titanium Automatic Multifunction - Stellar Edition', 359999, 'Dhruvin Oza', '7575858099', 'ozadhruvin0911@gmail.com', '177-D Siddhhivinayak Township, 150 ft. Ring Road\r\n150 ft. Ring Road, Bhavnagar', 'Bhavnagar', 364002),
(13, 27, 'Eterna Shaped Automatics Anthracite Dial Automatic - Titanium Build', 350000, 'Nilabh', '123', 'dhruvingameryt@gmail.com', '177-D Siddhhivinayak Township, 150 ft. Ring Road\r\n150 ft. Ring Road, Bhavnagar', 'Bhavnagar', 364002),
(14, 28, 'Eterna Shaped Automatics Anthracite Dial Automatic - Titanium Build', 350000, 'Dhruvin Oza', '7575858099', 'ozadhruvin0911@gmail.com', '177-D Siddhhivinayak Township, 150 ft. Ring Road\r\n150 ft. Ring Road, Bhavnagar', 'Bhavnagar', 364002),
(15, 29, 'Eterna Shaped Automatics Anthracite Dial Automatic - Titanium Build', 350000, 'Dhruvin Oza', '7575858099', 'ozadhruvin0911@gmail.com', '177-D Siddhhivinayak Township, 150 ft. Ring Road\r\n150 ft. Ring Road, Bhavnagar', 'Bhavnagar', 364002),
(16, 30, 'Eterna Caelum Titanium Automatic Multifunction - Stellar Edition', 359999, 'Nilabh Oza', '1597538426', 'dhruvingamer17@gmail.com', '177-D Siddhhivinayak Township, 150 ft. Ring Road\r\n150 ft. Ring Road, Bhavnagar', 'Bhavnagar', 364002),
(23, 37, 'Eterna Caelum Titanium Automatic Multifunction - Stellar Edition', 359999, 'Nilabh', '123', 'dhruvingameryt@gmail.com', '177-D Siddhhivinayak Township, 150 ft. Ring Road\r\n150 ft. Ring Road, Bhavnagar', 'Bhavnagar', 364002),
(24, 38, 'Eterna Caelum Titanium Automatic Multifunction - Stellar Edition', 359999, 'Dhruvin', '75758580', 'ozadhruvin0911@gmail.com', '177-D Siddhhivinayak Township, 150 ft. Ring Road\r\n150 ft. Ring Road, Bhavnagar', 'Bhavnagar', 36400),
(25, 39, 'ddd', 459999, 'Dhruvin', '75758580', 'ozadhruvin0911@gmail.com', '177-D Siddhhivinayak Township, 150 ft. Ring Road\r\n150 ft. Ring Road, Bhavnagar', 'Bhavnagar', 36400),
(26, 43, 'Nebula Varsha 18k Gold Analog Diamond Studded Bracelet Watch', 449999, 'Nilabh', '123', 'dhruvingameryt@gmail.com', '177-D Siddhhivinayak Township, 150 ft. Ring Road\r\n150 ft. Ring Road, Bhavnagar', 'Bhavnagar', 364002),
(27, 44, 'Eterna Caelum Titanium Automatic Multifunction - Stellar Edition', 359999, 'Nilabh', '123', 'dhruvingameryt@gmail.com', '177-D Siddhhivinayak Township, 150 ft. Ring Road\r\n150 ft. Ring Road, Bhavnagar', 'Bhavnagar', 364002),
(28, 45, 'Nebula Varsha 18k Gold Analog Diamond Studded Bracelet Watch', 449999, 'Nilabh Oza', '1597538426', 'dhruvingamer17@gmail.com', '177-D Siddhhivinayak Township, 150 ft. Ring Road\r\n150 ft. Ring Road, Bhavnagar', 'Bhavnagar', 364002),
(29, 46, 'Eterna  Nebula Art Deco 18k Gold Skeleton Automatic Watch - Swiss Technology', 499998, 'Nilabh Oza', '1597538426', 'dhruvingamer17@gmail.com', '177-D Siddhhivinayak Township, 150 ft. Ring Road\r\n150 ft. Ring Road, Bhavnagar', 'Bhavnagar', 364002),
(30, 47, 'Eterna Caelum Titanium Automatic Multifunction - Stellar Edition', 359999, 'Nilabh Oza', '1597538426', 'dhruvingamer17@gmail.com', '177-D Siddhhivinayak Township, 150 ft. Ring Road\r\n150 ft. Ring Road, Bhavnagar', 'Bhavnagar', 364002),
(31, 48, 'Eterna Bandhan Quartz Analog with Date White Dial Two Toned Watch', 199999, 'Dhruvin', '75758580', 'ozadhruvin0911@gmail.com', '177-D Siddhhivinayak Township, 150 ft. Ring Road\r\n150 ft. Ring Road, Bhavnagar', 'Bhavnagar', 36400),
(32, 49, 'Eterna Bandhan Quartz Analog with Date White Dial Two Toned Watch', 199999, 'Nilabh Oza', '1597538426', 'dhruvingamer17@gmail.com', '177-D Siddhhivinayak Township, 150 ft. Ring Road\r\n150 ft. Ring Road, Bhavnagar', 'Bhavnagar', 364002),
(33, 50, 'Nebula Varsha 18k Gold Analog Diamond Studded Bracelet Watch', 449999, 'Nilabh Oza', '1597538426', 'dhruvingamer17@gmail.com', '177-D Siddhhivinayak Township, 150 ft. Ring Road\r\n150 ft. Ring Road, Bhavnagar', 'Bhavnagar', 364002),
(34, 51, 'Zoop By Eterna Quartz Analog Watch for Kids', 2999, 'Nilabh Oza', '1597538426', 'dhruvingamer17@gmail.com', '177-D Siddhhivinayak Township, 150 ft. Ring Road\r\n150 ft. Ring Road, Bhavnagar', 'Bhavnagar', 364002),
(35, 52, 'Eterna Shaped Automatics Anthracite Dial Automatic - Titanium Build', 350000, 'Nilabh Oza', '1597538426', 'dhruvingamer17@gmail.com', '177-D Siddhhivinayak Township, 150 ft. Ring Road\r\n150 ft. Ring Road, Bhavnagar', 'Bhavnagar', 364002),
(36, 53, 'Eterna Maestro Premium Metal Smartwatch, BT Calling, Functional', 19999, 'Nilabh Oza', '1597538426', 'dhruvingamer17@gmail.com', '177-D Siddhhivinayak Township, 150 ft. Ring Road\r\n150 ft. Ring Road, Bhavnagar', 'Bhavnagar', 364002);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `sr_no` int(11) NOT NULL,
  `site_title` varchar(50) NOT NULL,
  `site_about` varchar(250) NOT NULL,
  `shutdown` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`sr_no`, `site_title`, `site_about`, `shutdown`) VALUES
(1, 'ETERNA', 'Welcome to Eterna, where timeless craftsmanship meets modern elegance. Our precision-engineered watches embody sophistication, durability, and style. Designed for those who appreciate fine horology, Eterna timepieces blend heritage with innovation.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `smartwatch`
--

CREATE TABLE `smartwatch` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` int(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `modelnumber` varchar(50) NOT NULL,
  `movement` varchar(50) NOT NULL,
  `casematerial` varchar(100) NOT NULL,
  `strapmaterial` varchar(100) NOT NULL,
  `dialsize` varchar(100) NOT NULL,
  `waterresistance` varchar(100) NOT NULL,
  `warranty` varchar(50) NOT NULL,
  `description` varchar(350) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `removed` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `smartwatch`
--

INSERT INTO `smartwatch` (`id`, `name`, `category`, `price`, `quantity`, `brand`, `modelnumber`, `movement`, `casematerial`, `strapmaterial`, `dialsize`, `waterresistance`, `warranty`, `description`, `status`, `removed`) VALUES
(1, 'Eterna Maestro Premium Metal Smartwatch, BT Calling, Functional', 'Men Smartwatch', 19999, 0, 'Eterna', '90208KM01', 'Smart', 'Stainless Steel', 'Stainless Steel', 'undefined', 'No', '1 Year', 'Eterna Maestro Premium Smartwatch features a 3.6 CM AMOLED display with 466x466 resolution housed in a sleek, durable 3-piece all stainless steel construction. Designed for both style and functionality, it offers customizable 3D watch faces and a functional crown for effortless navigation. With SingleSync™ BT Calling and an AI Voice Assistant, stay', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `smartwatch_images`
--

CREATE TABLE `smartwatch_images` (
  `sr_no` int(11) NOT NULL,
  `smartwatch_id` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `thumb` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `smartwatch_images`
--

INSERT INTO `smartwatch_images` (`sr_no`, `smartwatch_id`, `image`, `thumb`) VALUES
(2, 1, 'IMG_42760.webp', 1),
(3, 1, 'IMG_43264.webp', 0),
(4, 1, 'IMG_83154.webp', 0),
(5, 1, 'IMG_86061.webp', 0),
(6, 1, 'IMG_29860.webp', 0),
(7, 1, 'IMG_77933.webp', 0),
(8, 1, 'IMG_63001.webp', 0),
(9, 1, 'IMG_75360.webp', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_cred`
--

CREATE TABLE `user_cred` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(300) NOT NULL,
  `phonenum` varchar(30) NOT NULL,
  `pincode` int(11) NOT NULL,
  `profile` varchar(150) NOT NULL,
  `city` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `is_verified` int(11) DEFAULT 0,
  `token` varchar(200) DEFAULT NULL,
  `t_expire` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `datentime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_cred`
--

INSERT INTO `user_cred` (`id`, `name`, `email`, `address`, `phonenum`, `pincode`, `profile`, `city`, `password`, `is_verified`, `token`, `t_expire`, `status`, `datentime`) VALUES
(10, 'Dhruvin', 'ozadhruvin0911@gmail.com', '177-D Siddhhivinayak Township, 150 ft. Ring Road\r\n150 ft. Ring Road, Bhavnagar', '75758580', 36400, 'IMG_75519.jpeg', 'Bhavnagar', '$2y$10$/U/ASeKTY5u1XAyAJwI6iOlaWnBQ8fxQavx8y99iOyEE/2XbcxhCy', 1, NULL, NULL, 1, '2025-02-16 17:31:55'),
(13, 'Nilabh', 'dhruvingameryt@gmail.com', '177-D Siddhhivinayak Township, 150 ft. Ring Road\r\n150 ft. Ring Road, Bhavnagar', '123', 364002, 'IMG_55062.jpeg', 'Bhavnagar', '$2y$10$g7ej4O7M2JQyGLqizLYat.aC9PkKdlDPBPL0OsOCuCQyFdpUlBdCa', 1, NULL, NULL, 1, '2025-02-22 10:41:47'),
(14, 'Nilabh Oza', 'dhruvingamer17@gmail.com', '177-D Siddhhivinayak Township, 150 ft. Ring Road\r\n150 ft. Ring Road, Bhavnagar', '1597538426', 364002, 'IMG_35071.jpeg', 'Bhavnagar', '$2y$10$4XKMh1WsXJuIgZbeJmnzT.wngfZWLCbP42TlkohxO/AwyjHk8XeZ6', 1, NULL, NULL, 1, '2024-05-09 20:05:02'),
(15, 'Neel', 'neeloza78@gmail.com', '177-D Siddhhivinayak Township, 150 ft. Ring Road\r\n150 ft. Ring Road, Bhavnagar', '159753', 364002, 'IMG_67554.jpeg', 'Bhavnagar', '$2y$10$fVyhV7vvipd041gK1zhhaeNbh5I5I708JhpU8PpUnnz1Eceub3Ujm', 0, '7ff3c93c24b599cae0844846ca458bf0', NULL, 1, '2025-03-10 16:17:26');

-- --------------------------------------------------------

--
-- Table structure for table `user_queries`
--

CREATE TABLE `user_queries` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL,
  `datentime` datetime NOT NULL DEFAULT current_timestamp(),
  `seen` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_queries`
--

INSERT INTO `user_queries` (`sr_no`, `name`, `email`, `subject`, `message`, `datentime`, `seen`) VALUES
(58, 'Dhruvin Oza', 'dhruvingameryt@gmail.com', 'ae', 'etrt', '2025-03-01 23:22:15', 1),
(59, 'Dhruvin Oza', 'dhruvingameryt@gmail.com', 'dsddfe', 'reeh', '2025-03-06 14:45:35', 1),
(60, 'Dhruvin Oza', 'dhruvingameryt@gmail.com', 'dsddfe', 'reeh', '2025-03-06 14:46:43', 0),
(61, 'Dhruvin Oza', 'dhruvingameryt@gmail.com', 'dsddfe', 'reeh', '2025-03-06 14:47:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `women`
--

CREATE TABLE `women` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` int(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `modelnumber` varchar(50) NOT NULL,
  `movement` varchar(50) NOT NULL,
  `casematerial` varchar(100) NOT NULL,
  `strapmaterial` varchar(100) NOT NULL,
  `dialsize` varchar(100) NOT NULL,
  `waterresistance` varchar(100) NOT NULL,
  `warranty` varchar(50) NOT NULL,
  `description` varchar(350) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `removed` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `women`
--

INSERT INTO `women` (`id`, `name`, `category`, `price`, `quantity`, `brand`, `modelnumber`, `movement`, `casematerial`, `strapmaterial`, `dialsize`, `waterresistance`, `warranty`, `description`, `status`, `removed`) VALUES
(373, 'Nebula Varsha 18k Gold Analog Diamond Studded Bracelet Watch', 'Women Watch', 449999, 1, 'ETERNA', 'NT5600DM01', 'Quartz', '18 Karat Gold', '18 Karat Gold', '35 Mm', 'Yes', '2 Years', 'Varsha 18K Gold Diamond Studded Wristwatch - A Symphony of Time and Monsoon. Introducing the Varsha wristwatch, where time flows in harmony with monsoon&amp;amp;amp;amp;#039;s symphony. Crafted in 18K gold, this exquisite timepiece features an in house Made In India quartz movement, bringing precision to every moment. The elegant white dial is comp', 1, 0),
(374, 'w', 'd', 2, 4, 'h', 'j', 'n', 'j', 'kk', 'k', 'k', 'k', 'k', 1, 1),
(375, 'h', 'h', 3, 4, 'h', 'h', 'h', 'h', 'h', 'b', 'h', 'h', 'h', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `women_images`
--

CREATE TABLE `women_images` (
  `sr_no` int(11) NOT NULL,
  `women_id` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `thumb` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `women_images`
--

INSERT INTO `women_images` (`sr_no`, `women_id`, `image`, `thumb`) VALUES
(3, 373, 'IMG_81472.webp', 1),
(4, 373, 'IMG_52320.webp', 0),
(5, 373, 'IMG_13925.webp', 0),
(6, 373, 'IMG_80986.webp', 0),
(7, 373, 'IMG_87169.webp', 0),
(8, 373, 'IMG_98303.webp', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_cred`
--
ALTER TABLE `admin_cred`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `booking_order`
--
ALTER TABLE `booking_order`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `cat_details`
--
ALTER TABLE `cat_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `couple`
--
ALTER TABLE `couple`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `couple_images`
--
ALTER TABLE `couple_images`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `couple_id` (`couple_id`);

--
-- Indexes for table `kids`
--
ALTER TABLE `kids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kids_images`
--
ALTER TABLE `kids_images`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `kids_id` (`kids_id`);

--
-- Indexes for table `men`
--
ALTER TABLE `men`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `men_images`
--
ALTER TABLE `men_images`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `men_id` (`men_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `smartwatch`
--
ALTER TABLE `smartwatch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smartwatch_images`
--
ALTER TABLE `smartwatch_images`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `smartwatch_id` (`smartwatch_id`);

--
-- Indexes for table `user_cred`
--
ALTER TABLE `user_cred`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_queries`
--
ALTER TABLE `user_queries`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `women`
--
ALTER TABLE `women`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `women_images`
--
ALTER TABLE `women_images`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `women_id` (`women_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_cred`
--
ALTER TABLE `admin_cred`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking_order`
--
ALTER TABLE `booking_order`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cat_details`
--
ALTER TABLE `cat_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `couple`
--
ALTER TABLE `couple`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `couple_images`
--
ALTER TABLE `couple_images`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kids`
--
ALTER TABLE `kids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kids_images`
--
ALTER TABLE `kids_images`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `men`
--
ALTER TABLE `men`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `men_images`
--
ALTER TABLE `men_images`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `smartwatch`
--
ALTER TABLE `smartwatch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `smartwatch_images`
--
ALTER TABLE `smartwatch_images`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_cred`
--
ALTER TABLE `user_cred`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_queries`
--
ALTER TABLE `user_queries`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `women`
--
ALTER TABLE `women`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=376;

--
-- AUTO_INCREMENT for table `women_images`
--
ALTER TABLE `women_images`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_order`
--
ALTER TABLE `booking_order`
  ADD CONSTRAINT `booking_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_cred` (`id`);

--
-- Constraints for table `couple_images`
--
ALTER TABLE `couple_images`
  ADD CONSTRAINT `couple_images_ibfk_1` FOREIGN KEY (`couple_id`) REFERENCES `couple` (`id`);

--
-- Constraints for table `kids_images`
--
ALTER TABLE `kids_images`
  ADD CONSTRAINT `kids_images_ibfk_1` FOREIGN KEY (`kids_id`) REFERENCES `kids` (`id`);

--
-- Constraints for table `men_images`
--
ALTER TABLE `men_images`
  ADD CONSTRAINT `men_images_ibfk_1` FOREIGN KEY (`men_id`) REFERENCES `men` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking_order` (`booking_id`);

--
-- Constraints for table `smartwatch_images`
--
ALTER TABLE `smartwatch_images`
  ADD CONSTRAINT `smartwatch_images_ibfk_1` FOREIGN KEY (`smartwatch_id`) REFERENCES `smartwatch` (`id`);

--
-- Constraints for table `women_images`
--
ALTER TABLE `women_images`
  ADD CONSTRAINT `women_images_ibfk_1` FOREIGN KEY (`women_id`) REFERENCES `women` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
