
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

-- Procedo almacenado de Menu
delimiter $$
create procedure SP_AdmiMenu (
    in Nombre varchar(50)
)
begin
SELECT 
    dpm.nombre AS Producto, 
    dpm.img AS Imagen,
    dpm.descripcion AS Descripción,
    pm.precio AS Precio, 
    dpm.categoria AS Categoría 
FROM 
    productos_menu AS pm
JOIN 
    detalle_productos_menu AS dpm ON dpm.id_dpm = pm.id_dpm
JOIN 
    categorias AS c ON c.id_categoria = dpm.id_categoria

where nombre=dpm.nombre;
end $$
delimiter ;

