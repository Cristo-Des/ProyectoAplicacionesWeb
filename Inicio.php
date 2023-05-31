<!DOCTYPE html>
<html lang="en">
<head>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="InicioDiseño.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<title>Inicio</title>
</head>
<body style="background-color: #616a9a;" background ="https://autoproyecto.com/wp-content/uploads/2017/04/BeFunky-Collage.jpg">
             
<?php
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
   <div class="panel panel-primary" align="right">
   <div class="d-grid gap-2">      
   <a href="cerrar.php" class="btn btn-success"  ><span class="bi bi-box-arrow-left"></span> <br/>'.$usuario.'<br/>Cerrar Sesion</a>
                </div>
                </div>'
                ?>
    <div class="container" >
    <div class="row">
        <div >
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1  align="center">
                        <span class="bi bi-car-front"></span> <b> CONCESIONARIO DE AUTOS</b></h1>            
                </div>
                <div class="panel-body">
                    <div class="row">
                        
                    <div class="col-xs-6 col-md-6" align="center">
                        <div>
                            <a href="AutoUsado.php" class="btn btn-danger btn-lg" role="button" ><span class="bi bi-car-front-fill"></span> <br/>Auto Usado</a>
                        </div>
                        <div>
                          <a href="Cliente.php" class="btn btn-warning btn-lg" role="button"><span class="bi bi-person-square"></span> <br/>Cliente</a>
                          </div>
                        <div>
                          <a href="Opcion.php" class="btn btn-primary btn-lg" role="button"><span class="bi bi-option"></span> <br/>Opcion</a>
                          </div>
                        <div>
                          <a href="Vehiculo.php" class="btn btn-primary btn-lg" role="button"><span class="bi bi-ev-front-fill"></span> <br/>Vehiculo</a>
                          </div>
                        </div>
                        
                        <div class="col-xs-6 col-md-6" align="center">
                        <div>
                          <a href="Usuario.php" class="btn btn-success btn-lg" role="button"><span class="glyphicon glyphicon-user"></span> <br/>Usuario</a>
                          </div>
                        <div>
                          <a href="Vendedor.php" class="btn btn-info btn-lg" role="button"><span class="bi bi-cart2"></span> <br/>Vendedor</a>
                          </div>
                        <div>
                          <a href="Venta.php" class="btn btn-primary btn-lg" role="button"><span class="bi bi-cash-coin"></span> <br/>Venta</a>
                          </div>
                          <div>
                          <a href="Reportes.php" class="btn btn-warning btn-lg" role="button"><span class="bi bi-file-bar-graph"></span> <br/>Reportes</a>
                          </div>               
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>