<?php

require('config.php');
require('include/conexion.php');
require('include/funciones.php');
require('include/pagination.class.php');
/**/
mysql_select_db("conocimiento", $conexion);
$sqlDetalles = "SELECT id_detalle, nombre_paso, descripcion_paso FROM detalle";
$queryDetalles = mysql_query($sqlDetalles, $conexion) or die(mysql_error());
$rowDetalles = mysql_fetch_assoc($queryDetalles);
/**/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Buscador  de Base de Conocimiento Banadesa</title>
<link rel="stylesheet" href="pagination.css" media="screen">
<link rel="stylesheet" href="style.css" media="screen">
<script src="include/buscador.js" type="text/javascript" language="javascript"></script>

</head>

<body>

<div class="span12">
	<table width = 900 Style=" margin-left:-90px">
		<tr>
		<td width ="880"  >
		<img class ="redondear" src="Imagenes/logoBanadesa.png" width="900px" height="150px"  border="0"> 
		</td>
		<td width="300">
		<br>
		<p><a href='index.php' title="Cerrar mi sesion como usuario validado">Cerrar Sesi&oacute;n</a></p>
		</td>
		</tr>
	</table>

	<h3 align="center">Acontinuaci&oacute;n se muestra de forma detallada el pr&oacute;ximo "PROCEDIMIENTO":</h3>
	<hr color="green" noshade style="margin-left:-90px">
			<?php //muestra los pasos
				$mostrar = $_GET['id'];//Aqui se trae el Id del procedimiento seleccionado en la busqueda

				$queryDetalles ="SELECT  count(num_paso) as total  FROM detalle
				WHERE id_detalle ='$mostrar'";
				$resultDetalles = mysql_query($queryDetalles,$conexion) or die ("La consulta no se realizo correctamente otra vez"); 
				$Detalles = mysql_fetch_assoc($resultDetalles);
				$detall = $Detalles['total'];
				// En el query de arriba se contabilizan cuantos pasos posee cada procedimiento	

				$queryMostrar ="SELECT num_paso, nombre_paso, descripcion_paso FROM detalle AS d
				INNER JOIN procedimiento AS p ON p.id_procedimiento = d.id_procedimiento
				WHERE d.id_procedimiento ='$mostrar'";
				$resultMostrar = mysql_query($queryMostrar,$conexion) or die ("La consulta no se realizo"); 
				$j = 0;
				// En el query de arriba se muestran los pasos que posee cada procedimiento

				$queryPalabra = "select nombre, descripcion from procedimiento where id_procedimiento = '$mostrar'";
				$resultadoPalabra = mysql_query($queryPalabra, $conexion);
				$obtenerPalabra = mysql_fetch_assoc($resultadoPalabra);
				//En el query de arriba se muestran el nombre y descripcion de cada procedimiento

				echo "<p style= font-size:26px><U>Nombre de Procedimiento:</U></p>";
				echo "<p style= font-size:24px>".$obtenerPalabra['nombre']." </p>";
				echo "<p style= font-size:26px><U>Descripci&oacute;n de Procedimiento:</U></p>";
				echo "<p style= font-size:20px>".$obtenerPalabra['descripcion']." </p> <br>";
				// Los echo de arriba son para mostrar el nombre y descripcion del Procedimiento				

				echo /*creacion de la tabla*/"<table align='center' border= '4'>
				<tr align='center'>Pasos a Seguir:<td><b>Num/Pasos</td><td><b>Nombre de Paso</td><td><b>Descripci&oacute;n de Paso</td>";
				while($presenta = mysql_fetch_assoc($resultMostrar)){
					$i = 0;
					echo"<tr>";
						foreach($presenta as $resul){
							if($i = 0 and $j > 1){
								echo"<td rowspan='".$detall."'>".$resul."</td>";
									
									$j++;
								
							}
							if($i == 0){							
								echo"<td>".$resul."</td>";
							}
						}
					echo"</tr>";
				}
				echo"</table>";
				// fin de muestra politicas
			?>

</div><!--cierra el div de la clase span12-->
<div align="center">
			<small>	&copy; BANADESA <?php echo date("Y");?></small>	
		</div>
</body>
</html>

