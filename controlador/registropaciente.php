<?php

 if(isset($_POST['nombres']) && !empty($_POST['nombres']) 
 							&&
    isset($_POST['apellidos']) && !empty($_POST['apellidos'])
    						 &&
    
     isset($_POST['email']) && !empty($_POST['email']) 
     						&&
     isset($_POST['username']) && !empty($_POST['username']) 
     							&&
     isset($_POST['password']) && !empty($_POST['password']) 

     ){
 	require_once '../modelo/mysql.php';
 
 $mysql = new MySQL();

 $mysql->conectar();

 $nombres = $_POST['nombres'];
 $apellidos = $_POST['apellidos'];
 $email = $_POST['email'];
 $user = $_POST['username'];
 $contraseña = MD5($_POST['password']);
 $tipo_usuario = 3;


 $mysql->efectuarConsulta("INSERT INTO agendacitas.usuarios
 			VALUES('', '" . $nombres . "','" . $apellidos . "','" . $email . "
 			','" . $user . "','" . $contraseña . "', '" . $tipo_usuario . "')");

$mysql->desconectar();


?>
<head>
    <!-- se utiliza la etiqueta meta para mandar automaticamente a la pagina usuarios.php que se encuentra en la raíz del proyecto -->
    <META HTTP-EQUIV="REFRESH" CONTENT="3;URL=../inicio.php">
   <!-- se muestra un mensaje al usuario para garantizar que hizo la actualización -->
    <center>
       Paciente Registrado Correctamente! Serás redirigido automáticamente.
    </center>
</head>
<?php
        }
        //en caso de que no llene todos los campos muestra el mensaje que ocurrió un error
        else{
            echo "Ocurrio un error";
        }