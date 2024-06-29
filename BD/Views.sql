-- vistas de admin-menu
select dpm.nombre as Producto dpm.img as Imagen,dpm.descripcion as Descripción, pm.precio as Precio, dpm.categoria as Categoría 
join detalle_productos_menu as dpm
on dpm.id_dpm = pm.id_dpm
join categorias as c
on c.id_categoria = dpm.id_categoria