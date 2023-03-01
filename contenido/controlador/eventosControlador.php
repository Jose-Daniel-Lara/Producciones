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

    use contenido\modelo\eventoM as eventoM;
    $objeto = new eventoM();

/////////////////////////////////////////////////////
       $consultarLugar= $objeto->consultarLugar();
       $consultarTipo= $objeto->consultarTipo();
     

///////////////////-------Registrar--------////////////

       if (isset($_POST['evento']) && isset($_POST['tipoEvento']) && isset($_POST['lugares']) && isset($_POST['entradas']) && isset($_POST['fecha']) && isset($_POST['hora']) && isset($_POST['imagen'])) {

       $evento = $objeto->getEvento($_POST['evento'], $_POST['tipoEvento'], $_POST['lugares'], $_POST['entradas'], $_POST['fecha'], $_POST['hora'], $_POST['imagen']);

      }

///////////////////-------Modificar--------////////////

       if (isset($_POST['cod']) && isset($_POST['nom']) && isset($_POST['tip']) && isset($_POST['lug']) && isset($_POST['ent']) && isset($_POST['fec']) && isset($_POST['hor'] ) && isset($_POST['img']) ){

      $modificarEvento=$objeto->modificarEvento($_POST['cod'], $_POST['nom'], $_POST['tip'], $_POST['lug'], $_POST['ent'], $_POST['fec'], $_POST['hor'], $_POST['img'] );

       }

///////////////////-------Eliminar--------////////////

       if (isset($_POST['codigo'])) {

      $AnularEvento=$objeto->AnularEvento($_POST['codigo']);

      }

///////////////////-------Consultar--------////////////

      $consultarEvento= $objeto->consultarEvento();

///////////////////-------Papelera--------////////////

        $papeleraEvento= $objeto->papeleraEvento();
       
///////////////////-------Restaurar--------////////////

       if (isset($_POST['restaurarE'])) {

         $restaurarEvento= $objeto->restaurarEvento($_POST['restaurarE']);
       
      }

////////////////////////////////////////////////////////
      
    	if(file_exists("vista/eventoV.php")) {
	    require_once("vista/eventoV.php");
       }


 ?>