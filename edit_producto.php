<?php
include('connection.php');
$con = connection();


$id_producto = $_POST['id_producto'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];
$id_tipo = $_POST['id_tipo'];
$id_usuario = $_POST['id_usuario'];

$sql = "UPDATE producto SET nombre='$nombre', precio='$precio', stock='$stock', id_tipo='$id_tipo', id_usuario='$id_usuario' WHERE id_producto='$id_producto'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index_producto.php");
};

?>