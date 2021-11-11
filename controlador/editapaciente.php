<?php

if(isset($_POST['nombre_paciente']) && !empty($_POST['nombre_paciente']) 
                                &&   
   isset($_POST['apellidos']) && !empty($_POST['apellidos']) 
                                &&
   isset($_POST['num_documento']) && !empty($_POST['num_documento']) 
                                &&
   isset($_POST['genero']) && !empty($_POST['genero']) 
                                &&  
   isset($_POST['correo']) && !empty($_POST['correo'])    
                &&  
   isset($_POST['telefono']) && !empty($_POST['telefono'])  
                &&  
   isset($_POST['enfermedades']) && !empty($_POST['enfermedades'])  
                &&  
   isset($_POST['medicamentos']) && !empty($_POST['medicamentos'])  
                &&  
   isset($_POST['alergias']) && !empty($_POST['alergias'])    
        
        ){
require_once '../modelo/mysql.php';


$mysql = new MySQL();

// se conecta con el método
$mysql->conectar();

//se capturan las variables
$nombre = $_POST['nombre_paciente'];
$apellidos = $_POST['apellidos'];
$num_documento = $_POST['num_documento'];
$genero = $_POST['genero'];
$email = $_POST['correo']
$telefono = $_POST['telefono'];
$enfermedades = $_POST['enfermedades'];
$medicamentos = $_POST['medicamentos'];
$alergias = $_POST['alergias'];
$id = $_POST['id_pacientes'];


// se realiza la actualización con los parametros enviados desde el formulario editaruser.php
$mysql ->efectuarConsulta("UPDATE agendacitas.pacientes SET agendacitas.pacientes.nombre_paciente ='".$nombre."',  
                                           agendacitas.pacientes.apellidos = '".$apellidos."', 
                                           agendacitas.pacientes.num_documento = '".$num_documento."', 
                                           agendacitas.pacientes.genero= '".$genero."',
                                           agendacitas.pacientes.email='".$email."',
                                           agendacitas.pacientes.telefono='".$telefono."',
                                           agendacitas.pacientes.enfermedades='".$enfermedades."',
                                           agendacitas.pacientes.medicamentos='".$medicamentos."',
                                           agendacitas.pacientes.alergias='".$alergias."',
                                           
                                           WHERE agendacitas.pacientes.id_pacientes = ".$id."");


   ?>

<head>
    
    <!-- se utiliza la etiqueta meta para mandar automaticamente a la pagina usuarios.php que se encuentra en la raíz del proyecto -->
    <META HTTP-EQUIV="REFRESH" CONTENT="3;URL=../listadopacientes.php">
   <!-- se muestra un mensaje al usuario para garantizar que hizo la actualización -->
    <center>
       Paciente editado Correctamente! Serás redirigido automáticamente.
    </center>
</head>
<?php
        }
        //en caso de que no llene todos los campos muestra el mensaje que ocurrió un error
        else{
            echo "Ocurrio un error";
        }
