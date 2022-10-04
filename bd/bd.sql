CREATE DATABASE IF NOT EXISTS `sistema`;

CREATE TABLE IF NOT EXISTS `tarefas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `custo` int(4) NOT NULL,
  `data_limite` date DEFAULT NULL,
  `ordem` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome` (`nome`)
) ;