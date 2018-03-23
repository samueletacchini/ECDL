-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 22, 2018 alle 11:22
-- Versione del server: 10.1.28-MariaDB
-- Versione PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecdl`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazione`
--

CREATE TABLE `prenotazione` (
  `ID` int(11) NOT NULL,
  `ID_codice_fiscale` varchar(16) COLLATE utf8_bin NOT NULL,
  `esami` varchar(7) COLLATE utf8_bin NOT NULL,
  `ID_sessione` int(11) NOT NULL,
  `pagato` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `prenotazione`
--

INSERT INTO `prenotazione` (`ID`, `ID_codice_fiscale`, `esami`, `ID_sessione`, `pagato`) VALUES
(0, 'tccsml0257blew99', '157', 1, 0),
(1, 'nicolassey99sexy', '1234567', 0, 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `prenotazione`
--
ALTER TABLE `prenotazione`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `data` (`ID_sessione`),
  ADD KEY `candidato` (`ID_codice_fiscale`),
  ADD KEY `ID` (`ID`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `prenotazione`
--
ALTER TABLE `prenotazione`
  ADD CONSTRAINT `candidato` FOREIGN KEY (`ID_codice_fiscale`) REFERENCES `user` (`codice_fiscale`),
  ADD CONSTRAINT `data` FOREIGN KEY (`ID_sessione`) REFERENCES `sessioni` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
