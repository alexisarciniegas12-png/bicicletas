<?php
include('connection.php');
include('menu.php');
$con = connection();


$id_producto = $_GET['id_producto'];

$sql = "SELECT * FROM producto WHERE id_producto= '$id_producto'";
$query =mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);

// Consultas para llenar los SELECTs
$queryTipos = mysqli_query($con, "SELECT id_tipo, nombre FROM tipo_producto");
$queryUsuarios = mysqli_query($con, "SELECT id_usuario, usuario FROM usuarios");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto </title>
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
            --bs-carmine-warm: #ffc107; 
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

            <div class="producto_form">
                <form action="edit_producto.php" method="POST">
                    
                    <h1 class="text-center title-warm-accent mb-5">
                        <i class="bi bi-box-seam me-2"></i> Editar Producto
                    </h1>
                    
                    <div class="mb-3">
                        <label class="form-label text-muted fw-bold">ID del Producto</label>
                        <input type="hidden" name="id_producto" value="<?= htmlspecialchars($row['id_producto']) ?>">
                        <input type="text" class="form-control bg-light" value="<?= htmlspecialchars($row['id_producto']) ?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="nombre" class="form-label fw-bold">Nombre</label>
                        <input type="text" id="nombre" name="nombre" placeholder="Nombre del producto" class="form-control" value="<?= htmlspecialchars($row['nombre']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="precio" class="form-label fw-bold">Precio</label>
                        <input type="number" step="0.01" id="precio" name="precio" placeholder="Precio" class="form-control" value="<?= htmlspecialchars($row['precio']) ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="stock" class="form-label fw-bold">Stock</label>
                        <input type="number" id="stock" name="stock" placeholder="Stock" class="form-control" value="<?= htmlspecialchars($row['stock']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="id_tipo" class="form-label fw-bold">Tipo de Producto</label>
                        <select id="id_tipo" name="id_tipo" class="form-select" required>
                            <?php 
                                while($tipo = mysqli_fetch_assoc($queryTipos)): 
                                    $selected = ($row['id_tipo'] == $tipo['id_tipo']) ? 'selected' : '';
                            ?>
                                <option value="<?= htmlspecialchars($tipo['id_tipo']) ?>" <?= $selected ?>>
                                    <?= htmlspecialchars($tipo['id_tipo']) ?> - <?= htmlspecialchars($tipo['nombre']) ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    
                    <div class="mb-4">
                        <label for="id_usuario" class="form-label fw-bold">Usuario Creador</label>
                        <select id="id_usuario" name="id_usuario" class="form-select" required>
                            <?php 
                                while($usuario = mysqli_fetch_assoc($queryUsuarios)): 
                                    $selected = ($row['id_usuario'] == $usuario['id_usuario']) ? 'selected' : '';
                            ?>
                                <option value="<?= htmlspecialchars($usuario['id_usuario']) ?>" <?= $selected ?>>
                                    <?= htmlspecialchars($usuario['id_usuario']) ?> - <?= htmlspecialchars($usuario['usuario']) ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <input type="submit" value="Actualizar" class="btn btn-warning text-dark fw-bold w-100 mt-3 shadow-sm">
                </form>
            </div>
            
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>