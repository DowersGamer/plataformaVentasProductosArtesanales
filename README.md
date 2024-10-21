15 de Octubre: Steven Lopez; Creacion de la tabla de usuarios.
 - CREATE TABLE `tienda_artesanal`.`usuarios` (`id` INT UNSIGNED NULL AUTO_INCREMENT , `nombre_usuario` VARCHAR(30) NULL , `correo_electronico` VARCHAR(100) NULL , `contrasena` VARCHAR(255) NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB; 

20 de Octubre: Steven Lopez; Creacion de la tabla de vistas de producto
- CREATE TABLE `vistas_productos` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `ip_usuario` varchar(15) NOT NULL,
    `producto` varchar(35) NOT NULL,
    PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci