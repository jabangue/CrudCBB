<?php
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
<!--
Project      : Datos de empleados con PHP, MySQLi y Bootstrap CRUD  (Create, read, Update, Delete) 
Author		 : Obed Alvarado
Website		 : http://www.obedalvarado.pw
Blog         : http://obedalvarado.pw/blog/
Email	 	 : info@obedalvarado.pw
-->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Datos Deportistas</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datepicker.css" rel="stylesheet">
	<link href="css/style_nav.css" rel="stylesheet">
	<style>
		.content {
			margin-top: 80px;
		}
	</style>
	
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<?php include("nav.php");?>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Datos Deportistas &raquo; Ficha</h2>
			<hr />
			
			<?php
			// escaping, additionally removing everything that could be (html/javascript-) code
			$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
			
			$sql = mysqli_query($con, "SELECT * FROM Deportistas WHERE registro='$nik'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			
			if(isset($_GET['aksi']) == 'delete'){
				$delete = mysqli_query($con, "DELETE FROM Deportistas WHERE registro='$nik'");
				if($delete){
					echo '<div class="alert alert-danger alert-dismissable">><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil dihapus.</div>';
				}else{
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal dihapus.</div>';
				}
			}
			?>
			
			<table border=2 class="table table-striped table-condensed">
				<tr>
					<th colspan="2" >Registro</th>
					<td colspan="2"><?php echo $row['registro']; ?></td>
				</tr>
				<tr>				 
				 <th>DATOS PERSONALES.</th>					 
				</tr>
				<tr>
					<th>Nombre del empleado</th>
					<td><?php echo $row['dep_nombres']; ?></td>
					<th>Lugar y Fecha de Nacimiento</th>
					<td><?php echo $row['dep_lugarNac'].', '.$row['dep_fechaNac']; ?></td>
				</tr>				
				<tr>
					<th>Documento</th>
					<td><?php echo $row['dep_dir']; ?></td>
					<th>Edad</th>
					<td><?php echo $row['dep_edad'].' Años'; ?></td>
				</tr>				
				<tr>
					<th>Sexo</th>
					<td><?php echo $row['dep_sexo']; ?></td>
					<th>Peso</th>
					<td><?php echo $row['dep_peso'].' Kg'; ?></td>
				</tr>
				
				<tr>
					<th>Altura</th>
					<td><?php echo $row['dep_altura'].' Cm'; ?></td>
					<th>Talla Zapatos</th>
					<td><?php echo $row['dep_tallaZap']; ?></td>
				</tr>				
				<tr>
					<th>Talla Camisa</th>
					<td><?php echo $row['dep_altura']; ?></td>
				</tr>
				<tr>
				 <th>RESIDENCIA.</th>	
				</tr>
				<tr>
					<th>Direccion</th>
					<td><?php echo $row['dep_dir']; ?></td>
					<th>Barrio</th>
					<td><?php echo $row['dep_barrio']; ?></td>
				</tr>
				<tr>
					<th>Telefono</th>
					<td><?php echo $row['dep_tel']; ?></td>
				</tr>
				<tr>
				 <th>ESTUDIOS.</th>	
				</tr>
				<tr>
					<th>Institucion</th>
					<td><?php echo $row['dep_institucion']; ?></td>
					<th>Curso - Semestre</th>
					<td><?php echo $row['dep_cursoSemestre']; ?></td>
				</tr>
				<tr>
				 <th>ACUDIENTE.</th>	
				</tr>
				<tr>
					<th>Nombres</th>
					<td><?php echo $row['acud_nombres']; ?></td>
				
					<th>Documento</th>
					<td><?php echo $row['acud_doc']; ?></td>
				</tr>
				<tr>
					<th>Telefono</th>
					<td><?php echo $row['acud_tel']; ?></td>
				</tr>


			</table>
			
			<!--a href="index.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Volver</a><br><br>
			<a href="edit.php?nik=<?php echo $row['nik']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar datos</a>
			<a href="profile.php?aksi=delete&nik=<?php echo $row['nik']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Esta seguro de borrar los datos <?php echo $row['dep_nombres']; ?>')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</a-->
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
