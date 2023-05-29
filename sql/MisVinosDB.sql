CREATE DATABASE IF NOT EXISTS MisVinosDB;
USE MisVinosDB;

create user if not exists usuario identified by 'usuario';
GRANT ALL PRIVILEGES ON misvinosdb.* TO 'usuario'@"%";

select * from usuarios;
select * from articulos;
select * from ratings;