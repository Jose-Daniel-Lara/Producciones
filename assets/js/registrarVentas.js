
var Descontar = parseFloat ($('#configDesc').val());
var momentD = false;
$('body').addClass('hidetax hidenote hidedate');
calculate();

///////////////////////////////////////////////////////////////////////////

function validar(){

$('#ventass #tt #tr').each( function(){
    var fila = $(this);
    var  precio   = fila.find('.precio input').val();
    var entradas = fila.find('.entradas input').val();
    var area= fila.find('.area select').val();
    var mesa= fila.find('.mesa select').val();
    var pagoExp = /^[0-9]+.[0-9]+$/;
    var error11=""
    var error12=""
    var error13=""
    var error14=""

    if (area == 'Areas') {
      error11='<i class="bi bi-exclamation-triangle-fill" ></i> Seleccione el Área ';
    }
    else{
      error11=" ";
    }
    if (mesa =='Mesas') {
       var error12='<i class="bi bi-exclamation-triangle-fill" ></i> Seleccione la Mesa ';
    }
    else{
      error12=" ";
    }
    if (entradas.length < 1) {
     var error13='<i class="bi bi-exclamation-triangle-fill" ></i> Ingrese la cantidad de entradas';
    }
    else{
      error13=" ";
    }

    if(!pagoExp.test(precio)){
        error14='<i class="bi bi-exclamation-triangle-fill" ></i> Ingrese el Precio';
    }
    else{
      error14=" ";
    }
  
    fila.find('#errorSelectArea').html( error11 );
    fila.find('#errorMesa').html(error12 );
    fila.find('#errorEntrada').html( error13 );
    fila.find('#errorPago').html(error14 );
  });

}

/////////////////////////////////////////////////////////////////////////////////////////////////


function calculate(){

  var totalDesc = 0;
  var totalDolar = 0;

  $('#ventass #tt #tr').each( function(){
    var fila = $(this);
    var  precio   = fila.find('.precio input').val();
    var entradas = fila.find('.entradas input').val();
    var sum = entradas * precio;
    var ope = ((Descontar/100)*sum);
    var desc =(sum - ope);
    
    
    totalDolar = totalDolar + sum;
    totalDesc = totalDesc + desc;
    fila.find('.sum').text( sum.toFixed(2) );
    fila.find('.desc').text( desc.toFixed(2) );
  });

  $('#totalDolar').text(totalDolar.toFixed(2));
  $('#totalDesc').text(totalDesc.toFixed(2));
  
}

//////////////////////////////////////////////////////////////////////////////////////////////

$('#config').on('click', function () {
  var activarD = $('#config').prop('checked');
  if (activarD == true) {
    $(".des").css('display', 'block');
    $(".totalD").css('display', 'block');
    $(".totalN").css('display', 'none');
  } else {
    $(".des").css('display', 'none');
    $(".totalD").css('display', 'none');
    $(".totalN").css('display', 'block');
  }
})

////////////////////////////////////////////////////////////////////////////////////////////////

var inputs =` <tr id="tr">
         <td class="pt-4"><a class="control eliminar  pt-3" ><i class="bi bi-trash-fill icon01"  style="color: #040855!important;"></i></a>
          </td> 
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
         
        </tr>`;
//////////////////////////////////////////////////////////////////////////////////////////////////////

$('.listaV').on('keyup','input',function(e){
   e.preventDefault();
   validar();
   calculate();
});

///////////////////////////////////////////////////////////////////////////

$('.más').on('click',function(e){
  $('.listaV tbody').append(inputs);
  e.preventDefault();
  calculate();
});

///////////////////////////////////////////////////////////////////////////

$('body').on('click','.eliminar',function(e){
  $(this).closest('tr').remove();
  e.preventDefault();
  calculate();
});

///////////////////////////////////////////////////////////////////////////

$('#config').on('change',function(){
 momentD = !momentD;
  $('body').toggleClass('showtax hidetax');
});

///////////////////////////////////////////////////////////////////////////

$('#configDesc').on('keyup',function(){
  Descontar= parseFloat($(this).val());
  if (Descontar < 0 ||Descontar > 100){
   Descontar = 0;
  }
  calculate();
});

///////////////////////////////////////////////////////////////////////////

var cedula=document.getElementById('cedula');
var metPago=document.getElementById("metPago");
var descripcion=document.getElementById("descripcion");
var select=document.getElementById("select");
var descuento=document.getElementById("configDesc");
var fecha=document.getElementById("fecha");
var hora=document.getElementById("hora");


var errorCedula=document.getElementById("errorCedula");
var errorMetodo=document.getElementById("errorMetodo");
var errorDescripcion=document.getElementById("errorDescripcion");
var errorSelect=document.getElementById("errorSelect");
var errorDescuento=document.getElementById("errorDescuento");
var errorFecha=document.getElementById("errorFecha");
var errorHora=document.getElementById("errorHora");
document.getElementById("enviar").addEventListener("click", e => {
  var error1=""
  var error2= ""
  var error3=""
  var error4=""
  var error9=""
  var error10=""
  var error11=""
    var enviar=false;
    errorCedula.innerHTML ="";
    errorMetodo.innerHTML ="";
    errorDescripcion.innerHTML="";
    errorSelect.innerHTML ="";
    errorDescuento.innerHTML="";
    errorFecha.innerHTML="";
    errorHora.innerHTML="";
   
  
  if (cedula.value =='Cedula') {
        e.preventDefault();
     error1+='<i class="bi bi-exclamation-triangle-fill"></i>Ingrese la Cédula';
    enviar = true;

  }

  if(metPago.value=='Metodo'){
          e.preventDefault();
      error2+='<i class="bi bi-exclamation-triangle-fill" ></i>Ingrese el método de pago ';
      enviar = true;
  }
  if(descripcion.value.length < 1){
          e.preventDefault();
      error3+='<i class="bi bi-exclamation-triangle-fill" ></i> Ingrese la descripción de la venta ';
      enviar = true;
  }


  if (select.value =='Eventos') {
    e.preventDefault();
     error4+='<i class="bi bi-exclamation-triangle-fill" ></i> Seleccione el Evento';
        enviar=true;
  }


if(descuento.value.length < 1){
      e.preventDefault();
      error9+='<i class="bi bi-exclamation-triangle-fill" ></i> Ingrese el Descuento ';
      enviar = true;
  }

if (hora.value.length < 1) {
    e.preventDefault();
    error10+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese la hora';
    enviar = true;
  }
  if (fecha.value.length < 1 ) {
    e.preventDefault();
    error11+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese la fecha';
    enviar = true;
  }
  validar();
  e.preventDefault();

  if (enviar) {
    errorCedula.innerHTML =error1
    errorMetodo.innerHTML =error2
    errorDescripcion.innerHTML=error3
    errorSelect.innerHTML =error4
    errorDescuento.innerHTML=error9
    errorHora.innerHTML=error10
    errorFecha.innerHTML=error11
        
  }

  else{
    enviar = true;
  }
});

