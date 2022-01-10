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
			<h2>Datos Deportistas &raquo; Editar datos</h2>
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
			if(isset($_POST['save'])){
				$registro		 = mysqli_real_escape_string($con,(strip_tags($_POST["registro"],ENT_QUOTES)));//Escanpando caracteres 
				$dep_nombres	 = mysqli_real_escape_string($con,(strip_tags($_POST["dep_nombres"],ENT_QUOTES)));//Escanpando caracteres 
				$dep_lugarNac	 = mysqli_real_escape_string($con,(strip_tags($_POST["dep_lugarNac"],ENT_QUOTES)));//Escanpando caracteres 
				$dep_fechaNac	 = mysqli_real_escape_string($con,(strip_tags($_POST["dep_fechaNac"],ENT_QUOTES)));//Escanpando caracteres 				
				$dep_doc		 = mysqli_real_escape_string($con,(strip_tags($_POST["dep_doc"],ENT_QUOTES)));//Escanpando caracteres 
				$dep_edad	     = mysqli_real_escape_string($con,(strip_tags($_POST["dep_edad"],ENT_QUOTES)));//Escanpando caracteres 
				$dep_sexo		 = mysqli_real_escape_string($con,(strip_tags($_POST["dep_sexo"],ENT_QUOTES)));//Escanpando caracteres 
				$dep_peso		 = mysqli_real_escape_string($con,(strip_tags($_POST["dep_peso"],ENT_QUOTES)));//Escanpando caracteres 				
				$dep_altura		 = mysqli_real_escape_string($con,(strip_tags($_POST["dep_altura"],ENT_QUOTES)));//Escanpando caracteres  
				$dep_tallaZap	 = mysqli_real_escape_string($con,(strip_tags($_POST["dep_tallaZap"],ENT_QUOTES)));//Escanpando caracteres  
				$dep_tallaCam	 = mysqli_real_escape_string($con,(strip_tags($_POST["dep_tallaCam"],ENT_QUOTES)));//Escanpando caracteres  
				$dep_dir		 = mysqli_real_escape_string($con,(strip_tags($_POST["dep_dir"],ENT_QUOTES)));//Escanpando caracteres  
				$dep_barrio		 = mysqli_real_escape_string($con,(strip_tags($_POST["dep_barrio"],ENT_QUOTES)));//Escanpando caracteres  
				$dep_tel		 = mysqli_real_escape_string($con,(strip_tags($_POST["dep_tel"],ENT_QUOTES)));//Escanpando caracteres  
				$dep_institucion = mysqli_real_escape_string($con,(strip_tags($_POST["dep_institucion"],ENT_QUOTES)));//Escanpando caracteres  
				$dep_cursoSemestre = mysqli_real_escape_string($con,(strip_tags($_POST["dep_cursoSemestre"],ENT_QUOTES)));//Escanpando caracteres  
				$acud_nombres	 = mysqli_real_escape_string($con,(strip_tags($_POST["acud_nombres"],ENT_QUOTES)));//Escanpando caracteres  
				$acud_doc		 = mysqli_real_escape_string($con,(strip_tags($_POST["acud_doc"],ENT_QUOTES)));//Escanpando caracteres  
				$acud_tel		 = mysqli_real_escape_string($con,(strip_tags($_POST["acud_tel"],ENT_QUOTES)));//Escanpando caracteres  
				

				$update = mysqli_query($con, "UPDATE Deportistas SET dep_nombres='$dep_nombres', dep_lugarNac='$dep_lugarNac', dep_fechaNac='$dep_fechaNac', dep_doc='$dep_doc', dep_edad='$dep_edad', dep_sexo='$dep_sexo', dep_peso='$dep_peso', dep_altura='$dep_altura', dep_tallaZap='$dep_tallaZap', dep_tallaCam='$dep_tallaCam', dep_dir='$dep_dir', dep_barrio='$dep_barrio', dep_tel='$dep_tel', dep_institucion='$dep_institucion', dep_cursoSemestre='$dep_cursoSemestre', acud_nombres='$acud_nombres', acud_doc='$acud_doc', acud_tel='$acud_tel' WHERE registro='$nik'") or die(mysqli_error());
				if($update){
					header("Location: edit.php?nik=".$nik."&pesan=sukses");
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo guardar los datos.</div>';
				}
			}
			
			if(isset($_GET['pesan']) == 'sukses'){
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido guardados con éxito.</div>';
			}
			?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Registro</label>
					<div class="col-sm-2">
						<input type="text" disabled name="registro" value="<?php echo $row ['registro']; ?>" class="form-control" placeholder="NIK" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">DATOS PERSONALES.</label>					
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Nombres</label>
					<div class="col-sm-3">
						<input type="text" name="dep_nombres" value="<?php echo $row ['dep_nombres']; ?>" class="form-control" placeholder="Nombres" required>
					</div>
				
					<label class="col-sm-3 control-label">Lugar de nacimiento</label>
					<div class="col-sm-3">
						<input type="text"  name="dep_lugarNac" value="<?php echo $row ['dep_lugarNac']; ?>" class="form-control" placeholder="Lugar de nacimiento" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Fecha de nacimiento</label>
					<div class="col-sm-3">
						<input type="text" name="dep_fechaNac" value="<?php echo $row ['dep_fechaNac']; ?>" class="input-group date form-control" date="" data-date-format="yyyy-mm-dd" placeholder="0000-00-00" required>
					</div>
				
					<label class="col-sm-3 control-label">Documento</label>
					<div class="col-sm-3">
						<input type="text" maxlength="3" name="dep_doc" value="<?php echo $row ['dep_doc']; ?>" class="form-control" placeholder="Documento" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Edad</label>
					<div class="col-sm-3">
						<input type="text" name="dep_edad" value="<?php echo $row ['dep_edad']; ?>" class="form-control" placeholder="Edad" required>
					</div>
				
					<label class="col-sm-3 control-label">Sexo</label>
					<div class="col-sm-3">
						<input type="text" name="dep_sexo" value="<?php echo $row ['dep_sexo']; ?>" class="form-control" placeholder="Sexo" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Peso</label>
					<div class="col-sm-3">
						<input type="text" name="dep_peso" value="<?php echo $row ['dep_peso']; ?>" class="form-control" placeholder="Peso" required>
					</div>
				
					<label class="col-sm-3 control-label">Altura</label>
					<div class="col-sm-3">
						<input type="text" name="dep_altura" value="<?php echo $row ['dep_altura']; ?>" class="form-control" placeholder="Altura" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Talla zapatos</label>
					<div class="col-sm-3">
						<input type="text" name="dep_tallaZap" value="<?php echo $row ['dep_tallaZap']; ?>" class="form-control" placeholder="Talla Zapatos" required>
					</div>
				
					<label class="col-sm-3 control-label">Talla Camisa</label>
					<div class="col-sm-3">
						<input type="text" name="dep_tallaCam" value="<?php echo $row ['dep_tallaCam']; ?>" class="form-control" placeholder="Talla Camisa" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">RESIDENCIA.</label>					
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Dirección</label>
					<div class="col-sm-3">
						<textarea name="dep_dir" class="form-control" placeholder="Dirección"><?php echo $row ['dep_dir']; ?></textarea>
					</div>
				
					<label class="col-sm-3 control-label">Barrio</label>
					<div class="col-sm-3">
						<input type="text" name="dep_barrio" value="<?php echo $row ['dep_barrio']; ?>" class="form-control" placeholder="Barrio" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Teléfono</label>
					<div class="col-sm-3">
						<input type="text" name="dep_tel" value="<?php echo $row ['dep_tel']; ?>" class="form-control" placeholder="Teléfono" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">ESTUDIOS.</label>					
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Institucion</label>
					<div class="col-sm-3">						
						<input type="text" name="dep_institucion" value="<?php echo $row ['dep_institucion']; ?>" class="form-control" placeholder="Institucion" required>
					</div>
                    
				
					<label class="col-sm-3 control-label">Curso / Semestre</label>
					<div class="col-sm-3">						
						<input type="text" name="dep_cursoSemestre" value="<?php echo $row ['dep_cursoSemestre']; ?>" class="form-control" placeholder="Curso / Semestre" required>
					</div>
                    
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">ACUDIENTE.</label>					
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Nombres</label>
					<div class="col-sm-3">						
						<input type="text" name="acud_nombres" value="<?php echo $row ['acud_nombres']; ?>" class="form-control" placeholder="Nombres" required>
					</div>
                    
					<label class="col-sm-3 control-label">Documento</label>
					<div class="col-sm-3">						
						<input type="text" name="acud_doc" value="<?php echo $row ['acud_doc']; ?>" class="form-control" placeholder="Documento" required>
					</div>
                    
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Telefono</label>
					<div class="col-sm-3">						
						<input type="text" name="acud_tel" value="<?php echo $row ['acud_tel']; ?>" class="form-control" placeholder="Telefono" required>
					</div>
                    
				</div>

				
			
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
	$('.date').datepicker({
		format: 'dd-mm-yyyy',
	})
	</script>
</body>
</html>