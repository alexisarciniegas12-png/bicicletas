<?php
include('connection.php');
$con = connection();


$id_producto = $_GET['id_producto'];


$sql = " DELETE FROM producto WHERE id_producto='$id_producto'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index_producto.php");
};
?>
