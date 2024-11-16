ALTER TABLE usuarios ADD CONSTRAINT uk_usuario UNIQUE KEY (login);

/*Inserts usuarios*/
/* admin - admin */
INSERT INTO usuarios (nome, login, senha, nivel_acesso) VALUES ('Sr. Administrador', 'admin',
                '$2y$10$PrnFrYArQJto/SlnMTFTpOSDKU9XS5PfeHHUvJlzMxeJH5KdnI/Sm', 1);
/* root - root */
INSERT INTO usuarios (nome, login, senha, nivel_acesso) VALUES ('Sr. Root', 'root',
                '$2y$10$9H8nNzW7tM7cGhy6r59gYuKuflEGKzKGOMPv86yUhJbySUNnnY42y', 1);

/* rafael@gmail.com - admin*/
INSERT INTO usuarios (nome, email, login, senha, cpf, telefone, data_nascimento, nivel_acesso) VALUES ('Rafael', 'rafael@gmail.com',
                'rafael@gmail.com', '$2y$10$PrnFrYArQJto/SlnMTFTpOSDKU9XS5PfeHHUvJlzMxeJH5KdnI/Sm', '99999999999', '9999999999999', '1111-11-11' ,1);

/* teste@gmail.com - admin */
INSERT INTO usuarios (nome, email, login, senha, cpf, telefone, data_nascimento, nivel_acesso) VALUES ('Teste', 'teste@gmail.com',
                'teste@gmail.com', '$2y$10$PrnFrYArQJto/SlnMTFTpOSDKU9XS5PfeHHUvJlzMxeJH5KdnI/Sm', '99999999999', '9999999999999', '1111-11-11' ,1);
