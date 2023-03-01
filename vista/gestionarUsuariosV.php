 <title> Usuarios - Producciones 2.5.1.</title>

<?php 
  require_once("contenido/componentes/navegador.php");
  $carrusel->carruselVentas();
?>

<main class="container" id="main">
  <div>
    <div class="col-md-7  mt-3">
    <?php echo (isset($mensaje[0]))? ($mensaje[0] == "correo")?  $mensaje[1] :  " " :  " " ?>
    <?php echo (isset($mensaje[0]))? ($mensaje[0] == "usuario")?  $mensaje[1] :  " " :  " " ?>
    <?php echo (isset($restaurar[0]))? ($restaurar[0] == "RU")?  $restaurar[1] :  " " :  " " ?>
  </div>
  </div>
  
  <div class="card mt-4 mb-4 justify-content-center shadow ">


             <div class="card-header card-footer d-grid gap-2 d-md-flex">
                <div class="col-md-9">
                 <h4 class="titulo fw-bold text-end mr-2 " data-text="Gestión de usuarios">Usuarios</h4>
                </div>
                <div class="d-grid gap-3 d-flex justify-content-md-end justify-content-center col-md-3 text-end">
                  
                  <button class="btn12 fw-bold col-2 col-md-3 col-lg-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleRegistrarU"style="box-shadow:none!important;" data-bs-toggle="tooltip" data-bs-placement="top" title="Registrar Mesa" ><i class="bx bxs-edit " style="font-size: 23px!important;"  ></i></button>
                 <a href="?url=reporteUsuario" class="btn11  fw-bold col-2 col-md-3 col-lg-2 pt-1 text-center " type="button" style="box-shadow:none!important;"  data-bs-toggle="tooltip" data-bs-placement="top" title="Reporte de Usuarios"><i class="bi bi-upload " style="font-size: 23px!important;"  ></i></a>
                  
                  <a class=" fw-bold col-2 col-md-3 col-lg-2  text-center mt-1 " type="button" data-bs-toggle="modal" data-bs-target="#examplePapeleraU" data-bs-toggle="tooltip" data-bs-placement="top" title="Papelera Mesa"><i class="bi bi-trash icon999 " style="color: #fff; font-size: 30px;" ></i></a>

                </div>
            </div>





            <div class="card-body shadow">

             <div class="table-responsive bordered ">
                <table class="table table-hover" id="dataTable" >
                   <thead class=" table2 text-center">
                    <tr>
                      <th  scope="col">N°</th>
                      <th  scope="col">Nombre</th>
                      <th  scope="col">Usuario</th>
                      <th  scope="col">Correo</th>
                      <th  scope="col col-lg-3">Acciones</th>
                    </tr>
                  </thead>
              
                
                <tbody">
                <?php
                  if(isset( $consultarU)) {
                    foreach ($consultarU as $data){
                    
                   ?>
                    <tr class="fila">
                    <th class="text-left"><?php echo $data->id ?></th>
                    <th class="text-left"><?php echo $data->usuario ?></th>
                    <th class="text-left"><?php echo $data->tipoUsuario ?></th>
                    <th class="text-left"><?php echo $data->correo ?></th>
                     
                      <th class="text-center d-grid gap-2 d-md-flex justify-content-lg-center" >
                        <button class="btn btn90 fw-bold  mb-1 col-6 col-md-4" type="button" data-bs-toggle="modal" data-bs-target="#exampleModificarU<?php echo $data->id ?>" ><i class="bi bi-pencil-fill"></i></button>
                        <button class="btn btn11 fw-bold  mb-1 col-6 col-md-4" type="button" data-bs-toggle="modal" data-bs-target="#exampleEliminarU<?php echo $data->id ?>" ><i class="bi bi-trash-fill "></i></button>
                    </th>
                    <?php 
                       }
                       }else{
                          " "; 
                       }
                     ?>
        
                  </tbody>
                </table>
              </div>
              <!-- End Table with stripped rows -->

            </div>
            <div class="card-header"></div>
          </div>
        

  </main>


