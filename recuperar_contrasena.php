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
							</tr>
						</table>
					</div><!--cierra el div de la clase span12-->
					</div><!--cierra el div del id banner-->
				</div><!--cierra el div de la clase row-->
			<form method="POST" action="">
				<div style="background:#fffde5;padding:7px;border:#dddddd solid 1px;">
				<center>
					<h1>Recuperaci&oacute;n de Contrase&ntilde;a</h1>
						<table style="width:800px;background:#ffffff;padding:7px;border:#dddddd solid 1px;">
						<tr>
							<td align="center" valign="top">
								<div class="formulario" bgcolor="white">
									<table class="formulario"bgcolor="White">
									<?php
				//Si llega el parametro correo y no viene vacio
				if( isset( $_POST['correo'] ) && $_POST['correo'] != '' )
				{
					//Conectar la BD
					include("conexion.php");  

				 
					//Recuperar la direccion de email que llega
					$elcorreo   = $_POST['correo'];
					 
					//Verificar si existe el correo en la BD
					$sql = "SELECT  id_usuario,nice,nombre,apellido
							FROM usuarios
							WHERE correo = '".$elcorreo."'";         
					$rs_sql = mysql_query($sql);
				 
					//Si no existe el correo... 
					if ( !( $fila   = mysql_fetch_object($rs_sql) )  )
					{
					//Mostrar msg de error al usuario (en esta misma pagina)
				?>
					<input type="hidden" id="error" value="1">            
					<script type="text/javascript"> 
					location.href="recuperar_contrasena.php?error="+document.getElementById('error').value;
					</script>
				<?php
					}
					 
					//En caso de que si exista un email como el k llega, leer de la BD los datos del usuario
					$idusr  = $fila->id_usuario;     //Servira para actualizar el pw
					$nombre = $fila->nombre." ".$fila->apellido;
					$nick   = $fila->nice;
					 
					// Generacion de un nuevo Password
					$num_caracteres = "10"; // asignamos el número de caracteres que va a tener la nueva contraseña 
                $nueva_clave = substr((rand()),0,$num_caracteres); // generamos una nueva contraseña de forma aleatoria 
                 $usuario_clave = $nueva_clave; // la nueva contraseña que se enviará por correo al usuario 
                $usuario_clave2 = md5($usuario_clave); // encriptamos la nueva contraseña para guardarla en la BD        
					 
					// Le  Envio  por correo electronico  su nuevo password 
					 $seEnvio;          //Para determinar si se envio o no el correo
					 $destinatario = $elcorreo;             //A quien se envia
					 $nomAdmin          = 'Banco Nacional de Desarrollo Agricula';       //Quien envia
					 $mailAdmin         = 'lougar3011@gmail.com';   //Mail de quien envia
					 $urlAccessLogin = 'http://localhost/base/mirepositorio/index.php/'; //Url de la pantalla de login
				 
					 $elmensaje = "";     
					 $asunto = "Nueva contraseña para ".$nick;
				 
					 $cuerpomsg ='
						<h3>.::Recuperar Password::.</h3>
						<p>A peticion de usted; se le ha asignado un nuevo password, utilice los siguientes datos para acceder al sistema</p>
						  <table border="0" >
							<tr>
							  <td colspan="2" align="center" ><br> Nuevos datos de acceso para <a href="'.$urlAccessLogin.'">'.$urlAccessLogin.'</a><br></td>
							</tr>
							<tr>
							  <td> Nombre </td>
							  <td> '.$nombre.' </td>
							</tr>
							<tr>
							  <td> Username </td>
							  <td> '.$nick.' </td>
							</tr>
							<tr>
							  <td> Password </td>
							  <td> '.$usuario_clave2.' </td>
							</tr>
						  </table> ';
						   
					date_default_timezone_set('America/mexico_city');
						   
					//Establecer cabeceras para la funcion mail()
					//version MIME
					$cabeceras = "MIME-Version: 1.0\r\n";
					//Tipo de info
					$cabeceras .= "Content-type: text/html; charset=iso-8859-1\r\n";
					//direccion del remitente
					$cabeceras .= "From: ".$nomAdmin." <".$mailAdmin.">";
					$resEnvio = 0;
					//Si se envio el email
					if(mail($destinatario,$asunto,$cuerpomsg,$cabeceras))
					{
						//Actualizar el pwd en la BD
						$sql_updt = "UPDATE usuarios SET password = '".( $usuario_clave )."' 
						WHERE (id_usuario = ".$idusr.")
						AND (correo = '".$elcorreo."')";
						$res_updt = mysql_query($sql_updt);
						$resEnvio = 1;
					}
				 
					//Cerrrar conexion a la BD
						 
					// Mostrar resultado de envio (en esta misma pagina)
					?>
						<input type="hidden" id="enviado" value="<?php echo $resEnvio ?>">
						<input type="hidden" id="elcorreo" value="<?php echo $elcorreo ?>">
						<script type="text/javascript">
							location.href="recuperar_contrasena.php?enviado="+document.getElementById('enviado').value+"&elcorreo="+document.getElementById('elcorreo').value;
						</script>
					<?php    
				}
				else
				{
				?>
				 
				<tr>
					<td colspan="2">Escriba su correo electronico con el que se ha registrado, 
						se le enviara un nuevo password a su correo electronico:<br /><br /> 
					</td>
				</tr>
				 
				<tr>
					<td>Correo electronico:</td>
					<td>
						<input type="text" name="correo" id="correo"  maxlength="50" />
					</td>
				</tr>
				<tr>
					<td>Confirme Correo electronico:</td>
					<td>
						<input type="text" name="correo2" id="correo2" maxlength="50" />
					</td>
				</tr>
				 
				<?php
					//Si llega un codigo de error
					if( isset($_GET['error']) && $_GET['error']==1 )
					{
						echo "<tr><td colspan='2'><br><font color='red'>El correo electronico no pertenece a ningun usuario registrado.</font><br></td></tr>";
					}
					else if( isset($_GET['enviado']) && isset($_GET['elcorreo'])  )
					{
						//Si se envio correctamente el nuevo password
						if( $_GET['enviado']==1 ) 
							echo "<tr><td colspan='2'><br><font color='green'>Su nueva contrase&ntilde;a ha sido enviada a <strong>".$_GET['elcorreo']."</strong>.</font><br></td></tr>";
						else if( $_GET['enviado']==0 ) 
							echo "<tr><td colspan='2'><br><font color='red'>Por el momento la nueva contrase&ntilde;a no pudo ser enviada a <strong>".$_GET['elcorreo']."</strong>.<br>
							Intente de nuevo mas tarde.</font></td></tr>";
					}
				?>
				 
				<tr>
					<td align="center" colspan="2">
						<br /><br /> 
						<input type="button" onClick="javascript: location.href='index.php'" name="cancelar" value="Cancelar" >
						&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="submit" name="enviar" value="Enviar" >
					</td>
				</tr>
				 
				<?php
				}
				?>
				 
				</table>
				</form>
									</table>
								</div><!--cierre de class de formulario-->
							</td>
						</tr>
						</table>
				</center>
				</div><!--cierre del div style-->
			</form>
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