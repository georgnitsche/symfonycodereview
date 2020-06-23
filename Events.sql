-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 10. Mai 2020 um 21:22
-- Server-Version: 10.4.11-MariaDB
-- PHP-Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `Events`
--
CREATE DATABASE IF NOT EXISTS `Events` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `Events`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `EVENTS`
--

CREATE TABLE `EVENTS` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `DATETIME` datetime NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `IMAGE` varchar(250) DEFAULT NULL,
  `CAPACITY` int(11) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PHONE` varchar(30) NOT NULL,
  `ADDRESS` varchar(255) NOT NULL,
  `URL` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `EVENTS`
--

INSERT INTO `EVENTS` (`ID`, `NAME`, `DATETIME`, `DESCRIPTION`, `IMAGE`, `CAPACITY`, `EMAIL`, `PHONE`, `ADDRESS`, `URL`) VALUES
(3, 'dummy', '2019-04-26 13:00:00', 'dummydescription', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0e/Phoenix%2C_concert_45_de_ani%2C_2007_%282%29.jpg/320px-Phoenix%2C_concert_45_de_ani%2C_2007_%282%29.jpg', 1000, 'dummyemail', 'dummyphone', 'dummyaddress', 'dummyurl'),
(5, 'dummy', '2015-04-26 13:00:00', 'dummydescription', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0e/Phoenix%2C_concert_45_de_ani%2C_2007_%282%29.jpg/320px-Phoenix%2C_concert_45_de_ani%2C_2007_%282%29.jpg', 1000, 'dummyemail', 'dummyphone', 'dummyaddress', 'dummyurl'),
(7, 'Testeingabe', '2017-04-03 05:03:00', 'this is a description', 'https://upload.wikimedia.org/wikipedia/commons/2/2d/Concert_at_Pantheon%2C_Paris_02.jpg', 1000, 'concert@concert.com', '1919199', 'concert avenue', 'http://concert.com');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `EVENTS`
--
ALTER TABLE `EVENTS`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `EVENTS`
--
ALTER TABLE `EVENTS`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
