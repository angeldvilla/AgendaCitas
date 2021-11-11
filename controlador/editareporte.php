<?php

if(isset($_POST['nombre_sede']) && !empty($_POST['nombre_sede']) 
&&   
isset($_POST['nombre_paciente']) && !empty($_POST['nombre_paciente']) 
                                &&   
   isset($_POST['apellidos']) && !empty($_POST['apellidos']) 
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

// se conecta con el método
$mysql->conectar();

//se capturan las variables
$nombre_sede = $_POST['nombre_sede'];
$nombre_paciente = $_POST['nombre_paciente'];
$apellidos_paciente = $_POST['apellidos'];
$motivo = $_POST['motivo'];
$antecedentes = $_POST['antecedentes'];
$orden = $_POST['orden'];
$informe = $_POST['informe'];
$fechaingreso = $_POST['fechaingreso'];
$fechasalida = $_POST['fechasalida'];

$id = $_POST['id_historia_clinica'];

// se realiza la actualización con los parametros enviados desde el formulario editaruser.php
$mysql ->efectuarConsulta("UPDATE agendacitas.historia_clinica SET  agendacitas.historia_clinica.nombre_sede ='".$nombre_sede."',  
                                           
                                           
                                            agendacitas.pacientes.nombre_paciente = '".$nombre_paciente."', 
                                            agendacitas.pacientes.apellidos = '".$apellidos_paciente."', 
                                           agendacitas.historia_clinica.motivo_cita = '".$motivo."', 
                                           agendacitas.historia_clinica.antecedentes= '".$antecedentes."',
                                           agendacitas.historia_clinica.ordenes_medicas='".$orden."',
                                           agendacitas.historia_clinica.informe = '".$informe."', 
                                           agendacitas.historia_clinica.fecha_ingreso = '".$fechaingreso."', 
                                           agendacitas.historia_clinica.fecha_salida = '".$fechasalida."' 
                                           
                                           WHERE agendacitas.historia_clinica.id_historia_clinica = ".$id."");


   ?>

<head>
    
    <!-- se utiliza la etiqueta meta para mandar automaticamente a la pagina usuarios.php que se encuentra en la raíz del proyecto -->
    <META HTTP-EQUIV="REFRESH" CONTENT="3;URL=../historiaclinica.php">
   <!-- se muestra un mensaje al usuario para garantizar que hizo la actualización -->
    <center>
       Reporte editado Correctamente! Serás redirigido automáticamente.
    </center>
</head>
<?php
        }
        //en caso de que no llene todos los campos muestra el mensaje que ocurrió un error
        else{
            echo "Ocurrio un error";
        }
