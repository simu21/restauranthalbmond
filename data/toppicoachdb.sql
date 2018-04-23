-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 20. Apr 2018 um 16:06
-- Server-Version: 10.1.9-MariaDB
-- PHP-Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `toppicoachdb`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mannschaft`
--
CREATE DATABASE restauranthalbmonddb;

CREATE TABLE `mannschaft` (
  `id` int(11) NOT NULL,
  `mannschaftsname` varchar(55) NOT NULL,
  `coach` varchar(55) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `mannschaft`
--

INSERT INTO `mannschaft` (`id`, `mannschaftsname`, `coach`, `u_id`) VALUES
(1, 'A-Junioren<b>asd</b>', 'Arber<b>asd</b>', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `spieler`
--

CREATE TABLE `spieler` (
  `id` int(11) NOT NULL,
  `vorname` varchar(55) NOT NULL,
  `nachname` varchar(55) NOT NULL,
  `sposition` varchar(55) NOT NULL,
  `bildpfad` varchar(255) NOT NULL,
  `m_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `spieler`
--

INSERT INTO `spieler` (`id`, `vorname`, `nachname`, `sposition`, `bildpfad`, `m_id`) VALUES
(2, 'asd', 'asd', 'asd', 'images/880x495_story-5dbae8be-41bd-5f50-aa05-911db1d9c9eb_396357.jpg', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `mail` varchar(55) NOT NULL,
  `passwort` varchar(255) NOT NULL,
  `vereinsname` varchar(55) NOT NULL,
  `kontaktperson` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `mail`, `passwort`, `vereinsname`, `kontaktperson`) VALUES
(1, 'arber@l.de', '$2y$14$f/FzASIftIwW3uqg5ieH5OSHMxBIKuK8eBF2NnZXeC076.13vxBX6', '<B>asd</b>', 'Arber<b>asd</b>');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `mannschaft`
--
ALTER TABLE `mannschaft`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indizes für die Tabelle `spieler`
--
ALTER TABLE `spieler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_id` (`m_id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `mannschaft`
--
ALTER TABLE `mannschaft`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `spieler`
--
ALTER TABLE `spieler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `mannschaft`
--
ALTER TABLE `mannschaft`
  ADD CONSTRAINT `mannschaft_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`id`);

--
-- Constraints der Tabelle `spieler`
--
ALTER TABLE `spieler`
  ADD CONSTRAINT `spieler_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `mannschaft` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
