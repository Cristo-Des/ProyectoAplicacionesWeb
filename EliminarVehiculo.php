<?php
include("Config.php");

$id=$_GET["id"];

$sql="UPDATE `vehículo` SET estatus = 0 WHERE idVehículo=$id";


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