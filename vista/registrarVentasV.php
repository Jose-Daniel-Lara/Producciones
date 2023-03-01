 <title> Registrar Ventas - Producciones 2.5.1.</title>
<?php 
require_once("contenido/componentes/navegador.php");
  $carrusel->carruselVentas();
?>



<main class="container" id="table" method="POST">
  
  <div class="card mt-4 mb-4 justify-content-center shadow ">
            <div class="card-header card-footer d-grid gap-2 d-md-flex">
                <div class="col-md-9">
                  <h4 class="titulo fw-bold text-end mr-2 " data-text="Gestión de Ventas de Entradas">Ventas</h4>
                </div>
                 <div class="d-grid gap-3 d-flex justify-content-md-end col-md-3 text-end justify-content-center">
                  
                  <button class=" btn12 fw-bold col-3 col-lg-2" type="button"data-bs-toggle="modal" data-bs-target="#registrarV"style="box-shadow:none!important;" data-bs-toggle="tooltip" data-bs-placement="top" title="Registrar Venta"><i class="bx bxs-edit " style="font-size: 23px!important;"  ></i></button>

                   <a href="?url=reporteVentas" class="btn11 col-2 fw-bold col-md-3 col-lg-2 text-center pt-1 " type="button" style="box-shadow:none!important;"  data-bs-toggle="tooltip" data-bs-placement="top" title="Reporte de Ventas"><i class="bi bi-upload " style="font-size: 23px!important;"  ></i></a>
                  
                  <a class=" fw-bold col-lg-2 col-3 text-center mt-1 " type="button" data-bs-toggle="modal" data-bs-target="#papeleraME" data-bs-toggle="tooltip" data-bs-placement="top" title="Papelera Venta"><i class="bi bi-trash icon999 " style="color: #fff; font-size: 30px;" ></i></a>


                </div>
            </div>
            <div class="card-body shadow" >

             <div class="table-responsive bordered ">
               <table class="table table-hover" id="dataTable">
                <thead class=" table2 text-center">
                     <tr>
                      <th  scope="col">Fecha</th>
                      <th  scope="col">Hora</th>
                      <th  scope="col">Cliente</th>
                      <th  scope="col">Descripcion</th>
                      <th  scope="col">Metodo</th>
                      <th  scope="col">Monto Total</th>
                      <th  scope="col">Acciones</th>
                    </tr>
                  </thead>
                  <tbody">

                     <tr class="fila">
                      <th class="text-left">12/02/23</th>
                      <th class="text-left">12:34 pm</th>
                      <th class="text-left">V-30483987</th>
                      <th class="text-left">Descuento 2X1</th>
                      <th class="text-left">zelle</th>
                      <th class="text-left">120$</th>
                       <th class="text-center d-grid gap-3 d-flex justify-content-lg-center" >
                        <button class="btn btn90 col-3.5 col-md-3" type="button" data-bs-toggle="modal" data-bs-target="#detalles" data-bs-toggle="tooltip" data-bs-placement="top" title="detalles"><i class="ri-article-line "></i></button>

                        <a href="?url=reporteDetallesVenta" class="btn12 col-3.5 col-md-3 text-center pt-2 " type="button" style="box-shadow:none!important;"  data-bs-toggle="tooltip" data-bs-placement="top" title="Reporte de los detalles de la venta"><i class="bi bi-upload "  ></i></a>

                          <button class="btn btn11 col-3.5 col-md-3" type="button" data-bs-toggle="modal" data-bs-target="#exampleEliminarV" data-bs-toggle="tooltip" data-bs-placement="top" title="Anular Venta"><i class="bi bi-trash-fill "></i></button>
                    </th>
                    </tr>
                     
              
                  </tbody>
            </table>
              </div>
              <!-- End Table with stripped rows -->

            </div>
            <div class="card-header"></div>
          </div>
        

  </main>

