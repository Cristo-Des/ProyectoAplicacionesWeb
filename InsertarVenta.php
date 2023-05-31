<?php
include("Config.php");

$matricula=$_POST["matricula"];
$fechaVenta=$_POST["FechaVenta"];
$Vendedor=$_POST["vendedor"];
$Vehiculo=$_POST["vehiculo"];



$sql="INSERT INTO venta (matriculaCoche,fechaVenta,idVendedor,idVehículo)VALUES('".$matricula."','".$fechaVenta."','".$Vendedor."','".$Vehiculo."')";


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

    