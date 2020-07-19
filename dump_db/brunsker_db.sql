-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Tempo de geração: 19-Jul-2020 às 02:33
-- Versão do servidor: 5.7.28
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `brunsker_db`
--
CREATE DATABASE IF NOT EXISTS `brunsker_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `brunsker_db`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bairros`
--

DROP TABLE IF EXISTS `bairros`;
CREATE TABLE IF NOT EXISTS `bairros` (
  `cd_bairro` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cd_cidade` bigint(20) UNSIGNED NOT NULL,
  `ds_bairro_nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cd_bairro`),
  KEY `bairros_cd_cidade_foreign` (`cd_cidade`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `bairros`
--

INSERT INTO `bairros` (`cd_bairro`, `cd_cidade`, `ds_bairro_nome`, `created_at`, `updated_at`) VALUES
(1, 1, 'Padre Eustaquio', NULL, NULL),
(2, 1, 'Alípio de Melo', NULL, NULL),
(3, 1, 'Savassi', NULL, NULL),
(4, 1, 'Pampulha', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

DROP TABLE IF EXISTS `cidades`;
CREATE TABLE IF NOT EXISTS `cidades` (
  `cd_cidade` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cd_uf` bigint(20) UNSIGNED NOT NULL,
  `ds_cidade_nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cd_cidade`),
  KEY `cidades_cd_uf_foreign` (`cd_uf`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `cidades`
--

INSERT INTO `cidades` (`cd_cidade`, `cd_uf`, `ds_cidade_nome`, `created_at`, `updated_at`) VALUES
(1, 11, 'Belo Horizonte', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imoveis`
--

DROP TABLE IF EXISTS `imoveis`;
CREATE TABLE IF NOT EXISTS `imoveis` (
  `cd_imovel` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ds_imovel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qt_quarto` int(10) UNSIGNED NOT NULL,
  `metros_quadrados` double(8,2) NOT NULL,
  `cd_bairro` bigint(20) UNSIGNED NOT NULL,
  `cd_uf` bigint(20) UNSIGNED NOT NULL,
  `cd_cidade` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `preco` double(9,2) NOT NULL,
  `id_tipo_anuncio` bigint(20) UNSIGNED NOT NULL,
  `titulo_imovel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`cd_imovel`),
  KEY `imoveis_cd_bairro_foreign` (`cd_bairro`),
  KEY `imoveis_cd_uf_foreign` (`cd_uf`),
  KEY `imoveis_cd_cidade_foreign` (`cd_cidade`),
  KEY `imoveis_id_tipo_anuncio_foreign` (`id_tipo_anuncio`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `imoveis`
--

INSERT INTO `imoveis` (`cd_imovel`, `ds_imovel`, `qt_quarto`, `metros_quadrados`, `cd_bairro`, `cd_uf`, `cd_cidade`, `created_at`, `updated_at`, `preco`, `id_tipo_anuncio`, `titulo_imovel`) VALUES
(10, 'Apartamento com 3 quartos localizado na região noroeste do Belo Horizonte para alugar.', 3, 700.00, 1, 11, 1, '2020-07-19 05:02:34', '2020-07-19 05:02:34', 1500.00, 1, 'Apartamento, bairro Padre Eustaquio');

-- --------------------------------------------------------

--
-- Estrutura da tabela `logradouros`
--

DROP TABLE IF EXISTS `logradouros`;
CREATE TABLE IF NOT EXISTS `logradouros` (
  `cd_logradouro` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cd_bairro` bigint(20) UNSIGNED NOT NULL,
  `ds_logradouro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ds_logradouro_nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_logradouro_cep` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cd_logradouro`),
  KEY `logradouros_cd_bairro_foreign` (`cd_bairro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_01_16_193916_create_uf', 2),
(5, '2020_01_16_000000_create_uf', 3),
(6, '2020_01_15_000000_create_uf', 4),
(7, '2020_02_16_000000_create_cidades', 4),
(8, '2020_03_16_000000_creat_e_bairros', 4),
(9, '2020_04_16_000000_create_logradouros', 4),
(10, '2020_07_17_134213_create_imoveis_table', 5),
(12, '2020_07_18_000000_create_tipo_anuncio_table', 6),
(13, '2020_07_18_183607_add_preco_table_imoveis', 6),
(14, '2020_07_18_203304_add_titulo_imoveis', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_anuncio`
--

DROP TABLE IF EXISTS `tipo_anuncio`;
CREATE TABLE IF NOT EXISTS `tipo_anuncio` (
  `id_tipo_anuncio` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ds_tipo_anuncio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_tipo_anuncio`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tipo_anuncio`
--

INSERT INTO `tipo_anuncio` (`id_tipo_anuncio`, `ds_tipo_anuncio`, `created_at`, `updated_at`) VALUES
(1, 'Locação', NULL, NULL),
(2, 'Venda', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `uf`
--

DROP TABLE IF EXISTS `uf`;
CREATE TABLE IF NOT EXISTS `uf` (
  `cd_uf` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ds_uf_sigla` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ds_uf_nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cd_uf`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `uf`
--

INSERT INTO `uf` (`cd_uf`, `ds_uf_sigla`, `ds_uf_nome`, `created_at`, `updated_at`) VALUES
(11, 'MG', 'Minas Gerais', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$5cXObK41LFpTEvVxFu7tWeqRciaHHsXeL53dDSoIBoNiv7st6gvuu', NULL, '2020-07-16 21:37:07', '2020-07-16 21:37:07'),
(2, 'Vitor', 'vitor@email.com', NULL, '$2y$10$qSJgQMLM8w/LUzRI.uwdx.qkn/GXy6ItAeZHafR4haIGgKfN8pc32', NULL, '2020-07-19 05:23:05', '2020-07-19 05:23:05');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `bairros`
--
ALTER TABLE `bairros`
  ADD CONSTRAINT `bairros_cd_cidade_foreign` FOREIGN KEY (`cd_cidade`) REFERENCES `cidades` (`cd_cidade`);

--
-- Limitadores para a tabela `cidades`
--
ALTER TABLE `cidades`
  ADD CONSTRAINT `cidades_cd_uf_foreign` FOREIGN KEY (`cd_uf`) REFERENCES `uf` (`cd_uf`);

--
-- Limitadores para a tabela `imoveis`
--
ALTER TABLE `imoveis`
  ADD CONSTRAINT `imoveis_cd_bairro_foreign` FOREIGN KEY (`cd_bairro`) REFERENCES `bairros` (`cd_bairro`),
  ADD CONSTRAINT `imoveis_cd_cidade_foreign` FOREIGN KEY (`cd_cidade`) REFERENCES `cidades` (`cd_cidade`),
  ADD CONSTRAINT `imoveis_cd_uf_foreign` FOREIGN KEY (`cd_uf`) REFERENCES `uf` (`cd_uf`),
  ADD CONSTRAINT `imoveis_id_tipo_anuncio_foreign` FOREIGN KEY (`id_tipo_anuncio`) REFERENCES `tipo_anuncio` (`id_tipo_anuncio`);

--
-- Limitadores para a tabela `logradouros`
--
ALTER TABLE `logradouros`
  ADD CONSTRAINT `logradouros_cd_bairro_foreign` FOREIGN KEY (`cd_bairro`) REFERENCES `bairros` (`cd_bairro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
