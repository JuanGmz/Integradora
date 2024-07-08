use cafe_sinfonia;
-- Insertar datos en la tabla de usuarios
INSERT INTO usuarios (usuario, correo, contraseña, telefono) VALUES
    ('john.doe', 'john.doe@gmail.com', UNHEX(MD5('Passw0rd!123')), '5551234567'),
    ('anna.smith', 'anna.smith@yahoo.com', UNHEX(MD5('Secure#Pass1')), '5551234568'),
    ('michael.jones', 'michael.jones@outlook.com', UNHEX(MD5('MyS3cr3tPwd')), '5551234569'),
    ('karen.brown', 'karen.brown@hotmail.com', UNHEX(MD5('P@ssw0rd!22')), '5551234570'),
    ('david.baker', 'david.baker@aol.com', UNHEX(MD5('B@k3rP@ssword')), '5551234571'),
    ('emily.lawson', 'emily.lawson@icloud.com', UNHEX(MD5('Law$0n2021')), '5551234572'),
    ('mark.martin', 'mark.martin@gmail.com', UNHEX(MD5('Martin#1987')), '5551234573'),
    ('rachel.wilson', 'rachel.wilson@yahoo.com', UNHEX(MD5('W1ls0nPwd!')), '5551234574'),
    ('jack.king', 'jack.king@outlook.com', UNHEX(MD5('KingOf$Hill')), '5551234575'),
    ('julia.davis', 'julia.davis@hotmail.com', UNHEX(MD5('D@v1sPass!')), '5551234576'),
    ('chris.miller', 'chris.miller@aol.com', UNHEX(MD5('M1ll3rSecure')), '5551234577'),
    ('daniel.lee', 'daniel.lee@icloud.com', UNHEX(MD5('L33Pwd123!')), '5551234578'),
    ('amanda.green', 'amanda.green@gmail.com', UNHEX(MD5('Gr33nL1ght$')), '5551234579'),
    ('tom.allen', 'tom.allen@yahoo.com', UNHEX(MD5('T0mAll3n$Pass')), '5551234580'),
    ('brenda.moore', 'brenda.moore@outlook.com', UNHEX(MD5('M00reP@ss123')), '5551234581'),
    ('paul.white', 'paul.white@hotmail.com', UNHEX(MD5('Wh1t3$Passwrd')), '5551234582'),
    ('roger.clark', 'roger.clark@aol.com', UNHEX(MD5('Cl@rkSecure1')), '5551234583'),
    ('terry.thompson', 'terry.thompson@icloud.com', UNHEX(MD5('Th0mp$on!23')), '5551234584'),
    ('kevin.morris', 'kevin.morris@gmail.com', UNHEX(MD5('M0rris!2345')), '5551234585'),
    ('james.roberts', 'james.roberts@yahoo.com', UNHEX(MD5('R0b3rt$Pass!')), '5551234586'),
    ('holly.harris', 'holly.harris@outlook.com', UNHEX(MD5('H0llyH@rris1')), '5551234587'),
    ('karen.walker', 'karen.walker@hotmail.com', UNHEX(MD5('W@lk3rP@ss12')), '5551234588'),
    ('tina.anderson', 'tina.anderson@aol.com', UNHEX(MD5('And3rs0n$Pass')), '5551234589'),
    ('juan.hernandez', 'juan.hernandez@icloud.com', UNHEX(MD5('Ju@nh3rnandez')), '5551234590'),
    ('lisa.martinez', 'lisa.martinez@gmail.com', UNHEX(MD5('L!saMart1nez$')), '5551234591'),
    ('lucas.thomas', 'lucas.thomas@yahoo.com', UNHEX(MD5('Th0mas!Passwrd')), '5551234592'),
    ('kate.sanchez', 'kate.sanchez@outlook.com', UNHEX(MD5('S@anchez$1234')), '5551234593'),
    ('mike.taylor', 'mike.taylor@hotmail.com', UNHEX(MD5('T@ylorMik3!')), '5551234594'),
    ('carlos.garcia', 'carlos.garcia@aol.com', UNHEX(MD5('G@rciaC@rlos')), '5551234595'),
    ('jennifer.cook', 'jennifer.cook@icloud.com', UNHEX(MD5('Cook!Jenn1f3r')), '5551234596'),
    ('nina.bell', 'nina.bell@gmail.com', UNHEX(MD5('Nin@B3ll$123')), '5551234597'),
    ('claire.sanders', 'claire.sanders@yahoo.com', UNHEX(MD5('S@nd3rsClair3')), '5551234598'),
    ('leo.gonzalez', 'leo.gonzalez@outlook.com', UNHEX(MD5('Gonz@l3zL30')), '5551234599'),
    ('derek.campbell', 'derek.campbell@hotmail.com', UNHEX(MD5('C@mpb3llDerek')), '5551234500'),
    ('emma.murphy', 'emma.murphy@aol.com', UNHEX(MD5('MurphyEmm@1')), '5551234501'),
    ('matthew.griffin', 'matthew.griffin@icloud.com', UNHEX(MD5('Griff1nMatt3w')), '5551234502'),
    ('kate.robinson', 'kate.robinson@gmail.com', UNHEX(MD5('R0b!nsonK@te')), '5551234503'),
    ('jack.young', 'jack.young@yahoo.com', UNHEX(MD5('Y0ungJ@ck123')), '5551234504'),
    ('harry.thomas', 'harry.thomas@outlook.com', UNHEX(MD5('Thom@sHarry!')), '5551234505'),
    ('bune_', 'Enrique.Segoviano@gmail.com', UNHEX(MD5('SoyFanDeTaylorSwift')), '871646782');

