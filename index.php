<?php
	include("conexion.php");
	include("funciones.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

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
		
		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="js/jquery.validate.js"></script>
		<script>
			$(function(){
				$('#miForm1').validate();
			}
		</script>
		<title>Base de Conocimiento</title>
		<link href="Estilo/css/estilo.css" rel="stylesheet">
		
	<style type = "text/css">
		a {
			  color: blue;
			  text-decoration: none;
		}
		a:hover {
			   color: green;
		 
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
				
				<hr class= "linea" style=" margin-left:45px">
		<table width="920px"   cellpadding="0" >
			<tr>
				<td  width= "500px" height ="400px">
					<img  class="redondear" src="Imagenes/Banadesa.png"width= "400px" height="400px">
				</td>
					<td  width= "600px" height="400px" valign="top" >
						<h1 style="text-align: center;">
							<font face="verdana,Comic Sans MS,arial" size=6>
								<span style="color: black;">
									Bienvenido a la Base de  
								</span>
								<br>
								<br>
								<span>Conocimiento de</span>
								<br>
								<br>
								<span>Banadesa</span>
							</font>	
						</h1>
						
			<form method="POST" action=""id="frmlogin" name="frmlogin" >
							<div class="formulario">
									<table class="formulario"width= "340px" height="200px" valign="top">
										<tr>
										<font size =4>
											<td style='font-size: 16px'>
											<b>
												Nombre de Usuario:
											</b>
											</td>
										</tr>
										<tr>
											<td>
												<input type="text" size="25" maxlength="25" placeholder="Nombre del Usuario " valign="left"  name="usuario" style='font-size: 16px'>
											</td>
										</font>
										</tr>
										
										<tr>
										<font size =4>
											<td style='font-size: 16px'>
											<b>
												Contrase&ntilde;a:
											</b>
											</td>
										</tr>
										<tr>
											<td>
												<input type="password" size="25" maxlength="25" valign="left"  placeholder="Contraseña"  name="password" style='font-size: 16px'>
											</td>
										</font>
										</tr>
										
										<tr>
										<td class= "label" href="#" onclick=”#” style='color: blue; text-decitation: none; color: green' >
											<a href="recuperar_contrasena.php"> <b> <u>&#191;Ha olvidado su contrase&ntildea?</u> </b></a>
										</td>
										</tr>
									
									</table>
								</div>
							
								
						<font size=6>
						<input type="submit" name="iniciar" value="Iniciar Sesi&oacute;n" style='size=6;color:white;width:250px;font-size: 16px; height:50px; background-color: #669933' /> 
						</font>
			</form>	
			</td>
			</tr>
			</table>
			
			<?php
			if ($_SERVER['REQUEST_METHOD']=='POST') { // ¿Nos mandan datos por el formulario?
					include('php_lib/config.ini.php'); //incluimos configuración
					include('php_lib/login.class.php'); //incluimos las funciones
					$Login=new Login();
					//si hace falta cambiamos las propiedades tabla, campo_usuario, campo_contraseña, metodo_encriptacion

					//verificamos el usuario y contraseña mandados
					if ($Login->login($_POST['usuario'],$_POST['password'])) {
					require("pagina-acceso-restringido.php");	
				
				} else {
				
					echo 'Contraseña o Nombre de usuario Incorrecto.';
					
				}	
			} //fin if post
			if (isset($_POST['iniciar'])) {
				require("login.php");
			}
			
			/////////////////////////////////////////////////////////////////////////////////
			//mostrar errore de validacion 
				if(isset($_POST['msg_error']))
				{
					switch($_POST['msg_error'])
					{
						case 1:
						?>
						<script type="text/javascript">
						jAlert("El usuario o Password son Incorrectos.", "Seguridad");
						$("#password").focus();
						</script>
						<?php
							break;
							case 2:
						?>
						<script type="text/javascript">
							jsAlert("La Seccion a la que intenta entrar esta restringida.\n solo permitidos para usuarios registrados.", "Seguridad");
							</script>
							<?php
								break;
					}//fin del switch 
				}
				
			?>
	</div><!--cierre de  container-->		
			
	
		<br>
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