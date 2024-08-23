CREATE DATABASE mystore;
USE mystore;
CREATE TABLE usuarios(
	id INT AUTO_INCREMENT NOT NULL,
	nome VARCHAR(256) NOT NULL,
	email VARCHAR(100) NOT NULL,
	login VARCHAR(256) NOT NULL,
	senha VARCHAR(256) NOT NULL,
	cpf VARCHAR(11),
	telefone VARCHAR(13),
	data_nascimento DATE,
	nivel_acesso TINYINT(1) NOT NULL,/*0 é usuário, 1 é administrador*/
	situacao TINYINT(1),/*0 é inativo, 1 é ativo*/
	constraint pk_usuario primary key (id)
);

CREATE TABLE enderecos(
	id INT AUTO_INCREMENT NOT NULL,
	rua VARCHAR(45),
	numero VARCHAR(45),
	bairro VARCHAR(256),
	cidade VARCHAR(256),
	estado VARCHAR(2),
	país VARCHAR(3),
	CEP VARCHAR(8),
	id_usuario INT,
	constraint pk_endereco primary key (id)
);
ALTER TABLE endereco ADD CONSTRAINT fk_usuario_endereco FOREIGN KEY (id_usuario) REFERENCES usuarios (id);

CREATE TABLE produtos(
	id INT AUTO_INCREMENT NOT NULL,
	id_usuario INT,
	nome VARCHAR(256),
	preco DOUBLE(5,2),
	descricao TEXT,
	constraint pk_produto primary key (id)
);
ALTER TABLE produto ADD CONSTRAINT fk_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios (id);

CREATE TABLE pedidos(
	id INT AUTO_INCREMENT NOT NULL,
	data DATE,
	status ENUM("I", "VV", "SE", "FE"),/*Se o produto foi para o correio, se chegou, etc...*/
	id_comprador INT,
	id_vendedor INT,
	caminhoComprovante VARCHAR(256),
	valor_total DOUBLE(5,2),
	constraint pk_pedido primary key (id)
);
ALTER TABLE pedido ADD CONSTRAINT fk_comprador FOREIGN KEY (id_comprador) REFERENCES usuarios (id);
ALTER TABLE pedido ADD CONSTRAINT fk_vendedor FOREIGN KEY (id_vendedor) REFERENCES usuarios (id);

CREATE TABLE pedidos_produtos(
	id INT AUTO_INCREMENT NOT NULL,
	id_pedido INT,
	id_produto INT,
	valor DOUBLE(5,2),
	constraint pk_pedido_produto primary key (id)
);
ALTER TABLE pedidos_produtos ADD CONSTRAINT fk_pedido FOREIGN KEY (id_pedido) REFERENCES pedidos (id);
ALTER TABLE pedidos_produtos ADD CONSTRAINT fk_produto FOREIGN KEY (id_produto) REFERENCES produtos (id);

CREATE TABLE avaliacoes_produtos(
	id INT AUTO_INCREMENT NOT NULL,
	id_pedido INT,
	estrelas INT,
	comentario TEXT,
	constraint pk_avaliacao_produto primary key (id)
);
ALTER TABLE avaliacoes_produtos ADD CONSTRAINT fk_pedido FOREIGN KEY (id_pedido) REFERENCES pedidos (id);