-- Insertar datos en la tabla de personas
INSERT INTO personas (id_usuario, nombres, apellido_paterno, apellido_materno) VALUES
    (1, 'John', 'Doe', 'Smith'),
    (2, 'Anna', 'Smith', 'Johnson'),
    (3, 'Michael', 'Jones', 'Williams'),
    (4, 'Karen', 'Brown', 'Miller'),
    (5, 'David', 'Baker', 'Wilson'),
    (6, 'Emily', 'Lawson', 'Moore'),
    (7, 'Mark', 'Martin', 'Taylor'),
    (8, 'Rachel', 'Wilson', 'Anderson'),
    (9, 'Jack', 'King', 'Thomas'),
    (10, 'Julia', 'Davis', 'Jackson'),
    (11, 'Chris', 'Miller', 'White'),
    (12, 'Daniel', 'Lee', 'Harris'),
    (13, 'Amanda', 'Green', 'Martin'),
    (14, 'Tom', 'Allen', 'Thompson'),
    (15, 'Brenda', 'Moore', 'Garcia'),
    (16, 'Paul', 'White', 'Martinez'),
    (17, 'Roger', 'Clark', 'Robinson'),
    (18, 'Terry', 'Thompson', 'Clark'),
    (19, 'Kevin', 'Morris', 'Rodriguez'),
    (20, 'James', 'Roberts', 'Lewis'),
    (21, 'Holly', 'Harris', 'Lee'),
    (22, 'Karen', 'Walker', 'Walker'),
    (23, 'Tina', 'Anderson', 'Hall'),
    (24, 'Juan', 'Hernandez', 'Allen'),
    (25, 'Lisa', 'Martinez', 'Young'),
    (26, 'Lucas', 'Thomas', 'Hernandez'),
    (27, 'Kate', 'Sanchez', 'King'),
    (28, 'Mike', 'Taylor', 'Wright'),
    (29, 'Carlos', 'Garcia', 'Lopez'),
    (30, 'Jennifer', 'Cook', 'Hill'),
    (31, 'Nina', 'Bell', 'Scott'),
    (32, 'Claire', 'Sanders', 'Green'),
    (33, 'Leo', 'Gonzalez', 'Adams'),
    (34, 'Derek', 'Campbell', 'Baker'),
    (35, 'Emma', 'Murphy', 'Gonzalez'),
    (36, 'Matthew', 'Griffin', 'Nelson'),
    (37, 'Kate', 'Robinson', 'Carter'),
    (38, 'Jack', 'Young', 'Mitchell'),
    (39, 'Harry', 'Thomas', 'Perez'),
    (40, 'Dante Raziel', 'Basurto', 'Saucedo');
    
    INSERT INTO publicaciones (titulo, descripcion, img_url, tipo) VALUES
    -- Difusión
    ('Nueva Sinfonía de Sabores', '¡Descubre nuestro nuevo menú de temporada con sabores únicos que te harán viajar!', 'http://sinfoniacafe.com/img/nueva_sinfonia.jpg', 'Difusion'),
    ('Concierto de Jazz en Vivo', 'Este viernes, acompáñanos para una noche inolvidable de jazz en vivo con músicos locales.', 'http://sinfoniacafe.com/img/jazz_vivo.jpg', 'Difusion'),
    ('Exposición de Arte Local', 'Visita nuestra galería para disfrutar de la obra de artistas locales mientras tomas tu café.', 'http://sinfoniacafe.com/img/arte_local.jpg', 'Difusion'),
    ('Noche de Poesía', 'Ven a compartir tus poemas favoritos o simplemente disfruta de las interpretaciones de otros.', 'http://sinfoniacafe.com/img/noche_poesia.jpg', 'Difusion'),
    ('Cata de Cafés Especiales', 'Únete a nuestra cata de cafés especiales y aprende sobre los diferentes métodos de preparación.', 'http://sinfoniacafe.com/img/cata_cafes.jpg', 'Difusion'),
    ('Taller de Barismo', 'Aprende a preparar el café perfecto en nuestro taller de barismo este sábado.', 'http://sinfoniacafe.com/img/taller_barismo.jpg', 'Difusion'),
    ('Fiesta de Aniversario', 'Celebra con nosotros nuestro aniversario con música, comida y muchas sorpresas.', 'http://sinfoniacafe.com/img/fiesta_aniversario.jpg', 'Difusion'),
    ('Día del Libro', 'Compra un café y recibe un libro gratis este domingo en celebración del Día del Libro.', 'http://sinfoniacafe.com/img/dia_libro.jpg', 'Difusion'),
    ('Desayuno de Negocios', 'Organiza tu desayuno de negocios en Sinfonía Café & Cultura y disfruta de nuestras ofertas especiales.', 'http://sinfoniacafe.com/img/desayuno_negocios.jpg', 'Difusion'),
    ('Noche de Trivia', 'Ponte a prueba y diviértete en nuestra noche de trivia con premios para los ganadores.', 'http://sinfoniacafe.com/img/noche_trivia.jpg', 'Difusion'),

    -- Blog
    ('El Arte de la Preparación del Café', 'Exploramos los distintos métodos de preparación del café y cómo cada uno afecta el sabor final. Desde el clásico espresso hasta métodos más modernos como el cold brew, cada técnica de preparación tiene su propia magia. En este artículo, desglosamos paso a paso cada método, te damos consejos sobre cómo elegir los granos de café adecuados y te explicamos cómo ajustar los parámetros para obtener el mejor sabor posible. Ya seas un barista experimentado o un aficionado que recién comienza, aquí encontrarás información valiosa para mejorar tus habilidades y disfrutar aún más de tu café.', 'http://sinfoniacafe.com/img/arte_preparacion.jpg', 'Blog'),
    ('Historia del Café en el Mundo', 'Un recorrido histórico por el origen del café y su impacto en diferentes culturas. El viaje del café comenzó en las antiguas tierras de Etiopía y se extendió rápidamente por todo el mundo. En este artículo, exploramos cómo el café se convirtió en una bebida tan popular y cómo ha influido en la economía, la cultura y la sociedad en diversos países. Desde los primeros cafés en el Medio Oriente hasta las modernas cafeterías en las ciudades más cosmopolitas, descubriremos cómo el café ha evolucionado y se ha adaptado a diferentes contextos históricos y culturales.', 'http://sinfoniacafe.com/img/historia_cafe.jpg', 'Blog'),
    ('Beneficios del Café para la Salud', 'Descubre cómo el consumo moderado de café puede ser beneficioso para tu salud. El café no solo es una deliciosa bebida que nos ayuda a empezar el día, sino que también tiene numerosos beneficios para la salud. En este artículo, revisamos estudios científicos que demuestran cómo el café puede mejorar la función cerebral, ayudar a quemar grasas, y reducir el riesgo de enfermedades como el Alzheimer y el Parkinson. También discutimos la cantidad recomendada de café que se debe consumir y cómo evitar los posibles efectos negativos del consumo excesivo.', 'http://sinfoniacafe.com/img/beneficios_cafe.jpg', 'Blog'),
    ('Recetas con Café para Sorprender', 'Inspírate con estas recetas que incorporan café de manera creativa en tus platos. Desde postres deliciosos hasta platos principales sorprendentes, el café puede ser un ingrediente versátil en la cocina. En este artículo, te ofrecemos una variedad de recetas que utilizan café para añadir un toque especial a tus comidas. Aprende a hacer un tiramisú perfecto, experimenta con una salsa de café para carnes, o descubre cómo preparar cócteles con café que impresionarán a tus invitados. Cada receta está diseñada para resaltar el sabor único del café y ofrecer una experiencia culinaria excepcional.', 'http://sinfoniacafe.com/img/recetas_cafe.jpg', 'Blog'),
    ('Cultura del Café en América Latina', 'Explora cómo se vive la cultura del café en diferentes países de América Latina. América Latina es conocida por producir algunos de los mejores cafés del mundo, pero la cultura del café en esta región va más allá de la producción. En este artículo, viajamos a través de países como Colombia, Brasil y Guatemala para descubrir cómo el café se integra en la vida cotidiana de las personas. Desde las fincas cafetaleras hasta las cafeterías urbanas, cada lugar tiene sus propias tradiciones y rituales en torno al café. Conoceremos las historias de los productores, las festividades locales y las innovaciones en la industria cafetera latinoamericana.', 'http://sinfoniacafe.com/img/cultura_cafe.jpg', 'Blog'),
    ('Los Mejores Libros para Acompañar tu Café', 'Te recomendamos algunos libros para disfrutar junto a tu taza de café favorita. No hay nada como perderse en una buena lectura mientras disfrutas de un delicioso café. En este artículo, hemos seleccionado una lista de libros que son perfectos para acompañar tus momentos de café. Desde novelas cautivadoras hasta ensayos inspiradores, hay algo para todos los gustos. También incluimos reseñas y sugerencias sobre qué tipo de café combinar con cada libro, creando una experiencia completa para tus momentos de relajación y disfrute personal.', 'http://sinfoniacafe.com/img/libros_cafe.jpg', 'Blog'),
    ('El Impacto Ambiental del Café', 'Analizamos cómo la industria del café afecta al medio ambiente y qué se está haciendo para reducir este impacto. La producción de café tiene un impacto significativo en el medio ambiente, desde la deforestación hasta el uso de pesticidas. En este artículo, discutimos los problemas ambientales asociados con la producción de café y exploramos las iniciativas sostenibles que están siendo implementadas por los productores. Desde el cultivo orgánico hasta las prácticas de comercio justo, aprenderemos cómo los consumidores pueden apoyar un café más sostenible y ayudar a proteger nuestro planeta.', 'http://sinfoniacafe.com/img/impacto_ambiental.jpg', 'Blog'),
    ('Entrevista con un Barista Experto', 'Conoce a nuestro barista estrella y aprende algunos de sus secretos mejor guardados. En esta entrevista exclusiva, hablamos con nuestro barista experto sobre su pasión por el café, su trayectoria profesional y los desafíos que ha enfrentado en su carrera. También compartirá algunos consejos y trucos para preparar el café perfecto en casa, desde cómo seleccionar los granos adecuados hasta las técnicas de preparación más efectivas. Esta es una oportunidad única para obtener una visión detrás de las escenas de lo que significa ser un barista y cómo puedes mejorar tus propias habilidades cafeteras.', 'http://sinfoniacafe.com/img/entrevista_barista.jpg', 'Blog'),
    ('Cómo Elegir el Café Perfecto para Ti', 'Guía para seleccionar el tipo de café que mejor se adapte a tus gustos y preferencias. Con tantas opciones disponibles, elegir el café perfecto puede ser una tarea abrumadora. En este artículo, te ayudamos a navegar por el mundo del café y a encontrar el que mejor se adapte a tus gustos. Discutimos las diferentes variedades de granos, los perfiles de sabor y las regiones de cultivo. También te damos consejos sobre cómo probar diferentes tipos de café y qué factores considerar al hacer tu elección. Ya seas un amante del café fuerte y robusto o prefieras algo más suave y afrutado, aquí encontrarás la guía que necesitas para tomar una decisión informada.', 'http://sinfoniacafe.com/img/elegir_cafe.jpg', 'Blog'),
    ('Tendencias en el Mundo del Café', 'Mantente al día con las últimas tendencias y novedades en la industria del café. El mundo del café está en constante evolución, con nuevas tendencias emergiendo cada año. En este artículo, exploramos las innovaciones más recientes en la industria del café, desde nuevas técnicas de preparación hasta las últimas modas en bebidas de café. Descubriremos cómo los avances tecnológicos están cambiando la forma en que cultivamos, procesamos y disfrutamos del café. También analizamos las tendencias de consumo y cómo están influyendo en la oferta de productos en las cafeterías. Mantente informado y descubre qué está de moda en el mundo del café.', 'http://sinfoniacafe.com/img/tendencias_cafe.jpg', 'Blog');

	INSERT INTO clientes (id_persona)
