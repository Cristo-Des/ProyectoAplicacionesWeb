<?php
include("Config.php");

$nuOpcion=$_POST["NuOpcion"];
$nombre=$_POST["nombre"];
$descripcion=$_POST["descripcion"];

$sql="INSERT INTO opcion (nuOpcion,nombre,descripcion)VALUES(".$nuOpcion.",'".$nombre."','".$descripcion."')";


if(mysqli_query($con, $sql))
{
    header("Location: Opcion.php");
}
else
{
  echo"error: .$sql. <br>". mysqli_error($con);
}
mysqli_close($con);
?>