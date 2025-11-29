<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Bicicletas </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <style>
        /* Definición del color cálido primario (Amarillo/Naranja de Bootstrap 'warning') */
        :root {
            --bs-carmine-warm: #ffc107; /* El mismo color que usamos en el botón de login */
            --bs-carmine-dark: #e0a800; /* Un tono más oscuro para el hover */
        }

        /* ================================================= */
        /* === 1. ESTILOS DE LA BARRA DE NAVEGACIÓN (WARM) === */
        /* ================================================= */
        .navbar-custom {
            background-color: #ffffff; /* Fondo blanco */
            /* Cambiado de azul a naranja/amarillo para la línea inferior */
            border-bottom: 1px solid var(--bs-carmine-warm); 
            padding-top: .75rem;
            padding-bottom: .75rem;
        }
        
        .navbar-custom .nav-link {
            color: #394046ff; /* Texto gris por defecto */
            font-weight: 500;
            margin-right: 2rem;
            padding-bottom: 0.8rem;
            position: relative;
            text-transform: uppercase;
        }
        
        /* ================================================= */
        /* === 2. ESTILOS DE ENLACES (WARM HOVER/ACTIVO) === */
        /* ================================================= */
        /* El color del enlace activo/hover cambia al color cálido primario */
        .navbar-custom .nav-link:hover,
        .navbar-custom .nav-link.active {
            color: var(--bs-carmine-warm); 
        }
        
        /* Línea inferior cálida para el elemento activo */
        .navbar-custom .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 30px; 
            height: 3px;
            /* El color de la línea activa cambia al color cálido primario */
            background-color: var(--bs-carmine-warm); 
            border-radius: 2px;
        }
        
        /* ================================================= */
        /* === 3. ESTILO DE CERRAR SESIÓN (Naranja fuerte) === */
        /* ================================================= */
        .logout-link {
            color: #dc3545 !important; /* Rojo de Bootstrap (danger) para acciones de salida, es un buen contraste */
            font-weight: bold;
            transition: color 0.3s;
        }
        .logout-link:hover {
            color: #b02a37 !important;
        }

    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom">
  <div class="container-fluid px-5">
    
    <a class="navbar-brand me-5" href="#">
        <div style="width: 40px; height: 40px; border-radius: 50%; border: 1px solid #ffc107;"></div>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavSimple" aria-controls="navbarNavSimple" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNavSimple">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard.php">Inicio</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="index_usuarios.php">Usuarios</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="index_tipo.php">Tipo de Producto</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="index_producto.php">Productos</a>
        </li>
        
      </ul>
      
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link logout-link" href="login.php">CERRAR SESIÓN</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>

<div class="container mt-4">
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>