-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2024 at 09:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bevande`
--

INSERT INTO `bevande` (`id`, `nome`, `costo`, `descrizione`) VALUES
(1, 'Acqua minerale', 1, 'Bottiglia d\'acqua minerale naturale'),
(2, 'Coca-Cola', 2, 'Bottiglia di Coca-Cola 33cl'),
(3, 'Aranciata', 2, 'Bottiglia di aranciata 33cl'),
(4, 'Acqua tonica', 2, 'Bottiglia di acqua tonica 33cl'),
(5, 'Sprite', 2, 'Bottiglia di Sprite 33cl'),
(6, 'Fanta', 2, 'Bottiglia di Fanta 33cl'),
(7, 'Acqua frizzante', 1, 'Bottiglia di acqua frizzante 33cl'),
(8, 'Birra', 4, 'Bottiglia di birra 33cl'),
(9, 'Limonata', 2, 'Bottiglia di limonata 33cl'),
(10, 'Te freddo', 3, 'Bottiglia di tè freddo al limone 33cl'),
(11, 'Succhi di frutta', 2, 'Bottiglia di succo di frutta 33cl'),
(12, 'Vino rosso', 5, 'Bottiglia di vino rosso 33cl'),
(13, 'Vino bianco', 5, 'Bottiglia di vino bianco 33cl'),
(14, 'Caffè', 2, 'Tazzina di caffè espresso'),
(15, 'Cioccolata calda', 3, 'Tazzina di cioccolata calda');

-- --------------------------------------------------------

--
-- Table structure for table `bevande_ordinate`
--

CREATE TABLE `bevande_ordinate` (
  `id` int(11) NOT NULL COMMENT 'Codice univoco per identificare l''entità',
  `id_ordine` int(11) NOT NULL COMMENT 'ordine a cui fa riferimento questa entità',
  `id_bevanda` int(11) NOT NULL COMMENT 'bevanda a cui questa entità fa riferimento',
  `quantità` smallint(6) NOT NULL DEFAULT 1 COMMENT 'numero della bibita ordinato'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bevande_ordinate`
--

