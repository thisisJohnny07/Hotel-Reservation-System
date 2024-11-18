-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 07:34 AM
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
-- Database: `hotelreservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` int(11) NOT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `categoryId`, `description`) VALUES
(1, 1, 'Separate marble shower and bathtub'),
(2, 1, 'Premium Shangri-La toiletries'),
(4, 1, '300-thread count linens'),
(5, 1, 'Hair dryer'),
(6, 1, 'Feather duvet and toppers'),
(7, 1, 'Pillow menu'),
(8, 1, 'Premium L\'Occitane toiletries'),
(9, 1, 'Premium Acqua di Parma toiletries'),
(10, 1, '600-threadcount linen'),
(11, 2, 'Cable TV with international listing'),
(12, 2, '48-inch flatscreen smart TV'),
(13, 3, 'Spacious executive writing desk'),
(14, 3, 'International Direct Dial phone'),
(15, 3, 'Voice mail'),
(16, 3, 'Electronic laptop-size in-room safe'),
(17, 3, 'Bedside lighting controls'),
(18, 4, 'Coffee / tea-making facilities'),
(19, 4, 'Mini-bar'),
(20, 4, 'Nespresso coffee maker');

-- --------------------------------------------------------

--
-- Table structure for table `amenitiescategories`
--

CREATE TABLE `amenitiescategories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `amenitiescategories`
--

INSERT INTO `amenitiescategories` (`id`, `category`) VALUES
(1, 'Bath & Personal Care'),
(2, 'Media & Entertainment'),
(3, 'Office Equipment & Stationery'),
(4, 'Refreshments');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `countryName` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `countryName`) VALUES
(1, 'Afghanistan'),
(2, 'Albania'),
(3, 'Algeria'),
(4, 'American Samoa'),
(5, 'Andorra'),
(6, 'Angola'),
(7, 'Anguilla'),
(8, 'Antarctica'),
(9, 'Antigua and Barbuda'),
(10, 'Argentina'),
(11, 'Armenia'),
(12, 'Aruba'),
(13, 'Australia'),
(14, 'Austria'),
(15, 'Azerbaijan'),
(16, 'Bahamas'),
(17, 'Bahrain'),
(18, 'Bangladesh'),
(19, 'Barbados'),
(20, 'Belarus'),
(21, 'Belgium'),
(22, 'Belize'),
(23, 'Benin'),
(24, 'Bermuda'),
(25, 'Bhutan'),
(26, 'Bolivia'),
(27, 'Bosnia and Herzegovina'),
(28, 'Botswana'),
(29, 'Bouvet Island'),
(30, 'Brazil'),
(31, 'British Indian Ocean Territory'),
(32, 'Brunei Darussalam'),
(33, 'Bulgaria'),
(34, 'Burkina Faso'),
(35, 'Burundi'),
(36, 'Cambodia'),
(37, 'Cameroon'),
(38, 'Canada'),
(39, 'Cape Verde'),
(40, 'Cayman Islands'),
(41, 'Central African Republic'),
(42, 'Chad'),
(43, 'Chile'),
(44, 'China'),
(45, 'Christmas Island'),
(46, 'Cocos (Keeling) Islands'),
(47, 'Colombia'),
(48, 'Comoros'),
(49, 'Congo'),
(50, 'Cook Islands'),
(51, 'Costa Rica'),
(52, 'Croatia (Hrvatska)'),
(53, 'Cuba'),
(54, 'Cyprus'),
(55, 'Czech Republic'),
(56, 'Denmark'),
(57, 'Djibouti'),
(58, 'Dominica'),
(59, 'Dominican Republic'),
(60, 'East Timor'),
(61, 'Ecuador'),
(62, 'Egypt'),
(63, 'El Salvador'),
(64, 'Equatorial Guinea'),
(65, 'Eritrea'),
(66, 'Estonia'),
(67, 'Ethiopia'),
(68, 'Falkland Islands (Malvinas)'),
(69, 'Faroe Islands'),
(70, 'Fiji'),
(71, 'Finland'),
(72, 'France'),
(73, 'France, Metropolitan'),
(74, 'French Guiana'),
(75, 'French Polynesia'),
(76, 'French Southern Territories'),
(77, 'Gabon'),
(78, 'Gambia'),
(79, 'Georgia'),
(80, 'Germany'),
(81, 'Ghana'),
(82, 'Gibraltar'),
(83, 'Guernsey'),
(84, 'Greece'),
(85, 'Greenland'),
(86, 'Grenada'),
(87, 'Guadeloupe'),
(88, 'Guam'),
(89, 'Guatemala'),
(90, 'Guinea'),
(91, 'Guinea-Bissau'),
(92, 'Guyana'),
(93, 'Haiti'),
(94, 'Heard and Mc Donald Islands'),
(95, 'Honduras'),
(96, 'Hong Kong'),
(97, 'Hungary'),
(98, 'Iceland'),
(99, 'India'),
(100, 'Isle of Man'),
(101, 'Indonesia'),
(102, 'Iran (Islamic Republic of)'),
(103, 'Iraq'),
(104, 'Ireland'),
(105, 'Israel'),
(106, 'Italy'),
(107, 'Ivory Coast'),
(108, 'Jersey'),
(109, 'Jamaica'),
(110, 'Japan'),
(111, 'Jordan'),
(112, 'Kazakhstan'),
(113, 'Kenya'),
(114, 'Kiribati'),
(115, 'Korea, Democratic People\'s Republic of'),
(116, 'Korea, Republic of'),
(117, 'Kosovo'),
(118, 'Kuwait'),
(119, 'Kyrgyzstan'),
(120, 'Lao People\'s Democratic Republic'),
(121, 'Latvia'),
(122, 'Lebanon'),
(123, 'Lesotho'),
(124, 'Liberia'),
(125, 'Libyan Arab Jamahiriya'),
(126, 'Liechtenstein'),
(127, 'Lithuania'),
(128, 'Luxembourg'),
(129, 'Macau'),
(130, 'Macedonia'),
(131, 'Madagascar'),
(132, 'Malawi'),
(133, 'Malaysia'),
(134, 'Maldives'),
(135, 'Mali'),
(136, 'Malta'),
(137, 'Marshall Islands'),
(138, 'Martinique'),
(139, 'Mauritania'),
(140, 'Mauritius'),
(141, 'Mayotte'),
(142, 'Mexico'),
(143, 'Micronesia, Federated States of'),
(144, 'Moldova, Republic of'),
(145, 'Monaco'),
(146, 'Mongolia'),
(147, 'Montenegro'),
(148, 'Montserrat'),
(149, 'Morocco'),
(150, 'Mozambique'),
(151, 'Myanmar'),
(152, 'Namibia'),
(153, 'Nauru'),
(154, 'Nepal'),
(155, 'Netherlands'),
(156, 'Netherlands Antilles'),
(157, 'New Caledonia'),
(158, 'New Zealand'),
(159, 'Nicaragua'),
(160, 'Niger'),
(161, 'Nigeria'),
(162, 'Niue'),
(163, 'Norfolk Island'),
(164, 'Northern Mariana Islands'),
(165, 'Norway'),
(166, 'Oman'),
(167, 'Pakistan'),
(168, 'Palau'),
(169, 'Palestine'),
(170, 'Panama'),
(171, 'Papua New Guinea'),
(172, 'Paraguay'),
(173, 'Peru'),
(174, 'Philippines'),
(175, 'Pitcairn'),
(176, 'Poland'),
(177, 'Portugal'),
(178, 'Puerto Rico'),
(179, 'Qatar'),
(180, 'Reunion'),
(181, 'Romania'),
(182, 'Russian Federation'),
(183, 'Rwanda'),
(184, 'Saint Kitts and Nevis'),
(185, 'Saint Lucia'),
(186, 'Saint Vincent and the Grenadines'),
(187, 'Samoa'),
(188, 'San Marino'),
(189, 'Sao Tome and Principe'),
(190, 'Saudi Arabia'),
(191, 'Senegal'),
(192, 'Serbia'),
(193, 'Seychelles'),
(194, 'Sierra Leone'),
(195, 'Singapore'),
(196, 'Slovakia'),
(197, 'Slovenia'),
(198, 'Solomon Islands'),
(199, 'Somalia'),
(200, 'South Africa'),
(201, 'South Georgia South Sandwich Islands'),
(202, 'Spain'),
(203, 'Sri Lanka'),
(204, 'St. Helena'),
(205, 'St. Pierre and Miquelon'),
(206, 'Sudan'),
(207, 'Suriname'),
(208, 'Svalbard and Jan Mayen Islands'),
(209, 'Swaziland'),
(210, 'Sweden'),
(211, 'Switzerland'),
(212, 'Syrian Arab Republic'),
(213, 'Taiwan'),
(214, 'Tajikistan'),
(215, 'Tanzania, United Republic of'),
(216, 'Thailand'),
(217, 'Togo'),
(218, 'Tokelau'),
(219, 'Tonga'),
(220, 'Trinidad and Tobago'),
(221, 'Tunisia'),
(222, 'Turkey'),
(223, 'Turkmenistan'),
(224, 'Turks and Caicos Islands'),
(225, 'Tuvalu'),
(226, 'Uganda'),
(227, 'Ukraine'),
(228, 'United Arab Emirates'),
(229, 'United Kingdom'),
(230, 'United States'),
(231, 'United States minor outlying islands'),
(232, 'Uruguay'),
(233, 'Uzbekistan'),
(234, 'Vanuatu'),
(235, 'Vatican City State'),
(236, 'Venezuela'),
(237, 'Vietnam'),
(238, 'Virgin Islands (British)'),
(239, 'Virgin Islands (U.S.)'),
(240, 'Wallis and Futuna Islands'),
(241, 'Western Sahara'),
(242, 'Yemen'),
(243, 'Zaire'),
(244, 'Zambia'),
(245, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `featureName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `featureName`) VALUES
(1, '45-47 sqm / 484-505 sqf'),
(2, 'Sweeping city views'),
(3, 'Luxurious marble bathroom'),
(4, 'Separate shower cubicle, deluxe tub'),
(5, 'Shangri-La bathrobes and towels'),
(6, 'High-speed Wi-Fi or broadband'),
(7, 'Iron and ironing board'),
(8, 'Panoramic city views'),
(9, 'Access to the Horizon Club Lounge'),
(10, '93 sqm / 1,000 sqf'),
(11, 'Separate bedroom'),
(12, '110 sqm / 1,184 sqf'),
(13, 'Separate living and dining areas'),
(14, '143 sqm / 1,539 sqf'),
(15, '239 sqm / 2,573 sqf'),
(16, 'Acqua Di Parma bath amenities'),
(17, '138 sqm / 1,485 sqf'),
(18, '155 sqm / 1,668 sqf'),
(19, '90 sqm / 968 sqf');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `roomId` int(11) NOT NULL,
  `image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `roomId`, `image`) VALUES
(91, 1, 'Room-1-0.jpg'),
(92, 1, 'Room-1-1.jpg'),
(93, 2, 'Room-2-0.jpg'),
(94, 2, 'Room-2-1.jpg'),
(95, 5, 'Room-5-0.jpg'),
(96, 6, 'Room-6-0.jpg'),
(97, 7, 'Room-7-0.jpg'),
(98, 7, 'Room-7-1.jpg'),
(99, 7, 'Room-7-2.jpg'),
(100, 8, 'Room-8-0.png'),
(101, 8, 'Room-8-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `firstName` varchar(35) DEFAULT NULL,
  `lastName` varchar(35) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `dateCreated` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `firstName`, `lastName`, `email`, `phone`, `password`, `dateCreated`) VALUES
(1, 'John', 'Seguma', 'thisisjohnrey@gmail.com', 2147483647, '02b1be0d48924c327124732726097157', '2024-05-14'),
(6, 'Jane', 'Doe', 'jane@gmail.com', 2147483647, 'd8578edf8458ce06fbc5bb76a58c5ca4', '2024-05-15'),
(7, 'Jenezel Mae', 'Seguma', 'mae@gmail.com', 2147483647, 'd8578edf8458ce06fbc5bb76a58c5ca4', '2024-05-23'),
(8, 'John', 'Seguma', 'thisisjohnrey@gmail.com', 2147483647, '827ccb0eea8a706c4c34a16891f84e7b', '2024-05-23');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `roomId` int(11) DEFAULT NULL,
  `adult` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `photo` varchar(15) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `rate` int(11) DEFAULT NULL,
  `availableRoom` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `title`, `roomId`, `adult`, `children`, `points`, `photo`, `start`, `end`, `rate`, `availableRoom`, `status`) VALUES
(3, 'Flexible Rate (King)', 2, 2, 2, 322, 'offer-3.jpg', '2024-05-16 23:26:00', '2024-06-16 23:27:00', 20000, 1, 0),
(4, 'Members Online Exclusive Rate (Twin)', 1, 5, 2, 324, 'offer-4.jpg', '2024-06-17 00:14:00', '2024-06-17 00:15:00', 18700, 2, 0),
(5, 'Members Online Exclusive Rate (King)', 1, 5, 1, 345, 'offer-5.png', '2024-05-18 00:16:00', '2024-06-18 00:16:00', 18700, 5, 0),
(6, 'Members Online Exclusive Rate (King)', 5, 2, 2, 356, 'offer-6.jpg', '2024-05-20 00:16:00', '2024-05-27 00:17:00', 23400, 4, 0),
(8, 'Members Online Exclusive Rate (King)', 6, 4, 2, 432, 'offer-8.jpg', '2024-05-20 00:19:00', '2024-06-03 00:19:00', 24600, 1, 0),
(9, 'Members Online Exclusive Rate (King & Twin)', 7, 2, 2, 500, 'offer-9.jpg', '2024-05-21 22:30:00', '2024-05-22 22:30:00', 33000, 2, 0),
(10, 'Flexible Rate (King & Twin)', 8, 2, 2, 234, 'offer-10.jpg', '2024-05-17 22:33:00', '2024-05-20 22:33:00', 33222, 2, 0),
(11, 'Bed and Breakfast (King)', 7, 2, 2, 654, 'offer-11.jpg', '2024-07-01 22:57:00', '2024-07-31 22:57:00', 21000, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `memberId` int(11) NOT NULL,
  `offerId` int(11) NOT NULL,
  `checkIn` date DEFAULT NULL,
  `checkOut` date DEFAULT NULL,
  `accessibility` int(11) DEFAULT NULL,
  `purpose` varchar(30) DEFAULT NULL,
  `arrival` time DEFAULT NULL,
  `specialRequest` varchar(300) DEFAULT NULL,
  `numberOfRoom` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `memberId`, `offerId`, `checkIn`, `checkOut`, `accessibility`, `purpose`, `arrival`, `specialRequest`, `numberOfRoom`, `status`) VALUES
(10, 6, 3, '2024-05-25', '2024-05-26', 0, '', '00:00:00', '', 2, 1),
(11, 6, 10, '2024-05-19', '2024-05-20', 0, '', '00:00:00', '', 3, 0),
(12, 6, 8, '2024-05-21', '2024-05-22', 0, '', '00:00:00', '', 1, 1),
(13, 6, 3, '2024-05-25', '2024-05-26', 1, 'Leisure', '14:40:00', 'Put me in a room where there is balcony to see the city', 1, 1),
(14, 8, 9, '2024-05-22', '2024-05-23', 0, '', '00:00:00', '', 1, 1),
(15, 8, 6, '2024-05-24', '2024-05-25', 0, '', '00:00:00', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roomamenities`
--

