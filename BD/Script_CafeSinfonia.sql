drop database if exists cafe_sinfonia;


-- Usuarios de la base de datos--
/*
-- Administrador | ALL PRIVILEGES, GRANT OPTION, SUPER |
create user administrador@localhost identified by 'admin';
grant all privileges on cafe_sinfonia.* to administrador@localhost;
grant grant option on cafe_sinfonia.* to administrador@localhost;
grant reload on *.* to administrador@localhost;
GRANT SUPER ON *.* TO 'administrador'@'localhost';
flush privileges;
--
show grants for administrador@localhost;

-- Auxiliar | SELECT, INSERT, UPDATE , DELETE
create user auxiliar@localhost identified by 'aux';
GRANT SELECT, INSERT, UPDATE,execute,create view ON cafe_sinfonia.* TO 'auxiliar'@'localhost';
--
drop user auxiliar@localhost;
show grants for auxiliar@localhost;
*/
create database cafe_sinfonia;

use cafe_sinfonia;

-- Otros
create table CATEGORIAS(
id_categoria int auto_increment not null,
nombre nvarchar(100) not null,
descripcion nvarchar(150),
tipo enum('Menu','Evento') not null,
img_url nvarchar(255),
primary key(id_categoria)
);

create table publicaciones(
id_publicacion int auto_increment not null,
titulo nvarchar(100) not null,
descripcion nvarchar(500),
fecha datetime default current_timestamp,
img_url nvarchar(100),
tipo enum('Difusion','Blog') not null,
primary key(id_publicacion) 
);

-- Usuarios
create table usuarios(
id_usuario int auto_increment not null,
primary key(id_usuario)
);

create table roles(
id_rol int auto_increment not null,
rol nvarchar(150),
descripcion nvarchar(200),
primary key(id_rol)
);

create table roles_usuarios(
id_ru int auto_increment not null,
id_usuario int not null,
id_rol int not null,
primary key(id_ru),
foreign key (id_rol) references roles(id_rol),
foreign key (id_usuario) references usuarios(id_usuario)
);

create table personas(
    id_persona int auto_increment not null,
    id_usuario int not null,
    usuario nvarchar (100) not null,
    correo nvarchar(100) not null,
    contrasena varbinary(255)not null,
	telefono nchar(10) not null,
    nombres nvarchar(150) not null,
    apellido_paterno nvarchar(100) not null,
    apellido_materno nvarchar(100) not null,
    primary key(id_persona),
    unique(usuario),
    foreign key (id_usuario) references usuarios(id_usuario)
);

create table clientes(
    id_cliente int auto_increment not null,
    id_persona int not null,
    primary key(id_cliente),
    foreign key (id_persona) references personas(id_persona)
);

create table empleados(
    id_empleado int auto_increment not null,
    id_persona int not null,
    primary key(id_empleado),
    foreign key (id_persona) references personas(id_persona)
);

create table proveedores(
    id_proveedor int auto_increment not null,
    id_persona int not null,
    primary key(id_proveedor),
    foreign key (id_persona) references personas(id_persona)
);

-- Ecommerce
create table domicilios(
id_domicilio int auto_increment not null,
id_cliente int not null,
referencia nvarchar(200) not null,
estado nvarchar(100) not null,
ciudad nvarchar(100) not null,
codigo_postal nvarchar(10) not null,
colonia nvarchar(150) not null,
calle nvarchar(200) not null,
telefono nchar(10) not null,
primary key(id_domicilio),
foreign key (id_cliente) references clientes(id_cliente)
);

create table metodos_pago (
id_mp int auto_increment not null,
metodo_pago varchar(100) not null,
primary key(id_mp),
unique(metodo_pago)
);

create table pedidos(
id_pedido int auto_increment not null,
id_cliente int not null,
id_domicilio int not null,
id_mp int not null,
estatus enum('Pendiente','Finalizado','Cancelado') default 'Pendiente' not null,
fecha_hora_pedido datetime default current_timestamp,
monto_total double,
envio nvarchar(150),
costo_envio double,
guia_de_envio nvarchar(200),
documento_url nvarchar(255),
primary key(id_pedido),
foreign key (id_mp) references metodos_pago(id_mp),
foreign key (id_cliente) references clientes(id_cliente),
foreign key (id_domicilio) references domicilios(id_domicilio)
);

-- Evento para cancelar pedidos no pagados dentro del tiempo establecido.
delimiter //
CREATE EVENT cancelar_pedidos_no_pagados
ON SCHEDULE EVERY 1 hour
DO
BEGIN
    UPDATE pedidos
    SET estatus = 'Cancelado'
    WHERE estatus = 'Pendiente'
      AND fecha_hora_pedido < DATE_SUB(NOW(), INTERVAL 48 hour);
END //
delimiter ;

create table bolsas_cafe (
id_bolsa int auto_increment not null,
nombre nvarchar(100) not null,
años_cosecha nvarchar(100) not null,
productor_finca nvarchar(150) not null,
proceso nvarchar(100) not null,
variedad nvarchar(200) not null,
altura nvarchar(100) not null,
aroma nvarchar(150) not null,
acidez nvarchar(150) not null,
sabor nvarchar(150) not null,
cuerpo nvarchar(100) not null,
puntaje_catacion double not null,
img_url nvarchar(255)not null,
primary key(id_bolsa)
);

create table detalle_bc(
id_dbc int auto_increment not null,
id_bolsa int not null,
medida ENUM('1/4 Kg','1/2 Kg','1 Kg'),
precio double not null,
stock int not null,
primary key(id_dbc),
foreign key(id_bolsa) references bolsas_cafe(id_bolsa)
);
-- Trigger para actualizar el stock.
create table carrito(
id_carrito int auto_increment not null,
id_cliente int not null,
id_dbc int not null,
cantidad int not null, -- Actualizar cantidad si se agrega un producto ya existente en el carrito, y no agregar el mismo producto.
monto double, -- Trigger para actualizar el monto total, y otro o en el mismo trigger que se actualize el monto si se actualiza el precio del producto.
primary key(id_carrito),
unique(id_cliente, id_dbc),
foreign key (id_dbc) references detalle_bc(id_dbc),
foreign key(id_cliente) references clientes(id_cliente)
);

create table detalle_pedidos (
id_dp int auto_increment not null,
id_pedido int not null,
id_dbc int not null,
precio_unitario double not null,
cantidad int not null,
monto double not null,
primary key(id_dp),
foreign key (id_pedido) references pedidos(id_pedido),
foreign key (id_dbc) references detalle_bc(id_dbc)
);
-- Eventos

create table ubicacion_lugares(
id_lugar INT AUTO_INCREMENT PRIMARY KEY,
nombre NVARCHAR(100) NOT NULL,
ciudad NVARCHAR(100) NOT NULL,
estado NVARCHAR(100) NOT NULL,
codigo_postal NVARCHAR(10),
calle nvarchar(100), 
colonia nvarchar(100),
descripcion NVARCHAR(255)
);

create table EVENTOS(
id_evento int auto_increment not null,
id_lugar int not null,
id_categoria int not null,
nombre nvarchar(100) not null,
tipo enum('Gratuito','De Pago') not null,
descripcion nvarchar(200) not null,
fecha_evento date not null,
hora_inicio time not null,      
hora_fin time not null,
capacidad int not null,
precio_boleto double not null, 
disponibilidad int,
img_url nvarchar(255)not null,
fecha_publicacion date not null,
primary key(id_evento),
foreign key (id_lugar) references ubicacion_lugares(id_lugar),
foreign key (id_categoria) references categorias(id_categoria)
);

