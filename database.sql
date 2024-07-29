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
	preco DOUBLE(5,2),
	descricao TEXT,
);
ALTER TABLE produto ADD CONSTRAINT fk_usuario FOREIGN KEY (id_usuario) REFERENCES usuario (id);

CREATE TABLE pedido(
	id INT AUTO_INCREMENT NOT NULL,
	data DATE,
	status ENUM("I", "VV", "SE", "FE"),--Se o produto foi para o correio, se chegou, etc...
	id_comprador INT,
	id_vendedor INT,
	caminhoComprovante VARCHAR(256),
	valor_total DOUBLE(5,2)
);
ALTER TABLE pedido ADD CONSTRAINT fk_comprador FOREIGN KEY (id_comprador) REFERENCES usuario (id);
ALTER TABLE pedido ADD CONSTRAINT fk_vendedor FOREIGN KEY (id_vendedor) REFERENCES usuario (id);

CREATE TABLE pedido_produto(
	id INT AUTO_INCREMENT NOT NULL,
	id_pedido INT,
	id_produto INT,
	valor DOUBLE(5,2)
);
ALTER TABLE pedido_produto ADD CONSTRAINT fk_pedido FOREIGN KEY (id_pedido) REFERENCES pedido (id);
ALTER TABLE pedido_produto ADD CONSTRAINT fk_produto FOREIGN KEY (id_produto) REFERENCES produto (id);

avaliacao_produto(
	id INT AUTO_INCREMENT NOT NULL,
	id_pedido INT,
	estrelas INT,
	comentario TEXT
)
ALTER TABLE avaliacao_produto ADD CONSTRAINT fk_pedido FOREIGN KEY (id_pedido) REFERENCES pedido (id);
