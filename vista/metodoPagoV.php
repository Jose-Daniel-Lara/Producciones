 <title> Método de Pago - Producciones 2.5.1.</title>

<?php 
 require_once("contenido/componentes/navegador.php");
  $carrusel->carruselVentas();
?>
<main class="container" id="table">
  <div>
  <?php echo (isset($metodo[0]))? ($metodo[0] == "metodo")?  $metodo[1] :  " " :  " " ?>
  </div>
  
  <div class="card mt-4 mb-4 justify-content-center shadow ">
           <div class="card-header card-footer d-grid gap-2 d-flex">
                <div class="col-9">
                  <h4 class="titulo fw-bold text-end mr-2 " data-text="Metodos de Pago">Pago</h4>
                </div>
                <div class="d-grid gap-2 d-flex  justify-content-end col-3 text-end">
                   <button class=" btn12 fw-bold col-5 col-md-3 col-lg-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleRegistrarME"style="box-shadow:none!important;" data-bs-toggle="tooltip" data-bs-placement="top" title="Registrar Metodo de Pago"><i class="bx bxs-edit " style="font-size: 23px!important;"  ></i></button>

                   <a class=" fw-bold col-5 col-md-3 col-lg-2 text-center mt-1 " type="button" data-bs-toggle="modal" data-bs-target="#papeleraME" data-bs-toggle="tooltip" data-bs-placement="top" title="Papelera Metodo de Pago"><i class="bi bi-trash icon999 " style="color: #fff; font-size: 30px;" ></i></a>
                </div>
            </div>
            <div class="card-body shadow ">

             <div class="table-responsive bordered  ">
                <table class="table table-hover" id="dataTable" >
                   <thead class=" table2 text-center">
                    <tr>
                      <th  scope="col">id</th>
                      <th  scope="col">metodo</th>
                      <th  scope="col col-lg-3">Acciones</th>
                    </tr>
                  </thead>
              
                
                <tbody">
                  <?php
                    if(isset( $consultarMetodo)) {
                    foreach ($consultarMetodo as $data){
                    
                   ?>

                    <tr class="fila">
                    <th class="text-left"><?php echo $data->id_metodo ?></th>
                    <th class="text-left"><?php echo $data->metodo?></th>
                 
                    <th class="text-center d-grid gap-2 d-flex justify-content-lg-center" >
                        <button class="btn btn90 fw-bold  mb-1 col-4 col-md-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModificarME<?php echo $data->id_metodo ?>"data-bs-toggle="tooltip" data-bs-placement="top" title="Modificar Metodo de Pago" ><i class="bi bi-pencil-fill "></i></button>
                        <button class="btn btn11 fw-bold  mb-1 col-4 col-md-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleEliminarME<?php echo $data->id_metodo ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Anular Metodo de Pago" ><i class="bi bi-trash-fill "></i></button>
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



  <div class="modal fade mx-auto" id="exampleRegistrarME" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content w-500">

      <div class="contenido">
        
        <div class="card-header p-2">
               <h4 class="titulo fw-bold text-end mr-2 " data-text="Registrar Metodo de Pago">Pago</h4>
        </div>
        <form class="modal-body" method="POST" id="registrarMetodo">
    
                 <div class="col-12">
                    <label  class="form-label"><i class="bi bi-cash-coin icon" style="color: #c79b2d!important;"></i>Método</label>
                   
                   <input type="text" class="form-control" placeholder="Ingrese un nuevo Método" name="metodo" id="metodo">
                   <p id="errorMetodo"  class=" text-center l"></p>
                </div>

          <div class="modal-footer">
             <button type="button" class="btn btn11 btn-danger  shadow"data-bs-dismiss="modal" id="cerrar">Cancelar</button>
            <button class="btn btnP"style="color: #fff;" id="envio" type="submit">Enviar</button>
         </div>

        </form>
            
       </div>       
      </div>   
    </div>
  </div>   


 <?php
      if(isset( $consultarMetodo)) {
      foreach ($consultarMetodo as $data){
                    
 ?>

<div class="modal fade mx-auto" id="exampleEliminarME<?php echo $data->id_metodo ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content w-500">
      <form class="contenido" method="POST" id="eliminarMetodo">
        <input type="hidden" name="id" value="<?php echo $data->id_metodo ?>">
        <div class="card-header p-2">
               <h4 class="titulo fw-bold text-end mr-2 " data-text="Anular Método de Pago">ciente</h4>
        </div>
      <div class="modal-body">
       ¿Deseas anular el Método de pago "<b style="color: #040855"><?php echo  $data->metodo ?></b>" ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn11 btn-danger shadow"data-bs-dismiss="modal" id="closed">Cancelar</button>
        <button type="submit" class="btn btnP" id="anular">Anular</button>
      </div>
      </form>
      
    </div>
  </div>
</div>


<div class="modal fade mx-auto" id="exampleModificarME<?php echo $data->id_metodo ?>" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content w-500">

      <div class="contenido">
        
        <div class="card-header p-2">
               <h4 class="titulo fw-bold text-end mr-2 " data-text=" Modificar Metodo de Pago">Pago</h4>
        </div>
        <form class="modal-body" method="POST" id="modificarMetodo">
          <input type="hidden" name="cod" value="<?php echo $data->id_metodo ?>" >
    
                 <div class="col-12">
                    <label  class="form-label"><i class="bi bi-cash-coin icon" style="color: #c79b2d!important;"></i>Método</label>
                   
                   <input type="text" class="form-control" placeholder="Ingrese un nuevo Método" name="met" id="metodo00" value="<?php echo  $data->metodo ?>">
                   <p id="errorMetodo00" class=" text-center l"></p>
                </div>

          <div class="modal-footer">
             <button type="button" class="btn btn11 btn-danger  shadow"data-bs-dismiss="modal" id="close">Cancelar</button>
            <button class="btn btnP "style="color: #fff;" id="modificar" type="submit">Modificar</button>
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

<div class="modal fade mx-auto" id="papeleraME" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content w-500">
      <form class="contenido" method="POST">
        <div class="card-header p-2">
               <h4 class="titulo fw-bold text-end mr-2 " data-text="Papelera">00</h4>
        </div>
      <div class="modal-body">
         <div class="table-responsive bordered ">
                  <table class="table table-hover" id="dataTable" >
                   <thead class=" table2 text-center">
                    <tr>
                      <th  scope="col">id</th>
                      <th  scope="col">metodo</th>
                      <th  scope="col col-lg-3">Restaurar</th>
                    </tr>
                  </thead>
              
                <tbody">
                  <?php
                    if(isset( $papeleraMetodo)) {
                    foreach ($papeleraMetodo as $data){
                    
                   ?>

                    <tr class="fila">
                    <th class="text-left"><?php echo $data->id_metodo ?></th>
                    <th class="text-left"><?php echo $data->metodo ?></th>
                    
                    <th class="text-center d-grid gap-2 d-flex justify-content-lg-center" >
                        <button value="<?php echo $data->id_metodo ?>" name="restaurarME" class="btn90 fw-bold  mb-1 col-4 col-md-2" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Restaurar Metodo de Pago"><i class="bi bi-check2-circle "></i></button>
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
 <script type="text/javascript" src="<?php echo URL;?>assets/js/metodo.js"></script>