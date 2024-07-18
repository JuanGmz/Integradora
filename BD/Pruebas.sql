
/*
-- Vista de Administrador Pedidos
create view view_AdminPedidos as 
select 
	concat(p.nombres, '', p.apellido_paterno,'', p.apellido_materno) as cliente,
    pd.id_pedido as 'folio_pedido',
    pd.estatus,
    pd.fecha_hora_pedido,
    pd.monto_total
from pedidos pd
	join clientes c on c.id_cliente = pd.id_cliente
    join personas p on p.id_persona = c.id_persona;
    
-- Vista de Administrador Detalle de pedidos
    create view view_detalle_pedidos as
    select 
    bc.nombre as producto, 
    dbc.medida, 
    dp.cantidad,
    dp.monto
    from detalle_pedidos dp
    join detalle_bc	dbc on dbc.id_dbc = dp.id_dbc
    join bolsas_cafe bc on bc.id_bolsa = dbc.id_bolsa;
    
describe pedidos;
select r.recompensa, r.condicion, concat(r.fecha_inicio,' - ',fecha_expiracion) as periodo, r.estatus
from recompensas r order by r.estatus asc;

show events;

select tipo from publicaciones;

select * from view_clientes_recompensas where id_cliente= 5;

select * from publicaciones;

select * from recompensas;

select user from mysql.user;


grant select,insert,delete,update on *.* to auxiliar@localhost;

 update personas set telefono = '8715084325' where id_persona = 1;
 
repair table cafe_sinfonia;


-- Buscar determinada reserva por folio.
-- CLIENTE | FOLIO RESERVA | ESTATUS | FECHA / HORA RESERVA | EVENTO | FECHA EVENTO
delimiter //
create procedure SP_BuscarAdminReserva(in folioreserva int)
begin 
select 
	concat(p.nombres,' ',p.apellido_paterno,' ', p.apellido_materno) as CLIENTE,
    er.id_reserva as 'FOLIO RESERVA', 
    er.estatus as ESTATUS,
    er.fecha_hora_reserva as 'FECHA / HORA RESERVA', e.nombre as EVENTO,
    e.fecha_evento as 'FECHA EVENTO'
from eventos_reservas er
	join clientes c on c.id_cliente =er.id_cliente
	join personas p on p.id_persona = c.id_persona
	join eventos e on e.id_evento = er.id_evento where er.id_reserva = folioreserva;
end //
delimiter ;

-- Buscar productos por categoria
DELIMITER //
CREATE PROCEDURE `listar_productos_menu`(IN categoria VARCHAR(60))
BEGIN
	SELECT
		pm.id_pm,
		pm.nombre,
        pm.descripcion,
        pm.img_url
	FROM
		productos_menu AS pm
	JOIN
		categorias AS c ON pm.id_categoria = c.id_categoria
	WHERE
		c.nombre = categoria
	ORDER BY 
		pm.nombre ASC;
END//
DELIMITER ;

-- LLamar el procedimiento almacenado para insertar productos en el carrito.
call SP_Insert_Update_Carrito(1, 4, 1);

-- BUSCAR PRODUCTOS EN LAS BOLSAS
DELIMITER //
CREATE PROCEDURE Buscar_bolsas (
    IN p_nombre NVARCHAR(100)
)
BEGIN
    SELECT bc.id_bolsa, 
		bc.nombre, 
        bc.años_cosecha, 
        bc.productor_finca, 
        bc.proceso, 
        bc.variedad, 
        bc.altura, 
		bc.aroma, 
        bc.acidez, 
        bc.sabor, 
        bc.cuerpo,
        bc.puntaje_catacion, 
        bc.img_url,
		bcd.medida,
        bcd.precio, 
        bcd.stock
    FROM bolsas_cafe bc
		JOIN detalle_bc bcd ON bc.id_bolsa = bcd.id_bolsa
    WHERE bd.nombre LIKE CONCAT('%',p_nombre, '%');
END //
DELIMITER ;

call Buscar_bolsas ('Texin Veracruz');

select * from bolsas_cafe;




select * from eventos_reservas;

update eventos_reservas set estatus = 'Cancelada' where id_reserva =1;
update eventos_reservas set estatus = 'Apartada' where id_reserva =1;

select * from eventos_reservas;
describe eventos_reservas;
select * from eventos where tipo = 'De Pago';

select * from personas;
select * from detalle_bc;
*/
/*
Momento de Ejecución: El momento específico o el intervalo de tiempo en el que se ejecutará el evento.
Cuerpo del Evento: Las declaraciones SQL que se ejecutarán cuando se dispare el evento.
Eventos de una sola vez: Se ejecutan una sola vez en un momento específico.
Eventos recurrentes: Se ejecutan repetidamente a intervalos de tiempo específicos.
---- Estructura
CREATE EVENT: Indica el inicio de la declaración de creación del evento.
nombre_evento: El nombre del evento.
ON SCHEDULE: Especifica el momento o el intervalo de ejecución del evento.
AT: Indica un momento específico.
EVERY: Indica un intervalo recurrente.
STARTS: Define cuándo debe comenzar a ejecutarse un evento recurrente.
ENDS: Define cuándo debe dejar de ejecutarse un evento recurrente (opcional).
DO: Introduce las declaraciones SQL que se ejecutarán cuando el evento se dispare.
BEGIN ... END: Delimita el bloque de declaraciones SQL en el cuerpo del evento.
*/
-- Funcionamiento del sistema de recompensas -- 289
select * from personas;
select * from clientes;
select * from recompensas;
select * from asistencias;
select * from view_clientes_recompensas where id_cliente = 1;

