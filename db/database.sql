CREATE DATABASE mystore;
USE mystore;
CREATE TABLE usuarios(
	id INT AUTO_INCREMENT NOT NULL,
	nome VARCHAR(256) NOT NULL,
	email VARCHAR(100),
	login VARCHAR(256) NOT NULL,
	senha VARCHAR(256) NOT NULL,
	cpf VARCHAR(11),
	telefone VARCHAR(13),
	data_nascimento DATE,
	nivel_acesso TINYINT(1) NOT NULL,/*0 é usuário, 1 é administrador*/
	situacao TINYINT(1),/*0 é inativo, 1 é ativo*/
	foto_perfil VARCHAR(256),
	constraint pk_usuario primary key (id)
);

CREATE TABLE brechos(
	id INT AUTO_INCREMENT NOT NULL,
	id_usuario INT,
	nome VARCHAR(256) NOT NULL,
	descricao TEXT,
	data_criacao DATE,
	chave_pix VARCHAR(32),
	constraint pk_brecho primary key (id)
);
ALTER TABLE brechos ADD CONSTRAINT fk_usuario_brecho FOREIGN KEY (id_usuario) REFERENCES usuarios (id);

CREATE TABLE enderecos(
	id INT AUTO_INCREMENT NOT NULL,
	cep VARCHAR(8) NOT NULL,
	numero VARCHAR(8) NOT NULL,
	id_usuario INT,
	constraint pk_endereco primary key (id)
);
ALTER TABLE enderecos ADD CONSTRAINT fk_usuario_endereco FOREIGN KEY (id_usuario) REFERENCES usuarios (id) ON DELETE CASCADE;

CREATE TABLE produtos(
	id INT AUTO_INCREMENT NOT NULL,
	id_brecho INT,
	nome VARCHAR(256) NOT NULL,
	preco DOUBLE(7,2) NOT NULL,
	descricao TEXT NOT NULL,
	genero VARCHAR(10) NOT NULL,
	tags VARCHAR(1024),
	constraint pk_produto primary key (id)
);
ALTER TABLE produtos ADD CONSTRAINT fk_brecho_produto FOREIGN KEY (id_brecho) REFERENCES brechos (id);

CREATE TABLE imagens(
	id INT AUTO_INCREMENT NOT NULL,
	id_produto INT NOT NULL,
	arquivo VARCHAR(256) NOT NULL,
	constraint pk_imagens primary key (id)
);
ALTER TABLE imagens ADD CONSTRAINT fk_produto_imagem FOREIGN KEY (id_produto) REFERENCES produtos (id) ON DELETE CASCADE;

CREATE TABLE curtidas(
	id INT AUTO_INCREMENT NOT NULL,
	id_produto INT NOT NULL,
	id_usuario INT NOT NULL,
	constraint pk_curtidas primary key (id)
);
ALTER TABLE curtidas ADD CONSTRAINT fk_produto_curtida FOREIGN KEY (id_produto) REFERENCES produtos (id) ON DELETE CASCADE;
ALTER TABLE curtidas ADD CONSTRAINT fk_usuario_curtida FOREIGN KEY (id_usuario) REFERENCES usuarios (id) ON DELETE CASCADE;

CREATE TABLE pedidos(
	id INT AUTO_INCREMENT NOT NULL,
	data DATE,
	status ENUM('NV', 'P', 'ENV', 'ENT') DEFAULT 'NV',/*Não visto, sendo preparado, enviado, entregue*/
	id_comprador INT NOT NULL,
	id_vendedor INT NOT NULL,
	id_produto INT NOT NULL,
	caminhoComprovante VARCHAR(256),
	valor_total DOUBLE(7,2),
	constraint pk_pedido primary key (id)
);
ALTER TABLE pedidos ADD CONSTRAINT fk_comprador_pedido FOREIGN KEY (id_comprador) REFERENCES usuarios (id);
ALTER TABLE pedidos ADD CONSTRAINT fk_vendedor_pedido FOREIGN KEY (id_vendedor) REFERENCES usuarios (id);
ALTER TABLE pedidos ADD CONSTRAINT fk_produto_pedido FOREIGN KEY (id_produto) REFERENCES produtos (id);

CREATE TABLE pedidos_produtos(
	id INT AUTO_INCREMENT NOT NULL,
	id_pedido INT,
	id_produto INT,
	valor DOUBLE(7,2),
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
