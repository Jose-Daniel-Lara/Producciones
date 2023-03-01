<?php 

session_start();
if (isset($_SESSION['idusuario'])) {
      if ($_SESSION['tipoUsuario']=='Encargado') {
        die("<script>location='?url=registros'</script>");
      }
  }else{
    die("<script>location='?url=usuario'</script>");
  }
   use contenido\componentes\carrusel as carrusel;
   $carrusel=new carrusel;
   
/////////////////////////////////////////////////

use contenido\modelo\usuarioM as usuarioM;
$objeto = new usuarioM();

///////////////////-------Registrar--------////////////

       if (isset($_POST['usuario']) && isset($_POST['tipoUsuario']) && isset($_POST['correo']) && isset($_POST['imagen']) && isset($_POST['clave']) && isset($_POST['repetirClave'])) {

    
       $mensaje = $objeto->getRegistrar($_POST['usuario'], $_POST['tipoUsuario'], $_POST['correo'] , $_POST['imagen'], $_POST['clave'], $_POST['repetirClave']);
       }

///////////////////-------Modificar--------////////////

      if (isset($_POST['cod']) && isset($_POST['user']) && isset($_POST['tUser']) && isset($_POST['email']) && isset($_POST['img']) && isset($_POST['cla']) && isset($_POST['rCla']) ){

      $modificarUsuario=$objeto->modificarUsuario($_POST['cod'], $_POST['user'], $_POST['tUser'], $_POST['email'], $_POST['img'], $_POST['cla'],$_POST['rCla'] );

     }
///////////////////-------Eliminar--------////////////

     if (isset($_POST['id'])) {

      $EliminarUsuario=$objeto->EliminarUsuario($_POST['id']);

    }

///////////////////-------Consultar--------///////////
      $consultarU=$objeto->consultarUsuarios();

///////////////////-------Papelera--------////////////

        $papelera= $objeto->papeleraUsuarios();

///////////////////-------Restaurar--------////////////

   if (isset($_POST['restaurarU'])) {

     $restaurar= $objeto->restaurarUsuario($_POST['restaurarU']);
       
  }

/////////////////////////////////////////////////
      

   if(file_exists("vista/gestionarUsuariosV.php")) {
     require_once("vista/gestionarUsuariosV.php");
    }
 ?>