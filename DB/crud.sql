create database CRUD;

use crud;

create table usuario (
id int (15) not null auto_increment,
nombre varchar (45) not null,
apellidos varchar (45) not null,
telefono varchar (45) not null,
ciudad varchar (45) not null,
correo varchar (45) not null,
primary key (`id`)
);

alter table usuario modify correo varchar(50) not null;