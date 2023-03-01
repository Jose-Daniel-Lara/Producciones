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
 use contenido\modelo\eventoM as eventoM;

    $carrusel=new carrusel;
 
    $objeto = new eventoM();


///////////////////-------Registrar--------////////////

       if (isset($_POST['tipo'])) {

       $tipo = $objeto->getTipo($_POST['tipo']);

       } 
///////////////////-------Modificar--------////////////

        if (isset($_POST['cod']) && isset($_POST['tip'])) {

        $modificarTipoEvento=$objeto->modificarTipoEvento($_POST['cod'], $_POST['tip'] );

       }

///////////////////-------Eliminar--------////////////

     if (isset($_POST['cod_tipo'])) {

      $AnularTipoEvento=$objeto->AnularTipoEvento($_POST['cod_tipo']);

    }

///////////////////-------Consultar--------////////////

      $consultarTipo= $objeto->consultarTipo();

///////////////////-------Papelera--------////////////

      $papeleraTipoEvento= $objeto->papeleraTipoEvento();
///////////////////-------Restaurar--------////////////       
     
       if (isset($_POST['restaurarTI'])) {

        $restaurarTipoEvento= $objeto->restaurarTipoEvento($_POST['restaurarTI']);
       
      }

//////////////////////////////////////////////////////////////

      
      if(file_exists("vista/tipoEventoV.php")) {
      require_once("vista/tipoEventoV.php");
       }
       


 ?>