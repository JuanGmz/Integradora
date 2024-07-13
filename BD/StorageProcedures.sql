
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

-- Prueba del procedimiento para realizar reservas de eventos.
call SP_reserva_evento(1, 5, 5);

CALL SP_comprobante_reserva(
    1, -- id_reserva
    'Pago de Reserva', -- concepto
    45.00, -- monto
    'FO123456789', -- folio_operacion
    'BBVA', -- banco_origen
    'comprobante.jpg' -- img_comprobante
);

select * from eventos_reservas;
select * from eve
update eventos_reservas set estatus = 'Cancelada' where id_reserva =1;
update eventos_reservas set estatus = 'Apartada' where id_reserva =1;

select * from eventos_reservas;
describe eventos_reservas;
select * from eventos where tipo = 'De Pago';

select * from personas;

-- Prueba del procedimiento almacenado registrar usuarios(clientes).
call SP_Registrar_usuariosClientes('Noe Abel','Vargas','Lopez','noe134','noe@gmail.com','micontraseñasupersegura','8715083731');

call listar_productos_menu('around the world');

delimiter //
create event event_cancelar_reserva
event 



