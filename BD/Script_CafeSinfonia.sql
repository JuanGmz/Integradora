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
id_ru int auto_increment not null,
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
metodo_de_pago enum('Transferencia') default 'Transferencia',
estatus enum('Pendiente','En proceso','Finalizado','Cancelado') default 'Pendiente' not null,
fecha_hora_pedido datetime default current_timestamp,
envio nvarchar(150),
monto_total double,
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
puntaje_catacion double not null,
img_url nvarchar(255)not null,
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
create table carrito(
id_carrito int auto_increment not null,
id_cliente int not null,
id_dbc int not null,
cantidad int not null, -- Actualizar cantidad si se agrega un producto ya existente en el carrito, y no agregar el mismo producto.
monto double, -- Trigger para actualizar el monto total, y otro o en el mismo trigger que se actualize el monto si se actualiza el precio del producto.
primary key(id_carrito),
unique(id_cliente, id_dbc),
foreign key (id_dbc) references detalle_bc(id_dbc),
foreign key(id_cliente) references clientes(id_cliente)
);

create table detalle_pedidos (
id_dp int auto_increment not null,
id_pedido int not null,
id_dbc int not null,
precio_unitario double not null,
cantidad int not null, -- Actualizar el monto si se actualiza el precio de alguna bolsa.
primary key(id_dp),
foreign key (id_pedido) references pedidos(id_pedido),
foreign key (id_dbc) references detalle_bc(id_dbc)
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
img_url nvarchar(255)not null,
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
img_url nvarchar(255)not null,
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
estatus enum('Activa','Inactiva') default 'Activa',
progreso int default 0,
primary key(id_cr),
FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente),
FOREIGN KEY (id_recompensa) REFERENCES recompensas(id_recompensa)
);

INSERT INTO publicaciones (titulo, descripcion, img_url, tipo)
VALUES
('¡Bienvenidos a Sinfonía Café y Cultura!', 'Estamos emocionados de abrir nuestras puertas y ofrecerles una experiencia única de café y cultura. ¡Visítanos hoy!', 'img/bienvenidos.jpg', 'Difusion'),
('Tarde de Jazz', 'Acompáñanos este viernes para una tarde de jazz en vivo con artistas locales. ¡No te lo pierdas!', 'img/tarde_de_jazz.jpg', 'Difusion'),
('Nueva Carta de Verano', 'Descubre nuestra nueva carta de verano con bebidas refrescantes y deliciosas. ¡Ven a probarlas!', 'img/carta_verano.jpg', 'Difusion'),
('Taller de Cata de Café', 'Aprende a distinguir los sabores y aromas del café en nuestro próximo taller de cata. ¡Inscríbete ya!', 'img/taller_cata.jpg', 'Blog'),
('Concierto Acústico', 'Disfruta de una noche de música acústica con artistas emergentes este sábado. ¡Te esperamos!', 'img/concierto_acustico.jpg', 'Difusion'),
('Exposición de Arte', 'Ven a admirar las obras de artistas locales en nuestra exposición de arte. ¡Entrada libre!', 'img/expo_arte.jpg', 'Difusion'),
('Café del Mes', 'Este mes presentamos nuestro café de origen etíope. ¡Ven a degustarlo!', 'img/cafe_mes.jpg', 'Blog'),
('Noche de Poesía', 'Acompáñanos para una noche de poesía y micrófono abierto. ¡Comparte tus versos con nosotros!', 'img/noche_poesia.jpg', 'Difusion'),
('Clases de Barismo', 'Inscríbete en nuestras clases de barismo y aprende a preparar el café perfecto.', 'img/clases_barismo.jpg', 'Blog'),
('Feria de Libros', 'No te pierdas nuestra feria de libros con grandes descuentos y actividades para toda la familia.', 'img/feria_libros.jpg', 'Difusion');

INSERT INTO roles (rol, descripcion) VALUES 
('empleado', 'Empleado del café sinfonía'),
('cliente', 'Cliente del café sinfonía'),
('proveedor', 'Proveedor del café sinfonía');


