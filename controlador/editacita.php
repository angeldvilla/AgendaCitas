<?php

if(isset($_POST['nombre_paciente']) && !empty($_POST['nombre_paciente']) 
                                &&   
   isset($_POST['apellidos']) && !empty($_POST['apellidos']) 
                                &&
   isset($_POST['nombre_doctor']) && !empty($_POST['nombre_doctor']) 
   &&
   isset($_POST['apellidos_doctor']) && !empty($_POST['apellidos_doctor']) 
                                &&
   isset($_POST['fecha_cita']) && !empty($_POST['fecha_cita']) 
                                &&  
   isset($_POST['hora_cita']) && !empty($_POST['hora_cita']) 
   &&
   isset($_POST['estado']) && !empty($_POST['estado'])     
        
        ){
require_once '../modelo/mysql.php';


$mysql = new MySQL();

// se conecta con el método
$mysql->conectar();

//se capturan las variables
$nombre_paciente = $_POST['nombre_paciente'];
$apellidos = $_POST['apellidos'];
$nombre_doctor = $_POST['nombre_doctor'];
$apellidos_doctor = $_POST['apellidos_doctor'];
$fecha_cita = $_POST['fechacita']
$hora_cita = $_POST['horacita'];
$estado = $_POST['estado'];
$id_cita = $_POST['id_cita'];

// se realiza la actualización con los parametros enviados desde el formulario editaruser.php
$mysql ->efectuarConsulta("UPDATE agendacitas.citas SET agendacitas.pacientes.nombre_paciente ='".$nombre_paciente."',  
                                           agendacitas.pacientes.apellidos = '".$apellidos."',
                                           agendacitas.doctores.nombre_doctor = '".$nombre_doctor."',  
                                           agendacitas.doctores.apellidos_doctor = '".$apellidos_doctor."', 
                                           agendacitas.citas.fecha_cita = '".$fecha_cita."', 
                                           agendacitas.citas.hora_cita= '".$hora_cita."',
                                           agendacitas.citas.estado='".$estado."'
                                           
                                           WHERE agendacitas.citas.id_usuario = ".$id_cita."");


   ?>

<head>
    
    <!-- se utiliza la etiqueta meta para mandar automaticamente a la pagina usuarios.php que se encuentra en la raíz del proyecto -->
    <META HTTP-EQUIV="REFRESH" CONTENT="3;URL=../listadocitas.php">
   <!-- se muestra un mensaje al usuario para garantizar que hizo la actualización -->
    <center>
       Cita editada Correctamente! Serás redirigido automáticamente.
    </center>
</head>
<?php
        }
        //en caso de que no llene todos los campos muestra el mensaje que ocurrió un error
        else{
            echo "Ocurrio un error";
        }
