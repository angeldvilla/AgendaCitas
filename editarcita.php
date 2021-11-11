<?php

require_once 'modelo/mysql.php';

   //se valida que efectivamente se envie una variable tipo get desde la página usuarios.php
   // En este punto PHP reconoce que llegó una variable llamada id 
    if( isset($_GET['id_cita']) && !empty($_GET['id_cita'])){
        
        // se asigna esa variable recibida a la variable $variable
$variable= $_GET['id_cita'];

//se instancia la clase
$mysql = new MySQL();
//se conecta a la bd por medio del método
$mysql->conectar();

//se ejecuta la consulta

//La consulta trae todos los campos de la tabla usuarios que sean igual al id_usuario recibido

//Es decir de acuerdo al id_usuario recibido me muestra los datos de una persona en particular 
//(cada persona o usuario tiene un id_usuario único)

$consulta  = $mysql->efectuarConsulta("SELECT

                            agendacitas.citas.id_citas,
                            agendacitas.pacientes.nombre_paciente,
                            agendacitas.pacientes.apellidos,
                            agendacitas.doctores.nombre_doctor,
                            agendacitas.doctores.apellidos_doctor,
                            agendacitas.citas.fecha_cita,
                            agendacitas.citas.hora_cita,
                            agendacitas.citas.estado
                           
                            FROM agendacitas.citas
                            INNER JOIN agendacitas.pacientes ON agendacitas.citas.pacientes_id_paciente = agendacitas.pacientes.id_pacientes
                            INNER JOIN agendacitas.doctores ON agendacitas.citas.doctores_id_doctores = agendacitas.doctores.id_doctores
                            WHERE agendacitas.citas.id_citas= '".$variable."'");

// se captura le resultado de la consulta por medio de mysqli_fetch_assoc(la consulta anterior)
// mysql_fetch_assoc() es equivalente a llamar a mysql_fetch_array() con MYSQL_ASSOC como segundo parámetro opcional. Únicamente devuelve un array asociativo.
// como en este punto estamos seguros que solo me va a traer una fila ya que solo existe un usuario por cada id no necesitamos hacer un ciclo
$row = mysqli_fetch_assoc($consulta);

//llamamos al método desconectar
    $mysql->desconectar();
    }
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - EPS Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="DASHBOARD/css/styles.css" rel="stylesheet" />
    <link rel="shortcut icon" href="imagenes/logo.jpg">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body>
		<center><h1>Editar Citas</h1></center>

 <!--<form action="controlador/update.php" method="POST">
 se crea un input de tipo hidden es decir oculto con la variable id que recibimos 
   <input type='hidden' class="form-control mb-3" value='' name="id_usuario">
							
   etiqueta html para mostrar al usuario que campo es 
	<h5>Nombre:</h5>
	 en este input se trabaja el name como cualquier otro formulario pero se agrega la etiqueta value 
      La etiqueta value contiene el valor recibido en la consulta. En este caso el nombre y asi sucesivamente en cada campo
       Esta etiqueta "value" lo que hace es cargar un dato ya predefinido en el formulario y lo muestra 
	<input type="text" class="form-control mb-3" name="nombre" value="" required="">
													
	    <h5>Apellidos:</h5>		

        <input type="text" class="form-control mb-3" name="apellidos" value="" required="">

        <h5>Email:</h5>
					
	    <input type="email" class="form-control mb-3" name="email" value="" required="">
    
        <h5>Username:</h5>
								
        <input type="text" class="form-control mb-3" name="username" value="" required="">
								
		<h5>Tipo Usuario:</h5>
								
		<input type="text" class="form-control mb-3" name="tipo_usuario" value="" required="">
		
        
        <Se crea el submit para enviar la información 
		<input type="submit" class="btn btn-primary" name="enviar" value="Actualizar Datos">
        <a href="listadousuarios.php" class="btn btn-danger">Cancelar</a>
								
        </form> -->
        <link rel="stylesheet" href="registrosesion.css">
                        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
                        
                     <div class="container mt-5">
                    <form action="controlador/editacita.php" method="POST">
                    
                                <input class="controls" type="hidden" name="id_cita" value="<?php echo $row['id_cita']?>">
                                
                                <input class="controls" type="text"  name="nombre_paciente" placeholder="Nombre Paciente" value="<?php echo $row['nombre_paciente'] ?>"required="">
                                <input class="controls" type="text"  name="apellidos" placeholder="Apellido Paciente" value="<?php echo $row['apellidos'] ?>"required="">
                                <input class="controls" type="text" name="nombre_doctor" placeholder="Nombre Doctor" value="<?php echo $row['nombre_doctor'] ?>"required="">
                                <input class="controls" type="text"   name="apellidos_doctor" placeholder="Apellidos Doctor" value="<?php echo $row['apellidos_doctor'] ?>"required="">

                            
                                <input class="controls" type="date"  name="fechacita"id="fechacita" value="<?php echo $row['fecha_cita'] ?>"required="">
                                <input class="controls" type="time" name="horacita" id="horacita"  value="<?php echo $row['hora_cita'] ?>"required="">
                                <input class="controls" type="text" name="estado" id="estado" placeholder="Estado de la cita" value="<?php echo $row['estado'] ?>"required="">
                                 
    
                                
		                        <input type="submit" class="btn btn-primary" value="Actualizar Datos">
                                <a href="listadocitas.php" class="btn btn-danger">Cancelar</a>
                            
                    </form>
                    
                </div>				
						
</body>

</html>