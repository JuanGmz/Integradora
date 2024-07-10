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
create trigger adsa
after insert on pedidos
for each row
begin 

describe carrito;
describe detalle_pedidos;

select c.id_bc, c.cantidad, bc.precio,c.monto_total
from carrito c
join bolsas_cafe bc on bc.id_bc = c.id_bc
where c.id_cliente = 1;

select * from detalle_pedidos;

end //
delimiter ;

select * from cliente;

-- Trigger para encripar automaticamente.
DELIMITER //
CREATE TRIGGER before_insert_usuarios
BEFORE INSERT ON usuarios
FOR EACH ROW
BEGIN
    SET NEW.password = MD5(NEW.password);
END; //
DELIMITER ;

-- Trigger para encriptar cuando se actualiza una password.
DELIMITER //
CREATE TRIGGER before_update_usuarios
BEFORE UPDATE ON usuarios
FOR EACH ROW
BEGIN
    IF NEW.password != OLD.password THEN
        SET NEW.password = MD5(NEW.password);
    END IF;
END; //
DELIMITER ;

insert into asistencias (id_cliente)
values (5);

select * from asistencias where id_cliente = 5;

select * from clientes_recompensas cr join recompensas r on r.id_recompensa = cr.id_recompensa  where cr.id_cliente = 5;

INSERT INTO recompensas (recompensa, condicion, fecha_inicio, fecha_expiracion, img_url) VALUES
('un pastel', 7, '2024-07-10', '2024-12-10', 'img/descuento_cafe.jpg');

select * from recompensas where id_recompensa = last_insert_id();

select * from clientes_recompensas cr
 where cr.id_cliente = 5 and cr.estatus = 'Activa';

-- Este sirve
drop trigger actualizar_progreso_asistencias;

-- Trigger para marcar una asistencia a la recompensa correspondiente cada ves que se inserte una nueva 
-- asistencia.
DELIMITER //
CREATE TRIGGER actualizar_progreso_asistencias
AFTER INSERT ON asistencias
FOR EACH ROW
BEGIN
    
 UPDATE clientes_recompensas cr
 JOIN recompensas r ON cr.id_recompensa = r.id_recompensa
 SET cr.progreso = cr.progreso + 1
 WHERE cr.id_cliente = NEW.id_cliente
 AND fecha_hora_aistencia between r.fecha_inicio and r.fecha_expiracion;
      
END //
delimiter ;

select * from asistencias;



