<?php
include("Config.php");

$nombre=$_POST["nombre"];
$email=$_POST["email"];
$clave=$_POST["clave"];
$telefono=$_POST["telefono"];
$id=$_POST["Id"];

$sql="UPDATE `usuario` SET nombre='".$nombre."', email='".$email."',clave='".md5($clave)."', telefono='".$telefono."' WHERE idUsuario =" .$id;


if(mysqli_query($con, $sql))
{
    header("Location: Usuario.php");
}
else
{
  echo"error: .$sql. <br>". mysqli_error($con);
}
mysqli_close($con);
?>