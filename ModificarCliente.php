<?php
include("Config.php");

$nombre=$_POST["Nombre"];
$rfc=$_POST["RFC"];
$apellidoP=$_POST["ApellidoP"];
$apellidoM=$_POST["ApellidoM"];
$direccion=$_POST["Direccion"];
$telefono=$_POST["Telefono"];
$fechaventa=$_POST["fechaVenta"];
$id=$_POST["Id"];

$sql="UPDATE `cliente` SET nombre='".$nombre."', rfc='".$rfc."',apellidoPaterno='".$apellidoP."',apellidoMaterno='".$apellidoM."',direccion='".$direccion."',telefono='".$telefono."',idVenta='".$fechaventa."' WHERE idCliente =" .$id;


if(mysqli_query($con, $sql))
{
    header("Location: Cliente.php");
}
else
{
  echo"error: .$sql. <br>". mysqli_error($con);
}
mysqli_close($con);
?>