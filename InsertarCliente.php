<?php
include("Config.php");

$nombre=$_POST["Nombre"];
$rfc=$_POST["RFC"];
$apellidoP=$_POST["ApellidoP"];
$apellidoM=$_POST["ApellidoM"];
$direccion=$_POST["Direccion"];
$telefono=$_POST["Telefono"];
$fechaventa=$_POST["fechaVenta"];

$sql="INSERT INTO Cliente (nombre,rfc,apellidoPaterno,apellidoMaterno,direccion,telefono,idVenta)VALUES('".$nombre."','".$rfc."','".$apellidoP."','".$apellidoM."','".$direccion."','".$telefono."','".$fechaventa."')";


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