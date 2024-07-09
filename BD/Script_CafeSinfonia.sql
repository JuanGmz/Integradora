drop database if exists cafe_sinfonia;

create database cafe_sinfonia;

use cafe_sinfonia;

-- Otros
create table CATEGORIAS(
id_categoria int auto_increment not null,
nombre nvarchar(100) not null,
descripcion nvarchar(150),
tipo enum('Menu','Evento') not null,
primary key(id_categoria)
);

create table publicaciones(
id_publicacion int auto_increment not null,
titulo nvarchar(100) not null,
descripcion nvarchar(500),
img_url nvarchar(100),
tipo enum('Difusion','Blog') not null,
primary key(id_publicacion) 
);

-- Usuarios
create table usuarios(
id_usuario int auto_increment not null,
usuario nvarchar (100) not null,
correo nvarchar(100) not null,
contraseña varbinary(150)not null,
telefono nchar(10),
primary key(id_usuario)
);

create table roles(
id_rol int auto_increment not null,
rol nvarchar(150),
descripcion nvarchar(200),
primary key(id_rol)
);

create table roles_usuarios(
id_ru int not null,
id_usuario int not null,
id_rol int not null,
primary key(id_ru),
foreign key (id_rol) references roles(id_rol),
foreign key (id_usuario) references usuarios(id_usuario)
);

create table personas(
    id_persona int auto_increment not null,
    id_usuario int not null,
    nombres nvarchar(150) not null,
    apellido_paterno nvarchar(100) not null,
    apellido_materno nvarchar(100) not null,
    primary key(id_persona),
    foreign key (id_usuario) references usuarios(id_usuario)
);

create table clientes(
    id_cliente int auto_increment not null,
    id_persona int not null,
    primary key(id_cliente),
    foreign key (id_persona) references personas(id_persona)
);

create table empleados(
    id_empleado int auto_increment not null,
    id_persona int not null,
    primary key(id_empleado),
    foreign key (id_persona) references personas(id_persona)
);

create table proveedores(
    id_proveedor int auto_increment not null,
    id_persona int not null,
    primary key(id_proveedor),
    foreign key (id_persona) references personas(id_persona)
);

-- Ecommerce
create table domicilios(
id_domicilio int auto_increment not null,
id_cliente int not null,
referencia nvarchar(200) not null,
estado nvarchar(100) not null,
ciudad nvarchar(100) not null,
codigo_postal nvarchar(10) not null,
colonia nvarchar(150) not null,
calle nvarchar(200) not null,
telefono nchar(10) not null,
primary key(id_domicilio),
foreign key (id_cliente) references clientes(id_cliente)
);

CREATE TABLE comprobantes (
    id_comprobante INT PRIMARY KEY AUTO_INCREMENT,
    concepto VARCHAR(255),
    referencia VARCHAR(255),
    folio_operacion VARCHAR(255),
    fecha DATE,
    monto DECIMAL(10, 2),
    banco_origen VARCHAR(255),
    imagen_comprobante varchar(255)
);

create table pedidos(
id_pedido int auto_increment not null,
id_cliente int not null,
id_domicilio int not null,
estatus enum('Pendiente','En proceso','Finalizado','Cancelado') default 'Pendiente' not null,
fecha_hora_pedido datetime default current_timestamp,
envio nvarchar(150),
monto_total double,
metodo_de_pago nvarchar(100),
guia_de_envio nvarchar(100),
documento_url nvarchar(100),
primary key(id_pedido),
foreign key (id_cliente) references clientes(id_cliente),
foreign key (id_domicilio) references domicilios(id_domicilio)
);

create table comprobantes_pedidos(
    id_cp int auto_increment primary key,
    id_comprobante int not null,
    id_pedido int not null,
    foreign key (id_comprobante) references comprobantes(id_comprobante),
    foreign key (id_pedido) references pedidos(id_pedido)
);

create table bolsas_cafe (
id_bolsa int auto_increment not null,
nombre nvarchar(100) not null,
años_cosecha nvarchar(100) not null,
productor_finca nvarchar(150) not null,
proceso nvarchar(100) not null,
variedad nvarchar(200) not null,
altura nvarchar(100) not null,
aroma nvarchar(150) not null,
acidez nvarchar(150) not null,
sabor nvarchar(150) not null,
cuerpo nvarchar(100) not null,
puntaje_catacion tinyint not null,
img_url nvarchar(100)not null,
primary key(id_bolsa)
);

create table detalle_bc(
id_dbc int auto_increment not null,
id_bolsa int not null,
medida nvarchar(50)not null,
precio double not null,
stock int not null,
primary key(id_dbc),
foreign key(id_bolsa) references bolsas_cafe(id_bolsa)
);
-- Trigger para actualizar el stock.
 -- a
create table carrito(
id_carrito int auto_increment not null,
id_cliente int not null,
id_bc int not null,
cantidad int not null, -- Actualizar cantidad si se agrega un producto ya existente en el carrito, y no agregar el mismo producto.
monto double, -- Trigger para actualizar el monto total, y otro o en el mismo trigger que se actualize el monto si se actualiza el precio del producto.
primary key(id_carrito),
unique(id_cliente, id_bc),
foreign key (id_bc) references bolsas_cafe(id_bc),
foreign key(id_cliente) references clientes(id_cliente)
);

create table detalle_pedidos (
id_dp int auto_increment not null,
id_pedido int not null,
id_bc int not null,
precio_unitario double not null,
cantidad int not null, -- Actualizar el monto si se actualiza el precio de alguna bolsa.
primary key(id_dp),
foreign key (id_pedido) references pedidos(id_pedido),
foreign key (id_dbc) references bolsas_cafe(id_dbc)
);
-- Eventos

