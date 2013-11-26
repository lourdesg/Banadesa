<?php
include("conexion.php");

 if(isset($_POST['paso'])){ 
 $nombre = $_POST['resultado']; 
 $link = mysql_connect("localhost","root","");
	mysql_select_db("conocimiento",$link);
	$consulta=mysql_query("select id_procedimiento, nombre from procedimiento where nombre='$nombre'"); 
	
	while ($row=mysql_fetch_array($consulta)){


$id_procedimiento =$row['id_procedimiento'];
$variable=$row['nombre'];
}
 } 
?>

<html>
	<head>
		<title>Base de Conocimiento Banadesa </title>
		<script src="js/jquery.js"></script>
		<script src="tiptip/jquery.tipTip.js"></script>
		<script src="tiptip/jquery.tipTip.minified.js"></script>
		<link href="tiptip/tipTip.css" rel="stylesheet">
		<script src="usuarios/buscar.js"></script>
		<script language="javascript" type="text/javascript" src="jquery-1.3.2.min.js"></script>
        <script language="javascript" type="text/javascript" src="jquery.validate.1.5.2.js"></script>
        <script language="javascript" type="text/javascript" src="script.js"></script>
        <link href="estilo.css" rel="stylesheet" type="text/css" />
  
    
		<script>
			$(function(){	
			$(".tiptip").tipTip();
			});
		</script>
		<script language="JavaScript">
			/*funcion para mostrar y ocultar*/
			function muestra_oculta(id){
			if (document.getElementById){ //se obtiene el id
			var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
			el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
			}
			}
			window.onload = function(){/*hace que se cargue la función que div estará oculto hasta llamar a la función nuevamente*/
			muestra_oculta('contenido_a_mostrar');
		}
		</script>
		
		<title>Base de Conocimiento</title>
		<link href='Estilo/css/estilo.css' rel="stylesheet">
		
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
					</div><!--cierra el dive de la clase span12-->
					</div><!--cierra el div del id banner-->
				</div><!--cierra el div de la clase row-->
				<center>
					<table style="width: 800px;" border="0"><!-- Tabla del menú-->
						<tbody>
							<tr>
								<td>
									<table style="width: 880px;" border="0">
										<tbody>
											<tr>
												<td align="left">
													<table>
														<tbody>
															
														</tbody>
													</table>
												</td>
												<td align="right">
													<table style="border-collapse: collapse;" border="0">
														<tbody>
															<tr>
																<td style="padding: 3px;">
																	<h2>Crear los Pasos del Procedimiento</h2>
																</td>
																<td style="padding: 3px;">
																	<!--img src="Imagenes/new.png" style="width: 24px;"-->
																</td>
															</tr>
														</tbody>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</center>
				<hr>
				
				<form method="POST" action="javascript: fn_agregar();" name="detalle" id="detalle" >
				<div style="background:#fffde5;padding:7px;border:#dddddd solid 1px;width:1000px">
				<center>
					<h1>Formulario de Ingreso</h1>
					
					<input type="text" name="id_procedimiento" id="id_procedimiento" value="<?php echo $id_procedimiento?>">
					<input type="text" name="resultado1" id="resultado1" value="<?php echo $nombre?>" >
						<table style="width:800px;background:#ffffff;padding:7px;border:#dddddd solid 1px;">
								<tr>
									<td align="center" valign="top">
						<div class="formulario">
						<table class="formulario">
								<tr>
								<td>
									<label>numero de Paso:</label>
									<input type="text" size="5" maxlength="2" name="num_paso" value="1" style="enabled:true" readonly="readonly" >
								</td>
								</tr>
								<tr>
								<td>
									<label>Nombre del Paso:</label>
									<input type="text" size="80" maxlength="100" name="nombre_paso"  >
								</td>
								</tr>
									<br></br>
								<tr>
								<td>
									<label>Descripci&oacute;n:</label>
									<textarea type="text"  cols="40"size="25" maxlength="200"  style=" height: 50px;" rows="4" name="descripcion_paso"></textarea>
								</td>
								</tr>
								<tr>
								<td>
									<label>Agregar Imagen:</label>
									<input name="imagen" id="imagen"type="file" size="10" accept="image/pjg/png"  />
								
								</td>
								</tr>
								<tr>
								<td>
									 <td colspan="2"><input name="agregar" type="submit" id="agregar" value="Agregar"  /></td>
								</td>
								</tr>
					    </table>
						</div>
							</td>
						</tr>
					</table>
				
		
				
			</form>	
						<?php
			if (isset($_POST['agregar'])) {
				require("guardar_detalle.php");
				
			}
			?>
						<center>
			<table id="grilla" class="lista"style=" width:900px">
				<thead>	
					<tr>
						<th Style="width:30px">Numero de Paso:</th>
						<th>Nombre del Paso:</th>	
						<th>Descripci&oacute;n</th>
						<th>Imagen Referente al Paso</th>
					</tr>
				</thead>
				<tbody>
				
				</tbody>
				<tfoot>
                	<tr>
                    	<td colspan="5"><strong>Cantidad:</strong> <span id="span_cantidad"></span> Pasos.</td>
                    </tr>
                </tfoot>	
			</table>
			</center>
			</div>			
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
					Banco Nacional de Desarrollo Agricula 
				</small>
			</center>
</body>
</html>