INSERT INTO usuarios (usuario, correo, contraseña, telefono) VALUES 
('juanperez', 'juan.perez@example.com', MD5('password1'), '8712345678'),
('marialopez', 'maria.lopez@example.com', MD5('password2'), '8712345679'),
('carloshernandez', 'carlos.hernandez@example.com', MD5('password3'), '8712345680'),
('anamartinez', 'ana.martinez@example.com', MD5('password4'), '8712345681'),
('luisgonzalez', 'luis.gonzalez@example.com', MD5('password5'), '8712345682'),
('laurasanchez', 'laura.sanchez@example.com', MD5('password6'), '8712345683'),
('joseramirez', 'jose.ramirez@example.com', MD5('password7'), '8712345684'),
('rosatorres', 'rosa.torres@example.com', MD5('password8'), '8712345685'),
('miguelreyes', 'miguel.reyes@example.com', MD5('password9'), '8712345686'),
('luisacruz', 'luisa.cruz@example.com', MD5('password10'), '8712345687'),
('jorgeflores', 'jorge.flores@example.com', MD5('password11'), '8712345688'),
('isabelgomez', 'isabel.gomez@example.com', MD5('password12'), '8712345689'),
('pedrodiaz', 'pedro.diaz@example.com', MD5('password13'), '8712345690'),
('carmenmorales', 'carmen.morales@example.com', MD5('password14'), '8712345691'),
('ricardoortiz', 'ricardo.ortiz@example.com', MD5('password15'), '8712345692'),
('sofiasilva', 'sofia.silva@example.com', MD5('password16'), '8712345693'),
('fernandoromero', 'fernando.romero@example.com', MD5('password17'), '8712345694'),
('patriciarojas', 'patricia.rojas@example.com', MD5('password18'), '8712345695'),
('robertovazquez', 'roberto.vazquez@example.com', MD5('password19'), '8712345696'),
('gabrielamendoza', 'gabriela.mendoza@example.com', MD5('password20'), '8712345697');

INSERT INTO roles_usuarios (id_usuario, id_rol)
VALUES
(1, 1),  -- Juan Perez
(2, 1),  -- Maria Lopez
(3, 1),  -- Carlos Hernandez
(4, 1),  -- Ana Martinez
(5, 1);  -- Luis Gonzalez

INSERT INTO personas (id_usuario, nombres, apellido_paterno, apellido_materno) VALUES 
(1, 'Juan', 'Perez', 'Garcia'),
(2, 'Maria', 'Lopez', 'Martinez'),
(3, 'Carlos', 'Hernandez', 'Sanchez'),
(4, 'Ana', 'Martinez', 'Rodriguez'),
(5, 'Luis', 'Gonzalez', 'Lopez'),
(6, 'Laura', 'Sanchez', 'Perez'),
(7, 'Jose', 'Ramirez', 'Hernandez'),
(8, 'Rosa', 'Torres', 'Gonzalez'),
(9, 'Miguel', 'Reyes', 'Sanchez'),
(10, 'Luisa', 'Cruz', 'Ramirez'),
(11, 'Jorge', 'Flores', 'Torres'),
(12, 'Isabel', 'Gomez', 'Reyes'),
(13, 'Pedro', 'Diaz', 'Cruz'),
(14, 'Carmen', 'Morales', 'Flores'),
(15, 'Ricardo', 'Ortiz', 'Gomez'),
(16, 'Sofia', 'Silva', 'Diaz'),
(17, 'Fernando', 'Romero', 'Morales'),
(18, 'Patricia', 'Rojas', 'Ortiz'),
(19, 'Roberto', 'Vazquez', 'Silva'),
(20, 'Gabriela', 'Mendoza', 'Romero');

-- Insertar registros en la tabla empleados
INSERT INTO empleados (id_persona)
VALUES
(1),   -- Juan Perez
(2),   -- Maria Lopez
(3),   -- Carlos Hernandez
(4),   -- Ana Martinez
(5);   -- Luis Gonzalez

-- Insertar registros en la tabla clientes
INSERT INTO clientes (id_persona)
VALUES
(6),   -- Laura Sanchez
(7),   -- Jose Ramirez
(8),   -- Rosa Torres
(9),   -- Miguel Reyes
(10),  -- Luisa Cruz
(11),  -- Jorge Flores
(12),  -- Isabel Gomez
(13),  -- Pedro Diaz
(14),  -- Carmen Morales
(15),  -- Ricardo Ortiz
(16),  -- Sofia Silva
(17),  -- Fernando Romero
(18),  -- Patricia Rojas
(19),  -- Roberto Vazquez
(20);  -- Gabriela Mendoza

-- Insertar registros en la tabla categorias.
	INSERT INTO CATEGORIAS (nombre, descripcion, tipo) VALUES
