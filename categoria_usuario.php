<?php
		include("conexion.php");
		$u = "conocimiento";
		/**/
		mysql_select_db("conocimiento", $link);
		$sqlCategoria = "SELECT id_cateuser, descripcion FROM categoria_usuario ORDER BY descripcion";  
		$queryCategoria = mysql_query($sqlCategoria, $conexion) or die(mysql_error());
		$rowCategoria = mysql_fetch_assoc($queryCategoria);
		/**/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
		</script>
	<script>
		function soloLetras(e) {
			key = e.keyCode || e.which;
			tecla = String.fromCharCode(key).toLowerCase();
			letras = " áéíóúabcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
			especiales = [];

			tecla_especial = false
			for(var i in especiales) {
				if(key == especiales[i]) {
					tecla_especial = true;
					break;
				}
			}

			if(letras.indexOf(tecla) == -1 && !tecla_especial)
				return false;
		}

		function limpia() {
			var val = document.getElementById("miInput").value;
			var tam = val.length;
			for(i = 0; i < tam; i++) {
				if(!isNaN(val[i]))
					document.getElementById("miInput").value = '';
			}
		}
		</script>
		
		<title>Base de Conocimiento</title>
		<link href="Estilo/css/estilo.css" rel="stylesheet">
		<link href="Estilo/css/estilo-responsive.css" rel=  "stylesheet">
		<style>
			div.formulario{
				padding:18px;
				background:#ffffff;
				border:#dddddd solid 1px;
			}
			table.formulario, table.buscar{
				border-collapse:collapse;
			}
			table.formulario td, table.buscar td{
				border-bottom:#dddddd solid 1px;padding:5px;
			}
			.link{
				cursor:pointer;
			}
			.notificacion{
				width:350px;
				padding-left:60px;
			}
		</style>
		
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div id="banner">
					<div class="span12">
						<img class ="redondear" src="Imagenes/logoBanadesa.png" width="920px" height="150px"  border="0">
					</div><!--cierra el div de la clase span12-->
				</div><!--cierra el div del id banner-->
			</div><!--cierra el div de la clase row-->	
				<br>
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
																															
															</tr>
														</tbody>
													</table>
												</td>
												<td align="right">
													<table style="border-collapse: collapse;" border="0">
														<tbody>
															<tr>
																<td style="padding: 3px;">
																	<h2>Crear Categor&iacute;a del Usuario</h2>
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
			
				<form method="POST" action="">
				<div style="background:#fffde5;padding:7px;border:#dddddd solid 1px;">
				<center>
					<h1>Formulario de Ingreso</h1>
						<table style="width:800px;">
						<tr>
							<td align="center" valign="top">
								<div class="formulario">
									<table class="formulario">
										<tr>
											<td>
												Nombre de la Categor&iacute;a:
											</td>
											<td>
												<input type="name" name="descripcion" placeholder="Nombre de la Categoría Usuario" onkeypress="return soloLetras(event)"  id="descripcion" maxlength="30" size= "35" style='font-size: 16px'/><b style="color:red;">*</b>
											</td>
										</tr>
									</table>
								</div>
							</td>
						</tr>
					</table>
					<input type="submit" name="submit" value="Guardar" /> 
				</center>
				</div>
			</form>	
			<?php
			if (isset($_POST['submit'])) {
				require("agregar_cateusuario.php");
			}
			?>
		</div><!--cierra el div de la clase container-->
		<center>
		<br></br>
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