/*Apaga a base de dados*/
DROP DATABASE crud;

/*Criando uma base de dados*/
CREATE DATABASE crud;

/*Conectando à uma base de dados*/
USE crud;

CREATE TABLE veiculo(
    cod int primary key auto_increment,
    modelo varchar(50) not null,
    ano int not null,
    consumo DOUBLE not null
);

CREATE TABLE usuario(
	cod int primary key auto_increment,
	nome varchar(501) not null,
	email varchar(50) not null,
	login varchar(50) unique not null,
	senha char(32) not null,
	perfil enum('adm', 'user') not null,
	licensed bit not null
);

INSERT INTO USUARIO values(null, 'Gustavo', 'gustavo@gmail.com', 'Gustavo', md5('123'), 'adm', 1);
INSERT INTO USUARIO values(null, 'Teste', 'teste@gmail.com', 'Teste', md5('123'), 'user', 0);