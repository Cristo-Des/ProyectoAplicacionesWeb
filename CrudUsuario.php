<!DOCTYPE html>
<html>
<head>
<title>CrudUsuario</title>

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
                 if (isset($_GET["id"])) 
                 {
               $id=$_GET["id"];
                $SELECT = "SELECT * FROM usuario WHERE idUsuario= $id";
                $datos= mysqli_query ($con,$SELECT);
                while ($fila =mysqli_fetch_array($datos))
                {
                 echo '
                      <form action="ModificarUsuario.php"  method="post">
      
                        <div class="d-flex align-items-center mb-3 pb-1">
                          <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                          <span class="h1 fw-bold mb-0">Usuario</span>
                        </div>
                        <div class="form-outline mb-4">       
                        <input id="Id" name="Id" type="hidden" value='.$id.'>             
                          <input type="text" id="nombre" name="nombre" class="form-control form-control-lg" value='. $fila["nombre"].'>
                          <label class="form-label" for="form2">Nombre</label>
                        </div>
      
                        <div class="form-outline mb-4">
                          <input type="text" id="email" name="email" class="form-control form-control-lg" value='. $fila ["email"].'>
                          <label class="form-label" for="form2">Email</label>
                        </div>
                        <div class="form-outline mb-4">
                          <input type="text" id="clave" name="clave" class="form-control form-control-lg" value='. $fila ["clave"].'>
                          <label class="form-label" for="form2">Password</label>
                        </div>
                        <div class="form-outline mb-4">
                        <input type="text" id="telefono" name="telefono" class="form-control form-control-lg" value='. $fila ["telefono"].'>
                        <label class="form-label" for="form2">Telefono</label>
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
                    <form action="InsertarUsuario.php"  method="post">
      
                        <div class="d-flex align-items-center mb-3 pb-1">
                          <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                          <span class="h1 fw-bold mb-0">Usuario</span>
                        </div>
                        <div class="form-outline mb-4">                   
                          <input type="text" id="nombre" name="nombre" class="form-control form-control-lg" required/>
                          <label class="form-label" for="form2">Nombre</label>
                        </div>
      
                        <div class="form-outline mb-4">
                          <input type="text" id="email" name="email" class="form-control form-control-lg" required/>
                          <label class="form-label" for="form2">Email</label>
                        </div>
                        <div class="form-outline mb-4">
                          <input type="text" id="Clave" name="clave" class="form-control form-control-lg" required/>
                          <label class="form-label" for="form2">Password</label>
                        </div>
                        <div class="form-outline mb-4">
                        <input type="text" id="telefono" name="telefono" class="form-control form-control-lg" required/>
                        <label class="form-label" for="form2">Telefono</label>
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