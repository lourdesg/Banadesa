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
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.easyui.min.js"></script>
		<script src="tiptip/jquery.tipTip.js"></script>
		<script src="tiptip/jquery.tipTip.minified.js"></script>
		<link href="tiptip/tipTip.css" rel="stylesheet">
		<script src="usuarios/buscar.js"></script>
		<script language="javascript" type="text/javascript" src="jquery-1.3.2.min.js"></script>
        <script language="javascript" type="text/javascript" src="jquery.validate.1.5.2.js"></script>

        
		<link href='Estilo/css/estilo.css' rel="stylesheet">
		<title>Base de Conocimiento Banadesa </title>
		<script>
			$(function(){	
			$(".tiptip").tipTip();   
			});
		</script>
	</head>
	<body>
		<div class="container">
				<div class="row">
					<div id="banner">
						<div class="span12">
							<img class ="redondear" src="Imagenes/logoBanadesa.png" width="920px" height="150px"  border="0">
						</div><!--div de cierre de la class span12-->
					</div><!--cierre del div  id banner-->
				</div><!--cierre del div de la class row-->
			<center>
			<table style="width: 800px;" border="0"><!-- Tabla del menú-->
				<tbody>
					<tr>
						<td style="padding: 3px;"  ALIGN=right>
							<h2>Crear los Pasos del Procedimiento</h2>
						</td>
					</tr>
				</tbody>
			</table>
			<hr>
			</center>
			
			<form method="POST" id="form" enctype="multipart/form-data" >
				<div style="background:#fffde5;padding:7px;border:#dddddd solid 1px;">
				<center>
					<h1>Formulario de Ingreso</h1>
						<input type="text" name="id_procedimiento" id="id_procedimiento" value="<?php echo $id_procedimiento?>">
						<input type="text" name="resultado1" id="resultado1" value="<?php echo $nombre?>" >
						<table style="width:800px;background:#ffffff;padding:7px;border:#dddddd solid 1px;">
						<tr>
							<td align="center" valign="top">
								<div class="formulario">
								<table class="formulario">
									<font size= 4>
									<tr>
										<td style='font-size: 16px'>
											numero de Paso:
										</td>
										<td>
											<input name="num_paso" type="text" id="num_paso" size="20" class="required number" />
										</td>
									</tr>
									<tr>
										<td style='font-size: 16px'>
											Nombre del Paso:
										</td>
										<td>
											<input type="text" size="80" maxlength="100" name="nombre_paso" id="nombre_paso" class="required"/>
										</td>
									</tr>
									<tr>
										<td style='font-size: 16px'>
											Descripcion del Paso:
										</td>
										<td>
											<textarea type="text"  cols="40"size="25" maxlength="200"  style=" height: 50px;" rows="4" name="descripcion_paso" id="descripcion_paso"></textarea>
										</td>
									</tr>
									<tr>
										<td style='font-size: 16px'>
											Agregar Imagen:
										</td>
										<td>
											<input name="imagen" id="imagen" type="file" size="10" accept="image/pjg/png"  />
										</td>
										<td>
											<input type="submit" name="submit" value="Añadir"  /> 
										</td>
									</tr>
								</table>
								
							</div><!--cierre del div de la class formulario-->
							</td>
						</tr>
					</table>
					<div id="msj"></div>

			<script type="text/javascript">
						$(document).ready(function(){

						
							$("#form").submit(function(e){
							    e.preventDefault();  // Evita que envie el formulario normalmente
							    $.post("guardar_detalle.php", $(this).serializeArray(), function(data){
							      $("#msj").html(data.datos);
							      
							    }, 'json');
							  });


							$('#msj').click(function(){
								$('#msj').html('');
							});

						});

					</script>
				</center>
				</div><!--cierre del div style-->
			</form>
			<?php
			if (isset($_POST['submit'])) {
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
			
		</div><!--cierre del div de la class container-->
	</body>
</html>