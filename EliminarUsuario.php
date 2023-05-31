<?php
include("Config.php");

$id=$_GET["id"];

$sql="UPDATE `usuario` SET estatus = 0 WHERE idUsuario=$id";


if(mysqli_query($con, $sql))
{
    header("Location: Usuario.php");

}
else
{
  echo"error: .$sql. <br>". mysqli_error($con);
}

mysqli_close($con);
?>