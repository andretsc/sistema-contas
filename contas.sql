-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Ago-2021 às 20:21
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `contas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_categorias`
--

CREATE TABLE `tbl_categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `tipo_conta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbl_categorias`
--

INSERT INTO `tbl_categorias` (`id`, `nome`, `tipo_conta`) VALUES
(1, 'Aluguel Editado', 1),
(3, 'Faculdade', 1),
(7, 'Clientes', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_contas`
--

CREATE TABLE `tbl_contas` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `data` date NOT NULL DEFAULT current_timestamp(),
  `categoria` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `valor` float(10,2) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbl_contas`
--

INSERT INTO `tbl_contas` (`id`, `descricao`, `data`, `categoria`, `tipo`, `valor`, `status`) VALUES
(1, 'Mensalidade Minha Vó', '2021-08-17', 3, 1, 450.00, 1),
(2, 'Aluguel Casa Mãe', '2021-08-17', 1, 1, 855.00, 1),
(6, 'Outro Teste', '2021-08-18', 7, 2, 175.00, 3),
(9, 'Conta Atrasada', '2021-08-12', 3, 1, 121.00, 1),
(10, 'Teste Atrasada', '2021-08-13', 7, 2, 121.00, 3),
(11, 'Teste Dinheiro', '2021-09-25', 3, 1, 254.35, 2),
(14, 'Conta a Pagar no Celular', '2021-08-17', 3, 1, 125.00, 1),
(16, 'Conta a Receber asas', '2021-08-13', 7, 2, 235.65, 4),
(17, 'Teste Pagar', '2021-08-21', 1, 1, 4545.34, 2),
(18, 'Testando Provando', '2021-08-11', 3, 1, 121.32, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tipo_conta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbl_status`
--

INSERT INTO `tbl_status` (`id`, `status`, `tipo_conta`) VALUES
(1, 'Paga', 1),
(2, 'Não Paga', 1),
(3, 'Recebida', 2),
(4, 'Não Recebida', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_contas`
--

CREATE TABLE `tipo_contas` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipo_contas`
--

INSERT INTO `tipo_contas` (`id`, `descricao`) VALUES
(1, 'A PAGAR'),
(2, 'A RECEBER');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`) VALUES
(1, 'Gustavo Alves', 'gustavo', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbl_categorias`
--
ALTER TABLE `tbl_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tbl_contas`
--
ALTER TABLE `tbl_contas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tipo_contas`
--
ALTER TABLE `tipo_contas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_categorias`
--
ALTER TABLE `tbl_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tbl_contas`
--
ALTER TABLE `tbl_contas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tipo_contas`
--
ALTER TABLE `tipo_contas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
