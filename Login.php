<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class=" p-3 mb-2 bg-primary text-white">
<header>
<?php
session_start();
include("Config.php");
$email=$_POST["email"];
$contra=$_POST["password"];


$resultado = $con->query("SELECT * FROM usuario where email = '$email'");
$fila = $resultado->fetch_array(MYSQLI_ASSOC);


if ($fila["clave"] == md5($contra)) 
{
    $_SESSION['usuario']=$fila["nombre"];
    $_SESSION['id']=$fila["idUsuario"];
    header('Location: Inicio.php');
}
else 
{
    echo '<div class="mi-auto" align="center" >
    <h1>Contraseña Incorrecta </h1><br><br>
    <a algin="rhigt"  href="index.html" ><button type="button"  class="btn btn-danger">Regresar</button></a>
    </div>';
    return;
}
?>
</body>
</html>