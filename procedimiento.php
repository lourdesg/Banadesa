<?php
include("conexion.php");
	
?>
<html>
	<head>
	<meta content="text/html; charset=utf-8" />
		<title>Base de Conocimiento Banadesa </title>
		<script src="js/jquery.js"></script>
		<script src="tiptip/jquery.tipTip.js"></script>
		<script src="tiptip/jquery.tipTip.minified.js"></script>
		<link href="tiptip/tipTip.css" rel="stylesheet">
		<script src="usuarios/buscar.js"></script>
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
		
		function mostrarDetalle()
			{
				var confirmar = document.getElementById("mostrarDetalle").checked;    			
				if (confirmar == true)
				{
					$(".listadoDetalle").show("fast");
					}else{
					$(".listadoDetalle").hide("fast");
				}
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
															<tr>
																<td style="padding: 3px;">
																	<a href="administrador.php" style="text-decoration: none; color: white;" title="Atras"><img src="Imagenes/atras1.png" style="width: 35px;"></a>
																</td>
																<td style="border-right: 1px solid rgb(221, 221, 221); padding: 3px;">
																	<a href="administrador.php" style="text-decoration: none; color: rgb(68, 68, 68); font-size: 15px;" title="Atras">Atr&aacute;s</a>
																</td>
																<td style="padding: 3px;">
																	<a href="?" style="text-decoration: none; color: white;" title="Limpiar"><img src="Imagenes/actualizar1.png" style="width: 35px;"></a>
																</td>
																<td style="border-right: 1px solid rgb(221, 221, 221); padding: 3px;">
																	<a href="?" style="text-decoration: none; color: rgb(68, 68, 68); font-size: 15px;" title="Actualizar">Actualizar</a>
																</td>
																<td style="padding: 3px;">
																	<a href="?" style="text-decoration: none; color: white;" title="Limpiar"><img src="Imagenes/agregar.png" style="width: 35px;"></a>
																</td>
																<td style="border-right: 1px solid rgb(221, 221, 221); padding: 3px; font-size: 15px;">
																	<a style="cursor: pointer; color: rgb(68, 68, 68); " onclick="muestra_oculta('contenido_a_mostrar')" title="Mostrar/Ocultar Los Estados del Usuario">Mostrar/Ocultar Los estados del Usuario</a>
																</td>
															</tr>
														</tbody>
													</table>
												</td>
												<td align="right">
													<table style="border-collapse: collapse;" border="0">
														<tbody>
															<tr>
																<td style="padding: 3px;">
																	<h2>Crear Procedimiento</h2>
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
			<form method="POST" action="" name="procedimiento" >
				<div style="background:#fffde5;padding:7px;border:#dddddd solid 1px;width:1000px">
				<center>
					
					<h1>Formulario de Ingreso</h1>
						<table style="width:800px;background:#ffffff;padding:7px;border:#dddddd solid 1px;">
						<tr>
							<td align="center" valign="top">
								<div class="formulario">
									<table class="formulario">
										<tr>
											<td>
												Nombre del Procedimiento:
											</td>
											<td>
												<input type="text" name="nombre_pro" id="nombre_pro" size="80" maxlength="100"/><b style="color:red;">*</b>
											</td>
										</tr>
										<tr>
											<td>
												Descripci&oacute;n del Procedimiento:
											</td>
											<td>
												<textarea name="descripcion" id="descripcion" cols="40" style=" height: 100px;" rows="7" size= "35" style='font-size: 16px' font="Arial, Helvetica, sans-serif;"></textarea><b style="color:red;">*</b>
											</td>
										</tr>
										<tr>
											<td>
													Estado del Procedimiento: 
											</td>
											<td>
												<select name="estado" id="estado" type="text" onchange = "document.forms.formulario.submit ()" style="width:160px">
													<option>Activo</option>
													 <option>Desactivo</option>
												</select>
											<b style="color:red;">*</b>
											</td>
											
										</tr>
									</table>
								</div>
							</td>
						</tr>
					</table>
				<br>
				
				<input type="submit" id="guardar" value="Agregar Pasos" /> 
				<input type ="hidden" name="guardar"value="Agregar Pasos">
				
				</center>
				</div>
			</form>	
			
			<?php
		
			if (isset($_POST['guardar'])) {
			include("crear_procedimiento.php");
				
		
			}
			
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
					Banco Nacional de Desarrollo Agricula 
				</small>
			</center>
</body>
</html>