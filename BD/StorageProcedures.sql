
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
select * from detalle_bc;

-- Prueba del procedimiento almacenado registrar usuarios(clientes).
call SP_Registrar_usuariosClientes('Noe Abel','Vargas','Lopez','noe134','noe@gmail.com','micontraseñasupersegura','8715083731');

select * from personas;
select * from carrito;
call listar_productos_menu('around the world');

call SP_Insert_Update_Carrito(1,2,1);
call SP_Insert_Update_Carrito(1,3,1);
call SP_Insert_Update_Carrito(1,5,1);

call SP_Realizar_Pedido(1,1,1);


delimiter //
CREATE TRIGGER after_insert_añadir_productos_a_detalle_pedido
AFTER INSERT ON pedidos
FOR EACH ROW
BEGIN
    -- Declaración de variables locales
    DECLARE permiso BOOLEAN DEFAULT TRUE;
    DECLARE bolsa INT;
    DECLARE cantidad INT;
    DECLARE monto double;
    DECLARE no_hay_producto BOOLEAN DEFAULT FALSE;

    -- Cursor para leer los productos del carrito asociados al nuevo pedido
    DECLARE leer CURSOR FOR
        SELECT DISTINCT carrito.id_dbc, carrito.cantidad, carrito.monto
        FROM carrito
        JOIN pedidos ON new.id_cliente = carrito.id_cliente;

    -- Cursor para la comprobacion de stock de los productos en detalle_bc
    DECLARE comprobacion CURSOR FOR
        SELECT DISTINCT carrito.id_dbc, carrito.cantidad, carrito.monto
        FROM carrito
        JOIN pedidos ON new.id_cliente = carrito.id_cliente;

    -- Manejador para cuando no se encuentra ningún producto en el cursor
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET no_hay_producto = TRUE;

    -- Verificar el estado del pedido
    IF new.estatus = 'Pendiente' THEN
        -- Comprobar si hay suficiente stock para todos los productos del carrito
        OPEN comprobacion;
        comprobar_bucle: LOOP
            FETCH comprobacion INTO bolsa, cantidad, monto;
            IF no_hay_producto THEN
                LEAVE comprobar_bucle;
            END IF;

            -- Verificar el stock disponible
            IF (SELECT stock FROM detalle_bc WHERE detalle_bc.id_dbc = bolsa) < cantidad THEN
                SET permiso = FALSE;
                SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'No hay suficiente stock para realizar el pedido.';
            END IF;
        END LOOP;
        CLOSE comprobacion;

        -- Resetear la variable de control
        SET no_hay_producto = FALSE;

        -- Abrir el cursor para procesar los productos del carrito
        OPEN leer;
        leer_bucle: LOOP
            FETCH leer INTO bolsa, cantidad, monto;
            IF no_hay_producto THEN
                LEAVE leer_bucle;
            END IF;

            -- Si hay permiso para continuar, insertar en detalle_pedidos y actualizar stock
            IF permiso THEN
                INSERT INTO detalle_pedidos (id_dbc, cantidad,monto, id_pedido, precio_unitario)
                VALUES (bolsa, cantidad, monto,new.id_pedido, (SELECT detalle_bc.precio FROM detalle_bc WHERE detalle_bc.id_dbc = bolsa));

                UPDATE detalle_bc
                SET stock = stock - cantidad
                WHERE id_dbc = bolsa;

            ELSE
                -- Si no hay permiso, enviar un mensaje de error
                SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Hubo un error y se canceló el pedido, pero se registraron los productos.';
            END IF;
        END LOOP;
        CLOSE leer;
    END IF;  -- Fin de la condición de estado del pedido
END //
DELIMITER ;

