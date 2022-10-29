<?php
	$conn = mysqli_connect('localhost', 'root', '', 'agendacitas');
	
	if(!$conn){
		die("Error: Fallo al conectar con la base de datos");
	}
?>

<!-- conection -->