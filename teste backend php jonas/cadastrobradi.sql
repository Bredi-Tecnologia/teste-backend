-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 21-Jan-2023 às 09:52
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cadastrobradi`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(190) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `titulo`) VALUES
(2, 'Eletrodomésticos'),
(3, 'Celulares'),
(4, 'Alimentos'),
(5, 'Informática');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Nome` varchar(255) DEFAULT NULL,
  `Preco` double DEFAULT NULL,
  `id_categoria` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categoria` (`id_categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `Nome`, `Preco`, `id_categoria`) VALUES
(17, 'Geladeira Brastemp Frost Free', 3000, 2),
(12, 'Smartphone LG K70S', 2500.5, 3),
(18, 'Monitor UltraWide 25 Pol', 1720, 5),
(22, 'Fogão Cooktop', 375.24, 2),
(23, 'Micro-ondas Panasonic', 400, 2),
(24, 'Asus Zenphone MAX', 4000, 3),
(25, 'Carne Linguiça', 10.32, 4),
(26, 'PC Gamer Alok', 3567.99, 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
