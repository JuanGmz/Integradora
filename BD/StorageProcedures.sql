
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
create procedure SP_AdmiMenu (in Nombre varchar(100))
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

-- Procedimiento almacenado para insertar productos en el carrito.
delimiter //
create procedure SP_Insert_Update_Carrito(
in p_id_cliente int,
in p_id_bc int,
in p_cantidad int
)
begin 
declare existe_bolsa int;

select c.id_bc into existe_bolsa
from carrito c 
where c.id_cliente = p_id_cliente  and c.id_bc = p_id_bc;

if existe_bolsa > 0 then 
	update carrito c set c.cantidad = c.cantidad + p_cantidad, monto_total = (select ((cantidad+p_cantidad)*bc.precio) from bolsas_cafe bc join carrito c on c.id_bc = bc.id_bc  where bc.id_bc = p_id_bc  and c.id_cliente = p_id_cliente)
	where c.id_cliente = p_id_cliente and c.id_bc = p_id_bc;
else 
	insert into carrito(id_cliente, id_bc, cantidad, monto_total)
	values (p_id_cliente,p_id_bc,p_cantidad, p_cantidad * (select precio from bolsas_cafe bc where bc.id_bc = p_id_bc) );
end if;

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



