<?php 

session_start();
if (!isset($_SESSION['idusuario'])) {
    die("<script>location='?url=usuario'</script>");
  }
use contenido\componentes\carrusel as carrusel;
use contenido\modelo\perfilM as perfilM;
  
 $carrusel=new carrusel;

 $objeto = new perfilM();

    if (isset($_POST['idUser']) && isset($_POST['usuario']) && isset($_POST['tipoUsuario']) && isset($_POST['correo']) ) {

		$modificar = $objeto->modificarPerfil($_POST['idUser'], $_POST['usuario'], $_POST['tipoUsuario'], $_POST['correo']);
		
	}

	if (isset($_POST['id']) && isset($_POST['password']) && isset($_POST['newpassword']) && isset($_POST['renewpassword']) ) {

		$contraseña = $objeto->cambiarContraseña($_POST['id'], $_POST['password'], $_POST['newpassword'], $_POST['renewpassword']);
	}


	 if(file_exists("vista/perfilV.php")) {
	 require_once("vista/perfilV.php");
    }


 ?>