SELECT id_persona FROM personas LIMIT 20;

-- Asignar personas a la tabla empleados
INSERT INTO empleados (id_persona)
SELECT id_persona FROM personas LIMIT 20, 10;

-- Asignar personas a la tabla proveedores
INSERT INTO proveedores (id_persona)
SELECT id_persona FROM personas LIMIT 30, 10;

INSERT INTO contacto (nombre, asunto, cometario, correo, telefono) VALUES
    ('Ana López', 'Consulta de productos', 'Me gustaría obtener más información sobre sus productos disponibles.', 'ana.lopez@gmail.com', '5551234567'),
    ('Pedro Martínez', 'Reclamación de servicio', 'No estoy satisfecho con el servicio recibido el día de hoy.', 'pedro.martinez@yahoo.com', '5552345678'),
    ('María García', 'Solicitud de presupuesto', 'Quisiera un presupuesto detallado para el proyecto que estamos planeando.', 'maria.garcia@hotmail.com', '5553456789'),
    ('Javier Rodríguez', 'Sugerencia para mejora', 'Tienen un excelente servicio, pero podrían mejorar la variedad de productos.', 'javier.rodriguez@gmail.com', '5554567890'),
    ('Sara Fernández', 'Consulta de horarios', 'Necesito saber sus horarios de atención durante el fin de semana.', 'sara.fernandez@yahoo.com', '5555678901'),
    ('Carlos Pérez', 'Felicitación por servicio', 'Excelente atención al cliente, los felicito por el buen servicio.', 'carlos.perez@hotmail.com', '5556789012'),
    ('Laura Díaz', 'Solicitud de información', 'Estoy interesada en conocer más sobre sus servicios de entrega a domicilio.', 'laura.diaz@gmail.com', '5557890123'),
    ('Daniel Ruiz', 'Problema con pedido', 'He recibido mi pedido incompleto, necesito una solución lo antes posible.', 'daniel.ruiz@yahoo.com', '5558901234'),
    ('Lucía Sánchez', 'Reclamación por producto defectuoso', 'El producto que compré tiene un defecto de fabricación, necesito un reemplazo.', 'lucia.sanchez@hotmail.com', '5559012345'),
    ('Pablo Gómez', 'Solicitud de catálogo', 'Por favor, envíenme su catálogo actualizado de productos.', 'pablo.gomez@gmail.com', '5550123456'),
    ('Elena Castro', 'Consulta sobre promociones', 'Me gustaría saber si tienen alguna promoción vigente en productos de belleza.', 'elena.castro@yahoo.com', '5551234567'),
    ('Miguel Fernández', 'Sugerencia para evento', 'Sugiero que organicen un evento de degustación de productos nuevos.', 'miguel.fernandez@hotmail.com', '5552345678'),
    ('Carmen Moreno', 'Reclamación por atención', 'La atención recibida en su sucursal fue muy lenta y poco amable.', 'carmen.moreno@gmail.com', '5553456789'),
    ('José Torres', 'Felicitación por servicio', 'Gracias por la excelente atención recibida durante mi última visita.', 'jose.torres@yahoo.com', '5554567890'),
    ('Isabel Ruiz', 'Consulta de disponibilidad', '¿Tienen disponible el producto que vi en su página web?', 'isabel.ruiz@hotmail.com', '5555678901'),
    ('Francisco Martín', 'Solicitud de presupuesto', 'Necesito un presupuesto para la renovación de mis muebles de oficina.', 'francisco.martin@gmail.com', '5556789012'),
    ('Beatriz Serrano', 'Reclamación por producto dañado', 'El producto que compré llegó dañado, necesito un reembolso.', 'beatriz.serrano@yahoo.com', '5557890123'),
    ('Antonio Pérez', 'Sugerencia para mejora', 'Sería bueno que ampliaran su variedad de productos orgánicos.', 'antonio.perez@hotmail.com', '5558901234'),
    ('Manuela Jiménez', 'Consulta sobre garantía', '¿Cuál es el periodo de garantía de sus productos electrónicos?', 'manuela.jimenez@gmail.com', '5559012345'),
    ('Jorge García', 'Reclamación por servicio técnico', 'El servicio técnico no pudo resolver el problema con mi electrodoméstico.', 'jorge.garcia@yahoo.com', '5550123456'),
    ('Luisa Martínez', 'Consulta de precios', 'Quisiera conocer los precios de sus productos de jardinería.', 'luisa.martinez@hotmail.com', '5551234567'),
    ('Raúl López', 'Solicitud de información', '¿Podrían proporcionarme información sobre sus cursos de cocina?', 'raul.lopez@gmail.com', '5552345678'),
    ('Mónica Sánchez', 'Felicitación por servicio', 'Gracias por resolver mi problema de manera rápida y eficiente.', 'monica.sanchez@yahoo.com', '5553456789'),
    ('Sergio Gómez', 'Consulta sobre características', 'Me gustaría saber más sobre las características técnicas de su nuevo producto.', 'sergio.gomez@hotmail.com', '5554567890'),
    ('Natalia Torres', 'Reclamación por servicio de entrega', 'El servicio de entrega no cumplió con el horario acordado.', 'natalia.torres@gmail.com', '5555678901'),
    ('Diego Vargas', 'Solicitud de muestras', '¿Podrían enviarme muestras de sus productos más vendidos?', 'diego.vargas@yahoo.com', '5556789012'),
    ('Laura Ramírez', 'Reclamación por falta de stock', 'El producto que quería comprar no estaba disponible en su tienda.', 'laura.ramirez@hotmail.com', '5557890123'),
    ('Roberto Méndez', 'Sugerencia para mejora', 'Sería útil que incluyeran una opción de compra rápida en su sitio web.', 'roberto.mendez@gmail.com', '5558901234'),
    ('Patricia Gutiérrez', 'Consulta de horarios', 'Necesito saber si abren los domingos y cuáles son sus horarios de atención.', 'patricia.gutierrez@yahoo.com', '5559012345'),
    ('Marcos Castro', 'Felicitación por servicio', 'Gracias por el excelente trato y la atención personalizada que recibí.', 'marcos.castro@hotmail.com', '5550123456');

	INSERT INTO ubicacion_lugares (latitud, longitud) 
    VALUES
	(37.7749, -122.4194), -- San Francisco, CA, USA
	(34.0522, -118.2437), -- Los Angeles, CA, USA
	(40.7128, -74.0060),  -- New York, NY, USA
	(51.5074, -0.1278),   -- London, UK
	(48.8566, 2.3522),    -- Paris, France
	(35.6895, 139.6917),  -- Tokyo, Japan
	(55.7558, 37.6173),   -- Moscow, Russia
	(-33.8688, 151.2093), -- Sydney, Australia
	(39.9042, 116.4074),  -- Beijing, China
	(19.4326, -99.1332),  -- Mexico City, Mexico
	(-34.6037, -58.3816), -- Buenos Aires, Argentina
	(52.5200, 13.4050),   -- Berlin, Germany
	(40.4168, -3.7038),   -- Madrid, Spain
	(41.9028, 12.4964),   -- Rome, Italy
	(1.3521, 103.8198);   -- Singapore
    
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



    INSERT INTO EVENTOS (id_lugar, id_categoria, nombre, tipo, descripcion, fecha_evento, fecha_publicacion, hora_inicio, hora_fin, capacidad, precio_boleto, disponibilidad, img_url) VALUES
