
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


-- Funcionamiento del sistema de recompensas
select * from personas;
select * from clientes;
select * from recompensas;
select * from asistencias;
select * from view_clientes_recompensas;

SET SQL_SAFE_UPDATES = 0;

insert into asistencias(id_cliente)
values (1);

call SP_canjear_recompensa(1);

INSERT INTO recompensas (recompensa, condicion, fecha_inicio, fecha_expiracion, img_url) VALUES
('Un frappe gratis', 4, '2024-07-12', '2024-07-16', 'cafebonito.png');

-- Funcionamiento del sistema de Ecommerce
select * from personas;
select * from clientes;
select * from domicilios;
select * from pedidos;
select * from detalle_pedidos;
select * from view_carrito;

call SP_Insert_Update_Carrito(2,2,1);
call SP_Insert_Update_Carrito(2,3,1);
call SP_Insert_Update_Carrito(2,5,3);

call SP_Realizar_Pedido(2,1,1);

call SP_insert_domicilios(1, 'Laura Sanchez', 'Coahuila', 'Torreón', '27050', 'Colinas del Sol', 'Calle del Águila #1415', '8712345683');

call SP_Registrar_usuariosClientes('Jonathan Ivan','Castro','Saenz','4','janathangmail.com','micontraseñasupersegura2','8715079031');

-- Funcionamiento del sistema de reservas para los eventos.
select * from personas;
select * from clientes;
select * from eventos;

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
 
select * from view_comprobante_reserva;

call SP_reserva_evento(
1,  -- Cliente
5, -- Evento
5 -- Cantidad de boletos
);

CALL SP_comprobante_reserva(
    1, -- id_reserva
    'Pago de Reserva', -- concepto
    45.00, -- monto
    'FO123456789', -- folio_operacion
    'BBVA', -- banco_origen
    'comprobante.jpg' -- img_comprobante
);






