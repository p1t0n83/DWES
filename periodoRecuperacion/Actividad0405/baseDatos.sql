-- Crear la base de datos "fruteria"
CREATE DATABASE IF NOT EXISTS fruteria;
USE fruteria;

-- Crear tabla de familias
CREATE TABLE familias (
    idfamilias INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(45) NOT NULL
);

-- Insertar algunas familias de ejemplo
INSERT INTO familias (nombre) VALUES 
('Cítricos'),
('Frutas tropicales'),
('Frutas de hueso'),
('Frutas rojas'),
('Frutas de pepita');

-- Crear tabla de productos
CREATE TABLE productos (
    idproductos INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(45) NOT NULL,
    descripcion VARCHAR(100),
    precio FLOAT NOT NULL,
    familia INT,
    FOREIGN KEY (familia) REFERENCES familias(idfamilias) ON DELETE SET NULL
);

-- Crear tabla de imágenes
CREATE TABLE imagenes (
    idimagenes INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(45) NOT NULL,
    producto INT,
    FOREIGN KEY (producto) REFERENCES productos(idproductos) ON DELETE CASCADE
);

-- Crear tabla de usuarios
CREATE TABLE usuarios (
    idusuarios INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(45) NOT NULL,
    password VARCHAR(45) NOT NULL,
    email VARCHAR(45) NOT NULL
);
