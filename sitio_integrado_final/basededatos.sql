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
('Labial mate', 'Color duradero y textura suave', 8.50, 'labial.jpg'),
('Base líquida', 'Cobertura perfecta para todo tipo de piel', 29.90, 'base.jpg');
('Delineador', 'resalta tu mirada con nuestro delineador', 15.00, 'delineador.jpg');
('polvo compacto', 'un acabado suave y natural', 22.00, 'polvo.jpg');
('rubor', 'dale vida tu rostro con nuestro rubor', 15.00, 'rubor.jpeg');
('sombras de ojos ', ' paletas de sombras con tonos que conbina con acabados brillantes',13.50,'sombra de ojos.jpeg');
('labial lip gloss', 'lip gloos con un acabado hermoso en tus labios', 11.50, '...');
