USE db_tcc;

CREATE TABLE `comerciante` (
  `id_comerciante` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `cnpj` varchar(17) DEFAULT NULL,
  `nome_comerciante` varchar(100) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `id_comercio` int NOT NULL,
  KEY `ce_ComercianteComercio` (`id_comercio`),
  CONSTRAINT `ce_ComercianteComercio` FOREIGN KEY (`id_comercio`) REFERENCES `comercio` (`id_comercio`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `comercio` (
  `id_comercio` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nome_comercio` varchar(120) NOT NULL,
  `endereco` varchar(250) DEFAULT NULL,
  `telefone` int NOT NULL,
  `faceook` varchar(250) DEFAULT NULL,
  `whatsapp` int DEFAULT NULL,
  `id_favorito` int NOT NULL,
  `categoria` VARCHAR(150) NOT NULL,
  `descricao` text NOT NULL
);

CREATE TABLE `favorito` (
  `id_favorito` int NOT NULL PRIMARY KEY,
  `favorito` text,
  `id_usuario` int DEFAULT NULL,
  `id_comercio` int DEFAULT NULL,
  KEY `id_usuario` (`id_usuario`),
  KEY `id_comercio` (`id_comercio`),
  CONSTRAINT `favorito_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `favorito_ibfk_2` FOREIGN KEY (`id_comercio`) REFERENCES `comercio` (`id_comercio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `criado_em` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_favorito` int DEFAULT NULL,
  KEY `ce_UsuarioFavorito` (`id_favorito`),
  CONSTRAINT `ce_UsuarioFavorito` FOREIGN KEY (`id_favorito`) REFERENCES `favorito` (`id_favorito`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;