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
    $this->Cell(70,10,'REPORTE USUARIOS MEDICARE',0,0,'C');
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
    $this->Cell(30,10, 'Nombre', 1,0,"C",0);
    $this->Cell(30,10, 'Apellido', 1,0,"C",0);
    $this->Cell(45,10, 'Email', 1,0,"C",0);
    $this->Cell(35,10, 'Username', 1,0,"C",0);
    $this->Cell(45,10, 'Tipo Usuario', 1,1,"C",0);
 

    
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
$consulta= "SELECT usuarios.id_usuario, usuarios.nombre, usuarios.apellidos, usuarios.email, usuarios.username, tipo_usuario.descripcion 
FROM usuarios INNER JOIN tipo_usuario ON usuarios.tipo_usuario_id_FK = tipo_usuario.id_tipo_usuario"; 
$resultado= mysqli_query($conexion, $consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 10);

 while($row=$resultado->fetch_assoc()){
    $pdf->Cell(10,10,$row['id_usuario'], 1,0,'C',0);
     $pdf->Cell(30,10,$row['nombre'], 1,0,'C',0);
     $pdf->Cell(30,10,$row['apellidos'], 1,0,'C',0);
     $pdf->Cell(45,10,$row['email'], 1,0,'C',0);
     $pdf->Cell(35,10,$row['username'], 1,0,'C',0);
     $pdf->Cell(45,10,$row['descripcion'], 1,1,'C',0);
 }

        $pdf->Output();
?>
