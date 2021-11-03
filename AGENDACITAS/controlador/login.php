<?php 

if(isset($_POST['usuario']) && !empty($_POST['usuario']) 
                           &&                   
isset($_POST['password'])  && !empty($_POST['password'])){

	require_once '../modelo/mysql.php';

$user = $_POST["usuario"];

$contraseña = MD5($_POST["password"]);

//se instancia la clase, es decir, se llama para poder usar sus metodos
$mysql = new MySQL();

//se hace uso del metodo para conectarse a la base de datos
$mysql->conectar();


//se guarda en una variable la consulta utilizando el metodo para dicho proceso
$usuarios = $mysql->efectuarConsulta("SELECT login.usuarios.username, login.usuarios.password FROM 
										 login.usuarios
										 WHERE login.usuarios.username = '".$user."' &&
										 login.usuarios.password = '".$contraseña."'");

 //desconectar la base de datos para liberar memoria 
 $mysql->desconectar();							
} 


if(mysqli_num_rows($usuarios) > 0){


	 header("Location: ../inicio.php");
   } 
    else {
    header("Location: ../LOGIN/login.html");

   }


?>