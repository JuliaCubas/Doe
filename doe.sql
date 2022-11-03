DROP DATABASE doe;
CREATE DATABASE doe;
USE doe;

CREATE TABLE usuarios(
id int primary key auto_increment, 
cpf varchar (11) NOT NULL,
nome varchar (100) NOT NULL,
email varchar (200) NOT NULL,
tiposang int (1) NOT NULL,
senha varchar (10)NOT NULL, 
nivel int (1) NOT NULL
);

