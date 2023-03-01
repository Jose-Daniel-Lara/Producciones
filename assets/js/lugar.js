
/////__________--Validacion de Registrar--___________//////

var lugar=document.getElementById("lugar");
var direccion=document.getElementById("direccion");

var errorLugar=document.getElementById("errorLugar");
var errorDireccion=document.getElementById("errorDireccion");


document.getElementById("envio").addEventListener("click", e => {
	var error1=""
	var error2=""
    var enviar=false;
    errorLugar.innerHTML=""
    errorDireccion.innerHTML=""
	
	

	if(lugar.value.length < 1){
        e.preventDefault();
		 error1+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese el Lugar del Evento';
		enviar = true;
	
	}

	
	if(lugar.value.length > 25){
        e.preventDefault();
		 error1+='<i  class="bi bi-exclamation-triangle-fill"></i> Debe ser menor a 15 caracteres';
		enviar = true;
	
	}

	if(direccion.value.length < 1){
        e.preventDefault();
		 error2+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese la Dirección';
		enviar = true;
	
	}

	
	if(direccion.value.length > 60){
        e.preventDefault();
		 error2+='<i  class="bi bi-exclamation-triangle-fill"></i> Debe ser menor a 60 caracteres';
		enviar = true;
	
	}

	if (enviar) {
    errorLugar.innerHTML=error1
    errorDireccion.innerHTML=error2
	}

	else{
		enviar = true;
		//registrarLugar();
		//e.preventDefault();

	}
});

/////__________--Validacion de Modificar--___________//////

var lugar00=document.getElementById("lugar00");
var direccion00=document.getElementById("direccion00");

var errorLugar00=document.getElementById("errorLugar00");
var errorDireccion00=document.getElementById("errorDireccion00");


document.getElementById("modificar").addEventListener("click", e => {
	var error1=""
	var error2=""
    var enviar=false;
    errorLugar00.innerHTML=""
    errorDireccion00.innerHTML=""
	
	

	if(lugar00.value.length < 1){
        e.preventDefault();
		 error1+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese el Lugar del Evento';
		enviar = true;
	
	}

	
	if(lugar00.value.length > 15){
        e.preventDefault();
		 error1+='<i  class="bi bi-exclamation-triangle-fill"></i> Debe ser menor a 15 caracteres';
		enviar = true;
	
	}

	if(direccion00.value.length < 1){
        e.preventDefault();
		 error2+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese la Dirección';
		enviar = true;
	
	}

	
	if(direccion00.value.length > 60){
        e.preventDefault();
		 error2+='<i  class="bi bi-exclamation-triangle-fill"></i> Debe ser menor a 60 caracteres';
		enviar = true;
	
	}


	
	

	if (enviar) {
    errorLugar00.innerHTML=error1
    errorDireccion00.innerHTML=error2
	}

	else{
		enviar = true;
		//modificarLugar();
		//e.preventDefault();

	}
});


/////__________--Validacion de 	Eliminar--___________//////
/*
$(document).ready(function(e){

     $("#anular").on("click", function(){
      
      eliminarLugar();

       e.preventDefault();

    });
  });




/////////_______________-- FUNCIONES SAJAX--___________________//////////




function registrarLugar(){
	var datos=$("#registrarLugar").serialize();

	$.ajax({

		method:"POST",
		url:"",
		data:datos,
		success:function(e){

			$('#registrarLugar').trigger('reset');
			 $('#cerrar').click();
			 Swal.fire({
			 	title:'<h3 style="color:#040855!important;"><b>Registrado</b></h3>',
			 	html:'<p style="color:#bbb!important;" >Lugar Registrado Exitosamente!</p> <br> <div class="modal-footer"> </div>',
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

function modificarLugar(){
	var datos=$("#modificarLugar").serialize();

	$.ajax({

		method:"POST",
		url:"",
		data:datos,
		success:function(e){

			 $('#close').click();
			 Swal.fire({
			 	title:'<h3 style="color:#040855!important;"><b>Modificado</b></h3>',
			 	html:'<p style="color:#bbb!important;" >Lugar Modificado Exitosamente!</p> <br> <div class="modal-footer"> </div>',
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

function eliminarLugar(){
	var datos=$("#eliminarLugar").serialize();

	$.ajax({

		method:"POST",
		url:"",
		data:datos,
		success:function(e){
			 $('#closed').click();
			 Swal.fire({
			 	title:'<h3 style="color:#040855!important;"><b>Anulado</b></h3>',
			 	html:'<p style="color:#bbb!important;" >Lugar Anulado Exitosamente!</p> <br> <div class="modal-footer"> </div>',
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
*/