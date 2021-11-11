<?php
//inicia sesion
session_start();


//identifica la sesión con su rol de usuario
if (isset($_SESSION['usuario']))
{
    //Cierra la session
    unset($_SESSION['usuario']);
} 

//logout
header("Location: ../LOGIN/login.html");

session_destroy();

?>


