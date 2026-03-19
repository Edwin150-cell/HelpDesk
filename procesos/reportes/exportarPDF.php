<?php
require_once('../../clases/Conexion.php');

$obj = new Conexion();
$conexion = $obj->conectar();

require('../../libreria/fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);

$pdf->Cell(190,10,'Reporte de incidencias',0,1,'C');

$pdf->Cell(30,10,'ID',1);
$pdf->Cell(50,10,'Fecha',1);
$pdf->Cell(110,10,'Descripcion',1);
$pdf->Ln();

$sql = "SELECT * FROM t_reportes";
$result = mysqli_query($conexion,$sql);

while($ver = mysqli_fetch_array($result)){
    $pdf->Cell(30,10,$ver['id_reporte'],1);
    $pdf->Cell(50,10,$ver['fecha'],1);
    $pdf->Cell(110,10,$ver['descripcion_problema'],1);
    $pdf->Ln();
}

$pdf->Output();