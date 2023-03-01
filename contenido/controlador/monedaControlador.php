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
use contenido\modelo\ventasM as ventasM;

    $carrusel=new carrusel;

$objet = new ventasM();

///////////////////-------Registrar--------////////////
      if (isset($_POST['moneda']) && isset($_POST['cambio'])) {

      $registrarMoneda= $objet->getMoneda($_POST['moneda'], $_POST['cambio']);

      }
///////////////////-------Modificar--------////////////

      if (isset($_POST['codi']) && isset($_POST['mon']) && isset($_POST['camb'])) {

      $modificarMoneda=$objet->modificarMoneda($_POST['codi'], $_POST['mon'], $_POST['camb'] );

      }

///////////////////-------Eliminar--------////////////

    if (isset($_POST['id'])) {

      $eliminarMoneda=$objet->eliminarMoneda($_POST['id']);

    }

///////////////////-------Consultar--------////////////

     $consultarMoneda=$objet->consultarMoneda();

///////////////////-------Papelera--------////////////

      $papeleraMoneda= $objet->papeleraMoneda();

///////////////////-------Restaurar--------////////////
     
    if (isset($_POST['restaurarMO'])) {

     $restaurarMoneda= $objet->restaurarMoneda($_POST['restaurarMO']);
       
     }

///////////////////////////////////////////////////////

      if(file_exists("vista/monedaV.php")) {
      require_once("vista/monedaV.php");
      }

      
 

 ?>