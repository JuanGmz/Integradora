

-- Vista de Administrador Resrvas
drop view view_AdminReservas;
create view view_AdminReservas as
select 
	concat(p.nombres,' ',p.apellido_paterno,' ', p.apellido_materno) as cliente,
    er.id_reserva as folio,
    er.estatus as estatus,
    er.c_boletos AS boletos,
    er.monto_total AS montoTotal,
    er.fecha_hora_reserva as fechaHoraReserva,
    e.nombre as EVENTO,
    e.id_evento,
    e.precio_boleto,
    e.fecha_evento as fechaEvento
from eventos_reservas er
	join clientes c on c.id_cliente = er.id_cliente
	join personas p on p.id_persona = c.id_persona
	join eventos e on e.id_evento = er.id_evento
WHERE e.tipo = 'De Pago';

-- Vista para mostrar la informacion del comprobante de la reserva
CREATE VIEW vw_comprobante_reserva AS
SELECT 
	c.concepto,
    c.referencia,
    c.folio_operacion,
    c.fecha,
    c.monto,
    c.banco_origen,
    c.imagen_comprobante,
    cli.id_cliente
FROM
	comprobantes AS c
JOIN
	comprobantes_reservas AS cr ON c.id_comprobante = cr.id_comprobante
JOIN
	eventos_reservas AS er ON cr.id_reserva = er.id_reserva
JOIN
	clientes AS cli ON er.id_cliente = cli.id_cliente
JOIN 
	personas AS p ON cli.id_persona = p.id_persona
;
-- Vista de Administrador Pedidos
create view view_AdminPedidos as 
select 
	concat(p.nombres, '', p.apellido_paterno,'', p.apellido_materno) as CLIENTE, pd.id_pedido as 'FOLIO PEDIDO'
from pedidos pd
	join clientes c on c.id_cliente = pd.id_cliente
    join personas p on p.id_persona = c.id_persona;

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