('Conciertos', 'Categoría para eventos musicales', 'Evento'),-- 1
('Teatro', 'Categoría para representaciones teatrales', 'Evento'), 
('Podcast en vivo', 'Categoría para conferencias y charlas', 'Evento'),
('Talleres', 'Categoría para talleres y cursos', 'Evento'),
('Ferias', 'Categoría para ferias comerciales y de productos', 'Evento'),-- 5
('Festivales', 'Categoría para festivales culturales y musicales', 'Evento'), 
('Seminarios', 'Categoría para seminarios educativos', 'Evento'),
('Cine', 'Categoría para proyecciones de películas', 'Evento'),
('Clasicos', 'Categoría para el menú de cafés clásicos durante todo tipo de horarios', 'Menu'),
('Los métodos de Jazz Band', 'Categoría para el menú de métodos de preparación de café con alma de jazz durante todo tipo de horarios', 'Menu'),-- 10
('Metal Coffee', 'Categoría para el menú de cafés con influencias de la música metal', 'Menu'), 
('Cool and Dark', 'Categoría para el menú de cafés oscuros y refrescantes', 'Menu'),
('Cold Brew', 'Categoría para el menú de cafés fríos y refrescantes', 'Menu'),
('Around The World', 'Categoría para el menú de cafés de diversas partes del mundo', 'Menu'),
('Sodas Italianas', 'Categoría para el menú de refrescos italianos', 'Menu'), -- 15
('Frappes', 'Categoría para el menú de bebidas frappé', 'Menu'),  
('Té y Tisanas', 'Categoría para el menú de tés y tisanas', 'Menu'),
('Sweet Blues', 'Categoría para el menú de cafés dulces con un toque de blues', 'Menu');