CREATE TABLE `roomamenities` (
  `id` int(11) NOT NULL,
  `roomId` int(11) NOT NULL,
  `amenitiesId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roomamenities`
--

INSERT INTO `roomamenities` (`id`, `roomId`, `amenitiesId`) VALUES
(1, 1, 1),
(2, 1, 11),
(3, 1, 15),
(4, 1, 14),
(5, 1, 19),
(6, 1, 20),
(15, 2, 16),
(16, 2, 13),
(17, 2, 14),
(20, 5, 10),
(21, 5, 11),
(22, 5, 15),
(23, 5, 18),
(24, 6, 9),
(25, 6, 10),
(26, 6, 20),
(27, 7, 15),
(28, 8, 5),
(29, 8, 11),
(30, 8, 13),
(31, 8, 17),
(32, 8, 20);

-- --------------------------------------------------------

--
-- Table structure for table `roomcategories`
--

CREATE TABLE `roomcategories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roomcategories`
--

INSERT INTO `roomcategories` (`id`, `category`) VALUES
(1, 'Rooms'),
(2, 'Horizon Club'),
(3, 'Suites'),
(4, 'Connecting Rooms');

-- --------------------------------------------------------

--
-- Table structure for table `roomfeatures`
--

CREATE TABLE `roomfeatures` (
  `id` int(11) NOT NULL,
  `roomId` int(11) NOT NULL,
  `featureId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roomfeatures`
--

INSERT INTO `roomfeatures` (`id`, `roomId`, `featureId`) VALUES
(1, 1, 12),
(2, 1, 18),
(4, 2, 8),
(5, 2, 13),
(7, 2, 2),
(11, 5, 12),
(12, 5, 19),
(13, 6, 14),
(14, 6, 5),
(15, 7, 5),
(16, 7, 2),
(17, 8, 12),
(18, 8, 11),
(19, 8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `roomName` varchar(60) NOT NULL,
  `titleHeader` varchar(60) NOT NULL,
  `description` varchar(500) NOT NULL,
  `childrenMealPlan` varchar(500) DEFAULT NULL,
  `roomCategoryId` int(11) DEFAULT NULL,
  `camera360` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `roomName`, `titleHeader`, `description`, `childrenMealPlan`, `roomCategoryId`, `camera360`) VALUES
(1, 'Deluxe', 'Spacious comfort with stylish interiors', 'Deluxe Rooms are well-appointed and spacious, with elegant contemporary décor in light hues, coupled with panoramic views of the city.', '<p>Shangri-La Circle members: When accompanied by an adult dining in, up to 2 children of registered in-house hotel guests at the age of 6 and below can enjoy buffet meals at the High Street Cafe at no additional charge. Additional children at the age of 6 and below and all children who are above 6 years of age but under 12 years of age will receive a 50% discount on the adult buffet price.<br></p>', 1, 'https://momento360.com/e/u/2f42ba194f01404b9a0bbd4c100e09b7?utm_campaign=embed&utm_source=other&heading=0&pitch=0&field-of-view=75&size=medium&display-plan=true'),
(2, 'Deluxe High Street View Room', 'Luxurious bedrooms with spectacular views', 'With the refined décor and breathtaking floor-to-ceiling windows in the Deluxe High Street View Rooms, it kindles a welcoming feel during a leisure stay.', 'Shangri-La Circle members: When accompanied by an adult dining in, up to 2 children of registered in-house hotel guests at the age of 6 and below can enjoy buffet meals at the High Street Cafe at no additional charge. Additional children at the age of 6 and below and all children who are above 6 years of age but under 12 years of age will receive a 50% discount on the adult buffet price.', 1, 'https://momento360.com/e/u/47cb4a3aee9d42198a700cb38f416f9b?utm_campaign=embed&utm_source=other&heading=0&pitch=0&field-of-view=75&size=medium&display-plan=true'),
(5, 'Horizon Deluxe', 'Spectacular views and personalised privileges', 'Horizon Deluxe Rooms feature spacious interiors and contemporary décor in natural, cool colours, and with exclusive privileges at the Horizon Club Lounge on Level 40. These rooms are ideal for guests who require seamless service and enhanced privileges when travelling for business or leisure.', 'Shangri-La Circle members: When accompanied by an adult dining in, up to 2 children of registered in-house hotel guests at the age of 6 and below can enjoy buffet meals at the High Street Cafe at no additional charge. Additional children at the age of 6 and below and all children who are above 6 years of age but under 12 years of age will receive a 50% discount on the adult buffet price.', 2, 'https://momento360.com/e/u/5969cb040a3849efa6713e45de8884d2?utm_campaign=embed&utm_source=other&heading=0&pitch=0&field-of-view=75&size=medium&display-plan=true'),
(6, 'Executive Suite', 'Contemporary luxury with sweeping city views', 'The Executive Suite offers additional space, contemporary comforts, and an exceptional view ideal for the discerning traveller.', 'Shangri-La Circle members: When accompanied by an adult dining in, up to 2 children of registered in-house hotel guests at the age of 6 and below can enjoy buffet meals at the High Street Cafe at no additional charge. Additional children at the age of 6 and below and all children who are above 6 years of age but under 12 years of age will receive a 50% discount on the adult buffet price.', 3, 'https://momento360.com/e/u/81d61bc695d145a8a313d96e1c526770?utm_campaign=embed&utm_source=other&heading=0&pitch=0&field-of-view=75&size=medium&display-plan=true'),
(7, 'Executive Suite with Adjoining Deluxe', 'Contemporary luxury set amidst the vibrant city', 'The Executive Suite connected to a well-appointed Deluxe Room offers a premier haven of contemporary comforts, warm interiors, and luxurious amenities. Both units present arresting panoramic views of stunning Bonifacio Global City for a bustling yet relaxing respite. This room type can accommodate 2 adults per room and 2 children 12 years old and below. An additional charge will be implemented on the sixth person occupying the room.', 'Shangri-La Circle members: When accompanied by an adult dining in, up to 2 children of registered in-house hotel guests at the age of 6 and below can enjoy buffet meals at the High Street Cafe at no additional charge. Additional children at the age of 6 and below and all children who are above 6 years of age but under 12 years of age will receive a 50% discount on the adult buffet price.', 4, 'https://momento360.com/e/u/2f42ba194f01404b9a0bbd4c100e09b7?utm_campaign=embed&utm_source=other&heading=0&pitch=0&field-of-view=75&size=medium&display-plan=true'),
(8, 'Premier Suite with Adjoining Deluxe', 'Sophisticated luxury for the discerning urbanite', 'Combine business with pleasure set in the refined luxury of our Premier Suites adjoined to a well-appointed Deluxe Room. This room type can accommodate 2 adults per room and 2 children 12 years old below. An additional charge will be implemented on the sixth person occupying the room.', 'Shangri-La Circle members: When accompanied by an adult dining in, up to 2 children of registered in-house hotel guests at the age of 6 and below can enjoy buffet meals at the High Street Cafe at no additional charge. Additional children at the age of 6 and below and all children who are above 6 years of age but under 12 years of age will receive a 50% discount on the adult buffet price.', 4, 'https://momento360.com/e/u/81d61bc695d145a8a313d96e1c526770?utm_campaign=embed&utm_source=other&heading=0&pitch=0&field-of-view=75&size=medium&display-plan=true');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `content`, `photo`) VALUES
(6, 'Free Shipping', 'Enjoy free shipping inside US.', 'service-6.png'),
(7, 'Fast Shippin', 'Items are shipped within 24 hours.', 'service-7.png'),
(8, 'Satisfaction Guarantee', 'We guarantee you with our quality satisfaction.', 'service-8.png'),
(11, 'Lorem', 'Lorem', 'service-11.png');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `buttonText` varchar(255) DEFAULT NULL,
  `buttonUrl` varchar(255) DEFAULT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `photo`, `heading`, `content`, `buttonText`, `buttonUrl`, `position`) VALUES
