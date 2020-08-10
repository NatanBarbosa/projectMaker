-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Ago-2020 às 19:45
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_project_maker`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id_funcionario` int(11) NOT NULL,
  `funcao` varchar(75) DEFAULT NULL,
  `salario` float(8,2) NOT NULL DEFAULT 0.00,
  `fk_id_projeto` int(11) DEFAULT NULL,
  `fk_id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id_funcionario`, `funcao`, `salario`, `fk_id_projeto`, `fk_id_usuario`) VALUES
(1, 'Programador back-end', 2500.85, 1, 1),
(2, 'Programador front-end', 1600.00, 1, 1),
(3, 'Churrasqueiro', 100.00, 2, 2),
(4, 'Ator', 450.62, 4, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `informacoes_gerais`
--

CREATE TABLE `informacoes_gerais` (
  `id_projeto` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `custo_total` float(8,2) DEFAULT 0.00,
  `colaboradores` int(11) DEFAULT 0,
  `data_inicio` date NOT NULL DEFAULT curdate(),
  `data_fim` date DEFAULT NULL,
  `tempo_previsto` int(11) DEFAULT NULL,
  `detalhes` text NOT NULL,
  `fk_id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `informacoes_gerais`
--

INSERT INTO `informacoes_gerais` (`id_projeto`, `nome`, `custo_total`, `colaboradores`, `data_inicio`, `data_fim`, `tempo_previsto`, `detalhes`, `fk_id_usuario`) VALUES
(1, 'Desenvolvimento de sistema Web', 5976.35, 3, '2020-08-09', '2020-09-15', 37, 'Desenvolvimento completo de uma página web, incluindo a interatividade com o usuário e a resposta dinâmica com o servidor.\r\nEsse projeto será para um cliente que deseja uma loja virtual para vender ursinhos de pelúcia.', 1),
(2, 'Churrascão no seu zé', 420.00, 1, '2020-08-09', NULL, NULL, 'Churrascão na casa do seu zé rapaiz, kkkkk', 2),
(3, 'Desenho do seu Alberto', 35.00, NULL, '2020-08-09', '2020-08-16', 7, 'Fazer um desenho realista do seu Alberto e a filha dele', 2),
(4, 'Visita ao orfanato', 450.62, 1, '2020-08-09', NULL, NULL, 'Visita ao orfanato com um ator fantasiado de Batman pra entretenimento das crianças', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `materiais`
--

CREATE TABLE `materiais` (
  `id_material` int(11) NOT NULL,
  `nome_material` varchar(75) DEFAULT NULL,
  `preco` float(8,2) NOT NULL DEFAULT 0.00,
  `fk_id_projeto` int(11) DEFAULT NULL,
  `fk_id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `materiais`
--

INSERT INTO `materiais` (`id_material`, `nome_material`, `preco`, `fk_id_projeto`, `fk_id_usuario`) VALUES
(1, 'IDE jetBrains', 500.00, 1, 1),
(2, 'Domínio HostNet', 425.00, 1, 1),
(3, 'Carnes', 250.00, 2, 2),
(4, 'Aluguel da churrasqueira', 50.00, 2, 2),
(5, 'Carvão', 20.00, 2, 2),
(6, 'Lápis coloridos', 15.00, 3, 2),
(7, 'Folha A4', 10.00, 3, 2),
(8, 'Lápis de sombreamento', 5.00, 3, 2),
(9, 'Fine pen de contorno', 5.00, 3, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `email`, `senha`) VALUES
(1, 'user@teste.com', '1234'),
(2, 'jose@teste.com.br', '1234');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD KEY `fk_id_projeto` (`fk_id_projeto`),
  ADD KEY `fk_id_usuario` (`fk_id_usuario`);

--
-- Índices para tabela `informacoes_gerais`
--
ALTER TABLE `informacoes_gerais`
  ADD PRIMARY KEY (`id_projeto`),
  ADD KEY `fk_id_usuario` (`fk_id_usuario`);

--
-- Índices para tabela `materiais`
--
ALTER TABLE `materiais`
  ADD PRIMARY KEY (`id_material`),
  ADD KEY `fk_id_projeto` (`fk_id_projeto`),
  ADD KEY `fk_id_usuario` (`fk_id_usuario`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `informacoes_gerais`
--
ALTER TABLE `informacoes_gerais`
  MODIFY `id_projeto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `materiais`
--
ALTER TABLE `materiais`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `funcionarios_ibfk_1` FOREIGN KEY (`fk_id_projeto`) REFERENCES `informacoes_gerais` (`id_projeto`),
  ADD CONSTRAINT `funcionarios_ibfk_2` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuarios` (`id_user`);

--
-- Limitadores para a tabela `informacoes_gerais`
--
ALTER TABLE `informacoes_gerais`
  ADD CONSTRAINT `informacoes_gerais_ibfk_1` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuarios` (`id_user`);

--
-- Limitadores para a tabela `materiais`
--
ALTER TABLE `materiais`
  ADD CONSTRAINT `materiais_ibfk_1` FOREIGN KEY (`fk_id_projeto`) REFERENCES `informacoes_gerais` (`id_projeto`),
  ADD CONSTRAINT `materiais_ibfk_2` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuarios` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
