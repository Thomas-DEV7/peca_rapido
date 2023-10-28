-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Out-2023 às 04:07
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pecarapido`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `cpf_cnpj` varchar(20) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `logradouro` varchar(255) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `numero_casa` varchar(10) DEFAULT NULL,
  `url_img` varchar(255) DEFAULT NULL,
  `nome_usuario` varchar(100) DEFAULT NULL,
  `nivel_acesso` enum('admin','cliente','fornecedor') DEFAULT NULL,
  `numero_cartao` varchar(20) DEFAULT NULL,
  `cvv_cartao` varchar(4) DEFAULT NULL,
  `nome_titular_cartao` varchar(255) DEFAULT NULL,
  `validade_cartao` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `telefone`, `email`, `senha`, `cpf_cnpj`, `cep`, `logradouro`, `bairro`, `cidade`, `estado`, `numero_casa`, `url_img`, `nome_usuario`, `nivel_acesso`, `numero_cartao`, `cvv_cartao`, `nome_titular_cartao`, `validade_cartao`) VALUES
(1, 'Thomas Felipe Bastos', '13981551995', 'thomas.felip16@gmail.com', '545454', '545454', NULL, NULL, NULL, NULL, NULL, NULL, 'https://a.imagem.app/oYotJS.jpeg', NULL, 'admin', NULL, NULL, NULL, NULL),
(2, 'Andrey tchola', '13999111111', 'andreytchola@teste.com', '1234', '1212112121', NULL, NULL, NULL, NULL, NULL, NULL, 'https://imgb.ifunny.co/images/3fbe7ccec4c538c008b520c997c70f5c37c73472fcec583a9d5414f42cf0d2e8_1.jpg', NULL, 'admin', NULL, NULL, NULL, NULL),
(3, 'thiago', '121121', 'thi@ago.com', '1234', '123131', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cliente', NULL, NULL, NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf_cnpj` (`cpf_cnpj`),
  ADD UNIQUE KEY `nome_usuario` (`nome_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
