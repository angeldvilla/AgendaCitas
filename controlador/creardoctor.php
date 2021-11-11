<?php

 if(isset($_POST['nombre_doctor']) && !empty($_POST['nombre_doctor']) 
 							&&
    isset($_POST['apellidos_doctor']) && !empty($_POST['apellidos_doctor'])
    						 &&
     isset($_POST['ID']) && !empty($_POST['ID']) 
                        &&
     isset($_POST['especialidad']) && !empty($_POST['especialidad']) 
                            &&
     isset($_POST['genero']) && !empty($_POST['genero']) 
     						&&
     isset($_POST['correo']) && !empty($_POST['correo']) 
     							&&
     isset($_POST['telefono']) && !empty($_POST['telefono']) 

     ){
 	require_once '../modelo/mysql.php';
 
 $mysql = new MySQL();

 $mysql->conectar();

 $nombres = $_POST['nombre_doctor'];
 $apellidos = $_POST['apellidos_doctor'];
 $documento = $_POST['ID'];
 $especialidad = $_POST['especialidad'];
 $genero = $_POST['genero'];
 $email = $_POST['correo'];
 $telefono = $_POST['telefono'];


 $mysql->efectuarConsulta("INSERT INTO agendacitas.doctores
 			VALUES('', '" . $nombres . "','" . $apellidos . "','" . $documento . "
 			','" . $especialidad . "', '" . $genero . "','" . $email . "' , '" . $telefono . "')");

$mysql->desconectar();

?>
<head>

<head>
    
    <!-- se utiliza la etiqueta meta para mandar automaticamente a la pagina usuarios.php que se encuentra en la raíz del proyecto -->
    <META HTTP-EQUIV="REFRESH" CONTENT="3;URL=../inicio.php">
   <!-- se muestra un mensaje al usuario para garantizar que hizo la actualización -->
    <center>
       Doctor creado Correctamente! Serás redirigido automáticamente.
    </center>
</head>
<?php
        }
        //en caso de que no llene todos los campos muestra el mensaje que ocurrió un error
        else{
            echo "ecurrio un error";
        }