<div class="modal fade mx-auto " id="exampleRegistrarU" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form method="POST" class="modal-dialog modal-dialog-centered  modal-screen " id="registrarUsuario">
    <div class="modal-content w-500">
      <div class="contenido">
      <div class=" card-header p-2">
      
        <h4 class="titulo fw-bold text-end mr-2 " data-text="Registrar Usuario">Usuarios</h4>
      </div>
      <div class="modal-body">
      <div class="row">
           <div class="col-md-6">
                    <label for="text" class="form-label"><i class="bi bi-person-fill icon" style="color: #c79b2d!important;"></i>Usuario</label>
                    <input type="text" class="form-control" placeholder="Nombre de Usuario" name="usuario" id="usuario">
                     <p id="errorUsuario"  class=" text-center l"></p>

                </div>

                <div class="col-md-6">
                    <label for="text" class="form-label" ><i class="bi bi-people-fill icon" style="color: #c79b2d!important;"></i>Tipo de Usuario</label>
                    
                    <select  name= "tipoUsuario" class="form-select" id="select">
                      <option value="tipo" class="opcion" >Tipo de Usuario</option>
                      <option value="Administrador"  class="opcion">Administrador</option>
                      <option value="Encargado"  class="opcion">Encargado</option>
                    </select>
                    <p id="errorSelect" class="text-center l"></p>
                </div>

                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label"><i class="bi bi-envelope-fill icon " style="color: #c79b2d!important;"></i> Email</label>
                    <input type="email" placeholder="Ingresa tu Correo Electrónico" class="form-control" id="correo" name="correo"><br>
                     <p id="errorCorreo" class="text-center l"></p>
                    
                </div>
                <div class="col-md-6">

                    <label for="password" class="form-label"><i class="bi bi-card-image icon" style="color: #c79b2d!important;"></i>Imagen </label>

                    <input type="file" class="form-control" name="imagen" id="imagen"><br>
                      <p id="errorImg" class="text-center l"></p>
                </div>

        
                <div class="col-md-6">
                    <label for="password" class="form-label"><i class="bx bxs-lock icon" style="color: #c79b2d!important;"></i>Contraseña</label>
                    <input type="password" class="form-control" placeholder="Ingrese una Contraseña" name="clave" id="clave"><br>
                     <p id="errorClave"  class="text-center l"></p>
                      
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label"><i class="bx bxs-lock icon" style="color: #c79b2d!important;"></i>Repetir Contraseña </label>
                    <input type="password" class="form-control" placeholder="Ingrese nuevamente la contraseña" name="repetirClave" id="clave2"><br>
                      <p id="errorClave2" class="text-center l"></p>
                </div>
                  <p id="errorContraseñas" class="text-center l"></p>
        
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn11 btn-danger  shadow"data-bs-dismiss="modal" id="cerrar">Cancelar</button>
        <button type="submit" class="btn btnP " id="envio">Registrar</button>
      </div>
      </div>
      
    </div>
  </form>
