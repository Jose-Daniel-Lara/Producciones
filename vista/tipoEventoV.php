 <title> Tipos de Eventos - Producciones 2.5.1.</title>
<?php 
  require_once("contenido/componentes/navegador.php");
  $carrusel->carruselEventos();
?>

<main class="container" id="table">
  <div>
    <?php echo (isset($tipo[0]))? ($tipo[0] == "tipo")?  $tipo[1] :  " " :  " " ?>
     <?php echo (isset($restaurarTipoEvento[0]))? ($restaurarTipoEvento[0] == "RTipo")? $restaurarTipoEvento[1] :  " " :  " " ?>
  </div>
  
  <div class="card mt-4 mb-4 justify-content-center shadow ">
          <div class="card-header card-footer d-grid gap-2 d-flex">
                <div class="col-9">
                  <h4 class="titulo fw-bold text-end mr-2 " data-text="Tipos de Eventos">Evento</h4>
                </div>
                <div class="d-grid gap-2 d-flex  justify-content-end col-3 text-end">
                  <button class="btn12 fw-bold co-5  col-md-3 col-lg-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleRegistrarTE"style="box-shadow:none!important;" ><i class="bx bxs-edit " style="font-size: 23px!important;"  data-bs-toggle="tooltip" data-bs-placement="top" title="Registrar Area" ></i></button>
                   <a class=" fw-bold col-5 col-md-3 col-lg-2 text-center mt-1 " type="button" data-bs-toggle="modal" data-bs-target="#papeleraTI"  data-bs-toggle="tooltip" data-bs-placement="top" title="Papelera Area"><i class="bi bi-trash icon999 " style="color: #fff; font-size: 30px;" ></i></a>
                </div>
            </div>
            <div class="card-body shadow">

             <div class="table-responsive bordered ">
                <table class="table table-hover" id="dataTable" >
                   <thead class=" table2 text-center">
                    <tr>
                      <th  scope="col">Codigo</th>
                      <th  scope="col">Tipo de Evento</th>
                      <th  scope="col col-lg-3">Acciones</th>
                    </tr>
                  </thead>
              
                
                <tbody">
                  <?php
                    if(isset( $consultarTipo)) {
                    foreach ($consultarTipo as $data){
                    
                   ?>

                    <tr class="fila">
                    <th class="text-left"><?php echo $data->cod_tipo ?></th>
                    <th class="text-left"> <?php echo $data->tipo ?></th>
                    <th class="text-center d-grid gap-2 d-flex justify-content-lg-center" >
                        <button class="btn btn90 fw-bold  mb-1 col-4 col-md-3" type="button" data-bs-toggle="modal" data-bs-target="#exampleModificarTE<?php echo $data->cod_tipo ?>" ><i class="bi bi-pencil-fill "></i></button>
                        <button class="btn btn11 fw-bold  mb-1 col-4 col-md-3" type="button" data-bs-toggle="modal" data-bs-target="#exampleEliminarTE<?php echo $data->cod_tipo ?>" ><i class="bi bi-trash-fill "></i></button>
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



  <div class="modal fade mx-auto" id="exampleRegistrarTE" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content w-500">

      <div class="contenido">
        
        <div class="card-header p-2">
               <h4 class="titulo fw-bold text-end mr-2 " data-text="Registrar Tipo de Evento">evento</h4>
        </div>
        <form class="modal-body" method="POST" id="registrarTipo">
    
                 <div class="col-12">
                    <label  class="form-label"><i class="fa-sharp fa-solid fa-newspaper"style="color: #c79b2d!important;"></i>Tipo de Evento</label>
                   
                  <input type="text" class="form-control" placeholder="Ingrese un nuevo tipo de evento" name="tipo" id="tipo">
                   <p id="errorTipo"  class=" text-center l"></p>
                </div>

          <div class="modal-footer">
             <button type="button" id="cerrar" class="btn btn11 btn-danger shadow"data-bs-dismiss="modal">Cancelar</button>
            <button class="btn btnP"style="color: #fff;" id="envio" type="submit">Enviar</button>
         </div>

        </form>
            
       </div>       
      </div>   
    </div>
  </div>   


<?php
    if(isset($consultarTipo)) {
    foreach ($consultarTipo as $data){
                    
 ?>  


<div class="modal fade mx-auto" id="exampleEliminarTE<?php echo $data->cod_tipo ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content w-500">
      <form class="contenido" method="POST" id="anularTipo">
        <input type="hidden" name="cod_tipo" value="<?php echo $data->cod_tipo ?>">
        <div class="card-header p-2">
               <h4 class="titulo fw-bold text-end mr-2 " data-text="Anular Tipo de Evento">Moneda</h4>
        </div>
      <div class="modal-body">
       ¿Deseas anular este Tipo de Evento? "<b style="color: #040855"><?php echo  $data->tipo ?></b>" ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn11 btn-danger shadow" id="closed" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btnP" id="anular">Anular</button>
      </div>
      </form>
      
    </div>
  </div>
</div>


<div class="modal fade mx-auto" id="exampleModificarTE<?php echo $data->cod_tipo ?>" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content w-500">

      <div class="contenido">
        
        <div class="card-header p-2">
               <h4 class="titulo fw-bold text-end mr-2 " data-text=" Modificar Tipo de  Evento">evento</h4>
        </div>
        <form class="modal-body" method="POST" id="modificarTipo">
          <input type="hidden" name="cod" value="<?php echo $data->cod_tipo ?>" >
    
                 <div class="col-12">
                    <label  class="form-label"><i class="fa-sharp fa-solid fa-newspaper"style="color: #c79b2d!important;"></i>Tipo de Evento</label>
                   
                  <input type="text" class="form-control" placeholder="Ingrese un nuevo tipo de evento" name="tip" id="tipo00" value="<?php echo  $data->tipo ?>">
                    <p id="errorTipo00"  class=" text-center l "></p>
                </div>

          <div class="modal-footer">
             <button type="button" id="close" class=" btn btn11 btn-danger shadow"data-bs-dismiss="modal">Cancelar</button>
            <button class="btn btnP"style="color: #fff;" id="modificar" name="modificar" type="submit">Modificar</button>
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

 <div class="modal fade mx-auto" id="papeleraTI" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                      <th  scope="col">Tipo de Evento</th>
                      <th  scope="col col-lg-3">Acciones</th>
                    </tr>
                  </thead>
              
                <tbody">
                  <?php
                    if(isset( $papeleraTipoEvento)) {
                    foreach ($papeleraTipoEvento as $data){
                    
                   ?>

                    
                <tr class="fila">
                    <th class="text-left"><?php echo $data->cod_tipo ?></th>
                    <th class="text-left"> <?php echo $data->tipo ?></th>
                    
                    <th class="text-center d-grid gap-2 d-flex justify-content-lg-center" >
                        <button value="<?php echo $data->cod_tipo ?>" name="restaurarTI" class="btn90 fw-bold  mb-1 col-7 col-md-5" type="submit" ><i class="bi bi-check2-circle "></i></button>
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
        <button type="button" class="btn btn11 btn-danger  shadow"data-bs-dismiss="modal">Cancelar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center paArriba fw-bold "><i class="bi bi-arrow-up-short"></i></a>
<?php 
require_once("contenido/componentes/footer.php")
 ?>
 <script type="text/javascript" src="<?php echo URL;?>assets/js/tipoE.js"></script>