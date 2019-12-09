DROP SCHEMA IF EXISTS `empresa` ;
CREATE SCHEMA IF NOT EXISTS `empresa` DEFAULT CHARACTER SET utf8 ;
SHOW WARNINGS;

CREATE DATABASE empresa;

use empresa;

CREATE TABLE empresas
(
  id INT NOT NULL AUTO_INCREMENT,
  
  cnpj VARCHAR(50) NOT NULL UNIQUE,
  razao VARCHAR(50) NOT NULL UNIQUE,
  endereco VARCHAR(50) NOT NULL,
  telefone VARCHAR(50) NOT NULL,
  estado VARCHAR(50) NOT NULL,
  cidade VARCHAR(50) NOT NULL,
  cep VARCHAR(50) NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE projetos
(
  id INT NOT NULL AUTO_INCREMENT,

  id_empresa INT NOT NULL,
  
  tipo ENUM('poste', 'ftth', 'enlace') NOT NULL,
  data_entrega VARCHAR(50) NOT NULL,
  protocolo VARCHAR(50) NOT NULL,
  cidade VARCHAR(50) NOT NULL,
  qtd_postes INT NOT NULL,
  andamento ENUM('aprovado', 'reprovado', 'avaliacao', 'construcao') NOT NULL,

  PRIMARY KEY(id)
);

ALTER TABLE projetos ADD CONSTRAINT fk_empresas FOREIGN KEY (id_empresa) REFERENCES empresas(id);

