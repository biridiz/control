create database control DEFAULT CHARACTER SET utf8 COLLATE
utf8_general_ci;
use control;

CREATE USER 'admin'@'localhost' IDENTIFIED BY 'usgh*162Tjsi'; 
GRANT SELECT, INSERT, UPDATE, DELETE ON control.* TO
'admin'@'localhost';
GRANT ALL ON … 

create table registros (
	ID integer(6) AUTO_INCREMENT not null primary key,
	PLACA varchar(8) not null,
	MODELO varchar(20),
	COR varchar(20),
	DATA date not null,
	CORTESIA varchar(2),
	HORAIN time
	HORAOUT time,
	ID_CLIENTE integer(6),
	ID_USER integer(6),
	ID_EVENTO integer(6)
);

ALTER TABLE registros ADD CONSTRAINT fk_evento FOREIGN KEY (ID_EVENTO) REFERENCES evento (ID);
ALTER TABLE registros ADD CONSTRAINT fk_user FOREIGN KEY (ID_USER) REFERENCES usr (ID);
ALTER TABLE registros ADD CONSTRAINT fk_cliente FOREIGN KEY (ID_CLIENTE) REFERENCES cliente (ID);

create table cliente (
	ID integer(6) AUTO_INCREMENT not null primary key,
	NOME varchar(30) not null,
	TELEFONE varchar(11),
	CPF varchar(11)
);

