-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 16, 2021 alle 14:29
-- Versione del server: 10.4.17-MariaDB
-- Versione PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dati_utenti`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `credenziali`
--

CREATE TABLE `credenziali` (
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `idpersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `persona`
--

CREATE TABLE `persona` (
  `codice` int(11) NOT NULL,
  `cognome` varchar(45) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `genere` varchar(45) NOT NULL,
  `nazionalità` varchar(45) NOT NULL,
  `patente` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `credenziali`
--
ALTER TABLE `credenziali`
  ADD PRIMARY KEY (`username`),
  ADD KEY `idpersona_idx` (`idpersona`);

--
-- Indici per le tabelle `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`codice`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `credenziali`
--
ALTER TABLE `credenziali`
  ADD CONSTRAINT `idpersona` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`codice`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
