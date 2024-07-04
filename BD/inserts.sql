
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

-- Asignar personas a la tabla clientes
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


	select * from clientes;
    select * from empleados;
    select * from proveedores;
    select * from publicaciones;
    select * from personas;
    select * from usuarios;
    
    