create table eventos_reservas(
id_reserva int auto_increment not null,
id_cliente int not null, 
id_evento int not null, 
c_boletos int not null,
monto_total double,
fecha_hora_reserva datetime default current_timestamp,
estatus enum('Pendiente','Cancelada','Apartada') default 'Pendiente', -- Puede ser pendiente, y esas cosas.
id_mp int not null,
primary key(id_reserva),
foreign key (id_cliente) references metodos_pago (id_mp),
foreign key (id_cliente) references clientes(id_cliente),
foreign key (id_evento) references EVENTOS(id_evento)
);

-- Evento para cancelar la reserva si no se paga dentro de 48 horas.
delimiter //
CREATE EVENT cancelar_reservas_no_pagadas
ON SCHEDULE EVERY 1 hour
DO
BEGIN
    UPDATE eventos_reservas
    SET estatus = 'Cancelada'
    WHERE estatus = 'Pendiente'
      AND fecha_hora_reserva < DATE_SUB(NOW(), INTERVAL 48 hour);
END //
delimiter ;

-- Trigger para validar la disponibilidad de boletos al realizar una reserva
delimiter //
create trigger before_insert_reservas
before insert on eventos_reservas
for each row
begin 
    declare v_disponibilidad int;
    -- Seleccionar disponibilidad de la tabla eventos
    select disponibilidad 
    into v_disponibilidad
    from eventos e
    where e.id_evento = new.id_evento;
    -- Verificar si hay suficientes boletos
    if v_disponibilidad < new.c_boletos then 
        signal sqlstate '45000' set message_text = 'No hay suficientes boletos.';
    else 
        -- Actualizar la disponibilidad de la tabla eventos
        update eventos 
        set disponibilidad = disponibilidad - new.c_boletos 
        where id_evento = new.id_evento;
    end if;
end //
delimiter ;

-- Cuando el se cancele el pedido/reserva devolver cantidad.
delimiter //
create trigger before_update_reservas
before update on eventos_reservas
for each row
begin 
    if old.estatus = 'Pendiente' and new.estatus = 'Cancelada' then
        -- Restaurar la disponibilidad de boletos cuando una reserva se cancela
        update eventos 
        set disponibilidad = disponibilidad + old.c_boletos 
        where id_evento = old.id_evento;
    end if;
end //
delimiter ;

CREATE TABLE comprobantes (
    id_comprobante INT AUTO_INCREMENT,
    id_reserva int not null,
    concepto VARCHAR(255),
    folio_operacion VARCHAR(255),
    fecha DATE,
    monto double,
    banco_origen VARCHAR(255),
    imagen_comprobante varchar(255),
    primary key(id_comprobante),
    unique(id_reserva),
    foreign key (id_reserva) references eventos_reservas(id_reserva)
);

-- Trigger para calcular el monto_total de la reserva.
DELIMITER //
CREATE TRIGGER calcular_monto_total_eventos_reservas
BEFORE INSERT ON eventos_reservas
FOR EACH ROW
BEGIN
    DECLARE precio DOUBLE;
    
    -- Obtener el precio del boleto del evento
    SELECT precio_boleto INTO precio 
    FROM EVENTOS 
    WHERE id_evento = NEW.id_evento;
    
    -- Calcular el monto total
    SET NEW.monto_total = NEW.c_boletos * precio;
END //
DELIMITER ;

-- Productos del Menu 
create table productos_menu(
id_pm int auto_increment not null,
id_categoria int not null, 
nombre nvarchar(150) not null,
descripcion nvarchar (300) not null,
img_url nvarchar(255)not null,
primary key(id_pm),
foreign key (id_categoria) references CATEGORIAS(id_categoria)
);

create table detalle_productos_menu(
id_dpm int auto_increment not null,
id_pm int not null,
medida nvarchar(100),
precio double not null,
primary key(id_dpm),
foreign key (id_pm) references productos_menu(id_pm)
);

-- Sistemma de Recompensas

create table asistencias(
id_asistencia int auto_increment not null,
id_cliente int not null,
fecha_hora_asistencia datetime default current_timestamp,
primary key(id_asistencia),
foreign key (id_cliente) references clientes(id_cliente)
);

CREATE TABLE recompensas(
id_recompensa int auto_increment not null,
recompensa nvarchar(150) not null,
condicion int not null,
fecha_inicio date not null, 
fecha_expiracion date not null,
estatus enum('Activa','Inactiva'),
img_url nvarchar(255) not null,
primary key (id_recompensa)
);

-- Validar el estatus al ingresar una nueva recompensa
delimiter //
create procedure SP_agregar_recompensa(
in p_recompensa nvarchar(150),
in p_condicion int,
in p_fecha_inicio date, 
in p_fecha_expiracion date,
in p_img_url varchar(100)
)
begin
	IF p_fecha_expiracion < p_fecha_inicio or p_condicion < 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Periodo campos invalidos.';
    ELSE
		INSERT INTO recompensas (recompensa, condicion, fecha_inicio, fecha_expiracion, img_url)
		VALUES (p_recompensa, p_condicion, p_fecha_inicio, p_fecha_expiracion, p_img_url);
    END IF;
end // 
delimiter ;

-- Asignar estatus antes de insertar recompensa
delimiter //
create trigger before_insert_recompensas_estatus
before insert on recompensas 
for each row
begin 
		IF curdate() >= new.fecha_inicio and curdate() < new.fecha_expiracion  THEN
			SET NEW.estatus = 'Activa';
		ELSE
			SET NEW.estatus = 'Inactiva';
END IF;
end //
delimiter ;

-- Trigger para pasar lo que tiene en el carrito el cliente a detalle del pedido.
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


-- Trigger para borrar los productos del carrito en cuanto se realize un pedido
delimiter //
create trigger after_insert_borrar_carrito
after insert on pedidos
for each row
begin
SET SQL_SAFE_UPDATES = 0;
delete carrito from carrito 
join pedidos on carrito.id_cliente = pedidos.id_cliente
join detalle_pedidos on pedidos.id_pedido = detalle_pedidos.id_pedido
where carrito.id_cliente = pedidos.id_cliente and new.id_pedido = detalle_pedidos.id_pedido;
    SET SQL_SAFE_UPDATES = 1;
end //
delimiter ;

-- Trigger para restaurar el stock si se cancela.
delimiter //
create trigger after_update_restaurar_stock
after update on pedidos
for each row
begin

declare permiso boolean default true;
declare bolsa int;
    declare cantidad int;
declare no_hay_producto boolean default false;
    
    declare restauracion cursor for
    select distinct dp.id_dbc, dp.cantidad from detalle_pedidos dp join pedidos p on dp.id_pedido = p.id_pedido where dp.id_pedido = old.id_pedido;
    
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET no_hay_producto = TRUE;-- condicion para que el loop siga
    if new.estatus = 'Cancelado' and old.estatus = 'Pendiente' then
open restauracion;
restauracion_bucle: loop
fetch restauracion into bolsa, cantidad;
if no_hay_producto then
leave restauracion_bucle;
end if;  
        
update detalle_bc
set stock = stock + cantidad
where id_dbc = bolsa;
            
