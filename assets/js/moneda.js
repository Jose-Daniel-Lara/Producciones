/////__________--Validacion de Registrar--___________//////

var moneda=document.getElementById("moneda");
var bs=document.getElementById("bs");

var errorLugar=document.getElementById("errorMoneda");
var errorDireccion=document.getElementById("errorBs");


document.getElementById("envio").addEventListener("click", e => {
	var error1=""
	var error2=""
    var enviar=false;
    var valorExp= /^[0-9]+.[0-9]+$/;
    errorMoneda.innerHTML=""
    errorBs.innerHTML=""
	
	if(moneda.value.length < 1){
        e.preventDefault();
		 error1+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese el tipo de moneda';
		enviar = true;
	
	}
	
	if(moneda.value.length > 10){
        e.preventDefault();
		 error1+='<i  class="bi bi-exclamation-triangle-fill"></i> Debe ser menor a 10 caracteres';
		enviar = true;
	
	}

	if(!valorExp.test(bs.value)){
        e.preventDefault();
		error2+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese el valor al cambio';
		 enviar = true;
	}

	if (enviar) {
    errorMoneda.innerHTML=error1
    errorBs.innerHTML=error2
	}

	else{
		enviar = true;
		//registrarMoneda();
        //e.preventDefault();
	}
});
/////__________--Validacion de Modificar--___________//////

var moneda00=document.getElementById("moneda00");
var bs00=document.getElementById("bs00");

var errorMoneda00=document.getElementById("errorMoneda00");
var errorBs00=document.getElementById("errorBs00");


document.getElementById("modificar").addEventListener("click", e => {
	var error1=""
	var error2=""
    var enviar=false;
    var valorExp= /^[0-9]+.[0-9]+$/;
    errorMoneda00.innerHTML=""
    errorBs00.innerHTML=""
	
	if(moneda00.value.length < 1){
        e.preventDefault();
		 error1+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese el tipo de moneda';
		enviar = true;
	
	}
	
	if(moneda00.value.length > 10){
        e.preventDefault();
		 error1+='<i  class="bi bi-exclamation-triangle-fill"></i> Debe ser menor a 10 caracteres';
		enviar = true;
	
	}

	if(!valorExp.test(bs00.value)){
        e.preventDefault();
		error2+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese el valor al cambio';
		 enviar = true;
	}

	if (enviar) {
    errorMoneda00.innerHTML=error1
    errorBs00.innerHTML=error2
	}

	else{
		enviar = true;
		// modificarMoneda();
		 //e.preventDefault();
		
	}
});
/////__________--Validacion de 	Eliminar--___________//////

/*$(document).ready(function(e){

     $("#anular").on("click", function(){
      
      eliminarMoneda();

       e.preventDefault();

    });

  });


/////////_______________-- FUNCIONES SAJAX--___________________//////////

function registrarMoneda(){
	var datos=$("#registrarMoneda").serialize();

	$.ajax({

		method:"POST",
		url:"",
		data:datos,
		success:function(e){

			$('#registrarMoneda').trigger('reset');
			 $('#cerrar').click();
			 Swal.fire({
			 	title:'<h3 style="color:#040855!important;"><b>Registrado</b></h3>',
			 	html:'<p style="color:#bbb!important;" >Moneda Registrada Exitosamente!</p> <br> <div class="modal-footer"> </div>',
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

function eliminarMoneda(){
	var datos=$("#eliminarMoneda").serialize();

	$.ajax({

		method:"POST",
		url:"",
		data:datos,
		success:function(e){
			 $('#closed').click();
			 Swal.fire({
			 	title:'<h3 style="color:#040855!important;"><b>Anulado</b></h3>',
			 	html:'<p style="color:#bbb!important;" >Area Anulada Exitosamente!</p> <br> <div class="modal-footer"> </div>',
			 	showConfirmButton:false,
			 	timer:2500,
			 	timerProgressBar:true,
			 	imageUrl:'assets/img/check.png',
			 	imageWidth:'180px',
			 	imageHeight:'140px',
			 	imageAlt:'registr'


			 	

		})

		}



	});

	return false;
}

///////////////////////////////////////////////////////////////////////////////////////

function modificarMoneda(){
	var datos=$("#modificarMoneda").serialize();

	$.ajax({

		method:"POST",
		url:"",
		data:datos,
		success:function(e){

			 $('#close').click();
			 Swal.fire({
			 	title:'<h3 style="color:#040855!important;"><b>Modificado</b></h3>',
			 	html:'<p style="color:#bbb!important;" >Moneda Modificada Exitosamente!</p> <br> <div class="modal-footer"> </div>',
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
*/