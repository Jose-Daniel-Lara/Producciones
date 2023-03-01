
/////__________--Validacion de Registrar--___________//////
var select=document.getElementById("select");
var cedula=document.getElementById('cedula');
var nombre=document.getElementById("nombre");
var apellido=document.getElementById("apellido");


var errorSelect=document.getElementById("errorSelect");
var errorCedula=document.getElementById("errorCedula");
var errorNombre=document.getElementById("errorNombre");
var errorApellido=document.getElementById("errorApellido");



document.getElementById("envio").addEventListener("click", e => {
	var error1=""
	var error2= ""
	var error3=""
	var error4=""
    var enviar=false;
    errorSelect.innerHTML="";
    errorCedula.innerHTML ="";
    errorNombre.innerHTML ="";
    errorApellido.innerHTML="";


    if (select.value =='..') {
		e.preventDefault();
		 error1+='<i  class="bi bi-exclamation-triangle-fill"></i> Error!';

	}
   
   if (cedula.value.length < 7) {
        e.preventDefault();
		 error2+='<i  class="bi bi-exclamation-triangle-fill"></i> Cédula Inválida';
		enviar = true;

	}

	if(cedula.value =='0'){
        e.preventDefault();
		 error2+='<i  class="bi bi-exclamation-triangle-fill"></i> Cédula Inválida';
		enviar = true;
	}

	if(nombre.value.length < 3){
        e.preventDefault();
	    error3+='<i  class="bi bi-exclamation-triangle-fill"></i> Debe contener un mínimo de 3 caracteres';
		enviar = true;
	
	}
	if(nombre.value.length > 10){
        e.preventDefault();
		 error3+='<i  class="bi bi-exclamation-triangle-fill"></i> Debe contener un máximo de 10 caracteres';
		enviar = true;
	
	}

	if(apellido.value.length < 3){
        e.preventDefault();
	    error4+='<i  class="bi bi-exclamation-triangle-fill"></i> Debe contener un mínimo de 3 caracteres';
	    enviar=true;
	
	}
	if(apellido.value.length > 10){
        e.preventDefault();
		error4+='<i  class="bi bi-exclamation-triangle-fill"></i> Debe contener un máximo de 10 caracteres';
		enviar = true;
	
	}

	

	if (enviar) {
	errorSelect.innerHTML=error1
    errorCedula.innerHTML =error2
    errorNombre.innerHTML =error3
    errorApellido.innerHTML=error4
	}

	else{
		enviar = true;
	//registrarCliente();
        //e.preventDefault();
	}
});

/////__________--Validacion de Modificar--___________//////

var cedula00=document.getElementById('cedula00');
var nombre00=document.getElementById("nombre00");
var apellido00=document.getElementById("apellido00");

var errorCedula00=document.getElementById("errorCedula00");
var errorNombre00=document.getElementById("errorNombre00");
var errorApellido00=document.getElementById("errorApellido00");



document.getElementById("modificar").addEventListener("click", e => {
	var error2= ""
	var error3=""
	var error4=""
    var enviar=false;
    errorCedula00.innerHTML ="";
    errorNombre00.innerHTML ="";
    errorApellido00.innerHTML="";

   if (cedula00.value.length < 9) {
        e.preventDefault();
		 error2+='<i  class="bi bi-exclamation-triangle-fill"></i> Cédula Inválida';
		enviar = true;

	}

	if(cedula00.value =='0'){
        e.preventDefault();
		 error2+='<i  class="bi bi-exclamation-triangle-fill"></i> Cédula Inválida';
		enviar = true;
	}

	if(nombre00.value.length < 3){
        e.preventDefault();
	    error3+='<i  class="bi bi-exclamation-triangle-fill"></i> Debe contener un mínimo de 3 caracteres';
		enviar = true;
	
	}
	if(nombre00.value.length > 10){
        e.preventDefault();
		 error3+='<i  class="bi bi-exclamation-triangle-fill"></i> Debe contener un máximo de 10 caracteres';
		enviar = true;
	
	}

	if(apellido00.value.length < 3){
        e.preventDefault();
	    error4+='<i  class="bi bi-exclamation-triangle-fill"></i> Debe contener un mínimo de 3 caracteres';
	    enviar=true;
	
	}
	if(apellido00.value.length > 10){
        e.preventDefault();
		error4+='<i  class="bi bi-exclamation-triangle-fill"></i> Debe contener un máximo de 10 caracteres';
		enviar = true;
	
	}
	
	if (enviar) {
    errorCedula00.innerHTML =error2
    errorNombre00.innerHTML =error3
    errorApellido00.innerHTML=error4
	}

	else{
		enviar = true;
		//modificarCliente();
		// e.preventDefault();
	}
});

