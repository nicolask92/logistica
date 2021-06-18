DROP DATABASE IF EXISTS G13;
CREATE DATABASE IF NOT EXISTS G13;
USE G13;
-- ******************************************

CREATE TABLE usuarios
(
	id TINYINT PRIMARY KEY,
	usuario VARCHAR(50) UNIQUE NOT NULL,
    contrasenia CHAR(32) NOT NULL
);

-- ******************************************

CREATE TABLE empleados
(
	legajo TINYINT PRIMARY KEY,
    dni INT(15) UNIQUE NOT NULL,
    fecha_nacimiento DATE,
    usuario VARCHAR(50) NOT NULL,
    FOREIGN KEY (usuario) REFERENCES usuarios(usuario)
);

-- ******************************************

CREATE TABLE administrador
(
	id_admin TINYINT PRIMARY KEY,
    legajo TINYINT,
    FOREIGN KEY (legajo) REFERENCES empleados(legajo)
);

-- ******************************************


CREATE TABLE supervisor
(
	id_supervisor TINYINT PRIMARY KEY,
    legajo TINYINT,
    FOREIGN KEY (legajo) REFERENCES empleados(legajo)
);

-- ******************************************


CREATE TABLE chofer
(
	id_chofer TINYINT PRIMARY KEY,
    tipo_licencia VARCHAR(10) NOT NULL,
    legajo TINYINT,
    FOREIGN KEY (legajo) REFERENCES empleados(legajo)
);

-- ******************************************


CREATE TABLE mecanico
(
	id_mecanico TINYINT PRIMARY KEY,
    legajo TINYINT,
    FOREIGN KEY (legajo) REFERENCES empleados(legajo)
);

-- ******************************************


CREATE TABLE viaje
(
	id_viaje TINYINT PRIMARY KEY,
    tipo_carga VARCHAR(15),
	fecha DATE,
    inicio VARCHAR(15),
    destino VARCHAR(15),
	combustible FLOAT(10),
    km_previstos INT(10),
    km_reales INT(10),
    id_supervisor TINYINT NOT NULL,
    id_chofer TINYINT NOT NULL,
    FOREIGN KEY (id_supervisor) REFERENCES supervisor(id_supervisor),
    FOREIGN KEY (id_chofer) REFERENCES chofer(id_chofer)
);

-- ******************************************

CREATE TABLE carga
(
	id_carga TINYINT PRIMARY KEY,
    referencia VARCHAR(15),
    hazard VARCHAR(12),
    peso_neto VARCHAR(15),
    tipo VARCHAR(15),
    id_viaje TINYINT NOT NULL,
    FOREIGN KEY (id_viaje) REFERENCES viaje(id_viaje)
);

-- ******************************************

CREATE TABLE cliente
(
	id_cliente TINYINT PRIMARY KEY,
    telefono INT(15),
    cuit BIGINT,
    direccion VARCHAR(15),
    mail VARCHAR(150) NOT NULL,
    contacto TINYINT,
    id_viaje TINYINT NOT NULL,
    FOREIGN KEY (id_viaje) REFERENCES viaje(id_viaje)
);

-- ****************************************** 
/*De cada vehículo se registra, marca, modelo, patente, nro. de chasis, nro. de motor, año de fabricación,
calendarización de service, kilometraje, y todo dato que se considere pertinente.*/
CREATE TABLE vehiculo
(
	patente VARCHAR(7) PRIMARY KEY,
    id_viaje TINYINT NOT NULL,
    FOREIGN KEY (id_viaje) REFERENCES viaje(id_viaje)
);

-- ****************************************** 

CREATE TABLE camion
(
	patente VARCHAR(7) PRIMARY KEY,
    nro_chasis VARCHAR(10) UNIQUE NOT NULL,
    marca VARCHAR(15),
    modelo VARCHAR(30),
    kilometraje INT(15),
    ultimo_service DATE,
    nro_motor INT(15),
    id_viaje TINYINT NOT NULL,
    FOREIGN KEY (id_viaje) REFERENCES viaje(id_viaje)
);

-- ****************************************** 

CREATE TABLE arrastrador
(
	patente VARCHAR(7) PRIMARY KEY,
    nro_chasis VARCHAR(10) UNIQUE NOT NULL,
    tipo VARCHAR(150),
    id_viaje TINYINT NOT NULL,
    patente_camion VARCHAR(7),
    FOREIGN KEY (id_viaje) REFERENCES viaje(id_viaje),
    FOREIGN KEY (patente_camion) REFERENCES camion(patente)
);

-- ****************************************** 

CREATE TABLE mantenimiento
(
	id_service TINYINT PRIMARY KEY,
    fecha DATE,
    costo INT(10),
    tipo VARCHAR(150),
    repuesto_cambiado VARCHAR(150),
    id_mecanico TINYINT NOT NULL,
    FOREIGN KEY (id_mecanico) REFERENCES mecanico(id_mecanico)
);

-- ****************************************** 

CREATE TABLE mantenimiento_camiones
(
	id_service TINYINT PRIMARY KEY,
    patente_camion VARCHAR(7) NOT NULL,
    FOREIGN KEY (patente_camion) REFERENCES camion(patente)
);