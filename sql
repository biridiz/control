create database control DEFAULT CHARACTER SET utf8 COLLATE
utf8_general_ci;
use control;

create table registros (
	ID integer(6) AUTO_INCREMENT not null primary key,
	PLACA varchar(8) not null unique,
	MODELO varchar(20) not null,
	COR varchar(20) not null,
	DATA date not null,
	HORAIN time,
	HORAOUT time
);