function validarC(){
var correo=document.getElementById('correo');
var errorCorreo=document.getElementById('errorCorreo');
var error5=""
var correoExp = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z]+$/;

if (!correoExp.test(correo.value)) {
	error5=' <i  class="bi bi-exclamation-triangle-fill"></i> Correo inválido';
}
else{
	error5="";
}

errorCorreo.innerHTML=error5
}

function validarT(){
var telefono=document.getElementById("telefono");
var errorTelefono=document.getElementById("errorTelefono");
var error6=""

if (telefono.value.length < 1) {
	error6='<i  class="bi bi-exclamation-triangle-fill"></i>Ingrese el número de teléfono';
}
else{
	error6="";
}
errorTelefono.innerHTML=error6

}


//////////////////////////////////////////////////////////////////////////

$('#config3').on('click', function () {
  var activarT = $('#config3').prop('checked');
  if (activarT == true) {
    $(".tel1").css('display', 'block');
    $('#modificar').on('click' ,function(e){
     validarT();
});
  } else {
    $(".tel1").css('display', 'none');
  }
})

$('#config4').on('click', function () {
  var activarC = $('#config4').prop('checked');
  if (activarC == true) {
    $(".email1").css('display', 'block');
    $('#modificar').on('click' ,function(e){
     validarC();
});

  } else {
    $(".email1").css('display', 'none');
  }
})

///////////////////////////////////////////////////////

$('#config1').on('click', function () {
  var activarT = $('#config1').prop('checked');
  if (activarT == true) {
    $(".tel").css('display', 'block');
    $('#envio').on('click' ,function(e){
     validarT();
});
  } else {
    $(".tel").css('display', 'none');
  }
})

$('#config2').on('click', function () {
  var activarC = $('#config2').prop('checked');
  if (activarC == true) {
    $(".email").css('display', 'block');
    $('#envio').on('click' ,function(e){
     validarC();
});

  } else {
    $(".email").css('display', 'none');
  }
})


/////__________--Validacion de 	Eliminar--___________//////
/*
$(document).ready(function(e){

     $("#anular").on("click", function(){
      
      eliminarCliente();

       e.preventDefault();

    });
  });


/////////_______________-- FUNCIONES SAJAX--___________________//////////



function registrarCliente(){
	var datos=$("#registrarCliente").serialize();

	$.ajax({

		method:"POST",
		url:"",
		data:datos,
		success:function(e){

			$('#registrarCliente').trigger('reset');
			 $('#cerrar').click();
			 Swal.fire({
			 	title:'<h3 style="color:#040855!important;"><b>Registrado</b></h3>',
			 	html:'<p style="color:#bbb!important;" >Cliente Registrado Exitosamente!</p> <br> <div class="modal-footer"> </div>',
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

function modificarCliente(){
	var datos=$("#modificarCliente").serialize();

	$.ajax({

		method:"POST",
		url:"",
		data:datos,
		success:function(e){
			$('#modificarCliente').trigger('reset');

			 $('#close').click();
			 Swal.fire({
			 	title:'<h3 style="color:#040855!important;"><b>Modificado</b></h3>',
			 	html:'<p style="color:#bbb!important;" >Cliente Modificado Exitosamente!</p> <br> <div class="modal-footer"> </div>',
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

function eliminarCliente(){
	var datos=$("#eliminarCliente").serialize();

	$.ajax({

		method:"POST",
		url:"",
		data:datos,
		success:function(e){
			 $('#closed').click();
			 Swal.fire({
			 	title:'<h3 style="color:#040855!important;"><b>Anulado</b></h3>',
			 	html:'<p style="color:#bbb!important;" >Cliente Anulado Exitosamente!</p> <br> <div class="modal-footer"> </div>',
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