create table ubicacion_lugares(
id_lugar int auto_increment not null,
latitud double not null, 
longitud double not null,
primary key(id_lugar)
);

create table EVENTOS(
id_evento int auto_increment not null,
id_lugar int not null,
id_categoria int not null,
nombre nvarchar(100) not null,
tipo enum('Gratuito','De Pago') not null,
descripcion nvarchar(200) not null,
fecha_evento date not null,
hora_inicio time not null,      
hora_fin time not null,
capacidad int not null,
precio_boleto double not null, 
disponibilidad int,
img_url nvarchar(100)not null,
fecha_publicacion date not null,
primary key(id_evento),
foreign key (id_lugar) references ubicacion_lugares(id_lugar),
foreign key (id_categoria) references categorias(id_categoria)
);

create table eventos_reservas(
id_reserva int auto_increment not null,
id_cliente int not null, 
id_evento int not null, 
c_boletos int not null,
monto_total double,
fecha_hora_reserva datetime default current_timestamp,
estatus enum('Pendiente','Cancelada','Apartada') default 'Pendiente', -- Puede ser pendiente, y esas cosas.
primary key(id_reserva),
foreign key (id_cliente) references clientes(id_cliente),
foreign key (id_evento) references EVENTOS(id_evento)
);

create table comprobantes_reservas
(
 id_cr int auto_increment primary key,
 id_comprobante int not null,
 id_reserva int not null,
 foreign key (id_comprobante) references comprobantes(id_comprobante),
 foreign key (id_reserva) references eventos_reservas(id_reserva)
);

-- Productos del Menu 
create table productos_menu(
id_pm int auto_increment not null,
id_categoria int not null, 
nombre nvarchar(150) not null,
descripcion nvarchar (300) not null,
img_url nvarchar(100)not null,
primary key(id_pm),
foreign key (id_categoria) references CATEGORIAS(id_categoria)
);

create table detalle_productos_menu(
id_dpm int auto_increment not null,
id_pm int not null,
medida nvarchar(100),
precio double not null,
primary key(id_dpm),
foreign key (id_pm) references productos_menu(id_pm)
);

-- Sistemma de Recompensas

create table asistencias(
id_asistencia int auto_increment not null,
id_cliente int not null,
fecha_hora_asistencia datetime default current_timestamp,
primary key(id_asistencia),
foreign key (id_cliente) references clientes(id_cliente)
);

CREATE TABLE recompensas(
id_recompensa int auto_increment not null,
recompensa nvarchar(150) not null,
condicion int not null,
fecha_inicio date not null, 
fecha_expiracion date not null,
estatus enum('Activa','Inactiva') default 'Activa',
img_url nvarchar(100)null,
primary key (id_recompensa)
);

create table clientes_recompensas(
id_cr int auto_increment not null,
id_cliente int not null,
id_recompensa int not null,
canje boolean default false not null,
estatus enum('Activa','Inactiva') default 'Activa',;
progreso int default 0,
primary key(id_cr),
FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente),
FOREIGN KEY (id_recompensa) REFERENCES recompensas(id_recompensa)
);

-- Indices en claves foraneas
-- Indices en las claves foraneas para la aceleracion de la gestion de tablas ligadas con JOIN.
-- Tabla roles usuarios.
CREATE INDEX idx_roles_usuarios_id_usuario ON roles_usuarios(id_usuario);
CREATE INDEX idx_roles_usuarios_id_rol ON roles_usuarios(id_rol);

-- Tabla personas, empleados, clientes, proveedores.
CREATE INDEX idx_personas_id_usuario ON personas(id_usuario);
CREATE INDEX idx_clientes_id_persona ON clientes(id_persona);
CREATE INDEX idx_empleados_id_persona ON empleados(id_persona);
CREATE INDEX idx_proveedores_id_persona ON proveedores(id_persona);

-- Tablas pedidos, domicilios.
CREATE INDEX idx_domicilios_id_cliente ON domicilios(id_cliente);
CREATE INDEX idx_pedidos_id_cliente ON pedidos(id_cliente);
CREATE INDEX idx_pedidos_id_domicilio ON pedidos(id_domicilio);

-- Tabla carrito.
CREATE INDEX idx_carrito_id_cliente ON carrito(id_cliente);
CREATE INDEX idx_carrito_id_bc ON carrito(id_bc);

-- Tabla detalle pedidos.
CREATE INDEX idx_detalle_pedidos_id_pedido ON detalle_pedidos(id_pedido);
CREATE INDEX idx_detalle_pedidos_id_bc ON detalle_pedidos(id_bc);

-- Tablas eventos.
CREATE INDEX idx_eventos_id_lugar ON EVENTOS(id_lugar);
CREATE INDEX idx_eventos_id_categoria ON EVENTOS(id_categoria);

-- Tabla eventos reservas.
CREATE INDEX idx_eventos_reservas_id_cliente ON eventos_reservas(id_cliente);
CREATE INDEX idx_eventos_reservas_id_evento ON eventos_reservas(id_evento);

-- Tabla productos_menu.
CREATE INDEX idx_productos_menu_id_dpm ON productos_menu(id_dpm);

-- Tabla tarjetas, asistencias.
CREATE INDEX idx_tarjetas_id_cliente ON tarjetas(id_cliente);
CREATE INDEX idx_asistencias_id_tarjeta ON asistencias(id_tarjeta);

-- Tablas tarjetas recompensas.
CREATE INDEX idx_tarjeta_recompensas_id_tarjeta ON tarjeta_recompensas(id_tarjeta);
CREATE INDEX idx_tarjeta_recompensas_id_recompensa ON tarjeta_recompensas(id_recompensa);

