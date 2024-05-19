-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 19, 2024 at 09:13 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ordini_wen`
--

-- --------------------------------------------------------

--
-- Table structure for table `bevande`
--

CREATE TABLE `bevande` (
  `id` int(11) NOT NULL COMMENT 'Codice univoco per identificare l''entità',
  `nome` varchar(30) NOT NULL COMMENT 'nome della bevanda',
  `costo` decimal(3,0) NOT NULL COMMENT 'costo della bevanda',
  `descrizione` varchar(200) NOT NULL COMMENT 'descrizione della bevanda (ingredienti, ecc...)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bevande`
--

INSERT INTO `bevande` (`id`, `nome`, `costo`, `descrizione`) VALUES
(1, 'Acqua minerale', '1', 'Bottiglia d\'acqua minerale naturale'),
(2, 'Coca-Cola', '2', 'Bottiglia di Coca-Cola 33cl');

-- --------------------------------------------------------

--
-- Table structure for table `bevande_ordinate`
--

CREATE TABLE `bevande_ordinate` (
  `id` int(11) NOT NULL COMMENT 'Codice univoco per identificare l''entità',
  `id_ordine` int(11) NOT NULL COMMENT 'ordine a cui fa riferimento questa entità',
  `id_bevanda` int(11) NOT NULL COMMENT 'bevanda a cui questa entità fa riferimento',
  `quantità` smallint(6) NOT NULL DEFAULT '1' COMMENT 'numero della bibita ordinato'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bevande_ordinate`
--

INSERT INTO `bevande_ordinate` (`id`, `id_ordine`, `id_bevanda`, `quantità`) VALUES
(1, 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ordini`
--

CREATE TABLE `ordini` (
  `id` int(11) NOT NULL COMMENT 'codice univoco per identificare l''entità',
  `id_utente` int(11) NOT NULL COMMENT 'id dell''utente che ha effettuato la prenotazione',
  `ora_ritiro` datetime NOT NULL COMMENT 'data e orario nel quale si vogliono ritirare i panini',
  `ora_prenotazione` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'ora in cui è stato effettuato l''ordine'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordini`
--

INSERT INTO `ordini` (`id`, `id_utente`, `ora_ritiro`, `ora_prenotazione`) VALUES
(1, 1, '2024-04-22 12:00:00', '2024-04-22 11:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `panini`
--

CREATE TABLE `panini` (
  `id` int(11) NOT NULL COMMENT 'Codice univoco per identificare l''entità',
  `nome` varchar(200) NOT NULL COMMENT 'nome del panino',
  `costo` decimal(3,0) NOT NULL COMMENT 'costo del panino',
  `descrizione` varchar(500) NOT NULL COMMENT 'descrizione del panino e ingredienti'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `panini`
--

INSERT INTO `panini` (`id`, `nome`, `costo`, `descrizione`) VALUES
(1, 'Panino al salame', '5', 'Panino con salame, formaggio, lattuga e pomodoro'),
(2, 'Panino vegetariano', '4', 'Panino con verdure grigliate, formaggio e salsa al pesto');

-- --------------------------------------------------------

--
-- Table structure for table `panini_ordinati`
--

CREATE TABLE `panini_ordinati` (
  `id` int(11) NOT NULL COMMENT 'Codice univoco per identificare l''entità',
  `id_ordine` int(11) NOT NULL,
  `id_panino` int(11) NOT NULL,
  `quantità` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `panini_ordinati`
--

INSERT INTO `panini_ordinati` (`id`, `id_ordine`, `id_panino`, `quantità`) VALUES
(1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `utenti`
--

CREATE TABLE `utenti` (
  `ID` int(11) NOT NULL COMMENT 'Codice univoco per identificare l''entità',
  `admin` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'se e'' true l''utente e'' un admin',
  `nome` varchar(20) NOT NULL COMMENT 'nome dell''utente',
  `cognome` varchar(20) NOT NULL COMMENT 'cognome dell''utente',
  `data_nascita` date DEFAULT NULL COMMENT 'data nascita dell''utente',
  `telefono` varchar(13) NOT NULL COMMENT 'Recapito telefonico + prefisso stato',
  `email` varchar(100) NOT NULL COMMENT 'email associata all''account',
  `username` varchar(50) NOT NULL COMMENT 'nome utente associto all''account',
  `password` varchar(50) NOT NULL COMMENT 'password associata all''account',
  `data_iscrizione` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'data e ora dell''iscrizione dell''utente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utenti`
--

INSERT INTO `utenti` (`ID`, `admin`, `nome`, `cognome`, `data_nascita`, `telefono`, `email`, `username`, `password`, `data_iscrizione`) VALUES
(1, 0, 'Mario', 'Rossi', '1990-05-15', '+123456789', 'mario.rossi@example.com', 'mario_rossi', 'password123', '2024-05-01 10:00:00'),
(2, 0, 'Laura', 'Bianchi', '1985-08-20', '+987654321', 'laura.bianchi@example.com', 'laura_bianchi', 'securepwd', '2024-05-02 11:30:00'),
(3, 1, 'Nicolo\'', 'Mereghetti', '2004-07-21', '3315696117', '072004.nick@gmail.com', 'Nicomere', '12345678', '2024-05-19 11:08:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bevande`
--
ALTER TABLE `bevande`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bevande_ordinate`
--
ALTER TABLE `bevande_ordinate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordini`
--
ALTER TABLE `ordini`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panini`
--
ALTER TABLE `panini`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panini_ordinati`
--
ALTER TABLE `panini_ordinati`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bevande`
--
ALTER TABLE `bevande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codice univoco per identificare l''entità', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bevande_ordinate`
--
ALTER TABLE `bevande_ordinate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codice univoco per identificare l''entità', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ordini`
--
ALTER TABLE `ordini`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'codice univoco per identificare l''entità', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `panini`
--
ALTER TABLE `panini`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codice univoco per identificare l''entità', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `panini_ordinati`
--
ALTER TABLE `panini_ordinati`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codice univoco per identificare l''entità', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `utenti`
--
ALTER TABLE `utenti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codice univoco per identificare l''entità', AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
