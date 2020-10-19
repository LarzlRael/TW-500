create database tw_500_1;

use tw_500_1;

create table persona(
    id int primary key  auto_increment,
    nombre varchar(100) not null,
    apellido_p varchar(100) not null,
    apellido_m varchar(100) not null,
    telefono varchar(100) not null,
    direccion varchar(100) not null
);  