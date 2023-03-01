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
    
use contenido\modelo\mesasM as mesasM;
   
$objeto = new mesasM();

///////////////////-------Registrar--------////////////
   if (isset($_POST['nombArea'])) {

     $registrarArea= $objeto->getArea($_POST['nombArea']);
       
      }

///////////////////-------Modificar--------////////////
    if (isset($_POST['id']) && isset($_POST['nombre']) ){

    $modificarArea=$objeto->modificarArea($_POST['id'], $_POST['nombre']);

  }

///////////////////-------Eliminar--------////////////
   if (isset($_POST['cod'])) {

      $eliminarArea=$objeto->eliminarArea($_POST['cod']);

    }

///////////////////-------Consultar--------////////////
    
     $consultarAreas= $objeto->consultarArea();
       
   
     

///////////////////-------Papelera--------////////////

      $papeleraAreas= $objeto->papeleraArea();

///////////////////-------Restaurar--------////////////
  
  if (isset($_POST['nombre'])) {

     $restaurarArea= $objeto->restaurarArea( $_POST['nombre']);
      
  }

//////////////////////////////////////////////////////////////////

    if(file_exists("vista/areaV.php")) {
     require_once("vista/areaV.php");

    }
 ?>