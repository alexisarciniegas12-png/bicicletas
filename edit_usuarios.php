<?php
include('connection.php');
$con = connection();


$id_usuario = $_POST['id_usuario'];
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];


$sql = "UPDATE usuarios SET usuario='$usuario', contraseña='$contraseña' WHERE id_usuario='$id_usuario'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index_usuarios.php");
};

?>