end loop;
close restauracion;
end if;
end //
delimiter ; 

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
    AND NEW.fecha_hora_asistencia >= fecha_inicio and NEW.fecha_hora_asistencia < r.fecha_expiracion
    and cr.progreso < r.condicion;
END //
DELIMITER ;

-- Asignar recompensas activas a un nuevo cliente.
delimiter //
create trigger after_insert_cliente 
after insert on clientes 
for each row 
begin
 -- Insertar recompensas activas para el nuevo cliente
    INSERT INTO clientes_recompensas (id_cliente, id_recompensa)
    SELECT new.id_cliente, r.id_recompensa
    FROM recompensas r
    WHERE r.estatus = 'Activa';
end // 
delimiter ;

-- Trigger para asignar recompensas a los clientes al agregar recompensas.
delimiter //
create trigger after_insert_recompensa
after insert on recompensas
for each row
begin
    -- Verificar si la recompensa insertada tiene estatus 'Activa'
    if new.estatus = 'Activa' then
        -- Insertar la nueva recompensa activa para todos los clientes
        insert into clientes_recompensas (id_cliente, id_recompensa)
        select c.id_cliente, new.id_recompensa
        from clientes c;
    end if;
end //
delimiter ;

-- Crear el trigger después de actualizar el estatus de una recompensa asignar recompensa a clientes.
delimiter //
create trigger after_update_recompensa
after update on recompensas
for each row
begin
    -- Verificar si el estatus de la recompensa cambió a 'Activa'
    if new.estatus = 'Activa' and old.estatus != 'Activa' then
        -- Insertar la recompensa activa para todos los clientes
        insert into clientes_recompensas (id_cliente, id_recompensa)
        select c.id_cliente, new.id_recompensa
        from clientes c;
    end if;
end //
delimiter ;

-- Habilitar el "Event Scheduler" a nivel global en el servidor. 
SET GLOBAL event_scheduler = ON;

-- Evento para cambiar el estatus de la recompensa a activa cuando la fecha actual este dentro
--  del rango de la recompensa.
delimiter //
create event actualizar_estatus_recompensas_Activa
on schedule every 1 day
starts TIMESTAMP(CURDATE() + INTERVAL 1 DAY, '00:00:00')
do 
begin 
update recompensas
set estatus = 'Activa'
where curdate() >= fecha_inicio and curdate() < fecha_expiracion and  estatus = 'Inactiva';
end //
delimiter ;

-- Evento para cambiar los estatus de las recompensas a inactiva cuando expiren.
delimiter //
create event actualizar_estatus_recompensas
on schedule every 1 day
starts TIMESTAMP(CURDATE() + INTERVAL 1 DAY, '00:00:00')
do 
begin 
    UPDATE recompensas
    SET estatus = 'Inactiva'
    WHERE fecha_expiracion < CURDATE() AND estatus = 'Activa';
end //
delimiter ;

create table clientes_recompensas(
id_cr int auto_increment not null,
id_cliente int not null,
id_recompensa int not null,
canje boolean default false not null,
progreso int default 0,
primary key(id_cr),
FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente),
FOREIGN KEY (id_recompensa) REFERENCES recompensas(id_recompensa)
);

-- Procedimiento almacenado para canjear recompensa.
DELIMITER //
CREATE PROCEDURE SP_canjear_recompensa(
in p_id_cr int
)
BEGIN
    DECLARE v_canje_existente BOOLEAN default false;
    DECLARE v_progreso int default 0;
    DECLARE v_condicion int default 0;
    
    -- Verificar si el canje ya existe para evitar canjes duplicados
    SELECT cr.canje 
    INTO v_canje_existente
    FROM clientes_recompensas cr
    join recompensas r on r.id_recompensa = cr.id_recompensa
    WHERE cr.id_cr = p_id_cr AND canje = true;
    
    IF v_canje_existente THEN
        -- Informar que la recompensa ya ha sido canjeada.
        SELECT 'La recompensa ya ha sido canjeada previamente.' AS mensaje;
    ELSE 
		-- Obtener el progreso y condicion de la recompensa.
		SELECT r.condicion, cr.progreso 
        INTO v_condicion, v_progreso
		FROM clientes_recompensas cr
		join recompensas r on r.id_recompensa = cr.id_recompensa
		WHERE cr.id_cr = p_id_cr;
        
        if  v_progreso < v_condicion then
        -- Informar que la no se cumple la condicion de la recompensa.
		SELECT 'No cumple con la condicion de la recompensa.' as mensaje;
        
		ELSE
        -- Marcar la recompensa como canjeada
        UPDATE clientes_recompensas
        SET canje = true
        WHERE id_cr = p_id_cr;
        -- Mensaje de éxito
        SELECT 'Recompensa canjeada correctamente.' AS mensaje;
		END IF;
	END IF;
    
END //
DELIMITER ;

-- Procedimiento almacenado para insertar productos en el carrito.
delimiter //
create procedure SP_Insert_Update_Carrito(
in p_id_cliente int,
in p_id_dbc int,
in p_cantidad int
)
begin 
declare existe_bolsa int;

select c.id_dbc into existe_bolsa
from carrito c 
where c.id_cliente = p_id_cliente  and c.id_dbc = p_id_dbc;

if existe_bolsa > 0 then 
    update carrito c set c.cantidad = c.cantidad + p_cantidad, monto = (select ((cantidad+p_cantidad)*dbc.precio) from detalle_bc dbc join carrito c on c.id_dbc = dbc.id_dbc  where dbc.id_dbc = p_id_dbc  and c.id_cliente = p_id_cliente)
    where c.id_cliente = p_id_cliente and c.id_dbc = p_id_dbc;
else 
    insert into carrito(id_cliente, id_dbc, cantidad, monto)
    values (p_id_cliente,p_id_dbc,p_cantidad, p_cantidad * (select precio from detalle_bc dbc where dbc.id_dbc = p_id_dbc) );
end if;

end //
delimiter ;

-- Procedimiento almacenado para realizar pedido.
delimiter //
CREATE PROCEDURE SP_Realizar_Pedido(
    IN p_id_cliente INT,
    IN p_id_domicilio INT,
    IN p_id_mp INT
)
BEGIN 
    DECLARE v_monto_total double;
    DECLARE v_count INT;

    -- Verifica si el carrito tiene artículos para el cliente especificado
    SELECT COUNT(*) INTO v_count FROM carrito WHERE id_cliente = p_id_cliente;
    
    IF v_count > 0 THEN
        -- Calcula el monto total del carrito
        SELECT SUM(monto) INTO v_monto_total FROM carrito WHERE id_cliente = p_id_cliente;
        
        -- Inserta el pedido en la tabla pedidos
        INSERT INTO pedidos(id_cliente, id_domicilio, id_mp, monto_total)
        VALUES (p_id_cliente, p_id_domicilio, p_id_mp, v_monto_total);
        
        Select 'Pedido realizado.' as mensaje;
    ELSE
        -- Lanza un error si el carrito está vacío
       Select 'El carrito esta vacio.' as mensaje;
    END IF;
END //
DELIMITER ;

-- Procedimiento almacenado para registrar usuarios(clientes).
delimiter //
create procedure SP_Registrar_usuariosClientes(
    in p_nombres nvarchar(150),
    in p_apellido_paterno nvarchar(100),
    in p_apellido_materno nvarchar(100),
	in p_usuario nvarchar (100),
	in p_correo nvarchar(100),
	in p_contrasena varbinary(150),
	in p_telefono nchar(10)
)
begin 
-- Se declaran variables para guardar el id del usuario y la persona. 
declare v_usuario int;
declare v_persona int;

