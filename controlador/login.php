<?php 
 
 session_start();


if(isset($_POST['usuario']) && !empty($_POST['usuario']) 
                           &&                   
isset($_POST['password'])  && !empty($_POST['password'])){

	require_once '../modelo/mysql.php';

$user = $_POST["usuario"];
$contraseña = MD5($_POST["password"]);

 
$_SESSION['usuario'] = $user;    


//se instancia la clase, es decir, se llama para poder usar sus metodos
$mysql = new MySQL();

//se hace uso del metodo para conectarse a la base de datos
$mysql->conectar();


//se guarda en una variable la consulta utilizando el metodo para dicho proceso
$administrador = $mysql->efectuarConsulta("SELECT agendacitas.usuarios.username, agendacitas.usuarios.password FROM 
                              agendacitas.usuarios
                              WHERE agendacitas.usuarios.username = '".$user."' &&
                              agendacitas.usuarios.password = '".$contraseña."' && agendacitas.usuarios.tipo_usuario_id_FK = 1 ");

$doctores = $mysql->efectuarConsulta("SELECT agendacitas.usuarios.username, agendacitas.usuarios.password FROM 
                              agendacitas.usuarios
                              WHERE agendacitas.usuarios.username = '".$user."' &&
                              agendacitas.usuarios.password = '".$contraseña."' && agendacitas.usuarios.tipo_usuario_id_FK = 2 ");

$pacientes = $mysql->efectuarConsulta("SELECT agendacitas.usuarios.username, agendacitas.usuarios.password FROM 
										 agendacitas.usuarios
										 WHERE agendacitas.usuarios.username = '".$user."' &&
										 agendacitas.usuarios.password = '".$contraseña."' && agendacitas.usuarios.tipo_usuario_id_FK = 3 ");

 //desconectar la base de datos para liberar memoria 
 $mysql->desconectar();							
}


if(mysqli_num_rows($administrador) > 0){
   
	 header("Location: ../inicio.php");
   } 

   elseif(mysqli_num_rows($doctores) > 0){
      header("Location: ../vistas/sesiondoctor.php");
     } 

     elseif(mysqli_num_rows($pacientes) > 0){
      header("Location: ../vistas/sesionpaciente.php");
     } 

      else {

      header("Location: ../LOGIN/login.html");

   }

?>