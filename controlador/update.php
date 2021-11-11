<?php

if(isset($_POST['nombre']) && !empty($_POST['nombre']) 
                                &&   
   isset($_POST['apellidos']) && !empty($_POST['apellidos']) 
                                &&
   isset($_POST['email']) && !empty($_POST['email']) 
                                &&
   isset($_POST['username']) && !empty($_POST['username']) 
                                &&  
   isset($_POST['tipo_usuario']) && !empty($_POST['tipo_usuario'])     
        
        ){
require_once '../modelo/mysql.php';


$mysql = new MySQL();

// se conecta con el método
$mysql->conectar();

//se capturan las variables
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$username = $_POST['username'];
$tipo_usuario = $_POST['tipo_usuario']
$id_usuario = $_POST['id_usuario'];

// se realiza la actualización con los parametros enviados desde el formulario editaruser.php
$mysql ->efectuarConsulta("UPDATE agendacitas.usuarios SET  agendacitas.usuarios.nombre ='".$nombre."',  
                                           agendacitas.usuarios.apellidos = '".$apellidos."', 
                                           agendacitas.usuarios.email = '".$email."', 
                                           agendacitas.usuarios.username= '".$username."',
                                           agendacitas.usuarios.tipo_usuario_id_FK='".$tipo_usuario."'
                                           
                                           WHERE agendacitas.usuarios.id_usuario = ".$id_usuario."");


   ?>

<head>
    
    <!-- se utiliza la etiqueta meta para mandar automaticamente a la pagina usuarios.php que se encuentra en la raíz del proyecto -->
    <META HTTP-EQUIV="REFRESH" CONTENT="3;URL=../listadousuarios.php">
   <!-- se muestra un mensaje al usuario para garantizar que hizo la actualización -->
    <center>
       Usuario editado Correctamente! Serás redirigido automáticamente.
    </center>
</head>
<?php
        }
        //en caso de que no llene todos los campos muestra el mensaje que ocurrió un error
        else{
            echo "Ocurrio un error";
        }
