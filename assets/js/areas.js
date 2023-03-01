/////__________--Validacion de Registrar--___________//////


var area=document.getElementById("area");

var errorArea=document.getElementById("errorArea");


document.getElementById("envio").addEventListener("click", e => {
	var error1=""
    var enviar=false;
    errorArea.innerHTML=""

	if(area.value.length < 1){
        e.preventDefault();
		 error1+='<i  class="bi bi-exclamation-triangle-fill" ></i> Ingrese el area';
		enviar = true;
	
	}

	
	if(area.value.length > 15){
        e.preventDefault();
		 error1+='<i  class="bi bi-exclamation-triangle-fill"></i> Debe ser menor a 15 caracteres';
		enviar = true;
	
	}


	if (enviar) {
    errorArea.innerHTML=error1
        
	}

	else{
		enviar = true;
      
        //registrarArea();
        //e.preventDefault();
	}
});

/////__________--Validacion de Modificar--___________//////

var area00=document.getElementById("area00");

var errorArea00=document.getElementById("errorArea00");

document.getElementById("modificar").addEventListener("click", e => {
	var error1=""
    var enviar=false;
    errorArea00.innerHTML=""

	if(area00.value.length < 1){
        e.preventDefault();
		 error1+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese el area';
		enviar = true;
	
	}

	
	if(area00.value.length > 15){
        e.preventDefault();
		 error1+='<i  class="bi bi-exclamation-triangle-fill"></i> Debe ser menor a 15 caracteres';
		enviar = true;
	
	}

	if (enviar) {
    errorArea00.innerHTML=error1
        
	}

	else{
		enviar = true;
       // modificarArea();
      //  e.preventDefault();
	  
	}
});
/////__________--Validacion de 	Eliminar--___________//////

/*$(document).ready(function(e){

     $("#anular").on("click", function(){
      
      eliminarArea();

       e.preventDefault();

    });

  });


/////////_______________-- FUNCIONES SAJAX--___________________//////////




function registrarArea(){
	var datos=$("#RegistrarArea").serialize();

	$.ajax({

		method:"POST",
		url:"",
		data:datos,
		success:function(e){

			$('#RegistrarArea').trigger('reset');
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

////////////////////////////////////////////////////////////////////////////////////////
function modificarArea(){
	var datos=$("#modificarArea").serialize();

	$.ajax({

		method:"POST",
		url:"",
		data:datos,
		success:function(e){

			 $('#close').click();
			 Swal.fire({
			 	title:'<h3 style="color:#040855!important;"><b>Modificado</b></h3>',
			 	html:'<p style="color:#bbb!important;" >Area Modificada Exitosamente!</p> <br> <div class="modal-footer"> </div>',
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

 function eliminarArea(){
	var datos=$("#eliminarArea").serialize();

	$.ajax({

		method:"POST",
		url:"",
		data:datos,
		success:function(e){
			 $('#adios').click();
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
}*/