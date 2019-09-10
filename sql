create database control DEFAULT CHARACTER SET utf8 COLLATE
utf8_general_ci;
use control;

create table registros (
	ID integer(6) AUTO_INCREMENT not null primary key,
	PLACA varchar(8) not null,
	MODELO varchar(20),
	COR varchar(20),
	DATA date not null,
	CORTESIA,
	HORAIN time,
	HORAOUT time,
	ID_CLIENTE,
	ID_USER,
	ID_EVENTO
);

create table cliente (
	ID integer(6) AUTO_INCREMENT not null primary key,
	NOME varchar(30) not null,
	TELEFONE varchar(11),
	CPF varchar(11)
);

create table user (
	ID integer(6) AUTO_INCREMENT not null primary key,
	NOME varchar(30) not null,
	TELEFONE varchar(11) not null
);

create table evento (
	ID integer(6) AUTO_INCREMENT not null primary key,
	NOME varchar(30) not null,
	PRECO double,
	CIDADE varchar(30)
);
