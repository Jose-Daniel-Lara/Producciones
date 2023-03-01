
/////__________--Validacion de Registrar--___________//////

var tipo=document.getElementById("tipo");

var errorTipo=document.getElementById("errorTipo");


document.getElementById("envio").addEventListener("click", e => {
	var error1=""
    var enviar=false;
    errorTipo.innerHTML=""
    
	
	if(tipo.value.length < 1){
        e.preventDefault();
		 error1+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese el tipo de Evento';
		enviar = true;
	
	}

	
	if(tipo.value.length > 15){
        e.preventDefault();
		 error1+='<i  class="bi bi-exclamation-triangle-fill"></i> Debe ser menor a 15 caracteres';
		enviar = true;
	
	}

	
	

	if (enviar) {
    errorTipo.innerHTML=error1;
        
	}

	else{
		enviar = true;
		//registrarTipo();
		//e.preventDefault();
	}
});
/////__________--Validacion de Modificar--___________//////

var tipo00=document.getElementById("tipo00");

var errorTipo00=document.getElementById("errorTipo00");


document.getElementById("modificar").addEventListener("click", e => {
	var error1=""
    var enviar=false;
    errorTipo00.innerHTML=""
    
	
	if(tipo00.value.length < 1){
        e.preventDefault();
		 error1+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese el tipo de Evento';
		enviar = true;
	
	}

	
	if(tipo00.value.length > 15){
        e.preventDefault();
		 error1+='<i  class="bi bi-exclamation-triangle-fill"></i> Debe ser menor a 15 caracteres';
		enviar = true;
	
	}

	
	

	if (enviar) {
    errorTipo00.innerHTML=error1;
        
	}

	else{
		enviar = true;
		//modificarTipo();
		//e.preventDefault();
	}
});

/*
/////__________--Validacion de 	Eliminar--___________//////

$(document).ready(function(e){

     $("#anular").on("click", function(){
      
       eliminarTipoE();
       e.preventDefault();

    });
  });

/////////_______________-- FUNCIONES SAJAX--___________________//////////




function registrarTipo(){
	var datos=$("#registrarTipo").serialize();

	$.ajax({

		method:"POST",
		url:"",
		data:datos,
		success:function(e){

			$('#registrarTipo').trigger('reset');
			 $('#cerrar').click();
			 Swal.fire({
			 	title:'<h3 style="color:#040855!important;"><b>Registrado</b></h3>',
			 	html:'<p style="color:#bbb!important;" >Tipo de evento Registrado Exitosamente!</p> <br> <div class="modal-footer"> </div>',
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


function modificarTipo(){
	var datos=$("#modificarTipo").serialize();

	$.ajax({

		method:"POST",
		url:"",
		data:datos,
		success:function(e){

			 $('#close').click();
			 Swal.fire({
			 	title:'<h3 style="color:#040855!important;"><b>Modificado</b></h3>',
			 	html:'<p style="color:#bbb!important;" >Tipo de Evento Modificado Exitosamente!</p> <br> <div class="modal-footer"> </div>',
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

function eliminarTipoE(){
	var datos=$("#anularTipo").serialize();

	$.ajax({

		method:"POST",
		url:"",
		data:datos,
		success:function(e){
			 $('#closed').click();
			 Swal.fire({
			 	title:'<h3 style="color:#040855!important;"><b>Anulado</b></h3>',
			 	html:'<p style="color:#bbb!important;" >Tipo de Evento Anulado Exitosamente!</p> <br> <div class="modal-footer"> </div>',
			 	showConfirmButton:false,
			 	timer:2500,
			 	timerProgressBar:true,
			 	imageUrl:'assets/img/check.png',
			 	imageWidth:'180px',
			 	imageHeight:'140px',
			 	imageAlt:'regstr'


			 	

		})

		}

	});

	return false;
}
///////////////////////////////////////////////////////////////////////////////////////
*/