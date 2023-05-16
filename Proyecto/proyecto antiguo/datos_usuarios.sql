# select user from mysql.user;
# create user usuario identified by 'usuario';
# grant insert on usuarios to usuario;


create database datos_usuarios;
use datos_usuarios;

create table usuarios(
id int primary key auto_increment not null,
nombre varchar(15) not null,
apellido varchar(30) not null,
correo varchar(30) not null unique,
telefono varchar(9) not null,
contraseña varchar(64) not null,
CONSTRAINT telefono_limitado CHECK (LENGTH(telefono) <= 9)
);

select * from usuarios;