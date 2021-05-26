CREATE TABLE `categorias` (
  `id_categoria` int NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(100) NOT NULL,
  PRIMARY KEY (`id_categoria`)
);

CREATE TABLE `comerciante` (
  `id_comerciante` int NOT NULL AUTO_INCREMENT,
  `cnpj` varchar(17) DEFAULT NULL,
  `nome_comerciante` varchar(100) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `id_comercio` int NOT NULL,
  PRIMARY KEY (`id_comerciante`),
  KEY `ce_ComercianteComercio` (`id_comercio`),
  CONSTRAINT `ce_ComercianteComercio` FOREIGN KEY (`id_comercio`) REFERENCES `comercio` (`id_comercio`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `comercio` (
  `id_comercio` int NOT NULL AUTO_INCREMENT,
  `nome_comercio` varchar(120) NOT NULL,
  `endereco` varchar(250) DEFAULT NULL,
  `telefone` int NOT NULL,
  `faceook` varchar(250) DEFAULT NULL,
  `whatsapp` int DEFAULT NULL,
  `id_favorito` int NOT NULL,
  `id_categoria` int NOT NULL,
  PRIMARY KEY (`id_comercio`),
  KEY `ce_CategoriaComercio` (`id_categoria`),
  CONSTRAINT `ce_CategoriaComercio` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `favorito` (
  `id_favorito` int NOT NULL,
  `favorito` text,
  `id_usuario` int DEFAULT NULL,
  `id_comercio` int DEFAULT NULL,
  PRIMARY KEY (`id_favorito`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_comercio` (`id_comercio`),
  CONSTRAINT `favorito_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `favorito_ibfk_2` FOREIGN KEY (`id_comercio`) REFERENCES `comercio` (`id_comercio`)
);

CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `criado_em` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_favorito` int DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `ce_UsuarioFavorito` (`id_favorito`),
  CONSTRAINT `ce_UsuarioFavorito` FOREIGN KEY (`id_favorito`) REFERENCES `favorito` (`id_favorito`)
);

-- CREATE TABLE recuperacao (
--   utilizador  VARCHAR(255) NOT NULL,
--   confirmacao VARCHAR(40) NOT NULL,
--   KEY(utilizador, confirmacao)
-- )