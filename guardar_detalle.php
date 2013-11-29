<?php
//Si se quiere subir una imagen
if (isset($_POST['submit'])) {
		$num_paso=$_POST['num_paso'];
		$nombre_paso=$_POST['nombre_paso'];
		$descripcion_paso=$_POST['descripcion_paso'];
		$id_procedimiento=$_POST['id_procedimiento'];
   //Recogemos el archivo enviado por el formulario
   $numero= $_POST['num_paso']; 
   $archivo = $_FILES['imagen']['name'];
   //Si el archivo contiene algo y es diferente de vacio
   if (isset($archivo) && $archivo != "") {
      //Obtenemos algunos datos necesarios sobre el archivo
      $tipo = $_FILES['imagen']['type'];
      $tamano = $_FILES['imagen']['size'];
      $temp = $_FILES['imagen']['tmp_name'];
      //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
     if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 20000000000))) {
        echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
        - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
     }
     else {
        //Si la imagen es correcta en tamaño y tipo
        //Se intenta subir al servidor
        if (move_uploaded_file($temp, 'imagenes_base/'.$archivo)) {
            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
            chmod('imagenes_base/'.$archivo, 0777);
            //Mostramos el mensaje de que se ha subido co éxito
            echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
            }
        else {
           //Si no se ha podido subir la imagen, mostramos un mensaje de error
           echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
        }
      }
   }
   $link = mysql_connect("localhost","root","");
mysql_select_db("conocimiento",$link);
$nuevo_procedimiento=mysql_query("select nombre_paso from detalle where nombre_paso='$nombre_paso'"); 

		if(mysql_num_rows($nuevo_procedimiento)>0) 
		{ 
		echo " 
		<p class='avisos'>El Nombre del paso ya Existe</p> 
		<p class='avisos'><a href='javascript:history.go(-1)' class='clase1'>Volver atrás</a></p> 
		"; 
		}else{
// Con esta sentencia SQL insertaremos los datos en la base de datos
mysql_query("INSERT INTO detalle (id_detalle,num_paso,nombre_paso,descripcion_paso,adjuntar, id_procedimiento)
VALUES ('','$num_paso','$nombre_paso','$descripcion_paso','$archivo','$id_procedimiento')",$link);

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