SET SQL_SAFE_UPDATES = 0;

insert into asistencias(id_cliente)
values (1);

call SP_canjear_recompensa(1);


call sp_agregar_recompensa('Frappe natural gratis', 5, '2024-07-19', '2024-07-20', 'frappenatural.png');

-- Funcionamiento del sistema de Ecommerce -- 472
select * from personas;
select * from clientes;
select * from domicilios;
select * from pedidos;
select * from detalle_pedidos;
select * from view_carrito;

call SP_Insert_Update_Carrito(1,1,3);
call SP_Insert_Update_Carrito(1,3,1);
call SP_Insert_Update_Carrito(1,5,3);

call SP_Realizar_Pedido(2,2,1);

call SP_Realizar_Pedido(1,1,1);

call SP_Insert_Update_Carrito(1,1,1);
call SP_Insert_Update_Carrito(2,3,1);
call SP_Insert_Update_Carrito(2,5,3);

call SP_insert_domicilios(1, 'Laura Sanchez', 'Coahuila', 'Torreón', '27050', 'Colinas del Sol', 'Calle del Águila #1415', '8712345683');

call SP_Registrar_usuariosClientes('Jonathan Ivan','Castro','Saenz','4','janathangmail.com','micontraseñasupersegura2','8715079031');

update pedidos set estatus = 'Cancelado' where id_pedido =1;

describe pedidos;

-- Funcionamiento del sistema de reservas para los eventos. -- 668
select * from personas;
select * from clientes;
select * from eventos;
select * from eventos_reservas;

-- Consulta para ver los eventos de pago.
select e.id_evento,
e.nombre as evento,
c.nombre as categoria,
e.fecha_evento,
concat(e.hora_inicio,' - ',e.hora_fin) as horario,
e.capacidad,
e.disponibilidad as boletos,
e.precio_boleto
from eventos e 
join categorias c on e.id_categoria = c.id_categoria
 where e.tipo = 'De pago';
 
select * from vw_comprobante_reserva;

call SP_reserva_evento(
1,  -- Cliente
4, -- Evento
20 -- Cantidad de boletos
);

CALL SP_comprobante_reserva(
    1, -- id_reserva
    'Pago de Reserva', -- concepto
    45.00, -- monto
    'FO123456789', -- folio_operacion
    'BBVA', -- banco_origen
    'comprobante.jpg' -- img_comprobante
);
update eventos_reservas set estatus = 'Cancelada' where id_reserva = 1;

show triggers;