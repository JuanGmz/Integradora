
-- Buscar determinada reserva por folio.
-- CLIENTE | FOLIO RESERVA | ESTATUS | FECHA / HORA RESERVA | EVENTO | FECHA EVENTO
delimiter //
create procedure SP_BuscarAdminReserva(in folioreserva int)
begin 
select 
	concat(p.nombres,' ',p.apellido_paterno,' ', p.apellido_materno) as CLIENTE,er.id_reserva as 'FOLIO RESERVA', er.estatus as ESTATUS,
    er.fecha_hora_reserva as 'FECHA / HORA RESERVA', e.nombre as EVENTO, e.fecha_evento as 'FECHA EVENTO'
from eventos_reservas er
	join clientes c on c.id_cliente =er.id_cliente
	join personas p on p.id_persona = c.id_persona
	join eventos e on e.id_evento = er.id_evento where er.id_reserva = folioreserva;
end //
delimiter ;

-- LLamar el procedimiento almacenado para insertar productos en el carrito.
call SP_Insert_Update_Carrito(1, 4, 1);

-- BUSCAR PRODUCTOS EN LAS BOLSAS
DELIMITER $$

CREATE PROCEDURE Buscar_bolsas (
    IN nombre NVARCHAR(100)
)
BEGIN
    SELECT distinct bd.id_bolsa, bd.nombre, bd.años_cosecha, bd.productor_finca, bd.proceso, bd.variedad, bd.altura, 
           bd.aroma, bd.acidez, bd.sabor, bd.cuerpo, bd.puntaje_catacion, bd.img_url,
           bc.medida, bc.precio, bc.stock
    FROM bolsas_detalle bd
	JOIN bolsas_cafe bc ON bd.id_bolsa = bc.id_bolsa
    WHERE bd.nombre LIKE CONCAT('%', nombre, '%');
END $$

DELIMITER ;

insert into asistencias (id_cliente)
value (5);

select * from clientes;

select * from clientes_recompensas where id_cliente = 5;

select * from recompensas;


-- procedimiento almacenado para subir folios en Pedidos y relacionarlo con un pedido-----------------------------------------------------------------------------

drop procedure if exists SP_relacionar_Comprobante_Pedido;
delimiter $$
create procedure SP_relacionar_Comprobante_Pedido(
-- datos del comprobante Y la ID del PEDIDO
in p_pedido int,
in p_conce varchar(255),
in p_refe varchar(255),
in p_mont decimal(10,2),
in p_folio_ope varchar(255),
in p_banco_ori varchar(255),
in p_img_compro varchar(255)
)
begin
declare id_c int;

-- se inserta los datos del comprobante
insert into comprobantes(concepto,referencia, folio_operacion, monto, banco_origen, imagen_comprobante)
values(p_conce, p_refe, p_folio_ope,  p_mont, p_banco_ori, p_img_compro);

-- aqui hacemos que esta variable tenga el ultimo valor insertado de la llave primaria
set id_c = last_insert_id();

-- y lo relacionamos con el pedido en la tabla comprobante pedido con la id del pedido requerida para llevar a cabo este proceso
insert into comprobantes_pedidos(id_comprobante, id_pedido)
values(id_c, p_pedido);


end $$
delimiter ;

-- para llamar a llamar a un este proceso tiene que existir un pedido, por ejemplo el siguiente:
select * from pedidos;
INSERT INTO pedidos (
    id_cliente,
    id_domicilio,
    metodo_de_pago,
    estatus,
    envio,
    monto_total,
    guia_de_envio,
    documento_url
) VALUES (
    1,  -- id_cliente
    1,  -- id_domicilio
    'Transferencia',  -- metodo_de_pago
    'Pendiente',  -- estatus
    'Envío estándar',  -- envio
    150.75,  -- monto_total
    '1234567890',  -- guia_de_envio
    'http://ficticia.com/documento/123'  -- documento_url
);

-- ahora, el comprobante que dese subir el cliente se relacionara automaticamente con el pedido con el siguiente llamamiento;
select * from comprobantes_pedidos;
CALL SP_relacionar_Comprobante_Pedido(1,'Concepto de prueba','Ref111111',1300.00,'Folio111111','Banco sanpetesburgo','imagen.jpg');
select * from comprobantes;


