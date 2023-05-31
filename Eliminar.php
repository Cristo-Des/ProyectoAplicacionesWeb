<?php
include("Config.php");

$id=$_GET["id"];

$sql="UPDATE `autousado` SET estatus = 0 WHERE idAutoUsado=$id";


if(mysqli_query($con, $sql))
{
    header("Location: AutoUsado.php");

}
else
{
  echo"error: .$sql. <br>". mysqli_error($con);
}

mysqli_close($con);
?>