-- Se inserta el usuario.
insert into usuarios (id_usuario) values (default); 

-- Obtenemos el ultimo id autoincrementado y se guarda en la variable.
select last_insert_id() into v_usuario;

-- Se le asigna un rol a ese usuario.
insert into roles_usuarios(id_usuario, id_rol)
values(v_usuario, 2);

-- Se inserta en la tabla personas con los parametros recibidos por el sp y la variable v_usuario.
insert into personas(id_usuario,usuario, correo, contrasena, telefono, nombres, apellido_paterno, apellido_materno)
values (v_usuario,p_usuario, p_correo,p_contrasena,p_telefono, p_nombres, p_apellido_paterno, p_apellido_materno);

-- Obtenemos el ultimo id autoincrementado y lo guardamos en la variable.
select last_insert_id() into v_persona;

-- Insertamos en la tabla clientes dandole el valor de la variable de que guarda la persona.
insert into clientes(id_persona)
values(v_persona);

end //
delimiter ; 

-- Procedimiento almacenado para realizar reservas de eventos (pago)
delimiter //
create procedure SP_reserva_evento(
in p_id_cliente int, 
in p_id_evento int, 
in p_c_boletos int
)
begin 

-- Insertamos la reserva del cliente para el evento junto con la cantidad de boletos.
insert into eventos_reservas(id_cliente, id_evento, c_boletos)
VALUES (p_id_cliente, p_id_evento, p_c_boletos);

end //
delimiter ;

-- Procedimiento almacenado para insertar domicilios.
delimiter //
create procedure SP_insert_domicilios(
in p_id_cliente int, 
in p_referencia varchar(200), 
in p_estado varchar(100), 
in p_ciudad varchar(100), 
in p_codigo_postal varchar(100), 
in p_colonia varchar(150), 
in p_calle varchar(200),
in p_telefono char(10)
)
begin 
INSERT INTO domicilios(id_cliente, referencia, estado, ciudad, codigo_postal, colonia, calle, telefono)
VALUES
(p_id_cliente,p_referencia, p_estado, p_estado, p_codigo_postal, p_colonia, p_calle, p_telefono);
end //
delimiter ;

-- Procedimiento almacenado para filtrar por evento.
DELIMITER //
CREATE PROCEDURE filtrar_reservas(IN idevento INT)
BEGIN
    SELECT
        er.id_reserva,
        er.c_boletos,
        er.monto_total,
        er.fecha_hora_reserva,
        er.estatus,
        e.nombre AS evento,
        CONCAT_WS(' ', p.nombres, p.apellido_paterno, p.apellido_materno) AS Cliente
    FROM
        eventos AS e
    JOIN
        eventos_reservas AS er ON e.id_evento = er.id_evento
    JOIN
        clientes AS c ON er.id_cliente = c.id_cliente
    JOIN
        personas AS p ON c.id_persona = p.id_persona
    WHERE
        e.id_evento = idevento;
END //
DELIMITER ;


-- Procedimiento Almacenado para subir comprobantes de pedidos.
delimiter //
create procedure SP_comprobante_reserva(
    -- id de la reserva
    in p_reserva int,
    -- datos del comprobante
    in p_concepto varchar(255),
    in p_monto double,
    in p_folio_operacion varchar(255),
    in p_banco_origen varchar(255),
    in p_img_comprobante varchar(255)
)
begin
    -- Subir comprobante de la reserva.
    insert into comprobantes(id_reserva,concepto, folio_operacion, monto, banco_origen, imagen_comprobante)
    values(p_reserva,p_concepto, p_folio_operacion, p_monto, p_banco_origen, p_img_comprobante);
end //
delimiter ;

-- Procedimiento almacenado para filtrar los productos del menu por categoria
DELIMITER //
CREATE PROCEDURE listar_productos_menu(IN categoria VARCHAR(60))
BEGIN
	SELECT
		pm.id_pm,
		pm.nombre,
        pm.descripcion,
        pm.img_url
	FROM
		productos_menu AS pm
	JOIN
		categorias AS c ON pm.id_categoria = c.id_categoria
	WHERE
		c.nombre = categoria
	ORDER BY 
		pm.nombre ASC;
END//
DELIMITER ;

-- Vistas 

-- Vista para recompensas que se mostraran en el apartado correspondiente(recompensas) segun el cliente que este iniciado sesion.
create view view_clientes_recompensas as 
select cr.id_cr as canje_id,
id_cliente,
 r.recompensa,
 concat(cr.progreso,' | ', r.condicion) as asistencias_completadas,
 cr.canje,
CONCAT(DATE_FORMAT(r.fecha_inicio, '%d/%m/%Y'), ' - ', DATE_FORMAT(r.fecha_expiracion, '%d/%m/%Y')) AS periodo
from clientes_recompensas cr
join recompensas r on r.id_recompensa = cr.id_recompensa 
where r.estatus = 'Activa';

-- Vista de los comprobantes de las reservas.
create view view_comprobante_reserva as
select er.id_reserva as folio_reserva, c.concepto, c.monto, c.folio_operacion, c.banco_origen, c.imagen_comprobante
from comprobantes c
	join eventos_reservas er on er.id_reserva = c.id_reserva;
    
-- Vista del carrito
create view view_carrito as
select c.id_cliente as cliente,bc.img_url,bc.nombre as producto, dbc.medida, dbc.precio, c.cantidad, c.monto as subtotal 
from carrito c
join detalle_bc dbc on dbc.id_dbc = c.id_dbc
join bolsas_cafe bc on bc.id_bolsa = dbc.id_bolsa;
    
INSERT INTO metodos_pago (metodo_pago) VALUES ('Transferencia');

INSERT INTO publicaciones (titulo, descripcion, img_url, tipo)
VALUES
('¡Bienvenidos a Sinfonía Café y Cultura!', 'Estamos emocionados de abrir nuestras puertas y ofrecerles una experiencia única de café y cultura. ¡Visítanos hoy!', 'img/bienvenidos.jpg', 'Difusion'),
('Tarde de Jazz', 'Acompáñanos este viernes para una tarde de jazz en vivo con artistas locales. ¡No te lo pierdas!', 'img/tarde_de_jazz.jpg', 'Difusion'),
('Nueva Carta de Verano', 'Descubre nuestra nueva carta de verano con bebidas refrescantes y deliciosas. ¡Ven a probarlas!', 'img/carta_verano.jpg', 'Difusion'),
('Taller de Cata de Café', 'Aprende a distinguir los sabores y aromas del café en nuestro próximo taller de cata. ¡Inscríbete ya!', 'img/taller_cata.jpg', 'Blog'),
('Concierto Acústico', 'Disfruta de una noche de música acústica con artistas emergentes este sábado. ¡Te esperamos!', 'img/concierto_acustico.jpg', 'Difusion'),
('Exposición de Arte', 'Ven a admirar las obras de artistas locales en nuestra exposición de arte. ¡Entrada libre!', 'img/expo_arte.jpg', 'Difusion'),
('Café del Mes', 'Este mes presentamos nuestro café de origen etíope. ¡Ven a degustarlo!', 'img/cafe_mes.jpg', 'Blog'),
('Noche de Poesía', 'Acompáñanos para una noche de poesía y micrófono abierto. ¡Comparte tus versos con nosotros!', 'img/noche_poesia.jpg', 'Difusion'),
('Clases de Barismo', 'Inscríbete en nuestras clases de barismo y aprende a preparar el café perfecto.', 'img/clases_barismo.jpg', 'Blog'),
('Feria de Libros', 'No te pierdas nuestra feria de libros con grandes descuentos y actividades para toda la familia.', 'img/feria_libros.jpg', 'Difusion');

