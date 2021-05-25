CREATE TABLE comercio (
  id INT NOT NULL PRIMARY KEY,
  nome_comercio VARCHAR(120) NOT NULL,
  endereco VARCHAR(255)
);

CREATE TABLE comerciante (
  id INT NOT NULL PRIMARY KEY,
  cnpj VARCHAR(17),
  nome_comerciante VARCHAR(100),
  email VARCHAR(250)
);

CREATE TABLE cupom (
  id INT NOT NULL PRIMARY KEY,
  cupom VARCHAR(50),
  criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  expira_em TIMESTAMP,
  FOREIGN KEY(comercio.id) REFERENCES comercio(comercio.id)
);

CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE favorito (
  id INT NOT NULL PRIMARY KEY,
  user_id INT FOREIGN KEY REFERENCES Usuário(id),
  favoritos TEXT
);