</div>


  <?php
    if(isset($consultarU)) {
    foreach ($consultarU as $data){
  ?> 

<div class="modal fade mx-auto" id="exampleEliminarU<?php echo $data->id ?>" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content w-500">
      <form class="contenido" method="POST" id="eliminarUsuario">
        <input type="hidden" name="id" value="<?php echo $data->id ?>">
      <div class="contenido">
        <div class="card-header p-2">
               <h4 class="titulo fw-bold text-end mr-2 " data-text="Anular Usuario">Usuario</h4>
        </div>
      <div class="modal-body">
       ¿Deseas eliminar la cuenta de <b style="color: #040855"><?php echo $data->usuario ?></b> ?
      </div>
      <div class="modal-footer">
        <button type="button" id="closed" class="btn btn11 btn-danger shadow"data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="anular" class="btn btnP ">Anular</button>
      </div>
      </div>
      </form>
      
    </div>
  </div>
</div>


<div class="modal fade mx-auto " id="exampleModificarU<?php echo $data->id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form method="POST" class="modal-dialog modal-dialog-centered   modal-screen " id="modificarUsuario">
    
    <div class="modal-content w-500">
      <div class="contenido">
      <div class=" card-header p-2">
      
        <h4 class="titulo fw-bold text-end mr-2 " data-text="Modificar Usuario">Usuarios</h4>
      </div>
      <div class="modal-body">
      <div class="row">
        <input type="hidden" name="cod" value="<?php echo $data->id ?>" >

              <div class="col-md-6">
                     <label for="text" class="form-label"><i class="bi bi-person-fill icon" style="color: #c79b2d!important;"></i>Usuario</label>

                    <input type="text" class="form-control" value="<?php echo $data->usuario ?>" placeholder="Nombre de Usuario" name="user" id="usuario00">
                     <p id="errorUsuario00" class=" text-center l"></p>
                    
             </div>

                <div class="col-md-6">
                     <label for="text" class="form-label" ><i class="bi bi-people-fill icon" style="color: #c79b2d!important;"></i>Tipo de Usuario</label>
                    
                    <select  name= "tUser" class="form-select" id="select00">
                      <option value="<?php echo $data->tipoUsuario ?>" class="opcion" ><?php echo $data->tipoUsuario ?></option>
                      <option value="Administrador"  class="opcion">Administrador</option>
                      <option value="Encargado"  class="opcion">Encargado</option>
                    </select>
                    <p id="errorSelect00" class="text-center l"></p>
                </div>

                <div class="col-md-6">
                     <label for="inputEmail4" class="form-label"><i class="bi bi-envelope-fill icon " style="color: #c79b2d!important;"></i> Email</label>

                    <input type="email" placeholder="Ingresa tu Correo Electrónico" class="form-control" id="correo00" name="email" value="<?php echo $data->correo ?>"><br>

                     <p id="errorCorreo00" class="text-center l"></p>

                </div>

                <div class="col-md-6">

                    <label for="password" class="form-label"><i class="bi bi-card-image icon" style="color: #c79b2d!important;"></i>Imagen </label>

                    <input type="file" class="form-control" name="img" id="image"><br>
                      <p id="errorImg0" class="text-center l"></p>
                </div>
        
                <div class="col-md-6">
                     <label for="password" class="form-label"><i class="bx bxs-lock icon" style="color: #c79b2d!important;"></i>Contraseña</label>
                    <input type="password" class="form-control" placeholder="Ingrese una Contraseña" name="cla" id="claveM" value="<?php echo $data->clave ?>"><br>
                     <p id="errorClaveM" class="text-center l"></p>
                </div>
                <div class="col-md-6 ">
                    <label for="password" class="form-label"><i class="bx bxs-lock icon" style="color: #c79b2d!important;"></i>Repetir Contraseña </label>
                    <input type="password" class="form-control" placeholder="Ingrese nuevamente la contraseña" name="rCla" id="claveM2" value="<?php echo $data->repetirClave ?>"><br>
                      <p id="errorClaveM2" class="text-center l"></p>
                </div>
                 <p id="errorContraseñas00"class="text-center l"></p>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn11   shadow"data-bs-dismiss="modal" id="close">Cancelar</button>
        <button type="submit" class="btn btnP " id="modificar" value="<?php echo $data->id ?>">Modificar</button>
      </div>
      </div>
      
    </div>
  </form>
</div>


<?php 
  }
  }else{
     " "; 
   }
?>


 <div class="modal fade mx-auto" id="examplePapeleraU" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content w-500">
      <form class="contenido" method="POST">
        <div class="card-header p-2">
               <h4 class="titulo fw-bold text-end mr-2 " data-text="Papelera">usuario</h4>
        </div>
      <div class="modal-body">
         <div class="table-responsive bordered ">
                  <table class="table table-hover" id="dataTable" >
                   <thead class=" table2 text-center">
                    <tr>
                      <th  scope="col">N°</th>
                      <th  scope="col">Nombre</th>
                      <th  scope="col">Usuario</th>
                      <th  scope="col">Correo</th>
                      <th  scope="col col-lg-3">Restaurar</th>
                    </tr>
                  </thead>
              
                <tbody">
                  <?php
                    if(isset(  $papelera)) {
                    foreach ( $papelera as $data){
                    
                   ?>

                    
                <tr class="fila">
                   <th class="text-left"><?php echo $data->id ?></th>
                   <th class="text-left"><?php echo $data->usuario ?></th>
                    <th class="text-left"><?php echo $data->tipoUsuario ?></th>
                    <th class="text-left"><?php echo $data->correo ?></th>
                    
                    <th class="text-center d-grid gap-2 d-flex justify-content-lg-center" >
                        <button value="<?php echo $data->id?>" name="restaurarU" class="btn90 fw-bold  mb-1 col-7 col-md-5" type="submit" ><i class="bi bi-check2-circle "></i></button>
                    </th>
        
               </tr>
                     <?php 
                       }
                       }else{
                          " "; 
                       }
                     ?>
              

                  </tbody>
                </table>
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn11  shadow"data-bs-dismiss="modal">Cancelar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center paArriba fw-bold "><i class="bi bi-arrow-up-short"></i></a>
<?php 
require_once("contenido/componentes/footer.php")
 ?>
 <script type="text/javascript" src="<?php echo URL;?>assets/js/gestionarUsuario.js"></script>
</body>