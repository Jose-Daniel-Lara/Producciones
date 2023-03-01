/////__________--Validacion de Registrar--___________//////

var evento=document.getElementById("evento");
var select=document.getElementById("select");
var select01=document.getElementById("select01");
var entradas=document.getElementById("entradas");
var imagen=document.getElementById("imagen");
var hora=document.getElementById("hora");
var fecha=document.getElementById("fecha");

var errorEvento=document.getElementById("errorEvento")
var errorSelect=document.getElementById("errorSelect");
var errorSelect01=document.getElementById("errorSelect01");
var errorEntra=document.getElementById("errorEntra");
var errorImg=document.getElementById("errorImg");
var errorHora=document.getElementById("errorHora");
var errorFecha=document.getElementById("errorFecha");

document.getElementById("envio").addEventListener("click", e => {
	var error1=""
	var error2= ""
	var error3=""
	var error4=""
	var error5=""
	var error6=""
	var error7=""
    var enviar=false;
    var cantidadExp = /^[0-9]+$/;
    errorEvento.innerHTML =""
    errorSelect.innerHTML=""
    errorSelect01.innerHTML =""
    errorEntra.innerHTML =""
    errorImg.innerHTML=""
    errorHora.innerHTML=""
    errorFecha.innerHTML=""


	if(evento.value.length < 10){
        e.preventDefault();
	    error1+='<i  class="bi bi-exclamation-triangle-fill"></i> Debe contener un mínimo de 10 caracteres';
		enviar = true;
	
	}
	if(evento.value.length > 30){
        e.preventDefault();
		 error1+='<i  class="bi bi-exclamation-triangle-fill"></i> Debe contener un maximo de 30 caracteres';
		enviar = true;
	
	}

	if (select.value =='tipo') {
		e.preventDefault();
		 error2+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese el tipo de Evento';

	}

	if (select01.value =='lugar') {
		e.preventDefault();
		 error3+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese el lugar de Evento';

	}

	

	if(!cantidadExp.test(entradas.value)){
        e.preventDefault();
	    error4+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese la cantidad de asientos que tendra la mesa';
		enviar = true;
	
	}

	if(entradas.value =='0'){
        e.preventDefault();
		 error4+='<i  class="bi bi-exclamation-triangle-fill"></i> La cantidad de entradas del evento debe ser mayor a 0';
		enviar = true;
	}

	if (imagen.value.length < 1) {
		e.preventDefault();
		error5+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese una imagen';
		enviar = true;
	}
	
	if (hora.value.length < 1) {
		e.preventDefault();
		error6+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese la hora';
		enviar = true;
	}
	if (fecha.value.length < 1 ) {
		e.preventDefault();
		error7+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese la fecha';
		enviar = true;
	}


	if (enviar) {
    errorEvento.innerHTML =error1
    errorSelect.innerHTML=error2
    errorSelect01.innerHTML =error3
    errorEntra.innerHTML =error4
    errorImg.innerHTML=error5
    errorHora.innerHTML=error6
    errorFecha.innerHTML=error7
        
	}

	else{
		enviar = true;
		registrarEvento();
		e.preventDefault();
	}
});

/////__________--Validacion de Modificar--___________//////

var evento00=document.getElementById("evento00");
var select00=document.getElementById("select00");
var select2=document.getElementById("select2");
var entradas00=document.getElementById("entradas00");
var imagen00=document.getElementById("imagen00");
var hora00=document.getElementById("hora00");
var fecha00=document.getElementById("fecha00");

var errorEvento00=document.getElementById("errorEvento00")
var errorSelect00=document.getElementById("errorSelect00");
var errorSelect2=document.getElementById("errorSelect2");
var errorEntra00=document.getElementById("errorEntra00");
var errorImg00=document.getElementById("errorImg00");
var errorHora00=document.getElementById("errorHora00");
var errorFecha00=document.getElementById("errorFecha00");

