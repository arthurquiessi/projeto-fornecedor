-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Jan-2021 às 19:58
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `fornecedores`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `auditoria`
--

CREATE TABLE `auditoria` (
  `codFor` int(10) NOT NULL,
  `nota` varchar(20) NOT NULL,
  `realizado` date NOT NULL,
  `programada` date NOT NULL,
  `relatorio` date NOT NULL,
  `prazo` date NOT NULL,
  `plano` varchar(10) NOT NULL,
  `previsao` date NOT NULL,
  `classificacao` varchar(10) NOT NULL,
  `auditoria` int(10) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `dataAtual` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `auditoria`
--

INSERT INTO `auditoria` (`codFor`, `nota`, `realizado`, `programada`, `relatorio`, `prazo`, `plano`, `previsao`, `classificacao`, `auditoria`, `usuario`, `dataAtual`) VALUES
(5484, '89-B', '2019-05-06', '2019-05-06', '2019-07-10', '2019-07-25', 'SIM', '2021-05-05', 'B', 90, 'Arthur Quiessi', '2021-01-12'),
(6358, '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '', 0, '', '0000-00-00'),
(6981, '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '', 0, '', '0000-00-00'),
(7743, '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '', 0, '', '0000-00-00'),
(8067, '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '', 0, '', '0000-00-00'),
(8141, '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '', 0, '', '0000-00-00'),
(8556, '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '', 0, '', '0000-00-00'),
(8780, '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '', 0, '', '0000-00-00'),
(8821, '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '', 0, '', '0000-00-00'),
(8981, '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '', 0, '', '0000-00-00'),
(9326, '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '', 0, '', '0000-00-00'),
(9345, '86-B', '2019-04-23', '2020-04-08', '2019-05-16', '2019-05-31', 'SIM', '2021-04-22', 'B', 88, 'Arthur Quiessi', '2021-01-12'),
(9517, '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '', 0, '', '0000-00-00'),
(9928, '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '', 0, '', '0000-00-00'),
(10107, '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '', 0, '', '0000-00-00'),
(10180, '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '', 0, '', '0000-00-00'),
(10458, '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '', 0, '', '0000-00-00'),
(10534, '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '', 0, '', '0000-00-00'),
(10619, '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '', 0, '', '0000-00-00'),
(10682, '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '', 0, '', '0000-00-00'),
(10708, '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '2001-01-01', '', 0, 'Arthur Quiessi', '2021-01-12'),
(10713, 'Amarelo', '2020-01-01', '2019-11-21', '2019-11-28', '2019-12-13', '', '2021-12-31', 'B', 99, 'Arthur Quiessi', '2021-01-12'),
(10759, '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '', 0, '', '0000-00-00'),
(10787, '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '', 0, '', '0000-00-00'),
(10875, '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '', 0, '', '0000-00-00'),
(11038, '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '', 0, '', '0000-00-00'),
(11420, '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '', 0, '', '0000-00-00'),
(11490, 'Amarelo', '2020-01-10', '2019-11-21', '2019-11-28', '2019-12-13', 'Não', '2022-01-09', 'B', 99, 'Arthur Quiessi', '2021-01-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `id` int(10) NOT NULL,
  `fornecedor` varchar(250) NOT NULL,
  `codFor` int(10) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `fabricante` varchar(100) NOT NULL,
  `detalhe` varchar(100) NOT NULL,
  `fiat` varchar(10) NOT NULL,
  `volo` varchar(10) NOT NULL,
  `mbb` varchar(10) NOT NULL,
  `scania` varchar(10) NOT NULL,
  `daf` varchar(10) NOT NULL,
  `hpe` varchar(10) NOT NULL,
  `branca` varchar(10) NOT NULL,
  `maquina` varchar(10) NOT NULL,
  `outras` varchar(10) NOT NULL,
  `fonte` varchar(10) NOT NULL,
  `critico` varchar(10) NOT NULL,
  `situacao` varchar(10) NOT NULL,
  `consulta` date NOT NULL,
  `termo` varchar(10) NOT NULL,
  `responsabilidade` date NOT NULL,
  `confidencialidade` date NOT NULL,
  `tresponsabilidade` varchar(10) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `dataAtual` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`id`, `fornecedor`, `codFor`, `tipo`, `fabricante`, `detalhe`, `fiat`, `volo`, `mbb`, `scania`, `daf`, `hpe`, `branca`, `maquina`, `outras`, `fonte`, `critico`, `situacao`, `consulta`, `termo`, `responsabilidade`, `confidencialidade`, `tresponsabilidade`, `usuario`, `dataAtual`) VALUES
(0, 'AÇO ANGULAR', 11490, 'Qualidade', 'Fabricante matéria-prima', 'Barra Maciça', '', '', '', '', '', '', '', '', 'outras', '', 'Não', 'Ok', '2020-08-18', 'Não Ok', '2021-01-09', '2021-01-09', 'Não Ok', 'Maikon Rogério dos Santos', '2021-01-09'),
(1, 'AÇO RAG', 10713, 'Qualidade', 'Distribuidor matéria-prima', 'Barra Maciça', '', 'volvo', '', 'scania', 'daf', '', 'branca', 'maquina', 'outras', '', 'Não', 'Não Ok', '2020-11-16', 'Não Ok', '0001-01-01', '0001-01-01', 'Não Ok', 'Arthur Quiessi', '2021-01-11'),
(2, 'AÇOS CONTINENTE', 8556, 'Qualidade', 'Fabricante matéria-prima', 'Barra Maciça', '', '', '', '', 'daf', '', '', '', 'outras', '', 'Não', 'Não Ok', '0001-01-01', 'Não Ok', '0001-01-01', '0001-01-01', 'Não Ok', 'Arthur Quiessi', '2021-01-11'),
(3, 'AÇOS VIC', 5484, 'Qualidade', 'Distribuidor matéria-prima', 'TTCC/TTSC', 'fiat', 'volvo', 'mbb', 'scania', '', 'hpe', '', 'maquina', '', '', 'Sim', 'Ok', '2019-08-29', 'Ok', '0001-01-01', '2018-10-15', 'Não Ok', 'Arthur Quiessi', '2021-01-12'),
(4, 'AÇOTUBO SERV', 10708, 'Qualidade', 'Fabricante matéria-prima', 'CORTE PLASMA', 'fiat', '', 'mbb', '', '', '', '', 'maquina', '', '', 'Não', 'Ok', '2020-12-07', '', '0001-01-01', '0001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(5, 'AÇOVISA', 8141, 'Qualidade', 'Distribuidor matéria-prima', 'BARRA MACIÇA', '', 'volvo', '', '', '', '', '', '', '', '', 'Não', '', '0001-01-01', '', '0001-01-01', '0001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(6, 'ACQUALAB', 6981, 'Ambiental', 'Serviços', 'ANÁLISE DE EFLUENTE', '', '', '', '', '', '', '', '', '', '', 'Não', '', '0001-01-01', '', '0001-01-01', '0001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(7, 'AFILIAÇÃO CCL', 10458, 'Qualidade', 'Serviços', 'CORTE LASER', '', '', 'mbb', '', '', '', '', 'maquina', 'outras', '', 'Não', 'Ok', '2019-09-30', 'Ok', '0001-01-01', '2019-04-17', 'Não Ok', 'Arthur Quiessi', '2021-01-12'),
(8, 'AGENA', 8067, 'Ambiental', 'Componente / Consumível', 'GEL IRMCO', '', '', '', '', '', '', '', '', '', '', 'Não', '', '0001-01-01', '', '0001-01-01', '0001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(9, 'ALEUSA', 11038, 'Ambiental', 'Outros', 'EQUIPAMENTO', '', '', '', '', '', '', '', '', '', '', 'Não', '', '0001-01-01', '', '0001-01-01', '0001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(10, 'ALLIANCE', 10787, 'Ambiental', 'Componente / Consumível', 'PRODUTO QUÍMICO', '', '', '', '', '', '', '', '', '', '', 'Não', '', '0001-01-01', '', '0001-01-01', '0001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(11, 'ALUMAQ', 6358, 'Qualidade', 'Componente / Consumível', 'ARAME SOLDA', 'fiat', 'volvo', 'mbb', 'scania', 'daf', 'hpe', 'branca', 'maquina', 'outras', '', 'Não', '', '0001-01-01', '', '0001-01-01', '0001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(12, 'ALUMAQ', 8981, 'Qualidade', 'Componente / Consumível', 'ARAME SOLDA', 'fiat', 'volvo', 'mbb', 'scania', 'daf', 'hpe', 'branca', 'maquina', 'outras', '', 'Não', '', '0001-01-01', '', '0001-01-01', '0001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(13, 'AMBIENTAL EMBALAGENS', 8821, 'Ambiental', 'Serviços', 'DESTINAÇÃO DE EMBALAGENS', '', '', '', '', '', '', '', '', '', '', 'Não', '', '0001-01-01', '', '0001-01-01', '0001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(14, 'AMR', 10759, 'Qualidade', 'Fabricante matéria-prima', 'CHAPAS', '', 'volvo', '', '', '', '', '', 'maquina', '', '', 'Não', 'Não Ok', '2020-07-16', '', '0001-01-01', '0001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(15, 'APA JUNDIAÍ', 8780, 'Ambiental', 'Componente / Consumível', 'TINTA', '', '', '', '', '', '', '', '', '', '', 'Não', '', '0001-01-01', '', '0001-01-01', '0001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(16, 'ARCELOR MI', 10619, 'Qualidade', 'Componente / Consumível', 'ARAME SOLDA', 'fiat', 'volvo', 'mbb', 'scania', 'daf', 'hpe', 'branca', 'maquina', 'outras', '', 'Não', '', '0001-01-01', '', '0001-01-01', '0001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(17, 'ARCO ARMATUR', 7743, 'Qualidade', 'Componente / Consumível', 'FIXAÇÃO', 'fiat', 'volvo', 'mbb', 'scania', '', '', '', '', '', 'Importada', 'Sim', '', '0001-01-01', 'Ok', '0001-01-01', '2019-04-03', 'Ok', 'Arthur Quiessi', '2021-01-12'),
(18, 'ARINOX', 10875, 'Qualidade', 'Fabricante matéria-prima', 'BARRA MACIÇA', '', '', '', '', '', '', '', 'maquina', '', '', 'Não', 'Ok', '2018-06-15', '', '0001-01-01', '0001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(19, 'AROTEC', 10682, 'Ambiental', 'Componente / Consumível', 'PRODUTO QUÍMICO', '', '', '', '', '', '', '', '', '', '', 'Não', '', '0001-01-01', '', '0001-01-01', '0001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(20, 'ARTEPACK', 9517, 'Ambiental', 'Componente / Consumível', 'EMBALAGEM-MADEIRA', '', '', '', '', '', '', 'branca', '', 'outras', '', 'Não', '', '0001-01-01', '', '0001-01-01', '0001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(21, 'ARVEDI', 10180, 'Qualidade', 'Fabricante matéria-prima', 'TTCC', 'fiat', '', 'mbb', '', '', '', '', 'maquina', '', '', 'Não', 'Não Ok', '2020-11-16', '', '0001-01-01', '0001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(22, 'ANIVALDO', 10107, 'Servicos', 'Serviços', 'INSPEÇÃO/RETRABALHO', '', '', '', 'scania', '', '', '', '', '', '', 'Não', 'Não Ok', '0001-01-01', 'Ok', '0001-01-01', '2019-04-04', 'Ok', 'Arthur Quiessi', '2021-01-12'),
(23, 'BOLLHOFF', 9326, 'Qualidade', 'Componente / Consumível', 'FIXAÇÃO', 'fiat', '', '', '', '', '', '', '', '', '', 'Não', '', '0001-01-01', '', '0001-01-01', '0001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(24, 'BRASAR', 10534, 'Qualidade', 'Serviços', 'SOLDA BRASAGEM', 'fiat', '', 'mbb', '', '', '', '', '', '', '', 'Não', 'Ok', '2018-06-15', 'Ok', '0001-01-01', '2019-04-22', 'Ok', 'Arthur Quiessi', '2021-01-12'),
(25, 'BRAS-ONDA', 11420, 'Qualidade', 'Componente / Consumível', 'EMBALAGEM-PAPELÃO', 'fiat', '', '', '', '', '', '', '', 'outras', '', 'Não', 'Não Ok', '0001-01-01', 'Não Ok', '0001-01-01', '0001-01-01', 'Não Ok', 'Arthur Quiessi', '2021-01-12'),
(26, 'BTL', 9345, 'Qualidade', 'Fabricante matéria-prima', 'TTCC/TTSC', '', 'volvo', 'mbb', 'scania', '', 'hpe', '', 'maquina', 'outras', '', 'Não', 'Ok', '2018-08-17', '', '0001-01-01', '0001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(27, 'BTM', 9928, 'Qualidade', 'Serviços', 'SOLDA BRASAGEM', 'fiat', '', 'mbb', '', '', '', '', '', '', '', 'Não', 'Ok', '2020-12-07', 'Ok', '0001-01-01', '2019-05-06', 'Ok', 'Arthur Quiessi', '2021-01-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `id` int(11) NOT NULL,
  `codFor` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `observacao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`id`, `codFor`, `nome`, `email`, `telefone`, `observacao`) VALUES
(0, 11490, 'Everaldo', 'everaldo@acoangular.com.br', '112222-2222', 'teste'),
(1, 10713, 'Jorge Mendes', 'jorge@acorag.com.br', '', ''),
(2, 10713, 'Maikon', 'maikon.santos@alpino.com.br', '111111', 'fse');

-- --------------------------------------------------------

--
-- Estrutura da tabela `desempenho`
--

CREATE TABLE `desempenho` (
  `id` int(255) NOT NULL,
  `mes` int(12) NOT NULL,
  `ano` int(12) NOT NULL,
  `codFor` varchar(50) NOT NULL,
  `fornecedor` varchar(50) NOT NULL,
  `fornecimento` varchar(10) NOT NULL,
  `pontuacao` varchar(10) NOT NULL,
  `recebimento` int(10) NOT NULL,
  `nivel1` int(10) NOT NULL,
  `nivel2` int(10) NOT NULL,
  `cliente` int(10) NOT NULL,
  `pontos` int(100) NOT NULL,
  `qtdePrazo` int(10) NOT NULL,
  `pontos2` int(100) NOT NULL,
  `qtdeEntrega` int(10) NOT NULL,
  `pontos3` int(100) NOT NULL,
  `fora` int(10) NOT NULL,
  `pontos4` int(100) NOT NULL,
  `qualidade` int(100) NOT NULL,
  `entrega` int(10) NOT NULL,
  `entregaAtraso` int(10) NOT NULL,
  `pontos5` int(100) NOT NULL,
  `quebra` int(10) NOT NULL,
  `quebraCliente` int(10) NOT NULL,
  `pontos6` int(100) NOT NULL,
  `parada` int(10) NOT NULL,
  `paradaCliente` int(10) NOT NULL,
  `pontos7` int(100) NOT NULL,
  `logistica` int(100) NOT NULL,
  `auditoria` int(100) NOT NULL,
  `idf` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `desempenho`
--

INSERT INTO `desempenho` (`id`, `mes`, `ano`, `codFor`, `fornecedor`, `fornecimento`, `pontuacao`, `recebimento`, `nivel1`, `nivel2`, `cliente`, `pontos`, `qtdePrazo`, `pontos2`, `qtdeEntrega`, `pontos3`, `fora`, `pontos4`, `qualidade`, `entrega`, `entregaAtraso`, `pontos5`, `quebra`, `quebraCliente`, `pontos6`, `parada`, `paradaCliente`, `pontos7`, `logistica`, `auditoria`, `idf`) VALUES
(0, 0, 0, '0', '0', '0', '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(1, 1, 2021, '11490', 'AÇO ANGULAR', 'Sim', '85', 0, 0, 0, 0, 100, 0, 100, 0, 100, 0, 100, 100, 100, 0, 100, 0, 0, 100, 0, 0, 100, 100, 0, 89);

-- --------------------------------------------------------

--
-- Estrutura da tabela `documentos`
--

CREATE TABLE `documentos` (
  `codFor` int(10) NOT NULL,
  `iatf` date NOT NULL,
  `v9001` date NOT NULL,
  `v14001` date NOT NULL,
  `pontuacao` int(5) NOT NULL,
  `municipal` date NOT NULL,
  `operacao` date NOT NULL,
  `ibama` date NOT NULL,
  `avcb` date NOT NULL,
  `crea` date NOT NULL,
  `civil` date NOT NULL,
  `policia` date NOT NULL,
  `cadris` date NOT NULL,
  `exercito` date NOT NULL,
  `anp` date NOT NULL,
  `inmetro` date NOT NULL,
  `mopp` date NOT NULL,
  `outros` date NOT NULL,
  `observacoes` varchar(250) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `dataAtual` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `documentos`
--

INSERT INTO `documentos` (`codFor`, `iatf`, `v9001`, `v14001`, `pontuacao`, `municipal`, `operacao`, `ibama`, `avcb`, `crea`, `civil`, `policia`, `cadris`, `exercito`, `anp`, `inmetro`, `mopp`, `outros`, `observacoes`, `usuario`, `dataAtual`) VALUES
(5484, '2021-07-12', '2021-07-12', '2001-01-01', 95, '2001-01-01', '2021-06-15', '2020-12-16', '2023-02-04', '2020-12-30', '2001-01-01', '2021-08-12', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(6358, '2001-01-01', '2022-01-01', '2001-01-01', 85, '2001-01-01', '2001-01-01', '2001-01-01', '2021-11-06', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(6981, '2001-01-01', '2001-01-01', '2001-01-01', 0, '2001-01-01', '2001-01-01', '2001-01-01', '2023-02-08', '2021-03-31', '2001-01-01', '2021-10-30', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(7743, '2021-11-06', '2021-11-06', '2021-11-25', 100, '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(8067, '2001-01-01', '2001-01-01', '2001-01-01', 0, '2001-01-01', '2001-01-01', '2021-03-30', '2001-01-01', '2021-04-30', '2001-01-01', '2021-04-26', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(8141, '2001-01-01', '2022-07-03', '2001-01-01', 85, '2001-01-01', '2023-03-28', '2001-01-01', '2021-04-19', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(8556, '2001-01-01', '2022-07-25', '2001-01-01', 85, '2001-01-01', '2020-08-11', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '', 'Arthur Quiessi', '2021-01-11'),
(8780, '2001-01-01', '2021-03-26', '2001-01-01', 85, '2001-01-01', '2022-04-23', '2021-02-01', '2020-12-06', '2021-03-31', '2001-01-01', '2021-10-03', '0000-00-00', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(8821, '2001-01-01', '2001-01-01', '2001-01-01', 0, '2001-01-01', '2020-12-21', '2021-02-16', '2023-03-08', '2001-01-01', '2001-01-01', '2001-01-01', '2020-11-30', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(8981, '2001-01-01', '2022-01-01', '2001-01-01', 85, '2001-01-01', '2001-01-01', '2001-01-01', '2021-11-06', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(9326, '2021-08-28', '2021-07-31', '2021-07-31', 100, '2001-01-01', '2021-10-29', '2021-03-23', '2020-11-30', '2001-01-01', '2001-01-01', '2021-08-17', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(9345, '2001-01-01', '2021-09-15', '2001-01-01', 85, '2001-01-01', '2022-03-26', '2001-01-01', '2021-11-17', '2001-01-01', '2001-01-01', '2021-05-29', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(9517, '2001-01-01', '2020-09-20', '2001-01-01', 0, '2021-07-17', '2023-04-29', '2021-03-21', '2021-07-17', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(9928, '2001-01-01', '2021-07-04', '2001-01-01', 85, '2001-01-01', '2023-10-09', '2020-12-03', '2021-11-17', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(10107, '0000-00-00', '0000-00-00', '0000-00-00', 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '0000-00-00'),
(10180, '2001-01-01', '2022-04-30', '2001-01-01', 85, '2001-01-01', '2021-04-26', '2021-01-21', '2022-11-07', '2001-01-01', '2001-01-01', '2021-06-12', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(10458, '2001-01-01', '2022-07-11', '2001-01-01', 85, '2001-01-01', '2021-05-30', '2001-01-01', '2022-08-03', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(10534, '2001-01-01', '2022-02-17', '2001-01-01', 85, '2001-01-01', '2022-05-23', '2021-01-06', '2021-12-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(10619, '2001-01-01', '2023-05-08', '2023-05-08', 85, '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(10682, '2001-01-01', '2001-01-01', '2001-01-01', 0, '2001-01-01', '2022-08-28', '2020-12-02', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(10708, '2021-11-05', '2021-05-03', '2001-01-01', 95, '2001-01-01', '2024-10-14', '2021-02-12', '2021-10-12', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(10713, '2001-01-01', '2022-12-11', '2001-01-01', 85, '2001-01-01', '2021-11-14', '2021-01-30', '2022-09-03', '2001-01-01', '2001-01-01', '2021-06-12', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '', 'Arthur Quiessi', '2021-01-11'),
(10759, '2021-08-28', '2021-08-28', '2001-01-01', 95, '2001-01-01', '2021-02-25', '2001-01-01', '2021-10-10', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(10787, '2001-01-01', '2001-01-01', '2001-01-01', 0, '2001-01-01', '2001-01-01', '2021-01-09', '2023-03-11', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(10875, '2001-01-01', '2021-11-24', '2001-01-01', 85, '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(11038, '2001-01-01', '2021-03-22', '2001-01-01', 85, '2001-01-01', '2001-01-01', '2001-01-01', '2023-09-24', '2001-01-01', '2001-01-01', '2021-01-18', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(11420, '2001-01-01', '2021-09-14', '2001-01-01', 85, '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2021-01-13', '2001-01-01', '2001-01-01', '0000-00-00', '2001-01-01', '2001-01-01', '2001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(11490, '2001-01-01', '2022-06-30', '2001-01-01', 85, '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '2001-01-01', '', 'Maikon Rogério dos Santos', '2021-01-09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sgq`
--

CREATE TABLE `sgq` (
  `codFor` int(10) NOT NULL,
  `iatfSGQ` varchar(10) NOT NULL,
  `programadaSGQ` date NOT NULL,
  `pontuacaoSGQ` int(85) NOT NULL,
  `frequencia` int(24) NOT NULL,
  `nova` date NOT NULL,
  `sgq` varchar(10) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `dataAtual` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sgq`
--

INSERT INTO `sgq` (`codFor`, `iatfSGQ`, `programadaSGQ`, `pontuacaoSGQ`, `frequencia`, `nova`, `sgq`, `usuario`, `dataAtual`) VALUES
(5484, 'Sim', '0001-01-01', 0, 0, '0001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(6358, 'Sim', '2020-09-11', 0, 0, '2021-06-12', '', 'Arthur Quiessi', '2021-01-12'),
(6981, '', '0000-00-00', 0, 0, '0000-00-00', '', '', NULL),
(7743, 'Sim', '0000-00-00', 0, 0, '0000-00-00', '', 'Arthur Quiessi', '2021-01-12'),
(8067, '', '0000-00-00', 0, 0, '0000-00-00', '', '', NULL),
(8141, 'Não', '2020-09-11', 42, 2, '2022-09-11', '', 'Arthur Quiessi', '2021-01-12'),
(8556, 'Sim', '2020-09-14', 58, 2, '2022-09-14', '', 'Arthur Quiessi', '2021-01-11'),
(8780, '', '0000-00-00', 0, 0, '0000-00-00', '', 'Arthur Quiessi', '2021-01-12'),
(8821, '', '0000-00-00', 0, 0, '0000-00-00', '', '', NULL),
(8981, 'Sim', '2020-09-11', 0, 0, '2021-09-12', '', 'Arthur Quiessi', '2021-01-12'),
(9326, 'Sim', '0000-00-00', 0, 0, '0000-00-00', '', 'Arthur Quiessi', '2021-01-12'),
(9345, 'Sim', '2020-09-11', 58, 2, '2022-09-11', '', 'Arthur Quiessi', '2021-01-12'),
(9517, '', '0000-00-00', 0, 0, '0000-00-00', '', '', NULL),
(9928, 'Sim', '2020-09-11', 42, 2, '2022-09-11', '', 'Arthur Quiessi', '2021-01-12'),
(10107, '', '0000-00-00', 0, 0, '0000-00-00', '', '', NULL),
(10180, 'Sim', '2020-10-30', 0, 0, '2021-10-31', '', 'Arthur Quiessi', '2021-01-12'),
(10458, 'Sim', '2020-09-11', 0, 0, '2021-09-12', '', 'Arthur Quiessi', '2021-01-12'),
(10534, 'Sim', '2020-09-11', 64, 3, '2023-09-11', '', 'Arthur Quiessi', '2021-01-12'),
(10619, 'Sim', '2020-09-11', 0, 0, '2021-09-12', '', 'Arthur Quiessi', '2021-01-12'),
(10682, '', '0000-00-00', 0, 0, '0000-00-00', '', '', NULL),
(10708, 'Sim', '0001-01-01', 0, 0, '0001-01-01', '0', 'Arthur Quiessi', '2021-01-12'),
(10713, 'Sim', '2020-09-10', 60, 3, '2023-09-10', '', 'Maikon Santos', '2021-01-12'),
(10759, 'Sim', '0001-01-01', 0, 0, '0001-01-01', '', 'Arthur Quiessi', '2021-01-12'),
(10787, '', '0000-00-00', 0, 0, '0000-00-00', '', '', NULL),
(10875, 'Sim', '2020-09-11', 66, 3, '2023-09-11', '', 'Arthur Quiessi', '2021-01-12'),
(11038, '', '0000-00-00', 0, 0, '0000-00-00', '', '', NULL),
(11420, 'Sim', '2020-09-14', 52, 2, '2022-09-14', '', 'Arthur Quiessi', '2021-01-12'),
(11490, 'Sim', '2020-10-30', 50, 2, '2022-10-30', '', 'Arthur Quiessi', '2021-01-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `niveis_acesso_id` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `niveis_acesso_id`, `email`, `senha`) VALUES
(0, 'Maikon Santos', 1, 'maikon.santos@alpino.com.br', '4553b9eb63ff23c392c5387e59499443'),
(1, 'Arthur Quiessi', 1, 'arthur.quiessi@alpino.com.br', 'feb4195e1f7de6370cd14033fbc72ec4');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `auditoria`
--
ALTER TABLE `auditoria`
  ADD UNIQUE KEY `codFor` (`codFor`);

--
-- Índices para tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD UNIQUE KEY `id` (`id`);

--
-- Índices para tabela `desempenho`
--
ALTER TABLE `desempenho`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `documentos`
--
ALTER TABLE `documentos`
  ADD UNIQUE KEY `codFor` (`codFor`);

--
-- Índices para tabela `sgq`
--
ALTER TABLE `sgq`
  ADD UNIQUE KEY `codFor` (`codFor`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `desempenho`
--
ALTER TABLE `desempenho`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