(1, 5, 'Taller de Cerámica', 'De Pago', 'Un taller para aprender las técnicas básicas de la cerámica.', '2024-07-15', '2024-07-01', '08:00:00', '10:00:00', 50, 15.00, 50, 'http://example.com/ceramica.jpg'),
(2, 2, 'Concierto de Jazz', 'De Pago', 'Disfruta de una noche con los mejores músicos de jazz.', '2024-07-20', '2024-07-05', '19:00:00', '21:00:00', 200, 25.00, 200, 'http://example.com/jazz.jpg'),
(3, 3, 'Obra de Teatro Clásica', 'De Pago', 'Una obra de teatro clásica para disfrutar con toda la familia.', '2024-07-22', '2024-07-07', '18:00:00', '20:00:00', 150, 20.00, 150, 'http://example.com/teatro.jpg'),
(4, 4, 'Podcast en Vivo', 'Gratuito', 'Un podcast en vivo con interesantes invitados y temas de actualidad.', '2024-07-25', '2024-07-10', '17:00:00', '18:30:00', 100, 5.00, 100, 'http://example.com/podcast.jpg'),
(5, 5, 'Taller de Pintura', 'De Pago', 'Un taller de pintura para todas las edades y niveles.', '2024-07-30', '2024-07-15', '10:00:00', '12:00:00', 30, 15.00, 30, 'http://example.com/taller_pintura.jpg'),
(6, 6, 'Feria de Artesanías', 'Gratuito', 'Una feria con los mejores productos artesanales de la región.', '2024-08-05', '2024-07-20', '09:00:00', '18:00:00', 500, 5.00, 500, 'http://example.com/feria.jpg'),
(7, 7, 'Festival de Música Indie', 'De Pago', 'Un festival con las mejores bandas de música indie.', '2024-08-10', '2024-07-25', '16:00:00', '23:00:00', 300, 30.00, 300, 'http://example.com/festival.jpg'),
(8, 8, 'Seminario de Tecnología', 'Gratuito', 'Un seminario sobre las últimas tendencias en tecnología.', '2024-08-15', '2024-08-01', '09:00:00', '12:00:00', 200, 5.00, 200, 'http://example.com/seminario.jpg'),
(9, 9, 'Proyección de Película Clásica', 'De Pago', 'Una proyección especial de una película clásica en un cine histórico.', '2024-08-20', '2024-08-05', '20:00:00', '22:00:00', 100, 12.00, 100, 'http://example.com/cine.jpg'),
(10, 2, 'Concierto de Rock', 'De Pago', 'Una noche con las mejores bandas de rock de la ciudad.', '2024-08-25', '2024-08-10', '20:00:00', '23:00:00', 200, 30.00, 200, 'http://example.com/rock.jpg'),
(11, 3, 'Obra de Teatro Moderna', 'De Pago', 'Una obra de teatro moderna y provocadora.', '2024-08-30', '2024-08-15', '19:00:00', '21:00:00', 150, 25.00, 150, 'http://example.com/teatro_moderno.jpg'),
(12, 4, 'Podcast de Historia', 'Gratuito', 'Un podcast en vivo sobre los eventos históricos más interesantes.', '2024-09-05', '2024-08-20', '18:00:00', '19:30:00', 100, 5.00, 100, 'http://example.com/podcast_historia.jpg'),
(13, 5, 'Taller de Fotografía', 'De Pago', 'Un taller para aprender las técnicas básicas de la fotografía.', '2024-09-10', '2024-08-25', '09:00:00', '12:00:00', 30, 20.00, 30, 'http://example.com/taller_fotografia.jpg'),
(14, 6, 'Feria del Libro', 'Gratuito', 'Una feria con las mejores editoriales y autores.', '2024-09-15', '2024-09-01', '10:00:00', '18:00:00', 400, 5.00, 400, 'http://example.com/feria_libro.jpg'),
(15, 7, 'Festival de Cine Independiente', 'De Pago', 'Un festival con las mejores películas del cine independiente.', '2024-09-20', '2024-09-05', '14:00:00', '23:00:00', 250, 40.00, 250, 'http://example.com/festival_cine.jpg'),
(1, 8, 'Seminario de Salud', 'Gratuito', 'Un seminario sobre la salud y el bienestar.', '2024-09-25', '2024-09-10', '10:00:00', '13:00:00', 150, 5.00, 150, 'http://example.com/seminario_salud.jpg'),
(2, 9, 'Proyección de Documental', 'De Pago', 'Una proyección especial de un documental aclamado.', '2024-09-30', '2024-09-15', '19:00:00', '21:00:00', 100, 15.00, 100, 'http://example.com/documental.jpg'),
(3, 2, 'Concierto de Pop', 'De Pago', 'Una noche con las mejores canciones pop.', '2024-10-05', '2024-09-20', '20:00:00', '22:30:00', 200, 35.00, 200, 'http://example.com/pop.jpg'),
(4, 3, 'Obra de Teatro Infantil', 'De Pago', 'Una obra de teatro para toda la familia.', '2024-10-10', '2024-09-25', '17:00:00', '18:30:00', 150, 18.00, 150, 'http://example.com/teatro_infantil.jpg'),
(5, 4, 'Podcast de Ciencia', 'Gratuito', 'Un podcast en vivo sobre los últimos descubrimientos científicos.', '2024-10-15', '2024-10-01', '18:00:00', '19:30:00', 100, 5.00, 100, 'http://example.com/podcast_ciencia.jpg'),
(6, 5, 'Taller de Cocina', 'De Pago', 'Un taller para aprender recetas fáciles y deliciosas.', '2024-10-20', '2024-10-05', '10:00:00', '13:00:00', 30, 25.00, 30, 'http://example.com/taller_cocina.jpg'),
(7, 6, 'Feria de Emprendedores', 'Gratuito', 'Una feria para conocer nuevos emprendimientos y startups.', '2024-10-25', '2024-10-10', '09:00:00', '17:00:00', 300, 5.00, 300, 'http://example.com/feria_emprendedores.jpg'),
(8, 7, 'Festival de Danza', 'De Pago', 'Un festival con las mejores compañías de danza.', '2024-10-30', '2024-10-15', '15:00:00', '21:00:00', 250, 45.00, 250, 'http://example.com/festival_danza.jpg'),
(9, 8, 'Seminario de Marketing', 'Gratuito', 'Un seminario sobre las últimas tendencias en marketing.', '2024-11-05', '2024-10-20', '10:00:00', '12:00:00', 200, 5.00, 200, 'http://example.com/seminario_marketing.jpg'),
(10, 9, 'Proyección de Película de Terror', 'De Pago', 'Una proyección especial de una película de terror clásica.', '2024-11-10', '2024-10-25', '20:00:00', '22:00:00', 100, 10.00, 100, 'http://example.com/terror.jpg'),
(11, 4, 'Conferencia de Literatura', 'Gratuito', 'Una conferencia sobre los últimos trabajos literarios.', '2024-11-15', '2024-11-01', '09:00:00', '11:00:00', 100, 5.00, 100, 'http://example.com/conferencia_literatura.jpg'),
(12, 2, 'Concierto de Música Clásica', 'De Pago', 'Una noche con los mejores músicos de música clásica.', '2024-11-20', '2024-11-05', '19:00:00', '21:30:00', 200, 50.00, 200, 'http://example.com/clasica.jpg'),
(13, 3, 'Musical de Broadway', 'De Pago', 'Un espectáculo musical directamente desde Broadway.', '2024-11-25', '2024-11-10', '20:00:00', '22:30:00', 150, 60.00, 150, 'http://example.com/musical.jpg'),
(14, 4, 'Podcast de Literatura', 'Gratuito', 'Un podcast en vivo sobre los mejores libros y autores.', '2024-11-30', '2024-11-15', '17:00:00', '18:30:00', 100, 5.00, 100, 'http://example.com/podcast_literatura.jpg'),
(15, 5, 'Taller de Manualidades', 'De Pago', 'Un taller para aprender manualidades creativas.', '2024-12-05', '2024-11-20', '10:00:00', '12:00:00', 30, 20.00, 30, 'http://example.com/taller_manualidades.jpg');

    
    INSERT INTO domicilios (id_cliente, referencia, estado, ciudad, codigo_postal, colonia, calle, telefono) VALUES
