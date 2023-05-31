<?php
include("Config.php");

$matricula=$_POST["matricula"];
$fechaVenta=$_POST["FechaVenta"];
$Vendedor=$_POST["vendedor"];
$Vehiculo=$_POST["vehiculo"];
$id=$_POST["Id"];

$sql="UPDATE `venta` SET matriculaCoche='".$matricula."', fechaVenta='".$fechaVenta."',idVendedor=".$Vendedor.",idVehículo=".$Vehiculo." WHERE idVenta =" .$id;


if(mysqli_query($con, $sql))
{
    header("Location: Venta.php");
}
else
{
  echo"error: .$sql. <br>". mysqli_error($con);
}
mysqli_close($con);
?>