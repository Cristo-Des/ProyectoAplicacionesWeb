<?php
include("Config.php");

$id=$_GET["id"];

$sql="UPDATE `Opcion` SET estatus = 0 WHERE idOpcion=$id";


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