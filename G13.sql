create database G13;
use G13;
drop database G13;

-- Estructura de tabla para la tabla `usuario`
use G13;

CREATE TABLE usuario 
( usuario varchar(50) PRIMARY KEY,
  contraseña varchar (15)
  );
  
INSERT into usuario(usuario, contraseña)
values('jmartinez23', 342),
      ('msanchez75', 603),
      ('flopez45', 217),
      ('cvillalba', 187);

CREATE TABLE empleado
(legajo tinyint primary key,
dni int(15),
fecha_nacimiento date,
usuario varchar(50) not null,
foreign key(usuario) references usuario(usuario)
);

INSERT into empleado(legajo, dni, fecha_nacimiento, usuario)
values(001,25634786,'20160104', 'jmartinez23'),
      (002,17601423,'20080512', 'msanchez75'),
      (003,30345123,'20171020', 'flopez45'),
      (004,23053567,'20160307', 'cvillalba');

CREATE TABLE administrador
(idadmin tinyint primary key,
legajo tinyint,
foreign key(legajo) references empleado(legajo)
);

INSERT into administrador(idadmin, legajo)
values(1, 001);  

CREATE TABLE supervisor
(idsuper tinyint primary key,
legajo tinyint,
foreign key(legajo) references empleado(legajo)
);

INSERT into supervisor(idsuper, legajo)
values(2, 002);  

CREATE TABLE chofer
(idchofer tinyint primary key,
 tipo_licencia varchar(10),
legajo tinyint,
foreign key(legajo) references empleado(legajo),
patente varchar(10)
);

INSERT into chofer(idchofer, tipo_licencia, legajo, patente)
values(3, 'A', 003, 'amh628');  

CREATE TABLE mecanico
(idmecanico tinyint primary key,
legajo tinyint,
foreign key(legajo) references empleado(legajo)
);

INSERT into mecanico(idmecanico, legajo)
values(4, 004);  


CREATE TABLE viaje
(idviaje tinyint primary key,
tipo_carga varchar(15),
fecha date,
inicio varchar(15),
destino varchar(15),
combustible int(10),
km_previstos int(10),
km_reales int(10),
idsuper tinyint,
foreign key(idsuper) references supervisor(idsuper),
idchofer tinyint,
foreign key(idchofer) references chofer(idchofer)
);

INSERT into viaje(idviaje, tipo_carga, fecha, inicio, destino, combustible, km_previstos, km_reales, idsuper, idchofer)
values(01, 'pesada', '20180515', 'Buenos Aires', 'Cordoba', '49', '600', '699', 2, 3);  

CREATE TABLE carga
(idcarga tinyint primary key,
referencia varchar(15),
hazard int(12),
peso_neto varchar(15),
tipo varchar(15),
idviaje tinyint,
foreign key(idviaje) references viaje(idviaje)
);

INSERT into carga(idcarga, referencia, hazard, peso_neto, tipo, idviaje)
values(01, 'alimenticio', 10, 150, 'semipesado', 1);  


CREATE TABLE cliente
(idcliente tinyint primary key,
telefono int(15),
cuit bigint,
direccion varchar(15),
mail varchar(150) not null,
contacto varchar(15),
idviaje tinyint,
foreign key(idviaje) references viaje(idviaje)
);

INSERT into cliente(idcliente, telefono, cuit, direccion, mail, contacto, idviaje)
values(10, 23457765, '20306478901', 'Guemes 1345', 'bartolo67@gmail.com', 'bartolo', 1);  

CREATE TABLE camiones
(patente varchar(6) not null,
marca varchar(15),
modelo int(15),
kilometraje int(15),
ultimo_service date,
nro_chasis int(15),
nro_motor int(15),
idviaje tinyint,
foreign key(idviaje) references viaje(idviaje),
primary key(patente)
);

INSERT into camiones(patente, marca, modelo, kilometraje, ultimo_service, nro_chasis, nro_motor, idviaje)
values('amh628', 'Scania', 2015, 10000, '20170920', 235, 14, 1);  

CREATE TABLE arrastrador
(idarras tinyint primary key,
chasis varchar(15),
tipo varchar(150),
patente varchar(6) not null,
foreign key(patente) references camiones(patente)
);

INSERT into arrastrador(idarras, chasis, tipo, patente)
values(101, 'semi_remolque', 'grua_de_arrastre', 'amh628');  

CREATE TABLE mantenimiento
(idservice tinyint primary key,
fecha date,
costo int(15),
tipo varchar(150),
repuesto_cam varchar(150),
idmecanico tinyint,
foreign key(idmecanico) references mecanico(idmecanico)
);

INSERT into mantenimiento(idservice, fecha, tipo, repuesto_cam, idmecanico)
values(126, '20170920', 'recambio','pastillas_nuevas', 4);

CREATE TABLE mantenimiento_camiones
(idservice tinyint primary key,
patente varchar(6) not null,
foreign key(patente) references camiones(patente)
);

INSERT into mantenimiento_camiones(idservice, patente)
values(126, 'amh628');
