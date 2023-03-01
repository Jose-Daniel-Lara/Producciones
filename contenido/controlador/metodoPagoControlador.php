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

  use contenido\modelo\ventasM as ventasM;

       $objet = new ventasM();
      
       

///////////////////-------Registrar--------////////////

     if (isset($_POST['metodo'])) {

       $metodo = $objet->getMetodo($_POST['metodo']);

     }
///////////////////-------Modificar--------////////////

     if (isset($_POST['cod']) && isset($_POST['met'])) {

      $modificarMetodo=$objet->modificarMetodo($_POST['cod'], $_POST['met'] );

    }

///////////////////-------Eliminar--------////////////

     if (isset($_POST['id'])) {

      $eliminarMetodo=$objet->eliminarMetodo($_POST['id']);

    }
///////////////////-------Consultar--------////////////

     $consultarMetodo= $objet->consultarMetodo();
  
///////////////////-------Papelera--------////////////

     $papeleraMetodo= $objet->papeleraMetodo();

///////////////////-------Restaurar--------////////////

     if (isset($_POST['restaurarME'])) {

     $restaurarMetodo= $objet->restaurarMetodo($_POST['restaurarME']);
       
    }

//////////////////////////////////////////////////////////

    if(file_exists("vista/metodoPagoV.php")) {
     require_once("vista/metodoPagoV.php");
      }
      
 ?>