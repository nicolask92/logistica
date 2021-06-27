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
	values('A', 003, 'amh628');  

CREATE TABLE mecanico
	(id tinyint primary key auto_increment,
	legajo tinyint,
	foreign key(legajo) references empleado(legajo)
	);

INSERT into mecanico(legajo)
	values(004);
    
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
tipo_carga varchar(15),
refeer boolean,
temperatura int(5),
hazard boolean,
imo varchar(15),
peso_neto varchar(15),
id_viaje tinyint,
foreign key(id_viaje) references viaje(id_viaje)
);

INSERT into carga(refeer, hazard, peso_neto, id_viaje)
values(1, 0, 10000, 1);

CREATE TABLE cliente
(id tinyint primary key auto_increment,
nombre varchar(15),
apellido varchar(15),
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
modelo varchar(15),
nro_motor int(15) unique,
nro_chasis varchar(15) unique,
kilometraje int(15),
ultimo_service datetime,
id_viaje tinyint,
foreign key(id_viaje) references viaje(id_viaje)
);

INSERT into camiones(marca, modelo, patente, nro_motor, nro_chasis, kilometraje, ultimo_service, id_viaje)
values('IVECO', 'Cursor', 'AA123CD', 53879558, 'L53879558', 10000),
      ('IVECO','Cursor','AA124DC', 69904367,'R69904367', 10000),
      ('IVECO','Cursor','AD200XS',	57193968,'R57193968', 10000),
      ('IVECO','Cursor','AA211ZX',	82836641,'N82836641', 10000),
      ('IVECO','Cursor','AC452WE',	28204636,'R28204636', 10000),
      ('IVECO','Cursor','AA233SS',	26139668,'K26139668', 10000),
      ('IVECO','Cursor','AB900QW',	44301415,'F44301415', 10000),
      ('IVECO','Cursor','AC342WW',	44260023,'D44260023', 10000),

      ('SCANIA','G310','AA150QW',	82039512,'I82039512', 10000),
      ('SCANIA','G410','AB198QZ',	18389741,'V18389741', 10000),
      ('SCANIA','G460','AC246QD',	62500687,'O62500687', 10000),
      ('SCANIA','G310','AD294QW',	27510702,'T27510702', 10000),
      ('SCANIA','G410','AA342QZ',	72582865,'C72582865', 10000),
      ('SCANIA','G460','AB390QD',	32041290,'Z32041290', 10000),
      ('SCANIA','G310','AC438QW',	54712451,'W54712451', 10000),
      ('SCANIA','G410','AD486QZ',   56284263,'L56284263', 10000),
      ('SCANIA','G460','AA534QD',	21357689,'A21357689', 10000),

      ('M.BENZ','Actros 1846','AB582QW',17800122,'V17800122', 10000),
      ('M.BENZ','Actros 1846','AC630QZ',88648319,'G88648319', 10000),
      ('M.BENZ','Actros 1846','AD678QD',23849041,'C23849041', 10000),
      ('M.BENZ','Actros 1846','AA726QW',54650513,'C54650513', 10000),
      ('M.BENZ','Actros 1846','AB774QZ',46753468,'J46753468', 10000),
      ('M.BENZ','Actros 1846','AC822QD',60916748,'J60916748', 10000),
      ('M.BENZ','Actros 1846','AD870QW',30207594,'M30207594', 10000),
      ('M.BENZ','Actros 1846','AA918QZ',31256965,'C31256965', 10000),
      ('M.BENZ','Actros 1846','AB966QD',32632699,'B32632699', 10000),
      ('M.BENZ','Actros 1846','AC989QW',64092078,'F64092078', 10000);

CREATE TABLE arrastrador
(id tinyint primary key auto_increment,
nro_chasis int(15) unique,
tipo varchar(150),
patente varchar(6) not null unique,
id_viaje TINYINT,
foreign key(patente) references camiones(patente),
FOREIGN KEY (id_viaje) REFERENCES viaje(id_viaje)
);

INSERT into arrastrador( tipo, patente, nro_chasis)
values('Araña','AA100AS',585822),
      ('Araña','AC125AD',605737),
      ('Araña','AB135AG',705687),
      ('Araña','AD166AS',815082),
      ('Araña','AA189AD',775167),
      ('Araña','AC208AG',642287),
      ('Araña','AB230AS',678666),
      ('Araña','AD252AD',758967),
      ('Araña','AA274AG',498515),

      ('Jaula','AC296AS',882174),
      ('Jaula','AB318AD',595287),
      ('Jaula','AD340AG',549916),
      ('Jaula','AA362AS',831768),
      ('Jaula','AC383AD',535330),

      ('Tanque','AB405AG',583419),
      ('Tanque','AD427AS',703673),
      ('Tanque','AA449AD',884654),
      ('Tanque','AC471AG',510019),
      ('Tanque','AB493AS',595948),
      ('Tanque','AD515AD',704640),
      ('Tanque','AA537AG',752105),

      ('Granel','AB581AD',761560),
      ('Granel','AD602AG',555608),
      ('Granel','AA624AS',852157),
      ('Granel','AC646AD',710797),
      ('Granel','AB668AG',815072),
      ('Granel','AD690AS',495851),
      ('Granel','AA712AD',468708),
      ('Granel','AC734AG',661897),
      ('Granel','AB756AS',616372),
      ('Granel','AD778AD',873758),
      ('Granel','AA800AG',820810),

      ('CarCarrier','AD100AZ',730027),
      ('CarCarrier','AD100AQ',730502),
      ('CarCarrier','AD100ER',730978),
      ('CarCarrier','AD101EF',731453),
      ('CarCarrier','AD102HG',731929),
      ('CarCarrier','AD103LO',732404),
      ('CarCarrier','AD104WE',732880),
      ('CarCarrier','AD105ZP',733355);


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