CREATE DATABSE mystore;
USE mystore;
CREATE TABLE usuario(
	id INT AUTO_INCREMENT NOT NULL,
	nome VARCHAR(256),
	email VARCHAR(100),
	senha VARCHAR(256),
	cpf VARCHAR(11),
	telefone VARCHAR(13),
	data_nascimento DATE,
	constraint pk_usuario primary key (id)
);

CREATE TABLE endereco(
	id INT AUTO_INCREMENT NOT NULL
	rua VARCHAR(45),
	numero VARCHAR(45),
	bairro VARCHAR(256),
	cidade VARCHAR(256),
	estado VARCHAR(2),
	país VARCHAR(3),
	CEP VARCHAR(8),
	id_usuario INT
);
ALTER TABLE endereco ADD CONSTRAINT fk_usuario FOREIGN KEY (id_usuario) REFERENCES usuario (id);

CREATE TABLE produto(
	id INT AUTO_INCREMENT NOT NULL,
	id_usuario INT,
	nome VARCHAR(256),
	preco FLOAT,
	descricao TEXT,
);
