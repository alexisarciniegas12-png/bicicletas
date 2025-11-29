<?php
include('connection.php');
include('menu.php'); // Asegúrate de que este archivo contiene el menú

$con = connection();

$sql = "SELECT * FROM producto";
$query = mysqli_query($con, $sql);

// Consultas separadas para los selects de foreign keys
$queryTipos = mysqli_query($con, "SELECT id_tipo, nombre FROM tipo_producto");
$queryUsuarios = mysqli_query($con, "SELECT id_usuario, usuario FROM usuarios"); // Asumo que hay una tabla 'usuarios'
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        /* Fondo gris claro consistente con el dashboard */
        body {
            background-color: #f8f9fa; 
            min-height: 100vh;
        }

        /* Definición del color cálido primario (Amarillo/Naranja de Bootstrap 'warning') */
        :root {
            --bs-carmine-warm: #ffc107; 
            --bs-carmine-dark: #e0a800; 
        }

        /* Estilo para la cabecera de la tabla (Color cálido con texto oscuro) */
        .table-warm-header {
            background-color: var(--bs-carmine-warm);
            color: #343a40; /* Texto oscuro para buen contraste */
            border-bottom: 2px solid var(--bs-carmine-dark);
        }

        /* Estilo para los títulos principales */
        .title-warm {
            color: #343a40; /* Título oscuro y neutral */
            font-weight: 700;
            border-bottom: 4px solid var(--bs-carmine-warm);
            padding-bottom: 10px;
            display: inline-block;
        }
    </style>
</head>
<body>
    
    <div class="container my-5">
        
        <h1 class="mb-5 title-warm">Gestión de Productos</h1>
        
        <div class="card p-4 shadow-lg mb-5 border-0">
            <div class="card-header bg-light border-0 pt-3" style="border-top: 5px solid var(--bs-carmine-warm);">
                <h3 class="card-title text-secondary mb-0 fw-bold">
                    <i class="bi bi-plus-circle me-2 text-dark"></i> Agregar Nuevo Producto
                </h3>
            </div>
            
            <div class="card-body">
                <form action="insert_producto.php" method="POST" class="row g-3">
                    
                    <div class="col-md-6">
                        <label for="nombre" class="form-label text-muted">Nombre del Producto</label>
                        <input type="text" name="nombre" id="nombre" placeholder="Nombre del producto" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="precio" class="form-label text-muted">Precio</label>
                        <input type="number" step="0.001" name="precio" id="precio" placeholder="0.000" class="form-control" required>
                    </div>

                    <div class="col-md-4">
                        <label for="stock" class="form-label text-muted">Stock</label>
                        <input type="number" name="stock" id="stock" placeholder="Cantidad" class="form-control" required>
                    </div>

                    <div class="col-md-4">
                        <label for="id_tipo" class="form-label text-muted">Tipo de Producto</label>
                        <select id="id_tipo" name="id_tipo" class="form-select" required>
                            <option value="">Seleccione un tipo</option>
                            <?php 
                                // Resetear el puntero de la consulta para usarla aquí
                                mysqli_data_seek($queryTipos, 0);
                                while($tipo = mysqli_fetch_assoc($queryTipos)): 
                            ?>
                                <option value="<?= htmlspecialchars($tipo['id_tipo']) ?>">
                                    <?= htmlspecialchars($tipo['id_tipo']) ?> - <?= htmlspecialchars($tipo['nombre']) ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    
                    <div class="col-md-4">
                        <label for="id_usuario" class="form-label text-muted">Usuario Creador</label>
                        <select id="id_usuario" name="id_usuario" class="form-select" required>
                             <option value="">Seleccione un usuario</option>
                            <?php 
                                // Consulta y bucle para usuarios
                                mysqli_data_seek($queryUsuarios, 0);
                                while($usuario = mysqli_fetch_assoc($queryUsuarios)): 
                            ?>
                                <option value="<?= htmlspecialchars($usuario['id_usuario']) ?>">
                                    <?= htmlspecialchars($usuario['id_usuario']) ?> - <?= htmlspecialchars($usuario['usuario']) ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="col-12 mt-4">
                        <input type="submit" value="Agregar producto" class="btn btn-warning text-dark fw-bold w-100 shadow-sm">
                    </div>
                </form>
            </div>
        </div>

        <div>
            <h2 class="mb-4 text-secondary">
                <i class="bi bi-box-seam me-2 text-dark"></i> Productos Registrados
            </h2>
            
            <div class="table-responsive shadow-sm rounded-3 overflow-hidden">
                <table class="table table-striped table-hover">
                    <thead class="table-warm-header">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>ID_tipo</th>
                            <th>ID_usuario</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_array($query)): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id_producto']) ?></td>
                            <td><?= htmlspecialchars($row['nombre']) ?></td>
                            <td>$<?= number_format(htmlspecialchars($row['precio']), 2) ?></td>
                            <td><?= htmlspecialchars($row['stock']) ?></td> 
                            <td><?= htmlspecialchars($row['id_tipo']) ?></td>
                            <td><?= htmlspecialchars($row['id_usuario']) ?></td> 
                            
                            <td class="text-center">
                                <a href="update_producto.php?id_producto=<?= htmlspecialchars($row['id_producto']) ?>" class="btn btn-sm btn-info text-white me-2">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>
                                <a href="delete_producto.php?id_producto=<?= htmlspecialchars($row['id_producto']) ?>" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash-fill"></i> Eliminar
                                </a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>