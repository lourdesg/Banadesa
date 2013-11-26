<?php
	/*Valida el origen de una pagina de consulta*/
	function verifySecurity($debug = false)
	{
		$s=substr(md5(date("Ymd")),0,6);
		$ss=md5($s);
		$debeSerArray = array(
			"http://localhost/base/index.php",
			"http://localhost/base/administrador.php",
			"http://localhost/base/usuario.php",
			"http://localhost/base/categoria_usuario.php"
			//"http://localhost/base/estado_usuario.php"
		);
		$es = $_SERVER['HTTP_REFERER'];
		list($es,) = explode("?",$es);
		
		/*Verificacion 1*/
		if ((trim($_GET["s"])==$s && trim($_GET["ss"])==$ss) or (1==1))
		{
			foreach($debeSerArray as $debeSer)
			{
				if ($debug == true)
				{
					echo "<small>Comparando <b>$es</b> con <b>$debeSer</b></small><br>";
				}
				
				/*Verificacion 2*/
				if (strstr($debeSer,$es)){
					return true;
				}
			}
			return false;
		}return false;
	}
	
	/*Se encarga de evitar inyección SQL*/
	function antiInjection($val)
	{  
		$val = trim($val);
		$val = str_ireplace("truncate","",$val);
		$val = str_ireplace("select","",$val);
		$val = str_ireplace("delete","",$val);
		$val = str_ireplace("insert","",$val);
		$val = str_ireplace("drop","",$val);
		$val = str_ireplace("'","",$val);
		$val = str_ireplace(";","",$val);	
		$val = str_ireplace("%","",$val);	
		$val = str_ireplace("\\","",$val);	
		
		return $val;
	}
	/*Marca en negrita una palabra encontrada*/
	function markAsFind($val,$valor)
	{
		return str_ireplace($valor,"<b>$valor</b>",$val);
	}
	
	/*Crear usuario*/
function crearusuario($nombre,$apellido,$correo,$password)
{
	global $link;
	global $u;

	$nombre = antiInjection($nombre);
	$correo = antiInjection($correo);

	$query = "INSERT INTO usuario (nombre, apellido, correo, password, id_estado, id_categoria) VALUES ('$nombre', '$apellido', '$correo','$password', '$u', '".date("YmdHis")."',0);";
	$result = mysql_query($query,$link);

	if ($result!==false)
	{
		$id = mysql_insert_id($link);
		return $id;
	}else{
		echo "Error en el insert al crear usuario ".mysql_error($link);
		return false;
	}
}
/*Crear un departamento*/
function crearEstado($descripcion,$permiso)
{
	$descripcion = antiInjection($descripcion);
	$permiso = antiInjection($permiso);
	//verifica que el departamento que se creara no exista en la base de datos
	$queryVerifica = sprintf("SELECT * FROM estado WHERE permiso = '%s' OR descripcion = '%s'", $permiso, $descripcion);
	$verifica = mysql_query($queryVerifica, $link) or die(mysql_error());
	$totVerifica = mysql_num_rows($verifica);

	if($totVerifica > 0)
	{
		echo "<div style= color:black;margin-left:270px;><p style= color:red;>Este <b>Estado</b> ya existe!</p> 
		<br>Verifique en la etiqueta <b>Mostrar/ocultar Estado del Usuario</b> los estados existentes.	<br>
		<br><a href='?'>Agregar Otro Estado del Usuario.</a>.</div>";
	}else{

	$query = "INSERT INTO  estado (descripcion, permiso) VALUES ('$descripcion', '$permiso');";
	$result = mysql_query($query,$link);

	if ($result!==false)
	{
		$id = mysql_insert_id($link);
		return $id;
		}else{
		echo "Error en el insert ".mysql_error($link);
		return false;
	}
	}
}

function crearCategoria($id_cateuser,$descripcion)
{
	global $link;
	global $u;

	$descripcion = antiInjection($id_cateuser);
	$permiso = antiInjection($descripcion);
	//verifica que el departamento que se creara no exista en la base de datos
	$queryVerifica =  "SELECT id_estado, descripcion, permiso FROM estado";
	$verifica = mysql_query($queryVerifica, $link) or die(mysql_error());
	$totVerifica = mysql_num_rows($verifica);

	if($totVerifica > 0)
	{
		echo "<div style= color:black;margin-left:270px;><p style= color:red;>Este <b>Estado</b> ya existe!</p> 
		<br>Verifique en la etiqueta <b>Mostrar/ocultar Estado del Usuario</b> los estados existentes.	<br>
		<br><a href='?'>Agregar Otro Estado del Usuario.</a>.</div>";
	}else{

	$query = "INSERT INTO  categoria_usuario (id_cateuser, descripcion) VALUES ('$id_cateuser', '$descripcion');";
	$result = mysql_query($query,$link);

	if ($result!==false)
	{
		$id = mysql_insert_id($link);
		return $id;
		}else{
		echo "Error en el insert ".mysql_error($link);
		return false;
	}
	}
}
//////////////////////////////////////////////////////////////////////////


?>