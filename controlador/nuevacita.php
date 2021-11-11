<?php
 if(isset($_POST['paciente']) && !empty($_POST['paciente']) 
 &&
isset($_POST['doctor']) && !empty($_POST['doctor'])
                &&
isset($_POST['fechacita']) && !empty($_POST['fechacita']) 
    &&
isset($_POST['horacita']) && !empty($_POST['horacita']) 
     &&
isset($_POST['estado']) && !empty($_POST['estado']) 
){


require_once '../modelo/mysql.php';

$mysql = new MySQL();

$mysql->conectar();

$paciente = $_POST['paciente'];
$doctor = $_POST['doctor'];
$fechacita = $_POST['fechacita'];
$horacita = $_POST['horacita'];
$estado = $_POST['estado'];




$mysql->efectuarConsulta("INSERT INTO agendacitas.citas
VALUES('', '" . $paciente . "','" . $doctor . "', '" . $fechacita . "', '" . $horacita . "
','" . $estado . "')");

$mysql->desconectar();


?>
<head>
    <!-- se utiliza la etiqueta meta para mandar automaticamente a la pagina usuarios.php que se encuentra en la raíz del proyecto -->
    <META HTTP-EQUIV="REFRESH" CONTENT="3;URL=../inicio.php">
   <!-- se muestra un mensaje al usuario para garantizar que hizo la actualización -->
    <center>
       Cita creada Correctamente! Serás redirigido automáticamente.
    </center>
</head>
<?php
        }
        //en caso de que no llene todos los campos muestra el mensaje que ocurrió un error
        else{
            echo "Ocurrio un error";
        }