
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS usuario(
	id int primary key auto_increment,
	nome varchar(220) not null,
	email varchar(220) not null,
	senha char(220) not null,
	perfil enum('adm', 'user') not null,
	licensed bit not null
);

INSERT INTO USUARIO values(null, 'Gustavo', 'gustavo@gmail.com', '$2y$10$VywIVAane04e4.YjMlhgTOL687XtubBfax50hVgqYbfh.GQi0zwHK', 'adm', 1);
INSERT INTO USUARIO values(null, 'Teste', 'teste@gmail.com', '$2y$10$LjNt97W5VIu/fXDlGZJJc.i4HdHUeLwcnK/s0OoqvvIoQ3bn476Nu', 'user', 0);