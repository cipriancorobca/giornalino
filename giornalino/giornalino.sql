-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2023 at 06:31 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `giornalino`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblaccount`
--

CREATE TABLE `tblaccount` (
  `idAcc` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`idAcc`, `username`, `password`, `role`) VALUES
(1, 'ciprian.corobca', '$2y$10$lNEolT008NNRZUpTtuWvEuxhuQRITrrsp9y/0qxKY2kvz8baOkH.e', 'Scrittori'),
(2, 'michele.molent', '$2y$10$E/2bSyj.8NjxbpbWLnw.b.C2boK9S8w8D6FnlIZcMPKLxLPgHUj/2', 'Scrittori'),
(3, 'alessandro.ravoiu', '$2y$10$WRaOuQkG6WVVMZKKi4kZruMgrBEn4wnyvnUf6kCo0FbX08xvpgDge', 'Validatori'),
(4, 'imran.zafar', '$2y$10$BCeH5IkiJ6XGt6REO6fd4egx8GONXpuCGntehUGwnTNqaq4M3SHuG', 'Validatori');

-- --------------------------------------------------------

--
-- Table structure for table `tblarticoli`
--

CREATE TABLE `tblarticoli` (
  `idArt` int(11) NOT NULL,
  `titolo` varchar(100) NOT NULL,
  `contenuto` text NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `dataP` date NOT NULL,
  `scrittore` int(11) NOT NULL,
  `validato` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblarticoli`
--

INSERT INTO `tblarticoli` (`idArt`, `titolo`, `contenuto`, `categoria`, `dataP`, `scrittore`, `validato`) VALUES
(1, 'Una papera gigante', 'l\'avevano esposta in Canada su un fiume senza alcuna ragione', 'ciao', '2023-03-27', 553092, 1588),
(2, 'Quanto guadagna un deputato per afondare sto paese in piu problemi', 'tanto', 'HOT', '2023-03-09', 553092, NULL),
(4, 'Multato perche aveva il biglietto', 'E successo a un giovane studente del gigoletti che stava tornando a casa in treno', 'news', '2023-03-22', 550535, NULL),
(6, 'Dove la Dasu?', 'Le opzioni sono molte:\r\no e a casa facendo esercizi di matematica\r\no e al fronte e i serbi stano reggendo perche i nemici non hanno fatto neanche un esercizio di matematica\r\no sta costruendo un condominio che reggera tutti i terremoti e la fine del mondo perche chi ci ha lavorato ha svolto gli esercizi di matematica', 'scuola', '2023-03-02', 550535, 1521),
(7, 'Uomo usa un avocado per compiere con successo 2 rapine.', 'Un uomo di 31 anni di Livorno condannato per aver rubato circa 16 500 EUR usando un avocado come arma.\r\n\r\nL’uomo proveniente da una famiglia che aveva sofferto abbastanza crisi economiche, la notte del 17 Aprile decise che per risolvere un’altra di queste perdite doveva ricorre ad azioni fuori dalle regole.L’uomo entra un piccolo negozio alimentare nella Piazza Mazzini e tende al cassiere una lettera.La lettera cita: „Dammi i soldi o getto questa grenada”.La grenada era infatti l’avocado che l’uomo dipinse di nero per farlo sembrare una grenada.\r\n\r\nIl suo piano funziono e l’uomo si dirige verso la sua abitazione senza incontarre problemi con un sacchetto nel quale c’erano circa 6 500 EUR.\r\n\r\nDopo 5 giorni, l’uomo decide di farlo un’altra volta, ma stavolta in un supermercato piu grande.Preso lo stesso avocado dipinto in nero, l’uomo si dirige verso il Mercato Centrale di Livorno, dove va alla quarta cassa e tende la lettera al cassiere.Stavolta, il cassiere chiama degli ufficiali della sicurezza pero l’uomo seppe sfuggire dalle loro mani e minacciarli con l’avocado in mano pronto a gettarlo.Pero non fu obbligato a gettarlo e infine lascia il supermercato con circa 10 000 EUR.\r\n\r\nDopo una settimana la polizia comincio a fare delle ricerche,rintracciando le posizioni del suo telefono nel tempo usando Google Maps per portarli a trovare l’uomo colpevole.Inoltre, la polizia ha riconosciuto l’uomo per esser stato incarcerato in passato per rapina.\r\n', 'altro', '2020-05-05', 550535, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblutenti`
--

CREATE TABLE `tblutenti` (
  `matricola` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `idAcc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblutenti`
--

INSERT INTO `tblutenti` (`matricola`, `nome`, `cognome`, `idAcc`) VALUES
(1521, 'Imran', 'Zafar', 4),
(1588, 'Alessandro', 'Ravoiu', 3),
(550535, 'Ciprian', 'Corobca', 1),
(553092, 'Michele', 'Molent', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD PRIMARY KEY (`idAcc`);

--
-- Indexes for table `tblarticoli`
--
ALTER TABLE `tblarticoli`
  ADD PRIMARY KEY (`idArt`),
  ADD KEY `scrittore` (`scrittore`),
  ADD KEY `validato` (`validato`);

--
-- Indexes for table `tblutenti`
--
ALTER TABLE `tblutenti`
  ADD PRIMARY KEY (`matricola`),
  ADD KEY `idAcc` (`idAcc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblaccount`
--
ALTER TABLE `tblaccount`
  MODIFY `idAcc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblarticoli`
--
ALTER TABLE `tblarticoli`
  MODIFY `idArt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblarticoli`
--
ALTER TABLE `tblarticoli`
  ADD CONSTRAINT `tblarticoli_ibfk_1` FOREIGN KEY (`scrittore`) REFERENCES `tblutenti` (`matricola`),
  ADD CONSTRAINT `tblarticoli_ibfk_2` FOREIGN KEY (`validato`) REFERENCES `tblutenti` (`matricola`);

--
-- Constraints for table `tblutenti`
--
ALTER TABLE `tblutenti`
  ADD CONSTRAINT `tblutenti_ibfk_1` FOREIGN KEY (`idAcc`) REFERENCES `tblaccount` (`idAcc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
