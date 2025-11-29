<?php
include('connection.php');
include('menu.php');
$con = connection();


$id_tipo = $_GET['id_tipo'];

$sql = "SELECT * FROM tipo_producto WHERE id_tipo= '$id_tipo'";
$query =mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tipo de Producto </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        /* Fondo gris claro consistente */
        body {
            background-color: #f8f9fa; 
            min-height: 100vh;
        }

        /* Definición del color cálido primario */
        :root {
            --bs-carmine-warm: #ffc107; /* El mismo color que usamos en el login */
        }
        
        /* Estilo para el título principal, usando un color neutro con un acento cálido */
        .title-warm-accent {
            color: #343a40; /* Texto oscuro y neutral */
            font-weight: 700;
            border-bottom: 4px solid var(--bs-carmine-warm); /* Línea cálida de acento */
            padding-bottom: 5px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        
        <div class="card p-5 shadow-lg" style="max-width: 500px; width: 90%; border-radius: 1rem;">

            <div class="tipo_form">
                <form action="edit_tipo.php" method="POST">
                    
                    <h1 class="text-center title-warm-accent mb-5">
                        <i class="bi bi-tags me-2"></i> Editar Tipo de Producto
                    </h1>
                    
                    <div class="mb-3">
                        <label class="form-label text-muted fw-bold">ID del Tipo</label>
                        <input type="hidden" name="id_tipo" value="<?= htmlspecialchars($row['id_tipo']) ?>">
                        <input type="text" class="form-control bg-light" value="<?= htmlspecialchars($row['id_tipo']) ?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="nombre" class="form-label fw-bold">Tipo de Producto</label>
                        <input type="text" id="nombre" name="nombre" placeholder="Electrodomésticos" class="form-control" value="<?= htmlspecialchars($row['nombre']) ?>" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="descripcion" class="form-label fw-bold">Descripción</label>
                        <input type="text" id="descripcion" name="descripcion" placeholder="Descripción breve" class="form-control" value="<?= htmlspecialchars($row['descripcion']) ?>" required>
                    </div>

                    <input type="submit" value="Actualizar" class="btn btn-warning text-dark fw-bold w-100 mt-3 shadow-sm">
                </form>
            </div>
            
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>