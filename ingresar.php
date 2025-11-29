<?php
include('connection.php');
$con = connection();

$id_usuario = null;
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

// **Aviso Importante de Seguridad:**
// Tu código es vulnerable a inyección SQL. Esta es la corrección funcional, 
// pero se recomienda fuertemente usar sentencias preparadas (prepared statements).
$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contraseña='$contraseña'";
$query = mysqli_query($con, $sql);

if($query) {
    // Verificar si se encontró al menos una fila (usuario)
    if(mysqli_num_rows($query) > 0) {
        // Usuario encontrado, redirigir al dashboard
        Header("Location: dashboard.php");
        exit(); // Es buena práctica usar exit() después de un Header("Location: ...")
    } else {
        // No se encontró el usuario (credenciales incorrectas)
        echo "Credenciales incorrectas.";
        // O redirigir a una página de error o login
    }
} else {
    // Hubo un error en la ejecución de la consulta SQL
    echo "Error en la consulta: " . mysqli_error($con);
}
?>