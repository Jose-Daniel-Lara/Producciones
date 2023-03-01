 <title> Eventos - Producciones 2.5.1.</title>
<?php 
  require_once("contenido/componentes/navegador.php");
  $carrusel->carruselEventos();
?>
<main class="container" id="table">
  <div>
   <?php echo (isset($evento[0]))? ($evento[0] == "errorF")?  $evento[1] :  " " :  " " ?>
    <?php echo (isset($modificarEvento[0]))? ($modificarEvento[0] == "errorE")?  $modificarEvento[1] :  " " :  " " ?>
   <?php echo (isset($evento[0]))? ($evento[0] == "nombre")?  $evento[1] :  " " :  " " ?>
    <?php echo (isset($evento[0]))? ($evento[0] == "fech")?  $evento[1] :  " " :  " " ?>
     <?php echo (isset( $restaurarEvento[0]))? ( $restaurarEvento[0] == "RE")?   $restaurarEvento[1] :  " " :  " " ?>
  </div>
  
  <div class="card mt-4 mb-4 justify-content-center shadow ">
           <div class="card-header card-footer d-grid gap-2 d-md-flex">
                <div class="col-md-9">
                  <h4 class="titulo fw-bold text-end mr-2 " data-text="Gestión de Eventos">Usuarios</h4>
                </div>
                <div class="d-grid gap-3 d-flex justify-content-md-end justify-content-center col-md-3 text-end">
                  
                  <button class="btn12 fw-bold col-2 col-md-3 col-lg-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleRegistrarE"style="box-shadow:none!important;" data-bs-toggle="tooltip" data-bs-placement="top" title="Registrar Mesa" ><i class="bx bxs-edit " style="font-size: 23px!important;"  ></i></button>

                  <a href="?url=reporteEventos" class=" btn11 fw-bold col-2 col-md-3 col-lg-2 text-center pt-1" type="button" style="box-shadow:none!important;"  data-bs-toggle="tooltip" data-bs-placement="top" title="Imprimir Lista de Eventos"><i class="bx bx-archive-in " style="font-size: 23px!important;"  ></i></a>
                  
                  <a class=" fw-bold  col-2 col-md-3 col-lg-2 text-center mt-1 " type="button" data-bs-toggle="modal" data-bs-target="#papeleraE" data-bs-toggle="tooltip" data-bs-placement="top" title="Papelera Eventos"><i class="bi bi-trash icon999 " style="color: #fff; font-size: 30px;" ></i></a>


                </div>
            </div>
            <div class="card-body shadow">

             <div class="table-responsive bordered ">
                <table class="table table-hover" id="dataTable" >
                   <thead class=" table2 text-center">
                    <tr>
                      <th  scope="col">Evento</th>
                      <th  scope="col">Tipo</th>
                      <th  scope="col">lugar</th>
                      <th  scope="col">Entradas</th>
                       <th  scope="col">Fecha</th>
                      <th  scope="col">Hora</th>
                      <th  scope="col">imagen</th>
                      <th  scope="col col-lg-3">Acciones</th>
                    </tr>
                  </thead>
              
                
                <tbody">
                <?php
                    if(isset( $consultarEvento)) {
                    foreach ($consultarEvento as $data){
                    
                 ?>
                    <tr class="fila">
                    <th class="text-left"><?php echo $data->nombre ?></th>
                    <th class="text-left"><?php echo $data->tipoEvento ?></th>
                    <th class="text-left"><?php echo $data->lugar ?>
                    <th class="text-left"><?php echo $data->entradas ?></th>
                    <th class="text-left"><?php echo $data->fecha?></th>
                    <th  class ="text-left"><?php echo $data->hora ?></th>
                     <th  class ="text-center">
                       <img src="assets/img/<?php echo $data->imagen ?>" width="50"    height="42" class="box-shadow" >
                     </th>
                               
                      <th class="text-center d-grid gap-2 d-flex justify-content-center" >
                        <button class="btn btn90 fw-bold  mb-1 col-6 col-md-4 mt-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModificarE<?php echo $data->codigo ?>" ><i class="bi bi-pencil-fill "></i></button>
                        <button class="btn btn11 fw-bold  mb-1 col-6 col-md-4 mt-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleEliminarE<?php echo $data->codigo ?>" ><i class="bi bi-trash-fill "></i></button>
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
            
            
          </div>
        

  </main>
    
<div class="modal fade mx-auto" id="exampleRegistrarE" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class=" modal-dialog modal-dialog-centered ">
    <div class="modal-content w-500">
      <div class="contenido">
        <div class="card-header p-2">
               <h4 class="titulo fw-bold text-end mr-2 " data-text="Eventos">Eventos</h4>
        </div>
      <form class="modal-body"  method="POST" id="registrarE">
      <div class="row">
                <div class="col-md-6">
                    <label for="password" class="form-label"><i class="fa-sharp fa-solid fa-newspaper" style="color: #c79b2d!important;"></i>Nombre</label>

                    <input type="text" class="form-control" placeholder="Nombre del Evento" name="evento" id="evento"><br>
                     <p id="errorEvento"  class="text-center l"></p>
                </div>
                <div class="col-md-6 ">
                     <label for="text" class="form-label" ><i class="fa-solid fa-buildings" style="color: #c79b2d!important;"></i> Tipo de Evento</label>
                    
                    <select  name= "tipoEvento" class="form-select mb-3" id="select">
                      <option value="tipo" class="opcion" >Tipo de Evento</option>
                      <?php
                       if(isset( $consultarTipo)) {
                       foreach ($consultarTipo as $data){
                    
                       ?>
                       <option value="<?php echo $data->tipo ?>" class="opcion" ><?php echo $data->tipo ?></option>
                      <?php 
                       }
                       }else{
                          " "; 
                       }
                     ?>
                    </select>
                    <p id="errorSelect" class="text-center l"></p>
                </div>

                <div class="col-md-6">
                    <label for="password" class="form-label"><i class="fa-solid fa-map-location-dot" style="color: #c79b2d!important;"></i>lugar</label>

                    <select  name= "lugares" class="form-select mb-3" id="select01">
                       <option value="lugar" class="opcion" >Lugares</option>
                       <?php
                        if(isset( $consultarLugar)) {
                        foreach ($consultarLugar as $data){
                    
                       ?>
                       <option value="<?php echo $data->lugar?>" class="opcion" ><?php echo $data->lugar?></option>
                       <?php 
                       }
                       }else{
                          " "; 
                       }
                     ?>
                    </select>
                     <p id="errorSelect01" style="color: #df0000;" class="text-center l"></p>
                </div>

                 <div class="col-md-6">
                    <label for="password" class="form-label"><i class="fa-solid fa-arrow-up-wide-short"style="color: #c79b2d!important;"></i>Cantidad de Entradas</label>

                    <input type="number" class="form-control" name="entradas" id="entradas"><br>
                     <p id="errorEntra"  class="text-center l"></p>
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label"><i class="fa-solid fa-calendar-week" style="color: #c79b2d!important;"></i>Fecha</label>

                    <input type="date" class="form-control" name="fecha" id="fecha" ><br>
                    <p id="errorFecha" class="text-center l"></p>
                  
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label"><i class="fa-solid fa-clock" style="color: #c79b2d!important;"></i>Hora</label>

                    <input type="time" class="form-control" name="hora" id="hora"><br>
                    <p id="errorHora" class="text-center l"></p>
                     
                </div>
                 <div class="col-12">

                    <label for="password" class="form-label"><i class="fa-solid fa-image" style="color: #c79b2d!important;"></i>Imagen: </label>

                    <input type="file" class="form-control" name="imagen" id="imagen" ><br>
                    <p id="errorImg"  class="text-center l"></p>
                </div>


              </div>

            <div class="modal-footer">
              <button type="button" id="cerrar" class="btn11 btn shadow"data-bs-dismiss="modal">Cancelar</button>
             <button class="btnP btn"style="color: #fff;" id="envio" type="submit">Enviar</button>
           </div>

     </form>
                
     </div>

           
     </div>

  </div>
</div>
<?php
    if(isset($consultarEvento)) {
    foreach ($consultarEvento as $data){
                    
 ?>   

<div class="modal fade mx-auto" id="exampleEliminarE<?php echo $data->codigo ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class=" modal-dialog modal-dialog-centered ">
    <div class="modal-content w-500">
      <form class="contenido" method="POST" id="AnularE">
        <input type="hidden" name="codigo" value="<?php echo $data->codigo ?>">
        <div class="card-header p-2">
               <h4 class="titulo fw-bold text-end mr-2 " data-text="Anular Evento">Eventos</h4>
        </div>
      <div class="modal-body">
       ¿Deseas anular el Evento "<b style="color: #040855"><?php echo  $data->nombre ?></b>" ?
      </div>
      <div class="modal-footer">
        <button type="button" id="closed" class="btn11 btn shadow"data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" id="anular" class="btnP btn">Anular</button>
      </div>
      </form >
      
    </div>
  </div>
</div>



<div class="modal fade mx-auto" id="exampleModificarE<?php echo $data->codigo ?>" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class=" modal-dialog modal-dialog-centered ">
    <div class="modal-content w-500">

      <div class="contenido">


        <div class="card-header p-2">
               <h4 class="titulo fw-bold text-end mr-2 " data-text="Modificar Eventos">Eventos</h4>
        </div>

      <form class="modal-body"  method="POST">

        <input type="hidden" name="cod" value="<?php echo $data->codigo ?>">

            <div class="row">
                <div class="col-md-6">
                    <label class="form-label"><i class="fa-sharp fa-solid fa-newspaper" style="color: #c79b2d!important;"></i>Nombre</label>

                    <input type="text" class="form-control" placeholder="Nombre del Evento" name="nom" id="evento00" value="<?php echo $data->nombre ?>"><br>

                     <p id="errorEvento00"  class="text-center l"></p>
                </div>

                <div class="col-md-6 ">
                     <label for="text" class="form-label" ><i class="fa-solid fa-buildings" style="color: #c79b2d!important;"></i> Tipo de Evento</label>
                    
                    <select  name= "tip" class="form-select" id="select00">
                      <option  name= "tip" value="<?php echo $data->tipoEvento ?>" class="opcion" ><?php echo $data->tipoEvento ?></option>
                      <?php
                       if(isset( $consultarTipo)) {
                       foreach ($consultarTipo as $data){
                    
                       ?>
                       <option value="<?php echo $data->tipo ?>" class="opcion" ><?php echo $data->tipo ?></option>
                      <?php 
                       }
                       }else{
                          " "; 
                       }
                     ?>
                    </select>
                    <p id="errorSelect00" class="text-center l"></p>
                </div>

                <div class="col-md-6">
                    <label  class="form-label"><i class="fa-solid fa-map-location-dot" style="color: #c79b2d!important;"></i>lugar</label>

                    <select  name= "lug" class="form-select" id="select2">
                       <option name= "lug" value="lugar" class="opcion" >Lugar</option>

                       <?php
                        if(isset( $consultarLugar)) {
                        foreach ($consultarLugar as $data){
                    
                       ?>
                       <option value="<?php echo $data->lugar?>" class="opcion" ><?php echo $data->lugar?></option>
                       <?php 
                       }
                       }else{
                          " "; 
                       }
                     ?>
                    </select>
                     <p id="errorSelect2" class="text-center l"></p>
                </div>

                 <div class="col-md-6">
                    <label class="form-label"><i class="fa-solid fa-arrow-up-wide-short"style="color: #c79b2d!important;"></i>Cantidad de Entradas</label>

                    <input type="number" class="form-control" name="ent" id="entradas00"  ><br>
                     <p id="errorEntra00"  class="text-center l"></p>
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label"><i class="fa-solid fa-calendar-week" style="color: #c79b2d!important;"></i>Fecha</label>

                    <input type="date" class="form-control" name="fec" id="fecha00" ><br>
                    <p id="errorFecha00" class="text-center l"></p>
                  
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label"><i class="fa-solid fa-clock" style="color: #c79b2d!important;"></i>Hora</label>

                    <input type="time" class="form-control" name="hor" id="hora00"><br>
                    <p id="errorHora00" class="text-center l"></p>
                     
                </div>
                 <div class="col-12">

                    <label for="password" class="form-label"><i class="fa-solid fa-image" style="color: #c79b2d!important;"></i>Imagen: </label>

                    <input type="file" class="form-control" name="img" id="imagen00" ><br>
                    <p id="errorImg00"  class="text-center l"></p>
                </div>


              </div>

            <div class="modal-footer">
              <button type="button" class="btn11 btn shadow" id="close" data-bs-dismiss="modal">Cancelar</button>
             <button class="btnP btn"style="color: #fff;" id="modificar" type="submit">Modificar</button>
           </div>

     </form>
                
     </div>

           
     </div>

  </div>
</div>

<?php 
  }
  }else{
     " "; 
   }
?>

 <div class="modal fade mx-auto" id="papeleraE" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class=" modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content w-500">
      <form class="contenido" method="POST">
        <div class="card-header p-2">
               <h4 class="titulo fw-bold text-end mr-2 " data-text="Papelera">evento</h4>
        </div>
      <div class="modal-body">
         <div class="table-responsive bordered ">
                  <table class="table table-hover" id="dataTable" >
                   <thead class=" table2 text-center">
                    <tr>
                      <th  scope="col">Evento</th>
                      <th  scope="col">Tipo</th>
                      <th  scope="col">lugar</th>
                      <th  scope="col">Entradas</th>
                       <th  scope="col">Fecha</th>
                      <th  scope="col">Hora</th>
                      <th  scope="col">Disponible</th>
                      <th  scope="col">Acciones</th>
                    </tr>
                  </thead>
              
                <tbody">
                  <?php
                    if(isset( $papeleraEvento)) {
                    foreach ($papeleraEvento as $data){
                    
                   ?>

                    
                <tr class="fila">
                    <th class="text-left"><?php echo $data->nombre ?></th>
                    <th class="text-left"><?php echo $data->tipoEvento ?></th>
                    <th class="text-left"><?php echo $data->lugar ?>
                    <th class="text-left"><?php echo $data->entradas ?></th>
                    <th class="text-left"><?php echo $data->fecha?></th>
                    <th  class ="text-left"><?php echo $data->hora ?></th>
                    <th  class ="text-left"><?php echo $data->status ?></th>
                    
                    <th class="text-center justify-content-center" >
                        <button value="<?php echo $data->codigo ?>" name="restaurarE" class="btn90 btn fw-bold  mb-1 col-9 col-md-7" type="submit" ><i class="bi bi-check2-circle "></i></button>
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
        <button type="button" class="btn11 btn  shadow"data-bs-dismiss="modal">Cancelar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center paArriba fw-bold "><i class="bi bi-arrow-up-short"></i></a>
<?php 
require_once("contenido/componentes/footer.php")
 ?>
<script type="text/javascript" src="<?php echo URL;?>assets/js/evento.js"></script>