(5, 'slider-5.jpg', 'Shangrila Cutie', 'Shangrila Cutie Shangrila Cutie Shangrila Cutie', 'Learn More', 'index.php', 'Center'),
(6, 'slider-6.jpg', 'Food Cutie', 'Food Cutie Food Cutie Food Cutie', 'Learn More', 'booking.php', 'Left'),
(7, 'slider-7.jpg', 'China Yern', 'China Yern China Yern China Yern China Yern', 'Learn More', 'room.php', 'Center');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(11) NOT NULL,
  `socialName` varchar(255) DEFAULT NULL,
  `socialUrl` varchar(255) DEFAULT NULL,
  `socialIcon` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `socialName`, `socialUrl`, `socialIcon`) VALUES
(1, 'Facebook', 'https://www.facebook.com/#', 'fa fa-facebook'),
(2, 'Twitter', 'https://www.twitter.com/#', 'fa fa-twitter'),
(3, 'LinkedIn', '', 'fa fa-linkedin'),
(4, 'Google Plus', '', 'fa fa-google-plus'),
(5, 'Pinterest', '', 'fa fa-pinterest'),
(6, 'YouTube', 'https://www.youtube.com/#', 'fa fa-youtube'),
(7, 'Instagram', 'https://www.instagram.com/#', 'fa fa-instagram'),
(8, 'Tumblr', '', 'fa fa-tumblr'),
(9, 'Flickr', '', 'fa fa-flickr'),
(10, 'Reddit', '', 'fa fa-reddit'),
(11, 'Snapchat', '', 'fa fa-snapchat'),
(12, 'WhatsApp', 'https://www.whatsapp.com/#', 'fa fa-whatsapp'),
(13, 'Quora', '', 'fa fa-quora'),
(14, 'StumbleUpon', '', 'fa fa-stumbleupon'),
(15, 'Delicious', '', 'fa fa-delicious'),
(16, 'Digg', '', 'fa fa-digg');