INSERT INTO `bevande_ordinate` (`id`, `id_ordine`, `id_bevanda`, `quantità`) VALUES
(1, 1, 1, 3),
(2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ordini`
--

CREATE TABLE `ordini` (
  `id` int(11) NOT NULL COMMENT 'codice univoco per identificare l''entità',
  `id_utente` int(11) NOT NULL COMMENT 'id dell''utente che ha effettuato la prenotazione',
  `ora_ritiro` datetime NOT NULL COMMENT 'data e orario nel quale si vogliono ritirare i panini',
  `ora_prenotazione` datetime DEFAULT current_timestamp() COMMENT 'ora in cui è stato effettuato l''ordine'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordini`
--

INSERT INTO `ordini` (`id`, `id_utente`, `ora_ritiro`, `ora_prenotazione`) VALUES
(1, 1, '2024-04-22 12:00:00', '2024-04-22 11:30:00'),
(2, 2, '2024-04-22 13:00:00', '2024-04-22 11:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `panini`
--

CREATE TABLE `panini` (
  `id` int(11) NOT NULL COMMENT 'Codice univoco per identificare l''entità',
  `nome` varchar(200) NOT NULL COMMENT 'nome del panino',
  `costo` decimal(3,0) NOT NULL COMMENT 'costo del panino',
  `descrizione` varchar(500) NOT NULL COMMENT 'descrizione del panino e ingredienti'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `panini`
--

INSERT INTO `panini` (`id`, `nome`, `costo`, `descrizione`) VALUES
(1, 'Panino al salame', 5, 'Panino con salame, formaggio, lattuga e pomodoro'),
(2, 'Panino vegetariano', 4, 'Panino con verdure grigliate, formaggio e salsa al pesto'),
(3, 'Panino al prosciutto', 6, 'Panino con prosciutto, mozzarella, rucola e pomodoro'),
(4, 'Panino al tonno', 5, 'Panino con tonno, maionese, lattuga e cipolla'),
(5, 'Panino con pollo', 6, 'Panino con pollo grigliato, formaggio, insalata e salsa BBQ'),
(6, 'Panino al salmone', 7, 'Panino con salmone affumicato, formaggio spalmabile, cetrioli e rucola'),
(7, 'Panino al prosciutto e formaggio', 6, 'Panino con prosciutto cotto, formaggio cheddar, lattuga e pomodoro'),
(8, 'Panino vegetariano piccante', 5, 'Panino con falafel, formaggio feta, peperoncini, lattuga e salsa piccante'),
(9, 'Panino con melanzane alla griglia', 5, 'Panino con melanzane grigliate, mozzarella, pomodori secchi e rucola'),
(10, 'Panino con pollo e avocado', 7, 'Panino con petto di pollo alla griglia, avocado, formaggio brie e lattuga'),
(11, 'Panino al tacchino', 6, 'Panino con tacchino affumicato, formaggio provola, maionese, lattuga e cetrioli'),
(12, 'Panino con roast beef', 7, 'Panino con roast beef, formaggio gorgonzola, cipolle caramellate e rucola'),
(13, 'Panino con pesto di pomodori secchi', 6, 'Panino con pesto di pomodori secchi, mozzarella, lattuga e pomodoro'),
(14, 'Panino con speck e stracchino', 6, 'Panino con speck, stracchino, rucola e aceto balsamico'),
(15, 'Panino al salame piccante', 6, 'Panino con salame piccante, formaggio asiago, peperoncini, lattuga e salsa chili');

-- --------------------------------------------------------

--
-- Table structure for table `panini_ordinati`
--

CREATE TABLE `panini_ordinati` (
  `id` int(11) NOT NULL COMMENT 'Codice univoco per identificare l''entità',
  `id_ordine` int(11) NOT NULL,
  `id_panino` int(11) NOT NULL,
  `quantità` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `panini_ordinati`
--

INSERT INTO `panini_ordinati` (`id`, `id_ordine`, `id_panino`, `quantità`) VALUES
(1, 1, 1, 2),
(2, 1, 2, 1),
(3, 2, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `utenti`
--

CREATE TABLE `utenti` (
  `ID` int(11) NOT NULL COMMENT 'Codice univoco per identificare l''entità',
  `nome` varchar(20) NOT NULL COMMENT 'nome dell''utente',
  `cognome` varchar(20) NOT NULL COMMENT 'cognome dell''utente',
  `data_nascita` date DEFAULT NULL COMMENT 'data nascita dell''utente',
  `telefono` varchar(13) NOT NULL COMMENT 'Recapito telefonico + prefisso stato',
  `email` varchar(100) NOT NULL COMMENT 'email associata all''account',
  `username` varchar(50) NOT NULL COMMENT 'nome utente associto all''account',
  `password` varchar(50) NOT NULL COMMENT 'password associata all''account',
  `data_iscrizione` datetime DEFAULT current_timestamp() COMMENT 'data e ora dell''iscrizione dell''utente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utenti`
--

INSERT INTO `utenti` (`ID`, `nome`, `cognome`, `data_nascita`, `telefono`, `email`, `username`, `password`, `data_iscrizione`) VALUES
(1, 'Mario', 'Rossi', '1990-05-15', '+123456789', 'mario.rossi@example.com', 'mario_rossi', 'password123', '2024-05-01 10:00:00'),
(2, 'Laura', 'Bianchi', '1985-08-20', '+987654321', 'laura.bianchi@example.com', 'laura_bianchi', 'securepwd', '2024-05-02 11:30:00'),
(5, 'hao', 'hao', '2004-12-04', '+3032903203', 'aw0-923@gmail.com', 'hao', 'hao', '2024-05-09 21:04:25'),
(6, 'hao', 'hao', '2004-12-04', '+3032903203', 'aw0-923@gmail.com', 'hao', 'hao', '2024-05-09 21:05:17'),
(7, 'admin', 'admin', '1111-11-11', '11111111', 'admin@admin.com', 'admin', 'admin', '2024-05-11 16:20:15'),
(8, 'wen', 'wen', '1111-11-11', '1234567819', 'wen@libero.it', 'wen', 'wen', '2024-05-12 12:50:31');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codice univoco per identificare l''entità', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `bevande_ordinate`
--
ALTER TABLE `bevande_ordinate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codice univoco per identificare l''entità', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ordini`
--
ALTER TABLE `ordini`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'codice univoco per identificare l''entità', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `panini`
--
ALTER TABLE `panini`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codice univoco per identificare l''entità', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `panini_ordinati`
--
ALTER TABLE `panini_ordinati`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codice univoco per identificare l''entità', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `utenti`
--
ALTER TABLE `utenti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codice univoco per identificare l''entità', AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
