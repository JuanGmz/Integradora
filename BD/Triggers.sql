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

select * from asistencias where id_cliente = 5;

INSERT INTO recompensas (recompensa, condicion, fecha_inicio, fecha_expiracion, img_url) VALUES
('un pastel', 7, '2024-07-11', '2024-12-12', 'img/descuento_cafe.jpg');

describe pedidos;

call SP_canjear_recompensa(5);

select * from recompensas;

insert into asistencias (id_cliente)
values (5);

call SP_actualizar_periodo_recompensa(6,'2024-02-10','2024-1-12');

select recompensa, asistencias_completadas,canje, periodo 
from view_clientes_recompensas 
where id_cliente = 5;


-- triger complementario para calcular el monto total de una reserva siempre que se haga un insert
drop trigger if exists before_insert_reservas_monto;
delimiter $$
create trigger before_insert_reservas_monto
before insert on eventos_reservas
for each row
begin 
-- calculamos el monto total y lo envia al insert del procedimiento: SP_calcular_monto_boletos
		set new.Monto_total = new.c_boletos*(select precio_boleto from eventos where new.id_evento = eventos.id_evento);
end $$
delimiter ;