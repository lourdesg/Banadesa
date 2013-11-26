<?php
// Primero comprobamos que ningún campo esté vacío y que todos los campos existan.
if(isset($_POST['nombre_cate']) && !empty($_POST['nombre_cate']) &&
 isset($_POST['referencia']) && !empty($_POST['referencia'])) {


// Si entramos es que todo se ha realizado correctamente

$link = mysql_connect("localhost","root","");
mysql_select_db("conocimiento",$link);
$nuevo_categoria=mysql_query("select nombre_cate from categoria_procedimiento where nombre_cate='{$_POST['nombre_cate']}'"); 

		if(mysql_num_rows($nuevo_categoria)>0) 
		{ 
		echo " 
		<p class='avisos'>El Nombre de la Categoria de Procedimiento ya Existe</p> 
		<p class='avisos'><a href='javascript:history.go(-1)' class='clase1'>Volver atrás</a></p> 
		"; 
		}else{
// Con esta sentencia SQL insertaremos los datos en la base de datos
mysql_query("INSERT INTO categoria_procedimiento (nombre_cate,referencia)
VALUES ('{$_POST['nombre_cate']}','{$_POST['referencia']}')",$link);

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