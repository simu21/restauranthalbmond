-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 23. Apr 2018 um 13:03
-- Server-Version: 10.1.25-MariaDB
-- PHP-Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `restauranthalbmonddatenb`
--
CREATE DATABASE IF NOT EXISTS `restauranthalbmonddatenb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `restauranthalbmonddatenb`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `artgericht`
--

CREATE TABLE `artgericht` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `beschreibung` text NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `gericht`
--

CREATE TABLE `gericht` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `beschreibung` varchar(255) NOT NULL,
  `preis` varchar(10) NOT NULL,
  `bildpfad` varchar(255) NOT NULL,
  `aid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `vorname` varchar(55) NOT NULL,
  `nachname` varchar(55) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `passwort` varchar(255) NOT NULL,
  `plz` int(10) NOT NULL,
  `ort` varchar(55) NOT NULL,
  `telefonnummer` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `vorname`, `nachname`, `mail`, `passwort`, `plz`, `ort`, `telefonnummer`) VALUES
(1, 'robin', 'robin', 'h@d.com', '$2y$14$fh2opGASs3IYjxTGd0KHKuX0xPjUt49BJtKYRWWoDOaddhl7/sTB2', 3084, 'robin', '021');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `artgericht`
--
ALTER TABLE `artgericht`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_artGerichtUser` (`uid`);

--
-- Indizes für die Tabelle `gericht`
--
ALTER TABLE `gericht`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_gerichtArtGericht` (`aid`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `artgericht`
--
ALTER TABLE `artgericht`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `gericht`
--
ALTER TABLE `gericht`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `artgericht`
--
ALTER TABLE `artgericht`
  ADD CONSTRAINT `FK_artGerichtUser` FOREIGN KEY (`uid`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints der Tabelle `gericht`
--
ALTER TABLE `gericht`
  ADD CONSTRAINT `FK_gerichtArtGericht` FOREIGN KEY (`aid`) REFERENCES `artgericht` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