-- --------------------------------------------------------

--
-- Table structure for table `temporaryreservations`
--

CREATE TABLE `temporaryreservations` (
  `id` int(11) NOT NULL,
  `memberId` int(11) NOT NULL,
  `offerId` int(11) NOT NULL,
  `checkIn` date NOT NULL,
  `checkOut` date NOT NULL,
  `accessibility` int(11) NOT NULL,
  `purpose` varchar(30) NOT NULL,
  `arrival` time NOT NULL,
  `specialRequest` varchar(300) NOT NULL,
  `numberOfRoom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temporaryreservations`
--

INSERT INTO `temporaryreservations` (`id`, `memberId`, `offerId`, `checkIn`, `checkOut`, `accessibility`, `purpose`, `arrival`, `specialRequest`, `numberOfRoom`) VALUES
(13, 6, 10, '2024-05-19', '2024-05-20', 0, '', '00:00:00', '', 3),
(14, 6, 8, '2024-05-21', '2024-05-22', 0, '', '00:00:00', '', 1),
(15, 6, 3, '2024-05-25', '2024-05-26', 1, 'Leisure', '14:40:00', 'Put me in a room where there is balcony to see the city', 1),
(16, 8, 9, '2024-05-22', '2024-05-23', 0, '', '00:00:00', '', 1),
(17, 8, 6, '2024-05-24', '2024-05-25', 0, '', '00:00:00', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `full_name`, `email`, `phone`, `password`, `photo`, `role`, `status`) VALUES
(1, 'Administrator', 'admin@mail.com', '10101010101', 'd00f5d5217896fb7fd601412cb890830', 'user-1.png', 'Super Admin', 'Active'),
(2, 'Christine', 'christine@mail.com', '4444444444', '81dc9bdb52d04dc20036dbd8313ed055', 'user-13.jpg', 'Admin', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amenitiescategories`
--
ALTER TABLE `amenitiescategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomamenities`
--
ALTER TABLE `roomamenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomcategories`
--
ALTER TABLE `roomcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomfeatures`
--
ALTER TABLE `roomfeatures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temporaryreservations`
--
ALTER TABLE `temporaryreservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `amenitiescategories`
--
ALTER TABLE `amenitiescategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `roomamenities`
--
ALTER TABLE `roomamenities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `roomcategories`
--
ALTER TABLE `roomcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roomfeatures`
--
ALTER TABLE `roomfeatures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `temporaryreservations`
--
ALTER TABLE `temporaryreservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
