CREATE TABLE IF NOT EXISTS usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100),
    correo VARCHAR(100),
    password VARCHAR(255)
);
CREATE TABLE IF NOT EXISTS categorias (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100)
);
CREATE TABLE IF NOT EXISTS tareas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(100),
    contenido VARCHAR(255),
    terminada BOOLEAN,
    fechaCreacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fechaTerminacion TIMESTAMP,
    usuario_id INT,
    categoria_id INT,

    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (categoria_id) REFERENCES categorias(id)

);
