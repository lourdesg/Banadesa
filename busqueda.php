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
		$sqlStr = "SELECT * FROM procedimiento ORDER BY visita DESC";
		$sqlStrAux = "SELECT count(*) as total FROM procedimiento ORDER BY visita DESC";
	}


$aux = Mysql_Fetch_Assoc(mysql_query($sqlStrAux,$link));
$query = mysql_query($sqlStr.$limit, $link);
?>	<p><?php
		if($aux['total'] and isset($busqueda)){
				echo "{$aux['total']} Resultado".($aux['total']>1?'s':'')." que coinciden con tu b&uacute;squeda \"<strong>$busqueda</strong>\".";
			}elseif($aux['total'] and !isset($q)){
				echo "Total de registros: {$aux['total']}";
			}elseif(!$aux['total'] and isset($q)){
				echo"No hay registros que coincidan con tu b&uacute;squeda \"<strong>$busqueda</strong>\"";
			}
	?></p>
<html>
	<head>
	<link rel="stylesheet" href="style.css" media="screen">
	</head>
	</html>
	<?php 
		if($aux['total']>0){
			$p = new pagination;
			$p->Items($aux['total']);
			$p->limit($items);
			if(isset($q))
					$p->target("buscador.php?q=".urlencode($q));
				else
					$p->target("buscador.php");
			$p->currentPage($page);
			$p->show();
			echo "\t<table class=\"registros\">\n";
			echo "<tr class=\"titulos\"><td></td></tr>\n";
			$r=0;
			while($row = mysql_fetch_assoc($query)){
         echo "\t\t<tr class=\"row$r\"><td><a  link href = 'comentario.php'{$row['id_procedimiento']}\" target=\"_blank\">".htmlentities($row['nombre'])."</a></td></tr>\n";
          echo "\t\t<tr class=\"row$r\"><td><a {$row['id_procedimiento']}\" target=\"_blank\">".htmlentities($row['descripcion'])."</a></td></tr>\n";
         echo "\t\t<tr class=\"row$r\"><td><a  {$row['id_procedimiento']}\" target=\"_blank\">".htmlentities($row['visita'])."</a></td></tr>\n";if($r%2==0)++$r;else--$r;
        }
			echo "\t</table>\n";
			$p->show();
		}
	?>
	