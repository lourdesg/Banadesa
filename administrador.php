<?php
include("conexion.php");
?>
<html>
	<head>
		<title>Base de Conocimiento</title>
		<link href="Estilo/css/estilo.css" rel="stylesheet">
		
	<head>
	<body>
		<div class="container">
				<div class="row">
					<div id="banner">
								
						<div class="span12">
						<table width = 1024>
							<tr>
							<td width ="880" >
							<img class ="redondear" src="Imagenes/logoBanadesa.png" width="900px" height="150px"  border="0"> 
							</td>
							<td width="300">
							<br>
							<p><a href='index.php' title="Cerrar mi sesion como usuario validado">Cerrar Sesi&oacute;n</a></p>
							</td>
							</tr>
						</table>
					</div><!--cierra el div de la clase span12-->
					</div><!--cierra el div del id banner-->
				</div><!--cierra el div de la clase row-->
				<center>
				<hr>
				</center>
				<center>			
				<TABLE style="text-align: top; margin-left: 90px; border: 1; margin-right: 50px;" width="800"  border="0" cellpadding="0" cellspacing="0">

						<TR width= 50px>
							<TD width= "250px" height="250px"  style="float:top">
							<button   class ="redondear" style='width:250px; height:250px; background-color: #669933'>
								<link href="usuario.php" style="text-decoration:none;color:white; " >
								<img  class="redondear" src="Imagenes/usuario.png"width= "200px" height="200px">
								<font size=4>
									<a link href="usuario.php" style="text-decoration:none;color:white; " >
									
										<b> Crear Usuario</b>
									</a>
								</font>
							</button>
							</td>
							<br></br>
							<TD width= "250px" height="250px"  style="float:top">
							<button   class ="redondear" style='width:250px; height:250px; background-color: #669933'>
								<img  class="redondear" src="Imagenes/Banadesa.png"width= "200px" height="200px">
								<font size=4>
									<a link href="categoria_usuario.php" style="text-decoration:none;color:white; " >
										<b>Crear Categor&iacute;a de Usuario</b>
									</a>
								</font>
							</button>
							</td>

							<TD width= "250px" height="250px"  style="float:top">
							<button   class ="redondear" style='width:250px; height:250px; background-color: #669933 '>
								<img  class="redondear" src="Imagenes/Banadesa.png"width= "200px" height="200px">
								<font size=4>
									<a link href="estado_usuario.php" style="text-decoration:none;color:white; " >
										<b> Crear Nivel de Acceso</b>
									</a>
								</font>
							</button>
							</td>
						</TR>
						<tr>
						<TD width= "750px" height="150px"  style="float:top">
							<button   class ="redondear" style='width:250px; height:250px; background-color: #669933'>
								<img  class="redondear" src="Imagenes/Banadesa.png"width= "180px" height="180px">
								<font size=4>
									<a link href="categoria_procedimiento.php" style="text-decoration:none;color:white; " >
										<b> Categor&iacute;a Procedimientos</b>
									</a>
								</font>
							</button>
							</td>

							<TD width= "750px" height="200px"  style="float:top">
							<button   class ="redondear" style='width:250px; height:250px; background-color: #669933'>
								<img  class="redondear" src="Imagenes/Banadesa.png"width= "180px" height="180px">
								<font size=4>
									<a link href="asignacion_categoria.php" style="text-decoration:none;color:white; " >
										<b> Asignaci&oacute;n de Categor&iacute;a Usuario-Procedimiento</b>
									</a>
								</font>
							</button>
							</td>

							<TD width= "600px" height="300px"  style="float:top"">
							<button   class ="redondear" style='width:250px; height:250px; background-color: #669933'>
								<img  class="redondear" src="Imagenes/procedimiento.png"width= "200px" height="200px">
								<font size=4>
									<a link href="procedimiento.php" style="text-decoration:none;color:white; " >
										<b> Crear Procedimieto</b>
									</a>
								</font>
							</button>
							</td>
						</TR>
						<tr>
						<TD width= "750px" height="150px"  style="float:top">
							<button   class ="redondear" style='width:250px; height:250px; background-color: #669933'>
								<img  class="redondear" src="Imagenes/Banadesa.png"width= "180px" height="180px">
								<font size=4>
									<a link href="asignar_catepro.php" style="text-decoration:none;color:white; " >
										<b> Asignaci&oacute;n de Categor&iacute;a a Procedimiento</b>
									</a>
								</font>
							</button>
							</td>

							<TD width= "750px" height="200px"  style="float:top">
							<button   class ="redondear" style='width:250px; height:250px; background-color: #669933'>
								<img  class="redondear" src="Imagenes/Banadesa.png"width= "200px" height="200px">
								<font size=4>
									<a link href="buscador.php" src="Imagenes/Banadesa.png"width= "200px" height="200px" style="text-decoration:none;color:white; " >
										<b> Ver Procedimiento</b>
									</a>
								</font>
							</button>
							</td>

							<TD width= "600px" height="300px"  style="float:top"">
							<button   class ="redondear" style='width:250px; height:250px; background-color: #669933'>
								<img  class="redondear" src="Imagenes/procedimiento.png"width= "200px" height="200px">
								<font size=4>
									<a link href="modificacion.php" style="text-decoration:none;color:white; " >
										<b>Modificaci&oacute;n de Datos</b>
									</a>
								</font>
							</button>
							</td>
						</TR>
				</TABLE>
				</center>
				<center>
				
				</center>
				</div><!--cierra el div de la clase container-->
				<center>
				<table>
				<tr>
				<td align="center">
						<small>
						&copy; Banadesa <?php echo date("Y");?>
						</small>
				</td>
				</tr>
				</table>
				<small>
					Banco Nacional de Desarrollo Agricula <?php echo date("Y");?>
				</small>
			</center>
</body>
</html>
		