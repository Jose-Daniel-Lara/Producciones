 <title> Mesas - Producciones 2.5.1.</title>
<?php 
  require_once("contenido/componentes/navegador.php");
 $carrusel->carruselEventos();

?>

<main class="container" id="table">
  <div> 
    <?php echo (isset( $mesa[0]))? ( $mesa[0]== "posicion")?   $mesa[1]:  " " :  " " ?>
    <?php echo (isset( $mesa[0]))? ( $mesa[0]== "entradas")?   $mesa[1]:  " " :  " " ?>
    <?php echo (isset( $mesa[0]))? ( $mesa[0]== "evento")?   $mesa[1]:  " " :  " " ?>
  </div>
  
  <div class="card mt-4 mb-4 justify-content-center shadow ">
           <div class="card-header card-footer d-grid gap-2 d-md-flex">
                <div class="col-md-9">
                  <h4 class="titulo fw-bold text-end mr-2 " data-text="Gestión de Mesas">Mesas</h4>
                </div>
                <div class="d-grid gap-3 d-flex justify-content-md-end justify-content-center col-md-3 text-end">
                  
                  <button class=" btn12 fw-bold col-2 col-md-3 col-lg-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleRegistrarM"style="box-shadow:none!important;" data-bs-toggle="tooltip" data-bs-placement="top" title="Registrar Mesa" ><i class="bx bxs-edit " style="font-size: 23px!important;"  ></i></button>

                  <a href="?url=reporteMesas" class="btn11 col-2 fw-bold col-md-3 col-lg-2 text-center pt-1 " type="button" style="box-shadow:none!important;"  data-bs-toggle="tooltip" data-bs-placement="top" title="Reporte de Mesas"><i class="bi bi-upload " style="font-size: 23px!important;"  ></i></a>
                  
                  <a class=" fw-bold  col-2 col-md-3 col-lg-2 text-center mt-1 " type="button" data-bs-toggle="modal" data-bs-target="#papeleraME" data-bs-toggle="tooltip" data-bs-placement="top" title="Papelera Mesa"><i class="bi bi-trash icon999 " style="color: #fff; font-size: 30px;" ></i></a>


                </div>
            </div>
             
            <div class="card-body shadow">

             <div class="table-responsive bordered ">
                <table class="table table-hover" id="dataTable" >
                   <thead class=" table2 text-center">
                    <tr>
                       <th  scope="col">N° de Mesa</th>
                      <th  scope="col">Evento</th>
                      <th  scope="col">Area</th>
                      <th  scope="col">Posición</th>
                      <th  scope="col">Cant. Asientos</th>
                      <th  scope="col">Precio</th>
                      <th  scope="col col-lg-3">Acciones</th>
                    </tr>
                  </thead>
              
                
                <tbody">
                  <?php
                    if(isset( $consultarMesa)) {
                    foreach ($consultarMesa as $data){
                    
                   ?>
                    <tr class="fila">
                    <th class="text-left"><?php echo $data->id_mesa ?></th>
                    <th class="text-left"><?php echo $data->evento ?></th>
                    <th class="text-left"><?php echo $data->area ?></th> 
                    <th class="text-left"><?php echo "C ".$data->posiColumna ."-"."F ".$data->posiFila ?></th>
                    <th class="text-left"><?php echo $data->cantPuesto ?></th>
                    <th class="text-left"><?php echo $data->precio." $" ?> </th>
                    
                   
                     <th class="text-center d-grid gap-2 d-md-flex justify-content-lg-center" >
                        <button class="btn btn90 fw-bold  mb-1 col-6 col-md-5" type="button" data-bs-toggle="modal" data-bs-target="#exampleModificarM<?php echo $data->id_mesa ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Modificar Mesa"><i class="bi bi-pencil-fill "></i></button>

                        <button class="btn btn11 fw-bold  mb-1 col-6 col-md-5" type="button" data-bs-toggle="modal" data-bs-target="#exampleEliminarM<?php echo $data->id_mesa ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Anular Mesa" ><i class="bi bi-trash-fill "></i></button>
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
        

  </main>
 <div class="modal fade mx-auto" id="exampleRegistrarM" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content w-500">
      <div class="contenido">
        <div class="card-header p-2">
               <h4 class="titulo fw-bold text-end mr-2 " data-text="Registrar Mesas">Mesas</h4>
        </div>
      <form class="modal-body" method="POST" id="registrarM">
     <div class="row">

                <div class="col-md-6">
                    <label  class="form-label"><i class="ri-building-2-line icon" style="color: #c79b2d!important;"></i>Nombre del Evento</label><br>
                   <select  name= "evento" class="form-select sel col-12" id="select">
                      <option value="Eventos" class="opcion" >Eventos</option>
                 <?php
                    if(isset( $consultarEvento)) {
                    foreach ($consultarEvento as $data){
                    
                 ?>
                      <option value="<?php echo $data->nombre ?>"  class="opcion"><?php echo $data->nombre ?></option>
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
                    <label  class="form-label"><i class="ri-layout-4-fill icon"style="color: #c79b2d!important;"></i>Area</label>
                 
                    <select  name= "area" class="form-select" id="selectArea">
                      <option value="Areas" class="opcion" >Areas</option>
                       <?php
                    if(isset( $consultarAreas)) {
                    foreach ($consultarAreas as $data){
                    
                   ?>
                      <option value="<?php echo $data->nombArea?>"  class="opcion"><?php echo $data->nombArea ?></option>
                  <?php 
                       }
                       }else{
                          " "; 
                       }
                  ?>
                    </select>
                    
                    <p id="errorSelectArea" class="text-center l"></p>
                </div>

                 <div class="col-md-6">
                    <label class="form-label"><i class="ri-money-dollar-circle-line icon" style="color: #c79b2d!important;"></i>Precio</label>

                     <input type="text" class="form-control col-md-6" name="precio" id="precio" placeholder="Ingresar el precio "><br>
                     <p id="errorPrecio"  class="text-center l"></p>
                </div>

                <div class="col-md-6">
                   <label class="form-label"><i class="ri-layout-column-fill icon" style="color: #c79b2d!important;"></i>Posicion columna</label>

                  <input type="number" class="form-control" name="posiColumna" id="posicionColumna" placeholder="Ingresar numero de columna"><br>
                  <p id="errorPosicionC"  class="text-center l"></p>
                </div>

                <div class="col-md-6 mt-3">
                    <label  class="form-label"><i class="bi bi-view-stacked icon" style="color: #c79b2d!important;"></i>Posicion Fila</label>
                    <input type="number" class="form-control" name="posiFila" id="posicionFila" placeholder="Ingresar numero de fila"><br>
                     <p id="errorPosicionF"  class="text-center l"></p>
                </div>

                 <div class="col-md-6 mt-3">
                    <label class="form-label"><i class="fa-solid fa-chair" style="color: #c79b2d!important;"></i>N° de Asientos</label>

                     <input type="number" class="form-control col-md-6" name="cantPuesto" id="numPuesto" placeholder="Ingresar la cantidad de asientos"><br>
                     <p id="errorPuestos"  class="text-center l"></p>
                </div>
                
               
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn11 btn-danger shadow"data-bs-dismiss="modal" id="cerrar22">Cancelar</button>
                <button class="btn btnP"style="color: #fff;" id="envio" type="submit">Enviar</button>
              </div>     


     </form>
      
      </div>

           
      </div>

      </div>
      
    </div>

     <?php
       if(isset( $consultarMesa)) {
       foreach ($consultarMesa as $data){
                    
    ?>

<div class="modal fade mx-auto" id="exampleEliminarM<?php echo $data->id_mesa ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content w-500">
      <form class="contenido" method="POST" id="anularMesa">
        <div class="card-header p-2">
               <h4 class="titulo fw-bold text-end mr-2 " data-text="Anular Mesa">Mesa</h4>
        </div>
        <input type="hidden" name="codigo" value="<?php echo $data->id_mesa ?>">
      <div class="modal-body">
       ¿Deseas anular la Mesa "<b style="color: #040855"><?php echo   $data->id_mesa  ?></b>" del Evento "<b style="color: #040855"><?php echo   $data->evento  ?></b>"?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn11 btn-danger shadow"data-bs-dismiss="modal" id="closed">Cancelar</button>
        <button type="submit" class="btn btnP" id="anular">Anular</button>
      </div>
      </form>
      
    </div>
  </div>
</div>


  <div class="modal fade mx-auto" id="exampleModificarM<?php echo $data->id_mesa ?>" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content w-500">
      <div class="contenido">
       
        <div class="card-header p-2">
               <h4 class="titulo fw-bold text-end mr-2 " data-text="Modificar Mesa">Mesas</h4>
        </div>
      <form class="modal-body" method="POST" id="modificarM">
     <div class="row">
       <input type="hidden" name="mesa" value="<?php echo $data->id_mesa ?>">

                <div class="col-md-6">
                    <label  class="form-label"><i class="ri-building-2-line icon" style="color: #c79b2d!important;"></i>Nombre del Evento</label>
                   <select  name= "event" class="form-select" id="select">
                      <option value="<?php echo $data->evento ?>" class="opcion" ><?php echo $data->evento ?></option>
                 <?php
                    if(isset( $mostrar)) {
                    foreach ($mostrar as $data){
                    
                 ?>
                      <option value="<?php echo $data->nombre?>"  class="opcion"><?php echo $data->nombre ?></option>
                  <?php 
                       }
                       }else{
                          " "; 
                       }
                  ?>
                    </select>
                    <p id="errorSelect" style="color: #df0000;" class="text-center"></p>
                </div>

    
                 <div class="col-md-6">
                    <label  class="form-label"><i class="ri-layout-4-fill icon"style="color: #c79b2d!important;"></i>Area</label>
                 
                    <select  name= "ar" class="form-select" id="selectArea">
                 <?php
                    if(isset( $consultarAreas)) {
                    foreach ($consultarAreas as $data){
                    
                   ?>
                      <option value="<?php echo $data->nombArea?>"  class="opcion"><?php echo $data->nombArea ?></option>
                  <?php 
                       }
                       }else{
                          " "; 
                       }
                  ?>
                    </select>
                    
                    <p id="errorSelectArea" class="text-center l"></p>
                </div>

                 <div class="col-md-6">
                    <label class="form-label"><i class="ri-money-dollar-circle-line icon" style="color: #c79b2d!important;"></i>Precio</label>

                     <input type="number" value="<?php echo $data->precio ?>" class="form-control col-md-6" name="pre" id="precio00" placeholder="Ingresar el precio "><br>
                     <p id="errorPrecio00"  class="text-center l"></p>
                </div>

                <div class="col-md-6">
                   <label class="form-label"><i class="ri-layout-column-fill icon" style="color: #c79b2d!important;"></i>Posicion columna</label>

                  <input type="number" value="<?php echo $data->posiColumna?>" class="form-control" name="pColumna" id="posicionColumna00" placeholder="Ingresar numero de columna" ><br>
                  <p id="errorPosicionC00"  class="text-center l"></p>
                </div>

                <div class="col-md-6">
                    <label  class="form-label"><i class="bi bi-view-stacked icon" style="color: #c79b2d!important;"></i>Posicion Fila</label>
                    
                    <input type="number"  value="<?php echo $data->posiFila?>"  class="form-control" name="pFila" id="posicionFila00" placeholder="Ingresar numero de fila"><br>
                     <p id="errorPosicionF00" class="text-center l"></p>
                </div>
                 <div class="col-md-6 mt-3">
                    <label class="form-label"><i class="fa-solid fa-chair" style="color: #c79b2d!important;"></i>N° de Asientos</label>

                     <input type="number" class="form-control col-md-6" name="cPuesto" id="numPuesto00" placeholder="Ingresar la cantidad de asientos"><br>
                     <p id="errorPuestos00"  class="text-center l"></p>
                </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn11 btn-danger shadow"data-bs-dismiss="modal" id="close">Cancelar</button>
                <button class="btn btnP"style="color: #fff;" type="submit" id="modifica">Modificar</button>
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
               <h4 class="titulo fw-bold text-end mr-2 " data-text="Papelera">area</h4>
        </div>
      <div class="modal-body">
         <div class="table-responsive bordered ">
                  <table class="table table-hover" id="dataTable" >
                   <thead class=" table2 text-center">
                    <tr>
                       <th  scope="col">N° de Mesa</th>
                      <th  scope="col">Evento</th>
                      <th  scope="col">Area</th>
                       <th  scope="col">Precio</th>
                      <th  scope="col">P. Columna</th>
                      <th  scope="col">P. Fila</th>
                      <th  scope="col">Cant. Asientos</th>
                      <th  scope="col col-lg-3">Restaurar</th>
                    </tr>
                  </thead>
              
                <tbody">
                  <?php
                    if(isset( $papeleraMesas)) {
                    foreach ($papeleraMesas as $data){
                    
                   ?>

                    
                <tr class="fila">
                    <th class="text-left"><?php echo $data->id_mesa ?></th>
                    <th class="text-left"><?php echo $data->evento ?></th>
                    <th class="text-left"><?php echo $data->area ?></th>
                    <th class="text-left"><?php echo $data->precio ?> </th>
                    <th class="text-left"><?php echo $data->posiColumna ?></th>
                    <th class="text-left"><?php echo $data->posiFila ?></th>
                    <th class="text-left"><?php echo $data->cantPuesto ?></th>
                    
                    <th class="text-center d-grid gap-2 d-flex justify-content-lg-center" >
                        <button value="<?php echo $data->id_mesa ?>" name="restaurarME" class="btn90 fw-bold  mb-1 col-7 col-md-5" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Restaurar Mesa"><i class="bi bi-check2-circle "></i></button>
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
<script type="text/javascript" src="<?php echo URL;?>assets/js/mesas.js"></script>
<script type="text/javascript">
$(document).ready(function(){

  $("#select").select2({
    theme:'bootstrap-5',
    dropdownParent:$('#exampleRegistrarM .modal-body'),
    selectionCssClass:"select2--small",
    dropdownCssClass:"select",
    searchCssClass:"buscar",
  });

});
  
</script>