<?php
include('connection.php');
$con = connection();

$id_producto = $_POST['id_producto'] ?? '';
$nombre = $_POST['nombre'] ?? '';
$precio = $_POST['precio'] ?? '';
$stock = $_POST['stock'] ?? '';
$id_tipo = $_POST['id_tipo'] ?? '';
$id_usuario = $_POST['id_usuario'] ?? '';

$sql = "UPDATE producto SET nombre=?, precio=?, stock=?, id_tipo=?, id_usuario=? WHERE id_producto=?";
$stmt = mysqli_prepare($con, $sql);

$tipos = "ssiiii";
mysqli_stmt_bind_param($stmt, $tipos, $nombre, $precio, $stock, $id_tipo, $id_usuario, $id_producto);

$query = mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);

if($query){
    Header("Location: index_producto.php");
};

mysqli_close($con);
?>
