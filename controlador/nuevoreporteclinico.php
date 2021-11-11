<?php
 if(isset($_POST['sede']) && !empty($_POST['sede']) 
 &&
isset($_POST['nombre_paciente']) && !empty($_POST['nombre_paciente'])
 &&
isset($_POST['motivo']) && !empty($_POST['motivo']) 
     &&
isset($_POST['antecedentes']) && !empty($_POST['antecedentes']) 
&&
isset($_POST['orden']) && !empty($_POST['orden']) 
&&
isset($_POST['informe']) && !empty($_POST['informe']) 
&&
isset($_POST['fechaingreso']) && !empty($_POST['fechaingreso']) 
&&
isset($_POST['fechasalida']) && !empty($_POST['fechasalida']) 
){
require_once '../modelo/mysql.php';

$mysql = new MySQL();

$mysql->conectar();

$sede = $_POST['sede'];
$nombre_paciente = $_POST['nombre_paciente'];
$motivo = $_POST['motivo'];
$antecedentes = $_POST['antecedentes'];
$orden = $_POST['orden'];
$informe = $_POST['informe'];
$fechaingreso = $_POST['fechaingreso'];
$fechasalida = $_POST['fechasalida'];



$mysql->efectuarConsulta("INSERT INTO agendacitas.historia_clinica
VALUES('', '" . $sede . "','" . $nombre_paciente . "', '" . $motivo . "','" . $antecedentes . "',
'" . $orden . "', '" . $informe . "', '" . $fechaingreso . "', '" . $fechasalida . "')");

$mysql->desconectar();


?>
<head>
    <!-- se utiliza la etiqueta meta para mandar automaticamente a la pagina usuarios.php que se encuentra en la raíz del proyecto -->
    <META HTTP-EQUIV="REFRESH" CONTENT="3;URL=../inicio.php">
   <!-- se muestra un mensaje al usuario para garantizar que hizo la actualización -->
    <center>
       Reporte Clinico creado Correctamente! Serás redirigido automáticamente.
    </center>
</head>
<?php
        }
        //en caso de que no llene todos los campos muestra el mensaje que ocurrió un error
        else{
            echo "Ocurrio un error";
        }