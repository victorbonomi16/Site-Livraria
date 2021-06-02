-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Maio-2021 às 21:45
-- Versão do servidor: 5.7.17
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
-- Database: `livraria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

CREATE TABLE `autor` (
  `codautor` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `nacionalidade` varchar(30) NOT NULL,
  `ocupacao` varchar(30) NOT NULL,
  `datanascimento` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `autor`
--

INSERT INTO `autor` (`codautor`, `nome`, `nacionalidade`, `ocupacao`, `datanascimento`) VALUES
(1, 'Cleber Santana', 'Brasileiro', 'Escritor', '1995-07-15'),
(2, 'July', 'Canadense', 'Escritora', '1994-07-16'),
(5, 'joana', 'brasileiro', 'pedreiro', '2021-05-05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `codcategoria` int(5) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `codprateleira` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`codcategoria`, `descricao`, `codprateleira`) VALUES
(1, 'Suspense', 1),
(2, 'comedia', 2),
(3, 'acao', 1),
(5, 'aterrorizante', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `editora`
--

CREATE TABLE `editora` (
  `codeditora` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `telefone` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `editora`
--

INSERT INTO `editora` (`codeditora`, `nome`, `endereco`, `cidade`, `estado`, `telefone`) VALUES
(1, 'Herbert Richars', 'Boa Vista', 'Criciuma', 'SC', 34475522),
(2, 'Alberto Richard', 'Oselame', 'Ararangua', 'SC', 46573532);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `codlivro` int(5) NOT NULL,
  `ISBN` int(20) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `ano` int(4) NOT NULL,
  `nrpaginas` int(5) NOT NULL,
  `edicao` varchar(10) NOT NULL,
  `idioma` varchar(10) NOT NULL,
  `codeditora` int(5) NOT NULL,
  `codautor` int(5) NOT NULL,
  `codcategoria` int(5) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`codlivro`, `ISBN`, `titulo`, `ano`, `nrpaginas`, `edicao`, `idioma`, `codeditora`, `codautor`, `codcategoria`, `foto`) VALUES
(34, 121212133, 'pelego', 2015, 23, '2', 'portugues', 1, 5, 3, 'Array'),
(1, 12345678, 'cocozada', 2015, 23, '2', 'portugues', 1, 5, 3, 'fotos2/224bbbd3d04d614992ba362e2bc7c4bf.png'),
(3, 121212133, 'CABECA DE OVO', 2021, 23, '2', 'INGLES', 1, 5, 3, 'fotos2/edb64fce4448d0685c2aa078da4d1db7.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `prateleira`
--

CREATE TABLE `prateleira` (
  `codprateleira` int(5) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `capacidade` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `prateleira`
--

INSERT INTO `prateleira` (`codprateleira`, `descricao`, `capacidade`) VALUES
(1, 'Suspenses', 20),
(2, 'kkk', 5),
(4, 'terror', 23),
(45, 'aterrorizante', 34);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `codusuario` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`codusuario`, `nome`, `login`, `senha`) VALUES
(1, 'victor', 'victorr', '123456'),
(55, 'ggrgrtg', 'cleber', '123456');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `codusuarios` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`codusuarios`, `nome`, `login`, `senha`, `foto`) VALUES
(1, 'victor bonomi', 'victorr', '123456', 'fotos/21af6c567d60e04db79baba267318545.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`codautor`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`codcategoria`),
  ADD KEY `codprateleira` (`codprateleira`);

--
-- Indexes for table `editora`
--
ALTER TABLE `editora`
  ADD PRIMARY KEY (`codeditora`);

--
-- Indexes for table `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`codlivro`),
  ADD KEY `codeditora` (`codeditora`),
  ADD KEY `codautor` (`codautor`),
  ADD KEY `codcategoria` (`codcategoria`);

--
-- Indexes for table `prateleira`
--
ALTER TABLE `prateleira`
  ADD PRIMARY KEY (`codprateleira`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codusuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`codusuarios`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