<div class="modal fade mx-auto vent " id="registrarV" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form method="POST" class="modal-dialog modal-dialog-centered  modal-fullscreen">
    <div class="modal-content vh-100 mod ">
      <div class="">
      <div class=" card-header p-2">
        <h4 class="titulo fw-bold text-end mr-2 " data-text="Registrar Nueva Venta">Usuarios</h4>
      </div>
    <div class="contenido p-4 val " id="form-Ventas">
              
  <div class=" row g-2 mb-3">
              <div class=" col-12 col-md-5">
                <label  class="form-label"><i class="bi bi-person-fill icon" style="color: #c79b2d!important;"></i>Cliente</label>

                 <select  name= "cedula" class="form-select" id="cedula">
                      <option value="Cedula" class="opcion" >Cedula</option>
                   <?php
                    if(isset(   $mostrarClientes)) {
                    foreach (  $mostrarClientes as $data){
                    
                    ?>
                      <option value="<?php echo $data->cedula ?>"  class="opcion"><?php echo $data->cedula ?></option>
                    <?php 
                       }
                       }else{
                          " "; 
                       }
                     ?>
                 </select>
                    <p id="errorCedula" style="color:  #df0000;"  class=" text-center l"></p>
              </div>

              <div class=" date col-12  col-md-6 justify-content-center">
                <div class="client row g-2 p-2 ">
                  <div class="col-3 text-center">ana</div>
                  <div class="col-3 text-center">wyatt</div>
                   <div class="col-3 text-center">Wayando06xd.@gmail.com</div>
                </div>
              </div>
             </div>

            <div class="row">
              
              <div class="col-12 col-md-4 col-xxl-4 mb-3">
                  <label  class="form-label"><i class="bi bi-cash-coin"  style="color: #c79b2d!important;"></i> Método de Pago</label>
                  <select  name= "metodoPago" class="form-select" id="metPago">
                      <option value="Metodo" class="opcion" >Seleccionar Método</option>
                      <?php
                       if(isset( $consultarMetodo)) {
                       foreach ($consultarMetodo as $data){
                      ?>
                      <option value="<?php echo $data->id_metodo?>"  class="opcion"><?php echo $data->metodo?></option>
                      <?php 
                       }
                       }else{
                          " "; 
                       }
                     ?>
                   </select>
   
                 <p id="errorMetodo"   class=" text-center l"></p>
              </div>
              <div class="col-12 col-md-4 col-xxl-4  mb-3">
                 <label  class="form-label"> <i class="ri-shopping-cart-fill"  style="color: #c79b2d!important;"></i>Descripcion de la venta</label>
                
                <input type="textarea" class="form-control" placeholder="ingrese la Descripción" id="descripcion" name="descripcion">
                 <p id="errorDescripcion" class=" text-center l"></p>
              </div>

              <div class="col-6 col-md-2 mb-3">
                 <label  class="form-label"><i class="bx bxs-calendar-edit"  style="color: #c79b2d!important;"></i> Fecha</label>
                <input type="date" class="form-control" name="fechaPago" placeholder="fecha de pago" id="fecha">
               <p id="errorFecha"   class=" text-center l"></p>
              </div>
               <div class="col-6 col-md-2  mb-3">
                 <label  class="form-label"><i class="bi bi-alarm"  style="color: #c79b2d!important;"></i> Hora</label>
                <input type="time" class="form-control" name="hora" id="hora">
                <p id="errorHora"   class=" text-center l"></p>
              </div>

            </div>
            <div class="d-grid gap-2 d-flex ">
              <div class=" col-md-4 col-6">
                <label  class="form-label"><i class="ri-building-2-line " 
                 style="color: #c79b2d!important;"></i> Evento</label>
                 <select  name= "evento" class="form-select shadow-none focus-none" id="select">
                      <option value="Eventos" class="opcion" >Seleccionar Evento</option>
                      <?php
                       if(isset( $consultarEvento)) {
                       foreach ($consultarEvento as $data){
                    
                      ?>
                      <option value="<?php echo $data->codigo ?>"  class="opcion"><?php echo $data->nombre ?></option>
                      <?php 
                       }
                       }else{
                          " "; 
                       }
                      ?>
                    </select>
                    <p id="errorSelect" class="text-center l"></p>
                   
              </div>
              <div class="col-4 col-md-2 m-auto-end justify-content-end " >
                 <label  class="form-label"> <i class="bi bi-bar-chart "  style="color: #c79b2d!important;"></i> Descuento</label>
                <input type="checkbox" id="config">
                <label class="des" style="display: none;">
                  <div class="col-5 justify-content-center">
                    <input type="text" id="configDesc" class="form-control" value="10">
                    <p id="errorDescuento" class="text-center l"></p>
                  </div>
                 
                </label>
               </div>
            </div>
              
  
  <div class="listaV" id="ventass">
    <div class="table-responsive bordered ">
       <table class=" table table-striped">
     <thead class=" table1 text-center p-2">
                     <tr >
                      <td  width="4%"scope="col"></td>
                      <td  width="17%"scope="col">Area</td>
                      <td width="17%" scope="col">Mesas</td>
                      <td width="15%" scope="col">Entradas</td>
                      <td width="15%" scope="col">Precio</td>
                      <td width="16%" scope="col">subTotal</td>
                      <td style="display: none;"  width="16%" class="des"  scope="col">Descuento</td>
                    </tr>
    </thead>
      <tbody id="tt">
        <tr id="tr">
          <td></td>
          <td width="17%" class="p-2 area"> 
                 <select  name= "area" class="form-select mt-3 area" id="selectArea">
                      <option value="Areas" class="opcion" ></option>
                      <?php
                       if(isset( $consultarAreas)) {
                       foreach ( $consultarAreas as $data){
                    
                      ?>
                      <option value="<?php echo $data->cod_area ?>"  class="opcion"><?php echo $data->nombArea ?></option>
                      <?php 
                       }
                       }else{
                          " "; 
                       }
                      ?>
                    </select>
                    <p id="errorSelectArea" class="text-center l mesa"></p>
                  </td>
          <td width="17%"class="p-2 mesa "> <select  name= "mesa" class="form-select mt-3" id="numMesa">
                      <option value="Mesas" class="opcion" ></option>
                      <?php
                        if(isset( $consultarMesa)) {
                        foreach ($consultarMesa as $data){
                      ?>
                      <option value="<?php echo $data->id_mesa ?>" class="opcion">mesa <?php echo $data->id_mesa ?></option>
                      <?php 
                       }
                       }else{
                          " "; 
                       }
                     ?>
                    </select>
                 <p id="errorMesa"   class=" text-center l"></p></td>

          <td width="15%" class="entradas pt-4"><input type="number" class="form-control" value="" id="entrada">
          <p id="errorEntrada" class="text-center l" ></p></td>
          <td width="15%" class="precio pt-4"><input type="number" class="form-control" id="pago" value=""><p id="errorPago" class="text-center l"></p></td>
          <td width="16%" class="sum text-center pt-4 ">0</td>
          <td width="16%" style="display: none;background: #fff!important;" class="desc des mt-3 text-center ">0</td>
         
        </tr>
      </tbody>
    </table>
    </div>
   

    <div class="error"></div>
    <a class="control más"><i class="bi bi-plus-circle-fill icon00"  style="color: #040855!important;"></i></a>
  </div>
  <!--.invoice-body-->
  <div class="invoicelist-footer">
    <table>
      <tbody>
        <tr class="totalN ">
          <td class="d-flex"><strong style="color: #040855!important;">Total:</strong>$  <p id="totalDolar"> 0</p></td>
        </tr>
        <tr class="totalD " style="display: none;">
          <td class="d-flex"><strong style="color: #040855!important;">Total:</strong>$  <p id="totalDesc"> 0</p></td>
        </tr>
      </tbody>
       <tr style="font-size: 20px;">
          <td ><B style="color:#df0000 !important;" >Al cambio:</B>Bs 2,026</td>
       </tr>
    </table>
  </div>
  </div>
 
  </div>
   <div class="modal-footer mb-2">
        <button type="button" class="btn btn11 btn-danger shadow"data-bs-dismiss="modal">Cancelar</button>
         <button class="btn btnP"style="color: #fff;" id="enviar" type="button">Enviar</button>
 </div>
  </div>
