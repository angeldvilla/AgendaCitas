<?php

session_start();
require_once 'modelo/mysql.php';

$mysql = new MySQL;

$mysql->conectar();

$consulta = $mysql->efectuarConsulta("SELECT agendacitas.doctores.id_doctores, agendacitas.doctores.nombre_doctor, 
								agendacitas.doctores.apellidos_doctor, agendacitas.doctores.num_documento, agendacitas.especialidades.tipo_especialidad,
								agendacitas.doctores.genero,agendacitas.doctores.email,agendacitas.doctores.telefono
								FROM agendacitas.doctores INNER JOIN agendacitas.especialidades ON agendacitas.doctores.especialidad = agendacitas.especialidades.id_especialidades");

$mysql->desconectar();	

$user = $_SESSION['usuario'];

if($user == '' && $user == null){
   
    header("Location: LOGIN/login.html");

 
die();
}
							
?>



<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
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
    <body class="sb-nav-fixed">


        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- BARRA-->
            <a class="navbar-brand ps-3" href="inicio.php">MEDICARE</a>
            <!-- BARRA DESPLEGABLE-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
          
            <!-- BARRA DE NAVEGACION-->
            <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $user; ?><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Perfil</a></li>
                        <li><a class="dropdown-item" href="#">Configuraciones</a></li>
                        <!--<li><a class="dropdown-item" href="#">Registro de Actividad</a></li>-->
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="controlador/logout.php">Cerrar Sesion</a></li>
                    </ul>
                </li>
            </ul>
        </nav>


        <!-- BARRA LATERAL-->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Inicio</div>
                            <a class="nav-link" href="inicio.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Mi Actividad
                            </a>
                            <div class="sb-sidenav-menu-heading">Interfaz</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Citas Médicas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="agendacita.php">Agendar Cita</a>
                                    <a class="nav-link" href="insertarcita.php">Nueva Cita</a>
                                    <a class="nav-link" href="listadocitas.php">Listado de Citas</a>
                                </nav>
                            </div>

                            <!--USUARIOS-->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                 Usuarios
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Autenticacion
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="listadousuarios.php">Listado de Usuarios</a>
                                            <a class="nav-link" href="insertarusuario.php">Registrar Usuario</a>
                                            <!--<a class="nav-link" href="LOGIN/recuperar.html">Olvidaste la contraseña</a>-->
                                        </nav>
                                    </div>

                                    <!--PACIENTES MENU-->
                                     <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Pacientes
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div> 
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="listadopacientes.php">Listado de Pacientes</a>
                                            <a class="nav-link" href="listadocitas.php">Citas Pendientes</a>
                                            <a class="nav-link" href="registrarpaciente.php">Registrar Paciente</a>
                                        </nav>
                                        </div>


                                        <!--DOCTORES MENU-->
                                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Doctores
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div> 
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="listadodoctores.php">Listado de Doctores</a>
                                            <a class="nav-link" href="listadocitas.php">Citas Agendadas</a>
                                            <a class="nav-link" href="registrardoctor.php">Registrar Doctor</a>
                                        </nav>
                                    </div>

                                </nav>
                            </div>

                            <!--COMPLEMENTOS -->
                            <div class="sb-sidenav-menu-heading">Complementos</div>
                            <a class="nav-link" href="GRAFICOS/chart.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Graficos
                            </a>
                            <a class="nav-link" href="historiaclinica.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Reportes Clinicos
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Has Iniciado como:</div>
                        <?php echo $user; ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">

            <!--CONTENIDO-->
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Usuarios</h1>
						<h2 class="mt-4">Doctores</h2>
                        <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Listado de Doctores</li>
                        </ol>
                        <a href="insertardoctor.php" class="btn btn-primary">Agregar Doctor</a>

                       <!-- <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Primary Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Warning Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Success Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Danger Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div> 
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div> -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Doctores Registrados
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
										<tr>
                                        <th> ID Doctor</th>
										<th> Nombre</th>
  		  								<th> Apellidos</th>
		 								<th> Numero Documento</th>
                                         <th> Especialidad</th>
										<th> Genero</th>
										<th> Email</th>
										<th> Telefono</th>
																	
   
									</tr> 
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
									
                                        <th> ID Doctor</th>
										<th> Nombre</th>
  		  								<th> Apellidos</th>
		 								<th> Numero Documento</th>
                                         <th> Especialidad</th>
										<th> Genero</th>
										<th> Email</th>
										<th> Telefono</th>
									
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php while($row = mysqli_fetch_array($consulta)) {?>

                                        <tr>
                                        <td><?php echo $row['id_doctores'] ?></td>
                                        <td><?php echo $row['nombre_doctor'] ?></td>
                                        <td><?php echo $row['apellidos_doctor'] ?></td>
                                        <td><?php echo $row['num_documento'] ?></td>
                                        <td><?php echo $row['tipo_especialidad'] ?></td>
                                        <td><?php echo $row['genero'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td><?php echo $row['telefono'] ?></td>
                                        <td><input type="button" class="btn btn-primary" onclick="location.href='editardoctor.php?id=<?php echo $row['id_doctores']?>';" value="Editar">
                                        <a  class="btn btn-danger" href="controlador/borrardoctor.php?id=<?php echo $row['id_doctores']?>" onclick="return confirm('¿Está seguro que quiere eliminar este usuario?');">Borrar</a>

                                        </tr> 
                                        <?php } ?>

                                        </tr> 
                                    </tbody>
                                </table>
                            </div>
                        </div> 
                        <form action="#" method="POST">
                        <input type="submit" name="exportar_excel" class="btn btn-success" value="Exportar a Excel">
                                    </form><br>

                        <a href="#" class="btn btn-danger"  value="Exportar a PDF" target="_blank">Exportar a PDF</a>
                                  
                                     <!--   <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
											<td>2011/04/25</td>
											
	
                                            <td><a href="#" class="btn btn-primary">Editar</a></td>
                                            <td><a href="#" class="btn btn-danger">Borrar</a></td>
                                        </tr>
                                        <tr>
                                            <td>Garrett Winters</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>63</td>
                                            <td>2011/07/25</td>
											<td>2011/04/25</td>
										
                                          
                                            <td><a href="#" class="btn btn-primary">Editar</a></td>
                                            <td><a href="#" class="btn btn-danger">Borrar</a></td>
                                        </tr>
                                        <tr>
                                            <td>Ashton Cox</td>
                                            <td>Junior Technical Author</td>
                                            <td>San Francisco</td>
                                            <td>66</td>
                                            <td>2009/01/12</td>
											<td>2011/04/25</td>
										
                                            
											
                                            <td><a href="#" class="btn btn-primary">Editar</a></td>
                                            <td><a href="#" class="btn btn-danger">Borrar</a></td>
                                        </tr>
                                        <tr>
                                            <td>Cedric Kelly</td>
                                            <td>Senior Javascript Developer</td>
                                            <td>Edinburgh</td>
                                            <td>22</td>
                                            <td>2012/03/29</td>
											<td>2011/04/25</td>
										
                                            <td><a href="#" class="btn btn-primary">Editar</a></td>
                                            <td><a href="#" class="btn btn-danger">Borrar</a></td>
                                        </tr>
                                        <tr>
                                            <td>Airi Satou</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>33</td>
                                            <td>2008/11/28</td>
											<td>2011/04/25</td>
											
                                         
											
                                            <td><a href="#" class="btn btn-primary">Editar</a></td>
                                            <td><a href="#" class="btn btn-danger">Borrar</a></td>
                                        </tr>
                                        <tr>
                                            <td>Brielle Williamson</td>
                                            <td>Integration Specialist</td>
                                            <td>New York</td>
                                            <td>61</td>
                                            <td>2012/12/02</td>
											<td>2011/04/25</td>
										
                                            
                                            <td><a href="#" class="btn btn-primary">Editar</a></td>
                                            <td><a href="#" class="btn btn-danger">Borrar</a></td>
                                        </tr>
                                        <tr>
                                            <td>Herrod Chandler</td>
                                            <td>Sales Assistant</td>
                                            <td>San Francisco</td>
                                            <td>59</td>
                                            <td>2012/08/06</td>
											<td>2011/04/25</td>
										
                                            
                                            <td><a href="#" class="btn btn-primary">Editar</a></td>
                                            <td><a href="#" class="btn btn-danger">Borrar</a></td>
                                        </tr>
                                        <tr>
                                            <td>Rhona Davidson</td>
                                            <td>Integration Specialist</td>
                                            <td>Tokyo</td>
                                            <td>55</td>
                                            <td>2010/10/14</td>
											<td>2011/04/25</td>
										
                                         
                                            <td><a href="#" class="btn btn-primary">Editar</a></td>
                                            <td><a href="#" class="btn btn-danger">Borrar</a></td>
                                        </tr>
                                        <tr>
                                            <td>Colleen Hurst</td>
                                            <td>Javascript Developer</td>
                                            <td>San Francisco</td>
                                            <td>39</td>
                                            <td>2009/09/15</td>
											<td>2011/04/25</td>
										
                                            
                                            <td><a href="#" class="btn btn-primary">Editar</a></td>
                                            <td><a href="#" class="btn btn-danger">Borrar</a></td>
                                        </tr>
                                        <tr>
                                            <td>Sonya Frost</td>
                                            <td>Software Engineer</td>
                                            <td>Edinburgh</td>
                                            <td>23</td>
                                            <td>2008/12/13</td>
											<td>2011/04/25</td>
										
                                            
                                            <td><a href="#" class="btn btn-primary">Editar</a></td>
                                            <td><a href="#" class="btn btn-danger">Borrar</a></td>
                                        </tr>
                                        <tr>
                                            <td>Jena Gaines</td>
                                            <td>Office Manager</td>
                                            <td>London</td>
                                            <td>30</td>
                                            <td>2008/12/19</td>
											<td>2011/04/25</td>
										
                                          
											
                                            <td><a href="#" class="btn btn-primary">Editar</a></td>
                                            <td><a href="#" class="btn btn-danger">Borrar</a></td>
                                        </tr>
                                        <tr>
                                            <td>Quinn Flynn</td>
                                            <td>Support Lead</td>
                                            <td>Edinburgh</td>
                                            <td>22</td>
                                            <td>2013/03/03</td>
											<td>2011/04/25</td>
											
                                           
                                            <td><a href="#" class="btn btn-primary">Editar</a></td>
                                            <td><a href="#" class="btn btn-danger">Borrar</a></td>
                                        </tr>
                                        <tr>
                                            <td>Charde Marshall</td>
                                            <td>Regional Director</td>
                                            <td>San Francisco</td>
                                            <td>36</td>
                                            <td>2008/10/16</td>
											<td>2011/04/25</td>
										
                                            
											
                                            <td><a href="#" class="btn btn-primary">Editar</a></td>
                                            <td><a href="#" class="btn btn-danger">Borrar</a></td>
                                        </tr>
                                        <tr>
                                            <td>Haley Kennedy</td>
                                            <td>Senior Marketing Designer</td>
                                            <td>London</td>
                                            <td>43</td>
                                            <td>2012/12/18</td>
											<td>2011/04/25</td>
											
                                         
                                            <td><a href="#" class="btn btn-primary">Editar</a></td>
                                            <td><a href="#" class="btn btn-danger">Borrar</a></td>
                                        </tr>
                                        <tr>
                                            <td>Tatyana Fitzpatrick</td>
                                            <td>Regional Director</td>
                                            <td>London</td>
                                            <td>19</td>
                                            <td>2010/03/17</td>
											<td>2011/04/25</td>
										
                                         
											
                                            <td><a href="#" class="btn btn-primary">Editar</a></td>
                                            <td><a href="#" class="btn btn-danger">Borrar</a></td>  
                                        </tr>
                                        <tr>
                                            <td>Michael Silva</td>
                                            <td>Marketing Designer</td>
                                            <td>London</td>
                                            <td>66</td>
                                            <td>2012/11/27</td>
											<td>2011/04/25</td>
											
                                         
											
                                            <td><a href="#" class="btn btn-primary">Editar</a></td>
                                            <td><a href="#" class="btn btn-danger">Borrar</a></td>
                                        </tr>
                                        <tr>
                                            <td>Paul Byrd</td>
                                            <td>Chief Financial Officer (CFO)</td>
                                            <td>New York</td>
                                            <td>64</td>
                                            <td>2010/06/09</td>
                                            <td>2011/04/25</td>
											
		
											
                                            <td><a href="#" class="btn btn-primary">Editar</a></td>
                                            <td><a href="#" class="btn btn-danger">Borrar</a></td>
                                        </tr>
                                        <tr>
                                            <td>Gloria Little</td>
                                            <td>Systems Administrator</td>
                                            <td>New York</td>
                                            <td>59</td>
                                            <td>2009/04/10</td>
                                            <td>2011/04/25</td>
											
											
                                            <td><a href="#" class="btn btn-primary">Editar</a></td>
                                            <td><a href="#" class="btn btn-danger">Borrar</a></td>
                                        </tr>
                                        <tr>
                                            <td>Bradley Greer</td>
                                            <td>Software Engineer</td>
                                            <td>London</td>
                                            <td>41</td>
                                            <td>2012/10/13</td>
                                            <td>2011/04/25</td>
											
											
                                            <td><a href="#" class="btn btn-primary">Editar</a></td>
                                            <td><a href="#" class="btn btn-danger">Borrar</a></td>
											
                                        </tr>
                                        <tr>
                                            <td>Dai Rios</td>
                                            <td>Personnel Lead</td>
                                            <td>Edinburgh</td>
                                            <td>35</td>
                                            <td>2012/09/26</td>
											<td>2011/04/25</td>
											
                                            <td><a href="#" class="btn btn-primary">Editar</a></td>
                                            <td><a href="#" class="btn btn-danger">Borrar</a></td>
                                        </tr>
                                        <tr>
                                            <td>Jenette Caldwell</td>
                                            <td>Development Lead</td>
                                            <td>New York</td>
                                            <td>30</td>
                                            <td>2011/09/03</td>
                                            <td>2011/04/25</td>
										
                                          
										
                                            <td><a href="#" class="btn btn-primary">Editar</a></td>
                                            <td><a href="#" class="btn btn-danger">Borrar</a></td>
                                        </tr>
                                        <tr>
                                            <td>Yuri Berry</td>
                                            <td>Chief Marketing Officer (CMO)</td>
                                            <td>New York</td>
                                            <td>40</td>
                                            <td>2009/06/25</td>
											<td>2011/04/25</td>
										
                                            <td><a href="#" class="btn btn-primary">Editar</a></td>
                                            <td><a href="#" class="btn btn-danger">Borrar</a></td>
                                        </tr>
                                        <tr>
                                            <td>Caesar Vance</td>
                                            <td>Pre-Sales Support</td>
                                            <td>New York</td>
                                            <td>21</td>
                                            <td>2011/12/12</td>
											<td>2011/04/25</td>
										
											
                                            <td><a href="#" class="btn btn-primary">Editar</a></td>
                                            <td><a href="#" class="btn btn-danger">Borrar</a></td>
                                        </tr>
                                        <tr>
                                            <td>Doris Wilder</td>
                                            <td>Sales Assistant</td>
                                            <td>Sidney</td>
                                            <td>23</td>
                                            <td>2010/09/20</td>
                                            <td>2011/04/25</td>
										
											
                                            <td><a href="#" class="btn btn-primary">Editar</a></td>
                                            <td><a href="#" class="btn btn-danger">Borrar</a></td>
                                        </tr>
                                        <tr>
                                            <td>Angelica Ramos</td>
                                            <td>Chief Executive Officer (CEO)</td>
                                            <td>London</td>
                                            <td>47</td>
                                            <td>2009/10/09</td>
                                            <td>2011/04/25</td>
										
                                            <td><a href="#" class="btn btn-primary">Editar</a></td>
                                            <td><a href="#" class="btn btn-danger">Borrar</a></td>
                                        </tr>
                                        <tr>
                                            <td>Gavin Joyce</td>
                                            <td>Developer</td>
                                            <td>Edinburgh</td>
                                            <td>42</td>
                                            <td>2010/12/22</td>
											<td>2011/04/25</td>
									
											
                                            <td><a href="#" class="btn btn-primary">Editar</a></td>
                                            <td><a href="#" class="btn btn-danger">Borrar</a></td>
                                        </tr>
                                        <tr>
                                            <td>Jennifer Chang</td>
                                            <td>Regional Director</td>
                                            <td>Singapore</td>
                                            <td>28</td>
                                            <td>2010/11/14</td>
                                            <td>2011/04/25</td>
										
                                            <td><a href="#" class="btn btn-primary">Editar</a></td>
                                            <td><a href="#" class="btn btn-danger">Borrar</a></td>
                                        </tr>
                                        <tr>
                                            <td>Brenden Wagner</td>
                                            <td>Software Engineer</td>
                                            <td>San Francisco</td>
                                            <td>28</td>
                                            <td>2011/06/07</td>
                                            <td>2011/04/25</td>
										
                                            <td><a href="#" class="btn btn-primary">Editar</a></td>
                                            <td><a href="#" class="btn btn-danger">Borrar</a></td>
                                        </tr>
                                        <tr>
                                            <td>Fiona Green</td>
                                            <td>Chief Operating Officer (COO)</td>
                                            <td>San Francisco</td>
                                            <td>48</td>
                                            <td>2010/03/11</td>
                                            <td>2011/04/25</td>
											
                                            <td><a href="#" class="btn btn-primary">Editar</a></td>
                                            <td><a href="#" class="btn btn-danger">Borrar</a></td>
                                        </tr>
                                        <tr>
                                            <td>Shou Itou</td>
                                            <td>Regional Marketing</td>
                                            <td>Tokyo</td>
                                            <td>20</td>
                                            <td>2011/08/14</td>
                                            <td>2011/04/25</td>
										
                                            <td><a href="#" class="btn btn-primary">Editar</a></td>
                                            <td><a href="#" class="btn btn-danger">Borrar</a></td>
                                        </tr> -->
                                       <!-- <tr>
                                            <td>Michelle House</td>
                                            <td>Integration Specialist</td>
                                            <td>Sidney</td>
                                            <td>37</td>
                                            <td>2011/06/02</td>
                                            <td>$95,400</td>
											<td>$320,800</td>
											<td>$320,800</td>
									
                                        </tr>
                                        <tr>
                                            <td>Suki Burks</td>
                                            <td>Developer</td>
                                            <td>London</td>
                                            <td>53</td>
                                            <td>2009/10/22</td>
                                            <td>$114,500</td>
											<td>$320,800</td>
											<td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Prescott Bartlett</td>
                                            <td>Technical Author</td>
                                            <td>London</td>
                                            <td>27</td>
                                            <td>2011/05/07</td>
                                            <td>$145,000</td>
											<td>$320,800</td>
											<td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Gavin Cortez</td>
                                            <td>Team Leader</td>
                                            <td>San Francisco</td>
                                            <td>22</td>
                                            <td>2008/10/26</td>
                                            <td>$235,500</td>
											<td>$320,800</td>
											<td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Martena Mccray</td>
                                            <td>Post-Sales support</td>
                                            <td>Edinburgh</td>
                                            <td>46</td>
                                            <td>2011/03/09</td>
                                            <td>$324,050</td>
											<td>$320,800</td>
											<td>$320,800</td>
											
                                        </tr>
                                        <tr>
                                            <td>Unity Butler</td>
                                            <td>Marketing Designer</td>
                                            <td>San Francisco</td>
                                            <td>47</td>
                                            <td>2009/12/09</td>
                                            <td>$85,675</td>
											<td>$320,800</td>
											<td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Howard Hatfield</td>
                                            <td>Office Manager</td>
                                            <td>San Francisco</td>
                                            <td>51</td>
                                            <td>2008/12/16</td>
                                            <td>$164,500</td>
											<td>$320,800</td>
											<td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Hope Fuentes</td>
                                            <td>Secretary</td>
                                            <td>San Francisco</td>
                                            <td>41</td>
                                            <td>2010/02/12</td>
                                            <td>$109,850</td>
											<td>$320,800</td>
											<td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Vivian Harrell</td>
                                            <td>Financial Controller</td>
                                            <td>San Francisco</td>
                                            <td>62</td>
                                            <td>2009/02/14</td>
                                            <td>$452,500</td>
											<td>$320,800</td>
											<td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Timothy Mooney</td>
                                            <td>Office Manager</td>
                                            <td>London</td>
                                            <td>37</td>
                                            <td>2008/12/11</td>
                                            <td>$136,200</td>
											<td>$320,800</td>
											<td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Jackson Bradshaw</td>
                                            <td>Director</td>
                                            <td>New York</td>
                                            <td>65</td>
                                            <td>2008/09/26</td>
                                            <td>$645,750</td>
											<td>$320,800</td>
											<td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Olivia Liang</td>
                                            <td>Support Engineer</td>
                                            <td>Singapore</td>
                                            <td>64</td>
                                            <td>2011/02/03</td>
                                            <td>$234,500</td>
											<td>$320,800</td>
											<td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Bruno Nash</td>
                                            <td>Software Engineer</td>
                                            <td>London</td>
                                            <td>38</td>
                                            <td>2011/05/03</td>
                                            <td>$163,500</td>
											<td>$320,800</td>
											<td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Sakura Yamamoto</td>
                                            <td>Support Engineer</td>
                                            <td>Tokyo</td>
                                            <td>37</td>
                                            <td>2009/08/19</td>
                                            <td>$139,575</td>
											<td>$320,800</td>
											<td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Thor Walton</td>
                                            <td>Developer</td>
                                            <td>New York</td>
                                            <td>61</td>
                                            <td>2013/08/11</td>
                                            <td>$98,540</td>
											<td>$320,800</td>
											<td>$320,800</td>
											
										
                                        </tr>
                                        <tr>
                                            <td>Finn Camacho</td>
                                            <td>Support Engineer</td>
                                            <td>San Francisco</td>
                                            <td>47</td>
                                            <td>2009/07/07</td>
                                            <td>$87,500</td>
											<td>$320,800</td>
											<td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Serge Baldwin</td>
                                            <td>Data Coordinator</td>
                                            <td>Singapore</td>
                                            <td>64</td>
                                            <td>2012/04/09</td>
                                            <td>$138,575</td>
											<td>$320,800</td>
											<td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Zenaida Frank</td>
                                            <td>Software Engineer</td>
                                            <td>New York</td>
                                            <td>63</td>
                                            <td>2010/01/04</td>
                                            <td>$125,250</td>
											<td>$320,800</td>
											<td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Zorita Serrano</td>
                                            <td>Software Engineer</td>
                                            <td>San Francisco</td>
                                            <td>56</td>
                                            <td>2012/06/01</td>
                                            <td>$115,000</td>
											<td>$320,800</td>
											<td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Jennifer Acosta</td>
                                            <td>Junior Javascript Developer</td>
                                            <td>Edinburgh</td>
                                            <td>43</td>
                                            <td>2013/02/01</td>
                                            <td>$75,650</td>
											<td>$320,800</td>
											<td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Cara Stevens</td>
                                            <td>Sales Assistant</td>
                                            <td>New York</td>
                                            <td>46</td>
                                            <td>2011/12/06</td>
                                            <td>$145,600</td>
											<td>$320,800</td>
											<td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Hermione Butler</td>
                                            <td>Regional Director</td>
                                            <td>London</td>
                                            <td>47</td>
                                            <td>2011/03/21</td>
                                            <td>$356,250</td>
											<td>$320,800</td>
											<td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Lael Greer</td>
                                            <td>Systems Administrator</td>
                                            <td>London</td>
                                            <td>21</td>
                                            <td>2009/02/27</td>
                                            <td>$103,500</td>
											<td>$320,800</td>
											<td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Jonas Alexander</td>
                                            <td>Developer</td>
                                            <td>San Francisco</td>
                                            <td>30</td>
                                            <td>2010/07/14</td>
                                            <td>$86,500</td>
											<td>$320,800</td>
											<td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Shad Decker</td>
                                            <td>Regional Director</td>
                                            <td>Edinburgh</td>
                                            <td>51</td>
                                            <td>2008/11/13</td>
                                            <td>$183,000</td>
											<td>$320,800</td>
											<td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Michael Bruce</td>
                                            <td>Javascript Developer</td>
                                            <td>Singapore</td>
                                            <td>29</td>
                                            <td>2011/06/27</td>
                                            <td>$183,000</td>
											<td>$320,800</td>
											<td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Donna Snider</td>
                                            <td>Customer Support</td>
                                            <td>New York</td>
                                            <td>27</td>
                                            <td>2011/01/25</td>
                                            <td>$112,000</td>
											<td>$320,800</td>
											<td>$320,800</td>
                                        </tr> -->
                     
                        <!--<link rel="stylesheet" href="registrosesion.css">
                        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
                        <div id="contenedor">

                            <section class="form-register">
                                <h4><a href="#"> MEDICARE</h4></a>
                                <h5>Agende su cita médica:</h5>
                                <form method="POST" action="../controlador/nuevacita.php">
                                
                                <input class="controls" type="text" name="titulo" id="titulo" placeholder="Ingrese un titulo" required="">
                                <input class="controls" type="text" name="paciente" id="paciente" placeholder="Ingrese nombre de paciente" required="">
                                <input class="controls" type="text" name="doctor" id="doctor" placeholder="Ingrese nombre de doctor" required="">
                            
                                <select class="especialidad" name="especialidad" id="especialidad">
                                    
                                       <option selected="selected">-- Seleccione una especialidad --</option> 
                                       <option>Gastroenterología</option>
                                       <option>Cardiología</option>
                                       <option>Psicología</option>
                                       <option>Neumología</option>            
                                </select> 
                                <textarea name="notas" rows="10" cols="44" placeholder="Escribe datos de la cita">Escribe datos de la cita</textarea>
                            
                                <input class="controls" type="date" name="fecha" id="fecha" placeholder="Ingrese la fecha de la cita"required="">
                                <input class="controls" type="time" name="hora" id="hora" placeholder="Ingrese la hora de la cita" required="">
                                <input class="controls" type="text" name="sintomas" id="sintomas" placeholder="Ingrese sintomas"required="">
                                <input class="controls" type="number" name="costo" id="costo" placeholder="Ingrese el costo"required="">
                            
                                <input type="checkbox" name="terminos" id="terminos" value="terminos" required="">  Estoy de acuerdo con los <a href="#"> Términos y condiciones.</a>
                                <input class="botons" type="submit" value="Agregar cita">
                                <p><a href="#">Ayuda</a></p>
                            
                            
                            </section> </form>
                            
                            
                            
                            </div> -->
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Medicare Design 2021</div>
                            <div>
                                <a href="#">Politicas de Privacidad</a>
                                &middot;
                                <a href="#">Terminos &amp; Condiciones</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="DASHBOARD/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="DASHBOARD/assets/demo/chart-area-demo.js"></script>
        <script src="DASHBOARD/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="DASHBOARD/js/datatables-simple-demo.js"></script>
    </body>
</html>