-- procedimiento almacenado para subir folios en Reservas y relacionarlos con su tabla comprobante_relacion -------------------------------------------------------------------------------------------------------------------------------
-- es lo mismo que el anterior pero en vez de utilizar el nombre p_pedido utilizamos
drop procedure if exists SP_relacionar_evento_reserva;
delimiter $$
create procedure SP_relacionar_evento_reserva(
-- id del evento
in p_evento int,
-- datos del comprobante
in p_conce varchar(255),
in p_refe varchar(255),
in p_mont decimal(10,2),
in p_folio_ope varchar(255),
in p_banco_ori varchar(255),
in p_img_compro varchar(255)
)
begin
declare id_c int;

-- aqui el cliente sube el comprobante
insert into comprobantes(concepto,referencia, folio_operacion, monto, banco_origen, imagen_comprobante)
values(p_conce, p_refe, p_folio_ope, p_mont, p_banco_ori, p_img_compro);

--  hacemos que esta variable tenga el ultimo valor insertado de la llave primaria
set id_c = last_insert_id();

insert into comprobantes_reservas(id_comprobante, id_reserva)
values(id_c, p_evento);

end $$
delimiter ;

-- se necesita tener una reserva del evento para realizar el llamamiento de SP_relacionar_evento_reserva
insert into eventos_reservas( id_cliente, id_evento,  c_boletos, monto_total, estatus)
values (1, 1, 2, 30.00, 'Pendiente');


select * from comprobantes_reservas;
select * from comprobantes;
CALL SP_relacionar_evento_reserva(1,'Concepto de prueba','Ref777777',40.00,'Folio777777','Banco sanpetesburgo','imagen.jpg');
describe comprobantes;
select * from eventos_reservas;



-- procedimiento almacenado para calcular el monto total de un boleto -----------------------------------------------------------------------------

-- evento id = 4, precio por boleto unitario = 15 
drop procedure if exists SP_calcular_monto_boletos;
delimiter $$
create procedure SP_calcular_monto_boletos(
in p_id_cliente int, 
in p_id_evento int, 
in p_c_boletos int
)
begin 

-- se ingresan los datos del usuario aqui 
insert into eventos_reservas(id_cliente, id_evento, c_boletos, estatus)
VALUES (p_id_cliente, p_id_evento, p_c_boletos, "Pendiente");

end $$
delimiter ;

select * from eventos;
select * from clientes;
select * from eventos_reservas;
-- se llama a la procedimiento para registrar una reserva del evento
call SP_calcular_monto_boletos(1, 4, 3);
select * from eventos_reservas;


-- procedimiento almacenado para crear la relacion de roles(exclusivamente el rol de usuario)-usuarios-personas-clientes -----------------------------------------------------------------------------
drop procedure if exists SP_Crear_relacion_registro_cliente ;
delimiter $$
create procedure SP_Crear_relacion_registro_cliente(
-- tabla usuario
	p_usuario nvarchar (100),
	p_correo nvarchar(100),
	p_contraseña varbinary(150),
	p_telefono nchar(10),
-- tabla personas
	p_nombres nvarchar(150),
    p_apellido_paterno nvarchar(100),
    p_apellido_materno nvarchar(100)
)
begin 
-- declaramos las ultimas ids primarias que se almacenaran
declare lii_usuario int default 0;
declare lii_persona int default 0;

-- se crea y se hace la relacion con el rol
insert into usuarios(usuario, correo, contraseña, telefono)
values(p_usuario,p_correo,p_contraseña,p_telefono); 

-- aqui hacemos que esta variable tenga el ultimo valor insertado de la llave primaria
select last_insert_id() into lii_usuario;

insert into roles_usuarios(id_usuario, id_rol)
values(lii_usuario, 2);

-- luego se inserta los demas datos en personas relacionandolos con el usario recien insertado y se despues se relaciona con el cliente
insert into personas(id_usuario, nombres, apellido_paterno, apellido_materno)
values (lii_usuario, p_nombres, p_apellido_paterno, p_apellido_materno);

-- hacemos que esta variable tenga el ultimo valor insertado de la llave primaria
select last_insert_id() into lii_persona;

-- y con esa variable relacionamos a la tabla clientes con persona
insert into clientes(id_persona)
values(lii_persona);

end $$
delimiter ; 

drop procedure SP_Crear_relacion_registro_cliente;
-- se ingresan los datos
call SP_Crear_relacion_registro_cliente('xXelNoeGod616Xx','NoeMinecraft@gmail.com','ElSeñorDeLosAnillosMejorSaga','8716215522', 'Noe','Enrique', 'Segobiano');
select * from usuarios;
select * from personas;
select * from clientes;
select * from roles_usuarios;
select * from roles;  
