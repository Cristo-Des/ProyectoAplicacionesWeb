<?php
include("Config.php");

$nombre=$_POST["Nombre"];
$rfc=$_POST["RFC"];
$apellidoP=$_POST["ApellidoP"];
$apellidoM=$_POST["ApellidoM"];
$direccion=$_POST["Direccion"];
$telefono=$_POST["Telefono"];


$sql="INSERT INTO vendedor (nombre,rfc,apellidoPaterno,apellidoMaterno,direccion,telefono)VALUES('".$nombre."','".$rfc."','".$apellidoP."','".$apellidoM."','".$direccion."','".$telefono."')";


if(mysqli_query($con, $sql))
{
    header("Location: Vendedor.php");
}
else
{
  echo"error: .$sql. <br>". mysqli_error($con);
}
mysqli_close($con);
?>