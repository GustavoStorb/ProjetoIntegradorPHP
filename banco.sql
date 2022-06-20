USE crud;

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS usuario(
	id int primary key auto_increment,
	nome varchar(220) not null,
	email varchar(220) not null unique,
	senha char(220) not null,
	perfil enum('adm', 'user') not null,
	licensed boolean not null
);

DROP TABLE IF EXISTS `chamado`;
CREATE TABLE IF NOT EXISTS chamado(
    id int primary key auto_increment,
    endereco varchar(255) not null,
    tempo varchar(220) not null,
    km int not null,
    funcionario_id int not null,
    veiculo_id int not null,
    data date not null
);

DROP TABLE IF EXISTS `veiculo`;
CREATE TABLE IF NOT EXISTS veiculo(
    id int primary key auto_increment not null,
    tipo varchar(50) not null,
    ano int(4) not null,
    consumo decimal(30,1) not null
);

INSERT INTO USUARIO values(null, 'Gustavo', 'gustavo@gmail.com', '$2y$10$VywIVAane04e4.YjMlhgTOL687XtubBfax50hVgqYbfh.GQi0zwHK', 'adm', 1);
INSERT INTO USUARIO values(null, 'Teste', 'teste@gmail.com', '$2y$10$LjNt97W5VIu/fXDlGZJJc.i4HdHUeLwcnK/s0OoqvvIoQ3bn476Nu', 'user', 0);
INSERT INTO USUARIO values(null, 'Manoel', 'manoel@gmail.com', '$2y$10$VywIVAane04e4.YjMlhgTOL687XtubBfax50hVgqYbfh.GQi0zwHK', 'adm', 1);
INSERT INTO USUARIO values(null, 'Eduardo', 'eduardo@gmail.com', '$2y$10$LjNt97W5VIu/fXDlGZJJc.i4HdHUeLwcnK/s0OoqvvIoQ3bn476Nu', 'user', 1);
INSERT INTO USUARIO values(null, 'Raphael', 'raphael@gmail.com', '$2y$10$VywIVAane04e4.YjMlhgTOL687XtubBfax50hVgqYbfh.GQi0zwHK', 'adm', 1);
INSERT INTO USUARIO values(null, 'Tiago', 'tiago@gmail.com', '$2y$10$LjNt97W5VIu/fXDlGZJJc.i4HdHUeLwcnK/s0OoqvvIoQ3bn476Nu', 'user', 0);
INSERT INTO USUARIO values(null, 'Enzo', 'enzo@gmail.com', '$2y$10$VywIVAane04e4.YjMlhgTOL687XtubBfax50hVgqYbfh.GQi0zwHK', 'adm', 1);
INSERT INTO USUARIO values(null, 'Cosme', 'cosme@gmail.com', '$2y$10$LjNt97W5VIu/fXDlGZJJc.i4HdHUeLwcnK/s0OoqvvIoQ3bn476Nu', 'user', 1);
INSERT INTO USUARIO values(null, 'Sandra', 'sandra@gmail.com', '$2y$10$VywIVAane04e4.YjMlhgTOL687XtubBfax50hVgqYbfh.GQi0zwHK', 'adm', 0);
INSERT INTO USUARIO values(null, 'Douglas', 'douglas@gmail.com', '$2y$10$LjNt97W5VIu/fXDlGZJJc.i4HdHUeLwcnK/s0OoqvvIoQ3bn476Nu', 'user', 1);