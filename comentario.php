<?php
include("include/conexion.php");




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
							</tr>
						</table>
					</div><!--cierra el div de la clase span12-->
					</div><!--cierra el div del id banner-->
				</div><!--cierra el div de la clase row-->
  
  <p align="justify">Acontinuaci&oacute;n se muestra de forma detallado del Procedimiento:</p><br>
			<?php //muestra politicas
				$mostrar=isset($_Get['nombre']);
				$queryMostrar ="SELECT procedimiento.id_procedimiento, procedimiento.nombre, procedimiento.descripcion
				FROM procedimiento AS procedimiento
				INNER JOIN detalle AS detalle ON procedimiento.id_procedimiento = detalle.id_detalle
				WHERE detalle.id_detalle='$mostrar'";
				$resultMostrar = mysql_query($queryMostrar,$conexion) or die ("La consulta no se realizo correctamente"); 
				$j = 0;
				
				$queryPalabra = "select id_procedimiento, nombre from procedimiento where nombre= '$mostrar'";
				$resultadoPalabra = mysql_query($queryPalabra, $conexion);
				$obtenerPalabra = mysql_fetch_assoc($resultadoPalabra);
				
				// fin de muestra politicas
			?>
	
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