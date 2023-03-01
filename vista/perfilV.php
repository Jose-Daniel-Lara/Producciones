 <title> Mi perfil - Producciones 2.5.1.</title>
<?php 
if ($_SESSION['tipoUsuario']=='Administrador') {
 require_once("contenido/componentes/navegador.php");
}
else{
   require_once("contenido/componentes/navR.php");
 }
 
  $carrusel->carruselVentas();

?>
    <div class=" m-2 d-md-grid gap-2 d-md-flex  col-12 justify-content-center m-auto ">

        <div class="col-md-4 mt-3">

          <div class="card shadow">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="assets/img/<?php echo $_SESSION['imagen']; ?>" width="170" height="170" alt="Profile" class="rounded-circle mb-3">
               <h2 class="till fw-bold text-center "><?php echo $_SESSION['usuario']; ?></h2>
               <p><?php echo $_SESSION['correo']; ?></p>
              <h5><?php echo $_SESSION['tipoUsuario']; ?></h5>
            </div>
            <div class="card-header"></div>
          </div>

        </div>

        <div class="col-md-7 mt-3">

          <div class="card shadow">
         <div class="">
               <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link mmmm w-100 active" style="color: #fff;" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home" aria-selected="true">Editar Perfil</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link mmmm w-100" style="color: #fff;" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Cambiar contraseña</button>
                </li>
              </ul>
        </div>
        <div class="card-body">

          <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab">
                  <form method="POST" id="editarPerfil">
                    <input type="hidden" name="idUser" value="<?php echo $_SESSION['idusuario']; ?>">
                    <div class="justify-content-center text-center m-auto mb-4">
                        <img src="assets/img/perfil/<?php echo $_SESSION['imagen']; ?>" width="120" height="120" alt="Profile" class="rounded-circle mb-3">
                        
                      <div class="col-12">

                       <label for="password" class="form-label"><i class="bi bi-card-image icon" style="color: #c79b2d!important;"></i>Imagen: </label>

                       <input type="file" class="form-control" name="img" value="<?php echo $_SESSION['imagen']; ?>" id="imagen" ><br>
                         <p id="errorImg"   class=" text-center l"></p>
                    </div>
                    </div>
                <div class="row">
                

                <div class="col-md-6">
                    <label for="text" class="form-label"> <i class="bi bi-person-fill icon" style="color:  #c79b2d;"></i>Usuario</label>
                    <input type="text" class="form-control" placeholder="Nombre de Usuario" name="usuario" id="usuario" value="<?php echo $_SESSION['usuario']; ?>">
                     <p id="errorUsuario"   class=" text-center l"></p>
                     <p class="text-center l"  ><?php echo (isset($mensaje[0]))? ($mensaje[0] == "usuario")?  $mensaje[1] :  " " :  " " ?></p>

                </div>

                <div class="col-md-6">
                    <label for="text" class="form-label" ><i class="bi bi-people-fill icon" style="color:  #c79b2d;"></i> Tipo de Usuario</label>
                    
                    <select  name= "tipoUsuario" class="form-select" id="select">
                      <option value="<?php echo $_SESSION['tipoUsuario']; ?>" class="opcion" ><?php echo $_SESSION['tipoUsuario']; ?></option>
                      <option value="Administrador"  class="opcion">Administrador</option>
                      <option value="Encargado"  class="opcion">Encargado</option>
                    </select>
                </div>

                  <div class="col-12">
                    <label for="inputEmail4" class="form-label"><i class="bi bi-envelope-fill icon" style="color:  #c79b2d;"></i>Email</label>
                    <input type="email" placeholder="Ingresa tu Correo Electrónico" class="form-control" id="correo" value="<?php echo $_SESSION['correo']; ?>" name="correo"><br>
                     <p id="errorCorreo" class="text-center l"></p>
                     <p class="text-center l" ><?php echo (isset($mensaje[0]))? ($mensaje[0] == "correo")?  $mensaje[1] :  " " :  " " ?></p>
                </div>

                </div>


                  
                    <div class="text-center">
                      <button type="submit" id="envio" class="btn btnP col-4">Editar</button>
                    </div>
                    <hr>
                  </form><!-- End settings Form -->

                </div>

              <div class="tab-pane fade" id="bordered-justified-profile" role="tabpanel" aria-labelledby="profile-tab">
                  <!-- Change Password Form -->
                  <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $_SESSION['idusuario']; ?>">

                    <div class=" mb-3">
                      <label for="currentPassword" class="col col-form-label"><i class="bx bxs-lock icon" style="color: #c79b2d!important;"></i> Contraseña Actual</label>
                      <div class="col">
                        <input name="password" type="password" class="form-control" id="claveV">
                        <p id="errorClaveV" style="color:  #df0000;" class="text-center"></p>
                      </div>
                       
                    </div>

                    <div class="mb-3">
                      <label for="newPassword" class="col col-form-label"><i class="bx bxs-lock icon" style="color: #c79b2d!important;"></i> Nueva Contraseña</label>
                      <div class="col">
                        <input name="newpassword" type="password" class="form-control" id="clave">
                         <p id="errorClave" style="color:  #df0000;" class="text-center"></p>
                      </div>
                      
                    </div>

                    <div class="mb-3">
                      <label for="renewPassword" class="col col-form-label"><i class="bx bxs-lock icon" style="color: #c79b2d!important;"></i> Repetir Nueva Contraseña</label>
                      <div class="col">
                        <input name="renewpassword" type="password" class="form-control" id="clave2">
                         <p id="errorClave2" style="color:  #df0000;" class="text-center"></p>
                      </div>
                    </div>
                     <p id="errorContraseñas" style="color:  #df0000;" class="text-center"></p>

                    <div class="text-center">
                      <button type="submit" id="enviar" class="btn btnP">Cambiar Contraseña</button>
                    </div>
                    <hr>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
    </div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center paArriba fw-bold "><i class="bi bi-arrow-up-short"></i></a>
<?php 
require_once("contenido/componentes/footer.php")
 ?>

 <script type="text/javascript" src="<?php echo URL;?>assets/js/perfil.js"></script>