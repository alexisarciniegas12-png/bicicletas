<?php
// Incluye el archivo que contiene el código HTML del menú.
// Asegúrate de que 'menu.php' esté en la misma carpeta o ajusta la ruta.
include('menu.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Inicio Simple</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <style>
        /* Estilos específicos para el cuerpo del dashboard */
        body {
            background-color: #f8f9fa; /* Fondo gris muy claro */
            min-height: 100vh; 
        }
        .main-content {
            padding: 20px;
        }
        .welcome-card {
            background-color: #ffffff; /* Fondo blanco para la tarjeta */
            border-radius: .5rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05); /* Sombra ligera para hacerlo flotante */
            padding: 30px;
            min-height: 150px;
        }
        .page-title {
            color: #343a40; 
            font-size: 1.5rem;
            margin-bottom: 20px;
            margin-top: 20px; /* Espacio para separar del menú incluido */
        }
    </style>
</head>
<body>

<div class="container main-content">
    
    <h2 class="page-title">Inicio</h2>
    
    <div class="welcome-card">
        <p class="h4 text-secondary">Bienvenido</p>
    </div>
    
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>