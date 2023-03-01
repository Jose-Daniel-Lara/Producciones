 <title> Lugares - Producciones 2.5.1.</title>
<?php 
 require_once("contenido/componentes/navegador.php");
 $carrusel->carruselEventos();
?>

<main class="container" id="table">
  <div>
    <?php echo (isset($lugar[0]))? ($lugar[0] == "lugar")?  $lugar[1] :  " " :  " " ?>
    <?php echo (isset($lugar[0]))? ($lugar[0] == "direccion")?  $lugar[1] :  " " :  " " ?>
    <?php echo (isset( $restaurarLugar[0]))? ( $restaurarLugar[0] == "Rlugar")?   $restaurarLugar[1] :  " " :  " " ?>
  </div>
  
  <div class="card mt-4 mb-4 justify-content-center shadow ">
           <div class="card-header card-footer d-grid gap-2 d-md-flex">
                <div class="col-9">
                  <h4 class="titulo fw-bold text-end mr-2 " data-text="Lugares">lugares</h4>
                </div>
                <div class="d-grid gap-3 d-flex justify-content-md-end justify-content-center col-md-3 text-end">
                  
                  <button class="btn12 fw-bold col-2 col-md-3 col-lg-2" type="button"data-bs-toggle="modal" data-bs-target="#exampleRegistrarL" style="box-shadow:none!important;" data-bs-toggle="tooltip" data-bs-placement="top" title="Registrar Lugar" ><i class="bx bxs-edit " style="font-size: 23px!important;"  ></i></button>

                  <a href="?url=reporteLugar" class="btn11 fw-bold col-2 col-md-3 col-lg-2 text-center pt-1" type="button" style="box-shadow:none!important;"  data-bs-toggle="tooltip" data-bs-placement="top" title="Reporte de Lugares"><i class="bi bi-upload " style="font-size: 23px!important;"  ></i></a>
                  
                  <a class=" fw-bold  col-2 col-md-3 col-lg-2 text-center mt-1 " type="button" data-bs-toggle="modal" data-bs-target="#papeleraLU" data-bs-toggle="tooltip" data-bs-placement="top" title="Papelera Lugar"><i class="bi bi-trash icon999 " style="color: #fff; font-size: 30px;" ></i></a>


                </div>
            </div>
            <div class="card-body shadow">

             <div class="table-responsive bordered ">
                <table class="table table-hover" id="dataTable" >
                   <thead class=" table2 text-center">
                    <tr>
                      <th  scope="col">Codigo</th>
                      <th  scope="col">Lugar</th>
                      <th  scope="col">Dirección</th>
                      <th  scope="col col-lg-3">Acciones</th>
                    </tr>
                  </thead>
              
                
                <tbody">
                  <?php
                    if(isset( $consultarLugar)) {
                    foreach ($consultarLugar as $data){
                    
                   ?>

                    <tr class="fila">
                    <th class="text-left"><?php echo $data->cod_lugar ?></th>
                    <th class="text-left"><?php echo $data->lugar ?></th>
                      <th class="text-left"><?php echo $data->direccion ?></th>

                    <th class="text-center d-grid gap-2 d-md-flex justify-content-lg-center" >
                        <button class="btn btn90 fw-bold  mb-1 col-6 col-md-4" type="button" data-bs-toggle="modal" data-bs-target="#exampleModificarL<?php echo $data->cod_lugar ?>" ><i class="bi bi-pencil-fill "></i></button>
                        <button class="btn btn11 fw-bold  mb-1 col-6 col-md-4" type="button" data-bs-toggle="modal" data-bs-target="#exampleEliminarL<?php echo $data->cod_lugar ?>" ><i class="bi bi-trash-fill "></i></button>
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
              <!-- End Table with stripped rows -->

            </div>
            <div class="card-header"></div>
            </div>
          </div>
       </div>

</main>



  <div class="modal fade mx-auto" id="exampleRegistrarL" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content w-500">

      <div class="contenido">
        
        <div class="card-header p-2">
               <h4 class="titulo fw-bold text-end mr-2 " data-text="Registrar Lugar de los Eventos">evento</h4>
        </div>
        <form class="modal-body" method="POST" id="registrarLugar">
    
                 <div class="col-12">
                    <label  class="form-label"><i class="fa-solid fa-map-location-dot" style="color: #c79b2d!important;"></i>Lugar</label>
                   
                  <input type="text" class="form-control" placeholder="Ingrese un nuevo Lugar" name="lugar" id="lugar">
                   <p id="errorLugar"  class=" text-center l"></p>
                </div>
                <div class="col-12">
                  <label  class="form-label"><i class="fa-solid fa-location-dot" style="color: #c79b2d!important;"></i>Dirección</label>
                   
                  <input type="text" class="form-control" placeholder="Ingrese la Dirección" name="direccion" id="direccion">
                   <p id="errorDireccion" class=" text-center l"></p>
                </div>

          <div class="modal-footer">
             <button type="button" class="btn btn11 btn-danger shadow"data-bs-dismiss="modal" id="cerrar">Cancelar</button>
            <button class="btn btnP btn-light"style="color: #fff;" id="envio" type="submit">Enviar</button>
         </div>

        </form>
            
       </div>       
      </div>   
    </div>
  </div>   


<?php
    if(isset($consultarLugar)) {
    foreach ($consultarLugar as $data){
                    
 ?>   



<div class="modal fade mx-auto" id="exampleEliminarL<?php echo $data->cod_lugar ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content w-500">
      <form class="contenido" method="POST" id="eliminarLugar">
        <input type="hidden" name="cod_lugar" value="<?php echo $data->cod_lugar ?>">
        <div class="card-header p-2">
               <h4 class="titulo fw-bold text-end mr-2 " data-text="Anular Lugar de Eventos">Lugar</h4>
        </div>
      <div class="modal-body">
       ¿Deseas anular el Lugar "<b style="color: #040855"><?php echo  $data->lugar ?></b>" ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn11 btn-danger shadow" id="close" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btnP btn-primary" id="anular">Anular</button>
      </div>
      </form>
      
    </div>
  </div>
</div>


<div class="modal fade mx-auto" id="exampleModificarL<?php echo $data->cod_lugar ?>" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content w-500">

      <div class="contenido">
        
        <div class="card-header p-2">
               <h4 class="titulo fw-bold text-end mr-2 " data-text="Modificar Lugar de los Eventos">evento</h4>
        </div>

        <form class="modal-body" method="POST" id="modificarLugar">
          <input type="hidden" name="cod" value="<?php echo $data->cod_lugar ?>">
                 <div class="col-12">
                    <label  class="form-label"><i class="fa-solid fa-map-location-dot" style="color: #c79b2d!important;"></i>Lugar</label>
                   
                  <input type="text" class="form-control" placeholder="Ingrese un nuevo Lugar" name="lug" id="lugar00" value="<?php echo  $data->lugar ?>">
                   <p id="errorLugar00" style="color:  #df0000;"  class=" text-center l"></p>
                  
                </div>
                <div class="col-12">
                  <label  class="form-label"><i class="fa-solid fa-location-dot" style="color: #c79b2d!important;"></i>Dirección</label>
                   
                  <input type="text" class="form-control" placeholder="Ingrese la Dirección" name="dir" id="direccion00" value="<?php echo  $data->direccion ?>">
                   <p id="errorDireccion00" style="color:  #df0000;"  class=" text-center l"></p>
                </div>

          <div class="modal-footer">
             <button type="button" class="btn btn11 btn-danger shadow" id="close" data-bs-dismiss="modal">Cancelar</button>
            <button class="btn btnP btn-light"style="color: #fff;" id="modificar" type="submit">Modificar</button>
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

 <div class="modal fade mx-auto" id="papeleraLU" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
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
                      <th  scope="col">Codigo</th>
                      <th  scope="col">Lugar</th>
                      <th  scope="col">Dirección</th>
                      <th  scope="col col-lg-3">Acciones</th>
                    </tr>
                  </thead>
              
                <tbody">
                  <?php
                    if(isset( $papeleraLugar)) {
                    foreach ($papeleraLugar as $data){
                    
                   ?>

                    
                <tr class="fila">
                    <th class="text-left"><?php echo $data->cod_lugar ?></th>
                    <th class="text-left"><?php echo $data->lugar ?></th>
                    <th class="text-left"><?php echo $data->direccion ?></th>
                    
                    <th class="text-center d-grid gap-2 d-flex justify-content-lg-center" >
                        <button value="<?php echo $data->cod_lugar?>" name="restaurarLU" class="btn90 fw-bold  mb-1 col-7 col-md-5" type="submit" ><i class="bi bi-check2-circle "></i></button>
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
 <script type="text/javascript" src="<?php echo URL;?>assets/js/lugar.js"></script>