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


use contenido\modelo\clientM as clientM;

$objeto = new clientM();

//////////////---------Registrar--------///////////////

   if (isset($_POST['tipoCI']) && isset($_POST['cedula']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['telefono']) && isset($_POST['correo'])) {

       $mensaje = $objeto->getClientes($_POST['tipoCI'],$_POST['cedula'], $_POST['nombre'], $_POST['apellido'], $_POST['telefono'], $_POST['correo']);

   }


//////////////---------Modificar--------///////////////

   if (isset($_POST['cod']) && isset($_POST['cedula00']) && isset($_POST['nombre00']) && isset($_POST['apellido00']) && isset($_POST['tel00']) && isset($_POST['corr00']) ){

      $modificarCliente=$objeto->modificarCliente($_POST['cod'], $_POST['cedula00'], $_POST['nombre00'], $_POST['apellido00'], $_POST['tel00'],$_POST['corr00'] );

    }

//////////////---------Eliminar--------///////////////

    if (isset($_POST['cedula'])) {

      $eliminarCliente=$objeto->eliminarCliente($_POST['cedula']);

     }

//////////////---------Consultar--------///////////////

      $mostrarClientes=$objeto->consultarClientes();

//////////////---------Papelera--------///////////////

       $papeleraClientes= $objeto->papeleraClientes();

//////////////---------Restaurar--------///////////////

    if (isset($_POST['restaurarCL'])) {

     $restaurarClientes= $objeto->restaurarClientes($_POST['restaurarCL']);
       
     }
      
//////////////_________________________________________________////////////////////////

    
///////////////////////////////////////////////////////////////////////////////////////
    
    if(file_exists("vista/clientesV.php")) {
     require_once("vista/clientesV.php");
     }


 ?>