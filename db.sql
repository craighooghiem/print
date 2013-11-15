-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 15, 2013 at 05:52 AM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `print`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Wall Calendar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Mouse Pad', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Playing Cards', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Keychains', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Coasters', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `item_options`
--

CREATE TABLE `item_options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `input_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `item_options`
--

INSERT INTO `item_options` (`id`, `item_id`, `name`, `created_at`, `updated_at`, `input_type`) VALUES
(1, 1, 'Choose Your Item', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'radio'),
(2, 1, 'Start Month', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'select'),
(3, 1, 'Choose Your Cover', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'radio'),
(4, 5, 'Choose Your Item', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'radio');

-- --------------------------------------------------------

--
-- Table structure for table `item_option_details`
--

CREATE TABLE `item_option_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_option_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `item_option_details`
--

INSERT INTO `item_option_details` (`id`, `item_option_id`, `name`, `picture`, `created_at`, `updated_at`) VALUES
(1, 1, '12 Month', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, '16 Month', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 2, 'Jan', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 2, 'Feb', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 2, 'Mar', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 2, 'April', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 2, 'May', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 2, 'June', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 2, 'July', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 2, 'Aug', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 2, 'Oct', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 2, 'Nov', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 2, 'Dec', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 3, 'Cover 01', 'classic_cover_01.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 3, 'Cover 02', 'classic_cover_02.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 3, 'Cover 03', 'classic_cover_03.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 3, 'Cover 04', 'classic_cover_04.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 3, 'Cover 05', 'classic_cover_05.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 3, 'Cover 06', 'classic_cover_06.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 3, 'Cover 07', 'classic_cover_07.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 3, 'Cover 08', 'classic_cover_08.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 3, 'Cover 09', 'classic_cover_09.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 3, 'Cover 10', 'classic_cover_10.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 3, 'Cover 11', 'classic_cover_11.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 3, 'Cover 12', 'classic_cover_12.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 3, 'Cover 13', 'classic_cover_13.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 3, 'Cover 14', 'classic_cover_14.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 3, 'Cover 15', 'classic_cover_15.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 4, 'Set of 4 coasters with 1 photo used on all coasters', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 4, 'Set of 4 coasters with 4 different photos', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 4, 'Set of 6 coasters with 1 photo used on all coasters', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 4, 'Set of 6 coasters with 6 different photos', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2013_11_13_013028_create_users_table', 1),
('2013_11_13_013858_create_orders_table', 1),
('2013_11_13_015440_create_items_table', 1),
('2013_11_13_024624_create_photos_table', 1),
('2013_11_13_031619_create_item_options_table', 1),
('2013_11_13_031711_create_item_option_details_table', 1),
('2013_11_14_014623_add_input_type_to_item_options', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `pickup_delivery` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `details` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `original_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=30 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `salutation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `street_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;
