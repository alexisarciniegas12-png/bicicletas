<?php
include('connection.php');
include('menu.php'); // Asegúrate de que este archivo contiene el menú

$con = connection();

$sql = "SELECT * FROM usuarios";
$query = mysqli_query($con, $sql)
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios </title>
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
        
        <h1 class="mb-5 title-warm">Gestión de Usuarios</h1>
        
        <div class="card p-4 shadow-lg mb-5 border-0">
            <div class="card-header bg-light border-0 pt-3" style="border-top: 5px solid var(--bs-carmine-warm);">
                <h3 class="card-title text-secondary mb-0 fw-bold">
                    <i class="bi bi-person-plus me-2 text-dark"></i> Agregar Nuevo Usuario
                </h3>
            </div>
            
            <div class="card-body">
                <form action="insert_usuarios.php" method="POST" class="row g-3 align-items-end">
                    
                    <div class="col-md-5">
                        <label for="usuario" class="form-label text-muted">Nombre de Usuario</label>
                        <input type="text" name="usuario" id="usuario" placeholder="usuario@ejemplo.com" class="form-control" required>
                    </div>
                    
                    <div class="col-md-5">
                         <label for="contrasena" class="form-label text-muted">Contraseña</label>
                        <input type="password" name="contraseña" id="contrasena" placeholder="Contraseña" class="form-control" required>
                    </div>
                    
                    <div class="col-md-2">
                        <input type="submit" value="Agregar usuario" class="btn btn-warning text-dark fw-bold w-100">
                    </div>
                </form>
            </div>
        </div>

        <div>
            <h2 class="mb-4 text-secondary">
                <i class="bi bi-people-fill me-2 text-dark"></i> Usuarios Registrados
            </h2>
            
            <div class="table-responsive shadow-sm rounded-3 overflow-hidden">
                <table class="table table-striped table-hover">
                    <thead class="table-warm-header">
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>
                            <th class="text-center">Acciones</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_array($query)): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id_usuario']) ?></td>
                            <td><?= htmlspecialchars($row['usuario']) ?></td>
                            <td><?= htmlspecialchars($row['contraseña']) ?></td> 

                            <td class="text-center">
                                <a href="update_usuarios.php?id_usuario=<?= htmlspecialchars($row['id_usuario']) ?>" class="btn btn-sm btn-info text-white me-2">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>
                                <a href="delete_usuarios.php?id_usuario=<?= htmlspecialchars($row['id_usuario']) ?>" class="btn btn-sm btn-danger">
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