<?php
include('connection.php');
$con = connection();

$id_usuario = null;
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];


$sql = "INSERT INTO usuarios VALUES ('$id_usuario', '$usuario', '$contraseña')";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index_usuarios.php");
};

?>