<?php
include('connection.php');
$con = connection();

$usuario = $_POST['usuario'] ?? '';
// La contraseña se toma directamente del POST sin cifrar
$contraseña = $_POST['contraseña'] ?? ''; 

// Consulta con marcadores de posición (?)
// Usamos sentencias preparadas para prevenir la Inyección SQL, aunque la contraseña no esté cifrada.
$sql = "INSERT INTO usuarios (usuario, contraseña) VALUES (?, ?)";

$stmt = mysqli_prepare($con, $sql);

// Vinculamos los parámetros: 'ss' (string, string)
$tipos = "ss";
mysqli_stmt_bind_param($stmt, $tipos, $usuario, $contraseña);

$query = mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);

if($query){
    Header("Location: index_usuarios.php");
};

mysqli_close($con);
?>
