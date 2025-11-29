<?php
include('connection.php');
$con = connection();


$id_tipo = $_POST['id_tipo'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];


$sql = "UPDATE tipo_producto SET nombre='$nombre', descripcion='$descripcion' WHERE id_tipo='$id_tipo'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index_tipo.php");
};

?>