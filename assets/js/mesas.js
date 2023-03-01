/////__________--Validacion de Registrar--___________//////

var select=document.getElementById("select");
var selectArea=document.getElementById("selectArea");
var posicionColumna=document.getElementById("posicionColumna");
var posicionFila=document.getElementById("posicionFila");
var numPuesto=document.getElementById("numPuesto");
var precio=document.getElementById("precio");


var errorSelect=document.getElementById("errorSelect")
var errorSelectArea=document.getElementById("errorSelectArea");
var errorPosicionC=document.getElementById("errorPosicionC");
var errorPosicionF=document.getElementById("errorPosicionF");
var errorPuestos=document.getElementById("errorPuestos");
var errorPrecio=document.getElementById("errorPrecio");

document.getElementById("envio").addEventListener("click", e => {
	var error1=""
	var error2= ""
	var error3=""
	var error4=""
	var error5=""
	var error6=""
    var enviar=false;
    var cantidadExp = /^[0-9]+$/;
    var precioExp = /^[0-9]+.[0-9]+$/;
    errorSelect.innerHTML=""
    errorSelectArea.innerHTML=""
    errorPosicionC.innerHTML =""
    errorPosicionF.innerHTML =""
    errorPuestos.innerHTML=""
    errorPrecio.innerHTML=""
    


	if (select.value =='Eventos') {
		e.preventDefault();
		error1+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese el nombre del Evento';
        enviar = true;
	}


	
	if (selectArea.value =='Areas') {
		e.preventDefault();
		 error2+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese el area donde se ubica la mesa';

	}
	
	

	if(posicionColumna.value.length < 1){
        e.preventDefault();
		 error3+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese la posicion columna de la mesa';
		enviar = true;
	
	}

	if(posicionColumna.value =='0'){
        e.preventDefault();
		 error3+='<i class="bi bi-exclamation-triangle-fill"></i> Ingrese número de columna';
		enviar = true;
	}

	if(posicionFila.value.length < 1){
        e.preventDefault();
		 error4+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese la posición fila de la mesa';
		enviar = true;
	
	}

	if(posicionFila.value =='0'){
        e.preventDefault();
		 error4+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese número de fila';
		enviar = true;
	}

	if(!cantidadExp.test(numPuesto.value)){
        e.preventDefault();
		 error5+='<i class="bi bi-exclamation-triangle-fill""></i> Ingrese la cantidad de asientos que tendra la mesa';
		enviar = true;
	
	}

	if(numPuesto.value =='0'){
        e.preventDefault();
		 error5+='<i  class="bi bi-exclamation-triangle-fill""></i> La cantidad de puestos debe ser mayor a 0';
		enviar = true;
	}

	if(!precioExp.test(precio.value)){
        e.preventDefault();
		error6+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese el precio';
		 enviar = true;
	}
	
	

	if (enviar) {
    errorSelect.innerHTML=error1
    errorSelectArea.innerHTML=error2
    errorPosicionC.innerHTML =error3
    errorPosicionF.innerHTML =error4
    errorPuestos.innerHTML=error5
    errorPrecio.innerHTML=error6
        
	}

	else{
		enviar = true;
           //registrarMesa();
         // e.preventDefault();
	}
});

/////__________--Validacion de Modificar--___________//////

var posicionColumna00=document.getElementById("posicionColumna00");
var posicionFila00=document.getElementById("posicionFila00");
var precio00=document.getElementById("precio00");
var numPuesto00=document.getElementById("numPuesto00");
var errorPosicionC00=document.getElementById("errorPosicionC00");
var errorPosicionF00=document.getElementById("errorPosicionF00");
var errorPrecio00=document.getElementById("errorPrecio00");
var errorPuestos00=document.getElementById("errorPuestos00");

