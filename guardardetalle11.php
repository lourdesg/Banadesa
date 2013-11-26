<?php
//Si se quiere subir una imagen
if (isset($_POST['submit'])) {
   //Recogemos el archivo enviado por el formulario
   $numero= $_POST['num_paso']; 
   $archivo = $_FILES['imagen']['name'];
   $location = "imagenes_base/".$archivo;

   //Si el archivo contiene algo y es diferente de vacio
   if (isset($archivo) && $archivo != "") {
      //Obtenemos algunos datos necesarios sobre el archivo
      $tipo = $_FILES['imagen']['type'];
      $tamano = $_FILES['imagen']['size'];
      $temp = $_FILES['imagen']['tmp_name'];
       
      //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
     if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
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
}




///////////////////////////////////////////////////////////////
include("conexion.php");
if(isset($_POST['num_paso']) && !empty($_POST['num_paso']) &&
 isset($_POST['nombre_paso']) && !empty($_POST['nombre_paso']) &&
 isset($_POST['descripcion_paso']) && !empty($_POST['descripcion_paso']) &&
 isset ($_POST['id_procedimiento'])&& !empty($_POST['id_procedimiento'])) 

// Si entramos es que todo se ha realizado correctamente

$link = mysql_connect("localhost","root","");
mysql_select_db("conocimiento",$link);
$nuevo_procedimiento=mysql_query("select nombre_paso from detalle where nombre_paso='{$_POST['nombre_paso']}'"); 

		if(mysql_num_rows($nuevo_procedimiento)>0) 
		{ 
		echo " 
		<p class='avisos'>El Nombre del paso ya Existe</p> 
		<p class='avisos'><a href='javascript:history.go(-1)' class='clase1'>Volver atrás</a></p> 
		"; 
		}else{

// Con esta sentencia SQL insertaremos los datos en la base de datos
$consulta = "INSERT INTO detalle (id_detalle,num_paso,nombre_paso,descripcion_paso,adjuntar, id_procedimiento)VALUES('','{$_POST['num_paso']}','{$_POST['nombre_paso']}','{$_POST['descripcion_paso']}','$location','{$_POST['id_procedimiento']}')";
	
	mysql_query($consulta, $link);
	
	$my_error = mysql_error($link);

  if(!empty($my_error)) 
  { $valor = "Ha habido un error al insertar los valores. $my_error"; 

  } else {
   $valor = "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><center><p><img src='img/disponible.png'> Los Datos han sido registrados satisfactoriamente </p></center></div>";

  }

  
}
  echo json_encode(array('datos' => $valor));



?>	