INSERT INTO roles (rol, descripcion) VALUES 
('empleado', 'Empleado del café sinfonía'),
('cliente', 'Cliente del café sinfonía'),
('proveedor', 'Proveedor del café sinfonía');

-- Insertar registros en la tabla categorias.
	INSERT INTO CATEGORIAS (nombre, descripcion, tipo) VALUES
('Conciertos', 'Categoría para eventos musicales', 'Evento'),-- 1
('Teatro', 'Categoría para representaciones teatrales', 'Evento'), 
('Podcast en vivo', 'Categoría para conferencias y charlas', 'Evento'),
('Talleres', 'Categoría para talleres y cursos', 'Evento'),
('Ferias', 'Categoría para ferias comerciales y de productos', 'Evento'),-- 5
('Festivales', 'Categoría para festivales culturales y musicales', 'Evento'), 
('Seminarios', 'Categoría para seminarios educativos', 'Evento'),
('Cine', 'Categoría para proyecciones de películas', 'Evento'),
('Clasicos', 'Categoría para el menú de cafés clásicos durante todo tipo de horarios', 'Menu'),
('Los métodos de Jazz Band', 'Categoría para el menú de métodos de preparación de café con alma de jazz durante todo tipo de horarios', 'Menu'),-- 10
('Metal Coffee', 'Categoría para el menú de cafés con influencias de la música metal', 'Menu'), 
('Cool and Dark', 'Categoría para el menú de cafés oscuros y refrescantes', 'Menu'),
('Cold Brew', 'Categoría para el menú de cafés fríos y refrescantes', 'Menu'),
('Around The World', 'Categoría para el menú de cafés de diversas partes del mundo', 'Menu'),
('Sodas Italianas', 'Categoría para el menú de refrescos italianos', 'Menu'), -- 15
('Frappes', 'Categoría para el menú de bebidas frappé', 'Menu'),  
('Té y Tisanas', 'Categoría para el menú de tés y tisanas', 'Menu'),
('Sweet Blues', 'Categoría para el menú de cafés dulces con un toque de blues', 'Menu');

