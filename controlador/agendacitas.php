<?php

 if(isset($_POST['nombres']) && !empty($_POST['nombres']) 
 							&&
    isset($_POST['apellidos']) && !empty($_POST['apellidos'])
    						 &&
    
     isset($_POST['ID']) && !empty($_POST['ID']) 
     						&&
     isset($_POST['especialidad']) && !empty($_POST['especialidad']) 
     							&&
     isset($_POST['fecha']) && !empty($_POST['fecha']) 
                            &&
     isset($_POST['hora']) && !empty($_POST['hora']) 
                            &&
     isset($_POST['correo']) && !empty($_POST['correo']) 

     ){
 	require_once '../modelo/mysql.php';
 
 $mysql = new MySQL();

 $mysql->conectar();

 $nombres = $_POST['nombres'];
 $apellidos = $_POST['apellidos'];
 $documento = $_POST['ID'];
 $especialidad = $_POST['especialidad'];
 $fecha = $_POST['fecha'];
 $hora = $_POST['hora'];
 $correo = $_POST['correo'];



 $mysql->efectuarConsulta("INSERT INTO agendacitas.agendamiento
 			VALUES('', '" . $nombres . "','" . $apellidos . "', '" . $documento . "', '" . $especialidad . "
 			','" . $fecha . "','" . $hora . "', '" . $correo . "')");

$mysql->desconectar();


?>
<head>
    <!-- se utiliza la etiqueta meta para mandar automaticamente a la pagina usuarios.php que se encuentra en la raíz del proyecto -->
    <META HTTP-EQUIV="REFRESH" CONTENT="3;URL=../inicio.php">
   <!-- se muestra un mensaje al usuario para garantizar que hizo la actualización -->
    <center>
       Cita agendada Correctamente! Serás redirigido automáticamente.
    </center>
</head>
<?php
        }
        //en caso de que no llene todos los campos muestra el mensaje que ocurrió un error
        else{
            echo "Ocurrio un error";
        }