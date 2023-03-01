
/////__________--Validacion de Registrar--___________//////

var usuario=document.getElementById("usuario");
var select=document.getElementById("select");
var correo=document.getElementById("correo");
var clave=document.getElementById("clave");
var clave2=document.getElementById("clave2");
var imagen=document.getElementById("imagen");

var errorUsuario=document.getElementById("errorUsuario");
var errorSelect=document.getElementById("errorSelect");
var errorCorreo=document.getElementById("errorCorreo");
var errorClave=document.getElementById("errorClave");
var errorClave2=document.getElementById("errorClave2");
var errorContraseñas=document.getElementById("errorContraseñas");
var errorImg=document.getElementById("errorImg");

document.getElementById("envio").addEventListener("click", e => {
	var error1=""
	var error2= ""
	var error3=""
	var error4=""
	var error5=""
	var error6=""
	var error7=""
	var usuarioExp=/^[a-zA-Z0-9ü_]{5,9}$/;
	var claveExp=/^[a-zA-Z0-9_.+-?!#'^*$~@]{8,12}$/;
    var correoExp = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z]+$/;
    var enviar=false;
   
    errorUsuario.innerHTML ="";
    errorSelect.innerHTML="";
    errorCorreo.innerHTML ="";
    errorClave.innerHTML ="";
    errorClave2.innerHTML ="";
    errorContraseñas.innerHTML="";
    errorImg.innerHTML="";

    
	  if (!usuarioExp.test(usuario.value)) {
        e.preventDefault();
		 error1+=' <i  class="bi bi-exclamation-triangle-fill"></i> El usuario debe tener de 5-9 carácteres alfanuméricos';
		enviar = true;

	}


	if (select.value =='tipo') {
		e.preventDefault();
		 error2+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese un tipo de usuario';

	}

    if (!correoExp.test(correo.value)) {
        e.preventDefault();
		 error3+=' <i  class="bi bi-exclamation-triangle-fill"></i> Correo inválido';
		enviar = true;

	}
	  if (!claveExp.test(clave.value)) {
        e.preventDefault();
		 error4+=' <i  class="bi bi-exclamation-triangle-fill"></i> La contraseña debe tener de 8-12 caracteres';
		enviar = true;

	}

	if (!claveExp.test(clave2.value)) {
        e.preventDefault();
		 error5+=' <i  class="bi bi-exclamation-triangle-fill"></i> La contraseña debe tener de 8-12 caracteres';
		enviar = true;

	}

	if(clave.value != clave2.value){
        e.preventDefault();
		 error6+='<i  class="bi bi-exclamation-triangle-fill"></i> Las contraseñas no son iguales';
		 enviar = true;
	}

	if (imagen.value.length < 1) {
		e.preventDefault();
		error7+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese una imagen';
		enviar = true;
	}
	

	if (enviar) {
        errorUsuario.innerHTML = error1
        errorSelect.innerHTML=error2
        errorCorreo.innerHTML = error3
        errorClave.innerHTML = error4
        errorClave2.innerHTML = error5
        errorContraseñas.innerHTML=error6
        errorImg.innerHTML=error7
        
	}

	else{
		enviar = true;
		 //registrarUsuario();
       // e.preventDefault();
	}
});


/////__________--Validacion de Modificar--___________//////

var usuario00=document.getElementById("usuario00");
var select00=document.getElementById("select00");
var correo00=document.getElementById("correo00");
var claveM=document.getElementById("claveM");
var claveM2=document.getElementById("claveM2");
var imagen0=document.getElementById("image");


var errorUsuario00=document.getElementById("errorUsuario00");
var errorSelect00=document.getElementById("errorSelect00");
var errorCorreo00=document.getElementById("errorCorreo00");
var errorClaveM=document.getElementById("errorClaveM");
var errorClaveM2=document.getElementById("errorClaveM2");
var errorContraseñas00=document.getElementById("errorContraseñas00");
var errorImg0=document.getElementById("errorImg0");

