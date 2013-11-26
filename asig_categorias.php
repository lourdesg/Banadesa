<?php
	$id_cateuser = $_POST['id_cateuser'];
	$id_catepro  = $_POST['id_catepro'];
	
	$reqlen     = strlen($id_cateuser) * strlen($id_catepro) ;
	$nuevo_usuario=mysql_query("select id_categoria from trans_categoria where id_cateuser='$id_cateuser' AND id_catepro='$id_catepro'"); 
		
		if(mysql_num_rows($nuevo_usuario)>0) 
		{ 
		echo " 
		<p class='avisos'>Estas Categorias ya estan Relacionada</p> 
		<p class='avisos'><a href='javascript:history.go(-1)' class='clase1'>Volver atrás</a></p> 
		"; 
		}else{
	
			if ($reqlen > 0) {
			require("conexion.php");
			
			
			mysql_query("INSERT INTO trans_categoria VALUES('','$id_catepro', '$id_cateuser')");
			echo 'Se ha registrado exitosamente.';
			mysql_close($link);
			
		} else {
		echo 'Por favor, Llenar todos los campos requeridos.';
	}
	}
	
?>