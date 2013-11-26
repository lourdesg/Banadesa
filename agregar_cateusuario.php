<?php
// Primero comprobamos que ningún campo esté vacío y que todos los campos existan.
if(isset($_POST['descripcion']) && !empty($_POST['descripcion'])) {


// Si entramos es que todo se ha realizado correctamente

$link = mysql_connect("localhost","root","");
mysql_select_db("conocimiento",$link);
$nuevo_categoria=mysql_query("select descripcion from categoria_usuario where descripcion='{$_POST['descripcion']}'"); 

		if(mysql_num_rows($nuevo_categoria)>0) 
		{ 
		echo " 
		<p class='avisos'>El Nombre de la Categoria de Usuario ya Existe</p> 
		<p class='avisos'><a href='javascript:history.go(-1)' class='clase1'>Volver atrás</a></p> 
		"; 
		}else{
// Con esta sentencia SQL insertaremos los datos en la base de datos
mysql_query("INSERT INTO categoria_usuario (descripcion)
VALUES ('{$_POST['descripcion']}')",$link);

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