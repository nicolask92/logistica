drop schema if exists G7;
create database G7;

-- Estructura de tabla para la tabla `usuario`
use G7;

CREATE TABLE usuario
( id INT PRIMARY KEY auto_increment,
  usuario varchar(50) unique,
  contraseña varchar (30),
  email varchar(100) not null
);

INSERT into usuario(usuario, contraseña, email)
values('admin', 'admin', 'admin@g7.com'),
      ('supervisor', 'supervisor', 'supervisor@g7.com'),
      ('mecanico', 'mecanico', 'mecanico@g7.com'),
      ('chofer', 'chofer', 'chofer@g7.com');


CREATE TABLE empleado
(legajo tinyint unique primary key,
 dni int(15),
 fecha_nacimiento datetime,
 usuario_id int,
 foreign key(usuario_id) references usuario(id)
);

INSERT into empleado(legajo, dni, fecha_nacimiento, usuario_id)
values(001,25634786,'20160104', 1),
      (002,17601423,'20080512', 2),
      (003,30345123,'20171020', 3),
      (004,23053567,'20160307', 4);

CREATE TABLE administrador
(id tinyint primary key auto_increment,
 legajo tinyint,
 foreign key(legajo) references empleado(legajo)
);

INSERT into administrador(legajo)
values(001);


CREATE TABLE supervisor
(id tinyint primary key auto_increment,
 legajo tinyint,
 foreign key(legajo) references empleado(legajo)
);

INSERT into supervisor(legajo)
values(002);

CREATE TABLE chofer
(id tinyint primary key auto_increment,
 tipo_licencia varchar(10),
 legajo tinyint,
 foreign key(legajo) references empleado(legajo),
 patente varchar(10),
 estado enum('DISPONIBLE', 'EN_VIAJE')
);

INSERT into chofer(tipo_licencia, legajo, patente)
values('A', 004, 'amh628');

CREATE TABLE mecanico
(id tinyint primary key auto_increment,
 legajo tinyint,
 foreign key(legajo) references empleado(legajo)
);

INSERT into mecanico(legajo)
values(003);

CREATE TABLE costeo(
                       id tinyint primary key auto_increment,
                       id_viaje tinyint,
                       combustible_previsto int(10),
                       combustible_real int(10),
                       viaticos_previsto int(10),
                       viaticos_real int(10),
                       peajes_previsto int(10),
                       peajes_real int(10),
                       pesajes_previsto int(10),
                       pesajes_real int(10),
                       extras_previsto int(10),
                       extras_real int(10),
                       fee_previsto int(10),
                       fee_real int(10)
);

CREATE TABLE viaje
(id_viaje tinyint primary key auto_increment,
 tipo_carga varchar(15),
 fecha_carga datetime,
 fecha_partida datetime,
 fecha_arribo datetime,
 eta datetime,
 etd datetime,
 hazard boolean,
 imo_class varchar(100),
 reefer boolean,
 temperatura int(10),
 origen varchar(100),
 destino varchar(100),
 km_previsto int(10),
 km_real int(10),
 estado enum('PENDIENTE', 'ACTIVO', 'FINALIZADO'),
 id_costeo tinyint,
 foreign key(id_costeo) references costeo(id),
 id_supervisor tinyint,
 foreign key(id_supervisor) references supervisor(id),
 id_chofer tinyint,
 foreign key(id_chofer) references chofer(id)
);

INSERT into costeo(
    combustible_previsto,
    viaticos_previsto,
    peajes_previsto,
    pesajes_previsto,
    extras_previsto,
    fee_previsto)
values('200', '5000', '1000', '2000', '500', '10000');


INSERT into viaje(
    tipo_carga,
    fecha_carga,
    fecha_partida,
    fecha_arribo,
    eta,
    etd,
    hazard,
    reefer,
    origen,
    destino,
    km_previsto,
    km_real,
    estado,
    id_costeo,
    id_supervisor,
    id_chofer)
values('Jaula',
       '1970-01-01 00:00:01',
       '1970-01-01 00:00:01',
       '1970-01-01 00:00:01',
       '1970-01-01 00:00:01',
       '1970-01-01 00:00:01',
       1,
       0,
       'Buenos Aires',
       'Cordoba',
       '600',
       '600',
       'FINALIZADO',
       1,
       1,
       1);

CREATE TABLE carga
(id tinyint primary key auto_increment,
 refeer boolean,
 hazard boolean,
 peso_neto varchar(15),
 id_viaje tinyint,
 foreign key(id_viaje) references viaje(id_viaje)
);

INSERT into carga(refeer, hazard, peso_neto, id_viaje)
values(1, 0, 10000, 1);

CREATE TABLE cliente
(id tinyint primary key auto_increment,
 telefono int(15),
 cuit bigint,
 direccion varchar(15),
 email varchar(150) not null,
 id_viaje tinyint,
 foreign key(id_viaje) references viaje(id_viaje)
);

INSERT into cliente(telefono, cuit, direccion, email, id_viaje)
values(1127522545, 20306478901, 'Guemes 1345', 'bartolo67@gmail.com', 1);

CREATE TABLE camiones
(
    id tinyint primary key auto_increment,
    patente varchar(6) not null unique,
    marca varchar(15),
    modelo int(15),
    kilometraje int(15),
    ultimo_service datetime,
    nro_chasis int(15) unique,
    nro_motor int(15) unique,
    id_viaje tinyint,
    foreign key(id_viaje) references viaje(id_viaje)
);

INSERT into camiones(patente, marca, modelo, kilometraje, ultimo_service, nro_chasis, nro_motor, id_viaje)
values('amh628', 'Scania', 2015, 10000, '20170920', 235, 14, 1);

CREATE TABLE arrastrador
(id tinyint primary key auto_increment,
 nro_chasis int(15) unique,
 tipo varchar(150),
 patente varchar(6) not null unique,
 id_viaje TINYINT,
 foreign key(patente) references camiones(patente),
 FOREIGN KEY (id_viaje) REFERENCES viaje(id_viaje)
);

INSERT into arrastrador(nro_chasis, tipo, patente)
values(1123165616, 'Jaula', 'amh628');

CREATE TABLE mantenimiento
(id tinyint primary key auto_increment,
 fecha datetime,
 costo int(15),
 tipo enum('INTERNO', 'EXTERNO'),
 repuesto_cam varchar(150),
 id_camion tinyint,
 foreign key(id_camion) references camiones(id),
 id_mecanico tinyint,
 foreign key(id_mecanico) references mecanico(id)
);

INSERT into mantenimiento(tipo, fecha, costo, repuesto_cam, id_camion, id_mecanico)
values('INTERNO', '1970-01-01 00:00:01', 2000, 'pastillas_nuevas', 1, 1);