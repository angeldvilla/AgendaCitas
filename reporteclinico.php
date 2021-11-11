<?php
require_once 'REPORTES/fpdf.php';

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('imagenes/logo.jpg',10,7,21);
    $this->Image('imagenes/logo.jpg',180,7,20);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(60);

    // Título
    $this->Cell(70,10,'REPORTE CLINICO MEDICARE',0,0,'C');
    // Salto de línea
    $this->Ln(20);
      //ESTILOS DE COLORES
  $this->SetFillColor(255,0,0);   
  $this->SetTextColor(0); 
  $this->SetDrawColor(128,0,0); 
  $this->SetLineWidth(.3); 
  $this->SetFont('Arial', 'B',16); 

    $this->SetFont('Arial','B',10);
    $this->Cell(10,10, 'ID', 1,0,"C",0);
    $this->Cell(14,10, 'Sede', 1,0,"C",0);
    $this->Cell(20,10, 'Paciente', 1,0,"C",0);
    $this->Cell(15,10, 'Motivo', 1,0,"C",0);
    $this->Cell(25,10, 'Antecedentes', 1,0,"C",0);
    $this->Cell(33,10, 'Ordenes Medicas', 1,0,"C",0);
    $this->Cell(17,10, 'Informe', 1,0,"C",0);
    $this->Cell(31,10, 'Fecha de Ingreso', 1,0,"C",0);
    $this->Cell(29,10, 'Fecha de Salida', 1,0,"C",0);

    
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    //Copyright ©
    $this->Cell(170,10, 'Copyright MEDICARE | Contact: medicaredesign@gmail.com',0,0,'L');
    // Número de página
    $this->Cell(5,10, utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
require_once 'conexion.php';
$consulta= "SELECT * FROM historia_clinica"; 
$resultado= mysqli_query($conexion, $consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 10);

 while($row=$resultado->fetch_assoc()){
     $pdf->Cell(10,10,$row['id_historia_clinica'], 1,0,'C',0);
     $pdf->Cell(10,10,$row['nombre_sede'], 1,0,'C',0);
     $pdf->Cell(10,10,$row['nombres'], 1,0,'C',0);
     $pdf->Cell(10,10,$row['motivo_cita'], 1,0,'C',0);
     $pdf->Cell(10,10,$row['antecedentes'], 1,0,'C',0);
     $pdf->Cell(10,10,$row['ordenes_medicas'], 1,0,'C',0);
     $pdf->Cell(10,10,$row['informe'], 1,0,'C',0);
     $pdf->Cell(10,10,$row['fecha_ingreso'], 1,0,'C',0);
     $pdf->Cell(10,10,$row['fecha_salida'], 1,1,'C',0);
 }


        $pdf->Output();
?>
