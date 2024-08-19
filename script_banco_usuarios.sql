ALTER TABLE usuarios ADD CONSTRAINT uk_usuario UNIQUE KEY (login);

/*Inserts usuarios*/
/* admin - admin */
INSERT INTO usuarios (nome, login, senha, nivel_acesso) VALUES ('Sr. Administrador', 'admin', 
                '$2y$10$PrnFrYArQJto/SlnMTFTpOSDKU9XS5PfeHHUvJlzMxeJH5KdnI/Sm', 1);
/* root - root */
INSERT INTO usuarios (nome, login, senha, nivel_acesso) VALUES ('Sr. Root', 'root', 
                '$2y$10$9H8nNzW7tM7cGhy6r59gYuKuflEGKzKGOMPv86yUhJbySUNnnY42y', 1);
