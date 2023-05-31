<?php
include("Config.php");

$nuOpcion=$_POST["NuOpcion"];
$nombre=$_POST["nombre"];
$descripcion=$_POST["descripcion"];
$id=$_POST["Id"];

$sql="UPDATE `opcion` SET nuOpcion='".$nuOpcion."', nombre='".$nombre."',descripcion='".$descripcion."' WHERE idOpcion =" .$id;


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