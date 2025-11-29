<?php
include('connection.php');
$con = connection();

$id_tipo = null;
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];


$sql = "INSERT INTO tipo_producto VALUES ('$id_tipo', '$nombre', '$descripcion')";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index_tipo.php");
};

?>