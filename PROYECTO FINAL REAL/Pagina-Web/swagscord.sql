CREATE DATABASE IF NOT EXISTS swagscord;
USE swagscord;

CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL
);

CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10,2) NOT NULL,
    carpeta_imagenes VARCHAR(500) NOT NULL,
    categoria_id INT,
    stock INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id) ON DELETE SET NULL
);

INSERT INTO categorias (nombre) VALUES ('Ropa'), ('Accesorios');

INSERT INTO admin (usuario, password) VALUES ('admin', 'swag123');

INSERT INTO productos (nombre, descripcion, precio, carpeta_imagenes, categoria_id, stock) VALUES

-- ACCESORIOS (categoria_id = 2)
('Bingo Leather Belt', 'Cinturón de piel de alpaca de primera calidad con hebilla de acero inoxidable bañada en oro. Edición limitada colaboración con diseñador japonés. Incluye packaging exclusivo.', 289.00, 'img/Accesorios/BINGO-LEATHER-BELT-ALPACA/', 2, FLOOR(RAND() * 20) + 1),
('Bolsa de bolitas ABC Camuflaje', 'Bolso estilo boston elaborado con lona de camuflaje de alta densidad. Interior forrado en poliéster, cierre de cordón ajustable y asas reforzadas. Perfecto para el día a día con un toque militar.', 349.00, 'img/Accesorios/Bolsa-de-bolos-ABC-Camuflaje-para-mujer/', 2, FLOOR(RAND() * 20) + 1),
('Bolsa Ecológica Baby Milo', 'Bolsa ecológica confeccionada con materiales reciclados certificados. Incluye llavero coleccionable de Baby Milo diseñado exclusivamente para esta colección. Capacidad 15L, resistente al agua.', 179.00, 'img/Accesorios/BOLSA-ECOLÓGICA-CON-LLAVERO-DE-BABY-MILO/', 2, FLOOR(RAND() * 20) + 1),
('Bolso Boston Pequeño Baby Milo', 'Bolso tipo Boston en edición ultra limitada con parche bordado de Baby Milo. Piel sintética de alta durabilidad, cremalleras personalizadas y compartimento acolchado para tablet.', 399.00, 'img/Accesorios/BOLSO-BOSTON-PEQUEÑO-BABY-MILO-N.° 2/', 2, FLOOR(RAND() * 20) + 1),
('Bolso Para Móvil Baby Milo', 'Bolso bandolera mini diseñado exclusivamente para smartphone. Incluye correa ajustable, tarjetero integrado y llavero magnético intercambiable. Compatible con iPhone y Samsung.', 129.00, 'img/Accesorios/BOLSO-PARA-MÓVIL-BABY-MILO/', 2, FLOOR(RAND() * 20) + 1),
('Cadena Corazón Angeles', 'Collar artesanal de plata de ley 925 con baño de rodio. Colgante de corazón con alas tallado a mano. Cadena ajustable de 45-55cm. Incluye estuche de terciopelo negro.', 195.00, 'img/Accesorios/Cadena-corazon-angeles/', 2, FLOOR(RAND() * 20) + 1),
('Cadena Guadaña', 'Collar estilo hardcore coreano con colgante de guadaña en chapado de plata oxidada. Cadena rolo de 3mm, cierre de mosquetón con seguridad. Ideal para looks alternativos.', 225.00, 'img/Accesorios/Cadena-guadaña/', 2, FLOOR(RAND() * 20) + 1),
('Cadena Gameboy Surfera', 'Collar colgante de Gameboy retro con diseño de olas surf. Fabricado en resina epoxi y acero inoxidable. Edición limitada de 500 unidades numeradas.', 245.00, 'img/Accesorios/cadena-surfera-gameboy/', 2, FLOOR(RAND() * 20) + 1),
('Elixir Belt', 'Cinturón de la marca Elixir con hebilla intercambiable. Piel genuina grabada con patrones exclusivos. Incluye dos hebillas (plateada y dorada) y funda protectora.', 279.00, 'img/Accesorios/Elixir-Belt/', 2, FLOOR(RAND() * 20) + 1),
('Elixir KeyChain', 'Llavero multifunción con diseño Dark Spider Boots. Fabricado en aleación de zinc con acabado en negro mate. Incluye abridor, destornillador mini y clip mosquetón.', 89.00, 'img/Accesorios/Elixir-KeyChain-Dark-Spider-Boots/', 2, FLOOR(RAND() * 20) + 1),
('Gorro Hannah Montana', 'Gorro de punto vintage con parche bordado de Hannah Montana. Edición nostálgica limitada. Lana acrílica de alta calidad, forro interior de polar para el frío.', 135.00, 'img/Accesorios/Hannah-montana-gorro/', 2, FLOOR(RAND() * 20) + 1),
('Llavero Baby Milo', 'Llavero oficial de Baby Milo con figura de vinilo rígido de 5cm. Articulación móvil en brazos y piernas. Incluye tarjeta de autenticidad numerada.', 79.00, 'img/Accesorios/Llavero-de-Baby-Milo/', 2, FLOOR(RAND() * 20) + 1),
('Llavero Peluche ALII', 'Llavero de peluche premium de la colección ALII. Tejido hipoalergénico, relleno de fibra de silicona. Diseño ultra suave, colgante metálico adicional.', 95.00, 'img/Accesorios/Llavero-de-peluche-ALII/', 2, FLOOR(RAND() * 20) + 1),
('Llavero Peluche BAPE X KUROMI', 'Llavero de colaboración exclusiva BAPE x KUROMI. Peluche de edición limitada con etiqueta serigrafiada. Incluye cadena metalizada dorada.', 118.00, 'img/Accesorios/Llavero-de-peluche-BAPE-X-KUROMI/', 2, FLOOR(RAND() * 20) + 1),
('Llavero Reflectante Baby Milo', 'Llavero con material reflectante 3M de alta visibilidad. Figura de Baby Milo en vinilo flexible. Ideal para mochilas y llaves. Edición seguridad vial.', 72.00, 'img/Accesorios/Llavero-reflectante-de-Baby-Milo/', 2, FLOOR(RAND() * 20) + 1),
('Gorra Mickey Mouse Vintage', 'Gorra trucker vintage de Mickey Mouse con malla transpirable. Visera curva curvada, broche regulable trasero. Edición conmemorativa 100 años Disney.', 142.00, 'img/Accesorios/Mickey-Mouse-Vintage-gorra/', 2, FLOOR(RAND() * 20) + 1),
('Mochila Baby Milo Grande', 'Mochila de gran capacidad con compartimento para portátil de 17". Cremalleras YKK, correas acolchadas y parche bordado de Baby Milo. Interior organizador con múltiples bolsillos.', 359.00, 'img/Accesorios/MOCHILA-BABY-MILO-(GRANDE)/', 2, FLOOR(RAND() * 20) + 1),
('Stars Leather Belt', 'Cinturón de piel de grano completo con estrellas perforadas a mano. Hebilla de latón envejecido de edición limitada. Ancho 3.8cm, largo ajustable.', 249.00, 'img/Accesorios/STARS-LEATHER-BELT-BLACK/', 2, FLOOR(RAND() * 20) + 1),
('Tipo 9 BAPEX', 'Reloj estilo BAPEX en edición dorada. Caja de acero inoxidable bañado en oro de 24k, esfera de nácar con diamantes de imitación. Resistente al agua 50m. Edición numerada.', 899.00, 'img/Accesorios/TIPO-9-BAPEX-2/', 2, FLOOR(RAND() * 20) + 1),
('Varsity Leather Belt', 'Cinturón estilo universitario con hebilla de cierre automático. Piel de becerro teñida al anilina. Bordes pintados a mano a juego con el color.', 275.00, 'img/Accesorios/VARSITY-LEATHER-ELT-BLUE-MIX/', 2, FLOOR(RAND() * 20) + 1),

