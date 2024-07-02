
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

create table contacto(
id_c int auto_increment not null,
nombre nvarchar(150) not null,
asunto varchar(150) not null,
cometario varchar(300) not null,
correo varchar(100) not null,
telefono nchar(10) not null,
primary key(id_c)
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
contraseña nvarchar(150)not null,
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
id_usuario int not null,
referencia nvarchar(200) not null,
estado nvarchar(100) not null,
ciudad nvarchar(100) not null,
codigo_postal nvarchar(10) not null,
colonia nvarchar(150) not null,
calle nvarchar(200) not null,
telefono nchar(10) not null,
primary key(id_domicilio),
foreign key (id_usuario) references usuarios(id_usuario)
);

create table pedidos(
id_pedido int auto_increment not null,
id_usuario int not null,
estatus enum('Pendiente','En proceso','Finalizado','Cancelado') default 'Pendiente' not null,
fecha_hora_pedido datetime default current_timestamp,
id_domicilio int not null,
envio nvarchar(150),
costo_envio double,
metodo_pago enum('Transferencia Bancaria','Deposito Bancario','PayPal','Mercadopago','Oxxo','Tarjeta de Credito','Tarjeta de Debito','Otro') not null,
fecha_entrega_estimada datetime,
documento_url nvarchar(100),
primary key(id_pedido),
foreign key (id_usuario) references usuarios(id_usuario),
foreign key (id_domicilio) references domicilios(id_domicilio)
);

create table bolsas_detalle (
id_bolsa int auto_increment not null,
id_categoria int,
productor_finca nvarchar(150) not null,
proceso nvarchar(100) not null,
variedad nvarchar(200) not null,
altura nvarchar(100) not null,
aroma nvarchar(150) not null,
acidez nvarchar(150) not null,
sabor nvarchar(150) not null,
cuerpo nvarchar(100) not null,
img_url nvarchar(100)not null,
primary key(id_bolsa),
foreign key(id_categoria) references categorias(id_categoria)
);

create table bolsas_cafe(
id_bc int auto_increment not null,
id_bolsa int not null,
medida nvarchar(50)not null,
precio double not null,
stock int not null,
primary key(id_bc),
foreign key(id_bolsa) references bolsas_detalle(id_bolsa)
);
-- Trigger para actualizar el stock.

create table carrito(
id_carrito int auto_increment not null,
id_usuario int not null,
id_bc int not null,
cantidad int not null, -- Actualizar cantidad si se agrega un producto ya existente en el carrito, y no agregar el mismo producto.
monto_total double, -- Trigger para actualizar el monto total, y otro o en el mismo trigger que se actualize el monto si se actualiza el precio del producto.
primary key(id_carrito),
unique(id_usuario, id_bc),
foreign key (id_bc) references bolsas_cafe(id_bc),
foreign key(id_usuario) references usuarios(id_usuario)
);

create table detalle_pedidos (
id_dp int auto_increment not null,
id_pedido int not null,
id_bc int not null,
precio_unitario double not null,
cantidad int not null,
monto_total double, -- Actualizar el monto si se actualiza el precio de alguna bolsa.
primary key(id_dp),
foreign key (id_pedido) references pedidos(id_pedido),
foreign key (id_bc) references bolsas_cafe(id_bc)
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
fecha_publicacion date not null,
hora_inicio time not null,      
hora_fin time not null,
capacidad int not null,
precio_boleto double not null, 
disponibilidad int,
img_url nvarchar(100)not null,
primary key(id_evento),
foreign key (id_lugar) references ubicacion_lugares(id_lugar),
foreign key (id_categoria) references categorias(id_categoria)
);

create table eventos_reservas(
id_reserva int auto_increment not null,
id_cliente int not null, 
id_evento int not null, 
c_boletos int not null,
monto_total double null,
fecha_hora_reserva datetime default current_timestamp,
estatus enum('Pendiente','Cancelada','Apartada') default 'Pendiente', -- Puede ser pendiente, y esas cosas.
primary key(id_reserva),
foreign key (id_cliente) references clientes(id_cliente),
foreign key (id_evento) references EVENTOS(id_evento)
);

-- Productos del Menu 
create table detalle_productos_menu(
id_dpm int auto_increment not null,
id_categoria int not null, 
nombre nvarchar(150) not null,
descripcion nvarchar (300) not null,
img_url nvarchar(100)not null,
primary key(id_dpm),
foreign key (id_categoria) references CATEGORIAS(id_categoria)
);

create table productos_menu(
id_pm int auto_increment not null,
id_dpm int not null,
medida nvarchar(100) not null,
precio double not null,
primary key(id_pm),
foreign key (id_pm) references detalle_productos_menu(id_dpm)
);

-- Sistemma de Recompensas
create table tarjetas(
id_tarjeta int auto_increment not null,
id_cliente int not null,
progreso int,
primary key(id_tarjeta),
foreign key (id_cliente) references clientes(id_cliente)
);

create table asistencias(
id_asistencia int auto_increment not null,
id_tarjeta int not null,
fecha_hora_asistencia datetime default current_timestamp,
primary key(id_asistencia),
foreign key (id_tarjeta) references tarjetas(id_tarjeta)
);

CREATE TABLE recompensas(
id_recompensa int auto_increment not null,
recompensa nvarchar(150) not null,
condicion int not null,
fecha_inicio date not null, 
fecha_expiracion date not null,
estatus enum('Activa','Inactiva') default 'Activa',
img_url nvarchar(100)not null,
primary key (id_recompensa)
);

create table tarjeta_recompensas(
id_tr int auto_increment not null,
id_tarjeta int not null,
id_recompensa int not null,
canje boolean default false not null,
primary key(id_tr),
FOREIGN KEY (id_tarjeta) REFERENCES tarjetas(id_tarjeta),
FOREIGN KEY (id_recompensa) REFERENCES recompensas(id_recompensa)
);