-- Insertar productos_menu
INSERT INTO productos_menu (id_categoria, nombre, descripcion, img_url) VALUES
(9, 'Espresso', 'Café concentrado en una pequeña taza, ideal para los amantes del café fuerte.', 'img/espresso.jpg'),
(9, 'Cortado', 'Café expreso con un toque de leche caliente.', 'img/cortado.jpg'),
(9, 'Macchiato', 'Café expreso con un toque de espuma de leche.', 'img/macchiato.jpg'),
(9, 'Espresso Americano', 'Café negro diluido con agua caliente.', 'img/americano.jpg'),
(9, 'Cappuccino', 'Café expreso con leche espumada, ideal para la mañana.', 'img/cappuccino.jpg'),
(9, 'Mochaccino', 'Café expreso con leche, espuma y un toque de chocolate.', 'img/mochaccino.jpg'),
(9, 'Latte', 'Café con leche y un toque de espuma.', 'img/latte.jpg'),
(9, 'Mocha Latte', 'Latte con un toque de chocolate.', 'img/mocha_latte.jpg'),
(9, 'Caramel Latte', 'Latte con un toque de caramelo.', 'img/caramel_latte.jpg'),
(9, 'Dirty Chai Latte', 'Latte con chai y un shot de expreso.', 'img/dirty_chai_latte.jpg'),   -- 10
(10, 'V60/Dripper', 'Método de goteo para preparar café.', 'img/v60_dripper.jpg'),
(10, 'Aeropress', 'Método de preparación de café por presión.', 'img/aeropress.jpg'),
(10, 'Clever', 'Método de preparación de café por inmersión y goteo.', 'img/clever.jpg'),
(10, 'Prensa Francesa', 'Método de preparación de café por inmersión.', 'img/prensa_francesa.jpg'),
(10, 'Chemex', 'Método de goteo para preparar café con filtro especial.', 'img/chemex.jpg'),
(10, 'Vandola', 'Método tradicional costarricense para preparar café.', 'img/vandola.jpg'),
(10, 'Sifón Japonés', 'Método de preparación de café con vacío y presión.', 'img/sifon_japones.jpg'),
(12, 'SHAKERATTO', 'Bebida fría a base de espresso.', 'url_to_shakeratto_image'),
(12, 'ICED LATTE', 'Bebida fría a base de espresso.', 'url_to_iced_latte_image'),
(12, 'ESPRESSO TONIC', 'Bebida fría a base de espresso.', 'url_to_espresso_tonic_image'),     -- 20
(12, 'ESPRESSO HONIC', 'Bebida fría a base de espresso.', 'url_to_espresso_honic_image'),
(13, 'Cold B. EN LAS ROCAS', 'Cold Brew es una infusión de café en frío de 12 a 15 horas.', 'url_to_cold_b_en_las_rocas_image'),
(13, 'Cold B. LATTE', 'Cold Brew es una infusión de café en frío de 12 a 15 horas.', 'url_to_cold_b_latte_image'),
(13, 'Cold B. MINERAL', 'Cold Brew es una infusión de café en frío de 12 a 15 horas.', 'url_to_cold_b_mineral_image'),
(13, 'Cold B. TONIC', 'Cold Brew es una infusión de café en frío de 12 a 15 horas.', 'url_to_cold_b_tonic_image'),
(14, 'Affogato', 'Una bola de nieve de vainilla servida en vaso y bañado en Espresso doble. Puedes comerlo a cucharadas o esperar a que se derrita para tomarlo. Dato curioso: Affogato significa “Ahogado” en Italiano.', 'url_to_affogato_image'),
(14, 'Marocchino', 'Espresso sencillo servido sobre chocolate, leche cremada y top de cocoa.', 'url_to_marocchino_image'),
(14, 'Café Bombón', 'Espresso sencillo servido sobre leche condensada. Puedes pedirlo como “Bombón del tiempo” para que sea servido en frío!', 'url_to_cafe_bombon_image'),
(14, 'Café con Miel', 'Espresso sencillo con miel disuelta y leche cremada.', 'url_to_cafe_con_miel_image'),
(14, 'Café Au Lait', 'Sencillamente un americano preparado en V60 al que añadimos leche cremada al final.
 Dato curioso: Literalmente significa “café con leche” en francés.', 'url_to_cafe_au_lait_image'),    -- 30
(14, 'Café de Olla', 'Porque no podía falta, nuestra tradicional forma de tomar café con un toque de especialidad. Café preparado en prensa francesa al que se le añade una infusión de piloncillo, canela y otras especias. Servida en taza de barro.', 'url_to_cafe_de_olla_image'),
(14, 'Café Americano', 'Café americano preparado con granos de café 100% arábica.', 'https://en.wikipedia.org/wiki/Caff%C3%A8_americano'),
  (14, 'Yuanyang (China)', 'Mezcla de té negro y café americano, endulzado con leche condensada.', 'https://i.imgur.com/vY2k17Y.png'),
  (14, 'Café Raf (Rusia)', 'Mezcla de espresso doble con piloncillo disuelto y leche, cremado todo junto.', 'https://i.imgur.com/vY2k17Y.png'),
  (14, 'Flat White (Australia/Nueva Zelanda)', 'Preparado con Ristretto doble y leche cremada muy ligeramente.', 'https://i.imgur.com/vY2k17Y.png'),
  (14, 'Cà Phê Sữa Nóng (Vietnam)', 'Café preparado en cafetera vietnamita "Phin", extracción intensa endulzada con leche condensada.', 'https://i.imgur.com/vY2k17Y.png'),
  (14, 'Cà Phê Sữa Dá (Vietnam)', 'Versión fría de la preparación en cafetera Vietnamita "Phin".', 'https://i.imgur.com/vY2k17Y.png'),
  (14, 'Mazagrán (Argelia)', 'Café americano preparado en clever, con jugo de limón y endulzado con azúcar morena.', 'https://i.imgur.com/vY2k17Y.png'),
   (15, 'MORA AZUL', 'Soda italiana sabor mora azul', 'https://el-1000-amores.postershop.me/product/66'),
  (15, 'MANZANA VERDE', 'Soda italiana sabor manzana verde', 'https://garden-bistro.postershop.me/product/188'),
  (15, 'ZARZAMORA', 'Soda italiana sabor zarzamora', 'https://imgur.com/gallery/kazuichi-soda-VwIgFpr'),
  (15, 'FRAMBUESA', 'Soda italiana sabor frambuesa', 'https://www.facebook.com/burbanosfood/videos/soda-italiana-frambuesa-lim%C3%B3n-has-tus-combinaciones-cafemachinemx/913383609405503/'),
   (15, 'Natural', 'Frappé clásico con leche, café y hielo', 'https://imgur.com/t/cursed_food'),
  (15, 'Cajeta', 'Frappé con sabor a cajeta, leche, café y hielo', 'https://imgur.com/t/cafe'),
  (15, 'Mocha', 'Frappé con sabor a chocolate y café, leche y hielo', 'https://imgur.com/gallery/orange-mocha-frappuccino-FaxcYZv'),
  (15, 'Nutella', 'Frappé con sabor a Nutella, leche, café y hielo', 'https://imgur.com/t/waffles/g0kIx'),
  (15, 'Oreo', 'Frappé con galletas Oreo, leche, café y hielo', 'https://imgur.com/t/oreo'),
  (15, 'Dirty Chai', 'Frappé con té Chai, leche y hielo', 'https://justcookkai.com/2020/03/dirty-chai-frappe/'),
  (15, 'Muddy Matcha', 'Frappé con matcha, leche y hielo', 'https://imgur.com/t/buff'),
  (15, 'Matcha', 'Frappé con matcha y leche', 'https://imgur.com/gallery/ginger-irish-beard-CpT1Poc'),
  (15, 'Chai', 'Frappé con té Chai y leche', 'https://imgur.com/t/chai'),
   (16, 'Natural', 'Frappé clásico con leche, café y hielo', 'https://imgur.com/t/cursed_food'),
  (16, 'Cajeta', 'Frappé con sabor a cajeta, leche, café y hielo', 'https://imgur.com/t/cafe'),
  (16, 'Mocha', 'Frappé con sabor a chocolate y café, leche y hielo', 'https://imgur.com/gallery/orange-mocha-frappuccino-FaxcYZv'),
  (16, 'Nutella', 'Frappé con sabor a Nutella, leche, café y hielo', 'https://imgur.com/t/waffles/g0kIx'),
  (16, 'Oreo', 'Frappé con galletas Oreo, leche, café y hielo', 'https://imgur.com/t/oreo'),
  (16, 'Dirty Chai', 'Frappé con té Chai, leche y hielo', 'https://justcookkai.com/2020/03/dirty-chai-frappe/'),
  (16, 'Muddy Matcha', 'Frappé con matcha, leche y hielo', 'https://imgur.com/t/buff'),
  (16, 'Matcha', 'Frappé con matcha y leche', 'https://imgur.com/gallery/ginger-irish-beard-CpT1Poc'),
  (16, 'Chai', 'Frappé con té Chai y leche', 'https://imgur.com/t/chai'),
  (17, 'Verde Menta', 'Té verde con sabor a menta', 'https://listado.mercadolibre.com.mx/te-de-menta'),
  (17, 'Negra', 'Té negro clásico', 'https://listado.mercadolibre.com.mx/te-negro'),
  (17, 'Earl Grey', 'Té negro con sabor a bergamota', 'https://listado.mercadolibre.com.mx/te-earl-grey'),
  (17, 'Chai Verde', 'Té verde con especias chai', 'https://listado.mercadolibre.com.mx/te-chai'),
  (17, 'Recibes', 'Té verde con jengibre y limón', 'https://www.mercadolibre.com.mx/'),
	(18, 'Flan Napolitano', 'Un delicioso flan tradicional con sabor a napolitano.', 'img_url_1'),
(18, 'Cheesecake Frutos Rojos', 'Cheesecake suave con una mezcla de frutos rojos.', 'img_url_2'),
(18, 'Cheesecake Brownie', 'Cheesecake cremoso con una base de brownie.', 'img_url_3'),
(18, 'Cheesecake Tortuga', 'Cheesecake con nueces y caramelo estilo tortuga.', 'img_url_4'),
(18, 'Brownie', 'Brownie clásico con un intenso sabor a chocolate.', 'img_url_5'),
(18, 'Pan Elote', 'Pan dulce hecho con maíz, perfecto para acompañar el café.', 'img_url_6'),
(18, 'Panque Platano', 'Panque esponjoso con sabor a plátano.', 'img_url_7'),
(18, 'Panque Zanahoria', 'Panque suave con zanahorias y especias.', 'img_url_8'),
(18, 'Panque Moras', 'Panque delicioso con una mezcla de moras frescas.', 'img_url_9'),
(18, 'Pastel Chocolate', 'Pastel de chocolate húmedo y delicioso.', 'img_url_10'),
(18, 'Pastel Chorreado', 'Pastel bañado con una rica salsa de chocolate.', 'img_url_11'),
(18, 'Pastel Red Velvet', 'Pastel de terciopelo rojo con glaseado cremoso.', 'img_url_12'),
(18, 'Rollos de Canela con Glaseado', 'Rollos suaves de canela con glaseado dulce.', 'img_url_13');

-- Insertar detalle de productos del menu
	INSERT INTO detalle_productos_menu (id_pm, medida, precio) VALUES
(1, '1 Oz', 20.00),
(1, '2 Oz', 25.00),
(2, '3 Oz', 30.00),
(2, '4 Oz', 35.00),
(3, '2 Oz', 25.00),
(3, '4 Oz', 30.00),
(4, '12 Oz', 40.00),
(4, '16 Oz', 45.00),
(5, '8 Oz', 40.00),
(6, '8 Oz', 45.00),
(7, '12 Oz', 50.00),
(7, '16 Oz', 55.00),
(8, '12 Oz', 55.00),
(8, '16 Oz', 60.00),
(9, '12 Oz', 55.00),
(9, '16 Oz', 60.00),
(10, '12 Oz', 60.00),
(10, '16 Oz', 65.00),
(11, '12 Oz', 40.00),
(11, '16 Oz', 45.00),
(12, '12 Oz', 40.00),
(13, '12 Oz', 40.00),
(13, '16 Oz', 45.00),
(14, '12 Oz', 40.00),
(14, '16 Oz', 45.00),
(15, '12 Oz', 50.00),
(15, '16 Oz', 55.00),
(16, '12 Oz', 50.00),
(16, '16 Oz', 55.00),
(17, '12 Oz', 50.00),
(17, '16 Oz', 60.00),
(18, '14oz', 40),
(18, '20oz', 50),
(19, '14oz', 50),
(19, '20oz', 60),
(20, '14oz', 50),
(20, '20oz', 60),
(21, '14oz', 50),
(21, '20oz', 60),
(22, '14 Oz', 50),
(22, '20 Oz', 55),
(23, '14 Oz', 50),
(23, '20 Oz', 55),
(24, '14 Oz', 50),
(24, '20 Oz', 55),
(25, '14 Oz', 50),
(25, '20 Oz', 55),
(26, '12 Oz', 55),
(26, '16 Oz', 70),
(27, '6 Oz', 40),
(28, '2 Oz', 30),
(29, '8 Oz', 40),
(30, '12 Oz', 45),
(30, '16 Oz', 50),
(31, '12 Oz', 50),
(31, '16 Oz', 60),
(32, '12 Oz', 55.00),
  (32, '16 Oz', 60.00),
  (33, '12 Oz', 55.00),
  (33, '16 Oz', 60.00),
  (34, '6 Oz', 40.00),
  (34, '8 Oz', 45.00),
  (35, '8 Oz', 45.00),
  (36, '14 Oz', 50.00),
  (36, '20 Oz', 60.00),
  (37, '14oz', 50.00),
  (37, '20oz', 60.00),
  (38, '14oz', 50.00),
  (38, '20oz', 60.00),
  (39, '14oz', 50.00),
  (39, '20oz', 60.00),
  (40, '14oz', 50.00),
  (40, '20oz', 60.00),
   (41, '12 Oz', 55.00),
  (41, '16 Oz', 60.00),
  (42, '12 Oz', 55.00),
  (42, '16 Oz', 60.00),
  (43, '12 Oz', 55.00),
  (43, '16 Oz', 60.00),
  (44, '12 Oz', 55.00),
  (44, '16 Oz', 60.00),
  (45, '12 Oz', 60.00),
  (45, '16 Oz', 65.00),
  (46, '12 Oz', 60.00),
  (46, '16 Oz', 65.00),
  (47, '12 Oz', 65.00),
  (47, '16 Oz', 70.00),
  (48, '8 Oz', 45.00),
  (49, '14 Oz', 50.00),
  (49, '20 Oz', 60.00),
   (50, '12 Oz', 45.00),
  (50, '16 Oz', 50.00),
  (51, '12 Oz', 45.00),
  (51, '16 Oz', 50.00),
  (52, '12 Oz', 40.00),
  (52, '16 Oz', 45.00),
  (53, '12 Oz', 45.00),
  (53, '16 Oz', 50.00),
  (54, '12 Oz', 45.00),
  (54, '16 Oz', 50.00),
  (55, '', 60), -- Flan Napolitano
(56, '', 60), -- Cheesecake Frutos Rojos
(57, '', 60), -- Cheesecake Brownie
(58, '', 60), -- Cheesecake Tortuga
(59, '', 60), -- Brownie
(60, '', 35), -- Pan Elote
(61, '', 40), -- Panque Platano
(62, '', 40), -- Panque Zanahoria
(63, '', 40), -- Panque Moras
(64, '', 70), -- Pastel Chocolate
(65, '', 70), -- Pastel Chorreado
(66, '', 70), -- Pastel Red Velvet
(67, '', 40); -- Rollos de Canela con Glaseado

-- Ingresar domicilios para los primeros 19 clientes
INSERT INTO domicilios(id_cliente, referencia, estado, ciudad, codigo_postal, colonia, calle, telefono)
VALUES
(1, 'Laura Sanchez', 'Coahuila', 'Torreón', '27050', 'Colinas del Sol', 'Calle del Águila #1415', '8712345683'),
(2, 'Jose Ramirez', 'Coahuila', 'Torreón', '27060', 'Jardines del Bosque', 'Calle de los Cedros #1617', '8712345684'),
(3, 'Rosa Torres', 'Coahuila', 'Torreón', '27070', 'San Felipe', 'Avenida de la Paz #1819', '8712345685'),
(4, 'Miguel Reyes', 'Coahuila', 'Torreón', '27080', 'Revolución', 'Boulevard de las Palmas #2021', '8712345686'),
(5, 'Luisa Cruz', 'Coahuila', 'Torreón', '27090', 'Las Fuentes', 'Avenida del Bosque #2223', '8712345687'),
(6, 'Jorge Flores', 'Coahuila', 'Torreón', '27100', 'Real del Sol', 'Calle del Río #2425', '8712345688'),
(7, 'Isabel Gomez', 'Coahuila', 'Torreón', '27110', 'La Rosita', 'Avenida de las Estrellas #2627', '8712345689'),
(8, 'Pedro Diaz', 'Coahuila', 'Torreón', '27120', 'Ampliación Loma Real', 'Calle del Mirador #2829', '8712345690'),
(9, 'Carmen Morales', 'Coahuila', 'Torreón', '27130', 'Nueva Laguna', 'Boulevard del Álamo #3031', '8712345691'),
(10, 'Ricardo Ortiz', 'Coahuila', 'Torreón', '27140', 'Laguna Sur', 'Avenida del Cielo #3233', '8712345692'),
(11, 'Sofia Silva', 'Coahuila', 'Torreón', '27150', 'Mirasierra', 'Calle del Monte #3435', '8712345693'),
(12, 'Fernando Romero', 'Coahuila', 'Torreón', '27160', 'San Agustín', 'Avenida del Río #3637', '8712345694'),
(13, 'Patricia Rojas', 'Coahuila', 'Torreón', '27170', 'Villa Florida', 'Boulevard de las Rosas #3839', '8712345695'),
(14, 'Roberto Vazquez', 'Coahuila', 'Torreón', '27180', 'Los Ángeles', 'Calle de los Sauces #4041', '8712345696');

INSERT INTO ubicacion_lugares (latitud, longitud)
VALUES
(25.540484705675055, -103.46118767170404),
(25.53989636512453, -103.46155889684215),
(25.540186767350228, -103.45238403323752);

INSERT INTO EVENTOS (
    id_lugar, id_categoria, nombre, tipo, descripcion, fecha_evento, 
    hora_inicio, hora_fin, capacidad, precio_boleto, disponibilidad, 
    img_url, fecha_publicacion
) VALUES
(1, 1, 'Noches de Jazz', 'Gratuito', 'Disfruta de una velada con música jazz en vivo.', '2024-08-15', '19:00:00', '21:00:00', 50, 0.0, 50, 'img/jazz.jpg', '2024-07-09'),
(1, 3, 'Tarde de Poesía', 'Gratuito', 'Recital de poesía acompañado de café y pastelería artesanal.', '2024-08-20', '17:00:00', '19:00:00', 30, 0.0, 30, 'img/poesia.jpg', '2024-07-09'),
(1, 6, 'Exposición de Arte Local', 'Gratuito', 'Exhibición de obras de artistas locales con un ambiente cultural.', '2024-09-05', '10:00:00', '18:00:00', 80, 0.0, 80, 'img/arte.jpg', '2024-07-09'),
(1, 4, 'Degustación de Café', 'De Pago', 'Aprende sobre variedades de café y métodos de preparación.', '2024-09-10', '10:00:00', '12:00:00', 20, 15.0, 20, 'img/degustacion.jpg', '2024-07-09'),
(1, 1, 'Cata de Vinos y Quesos', 'De Pago', 'Descubre la combinación perfecta entre vinos, quesos y café.', '2024-09-25', '18:00:00', '20:00:00', 40, 25.0, 40, 'img/cata.jpg', '2024-07-09'),
(1, 8, 'Noche de Cine Independiente', 'Gratuito', 'Proyección de películas independientes acompañadas de café gourmet.', '2024-10-05', '20:00:00', '22:00:00', 25, 0.0, 25, 'img/cine.jpg', '2024-07-09'),
(1, 4, 'Taller de Cocina Saludable', 'De Pago', 'Aprende a preparar platillos saludables con ingredientes locales.', '2024-10-15', '09:00:00', '11:00:00', 15, 20.0, 15, 'img/cocina.jpg', '2024-07-09'),
(1, 1, 'Concierto Acústico', 'Gratuito', 'Concierto íntimo con artistas locales en un ambiente acogedor.', '2024-11-01', '18:00:00', '20:00:00', 50, 0.0, 50, 'img/concierto.jpg', '2024-07-09'),
(3, 7, 'Charla sobre Café y Cultura', 'Gratuito', 'Discusión sobre la historia y la influencia cultural del café en nuestra sociedad.', '2024-11-10', '17:00:00', '19:00:00', 30, 0.0, 30, 'img/charla.jpg', '2024-07-09'),
(2, 5, 'Feria de Libros Antiguos', 'Gratuito', 'Venta y exhibición de libros antiguos acompañados de café y música en vivo.', '2024-12-01', '10:00:00', '16:00:00', 50, 0.0, 50, 'img/libros.jpg', '2024-07-09');

INSERT INTO bolsas_cafe(
	nombre,
    años_cosecha,
    productor_finca,
    proceso,
    variedad,
    altura,
    aroma,
    acidez,
    sabor,
    cuerpo,
    puntaje_catacion,
    img_url
)
VALUES
('Texin Veracruz','2023 - 2024','Eduardo Vital Díaz', 'Lavado', 'Marsellesa, San Román, Oro Azteca', '1,220 msnm', 'Cacao, Vainilla', 'Cítrica, brillante', 'Choc. Oscuro, Avellana', 'Alto - Denso',85, 'https://example.com/image.jpg'),
('Jaltenango Chiapas','2023 - 2024','Finca Santa María', 'Lavado', 'Caturra', '1,300 - 1,500 msnm', 'Cítrico, Floral', 'Brillante, Equilibrada', 'Miel, Manzana Verde, Durazno', 'Medio - Denso',86.5, '[https://www.booking.com/hotel/mx/la-joyita.html](https://www.booking.com/hotel/mx/la-joyita.html)'),
('Jaltenango Chiapas','2023 - 2024','Finca Santa María', 'Natural', 'Marsellesa, Bourbon', '1,350 - 1,450 msnm', 'Dulce de Leche, Nuez', 'Frutal Intensa', 'Almíbar, Naranja', 'Ligero',84, 'https://www.facebook.com/fincaelinjertocafe/');

-- Insert 
INSERT INTO detalle_bc (
  id_bolsa,
  medida,
  precio,
  stock
)
VALUES 
(1, '1/4 Kg', 85, 10),
(1, '1/2 Kg', 170, 5),
(1, '1 Kg', 340, 2),
(2, '250 g', 130, 20),
(2, '500 g', 250, 15),
(2, '1 Kg', 480, 10),
(3,  '250 g', 80, 20),
(3,  '500 g', 160, 15),
(3,  '1 Kg', 320, 10);

-- Inserción de recompensas
INSERT INTO recompensas (recompensa, condicion, fecha_inicio, fecha_expiracion, estatus, img_url) VALUES
('10% de descuento en café', 5, '2024-07-10', '2024-08-10', 'Activa', 'img/descuento_cafe.jpg'),
('Bebida gratis al comprar un pastel', 10, '2024-07-10', '2024-08-10', 'Activa', 'img/bebida_gratis.jpg'),
('Taza conmemorativa gratis', 15, '2024-07-10', '2024-08-10', 'Activa', 'img/taza_conmemorativa.jpg'),
('Acceso a evento exclusivo', 20, '2024-07-10', '2024-08-10', 'Activa', 'img/evento_exclusivo.jpg'),
('Descuento del 20% en tu próxima compra', 25, '2024-07-10', '2024-08-10', 'Activa', 'img/descuento_proxima.jpg');

-- Insertar asociaciones entre todos los clientes y las recompensas activas
INSERT INTO clientes_recompensas (id_cliente, id_recompensa)
SELECT c.id_cliente, r.id_recompensa
FROM clientes c
CROSS JOIN recompensas r
WHERE r.estatus = 'Activa';

select * from clientes_recompensas;
-- Indices en claves foraneas
-- Indices en las claves foraneas para la aceleracion de la gestion de tablas ligadas con JOIN.
-- Tabla roles_usuarios
CREATE INDEX idx_roles_usuarios_id_usuario ON roles_usuarios(id_usuario);
CREATE INDEX idx_roles_usuarios_id_rol ON roles_usuarios(id_rol);

-- Tabla personas, empleados, clientes, proveedores
CREATE INDEX idx_personas_id_usuario ON personas(id_usuario);
CREATE INDEX idx_clientes_id_persona ON clientes(id_persona);
CREATE INDEX idx_empleados_id_persona ON empleados(id_persona);
CREATE INDEX idx_proveedores_id_persona ON proveedores(id_persona);

-- Tabla domicilios
CREATE INDEX idx_domicilios_id_cliente ON domicilios(id_cliente);

-- Tabla pedidos
CREATE INDEX idx_pedidos_id_cliente ON pedidos(id_cliente);
CREATE INDEX idx_pedidos_id_domicilio ON pedidos(id_domicilio);

-- Tabla carrito
CREATE INDEX idx_carrito_id_cliente ON carrito(id_cliente);
CREATE INDEX idx_carrito_id_bc ON carrito(id_dbc);

-- Tabla detalle_pedidos
CREATE INDEX idx_detalle_pedidos_id_pedido ON detalle_pedidos(id_pedido);
CREATE INDEX idx_detalle_pedidos_id_bc ON detalle_pedidos(id_dbc);

-- Tabla EVENTOS
CREATE INDEX idx_eventos_id_lugar ON EVENTOS(id_lugar);
CREATE INDEX idx_eventos_id_categoria ON EVENTOS(id_categoria);

-- Tabla eventos_reservas
CREATE INDEX idx_eventos_reservas_id_cliente ON eventos_reservas(id_cliente);
CREATE INDEX idx_eventos_reservas_id_evento ON eventos_reservas(id_evento);

-- Tabla productos_menu
CREATE INDEX idx_productos_menu_id_categoria ON productos_menu(id_categoria);

-- Tabla asistencias
CREATE INDEX idx_asistencias_id_cliente ON asistencias(id_cliente);

-- Tabla clientes_recompensas
CREATE INDEX idx_clientes_recompensas_id_cliente ON clientes_recompensas(id_cliente);
CREATE INDEX idx_clientes_recompensas_id_recompensa ON clientes_recompensas(id_recompensa);
