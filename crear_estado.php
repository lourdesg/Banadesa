<?php
// Primero comprobamos que ningún campo esté vacío y que todos los campos existan.
if(isset($_POST['descripcion']) && !empty($_POST['descripcion']) &&
 isset($_POST['permiso']) && !empty($_POST['permiso'])) {


// Si entramos es que todo se ha realizado correctamente

$link = mysql_connect("localhost","root","");
mysql_select_db("conocimiento",$link);
$nuevo_procedimiento=mysql_query("select descripcion from estado where descripcion='{$_POST['descripcion']}'"); 

		if(mysql_num_rows($nuevo_procedimiento)>0) 
		{ 
		echo " 
		<p class='avisos'>El Nombre del Estado de Usuario ya Existe</p> 
		<p class='avisos'><a href='javascript:history.go(-1)' class='clase1'>Volver atrás</a></p> 
		"; 
		}else{
// Con esta sentencia SQL insertaremos los datos en la base de datos
mysql_query("INSERT INTO estado (descripcion,permiso)
VALUES ('{$_POST['descripcion']}','{$_POST['permiso']}')",$link);

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