document.getElementById("modificar").addEventListener("click", e => {
	var error1=""
	var error2= ""
	var error3=""
	var error4=""
	var error5=""
	var error6=""
	var error7=""
	var usuarioExp=/^[a-zA-Z0-9ü_]{5,9}$/;
	var claveExp=/^[a-zA-Z0-9_.+-?!#'^*$~@]+$/;
    var correoExp = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z]+$/;
    var enviar=false;
    errorUsuario00.innerHTML ="";
    errorSelect00.innerHTML="";
    errorCorreo00.innerHTML ="";
    errorClaveM.innerHTML ="";
    errorClaveM2.innerHTML ="";
    errorContraseñas00.innerHTML="";
    errorImg0.innerHTML="";

     if (!usuarioExp.test(usuario00.value)) {
        e.preventDefault();
		 error1+=' <i  class="bi bi-exclamation-triangle-fill"></i>El usuario debe tener de 5-9 carácteres alfanuméricos';
		enviar = true;

	}

	if (select00.value =='tipo') {
		e.preventDefault();
		 error2+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese un tipo de usuario';

	}

    if (!correoExp.test(correo00.value)) {
        e.preventDefault();
		 error3+=' <i  class="bi bi-exclamation-triangle-fill"></i> Correo inválido';
		enviar = true;

	}

    if (!claveExp.test(claveM.value)) {
        e.preventDefault();
		 error4+=' <i  class="bi bi-exclamation-triangle-fill"></i> La contraseña debe tener de 8-12 caracteres';
		enviar = true;

	}

	if (!claveExp.test(claveM2.value)) {
        e.preventDefault();
		 error5+=' <i  class="bi bi-exclamation-triangle-fill"></i> La contraseña debe tener de 8-12 caracteres';
		enviar = true;

	}

	if(claveM.value != claveM2.value){
        e.preventDefault();
		 error6+='<i  class="bi bi-exclamation-triangle-fill"></i> Las contraseñas no son iguales';
		 enviar = true;
	}

	if (imagen0.value.length < 1) {
		e.preventDefault();
		error7+='<i  class="bi bi-exclamation-triangle-fill"></i> Ingrese una imagen';
		enviar = true;
	}


	if (enviar) {
        errorUsuario00.innerHTML = error1
        errorSelect00.innerHTML=error2
        errorCorreo00.innerHTML = error3
        errorClaveM.innerHTML = error4
        errorClaveM2.innerHTML = error5
        errorContraseñas00.innerHTML=error6
        errorImg0.innerHTML=error7
        
	}

	else{
		enviar = true;
		 //modificarUsuario();
        //e.preventDefault();
	}
});

/////__________--Validacion de 	Eliminar--___________//////
/*
$(document).ready(function(e){

     $("#anular").on("click", function(){
      
      eliminarUsuario();

       e.preventDefault();

    });
  });


/////////_______________-- FUNCIONES SAJAX--___________________//////////


function registrarUsuario(){
	var datos=$("#registrarUsuario").serialize();

	$.ajax({

		method:"POST",
		url:"",
		data:datos,
		success:function(e){
			
			$('#registrarUsuario').trigger('reset');
			 $('#cerrar').click();
			 Swal.fire({
			 	title:'<h3 style="color:#040855!important;"><b>Registrado</b></h3>',
			 	html:'<p style="color:#bbb!important;" >Usuario Registrado Exitosamente!</p> <br> <div class="modal-footer"> </div>',
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

function modificarUsuario(){
	var datos=$("#modificarUsuario").serialize();

	$.ajax({

		method:"POST",
		url:"",
		data:datos,
		success:function(e){

			 $('#close').click();
			 Swal.fire({
			 	title:'<h3 style="color:#040855!important;"><b>Modificado</b></h3>',
			 	html:'<p style="color:#bbb!important;" >Usuario Modificado Exitosamente!</p> <br> <div class="modal-footer"> </div>',
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
function eliminarUsuario(){
	var datos=$("#eliminarUsuario").serialize();

	$.ajax({

		method:"POST",
		url:"",
		data:datos,
		success:function(e){
			 $('#closed').click();
			 Swal.fire({
			 	title:'<h3 style="color:#040855!important;"><b>Anulado</b></h3>',
			 	html:'<p style="color:#bbb!important;" >Usuario Anulado Exitosamente!</p> <br> <div class="modal-footer"> </div>',
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

///////////////////////////////////////////////////////////////////////////////////////*/