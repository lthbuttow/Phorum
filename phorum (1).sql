-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 29-Jun-2018 às 03:39
-- Versão do servidor: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phorum`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id_cat`, `categoria`) VALUES
(1, 'Games'),
(2, 'Hardware'),
(3, 'Filmes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

DROP TABLE IF EXISTS `contato`;
CREATE TABLE IF NOT EXISTS `contato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `titulo` text,
  `conteudo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`id`, `email`, `titulo`, `conteudo`) VALUES
(1, 'lucas_buttow@outlook.com', 'teste', 'duvida'),
(2, 'selvagemaoextremo@bol.com', '', 'jjljkljkljl');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `id_cat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id_post`),
  KEY `id_cat` (`id_cat`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id_post`, `id_cat`, `id_user`, `titulo`, `conteudo`, `data`) VALUES
(61, 3, 1, 'Novo filme', 'EstÃ¡ saindo do Forno', '2018-06-28'),
(52, 1, 2, 'ssd', 'sa', '2018-06-25'),
(53, 1, 2, 'sdsdsad', 'dasd', '2018-06-25'),
(57, 1, 3, 'Post do jc', 'onde baixar o baidu?', '2018-06-28'),
(37, 1, 2, 'Jogos', 'mais um post', '2018-06-23'),
(35, 2, 2, 'Game serÃ¡ lanÃ§ado no dia 5 ', 'Game serÃ¡ lanÃ§ado no dia 5 de outubro para PlayStation 4, Xbox One e PC', '2018-06-22'),
(59, 2, 1, 'vamos postar ', 'lklklklkl', '2018-06-28'),
(21, 1, 2, 'TESTE 20/06', 'VAMOS TESTAR AQUI', '2018-06-20'),
(58, 2, 1, 'teste', 'llljkjjljlkjkljl', '2018-06-28'),
(23, 2, 2, 'teste', 'sdasdsa', '2018-06-20'),
(24, 2, 2, 'lklklkl', 'gjgjghj', '2018-06-20'),
(26, 1, 2, 'Novidade Nos Games', 'dasdsadasdaddasd', '2018-06-21'),
(40, 1, 1, 'dsadsadasd', 'asdsadasdsa', '2018-06-22'),
(30, 1, 2, 'POSTANDO DE NOVO', 'OUTRO POST', '2018-06-21'),
(31, 2, 2, 'Mais um post da galera', 'SerÃ¡ apresentado como usar o alerta do bootstrap para informar ao usuÃ¡rio que o login ou a senha estÃ¡ incorreto.', '2018-06-21'),
(60, 2, 2, 'tdsdasd', 'asdasdad', '2018-06-28'),
(55, 1, 2, 'dsadsdas', 'dasdsadsa', '2018-06-28'),
(56, 1, 1, 'teste', 'kjkhkjljkljjl', '2018-06-28'),
(36, 1, 2, 'requisitos Sonic', 'MÃ­nimos:\r\n\r\nSistema Operacional: Windows 7/8/8.1/10 (64-Bit)\r\nProcessador: IntelÂ® Coreâ„¢ i5-4460, 2.70GHz/AMD FXâ„¢-6300 ou superior\r\nMemÃ³ria: 8 GB de RAM\r\nPlaca de vÃ­deo: NVIDIAÂ® GeForceÂ® GTX 760 ou AMD Radeonâ„¢ R7 260x com 2GB VRAM\r\nDirectX: VersÃ£o 11\r\n\r\n\r\nRecomendados:\r\n\r\nSistema Operacional: Windows 7/8/8.1/10 (64-Bit)\r\nProcessador: IntelÂ® Coreâ„¢ i7-3770/AMD FXâ„¢-9590 ou superior\r\nMemÃ³ria: 8 GB de RAM\r\nPlaca de vÃ­deo: NVIDIAÂ® GeForceÂ® GTX 1060 ou AMD Radeonâ„¢ RX 480 com 3GB VRAM\r\nDirectX: VersÃ£o 11', '2018-06-22');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `email`, `user`, `senha`, `admin`) VALUES
(1, 'lucas@gmail.com', 'Lucas', 'senha5', 1),
(2, 'teste@gmail.com', 'Tester', 'senha6', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
