-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS proyecto;
USE proyecto;

-- Crear el usuario demo si no existe
CREATE USER IF NOT EXISTS 'demo'@'localhost' IDENTIFIED BY '123';

-- Dar todos los privilegios al usuario demo
GRANT ALL PRIVILEGES ON proyecto.* TO 'demo'@'localhost';

-- Aplicar los privilegios
FLUSH PRIVILEGES;

-- Eliminar la tabla torneos si ya existe
DROP TABLE IF EXISTS torneos;

-- Crear la tabla torneos
CREATE TABLE torneos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombreTorneo VARCHAR(100) NOT NULL,
    organizador VARCHAR(100) NOT NULL,
    patrocinadores TEXT,
    sede VARCHAR(100),
    categoria VARCHAR(50),
    premio1 VARCHAR(100),
    premio2 VARCHAR(100),
    premio3 VARCHAR(100),
    otroPremio VARCHAR(100),
    usuario VARCHAR(50) NOT NULL UNIQUE,
    contraseña VARCHAR(255) NOT NULL
);

-- Insertar un torneo de prueba
-- La contraseña "123" esta encriptada para el ejemplo
INSERT INTO torneos (nombreTorneo, organizador, patrocinadores, sede, categoria, premio1, premio2, premio3, otroPremio, usuario, contraseña) VALUES
('Torneo Ejemplo',
'Administrador Principal',
'Nike, Adidas',
'Cancha Central',
'Libre',
'Trofeo y $5000',
'Medalla y $3000',
'Medalla y $1000',
'Jugador Mas Valioso',
'admin',
'$2y$10$EjemploPrueba1234567890');
