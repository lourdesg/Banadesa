<?php

require('config.php');
require('include/conexion.php');
require('include/funciones.php');
require('include/pagination.class.php');

$items = 10;
$page = 1;

if(isset($_GET['page']) and is_numeric($_GET['page']) and $page = $_GET['page'])
		$limit = " LIMIT ".(($page-1)*$items).",$items";
	else
		$limit = " LIMIT $items";

if(isset($_GET['q']) and !eregi('^ *$',$_GET['q'])){
		$q = sql_quote($_GET['q']); //para ejecutar consulta
		$busqueda = htmlentities($q); //para mostrar en pantalla

		$sqlStr = "SELECT * FROM procedimiento WHERE nombre LIKE '%$q%'";
		$sqlStrAux = "SELECT count(*) as total FROM procedimiento WHERE nombre LIKE '%$q%'";
	}else{
		$sqlStr = "SELECT * FROM procedimiento";
		$sqlStrAux = "SELECT count(*) as total FROM procedimiento";
	}

$aux = Mysql_Fetch_Assoc(mysql_query($sqlStrAux,$link));
$query = mysql_query($sqlStr.$limit, $link);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


		<title>Base de Conocimiento</title>
		<link href="Estilo/css/estilo.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />		
<link rel="stylesheet" href="pagination.css" media="screen">
<link rel="stylesheet" href="style.css" media="screen">
<script src="include/buscador.js" type="text/javascript" language="javascript"></script>
<style type = "text/css">
		a {
			  color: blue;
			  text-decoration: line;
			  font: arial;
			  size:50px;
		}
		a:hover {
			   color: green;
		 
		}
	</style>
</head>

<body style ="margin-left: 30px margin-rigth: 400px ">
	<div class="container">
				<div class="row">
					<div id="banner">
								
						<div class="span12">
						<table width = "1024"  cellpadding="0" style="margin-right:1000px margin-left:45px" >
							<tr>
							<td width ="880" >
							<img class ="redondear" src="Imagenes/logoBanadesa.png" width="900px" height="150px"  border="0"> 
							</td>
							<td width="300">
							<br>
							<p><a href='index.php' title="Cerrar mi sesion como usuario validado">Cerrar Sesi&oacute;n</a></p>
							</td>
							</tr>
						</table>
					</div><!--cierra el div de la clase span12-->
					</div><!--cierra el div del id banner-->
				</div><!--cierra el div de la clase row-->
				<hr class= "linea" style=" margin-left:45px">
	<form action="" onsubmit="">
      <label>Buscar</label> <input type="text" id="q" name="q" value="<?php if(isset($q)) echo $busqueda;?>" onKeyUp="return buscar()">
      <input type="submit" value="Buscar" id="boton">
      <span id="loading"></span>
    </form>
    
    <div id="resultados">
	<p><?php
		if($aux['total'] and isset($busqueda)){
				echo "{$aux['total']} Resultado".($aux['total']>1?'s':'')." que coinciden con tu b&uacute;squeda \"<strong>$busqueda</strong>\".";
			}elseif($aux['total'] and !isset($q)){
				echo "Total de registros: {$aux['total']}";
			}elseif(!$aux['total'] and isset($q)){
				echo"No hay registros que coincidan con tu b&uacute;squeda \"<strong>$busqueda</strong>\"";
			}
	?></p>

	<?php 
		if($aux['total']>0){
			$p = new pagination;
			$p->Items($aux['total']);
			$p->limit($items);
			if(isset($q))
					$p->target("comentario.php?q=".urlencode($q));
				else
					$p->target("comentario.php");
			$p->currentPage($page);
			$p->show();
			echo "\t<table class=\"registros\">\n";
			echo "<tr class=\"titulos\"><td>Listado de los Procedimiento</td></tr>\n";
			$r=0;
			while($row = mysql_fetch_assoc($query)){
          echo "\t\t<tr class=\"row$r\"><td><a href=\"comentario.php{$row['id_procedimiento']}\" target=\"_blank\">".htmlentities($row['nombre'])."</a></td></tr>\n";
          echo "\t\t<tr class=\"row$r\"><td><a{$row['id_procedimiento']}\" target=\"_blank\">".htmlentities($row['descripcion'])."</a></td></tr>\n";
		  echo "\t\t<tr class=\"row$r\"><td>Visita <a{$row['id_procedimiento']}\" target=\"_blank\">".htmlentities($row['visita'])."</a></td></tr>\n";
		  if($r%2==0)++$r;else--$r;
        }
			echo "\t</table>\n";
			$p->show();
		}
	?>
    </div>
	</div><!--cierra el div de la clase container-->
</body>
</html>

