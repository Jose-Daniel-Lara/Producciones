   CREATE DATABASE Producciones251;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              CREATE DATABASE eventosProducciones251;

USE Producciones251;

CREATE TABLE usuarios(
`id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
`imagen`  VARCHAR(1000) NULL,
`usuario`VARCHAR(14) NOT NULL,
`tipoUsuario`VARCHAR(14) NOT NULL,
`correo` VARCHAR(30)  NOT NULL,
`clave`VARCHAR(30)  NOT NULL,
`repetirClave` VARCHAR(30) NOT NULL,
`status` VARCHAR(50) NOT NULL

) ENGINE=MyISAM DEFAULT CHARSET=Latin1;


CREATE TABLE ventas(
`numeroVenta`INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
`cedula` VARCHAR (15)NOT NULL,
`metodoPago` INT(5) NOT NULL,
`descripcionVenta` VARCHAR(100) NOT NULL,
`fecha` DATE NOT NULL,
`hora` TIME NOT NULL,
`montoTotal`  VARCHAR(100)NOT NULL,
`status` VARCHAR(50) NOT NULL,
FOREIGN KEY(`cedula`) REFERENCES clientes(`cedula`),
FOREIGN KEY(`metodoPago`) REFERENCES metodoPago(`id_metodo`)
) ENGINE=MyISAM DEFAULT CHARSET=Latin1;


CREATE TABLE detalleVenta(
`codigo` VARCHAR (15) NOT NULL PRIMARY KEY ,
`idVenta` INT(11) NOT NULL ,
`evento`  VARCHAR (15) NOT NULL,
`id_mesa`  INT(11) NOT NULL,
`cantEntradas` INT(11) NOT NULL,
`precio`   VARCHAR(100) NOT NULL,
`descuento`  VARCHAR(100) NOT NULL,
`subTotal`  VARCHAR(100) NOT NULL,
`status` VARCHAR(50) NOT NULL,
FOREIGN KEY(`idVenta`) REFERENCES ventas(`numeroVenta`),
FOREIGN KEY(`id_mesa`) REFERENCES mesas(`id_mesa`)
)ENGINE=MyISAM DEFAULT CHARSET=Latin1;

CREATE TABLE metodoPago(
`id_metodo` INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
`metodo` VARCHAR(15)NOT NULL,
`status` VARCHAR(50) NOT NULL
)ENGINE=MyISAM DEFAULT CHARSET=Latin1;

CREATE TABLE clientes(

`cedula` VARCHAR(15) NOT NULL PRIMARY KEY,
`nombre` VARCHAR(30)  NOT NULL,
`apellido` VARCHAR(30) NOT NULL,
`telefono` VARCHAR (14),
`correoElectronico` VARCHAR(30),
`status` VARCHAR(50) NOT NULL

)ENGINE=MyISAM DEFAULT CHARSET=Latin1;

CREATE TABLE eventos(
`codigo`  VARCHAR (15) NOT NULL PRIMARY KEY ,
`nombre`  VARCHAR(50) NOT NULL,
`tipoEvento` VARCHAR (15) NOT NULL,
`lugar`  VARCHAR(15)NOT NULL,
`entradas`  INT(10)NOT NULL,
`fecha`  DATE NOT NULL,
`hora` TIME NOT NULL,
`imagen`  VARCHAR(1000)NOT NULL,
`status` VARCHAR(50) NOT NULL,
FOREIGN KEY(`tipoEvento`) REFERENCES tipoEvento(`cod_tipo`),
FOREIGN KEY(`lugar` ) REFERENCES lugar(`cod_lugar`)

)ENGINE=MyISAM DEFAULT CHARSET=Latin1;

CREATE TABLE tipoEvento(
`cod_tipo`  VARCHAR (15) NOT NULL PRIMARY KEY,
`tipo`  VARCHAR(15)NOT NULL,
`status` VARCHAR(50) NOT NULL
)ENGINE=MyISAM DEFAULT CHARSET=Latin1;

CREATE TABLE lugar(
`cod_lugar` VARCHAR (15) NOT NULL PRIMARY KEY ,
`lugar` VARCHAR(30)NOT NULL,
`direccion` VARCHAR(30)NOT NULL,
`status` VARCHAR(50) NOT NULL
)ENGINE=MyISAM DEFAULT CHARSET=Latin1;


CREATE TABLE entradas(
`codigo` INT (15) NOT NULL PRIMARY KEY ,
`numMesa`INT(11) NOT NULL,
`status` VARCHAR(50) NOT NULL,
FOREIGN KEY(`numMesa`) REFERENCES mesaEventos(`id_mesa`)

)ENGINE=MyISAM DEFAULT CHARSET=Latin1;

CREATE TABLE mesas(
`id_mesa` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
`evento`VARCHAR(15) NOT NULL,
`area`VARCHAR(15) NOT NULL,
`precio`  VARCHAR(100) NOT NULL,
`posiColumna`INT(5) NOT NULL,
`posiFila` INT(5) NOT NULL,
`cantPuesto` INT(5) NOT NULL,
`status` VARCHAR(50) NOT NULL,
FOREIGN KEY(`evento`) REFERENCES eventos(`codigo`),
FOREIGN KEY(`area`) REFERENCES area(`cod_area`)

)ENGINE=MyISAM DEFAULT CHARSET=Latin1;

CREATE TABLE area(
`cod_area`VARCHAR(15) NOT NULL PRIMARY KEY,
`nombArea` VARCHAR(15)NOT NULL,
`status` VARCHAR(50) NOT NULL
)ENGINE=MyISAM DEFAULT CHARSET=Latin1;


CREATE TABLE moneda(
`id` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
`moneda` VARCHAR(15)NOT NULL,
`cambio` VARCHAR(100) NOT NULL,
`status` VARCHAR(50) NOT NULL

)ENGINE=MyISAM DEFAULT CHARSET=Latin1;