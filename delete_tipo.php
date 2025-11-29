<?php
include('connection.php');
$con = connection();


$id_tipo = $_GET['id_tipo'];


$sql = " DELETE FROM tipo_producto WHERE id_tipo='$id_tipo'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index_tipo.php");
};
?>
