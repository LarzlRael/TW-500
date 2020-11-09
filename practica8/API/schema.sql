create database ajax;
use ajax;
create table user (
    id int primary key auto_increment,
    nombre varchar(25),	
    apellido_p varchar(25),	
    apellido_m varchar(25),	
    telefono char (10),
    direccion varchar(50),
    estado Boolean
);