(1, 'Cerca del parque central', 'Nuevo León', 'Monterrey', '64000', 'Centro', 'Av. Constitución 123', '8112345678'),
(2, 'Frente a la tienda de abarrotes', 'Jalisco', 'Guadalajara', '44100', 'Americana', 'Calle Hidalgo 456', '3312345678'),
(3, 'A un lado del hospital general', 'Ciudad de México', 'CDMX', '06700', 'Roma Norte', 'Av. Álvaro Obregón 789', '5512345678'),
(4, 'Atrás del centro comercial', 'Puebla', 'Puebla', '72000', 'Centro', 'Calle 5 de Mayo 101', '2221234567'),
(5, 'Cerca del estadio de futbol', 'Nuevo León', 'Monterrey', '64000', 'Centro', 'Calle Colón 202', '8123456789'),
(6, 'En frente de la plaza principal', 'Jalisco', 'Guadalajara', '44100', 'Americana', 'Calle Juárez 303', '3334567890'),
(7, 'Cerca de la escuela primaria', 'Ciudad de México', 'CDMX', '06700', 'Roma Norte', 'Calle Insurgentes 404', '5545678901'),
(8, 'Al lado del museo', 'Puebla', 'Puebla', '72000', 'Centro', 'Calle Reforma 505', '2234567890'),
(9, 'Cerca del mercado municipal', 'Nuevo León', 'Monterrey', '64000', 'Centro', 'Calle Morelos 606', '8145678901'),
(10, 'Atrás del teatro principal', 'Jalisco', 'Guadalajara', '44100', 'Americana', 'Calle Vallarta 707', '3345678901'),
(11, 'A una cuadra del parque', 'Ciudad de México', 'CDMX', '06700', 'Roma Norte', 'Calle Hamburgo 808', '5556789012'),
(12, 'Cerca de la universidad', 'Puebla', 'Puebla', '72000', 'Centro', 'Calle 16 de Septiembre 909', '2245678901'),
(13, 'Frente al banco', 'Nuevo León', 'Monterrey', '64000', 'Centro', 'Calle Zaragoza 111', '8156789012'),
(14, 'A un lado del cine', 'Jalisco', 'Guadalajara', '44100', 'Americana', 'Calle López Mateos 222', '3356789012'),
(15, 'Cerca del hospital de niños', 'Ciudad de México', 'CDMX', '06700', 'Roma Norte', 'Calle Sonora 333', '5567890123'),
(16, 'Frente al parque industrial', 'Puebla', 'Puebla', '72000', 'Centro', 'Calle 2 Norte 444', '2256789012'),
(17, 'A una cuadra del museo de arte', 'Nuevo León', 'Monterrey', '64000', 'Centro', 'Calle Hidalgo 555', '8167890123'),
(18, 'Cerca de la biblioteca central', 'Jalisco', 'Guadalajara', '44100', 'Americana', 'Calle Libertad 666', '3367890123'),
(19, 'Frente a la estación de bomberos', 'Ciudad de México', 'CDMX', '06700', 'Roma Norte', 'Calle Durango 777', '5578901234'),
(20, 'A un lado del parque ecológico', 'Puebla', 'Puebla', '72000', 'Centro', 'Calle 3 Sur 888', '2278901234'),
(1, 'Cerca del centro deportivo', 'Nuevo León', 'Monterrey', '64000', 'Centro', 'Calle Garza Sada 999', '8189012345'),
(2, 'Frente a la estación del metro', 'Jalisco', 'Guadalajara', '44100', 'Americana', 'Calle Américas 111', '3390123456'),
(3, 'A un lado del centro médico', 'Ciudad de México', 'CDMX', '06700', 'Roma Norte', 'Calle Chapultepec 222', '5590123456'),
(4, 'Atrás de la catedral', 'Puebla', 'Puebla', '72000', 'Centro', 'Calle 4 Poniente 333', '2290123456'),
(5, 'Cerca de la terminal de autobuses', 'Nuevo León', 'Monterrey', '64000', 'Centro', 'Calle Pino Suárez 444', '8190123456');

	INSERT INTO roles (rol, descripcion) VALUES
('Administrador', 'Responsable de la administración general del sistema y tiene acceso a todos los sistemas'),
('Administrador de eventos', 'Responable de el apartado de los productos'),
('Administrador de punto de venta', 'Responable de el apartado de punto de venta'),
('Administrador del Menu', 'Responable de el apartado del Menu'),
('Administrador del recompensas', 'Responsable de el sistema de Tarjetas digitales'),
('Administrador de Blogs', 'Encargado de el apartado de Blog'),
('Administrador de Contactos', 'Responsable de el sistema de contactos'),
('Cliente', 'Cliente estándar con acceso limitado a ciertas funciones'),
('Provedor', 'Es aquel que prove materiales a la cafeteria tanto cafes como otros productos');

	INSERT INTO roles_usuarios (id_ru, id_usuario, id_rol) VALUES
(1, 1, 8),
(2, 2, 8),
(3, 3, 8),
(4, 4, 8),
(5, 5, 8),
(6, 6, 8),
(7, 7, 8),
(8, 8, 8),
(9, 9, 8),
(10, 10, 8),
(11, 11, 8),
(12, 12, 8),
(13, 13, 8),
(14, 14, 8),
(15, 15, 8),
(16, 16, 8),
(17, 17, 8),
(18, 18, 8),
(19, 19, 8),
(20, 20, 8),
(21, 21, 1),
(22, 22, 1),
(23, 23, 2),
(24, 24, 3),
(25, 25, 4),
(26, 26, 5),
(27, 27, 6),
(28, 28, 7),
(29, 29, 8),
(30, 30, 9),
(31, 31, 9),
(32, 32, 9),
(33, 33, 9),
(34, 34, 9),
(35, 35, 9),
(36, 36, 9),
(37, 37, 9),
(38, 38, 9),
(39, 39, 9),
(40, 40, 9);


INSERT INTO detalle_productos_menu (id_categoria, nombre, descripcion, img_url) VALUES
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
  


	INSERT INTO productos_menu (id_dpm, medida, precio) VALUES
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


