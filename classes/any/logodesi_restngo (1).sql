-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2018 at 07:10 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logodesi_restngo`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_camp_date`
--

CREATE TABLE `ci_camp_date` (
  `camp_date_id` int(10) NOT NULL,
  `hotel_id` int(10) NOT NULL,
  `camp_id` int(10) NOT NULL,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL,
  `camp_date_status` int(1) NOT NULL COMMENT '0 for inactive,1 for active',
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_camp_date`
--

INSERT INTO `ci_camp_date` (`camp_date_id`, `hotel_id`, `camp_id`, `from_date`, `to_date`, `camp_date_status`, `created_at`, `modified_at`) VALUES
(1, 1, 1, '2018-05-25 00:00:00', '2018-05-25 00:00:00', 1, '2018-05-25 07:05:05', '2018-05-25 07:05:55'),
(2, 2, 2, '2018-05-25 00:00:00', '2018-05-25 00:00:00', 1, '2018-05-25 07:05:56', '2018-05-25 07:05:56'),
(3, 5, 4, '2018-05-30 00:00:00', '2018-06-06 00:00:00', 1, '2018-05-30 08:05:21', '2018-05-30 08:05:21');

-- --------------------------------------------------------

--
-- Table structure for table `ci_camp_discount_rate`
--

CREATE TABLE `ci_camp_discount_rate` (
  `camp_dis_id` int(10) NOT NULL,
  `hotel_id` int(10) NOT NULL,
  `camp_id` int(10) NOT NULL,
  `room_type_id` int(10) NOT NULL,
  `discount_type` int(1) NOT NULL COMMENT '1 for discount price,2 for discount perchantage',
  `voucher_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `discount_for` int(1) NOT NULL COMMENT '1 for hourly,2 for daily',
  `camp_dr_status` int(1) NOT NULL COMMENT '0 for inactive,1 for active',
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ci_dis_camp_name`
--

CREATE TABLE `ci_dis_camp_name` (
  `camp_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `camp_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `camp_status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_dis_camp_name`
--

INSERT INTO `ci_dis_camp_name` (`camp_id`, `vendor_id`, `camp_name`, `camp_status`, `created_at`, `modified_at`) VALUES
(4, 1, 'camp1', 1, '2018-05-30 07:05:05', '2018-05-30 07:05:18'),
(2, 1, 'camp2', 1, '2018-05-25 06:05:30', '2018-05-25 06:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `ci_hotels`
--

CREATE TABLE `ci_hotels` (
  `hotel_id` int(10) NOT NULL,
  `hotel_vendor_id` int(5) NOT NULL,
  `hotel_name` varchar(255) NOT NULL,
  `hotel_address` text,
  `hotel_latitude` float DEFAULT NULL,
  `hotel_longitude` float DEFAULT NULL,
  `hotel_city` varchar(255) DEFAULT NULL,
  `hotel_pin_code` varchar(255) DEFAULT NULL,
  `hotel_state` varchar(255) DEFAULT NULL,
  `hotel_country` varchar(255) DEFAULT NULL,
  `hotel_website` varchar(255) DEFAULT NULL,
  `hotel_mobile` varchar(255) DEFAULT NULL,
  `hotel_telephone` varchar(255) DEFAULT NULL,
  `hotel_fax` varchar(255) DEFAULT NULL,
  `hotel_airport` varchar(255) DEFAULT NULL,
  `hotel_landmark` varchar(200) DEFAULT NULL,
  `hotel_star_category` varchar(255) DEFAULT NULL,
  `hotel_description` text,
  `hotel_status` int(1) NOT NULL DEFAULT '0' COMMENT '1 for active,0 for disactive',
  `hotel_created_date` datetime NOT NULL,
  `hotel_modified_date` datetime NOT NULL,
  `hotel_email` varchar(100) DEFAULT NULL,
  `any` enum('1','3') NOT NULL COMMENT '1 for yes,3 for no',
  `check_in` time NOT NULL,
  `check_out` time NOT NULL,
  `min_hour` varchar(100) NOT NULL,
  `max_hour` varchar(100) NOT NULL,
  `hotel_facilities` varchar(50) DEFAULT NULL COMMENT 'facilities id from facilities table'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_hotels`
--

INSERT INTO `ci_hotels` (`hotel_id`, `hotel_vendor_id`, `hotel_name`, `hotel_address`, `hotel_latitude`, `hotel_longitude`, `hotel_city`, `hotel_pin_code`, `hotel_state`, `hotel_country`, `hotel_website`, `hotel_mobile`, `hotel_telephone`, `hotel_fax`, `hotel_airport`, `hotel_landmark`, `hotel_star_category`, `hotel_description`, `hotel_status`, `hotel_created_date`, `hotel_modified_date`, `hotel_email`, `any`, `check_in`, `check_out`, `min_hour`, `max_hour`, `hotel_facilities`) VALUES
(20, 1, 'The Oberoi Udaivilas', '570/10 near milen', 28.3655, 77.333, 'Faridabad', '1212309', NULL, NULL, 'https://www.rama.com', '9898989898', '123456', '123456', 'Indira Gandhi International Airport', NULL, '3', 'The Oberoi Udaivilas is one of the most luxurious hotels in entire India. It s located at the historical land of Udaipur ', 1, '2018-07-19 08:07:39', '2018-07-19 08:07:39', 'rama@abc.com', '1', '00:00:00', '00:00:00', '3', '6', '1,2'),
(21, 1, 'Wildflower Hall', 'Sector 69', 28.3676, 77.3291, 'Panchkula', '1234556', NULL, NULL, 'https://www.puneet.com', '908898989898', '4567890', '345678', 'puneet air port', NULL, '2', 'There is no doubt Taj Falaknuma Palace is one of the best and finest hotel in entire Hyderabad', 1, '2018-07-19 08:07:48', '2018-07-19 08:07:48', 'puneet@gmail.com', '3', '00:00:00', '17:00:00', '5', '10', '1,2,3'),
(22, 1, 'Leela Palace Kempinski', 'Sector 67 ', 28.3735, 77.3242, 'New Delhi', '1234567', NULL, NULL, 'https://www.taru.com', '98912232', '1221', '12221', 'Indira Gandhi International Airport', NULL, '5', 'Leela Palace Kempinski is one of the best luxury hotels in the garden city Bangalore.', 1, '2018-07-19 08:07:57', '2018-07-19 08:07:57', 'taru@gmail.com', '1', '00:00:00', '00:00:00', '8', '10', '1,2,3'),
(23, 1, 'The Taj Mahal Palace', 'Sector 90', 28.3702, 77.3289, 'New Delhi', '1234', NULL, NULL, 'https://www.nitish.com', '1234567890', '123456', '123456', 'Indira Gandhi International Airport', NULL, '10', 'The Taj Mahal Palace is one of the oldest and royal hotels located in Mumbai, India. It is the first choice for travellers to stay who visit Mumbai for holidays', 1, '2018-07-19 08:07:44', '2018-07-19 08:07:44', 'nitish@abc.com', '3', '11:00:00', '23:00:00', '3', '6', '1'),
(24, 1, 'The Leela Palace Kempinski,', 'Sector 60', 28.3865, 77.3272, 'Banglore', '12345678', NULL, NULL, 'https://www.vishal.com', '45678', '45678', '123456', 'vishal air port', NULL, '4', 'Situated at the top point of magnificent Himalaya, Wildflower Hall is the best luxurious hotel at the high hills point of Shimla', 1, '2018-07-19 08:07:01', '2018-07-19 08:07:01', 'vishal@gmail.com', '3', '11:00:00', '13:00:00', '6', '9', '1,2,3'),
(25, 1, 'The Oberoi Rajvilas', 'Sector 79', 28.3685, 77.3315, 'Faridabad', '000003', NULL, NULL, 'https://www.chirag.com', '1234567890', '123456', '123456', 'Chirag New Delhi', NULL, '3', 'Leela Palace Kempinski is one of the best luxury hotels in the garden city Bangalore. The royal architecture, rich golden shaded infrastructure', 1, '2018-07-19 08:07:15', '2018-07-19 08:07:15', 'chirag@abc.com', '3', '05:00:00', '23:59:00', '6', '6', '1'),
(26, 1, 'Vivanta by Taj', 'Sector 98', 28.4264, 77.3398, 'New Delhi', '123456', NULL, NULL, 'https://www.amit.com', '1234567', '34', '123456', 'Indira Gandhi International Airport', NULL, '2', 'The Vivanta by Taj New Delhi, another royal hotel of the Vivanta by Taj Group. One of the best 4 - 5 star luxury hotel in New Delhi', 1, '2018-07-19 08:07:17', '2018-07-19 08:07:17', 'amit@gmail.com', '1', '00:00:00', '00:00:00', '8', '9', '1,2,3'),
(27, 1, 'Ginger Hotel', 'Sector 12', 28.503, 77.2498, 'Jind', '12345', NULL, NULL, 'https://www.nitish2.com', '123457', '23456', '12345', 'Indira Gandhi International Airport', NULL, '2', ' Thai foods, local Kochi foods and best-known barbecue foods. It offers luxurious room facility with the beaches view & great hospitality', 1, '2018-07-19 08:07:43', '2018-07-19 08:07:43', 'nitish2@gmail.com', '1', '00:00:00', '00:00:00', '8', '10', '1,2,3'),
(28, 1, 'Taj Lake Palace', 'Sector 12', 28.3666, 77.3269, 'Nodia', '000004', NULL, NULL, 'https://www.bhanva.com', '1234567890', '123456', '123456', 'Indira Gandhi International Airport', NULL, '5', 'Thai foods, local Kochi foods and best-known barbecue foods. It offers luxurious room facility with the beaches view  great hospitality', 1, '2018-07-19 08:07:28', '2018-07-19 08:07:28', 'bhanva@abc.com', '1', '00:00:00', '00:00:00', '3', '8', '3'),
(29, 1, 'The Oberoi', 'Sector 12', 28.3664, 77.3283, 'Nodia', '000005', NULL, NULL, 'https://www.lalit.com', '123455667890', '123456', '123456', 'Indira Gandhi International Airport', NULL, '5', 'It offers more than 250 luxurious rooms, expensive but premium restaurants, an exclusive spa, bars and nightclubs make it so special. This hotel is highly recommended by travellers, honeymooners, corporate sector travellers, professionals, and premium customers. ', 1, '2018-07-19 08:07:50', '2018-07-19 08:07:50', 'lalit@abc.com', '3', '01:00:00', '23:00:00', '5', '7', '2'),
(30, 1, 'Ashraya International Hotel', 'Sector 12', 28.2586, 77.3961, 'Gurgarm', '12345', NULL, NULL, 'https://www.Bhv.com', '2345', '23', '123456', 'Indira Gandhi International Airport', NULL, '2', ' Thai foods, local Kochi foods and best-known barbecue foods. It offers luxurious room facility with the beaches view & great hospitality', 1, '2018-07-19 08:07:55', '2018-07-19 08:07:55', 'bhv@gmail.com', '1', '00:00:00', '00:00:00', '2', '9', '1,2,3'),
(31, 1, 'Taj Falaknuma Palace', 'Sector 90', 28.3678, 77.3295, 'Panchkula', '000006', NULL, NULL, 'https://www.kanchan.com', '1234', '123456', '123456', 'Indira Gandhi International Airport', NULL, '2', ' Thai foods, local Kochi foods and best-known barbecue foods. It offers luxurious room facility with the beaches view & great hospitality', 1, '2018-07-19 08:07:29', '2018-07-19 08:07:29', 'kanchan@abc.com', '1', '00:00:00', '00:00:00', '4', '7', '3'),
(32, 1, 'The Chancery Pavilion', 'Sector 90', 28.6908, 77.2697, 'Nodia', '1234', NULL, NULL, 'https://www.kanchan2.com', '2345', '123456', '23456', 'Indira Gandhi International Airport', NULL, '3', 'kanchan2 hoel description ', 1, '2018-07-19 08:07:02', '2018-07-19 08:07:02', 'kanchan2@gmail.com', '3', '05:00:00', '17:00:00', '1', '6', '1,2,3'),
(33, 1, 'Iris - The Business Hotel', 'Sector 90', 28.3682, 77.3297, 'New Delhi', '1234', NULL, NULL, 'https://www.sonu.com', '82342385982', '1234566', '123456', 'Sonu Delhi', NULL, '4', ' Thai foods, local Kochi foods and best-known barbecue foods. It offers luxurious room facility with the beaches view & great hospitality', 0, '2018-07-19 08:07:08', '2018-07-19 08:07:08', 'sonu@abc.com', '1', '00:00:00', '00:00:00', '4', '5', '2,3');

-- --------------------------------------------------------

--
-- Table structure for table `ci_hotel_photo`
--

CREATE TABLE `ci_hotel_photo` (
  `hotel_photo_id` int(10) NOT NULL,
  `hotel_id` int(10) NOT NULL,
  `room_type_id` int(10) NOT NULL,
  `hotel_room_image` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ci_room_photo`
--

CREATE TABLE `ci_room_photo` (
  `room_photo_id` int(10) NOT NULL,
  `hotel_id` int(10) NOT NULL,
  `room_id` int(10) NOT NULL,
  `room_photo` text COLLATE utf8_unicode_ci NOT NULL,
  `room_status` int(1) NOT NULL DEFAULT '0' COMMENT '0 for inactive,1 for active',
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ci_room_type`
--

CREATE TABLE `ci_room_type` (
  `room_type_id` int(10) NOT NULL,
  `hotel_id` int(10) NOT NULL,
  `hotel_room_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price_per_hour` decimal(5,0) NOT NULL,
  `price_per_day` int(2) NOT NULL,
  `adult_person_capacity` int(2) NOT NULL,
  `child_capacity` int(2) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `admin_facility` int(20) DEFAULT NULL,
  `vendor_facility` int(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_room_type`
--

INSERT INTO `ci_room_type` (`room_type_id`, `hotel_id`, `hotel_room_type`, `price_per_hour`, `price_per_day`, `adult_person_capacity`, `child_capacity`, `status`, `created_at`, `modified_at`, `admin_facility`, `vendor_facility`) VALUES
(1, 5, 'type 1', '0', 0, 0, NULL, 1, '2018-05-30 07:05:28', '2018-05-30 07:05:28', NULL, NULL),
(2, 5, 'type 2', '0', 0, 0, NULL, 1, '2018-05-30 07:05:37', '2018-05-30 07:05:37', NULL, NULL),
(4, 5, 'vgjg', '565', 65656, 4, NULL, 1, '2018-06-15 11:06:02', '2018-06-15 11:06:02', NULL, NULL),
(5, 9, 'mew', '87', 866, 6, 6, 1, '2018-07-16 06:07:06', '2018-07-16 06:07:06', 1, 5),
(6, 15, 'Class1', '41', 33, 10, 9, 1, '2018-07-16 08:07:23', '2018-07-16 08:07:48', 0, 0),
(7, 15, 'testroom', '100', 100, 5, 9, 1, '2018-07-16 10:07:21', '2018-07-16 10:07:27', 1, 4),
(8, 15, 'tttt', '3433', 2345, 7, 6, 1, '2018-07-16 10:07:54', '2018-07-16 10:07:54', 1, 4),
(9, 19, 'Deluxe', '1200', 2000, 4, 4, 1, '2018-07-19 08:07:03', '2018-07-19 08:07:03', 1, 4),
(10, 21, 'Normal', '1000', 2000, 4, 5, 1, '2018-07-19 08:07:45', '2018-07-19 08:07:45', 1, 0),
(11, 20, 'Deluxe', '200', 1200, 4, 6, 1, '2018-07-19 08:07:56', '2018-07-19 08:07:56', 0, 4),
(12, 22, 'Luxary', '789', 2000, 3, 5, 1, '2018-07-19 08:07:13', '2018-07-19 08:07:13', 1, 0),
(13, 24, 'Normal', '600', 3000, 2, 3, 1, '2018-07-19 08:07:45', '2018-07-19 08:07:45', 1, 4),
(14, 26, 'Deluxe', '500', 1500, 3, 4, 1, '2018-07-19 08:07:20', '2018-07-20 11:07:47', 0, 0),
(15, 27, 'Super Deluxe', '900', 3000, 4, 5, 0, '2018-07-19 08:07:00', '2018-07-20 11:07:01', 0, 0),
(16, 30, 'Normal', '500', 1000, 2, 3, 1, '2018-07-19 08:07:30', '2018-07-19 08:07:30', 1, 0),
(17, 32, 'Delux', '800', 1600, 3, 4, 1, '2018-07-19 08:07:56', '2018-07-19 08:07:56', 1, 0),
(18, 33, 'Luxary', '900', 2100, 4, 2, 1, '2018-07-19 08:07:36', '2018-07-19 08:07:36', 1, 5),
(19, 23, 'Super Deluxe', '2000', 5000, 5, 5, 1, '2018-07-19 10:07:58', '2018-07-20 11:07:16', 0, 0),
(20, 25, 'Normal', '100', 2222, 3, 1, 1, '2018-07-19 10:07:37', '2018-07-19 10:07:37', 1, 4),
(21, 28, 'Delux', '111', 1200, 4, 4, 1, '2018-07-19 10:07:14', '2018-07-19 10:07:14', 1, 0),
(22, 29, 'Deluxe', '500', 5000, 2, 2, 1, '2018-07-19 10:07:44', '2018-07-20 11:07:31', 0, 0),
(23, 31, 'Delux', '300', 3000, 3, 5, 1, '2018-07-19 10:07:23', '2018-07-19 10:07:23', 1, 5),
(24, 25, 'Delax', '12', 1000, 2, 1, 1, '2018-07-19 11:07:13', '2018-07-19 11:07:13', 1, 0),
(25, 27, 'Normal', '100', 2000, 1, 2, 1, '2018-07-19 11:07:55', '2018-07-19 11:07:03', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `ci_users`
--

CREATE TABLE `ci_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT '0',
  `last_ip` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_users`
--

INSERT INTO `ci_users` (`id`, `username`, `firstname`, `lastname`, `email`, `mobile_no`, `password`, `is_admin`, `last_ip`, `created_at`, `updated_at`) VALUES
(1, 'Chirag Singhal', 'Chirag', 'Singhal', 'chirag.netmaxims@gmail.com', '9560855334', '$2y$10$xlu40m7LdVI7emXWA6sm8.k8paS9u3F1MTnAvnYVJ9Q6LT.hWrWMW', 1, '', '2018-05-24 12:05:40', '2018-05-24 12:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `ci_user_role`
--

CREATE TABLE `ci_user_role` (
  `user_role_id` int(10) NOT NULL,
  `hotel_id` int(10) NOT NULL,
  `user_role_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL COMMENT '0 for inactive,1 for active'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_user_role`
--

INSERT INTO `ci_user_role` (`user_role_id`, `hotel_id`, `user_role_name`, `status`) VALUES
(1, 1, 'manager', 1),
(2, 2, 'ceo', 1),
(4, 5, 'manager', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_vendors`
--

CREATE TABLE `ci_vendors` (
  `v_id` int(11) NOT NULL,
  `v_fname` varchar(100) NOT NULL,
  `v_lname` varchar(100) DEFAULT NULL,
  `v_mob` varchar(20) NOT NULL,
  `v_email` varchar(100) NOT NULL,
  `v_pass` varchar(200) NOT NULL,
  `v_otp` varchar(10) DEFAULT NULL,
  `v_address` varchar(200) DEFAULT NULL,
  `v_gst_number` varchar(200) DEFAULT NULL,
  `status` enum('0','1','2') NOT NULL COMMENT '0 for pending,1 for approved,2 for',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_vendors`
--

INSERT INTO `ci_vendors` (`v_id`, `v_fname`, `v_lname`, `v_mob`, `v_email`, `v_pass`, `v_otp`, `v_address`, `v_gst_number`, `status`, `created`, `modified`) VALUES
(1, 'Chirag', 'Singhal', '9560855334', 'chirag.netmaxims@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1134', 'faridabad', '', '1', '2018-05-24 12:05:40', '2018-05-24 12:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `ci_v_assign_role`
--

CREATE TABLE `ci_v_assign_role` (
  `v_assign_role` int(10) NOT NULL,
  `hotel_id` int(10) NOT NULL,
  `v_user_id` int(10) NOT NULL,
  `v_user_profile_id` int(10) NOT NULL,
  `v_user_email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `v_user_password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `v_status` int(1) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_v_assign_role`
--

INSERT INTO `ci_v_assign_role` (`v_assign_role`, `hotel_id`, `v_user_id`, `v_user_profile_id`, `v_user_email`, `v_user_password`, `v_status`, `created_at`) VALUES
(1, 1, 8, 1, 'kanchan.netmaximus@gmail.com', '$2y$10$YR5JExxiNsjVFuOAF0CsnejbjH7LP/E460/pgFymgraCzZiK3BHhC', 1, '0000-00-00 00:00:00'),
(3, 5, 12, 1, 'kanchan.netmaximus@gmail.com', '$2y$10$qXzSBPXG4AT/IYLGdMCCD.JtiR791QkDfKKglijV2LmYbE7cSXCT.', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ci_v_users`
--

CREATE TABLE `ci_v_users` (
  `v_user_id` int(10) NOT NULL,
  `hotel_id` int(10) NOT NULL,
  `user_fname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_lname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_mob_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_designation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_status` int(1) NOT NULL DEFAULT '0' COMMENT '0 for inactive,1 for active',
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_v_users`
--

INSERT INTO `ci_v_users` (`v_user_id`, `hotel_id`, `user_fname`, `user_lname`, `user_email`, `user_mob_no`, `user_address`, `user_designation`, `user_status`, `created_at`, `modified_at`) VALUES
(8, 1, 'kanchan', 'bhaskar', 'kanchan.netmaximus@gmail.com', '987654321', 'sec-10', 'manager', 1, '2018-05-25 04:05:51', '2018-05-25 04:05:51'),
(7, 2, 'asdf', 'asdf', 'asdf@gmail.com', '32445467', 'asdf', 'asdf', 1, '2018-05-24 01:05:16', '2018-05-24 01:05:16'),
(6, 1, 'Chirag', 'Singhal', 'chiragsinghal002@gmail.com', '9560855334', 'Noida', 'Developer', 1, '2018-05-24 12:05:37', '2018-05-24 12:05:37'),
(11, 1, 'ggg', 'gg', 'g@gmail.com', '8987654321', 'sec-10', 'xyz', 1, '2018-05-25 06:05:14', '2018-05-25 06:05:26'),
(10, 2, 'ram', 'kumar', 'ram@gmail.com', '987654321', 'RAWALGAON', 'sdg', 1, '2018-05-25 05:05:43', '2018-05-25 05:05:43'),
(12, 5, 'kanchan', 'bhaskar', 'kanchan.netmaximus@gmail.com', '987654321', 'sec-10', 'manager', 1, '2018-05-30 09:05:00', '2018-05-30 09:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `facility_id`
--

CREATE TABLE `facility_id` (
  `facility_id` int(10) NOT NULL,
  `facility_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `admin` int(1) NOT NULL COMMENT '1 for yes,0 for no',
  `vendor` int(1) NOT NULL COMMENT '1 for yes,0 for no',
  `for_room_type` int(1) NOT NULL COMMENT '1 for yes,0 for no',
  `for_hotel` int(1) NOT NULL COMMENT '1 for yes,0 for no',
  `status` int(1) NOT NULL COMMENT '1 for Active,0 for Inactive',
  `created_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `facility_id`
--

INSERT INTO `facility_id` (`facility_id`, `facility_name`, `admin`, `vendor`, `for_room_type`, `for_hotel`, `status`, `created_at`) VALUES
(1, 'Parking', 1, 0, 1, 1, 1, '2018-07-14 00:00:00'),
(2, 'Swimming Pool', 1, 0, 0, 1, 1, '2018-07-14 00:00:00'),
(3, 'Wifi', 1, 0, 0, 1, 1, '2018-07-14 00:00:00'),
(4, 'test 1', 0, 1, 1, 0, 1, '2018-07-16 00:00:00'),
(5, 'test 2', 0, 1, 1, 0, 1, '2018-07-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_rooms`
--

CREATE TABLE `hotel_rooms` (
  `hotel_room_id` int(11) NOT NULL,
  `room_type_id` int(10) NOT NULL,
  `room_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `room_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `room_location` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `room_description` text COLLATE utf8_unicode_ci NOT NULL,
  `room_facilities` text COLLATE utf8_unicode_ci NOT NULL,
  `room_capacity` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `room_hourly_charge` decimal(12,2) NOT NULL,
  `room_fixed_charge` decimal(12,2) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotel_rooms`
--

INSERT INTO `hotel_rooms` (`hotel_room_id`, `room_type_id`, `room_name`, `room_no`, `room_location`, `room_description`, `room_facilities`, `room_capacity`, `room_hourly_charge`, `room_fixed_charge`, `status`, `created_at`, `modified_at`) VALUES
(1, 1, 'sdg', '123', 'delhi', 'dfgdfgd', 'df', 'df', '123.00', '123.00', 0, '2018-05-25 06:05:11', '2018-05-25 06:05:11'),
(3, 1, 'sdg', '55', 'fhgf', 'fhfdghj', 'fghg', 'ghfg', '2000.00', '45.00', 0, '2018-05-30 07:05:13', '2018-05-30 07:05:13');

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE `user_registration` (
  `user_id` int(11) NOT NULL,
  `auth_type` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Normal,facebook',
  `fname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mob_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `otp` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_expire` timestamp NULL DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`user_id`, `auth_type`, `fname`, `lname`, `email`, `password`, `mob_no`, `otp`, `time_expire`, `is_active`, `created_at`, `status`) VALUES
(1, 'Normal', 'zxvcx', 'sdgfsd', 'kanchan.netmaximus@gmail.com', '123456', NULL, '761152', '0000-00-00 00:00:00', 0, '2018-08-10 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_camp_date`
--
ALTER TABLE `ci_camp_date`
  ADD PRIMARY KEY (`camp_date_id`,`hotel_id`,`camp_id`);

--
-- Indexes for table `ci_camp_discount_rate`
--
ALTER TABLE `ci_camp_discount_rate`
  ADD PRIMARY KEY (`camp_dis_id`,`hotel_id`,`camp_id`,`room_type_id`);

--
-- Indexes for table `ci_dis_camp_name`
--
ALTER TABLE `ci_dis_camp_name`
  ADD PRIMARY KEY (`camp_id`,`vendor_id`);

--
-- Indexes for table `ci_hotels`
--
ALTER TABLE `ci_hotels`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `ci_hotel_photo`
--
ALTER TABLE `ci_hotel_photo`
  ADD PRIMARY KEY (`hotel_photo_id`,`hotel_id`,`room_type_id`);

--
-- Indexes for table `ci_room_photo`
--
ALTER TABLE `ci_room_photo`
  ADD PRIMARY KEY (`room_photo_id`,`hotel_id`,`room_id`);

--
-- Indexes for table `ci_room_type`
--
ALTER TABLE `ci_room_type`
  ADD PRIMARY KEY (`room_type_id`,`hotel_id`);

--
-- Indexes for table `ci_users`
--
ALTER TABLE `ci_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_user_role`
--
ALTER TABLE `ci_user_role`
  ADD PRIMARY KEY (`user_role_id`);

--
-- Indexes for table `ci_vendors`
--
ALTER TABLE `ci_vendors`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `ci_v_assign_role`
--
ALTER TABLE `ci_v_assign_role`
  ADD PRIMARY KEY (`v_assign_role`,`hotel_id`);

--
-- Indexes for table `ci_v_users`
--
ALTER TABLE `ci_v_users`
  ADD PRIMARY KEY (`v_user_id`,`hotel_id`);

--
-- Indexes for table `facility_id`
--
ALTER TABLE `facility_id`
  ADD PRIMARY KEY (`facility_id`);

--
-- Indexes for table `hotel_rooms`
--
ALTER TABLE `hotel_rooms`
  ADD PRIMARY KEY (`hotel_room_id`,`room_type_id`);

--
-- Indexes for table `user_registration`
--
ALTER TABLE `user_registration`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_camp_date`
--
ALTER TABLE `ci_camp_date`
  MODIFY `camp_date_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ci_camp_discount_rate`
--
ALTER TABLE `ci_camp_discount_rate`
  MODIFY `camp_dis_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ci_dis_camp_name`
--
ALTER TABLE `ci_dis_camp_name`
  MODIFY `camp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ci_hotels`
--
ALTER TABLE `ci_hotels`
  MODIFY `hotel_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `ci_hotel_photo`
--
ALTER TABLE `ci_hotel_photo`
  MODIFY `hotel_photo_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ci_room_photo`
--
ALTER TABLE `ci_room_photo`
  MODIFY `room_photo_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ci_room_type`
--
ALTER TABLE `ci_room_type`
  MODIFY `room_type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `ci_users`
--
ALTER TABLE `ci_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ci_user_role`
--
ALTER TABLE `ci_user_role`
  MODIFY `user_role_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ci_vendors`
--
ALTER TABLE `ci_vendors`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ci_v_assign_role`
--
ALTER TABLE `ci_v_assign_role`
  MODIFY `v_assign_role` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ci_v_users`
--
ALTER TABLE `ci_v_users`
  MODIFY `v_user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `facility_id`
--
ALTER TABLE `facility_id`
  MODIFY `facility_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `hotel_rooms`
--
ALTER TABLE `hotel_rooms`
  MODIFY `hotel_room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
