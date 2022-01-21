-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Jan-2022 às 16:14
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `empresa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `company`
--

CREATE TABLE `company` (
  `cod_company` int(11) NOT NULL,
  `nome` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `nome_fantasia` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `cnpj` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` text COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `responsavel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `company`
--

INSERT INTO `company` (`cod_company`, `nome`, `nome_fantasia`, `cnpj`, `endereco`, `telefone`, `responsavel`) VALUES
(32, 'Overdrive Desenvolvimento de Softwares e Consultoria Em Informatica LTDA', 'Overdrive', '33143114000140', 'Jardim da Colina, Araras - SP', '(19) 99192-1394', 1),
(41, 'Claudio Marcelo Basckeira', 'Claudio Software', '022', 'Rua do claudião', '1999', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_adm`
--

CREATE TABLE `user_adm` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user_adm`
--

INSERT INTO `user_adm` (`id_usuario`, `nome`, `login`, `senha`) VALUES
(1, 'Rafael Mercatelli', '00000000000', '645a8aca5a5b84527c57ee2f153f1946');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `cod_pessoa` int(11) NOT NULL,
  `nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `cnh` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `carro` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `empresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senha` char(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`cod_pessoa`, `nome`, `cpf`, `cnh`, `endereco`, `telefone`, `carro`, `empresa`, `senha`) VALUES
(1, 'Rafael Mercatelli	', '00000000000', '11122233344', 'Jardim da Colina, Araras - SP', '(19) 99192-1394', 'Honde Civic', 'Overdrive ', '12345678'),
(40, 'Ícaro Gabriel', '1234', '1357', 'Rua Lua', '19 98999-9999', 'Ford Ranger', 'Overdrive ', '81dc9bdb52d04dc20036dbd8313ed055'),
(42, 'Guilherme Constantinov', '033333', '03333334', 'Rua Mogi das Cruzes', '033333', 'Fiurino', 'Overdrive ', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`cod_company`);

--
-- Índices para tabela `user_adm`
--
ALTER TABLE `user_adm`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod_pessoa`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `company`
--
ALTER TABLE `company`
  MODIFY `cod_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `user_adm`
--
ALTER TABLE `user_adm`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod_pessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
