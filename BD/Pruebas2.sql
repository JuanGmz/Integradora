

-- MENU modulo
-- 						| Categoria| Nombre | Descripcion | Foto del producto | Su medida | Precio|


-- call SP_agregar_producto_Menu(18,'bolas de arroz con crema', 'bolas de arroz hervidas bañadas en una crema agridulce.', 'arrozCrema.pnj', '15 Oz', 80);
-- call SP_agregar_producto_Menu(17,'jugo de mango', 'esta dulce.', 'mango.pnj', '18 Oz', 55);
select * from productos_menu;
select * from detalle_productos_menu;
select * from categorias;
					

-- prueba
-- el producto a actualizar
call SP_agregar_producto_Menu(15,'jugo de mango', 'es dulce.', 'foto_del_producto.pnj', '18 Oz', 55);

-- la actualizacion de los datos
UPDATE productos_menu SET nombre = 'jugo de uva', descripcion = 'es muy acido', id_categoria = 18 WHERE id_pm = 79;


-- actualizar imagen del producto
UPDATE productos_menu SET img_url = 'jugo_de_uva.png' WHERE id_pm = 79;

-- añadir medida adicional
INSERT INTO detalle_productos_menu(id_pm, medida, precio) VALUES (79, '12 Oz', '40');

-- borrar medida de un producto
DELETE FROM detalle_productos_menu WHERE id_pm = '79' AND medida = '12 Oz' AND precio = '40';

-- ECOMERCE

-- procedimiento añadir una bolsa al ecomerce
call SP_Agregar_producto_ecomerce('Cafesin Dantin','2023 - 2024','Basurto Saucedin', 'Natural', 'Colinas, San Taloban, La Cresta', '1,220 msnm',
 'Cacao, Fresa', 'Cítrica, Apagada', 'Choc. Oscuro, Fresas', 'Medio - Ligero',99, 'CafeBonito(LAV)T.webp','1/4 Kg', 85, 10);

-- agregar medidas y precio a una bolsa 
call SP_Agregar_medida_bolsa_ecomerce(4,'1/2 Kg',160, 20);
call SP_Agregar_medida_bolsa_ecomerce(4,'1 Kg',350, 25);

-- Editar precio/stock a una bolsa 
call SP_Editar_precio_stock_bolsa_ecomerce(11,4,170, 25);
call SP_Editar_precio_stock_bolsa_ecomerce(12,4,380, 30);

-- procedimiento editar una bolsa de ecomerce
call SP_Editar_bolsa_ecomerce(4,'El mocacino','2023 - 2024','Tapurto siñor', 'Lavado', 'Alan de la Cruz, Saquito', '1,300 msnm',
 'Cacao Oscuro', 'Saudino', 'Gallino, nutela', 'Suave - Pesado',87, 'CafeOscuro.webp');

select * from detalle_bc;
select * from bolsas_cafe;
select * from carrito;
select * from pedidos;

-- agregar datos faltantes a un pedido
UPDATE pedidos SET 
	estatus = 'Finalizado',
    envio = 'Mediate un repartidor',
    costo_envio = '120',
    guia_de_envio= '...',
    documento_url = 'Cliente2.docx'
    WHERE id_pedido = '1';	

-- Agregar un producto al carrito

call SP_Insert_Update_Carrito(1,1,3);
call SP_Insert_Update_Carrito(1,3,1);
call SP_Insert_Update_Carrito(1,5,3);

-- Realizar el pedido de los productos en el carrito productos
call SP_Realizar_Pedido(1,1,1);

-- EVENTOS

-- Insertar un lugar
INSERT INTO ubicacion_lugares (nombre, ciudad, estado, descripcion)
VALUES ('Elcerrodelasnoas', 'Guadalajara', 'Ecatepec',  'donde esta la estatua grande');

-- Insertar evento
INSERT INTO EVENTOS (id_lugar, id_categoria, nombre, tipo, descripcion, fecha_evento, hora_inicio, hora_fin, capacidad, precio_boleto, disponibilidad, img_url, fecha_publicacion)
VALUES (4, 4, 'festivaldecafe', 'De Pago', 'setomaraCafe', '2024-08-7', '20:20:00', '24:40:00', 100, 50, 40, 'Cristo.jpg', '2024-07-27');

select * from ubicacion_lugares;
select * from eventos;
select * from categorias;


-- editar el datos del lugar de evento
UPDATE ubicacion_lugares 
SET nombre = 'El cerro de las noas', ciudad = 'Torreon', estado = 'Coahulia', codigo_postal = '28037', 
calle = '...', colonia = '...', descripcion = 'Es el pico del cerro, normalemente nos reunimos en la estatua del cristo'
WHERE id_lugar = '4';

-- editar datos de un evento
UPDATE EVENTOS 
SET nombre = 'Festival de Cafe por la cimas', tipo = 'De Pago', descripcion = 'Festejaremos a lo grande en el pico del cerro de las noas,
subiremos caminando y nos divertiremos en el trayecto!!!', fecha_evento = '2024-08-26', hora_inicio = '17:20:00', 
hora_fin = '19:40:00', capacidad = '200',  precio_boleto = '40',   disponibilidad = '200', fecha_publicacion = '2024-08-14'
WHERE id_evento = '11';

select * from eventos_reservas;

-- usuario realiza reserva
call SP_reserva_evento (1,4,6,1);

select * from comprobantes;

-- usuario sube comprobante
call SP_comprobante_reserva(1,'Reserva de un evento', 240,'ABC12345678', 'Banco azteca', 'comprobante.png');


-- RECOMPENSAS


-- agregar una recompensa
call sp_agregar_recompensa('Frappe natural gratis', 13, '2024-07-21', '2024-08-6', 'frappenatural.png');

-- agregar una asistencia a las recompensas activas
insert into asistencias(id_cliente)
values (6);

select * from view_clientes_recompensas
where id_cliente = 6;

select * from recompensas;
select * from asistencias;
select * from clientes;


select * from personas;
-- canjear una recompensa
call SP_canjear_recompensa(6);

-- PUBLICACIONES

select * from publicaciones;

-- Agregar una publicacion
INSERT INTO publicaciones(titulo, descripcion, img_url, tipo) 
VALUES ('Los beneficios del cafe', 'Rico en antioxidantes y nutrientes esenciales, 
el café puede mejorar tu energía, potenciar tu concentración y ayudar en la quema de grasa'
, 'CafeBeneficios.png', 'Difusion');

-- editar datos una publicacion
UPDATE publicaciones 
SET titulo = 'Cafe y Beneficios', tipo = 'Blog', descripcion = 'Rico en antioxidantes y nutrientes esenciales, 
el café puede mejorar tu energía, potenciar tu concentración y ayudar en la quema de grasa'
 WHERE id_publicacion = 11;

-- editar una imagen 
UPDATE publicaciones SET img_url = 'BeneficiosDeLosCafes.jpg' WHERE id_publicacion = 11;






