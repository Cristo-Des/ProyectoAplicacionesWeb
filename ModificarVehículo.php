<?php
include("Config.php");

$precio=$_POST["precio"];
$marca=$_POST["marca"];
$modelo=$_POST["modelo"];
$matricula=$_POST["matricula"];
$cilindros=$_POST["cilindros"];
$id=$_POST["Id"];

$sql="UPDATE `vehículo` SET precioTransaccion=".$precio.", marca='".$marca."',modelo='".$modelo."', matricula='".$matricula."',cilindros=".$cilindros." WHERE idVehículo =" .$id;


if(mysqli_query($con, $sql))
{
    header("Location: Vehiculo.php");
}
else
{
  echo"error: .$sql. <br>". mysqli_error($con);
}
mysqli_close($con);
?>