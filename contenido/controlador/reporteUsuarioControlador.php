<?php 

session_start();
if (isset($_SESSION['idusuario'])) {
      if ($_SESSION['tipoUsuario']=='Encargado') {
        die("<script>location='?url=registros'</script>");
      }
  }else{
    die("<script>location='?url=usuario'</script>");
  }

use contenido\componentes\componentes as varComponentes;
use  contenido\reportesPDF\reporteUsuario as reporteUsuario;

    $pdf = new reporteUsuario();
    $pdf->AddPage();
    $pdf->SetX(15);
    $pdf->SetFont('Times','B',12);
    $pdf->SetFillColor(00,00,95);
    $pdf->SetTextColor(1000);
    $pdf->Cell(18, 10,  utf8_decode('N°'), 0,0,'C',1);
    $pdf->Cell(40, 10, utf8_decode('Nombre'), 0,0,'C',1);
    $pdf->Cell(40, 10, utf8_decode('Usuario'), 0,0,'C',1);
    $pdf->Cell(60, 10, utf8_decode('Correo Electrónico'), 0,0,'C',1);
    $pdf->Cell(20, 10, utf8_decode('Estado'), 0,1,'C',1);
  
    use contenido\modelo\usuarioM as usuarioM;
    $objeto = new usuarioM();
    $consultarU=$objeto->consultarUsuarios();

    $pdf->SetWidths(array(18,40,40,60,20));

foreach ( $consultarU as $reg) {

	$id=$reg->id;
    $usuario= $reg->usuario;
	$tipoUsuario= $reg->tipoUsuario;
    $correo= $reg->correo;
    $status= $reg->status;
    $pdf->SetX(15);
	$pdf->SetFont('Times','',10);
	$pdf->Row(array($id, utf8_decode($usuario),utf8_decode($tipoUsuario),utf8_decode($correo),utf8_decode($status)));
}
    $pdf->AliasNbPages();
    $pdf->Output();


 ?>