create table usr (
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

insert into evento (NOME, PRECO, CIDADE) values ('16 ACAMPAMENTO FARROUPILHA', 20, 'CHAPECO');

create table credencial (
	ID integer(6) AUTO_INCREMENT not null primary key;
	CODIGO varchar(17) not null;
	ID_EXTERNO (3) not null;
);

insert into credencial (CODIGO, ID_EXTERNO) ('SAHD83470GSJS834', 002),
											('SDFT83470GSJS834', 003),
											('SVBM83470GSJS834', 004),
											('STYU83470GSJS834', 005),
											('SAQW83470GSJS834', 006),
											('SCVB83470GSJS834', 007),
											('SKJO83470GSJS834', 008),
											('SJAH83470GSJS834', 009),
											('SXFG83470GSJS834', 010),
											('SOIE83470GSJS834', 011),
											('SMXC83470GSJS834', 012),
											('SJDF83470GSJS834', 013),
											('SZFD83470GSJS834', 014),
											('SFGY83470GSJS834', 015),
											('SMJH83470GSJS834', 016),
											('SAER83470GSJS834', 017),
											('SXCG83470GSJS834', 018),
											('SLAO83470GSJS834', 019),
											('SAPR83470GSJS834', 020),
											('SNAR83470GSJS834', 021),
											('SBYF83470GSJS834', 022),
											('SPQC83470GSJS834', 023),
											('SMHI83470GSJS834', 024),
											('SQRT83470GSJS834', 025),
											('SFJT83470GSJS834', 026),
											('SMLQ83470GSJS834', 027),
											('SZRL83470GSJS834', 028),
											('SPET83470GSJS834', 029),
											('SNTL83470GSJS834', 030),
											('SATHZ3470GSJS834', 031),
											('SVMP83470GSJS834', 032),
											('SZRZ83470GSJS834', 033),
											('SZTB83470GSJS834', 034),
											('SQMM83470GSJS834', 035),
											('SQQQ83470GSJS834', 036),
											('SEEE83470GSJS834', 037),
											('SGGG83470GSJS834', 038),
											('SGGW83470GSJS834', 039),
											('SLLP83470GSJS834', 040),
											('SPPI83470GSJS834', 041),
											('SJIO83470GSJS834', 042),
											('SWTY83470GSJS834', 043),
											('SATL83470GSJS834', 044),
											('SAAA83470GSJS834', 045),
											('SBBB83470GSJS834', 046),
											('SAVV83470GSJS834', 047),
											('SNNN83470GSJS834', 048),
											('SJJJ83470GSJS834', 049),
											('SOOO83470GSJS834', 050),
											('SPPP83470GSJS834', 051),
											('SAQW83470GSJS834', 052),
											('SMUU83470GSJS834', 053),
											('SZDR83470GSJS834', 054),
											('SNHY83470GSJS834', 055),
											('SZAQ83470GSJS834', 056),
											('SXSW83470GSJS834', 057),
											('SCDE83470GSJS834', 058),
											('SVFR83470GSJS834', 059),
											('SBGT83470GSJS834', 060),
											('SNGY83470GSJS834', 061),
											('SMJU83470GSJS834', 062),
											('SLOI83470GSJS834', 063),
											('SXXX83470GSJS834', 064),
											('SHJK83470GSJS834', 065),
											('SZSE83470GSJS834', 066),
											('SCGY83470GSJS834', 067),
											('SBJI83470GSJS834', 068),
											('SNKO83470GSJS834', 069),
											('SHJJ83470GSJS834', 070),
											('SAHD83470GSJS834', 071),
											('QGHD83470GSJS834', 072),
											('QADD83470GSJS834', 073),
											('QXSW83470GSJS834', 075),
											('QZAQ83470GSJS834', 074),
											('QCDE83470GSJS834', 076),
											('QVFR83470GSJS834', 077),
											('QBGT83470GSJS834', 078),
											('QMJU83470GSJS834', 079),
											('QKOP83470GSJS834', 080),
											('QQWE83470GSJS834', 081),
											('QERT83470GSJS834', 082),
											('QTYU83470GSJS834', 083),
											('QUIO83470GSJS834', 084),
											('QIOP83470GSJS834', 085),
											('QASD83470GSJS834', 086),
											('QDFG83470GSJS834', 087),
											('QLAP83470GSJS834', 114),
											('QHJK83470GSJS834', 088),
											('QKLM83470GSJS834', 089),
											('QZXC83470GSJS834', 090),
											('QXCV83470GSJS834', 091),
											('QVBM83470GSJS834', 092),
											('QBNM83470GSJS834', 093),
											('QDFV83470GSJS834', 094),
											('QWWW83470GSJS834', 095),
											('QEEE83470GSJS834', 096),
											('QRRR83470GSJS834', 097),
											('QYYY83470GSJS834', 098),
											('QIOO83470GSJS834', 099),
											('QUUU83470GSJS834', 100),
											('QOOO83470GSJS834', 101),
											('QPPP83470GSJS834', 102),
											('QAAA83470GSJS834', 103),
											('QSSS83470GSJS834', 104),
											('QDDD83470GSJS834', 105),
											('QFFF83470GSJS834', 106),
											('QHHHH3470GSJS834', 107),
											('SQLLL3470GSJS834', 108),
											('QCACC3470GSJS834', 109),
											('QAER83470GSJS834', 110),
											('QZDF83470GSJS834', 111),
											('QBBB83470GSJS834', 112),
											('QNNN83470GSJS834', 113),
											('QQMD83470GSJS834', 115),
											('QRIF83470GSJS834', 116),
											('EDFG83470GSJS834', 117),
											('EQWE83470GSJS834', 118),
											('EWER83470GSJS834', 119),
											('ERTY83470GSJS834', 120),
											('ETYU83470GSJS834', 121),
											('EUIO83470GSJS834', 122),
											('EOPL83470GSJS834', 123),
											('EZDR83470GSJS834', 124),
											('ECVB83470GSJS834', 125),
											('ECGY83470GSJS834', 126),
											('EZXC83470GSJS834', 127),
											('RXCV83470GSJS834', 128),
											('EVBN83470GSJS834', 129),
											('EHJDK3470GSJS834', 130),
											('EBBB83470GSJS834', 131),
											('EZDR83470GSJS834', 132),
											('EMMM83470GSJS834', 133),
											('EKKK83470GSJS834', 134),
											('EZDR83470GSJS834', 135),
											('EMKO83470GSJS834', 136),
											('EXFT83470GSJS834', 137),
											('SGDF83470GSJS834', 138),
											('GQWE83470GSJS834', 139),
											('GWER83470GSJS834', 140),
											('GERT83470GSJS834', 141),
											('GRTY83470GSJS834', 142),
											('GYUI83470GSJS834', 143),
											('GBCD83470GSJS834', 144),
										 	('GIOP83470GSJS834', 145),
											('GASD83470GSJS834', 146),
											('GDFG83470GSJS834', 147),
											('GHJK83470GSJS834', 148),
											('GVHU83470GSJS834', 149),
											('GVHU83470GSJS834', 150);












										   






