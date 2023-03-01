 
 <title> Áreas de las mesas - Producciones 2.5.1.</title>

<?php 
 require_once("contenido/componentes/navegador.php");
  $carrusel->carruselEventos();
?>

<main class="container" id="table">

  <div><?php echo (isset($registrarArea[0]))? ($registrarArea[0]== "area")?  $registrarArea[1]:  " " :  " " ?></div>
   <div><?php echo (isset( $restaurarArea[0]))? ( $restaurarArea[0]== "Rarea")?$restaurarArea[1]:  " " :  " " ?></div>
  
  <div class="card mt-4 mb-4 justify-content-center shadow ">
           <div class="card-header card-footer d-grid gap-2 d-flex">
                <div class="col-9">
                  <h4 class="titulo fw-bold text-end mr-2 " data-text="Areas de las Mesas">Areas de las Mesas</h4>
                </div>
                <div class="d-grid gap-2 d-flex  justify-content-end col-3 text-end">
                  <button class="btn12 fw-bold col-5 col-md-3 col-lg-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleRegistrarA"style="box-shadow:none!important;" ><i class="bx bxs-edit " style="font-size: 23px!important;"  data-bs-toggle="tooltip" data-bs-placement="top" title="Registrar Area" ></i></button>
                   <a class=" fw-bold col-5 col-md-3 col-lg-2 text-center mt-1 " type="button" data-bs-toggle="modal" data-bs-target="#examplePapeleraA"  data-bs-toggle="tooltip" data-bs-placement="top" title="Papelera Area"><i class="bi bi-trash icon999 " style="color: #fff; font-size: 30px;" ></i></a>
                </div>
        
            </div>
            <div class="card-body shadow">
             

             <div class="table-responsive bordered ">
                  <table class="table table-hover" id="dataTable" >
                   <thead class=" table2 text-center">
                    <tr>
                      <th  scope="col">Codigo</th>
                      <th  scope="col">Área</th>
                      <th  scope="col col-lg-3">Acciones</th>
                    </tr>
                  </thead>
              
                <tbody id="tbody">
                 <?php
                    if(isset( $consultarAreas)) {
                    foreach ($consultarAreas as $data){
                   ?>
                   <tr class="fila">
                    <th class="text-left"><?php echo $data->cod_area?></th>
                    <th class="text-left"><?php echo $data->nombArea?></th>
                     <th class="text-center d-grid gap-2 d-flex justify-content-lg-center" >
                        <button class="btn btn90 fw-bold  mb-1 col-4 col-md-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModificarA<?php echo $data->cod_area ?>"data-bs-toggle="tooltip" data-bs-placement="top" title="Modificar Area" ><i class="bi bi-pencil-fill "></i></button>
                        <button class="btn btn11 fw-bold  mb-1 col-4 col-md-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleEliminarA<?php echo $data->cod_area ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Anular Area" ><i class="bi bi-trash-fill "></i></button>
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

  <div class="modal fade mx-auto" id="exampleRegistrarA" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class=" modal-dialog modal-dialog-centered ">
    <div class="modal-content w-500">

      <div class="contenido">
        
        <div class="card-header p-2">
               <h4 class="titulo fw-bold text-end mr-2 " data-text="Registrar Área de las mesas">evento</h4>
        </div>
        <form class="modal-body" method="POST" id="RegistrarArea">
    
                 <div class="col-12">
                    <label  class="form-label"><i class="ri-layout-4-fill icon"style="color: #c79b2d!important;"></i>Área</label>
                   
                  <input type="text" class="form-control" placeholder="Ingrese una nueva área" name="nombArea" id="area">
                   <p id="errorArea" class=" text-center l"></p>
                </div>

          <div class="modal-footer">
             <button type="button" class="btn btn11 col-2.5 btn-danger  shadow"data-bs-dismiss="modal" id="cerrar">Cancelar</button>
            <button class="btn btnP  btn-light col-2.5"style="color: #fff;" id="envio" name="envio" type="submit">Enviar</button>

         </div>
          <p class="text-center l"><?php echo (isset( $registrarArea[0]))? ( $registrarArea[0] == "cod_area")?  $registrarArea[1] :  " " :  " " ?></p>

        </form>
            
       </div>       
      </div>   
    </div>
  </div>   

<?php
if(isset( $consultarAreas)) {
foreach ($consultarAreas as $data){
?>

<div class="modal fade mx-auto" id="exampleEliminarA<?php echo $data->cod_area ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class=" modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content w-500">
      <form class="contenido" method="POST" id="eliminarArea">
        <div class="card-header p-2">
               <h4 class="titulo fw-bold text-end mr-2 " data-text="Anular Área de las mesas">area</h4>
        </div>
      <div class="modal-body">
         <input type="hidden" name="cod" value="<?php echo $data->cod_area ?>">
       ¿Deseas anular el Área "<b style="color: #040855"><?php echo  $data->nombArea ?></b>" ?
      </div>
      <div class="modal-footer">
        <button type="button" id="adios" class="btn btn11 btn-danger  shadow"data-bs-dismiss="modal">Cancelar</button>
         <button  type="submit" class="btn btnP " id="anular" name="anular">Anular</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

 <div class="modal fade mx-auto" id="exampleModificarA<?php echo $data->cod_area ?>" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class=" modal-dialog modal-dialog-centered ">
    <div class="modal-content w-500">

      <div class="contenido">
        
        <div class="card-header p-2">
               <h4 class="titulo fw-bold text-end mr-2 " data-text="Modificar Área de las mesas">evento</h4>
        </div>
        <form class="modal-body" method="POST" id="modificarArea">
          <input type="hidden" name="id" value="<?php echo $data->cod_area ?>">
    
                 <div class="col-12">
                    <label  class="form-label"><i class="ri-layout-4-fill icon"style="color: #c79b2d!important;"></i>Área</label>
    
                    <input type="text" class="form-control" placeholder="Ingrese una nueva área" name="nombre" id="area00" value="<?php echo $data->nombArea ?>">

                   <p id="errorArea00" style="color:  #df0000;"  class=" text-center"></p>
                   <p class="text-center" style="color:  #df0000;" ><?php echo (isset($area[0]))? ($area[0] == "nombArea")?  $area[1] :  " " :  " " ?></p>
                </div>

          <div class="modal-footer">
             <button type="button" id="close" class= "btn btn11 btn-danger  shadow"data-bs-dismiss="modal">Cancelar</button>
             <button class= "btn btnP "style="color: #fff;" id="modificar" name="modificar" type="submit">Enviar</button>

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


<div class="modal fade mx-auto" id="examplePapeleraA" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class=" modal-dialog modal-dialog-centered " role="document">
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
                      <th  scope="col">Codigo</th>
                      <th  scope="col">Área</th>
                      <th  scope="col col-lg-3">Restaurar</th>
                    </tr>
                  </thead>
              
                <tbody id="restaurarArea">
                  <?php
                    if(isset( $papeleraAreas)) {
                    foreach ($papeleraAreas as $data){
                    
                   ?>
                
                    <tr class="fila">
                    <th class="text-left"><?php echo $data->cod_area ?></th>
                    <th class="text-left" ><?php echo $data->nombArea ?></th>
                  
                    <th class="text-center d-grid gap-2 d-flex justify-content-lg-center" >
                        <button value="<?php echo $data->cod_area ?>" name="nombre" class="btn90 fw-bold  mb-1 col-4 col-md-3" type="submit"  data-bs-toggle="tooltip" data-bs-placement="top" title="Restaurar Area" ><i class="bi bi-check2-circle "></i></button>
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
        <button type="button" class=" btn btn11 shadow"data-bs-dismiss="modal">Cancelar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center paArriba fw-bold "><i class="bi bi-arrow-up-short"></i></a>
<?php 
require_once("contenido/componentes/footer.php")
 ?>

<script type="text/javascript" src="<?php echo URL;?>assets/js/areas.js"></script>

<script type="text/javascript">
  $("#")
</script>