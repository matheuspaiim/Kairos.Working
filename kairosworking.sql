CREATE DATABASE kairosworking;

USE kairosworking;

CREATE TABLE cliente(
	id INT NOT NULL AUTO_INCREMENT,
	nome VARCHAR(100),
	idade INT NOT NULL,
	sexo VARCHAR(45),
	PRIMARY KEY(id)
)

CREATE TABLE produto(
	id INT NOT NULL AUTO_INCREMENT,
	nome TEXT NOT NULL,
	valor NUMERIC(9,2) NOT NULL,
	quantidade INT NOT NULL,
	descricao VARCHAR(500),
	PRIMARY KEY(id)
)

CREATE TABLE venda(
	id INT NOT NULL AUTO_INCREMENT,
	cliente VARCHAR(100),
	funcionario VARCHAR(100),
	produto VARCHAR(100),
	descricao VARCHAR(500),
	data_saida DATE NOT NULL,
	quantidade INT NOT NULL,
	valor VARCHAR(100),
	PRIMARY KEY(id)
)

CREATE TABLE usuario (
	id INT NOT NULL AUTO_INCREMENT,
	email VARCHAR(100),
	senha VARCHAR(100),
	PRIMARY KEY(id)
)

ALTER TABLE cliente ADD COLUMN telefone VARCHAR(15);
ALTER TABLE produto MODIFY COLUMN valor VARCHAR(100);
INSERT INTO usuario (email, senha) VALUES ('kairosworking@gmail.com', MD5 ('kairos123'));
SELECT * FROM usuario