INSERT INTO bolsas_detalle (
	nombre,
    año_cosecha_inicial,
    año_cosecha_final,
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
('Texin Veracruz','2023','2024','Eduardo Vital Díaz', 'Lavado', 'Marsellesa, San Román, Oro Azteca', '1,220 msnm', 'Cacao, Vainilla', 'Cítrica, brillante', 'Choc. Oscuro, Avellana', 'Alto - Denso',85, 'https://example.com/image.jpg'),
('Jaltenango Chiapas','2023','2024','Finca Santa María', 'Lavado', 'Caturra', '1,300 - 1,500 msnm', 'Cítrico, Floral', 'Brillante, Equilibrada', 'Miel, Manzana Verde, Durazno', 'Medio - Denso',86.5, '[https://www.booking.com/hotel/mx/la-joyita.html](https://www.booking.com/hotel/mx/la-joyita.html)'),
('Jaltenango Chiapas','2023','2024','Finca Santa María', 'Natural', 'Marsellesa, Bourbon', '1,350 - 1,450 msnm', 'Dulce de Leche, Nuez', 'Frutal Intensa', 'Almíbar, Naranja', 'Ligero',84, 'https://www.facebook.com/fincaelinjertocafe/');

INSERT INTO bolsas_cafe (
  id_bolsa,
  medida,
  precio,
  stock
)
VALUES 
(1, '1/4 Kg', 85, 10),
(1, '1/2 Kg', 170, 5),
(1, '1 Kg', 340, 2),
(2, '250 g', 130, 20),
(2, '500 g', 250, 15),
(2, '1 Kg', 480, 10),
(3,  '250 g', 80, 20),
(3,  '500 g', 160, 15),
(3,  '1 Kg', 320, 10);

-- Stock disponible inicial:
-- id_bc 1 (1/4 Kg) => 10 unidades
-- id_bc 2 (1/2 Kg) => 5 unidades
-- id_bc 3 (1 Kg) => 2 unidades
-- id_bc 4 (250 g) => 20 unidades
-- id_bc 5 (500 g) => 15 unidades
-- id_bc 6 (1 Kg) => 10 unidades
-- id_bc 7 (250 g) => 20 unidades
-- id_bc 8 (500 g) => 15 unidades
-- id_bc 9 (1 Kg) => 10 unidades
-- Inserts para los primeros 10 clientes
INSERT INTO carrito (id_cliente, id_bc, cantidad, monto_total) VALUES
(1, 1, 1, 85.00),  -- Stock id_bc 1: 9
(1, 2, 2, 340.00), -- Stock id_bc 2: 3
(2, 1, 3, 255.00), -- Stock id_bc 1: 6
(3, 4, 1, 130.00), -- Stock id_bc 4: 19
(3, 7, 2, 160.00), -- Stock id_bc 7: 18
(4, 1, 2, 170.00), -- Stock id_bc 1: 4
(5, 7, 1, 80.00),  -- Stock id_bc 7: 17
(6, 5, 2, 500.00), -- Stock id_bc 5: 13
(7, 1, 1, 85.00),  -- Stock id_bc 1: 3
(8, 8, 3, 480.00), -- Stock id_bc 8: 12
(9, 5, 2, 500.00), -- Stock id_bc 5: 11
(10, 1, 1, 85.00), -- Stock id_bc 1: 2
(10, 5, 2, 500.00),-- Stock id_bc 5: 9
(2, 8, 3, 480.00), -- Stock id_bc 8: 9
(3, 1, 1, 85.00),  -- Stock id_bc 1: 1
(4, 9, 2, 640.00), -- Stock id_bc 9: 8
(5, 5, 1, 250.00), -- Stock id_bc 5: 8
(6, 1, 1, 85.00),  -- Stock id_bc 1: 0
(7, 5, 2, 500.00), -- Stock id_bc 5: 6
(8, 5, 1, 250.00), -- Stock id_bc 5: 5
-- Inserts para los clientes que sobran con más de un producto por carrito de compra
(11, 5, 2, 500.00), -- Stock id_bc 5: 3
(12, 7, 1, 80.00),  -- Stock id_bc 7: 16
(13, 5, 2, 500.00), -- Stock id_bc 5: 1
(14, 6, 3, 1440.00),-- Stock id_bc 6: 7
(15, 7, 1, 80.00),  -- Stock id_bc 7: 15
(16, 8, 3, 720.00), -- Stock id_bc 8: 6
(17, 4, 1, 130.00), -- Stock id_bc 4: 18
(18, 8, 2, 480.00), -- Stock id_bc 8: 4
(19, 4, 1, 130.00), -- Stock id_bc 4: 17
(20, 6, 3, 1440.00),-- Stock id_bc 6: 4
(11, 8, 2, 480.00), -- Stock id_bc 8: 2
(12, 4, 1, 130.00), -- Stock id_bc 4: 16
(13, 8, 2, 480.00), -- Stock id_bc 8: 0
(14, 4, 2, 260.00), -- Stock id_bc 4: 14
(15, 6, 1, 480.00), -- Stock id_bc 6: 3
(16, 7, 2, 160.00); -- Stock id_bc 7: 13

INSERT INTO pedidos (id_cliente, estatus, fecha_hora_pedido, id_domicilio, envio, costo_envio, fecha_entrega_estimada, documento_url) VALUES
(1, 'Finalizado', DATE_SUB(NOW(), INTERVAL 11 DAY) - INTERVAL 5 HOUR, 1, 'Motocicleta', 35.00, DATE_SUB(NOW(), INTERVAL 9 DAY) - INTERVAL 3 HOUR, 'http://example.com/doc1'),
(2, 'Finalizado', DATE_SUB(NOW(), INTERVAL 10 DAY) - INTERVAL 2 HOUR, 2, 'Paquetería profesional', 60.00, DATE_SUB(NOW(), INTERVAL 8 DAY) - INTERVAL 1 HOUR, 'http://example.com/doc2'),
(3, 'En proceso', DATE_SUB(NOW(), INTERVAL 9 DAY) - INTERVAL 6 HOUR, 3, 'Motocicleta', 35.00, DATE_SUB(NOW(), INTERVAL 6 DAY) - INTERVAL 4 HOUR, 'http://example.com/doc3'),
(4, 'En proceso', DATE_SUB(NOW(), INTERVAL 8 DAY) - INTERVAL 3 HOUR, 4, 'Paquetería profesional', 60.00, DATE_SUB(NOW(), INTERVAL 5 DAY) - INTERVAL 2 HOUR, 'http://example.com/doc4'),
(5, 'Pendiente', DATE_SUB(NOW(), INTERVAL 7 DAY) - INTERVAL 4 HOUR, 5, 'Motocicleta', 35.00, DATE_SUB(NOW(), INTERVAL 4 DAY) - INTERVAL 3 HOUR, 'http://example.com/doc5'),
(6, 'Pendiente', DATE_SUB(NOW(), INTERVAL 6 DAY) - INTERVAL 1 HOUR, 6, 'Paquetería profesional', 60.00, DATE_SUB(NOW(), INTERVAL 3 DAY) - INTERVAL 5 HOUR, 'http://example.com/doc6'),
(7, 'Pendiente', DATE_SUB(NOW(), INTERVAL 5 DAY) - INTERVAL 6 HOUR, 7, 'Motocicleta', 35.00, DATE_SUB(NOW(), INTERVAL 2 DAY) - INTERVAL 1 HOUR, 'http://example.com/doc7'),
(8, 'En proceso', DATE_SUB(NOW(), INTERVAL 4 DAY) - INTERVAL 2 HOUR, 8, 'Paquetería profesional', 60.00, DATE_SUB(NOW(), INTERVAL 1 DAY) - INTERVAL 4 HOUR, 'http://example.com/doc8'),
(9, 'En proceso', DATE_SUB(NOW(), INTERVAL 3 DAY) - INTERVAL 5 HOUR, 9, 'Motocicleta', 35.00, DATE_SUB(NOW(), INTERVAL 1 DAY) - INTERVAL 2 HOUR, 'http://example.com/doc9'),
(10, 'Pendiente', DATE_SUB(NOW(), INTERVAL 2 DAY) - INTERVAL 3 HOUR, 10, 'Paquetería profesional', 60.00, NOW() - INTERVAL 1 HOUR, 'http://example.com/doc10'),
(11, 'Pendiente', DATE_SUB(NOW(), INTERVAL 1 DAY) - INTERVAL 4 HOUR, 11, 'Motocicleta', 35.00, NOW() + INTERVAL 1 DAY - INTERVAL 2 HOUR, 'http://example.com/doc11'),
(12, 'En proceso', DATE_SUB(NOW(), INTERVAL 3 DAY) - INTERVAL 6 HOUR, 12, 'Paquetería profesional', 60.00, NOW() + INTERVAL 2 DAY - INTERVAL 5 HOUR, 'http://example.com/doc12'),
(13, 'Pendiente', DATE_SUB(NOW(), INTERVAL 2 DAY) - INTERVAL 5 HOUR, 13, 'Motocicleta', 35.00, NOW() + INTERVAL 1 DAY - INTERVAL 3 HOUR, 'http://example.com/doc13'),
(14, 'En proceso', DATE_SUB(NOW(), INTERVAL 5 DAY) - INTERVAL 2 HOUR, 14, 'Paquetería profesional', 60.00, NOW() + INTERVAL 1 DAY - INTERVAL 4 HOUR, 'http://example.com/doc14'),
(15, 'Pendiente', DATE_SUB(NOW(), INTERVAL 6 DAY) - INTERVAL 3 HOUR, 15, 'Motocicleta', 35.00, NOW() + INTERVAL 3 DAY - INTERVAL 1 HOUR, 'http://example.com/doc15'),
(16, 'En proceso', DATE_SUB(NOW(), INTERVAL 4 DAY) - INTERVAL 1 HOUR, 16, 'Paquetería profesional', 60.00, NOW() + INTERVAL 4 DAY - INTERVAL 2 HOUR, 'http://example.com/doc16'),
(17, 'Pendiente', DATE_SUB(NOW(), INTERVAL 2 DAY) - INTERVAL 6 HOUR, 17, 'Motocicleta', 35.00, NOW() + INTERVAL 2 DAY - INTERVAL 3 HOUR, 'http://example.com/doc17'),
(18, 'En proceso', DATE_SUB(NOW(), INTERVAL 7 DAY) - INTERVAL 5 HOUR, 18, 'Paquetería profesional', 60.00, NOW() + INTERVAL 2 DAY - INTERVAL 1 HOUR, 'http://example.com/doc18'),
(19, 'Cancelado', DATE_SUB(NOW(), INTERVAL 8 DAY) - INTERVAL 4 HOUR, 19, 'Motocicleta', 35.00, NOW() + INTERVAL 1 DAY - INTERVAL 3 HOUR, 'http://example.com/doc19'),
(20, 'Cancelado', DATE_SUB(NOW(), INTERVAL 9 DAY) - INTERVAL 6 HOUR, 20, 'Paquetería profesional', 60.00, NOW() + INTERVAL 3 DAY - INTERVAL 2 HOUR, 'http://example.com/doc20');


    INSERT INTO eventos_reservas (id_cliente, id_evento, c_boletos, monto_total, estatus, fecha_hora_reserva)
VALUES
    -- Reservas para el evento 1 (Taller de Cerámica)
    (1, 1, 2, 30.00, 'Apartada', '2024-06-27 14:30:00'),
    (2, 1, 3, 45.00, 'Pendiente', '2024-06-28 10:00:00'),
    (3, 1, 1, 15.00, 'Pendiente', '2024-06-29 11:45:00'),

    -- Reservas para el evento 2 (Concierto de Jazz)
    (4, 2, 2, 50.00, 'Apartada', '2024-06-30 16:20:00'),
    (5, 2, 4, 100.00, 'Pendiente', '2024-07-01 09:30:00'),

    -- Reservas para el evento 3 (Obra de Teatro Clásica)
    (6, 3, 2, 40.00, 'Pendiente', '2024-07-02 15:00:00'),
    (7, 3, 3, 60.00, 'Apartada', '2024-07-03 18:00:00'),

    -- Reservas para el evento 4 (Podcast en Vivo)
    (8, 4, 1, 5.00, 'Apartada', '2024-07-04 12:45:00'),

    -- Reservas para el evento 5 (Taller de Pintura)
    (9, 5, 3, 45.00, 'Pendiente', '2024-07-04 08:30:00'),
    (10, 5, 2, 30.00, 'Pendiente', '2024-07-03 14:00:00'),

    -- Reservas para el evento 6 (Feria de Artesanías)
    (11, 6, 5, 25.00, 'Apartada', '2024-07-02 11:00:00'),

    -- Reservas para el evento 7 (Festival de Música Indie)
    (12, 7, 2, 60.00, 'Pendiente', '2024-07-01 17:30:00'),

    -- Reservas para el evento 8 (Seminario de Tecnología)
    (13, 8, 1, 5.00, 'Apartada', '2024-06-30 19:15:00'),

    -- Reservas para el evento 9 (Proyección de Película Clásica)
    (14, 9, 2, 24.00, 'Pendiente', '2024-06-29 13:00:00'),

    -- Reservas para el evento 10 (Concierto de Rock)
    (15, 10, 3, 90.00, 'Pendiente', '2024-06-28 16:45:00'),

    -- Reservas para el evento 11 (Obra de Teatro Moderna)
    (16, 11, 2, 50.00, 'Apartada', '2024-06-27 10:20:00'),

    -- Reservas para el evento 12 (Podcast de Historia)
    (17, 12, 1, 5.00, 'Pendiente', '2024-06-26 14:00:00'),

    -- Reservas para el evento 13 (Taller de Fotografía)
    (18, 13, 2, 40.00, 'Pendiente', '2024-06-26 11:30:00'),

    -- Reservas para el evento 14 (Feria del Libro)
    (19, 14, 3, 15.00, 'Apartada', '2024-06-27 09:45:00'),

    -- Reservas para el evento 15 (Festival de Cine Independiente)
    (20, 15, 4, 160.00, 'Pendiente', '2024-06-28 18:00:00');

INSERT INTO detalle_pedidos (id_pedido, id_bc, precio_unitario, cantidad, monto_total) VALUES
(1, 1, 85.00, 1, 85.00),
(1, 2, 170.00, 2, 340.00),
(2, 1, 85.00, 3, 255.00),
(3, 4, 130.00, 1, 130.00),
(3, 7, 80.00, 2, 160.00),
(4, 1, 85.00, 2, 170.00),
(5, 7, 80.00, 1, 80.00),
(6, 5, 250.00, 2, 500.00),
(7, 1, 85.00, 1, 85.00),
(8, 8, 160.00, 3, 480.00),
(9, 5, 250.00, 2, 500.00),
(10, 1, 85.00, 1, 85.00),
(10, 5, 250.00, 2, 500.00),
(2, 8, 160.00, 3, 480.00),
(3, 1, 85.00, 1, 85.00),
(4, 9, 320.00, 2, 640.00),
(5, 5, 250.00, 1, 250.00),
(6, 1, 85.00, 1, 85.00),
(7, 5, 250.00, 2, 500.00),
(8, 5, 250.00, 1, 250.00),
(11, 5, 250.00, 2, 500.00),
(12, 7, 80.00, 1, 80.00),
(13, 5, 250.00, 2, 500.00),
(14, 6, 480.00, 3, 1440.00),
(15, 7, 80.00, 1, 80.00),
(16, 8, 160.00, 3, 720.00),
(17, 4, 130.00, 1, 130.00),
(18, 8, 160.00, 2, 480.00),
(19, 4, 130.00, 1, 130.00),
(20, 6, 480.00, 3, 1440.00),
(11, 8, 160.00, 2, 480.00),
(12, 4, 130.00, 1, 130.00),
(13, 8, 160.00, 2, 480.00),
(14, 4, 130.00, 2, 260.00),
(15, 6, 480.00, 1, 480.00),
(16, 7, 80.00, 2, 160.00);


/*
-- Inserts para la tabla comprobantes
INSERT INTO comprobantes (concepto, referencia, folio_operacion, fecha, monto, banco_origen, imagen_comprobante) VALUES
('Pago de pedido finalizado', 'REF-2024-001', 'FOLIO-001', DATE_SUB(NOW(), INTERVAL 7 DAY) , 35.00, 'Bancomer', 'http://example.com/comprobante1.jpg'),
('Pago de pedido finalizado', 'REF-2024-002', 'FOLIO-002', DATE_SUB(NOW(), INTERVAL 8 DAY) , 60.00, 'Santander', 'http://example.com/comprobante2.jpg'),
('Pago de pedido en proceso', 'REF-2024-003', 'FOLIO-003', DATE_SUB(NOW(), INTERVAL 9 DAY) , 35.00, 'Banorte', 'http://example.com/comprobante3.jpg'),
('Pago de pedido en proceso', 'REF-2024-004', 'FOLIO-004', DATE_SUB(NOW(), INTERVAL 4 DAY) , 60.00, 'HSBC', 'http://example.com/comprobante4.jpg'),
('Pago de pedido en proceso', 'REF-2024-005', 'FOLIO-005', DATE_SUB(NOW(), INTERVAL 2 DAY) , 35.00, 'Bancomer', 'http://example.com/comprobante5.jpg'),
('Pago de pedido en proceso', 'REF-2024-006', 'FOLIO-006', DATE_SUB(NOW(), INTERVAL 4 DAY) , 60.00, 'Santander', 'http://example.com/comprobante6.jpg'),
('Pago de pedido apartado', 'REF-2024-007', 'FOLIO-007', DATE_SUB(NOW(), INTERVAL 3 DAY) , 35.00, 'Banorte', 'http://example.com/comprobante7.jpg'),
('Pago de pedido apartado', 'REF-2024-008', 'FOLIO-008', DATE_SUB(NOW(), INTERVAL 6 DAY) , 60.00, 'HSBC', 'http://example.com/comprobante8.jpg'),
('Pago de pedido apartado', 'REF-2024-009', 'FOLIO-009', DATE_SUB(NOW(), INTERVAL 5 DAY) , 35.00, 'Bancomer', 'http://example.com/comprobante9.jpg'),
('Pago de pedido apartado', 'REF-2024-010', 'FOLIO-010', DATE_SUB(NOW(), INTERVAL 7 DAY) , 60.00, 'Santander', 'http://example.com/comprobante10.jpg'),
('Pago de pedido apartado', 'REF-2024-011', 'FOLIO-011', DATE_SUB(NOW(), INTERVAL 6 DAY) , 35.00, 'Banorte', 'http://example.com/comprobante11.jpg'),
('Pago de pedido apartado', 'REF-2024-012', 'FOLIO-012', DATE_SUB(NOW(), INTERVAL 9 DAY) , 60.00, 'HSBC', 'http://example.com/comprobante12.jpg'),
('Pago de pedido apartado', 'REF-2024-013', 'FOLIO-013', DATE_SUB(NOW(), INTERVAL 5 DAY) , 35.00, 'Bancomer', 'http://example.com/comprobante13.jpg'),
('Pago de pedido en proceso', 'REF-2024-014', 'FOLIO-014', DATE_SUB(NOW(), INTERVAL 4 DAY) , 60.00, 'Santander', 'http://example.com/comprobante14.jpg'),
('Pago de pedido apartado', 'REF-2024-015', 'FOLIO-015', DATE_SUB(NOW(), INTERVAL 3 DAY) , 35.00, 'Banorte', 'http://example.com/comprobante15.jpg');

INSERT INTO comprobantes_pedidos (id_comprobante, id_pedido)
VALUES
(1, 1),  -- Sustituir con los valores reales de id_comprobante e id_pedido
(2, 2),
(3, 3),
(4, 4),
(5, 8),
(6, 9),
(7, 12),
(8, 16),
(9, 18),
(10, 20);

-- Inserts para comprobantes_reservas
INSERT INTO comprobantes_reservas (id_comprobante, id_reserva)
VALUES
(11, 1),  
(12, 3),
(13, 7),
(14, 8),
(15, 11),
(16, 15),
(17, 16),
(18, 18);
*/-- Inserts para la tabla comprobantes_pedidos
/*
INSERT INTO comprobantes (concepto, referencia, folio_operacion, fecha, monto, banco_origen, imagen_comprobante)
SELECT CONCAT('Concepto ', p.id_pedido) AS concepto,
       CONCAT('Ref-', p.id_pedido) AS referencia,
       CONCAT('Folio-', p.id_pedido) AS folio_operacion,
       p.fecha_hora_pedido AS fecha,
       p.costo_envio AS monto,
       'Banco Ejemplo' AS banco_origen,
       CONCAT('http://example.com/comprobante-', p.id_pedido, '.jpg') AS imagen_comprobante
FROM pedidos p
WHERE p.estatus IN ('Finalizado', 'En proceso', 'Apartada')

UNION ALL

SELECT CONCAT('Reserva Evento ', r.id_evento) AS concepto,
       CONCAT('Ref-Evento-', r.id_evento) AS referencia,
       CONCAT('Folio-Evento-', r.id_evento) AS folio_operacion,
       r.fecha_hora_reserva AS fecha,
       r.monto_total AS monto,
       'Banco Ejemplo' AS banco_origen,
       CONCAT('http://example.com/comprobante-evento-', r.id_evento, '.jpg') AS imagen_comprobante
FROM eventos_reservas r
WHERE r.estatus IN ('Finalizado', 'En proceso', 'Apartada');
*/
INSERT INTO comprobantes (concepto, referencia, folio_operacion, fecha, monto, banco_origen, imagen_comprobante)
VALUES
    ('Concepto 1', 'Ref-1', 'Folio-1', '2024-06-26', '35.00', 'Banco Ejemplo', 'http://example.com/comprobante-1.jpg'),
    ('Concepto 2', 'Ref-2', 'Folio-2', '2024-06-27', '60.00', 'Banco Ejemplo', 'http://example.com/comprobante-2.jpg'),
    ('Concepto 3', 'Ref-3', 'Folio-3', '2024-06-28', '35.00', 'Banco Ejemplo', 'http://example.com/comprobante-3.jpg'),
    ('Concepto 4', 'Ref-4', 'Folio-4', '2024-06-29', '60.00', 'Banco Ejemplo', 'http://example.com/comprobante-4.jpg'),
    ('Concepto 8', 'Ref-8', 'Folio-8', '2024-07-03', '60.00', 'Banco Ejemplo', 'http://example.com/comprobante-8.jpg'),
    ('Concepto 9', 'Ref-9', 'Folio-9', '2024-07-04', '35.00', 'Banco Ejemplo', 'http://example.com/comprobante-9.jpg'),
    ('Concepto 12', 'Ref-12', 'Folio-12', '2024-07-04', '60.00', 'Banco Ejemplo', 'http://example.com/comprobante-12.jpg'),
    ('Concepto 14', 'Ref-14', 'Folio-14', '2024-07-02', '60.00', 'Banco Ejemplo', 'http://example.com/comprobante-14.jpg'),
    ('Concepto 16', 'Ref-16', 'Folio-16', '2024-07-03', '60.00', 'Banco Ejemplo', 'http://example.com/comprobante-16.jpg'),
    ('Concepto 18', 'Ref-18', 'Folio-18', '2024-06-30', '60.00', 'Banco Ejemplo', 'http://example.com/comprobante-18.jpg'),
    ('Reserva Evento 1', 'Ref-Evento-1', 'Folio-Evento-1', '2024-06-27', '30.00', 'Banco Ejemplo', 'http://example.com/comprobante-evento-1.jpg'),
    ('Reserva Evento 2', 'Ref-Evento-2', 'Folio-Evento-2', '2024-06-30', '50.00', 'Banco Ejemplo', 'http://example.com/comprobante-evento-2.jpg'),
    ('Reserva Evento 3', 'Ref-Evento-3', 'Folio-Evento-3', '2024-07-03', '60.00', 'Banco Ejemplo', 'http://example.com/comprobante-evento-3.jpg'),
    ('Reserva Evento 4', 'Ref-Evento-4', 'Folio-Evento-4', '2024-07-04', '5.00', 'Banco Ejemplo', 'http://example.com/comprobante-evento-4.jpg'),
    ('Reserva Evento 6', 'Ref-Evento-6', 'Folio-Evento-6', '2024-07-02', '25.00', 'Banco Ejemplo', 'http://example.com/comprobante-evento-6.jpg'),
    ('Reserva Evento 8', 'Ref-Evento-8', 'Folio-Evento-8', '2024-06-30', '5.00', 'Banco Ejemplo', 'http://example.com/comprobante-evento-8.jpg'),
    ('Reserva Evento 11', 'Ref-Evento-11', 'Folio-Evento-11', '2024-06-27', '50.00', 'Banco Ejemplo', 'http://example.com/comprobante-evento-11.jpg'),
    ('Reserva Evento 14', 'Ref-Evento-14', 'Folio-Evento-14', '2024-06-27', '15.00', 'Banco Ejemplo', 'http://example.com/comprobante-evento-14.jpg');


INSERT INTO comprobantes_pedidos (id_comprobante, id_pedido)
VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 8),
(6, 9),
(7, 12),
(8, 14),
(9, 15),
(10, 17);

