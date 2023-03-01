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
      
       
///////////////////-------Registrar--------////////////

      if (isset($_POST['lugar']) && isset($_POST['direccion'])) {

       $lugar = $objeto->getLugar($_POST['lugar'], $_POST['direccion']);

       } 

///////////////////-------Modificar--------////////////

       if (isset($_POST['cod']) && isset($_POST['lug']) && isset($_POST['dir']) ){

      $modificarLugar=$objeto->modificarLugar($_POST['cod'], $_POST['lug'], $_POST['dir'] );

       }
///////////////////-------Eliminar--------////////////

       if (isset($_POST['cod_lugar'])) {

      $AnularLugar=$objeto->AnularLugar($_POST['cod_lugar']);

       }

///////////////////-------Consultar--------////////////

        $consultarLugar= $objeto->consultarLugar();

///////////////////-------Papelera--------////////////

         $papeleraLugar= $objeto->papeleraLugar();

///////////////////-------Restaurar--------////////////

     if (isset($_POST['restaurarLU'])) {

     $restaurarLugar= $objeto->restaurarLugar($_POST['restaurarLU']);
       
      }
      

      if(file_exists("vista/lugaresV.php")) {
      require_once("vista/lugaresV.php");
       }
       
 ?>