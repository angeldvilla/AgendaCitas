<?php

if(isset($_POST['nombre_doctor']) && !empty($_POST['nombre']) 
                                &&   
   isset($_POST['apellidos_doctor']) && !empty($_POST['apellidos_doctor']) 
                        &&   
   isset($_POST['num_documento']) && !empty($_POST['num_documento']) 
                     &&   
   isset($_POST['especialidad']) && !empty($_POST['especialidad'])                           
                         &&
   isset($_POST['genero']) && !empty($_POST['genero']) 
                            &&
   isset($_POST['email']) && !empty($_POST['email']) 
                         
                                &&  
   isset($_POST['telefono']) && !empty($_POST['telefono'])     
        
        ){
require_once '../modelo/mysql.php';


$mysql = new MySQL();

// se conecta con el método
$mysql->conectar();

//se capturan las variables
$nombre_doctor = $_POST['nombre_doctor'];
$apellidos_doctor = $_POST['apellidos_doctor'];
$num_docuemnto = $_POST['num_documento'];
$especialidad = $_POST['especialidad'];
$genero = $_POST['genero'];
$email = $_POST['email'];
$telefono = $_POST['telefono']
$id_doctores = $_POST['id_doctores'];

// se realiza la actualización con los parametros enviados desde el formulario editaruser.php
$mysql ->efectuarConsulta("UPDATE agendacitas.doctores SET  agendacitas.doctores.nombre_doctor ='".$nombre_doctor."',  
                                           agendacitas.doctores.apellidos_doctor = '".$apellidos_doctor."', 
                                           agendacitas.doctores.num_documento= '".$num_docuemnto."',
                                           agendacitas.doctores.genero= '".$genero."',
                                           agendacitas.doctores.email = '".$email."', 
                                           agendacitas.doctores.telefono='".$telefono."'
                                           
                                           WHERE agendacitas.doctores.id_doctores = ".$id_doctores."");


   ?>

<head>
    
    <!-- se utiliza la etiqueta meta para mandar automaticamente a la pagina doctores.php que se encuentra en la raíz del proyecto -->
    <META HTTP-EQUIV="REFRESH" CONTENT="3;URL=../listadodoctores.php">
   <!-- se muestra un mensaje al usuario para garantizar que hizo la actualización -->
    <center>
       Doctor editado Correctamente! Serás redirigido automáticamente.
    </center>
</head>
<?php
        }
        //en caso de que no llene todos los campos muestra el mensaje que ocurrió un error
        else{
            echo "Ocurrio un error";
        }
