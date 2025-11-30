CREATE DATABASE bicicletas;
USE bicicletas;

-- TABLA USUARIOS
CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    contraseña VARCHAR(255) NOT NULL
);

-- TABLA TIPO DE PRODUCTO
CREATE TABLE tipo_producto(
	id_tipo INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    descripcion TEXT 
);

-- TABLA PRODUCTOS
CREATE TABLE producto(
	id_producto INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL,
    id_tipo INT NOT NULL,
    id_usuario INT NOT NULL,
    FOREIGN KEY (id_tipo) REFERENCES tipo_producto(id_tipo),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
);


INSERT INTO usuarios (usuario, contraseña)VALUES 
('alexisarciniegas12@gmail.com','12345678');
select*from usuarios; 

INSERT INTO tipo_producto (nombre, descripcion) 
VALUES ('Bicicletas de Montaña (MTB)', 'Bicicletas diseñadas para terrenos irregulares, senderos y montañas');
select*from tipo_producto; 

INSERT INTO producto (nombre, precio, stock, id_tipo, id_usuario)
VALUES ('Bicicletas de Montaña (MTB)', 1000000, 22, 1, 1);
select*from producto; 

