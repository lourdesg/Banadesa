<?php
if(isset($_POST['nombre']) && !empty($_POST['nombre']) &&
	isset($_POST['apellido']) && !empty($_POST['apellido']) &&
	isset($_POST['nice']) && !empty($_POST['nice']) &&
	isset($_POST['correo']) && !empty($_POST['correo']) &&
	isset($_POST['password']) && !empty($_POST['password']) &&
	isset($_POST['estado']) && !empty($_POST['estado']) &&
	isset($_POST['categoria']) && !empty($_POST['categoria'])) {
	
	$link = mysql_connect("localhost","root","");
	mysql_select_db("conocimiento",$link);
	$nuevo_usuario=mysql_query("SELECT nice, correo FROM usuarios
            WHERE (nice = '{$_POST['nice']}') OR (correo = '{$_POST['correo']}')");
			if(mysql_num_rows($nuevo_usuario)>0) 
			{ 
			echo " 
			<p class='avisos'>El Nombre del Usuario o Correo Electronico ya Existe</p> 
			<p class='avisos'><a href='javascript:history.go(-1)' class='clase1'>Volver atrás</a></p> 
			"; 
			}else{
	// Con esta sentencia SQL insertaremos los datos en la base de datos
	mysql_query("INSERT INTO usuarios (id_usuario,nombre,apellido,nice,correo,password,id_estado,id_cateuser)
	VALUES ('','{$_POST['nombre']}', '{$_POST['apellido']}', '{$_POST['nice']}', '{$_POST['correo']}', '{$_POST['password']}', '{$_POST['estado']}', '{$_POST['categoria']}')",$link);

	// Ahora comprobaremos que todo ha ido correctamente
	$my_error = mysql_error($link);

	if(!empty($my_error)) 
	{ 


	echo "Ha habido un error al insertar los valores. $my_error"; 

	} else {


	echo "Los datos han sido introducidos satisfactoriamente";

	}
	}
	} else {


	echo "Error, no ha introducido todos los datos";

	}
					
?>