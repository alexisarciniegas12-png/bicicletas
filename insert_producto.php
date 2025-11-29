<?php
include('connection.php');
$con = connection();

$id_producto = null;
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];
$id_tipo = $_POST['id_tipo'];
$id_usuario = $_POST['id_usuario']; // <-- CORREGIDO

$sql = "INSERT INTO producto (id_producto, nombre, precio, stock, id_tipo, id_usuario)
        VALUES (NULL, '$nombre', '$precio', '$stock', '$id_tipo', '$id_usuario')";

$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index_producto.php");
}
?>