document.getElementById("modifica").addEventListener("click", e => {
	var error1=""
	var error2= ""
	var error3=""
	var error4=""
    var enviar=false;
    var precioExp = /^[0-9]+.[0-9]+$/;
    var cantidadExp = /^[0-9]+$/;
    errorPosicionC00.innerHTML =""
    errorPosicionF00.innerHTML =""
    errorPrecio00.innerHTML=""
    errorPuestos00.innerHTML=""
	
	

	if(posicionColumna00.value.length < 1){
        e.preventDefault();
		 error1+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese la posicion columna de la mesa';
		enviar = true;
	
	}

	if(posicionColumna00.value =='0'){
        e.preventDefault();
		 error1+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese número de columna';
		enviar = true;
	}

	if(posicionFila00.value.length < 1){
        e.preventDefault();
		 error2+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese la posición fila de la mesa';
		enviar = true;
	
	}

	if(posicionFila00.value =='0'){
        e.preventDefault();
		 error2+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese número de fila';
		enviar = true;
	}

	if(!precioExp.test(precio00.value)){
        e.preventDefault();
		error4+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese el precio';
		 enviar = true;
	}

	if(!cantidadExp.test(numPuesto00.value)){
        e.preventDefault();
		 error3+='<i class="bi bi-exclamation-triangle-fill""></i> Ingrese la cantidad de asientos que tendra la mesa';
		enviar = true;
	
	}

	if(numPuesto00.value =='0'){
        e.preventDefault();
		 error3+='<i  class="bi bi-exclamation-triangle-fill""></i> La cantidad de puestos debe ser mayor a 0';
		enviar = true;
	}
	
	

	if (enviar) {
    errorPosicionC00.innerHTML =error1
    errorPosicionF00.innerHTML =error2
    errorPrecio00.innerHTML=error4
    errorPuestos00.innerHTML=error3
        
	}

	else{
		enviar = true;
          // modificarMesa();

          //e.preventDefault();

	}
});

/////__________--Validacion de 	Eliminar--___________//////
/*
$(document).ready(function(e){

     $("#anular").on("click", function(){
      
      anularMesa();

       e.preventDefault();

    });

  });

/////////_______________-- FUNCIONES SAJAX--___________________//////////


 
 function registrarMesa(){
	var datos=$("#registrarM").serialize();

	$.ajax({

		method:"POST",
		url:"",
		data:datos,
		success:function(e){

			$('#registrarM').trigger('reset');
			 $('#cerrar22').click();
			 Swal.fire({
			 	title:'<h3 style="color:#040855!important;"><b>Registrado</b></h3>',
			 	html:'<p style="color:#bbb!important;" >Mesa Registrada Exitosamente!</p> <br> <div class="modal-footer"> </div>',
			 	showConfirmButton:false,
			 	timer:2500,
			 	timerProgressBar:true,
			 	imageUrl:'assets/img/check.png',
			 	imageWidth:'180px',
			 	imageHeight:'140px',
			 	imageAlt:'registrado' 	

		    })	 
			 
		}

	});

	return false;
}

///////////////////////////////////////////////////////////////////////////////////////

function modificarMesa(){
	var datos=$("#modificarM").serialize();

	$.ajax({

		method:"POST",
		url:"",
		data:datos,
		success:function(e){

			$('#modificarM').trigger('reset');
			 $('#close').click();
			 Swal.fire({
			 	title:'<h3 style="color:#040855!important;"><b>Modificado</b></h3>',
			 	html:'<p style="color:#bbb!important;" >Mesa Modificada Exitosamente!</p> <br> <div class="modal-footer"> </div>',
			 	showConfirmButton:false,
			 	timer:2500,
			 	timerProgressBar:true,
			 	imageUrl:'assets/img/check.png',
			 	imageWidth:'180px',
			 	imageHeight:'140px',
			 	imageAlt:'modificado'
			 	

		    })
			 
	  }

	});

	return false;
}

///////////////////////////////////////////////////////////////////////////////////////

 function anularMesa(){
	var datos=$("#anularMesa").serialize();

	$.ajax({

		method:"POST",
		url:"",
		data:datos,
		success:function(e){
			 $('#closed').click();
			 Swal.fire({
			 	title:'<h3 style="color:#040855!important;"><b>Anulado</b></h3>',
			 	html:'<p style="color:#bbb!important;" >Mesa Anulada Exitosamente!</p> <br> <div class="modal-footer"> </div>',
			 	showConfirmButton:false,
			 	timer:2500,
			 	timerProgressBar:true,
			 	imageUrl:'assets/img/check.png',
			 	imageWidth:'180px',
			 	imageHeight:'140px',
			 	imageAlt:'Anulado' 	

		})

     }

	});

	return false;
}
 $(document).ready(function(e){
    $('.form-select').select2();

  });
  */