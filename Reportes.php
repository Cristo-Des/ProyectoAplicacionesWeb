<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="ejemplo.css">

<title>Reportes</title>
</head>
<body>
     <?php
     include("Config.php");
     session_start();
if (empty($_SESSION['usuario'])) 
{
  header('location: index.html');
  return;
}
// cerrar sesion session_destroy();
   $usuario = $_SESSION['usuario'];
   $id = $_SESSION['id'];
   echo'
   <nav class="navbar navbar-expand-lg navbar-success bg-success">
   <div class="container-fluid">
     <h1 style="color:#FFFFFF"> <b> Reportes</h1>
     <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
       <ul class="navbar-nav">
         <li class="nav-item dropdown">
           <button class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">'.$usuario.'
           </button>
           <ul class="dropdown-menu dropdown-menu-success">
             <li><a class="dropdown-item" href="Inicio.php"><i class="bi bi-house">Inicio</i></a></li>
             <li><a class="dropdown-item" href="cerrar.php"><i class="bi bi-box-arrow-left">Cerrar Sesion</i></a></li>
           </ul>
         </li>
       </ul>
     </div>
   </div>
 </nav>'
    ?>
        <div class="container">
        <?php
        include("Config.php");
$SELECT = "SELECT * FROM ventasaño";
$datos= mysqli_query ($con,$SELECT);
echo '<h1 aligne="center">Ventas De Lo Que Va Del Año</h1>
<table class="table table-striped table-hover table-bordered" align="center">
<th align="center" class="table-primary">Matricula Coche</th>
<th align="center" class="table-primary">Fecha Venta</th>
<th align="center" class="table-primary">Nombre</th>
<th align="center" class="table-primary">Apellido P</th>
<th align="center" class="table-primary">Precio Transaccion</th>
<th align="center" class="table-primary">Marca</th>
<th align="center" class="table-primary">Modelo</th>';

while ($fila = mysqli_fetch_array($datos))
{
    echo '<tr align="center"> <td>'. $fila ["matriculaCoche"].'</td>
        <td >'. $fila ["fechaVenta"].'</td>
        <td>'. $fila ["nombre"].'</td>
        <td>'. $fila ["apellidoPaterno"].'</td>
        <td>'. $fila ["precioTransaccion"].'</td>
        <td>'. $fila ["marca"].'</td>
        <td>'. $fila ["modelo"].'</td>';
}
?>
</table>
</div>
<div class="container" align="right" >
<a href="exelReporte1.php" class="btn btn-success" role="button"><span class="bi bi-filetype-xls"></span></a>
<a href="csvReporte1.php" class="btn btn-dark" role="button"><span class="bi bi-filetype-csv"></span></a>
<a href="pdfReporte1.php" class="btn btn-danger" role="button"><span class="bi bi-filetype-pdf"></span></a>
<a href="xmlReporte1.php" class="btn btn-warning" role="button"><span class="bi bi-filetype-xml"></span></a>
<a href="jsonReporte1.php" class="btn btn-primary" role="button"><span class="bi bi-filetype-json"></span></a>
</div>
<br>
<div class="container">
        <?php
$SELECT = "SELECT * FROM sesionescliente2022";
$datos= mysqli_query ($con,$SELECT);
echo '<h1 aligne="center">Sesiones Del Año 2022</h1>
<table class="table table-striped table-hover table-bordered" align="center">
<th align="center" class="table-primary">Precio Transaccion</th>
<th align="center" class="table-primary">Modelo</th>
<th align="center" class="table-primary">Marca</th>
<th align="center" class="table-primary">Fecha Sesion</th>
<th align="center" class="table-primary">Nombre</th>
<th align="center" class="table-primary">Apellido P</th>
<th align="center" class="table-primary">Apellido M</th>';

while ($fila = mysqli_fetch_array($datos))
{
    echo '<tr align="center"> <td>'. $fila ["precioTransaccion"].'</td>
        <td >'. $fila ["modelo"].'</td>
        <td>'. $fila ["marca"].'</td>
        <td>'. $fila ["fechaCesion"].'</td>
        <td>'. $fila ["nombre"].'</td>
        <td>'. $fila ["apellidoPaterno"].'</td>
        <td>'. $fila ["apellidoMaterno"].'</td>';
}
?>
</table>
</div>
<div class="container" align="right" >
<a href="exelReporte2.php" class="btn btn-success" role="button"><span class="bi bi-filetype-xls"></span></a>
<a href="csvReporte2.php" class="btn btn-dark" role="button"><span class="bi bi-filetype-csv"></span></a>
<a href="pdfReporte2.php" class="btn btn-danger" role="button"><span class="bi bi-filetype-pdf"></span></a>
<a href="xmlReporte2.php" class="btn btn-warning" role="button"><span class="bi bi-filetype-xml"></span></a>
<a href="jsonReporte2.php" class="btn btn-primary" role="button"><span class="bi bi-filetype-json"></span></a>
</div>
<div class="container">
        <?php
$SELECT = "SELECT * FROM opcionmes";
$datos= mysqli_query ($con,$SELECT);
echo '<h1 aligne="center">Opciones</h1>
<table class="table table-striped table-hover table-bordered" align="center">
<th align="center" class="table-primary">Numero Opcion</th>
<th align="center" class="table-primary">Nombre</th>
<th align="center" class="table-primary">Descripcion</th>
<th align="center" class="table-primary">Matricula Coche</th>
<th align="center" class="table-primary">Mes</th>';

while ($fila = mysqli_fetch_array($datos))
{
    echo '<tr align="center"> <td>'. $fila ["nuOpcion"].'</td>
        <td >'. $fila ["nombre"].'</td>
        <td>'. $fila ["descripcion"].'</td>
        <td>'. $fila ["matriculaCoche"].'</td>
        <td>'. $fila ["MES"].'</td>';
}
?>
</table>
</div>
<div class="container" align="right" >
<a href="exelReporte3.php" class="btn btn-success" role="button"><span class="bi bi-filetype-xls"></span></a>
<a href="csvReporte3.php" class="btn btn-dark" role="button"><span class="bi bi-filetype-csv"></span></a>
<a href="pdfReporte3.php" class="btn btn-danger" role="button"><span class="bi bi-filetype-pdf"></span></a>
<a href="xmlReporte3.php" class="btn btn-warning" role="button"><span class="bi bi-filetype-xml"></span></a>
<a href="jsonReporte3.php" class="btn btn-primary" role="button"><span class="bi bi-filetype-json"></span></a>
</div>

        <?php
        mysqli_close($con); ?>
</body>
</html>

