<?php
include("Config.php");

$precio=$_POST["precio"];
$marca=$_POST["marca"];
$modelo=$_POST["modelo"];
$matricula=$_POST["matricula"];
$cilindros=$_POST["cilindros"];


$sql="INSERT INTO vehículo (precioTransaccion,marca,modelo,matricula,cilindros)VALUES(".$precio.",'".$marca."','".$modelo."','".$matricula."','".$cilindros."')";


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