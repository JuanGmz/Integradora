-- Indices en claves foraneas
-- Indices en las claves foraneas para la aceleracion de la gestion de tablas ligadas con JOIN.
-- Tabla roles usuarios.
CREATE INDEX idx_roles_usuarios_id_usuario ON roles_usuarios(id_usuario);
CREATE INDEX idx_roles_usuarios_id_rol ON roles_usuarios(id_rol);

-- Tabla personas, empleados, clientes, proveedores.
CREATE INDEX idx_personas_id_usuario ON personas(id_usuario);
CREATE INDEX idx_clientes_id_persona ON clientes(id_persona);
CREATE INDEX idx_empleados_id_persona ON empleados(id_persona);
CREATE INDEX idx_proveedores_id_persona ON proveedores(id_persona);

-- Tablas pedidos, domicilios.
CREATE INDEX idx_domicilios_id_cliente ON domicilios(id_cliente);
CREATE INDEX idx_pedidos_id_cliente ON pedidos(id_cliente);
CREATE INDEX idx_pedidos_id_domicilio ON pedidos(id_domicilio);

-- Tabla carrito.
CREATE INDEX idx_carrito_id_cliente ON carrito(id_cliente);
CREATE INDEX idx_carrito_id_bc ON carrito(id_bc);

-- Tabla detalle pedidos.
CREATE INDEX idx_detalle_pedidos_id_pedido ON detalle_pedidos(id_pedido);
CREATE INDEX idx_detalle_pedidos_id_bc ON detalle_pedidos(id_bc);

-- Tablas eventos.
CREATE INDEX idx_eventos_id_lugar ON EVENTOS(id_lugar);
CREATE INDEX idx_eventos_id_categoria ON EVENTOS(id_categoria);

-- Tabla eventos reservas.
CREATE INDEX idx_eventos_reservas_id_cliente ON eventos_reservas(id_cliente);
CREATE INDEX idx_eventos_reservas_id_evento ON eventos_reservas(id_evento);

-- Tabla productos_menu.
CREATE INDEX idx_productos_menu_id_dpm ON productos_menu(id_dpm);

-- Tabla tarjetas, asistencias.
CREATE INDEX idx_tarjetas_id_cliente ON tarjetas(id_cliente);
CREATE INDEX idx_asistencias_id_tarjeta ON asistencias(id_tarjeta);

-- Tablas tarjetas recompensas.
CREATE INDEX idx_tarjeta_recompensas_id_tarjeta ON tarjeta_recompensas(id_tarjeta);
CREATE INDEX idx_tarjeta_recompensas_id_recompensa ON tarjeta_recompensas(id_recompensa);

-- 