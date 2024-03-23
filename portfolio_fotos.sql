-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04/03/2024 às 13:22
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `portfolio_fotos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `fotos`
--

CREATE TABLE `fotos` (
  `nome_foto` varchar(255) NOT NULL,
  `posicao` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `titulo` varchar(55) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `fotos`
--

INSERT INTO `fotos` (`nome_foto`, `posicao`, `categoria`, `titulo`, `descricao`) VALUES
('65e078c9a1c52.jpg', '', 'retratos', 'minecraft', 'foto do steve'),
('65e07906ae631.jpg', '', 'arquitetura', 'predio', 'foto do predio'),
('65e07996ce07d.jpg', '', 'retratos', 'cavalo', 'foto do cavalo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `adm` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `telefone`, `email`, `senha`, `adm`) VALUES
(1, 'asaf', '123', 'ee@umbolinha', 'ola', ''),
(2, 'richard', '123', 'a@bolinha', '123', ''),
(4, 'Richard', '1234', 'oi@oi', '$2y$10$pWELkNIod1jvSek2uP8ZsOH/CpA8Cod1We1le5UtJXS8/hvUehRlm', ''),
(5, 'Eduardo', '419080807676', 'sdudu2598@gmail.com', '$2y$10$Iz/RULlKm4k24pTVilSCXOle1OOJWaJRDK0mud5K9Py9ra4ud.Q0K', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
