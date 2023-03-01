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

///////////////////////////////////////////////////////

       $consultarAreas= $objeto->consultarArea();

///////////////////-------Registrar--------////////////

    if (isset($_POST['evento']) && isset($_POST['area']) && isset($_POST['precio']) && isset($_POST['posiColumna']) && isset($_POST['posiFila']) && isset($_POST['cantPuesto'])) {

       $mesa=$objeto->getMesas($_POST['evento'], $_POST['area'], $_POST['precio'], $_POST['posiColumna'], $_POST['posiFila'], $_POST['cantPuesto']);
     
     }
///////////////////-------Modificar--------////////////

     if (isset($_POST['mesa']) && isset($_POST['event']) && isset($_POST['ar']) && isset($_POST['pre']) && isset($_POST['pColumna']) && isset($_POST['pFila']) && isset($_POST['cPuesto'])) {

      $modificarMesa=$objeto->modificarMesa($_POST['mesa'], $_POST['event'], $_POST['ar'], $_POST['pre'], $_POST['pColumna'], $_POST['pFila'], $_POST['cPuesto']);

    }
///////////////////-------Eliminar--------////////////

     if (isset($_POST['codigo'])) {

      $eliminarMesa=$objeto->eliminarMesa($_POST['codigo']);

    }
///////////////////-------Consultar--------////////////

     $consultarMesa= $objeto->consultarMesa();

///////////////////-------Papelera--------////////////

      $papeleraMesas= $objeto->papeleraMesas();

///////////////////-------Restaurar--------////////////
    if (isset($_POST['restaurarME'])) {

     $restaurarMesas= $objeto->restaurarMesas($_POST['restaurarME']);  
    }


/////////////////////////////////////////////////////////

      use contenido\modelo\eventoM as eventoM;
   
       $objeto = new eventoM();
       $consultarEvento= $objeto->consultarEvento();
       $mostrar= $objeto->mostrar();

/////////////////////////////////////////////////////////
    	
      if(file_exists("vista/mesasV.php")) {
	    require_once("vista/mesasV.php");

      }
     

 ?>