document.getElementById("modificar").addEventListener("click", e => {
	var error1=""
	var error2= ""
	var error3=""
	var error4=""
	var error5=""
	var error6=""
	var error7=""
    var enviar=false;
    var cantidadExp = /^[0-9]+$/;
    errorEvento00.innerHTML =""
    errorSelect00.innerHTML=""
    errorSelect2.innerHTML=""
    errorEntra00.innerHTML =""
    errorImg00.innerHTML=""
    errorHora00.innerHTML=""
    errorFecha00.innerHTML=""


	if(evento00.value.length < 10){
        e.preventDefault();
	    error1+='<i  class="bi bi-exclamation-triangle-fill"></i> Debe contener un mínimo de 10 caracteres';
		enviar = true;
	
	}
	if(evento00.value.length > 30){
        e.preventDefault();
		 error1+='<i  class="bi bi-exclamation-triangle-fill"></i> Debe contener un maximo de 30 caracteres';
		enviar = true;
	
	}

	if (select00.value =='tipo') {
		e.preventDefault();
		 error2+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese el tipo de Evento';

	}

	if (select2.value =='lugar') {
		e.preventDefault();
		 error3+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese el lugar de Evento';

	}

	

	if(!cantidadExp.test(entradas00.value)){
        e.preventDefault();
	    error4+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese la cantidad de asientos que tendra la mesa';
		enviar = true;
	
	}

	if(entradas00.value =='0'){
        e.preventDefault();
		 error4+='<i  class="bi bi-exclamation-triangle-fill"></i> La cantidad de entradas del evento debe ser mayor a 0';
		enviar = true;
	}

	if (imagen00.value.length < 1) {
		e.preventDefault();
		error5+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese una imagen';
		enviar = true;
	}
	if (hora00.value.length < 1) {
		e.preventDefault();
		error6+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese la hora';
		enviar = true;
	}
	if (fecha00.value.length < 1 ) {
		e.preventDefault();
		error7+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese la fecha';
		enviar = true;
	}



	if (enviar) {
    errorEvento00.innerHTML =error1
    errorSelect00.innerHTML=error2
    errorSelect2.innerHTML =error3
    errorEntra00.innerHTML =error4
     errorImg00.innerHTML=error5
    errorHora00.innerHTML=error6
    errorFecha00.innerHTML=error7
        
	}

	else{
		enviar = true;
		//modificarE();
		//e.preventDefault();
	}
});

/*

/////__________--Validacion de 	Eliminar--___________//////

$(document).ready(function(e){

     $("#anular").on("click", function(){
      
      eliminarEvento();

       e.preventDefault();

    });
  });
/////////_______________-- FUNCIONES SAJAX--___________________//////////

function registrarEvento(){
	var datos=$("#registrarE").serialize();

	$.ajax({

		method:"POST",
		url:"",
		data:datos,
		success:function(e){

			$('#registrarE').trigger('reset');
			 $('#cerrar').click();
			 Swal.fire({
			 	title:'<h3 style="color:#040855!important;"><b>Registrado</b></h3>',
			 	html:'<p style="color:#bbb!important;" >Evento Registrado Exitosamente!</p> <br> <div class="modal-footer"> </div>',
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
  function modificarE(){
	var datos=$("#modificarE").serialize();

	$.ajax({

		method:"POST",
		url:"",
		data:datos,
		success:function(e){

			 $('#close').click();
			 Swal.fire({
			 	title:'<h3 style="color:#040855!important;"><b>Modificado</b></h3>',
			 	html:'<p style="color:#bbb!important;" >Evento Modificado Exitosamente!</p> <br> <div class="modal-footer"> </div>',
			 	showConfirmButton:false,
			 	timer:2500,
			 	timerProgressBar:true,
			 	imageUrl:'assets/img/check.png',
			 	imageWidth:'180px',
			 	imageHeight:'140px',
			 	imageAlt:'regist'


			 	

		})
	}

	});

	return false;
}

///////////////////////////////////////////////////////////////////////////////////////

function eliminarEvento(){
	var datos=$("#anularE").serialize();

	$.ajax({

		method:"POST",
		url:"",
		data:datos,
		success:function(e){
			 $('#closed').click();
			 Swal.fire({
			 	title:'<h3 style="color:#040855!important;"><b>Anulado</b></h3>',
			 	html:'<p style="color:#bbb!important;" >Evento Anulado Exitosamente!</p> <br> <div class="modal-footer"> </div>',
			 	showConfirmButton:false,
			 	timer:2500,
			 	timerProgressBar:true,
			 	imageUrl:'assets/img/check.png',
			 	imageWidth:'180px',
			 	imageHeight:'140px',
			 	imageAlt:'reistr'


			 	

		})

		}



	});

	return false;
}
*/