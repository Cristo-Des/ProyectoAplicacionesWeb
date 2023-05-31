<?php
include("Config.php");

$id=$_GET["id"];

$sql="UPDATE `cliente` SET estatus = 0 WHERE idCliente=$id";


if(mysqli_query($con, $sql))
{
    header("Location: Cliente.php");

}
else
{
  echo"error: .$sql. <br>". mysqli_error($con);
}

mysqli_close($con);
?>