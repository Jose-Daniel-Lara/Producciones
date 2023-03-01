/////__________--Validacion de Editar Perfil--___________//////
var imagen=document.getElementById("imagen");
var usuario=document.getElementById("usuario");
var correo=document.getElementById("correo");

var errorImg=document.getElementById("errorImg");
var errorUsuario=document.getElementById("errorUsuario");
var errorCorreo=document.getElementById("errorCorreo");

document.getElementById("envio").addEventListener("click", e => {
	var error1=""
	var error3=""
	var error4=""
	var usuarioExp=/^[a-zA-Z0-9ü_]{5,9}$/;
    var correoExp = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z]+$/;
    var enviar=false;
    errorImg.innerHTML ="";
    errorUsuario.innerHTML ="";
    errorCorreo.innerHTML ="";
   
	if (!usuarioExp.test(usuario.value)) {
        e.preventDefault();
		 error1+=' <i  class="bi bi-exclamation-triangle-fill"></i> El usuario debe tener de 5-9 carácteres alfanuméricos';
		enviar = true;

	}

    if (!correoExp.test(correo.value)) {
        e.preventDefault();
		 error3+=' <i  class="bi bi-exclamation-triangle-fill"></i> Correo inválido';
		enviar = true;

	}

	if (imagen.value.length < 1) {

		 e.preventDefault();
		 error4+=' <i  class="bi bi-exclamation-triangle-fill"></i> Ingrese una imagen';
		enviar = true;
	}
	  
	if (enviar) {
        errorUsuario.innerHTML = error1
        errorCorreo.innerHTML = error3
        errorImg.innerHTML=error4
     
	}

	else{
		enviar = true;
		//editarPerfil();
        //e.preventDefault();
	}
});

/////__________--Validacion cambio de contraseña--___________//////
var claveV=document.getElementById("claveV");
var clave=document.getElementById("clave");
var clave2=document.getElementById("clave2");


var errorClaveV=document.getElementById("errorClaveV");
var errorClave=document.getElementById("errorClave");
var errorClave2=document.getElementById("errorClave2");
var errorContraseñas=document.getElementById("errorContraseñas");

document.getElementById("enviar").addEventListener("click", e => {
	var error1=""
	var error2=""
	var error3=""
	var error4=""
    var enviar=false;
    var claveExp=/^[a-zA-Z0-9_.+-?!#'^*$~@]{8,12}$/;
    errorClaveV.innerHTML ="";
    errorClave.innerHTML ="";
    errorClave2.innerHTML ="";
    errorContraseñas.innerHTML="";

    if (!claveExp.test(claveV.value)) {
        e.preventDefault();
		 error1+=' <i  class="bi bi-exclamation-triangle-fill"></i> Ingrese la Contraseña actual';
		enviar = true;

	}


   if (!claveExp.test(clave.value)) {
        e.preventDefault();
		 error2+=' <i  class="bi bi-exclamation-triangle-fill"></i> La contraseña debe tener de 8-12 caracteres';
		enviar = true;

	}

	if (!claveExp.test(clave2.value)) {
        e.preventDefault();
		 error3+=' <i  class="bi bi-exclamation-triangle-fill"></i> La contraseña debe tener de 8-12 caracteres';
		enviar = true;

	}

	if(clave.value != clave2.value){
        e.preventDefault();
		 error4+='<i  class="bi bi-exclamation-triangle-fill"></i> Las contraseñas no son iguales';
		enviar = true;
	}

   
	if (enviar) {
        errorClaveV.innerHTML = error1
        errorClave.innerHTML = error2
        errorClave2.innerHTML=error3
         errorContraseñas.innerHTML=error4
     
	}

	else{
		enviar = true;
	}
});


/////////_______________-- FUNCIONES SAJAX--___________________//////////


/*function editarPerfil(){
	var datos=$("#editarPerfil").serialize();

	$.ajax({

		method:"POST",
		url:"",
		data:datos,
		success:function(e){
			
			$('#editarPerfil').trigger('reset');
			 Swal.fire({
			 	title:'<h3 style="color:#040855!important;"><b>Editado</b></h3>',
			 	html:'<p style="color:#bbb!important;" >Perfil Editado Exitosamente!</p> <br> <div class="modal-footer"> </div>',
			 	showConfirmButton:false,
			 	timer:2500,
			 	timerProgressBar:true,
			 	imageUrl:'assets/img/check.png',
			 	imageWidth:'180px',
			 	imageHeight:'140px',
			 	imageAlt:'editado'
		})

			 
			}



	});

	return false;
}*/


