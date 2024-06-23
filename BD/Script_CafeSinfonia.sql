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

create table 

