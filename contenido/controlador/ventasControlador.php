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
  
/////////////////---Evento---///////////////////////////
    
    use contenido\modelo\eventoM as eventoM;
   
       $objeto = new eventoM();
       $consultarEvento= $objeto->consultarEvento();

//////////////////////////////////////////////////////////

    use contenido\modelo\ventasM as ventasM;

///////////////////-------Registrar--------////////////
///////////////////-------Modificar--------////////////
///////////////////-------Eliminar--------////////////
///////////////////-------Consultar--------////////////
///////////////////-------Papelera--------////////////
///////////////////-------Restaurar--------////////////  
      
/////////////////---Mesa-Area-Entrada---///////////////////

     use contenido\modelo\mesasM as mesasM;
   
       $objeto = new mesasM();
       $consultarMesa= $objeto->consultarMesa();
       $consultarAreas= $objeto->consultarArea();

/////////////////---Cliente---///////////////////////////

     use contenido\modelo\clientM as clientM;

       $objeto = new clientM();
       $mostrarClientes= $objeto->consultarClientes();

////////////////////////////////////////////////////////////

	   if(file_exists("vista/registrarVentasV.php")) {
	   require_once("vista/registrarVentasV.php");
	   }

 ?>