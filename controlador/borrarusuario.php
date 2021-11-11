<?php

require '../modelo/mysql.php';

// se captura la variable id enviada desde la tabla de usuarios.php por el metodo get
$variable = $_GET['id_usuario'];


$mysql = new MySQL();

//se llama el método conectar
$mysql->conectar();


//se realiza el borrado con la variable llamada $variable que contiene el id de usuario
$mysql->efectuarConsulta("DELETE FROM agendacitas.usuarios WHERE agendacitas.usuarios.id_usuario = " . $variable . "");


//se desconecta con el método 
$mysql->desconectar();

?>

<head>
    <!-- se utiliza la etiqueta meta para enviar al usuario a la pagina usuarios.php que está en la raiz -->
<META HTTP-EQUIV="REFRESH" CONTENT="3;URL=../listadousuarios.php">
    <!-- se muestra un mensaje al usuario que el borrado fue realizado -->
    <center>
       Usuario Eliminado Correctamente! Serás redirigido automáticamente.
    </center>
</head>

        