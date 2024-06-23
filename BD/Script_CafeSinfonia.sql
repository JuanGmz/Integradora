create database cafe_sinfonia;

use cafe_sinfonia;

create table contacto(
id_c int auto_increment not null,
nombre nvarchar(150) not null,
asunto varchar(150) not null,
cometario varchar(300) not null,
correo varchar(100) not null,
telefono nchar(10) not null,
primary key(id_c)
);

create table blogs(
id_blog int auto_increment not null,
titulo nvarchar(100) not null,
descripcion nvarchar(500),
img nvarchar(100),
primary key(id_blog)
);

create table usuarios(
id_usuario int auto_increment not null,
id_rol int not null,
usuario nvarchar (100) not null,
correo nvarchar(100) not null,
contraseña nvarchar(150)not null,
nombres nvarchar(150) not null, 
a_p nvarchar(100),
a_m nvarchar(100),
telefono nchar(10),
primary key(id_usuario),
foreign key (id_rol) references roles(id_rol)
);

create table roles(
id_rol int auto_increment not null,
rol nvarchar(150),
descripcion nvarchar(200),
primary key(id_rol)
);

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
estatus enum('','','') not null,
fecha_pedido datetime default current_timestamp,
id_domicilio int not null,
envio nvarchar(150),
costo_envio double,
metodo_pago nvarchar(100),
fecha_entrega_estimada datetime,
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
foreign key (id_bc) references bolsas(id_bc)
);