-- ROPA (categoria_id = 1)
('ABC Camo Hoodie', 'Sudadera oversize con capucha y estampado de tiburón en camuflaje ABC. Tejido 100% algodón peinado de 500gsm. Bordados 3D en capucha. Edición limitada Tokyo Kid.', 489.00, 'img/Ropa/ABC-CAMO-TOWEL-JACQUARD-SHARK-CROPPED-FULL-ZIP-HOODIE-LADIES/', 1, FLOOR(RAND() * 20) + 1),
('BAPE x Kazuki Kuraishi Hoodie', 'Colaboración exclusiva entre BAPE y el artista Kazuki Kuraishi. Sudadera half-zip con estampado de tiburón en relieve. Tejido japonés de alta densidad. Solo 300 unidades.', 599.00, 'img/Ropa/BAPE-BY-KAZUKI-KURAISHI-HALF-ZIP-SHARK-RELAXED-FIT-HOOD/', 1, FLOOR(RAND() * 20) + 1),
('BAPE Snowboard Jacket', 'Chaquetón técnico para snowboard con aislamiento térmico 3M. Membrana impermeable 20k. Capucha extraíble con visera. Bolsillo para goggles. Edición colaboración.', 1250.00, 'img/Ropa/BAPE-BY-KAZUKI-KURAISHI-SHARK-ZIP-PACKABLE-SNOWBOARD-JACKET/', 1, FLOOR(RAND() * 20) + 1),
('BAPE x Bounty Hunter Tee', 'Camiseta colaboración BAPE x Bounty Hunter. Estampado serigráfico de alta resistencia. Corte relajado, 100% algodón orgánico. Edición limitada.', 349.00, 'img/Ropa/BAPE-X-BOUNTY-HUNTE-MAD-SHARK-TEE-MENS/', 1, FLOOR(RAND() * 20) + 1),
('BAPE x Hello Kitty Tee', 'Camiseta colaboración BAPE x Hello Kitty. Estampado frontal lámina dorada. Tejido premium japonés. Incluye etiqueta de autenticidad numerada.', 399.00, 'img/Ropa/BAPE-X-HELLO-KITTY-CAMI/', 1, FLOOR(RAND() * 20) + 1),
('BAPE x Mr College Tee', 'Camiseta BAPE x Mr College con estampado retro. Corte oversize, acabado envejecido en mangas. Algodón ringspun de 250gsm.', 389.00, 'img/Ropa/BAPE-X-MR-COLLEGE-RELAXED-FIT-TEE/', 1, FLOOR(RAND() * 20) + 1),
('BAPE Shark Hoodie', 'Chupa icónica BAPE. Tejido japonés.', 589.00, 'img/Ropa/Chupa-BAPE-SHARK/', 1, FLOOR(RAND() * 20) + 1),
('Disrupt Shorts', 'Pantalón corto estilo cargo con múltiples bolsillos. Tejido ripstop resistente al desgarro. Cintura elástica con cordón ajustable. Ideal para streetwear.', 245.00, 'img/Ropa/DISRUPT-SHORTS-LIGH-BLUE/', 1, FLOOR(RAND() * 20) + 1),
('Elixir Rhinestones Zip Up', 'Chaqueta Elixir completamente bordada con pedrería de cristal cosida a mano. Cremallera YKK dorada. Interior de satén. Edición limitada 100 unidades.', 649.00, 'img/Ropa/Elixir-Black-Rhinestones-v2-zip-Up/', 1, FLOOR(RAND() * 20) + 1),
('Elixir Cross Bagg Jeans', 'Pantalón vaquero con cruces bordadas en hilo dorado. Tejido denim japonés de 14oz. Lavado ácido personalizado. Incluye cadena decorativa desmontable.', 559.00, 'img/Ropa/Elixir-Cross-Bagg-Jeans/', 1, FLOOR(RAND() * 20) + 1),
('Elixir Inverted Hoodie', 'Sudadera con pedrería invertida en la capucha. Tejido french terry de algodón orgánico. Estampado termocrómico que cambia de color con el calor.', 529.00, 'img/Ropa/Elixir-Inverted-Rhinestones-Hoodie/', 1, FLOOR(RAND() * 20) + 1),
('Farm Shirt', 'Camisa tipo overshirt con bolsillos de parche. Tejido de lino y algodón. Botones de concha natural. Acabado stone wash para aspecto envejecido.', 285.00, 'img/Ropa/FARM-SHIRT-WHITE/', 1, FLOOR(RAND() * 20) + 1),
('New Multi Camo Hoodie', 'Sudadera con estampado multi camuflaje de edición especial. Capucha doble capa con bordado 3D. Tejido polar reversible. One piece kids edition.', 495.00, 'img/Ropa/NEW-MULTI-CAMO-HARK-HOODIE-ONEPIECE-KIDS/', 1, FLOOR(RAND() * 20) + 1),
('Pantalón Supreme', 'Pantalón cargo Supreme edición limitada. Tejido de nailon resistente al agua. Múltiples bolsillos con velcro. Parche logo bordado. Solo 200 unidades.', 599.00, 'img/Ropa/pantalon-supreme/', 1, FLOOR(RAND() * 20) + 1),
('Pantalón Diesel Campana', 'Pantalón estilo campana de la colección vintage Diesel. Tejido denim elástico. Lavado a la piedra. Corte bootcut, perfecto para zapatillas o botas.', 449.00, 'img/Ropa/pnatalon-diesel-campana/', 1, FLOOR(RAND() * 20) + 1),
('Studs Pants', 'Pantalón vaquero con tachuelas de metal cosidas a mano en todo el largo. Denim japonés de 12oz. Ajuste skinny, tachuelas de aleación de zinc.', 529.00, 'img/Ropa/STUDS-PANTS-BLACK-DENIM/', 1, FLOOR(RAND() * 20) + 1),
('Sudadera BAPE Classic', 'Sudadera BAPE clásica con logo camuflaje bordado. Tejido de algodón japonés de 550gsm. Corte regular, puños y dobladillo acanalados. Edición permanente.', 479.00, 'img/Ropa/sudadera-bape/', 1, FLOOR(RAND() * 20) + 1),
('Supreme Playboy Hoodie', 'Sudadera colaboración Supreme x Playboy con logo de conejo y caja. Tejido crossover, capucha forrada. Estampado lámina dorada. Edición 2025.', 699.00, 'img/Ropa/Supreme-Playboy-Hooded-MA-1/', 1, FLOOR(RAND() * 20) + 1),
('Tree Edge Laser Cut Hoodie', 'Sudadera con capucha y corte láser en patrón de árbol. Tejido técnico transpirable. Cremallera oculta, bolsillos sellados. Edición limitada diseño arquitectónico.', 549.00, 'img/Ropa/TREE-EDGE-AMO-LASER-CUT-CROPPED-SHARK-FULL-ZIP-HOODIE-MENS/', 1, FLOOR(RAND() * 20) + 1);