-- Inserciones para comprobantes_reservas
INSERT INTO comprobantes_reservas (id_comprobante, id_reserva)
VALUES
(11, 1),
(12, 4),
(13, 6),
(14, 7),
(15, 8),
(16, 11),
(17, 16),
(18, 19);

-- Inserts de las tarjetas de fidelidad
-- Inserts para tarjetas
INSERT INTO tarjetas (id_cliente, progreso) VALUES
    (1, 8),
    (2, 12),
    (3, 7),
    (4, 15),
    (5, 20),
    (6, 18),
    (7, 10),
    (8, 14);

-- Inserts para asistencias
INSERT INTO asistencias (id_tarjeta, fecha_hora_asistencia) VALUES
    (1, '2024-07-01 10:00:00'),
    (2, '2024-07-01 11:30:00'),
    (3, '2024-07-01 13:00:00'),
    (4, '2024-07-02 09:00:00'),
    (5, '2024-07-02 10:30:00'),
    (6, '2024-07-02 11:45:00'),
    (7, '2024-07-03 08:30:00'),
    (8, '2024-07-03 10:00:00'),
    (1, '2024-07-04 09:15:00'),
    (2, '2024-07-04 10:45:00'),
    (3, '2024-07-04 12:00:00'),
    (4, '2024-07-05 08:45:00'),
    (5, '2024-07-05 10:15:00'),
    (6, '2024-07-05 11:30:00'),
    (7, '2024-07-06 09:00:00'),
    (8, '2024-07-06 10:30:00');

