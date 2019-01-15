-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 27-Nov-2018 às 02:24
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
-- Database: `rh`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admissao`
--

DROP TABLE IF EXISTS `admissao`;
CREATE TABLE IF NOT EXISTS `admissao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dt_entrada` date NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_saida` time NOT NULL,
  `cpf_funcionario` varchar(14) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_admissao_FUNCIONARIO1_idx` (`cpf_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `admissao`
--

INSERT INTO `admissao` (`id`, `dt_entrada`, `hora_entrada`, `hora_saida`, `cpf_funcionario`) VALUES
(4, '2018-11-25', '13:00:00', '20:00:00', '121.668.874-98'),
(5, '2018-11-11', '07:00:00', '15:00:00', '121.662.164-00'),
(6, '2018-11-25', '13:00:00', '22:00:00', '121.662.164');

-- --------------------------------------------------------

--
-- Estrutura da tabela `beneficios`
--

DROP TABLE IF EXISTS `beneficios`;
CREATE TABLE IF NOT EXISTS `beneficios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dt_inicio_ferias` varchar(45) DEFAULT NULL,
  `dt_fim_ferias` varchar(45) DEFAULT NULL,
  `bonificacao_ferias` int(5) DEFAULT NULL,
  `cpf_funcionario` varchar(14) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_beneficios_FUNCIONARIO1_idx` (`cpf_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `beneficios`
--

INSERT INTO `beneficios` (`id`, `dt_inicio_ferias`, `dt_fim_ferias`, `bonificacao_ferias`, `cpf_funcionario`) VALUES
(1, '2018-12-01', '2018-12-30', 20000, '121.662.164-00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

DROP TABLE IF EXISTS `cargo`;
CREATE TABLE IF NOT EXISTS `cargo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cargo_funcionario` varchar(45) DEFAULT NULL,
  `funcao` varchar(45) DEFAULT NULL,
  `situacao` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`id`, `cargo_funcionario`, `funcao`, `situacao`) VALUES
