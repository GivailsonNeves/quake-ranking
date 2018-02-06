-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 06-Fev-2018 às 00:28
-- Versão do servidor: 5.6.36-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acptdev_quake`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogador`
--

CREATE TABLE `jogador` (
  `id` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `total_mortes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `morte`
--

CREATE TABLE `morte` (
  `partida_id` int(11) NOT NULL,
  `killer` int(11) DEFAULT NULL,
  `killed` int(11) NOT NULL,
  `tipo_morte_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `partida`
--

CREATE TABLE `partida` (
  `id` int(11) NOT NULL,
  `nome` varchar(120) COLLATE utf8_bin NOT NULL,
  `total_mortes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_morte`
--

CREATE TABLE `tipo_morte` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tipo_morte`
--

INSERT INTO `tipo_morte` (`id`, `nome`) VALUES
(1, 'MOD_UNKNOWN'),
(2, 'MOD_SHOTGUN'),
(3, 'MOD_GAUNTLET'),
(4, 'MOD_MACHINEGUN'),
(5, 'MOD_GRENADE'),
(6, 'MOD_GRENADE_SPLASH'),
(7, 'MOD_ROCKET'),
(8, 'MOD_ROCKET_SPLASH'),
(9, 'MOD_PLASMA'),
(10, 'MOD_PLASMA_SPLASH'),
(11, 'MOD_RAILGUN'),
(12, 'MOD_LIGHTNING'),
(13, 'MOD_BFG'),
(14, 'MOD_BFG_SPLASH'),
(15, 'MOD_WATER'),
(16, 'MOD_SLIME'),
(17, 'MOD_LAVA'),
(18, 'MOD_CRUSH'),
(19, 'MOD_TELEFRAG'),
(20, 'MOD_FALLING'),
(21, 'MOD_SUICIDE'),
(22, 'MOD_TARGET_LASER'),
(23, 'MOD_TRIGGER_HURT'),
(24, 'MOD_NAIL'),
(25, 'MOD_CHAINGUN'),
(26, 'MOD_PROXIMITY_MINE'),
(27, 'MOD_KAMIKAZE'),
(28, 'MOD_JUICED'),
(29, 'MOD_GRAPPLE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jogador`
--
ALTER TABLE `jogador`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partida`
--
ALTER TABLE `partida`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo_morte`
--
ALTER TABLE `tipo_morte`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jogador`
--
ALTER TABLE `jogador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `partida`
--
ALTER TABLE `partida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tipo_morte`
--
ALTER TABLE `tipo_morte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
