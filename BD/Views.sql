-- vistas de admin-menu
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
;