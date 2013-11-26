<?php
	$id_procedimiento = $_POST['id_procedimiento'];
	$id_catepro  = $_POST['id_catepro'];
	
	$reqlen     = strlen($id_procedimiento) * strlen($id_catepro) ;
	$nuevo_usuario=mysql_query("select id_categoria from trans_catepro where id_procedimiento='$id_procedimiento' AND id_catepro='$id_catepro'"); 
		
		if(mysql_num_rows($nuevo_usuario)>0) 
		{ 
		echo " 
		<p class='avisos'>Estas Categorias ya Fue Asignada al Procedimiento</p> 
		<p class='avisos'><a href='javascript:history.go(-1)' class='clase1'>Volver atrás</a></p> 
		"; 
		}else{
	
			if ($reqlen > 0) {
			require("conexion.php");
			
			
			mysql_query("INSERT INTO trans_catepro VALUES('','$id_catepro', '$id_procedimiento')");
			echo 'Se ha registrado exitosamente.';
			mysql_close($link);
			
		} else {
		echo 'Por favor, Llenar todos los campos requeridos.';
	}
	}
	
?>