<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        /* ================================================= */
        /* === 1. ESTILOS GLOBALES Y FONDO (GRADIENTE CÁLIDO) === */
        /* ================================================= */
        body {
            /* Degradado de fondo cálido (Naranja suave a Amarillo pálido) */
            background: linear-gradient(135deg, #ff9a8d 0%, #ffc371 100%); 
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        /* ================================================= */
        /* === 2. CONTENEDOR PRINCIPAL (Uso de clases de Bootstrap) === */
        /* ================================================= */
        .main-wrapper {
            /* d-flex: display: flex
            bg-white: background-color: white
            rounded-3: border-radius: 0.5rem 
            shadow-lg: box-shadow grande
            overflow-hidden: oculta el desbordamiento
            */
            max-width: 1000px;
            width: 90%;
            transition: transform 0.3s ease;
        }

        .main-wrapper:hover {
            transform: translateY(-5px);
        }

        /* ================================================= */
        /* === 3. IMAGEN LATERAL (Restaurada) === */
        /* ================================================= */
        .image-side {
            /* Flex-fill y min-width son importantes para la distribución */
            flex: 1; 
            /* Imagen de ejemplo con tonos cálidos/neutrales */
            background-image: url('https://dma.canyon.com/image/upload/w_700,h_700,c_fill/f_auto/q_auto/2025_Sale_Stealth_x_Web_Homepage_City_2400x2400_ALL_lj0dvy'); 
            background-size: cover;
            background-position: center;
            min-width: 400px; /* Tamaño mínimo para que se vea en desktop */
        }

        /* ================================================= */
        /* === 4. FORMULARIO DE LOGIN (Clases de Bootstrap) === */
        /* ================================================= */
        .login-side {
            /* d-flex flex-column justify-content-center: centrado vertical */
            flex: 1;
            padding: 50px 40px; 
            min-width: 350px;
        }

        /* Título */
        .login-side h1 {
            color: #333333; 
            margin-bottom: 35px;
            font-size: 32px;
            /* Borde inferior en color cálido primario de Bootstrap (warning) */
            border-bottom: 3px solid #ffc107; 
            display: inline-block;
            padding-bottom: 5px;
            text-align: center;
            width: 100%;
        }

        /* Botón de Bootstrap */
        .btn-warning {
            /* Ajuste del warning de Bootstrap para que se vea más cálido y tenga buen contraste */
            background-color: #ffc107;
            border-color: #ffc107;
        }
        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #e0a800;
        }
        
        /* ================================================= */
        /* === 5. MEDIA QUERIES (RESPONSIVIDAD) === */
        /* ================================================= */
        @media (max-width: 850px) {
            .main-wrapper {
                flex-direction: column; 
                max-width: 450px;
                width: 90%;
            }

            .image-side {
                /* Se oculta la imagen en pantallas muy pequeñas, ya que ocupaba mucho espacio */
                display: none !important; 
            }
        }
    </style>
</head>
<body>
    <div class="main-wrapper d-flex bg-white rounded-3 shadow-lg overflow-hidden">
        
        <div class="image-side d-none d-md-block"> 
        </div>
        
        <div class="login-side d-flex flex-column justify-content-center">
            <h1>INICIAR SESIÓN</h1>
            
            <form action="ingresar.php" method="POST">
                
                <div class="mb-3">
                    <label for="usuario" class="form-label fw-bold text-secondary">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingresa tu usuario">
                </div>

                <div class="mb-3">
                    <label for="contrasena" class="form-label fw-bold text-secondary">Contraseña</label>
                    <input type="password" class="form-control" id="contrasena" name="contraseña" placeholder="Ingresa tu contraseña">
                </div>
                
                <button type="submit" class="btn btn-warning text-dark fw-bold shadow-sm mt-4 w-100" name="ingresar">INGRESAR</button>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>