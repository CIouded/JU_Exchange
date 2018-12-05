-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 14 nov 2018 kl 11:06
-- Serverversion: 10.1.36-MariaDB
-- PHP-version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `exchange_2`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `city`
--

CREATE TABLE `city` (
  `Id` int(11) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `Country_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `city`
--

INSERT INTO `city` (`Id`, `city`, `country`, `Country_Id`) VALUES
(1, 'Jönköping', 'Sweden', 1),
(2, 'Salzburg', 'Austria', 4),
(3, 'Graz', 'Austria', 4),
(4, 'Sofia', 'Bulgaria', 5),
(5, 'Ostrava', 'Poruba', 6),
(6, 'Tallinn', 'Estonia', 7),
(7, 'Metropolia', 'Finland', 8),
(8, 'Turku', 'Finland', 8),
(9, 'Villejuif', 'France', 9),
(10, 'Le Kremlin-Bicêtre', 'France', 9),
(11, 'Troyes', 'France', 9),
(12, 'Kiel', 'Germany', 10),
(13, 'Aalen', 'Germany', 10),
(14, 'Bremen', 'Germany', 10),
(15, 'Esslingen am Neckar', 'Germany', 10),
(16, 'Stuttgart', 'Germany', 10),
(17, 'Regensburg', 'Germany', 10),
(18, 'Rostock', 'Germany', 10),
(19, 'Miskolc', 'Hungary', 11),
(20, 'Bologna', 'Italy', 12),
(21, 'Trento', 'Italy', 12),
(22, '?ód?', 'Poland', 13),
(23, 'Porto', 'Portugal', 14),
(24, 'Oviedo, Asturias', 'Spain', 15),
(25, 'Madrid', 'Spain', 15),
(26, 'Jaén', 'Spain', 15),
(27, 'Basel', 'Switzerland', 16),
(28, 'Urla/?zmir', 'Turkey', 17),
(29, 'Orhanli/Tuzla/?stanbul', 'Turkey', 17),
(30, 'Edinburgh', 'UK', 18),
(31, 'München', 'Germany', 10),
(32, 'Heidelberg', 'Germany', 10),
(33, 'Berlin', 'Germany', 10),
(34, 'Aachen', 'Germany', 10),
(35, 'Dresden', 'Germany', 10),
(36, 'Fulda', 'Germany', 10),
(37, 'Bielefeld', 'Germany', 10),
(38, 'Freiburg im Breisgau', 'Germany', 10),
(39, 'Hannover', 'Germany', 10),
(40, 'Kaiserslautern', 'Germany', 10),
(41, 'Konstanz', 'Germany', 10),
(42, 'Mannheim', 'Germany', 10),
(43, 'Chemnitz', 'Germany', 10),
(44, 'Ilmenau', 'Germany', 10),
(45, 'Augsburg', 'Germany', 10),
(46, 'Bayreuth', 'Germany', 10),
(47, 'Stuttgart', 'Germany', 10),
(48, 'Saarbrücken', 'Germany', 10),
(49, 'Paderborn', 'Germany', 10),
(50, 'Passau', 'Germany', 10),
(51, 'Weimar', 'Germany', 10),
(52, 'Heilbronn', 'Germany', 10),
(53, 'Hof', 'Germany', 10),
(54, 'Leeuwarden', 'Netherlands', 2),
(55, 'Nijmegen', 'Netherlands', 2),
(56, 'Eindhoven', 'Netherlands', 2),
(57, 'Haarlem', 'Netherlands', 2),
(58, '\'s-Hertogenbosch', 'Netherlands', 2),
(59, 'Velp', 'Netherlands', 2),
(60, 'Deventer', 'Netherlands', 2),
(61, 'Amsterdam', 'Netherlands', 2),
(62, 'The Hague', 'Netherlands', 2),
(63, 'Groningen', 'Netherlands', 2),
(64, 'Vlissingen', 'Netherlands', 2),
(65, 'Zwolle', 'Netherlands', 2),
(66, 'Woncheon-dong, Yeongtong-gu, Suwon-si, Gyeonggi-do', 'South Korea', 20),
(67, 'Seongbuk-gu, Seoul', 'Korea', 21),
(68, 'Hong Kong', 'China', 22),
(69, 'Changzhou, Jiangsu', 'China', 22),
(70, 'Santo Domingo', 'República Dominicana', 23),
(71, 'Chennai', 'India', 24),
(72, 'Monterey, Nuevo Leon', 'Mexico', 25),
(73, NULL, 'México D.F.', 26),
(74, 'Risskov', 'Denmark', 28),
(75, 'Fayetteville', 'USA', 3),
(76, 'Lawrence', 'USA', 3),
(77, 'Athens', 'USA', 3),
(78, 'Mankato', 'USA', 3),
(79, 'Minneapolis', 'USA', 3),
(80, 'Houghton', 'USA', 3),
(81, 'East Lansing', 'USA', 3),
(82, 'Carbondale', 'USA', 3),
(83, 'Pasadena', 'USA', 3),
(84, 'Fresno', 'USA', 3),
(85, 'Fullerton', 'USA', 3),
(86, 'Long Beach', 'USA', 3),
(87, 'Los Angeles', 'USA', 3),
(88, 'Northridge', 'USA', 3),
(89, 'Irvine', 'USA', 3),
(90, 'Riverside', 'USA', 3),
(91, 'San Diego', 'USA', 3),
(92, 'Santa Barbara', 'USA', 3),
(93, 'Santa Cruz', 'USA', 3),
(94, 'Berkeley', 'USA', 3),
(95, 'San Francisco', 'USA', 3),
(96, 'Newark', 'USA', 3),
(97, 'St Andrews', 'UK', 18),
(98, 'Birmingham', 'UK', 18),
(99, 'London', 'UK', 18),
(100, 'Manchester', 'UK', 18),
(101, 'Glasgow', 'UK', 18),
(102, 'Southhampton', 'UK', 18),
(103, 'Nottingham', 'UK', 18),
(104, 'Guildford', 'UK', 18),
(105, 'Bath', 'UK', 18),
(106, 'Leeds', 'UK', 18),
(107, 'Sheffield', 'UK', 18),
(108, 'Bristol', 'UK', 18),
(109, 'Kingston upon Thames', 'UK', 18),
(110, 'Loughborough', 'UK', 18),
(111, 'Brighton', 'UK', 18),
(112, 'Dublin', 'Ireland', 29),
(113, 'Co Kildare', 'Ireland', 29),
(114, 'Galway', 'Ireland', 29),
(115, 'Cork', 'Ireland', 29),
(116, 'Limerick', 'Ireland', 29),
(117, 'Adelaide', 'Australia', 30),
(118, 'Melbourne', 'Australia', 30),
(119, 'Brisbane', 'Australia', 30),
(120, 'Victoria', 'Canada', 31),
(121, 'Mt Helen', 'Australia', 30),
(122, 'Charlottetown', 'Canada', 31),
(123, 'Burnaby', 'Canada', 31);

-- --------------------------------------------------------

--
-- Tabellstruktur `country`
--

CREATE TABLE `country` (
  `Id` int(11) NOT NULL,
  `country` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `country`
--

INSERT INTO `country` (`Id`, `country`) VALUES
(1, 'Sweden'),
(2, 'Netherlands'),
(3, 'USA'),
(4, 'Austria'),
(5, 'Bulgaria'),
(6, 'Poruba'),
(7, 'Estonia'),
(8, 'Finland'),
(9, 'France'),
(10, 'Germany'),
(11, 'Hungary'),
(12, 'Italy'),
(13, 'Poland'),
(14, 'Portugal'),
(15, 'Spain'),
(16, 'Switzerland'),
(17, 'Turkey'),
(18, 'UK'),
(20, 'South Korea'),
(21, 'Korea'),
(22, 'China'),
(23, 'República Dominicana'),
(24, 'India'),
(25, 'Mexico'),
(26, 'México D.F.'),
(27, 'Singapore'),
(28, 'Denmark'),
(29, 'Ireland'),
(30, 'Australia'),
(31, 'Canada');

-- --------------------------------------------------------

--
-- Tabellstruktur `course`
--

CREATE TABLE `course` (
  `Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `credits` int(11) DEFAULT NULL,
  `programme` varchar(255) DEFAULT NULL,
  `university` varchar(255) DEFAULT NULL,
  `Faculty_Id` int(11) DEFAULT NULL,
  `Programme_idProgramme` int(11) DEFAULT NULL,
  `Level_Id` int(11) DEFAULT NULL,
  `University_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `course`
--

INSERT INTO `course` (`Id`, `name`, `description`, `credits`, `programme`, `university`, `Faculty_Id`, `Programme_idProgramme`, `Level_Id`, `University_Id`) VALUES
(241, 'Elective Course in Computer Science (ENG/SWE)', NULL, 8, NULL, NULL, 1, 1, 1, 142),
(242, 'Economy and Business (SWE)', NULL, 8, NULL, NULL, 1, 1, 1, 142),
(344, 'Research Methods in Computer Science and Informatics (SWE)', NULL, 8, NULL, NULL, 1, 1, 1, 142),
(345, 'Elective Course in Computer Science (ENG/SWE)', NULL, 8, NULL, NULL, 1, 2, 1, 142),
(346, 'Economy and Business (SWE)', NULL, 8, NULL, NULL, 1, 2, 1, 142),
(347, 'Research Methods in Computer Science and Informatics (SWE)', NULL, 8, NULL, NULL, 1, 2, 1, 142),
(348, 'Motion Graphics (ENG) - Elective (Very flexible)', NULL, 8, NULL, NULL, 1, 3, 1, 142),
(349, 'Server-side Programming (ENG) - Elective (Very flexible)', NULL, 8, NULL, NULL, 1, 3, 1, 142),
(350, 'Digital Marketing and Social Media (ENG) - Elective (Very flexible)', NULL, 8, NULL, NULL, 1, 3, 1, 142),
(351, 'Portfolio and Visual Presentation (ENG) - Elective (Very flexible)', NULL, 8, NULL, NULL, 1, 3, 1, 142),
(352, 'IT Service Management (ENG)', NULL, 8, NULL, NULL, 1, 4, 1, 142),
(353, 'Elective e.g. Wireless Networks (ENG)', NULL, 8, NULL, NULL, 1, 4, 1, 142),
(354, 'Information Security (SWE)', NULL, 8, NULL, NULL, 1, 3, 1, 142),
(355, 'Elective e.g. IT Architecture (SWE)', NULL, 8, NULL, NULL, 1, 3, 1, 142),
(356, 'Industrial Placement Course (Two options presented)', NULL, 9, NULL, NULL, 1, 5, 2, 142),
(357, 'User Experience Design - Elective', NULL, 6, NULL, NULL, 1, 5, 2, 142),
(358, 'Cloud Computing and Data Analytics - Elective', NULL, 6, NULL, NULL, 1, 5, 2, 142),
(359, 'Product Specification and Requirements Management', NULL, 6, NULL, NULL, 1, 5, 2, 142),
(360, 'Product Development in Cross-Discipline Teams - 2 (cont.)', NULL, 9, NULL, NULL, 1, 5, 2, 142),
(361, 'Industrial Placement Course (Two options presented)', NULL, 9, NULL, NULL, 1, 6, 2, 142),
(362, 'Software Engineering a Product Perspective - Elective', NULL, 6, NULL, NULL, 1, 6, 2, 142),
(363, 'Cloud Computing and Data Analytics - Elective', NULL, 6, NULL, NULL, 1, 6, 2, 142),
(364, 'Product Specification and Requirements Management', NULL, 6, NULL, NULL, 1, 6, 2, 142),
(365, 'Product Development in Cross-Discipline Teams - 2 (cont.)', NULL, 9, NULL, NULL, 1, 6, 2, 142),
(366, 'hello', NULL, NULL, 'Software Development and Mobile Platforms', 'Fachhochschule Salzburg', NULL, NULL, NULL, NULL),
(367, 'Test Course1', NULL, NULL, NULL, 'EPITECH', NULL, NULL, 1, 10),
(368, 'Test Course 2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 10);

-- --------------------------------------------------------

--
-- Tabellstruktur `course_package`
--

CREATE TABLE `course_package` (
  `id` int(11) NOT NULL,
  `Package_Id` int(11) NOT NULL,
  `Course_Id` int(11) NOT NULL,
  `University_Id` int(11) NOT NULL,
  `Package_title` varchar(255) NOT NULL,
  `Course_name` varchar(255) DEFAULT NULL,
  `Pu_Id` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `course_package`
--

INSERT INTO `course_package` (`id`, `Package_Id`, `Course_Id`, `University_Id`, `Package_title`, `Course_name`, `Pu_Id`) VALUES
(42, 30, 367, 1, 'Hello world', 'Test Course1', 10),
(43, 30, 367, 1, 'Hello world', 'Test Course1', 10),
(44, 30, 368, 1, 'Hello world', 'Test Course 2', 10),
(45, 30, 368, 1, 'Hello world', 'Test Course 2', 10),
(46, 31, 367, 1, 'Package 1', 'Test Course1', 10),
(47, 31, 368, 1, 'Package 1', 'Test Course 2', 10),
(48, 31, 367, 1, 'Package 1', 'Test Course1', 10),
(49, 32, 367, 1, 'Package 1', 'Test Course1', 10),
(50, 32, 367, 1, 'Package 1', 'Test Course1', 10),
(51, 32, 368, 1, 'Package 1', 'Test Course 2', 10),
(52, 33, 367, 1, 'Hello world', 'Test Course1', 10),
(54, 33, 368, 1, 'Hello world', 'Test Course 2', 10);

-- --------------------------------------------------------

--
-- Tabellstruktur `faculty`
--

CREATE TABLE `faculty` (
  `Id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `university` varchar(255) DEFAULT NULL,
  `University_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `faculty`
--

INSERT INTO `faculty` (`Id`, `name`, `university`, `University_Id`) VALUES
(1, 'School of Engineering', 'Jönköping University', 142),
(3, 'we', 'EPITECH', 10);

-- --------------------------------------------------------

--
-- Tabellstruktur `level`
--

CREATE TABLE `level` (
  `Id` int(11) NOT NULL,
  `level` varchar(46) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `level`
--

INSERT INTO `level` (`Id`, `level`) VALUES
(1, 'Bachelor'),
(2, 'Master');

-- --------------------------------------------------------

--
-- Tabellstruktur `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumpning av Data i tabell `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_04_10_112625_create_roles_table', 1),
(4, '2018_04_10_112948_create_role_user_table', 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `package`
--

CREATE TABLE `package` (
  `Id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `home_university` varchar(45) DEFAULT NULL,
  `partner_university` varchar(255) DEFAULT NULL,
  `programme` varchar(45) DEFAULT NULL,
  `match_value` int(10) DEFAULT NULL,
  `programme_Id` int(11) DEFAULT NULL,
  `university_Id` int(11) NOT NULL,
  `pu_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `package`
--

INSERT INTO `package` (`Id`, `title`, `description`, `home_university`, `partner_university`, `programme`, `match_value`, `programme_Id`, `university_Id`, `pu_Id`) VALUES
(33, 'Hello world', 'test plan', 'Jönköping University', 'EPITECH', '5', 8, 5, 142, 10);

-- --------------------------------------------------------

--
-- Tabellstruktur `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur `programme`
--

CREATE TABLE `programme` (
  `Id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `level` varchar(45) DEFAULT NULL,
  `faculty` varchar(45) DEFAULT NULL,
  `university` varchar(255) NOT NULL,
  `Faculty_Id` int(11) DEFAULT NULL,
  `Level_Id` int(11) DEFAULT NULL,
  `University_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `programme`
--

INSERT INTO `programme` (`Id`, `title`, `description`, `level`, `faculty`, `university`, `Faculty_Id`, `Level_Id`, `University_Id`) VALUES
(1, 'Embedded Systems', NULL, 'Bachelor', 'School of Engineering', '', 1, 1, 142),
(2, 'Software Development and Mobile Platforms', NULL, 'Bachelor', 'School of Engineering', '', 1, 1, 142),
(3, 'New Media Design', NULL, 'Bachelor', 'School of Engineering', '', 1, 1, 142),
(4, 'IT-Infrastructure and Network Design', NULL, 'Bachelor', 'School of Engineering', '', 1, 1, 142),
(5, 'Software Product Engineering', NULL, 'Master', 'School of Engineering', '', 1, 2, 142),
(6, 'User Experience Design and IT Architecture', NULL, 'Master', 'School of Engineering', '', 1, 2, 142),
(7, 'Test programme', 'Hello', 'Bachelor', 'we', 'B C Institute of Technology', NULL, NULL, 142);

-- --------------------------------------------------------

--
-- Tabellstruktur `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumpning av Data i tabell `roles`
--

INSERT INTO `roles` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Staff_user', 'A staff user', '2018-04-10 10:12:37', '2018-04-10 10:12:37'),
(2, 'Programme_manager', 'A programme manager', '2018-04-10 10:12:37', '2018-04-10 10:12:37'),
(3, 'Admin_user', 'A system administrator', '2018-04-10 10:12:37', '2018-04-10 10:12:37'),
(4, 'Super_admin', 'A super admin', '2018-04-10 10:12:37', '2018-04-10 10:12:37'),
(5, 'IR_user', 'International relations user', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellstruktur `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumpning av Data i tabell `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(11, 4, 9),
(12, 5, 10);

-- --------------------------------------------------------

--
-- Tabellstruktur `university`
--

CREATE TABLE `university` (
  `Id` int(11) NOT NULL,
  `name` varchar(80) DEFAULT NULL,
  `accepting_nr` int(100) DEFAULT NULL,
  `phone` longtext,
  `address` varchar(80) DEFAULT NULL,
  `postal_code` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `longitude` varchar(25) DEFAULT NULL,
  `latitude` varchar(25) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `City_Id` int(11) DEFAULT NULL,
  `Country_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `university`
--

INSERT INTO `university` (`Id`, `name`, `accepting_nr`, `phone`, `address`, `postal_code`, `country`, `longitude`, `latitude`, `city`, `City_Id`, `Country_Id`) VALUES
(1, 'Fachhochschule Salzburg', 5, NULL, 'Urstein Süd 1', '5412', 'Austria', '123123', '321321', 'Salzburg', NULL, NULL),
(2, 'Fachhochschule Joanneum', NULL, NULL, 'Alte Poststraße 149', '8020', 'Austria', '123', '321', 'Graz', 3, 4),
(3, 'Graz University of Technology', NULL, NULL, 'Rechbauerstraße 12', '8010', 'Austria', NULL, NULL, 'Graz', NULL, NULL),
(4, 'Technical University of Sofia', NULL, NULL, '8 St.Kliment Ohridski Boulevard', '1756', 'Bulgaria', NULL, NULL, 'Sofia', NULL, NULL),
(5, 'Technical University of Ostrava', NULL, NULL, '17.listopadu 15', '708 33', 'Poruba', NULL, NULL, 'Ostrava', NULL, NULL),
(6, 'Tallin University of Technology', NULL, NULL, 'Ehitajate tee 5', '12616', 'Estonia', NULL, NULL, 'Tallinn', NULL, NULL),
(7, 'Helsinki Metropolia University of Applied Sciences', NULL, NULL, 'Bulevardi 31', 'FI-00079', 'Finland', NULL, NULL, 'Metropolia', NULL, NULL),
(8, 'Turku University of Applied Sciences', NULL, NULL, 'Joukahaisenkatu 3', '20520', 'Finland', NULL, NULL, 'Turku', NULL, NULL),
(9, 'EFREI, Paris', NULL, NULL, '30-32 Avenue de la République', '94800', 'France', NULL, NULL, 'Villejuif', NULL, NULL),
(10, 'EPITECH', NULL, NULL, '24 Rue Pasteur', '94270', 'France', NULL, NULL, 'Le Kremlin-Bicêtre', NULL, NULL),
(11, 'Universite de Technologie, Troyes', NULL, NULL, '12 Rue Marie Curie', '10010', 'France', NULL, NULL, 'Troyes', NULL, NULL),
(12, 'Fachhochschule Flensburg', NULL, NULL, 'Kanzleistrasse 91-93', '24943', 'Germany', NULL, NULL, '', NULL, NULL),
(13, 'Fachhochschule Kiel', NULL, NULL, 'Sokratespl. 1', '24149', 'Germany', NULL, NULL, 'Kiel', NULL, NULL),
(14, 'Hochschule Aalen', NULL, NULL, 'Beethovenstraße 1', '73430', 'Germany', NULL, NULL, 'Aalen', NULL, NULL),
(15, 'Hochschule Bremen', NULL, NULL, 'Neustadtswall 30', '28199', 'Germany', NULL, NULL, 'Bremen', NULL, NULL),
(16, 'Hochschule Esslingen', NULL, NULL, 'Kanalstraße 33', '73728', 'Germany', NULL, NULL, 'Esslingen am Neckar', NULL, NULL),
(17, 'Hochschule für Technik Stuttgart', NULL, NULL, 'Schellingstraße 24', '70174', 'Germany', NULL, NULL, 'Stuttgart', NULL, NULL),
(18, 'Hochschule Regensburg', NULL, NULL, 'Seybothstraße 2', '93053', 'Germany', NULL, NULL, 'Regensburg', NULL, NULL),
(19, 'Universität Rostock', NULL, NULL, '', '18051', 'Germany', NULL, NULL, 'Rostock', NULL, NULL),
(20, 'University of Miskolc, Miskolc-Egyetemváros', NULL, NULL, 'Egyetem út', '3515', 'Hungary', NULL, NULL, 'Miskolc', NULL, NULL),
(21, 'University of Bologna', NULL, NULL, 'Via Zamboni, 33', '40126', 'Italy', NULL, NULL, 'Bologna', NULL, NULL),
(22, 'University of Trento', NULL, NULL, 'Via Calepina, 14', '38122', 'Italy', NULL, NULL, 'Trento', NULL, NULL),
(23, 'Technical University of Lodz', NULL, NULL, 'Żwirki 36', '91-867', 'Poland', NULL, NULL, 'Łódź', NULL, NULL),
(24, 'Universidade do Porto', NULL, NULL, 'Praça de Gomes Teixeira', '4099-002', 'Portugal', NULL, NULL, 'Porto', NULL, NULL),
(25, 'Universidad de Oviedo, Gijón', NULL, NULL, 'Calle San Francisco, 1', '33003', 'Spain', NULL, NULL, 'Oviedo, Asturias', NULL, NULL),
(26, 'Universidad Politécnica de Madrid', NULL, NULL, 'Calle Ramiro de Maeztu, 7', '28040', 'Spain', NULL, NULL, 'Madrid', NULL, NULL),
(27, 'University of Jaén', NULL, NULL, 'Campus Las Lagunillas, s/n', '23071', 'Spain', NULL, NULL, 'Jaén', NULL, NULL),
(28, 'University of Applied Sciences and Arts Nortwestern Switzerland', NULL, NULL, 'Spitalstrasse 8', '4056', 'Switzerland', NULL, NULL, 'Basel', NULL, NULL),
(29, 'Izmir Institute of Technology', NULL, NULL, 'Gülbahçe Mah., İzmir Yüksek Teknoloji Enstitüsü', '35430', 'Turkey', NULL, NULL, 'Urla/İzmir', NULL, NULL),
(30, 'Sabanci University', NULL, NULL, 'Orta Mahalle, Üniversite Cd. No:27', '34956', 'Turkey', NULL, NULL, 'Orhanli/Tuzla/İstanbul', NULL, NULL),
(31, 'Edinburgh Napier University - Edinburgh Napier University (Erasmus)', NULL, NULL, '219 Colinton Rd', 'EH14 1DJ', 'UK', NULL, NULL, 'Edinburgh', NULL, NULL),
(32, 'Heriot-Watt University, Edinburgh', NULL, NULL, 'Edinburgh Campus', 'EH14 4AS', 'UK', NULL, NULL, 'Edinburgh', NULL, NULL),
(33, 'Technical University of Munich', NULL, NULL, 'Arcisstraße 21', '80333', 'Germany', NULL, NULL, 'München', NULL, NULL),
(34, 'Universität Heidelberg', NULL, NULL, 'Seminarstraße 2', '69117', 'Germany', NULL, NULL, 'Heidelberg', NULL, NULL),
(35, 'Freie Universität Berlin', NULL, NULL, 'Kaiserswerther Str. 16-18', '14195', 'Germany', NULL, NULL, 'Berlin', NULL, NULL),
(36, 'RWTH Aachen University', NULL, NULL, 'Templergraben 55', '52062', 'Germany', NULL, NULL, 'Aachen', NULL, NULL),
(37, 'Christian-Albrechts-Universität', NULL, NULL, 'Kiel University', '24098', 'Germany', NULL, NULL, 'Kiel', NULL, NULL),
(38, 'Technische Universität Dresden', NULL, NULL, 'Zellescher Weg 18', '01069', 'Germany', NULL, NULL, 'Dresden', NULL, NULL),
(39, 'Hochschule Fulda', NULL, NULL, 'Leipziger Straße 123', '36037', 'Germany', NULL, NULL, 'Fulda', NULL, NULL),
(40, 'Humboldt-Universität', NULL, NULL, 'Unter den Linden 6', '10099', 'Germany', NULL, NULL, 'Berlin', NULL, NULL),
(41, 'Universität Bielefeld', NULL, NULL, 'Universitätsstraße 25', '33615', 'Germany', NULL, NULL, 'Bielefeld', NULL, NULL),
(42, 'University of Freiburg', NULL, NULL, 'Fahnenbergplatz', '79085', 'Germany', NULL, NULL, 'Freiburg im Breisgau', NULL, NULL),
(43, 'Leibniz Universität Hannover', NULL, NULL, 'Welfengarten 1', 'D-30167', 'Germany', NULL, NULL, 'Hannover', NULL, NULL),
(44, 'Universität Kaiserslautern', NULL, NULL, 'Erwin-Schrödinger-Straße 1', '67663', 'Germany', NULL, NULL, 'Kaiserslautern', NULL, NULL),
(45, 'Universität Konstanz', NULL, NULL, 'Universität Konstanz', '78457', 'Germany', NULL, NULL, 'Konstanz', NULL, NULL),
(46, 'Universität Mannheim', NULL, NULL, 'Zulassungsstelle Postfach 103462', '68131', 'Germany', NULL, NULL, 'Mannheim', NULL, NULL),
(47, 'Technische Universität Berlin', NULL, NULL, 'Straße des 17. Juni 135', '10623', 'Germany', NULL, NULL, 'Berlin', NULL, NULL),
(48, 'Technische Universität Chemnitz-Zwickau', NULL, NULL, 'Str. der Nationen 62', '09111', 'Germany', NULL, NULL, 'Chemnitz', NULL, NULL),
(49, 'Technische Universität Ilmenau', NULL, NULL, 'Ehrenbergstraße 29', '98693', 'Germany', NULL, NULL, 'Ilmenau', NULL, NULL),
(50, 'Universität Augsburg', NULL, NULL, 'Universitätsstraße 2', '86159', 'Germany', NULL, NULL, 'Augsburg', NULL, NULL),
(51, 'Universität Bayreuth', NULL, NULL, 'Universitätsstraße 30', '95447', 'Germany', NULL, NULL, 'Bayreuth', NULL, NULL),
(52, 'Universität Stuttgart', NULL, NULL, 'Keplerstraße 7', '70174', 'Germany', NULL, NULL, 'Stuttgart', NULL, NULL),
(53, 'Universität des Saarlandes', NULL, NULL, NULL, '66123', 'Germany', NULL, NULL, 'Saarbrücken', NULL, NULL),
(54, 'Universität Paderborn', NULL, NULL, 'Warburger Str. 100', '33098', 'Germany', NULL, NULL, 'Paderborn', NULL, NULL),
(55, 'Ludwig-Maximilians-Universität München', NULL, NULL, 'Professor-Huber-Platz 2', '80539', 'Germany ', NULL, NULL, 'München', NULL, NULL),
(56, 'Technische Universität München', NULL, NULL, 'Arcisstraße 21', '80333', 'Germany', NULL, NULL, 'München', NULL, NULL),
(57, 'Universität Rostock', NULL, NULL, '', '18051', 'Germany', NULL, NULL, 'Rostock', NULL, NULL),
(58, 'Universität Regensburg', NULL, NULL, 'Universitätsstraße 31', '93053', 'Germany', NULL, NULL, 'Regensburg', NULL, NULL),
(59, 'Universität Passau', NULL, NULL, 'Innstraße 41', '94032', 'Germany', NULL, NULL, 'Passau', NULL, NULL),
(60, 'Bauhaus University Weimar', NULL, NULL, 'Geschwister-Scholl-Straße 8', '99423', 'Germany', NULL, NULL, 'Weimar', NULL, NULL),
(61, 'Heilbronn University', NULL, NULL, 'Max-Planck-Straße 39', '74081', 'Germany', NULL, NULL, 'Heilbronn', NULL, NULL),
(62, 'Hof University of Applied Sciences', NULL, NULL, 'Alfons-Goppel-Platz 1', '95028', 'Germany', NULL, NULL, 'Hof', NULL, NULL),
(63, 'Stenden University', NULL, NULL, 'Rengerslaan 8', '8917 DD', 'Netherlands', NULL, NULL, 'Leeuwarden', NULL, NULL),
(64, 'Radboud University', NULL, NULL, 'Comeniuslaan 4', '6525 HP', 'Netherlands', NULL, NULL, 'Nijmegen', NULL, NULL),
(65, 'Fontys University of Applied Sciences', NULL, NULL, 'Rachelsmolen 1', '5612 MA', 'Netherlands', NULL, NULL, 'Eindhoven ', NULL, NULL),
(66, 'Inholland University of Applied Sciences', NULL, NULL, ' Bijdorplaan 15', '2015 CE', 'Netherlands', NULL, NULL, 'Haarlem', NULL, NULL),
(67, 'Avans University of Applied Sciences', NULL, NULL, 'Onderwijsboulevard 215', '5223 DE ', 'Netherlands', NULL, NULL, '\'s-Hertogenbosch', NULL, NULL),
(68, 'Van Hall Larenstein', NULL, NULL, 'Larensteinselaan 26a', '6882 CT', 'Netherlands', NULL, NULL, 'Velp', NULL, NULL),
(69, 'Saxion University of Applied Sciences', NULL, NULL, 'Handelskade 75', '7417 DH', 'Netherlands', NULL, NULL, 'Deventer', NULL, NULL),
(70, 'VU Amsterdam', NULL, NULL, 'De Boelelaan 1105', '1081 HV', 'Netherlands', NULL, NULL, 'Amsterdam', NULL, NULL),
(71, 'The Hague University of Applied Sciences', NULL, NULL, 'Johanna Westerdijkplein 75', '75 2521 EN', 'Netherlands', NULL, NULL, 'The Hague', NULL, NULL),
(72, 'Univeristy of Groningen', NULL, NULL, NULL, '9700 AB', 'Netherlands', NULL, NULL, 'Groningen', NULL, NULL),
(73, 'HZ University of Applied Sciences', NULL, NULL, 'Edisonweg 4', '4382 NW', 'Netherlands', NULL, NULL, 'Vlissingen', NULL, NULL),
(74, 'University of Amsterdam', NULL, NULL, 'Spui 21', '1012 WX', 'Netherlands', NULL, NULL, 'Amsterdam', NULL, NULL),
(75, 'Hanze University of Applied Sciences', NULL, NULL, 'Van OlstToren Zernikeplein 7 \r\n', '9747 AS', 'Netherlands', NULL, NULL, 'Groningen', NULL, NULL),
(76, 'Windesheim Hogeschool', NULL, NULL, 'Campus 2-6', '8017 CA', 'Netherlands', NULL, NULL, 'Zwolle', NULL, NULL),
(77, 'Ajou University', NULL, NULL, 'Ajou University, 산5, Woncheon-dong, Yeongtong-gu, Suwon-si', NULL, 'South Korea', NULL, NULL, 'Gyeonggi-do', NULL, NULL),
(78, 'Korea University', NULL, NULL, '145 Anam-ro, Seongbuk-gu', '02841', 'Korea', NULL, NULL, 'Seoul', NULL, NULL),
(79, 'Hong Kong Polytechnic University', NULL, NULL, 'Hung Hom, Kowloon', NULL, 'China', NULL, NULL, 'Hong Kong', NULL, NULL),
(80, 'Changzhou University', NULL, NULL, '', '213164', 'China', NULL, NULL, 'Changzhou, Jiangsu', NULL, NULL),
(81, 'Instituto Tecnologico de Santo Domingo', NULL, NULL, 'Avenida de Los Próceres #49', '10602', 'República Dominicana', NULL, NULL, 'Los Jardines del Norte, Santo Domingo', NULL, NULL),
(82, 'Indian Institute of Technology', NULL, NULL, '', '600 036', 'India', NULL, NULL, 'Chennai', NULL, NULL),
(83, 'Instituto tecnologico y de Estudios Superiores de Monterrey', NULL, NULL, 'Avenida Eugenio Garza Sada 2501 Sur Colonia Tecnologico C.P.', '64849', 'Mexico', NULL, NULL, 'Monterey, Nuevo Leon', NULL, NULL),
(84, 'Instituto tecnologico y de Estudios Superiores de Monterrey', NULL, NULL, 'Calle del Puente #222 Col. Ejidos de Huipulco', '14380', 'México D.F.', NULL, NULL, 'Tlalpan C.P.', NULL, NULL),
(85, 'Nanyang Technologigal University', NULL, NULL, '50 Nanyang Ave\r\n', '639798', 'Singapore', NULL, NULL, NULL, NULL, NULL),
(86, 'VIA University College', NULL, NULL, 'Skejbyvej 1', 'DK-8240', 'Denmark', NULL, NULL, 'Risskov', NULL, NULL),
(87, 'University of Arkansas', NULL, NULL, '722 W Maple Street', NULL, 'USA', NULL, NULL, 'Fayetteville', NULL, NULL),
(88, 'University of Kansas', NULL, NULL, '1450 Jayhawk Boulevard', NULL, 'USA', NULL, NULL, 'Lawrence', NULL, NULL),
(89, 'University of Georgia', NULL, NULL, '382 East Broad Street', NULL, 'USA', NULL, NULL, 'Athens', NULL, NULL),
(90, 'Minnesota State University', NULL, NULL, '273 Wissink Hall', NULL, 'USA', NULL, NULL, 'Mankato', NULL, NULL),
(91, 'University of Minnesota', NULL, NULL, '117 Pleasant Street', NULL, 'USA', NULL, NULL, 'Minneapolis', NULL, NULL),
(92, 'Michigan Technological Univesrity', NULL, NULL, '1400 Townsend Drive', NULL, 'USA', NULL, NULL, 'Houghton', NULL, NULL),
(93, 'Michigan State University', NULL, NULL, '220 Trowbridge road', NULL, 'USA', NULL, NULL, 'East Lansing', NULL, NULL),
(94, 'Southern Illinois University', NULL, NULL, '1263 Lincoln Drive', NULL, 'USA', NULL, NULL, 'Carbondale', NULL, NULL),
(95, 'California Institute of Technology', NULL, NULL, '1200 East California Boulevard', NULL, 'USA', NULL, NULL, 'Pasadena', NULL, NULL),
(96, 'California State University, Fresno', NULL, NULL, '5241  N Maple Ave.', NULL, 'USA', NULL, NULL, 'Fresno', NULL, NULL),
(97, 'California State University, Fullerton', NULL, NULL, '800 N State College Boulevard', NULL, 'USA', NULL, NULL, 'Fullerton', NULL, NULL),
(98, 'California State University, Long Beach', NULL, NULL, '1250 Bellflower Boulevard', NULL, 'USA', NULL, NULL, 'Long Beach', NULL, NULL),
(99, 'California State University, Los Angeles', NULL, NULL, '5151 State University Drive', NULL, 'USA', NULL, NULL, 'Los Angeles', NULL, NULL),
(100, 'California State University, Northridge', NULL, NULL, '18111 Nordhoff Street', NULL, 'USA', NULL, NULL, 'Northridge', NULL, NULL),
(101, 'University of California, Irvine', NULL, NULL, '', 'CA 92697', 'USA', NULL, NULL, 'Irvine', NULL, NULL),
(102, 'University of California, Riverside', NULL, NULL, '900 University Avenue', NULL, 'USA', NULL, NULL, 'Riverside', NULL, NULL),
(103, 'University of California, San Diego', NULL, NULL, '9500 Gillman Drive', NULL, 'USA', NULL, NULL, 'San Diego', NULL, NULL),
(104, 'University of California, Santa Barbara', NULL, NULL, 'University Plaza', NULL, 'USA', NULL, NULL, 'Santa Barbara', NULL, NULL),
(105, 'University of California, Santa Cruz', NULL, NULL, '1156 High Street', NULL, 'USA', NULL, NULL, 'Santa Cruz', NULL, NULL),
(106, 'University of California, Berkeley', NULL, NULL, '253 Cory Hall', NULL, 'USA', NULL, NULL, 'Berkeley', NULL, NULL),
(107, 'University of San Francisco', NULL, NULL, '2130 Fulton Street', NULL, 'USA', NULL, NULL, 'San Francisco', NULL, NULL),
(108, 'San Francisco State University', NULL, NULL, '1600 Holloway Avenue', NULL, 'USA', NULL, NULL, 'San Francisco', NULL, NULL),
(109, 'New Jersey Institute of Technology', NULL, NULL, 'University Heights', NULL, 'USA', NULL, NULL, 'Newark', NULL, NULL),
(110, 'University of St Andrews', NULL, NULL, 'College Gate', NULL, 'UK', NULL, NULL, 'St Andrews', NULL, NULL),
(111, 'Aston University', NULL, NULL, 'Aston Express Way', NULL, 'UK', NULL, NULL, 'Birmingham', NULL, NULL),
(112, 'University College London', NULL, NULL, 'Gower Street', NULL, 'UK', NULL, NULL, 'London', NULL, NULL),
(113, 'University of Manchester', NULL, NULL, 'Oxford Road', NULL, 'UK', NULL, NULL, 'Manchester', NULL, NULL),
(114, 'University of Strathclyde', NULL, NULL, '26 Richmond Street', NULL, 'UK', NULL, NULL, 'Glasgow', NULL, NULL),
(115, 'University of Southhampton', NULL, NULL, 'University Road', NULL, 'UK', NULL, NULL, 'Southhampton', NULL, NULL),
(116, 'University of Nottingham', NULL, NULL, 'University Park', NULL, 'UK', NULL, NULL, 'Nottingham', NULL, NULL),
(117, 'University of Surrey', NULL, NULL, 'Guildford', NULL, 'UK', NULL, NULL, 'Guildford', NULL, NULL),
(118, 'University of Bath', NULL, NULL, 'Claverton Down', NULL, 'UK', NULL, NULL, 'Bath', NULL, NULL),
(119, 'University of Leed', NULL, NULL, 'Woodhouse Lane', NULL, 'UK', NULL, NULL, 'Leeds', NULL, NULL),
(120, 'University of Sheffield', NULL, NULL, 'Western Bank', NULL, 'UK', NULL, NULL, 'Sheffield', NULL, NULL),
(121, 'University of Bristol', NULL, NULL, 'Tyndall Avenue', NULL, 'UK', NULL, NULL, 'Bristol', NULL, NULL),
(122, 'Imperial College London', NULL, NULL, 'South Kengsington Campus', NULL, 'UK', NULL, NULL, 'London', NULL, NULL),
(123, 'Kingston University', NULL, NULL, '53-57 High Street', NULL, 'UK', NULL, NULL, 'Kingston upon Thames', NULL, NULL),
(124, 'Loughborough University', NULL, NULL, 'Epinal Way', NULL, 'UK', NULL, NULL, 'Loughborough', NULL, NULL),
(125, 'University of Greenwich', NULL, NULL, 'Park Row', NULL, 'UK', NULL, NULL, 'London', NULL, NULL),
(126, 'University of Brighton', NULL, NULL, 'Lewes Road', NULL, 'UK', NULL, NULL, 'Brighton', NULL, NULL),
(127, 'University of East London', NULL, NULL, 'University Way', NULL, 'UK', NULL, NULL, 'London', NULL, NULL),
(128, 'Dublin City University', NULL, NULL, 'Glasnevin', NULL, 'Ireland', NULL, NULL, 'Dublin', NULL, NULL),
(129, 'National University of Ireland Maynooth', NULL, NULL, 'Newtown Road', NULL, 'Ireland', NULL, NULL, 'Co Kildare', NULL, NULL),
(130, 'National University of Ireland Galway', NULL, NULL, 'University Road', NULL, 'Ireland', NULL, NULL, 'Galway', NULL, NULL),
(131, 'Trinity College, University of Dublin', NULL, NULL, 'College Green', NULL, 'Ireland', NULL, NULL, 'Dublin', NULL, NULL),
(132, 'University College Cork', NULL, NULL, 'College Road', NULL, 'Ireland', NULL, NULL, 'Cork', NULL, NULL),
(133, 'University College Dublin', NULL, NULL, 'Belfield', NULL, 'Ireland', NULL, NULL, 'Dublin', NULL, NULL),
(134, 'University of Limerick', NULL, NULL, 'Sreelane', NULL, 'Ireland', NULL, NULL, 'Limerick', NULL, NULL),
(135, 'University of South Australia', NULL, NULL, '101 Currie Street', NULL, 'Australia', NULL, NULL, 'Adelaide', NULL, NULL),
(136, 'RMIT University', NULL, NULL, '124 La Trobe Street', NULL, 'Australia', NULL, NULL, 'Melbourne', NULL, NULL),
(137, 'Queensland University of Tchnology', NULL, NULL, '2 George Street', NULL, 'Australia', NULL, NULL, 'Brisbane', NULL, NULL),
(138, 'Swinburne University of Technology', NULL, NULL, 'John Street', NULL, 'Canada', NULL, NULL, 'Victoria', NULL, NULL),
(139, 'Federation University', NULL, NULL, 'University Drive', NULL, 'Australia', NULL, NULL, 'Mt Helen', NULL, NULL),
(140, 'Holland College', NULL, NULL, '146 Weymouth Street', NULL, 'Canada', NULL, NULL, 'Charlottetown', NULL, NULL),
(141, 'B C Institute of Technology', NULL, NULL, '3700 Willingdon Avenue', NULL, 'Canada', NULL, NULL, 'Burnaby', NULL, NULL),
(142, 'Jönköping University', NULL, NULL, NULL, NULL, 'Sweden', NULL, NULL, 'Jönköping', 1, 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `programme` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role_title`, `programme`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Staff name', 'staff@test.com', 'Staff_user', NULL, '$2y$10$DocgjN84q7yWkfTs1ustGOJsfS7/bBzDGvrbSN4r0Nt81aY1QgQwW', 'QyEcp2mLj6GGW5PR95IZJrlPl2gzole6bLKINbj22FsU0PEFH7l1UUdOxAtS', '2018-04-10 10:12:37', '2018-04-10 10:12:37'),
(2, 'Manager name', 'manager@test.com', 'Programme_manager', NULL, '$2y$10$he23rzdR5.W/hIwRLxHBtebWhZ5r75iDb2Vebiv51gEG4bM4UeYYG', NULL, '2018-04-10 10:12:38', '2018-04-10 10:12:38'),
(3, 'Admin name', 'admin@test.com', 'Admin_user', NULL, '$2y$10$Nzkmr6sSBlUhru1QaLHkmucLxrHX3uMPiRIDkKHnk11VcQiu9Sumu', 'RB2Vo1qV96Nbd0uXk6Z7kdb991z3F7s4YJ0ljHYPWhOPkoIrgsrrX11r7UzM', '2018-04-10 10:12:38', '2018-04-10 10:12:38'),
(4, 'Super admin name', 'super_admin@test.com', 'Super_admin', NULL, '$2y$10$wjxIsE7q2XeQ2VfdImnsiedAhUZxgENpRQ9/FhSXzVGUFMCRksQPa', 'l7VQCLLZtRqXpdzmofNEPk5ppm2XGdHG9LPgRybbn82e9mWaxslOUT76jS9K', '2018-04-10 10:12:38', '2018-04-10 10:12:38'),
(9, 'znowman', 'znowman@test.com', 'Super_admin', NULL, '$2y$10$MMlw7ZcwRHqOfaQjXOMhpOoPvenpXSLt5Q92WbJPEoxAmNELtxaUa', NULL, '2018-04-11 16:26:12', '2018-04-11 16:26:12');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_City_Country1_idx` (`Country_Id`);

--
-- Index för tabell `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`Id`);

--
-- Index för tabell `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`Id`) USING BTREE,
  ADD KEY `fk_course_Faculty1_idx` (`Faculty_Id`),
  ADD KEY `fk_course_Programme1_idx` (`Programme_idProgramme`),
  ADD KEY `fk_course_Level1_idx` (`Level_Id`),
  ADD KEY `Partner_university_Id` (`University_Id`),
  ADD KEY `name` (`name`);

--
-- Index för tabell `course_package`
--
ALTER TABLE `course_package`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Package_title` (`Package_title`),
  ADD KEY `Course_name` (`Course_name`),
  ADD KEY `Package_id` (`Package_Id`),
  ADD KEY `Course_Id` (`Course_Id`),
  ADD KEY `University_Id` (`University_Id`),
  ADD KEY `Pu_Id` (`Pu_Id`);

--
-- Index för tabell `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Partner_university_Id` (`University_Id`);

--
-- Index för tabell `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`Id`);

--
-- Index för tabell `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`Id`) USING BTREE,
  ADD KEY `fk_Package_Faculty1_idx` (`programme_Id`),
  ADD KEY `fk_Package_Partner University1_idx` (`pu_Id`),
  ADD KEY `title` (`title`),
  ADD KEY `university_Id` (`university_Id`);

--
-- Index för tabell `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index för tabell `programme`
--
ALTER TABLE `programme`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_Programme_Faculty1_idx` (`Faculty_Id`),
  ADD KEY `fk_Programme_Level1_idx` (`Level_Id`),
  ADD KEY `University_Id` (`University_Id`) USING BTREE;

--
-- Index för tabell `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`title`);

--
-- Index för tabell `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `City_Id` (`City_Id`),
  ADD KEY `Country_Id` (`Country_Id`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `city`
--
ALTER TABLE `city`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT för tabell `country`
--
ALTER TABLE `country`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT för tabell `course`
--
ALTER TABLE `course`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=369;

--
-- AUTO_INCREMENT för tabell `course_package`
--
ALTER TABLE `course_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT för tabell `faculty`
--
ALTER TABLE `faculty`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT för tabell `level`
--
ALTER TABLE `level`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT för tabell `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT för tabell `package`
--
ALTER TABLE `package`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT för tabell `programme`
--
ALTER TABLE `programme`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT för tabell `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT för tabell `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
