-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 23. Feb 2019 um 01:05
-- Server-Version: 10.1.36-MariaDB
-- PHP-Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `zerowaste`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `antwort`
--

CREATE TABLE `antwort` (
  `id` int(11) NOT NULL,
  `fragenId` int(11) NOT NULL,
  `teilnehmerId` int(11) NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `antwort`
--

INSERT INTO `antwort` (`id`, `fragenId`, `teilnehmerId`, `value`) VALUES
(1, 1, 3, '0'),
(2, 2, 3, '1'),
(3, 3, 3, 'sdf'),
(4, 4, 3, 'asdf'),
(5, 1, 4, '0'),
(6, 2, 4, '1'),
(7, 3, 4, 'sdf'),
(8, 4, 4, 'asdf'),
(9, 1, 5, '0'),
(10, 2, 5, '4'),
(11, 3, 5, 'äpfel'),
(12, 4, 5, 'banane'),
(13, 1, 2, 'oui'),
(14, 2, 2, '4'),
(15, 3, 2, 'fast alle'),
(16, 4, 2, 'mehrweg product ');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `frage`
--

CREATE TABLE `frage` (
  `id` int(11) NOT NULL,
  `frage` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `frage`
--

INSERT INTO `frage` (`id`, `frage`) VALUES
(1, 'Achtest du aktiv auf deinen Plastikverbrauch?'),
(2, 'Wie schätzt du deinen Plastikverbrauch auf einer Skala von 0-5 (0 sehr wenig, 5 sehr hoch) ein?'),
(3, 'Für welche Produkte würdest du eine Plastiktüte verwenden?'),
(4, 'Wie meinst du könnten Supermärkte deinen Plastikverbrauch reduzieren?');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `teilnehmer`
--

CREATE TABLE `teilnehmer` (
  `id` int(11) NOT NULL,
  `alter` int(11) NOT NULL,
  `geschlecht` set('weiblich','männlich','divers') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `teilnehmer`
--

INSERT INTO `teilnehmer` (`id`, `alter`, `geschlecht`) VALUES
(1, 64, 'weiblich'),
(2, 25, 'männlich'),
(3, 2, 'weiblich'),
(4, 2, 'weiblich'),
(5, 19, 'männlich'),
(6, 24, '');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `antwort`
--
ALTER TABLE `antwort`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fragenId` (`fragenId`),
  ADD KEY `teilnehmerId` (`teilnehmerId`);

--
-- Indizes für die Tabelle `frage`
--
ALTER TABLE `frage`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `teilnehmer`
--
ALTER TABLE `teilnehmer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `antwort`
--
ALTER TABLE `antwort`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT für Tabelle `frage`
--
ALTER TABLE `frage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `teilnehmer`
--
ALTER TABLE `teilnehmer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `antwort`
--
ALTER TABLE `antwort`
  ADD CONSTRAINT `FK_antwort_frage` FOREIGN KEY (`fragenId`) REFERENCES `frage` (`id`),
  ADD CONSTRAINT `FK_antwort_teilnehmer` FOREIGN KEY (`teilnehmerId`) REFERENCES `teilnehmer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
