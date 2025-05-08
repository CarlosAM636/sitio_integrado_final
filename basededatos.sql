CREATE DATABASE IF NOT EXISTS cosmeticos_db;
USE cosmeticos_db;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    clave VARCHAR(100) NOT NULL
);

CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10,2),
    imagen VARCHAR(255)
);

INSERT INTO productos (nombre, descripcion, precio, imagen) VALUES
('Labial mate', 'Color duradero y textura suave', 29.90, 'labial.jpg'),
('Base líquida', 'Cobertura perfecta para todo tipo de piel', 45.50, 'base.jpg');
