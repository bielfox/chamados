-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 02, 2015 at 05:53 PM
-- Server version: 5.6.24-0ubuntu2
-- PHP Version: 5.6.4-4ubuntu6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `imply`
--

-- --------------------------------------------------------

--
-- Table structure for table `anexos`
--

CREATE TABLE IF NOT EXISTS `anexos` (
`id` int(11) NOT NULL,
  `id_chamado` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `arquivo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chamados`
--

CREATE TABLE IF NOT EXISTS `chamados` (
`id` int(9) NOT NULL,
  `evento` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `local` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `posicao` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `solicitante` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `data_inicio` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `descricao` text COLLATE utf8_unicode_ci NOT NULL,
  `prioridade` int(1) NOT NULL,
  `data_final` date NOT NULL,
  `hora_final` time NOT NULL,
  `concluido` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chamados`
--

INSERT INTO `chamados` (`id`, `evento`, `local`, `posicao`, `solicitante`, `data_inicio`, `hora_inicio`, `descricao`, `prioridade`, `data_final`, `hora_final`, `concluido`) VALUES
(28, 'Gabriel', '', '23', '', '2015-05-28', '17:06:00', '', 1, '0000-00-00', '00:00:00', 1),
(29, 'Gabriel', '', '', '', '2015-05-28', '17:06:00', '', 1, '0000-00-00', '00:00:00', 1),
(30, 'Gabriel', '', '', '', '2015-05-28', '17:07:00', '', 1, '0000-00-00', '00:00:00', 1),
(33, 'Flamengo X Fluminense', '', '', '', '2015-05-29', '08:59:00', '', 1, '0000-00-00', '00:00:00', 1),
(34, 'Flamengo X Fluminense', '', '', '', '2015-05-29', '08:59:00', '', 1, '0000-00-00', '00:00:00', 1),
(35, 'Flamengo X Fluminense', '', '', '', '2015-05-29', '08:59:00', '', 2, '0000-00-00', '00:00:00', 1),
(36, 'Gabriel', '', '', '', '2015-06-02', '10:33:00', '', 0, '0000-00-00', '00:00:00', 1),
(37, 'Flamengo X Fluminense', '', '', '', '2015-06-02', '11:03:00', '', 0, '0000-00-00', '00:00:00', 1),
(38, 'Flamengo X Fluminense', '', '', '', '2015-06-02', '12:26:00', '', 0, '2015-06-02', '00:00:00', 1),
(39, 'teste', '', '', '', '2015-06-02', '12:32:00', '', 0, '0000-00-00', '00:00:00', 1),
(40, 'teste', '', '', '', '2015-06-02', '12:50:00', '', 0, '2018-10-02', '00:00:00', 1),
(41, 'Flamengo X Fluminense', 'Bilheteria 3', '5', 'Christian', '2015-06-02', '15:14:00', 'PDV nÃ£o liga', 3, '0000-00-00', '00:00:00', 1),
(42, 'eqeqe', '', '', '', '2015-06-02', '17:33:00', '', 0, '0000-00-00', '00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anexos`
--
ALTER TABLE `anexos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chamados`
--
ALTER TABLE `chamados`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anexos`
--
ALTER TABLE `anexos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `chamados`
--
ALTER TABLE `chamados`
MODIFY `id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
