<!DOCTYPE html>
<html>
<head>
<title>CrudAutoUsado</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body style="background-color:#B0E0E6">
    <section class="vh-100" style="background-color: #616a9a;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                  <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img src="https://cdn.buttercms.com/mjCkNmR0GMlSrt9xtdvw"
                      alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                  </div>
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">
      
                  <?php
                 INCLUDE("Config.php");
                 $SELECT2 = "SELECT idCliente, nombre, apellidoMaterno FROM cliente";
                 $datos2= mysqli_query ($con,$SELECT2);
                 if (isset($_GET["id"])) 
                 {
               $id=$_GET["id"];
                $SELECT = "SELECT idAutoUsado, precioTransaccion, marca, modelo, matricula,cliente.nombre AS nombre, cliente.apellidoMaterno AS apellido, fechaCesion FROM autousado INNER JOIN cliente ON autousado.idCliente = cliente.idCliente WHERE idAutoUsado = $id";
                $datos= mysqli_query ($con,$SELECT);
               
                $i=1;
                while ($fila =mysqli_fetch_array($datos))
                {
                  
                
                 echo '
                      <form action="ModificarAutoUsado.php"  method="post">
      
                        <div class="d-flex align-items-center mb-3 pb-1">
                          <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                          <span class="h1 fw-bold mb-0">Auto Usado</span>
                        </div>
                        <div class="form-outline mb-4">       
                        <input id="Id" name="Id" type="hidden" value='.$id.'>             
                          <input type="text" id="Precio" name="Precio" class="form-control form-control-lg" value='. $fila ["precioTransaccion"].'>
                          <label class="form-label" for="form2">Precio Transaccion</label>
                        </div>
      
                        <div class="form-outline mb-4">
                          <input type="text" id="Marca" name="Marca" class="form-control form-control-lg" value='. $fila ["marca"].'>
                          <label class="form-label" for="form2">Marca</label>
                        </div>
                        <div class="form-outline mb-4">
                          <input type="text" id="Modelo" name="Modelo" class="form-control form-control-lg" value='. $fila ["modelo"].'>
                          <label class="form-label" for="form2">Modelo</label>
                        </div>
      
                        <div class="form-outline mb-4">
                          <input type="text" id="Matricula" name="Matricula" class="form-control form-control-lg" value='. $fila ["matricula"].'>
                          <label class="form-label" for="form2">Matricula</label>
                        </div>
                        <div class="form-outline mb-4">

                        <select class="form-select" id="cliente" name="Cliente" aria-label="Default select example">
                        <option selected>' . $fila["nombre"] .' ' . $fila["apellido"] . '</option>
                       '; 
                      
                       while($fila2 = mysqli_fetch_array($datos2))
                       {
                         echo '<option value="' . $i . '"> ' . $fila2["nombre"] . ' '. $fila2["apellidoMaterno"]. '</option>';
                         $i++;
                        }
                     
                       echo
                       
                       '
                        </select>
                          <label class="form-label" for="form2">Cliente</label>
                        </div>
                        <div class="form-outline mb-4">
                          <input type="text" id="Sesión" name="Sesión" class="form-control form-control-lg" value='. $fila ["fechaCesion"].'>
                          <label class="form-label" for="form2">Fecha Sesión</label>
                        </div>
                        
                        <div align="right" class="pt-1 mb-4">
                          <button type="submit" class="btn btn-primary btn-lg btn-block" type="button">Aceptar</button>
                        </div>
                        </form>'; 
                }
            }
                    else
                    {
                    echo'
                    <form action="InsertarAutoUsado.php"  method="post">
      
                        <div class="d-flex align-items-center mb-3 pb-1">
                          <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                          <span class="h1 fw-bold mb-0">Auto Usado</span>
                        </div>
                        <div class="form-outline mb-4">
                          <input type="Precio" id="Precio" name="Precio" class="form-control form-control-lg" required/>
                          <label class="form-label" for="form2">Precio Transaccion</label>
                        </div>
      
                        <div class="form-outline mb-4">
                          <input type="Marca" id="Marca" name="Marca" class="form-control form-control-lg" required/>
                          <label class="form-label" for="form2">Marca</label>
                        </div>
                        <div class="form-outline mb-4">
                          <input type="Modelo" id="Modelo" name="Modelo" class="form-control form-control-lg" required/>
                          <label class="form-label" for="form2">Modelo</label>
                        </div>
      
                        <div class="form-outline mb-4">
                          <input type="Matricula" id="Matricula" name="Matricula" class="form-control form-control-lg" required/>
                          <label class="form-label" for="form2">Matricula</label>
                        </div>
                        <div class="form-outline mb-4">
                        <select class="form-select" id="cliente" name="Cliente" aria-label="Default select example">
                        <option selected>Selecciona un Cliente</option>
                       '; 
                      
                       while($fila2 = mysqli_fetch_array($datos2))
                       {
                         echo '<option value="' . $i. '"> ' . $fila2["nombre"] . ' '. $fila2["apellidoMaterno"]. '</option>';
                         $i++;
                        }
                     
                       echo
                       
                       '
                        </select>
                          <label class="form-label" for="form2">Cliente</label>
                        </div>
      
                        <div class="form-outline mb-4">
                          <input type="Sesión" id="Sesión" name="Sesión" class="form-control form-control-lg" required/>
                          <label class="form-label" for="form2">Fecha Sesión</label>
                        </div>
      
                        <div align="right" class="pt-1 mb-4">
                          <button type="submit" class="btn btn-primary btn-lg btn-block" type="button">Aceptar</button>
                        </div>
                        </form>'; 
                }
                    ?>                  
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</body>
</html>