<?php
$servername="localhost";
$database="consecionariodeautos";
$username="root";
$password="";
$con = mysqli_connect($servername,$username,$password, $database) or die ("Conexion fallida");
return $con;
?>