<?php

 include("Config.php");
 $nombre = $_POST["nombre"];
 $email = $_POST["email"];
 $clave = $_POST["password"];
 $telefono = $_POST["telefono"];


 $sql="INSERT INTO usuario (nombre,email,clave,telefono)VALUES('".$nombre."','".$email."','".md5($clave)."','".$telefono."')";

 if(mysqli_query($con, $sql))
   {
        header("Location: index.html");
   }
 else
    {
        echo"error: .$sql. <br>". mysqli_error($con);
    }
        mysqli_close($con);
?>                 