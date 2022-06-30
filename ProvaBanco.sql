CREATE DATABASE prova_cristhian_pedro_samuel;
USE prova_cristhian_pedro_samuel;

CREATE TABLE CLIENTE (
	Codigo integer not null auto_increment, 
    PrimeiroNome varchar(50) not null, 
    SegundoNome varchar(50) not null, 
    DataNasci date not null, 
    CPF char(14)  not null, 
    RG varchar(15)  not null, 
    Endereco varchar(100) not null, 
    CEP char(9) not null, 
    Cidade varchar(50) not null, 
	Fone char(15) not null,
    primary key(Codigo)
);

CREATE TABLE VENDAS (
	Codigo integer not null auto_increment, 
    CodigoCliente integer not null, 
    ValorParcial decimal(9,2) not null, 
    ValorDesconto decimal(9,2) not null, 
    ValorAcrescimo decimal(9,2) not null, 
    ValorTotal decimal(9,2) not null, 
    dtVenda date not null,
    primary key(Codigo),
    foreign key(CodigoCliente) references CLIENTE(Codigo)
);

insert into CLIENTE values(null, "eu aqui", "não sei", "2001-11-29", "000.000.000-00", "MG00000000", "Rua fulando de tal, n 55", "00000-000", "Cidade", "(00) 00000-0000");
insert into VENDAS values(null, 1,2.0,3.0,5.0,7.0, now());
select * from CLIENTE;
select * from VENDAS;