-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.33-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para lojinha
CREATE DATABASE IF NOT EXISTS `lojinha` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `lojinha`;

-- Copiando estrutura para tabela lojinha.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `Id` int(2) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(255) NOT NULL,
  `Quantidade` int(3) NOT NULL,
  `Preco` decimal(10,0) NOT NULL,
  `Imagem` longtext NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela lojinha.produtos: ~12 rows (aproximadamente)
DELETE FROM `produtos`;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` (`Id`, `Nome`, `Quantidade`, `Preco`, `Imagem`) VALUES
	(1, 'Headset', 50, 200, 'headset.jpg'),
	(2, 'Mouse', 20, 25, 'mouse.jpg'),
	(3, 'Teclado', 9, 150, 'teclado.jpg'),
	(4, 'Mousepad', 46, 15, 'mousepad.jpg'),
	(5, 'Processador', 1, 100, 'processador.jpg'),
	(6, 'Cooler', 1, 25, 'cooler.jpg'),
	(7, 'Placa Mãe', 3, 500, 'placa_mae.jpg'),
	(8, 'Memoria RAM', 2, 50, 'memoria_ram.jpg'),
	(9, 'Armazenamento', 50, 250, 'armazenamento.jpg'),
	(10, 'Placa de Vídeo', 1000, 1, 'placa_de_video.jpg'),
	(11, 'Fonte', 250, 2, 'fonte.jpg'),
	(12, 'Gabinete', 1, 325, 'gabinete.jpg'),
	(13, 'Cabo de Video', 1000, 25, 'cabo_de_video.jpg'),
	(14, 'Cabo de Força', 1, 30, 'cabo_de_forca.jpg');
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
