<?php
include("Config.php");

$id=$_GET["id"];

$sql="UPDATE `venta` SET estatus = 0 WHERE idVenta=$id";


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