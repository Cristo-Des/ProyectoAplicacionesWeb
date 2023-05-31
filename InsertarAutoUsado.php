<?php
include("Config.php");

$precioTransaccion=$_POST["Precio"];
$marca=$_POST["Marca"];
$modelo=$_POST["Modelo"];
$matricula=$_POST["Matricula"];
$cliente=$_POST["Cliente"];
$fechasesion=$_POST["Sesión"];


$sql="INSERT INTO autousado (precioTransaccion,marca,modelo,matricula,idCliente,fechaCesion)VALUES(".$precioTransaccion.",'".$marca."','".$modelo."','".$matricula."','".$cliente."','".$fechasesion."')";


if(mysqli_query($con, $sql))
{
    header("Location: AutoUsado.php");
}
else
{
  echo"error: .$sql. <br>". mysqli_error($con);
}
mysqli_close($con);
?>