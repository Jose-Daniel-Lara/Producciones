/////__________--Validacion de Registrar--___________//////

var metodo=document.getElementById("metodo");
var errorMetodo=document.getElementById("errorMetodo");


document.getElementById("envio").addEventListener("click", e => {
	var error1=""
    var enviar=false;
    errorMetodo.innerHTML=""
    
	
	

	if(metodo.value.length < 1){
        e.preventDefault();
		 error1+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese el método de pago';
		enviar = true;
	
	}

	
	if(metodo.value.length > 15){
        e.preventDefault();
		 error1+='<i  class="bi bi-exclamation-triangle-fill"></i> Debe ser menor a 15 carácteres';
		enviar = true;
	
	}

	if (enviar) {
    errorMetodo.innerHTML=error1
        
	}

	else{
		enviar = true;
        //registrarMetodo();
        //e.preventDefault();
	}
});

/////__________--Validacion de Modificar--___________//////

var metodo00=document.getElementById("metodo00");
var errorMetodo00=document.getElementById("errorMetodo00");


document.getElementById("modificar").addEventListener("click", e => {
	var error1=""
    var enviar=false;
    errorMetodo00.innerHTML=""
    
	
	

	if(metodo00.value.length < 1){
        e.preventDefault();
		 error1+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese el método de pago';
		enviar = true;
	
	}

	
	if(metodo00.value.length > 15){
        e.preventDefault();
		 error1+='<i  class="bi bi-exclamation-triangle-fill"></i> Debe ser menor a 15 carácteres';
		enviar = true;
	
	}

	if (enviar) {
    errorMetodo00.innerHTML=error1
        
	}

	else{
		enviar = true;
       // modificarMetodo();
        //e.preventDefault();
	}
});

/////__________--Validacion de 	Eliminar--___________//////

/*$(document).ready(function(e){

     $("#anular").on("click", function(){
      
      eliminarMetodo();

       e.preventDefault();

    });

  });



/////////_______________-- FUNCIONES SAJAX--___________________//////////




function registrarMetodo(){
	var datos=$("#registrarMetodo").serialize();

	$.ajax({

		method:"POST",
		url:"",
		data:datos,
		success:function(e){

			$('#registrarMetodo').trigger('reset');
			 $('#cerrar').click();
			 Swal.fire({
			 	title:'<h3 style="color:#040855!important;"><b>Registrado</b></h3>',
			 	html:'<p style="color:#bbb!important;" >Area Registrada Exitosamente!</p> <br> <div class="modal-footer"> </div>',
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

function modificarMetodo(){
	var datos=$("#modificarMetodo").serialize();

	$.ajax({

		method:"POST",
		url:"",
		data:datos,
		success:function(e){

			 $('#close').click();
			 Swal.fire({
			 	title:'<h3 style="color:#040855!important;"><b>Modificado</b></h3>',
			 	html:'<p style="color:#bbb!important;" >Método de Pago Modificado Exitosamente!</p> <br> <div class="modal-footer"> </div>',
			 	showConfirmButton:false,
			 	timer:2500,
			 	timerProgressBar:true,
			 	imageUrl:'assets/img/check.png',
			 	imageWidth:'180px',
			 	imageHeight:'140px',
			 	imageAlt:'modificar'


			 	

		})
	}

	});

	return false;
}

///////////////////////////////////////////////////////////////////////////////////////

function eliminarMetodo(){
	var datos=$("#eliminarMetodo").serialize();

	$.ajax({

		method:"POST",
		url:"",
		data:datos,
		success:function(e){
			 $('#closed').click();
			 Swal.fire({
			 	title:'<h3 style="color:#040855!important;"><b>Anulado</b></h3>',
			 	html:'<p style="color:#bbb!important;" >Metodo de Pago Anulado Exitosamente!</p> <br> <div class="modal-footer"> </div>',
			 	showConfirmButton:false,
			 	timer:2500,
			 	timerProgressBar:true,
			 	imageUrl:'assets/img/check.png',
			 	imageWidth:'180px',
			 	imageHeight:'140px',
			 	imageAlt:'ANULAR'


			 	

		})

		}



	});

	return false;
}
*/
///////////////////////////////////////////////////////////////////////////////////////


