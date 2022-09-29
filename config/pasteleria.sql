drop database if exists pasteleria;

create database pasteleria; 

use pasteleria; 


create table Roles(
id int(20) not null unique auto_increment,
nombre_rol varchar(50) not null unique,
primary key(id)
);

create table Estados(
id int(10) not null,
nombre_estado varchar(30) not null,
primary key(id)
);

create table Tipo_producto (
id int(5) not null unique auto_increment,
tipo_producto varchar (30) not null unique,
primary key(id)
);


create table Usuarios (
id bigint(20) not null auto_increment,
nombre varchar(255) not null,
apellido varchar(255) not null,
email varchar(50) not null unique,
telefono varchar(9) not null,
direccion varchar(60) not null,
ciudad varchar(45) not null,
codigo_postal int(4) not null,
provincia varchar(50) not null,
imagen varchar(255) not null,
password varchar(255) not null,
rol_usuario int(20) not null,
fecha_registro datetime DEFAULT CURRENT_TIMESTAMP not null,
fecha_ultimo_acceso datetime DEFAULT CURRENT_TIMESTAMP not null,
estado int(10) not null,
primary key (id),
foreign key (rol_usuario) references Roles(id)
					on delete restrict
                    on update cascade,
foreign key (estado) references Estados(id)
                   on delete restrict
                   on update cascade,
index fk_rol_usuario(rol_usuario),
index fk_estado_usuario(estado)
);

create table Imagenes(
id bigint(20) not null auto_increment,
ruta varchar(255) not null,
primary key(id)
);

create table Productos(
id int(20) not null auto_increment,
nombre varchar(255) not null,
descripcion varchar(255) not null,
precio float(4) not null,
cantidad bigint(20) not null,
tipo_producto int(5) not null,
primary key (id),
foreign key (tipo_producto) references Tipo_producto(id)
                           on delete restrict
                           on update cascade,
index fk_estado_tipo_producto(tipo_producto)
);



create table Pedidos_Clientes(
id bigint(20) not null auto_increment,
fecha_pedido datetime DEFAULT CURRENT_TIMESTAMP not null,
cliente bigint(20) not null,
primary key (id),
foreign key(cliente) references Usuarios(id)
                    on delete cascade
                    on update cascade,
index fk_cliente_pedidos(cliente)

);

create table Pedidos_Productos(
producto int(20) not null,
pedido bigint(20) not null,
cantidad bigint (20) not null,
foreign key (producto) references Productos(id)
						on delete cascade
						on update cascade,
index fk_producto(producto),
foreign key (pedido) references Pedidos_Clientes(id)
						on delete restrict
						on update cascade,
index fk_pedido(pedido)
         
);

create table Productos_Imagenes(
id_imagen bigint(20) not null,
id_producto  int(20) not null,
primary key(id_imagen,id_producto),
foreign key (id_imagen) references Imagenes(id)
                     on delete cascade
					 on update cascade,
index fk_imagen(id_imagen),
foreign key (id_producto) references Productos(id)
					 on delete cascade
					 on update cascade,
index fk_producto_imagen(id_producto)
);


create table Categorias (

id bigint(10) not null auto_increment,
nombre_categoria varchar(255) not null,
primary key (id)
);

create table Categorias_productos (
id_producto int(20) not null,
id_categoria bigint(10) not null,
primary key (id_producto,id_categoria),
foreign key (id_producto) references Productos (id)
                           on delete cascade
					       on update cascade,
foreign key (id_categoria) references Categorias (id)
                            on delete restrict
					        on update cascade
);

 

create table Usuarios_actualizados (
anterior_nombre varchar(255),
anterior_apellido varchar(255),
anterior_email varchar(50),
anterior_telefono varchar(9),
anterior_direccion varchar(60),
anterior_ciudad varchar(45),
anterior_codigo_postal int(4),
anterior_provincia varchar(50),
anterior_imagen varchar(255),
anterior_password varchar(255),
anterior_fecha_registro datetime DEFAULT CURRENT_TIMESTAMP,
nuevo_nombre varchar(255),
nuevo_apellido varchar(255),
nuevo_email varchar(50),
nuevo_telefono varchar(9),
nueva_direccion varchar(60),
nueva_ciudad varchar(45),
nuevo_codigo_postal int(4),
nueva_provincia varchar(50),
nueva_imagen varchar(255),
nueva_password varchar(255),
nueva_fecha datetime DEFAULT CURRENT_TIMESTAMP,
usuario varchar(50),
fecha_modificacion datetime DEFAULT CURRENT_TIMESTAMP
);


create trigger actualiza_usuario_BU before update on Usuarios for each row insert into Usuarios_actualizados (
anterior_nombre, anterior_apellido, anterior_email, anterior_telefono, anterior_direccion, anterior_ciudad, anterior_codigo_postal, anterior_provincia, anterior_imagen, anterior_password, anterior_fecha_registro,
nuevo_nombre, nuevo_apellido, nuevo_email, nuevo_telefono, nueva_direccion, nueva_ciudad, nuevo_codigo_postal, nueva_provincia, nueva_imagen, nueva_password, nueva_fecha, usuario, fecha_modificacion)
values (old.nombre, old.apellido, old.email, old.telefono, old.direccion, old.ciudad, old.codigo_postal, old.provincia, old.imagen, old.password, old.fecha_registro, new.nombre, new.apellido, new.email,
new.telefono, new.direccion, new.ciudad, new.codigo_postal, new.provincia, new.imagen, new.password, new.fecha_registro, current_user(), now());




CREATE USER 'admin'@'localhost' IDENTIFIED BY '1234';
GRANT ALL PRIVILEGES ON pasteleria.* TO 'admin'@'localhost';

CREATE USER 'estandar'@'localhost' IDENTIFIED BY '1234';
GRANT select, insert, update ON pasteleria.* TO 'estandar'@'localhost';

CREATE USER 'conexion'@'localhost' IDENTIFIED BY '1234';
GRANT select, insert ON pasteleria.* TO 'conexion'@'localhost';
GRANT file on *.* to 'conexion'@'localhost';
flush privileges;








