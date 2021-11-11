<?php

 if(isset($_POST['nombre_paciente']) && !empty($_POST['nombre_paciente']) 
 							&&
    isset($_POST['apellidos']) && !empty($_POST['apellidos'])
    						 &&
    
     isset($_POST['ID']) && !empty($_POST['ID']) 
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

 $mysql->conectar();

 $nombres = $_POST['nombre_paciente'];
 $apellidos = $_POST['apellidos'];
 $documento = $_POST['ID'];
 $genero = $_POST['genero'];
 $correo = $_POST['correo'];
 $telefono = $_POST['telefono'];
 $enfermedades = $_POST['enfermedades'];
 $medicamentos = $_POST['medicamentos'];
 $alergias = $_POST['alergias'];
 

 $mysql->efectuarConsulta("INSERT INTO agendacitas.pacientes
 			VALUES('', '" . $nombres . "','" . $apellidos . "', '" . $documento . "', '" . $genero . "
 			','" . $correo . "','" . $telefono . "', '" . $enfermedades . "', '" . $medicamentos . "',  
             '" . $alergias . "')");

$mysql->desconectar();


?>
<head>
    <!-- se utiliza la etiqueta meta para mandar automaticamente a la pagina usuarios.php que se encuentra en la raíz del proyecto -->
    <META HTTP-EQUIV="REFRESH" CONTENT="3;URL=../inicio.php">
   <!-- se muestra un mensaje al usuario para garantizar que hizo la actualización -->
    <center>
       Paciente creado Correctamente! Serás redirigido automáticamente.
    </center>
</head>
<?php
        }
        //en caso de que no llene todos los campos muestra el mensaje que ocurrió un error
        else{
            echo "Ocurrio un error";
        }