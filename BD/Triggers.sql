-- TRIGGERS 
DELIMITER $$

CREATE TRIGGER Before_Carrito
BEFORE INSERT ON carrito
FOR EACH ROW
BEGIN
  DECLARE stock_disponible INT;

  -- Obtener el stock disponible del producto
  SELECT stock INTO stock_disponible FROM bolsas_cafe WHERE id_bc = NEW.id_bc;

  -- Verificar si hay suficiente stock
  IF NEW.cantidad > stock_disponible THEN
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'No hay stock';
  END IF;
END$$

DELIMITER ;

-- actualizar stock
DELIMITER $$

CREATE TRIGGER after_detalle_pedidos
AFTER INSERT ON detalle_pedidos
FOR EACH ROW
BEGIN
  -- Paso 3: Actualizar el stock de la bolsa de café
  UPDATE bolsas_cafe
  SET stock = stock - NEW.cantidad
  WHERE id_bc = NEW.id_bc;
END$$

DELIMITER ;

delimiter //
create procedure sp_validacion_cantidad_carrito(
in p_id_cliente int,
in p_id_bc int,
in p_cantidad int
)
begin 
declare existe_bolsa int;

select c.id_bc into existe_bolsa
from carrito c where c.id_cliente = p_id_cliente  and c.id_bc = p_id_bc;

if existe_bolsa > 0 then 
	update carrito c set c.cantidad = c.cantidad + p_cantidad, monto_total = (cantidad + p_cantidad) * (select precio from bolsas_cafe bc where bc.id_bc = p_id_bc )
	where c.id_cliente = p_id_cliente and c.id_bc = p_id_bc;
else 
	insert into carrito(id_cliente, id_bc, cantidad, monto_total)
	values (p_id_cliente,p_id_bc,p_cantidad, p_cantidad * (select precio from bolsas_cafe bc where bc.id_bc = p_id_bc) );
end if;

end //
delimiter ;

call sp_validacion_cantidad_carrito(1, 1, 1);


select * from carrito c where c.id_cliente = 1;
