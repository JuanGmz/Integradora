
-- Buscar determinada reserva por folio.
delimiter //
create procedure SP_BuscarAdminReserva(in folioreserva int)
begin 
select er.id_reserva as 'FOLIO RESERVA', er.estatus as ESTATUS, er.fecha_hora_reserva as 'FECHA / HORA RESERVA', e.nombre as EVENTO, e.fecha_evento as 'FECHA EVENTO',

from eventos_reservas er
join clientes c on c.id_cliente =er.id_cliente
join personas p on p.id_persona = c.id_persona
join eventos e on e.id_evento = er.id_evento;
end //
delimiter ;