-- Inserts para recompensas
INSERT INTO recompensas (recompensa, condicion, fecha_inicio, fecha_expiracion, estatus, img_url) VALUES
    ('Café gratis', 5, '2024-07-01', '2024-07-31', 'Activa', NULL),
    ('Descuento', 10, '2024-07-01', '2024-08-31', 'Activa', NULL),
    ('Dos bebidas gratis', 15, '2024-07-01', '2024-09-30', 'Activa', NULL);

-- Inserts para tarjeta_recompensas
INSERT INTO tarjeta_recompensas (id_tarjeta, id_recompensa, canje) VALUES
    (1, 1, true),  -- progreso 8 >= 5
    (2, 1, true),  -- progreso 12 >= 5
    (3, 1, true),  -- progreso 7 >= 5
    (4, 1, true),  -- progreso 15 >= 5
    (5, 1, true),  -- progreso 20 >= 5
    (6, 1, true),  -- progreso 18 >= 5
    (7, 1, true),  -- progreso 10 >= 5
    (8, 1, true),  -- progreso 14 >= 5

    (2, 2, true),  -- progreso 12 >= 10
    (4, 2, true),  -- progreso 15 >= 10
    (5, 2, true),  -- progreso 20 >= 10
    (6, 2, true),  -- progreso 18 >= 10
    (7, 2, true),  -- progreso 10 >= 10
    (8, 2, true),  -- progreso 14 >= 10

    (4, 3, true),  -- progreso 15 >= 15
    (5, 3, true),  -- progreso 20 >= 15
    (6, 3, true);  -- progreso 18 >= 15

/ si funciono el script, no le hagas caso a la tacha roja :)
   
    select * from categorias;
    select * from ubicacion_lugares;
	select * from contacto;
    select * from proveedores;
    select * from publicaciones;
    select * from personas;
    select * from empleados;
    select * from clientes;
    select * from usuarios;
    select * from domicilios;
    select * from roles; 
    select * from roles_usuarios; 
	select * from detalle_productos_menu;
	select * from productos_menu;
    
    
    
    select * from bolsas_cafe;
    select * from bolsas_detalle;
    select * from carrito;

    select * from detalle_pedidos;
    select * from pedidos;
    
     select * from eventos;
    select * from eventos_reservas;
    
    select * from comprobantes;
    select * from comprobantes_pedidos;
    select * from comprobantes_reservas;

