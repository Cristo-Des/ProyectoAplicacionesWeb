<?php
include("Config.php");

$precioTransaccion=$_POST["Precio"];
$marca=$_POST["Marca"];
$modelo=$_POST["Modelo"];
$matricula=$_POST["Matricula"];
$cliente=$_POST["Cliente"];
$fechasesion=$_POST["Sesión"];
$id=$_POST["Id"];

$sql="UPDATE `autousado` SET precioTransaccion=".$precioTransaccion.", marca='".$marca."',modelo='".$modelo."',matricula='".$matricula."',idCliente='".$cliente."',fechaCesion='".$fechasesion."' WHERE idAutoUsado =" .$id;


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