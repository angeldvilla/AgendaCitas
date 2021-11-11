
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
$tipo_usuario = 2;


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
      Doctor Registrado Correctamente! Serás redirigido automáticamente.
   </center>
</head>
<?php
       }
       //en caso de que no llene todos los campos muestra el mensaje que ocurrió un error
       else{
           echo "Ocurrio un error";
       }





<div class="form-register">
			 		<b><i><h2>Registrate!</h2></b></i>
			 		<br><br><form action="../controlador/registropaciente.php" method="POST">

                        <div class="inputBox">
                        <input class="controls" type="text" name="nombre" required="" placeholder="Ingrese su nombre completo">
                        </div>

                        <div class="inputBox">
                        <input class="controls" type="text" name="apellidos" required="" placeholder="Ingrese sus apellidos">
                        </div>

			 			            <div class="inputBox">
			 				          <input class="controls" type="email" name="email" required="" placeholder="Ingrese su correo electronico"/>
			 			            </div>

                         <div class="inputBox">
                            <input class="controls" type="text"  name="username" required="" placeholder="Ingrese su nombre de usuario">
                            </div>

                            <div class="inputBox">
                              <input class="controls" type="password"  name="password" required="" placeholder="Ingrese su contraseña">
                              </div>

                            <p class="terminos"><input type="checkbox" name="terminos" id="terminos" value="terminos" required=""> Estoy de acuerdo con los <a href="#"> Términos y condiciones.</a></p>
			 			<div class="inputBox">
			 				<input class="boton" type="submit" value="Registrar" />