 <title> Moneda - Producciones 2.5.1.</title>
<?php 
 require_once("contenido/componentes/navegador.php");
  $carrusel->carruselVentas();
?>


<main class="container" id="table">
  <div>
     <?php echo (isset( $registrarMoneda[0]))? ( $registrarMoneda[0] == "moneda")?   $registrarMoneda[1] :  " " :  " " ?>
  </div>
  
  <div class="card mt-4 mb-4 justify-content-center shadow ">
           <div class="card-header card-footer d-grid gap-2 d-flex">
                <div class="col-9">
                  <h4 class="titulo fw-bold text-end mr-2 " data-text="Moneda">Moneda</h4>
                </div>
                 <div class="d-grid gap-2 d-flex justify-content-end col-3 text-end">
                   <button class=" btn12 fw-bold col-5 col-md-2" type="button"  data-bs-toggle="modal" data-bs-target="#exampleRegistrarMO"style="box-shadow:none!important;" data-bs-toggle="tooltip" data-bs-placement="top" title="Registrar Moneda" ><i class="bx bxs-edit " style="font-size: 23px!important;"  ></i></button>

                   <a class=" fw-bold col-5 col-md-2 text-center mt-1 " type="button" data-bs-toggle="modal" data-bs-target="#papeleraMO" data-bs-toggle="tooltip" data-bs-placement="top" title="Papelera Moneda"><i class="bi bi-trash icon999 " style="color: #fff; font-size: 30px;" ></i></a>
                </div>
            </div>

            <div class="card-body shadow">

             <div class="table-responsive bordered ">
                <table class="table table-hover" id="dataTable" >
                   <thead class=" table2 text-center">
                    <tr>
                      <th  scope="col">id</th>
                      <th  scope="col">Moneda</th>
                      <th  scope="col"> En B.s</th>
                      <th  scope="col col-lg-3">Acciones</th>
                    </tr>
                  </thead>
              
                
                <tbody">
                 <?php
                    if(isset( $consultarMoneda)) {
                    foreach ($consultarMoneda as $data){
                    
                   ?>

                    <tr class="fila">
                    <th class="text-left"><?php echo $data->id ?></th>
                    <th class="text-left"><?php echo $data->moneda ?></th>
                    <th class="text-left"><?php echo $data->cambio .' Bs' ?></th>
                    <th class="text-center d-grid gap-2 d-flex justify-content-lg-center" >
                        <button class="btn btn90 fw-bold  mb-1 col-5 col-md-3" type="button" data-bs-toggle="modal" data-bs-target="#exampleModificarMO<?php echo $data->id ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Modificar Moneda"><i class="bi bi-pencil-fill "></i></button>
                        <button class="btn btn11 fw-bold  mb-1 col-5 col-md-3" type="button" data-bs-toggle="modal" data-bs-target="#exampleEliminarMO<?php echo $data->id ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Anular Moneda" ><i class="bi bi-trash-fill "></i></button>
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



  <div class="modal fade mx-auto" id="exampleRegistrarMO" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content w-500">

      <div class="contenido">
        
        <div class="card-header p-2">
               <h4 class="titulo fw-bold text-end mr-2 " data-text="Registrar Moneda">Moneda</h4>
        </div>
        <form class="modal-body" method="POST" id="registrarMoneda">
    
                 <div class="col-12">
                    <label  class="form-label"><i class="bi bi-coin icon"style="color: #c79b2d!important;"></i>Moneda</label>
                   
                  <input type="text" class="form-control" placeholder="Ingrese nueva Moneda" name="moneda" id="moneda">
                   <p id="errorMoneda"   class=" text-center l"></p>
                  
                </div>

                 <div class="col-12">
                    <label  class="form-label"><i class="ri-sound-module-fill icon"style="color: #c79b2d!important;"></i>Al cambio</label>
                   
                  <input type="number" class="form-control" placeholder="Ingrese su valor en Bs" name="cambio" id="bs">
                   <p id="errorBs" class=" text-center l"></p>
                </div>
                 <?php echo (isset( $registrarMoneda[0]))? ( $registrarMoneda[0] == "Sistema")?   $registrarMoneda[1] :  " " :  " " ?></p>

          <div class="modal-footer">
             <button type="button" class="btn btn11 btn-danger shadow"data-bs-dismiss="modal" id="cerrar">Cancelar</button>
            <button class="btn btnP"style="color: #fff;" id="envio" type="submit">Enviar</button>
         </div>

        </form>
            
       </div>       
      </div>   
    </div>
  </div>   

 <?php
    if(isset( $consultarMoneda)) {
      foreach ($consultarMoneda as $data){
                    
 ?>


<div class="modal fade mx-auto" id="exampleEliminarMO<?php echo $data->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content w-500">
      <form class="contenido" method="POST" id="eliminarMoneda">
        <input type="hidden" name="id" value="<?php echo $data->id ?>">
        <div class="card-header p-2">
               <h4 class="titulo fw-bold text-end mr-2 " data-text="Anular Moneda">Moneda</h4>
        </div>
      <div class="modal-body">
       ¿Deseas anular la  moneda "<b style="color: #040855"><?php echo  $data->moneda ?></b>"?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn11 btn  shadow"data-bs-dismiss="modal" id="closed">Cancelar</button>
        <button type="submit" class="btn btnP" id="anular">Anular</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<div class="modal fade mx-auto" id="exampleModificarMO<?php echo $data->id ?>" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content w-500">

      <div class="contenido">
        
        <div class="card-header p-2">
               <h4 class="titulo fw-bold text-end mr-2 " data-text="Modificar Moneda">Moneda</h4>
        </div>
        <form class="modal-body" method="POST" id="modificarMoneda">
          <input type="hidden" name="codi" value="<?php echo $data->id ?>">
    
                 <div class="col-12">
                    <label  class="form-label"><i class="bi bi-coin icon"style="color: #c79b2d!important;"></i>Moneda</label>
                   
                  <input type="text" class="form-control" placeholder="Ingrese nueva Moneda" name="mon" id="moneda00" value="<?php echo $data->moneda ?>">
                   <p id="errorMoneda00"   class=" text-center l"></p>
                </div>

                 <div class="col-12">
                    <label  class="form-label"><i class="ri-sound-module-fill icon"style="color: #c79b2d!important;"></i>Al cambio</label>
                   
                  <input type="number" class="form-control" placeholder="Ingrese su valor en Bs" name="camb" id="bs00" value="<?php echo $data->cambio ?>">
                   <p id="errorBs00"   class=" text-center l"></p>
                </div>
          <div class="modal-footer">
             <button type="button" class="btn btn11 btn-danger shadow"data-bs-dismiss="modal">Cancelar</button>
            <button class="btn btnP"style="color: #fff;" id="modificar" type="submit">Modificar</button>
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

  
<div class="modal fade mx-auto" id="papeleraMO" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content w-500">
      <form class="contenido" method="POST">
        <div class="card-header p-2">
               <h4 class="titulo fw-bold text-end mr-2 " data-text="Papelera">area</h4>
        </div>
      <div class="modal-body">
         <div class="table-responsive bordered ">
                  <table class="table table-hover" id="dataTable" >
                   <thead class=" table2 text-center">
                    <tr>
                      <th  scope="col">id</th>
                      <th  scope="col">Moneda</th>
                      <th  scope="col"> En B.s</th>
                      <th  scope="col col-lg-3">Restaurar</th>
                    </tr>
                  </thead>
              
                <tbody">
                  <?php
                    if(isset( $papeleraMoneda)) {
                    foreach ($papeleraMoneda as $data){
                    
                   ?>

                    <tr class="fila">
                     <th class="text-left"><?php echo $data->id ?></th>
                    <th class="text-left"><?php echo $data->moneda ?></th>
                    <th class="text-left"><?php echo $data->cambio ?></th>
                    
                    <th class="text-center d-grid gap-2 d-flex justify-content-lg-center" >
                        <button value="<?php echo $data->id ?>" name="restaurarMO" class="btn90 fw-bold  mb-1 col-5 col-md-4" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Restaurar Moneda"><i class="bi bi-check2-circle "></i></button>
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
 <script type="text/javascript" src="<?php echo URL;?>assets/js/moneda.js"></script>