
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

-- Procedimiento para filtrar los productos del menu
DELIMITER //
CREATE PROCEDURE listar_productos_menu(IN categoria INT)
BEGIN
	SELECT     
		pm.id_pm, 
        pm.img_url, 
        pm.nombre, 
        pm.descripcion, 
        c.nombre AS categoria_nombre
	FROM
		productos_menu AS pm
	JOIN
		categorias AS c ON pm.id_categoria = c.id_categoria
	WHERE
		c.id_Categoria = categoria AND c.tipo = 'Menu';
END//
DELIMITER ;

