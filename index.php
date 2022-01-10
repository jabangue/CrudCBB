<?php
 include("conexion.php");
?>

<html>
 <head>
  <title>Ficha BSKTeros.</title>	

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
 
 <body class="container">

  <nav class="navbar navbar-default navbar-fixed-top">
   <?php include('nav.php');?>
  </nav>

  <div class="containe">
		<div class="content">
			<h2>Datos encontrados.</h2>
			<hr />
			
			<div class="table-responsive">

			<table border=2 class="table table-striped table-hover">
				<tr>                    
					<th>Registro</th>
					<th>Nombre completo</th>                    
					<th>Documento</th>
					<th>Edad</th>
					<th>Sexo</th>					
                    <th>Acciones</th>
				</tr>
				<?php
				if($filter){
					$sql = mysqli_query($con, "SELECT * FROM Deportistas ORDER BY registro ASC");
				}else{
					$sql = mysqli_query($con, "SELECT * FROM Deportistas ORDER BY registro ASC");
				}
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">No hay datos.</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>							
							<td>'.$row['registro'].'</td>
							<td>'.$row['dep_nombres'].'</a></td>                            
							<td>'.$row['dep_doc'].'</td>
                            <td>'.$row['dep_edad'].'</td>
                            <td>'.$row['dep_sexo'].'</td>							
							<td>
<a href="profile.php?nik='.$row['registro'].'" title="Ver" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>			
<a href="edit.php?nik='.$row['registro'].'" title="Editar" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
<a href="profile.php?aksi=delete&nik='.$row['registro'].'" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos '.$row['dep_nombres'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							</td>
						</tr>
						';
						$no++;
					}
				}
				?>
			</table>
			</div>
		</div>
	</div><center>
	<p>&copy; Powered by : WebMaaka <?php echo date("Y");?></p>
		</center>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

 </body>

</html>
