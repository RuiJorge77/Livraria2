-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07-Jan-2021 às 15:51
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `livraria2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `autores`
--

CREATE TABLE `autores` (
  `id_autor` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nacionalidade` varchar(20) DEFAULT NULL,
  `data_nascimento` datetime DEFAULT NULL,
  `fotografia` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `autores`
--

INSERT INTO `autores` (`id_autor`, `nome`, `nacionalidade`, `data_nascimento`, `fotografia`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Luis Borges Gouveia', 'Portugês', NULL, NULL, NULL, NULL, NULL),
(2, 'João Ranito', 'Portugês', NULL, NULL, NULL, NULL, NULL),
(3, 'Nuno Magalhães Ribeiro', 'Portugês', NULL, NULL, NULL, NULL, NULL),
(4, 'Paulo Rurato', 'Português', NULL, NULL, NULL, NULL, NULL),
(5, 'Sofia Gaio', 'Portugês', NULL, NULL, NULL, NULL, NULL),
(6, 'Rui Moreira', 'Portugês', NULL, NULL, NULL, NULL, NULL),
(7, 'Margarida Bairrão', 'Português', NULL, NULL, NULL, NULL, NULL),
(8, 'Judite Gonçalves de Freitas', 'Português', NULL, NULL, NULL, NULL, NULL),
(9, 'António Borges Regedor', 'Português', NULL, NULL, NULL, NULL, NULL),
(10, 'José Dias Coelho', 'Português', NULL, NULL, NULL, NULL, NULL),
(11, 'Paula Moura', 'Português', NULL, NULL, NULL, NULL, NULL),
(12, 'Luis Cunha', 'Português', NULL, NULL, NULL, NULL, NULL),
(13, 'Pereira Alfredo', 'Angolano', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `autores_livros`
--

CREATE TABLE `autores_livros` (
  `id_al` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `id_livro` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `autores_livros`
--

INSERT INTO `autores_livros` (`id_al`, `id_autor`, `id_livro`, `updated_at`, `created_at`) VALUES
(3, 2, 17, '2020-12-11 15:09:52', '2020-12-11 15:09:52'),
(4, 3, 17, '2020-12-11 15:09:52', '2020-12-11 15:09:52'),
(5, 2, 18, '2020-12-11 15:20:19', '2020-12-11 15:20:19'),
(6, 3, 18, '2020-12-11 15:20:19', '2020-12-11 15:20:19'),
(13, 2, 21, '2021-01-07 10:04:36', '2021-01-07 10:04:36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id_livro` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `comentario` varchar(255) NOT NULL,
  `id_comentarios` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `deleted_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `edicoes`
--

CREATE TABLE `edicoes` (
  `id_livro` int(11) NOT NULL,
  `id_editora` int(11) NOT NULL,
  `data` datetime DEFAULT NULL,
  `observacoes` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `editoras`
--

CREATE TABLE `editoras` (
  `id_editora` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `morada` varchar(255) DEFAULT NULL,
  `observacoes` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `editoras`
--

INSERT INTO `editoras` (`id_editora`, `nome`, `morada`, `observacoes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SPI-Principia', '', NULL, NULL, NULL, NULL),
(2, 'Edições Universidade Fernando Pessoa', '', NULL, NULL, NULL, NULL),
(3, 'Edições GestKnowing', '', NULL, NULL, NULL, NULL),
(4, 'VDM - Verlag Dr. Muller', '', NULL, NULL, NULL, NULL),
(5, 'Sílabo', '', NULL, NULL, NULL, NULL),
(6, 'Green Lines Instituto', '', NULL, NULL, NULL, NULL),
(7, 'Lambert Academic Publishing', '', NULL, NULL, NULL, NULL),
(8, 'Kwigia editora', '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `editoras_livros`
--

CREATE TABLE `editoras_livros` (
  `id_editora` int(11) NOT NULL,
  `id_livro` int(11) NOT NULL,
  `titulo` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `editoras_livros`
--

INSERT INTO `editoras_livros` (`id_editora`, `id_livro`, `titulo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 10, NULL, '2020-12-11 15:28:08', '2020-12-11 15:28:08', NULL),
(3, 21, NULL, '2021-01-07 13:56:02', '2021-01-07 13:56:02', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `generos`
--

CREATE TABLE `generos` (
  `id_genero` int(11) NOT NULL,
  `designacao` varchar(30) NOT NULL,
  `observacoes` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `generos`
--

INSERT INTO `generos` (`id_genero`, `designacao`, `observacoes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Memórias e Testemunhos', NULL, NULL, NULL, NULL),
(2, 'Direito Civil ', NULL, NULL, NULL, NULL),
(3, 'Culinária', NULL, NULL, NULL, NULL),
(4, 'Romance', NULL, NULL, NULL, NULL),
(5, 'Policial e Thriller', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id_livro` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `idioma` varchar(10) NOT NULL,
  `total_paginas` int(11) DEFAULT NULL,
  `data_edicao` datetime DEFAULT NULL,
  `isbn` varchar(13) DEFAULT NULL,
  `observacoes` varchar(255) DEFAULT NULL,
  `imagem_capa` varchar(255) DEFAULT NULL,
  `id_genero` int(11) DEFAULT NULL,
  `id_autor` int(11) DEFAULT NULL,
  `sinopse` varchar(255) DEFAULT NULL,
  `pdf` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id_livro`, `titulo`, `idioma`, `total_paginas`, `data_edicao`, `isbn`, `observacoes`, `imagem_capa`, `id_genero`, `id_autor`, `sinopse`, `pdf`, `created_at`, `updated_at`, `deleted_at`, `id_user`) VALUES
(1, 'sistema de informação de apoio a gestão', 'Portugês', NULL, NULL, '9728589433', NULL, NULL, 1, 1, NULL, '', NULL, NULL, NULL, NULL),
(2, 'cidades e regiões digitais:impacte na cidade e nas pessoas', 'Portugês', NULL, NULL, '9728830033', NULL, NULL, 2, 1, NULL, '', NULL, NULL, NULL, NULL),
(3, 'Informatica e Competencias Tecnologicas para a Sociedade da Informação', 'Portugês', NULL, NULL, '9789728830304', NULL, NULL, 1, 3, NULL, '', NULL, NULL, NULL, NULL),
(4, 'Readings in Information Society', 'Inglês', NULL, NULL, '9789727228997', NULL, NULL, 3, 5, NULL, '', NULL, NULL, NULL, NULL),
(5, 'Sociedade da Informação: balanço e implicações ', 'Português', NULL, NULL, '9789728830182', NULL, NULL, 3, 7, NULL, '', NULL, NULL, NULL, NULL),
(6, 'O Tribunal de Contas e as Autarquias Locais', 'Portugês', NULL, NULL, '9789899936614', NULL, NULL, 2, 7, NULL, '', NULL, NULL, NULL, NULL),
(7, 'Informática e Competências Tecnológicas para a Sociedade da Informação 2ed', 'Português', NULL, NULL, '9789728830304', NULL, NULL, 2, 8, NULL, '', NULL, NULL, NULL, NULL),
(8, 'Negócio Eletrónico - conceitos e perspetivas de desenvolvimento', 'Português', NULL, NULL, '9789899552258', NULL, NULL, 1, 8, NULL, '', NULL, NULL, NULL, NULL),
(9, 'Gestão da Informação na Biblioteca Escolar', 'Português', NULL, NULL, '9789722314916', NULL, NULL, 1, 9, NULL, '', NULL, NULL, NULL, NULL),
(10, 'A virtual environment to share knowledge', 'Inglês', NULL, NULL, '9781351729901', NULL, NULL, 2, 4, NULL, '', NULL, NULL, NULL, NULL),
(11, 'Ciência da Informação: contributos para o seu estudo', 'Português', NULL, NULL, '9789896430900', NULL, NULL, 1, 4, NULL, '', NULL, NULL, NULL, NULL),
(12, 'Repensar a Sociedade da Informação e do Conhecimento no Início do Século XXI', 'Português', NULL, NULL, '9789726186953', NULL, NULL, 3, 4, NULL, '', NULL, NULL, NULL, NULL),
(13, 'Gestão da Informação em Museus: uma contribuição para o seu estudo', 'Português', NULL, NULL, '9789899901394', NULL, NULL, 2, 4, NULL, '', NULL, NULL, NULL, NULL),
(14, 'Web 2.0 and Higher Education. A psychological perspective', 'Inglês', NULL, NULL, '9783659683466', NULL, NULL, 1, 1, NULL, '', NULL, NULL, NULL, NULL),
(15, 'Contribuições para a discussão de um modelo de Governo Eletrónico Local para Angola', 'Português', NULL, NULL, '9789899933200', NULL, NULL, 1, 13, NULL, '', NULL, NULL, NULL, NULL),
(21, 'История луиса мигеля', 'Russo', NULL, NULL, '6454777475607', NULL, '1610029860_Koala.jpg', 5, NULL, NULL, '', '2021-01-07 10:04:36', '2021-01-07 14:31:00', NULL, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_user` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal' COMMENT 'admin ou normal',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `tipo_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Rui', 'a14111@aedah.pt', NULL, '$2y$10$OJdzfoEL8i5M7vEmnSZxh.PgbA2o/WO4PkxTGVCu9Tzlc4XXqD59m', 'admin', NULL, '2020-12-11 15:05:42', '2020-12-11 15:05:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indexes for table `autores_livros`
--
ALTER TABLE `autores_livros`
  ADD PRIMARY KEY (`id_al`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentarios`),
  ADD UNIQUE KEY `id_livro` (`id_livro`,`id_user`);

--
-- Indexes for table `edicoes`
--
ALTER TABLE `edicoes`
  ADD PRIMARY KEY (`id_livro`,`id_editora`);

--
-- Indexes for table `editoras`
--
ALTER TABLE `editoras`
  ADD PRIMARY KEY (`id_editora`);

--
-- Indexes for table `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indexes for table `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id_livro`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autores`
--
ALTER TABLE `autores`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `autores_livros`
--
ALTER TABLE `autores_livros`
  MODIFY `id_al` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `editoras`
--
ALTER TABLE `editoras`
  MODIFY `id_editora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `generos`
--
ALTER TABLE `generos`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `livros`
--
ALTER TABLE `livros`
  MODIFY `id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
