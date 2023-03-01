<?php 
session_start();
if (isset($_SESSION['idusuario'])) {
      if ($_SESSION['tipoUsuario']=='Encargado') {
        die("<script>location='?url=registros'</script>");
      }
  }else{
    die("<script>location='?url=usuario'</script>");
  }
       use contenido\modelo\clientM as clientM;
       $objeto = new clientM();
       $mostrarCantClientes=$objeto->cantClientes();

       //---------------------------------------------------//
       use contenido\modelo\ventasM as ventasM;
       $objet = new ventasM();
       $mostrarCantVentas=$objet->cantVentas();

       //--------------------------------------------------//
        use contenido\modelo\eventoM as eventoM;
        $objeto = new eventoM();
        $mostrarCantEventos=$objeto->cantEventos();
      


	   if(file_exists("vista/homeV.php")) {
	    require_once("vista/homeV.php");
      }
 
 ?>