-- Insertar productos_menu
INSERT INTO productos_menu (id_categoria, nombre, descripcion, img_url) VALUES
(9, 'Espresso', 'Café concentrado en una pequeña taza, ideal para los amantes del café fuerte.', 'img/espresso.jpg'),
(9, 'Cortado', 'Café expreso con un toque de leche caliente.', 'img/cortado.jpg'),
(9, 'Macchiato', 'Café expreso con un toque de espuma de leche.', 'img/macchiato.jpg'),
(9, 'Espresso Americano', 'Café negro diluido con agua caliente.', 'img/americano.jpg'),
(9, 'Cappuccino', 'Café expreso con leche espumada, ideal para la mañana.', 'img/cappuccino.jpg'),
(9, 'Mochaccino', 'Café expreso con leche, espuma y un toque de chocolate.', 'img/mochaccino.jpg'),
(9, 'Latte', 'Café con leche y un toque de espuma.', 'img/latte.jpg'),
(9, 'Mocha Latte', 'Latte con un toque de chocolate.', 'img/mocha_latte.jpg'),
(9, 'Caramel Latte', 'Latte con un toque de caramelo.', 'img/caramel_latte.jpg'),
(9, 'Dirty Chai Latte', 'Latte con chai y un shot de expreso.', 'img/dirty_chai_latte.jpg'),   -- 10
(10, 'V60/Dripper', 'Método de goteo para preparar café.', 'img/v60_dripper.jpg'),
(10, 'Aeropress', 'Método de preparación de café por presión.', 'img/aeropress.jpg'),
(10, 'Clever', 'Método de preparación de café por inmersión y goteo.', 'img/clever.jpg'),
(10, 'Prensa Francesa', 'Método de preparación de café por inmersión.', 'img/prensa_francesa.jpg'),
(10, 'Chemex', 'Método de goteo para preparar café con filtro especial.', 'img/chemex.jpg'),
(10, 'Vandola', 'Método tradicional costarricense para preparar café.', 'img/vandola.jpg'),
(10, 'Sifón Japonés', 'Método de preparación de café con vacío y presión.', 'img/sifon_japones.jpg'),
(12, 'SHAKERATTO', 'Bebida fría a base de espresso.', 'url_to_shakeratto_image'),
(12, 'ICED LATTE', 'Bebida fría a base de espresso.', 'url_to_iced_latte_image'),
(12, 'ESPRESSO TONIC', 'Bebida fría a base de espresso.', 'url_to_espresso_tonic_image'),     -- 20
(12, 'ESPRESSO HONIC', 'Bebida fría a base de espresso.', 'url_to_espresso_honic_image'),
(13, 'Cold B. EN LAS ROCAS', 'Cold Brew es una infusión de café en frío de 12 a 15 horas.', 'url_to_cold_b_en_las_rocas_image'),
(13, 'Cold B. LATTE', 'Cold Brew es una infusión de café en frío de 12 a 15 horas.', 'url_to_cold_b_latte_image'),
(13, 'Cold B. MINERAL', 'Cold Brew es una infusión de café en frío de 12 a 15 horas.', 'url_to_cold_b_mineral_image'),
(13, 'Cold B. TONIC', 'Cold Brew es una infusión de café en frío de 12 a 15 horas.', 'url_to_cold_b_tonic_image'),
(14, 'Affogato', 'Una bola de nieve de vainilla servida en vaso y bañado en Espresso doble. Puedes comerlo a cucharadas o esperar a que se derrita para tomarlo. Dato curioso: Affogato significa “Ahogado” en Italiano.', 'url_to_affogato_image'),
(14, 'Marocchino', 'Espresso sencillo servido sobre chocolate, leche cremada y top de cocoa.', 'url_to_marocchino_image'),
(14, 'Café Bombón', 'Espresso sencillo servido sobre leche condensada. Puedes pedirlo como “Bombón del tiempo” para que sea servido en frío!', 'url_to_cafe_bombon_image'),
(14, 'Café con Miel', 'Espresso sencillo con miel disuelta y leche cremada.', 'url_to_cafe_con_miel_image'),
(14, 'Café Au Lait', 'Sencillamente un americano preparado en V60 al que añadimos leche cremada al final.
 Dato curioso: Literalmente significa “café con leche” en francés.', 'url_to_cafe_au_lait_image'),    -- 30
(14, 'Café de Olla', 'Porque no podía falta, nuestra tradicional forma de tomar café con un toque de especialidad. Café preparado en prensa francesa al que se le añade una infusión de piloncillo, canela y otras especias. Servida en taza de barro.', 'url_to_cafe_de_olla_image'),
(14, 'Café Americano', 'Café americano preparado con granos de café 100% arábica.', 'https://en.wikipedia.org/wiki/Caff%C3%A8_americano'),
  (14, 'Yuanyang (China)', 'Mezcla de té negro y café americano, endulzado con leche condensada.', 'https://i.imgur.com/vY2k17Y.png'),
  (14, 'Café Raf (Rusia)', 'Mezcla de espresso doble con piloncillo disuelto y leche, cremado todo junto.', 'https://i.imgur.com/vY2k17Y.png'),
  (14, 'Flat White (Australia/Nueva Zelanda)', 'Preparado con Ristretto doble y leche cremada muy ligeramente.', 'https://i.imgur.com/vY2k17Y.png'),
  (14, 'Cà Phê Sữa Nóng (Vietnam)', 'Café preparado en cafetera vietnamita "Phin", extracción intensa endulzada con leche condensada.', 'https://i.imgur.com/vY2k17Y.png'),
  (14, 'Cà Phê Sữa Dá (Vietnam)', 'Versión fría de la preparación en cafetera Vietnamita "Phin".', 'https://i.imgur.com/vY2k17Y.png'),
  (14, 'Mazagrán (Argelia)', 'Café americano preparado en clever, con jugo de limón y endulzado con azúcar morena.', 'https://i.imgur.com/vY2k17Y.png'),
   (15, 'MORA AZUL', 'Soda italiana sabor mora azul', 'https://el-1000-amores.postershop.me/product/66'),
  (15, 'MANZANA VERDE', 'Soda italiana sabor manzana verde', 'https://garden-bistro.postershop.me/product/188'),
  (15, 'ZARZAMORA', 'Soda italiana sabor zarzamora', 'https://imgur.com/gallery/kazuichi-soda-VwIgFpr'),
  (15, 'FRAMBUESA', 'Soda italiana sabor frambuesa', 'https://www.facebook.com/burbanosfood/videos/soda-italiana-frambuesa-lim%C3%B3n-has-tus-combinaciones-cafemachinemx/913383609405503/'),
   (15, 'Natural', 'Frappé clásico con leche, café y hielo', 'https://imgur.com/t/cursed_food'),
  (15, 'Cajeta', 'Frappé con sabor a cajeta, leche, café y hielo', 'https://imgur.com/t/cafe'),
  (15, 'Mocha', 'Frappé con sabor a chocolate y café, leche y hielo', 'https://imgur.com/gallery/orange-mocha-frappuccino-FaxcYZv'),
  (15, 'Nutella', 'Frappé con sabor a Nutella, leche, café y hielo', 'https://imgur.com/t/waffles/g0kIx'),
  (15, 'Oreo', 'Frappé con galletas Oreo, leche, café y hielo', 'https://imgur.com/t/oreo'),
  (15, 'Dirty Chai', 'Frappé con té Chai, leche y hielo', 'https://justcookkai.com/2020/03/dirty-chai-frappe/'),
  (15, 'Muddy Matcha', 'Frappé con matcha, leche y hielo', 'https://imgur.com/t/buff'),
  (15, 'Matcha', 'Frappé con matcha y leche', 'https://imgur.com/gallery/ginger-irish-beard-CpT1Poc'),
  (15, 'Chai', 'Frappé con té Chai y leche', 'https://imgur.com/t/chai'),
   (16, 'Natural', 'Frappé clásico con leche, café y hielo', 'https://imgur.com/t/cursed_food'),
  (16, 'Cajeta', 'Frappé con sabor a cajeta, leche, café y hielo', 'https://imgur.com/t/cafe'),
  (16, 'Mocha', 'Frappé con sabor a chocolate y café, leche y hielo', 'https://imgur.com/gallery/orange-mocha-frappuccino-FaxcYZv'),
  (16, 'Nutella', 'Frappé con sabor a Nutella, leche, café y hielo', 'https://imgur.com/t/waffles/g0kIx'),
  (16, 'Oreo', 'Frappé con galletas Oreo, leche, café y hielo', 'https://imgur.com/t/oreo'),
  (16, 'Dirty Chai', 'Frappé con té Chai, leche y hielo', 'https://justcookkai.com/2020/03/dirty-chai-frappe/'),
  (16, 'Muddy Matcha', 'Frappé con matcha, leche y hielo', 'https://imgur.com/t/buff'),
  (16, 'Matcha', 'Frappé con matcha y leche', 'https://imgur.com/gallery/ginger-irish-beard-CpT1Poc'),
  (16, 'Chai', 'Frappé con té Chai y leche', 'https://imgur.com/t/chai'),
  (17, 'Verde Menta', 'Té verde con sabor a menta', 'https://listado.mercadolibre.com.mx/te-de-menta'),
  (17, 'Negra', 'Té negro clásico', 'https://listado.mercadolibre.com.mx/te-negro'),
  (17, 'Earl Grey', 'Té negro con sabor a bergamota', 'https://listado.mercadolibre.com.mx/te-earl-grey'),
  (17, 'Chai Verde', 'Té verde con especias chai', 'https://listado.mercadolibre.com.mx/te-chai'),
  (17, 'Recibes', 'Té verde con jengibre y limón', 'https://www.mercadolibre.com.mx/'),
	(18, 'Flan Napolitano', 'Un delicioso flan tradicional con sabor a napolitano.', 'img_url_1'),
(18, 'Cheesecake Frutos Rojos', 'Cheesecake suave con una mezcla de frutos rojos.', 'img_url_2'),
(18, 'Cheesecake Brownie', 'Cheesecake cremoso con una base de brownie.', 'img_url_3'),
(18, 'Cheesecake Tortuga', 'Cheesecake con nueces y caramelo estilo tortuga.', 'img_url_4'),
(18, 'Brownie', 'Brownie clásico con un intenso sabor a chocolate.', 'img_url_5'),
(18, 'Pan Elote', 'Pan dulce hecho con maíz, perfecto para acompañar el café.', 'img_url_6'),
(18, 'Panque Platano', 'Panque esponjoso con sabor a plátano.', 'img_url_7'),
(18, 'Panque Zanahoria', 'Panque suave con zanahorias y especias.', 'img_url_8'),
(18, 'Panque Moras', 'Panque delicioso con una mezcla de moras frescas.', 'img_url_9'),
(18, 'Pastel Chocolate', 'Pastel de chocolate húmedo y delicioso.', 'img_url_10'),
(18, 'Pastel Chorreado', 'Pastel bañado con una rica salsa de chocolate.', 'img_url_11'),
(18, 'Pastel Red Velvet', 'Pastel de terciopelo rojo con glaseado cremoso.', 'img_url_12'),
(18, 'Rollos de Canela con Glaseado', 'Rollos suaves de canela con glaseado dulce.', 'img_url_13');

-- Insertar detalle de productos del menu
	INSERT INTO detalle_productos_menu (id_pm, medida, precio) VALUES
(1, '1 Oz', 20.00),
(1, '2 Oz', 25.00),
(2, '3 Oz', 30.00),
(2, '4 Oz', 35.00),
(3, '2 Oz', 25.00),
(3, '4 Oz', 30.00),
(4, '12 Oz', 40.00),
(4, '16 Oz', 45.00),
(5, '8 Oz', 40.00),
(6, '8 Oz', 45.00),
(7, '12 Oz', 50.00),
(7, '16 Oz', 55.00),
(8, '12 Oz', 55.00),
(8, '16 Oz', 60.00),
(9, '12 Oz', 55.00),
(9, '16 Oz', 60.00),
(10, '12 Oz', 60.00),
(10, '16 Oz', 65.00),
(11, '12 Oz', 40.00),
(11, '16 Oz', 45.00),
(12, '12 Oz', 40.00),
(13, '12 Oz', 40.00),
(13, '16 Oz', 45.00),
(14, '12 Oz', 40.00),
(14, '16 Oz', 45.00),
(15, '12 Oz', 50.00),
(15, '16 Oz', 55.00),
(16, '12 Oz', 50.00),
(16, '16 Oz', 55.00),
(17, '12 Oz', 50.00),
(17, '16 Oz', 60.00),
(18, '14oz', 40),
(18, '20oz', 50),
(19, '14oz', 50),
(19, '20oz', 60),
(20, '14oz', 50),
(20, '20oz', 60),
(21, '14oz', 50),
(21, '20oz', 60),
(22, '14 Oz', 50),
(22, '20 Oz', 55),
(23, '14 Oz', 50),
(23, '20 Oz', 55),
(24, '14 Oz', 50),
(24, '20 Oz', 55),
(25, '14 Oz', 50),
(25, '20 Oz', 55),
(26, '12 Oz', 55),
(26, '16 Oz', 70),
(27, '6 Oz', 40),
(28, '2 Oz', 30),
(29, '8 Oz', 40),
(30, '12 Oz', 45),
(30, '16 Oz', 50),
(31, '12 Oz', 50),
(31, '16 Oz', 60),
(32, '12 Oz', 55.00),
  (32, '16 Oz', 60.00),
  (33, '12 Oz', 55.00),
  (33, '16 Oz', 60.00),
  (34, '6 Oz', 40.00),
  (34, '8 Oz', 45.00),
  (35, '8 Oz', 45.00),
  (36, '14 Oz', 50.00),
  (36, '20 Oz', 60.00),
  (37, '14oz', 50.00),
  (37, '20oz', 60.00),
  (38, '14oz', 50.00),
  (38, '20oz', 60.00),
  (39, '14oz', 50.00),
  (39, '20oz', 60.00),
  (40, '14oz', 50.00),
  (40, '20oz', 60.00),
   (41, '12 Oz', 55.00),
  (41, '16 Oz', 60.00),
  (42, '12 Oz', 55.00),
  (42, '16 Oz', 60.00),
  (43, '12 Oz', 55.00),
  (43, '16 Oz', 60.00),
  (44, '12 Oz', 55.00),
  (44, '16 Oz', 60.00),
  (45, '12 Oz', 60.00),
  (45, '16 Oz', 65.00),
  (46, '12 Oz', 60.00),
  (46, '16 Oz', 65.00),
  (47, '12 Oz', 65.00),
  (47, '16 Oz', 70.00),
  (48, '8 Oz', 45.00),
  (49, '14 Oz', 50.00),
  (49, '20 Oz', 60.00),
   (50, '12 Oz', 45.00),
  (50, '16 Oz', 50.00),
  (51, '12 Oz', 45.00),
  (51, '16 Oz', 50.00),
  (52, '12 Oz', 40.00),
  (52, '16 Oz', 45.00),
  (53, '12 Oz', 45.00),
  (53, '16 Oz', 50.00),
  (54, '12 Oz', 45.00),
  (54, '16 Oz', 50.00),
  (55, '', 60), -- Flan Napolitano
(56, '', 60), -- Cheesecake Frutos Rojos
(57, '', 60), -- Cheesecake Brownie
(58, '', 60), -- Cheesecake Tortuga
(59, '', 60), -- Brownie
(60, '', 35), -- Pan Elote
(61, '', 40), -- Panque Platano
(62, '', 40), -- Panque Zanahoria
(63, '', 40), -- Panque Moras
(64, '', 70), -- Pastel Chocolate
(65, '', 70), -- Pastel Chorreado
(66, '', 70), -- Pastel Red Velvet
(67, '', 40); -- Rollos de Canela con Glaseado

call SP_Registrar_usuariosClientes('Noe Abel','Vargas','Lopez','noe134','noe@gmail.com','micontraseñasupersegura','8715083731');

-- Ingresar domicilios para los primeros 19 clientes
call SP_insert_domicilios(1, 'Eva Yadira Lopez Tonche', 'Coahuila', 'Torreón', '27050', 'Colinas del Sol', 'Calle del Águila #1415', '8712345683');
/*
(2, 'Jose Ramirez', 'Coahuila', 'Torreón', '27060', 'Jardines del Bosque', 'Calle de los Cedros #1617', '8712345684')
(3, 'Rosa Torres', 'Coahuila', 'Torreón', '27070', 'San Felipe', 'Avenida de la Paz #1819', '8712345685')
(4, 'Miguel Reyes', 'Coahuila', 'Torreón', '27080', 'Revolución', 'Boulevard de las Palmas #2021', '8712345686')
(5, 'Luisa Cruz', 'Coahuila', 'Torreón', '27090', 'Las Fuentes', 'Avenida del Bosque #2223', '8712345687')
(6, 'Jorge Flores', 'Coahuila', 'Torreón', '27100', 'Real del Sol', 'Calle del Río #2425', '8712345688')
(7, 'Isabel Gomez', 'Coahuila', 'Torreón', '27110', 'La Rosita', 'Avenida de las Estrellas #2627', '8712345689')
(8, 'Pedro Diaz', 'Coahuila', 'Torreón', '27120', 'Ampliación Loma Real', 'Calle del Mirador #2829', '8712345690')
(9, 'Carmen Morales', 'Coahuila', 'Torreón', '27130', 'Nueva Laguna', 'Boulevard del Álamo #3031', '8712345691')
(10, 'Ricardo Ortiz', 'Coahuila', 'Torreón', '27140', 'Laguna Sur', 'Avenida del Cielo #3233', '8712345692')
(11, 'Sofia Silva', 'Coahuila', 'Torreón', '27150', 'Mirasierra', 'Calle del Monte #3435', '8712345693')
(12, 'Fernando Romero', 'Coahuila', 'Torreón', '27160', 'San Agustín', 'Avenida del Río #3637', '8712345694')
(13, 'Patricia Rojas', 'Coahuila', 'Torreón', '27170', 'Villa Florida', 'Boulevard de las Rosas #3839', '8712345695')
(14, 'Roberto Vazquez', 'Coahuila', 'Torreón', '27180', 'Los Ángeles', 'Calle de los Sauces #4041', '8712345696');
*/
INSERT INTO ubicacion_lugares (nombre, ciudad, estado, descripcion)
VALUES 
('Cafetería Sinfonía Café', 'Torreón', 'Coahuila', 'Cafetería acogedora con ambiente musical.'),
('Teatro Nazas', 'Torreón', 'Coahuila', 'Teatro emblemático de la ciudad, conocido por sus eventos culturales.'),
('Teatro Isauro Martínez', 'Torreón', 'Coahuila', 'Teatro histórico y culturalmente importante en Torreón.');

INSERT INTO EVENTOS (
    id_lugar, id_categoria, nombre, tipo, descripcion, fecha_evento, 
    hora_inicio, hora_fin, capacidad, precio_boleto, disponibilidad, 
    img_url, fecha_publicacion
) VALUES
(1, 1, 'Noches de Jazz', 'Gratuito', 'Disfruta de una velada con música jazz en vivo.', '2024-08-15', '19:00:00', '21:00:00', 50, 0.0, 50, 'img/jazz.jpg', '2024-07-09'),
(1, 3, 'Tarde de Poesía', 'Gratuito', 'Recital de poesía acompañado de café y pastelería artesanal.', '2024-08-20', '17:00:00', '19:00:00', 30, 0.0, 30, 'img/poesia.jpg', '2024-07-09'),
(1, 6, 'Exposición de Arte Local', 'Gratuito', 'Exhibición de obras de artistas locales con un ambiente cultural.', '2024-09-05', '10:00:00', '18:00:00', 80, 0.0, 80, 'img/arte.jpg', '2024-07-09'),
(1, 4, 'Degustación de Café', 'De Pago', 'Aprende sobre variedades de café y métodos de preparación.', '2024-09-10', '10:00:00', '12:00:00', 20, 15.0, 20, 'img/degustacion.jpg', '2024-07-09'),
(1, 1, 'Cata de Vinos y Quesos', 'De Pago', 'Descubre la combinación perfecta entre vinos, quesos y café.', '2024-09-25', '18:00:00', '20:00:00', 40, 25.0, 40, 'img/cata.jpg', '2024-07-09'),
(1, 8, 'Noche de Cine Independiente', 'Gratuito', 'Proyección de películas independientes acompañadas de café gourmet.', '2024-10-05', '20:00:00', '22:00:00', 25, 0.0, 25, 'img/cine.jpg', '2024-07-09'),
(1, 4, 'Taller de Cocina Saludable', 'De Pago', 'Aprende a preparar platillos saludables con ingredientes locales.', '2024-10-15', '09:00:00', '11:00:00', 15, 20.0, 15, 'img/cocina.jpg', '2024-07-09'),
(1, 1, 'Concierto Acústico', 'Gratuito', 'Concierto íntimo con artistas locales en un ambiente acogedor.', '2024-11-01', '18:00:00', '20:00:00', 50, 0.0, 50, 'img/concierto.jpg', '2024-07-09'),
(3, 7, 'Charla sobre Café y Cultura', 'Gratuito', 'Discusión sobre la historia y la influencia cultural del café en nuestra sociedad.', '2024-11-10', '17:00:00', '19:00:00', 30, 0.0, 30, 'img/charla.jpg', '2024-07-09'),
(2, 5, 'Feria de Libros Antiguos', 'Gratuito', 'Venta y exhibición de libros antiguos acompañados de café y música en vivo.', '2024-12-01', '10:00:00', '16:00:00', 50, 0.0, 50, 'img/libros.jpg', '2024-07-09');

INSERT INTO bolsas_cafe(
	nombre,
    años_cosecha,
    productor_finca,
    proceso,
    variedad,
    altura,
    aroma,
    acidez,
    sabor,
    cuerpo,
    puntaje_catacion,
    img_url
)
VALUES
('Texin Veracruz','2023 - 2024','Eduardo Vital Díaz', 'Lavado', 'Marsellesa, San Román, Oro Azteca', '1,220 msnm', 'Cacao, Vainilla', 'Cítrica, brillante', 'Choc. Oscuro, Avellana', 'Alto - Denso',85, 'https://example.com/image.jpg'),
('Jaltenango Chiapas','2023 - 2024','Finca Santa María', 'Lavado', 'Caturra', '1,300 - 1,500 msnm', 'Cítrico, Floral', 'Brillante, Equilibrada', 'Miel, Manzana Verde, Durazno', 'Medio - Denso',86.5, '[https://www.booking.com/hotel/mx/la-joyita.html](https://www.booking.com/hotel/mx/la-joyita.html)'),
('Jaltenango Chiapas','2023 - 2024','Finca Santa María', 'Natural', 'Marsellesa, Bourbon', '1,350 - 1,450 msnm', 'Dulce de Leche, Nuez', 'Frutal Intensa', 'Almíbar, Naranja', 'Ligero',84, 'https://www.facebook.com/fincaelinjertocafe/');

-- Insert 
INSERT INTO detalle_bc (
  id_bolsa,
  medida,
  precio,
  stock
)
VALUES 
(1, '1/4 Kg', 85, 10),
(1, '1/2 Kg', 170, 5),
(1, '1 Kg', 340, 2),
(2, '1/4 Kg', 130, 20),
(2, '1/2 Kg', 250, 15),
(2, '1 Kg', 480, 10),
(3,  '1/4 Kg', 80, 20),
(3,  '1/2 Kg', 160, 15),
(3,  '1 Kg', 320, 10);

-- Inserción de recompensas
INSERT INTO recompensas (recompensa, condicion, fecha_inicio, fecha_expiracion, img_url) VALUES
('10% de descuento en café', 5, '2024-07-9', '2024-07-15', 'img/descuento_cafe.jpg'),
('Bebida gratis al comprar un pastel', 10, '2024-07-15', '2024-07-11', 'img/bebida_gratis.jpg'),
('Taza conmemorativa gratis', 15, '2024-07-9', '2024-07-15', 'img/taza_conmemorativa.jpg'),
('Acceso a evento exclusivo', 20, '2024-07-10', '2024-07-15', 'img/evento_exclusivo.jpg'),
('Descuento del 20% en tu próxima compra', 25, '2024-07-15', '2024-07-11', 'img/descuento_proxima.jpg');

-- Insertar asociaciones entre todos los clientes y las recompensas activas


-- Indices en claves foraneas
-- Indices en las claves foraneas para la aceleracion de la gestion de tablas ligadas con JOIN.
-- Tabla roles_usuarios
CREATE INDEX idx_roles_usuarios_id_usuario ON roles_usuarios(id_usuario);
CREATE INDEX idx_roles_usuarios_id_rol ON roles_usuarios(id_rol);

-- Tabla personas, empleados, clientes, proveedores
CREATE INDEX idx_personas_id_usuario ON personas(id_usuario);
CREATE INDEX idx_clientes_id_persona ON clientes(id_persona);
CREATE INDEX idx_empleados_id_persona ON empleados(id_persona);
CREATE INDEX idx_proveedores_id_persona ON proveedores(id_persona);

-- Tabla domicilios
CREATE INDEX idx_domicilios_id_cliente ON domicilios(id_cliente);

-- Tabla pedidos
CREATE INDEX idx_pedidos_id_cliente ON pedidos(id_cliente);
CREATE INDEX idx_pedidos_id_domicilio ON pedidos(id_domicilio);

-- Tabla carrito
CREATE INDEX idx_carrito_id_cliente ON carrito(id_cliente);
CREATE INDEX idx_carrito_id_bc ON carrito(id_dbc);

-- Tabla detalle_pedidos
CREATE INDEX idx_detalle_pedidos_id_pedido ON detalle_pedidos(id_pedido);
CREATE INDEX idx_detalle_pedidos_id_bc ON detalle_pedidos(id_dbc);

-- Tabla EVENTOS
CREATE INDEX idx_eventos_id_lugar ON EVENTOS(id_lugar);
CREATE INDEX idx_eventos_id_categoria ON EVENTOS(id_categoria);

-- Tabla eventos_reservas
CREATE INDEX idx_eventos_reservas_id_cliente ON eventos_reservas(id_cliente);
CREATE INDEX idx_eventos_reservas_id_evento ON eventos_reservas(id_evento);

-- Tabla productos_menu
CREATE INDEX idx_productos_menu_id_categoria ON productos_menu(id_categoria);

-- Tabla asistencias
CREATE INDEX idx_asistencias_id_cliente ON asistencias(id_cliente);

-- Tabla clientes_recompensas
CREATE INDEX idx_clientes_recompensas_id_cliente ON clientes_recompensas(id_cliente);
CREATE INDEX idx_clientes_recompensas_id_recompensa ON clientes_recompensas(id_recompensa);
