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
							<td width ="1000" >
							<img class ="redondear" src="Imagenes/logoBanadesa.png"  style="margin-left:90px margin-rigth: 50px"   width="950px" height="150px"  border="0"> 
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
									<a link href="m_usuario.php" style="text-decoration:none;color:white; " >
									
										<b> Modificar Usuario</b>
									</a>
								</font>
							</button>
							</td>
							<br></br>
							<TD width= "250px" height="250px"  style="float:top">
							<button   class ="redondear" style='width:250px; height:250px; background-color: #669933'>
								<img  class="redondear" src="Imagenes/Banadesa.png"width= "200px" height="200px">
								<font size=4>
									<a link href="m_procedimiento.php" style="text-decoration:none;color:white; " >
										<b>Modificar Procedimiento</b>
									</a>
								</font>
							</button>
							</td>
						</TR>
				</table>
				</center>
		</div><!--cierre del div class de container-->
	</body>
</html>