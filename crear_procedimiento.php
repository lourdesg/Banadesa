<?php
include("conexion.php");


 if(isset($_POST['guardar'])){ 
 $nombredetuvariable = $_POST['nombre_pro']; 
 } 
  if(isset($_POST['agregar'])){ 
 $nombredetuvariable = $_POST['nombre_pro']; 
 echo $nombredetuvariable; 
 } 
if(isset($_POST['nombre_pro']) && !empty($_POST['nombre_pro']) &&
	isset($_POST['descripcion']) && !empty($_POST['descripcion']) &&
	isset($_POST['estado']) && !empty($_POST['estado'])) {
	
	$link = mysql_connect("localhost","root","");
	mysql_select_db("conocimiento",$link);
	$nuevo_procedimiento=mysql_query("select nombre from procedimiento where nombre='{$_POST['nombre_pro']}'"); 
		
			if(mysql_num_rows($nuevo_procedimiento)>0) 
			{ 
			echo " 
			<p class='avisos'>El Nombre del Procedimiento ya Existe</p> 
			<p class='avisos'><a href='javascript:history.go(-1)' class='clase1'>Volver atrás</a></p> 
			"; 
			}else{
	// Con esta sentencia SQL insertaremos los datos en la base de datos
	mysql_query("INSERT INTO procedimiento (id_procedimiento,nombre,descripcion,estado, fecha_creacion)
	VALUES ('','{$_POST['nombre_pro']}', '{$_POST['descripcion']}', '{$_POST['estado']}', '".date("YmdHis")."')",$link);

	// Ahora comprobaremos que todo ha ido correctamente
	$my_error = mysql_error($link);

	if(!empty($my_error)) 
	{ 


	echo "Ha habido un error al insertar los valores. $my_error"; 

	} else {

		
	echo "
	Los datos han sido introducidos satisfactoriamente";
	



	}
	}
	} else {


	echo "Error, no ha introducido todos los datos";

	}
?>

<html>



<form method="Post" action="detalle1.php">
<input type="hidden" name="resultado"id="resultado"   value="<?php echo $nombredetuvariable ?>"/>
<input type="submit" name="paso" id="paso" value="Agregar Pasos" onsubmit="this.procedimiento.action = 'detalle1.php"/>
</form>


</html>