</form>
</div>

<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->


<div class="modal fade mx-auto" id="exampleEliminarV" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content w-500">
      <div class="contenido">
        <div class="card-header p-2">
               <h4 class="titulo fw-bold text-end mr-2 " data-text="Anular Venta">Venta</h4>
        </div>
      <div class="modal-body">
       ¿Deseas Anular esta Venta?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn11 btn-danger shadow"data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btnP btn-primary">Anular</button>
      </div>
      </div>
      
    </div>
  </div>
</div>


<div class="modal fade mx-auto" id="detalles" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  modal-xl">
    <div class="modal-content w-500">
      <div class="contenido">
        <div class="card-header p-2">
               <h4 class="titulo fw-bold text-end mr-2 " data-text="Detalles">Venta</h4>
        </div>
      <div class="modal-body">
      
              
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn11 btn-danger shadow"data-bs-dismiss="modal">Cancelar</button>
      </div>
      </div>
      
    </div>
  </div>
</div>      
<a href="#" class="back-to-top d-flex align-items-center justify-content-center paArriba fw-bold "><i class="bi bi-arrow-up-short"></i></a>
<?php 
require_once("contenido/componentes/footer.php")
 ?>
 <script type="text/javascript" src="<?php echo URL;?>assets/js/registrarVentas.js"></script>