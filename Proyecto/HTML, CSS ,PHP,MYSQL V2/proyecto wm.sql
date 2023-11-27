/*CREAR BASE DE DATOS PROYECTO*/
create database proyecto;

/*USAR BASE DE DATOS PROYETO*/
USE proyecto;

#CREAR TABLAS EN LA BASE DE DATOS
/*CREAR TABLA MARCA*/
create table marca(
	id_marca int not null auto_increment primary key,
    nombre_marca varchar(30) not null
);

/*CREAR TABLA ESTADO ELEMENTO*/
create table estado_elemento(
	id_estado int not null auto_increment primary key,
    estado_elemen varchar(20) not null
);

/*CREAR TABLA CATEGORIA*/
create table categoria(
	id_categoria int not null auto_increment primary key,
    categoria_elemen varchar(20) not null
);

/*CREAR TABLA AREA*/
create table area(
	id_area int not null auto_increment primary key,
    area_usuario varchar(20) not null
);

/*CREAR TABLA CIUDAD*/
create table ciudad(
	id_ciudad int not null auto_increment primary key,
    ciudad_usuario varchar(20) not null
);

/*CREAR TABLA  USUARIO*/
create table estado_usuario(
	id_estadou int not null auto_increment primary key,
    estado_usuario varchar(20) not null
);

/*CREAR TABLA ROL*/
create table roles(
	id_rol int not null auto_increment primary key,
    rol varchar(30) not null
);

/*CREAR TABLA PROVEEEDOR*/
create table proveedores(
	id_proveedor int not null auto_increment primary key,
    nombre_proveedor varchar(30) not null,
    telefono int(11) not null,
    descripcion varchar(50) not null
);

/*CREAR TABLA USUARIO*/
create table usuario(
	id_usuario int not null auto_increment primary key,
	nombre_perfil varchar(20) not null,
    contraseña varchar(30) not null,
    id_rol int,
    id_estadou int,
    foreign key (id_rol) references roles(id_rol),
	foreign key (id_estadou) references estado_usuario(id_estadou)
);

/*CREAR TABLA ANALISTAS DE INVENTARIO*/
create table analista_inventario(
	id_analista_invetario int not null auto_increment primary key,
	nombre varchar(20) not null,
    apellidop varchar(20) not null,
    apellidom varchar(20) not null,
    correo varchar(30) not null,
    telefono int,
    id_ciudad int,
    id_usuario int,
    foreign key (id_ciudad) references ciudad(id_ciudad),
	foreign key (id_usuario) references usuario(id_usuario)
);

/*CREAR TABLA TECNICO*/
create table tecnico(
	id_tecnico int not null auto_increment primary key,
	nombre varchar(20) not null,
    apellidop varchar(20) not null,
    apellidom varchar(20) not null,
    correo varchar(30) not null,
    telefono int,
    id_ciudad int,
    id_usuario int,
    foreign key (id_ciudad) references ciudad(id_ciudad),
	foreign key (id_usuario) references usuario(id_usuario)
);


/*CREAR TABLA ADMINISTRADOR */
create table administrador(
	id_administrador int not null auto_increment primary key,
	nombre varchar(20) not null,
    apellidop varchar(20) not null,
    apellidom varchar(20) not null,
    correo varchar(30) not null,
    telefono int,
    id_ciudad int,
    id_usuario int,
    foreign key (id_ciudad) references ciudad(id_ciudad),
	foreign key (id_usuario) references usuario(id_usuario)
);

/*CREAR TABLA USUARIO FINAL*/
create table usuario_final(
	id_usuario_final int not null auto_increment primary key,
	nombre varchar(20) not null,
    apellidop varchar(20) not null,
    apellidom varchar(20) not null,
    correo varchar(30) not null,
    telefono int,
    id_ciudad int,
    id_usuario int,
    id_area int,
    foreign key (id_ciudad) references ciudad(id_ciudad),
	foreign key (id_usuario) references usuario(id_usuario),
    foreign key (id_area) references area(id_area)
);

/*CREAR TABLA REQUERIMIENTOS*/
create table requerimientos(
	id_requerimiento int not null auto_increment primary key,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    descripcion varchar(255),
    id_usuario_final int,
    foreign key (id_usuario_final) references usuario_final(id_usuario_final)
);

/*CREAR TABLA PEDIDO*/
create table pedido(
	id_pedido int not null auto_increment primary key,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    cantidad int(5),
    detalle varchar(255),
    id_analista_invetario int,
    id_elemento int,
    foreign key (id_analista_invetario) references analista_inventario(id_analista_invetario),
    foreign key (id_elemento) references elemento(id_elemento)
);

/*CREAR TABLA SOLICITUD ELEMENTO*/
create table solicitud_elemento(
	id_solicitud int not null auto_increment primary key,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    cantidad int(5),
    id_tecnico int,
    id_elemento int,
    foreign key (id_tecnico) references tecnico(id_tecnico),
    foreign key (id_elemento) references elemento(id_elemento)
);

/*CREAR TABLA PROVEE ELEMENTO*/
create table provee_elemento(
	id_provee int not null auto_increment primary key,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    id_proveedor int,
    id_elemento int,
    foreign key (id_proveedor) references proveedores(id_proveedor),
    foreign key (id_elemento) references elemento(id_elemento)
);


/*CREAR TABLA REGISTRO ELEMENTO*/
create table registro(
	id_registro int not null auto_increment primary key,
    cantidad int(5),
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    observacion varchar(255),
    id_analista_invetario int,
    id_elemento int,
    id_estado int,
    foreign key (id_analista_invetario) references analista_inventario(id_analista_invetario),
    foreign key (id_elemento) references elemento(id_elemento),
    foreign key (id_estado) references estado_elemento(id_estado)
);


/*CREAR TABLA ELEMENTO*/
create table elemento(
	id_elemento int not null auto_increment primary key,
    nombre_elemento varchar(30) not null,
    imagen varchar(255) not null,
    serial varchar(55) not null,
    modelo varchar(30) not null,
    procesador varchar(30) null,
    tamaño_memoria varchar(10) null,
    tamaño_disco varchar(10) null,
    valor_unitario double not null,
    stock  int(5)not null,
    id_analista_invetario int,
    id_categoria int,
    id_marca int,
    id_proveedor int,
    id_tecnico int,
    foreign key (id_analista_invetario) references analista_inventario(id_analista_invetario),
    foreign key (id_categoria) references categoria(id_categoria),
    foreign key (id_marca) references marca(id_marca),
    foreign key (id_proveedor) references proveedores(id_proveedor),
    foreign key (id_tecnico) references tecnico(id_tecnico)
);




