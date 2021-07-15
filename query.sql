CREATE TABLE comerciante (
  id_comerciante int NOT NULL AUTO_INCREMENT,
  nome_comerciante varchar(100) DEFAULT NULL,
  email varchar(250) DEFAULT NULL,
  CNPJ varchar(20) DEFAULT NULL,
  PRIMARY KEY (id_comerciante)
);

CREATE TABLE comercio (
  id_comercio int NOT NULL AUTO_INCREMENT,
  nome_comercio varchar(120) NOT NULL,
  endereco varchar(150) NOT NULL,
  telefone varchar(19) NOT NULL,
  facebook varchar(250) DEFAULT NULL,
  celular varchar(19) DEFAULT NULL,
  descricao text NOT NULL,
  categoria varchar(100) NOT NULL,
  id_comerciante int NOT NULL,
  PRIMARY KEY (id_comercio),
  KEY ce_ComercianteComercio (id_comerciante),
  CONSTRAINT ce_ComercianteComercio FOREIGN KEY (id_comerciante) REFERENCES comerciante (id_comerciante) 
  ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE favorito (
  id_favorito int NOT NULL AUTO_INCREMENT,
  id_usuario int DEFAULT NULL,
  id_comercio int DEFAULT NULL,
  PRIMARY KEY (id_favorito),
  KEY id_usuario (id_usuario),
  KEY id_comercio (id_comercio),
  CONSTRAINT favorito_ibfk_1 FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario),
  CONSTRAINT favorito_ibfk_2 FOREIGN KEY (id_comercio) REFERENCES comercio (id_comercio)
);

CREATE TABLE usuario (
  id_usuario int NOT NULL AUTO_INCREMENT,
  nome varchar(50) NOT NULL,
  senha varchar(255) NOT NULL,
  criado_em datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id_usuario)
);
