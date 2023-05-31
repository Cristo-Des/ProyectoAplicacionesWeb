<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="ejemplo.css">

<title>Venta</title>
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
     <h1 style="color:#FFFFFF"> <b>Venta</h1>
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
        <form action="CrudVenta.php" method="get">
        <div class="container">
        <?php
        include("Config.php");
        //include ("insertar.php");
        
//$SELECT = "SELECT * FROM autousado";
$SELECT = "SELECT idVenta, matriculaCoche, fechaVenta, vendedor.nombre, vehículo.marca FROM venta INNER JOIN vendedor ON venta.idVendedor = vendedor.idVendedor INNER JOIN vehículo ON venta.idVehículo = vehículo.idVehículo WHERE venta.estatus = 1";
$datos= mysqli_query ($con,$SELECT);
echo '<table class="table table-striped table-hover table-bordered"align="center">
<th align="center" class="table-primary">Matricula</th>
<th align="center" class="table-primary">Fecha Venta</th>
<th align="center" class="table-primary">Nombre Vendedor</th>
<th align="center" class="table-primary">Marca Vehiculo</th>
<th colspan="2" align="center" class="table-primary">Accion</th>';


while ($fila = mysqli_fetch_array($datos))
{echo '<tr align="center"> <td>'. $fila ["matriculaCoche"].'</td>
        <td >'. $fila ["fechaVenta"].'</td>
        <td>'. $fila ["nombre"].'</td>
        <td>'. $fila ["marca"].'</td>
      
      
       

        <td><a href="CrudVenta.php? id='. $fila["idVenta"] .'" ><i class="bi bi-pencil-square"></i></td>
        <td><a href="EliminarVenta.php? id='. $fila["idVenta"].'" onclick="return Confirmareliminacion()"><i class="bi bi-trash"></i> </a></td></tr>';
}
?>
</table>
</div>
<div class="container" >
    <div class="row">
<div align="right"><input type="submit" class="btn btn-secondary" value="Insertar">
<a href="exelVenta.php" class="btn btn-success" role="button"><span class="bi bi-filetype-xls"></span></a>
<a href="csvVenta.php" class="btn btn-dark" role="button"><span class="bi bi-filetype-csv"></span></a>
<a href="pdfVenta.php" class="btn btn-danger" role="button"><span class="bi bi-filetype-pdf"></span></a>
<a href="xmlVenta.php" class="btn btn-warning" role="button"><span class="bi bi-filetype-xml"></span></a>
<a href="jsonVenta.php" class="btn btn-primary" role="button"><span class="bi bi-filetype-json"></span></a>

<script type="text/javascript">
  function Confirmareliminacion()
  {
    var respuesta= confirm("¿Seguro que Quieres Eliminar el Registro?")
    if (respuesta==true) {
      return true;
    }
    else
    {
      return false;
    }
  }
  </script>
        </form>
        <?php
        mysqli_close($con); ?>
</body>
</html>