(1, 'Gerente', 'Adminstrador Geral', 'ativo'),
(2, 'Supervisor', 'adm', 'ativo'),
(3, 'superintendente', 'adm', 'ATIVO'),
(4, 'AUXILIAR DE INFRASTUTURA', 'MANUTENÃ‡ÃƒO', 'A'),
(5, 'AUXILIAR DE LIMPESA', 'LIMPESA EM GERAL', 'ATIVO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

DROP TABLE IF EXISTS `contato`;
CREATE TABLE IF NOT EXISTS `contato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `celular` varchar(15) NOT NULL,
  `fixo` varchar(14) DEFAULT NULL,
  `linkedin` varchar(45) DEFAULT NULL,
  `rede_social` varchar(45) DEFAULT NULL,
  `cpf_funcionario` varchar(14) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_CONTATO_FUNCIONARIO1_idx` (`cpf_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`id`, `email`, `celular`, `fixo`, `linkedin`, `rede_social`, `cpf_funcionario`) VALUES
(4, 'joseallefbs@gmail.com', '11981226731', '11 37474884', 'asdasdasd%akjga', 'facebook@hotmail.com', '121.668.874-98'),
(5, 'manoel@gmail.com', '11495060731', '51651651', 'asdasdasd', 'facebook.com/evilazioricart', '121.662.164-00'),
(6, 'maicon@agmail.com', '1185826731', '11 37474884', 'maicon@ghomat888', 'maicon@solzasantos', '121.662.164 ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta_bancaria`
--

DROP TABLE IF EXISTS `conta_bancaria`;
CREATE TABLE IF NOT EXISTS `conta_bancaria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banco` varchar(25) DEFAULT NULL,
  `agencia` varchar(10) DEFAULT NULL,
  `conta` varchar(15) DEFAULT NULL,
  `digito` varchar(3) DEFAULT NULL,
  `cpf_funcionario` varchar(14) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_CONTA_BANCARIA_FUNCIONARIO1_idx` (`cpf_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `conta_bancaria`
--

INSERT INTO `conta_bancaria` (`id`, `banco`, `agencia`, `conta`, `digito`, `cpf_funcionario`) VALUES
(8, 'ITAU', '8362', '83774', '3', '121.668.874-98'),
(9, 'BRADESCO', '8362', '5947474', '9', '121.662.164-00'),
(10, 'BRADESCO', '8362', '487433', '0', '121.662.164');

-- --------------------------------------------------------

--
-- Estrutura da tabela `demissao`
--

DROP TABLE IF EXISTS `demissao`;
CREATE TABLE IF NOT EXISTS `demissao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_demissao` date DEFAULT NULL,
  `motivo` text,
  `cpf_funcionario` varchar(14) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_demicao_FUNCIONARIO1_idx` (`cpf_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `demissao`
--

INSERT INTO `demissao` (`id`, `data_demissao`, `motivo`, `cpf_funcionario`) VALUES
(11, '2018-11-25', 'Baixa produtividade!', '121.662.164');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

DROP TABLE IF EXISTS `endereco`;
CREATE TABLE IF NOT EXISTS `endereco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uf` varchar(2) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `rua` varchar(45) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `cpf_funcionario` varchar(14) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ENDERECO_FUNCIONARIO1_idx` (`cpf_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id`, `uf`, `cidade`, `bairro`, `rua`, `numero`, `complemento`, `cpf_funcionario`) VALUES
(4, 'SP', 'SÃ£o Paulo', 'Itaim', 'Francisco de Souto Maior', 915, 'AP 26 T 3', '121.668.874-98'),
(5, 'SP', 'SÃ£o Paulo', 'Cidade Tiradentes', 'Manoel francisco', 463, 'cs 2', '121.662.164-00'),
(6, 'SP', 'SÃ£o Paulo', 'CONCILIAÃ‡ÃƒO', 'manoe da conciliaÃ§Ã£o', 44, 'A', '121.662.164');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `cpf` varchar(14) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `dt_nasc` varchar(10) NOT NULL,
  `rg` varchar(12) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `situacao` varchar(1) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  PRIMARY KEY (`cpf`),
  KEY `fk_FUNCIONARIO_CARGO1_idx` (`id_cargo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`cpf`, `nome`, `dt_nasc`, `rg`, `sexo`, `foto`, `situacao`, `id_cargo`) VALUES
('121.662.164', 'Wallison da silva', '10/08/1996', '397474', 'M', '1543180669.png', 'I', 2),
('121.662.164-00', 'MARCOS DA SILVA', '03/04/1985', '397474', 'M', '1543180415.png', 'A', 4),
('121.668.874-98', 'JOSE ALLEF BEZERRA DA SILVA', '10/08/1996', '495758', 'M', '1543180236.jpg', 'A', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `salario_remuneracao_desconto`
--

DROP TABLE IF EXISTS `salario_remuneracao_desconto`;
CREATE TABLE IF NOT EXISTS `salario_remuneracao_desconto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `salario` int(6) NOT NULL,
  `horas_extra` float DEFAULT NULL,
  `va` float NOT NULL,
  `vr` float NOT NULL,
  `va_desconto` decimal(3,0) NOT NULL,
  `vr_desconto` decimal(3,0) NOT NULL,
  `inss_desconto` decimal(10,0) NOT NULL,
  `fgts` int(4) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_salario_remuneracao_desconto_CARGO1_idx` (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `salario_remuneracao_desconto`
--

INSERT INTO `salario_remuneracao_desconto` (`id`, `salario`, `horas_extra`, `va`, `vr`, `va_desconto`, `vr_desconto`, `inss_desconto`, `fgts`, `id_cargo`) VALUES
(1, 5000, 150, 90, 220, '50', '47', '47', 488, 2),
(2, 9000, 0, 800, 380, '100', '299', '300', 400, 1),
(3, 7000, 10, 90, 220, '40', '60', '500', 400, 3),
(4, 2600, 10, 58, 150, '52', '67', '227', 180, 4),
(5, 1200, 10, 190, 220, '65', '56', '89', 180, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `treinamento`
--

DROP TABLE IF EXISTS `treinamento`;
CREATE TABLE IF NOT EXISTS `treinamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `h_inicio` time NOT NULL,
  `h_fim` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `treinamento`
--

INSERT INTO `treinamento` (`id`, `data`, `h_inicio`, `h_fim`) VALUES
(1, '2018-11-20', '11:00:00', '15:00:00'),
(2, '2018-11-22', '14:00:00', '16:00:00'),
(3, '2018-11-22', '14:00:00', '16:00:00'),
(4, '2018-11-30', '15:00:00', '18:00:00'),
(5, '2018-11-12', '12:00:00', '13:30:00'),
(6, '2018-12-01', '14:00:00', '16:00:00'),
(7, '2018-11-29', '11:00:00', '11:30:00'),
(8, '2018-11-25', '12:00:00', '13:00:00'),
(9, '2018-11-13', '13:00:00', '15:00:00'),
(10, '2018-11-15', '14:00:00', '14:30:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `treinamento_has_cargo`
--

DROP TABLE IF EXISTS `treinamento_has_cargo`;
CREATE TABLE IF NOT EXISTS `treinamento_has_cargo` (
  `id_treinamento` int(11) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  KEY `fk_treinamento_has_CARGO_CARGO1_idx` (`id_cargo`),
  KEY `fk_treinamento_has_CARGO_treinamento1_idx` (`id_treinamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `treinamento_has_cargo`
--

INSERT INTO `treinamento_has_cargo` (`id_treinamento`, `id_cargo`) VALUES
(3, 2),
(4, 3),
(5, 2),
(6, 3),
(7, 3),
(8, 1),
(9, 3),
(10, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(60) NOT NULL,
  `senha` varchar(60) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `senha`) VALUES
(1, 'allef', '202cb962ac59075b964b07152d234b70'),
(2, 'jadilson', '202cb962ac59075b964b07152d234b70'),
(3, 'luciana', '202cb962ac59075b964b07152d234b70');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `admissao`
--
ALTER TABLE `admissao`
  ADD CONSTRAINT `fk_admissao_FUNCIONARIO1` FOREIGN KEY (`cpf_funcionario`) REFERENCES `funcionario` (`cpf`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `beneficios`
--
ALTER TABLE `beneficios`
  ADD CONSTRAINT `fk_beneficios_FUNCIONARIO1` FOREIGN KEY (`cpf_funcionario`) REFERENCES `funcionario` (`cpf`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `contato`
--
ALTER TABLE `contato`
  ADD CONSTRAINT `fk_CONTATO_FUNCIONARIO1` FOREIGN KEY (`cpf_funcionario`) REFERENCES `funcionario` (`cpf`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `conta_bancaria`
--
ALTER TABLE `conta_bancaria`
  ADD CONSTRAINT `fk_CONTA_BANCARIA_FUNCIONARIO1` FOREIGN KEY (`cpf_funcionario`) REFERENCES `funcionario` (`cpf`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `demissao`
--
ALTER TABLE `demissao`
  ADD CONSTRAINT `fk_demicao_FUNCIONARIO1` FOREIGN KEY (`cpf_funcionario`) REFERENCES `funcionario` (`cpf`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `fk_ENDERECO_FUNCIONARIO1` FOREIGN KEY (`cpf_funcionario`) REFERENCES `funcionario` (`cpf`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `fk_FUNCIONARIO_CARGO1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `salario_remuneracao_desconto`
--
ALTER TABLE `salario_remuneracao_desconto`
  ADD CONSTRAINT `fk_salario_remuneracao_desconto_CARGO1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `treinamento_has_cargo`
--
ALTER TABLE `treinamento_has_cargo`
  ADD CONSTRAINT `fk_treinamento_has_CARGO_CARGO1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_treinamento_has_CARGO_treinamento1` FOREIGN KEY (`id_treinamento`) REFERENCES `treinamento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
