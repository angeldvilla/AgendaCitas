<?php
    header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=reporte_usuarios_medicare" . date('Y:m:d:m:s').".xls");
	header("Pragma: no-cache"); 
	header("Expires: 0");

	require_once 'conn.php';
	
	$output = "";
	
	if(ISSET($_POST['exportar_excel'])){
		$output .="
			<table>
				<thead>
				<h1> TABLA DE USUARIOS REGISTRADOS </h1><br>
				
					<tr>
						<th>Id Usuario</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Email</th>
						<th>Username</th>
                        <th>Tipo Usuario</th>
					</tr>
				<tbody>
		";
		
        $query = mysqli_query($conn,"SELECT agendacitas.usuarios.id_usuario, agendacitas.usuarios.nombre, 
        agendacitas.usuarios.apellidos, agendacitas.usuarios.email, agendacitas.usuarios.username, 
        agendacitas.tipo_usuario.descripcion FROM agendacitas.usuarios INNER JOIN agendacitas.tipo_usuario 
        ON agendacitas.usuarios.tipo_usuario_id_FK = agendacitas.tipo_usuario.id_tipo_usuario") or die(mysqli_errno());

		while($fetch = mysqli_fetch_array($query)){
			
		$output .= "
					<tr>
						<td>".$fetch['id_usuario']."</td>
						<td>".$fetch['nombre']."</td>
						<td>".$fetch['apellidos']."</td>
						<td>".$fetch['email']."</td>
						<td>".$fetch['username']."</td>
                        <td>".$fetch['descripcion']."</td>
					</tr>
		";
		}
		
		$output .="
				</tbody>
				
			</table>
		";
		
		echo $output;
	}
	
?>
