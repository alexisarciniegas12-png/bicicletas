<?php
include('connection.php');
$con = connection();


$id_usuario = $_GET['id_usuario'];


$sql = " DELETE FROM usuarios WHERE id_usuario='$id_usuario'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index_usuarios.php");
};
?>
